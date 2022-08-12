<?php
namespace app\models\validacao;

use app\core\Validacao;

class ItemOrdemCompraValidacao{
    public static function salvar($item_ordem_compra){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $item_ordem_compra->id_produto);
        $validacao->setData("id_ordem_compra", $item_ordem_compra->id_ordem_compra);
        $validacao->setData("qtde", $item_ordem_compra->qtde);
        $validacao->setData("valor", $item_ordem_compra->valor);
        $validacao->setData("subtotal", $item_ordem_compra->subtotal);
        
        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_ordem_compra")->isVazio();
        $validacao->getData("qtde")->isVazio();
        $validacao->getData("valor")->isVazio();
        $validacao->getData("subtotal")->isVazio();
        
        return $validacao;
        
    }
}

