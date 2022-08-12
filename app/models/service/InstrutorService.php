<?php
namespace app\models\service;

use app\models\dao\InstrutorDao;
use app\models\validacao\InstrutorValidacao;
use app\util\UtilService;



class InstrutorService{
    public static function salvar($instrutor, $campo, $tabela){
        
        global $config_upload;
        $validacao = InstrutorValidacao::salvar($instrutor);
        
        if($validacao->qtdeErro() <=0){
            /// fazendo o upload do arquivo
            if($_FILES["arquivo"]["name"]){
                $instrutor->imagem = UtilService::upload("arquivo", $config_upload);
                if(!$instrutor->imagem){
                    return false;
                }
            }
        }
        return Service::salvar($instrutor, $campo, $validacao->listaErros(), $tabela);

    }

    public static function lista(){
        $dao = new InstrutorDao();
        return $dao->lista();
    }
    
    public static function listainstrutor(){
        $dao = new InstrutorDao();
        return $dao->listainstrutor();
    }
    
    public static function listaHorario(){
        $dao = new InstrutorDao();
        return $dao->listaHorario();
    }
    
    public static function listaclientes(){
        $dao = new InstrutorDao();
        return $dao->listaclientes();
    }
    
    public static function listaHorariotreinamento(){
        $dao = new InstrutorDao();
        return $dao->listaHorariotreinamento();
    }

    public static function filtro($filtro){
        $dao = new InstrutorDao();
        return $dao->filtro($filtro);
    }
}
