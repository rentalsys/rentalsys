<?php
namespace app\models\validacao;

use app\core\Validacao;

class LocalizacaoValidacao{
    public static function salvar($localizacao){
        $validacao = new Validacao();
        
        $validacao->setData("localizacao", $localizacao->localizacao);
        $validacao->setData("cep_unidade", $localizacao->cep_unidade);
        $validacao->setData("rua_unidade", $localizacao->rua_unidade);
        $validacao->setData("numero_unidade", $localizacao->numero_unidade);
        $validacao->setData("bairro_unidade", $localizacao->bairro_unidade);
        $validacao->setData("cidade_unidade", $localizacao->cidade_unidade);
        $validacao->setData("uf_unidade", $localizacao->uf_unidade);
        $validacao->setData("galpao", $localizacao->galpao);
        
        //fazendo a validação
        $validacao->getData("localizacao")->isVazio();
        $validacao->getData("cep_unidade")->isVazio();
        $validacao->getData("rua_unidade")->isVazio();
        $validacao->getData("numero_unidade")->isVazio();
        $validacao->getData("bairro_unidade")->isVazio();
        $validacao->getData("cidade_unidade")->isVazio();
        $validacao->getData("uf_unidade")->isVazio();
        $validacao->getData("galpao")->isVazio();
        
        return $validacao;
        
    }
}

