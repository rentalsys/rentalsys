<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemordemcompraService;
use app\models\service\OrdemcompraService;
use app\models\service\Service;

class ItemordemcompraController extends Controller{
    private $tabela = "compra_item_ordem_compra";
    private $campo  = "id_item_ordem_compra";
    
    public function inserir(){
        $itemordemcompra                     = new \stdClass();
        $itemordemcompra->id_produto         = $_POST["id_produto"];
        $itemordemcompra->id_ordem_compra    = $_POST["id_ordem_compra"];
        $itemordemcompra->qtde               = $_POST["qtde"];
        $itemordemcompra->valor              = $_POST["valor"];
        $itemordemcompra->subtotal           = $itemordemcompra->qtde * $itemordemcompra->valor ;
        
        if(ItemordemcompraService::salvar($itemordemcompra, $this->campo, $this->tabela)){
            $erro = -1;
            $msg = Flash::getMsg();
            OrdemcompraService::atualizaTotal($itemordemcompra->id_ordem_compra);
        } else {
            $erro = 1;
            $msg = Flash::getErro();
        }
        $lista = ItemordemcompraService::ListaItemPorOrdemCompra($itemordemcompra->id_ordem_compra);
        echo json_encode(["erro"=>$erro, "msg"=>$msg, "lista"=>$lista]);
    }
    public function excluir($id){
        $ide = $_GET['ide'];
        Service::excluir($this->tabela, $this->campo, $id);
        OrdemcompraService::atualizaTotal($id);
        $this->redirect(URL_BASE."ordemcompra/create/".$ide);
    }
}

