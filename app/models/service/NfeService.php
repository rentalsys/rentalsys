<?php
namespace app\models\service;
use NFePHP\Common\Certificate;
use NFePHP\NFe\Complements;
use NFePHP\NFe\Make;
use NFePHP\NFe\Tools;
use NFePHP\NFe\Common\Standardize;
use Exception;
use InvalidArgumentException;
use app\core\Flash;
use NFePHP\DA\NFe\Danfe;


class NfeService{
    public static function gerarxml($notafiscal){ 
        $nfe = new Make();
        $std = new \stdClass();
        $std->versao = '4.00'; //versão do layout (string)
        $std->Id = ''; //se o Id de 44 digitos não for passado será gerado automaticamente
        $std->pk_nItem = null; //deixe essa variavel sempre como NULL
        $nfe->taginfNFe($std);
       
        self::identificacao($nfe, $notafiscal->nfe);
        self::emitente($nfe,  $notafiscal->nfe);
        self::destinatario($nfe, $notafiscal->destinatario);
        $itens = $notafiscal->itens;
        $cont = 0;
        foreach($itens as $item){
            $cont++;
            ItemNfeService::dadosProduto($cont, $nfe, $item);
            ItemNfeService::tagImposto($cont, $nfe, $notafiscal->nfe);
            ItemNfeService::icmsSn($cont, $nfe);
            ItemNfeService::pis($cont, $nfe);
            ItemNfeService::cofins($cont, $nfe);
        }
        
        self::totais($nfe, $notafiscal->nfe);
        $std = new \stdClass();
        $std->modFrete = 0;        
        $nfe->tagtransp($std);
        
        self::fatura($nfe, $notafiscal->nfe);
        self::pagamento($nfe, $notafiscal->nfe); 
        $retorno = new \stdClass();
        try {
            $result = $nfe->montaNFe();
            if($result){
               // header("Content-type: text/xml; charset=UTF-8");
                $xml = $nfe->getXML(); 
                $chave = $nfe->getChave();
                $nomeXml = $chave ."-nfe.xml";
                $pastaAmbiente = ($notafiscal->nfe->tpAmb=="1") ? "producao" : "homologacao";
                $path = "Notas/{$pastaAmbiente}/temporarias/".$nomeXml;
                file_put_contents($path, $xml);
                chmod($path, 0777);
                
                NotaFiscalService::salvarChave($notafiscal->nfe->id_nfe, $chave);
                $retorno->erro = -1;
                $retorno->msg = "XML gerado com sucesso";
                $retorno->msg_erro = "";
            }else{
                $retorno->erro = 1;
                $retorno->msg = "Não foi possível gerar o XML";
                $retorno->msg_erro = $nfe->getErrors();
            }
        } catch (Exception $e) {
            $retorno->erro = 1;
            $retorno->msg = "Erro: Não foi possível gerar o XML";
            $retorno->msg_erro = $nfe->getErrors();
        }
        
        return $retorno;
        
    }
    
