<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\SolicitacaoService;
use app\models\service\Service;

class SolicitacaoController extends Controller{
   private $tabela = "solicitacao";
   private $campo  = "id_solicitacao";   
   
    public function index(){
       $dados["lista"]   = SolicitacaoService::listaPorStatus(1);       
       $dados["insumos"] = Service::get("produto", "eh_insumo", "S", true);
       $dados["view"]    = "Solicitacao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["solicitacao"] = Flash::getForm();
        $dados["view"] = "Solicitacao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $solicitacao = Service::get($this->tabela, $this->campo, $id);       
        if(!$solicitacao){
            $this->redirect(URL_BASE."solicitacao");
        }
        
        $dados["solicitacao"]   = $solicitacao;
        $dados["view"]      = "Solicitacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $solicitacao = new \stdClass();
        $solicitacao->id_produto 		    = $_POST['id_produto'];
        $solicitacao->id_status_solicitacao = 1;
        $solicitacao->qtde 		    = $_POST['qtde'];
        $solicitacao->data_solicitacao 		    = hoje();
        $solicitacao->hora_solicitacao 		    = agora();      
        
        Flash::setForm($solicitacao);
        SolicitacaoService::salvar($solicitacao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE. "solicitacao");
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."solicitacao");
    }
}

