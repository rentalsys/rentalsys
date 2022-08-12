<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\AclService;
use app\models\service\EntradaService;
use app\models\service\Service;

class EntradaController extends Controller{
   private $tabela = "entrada";
   private $campo  = "id_entrada";   
   
    public function index(){
       AclService::temPermissao("Entrada-view");
       $dados["lista"] = EntradaService::listaPorData(hoje()); 
       $dados["view"]  = "Entrada/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["entrada"] = Flash::getForm();
        $dados["view"] = "Entrada/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $entrada = Service::get($this->tabela, $this->campo, $id);       
        if(!$entrada){
            $this->redirect(URL_BASE."entrada");
        }
        $dados["lista"] = Service::lista($this->tabela); 
        $dados["entrada"]   = $entrada;
        $dados["view"]      = "Entrada/Create";
        $this->load("template", $dados);
    }
    
    public function inserir(){
        $entrada = new \stdClass();
        $entrada->id_produto            = $_POST["id_produto"];
        $entrada->id_localizacao 		= $_POST['id_localizacao'];
        $entrada->qtde_entrada 		    = $_POST['qtde'];
        $entrada->valor_entrada 		= $_POST['preco'];
        $entrada->subtotal_entrada 		= $entrada->qtde_entrada * $entrada->valor_entrada ;
        $entrada->data_entrada 		    = hoje();
        $entrada->hora_entrada 		    = agora();
      
        
        if(EntradaService::salvar($entrada, $this->campo, $this->tabela)){
            $erro = -1;
            $msg  = Flash::getMsg();
        }else{
            $erro = 1;
            $msg  = Flash::getErro(); 
        }
        $lista = EntradaService::listaPorData(hoje());
        echo json_encode(["erro"=> $erro, "msg"=>$msg, "lista"=>$lista]);
            
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."entrada");
    }
}

