<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\LancamentoPagarService;
use app\models\service\Service;


class LancamentopagarController extends Controller{
   private $tabela = "fin_lancamento_pagar";
   private $campo  = "id_lancamento_pagar";   
   
    public function index(){
       $dados["lista"] = LancamentoPagarService::lista(); 
       $dados["view"]  = "LancamentoPagar/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["categoria"] = Flash::getForm();
        $dados["view"] = "LancamentoPagar/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $categoria = Service::get($this->tabela, $this->campo, $id);       
        if(!$categoria){
            $this->redirect(URL_BASE."categoria");
        }
        
        $dados["categoria"]   = $categoria;
        $dados["view"]      = "LancamentoPagar/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $categoria = new \stdClass();
        $categoria->id_categoria        = $_POST["id_categoria"];
        $categoria->categoria 		    = $_POST['categoria'];      
        
        Flash::setForm($categoria);
        if(LancamentoPagarService::salvar($categoria, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."categoria");
        }else{
            if(!$categoria->id_categoria){
                $this->redirect(URL_BASE."categoria/create");
            }else{
                $this->redirect(URL_BASE."categoria/edit/".$categoria->id_categoria);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."categoria");
    }
}

