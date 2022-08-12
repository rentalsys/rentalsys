<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\SolicitacaoCotacaoService;


class SolicitacaocotacaoController extends Controller{
    private $tabela = "compra_solicitacao_cotacao";
    private $campo  = "id_solicitacao_cotacao";
    public function inserir(){
        $solicitacao_cotacao = new \stdClass();
        $solicitacao_cotacao->id_solicitacao     = $_POST["id_solicitacao"];
        $solicitacao_cotacao->id_cotacao         = $_POST["id_cotacao"];
        //verificação de funcionamento
        //i($solicitacao_cotacao);
        SolicitacaoCotacaoService::salvar($solicitacao_cotacao,$this->campo, $this->tabela);
        $this->redirect(URL_BASE."cotacao/cotar/".$solicitacao_cotacao->id_cotacao);
    }
    
    public function excluir($id_solicitacao_cotacao, $id_solicitacao, $id_cotacao){
        SolicitacaoCotacaoService::excluir($id_solicitacao_cotacao, $id_solicitacao);
        $this->redirect(URL_BASE."cotacao/cotar/".$id_cotacao);
    }
}


