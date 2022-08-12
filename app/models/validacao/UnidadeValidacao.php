<?php
namespace app\models\validacao;

use app\core\Validacao;

class UnidadeValidacao{
    public static function salvar($unidade){
        $validacao = new Validacao();
        
        $validacao->setData("nome", $unidade->unidade);
        
        //fazendo a validação
        $validacao->getData("unidade")->isVazio();
        
        return $validacao;
        
    }
}

