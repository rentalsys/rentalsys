<?php
namespace app\models\service;
use app\models\dao\LivroDiarioDao;
use app\models\validacao\LivroDiarioValidacao;


class LivroDiarioService{
    public static function salvar($lancamento, $campo, $tabela){
        $validacao = LivroDiarioValidacao::salvar($lancamento);
        return Service::salvar($lancamento, $campo, $validacao->listaErros(), $tabela);
        
    }
    public static function lista(){
        $dao = new LivroDiarioDao();
        return $dao->lista();
    }
    
    public static function getLivroDiario($id_lancamento){
        $dao = new LivroDiarioDao();
        return $dao->getLivroDiario($id_lancamento);
        
    }
    
    public static function saldo(){
        $dao = new LivroDiarioDao();
        return $dao->somarLancamentos();
    }
    
    
}

