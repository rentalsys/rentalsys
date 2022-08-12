<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemordemcompraService;
use app\models\service\OrdemcompraService;
use app\models\service\Service;
use app\util\UtilService;

class OrdemcompraController extends Controller{
    private $tabela = "compra_ordem_compra";
    private $campo  = "id_ordem_compra";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = OrdemcompraService::lista();
        $dados["view"]   = "Ordemcompra/Index";
        $this->load("template", $dados);
    }
    
    public function create($id_ordem_compra){
        OrdemcompraService::atualizaTotal($id_ordem_compra);
        $ordemcompra = OrdemcompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordemcompra){
            $this->redirect(URL_BASE."ordemcompra");
        }
        $dados["lista"] = ItemordemcompraService::ListaItemPorOrdemCompra($id_ordem_compra);
        $dados["compra_ordem_compra"] = $ordemcompra;
        $dados["view"] = "Ordemcompra/Create";
        $this->load("template", $dados);
    }
    
    public function novo(){
        $id_fornecedor = $_POST["id_fornecedor"];
        $ordemcompra = OrdemcompraService::getOrdemCompraAberta();
        if(!$ordemcompra){
            $id_ordem_compra = Service::inserir(["id_fornecedor"=>$id_fornecedor, "avulsa"=>"s", "id_status_ordem_compra"=>1, "finalizada"=>"n", "data_emissao"=>date("Y-m-d")], "compra_ordem_compra");
            $ordemcompra = OrdemcompraService::getOrdemCompra($id_ordem_compra);
        }
        $this->redirect(URL_BASE."ordemcompra/create/" . $ordemcompra->id_ordem_compra);
    }
    
    public function edit($id){
        $categoria = Service::get($this->tabela, $this->campo, $id);
        if(!$categoria){
            $this->redirect(URL_BASE."ordemcompra");
        }
        $dados["compra_ordem_compra"] = $categoria;
        $dados["view"] = "Ordemcompra/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $categoria = new \stdClass();
        $categoria->id_categoria    = $_POST["id_categoria"];
        $categoria->categoria    = $_POST["categoria"];
        $categoria->id_usuario       = $_POST["id_usuario"];
        $categoria->abreviatura       = $_POST["abreviatura"];
        $categoria->tipo_receita       = $_POST["tipo_receita"];

        Flash::setForm($categoria);
        if(OrdemcompraService::salvar($categoria, $this->campo, $this->tabela)){
            if($volta_produto){
                $this->redirect(URL_BASE."ordemcompra/create");
                } else {
            $this->redirect(URL_BASE."ordemcompra");
                }
        } else {
            if(!$categoria->id_categoria){
                $this->redirect(URL_BASE."ordemcompra/create");
            } else {
                $this->redirect(URL_BASE."ordemcompra/edit/".$categoria->id_ordem_compra);
            }
        }
        
    }
    
    public function finalizar($id_ordem_compra){
        Service::editar(["finalizada" => "s", "id_status_ordem_compra"=>2, "id_ordem_compra" => $id_ordem_compra], "id_ordem_compra", "compra_ordem_compra");
        $this->redirect(URL_BASE."ordemcompra");
    }
    
    public function aprovar($id_ordem_compra){
        $ordemcompra = OrdemcompraService::getOrdemCompra($id_ordem_compra);
        if(!$ordemcompra){
            $this->redirect(URL_BASE."ordemcompra");
        }
        $dados["compra_ordem_compra"] = $ordemcompra;
        $dados["lista"] = ItemordemcompraService::ListaItemPorOrdemCompra($id_ordem_compra);
        $dados["view"] = "Ordemcompra/Aprovar";
        $this->load("template", $dados);
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."ordemcompra");
    }
}
?>

