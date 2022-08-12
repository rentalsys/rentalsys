<?php
namespace app\models\validacao;

use app\core\Validacao;

class SaidaValidacao{
    public static function salvar($saida){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $saida->id_produto);
        $validacao->setData("id_localizacao", $saida->id_localizacao);
        $validacao->setData("qtde_saida", $saida->qtde_saida);
        $validacao->setData("valor_saida", $saida->valor_saida);
        $validacao->setData("subtotal_saida", $saida->subtotal_saida);
        $validacao->setData("data_saida", $saida->data_saida);
        

        
        //fazendo a validação 
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_localizacao")->isVazio();
        $validacao->getData("qtde_saida")->isVazio();
        $validacao->getData("valor_saida")->isVazio();
        $validacao->getData("subtotal_saida")->isVazio();
        $validacao->getData("data_saida")->isVazio();

        
        return $validacao;
        
    }
}

