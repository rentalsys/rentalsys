<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;
use app\models\service\TipoMovimentoService;

class TipomovimentoController extends Controller{
   private $tabela = "tipo_movimento";
   private $campo  = "id_tipo_movimento";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Tipo_Movimento/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["tipo_movimento"] = Flash::getForm();
        $dados["view"] = "Tipo_Movimento/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $tipo_movimento = Service::get($this->tabela, $this->campo, $id);       
        if(!$tipo_movimento){
            $this->redirect(URL_BASE."tipomovimento");
        }
        
        $dados["tipo_movimento"]   = $tipo_movimento;
        $dados["view"]      = "Tipo_Movimento/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $tipo_movimento = new \stdClass();
        $tipo_movimento->id_tipo_movimento        = $_POST["id_tipo_movimento"];
        $tipo_movimento->tipo_movimento 		  = $_POST['tipo_movimento'];
        $tipo_movimento->ent_sai 		          = $_POST['ent_sai'];
        $tipo_movimento->movimenta_estoque 		  = $_POST['movimenta_estoque'];
     
        
        Flash::setForm($tipo_movimento);
        if(TipoMovimentoService::salvar($tipo_movimento, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."tipomovimento");
        }else{
            if(!$tipo_movimento->id_tipo_movimento){
                $this->redirect(URL_BASE."tipomovimento/create");
            }else{
                $this->redirect(URL_BASE."tipomovimento/edit/".$tipo_movimento->id_tipo_movimento);
            }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."tipomovimento");
    }
}

