<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ClienteService;
use app\models\service\Service;
use app\util\UtilService;

class ClientecursosController extends Controller{
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
        $dados["lista"] = ClienteService::listaAgendamento($this->tabela);
        $dados["view"]   = "Clientecursos/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["cliente"] = Flash::getForm();
        $dados["lista"] = ClienteService::listaAgendamento($this->tabela);
        $dados["view"] = "Clientecursos/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $cliente = Service::get($this->tabela, $this->campo, $id);
        if(!$cliente){
            $this->redirect(URL_BASE."Clientecursos");
        }
        $dados["cliente"] = $cliente;
        $dados["lista"] = ClienteService::listaAgendamento($this->tabela);
        $dados["view"] = "Clientecursos/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $cliente = new \stdClass();
        $cliente->id_cliente    = $_POST["id_cliente"];
        $cliente->pf_pj         = $_POST["pf_pj"];
        $cliente->nome          = $_POST["nome"];
        $cliente->celular       = preg_replace('/[^0-9]/', '', $_POST["celular"]);
        $cliente->email         = $_POST["email"];
        $cliente->agendado         = $_POST["agendado"];
        $cliente->treinamento   = "s";
        $cliente->data_cadastro = date("Y-m-d");
        
        Flash::setForm($cliente);
        if(ClienteService::salvar($cliente, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."Clientecursos/create");
        } else {
            $this->redirect(URL_BASE."Clientecursos/edit/".$cliente->id_cliente);
    }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."Clientecursos");
    }
    
    public function buscar($d){
        $clientes = Service::getLike($this->tabela, "nome", $d, true);
        echo json_encode($clientes);
    }
    
}
?>

