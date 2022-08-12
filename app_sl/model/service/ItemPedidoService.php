<?php
namespace app\models\service;

use app\models\dao\ItemPedidoDao;

class ItemPedidoService{
    
    public static function listaPorPedido($id_pedido){
        $dao = new ItemPedidoDao();
        return $dao->listaPorPedido($id_pedido);
    }
    
    public static function listaItens($id_pedido){
        $dao = new ItemPedidoDao();
        return $dao->listaItens($id_pedido);
    }
    public static function listaPorPedidoLocalizacao($id_pedido){
        $dao = new ItemPedidoDao();
        return $dao->listaPorPedidoLocalizacao($id_pedido);
    }
    
    public static function listaItemComLocalizacao($id_pedido){
        $dao = new ItemPedidoDao();
        $itens = $dao->listaPorPedido($id_pedido);
        foreach ($itens as $item){
            $item->localizacao = ProdutoLocalizacaoService::listaPorProduto($item->id_produto);
        }
        
        return $itens;
    }
    
}

