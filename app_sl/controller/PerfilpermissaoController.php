<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\PerfilPermissaoService;
use app\models\service\Service;


class PerfilpermissaoController extends Controller{
   private $tabela = "perfil_permissao";
   private $campo  = "id_perfil_permissao";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Permissao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["perfilpermissao"] = Flash::getForm();
        $dados["view"] = "Permissao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $perfilpermissao = Service::get($this->tabela, $this->campo, $id);       
        if(!$perfilpermissao){
            $this->redirect(URL_BASE."perfilpermissao");
        }
        
        $dados["perfilpermissao"]   = $perfilpermissao;
        $dados["view"]      = "perfilpermissao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $perfilpermissao = new \stdClass();
        $perfilpermissao->id_perfil_permissao        = ($_POST["id_perfil_permissao"]) ? $_POST["id_perfil_permissao"] : null ;
        $perfilpermissao->id_perfil 		    = $_POST['id_perfil'];      
        $perfilpermissao->id_permissao 		    = $_POST['id_permissao'];
        
        Flash::setForm($perfilpermissao);
        perfilpermissaoService::salvar($perfilpermissao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."perfil/permissao/".$perfilpermissao->id_perfil);
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."perfilpermissao");
    }
}

