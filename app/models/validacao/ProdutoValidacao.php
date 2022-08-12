<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProdutoValidacao{
    public static function salvar($produto){
        $validacao = new Validacao();
        
        $validacao->setData("produto", $produto->produto);
        $validacao->setData("marca", $produto->id_marca);
        $validacao->setData("categoria", $produto->id_categoria);

        
        //fazendo a validação
        $validacao->getData("produto")->isVazio();
        $validacao->getData("marca")->isVazio();
        $validacao->getData("categoria")->isVazio();
        
        return $validacao;
        
    }
}

