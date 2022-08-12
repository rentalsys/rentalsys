<?php
namespace app\models\service;

use app\models\dao\PedidoDao;

class ItemPedidoService{
    
    public static function listaPorPedido($id_pedido){
        $dao = new PedidoDao();
        return $dao->listaPorPedido($id_pedido);
    }
    
    public static function listaItens($id_pedido){
        $dao = new PedidoDao();
        return $dao->listaItens($id_pedido);
    }
    public static function listaPorPedidoLocalizacao($id_pedido){
        $dao = new PedidoDao();
        return $dao->listaPorPedidoLocalizacao($id_pedido);
    }
    
    public static function listaItemComLocalizacao($id_pedido){
        $dao = new PedidoDao();
        $itens = $dao->listaPorPedido($id_pedido);
        foreach ($itens as $item){
            $item->localizacao = ProdutoLocalizacaoService::listaPorProduto($item->id_produto);
        }
        
        return $itens;
    }
    
}

