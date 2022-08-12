<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ContaService;
use app\models\service\Service;

class ContaController extends Controller{
   private $tabela = "contabil_conta";
   private $campo  = "id_conta";   
   
    public function index(){
       $dados["lista"]      = ContaService::lista(); 
       $dados["sinteticas"] = Service::get($this->tabela,"tipo","S", true);
       $dados["view"]       = "Conta/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["conta"] = Flash::getForm();
        $dados["produtos"] = Service::lista("produto");
        $dados["lista"] = ContaService::lista(); 
        $dados["locais"]   = Service::lista("localizacao");
        $dados["view"] = "Conta/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $conta = Service::get($this->tabela, $this->campo, $id);       
        if(!$conta){
            $this->redirect(URL_BASE."produtolocalizacao");
        }
        $dados["lista"]     = ContaService::lista(); 
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"]   = Service::lista("localizacao");
        $dados["conta"]   = $conta;
        $dados["view"]      = "produtolocalizacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $conta = new \stdClass();
        $conta->id_conta        = ($_POST["id_conta"]) ? $_POST["id_conta"] : null;
        $conta->codigo 		    = $_POST['codigo'];           
        $conta->conta 	        = $_POST['conta'];
        $conta->alias 	        = $_POST['alias'];
        $conta->id_pai 	        = $_POST['id_pai'];
        $conta->tipo 	        = (strlen($conta->codigo) > 10) ? "A" : "S";
       
        if(!$conta->id_pai){
            $conta->codigo = ContaService::proximoPai();
            $conta->id_pai = null;
        }
        Flash::setForm($conta);
        ContaService::salvar($conta, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."conta");        
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."produtolocalizacao");
    }
    
    public function proximoCodigo($codigo_pai){
        $codigo = ContaService::proximoCodigo($codigo_pai);
        echo json_encode($codigo);
    }
    
   
    
}

