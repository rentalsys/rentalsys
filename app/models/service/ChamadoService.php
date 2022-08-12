<?php
namespace app\models\service;

use app\models\dao\ChamadoDao;
use app\models\validacao\ChamadoValidacao;
use app\util\UtilService;



class ChamadoService{
    public static function salvar($chamado, $campo, $tabela){
        
        global $config_upload;
        $validacao = ChamadoValidacao::salvar($chamado);
        
        if($validacao->qtdeErro() <=0){
            /// fazendo o upload do arquivo
            if($_FILES["arquivo"]["name"]){
                $chamado->imagem = UtilService::upload("arquivo", $config_upload);
                if(!$chamado->imagem){
                    return false;
                }
            }
        }
        return Service::salvar($chamado, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function listaTotalData($data1,$data2){
        $dao = new ChamadoDao();
        return $dao->listaTotalData($data1,$data2);
    }
    
    public static function lista($data1,$data2){
        $dao = new ChamadoDao();
        return $dao->lista($data1,$data2);
    }
    
    public static function listaTotal(){
        $dao = new ChamadoDao();
        return $dao->listaTotal();
    }
    
    public static function listaclientes(){
        $dao = new ChamadoDao();
        return $dao->listaclientes();
    }    
    
    public static function listachamados(){
        $dao = new ChamadoDao();
        return $dao->listachamados();
    }   
    
    public static function listaAbertos(){
        $dao = new ChamadoDao();
        return $dao->listaAbertos();
    }
    public static function listaFechados(){
        $dao = new ChamadoDao();
        return $dao->listaFechados();
    }
    
    public static function listast(){
        $dao = new ChamadoDao();
        return $dao->listast();
    }    
    
    public static function listaitens($id){
        $dao = new ChamadoDao();
        return $dao->listaitens($id);
    }
    
    public static function listaanexo($id){
        $dao = new ChamadoDao();
        return $dao->listaanexo($id);
    }
    
    //somatorias
    
    public static function somas(){
        $dao = new ChamadoDao();
        return $dao->somas();
    }
    //salvando item
    
    public static function salvaritem($chamadoitem, $campo, $tabela){
    
        return Service::salvaritem($chamadoitem, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function filtro($filtro,$data1,$data2){
        $dao = new ChamadoDao();
        return $dao->filtro($filtro,$data1,$data2);
    }
}
