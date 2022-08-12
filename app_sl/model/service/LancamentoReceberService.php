<?php
namespace app\models\service;

use app\models\dao\LancamentoReceberDao;
use app\models\validacao\LancamentoReceberValidacao;

class LancamentoReceberService{
    public static function salvar($lancamento, $campo, $tabela){
        $validacao = LancamentoReceberValidacao::salvar($lancamento);
        return Service::salvar($lancamento, $campo, $validacao->listaErros(), $tabela);
    }
    public static function lista(){
        $dao = new LancamentoReceberDao();
        return $dao->lista();
    }
    
    public static function getLancamentoReceber($id_lancamento){
        $dao = new LancamentoReceberDao();
        return $dao->getLancamentoReceber($id_lancamento);
    }
}

