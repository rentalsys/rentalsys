<?php
namespace app\models\service;

use app\models\dao\TreinamentoDao;
use app\models\validacao\TreinamentoValidacao;
use app\util\UtilService;



class TreinamentoService{
    public static function salvar($treinamento, $campo, $tabela){
        
        global $config_upload;
        $validacao = TreinamentoValidacao::salvar($treinamento);
        
        if($validacao->qtdeErro() <=0){
            /// fazendo o upload do arquivo
            if($_FILES["arquivo"]["name"]){
                $treinamento->imagem = UtilService::upload("arquivo", $config_upload);
                if(!$treinamento->imagem){
                    return false;
                }
            }
        }
        return Service::salvar($treinamento, $campo, $validacao->listaErros(), $tabela);
    }
    
    
    public static function listapordata($data1,$data2){
        $dao = new TreinamentoDao();
        return $dao->listapordata($data1,$data2);
    }
    
    public static function lista(){
        $dao = new TreinamentoDao();
        return $dao->lista();
    }
    
    public static function listainstrutor(){
        $dao = new TreinamentoDao();
        return $dao->listainstrutor();
    }
    
    public static function listaiproduto(){
        $dao = new TreinamentoDao();
        return $dao->listaiproduto();
    }
    
    public static function listaHorario(){
        $dao = new TreinamentoDao();
        return $dao->listaHorario();
    }
    
    public static function listaclientes(){
        $dao = new TreinamentoDao();
        return $dao->listaclientes();
    }
    
    public static function listaHorariotreinamento(){
        $dao = new TreinamentoDao();
        return $dao->listaHorariotreinamento();
    }

    public static function filtro($data1,$data2){
        $dao = new TreinamentoDao();
        return $dao->filtro($data1,$data2);
    }
}
