<?php
namespace app\models\service;

use app\models\validacao\LocalizacaoValidacao;

class LocalizacaoService{
    public static function salvar($localizacao, $campo, $tabela){
        $validacao = LocalizacaoValidacao::salvar($localizacao);     
        return Service::salvar($localizacao, $campo, $validacao->listaErros(), $tabela);
    }
}

