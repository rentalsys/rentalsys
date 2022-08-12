<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ProdutoLocalizacaoService;
use app\models\service\Service;


class ProdutolocalizacaoController extends Controller{
   private $tabela = "produto_localizacao";
   private $campo  = "id_produto_localizacao";   
   
    public function index(){
       $dados["lista"] = ProdutoLocalizacaoService::lista();  
       $dados["produtos"] = Service::lista("produto");
       $dados["locais"]   = Service::lista("localizacao");
       $dados["view"]  = "Produto_Localizacao/Create";
       $this->load("template", $dados);
    }
    
    public function create(){
        $dados["produto_localizacao"] = Flash::getForm();
        $dados["produtos"] = Service::lista("produto");
        $dados["lista"] = ProdutoLocalizacaoService::lista(); 
        $dados["locais"]   = Service::lista("localizacao");
        $dados["view"] = "Produto_Localizacao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $produto_localizacao = Service::get($this->tabela, $this->campo, $id);       
        if(!$produto_localizacao){
            $this->redirect(URL_BASE."produtolocalizacao");
        }
        $dados["lista"]     = ProdutoLocalizacaoService::lista(); 
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"]   = Service::lista("localizacao");
        $dados["produto_localizacao"]   = $produto_localizacao;
        $dados["view"]      = "produtolocalizacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $produto_localizacao = new \stdClass();
        $produto_localizacao->id_produto_localizacao        = $_POST["id_produto_localizacao"];
        $produto_localizacao->id_produto 		= $_POST['id_produto'];
        $produto_localizacao->id_localizacao 	= $_POST['id_localizacao'];
        $produto_localizacao->estoque 		    = 0;
        $em_massa                               = $_POST['em_massa'];
        $tipo                                   = $_POST['tipo'];
        
        if($em_massa=="S"){
            ProdutoLocalizacaoService::salvarEmMassa($produto_localizacao->id_localizacao, $tipo);
            $this->redirect(URL_BASE."produtolocalizacao");
        }
        else{
                Flash::setForm($produto_localizacao);
                if(ProdutoLocalizacaoService::salvar($produto_localizacao, $this->campo, $this->tabela)){
                    $this->redirect(URL_BASE."produtolocalizacao");
                }else{
                    if(!$produto_localizacao->id_produto_localizacao){
                        $this->redirect(URL_BASE."produtolocalizacao/create");
                    }else{
                        $this->redirect(URL_BASE."produtolocalizacao/edit/".$produto_localizacao->id_produto_localizacao);
                    }
                }
        }
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."produtolocalizacao");
    }
    
    public function listaPorProduto($id_produto){
        $lista = ProdutoLocalizacaoService::listaPorProduto($id_produto);
        echo json_encode($lista);
    } 
    
    public function galpao($id_localizacao){
        $dados["localizacao"] = Service::get("localizacao", "id_localizacao", $id_localizacao);
        $dados["lista"]     = ProdutoLocalizacaoService::listaGalpao($id_localizacao);
        /*$dados["produtos"] = Service::lista("produto");
        $dados["locais"]   = Service::lista("localizacao");*/
        $dados["view"]  = "Produto_Localizacao/Galpao";
        $this->load("template", $dados);
    }
    
}

