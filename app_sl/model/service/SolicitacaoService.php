<?php
namespace app\models\service;

use app\models\validacao\SolicitacaoValidacao;
use app\models\dao\SolicitacaoDao;

class SolicitacaoService{
    public static function salvar($solicitacao, $campo, $tabela){
        $validacao = SolicitacaoValidacao::salvar($solicitacao);     
        return Service::salvar($solicitacao, $campo, $validacao->listaErros(), $tabela);
    }
    public static function listaPorStatus($id_status){
        $dao = new SolicitacaoDao();
        return $dao->listaPorStatus($id_status);
    }
    
    public static function getSolicitacaoPorOrdemProducao($id_produto, $id_ordem_producao){
        $dao = new SolicitacaoDao();
        return $dao->getSolicitacaoPorOrdemProducao($id_produto, $id_ordem_producao);
    }
    
    public static function listaPorCotacao($id_cotacao){
        $dao = new SolicitacaoDao();
        return $dao->listaPorCotacao($id_cotacao);
    }
}

