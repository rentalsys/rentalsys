<?php
namespace app\models\validacao;

use app\core\Validacao;

class MarcaValidacao{
    public static function salvar($marca){
        $validacao = new Validacao();
        
        $validacao->setData("nome", $marca->marca);
        
        //fazendo a validação
        $validacao->getData("marca")->isVazio();
        
        return $validacao;
        
    }
}

