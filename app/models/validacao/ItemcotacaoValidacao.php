<?php
namespace app\models\validacao;

use app\core\Validacao;

class ItemcotacaoValidacao{
    public static function salvar($ItemCotacao){
        $validacao = new Validacao();
        
        $validacao->setData("cateoria", $ItemCotacao->ItemCotacao);

        
        //fazendo a validação
        $validacao->getData("cateoria")->isVazio();

        
        return $validacao;
        
    }
}

