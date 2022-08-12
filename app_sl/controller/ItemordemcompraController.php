<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemOrdemCompraService;
use app\models\service\Service;
use app\models\service\OrdemCompraService;

class ItemordemcompraController extends Controller{
    private $tabela = "item_ordem_compra";
    private $campo  = "id_item_ordem_compra";  
    
    public function inserir(){
        $item_ordem_compra = new \stdClass();
        $item_ordem_compra->id_produto      = $_POST["id_produto"];
        $item_ordem_compra->id_ordem_compra = $_POST['id_ordem_compra'];
        $item_ordem_compra->qtde 		    = $_POST['qtde'];
        $item_ordem_compra->valor 		    = $_POST['preco'];
        $item_ordem_compra->subtotal 		= $item_ordem_compra->qtde * $item_ordem_compra->valor;             
        
        if(ItemOrdemCompraService::salvar($item_ordem_compra, $this->campo, $this->tabela)){
            $erro = -1;
            $msg  = Flash::getMsg();
            OrdemCompraService::atualizaTotal($item_ordem_compra->id_ordem_compra);
        }else{
            $erro = 1;
            $msg  = Flash::getErro();
        }
        
        $lista = ItemOrdemCompraService::listaItensOrdemCompra($item_ordem_compra->id_ordem_compra);
        echo json_encode(["erro"=> $erro, "msg"=>$msg, "lista"=>$lista]);
        
    }
    
    public function excluir($id_item_ordem_compra, $id_ordem_compra ){
        Service::excluir($this->tabela, $this->campo, $id_item_ordem_compra);
        $lista = ItemOrdemCompraService::listaItensOrdemCompra($id_ordem_compra);
        OrdemCompraService::atualizaTotal($id_ordem_compra);
        echo json_encode($lista);
        
    }
}

