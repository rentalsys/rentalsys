<?php
namespace app\models\validacao;

use app\core\Validacao;

class ItemordemcompraValidacao{
    public static function salvar($compra_item_ordem_compra){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $itemordemcompra->id_produto);
        $validacao->setData("id_localizacao", $itemordemcompra->id_localizacao);
        $validacao->setData("qtde_itemordemcompra", $itemordemcompra->qtde_itemordemcompra);
        $validacao->setData("valor_itemordemcompra", $itemordemcompra->valor_itemordemcompra);
        $validacao->setData("subtotal_itemordemcompra", $itemordemcompra->subtotal_itemordemcompra);
        $validacao->setData("data_itemordemcompra", $itemordemcompra->data_itemordemcompra);
        

        
        //fazendo a validação 
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_localizacao")->isVazio();
        $validacao->getData("qtde_itemordemcompra")->isVazio();
        $validacao->getData("valor_itemordemcompra")->isVazio();
        $validacao->getData("subtotal_itemordemcompra")->isVazio();
        $validacao->getData("data_itemordemcompra")->isVazio();

        
        return $validacao;
        
    }
}

