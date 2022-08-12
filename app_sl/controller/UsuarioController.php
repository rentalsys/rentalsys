<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\UsuarioService;
use app\models\service\Service;


class UsuarioController extends Controller{
   private $tabela = "usuario";
   private $campo  = "id_usuario";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Usuario/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["usuario"]   = Flash::getForm();
        $dados["perfis"]    = Service::lista("perfil");
        $dados["view"]      = "Usuario/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $usuario = Service::get($this->tabela, $this->campo, $id);       
        if(!$usuario){
            $this->redirect(URL_BASE."usuario");
        }
        
        $dados["usuario"]   = $usuario;
        $dados["view"]      = "Usuario/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $usuario = new \stdClass();
        $usuario->id_usuario        = ($_POST["id_usuario"]) ? $_POST["id_usuario"] : null ;
        $usuario->usuario 		    = $_POST['usuario'];
        $usuario->email 		    = $_POST['email'];
        $usuario->senha 		    = $_POST['senha'];
        
        Flash::setForm($usuario);
        if(UsuarioService::salvar($usuario, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."usuario");
        }else{
            if(!$usuario->id_usuario){
                $this->redirect(URL_BASE."usuario/create");
            }else{
                $this->redirect(URL_BASE."usuario/edit/".$usuario->id_usuario);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."usuario");
    }
}

