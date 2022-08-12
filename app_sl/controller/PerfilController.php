<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\PerfilPermissaoService;
use app\models\service\PerfilService;
use app\models\service\PerfilUsuarioService;
use app\models\service\Service;


class PerfilController extends Controller{
   private $tabela = "perfil";
   private $campo  = "id_perfil";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Perfil/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["perfil"] = Flash::getForm();
        $dados["view"] = "Perfil/Create";
        $this->load("template", $dados);
    }
    public function permissao($id_pefil){
        $perfil = Service::get($this->tabela, $this->campo, $id_pefil);
      
        $dados["perfil"]        = $perfil;
        $dados["permissoes"]    = Service::lista("permissao");
        $dados["lista"]         = PerfilPermissaoService::listaPorPerfil($id_pefil);
        $dados["view"]          = "Perfil/Permissao";
        $this->load("template", $dados);
    }
    
    public function usuario($id_pefil){
        $perfil = Service::get($this->tabela, $this->campo, $id_pefil);
        
        $dados["perfil"]        = $perfil;
        $dados["usuarios"]      = Service::lista("usuario");
        $dados["lista"]         = PerfilUsuarioService::listaPorPerfil($id_pefil);
        $dados["view"]          = "Perfil/Usuario";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $perfil = Service::get($this->tabela, $this->campo, $id);       
        if(!$perfil){
            $this->redirect(URL_BASE."perfil");
        }
        
        $dados["perfil"]   = $perfil;
        $dados["view"]      = "perfil/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $perfil = new \stdClass();
        $perfil->id_perfil          = ($_POST["id_perfil"]) ? $_POST["id_perfil"] : null ;
        $perfil->perfil 		    = $_POST['perfil'];      
        $perfil->descricao 		    = $_POST['descricao'];
        
        Flash::setForm($perfil);
        perfilService::salvar($perfil, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."perfil");
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."perfil");
    }
}

