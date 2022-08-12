<?php
namespace app\models\service;

use app\models\validacao\CategoriaValidacao;

class CategoriaService{
    public static function salvar($marca, $campo, $tabela){
        $validacao = CategoriaValidacao::salvar($marca);
        return Service::salvar($marca, $campo, $validacao->listaErros(), $tabela);
    }
}

