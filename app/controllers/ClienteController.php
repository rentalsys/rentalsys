<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\ClienteService;
use app\util\UtilService;

class ClienteController extends Controller{
    private $tabela = "cliente";
    private $campo  = "id_cliente";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]   = "Cliente/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["cliente"] = Flash::getForm();
        $dados["view"] = "Cliente/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $cliente = Service::get($this->tabela, $this->campo, $id);
        if(!$cliente){
            $this->redirect(URL_BASE."cliente");
        }
        $dados["cliente"] = $cliente;
        $dados["view"] = "Cliente/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $cliente = new \stdClass();
        $cliente->id_cliente    = $_POST["id_cliente"];
        $cliente->pf_pj         = $_POST["pf_pj"];
        $cliente->nome          = $_POST["nome"];
        
        $str = $_POST["nome"];
        $cliente->nome = ltrim($str);
        //retira espaço em branco no início
        
        $cliente->celular       = preg_replace('/[^0-9]/', '', $_POST["celular"]);
        $cliente->email         = $_POST["email"];
        $volta_chamado          = $_POST["volta_chamado"];
        $volta_treinamento      = $_POST["volta_treinamento"];
        $volta_agenda           = $_POST["volta_agenda"];
        $volta_professor        = $_POST["volta_professor"];
        $idi                    = $_POST["id_responsavel"];
        $ide                    = $_POST["ide"];
        $di                                     = $_POST['data_inicio1'];
        $cliente->data_cadastro = date("Y-m-d");
        
        Flash::setForm($cliente);
        if(ClienteService::salvar($cliente, $this->campo, $this->tabela)){
            if($volta_chamado){
                $this->redirect(URL_BASE."chamado/create");
            } elseif($volta_treinamento) {
                $this->redirect(URL_BASE."treinamento?ide=".$ide);
            } elseif($volta_agenda) {
                $this->redirect(URL_BASE."agenda?dat=".$ide);
            } elseif($volta_professor) {
                $this->redirect(URL_BASE."professor?dat=".$ide."&id_responsavel=".$idi);
            } else {
            $this->redirect(URL_BASE."cliente");
            }
        } else {
            if(!$cliente->id_cliente){
                $this->redirect(URL_BASE."cliente/create");
            } else {
                $this->redirect(URL_BASE."cliente/edit/".$cliente->id_cliente);
            }
    }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."cliente");
    }
    
    public function buscar($d){
        $clientes = Service::getLike($this->tabela, "nome", $d, true);
        echo json_encode($clientes);
    }
    
    public function AtualizaCliente($id){
        $id_cliente         = $_POST["id_cliente"];
        $nome               = $_POST["nome"];
        $celular            = $_POST["celular"];
        $email              = $_POST["email"];
        $cpf                = $_POST["cpf"];
        $cnpj               = $_POST["cnpj"];
        
        $nova = Service::editar(["nome"=>$nome, "celular"=>$celular, "email"=>$email, "cpf"=>$cpf, "cnpj"=>$cnpj, "id_cliente"=>$id_cliente], "id_cliente", "cliente");
        echo json_encode($nova);
    }
    
    public function AtualizarComprador($id){
        $id_cliente         = $_POST["id_cliente"];
        $nome               = $_POST["nome"];
        $celular            = $_POST["celular"];
        $email              = $_POST["email"];
        $cpf                = $_POST["cpf"];
        $rg                 = $_POST["rg"];
        $cnpj               = $_POST["cnpj"];
        $ie                 = $_POST["ie"];
        $im                 = $_POST["im"];
        $data_nascimento    = $_POST["data_nascimento"];
        $sexo               = $_POST["sexo"];
        
        $nova = Service::editar(["nome"=>$nome, "celular"=>$celular, "email"=>$email, "cpf"=>$cpf, "rg"=>$rg, "iestadual"=>$ie, "imunicipal"=>$im, "data_nascimento"=>$data_nascimento, "sexo"=>$sexo], "id_cliente", "cliente");
        echo json_encode($nova);
    }
    
    public function CadastrarComprador(){
        $id_usuario         = $_POST["id_usuario"];
        $nome               = $_POST["nome"];
        $celular            = $_POST["celular"];
        $telefone            = $_POST["telefone"];
        $pf_pj            = $_POST["pf_pj"];
        $email              = $_POST["email"];
        $cpf                = $_POST["cpf"];
        $cnpj               = $_POST["cnpj"];
        
        $nova =  Service::inserir(["id_usuario"=>$id_usuario, "nome"=>$nome, "celular"=>$celular, "email"=>$email, "cpf"=>$cpf, "pf_pj"=>$pf_pj, "telefone"=>$telefone, "cnpj"=>$cnpj], "cliente");
        echo json_encode($nova);
    }
    
}
?>

