<?php
namespace app\controllers;
use app\core\Controller;
use app\models\service\ItemOrdemProducaoService;
use app\models\service\OrdemProducaoService;
use app\models\service\Service;

class OrdemproducaoController extends Controller{
   private $tabela = "ordem_producao";
   private $campo  = "id_ordem_producao";   
   
    public function index(){
       $dados["lista"]        = OrdemProducaoService::lista();
       $dados["fornecedores"] = Service::get("contato", "eh_fornecedor", "S", true);
       $dados["view"]  = "Ordem_Producao/Index";
       $this->load("template", $dados);
    }
    
    public function create(){ 
        $ordeproducao = OrdemProducaoService::getOrdemProducaoAberta();
        if(!$ordeproducao){
            $id_ordem_producao= Service::inserir(["data_cadastro"=>hoje(),"avulsa"=>"S","id_status_ordem_producao"=>1,
                "finalizado"=>"N"], "ordem_producao");
            $ordeproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        }
        $this->redirect(URL_BASE ."ordemproducao/avulsa/" . $ordeproducao->id_ordem_producao);
    }
    
    
    public function avulsa($id_ordem_producao){
        $ordeproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        if(!$ordeproducao){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        $dados["ordem_producao"] = $ordeproducao;
        $dados["lista"] = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        $dados["view"] = "Ordem_Producao/Create";
        $this->load("template", $dados);
    }
    
    public function detalhe($id_ordem_producao){
        $ordeproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        if(!$ordeproducao){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        $dados["ordem_producao"] = $ordeproducao;
        $dados["lista"] = ItemOrdemProducaoService::listaItensOrdemProducao($id_ordem_producao);
        $dados["view"] = "Ordem_Producao/Detalhe";
        $this->load("template", $dados);
    }
   
    
    public function finalizar($id_ordem_producao){
        $ordemproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        if(!$ordemproducao){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        if($ordemproducao->finalizado=="S"){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        OrdemProducaoService::finalizar($id_ordem_producao);
         $this->redirect(URL_BASE."ordemproducao");
    }
   
 public function checar($id_ordem_producao){
        $ordemproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        if(!$ordemproducao){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        if($ordemproducao->finalizado=="N"){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        $dados["produtos"]  = OrdemProducaoService::checar($id_ordem_producao);       
        $dados["id_ordem_producao"] = $id_ordem_producao;
        $dados["view"]      = "Ordem_Producao/Checar";
        $this->load("template", $dados);
    }
    
    public function liberar(){
        $id_localizacao     = $_POST["id_localizacao"];
        $id_insumo          = $_POST["id_insumo"];
        $id_ordem_producao  = $_POST["id_ordem_producao"];
        $ordemproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        if(!$ordemproducao){
            $this->redirect(URL_BASE."ordemproducao");
        }        
        if($ordemproducao->finalizado=="N"){
            $this->redirect(URL_BASE."ordemproducao");
        }        
        
        OrdemProducaoService::liberar($id_ordem_producao, $id_localizacao, $id_insumo);
        $this->redirect(URL_BASE."ordemproducao/acompanhar/".$id_ordem_producao);
    }
    
    public function acompanhar($id_ordem_producao){
        
        $dados["produtos"] = OrdemProducaoService::acompanhar($id_ordem_producao);
        $dados["id_ordem_producao"]  = $id_ordem_producao;
        $dados["view"] = "Ordem_Producao/Acompanhar";
        $this->load("template", $dados);
    }
    
    public function finalizarOrdemProducao($id_ordem_producao){
        
        OrdemProducaoService::finalizarOrdemProducao($id_ordem_producao);
        $this->redirect(URL_BASE."ordemproducao");
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."ordemproducao");
    }
    
    
    
    public function gerar_solicitacoes($id_ordem_producao){
        $ordemproducao = OrdemProducaoService::getOrdemProducao($id_ordem_producao);
        if(!$ordemproducao){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        if($ordemproducao->finalizado=="N"){
            $this->redirect(URL_BASE."ordemproducao");
        }
        
        $dados["solicitacoes"]  = OrdemProducaoService::gerar_solicitacoes($id_ordem_producao);
        $dados["view"]      = "Ordem_Producao/Solicitacoes_geradas";
        $this->load("template", $dados);
    }
    
   
}

