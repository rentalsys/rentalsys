<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ProdutoLocalizacaoService;
use app\util\UtilService;

class ProdutoLocalizacaoController extends Controller{
    private $tabela = "produto_localizacao";
    private $campo  = "id_produto_localizacao";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = ProdutoLocalizacaoService::lista($this->tabela);
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "ProdutoLocalizacao/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["produto_localizacao"] = Flash::getForm();
        $dados["lista"] = ProdutoLocalizacaoService::lista($this->tabela);
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"] = "ProdutoLocalizacao/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $produtolocalizacao = Service::get($this->tabela, $this->campo, $id);
        if(!$produtolocalizacao){
            $this->redirect(URL_BASE."produtolocalizacao");
        }
        $dados["produto_localizacao"] = $produtolocalizacao;
        $dados["produtos"] = Service::lista("produto");
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"] = "ProdutoLocalizacao/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $produtolocalizacao = new \stdClass();
        $produtolocalizacao->id_produto_localizacao         = $_POST["id_produto_localizacao"];
        $produtolocalizacao->id_produto                     = $_POST["id_produto"];
        $produtolocalizacao->id_localizacao                 = $_POST["id_localizacao"];

        Flash::setForm($produtolocalizacao);
        if(ProdutoLocalizacaoService::salvar($produtolocalizacao, $this->campo, $this->tabela)){
                $this->redirect(URL_BASE."produtolocalizacao");
        } else {
            if(!$produtolocalizacao->id_produto_localizacao){
                $this->redirect(URL_BASE."produtolocalizacao/create");
            } else {
                $this->redirect(URL_BASE."produtolocalizacao/edit/".$produtolocalizacao->id_produto_localizacao);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id_produto);
        $this->redirect(URL_BASE."produtolocalizacao");
    }
    
    public function ListaPorProduto($id_produto){
        $lista = ProdutoLocalizacaoService::ListaPorProduto($id_produto);
        echo json_encode($lista);
    }
}
?>

