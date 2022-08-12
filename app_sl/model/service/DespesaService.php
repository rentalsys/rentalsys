<?php
namespace app\models\service;

use app\models\validacao\DespesaValidacao;

class DespesaService{
    public static function salvar($categoria, $campo, $tabela){
        $validacao = DespesaValidacao::salvar($categoria);     
        return Service::salvar($categoria, $campo, $validacao->listaErros(), $tabela);
    }
}

