<?php
namespace app\models\service;

use app\models\dao\SolicitacaoDao;
use app\models\validacao\SolicitacaoValidacao;

class SolicitacaoService{
    public static function salvar($solicitacao, $campo, $tabela){
        $validacao = SolicitacaoValidacao::salvar($solicitacao);
        return Service::salvar($solicitacao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function lista($tabela){
        $dao = new SolicitacaoDao();
        return $dao->lista($tabela);
    }   
    
    public static function listaPorStatus($id_status){
        $dao = new SolicitacaoDao();
        return $dao->listaPorStatus($id_status);
        
    }
}

