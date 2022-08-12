<?php
namespace app\models\service;

use app\models\validacao\PerfilValidacao;


class PerfilService{
    public static function salvar($perfil, $campo, $tabela){
        $validacao = PerfilValidacao::salvar($perfil);     
        return Service::salvar($perfil, $campo, $validacao->listaErros(), $tabela);
    }
}

