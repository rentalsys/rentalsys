<?php
namespace app\models\service;

use app\models\validacao\EmpresaValidacao;

class EmpresaService{
    public static function salvar($empresa, $campo, $tabela){
        $validacao = EmpresaValidacao::salvar($empresa);     
        return Service::salvar($empresa, $campo, $validacao->listaErros(), $tabela);
    }
}

