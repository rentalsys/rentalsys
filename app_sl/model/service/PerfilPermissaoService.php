<?php
namespace app\models\service;

use app\models\dao\PerfilPermissaoDao;
use app\models\validacao\PerfilPermissaoValidacao;

class PerfilPermissaoService{
    public static function salvar($categoria, $campo, $tabela){
        $validacao = PerfilPermissaoValidacao::salvar($categoria);     
        return Service::salvar($categoria, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaPorPerfil($id_perfil){
        $dao = new PerfilPermissaoDao();
        return $dao->listaPorPerfil($id_perfil);
    }
    
   
    
   
}

