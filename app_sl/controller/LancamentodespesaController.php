<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\LancamentoDespesaService;
use app\models\service\Service;


class LancamentodespesaController extends Controller{
   private $tabela = "fin_lancamento_despesa";
   private $campo  = "id_lancamento_despesa";   
   
    public function index(){
       $dados["despesas"]   = Service::lista("fin_despesa");
       $dados["fornecedores"]   = Service::get("contato","eh_fornecedor","S",true) ;
       $dados["lista"]      = LancamentoDespesaService::lista(); 
       $dados["view"]       = "LancamentoDespesa/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["categoria"] = Flash::getForm();
        $dados["view"] = "LancamentoDespesa/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $categoria = Service::get($this->tabela, $this->campo, $id);       
        if(!$categoria){
            $this->redirect(URL_BASE."categoria");
        }
        
        $dados["categoria"]   = $categoria;
        $dados["view"]      = "LancamentoDespesa/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $lancamento = new \stdClass();
        $lancamento->id_lancamento_despesa  = NULL;
        $lancamento->id_despesa 		    = $_POST['id_despesa'];  
        $lancamento->id_fornecedor 	        = $_POST['id_fornecedor']; 
        $lancamento->valor 		            = $_POST['valor']; 
        $lancamento->data_lancamento        = hoje(); 
        $lancamento->data_vencimento        = $_POST['data_vencimento']; 
        $lancamento->pago 		            = $_POST['pago'];
        
        Flash::setForm($lancamento);
        LancamentoDespesaService::salvar($lancamento, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."lancamentodespesa");
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."categoria");
    }
}

