<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\SaidaService;
use app\models\service\Service;

class SaidaController extends Controller{
   private $tabela = "saida";
   private $campo  = "id_saida";   
   
    public function index(){
       $dados["lista"] = SaidaService::listaPorData(hoje()); 
       $dados["view"]  = "Saida/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["saida"] = Flash::getForm();
        $dados["view"] = "Saida/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $saida = Service::get($this->tabela, $this->campo, $id);       
        if(!$saida){
            $this->redirect(URL_BASE."saida");
        }
        $dados["lista"] = Service::lista($this->tabela); 
        $dados["saida"]   = $saida;
        $dados["view"]      = "Saida/Create";
        $this->load("template", $dados);
    }
    
    public function inserir(){
        $saida = new \stdClass();
        $saida->id_produto            = $_POST["id_produto"];
        $saida->id_localizacao 		= $_POST['id_localizacao'];
        $saida->qtde_saida 		    = $_POST['qtde'];
        $saida->valor_saida 		= $_POST['preco'];
        $saida->subtotal_saida 		= $saida->qtde_saida * $saida->valor_saida ;
        $saida->data_saida 		    = hoje();
        $saida->hora_saida 		    = agora();
      
        
        if(SaidaService::salvar($saida, $this->campo, $this->tabela)){
            $erro = -1;
            $msg  = Flash::getMsg();
        }else{
            $erro = 1;
            $msg  = Flash::getErro(); 
        }
        $lista = SaidaService::listaPorData(hoje());
        echo json_encode(["erro"=> $erro, "msg"=>$msg, "lista"=>$lista]);
            
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."saida");
    }
}

