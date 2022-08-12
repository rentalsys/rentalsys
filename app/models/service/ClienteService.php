<?php
namespace app\models\service;

use app\models\validacao\ClienteValidacao;
use app\models\dao\ClienteDao;

class ClienteService{
    public static function salvar($cliente, $campo, $tabela){
        $validacao = ClienteValidacao::salvar($cliente);
        return Service::salvar($cliente, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaCliente(){
        $dao = new ClienteDao();
        return $dao->listaCliente();
        
    }
    
    public static function listaAgendamento(){
        $dao = new ClienteDao();
        return $dao->listaAgendamento();
        
    }
    
}

