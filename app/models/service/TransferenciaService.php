<?php
namespace app\models\service;

use app\models\dao\TransferenciaDao;
use app\models\validacao\TransferenciaValidacao;

class TransferenciaService{
    public static function salvar($transferencia, $campo, $tabela){
        $validacao = TransferenciaValidacao::salvar($transferencia);
        $id_transferencia = Service::salvar($transferencia, $campo, $validacao->listaErros(), $tabela);
        if($id_transferencia){
            //saida
            $saldo_anterior_origem = ProdutoLocalizacaoService::getProdutoLocalizacao($transferencia->id_produto,$transferencia->id_origem);
            $movimento = new \stdClass();
            $movimento->id_localizacao      = $transferencia->id_origem;
            $movimento->id_tipo_movimento   = 11; //id_transferencia avulsa           
            $movimento->id_transferencia    = $id_transferencia;
            $movimento->entrada_saida = "S";
            $movimento->id_produto          = $transferencia->id_produto;
            $movimento->data_movimento      = $transferencia->data_transferencia;
            $movimento->qtde_movimento      = $transferencia->qtde_transferencia;
            $movimento->valor_movimento     = 0;
            $movimento->subtotal_movimento  = 0;
            $movimento->descricao           = "Transferencia Saída ID: ".$id_transferencia;
            Service::inserir(objToArray($movimento), "movimento");
            ProdutoLocalizacaoService::atualizarEstoque($movimento->id_produto, $movimento->id_localizacao , $saldo_anterior_origem-$movimento->qtde_movimento);
            
            $saldo_anterior_destino = ProdutoLocalizacaoService::getProdutoLocalizacao($transferencia->id_produto,$transferencia->id_destino);
            //entrada
            $movimento = new \stdClass();
            $movimento->id_localizacao      = $transferencia->id_destino;
            $movimento->id_tipo_movimento   = 12; //id_transferencia avulsa
            $movimento->id_transferencia    = $id_transferencia;
            $movimento->entrada_saida = "E";
            $movimento->id_produto          = $transferencia->id_produto;
            $movimento->data_movimento      = $transferencia->data_transferencia;
            $movimento->qtde_movimento      = $transferencia->qtde_transferencia;
            $movimento->valor_movimento     = 0;
            $movimento->subtotal_movimento  = 0;
            $movimento->descricao           = "Transferencia Entrada ID: ".$id_transferencia;
            Service::inserir(objToArray($movimento), "movimento");
            ProdutoLocalizacaoService::atualizarEstoque($movimento->id_produto, $movimento->id_localizacao , $saldo_anterior_destino+$movimento->qtde_movimento);
        }
        return $id_transferencia;
        
    }
    
    
    
    
    
    
    
    public static function lista(){
        $dao = new TransferenciaDao();
        return $dao->lista();
    }
}

