<?php
namespace app\models\validacao;

use app\core\Validacao;

class FornecedorValidacao{
    public static function salvar($fornecedor){
        $validacao = new Validacao();
        
        $validacao->setData("nome", $fornecedor->nome);
        
        //fazendo a validação
        $validacao->getData("nome")->isVazio();

        return $validacao;
        
    }
    
}

