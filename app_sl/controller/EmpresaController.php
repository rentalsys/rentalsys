<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\EmpresaService;
use app\models\service\Service;

class EmpresaController extends Controller{
   private $tabela = "empresa";
   private $campo  = "id_empresa";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Empresa/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["empresa"] = Flash::getForm();
        $dados["view"] = "Empresa/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $empresa = Service::get($this->tabela, $this->campo, $id);       
        if(!$empresa){
            $this->redirect(URL_BASE."empresa");
        }
        
        $dados["empresa"]   = $empresa;
        $dados["view"]      = "Empresa/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $empresa = new \stdClass();
        $empresa->id_empresa 	        = ($_POST["id_empresa"]) ? $_POST["id_empresa"] : null ;
        $empresa->razao_social 	        = $_POST['razao_social'];
        $empresa->nome_fantasia         = $_POST['nome_fantasia'];
        $empresa->cnpj 		            = tira_mascara($_POST['cnpj']);
        $empresa->ie 		            = $_POST['ie'];
        $empresa->im 		            = $_POST['im'];
        $empresa->fone 		            = tira_mascara($_POST['fone']);
        $empresa->email 	            = $_POST['email'];
        $empresa->email_contabilidade   = $_POST['email_contabilidade'];
        $empresa->cep 	                = tira_mascara($_POST['cep']);
        $empresa->logradouro 	        = $_POST['logradouro'];
        $empresa->numero 	            = $_POST['numero'];
        $empresa->bairro 	            = $_POST['bairro'];
        $empresa->complemento 	        = $_POST['complemento'];
        $empresa->uf 	                = $_POST['uf'];
        $empresa->cidade 	            = $_POST['cidade'];
        $empresa->ibge 	                = $_POST['ibge'];
        $empresa->cnae 	                = $_POST['cnae'];
        $empresa->regime_tributario     = $_POST['regime_tributario'];
        $empresa->ultima_atualizacao     = $_POST['ultima_atualizacao'];
    
        Flash::setForm($empresa);
        if(EmpresaService::salvar($empresa, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."empresa");
        }else{
            if(!$empresa->id_empresa){
                $this->redirect(URL_BASE."empresa/create");
            }else{
                $this->redirect(URL_BASE."empresa/edit/".$empresa->id_empresa);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."empresa");
    }
}

