<?php
namespace app\models\service;

use app\models\dao\PerfilUsuarioDao;
use app\models\validacao\PerfilUsuarioValidacao;

class PerfilUsuarioService{
    public static function salvar($categoria, $campo, $tabela){
        $validacao = PerfilUsuarioValidacao::salvar($categoria);     
        return Service::salvar($categoria, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaPorPerfil($id_perfil){
        $dao = new PerfilUsuarioDao();
        return $dao->listaPorPerfil($id_perfil);
    }
    
    public static function listaPerfilPorUsuario($id_usuario){
        $dao = new PerfilUsuarioDao();
        return $dao->listaPerfilPorUsuario($id_usuario);
    }
}

