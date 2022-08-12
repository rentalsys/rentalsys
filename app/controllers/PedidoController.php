<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemorcamentoService;
use app\models\service\PedidoService;
use app\models\service\Service;
use app\util\UtilService;

class PedidoController extends Controller{
    private $tabela = "venda_pedido";
    private $campo  = "id_pedido";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = PedidoService::lista($this->tabela);
        $dados["view"]   = "Pedido/Index";
        $this->load("template", $dados);
    }
    
    public function inserir(){
        $pedido = new \stdClass();
        $id_pedido         = $_POST["id_pedido"];
        $id_produto        = $_POST["id_produto"];
        $qtde              = $_POST["qtde"];
        $preco             = $_POST["preco"];
        
        $valores = array(
            "id_pedido" => $id_pedido,
            "id_produto" => $id_produto,
            "qtde" => $qtde,
            "preco" => $preco,
        );
        $item = ItemorcamentoService::getItemProduto($id_pedido, $id_produto);;
        if(!$item){
            Service::inserir(["id_pedido"=>$id_pedido, "id_produto"=>$id_produto, "qtde"=>$qtde, "valor"=>$preco], "venda_item_pedido");
        } else {}
        echo json_encode($valores);
        
    }
    
    public function create($id_pedido){
        $orcamento = PedidoService::getPedido($id_pedido);
        $itens = PedidoService::getPedidoItem($id_pedido);
        $dados["orcamento_pedido"] = $orcamento;
        $dados["itenspedido"] = $itens;
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Pedido/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $orcamento = Service::get($this->tabela, $this->campo, $id);
        if(!$orcamento){
            $this->redirect(URL_BASE."orcamento");
        }
        $dados["produto_orcamento"] = $orcamento;
        $dados["view"] = "Pedido/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $orcamento = new \stdClass();
        $orcamento->id_orcamento        = $_POST["id_orcamento"];
        $orcamento->id_cliente          = $_POST["id_cliente"];
        $orcamento->id_usuario          = $_POST["id_usuario_solicitou"];
        $orcamento->data_pedido         = $_POST["data_pedido"];
        $orcamento->hora_pedido         = $_POST["hora_pedido"];
        $nome                           = $_POST["nome"];
        $celular                        = $_POST["celular"];
        $email                          = $_POST["email"];
        
        if(!$orcamento->id_cliente){
            $id_cliente = Service::inserir(["nome"=>$nome, "celular"=>$celular, "email"=>$email], "cliente");
        } else {
            Service::editar(["nome"=>$nome, "celular"=>$celular, "email"=>$email, "id_cliente"=>$orcamento->id_cliente], "id_cliente", "cliente");
            $id_cliente = $orcamento->id_cliente;
        }
        
        Flash::setForm($orcamento);
        if(Service::inserir(["id_cliente"=>$id_cliente, "id_usuario"=>$orcamento->id_usuario, "data_pedido"=>$orcamento->data_pedido, "hora_pedido"=>$orcamento->hora_pedido], $this->tabela)){
            if(!$orcamento->id_orcamento){
                $this->redirect(URL_BASE."orcamento");
            } else {
                $this->redirect(URL_BASE."orcamento/edit/".$orcamento->id_orcamento);
            }
        }
        
    }
    
    public function excluir($id){
        
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."orcamento");
    }
    
    public function excluirProduto($id){
        $id_produto                        = $_POST["id_produto"];
        $id_pedido                         = $_POST["id_pedido"];
        ItemorcamentoService::excluir($id_pedido, $id_produto);
        $val = array(
            "id_pedido" => $id_pedido,
            "id_produto" => $id_produto,
        );
        echo json_encode($val);
    }
    
    public function cancelar($id){
        Service::editar(["id_status_pedido"=>9, "id_pedido"=>$id], "id_pedido", "venda_pedido");
        $this->redirect(URL_BASE."orcamento");
    }
    
    public function Finalizar($id){
        Service::editar(["id_status_pedido"=>2, "finalizado"=>"s", "id_pedido"=>$id], "id_pedido", "venda_pedido");
        $this->redirect(URL_BASE."pedido");
    }
    
    public function atualizaTotalBanco(){
        $id_pedido          = $_POST["id_pedido"];
        $total              = $_POST["total"];
        $qtd_produtos       = $_POST["qtd_produtos"];
        
        $nova = Service::editar(["total"=>$total, "qtd_produtos"=>$qtd_produtos, "id_pedido"=>$id_pedido], "id_pedido", "venda_pedido");
        echo json_encode($nova);
    }
    
    public function atualizaQtde($id_pedido, $id_produto, $qtde){
        $novaQTD = ItemorcamentoService::atualizaQtdeItem($id_pedido, $id_produto, $qtde);
        echo json_encode($novaQTD);
    }
    
    public function ExcluirItens($id_pedido){
        $novaQT = ItemorcamentoService::ExcluirItens($id_pedido);
        echo json_encode($novaQT);
    }
    
    
    
}
?>

