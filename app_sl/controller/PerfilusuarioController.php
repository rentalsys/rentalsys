<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\PerfilUsuarioService;
use app\models\service\Service;


class PerfilusuarioController extends Controller{
   private $tabela = "perfil_usuario";
   private $campo  = "id_perfil_usuario";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Permissao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["perfilusuario"] = Flash::getForm();
        $dados["view"] = "Permissao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $perfilusuario = Service::get($this->tabela, $this->campo, $id);       
        if(!$perfilusuario){
            $this->redirect(URL_BASE."perfilusuario");
        }
        
        $dados["perfilusuario"]   = $perfilusuario;
        $dados["view"]      = "perfilusuario/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $perfilusuario = new \stdClass();
        $perfilusuario->id_perfil_usuario   = ($_POST["id_perfil_usuario"]) ? $_POST["id_perfil_usuario"] : null ;
        $perfilusuario->id_perfil 		    = $_POST['id_perfil'];      
        $perfilusuario->id_usuario 		    = $_POST['id_usuario'];
        
        Flash::setForm($perfilusuario);
        PerfilUsuarioService::salvar($perfilusuario, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."perfil/usuario/".$perfilusuario->id_perfil);
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."perfilusuario");
    }
}

