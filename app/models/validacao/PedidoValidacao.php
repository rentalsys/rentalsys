<?php
namespace app\models\validacao;

use app\core\Validacao;

class PedidoValidacao{
    public static function salvar($pedido){
        $validacao = new Validacao();
        
        $validacao->setData("cateoria", $pedido->orcamento);

        
        //fazendo a validação
        $validacao->getData("cateoria")->isVazio();

        
        return $validacao;
        
    }
}

