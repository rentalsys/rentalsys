<?php
namespace app\models\service;

use app\models\dao\AgendaDao;
use app\models\validacao\AgendaValidacao;
use app\util\UtilService;



class AgendaService{
    public static function salvar($agenda, $campo, $tabela){
        
        global $config_upload;
        $validacao = AgendaValidacao::salvar($agenda);
        
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
        $dao = new AgendaDao();
        return $dao->listapordata($data1,$data2);
    }
    
    public static function lista(){
        $dao = new AgendaDao();
        return $dao->lista();
    }
    
    public static function meses(){
        $dao = new AgendaDao();
        return $dao->meses();
    }
    
    public static function meses5(){
        $dao = new AgendaDao();
        return $dao->meses5();
    }
    
    public static function meses6(){
        $dao = new AgendaDao();
        return $dao->meses6();
    }
    
    public static function meses17(){
        $dao = new AgendaDao();
        return $dao->meses17();
    }
    
    
    public static function listainstrutor(){
        $dao = new AgendaDao();
        return $dao->listainstrutor();
    }
    
    
    public static function listaTotal(){
        $dao = new AgendaDao();
        return $dao->listaTotal();
    }
    
    public static function Concluido(){
        $dao = new AgendaDao();
        return $dao->Concluido();
    }
    
    public static function Eventos(){
        $dao = new AgendaDao();
        return $dao->Eventos();
    }
    
    public static function Responsavel(){
        $dao = new AgendaDao();
        return $dao->Responsavel();
    }
    
    public static function ResponsavelSemana(){
        $dao = new AgendaDao();
        return $dao->ResponsavelSemana();
    }
    
    public static function Concluidos(){
        $dao = new AgendaDao();
        return $dao->Concluidos();
    }
    
    public static function Abertos(){
        $dao = new AgendaDao();
        return $dao->Abertos();
    }
    
    public static function Aconcluir(){
        $dao = new AgendaDao();
        return $dao->Aconcluir();
    }
    
    public static function listaiproduto(){
        $dao = new AgendaDao();
        return $dao->listaiproduto();
    }
    
    public static function listaHorario(){
        $dao = new AgendaDao();
        return $dao->listaHorario();
    }
    
    public static function listaclientes(){
        $dao = new AgendaDao();
        return $dao->listaclientes();
    }
    
    public static function listaHorarioagenda(){
        $dao = new AgendaDao();
        return $dao->listaHorarioagenda();
    }

    public static function filtro($data1,$data2){
        $dao = new AgendaDao();
        return $dao->filtro($data1,$data2);
    }
}
