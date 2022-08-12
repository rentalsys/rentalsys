<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ContaService;
use app\models\service\LivroDiarioService;
use app\models\service\Service;

class LivrodiarioController extends Controller{
    private $tabela = "livro_diario";
    private $campo  ="id_livro_diario";
    
    public function index(){
        $dados["lista"] = LivroDiarioService::lista();
        $dados["view"] ="LivroDiario/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["contas"] = ContaService::lista($this->id_plano_conta,"A");
        $dados["view"] ="LivroDiario/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $livro_diario = Service::get($this->tabela,$this->campo, $id);
        if(!$livro_diario){
            $this->redirect(URL_BASE."livrodiario");
        }       
        
        $dados["livro_diarios"] = LivroDiarioService::lista("S");
        $dados["livro_diario"] = $livro_diario;
        $dados["view"] ="LivroDiario/Create";
        $this->load("template", $dados);
        
    }
    
   
    public function salvar(){
        $livro_diario = new \stdClass();
        $livro_diario->id_livro_diario        =  null;
        $livro_diario->id_conta_debito 	      = $_POST['id_conta_debito'];
        $livro_diario->id_conta_credito 	  = $_POST['id_conta_credito'];
        $livro_diario->data 	              = $_POST['data'];
        $livro_diario->valor 	              = $_POST['valor'];
        $livro_diario->historico 	          = $_POST['historico'];
           
        Flash::setForm($livro_diario);
        if(LivroDiarioService::salvar($livro_diario, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."livrodiario");
        }else{
            $this->redirect(URL_BASE."livrodiario/create");
        }
    }
    
    
    public function excluir($id){       
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."livrodiario");
    }
    
  
}

