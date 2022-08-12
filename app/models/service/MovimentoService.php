<?php
namespace app\models\service;

use app\models\dao\MovimentoDao;

class MovimentoService{
    public static function saldoEstoque($id_produto){
        $dao = new MovimentoDao();
        return $dao->saldoEstoque($id_produto);
    }
    
    public static function listaMovimento(){
        $dao = new MovimentoDao();
        return $dao->listaMovimento();
    }
    
    public static function filtro($filtro){
        $dao = new MovimentoDao();
        return $dao->filtro($filtro);
    }
}

