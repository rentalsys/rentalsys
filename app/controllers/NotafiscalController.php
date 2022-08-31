<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\NotaFiscalService;
use app\models\service\PedidoService;

class NotafiscalController extends Controller{
    private $tabela = "nfe";
    private $campo  = "id_nfe";
    
    public function index(){
        $dados["lista"]     = NotaFiscalService::lista();
        $dados["view"]      = "NotaFiscal/Index";
        $this->load("template", $dados);
    }
    
    public  function emitirNfe($id_pedido){
        $pedido = PedidoService::getPedido($id_pedido);
        NotaFiscalService::salvarNFE($pedido);
        $this->redirect(URL_BASE ."notafiscal");
    }
}

