<?php
namespace app\models\service;

use app\models\validacao\PermissaoValidacao;

class PermissaoService{
    public static function salvar($permissao, $campo, $tabela){
        $validacao = PermissaoValidacao::salvar($permissao);     
        return Service::salvar($permissao, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function temPermissao($permissao){
        //return $user->isAdminMaster() || $user->temUmPerfilDaLista($perm->perfis);
    }
}

