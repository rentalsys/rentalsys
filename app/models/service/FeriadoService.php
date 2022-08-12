<?php
namespace app\models\service;

use app\models\dao\FeriadoDao;
use app\models\validacao\FeriadoValidacao;
use app\util\UtilService;



class FeriadoService{
    public static function salvar($agenda, $campo, $tabela){
        
        global $config_upload;
        $validacao = FeriadoValidacao::salvar($agenda);
        
        if($validacao->qtdeErro() <=0){
            /// fazendo o upload do arquivo
            if($_FILES["arquivo"]["name"]){
                $agenda->imagem = UtilService::upload("arquivo", $config_upload);
                if(!$agenda->imagem){
                    return false;
                }
            }
        }
        return Service::salvar($agenda, $campo, $validacao->listaErros(), $tabela);
    }
    
    
    public static function listapordata($data1,$data2){
        $dao = new FeriadoDao();
        return $dao->listapordata($data1,$data2);
    }
    
    public static function lista(){
        $dao = new FeriadoDao();
        return $dao->lista();
    }
    
    public static function listainstrutor(){
        $dao = new FeriadoDao();
        return $dao->listainstrutor();
    }
    
    
    public static function listaTotal(){
        $dao = new FeriadoDao();
        return $dao->listaTotal();
    }
    
    public static function Concluido(){
        $dao = new FeriadoDao();
        return $dao->Concluido();
    }
    
    public static function Responsavel(){
        $dao = new FeriadoDao();
        return $dao->Responsavel();
    }
    
    public static function Concluidos(){
        $dao = new FeriadoDao();
        return $dao->Concluidos();
    }
    
    public static function Abertos(){
        $dao = new FeriadoDao();
        return $dao->Abertos();
    }
    
    public static function Aconcluir(){
        $dao = new FeriadoDao();
        return $dao->Aconcluir();
    }
    
    public static function listaiproduto(){
        $dao = new FeriadoDao();
        return $dao->listaiproduto();
    }
    
    public static function listaHorario(){
        $dao = new FeriadoDao();
        return $dao->listaHorario();
    }
    
    public static function listaclientes(){
        $dao = new FeriadoDao();
        return $dao->listaclientes();
    }
    
    public static function listaHorarioagenda(){
        $dao = new FeriadoDao();
        return $dao->listaHorarioagenda();
    }

    public static function filtro($data1,$data2){
        $dao = new FeriadoDao();
        return $dao->filtro($data1,$data2);
    }
}
