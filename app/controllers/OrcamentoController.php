<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ItemorcamentoService;
use app\models\service\OrcamentoService;
use app\models\service\Service;
use app\util\UtilService;

class OrcamentoController extends Controller{
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
        $dados["lista"] = OrcamentoService::lista($this->tabela);
        $dados["view"]   = "Orcamento/Index";
        $this->load("template", $dados);
    }
    
    public function inserir(){
        $pedido = new \stdClass();
        $id_pedido         = $_POST["id_pedido"];
        $id_produto        = $_POST["id_produto"];
        $qtde              = $_POST["qtde"];
        $preco             = $_POST["preco"];
        $frete       = $_POST["frete"];
        $total             = $_POST["total"];
        $total_somado      = $_POST["total_somado"];
        
        $valores = array(
        "id_pedido" => $id_pedido,
        "id_produto" => $id_produto,
        "qtde" => $qtde,
        "preco" => $preco,
        "frete" => $frete,
        "total" => $total,
        "total_somado" => $total_somado,
        );
        $item = ItemorcamentoService::getItemProduto($id_pedido, $id_produto);;
        if(!$item){
            Service::inserir(["id_pedido"=>$id_pedido, "id_produto"=>$id_produto, "qtde"=>$qtde, "valor"=>$preco, "frete"=>$frete, "total"=>$total, "total_somado"=>$total_somado], "venda_item_pedido");
        } else {}
        echo json_encode($valores);

    }
    
    public function create($id_pedido){
        $orcamento = OrcamentoService::getOrcamento($id_pedido);
        $itens = OrcamentoService::getOrcamentoItem($id_pedido);
        $dados["orcamento_pedido"]  = $orcamento;
        $dados["itenspedido"]       = $itens;
        $dados["formas"]            = Service::lista("venda_forma_pagamento");
        $dados["lista"]             = Service::lista($this->tabela);
        $dados["view"]              = "Orcamento/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $orcamento = Service::get($this->tabela, $this->campo, $id);
        if(!$orcamento){
            $this->redirect(URL_BASE."orcamento");
        }
        $dados["produto_orcamento"] = $orcamento;
        $dados["view"] = "Orcamento/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $orcamento = new \stdClass();
        $orcamento->id_orcamento        = $_POST["id_orcamento"];
        $orcamento->id_cliente          = $_POST["id_cliente"];
        $orcamento->id_usuario          = $_POST["id_usuario_solicitou"];
        $orcamento->data_pedido         = $_POST["data_pedido"];
        $orcamento->hora_pedido         = $_POST["hora_pedido"];
        
            $cpf                            = $_POST["cpf"];
            $cnpj                           = $_POST["cnpj"];
            $pf_pj                          = $_POST["pf_pj"];
            $nome                           = $_POST["nome"];
            $celular                        = $_POST["celular"];
            $cep                            = $_POST["cep"];
            $email                          = $_POST["email"];
            $cidade                         = $_POST["cidade"];
            $uf                             = $_POST["uf"];
            $bairro                         = $_POST["bairro"];
        
        
        if(!$orcamento->id_cliente){
            $id_cliente = Service::inserir(["pf_pj"=>$pf_pj, "nome"=>$nome, "celular"=>$celular, "email"=>$email, "cep"=>$cep, "cpf"=>$cpf, "cnpj"=>$cnpj, "cidade"=>$cidade, "uf"=>$uf, "bairro"=>$bairro], "cliente");
        } else {
            Service::editar(["pf_pj"=>$pf_pj, "nome"=>$nome, "celular"=>$celular, "email"=>$email, "cep"=>$cep, "cpf"=>$cpf, "cnpj"=>$cnpj, "cidade"=>$cidade, "uf"=>$uf, "bairro"=>$bairro, "id_cliente"=>$orcamento->id_cliente], "id_cliente", "cliente");
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
        $this->redirect(URL_BASE."pedido/create/".$id);
    }
    
    public function atualizaTotalBanco(){
        $id_pedido          = $_POST["id_pedido"];
        $total              = $_POST["total"];
        $total_somado       = $_POST["total_somado"];
        $frete              = $_POST["frete"];
        $qtd_produtos       = $_POST["qtd_produtos"];
        $desconto_valor     = $_POST["desconto_valor"];
        
        $nova = Service::editar(["total"=>$total, "total_somado"=>$total_somado, "desconto_valor"=>$desconto_valor, "qtd_produtos"=>$qtd_produtos, "frete"=>$frete, "id_pedido"=>$id_pedido], "id_pedido", "venda_pedido");
        echo json_encode($nova);
    }
    
    public function AtualizaClientePedido($id){
        $id_pedido          = $_POST["id_pedido"];
        $id_comprador       = $_POST["id_comprador"];
        $comprador          = $_POST["comprador"];
        
        $nova = Service::editar(["id_comprador"=>$id_comprador, "comprador"=>$comprador, "id_pedido"=>$id_pedido], "id_pedido", "venda_pedido");
        echo json_encode($nova);
    }
    
    public function atualizaFreteBanco(){
        $id_pedido          = $_POST["id_pedido"];
        $total_somado       = $_POST["total_somado"];
        $frete              = $_POST["frete"];
        
        $nova = Service::editar(["total_somado"=>$total_somado, "frete"=>$frete, "id_pedido"=>$id_pedido], "id_pedido", "venda_pedido");
        echo json_encode($nova);
    }
    
    public function atualizaPerBanco(){
        $id_pedido            = $_POST["id_pedido"];
        $total_somado         = $_POST["total_somado"];
        $desconto_valor       = $_POST["desconto_valor"];
        $desconto_percentual  = $_POST["desconto_percentual"];
        
        $nova = Service::editar(["total_somado"=>$total_somado, "desconto_valor"=>$desconto_valor, "desconto_percentual"=>$desconto_percentual, "id_pedido"=>$id_pedido], "id_pedido", "venda_pedido");
        echo json_encode($nova);
    }
    
    //atualiza itens
    
    public function atualizaQtde($id_pedido, $id_produto, $qtde, $total, $total_somado, $frete, $desconto_percentual, $desconto_valor){    
        $novaQTD = ItemorcamentoService::atualizaQtdeItem($id_pedido, $id_produto, $qtde, $total, $total_somado, $frete, $desconto_percentual, $desconto_valor);
        echo json_encode($novaQTD);
    }
    
    public function ExcluirItens($id_pedido){
        $novaQT = ItemorcamentoService::ExcluirItens($id_pedido);
        echo json_encode($novaQT);
    }
    
    public function buscar($q){
        $pedidos = Service::getLike($this->tabela, "id_pedido", $q, true);
        echo json_encode($pedidos);
    }
    
}
?>

