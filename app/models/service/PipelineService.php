<?php
namespace app\models\service;

use app\models\validacao\PipelineValidacao;
use app\models\dao\PipelineDao;

class PipelineService{
    public static function salvar($pedido, $campo, $tabela){
        $validacao = PipelineValidacao::salvar($marca);
        return Service::salvar($orcamento, $campo, $validacao->listaErros(), $tabela);
    }
    
    public static function aguardando(){
        $dao = new PipelineDao();
        return $dao->aguardando();
    }
    
    public static function aprovado(){
        $dao = new PipelineDao();
        return $dao->aprovado();
    }
    
    public static function enviado(){
        $dao = new PipelineDao();
        return $dao->enviado();
    }
    
    public static function assinado(){
        $dao = new PipelineDao();
        return $dao->assinado();
    }
    
    public static function faturado(){
        $dao = new PipelineDao();
        return $dao->faturado();
    }
    
    public static function lista(){
        $dao = new PipelineDao();
        return $dao->lista();
    }
    
    public static function getPipeline($id_pedido){
        $dao = new PipelineDao();
        return $dao->getPipeline($id_pedido);
    }
    
    public static function getPipelineItem($id_pedido){
        $dao = new PipelineDao();
        return $dao->getPipelineItem($id_pedido);
    }
}

