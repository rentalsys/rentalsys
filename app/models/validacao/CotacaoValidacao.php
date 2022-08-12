<?php
namespace app\models\validacao;

use app\core\Validacao;

class CotacaoValidacao{
    public static function salvar($cotacao){
        $validacao = new Validacao();
        
        $validacao->setData("id_produto", $cotacao->id_produto);
        $validacao->setData("id_status_cotacao", $cotacao->id_status_cotacao);
        $validacao->setData("qtde", $cotacao->qtde);
        $validacao->setData("data_cotacao", $cotacao->data_cotacao);

        

        
        //fazendo a validação
        $validacao->getData("id_produto")->isVazio();
        $validacao->getData("id_status_cotacao")->isVazio();
        $validacao->getData("qtde")->isVazio();
        $validacao->getData("data_cotacao")->isVazio();

        
        return $validacao;
        
    }
}

