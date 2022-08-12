<?php
namespace app\models\service;

use app\models\dao\ItemorcamentoDao;

class ItemorcamentoService{

    public static function excluir($id_pedido, $id_produto){
        $dao = new ItemorcamentoDao();
        return $dao->excluir($id_pedido, $id_produto);
    }
    
    public static function atualizaQtdeItem($id_pedido, $id_produto, $qtde, $total, $total_somado, $frete, $desconto_percentual, $desconto_valor){
        $dao = new ItemorcamentoDao();
        return $dao->atualizaQtdeItem($id_pedido, $id_produto, $qtde, $total, $total_somado, $frete, $desconto_percentual, $desconto_valor);
    }
    
    public static function ExcluirItens($id_pedido){
        $dao = new ItemorcamentoDao();
        return $dao->ExcluirItens($id_pedido);
    }
    
    public static function getItemProduto($id_pedido, $id_produto){
        $dao = new ItemorcamentoDao();
        return $dao->getItemProduto($id_pedido, $id_produto);
    }

}

