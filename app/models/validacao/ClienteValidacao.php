<?php
namespace app\models\validacao;

use app\core\Validacao;

class ClienteValidacao{
    public static function salvar($cliente){
        $validacao = new Validacao();
        
        $validacao->setData("nome", $cliente->nome);
        $validacao->setData("celular", $cliente->celular);
        $validacao->setData("email", $cliente->email);
        
        //fazendo a validação
        $validacao->getData("nome")->isVazio();
        $validacao->getData("celular")->isVazio();
        $validacao->getData("email")->isVazio()->isEmail();
        
        return $validacao;
        
    }
    
}

