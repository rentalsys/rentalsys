<?php
namespace app\models\validacao;

use app\core\Validacao;

class ItemordemcompraValidacao{
    public static function salvar($itemordemcompra){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $itemordemcompra->id_produto);
        $validacao->setData("id_ordem_compra", $itemordemcompra->id_ordem_compra);
        $validacao->setData("qtde", $itemordemcompra->qtde);
        $validacao->setData("valor", $itemordemcompra->valor);
        $validacao->setData("subtotal", $itemordemcompra->subtotal);
        
        //fazendo a validação 
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_ordem_compra")->isVazio();
        $validacao->getData("qtde")->isVazio();
        $validacao->getData("valor")->isVazio();
        
        return $validacao;
        
    }
}

