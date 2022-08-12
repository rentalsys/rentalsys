<?php
namespace app\models\service;

use app\models\dao\FornecedorDao;

class FornecedorService{
    public static function salvar($fornecedor, $campo, $tabela){
        $validacao = FornecedorValidacao::salvar($fornecedor);
        return Service::salvar($fornecedor, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaFornecedor(){
        $dao = new FornecedorDao();
        return $dao->listaFornecedor();
        
    }
    
    public static function listaAgendamento(){
        $dao = new FornecedorDao();
        return $dao->listaAgendamento();
        
    }
}

