<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\PerfilPermissaoService;
use app\models\service\PermissaoService;
use app\models\service\Service;
use app\util\UtilService;


class PermissaoController extends Controller{
   private $tabela = "permissao";
   private $campo  = "id_permissao";  
   
   public function __construct(){
       $this->usuario = UtilService::getUsuario();
       if(!$this->usuario){
           $this->redirect(URL_BASE ."login");
           exit;
       }
   }
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Permissao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["permissao"] = Flash::getForm();
        $dados["view"] = "Permissao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $permissao = Service::get($this->tabela, $this->campo, $id);       
        if(!$permissao){
            $this->redirect(URL_BASE."permissao");
        }
        
        $dados["permissao"]   = $permissao;
        $dados["view"]      = "permissao/Create";
        $this->load("template", $dados);
    }
    
    public function show(){
        $dados["permissoes"]    = $this->usuario->permissoes;
        $dados["view"]          = "permissao/Show";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $permissao = new \stdClass();
        $permissao->id_permissao        = ($_POST["id_permissao"]) ? $_POST["id_permissao"] : null ;
        $permissao->permissao 		    = $_POST['permissao'];      
        $permissao->descricao 		    = $_POST['descricao'];
        
        Flash::setForm($permissao);
        permissaoService::salvar($permissao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."permissao");
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."permissao");
    }
}

