<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemOrdemProducaoService;
use app\models\service\Service;
use app\models\service\OrdemProducaoService;

class ItemordemproducaoController extends Controller{
    private $tabela = "item_ordem_producao";
    private $campo  = "id_item_ordem_producao";  
    
    public function inserir(){
        $item_ordem_producao = new \stdClass();
        $item_ordem_producao->id_produto        = $_POST["id_produto"];
        $item_ordem_producao->id_ordem_producao = $_POST['id_ordem_producao'];
        $item_ordem_producao->qtde_a_produzir 	= 0;
        $item_ordem_producao->qtde_pedido 		= $_POST['qtde'];            
        
        if(ItemOrdemProducaoService::salvar($item_ordem_producao, $this->campo, $this->tabela)){
            $erro = -1;
            $msg  = Flash::getMsg();
        }else{
            $erro = 1;
            $msg  = Flash::getErro();
        }
        
        $lista = ItemOrdemProducaoService::listaItensOrdemProducao($item_ordem_producao->id_ordem_producao);
        echo json_encode(["erro"=> $erro, "msg"=>$msg, "lista"=>$lista]);
        
    }
    
    public function excluir($id_item_ordem_producao, $id_ordem_producao ){
        Service::excluir($this->tabela, $this->campo, $id_item_ordem_producao);
        $lista = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        echo json_encode($lista);
        
    }
}

