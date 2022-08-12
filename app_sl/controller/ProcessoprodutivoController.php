<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ProcessoProdutivoService;
use app\models\service\Service;

class ProcessoprodutivoController extends Controller{
   private $tabela = "processo_produtivo";
   private $campo  = "id_processo_produtivo";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Processo_Produtivo/Create";
       $this->load("template", $dados);
    }  
   
    
    public function salvar(){
        $processo_produtivo = new \stdClass();
        $processo_produtivo->id_processo_produtivo        = $_POST["id_processo_produtivo"];
        $processo_produtivo->processo_produtivo 		  = $_POST['processo_produtivo'];
      
        
        Flash::setForm($processo_produtivo);
        ProcessoProdutivoService::salvar($processo_produtivo, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."processoprodutivo");
       
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."processoprodutivo");
    }
}