    public static function assinarXml($notafiscal){
        $arr = [
            "atualizacao" => $notafiscal->nfe->atualizacao_emitente,
            "tpAmb" => intVal($notafiscal->nfe->tpAmb),
            "razaosocial" => $notafiscal->nfe->em_xNome,
            "cnpj" => $notafiscal->nfe->em_CNPJ,
            "siglaUF" => $notafiscal->nfe->em_UF,
            "schemes" => "PL_009_V4",
            "versao" => '4.00',
            "tokenIBPT" => "",
            "CSC" => "",
            "CSCid" => "",
            "proxyConf" => [
                "proxyIp" => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ];
        $retorno = new \stdClass();
        try {
            $configJson = json_encode($arr);
            $certificado_digital = file_get_contents("Notas/certificados/".$notafiscal->configuracao->certificado_digital);
            $tools = new Tools($configJson, Certificate::readPfx($certificado_digital, $notafiscal->configuracao->senha_certificado));
            
            //Lendo o arquivo xml gerado
            $pastaAmbiente = ($notafiscal->nfe->tpAmb=="1") ? "producao" : "homologacao";
            $xml = "Notas/{$pastaAmbiente}/temporarias/{$notafiscal->nfe->chave}-nfe.xml";
            $response = $tools->signNFe(file_get_contents($xml));
            
            //Transportar o arquivo assinado para a pasta assinada
            $path_assinada = "Notas/{$pastaAmbiente}/assinadas/{$notafiscal->nfe->chave}-nfe.xml";
            file_put_contents($path_assinada, $response);
            chmod($path_assinada, 0777);
            
            NotaFiscalService::mudarStatus($notafiscal->nfe->id_nfe, 4);
            $retorno->erro = -1;
            $retorno->msg = "XML Assinado com sucesso";
            $retorno->msg_erro = "";
            
            
        } catch (\Exception $e) {         
            //aqui você trata possiveis exceptions
            $retorno->erro = -1;
            $retorno->msg = "Erro: Erro ao  Assinar XML";
            $retorno->msg_erro = $e->getMessage();
        }         
        
        return $retorno;
    }
    
    public static function enviarXml($notafiscal){
        $arr = [
            "atualizacao" => $notafiscal->nfe->atualizacao_emitente,
            "tpAmb" => intVal($notafiscal->nfe->tpAmb),
            "razaosocial" => $notafiscal->nfe->em_xNome,
            "cnpj" => $notafiscal->nfe->em_CNPJ,
            "siglaUF" => $notafiscal->nfe->em_UF,
            "schemes" => "PL_009_V4",
            "versao" => '4.00',
            "tokenIBPT" => "",
            "CSC" => "",
            "CSCid" => "",
            "proxyConf" => [
                "proxyIp" => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ];
        $retorno = new \stdClass();
        try {
            $configJson = json_encode($arr);
            $certificado_digital = file_get_contents("Notas/certificados/".$notafiscal->configuracao->certificado_digital);
            $tools = new Tools($configJson, Certificate::readPfx($certificado_digital, $notafiscal->configuracao->senha_certificado));
            
            $idLote = str_pad($notafiscal->nfe->nNF, 15, '0', STR_PAD_LEFT);
           
            //Lendo o arquivo XML a ser enviado
            $pastaAmbiente = ($notafiscal->nfe->tpAmb=="1") ? "producao" : "homologacao";
            $xml = file_get_contents("Notas/{$pastaAmbiente}/assinadas/{$notafiscal->nfe->chave}-nfe.xml");
            
            //envia o xml para pedir autorização ao SEFAZ
            $resp = $tools->sefazEnviaLote([$xml], $idLote);
            
            //transforma o xml de retorno em um stdClass
            $st = new Standardize();
            $std = $st->toStd($resp);
            if ($std->cStat != 103) {
                //erro registrar e voltar                
                $retorno->erro = 1;
                $retorno->msg = "Não foi possível enviar o XML";
                $retorno->msg_erro = $std->xMotivo;
                return $retorno;
            }
            $recibo = $std->infRec->nRec;
            NotaFiscalService::salvarRecibo($notafiscal->nfe->id_nfe, $recibo);
            $retorno->erro = -1;
            $retorno->msg = "XML Enviado com sucesso";
            $retorno->msg_erro = "";
            //esse recibo deve ser guardado para a proxima operação que é a consulta do recibo
            //header('Content-type: text/xml; charset=UTF-8');
           // echo $resp;
        } catch (\Exception $e) {
            $retorno->erro = -1;
            $retorno->msg = "Erro: Erro ao  Assinar XML";
            $retorno->msg_erro = $e->getMessage();
        }
        
        return $retorno;
    }
    
    public static function autorizarXml($notafiscal){
        $arr = [
            "atualizacao" => $notafiscal->nfe->atualizacao_emitente,
            "tpAmb" => intVal($notafiscal->nfe->tpAmb),
            "razaosocial" => $notafiscal->nfe->em_xNome,
            "cnpj" => $notafiscal->nfe->em_CNPJ,
            "siglaUF" => $notafiscal->nfe->em_UF,
            "schemes" => "PL_009_V4",
            "versao" => '4.00',
            "tokenIBPT" => "",
            "CSC" => "",
            "CSCid" => "",
            "proxyConf" => [
                "proxyIp" => "",
                "proxyPort" => "",
                "proxyUser" => "",
                "proxyPass" => ""
            ]
        ];
      
        try {
            //$content = conteúdo do certificado PFX
            $configJson = json_encode($arr);
            $certificado_digital = file_get_contents("Notas/certificados/".$notafiscal->configuracao->certificado_digital);
            $tools = new Tools($configJson, Certificate::readPfx($certificado_digital, $notafiscal->configuracao->senha_certificado));
                        
            //consulta número de recibo
            //$numeroRecibo = número do recíbo do envio do lote
            $xmlResp = $tools->sefazConsultaRecibo($notafiscal->nfe->recibo, intVal($notafiscal->nfe->tpAmb));          
            
            
            //transforma o xml de retorno em um stdClass
            $st = new Standardize();
            $std = $st->toStd($xmlResp);
            $retorno = new \stdClass();
            if ($std->cStat=='103') { //lote enviado
                //Lote ainda não foi precessado pela SEFAZ;
                $retorno->erro = 1;
                $retorno->msg = "Não foi possível fazer a consulta";
                $retorno->msg_erro = "O lote ainda está sendo processado";
                return $retorno;
            }
            if ($std->cStat=='105') { //lote em processamento
                //tente novamente mais tarde
                $retorno->erro = 1;
                $retorno->msg = "Não foi possível fazer a consulta";
                $retorno->msg_erro = "Lote em processamento, tente mais tarde";
                return $retorno;
            }
            
            if ($std->cStat=='104') { //lote processado (tudo ok)
                if ($std->protNFe->infProt->cStat=='100') { //Autorizado o uso da NF-e
                    $protocolo = $std->protNFe->infProt->nProt;
                    
                    //Lendo o arquivo XML a ser enviado
                    $pastaAmbiente = ($notafiscal->nfe->tpAmb=="1") ? "producao" : "homologacao";
                    $xml_assinado = file_get_contents("Notas/{$pastaAmbiente}/assinadas/{$notafiscal->nfe->chave}-nfe.xml");
                    
                    $xml_autorizado = Complements::toAuthorize($xml_assinado, $xmlResp);
                    
                    //Transportar o arquivo autorizado para a pasta autorizadas
                    $path_autorizado = "Notas/{$pastaAmbiente}/autorizadas/{$notafiscal->nfe->chave}-nfe.xml";
                    file_put_contents($path_autorizado, $xml_autorizado);
                    chmod($path_autorizado, 0777);
                    
                    NotaFiscalService::salvarProtocolo($notafiscal->nfe->id_nfe, $protocolo);
                    $retorno->erro = -1;
                    $retorno->msg = "XML Autorizado com sucesso";
                    $retorno->msg_erro = "";
                    
                    return $retorno;
                    
                    
                } elseif (in_array($std->protNFe->infProt->cStat,["110", "301", "302"])) { //DENEGADAS                    
                        $retorno->erro = 1;
                        $retorno->msg = "Denegada";
                        $retorno->msg_erro = $std->protNFe->infProt->cStat . ":". $std->protNFe->infProt->xMotivo ;
                        return $retorno;                    
                    
                } else { //não autorizada (rejeição)                    
                    
                    $retorno->erro = 1;
                    $retorno->msg = "Não autorizada";
                    $retorno->msg_erro = $std->protNFe->infProt->cStat . ":". $std->protNFe->infProt->xMotivo ;
                    return $retorno;
                    
                }
            } else { //outros erros possíveis                
                $retorno->erro = 1;
                $retorno->msg = "Rejeitado";
                $retorno->msg_erro = $std->cStat . ":". $std->xMotivo ;
                return $retorno;
            }
            
        } catch (\Exception $e) {
            $retorno->erro = -1;
            $retorno->msg = "Erro: Erro ao  Consultar XML";
            $retorno->msg_erro = $e->getMessage();
        }
        
        return $retorno;
    }
    public static function danfe($notafiscal){
     //   $logo = 'data://text/plain;base64,'. base64_encode(file_get_contents(realpath(__DIR__ . '/../images/tulipas.png')));
        //$logo = realpath(__DIR__ . '/../images/tulipas.png');
        
        try {
            //Lendo o arquivo XML a ser enviado
            $pastaAmbiente = ($notafiscal->nfe->tpAmb=="1") ? "producao" : "homologacao";
            $xml_autorizado= file_get_contents("Notas/{$pastaAmbiente}/autorizadas/{$notafiscal->nfe->chave}-nfe.xml");            
            
            $danfe = new Danfe($xml_autorizado);
            $danfe->debugMode(false);
            $danfe->creditsIntegratorFooter('WEBNFe Sistemas - http://www.webenf.com.br');
            // Caso queira mudar a configuracao padrao de impressao
            /*  $this->printParameters( $orientacao = '', $papel = 'A4', $margSup = 2, $margEsq = 2 ); */
            //Informe o numero DPEC
            /*  $danfe->depecNumber('123456789'); */
            //Configura a posicao da logo
            /*  $danfe->logoParameters($logo, 'C', false);  */
            //Gera o PDF
            $pdf = $danfe->render();
            header('Content-Type: application/pdf');
            echo $pdf;
        } catch (InvalidArgumentException $e) {
            echo "Ocorreu um erro durante o processamento :" . $e->getMessage();
        } 
    }
    public static function identificacao($nfe,$identificacao){
        $std = new \stdClass();
        $std->cUF       = $identificacao->cUF; //codigo numerico do estado
        $std->cNF       = $identificacao->cNF; //numero aleatório da NF
        $std->natOp     = $identificacao->natOp; //natureza da operação
        $std->indPag    = 0; //0=Pagamento à vista; 1=Pagamento a prazo; 2=Outros - NÃO EXISTE MAIS NA VERSÃO 4.00
        $std->mod       = $identificacao->modelo; //modelo da NFe 55 ou 65 essa última NFCe
        $std->serie     = $identificacao->serie; //serie da NFe
        $std->nNF       = $identificacao->nNF; // numero da NFe
        $std->dhEmi     = $identificacao->dhEmi; //date("Y-m-d\TH:i:sP");//Formato: “AAAA-MM-DDThh:mm:ssTZD” (UTC - Universal Coordinated Time).
        $std->dhSaiEnt  = $identificacao->dhSaiEnt; //date("Y-m-d\TH:i:sP");//Não informar este campo para a NFC-e.
        $std->tpNF      = $identificacao->tpNF; // '1';
        $std->idDest    = $identificacao->idDest; //1=Operação interna; 2=Operação interestadual; 3=Operação com exterior.
        $std->cMunFG    = $identificacao->cMunFG; //'5200258';
        $std->tpImp     = $identificacao->tpImp;//0=Sem geração de DANFE; 1=DANFE normal, Retrato; 2=DANFE normal, Paisagem;
        $std->tpEmis    = $identificacao->tpEmis;//1=Emissão normal (não em contingência);
        $std->tpAmb     = $identificacao->tpAmb; //1=Produção; 2=Homologação
        $std->finNFe    = $identificacao->finNFe; //1=NF-e normal; 2=NF-e complementar; 3=NF-e de ajuste; 4=Devolução/Retorno.
        $std->indFinal  = $identificacao->indFinal;  //0=Normal; 1=Consumidor final;
        $std->indPres   = $identificacao->indPres;//0=Não se aplica (por exemplo, Nota Fiscal complementar ou de ajuste);
        $std->procEmi   = $identificacao->procEmi;//0=Emissão de NF-e com aplicativo do contribuinte;
        $std->verProc   = $identificacao->verProc; //versão do aplicativo emissor
        
        $nfe->tagide($std);
    }
    
    public static function emitente($nfe,$emitente){
        $std = new \stdClass();
        $std->xNome	= $emitente->em_xNome	;
        $std->xFant	= $emitente->em_xFant	;
        $std->IE	= $emitente->em_IE	;
        $std->IEST	= $emitente->em_IEST	;
        $std->IM	= $emitente->em_IM	;
        $std->CNAE	= $emitente->em_CNAE	;
        $std->CRT	= $emitente->em_CRT	;
        
        if($emitente->em_CNPJ):
            $std->CNPJ = $emitente->em_CNPJ;
            $std->CPF = null;
        elseif($emitente->em_CPF):
            $std->CNPJ = NULL;
            $std->CPF  = $emitente->em_CPF;
        else:
            $std->CNPJ = null;
            $std->CPF = null;
        endif;
        
        $nfe->tagemit($std);
        
        //endereço do emitente
        $std = new \stdClass();
        $std->xLgr		= $emitente->em_xLgr	;
        $std->nro		= $emitente->em_nro	    ;
        $std->xCpl		= $emitente->em_xCpl	;
        $std->xBairro   = $emitente->em_xBairro	;
        $std->cMun		= $emitente->em_cMun	;
        $std->xMun		= $emitente->em_xMun	;
        $std->UF		= $emitente->em_UF		;
        $std->CEP		= $emitente->em_CEP	    ;
        $std->cPais		= $emitente->em_cPais	;
        $std->xPais		= $emitente->em_xPais	;
        $std->fone		= $emitente->em_fone    ;
        
        $nfe->tagenderEmit($std);
    }
    
    public static function destinatario($nfe,$destinatario){
        //destinatário
        $std = new \stdClass();
        $std->xNome = $destinatario->dest_xNome 	;
        $std->indIEDest	= $destinatario->dest_indIEDest	;
        $std->IE	= $destinatario->dest_IE		;
        $std->ISUF	= $destinatario->dest_ISUF		;
        $std->IM	= $destinatario->dest_IM		;
        $std->email	= $destinatario->dest_email		;
        $std->idEstrangeiro= $destinatario->dest_idEstrangeiro;
        
        if($destinatario->dest_CNPJ):
            $std->CNPJ = $destinatario->dest_CNPJ;
            $std->CPF = null;
        elseif($destinatario->dest_CPF):
            $std->CNPJ = NULL;
            $std->CPF  = $destinatario->dest_CPF;
        else:
            $std->CNPJ = null;
            $std->CPF = null;
        endif;
        
        $nfe->tagdest($std);
        
        //Endereço do destinatário
        $std = new \stdClass();
        $std->xLgr	= $destinatario->dest_xLgr		;
        $std->nro	= $destinatario->dest_nro		;
        $std->xCpl	= $destinatario->dest_xCpl		;
        $std->xBairro= $destinatario->dest_xBairro	;
        $std->cMun	= $destinatario->dest_cMun		;
        $std->xMun	= $destinatario->dest_xMun		;
        $std->UF	= $destinatario->dest_UF		;
        $std->CEP	= $destinatario->dest_CEP		;
        $std->cPais	= $destinatario->dest_cPais		;
        $std->xPais	= $destinatario->dest_xPais		;
        $std->fone	= $destinatario->dest_fone		;
        
        $nfe->tagenderDest($std);
    }
    public static function totais($nfe,$notafiscal){
        $std = new \stdClass();
        $std->vBC           = $notafiscal->vBC;
        $std->vICMS         = $notafiscal->vICMS;
        $std->vICMSDeson    = $notafiscal->vICMSDeson;
        $std->vFCP          = $notafiscal->vFCP; //incluso no layout 4.00
        $std->vBCST         = $notafiscal->vBCST;
        $std->vST           = $notafiscal->vST;
        $std->vFCPST        = $notafiscal->vFCPST; //incluso no layout 4.00
        $std->vFCPSTRet     = $notafiscal->vFCPSTRet; //incluso no layout 4.00
        $std->vProd         = $notafiscal->vProd ;
        $std->vFrete        = $notafiscal->vFrete  ;
        $std->vSeg          = $notafiscal->vSeg  ;
        $std->vDesc         = $notafiscal->vDesc ;
        $std->vII           = $notafiscal->vII;
        $std->vIPI          = $notafiscal->vIPI;
        $std->vIPIDevol     = $notafiscal->vIPIDevol; //incluso no layout 4.00
        $std->vPIS          = $notafiscal->vPIS;
        $std->vCOFINS       = $notafiscal->vCOFINS;
        $std->vOutro        = ($notafiscal->vOutro) ? $notafiscal->vOutro : NULL ;
        $std->vNF           = $notafiscal->vNF;
        $std->vTotTrib      = $notafiscal->vTotTrib;
        
        $nfe->tagICMSTot($std);
    }
    
    public static function fatura($nfe, $notafiscal){
        $std = new \stdClass();
        $std->nFat  = $notafiscal->id_nfe;
        $std->vOrig = $notafiscal->vOrig;
        $std->vDesc = $notafiscal->vDesc;
        $std->vLiq  = $notafiscal->vLiq;
       
        $nfe->tagfat($std);
    }
    
    public static function pagamento($nfe, $notafiscal){
        $std = new \stdClass();
        $std->vTroco = null; //incluso no layout 4.00, obrigatório informar para NFCe (65)
        $nfe->tagpag($std);
        
        $std            = new \stdClass();
        $std->tPag      = '01';
        $std->vPag      = $notafiscal->vOrig; //Obs: deve ser informado o valor pago pelo cliente
        $std->CNPJ      = NULL;
        $std->tBand     = NULL;
        $std->cAut      = NULL;
        $std->tpIntegra = NULL; //incluso na NT 2015/002
        $std->indPag    = '0'; //0= Pagamento à Vista 1= Pagamento à Prazo
        
        $nfe->tagdetPag($std);
    }
    
}

