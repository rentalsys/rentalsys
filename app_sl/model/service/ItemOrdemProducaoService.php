<?php
namespace app\models\service;

use app\models\validacao\ItemOrdemProducaoValidacao;
use app\models\dao\ItemOrdemProducaoDao;

class ItemOrdemProducaoService{
    public static function salvar($item_ordem_producao, $campo, $tabela){
        $validacao = ItemOrdemProducaoValidacao::salvar($item_ordem_producao);
        return Service::salvar($item_ordem_producao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaItensOrdemProducao($id_ordem_producao){
        $dao = new ItemOrdemProducaoDao();
        return $dao->listaItensOrdemProducao($id_ordem_producao);
    }
    
    public static function getItemPorProdutoPorOrdemProducao($id_produto, $id_ordem_producao){
        $dao = new ItemOrdemProducaoDao();
        return $dao->getItemPorProdutoPorOrdemProducao($id_produto, $id_ordem_producao);
    }
}

