<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ContaService;
use app\models\service\DespesaService;
use app\models\service\Service;

class DespesaController extends Controller{
    private $tabela = "fin_despesa";
    private $campo  ="id_despesa";
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["contas"] = ContaService::listaContasDespesa(); 
        $dados["view"] ="Despesa/Create";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["contas"] = ContaService::listaContasDespesa();    
        $dados["view"] ="Despesa/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $despesa = Service::get($this->tabela,$this->campo, $id);
        if(!$despesa){
            $this->redirect(URL_BASE."despesa");
        }       
        
        $dados["despesas"] = DespesaService::lista("S");
        $dados["despesa"] = $despesa;
        $dados["view"] ="Despesa/Create";
        $this->load("template", $dados);
        
    }
    
   
    public function salvar(){
        $despesa = new \stdClass();
        $despesa->id_despesa            =  null;
        $despesa->id_conta 	            = $_POST['id_conta'];
        $despesa->despesa 	            = $_POST['despesa'];
           
        Flash::setForm($despesa);
        DespesaService::salvar($despesa, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."despesa");
        
    }
    
    
    public function excluir($id){       
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."despesa");
    }
    
  
}

