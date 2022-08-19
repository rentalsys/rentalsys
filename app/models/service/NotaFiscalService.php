<?php
namespace app\models\service;

use app\models\dao\NotaFiscalDao;

class NotaFiscalService{
    public static function lista(){
       $dao = new NotaFiscalDao();
       return $dao->lista();
    }
    
    public static function getNotaFiscal($id_nfe){
        $dao = new NotaFiscalDao();
        $retorno = (object) array(
            "nfe"           => $dao->getNotaFiscal($id_nfe),
            "destinatario"  => Service::get("nfe_destinatario", "id_nfe", $id_nfe),
            "itens"         => Service::get("nfe_item", "id_nfe", $id_nfe, true),
            "configuracao"  => Service::get("configuracao","id_configuracao",1)
        );
        
        return $retorno;
    }
    
    public static function salvarNFE($pedido){
        $configuracao       = Service::get("configuracao", "id_configuracao", 1);
        $empresa            = Service::get("empresa", "id_empresa", $configuracao->empresa_padrao) ;
        
        $contato            = Service::get("contato", "id_contato", $pedido->id_contato) ;
        
        $itens              = ItemPedidoService::listaItens($pedido->id_pedido);
    
        $estado             = Service::get("estado","uf_estado", $empresa->uf);
        $nota               = new \stdClass();
        $nota->cUF          = $estado->codigo_estado;
        
        $nota->natOp        = 'VENDA';        
        $nota->indPag       = 0; //NÃO EXISTE MAIS NA VERSÃO 4.00
        
        $nota->id_pedido    = $pedido->id_pedido;
        $nota->modelo       = 55;
        $nota->serie        = $configuracao->nfe_serie;
        $nota->id_status    = 2;
        $nota->nNF          = $configuracao->ultimanfe + 1;
        $nota->cNF          = rand($nota->nNF,99999999);
        $nota->dhEmi        = $pedido->data_finalizacao. 'T'.agora().'-03:00';
        $nota->dhSaiEnt     = $pedido->data_finalizacao. 'T'.agora().'-03:00';
        $nota->tpNF         = 1;
        $nota->idDest       = 1;
        $nota->cMunFG       = $empresa->ibge;
        $nota->tpImp        = 1;
        $nota->tpEmis       = 1;
        $nota->cDV          = 2;
        $nota->tpAmb        = $configuracao->nfe_ambiente;
        $nota->finNFe       = 1;
        $nota->indFinal     = 1;
        $nota->indPres      = 2;
        $nota->procEmi      = '0';
        $nota->verProc      = '3.10.31';
        $nota->dhCont       = null;
        $nota->xJust        = null;
        
        $nfe = Service::get("nfe", "id_pedido", $pedido->id_pedido);
        if(!$nfe){
            $id_nfe = Service::inserir(objToArray($nota), "nfe");
        }else{
            if($nfe->id_status < 7){
                $nota->id_nfe = $nfe->id_nfe;
                Service::editar(objToArray($nota),"id_nfe", "nfe");
            } else{
                return $nfe->id_nfe;
            }
            $id_nfe = $nfe->id_nfe;
        }
        
        if(!$id_nfe){
            echo "Erro";
            exit;
        }
        
        $emitente = new \stdClass();
        $emitente->id_nfe      = $id_nfe;        
        $emitente->em_xNome    = tiraAcento($empresa->razao_social);
        $emitente->em_xFant    = tiraAcento($empresa->nome_fantasia);
        $emitente->em_IE       = $empresa->ie;
        $emitente->em_IEST     = $empresa->iest;
        $emitente->em_IM       = $empresa->im;
        $emitente->em_CNAE     = $empresa->cnae;
        $emitente->em_CRT      = $empresa->regime_tributario;
        $emitente->em_CNPJ     = $empresa->cnpj;
        
        $emitente->em_xLgr     = tiraAcento($empresa->logradouro);
        $emitente->em_nro      = $empresa->numero;
        $emitente->em_xCpl     = tiraAcento($empresa->complemento);
        $emitente->em_xBairro  = tiraAcento($empresa->bairro);
        $emitente->em_cMun     = $empresa->ibge;
        $emitente->em_xMun     = tiraAcento($empresa->cidade);
        $emitente->em_UF       = $empresa->uf;
        $emitente->em_CEP      = $empresa->cep;
        $emitente->em_cPais    = "1058";
        $emitente->em_xPais    = "Brasil";
        $emitente->em_fone     = $empresa->fone;
        
        $emit = Service::get("nfe_emitente", "id_nfe", $id_nfe);
        if(!$emit){
            Service::inserir(objToArray($emitente), "nfe_emitente");
        }else{
            Service::editar(objToArray($emitente), "id_nfe", "nfe_emitente");
        }
        
        
        $dest = new \stdClass();
        $dest->id_nfe = $id_nfe;
        $dest->dest_xNome    	= tiraAcento($contato->nome);
        $dest->dest_IE       	= $contato->ie;
        $dest->dest_indIEDest	= $contato->indIEDest;
        $dest->dest_ISUF     	= $contato->SUFRAMA;
        $dest->dest_IM       	= $contato->im;
        $dest->dest_email    	= $contato->email;
        $dest->dest_CNPJ     	= $contato->cnpj;
        $dest->dest_CPF     	= $contato->cpf;        
        
        $dest->dest_idEstrangeiro=$contato->idEstrangeiro;
        $dest->dest_xLgr     	= tiraAcento($contato->logradouro);
        $dest->dest_nro      	= $contato->numero;
        $dest->dest_xCpl     	= tiraAcento($contato->complemento);
        $dest->dest_xBairro  	= tiraAcento($contato->bairro);
        $dest->dest_cMun     	= $contato->ibge;
        $dest->dest_xMun     	= tiraAcento($contato->cidade);
        $dest->dest_UF       	= $contato->uf;
        $dest->dest_CEP      	= $contato->cep;
        $dest->dest_cPais       = "1058";
        $dest->dest_xPais       = "Brasil";
        $dest->dest_fone     	= $contato->fone;
        
        $destinatario = Service::get("nfe_destinatario", "id_nfe", $id_nfe);
      
        if(!$destinatario){
            Service::inserir(objToArray($dest), "nfe_destinatario");
        }else{
            $dest->id_destinatario = $destinatario->id_destinatario;
            Service::editar(objToArray($dest), "id_destinatario", "nfe_destinatario");
        }
       
        
        $j=1;
        $total              = 0;
        $totTrib            = 0;
        
        foreach($itens as $i){
            $item = new \stdClass();
            $item->id_nfe   = $id_nfe  ;
            $item->numero_item = $j++  ;
            $item->cProd    = $i->id_produto;
            $item->cEAN     = $i->gtin;
            $item->xProd    = tiraAcento($i->produto);
            $item->NCM      = $i->ncm;
            
            $item->cBenef   = $i->cbenef; //incluido no layout 4.00
            
            $item->EXTIPI   = $i->extipi;
            $item->CFOP     = $i->cfop;
            $item->uCom     = tiraAcento($i->abrev);
            $item->qCom     = $i->qtde;
            $item->vUnCom   = $i->valor;
            $item->vProd    = $item->qCom * $item->vUnCom;
            $item->cEANTrib = $i->gtin;;
            $item->uTrib    = tiraAcento($i->abrev);
            $item->qTrib    = $i->qtde;
            $item->vUnTrib  = $i->valor;
            $item->vFrete   = null;
            $item->vSeg     = null;
            $item->vDesc    = null;
            $item->vOutro   = null;
            $item->indTot   = 1; //ver depois
            $item->xPed     = $id_nfe  ;
            $item->nItemPed = $i->id_item;
            $item->nFCI     = $i->nfci;
            
         
            
            $total          += $item->vProd;
            $totTrib        += $item->vUnTrib;
            
            $it = Service::get("nfe_item", "cProd", $item->cProd);
            if(!$it){
                Service::inserir(objToArray($item), "nfe_item");
            }else{
                $item->id_item = $it->id_item;
                Service::editar(objToArray($item), "id_item", "nfe_item");
            }           
            
        }
        $_nfe["id_nfe"]     = $id_nfe;
        $_nfe["vOrig"]      = $total;
        $_nfe["vLiq"]       = $total;
        $_nfe["vTotTrib"]   = $totTrib;
        $_nfe["vNF"]        = $total;
        Service::editar($_nfe,"id_nfe", "nfe");
        
    }
    
    public static function salvarChave($id_nfe, $chave){
        $dao = new NotaFiscalDao();
        return $dao->salvarChave($id_nfe, $chave);
    }
    
    public static function salvarRecibo($id_nfe, $recibo){
        $dao = new NotaFiscalDao();
        return $dao->salvarRecibo($id_nfe, $recibo);
    }
    
    public static function salvarProtocolo($id_nfe, $protocolo){
        $dao = new NotaFiscalDao();
        return $dao->salvarProtocolo($id_nfe, $protocolo);
    }
    public static function mudarStatus($id_nfe, $id_status){
        $dao = new NotaFiscalDao();
        return $dao->mudarStatus($id_nfe, $id_status);
    }
    
   
}

