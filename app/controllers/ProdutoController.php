<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ProdutoService;
use app\models\service\Service;
use app\util\UtilService;

class ProdutoController extends Controller{
    private $tabela = "produto";
    private $campo  = "id_produto";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = ProdutoService::listaProduto($this->tabela);
        $dados["view"]  = "Produto/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["produto"] = Flash::getForm();
        $dados["categorias"] = Service::lista("produto_categoria");
        $dados["unidades"] = Service::lista("unidade");
        $dados["marcas"] = Service::lista("produto_marca");
        $dados["view"] = "Produto/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $produto = Service::get($this->tabela, $this->campo, $id);
        if(!$produto){
            $this->redirect(URL_BASE."produto");
        }
        
        $dados["produto"]   = $produto;
        $dados["categorias"] = Service::lista("produto_categoria");
        $dados["unidades"] = Service::lista("unidade");
        $dados["marcas"] = Service::lista("produto_marca");
        $dados["view"]      = "Produto/Create";
        $this->load("template", $dados);
    }
    
    
    
    public function salvar(){
        $produto = new \stdClass();
        $produto->id_produto            = $_POST["id_produto"];

        $str = $_POST["produto"];
        $produto->produto = ltrim($str);
        //retira espaço em branco no icício
        
        $produto->id_categoria 		    = $_POST["id_categoria"];
        $produto->id_marca 		        = $_POST["id_marca"];
        $produto->observacao 		    = $_POST["observacao"];
        $produto->data_cadastro 		= $_POST["data_cadastro"];
        $produto->ativo 		        = $_POST["ativo"];
        $produto->descricao 		    = $_POST["descricao"];
        
        $produto->urlyoutube 		    = $_POST["urlyoutube"];
        $produto->voltagem 		        = $_POST["voltagem"];
        $produto->gtin 		            = $_POST["gtin"];
        $produto->ncm 		            = $_POST["ncm"];
        $produto->estoquegerenciado 	= $_POST["estoquegerenciado"];
        $produto->sku 		            = $_POST["sku"];
        $produto->skupai 		        = $_POST["skupai"];
        $produto->variacao 		        = $_POST["variacao"];
        $sourcer = array('.', ',');
        $replacer = array('', '.');
        $produto->comprimento           = str_replace($sourcer, $replacer, $_POST['comprimento']);
        $produto->largura               = str_replace($sourcer, $replacer, $_POST['largura']);
        $produto->altura                = str_replace($sourcer, $replacer, $_POST['altura']);
        $produto->peso                  = str_replace($sourcer, $replacer, $_POST['peso']);
        $produto->preco                 = str_replace($sourcer, $replacer, $_POST['preco']);
        $produto->custo_atual           = str_replace($sourcer, $replacer, $_POST['custo_atual']);
        $produto->imagem 		        = ($_POST['arquivo']) ? ($_POST['arquivo']) : $_POST['arquivo1'];
        $marca                          = $_POST["marca"];
        $cadastrar_marca                = $_POST["cadastrar_marca"];
        
        
        Flash::setForm($produto);
        if(ProdutoService::salvar($produto, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."produto");
        }else{
            if(!$produto->id_produto){
                $this->redirect(URL_BASE."produto/create");
            }else{
                $this->redirect(URL_BASE."produto/edit/".$produto->id_produto);
            }
        }
    }
    
    
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."produto");
    }
    
    public function buscar($q){
        $produtos = Service::getLike($this->tabela, "produto", $q, true);
        echo json_encode($produtos);
    }
    
}


?>
