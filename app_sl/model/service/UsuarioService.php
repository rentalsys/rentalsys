<?php
namespace app\models\service;

use app\models\validacao\UsuarioValidacao;

class UsuarioService{
    public static function salvar($usuario, $campo, $tabela){
        $validacao = UsuarioValidacao::salvar($usuario);
        return Service::salvar($usuario, $campo, $validacao->listaErros(), $tabela);
     }
     
     //Verifica se o perfil existe
     public static function perfilExiste($perfil) {         
         return Service::get("perfil","perfil",$perfil);
     }
     
     //verifica se o usuário é admin
     public static function isAdmin(){
         return self::perfilExiste('Admin');
     }
    
}

