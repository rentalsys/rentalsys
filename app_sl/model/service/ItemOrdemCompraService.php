<?php
namespace app\models\service;

use app\models\validacao\ItemOrdemCompraValidacao;
use app\models\dao\ItemOrdemCompraDao;

class ItemOrdemCompraService{
    public static function salvar($item_ordem_compra, $campo, $tabela){
        $validacao = ItemOrdemCompraValidacao::salvar($item_ordem_compra);
        return Service::salvar($item_ordem_compra, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaItensOrdemCompra($id_ordem_compra){
        $dao = new ItemOrdemCompraDao();
        return $dao->listaItensOrdemCompra($id_ordem_compra);
    }
    
    public static function getJaTaCadastrado($id_ordem_compra, $id_produto){
        $dao = new ItemOrdemCompraDao();
        return $dao->getJaTaCadastrado($id_ordem_compra, $id_produto);
    }
}

