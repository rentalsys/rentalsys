<?php
namespace app\models\validacao;

use app\core\Validacao;
use app\models\service\Service;

class EmpresaValidacao{
    public static function salvar($empresa){
        $validacao = new Validacao();
        
        $validacao->setData("razao_social", $empresa->razao_social);
        $validacao->setData("nome_fantasia", $empresa->nome_fantasia);
        $validacao->setData("cnpj", $empresa->cnpj);
        $validacao->setData("cep", $empresa->cep);
        $validacao->setData("logradouro", $empresa->logradouro);
        $validacao->setData("numero", $empresa->numero);
        $validacao->setData("bairro", $empresa->bairro);
        $validacao->setData("ibge", $empresa->ibge);
        $validacao->setData("regime_tributario", $empresa->regime_tributario);
        $validacao->setData("email", $empresa->email);
        
        //fazendo a validação
        $validacao->getData("razao_social")->isVazio();
        $validacao->getData("nome_fantasia")->isVazio();
        $validacao->getData("cnpj")->isVazio()->isCNPJ();
        $validacao->getData("cep")->isVazio();
        $validacao->getData("logradouro")->isVazio();
        $validacao->getData("numero")->isVazio();
        $validacao->getData("bairro")->isVazio();
        $validacao->getData("ibge")->isVazio();
        $validacao->getData("regime_tributario")->isVazio();
        $validacao->getData("email")->isVazio()->isEmail();
        return $validacao;
        
    }
}

