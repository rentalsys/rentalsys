<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\ItemorcamentoService;

class ItemorcamentoController extends Controller{
    private $tabela = "venda_item_pedido";
    private $campo  = "id_item_pedido";
    
    public function excluirProduto(){
        $id_pedido = $_GET['id_pedido'];
        $id_produto = $_GET['id_produto'];
        ItemorcamentoService::excluir($id_pedido, $id_produto);
        $this->redirect(URL_BASE."orcamento/create/".$id_pedido);
    }
    
}

