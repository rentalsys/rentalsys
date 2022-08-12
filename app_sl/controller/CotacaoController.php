<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\CotacaoService;
use app\models\service\FornecedorCotacaoService;
use app\models\service\ItemCotacaoService;
use app\models\service\Service;
use app\models\service\SolicitacaoCotacaoService;
use app\models\service\SolicitacaoService;

class CotacaoController extends Controller{
   private $tabela = "cotacao";
   private $campo  = "id_cotacao";   
   
    public function index(){
       $dados["lista"]   = CotacaoService::lista();       
       $dados["view"]    = "Cotacao/Index";
       $this->load("template", $dados);
    }
    
    public function create(){
        $cotacao = Service::get($this->tabela, "id_status_cotacao", 1);
        if(!$cotacao){
           $id_cotacao = Service::inserir(["id_status_cotacao"=>1, "data_abertura"=>hoje()], $this->tabela);
           $cotacao = Service::get($this->tabela, $this->campo, $id_cotacao);
        }
        $this->redirect(URL_BASE ."cotacao/cotar/" . $cotacao->id_cotacao);
       
    }    
    
    public function cotar($id_cotacao){
        $cotacao = Service::get($this->tabela, $this->campo, $id_cotacao);       
        if(!$cotacao){
            $this->redirect(URL_BASE."cotacao");
        }
        
        if($cotacao->id_status_cotacao>1){
            $this->redirect(URL_BASE."cotacao");
        }
        
        $dados["cotacao"]   = $cotacao;
        $dados["solicitacoes"] = SolicitacaoService::listaPorStatus(1);
        $dados["fornecedores"] = Service::get("contato", "eh_fornecedor", "S", true);
        $dados["solicitacoes_cotacao"] = SolicitacaoCotacaoService::listaPorCotacao($id_cotacao);
        $dados["fornecedores_cotacao"] = FornecedorCotacaoService::listaPorCotacao($id_cotacao);
        $dados["view"]      = "Cotacao/Create";
        $this->load("template", $dados);
    }
    
    public function em_massa(){
        $cotacao = Service::get($this->tabela, "id_status_cotacao", 1);
        if(!$cotacao){
            $id_cotacao = Service::inserir(["id_status_cotacao"=>1, "data_abertura"=>hoje()], $this->tabela);
            $cotacao = Service::get($this->tabela, $this->campo, $id_cotacao);
        }
        
        $solicitacoes = ($_POST["idSolicitacao"]) ? $_POST["idSolicitacao"]: null;
        if($solicitacoes){
            SolicitacaoCotacaoService::inserirEmMassa($cotacao->id_cotacao, $solicitacoes);
            $this->redirect(URL_BASE ."cotacao/cotar/" . $cotacao->id_cotacao);
        }
        
        $this->redirect(URL_BASE."solicitacao");
        
    }
    public function salvar(){
        $cotacao = new \stdClass();
        $cotacao->id_produto 		    = $_POST['id_produto'];
        $cotacao->id_status_cotacao = 1;
        $cotacao->qtde 		    = $_POST['qtde'];
        $cotacao->data_cotacao 		    = hoje();
        $cotacao->hora_cotacao 		    = agora();      
        
        Flash::setForm($cotacao);
        CotacaoService::salvar($cotacao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE. "cotacao");
        
    }
    
    public function finalizar($id_cotacao){
        $solicitacoes_cotacao = SolicitacaoCotacaoService::listaPorCotacao($id_cotacao);
        $fornecedores_cotacao = FornecedorCotacaoService::listaPorCotacao($id_cotacao);
        
        if(!$solicitacoes_cotacao || !$fornecedores_cotacao){
            $this->redirect(URL_BASE ."cotacao/cotar/" . $id_cotacao);
        }
        
        foreach ($fornecedores_cotacao as $f){
            foreach ($solicitacoes_cotacao as $s){
                $item  = new \stdClass();
                $item->id_cotacao       = $id_cotacao;
                $item->id_fornecedor    = $f->id_fornecedor;
                $item->id_solicitacao   = $s->id_solicitacao;
                $item->id_status_item_cotacao = 1;
                $item->id_produto       = $s->id_produto;
                $item->qtde             = $s->qtde;
                
                $tem = ItemCotacaoService::getItemCotacaoFornecedorCotacao($item->id_cotacao, $item->id_fornecedor, $item->id_solicitacao);
                if(!$tem){
                    Service::inserir(objToArray($item), "item_cotacao");
                }
            }
        }
        Service::editar(["id_status_cotacao"=>2, "id_cotacao" =>$id_cotacao ], "id_cotacao", "cotacao");        
        $this->redirect(URL_BASE."cotacao");
    }
    
    public function comparar($id_cotacao){
        $dados["cotacao"]   = Service::get($this->tabela, $this->campo,$id_cotacao);
        $dados["lista"]     = CotacaoService::listaComparacaoPrecos($id_cotacao);
        $dados["view"]      = "Cotacao/Comparar";
        $this->load("template", $dados);
    }
}

