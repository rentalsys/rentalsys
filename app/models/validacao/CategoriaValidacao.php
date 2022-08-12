<?php
namespace app\models\validacao;

use app\core\Validacao;

class CategoriaValidacao{
    public static function salvar($categoria){
        $validacao = new Validacao();
        
        $validacao->setData("cateoria", $categoria->categoria);

        
        //fazendo a validação
        $validacao->getData("cateoria")->isVazio();

        
        return $validacao;
        
    }
}

