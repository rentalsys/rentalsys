<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\FornecedorCotacaoService;
use app\models\service\Service;


class FornecedorcotacaoController extends Controller{
    private $tabela = "compra_fornecedor_cotacao";
    private $campo  = "id_fornecedor_cotacao";
    public function inserir(){
        $fornecedor_cotacao = new \stdClass();
        $fornecedor_cotacao->id_fornecedor     = $_POST["id_fornecedor"];
        $fornecedor_cotacao->id_cotacao         = $_POST["id_cotacao"];
        
        FornecedorCotacaoService::salvar($fornecedor_cotacao,$this->campo, $this->tabela);
        $this->redirect(URL_BASE."cotacao/cotar/".$fornecedor_cotacao->id_cotacao);
    }
    
    public function excluir($id_fornecedor_cotacao, $id_cotacao){
            Service::excluir("compra_fornecedor_cotacao", "id_fornecedor_cotacao", $id_fornecedor_cotacao);
            Flash::getMsg();
        $this->redirect(URL_BASE."cotacao/cotar/".$id_cotacao);
    }
}

