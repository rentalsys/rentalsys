<?php
namespace app\models\service;

use app\models\validacao\OrcamentoValidacao;
use app\models\dao\OrcamentoDao;

class OrcamentoService{
    public static function salvar($orcamento, $campo, $tabela){
        $validacao = OrcamentoValidacao::salvar($marca);
        return Service::salvar($orcamento, $campo, $validacao->listaErros(), $tabela);
    }
    public static function lista(){
        $dao = new OrcamentoDao();
        return $dao->lista();
    }
    
    public static function getOrcamento($id_pedido){
        $dao = new OrcamentoDao();
        return $dao->getOrcamento($id_pedido);
    }
    
    public static function getOrcamentoItem($id_pedido){
        $dao = new OrcamentoDao();
        return $dao->getOrcamentoItem($id_pedido);
    }
    
    public static function ExcluitPagamento($id_forma, $id_pedido){
        $dao = new OrcamentoDao();
        return $dao->ExcluitPagamento($id_forma, $id_pedido);
    }
    
    public static function listaanexo($id_pedido){
        $dao = new OrcamentoDao();
        return $dao->listaanexo($id_pedido);
    }
    public static function transporte($id_pedido){
        $dao = new OrcamentoDao();
        return $dao->transporte($id_pedido);
    }
    
    
}

