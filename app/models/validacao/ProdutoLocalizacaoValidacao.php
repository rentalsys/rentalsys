<?php
namespace app\models\validacao;

use app\core\Validacao;

class ProdutoLocalizacaoValidacao{
    public static function salvar($produtolocalizacao){
        $validacao = new Validacao();
        
        $validacao->setData("id_localizacao", $produtolocalizacao->id_localizacao);
        $validacao->setData("id_produto", $produtolocalizacao->id_produto);
        
        //fazendo a validação
        $validacao->getData("id_localizacao")->isVazio();
        $validacao->getData("id_produto")->isVazio();
        
        return $validacao;
        
    }
}

