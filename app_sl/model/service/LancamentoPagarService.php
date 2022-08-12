<?php
namespace app\models\service;

use app\models\dao\LancamentoPagarDao;
use app\models\validacao\LancamentoPagarValidacao;

class LancamentoPagarService{
    public static function salvar($lancamento, $campo, $tabela){
        $validacao = LancamentoPagarValidacao::salvar($lancamento);     
        return Service::salvar($lancamento, $campo, $validacao->listaErros(), $tabela);
    }
    public static function lista(){
        $dao = new LancamentoPagarDao();
        return $dao->lista();
    }
    
    public static function getLancamentoPagar($id_lancamento){
        $dao = new LancamentoPagarDao();
        return $dao->getLancamentoPagar($id_lancamento);
    }
}

