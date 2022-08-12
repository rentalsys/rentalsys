<?php
namespace app\models\service;

use app\models\dao\CotacaoDao;
use app\models\validacao\CotacaoValidacao;

class CotacaoService{
    public static function salvar($cotacao, $campo, $tabela){
        $validacao = CotacaoValidacao::salvar($cotacao);
        return Service::salvar($cotacao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function lista(){
        $dao = new CotacaoDao();
        return $dao->lista();
    }   
    
    public static function listaPorStatus($id_status){
        $dao = new CotacaoDao();
        return $dao->listaPorStatus($id_status);
    }
    
    public static function filtro($filtro,$data1,$data2){
        $dao = new CotacaoDao();
        return $dao->filtro($filtro,$data1,$data2);
    }
}

