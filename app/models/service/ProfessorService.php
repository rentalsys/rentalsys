<?php
namespace app\models\service;

use app\models\dao\ProfessorDao;
use app\models\validacao\ProfessorValidacao;
use app\util\UtilService;



class ProfessorService{
    public static function salvar($professor, $campo, $tabela){
        
        global $config_upload;
        $validacao = ProfessorValidacao::salvar($professor);
        
        if($validacao->qtdeErro() <=0){
            /// fazendo o upload do arquivo
            if($_FILES["arquivo"]["name"]){
                $professor->imagem = UtilService::upload("arquivo", $config_upload);
                if(!$professor->imagem){
                    return false;
                }
            }
        }
        return Service::salvar($professor, $campo, $validacao->listaErros(), $tabela);
    }
    
    
    public static function listapordata($data1,$data2){
        $dao = new ProfessorDao();
        return $dao->listapordata($data1,$data2);
    }
    
    public static function lista(){
        $dao = new ProfessorDao();
        return $dao->lista();
    }
    
    public static function listainstrutor(){
        $dao = new ProfessorDao();
        return $dao->listainstrutor();
    }
    
    public static function listaiproduto(){
        $dao = new ProfessorDao();
        return $dao->listaiproduto();
    }
    
    public static function listaHorario(){
        $dao = new ProfessorDao();
        return $dao->listaHorario();
    }
    
    public static function listaclientes(){
        $dao = new ProfessorDao();
        return $dao->listaclientes();
    }
    
    public static function listaHorarioprofessor(){
        $dao = new ProfessorDao();
        return $dao->listaHorarioprofessor();
    }

    public static function filtro($data1,$data2){
        $dao = new ProfessorDao();
        return $dao->filtro($data1,$data2);
    }
}
