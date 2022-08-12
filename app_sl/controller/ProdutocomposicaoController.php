<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\Service;
use app\models\service\ProdutoComposicaoService;

class ProdutocomposicaoController extends Controller{
   private $tabela = "produto_composicao";
   private $campo  = "id_produto_composicao";   
   
    public function index(){
       $dados["lista"] = Service::lista($this->tabela); 
       $dados["view"]  = "Produto_Composicao/Index";
       $this->load("template", $dados);
    }
    
    
    
    public function edit($id){
        $produto_composicao = Service::get($this->tabela, $this->campo, $id);       
        if(!$produto_composicao){
            $this->redirect(URL_BASE."produtocomposicao");
        }
        
        $dados["produto_composicao"]   = $produto_composicao;
        $dados["categorias"] = Service::lista("categoria");
        $dados["unidades"]   = Service::lista("unidade");
        $dados["view"]      = "Produto/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $produto_composicao = new \stdClass();
        $produto_composicao->id_produto_pai     = $_POST["id_produto_pai"];
        $produto_composicao->id_etapa 		    = $_POST['id_etapa'];
        $produto_composicao->id_insumo 		    = $_POST['id_insumo'];
        $produto_composicao->qtde_necessaria 	= $_POST['qtde'];
        
        
        Flash::setForm($produto_composicao);
        ProdutoComposicaoService::salvar($produto_composicao, $this->campo, $this->tabela);
        $this->redirect(URL_BASE."engenharia/detalhes/".$produto_composicao->id_produto_pai);
       
    }
    
    public function excluir($id_produto_composicao, $id_produto ){
        Service::excluir($this->tabela, $this->campo, $id_produto_composicao);
        $this->redirect(URL_BASE."engenharia/detalhes/".$id_produto);
    }
    
   
}

