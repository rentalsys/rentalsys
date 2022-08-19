<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\NfeService;
use app\models\service\NotaFiscalService;
use app\core\Flash;

class NfeController extends Controller{
    public function gerarNfe($id_nfe){
        $notafiscal = NotaFiscalService::getNotaFiscal($id_nfe);     
        $xml = NfeService::gerarxml($notafiscal);  
        if($xml->erro>0){
            Flash::setErro([$xml->msg_erro]);
        }else{
            Flash::setMsg($xml->msg);
        }
        $this->redirect(URL_BASE ."notafiscal");
    }  
    
    public function assinarNfe($id_nfe){
        $notafiscal = NotaFiscalService::getNotaFiscal($id_nfe);
        $xml = NfeService::assinarxml($notafiscal);
        if($xml->erro>0){
            Flash::setErro([$xml->msg_erro]);
        }else{
            Flash::setMsg($xml->msg);
        }
        $this->redirect(URL_BASE ."notafiscal");
    } 
    public function enviarNfe($id_nfe){
        $notafiscal = NotaFiscalService::getNotaFiscal($id_nfe);
        $xml = NfeService::enviarxml($notafiscal);
        if($xml->erro>0){
            Flash::setErro([$xml->msg_erro]);
        }else{
            Flash::setMsg($xml->msg);
        }
        $this->redirect(URL_BASE ."notafiscal");
    } 
    
    public function autorizarNfe($id_nfe){
        $notafiscal = NotaFiscalService::getNotaFiscal($id_nfe);
        $xml        = NfeService::autorizarxml($notafiscal); 
        if($xml->erro>0){
            Flash::setErro([$xml->msg_erro]);
        }else{
            Flash::setMsg($xml->msg);
        }
        $this->redirect(URL_BASE ."notafiscal");
    }
    
    public function danfe($id_nfe){
        $notafiscal = NotaFiscalService::getNotaFiscal($id_nfe);
        $xml = NfeService::danfe($notafiscal);
        
    }
    
}

