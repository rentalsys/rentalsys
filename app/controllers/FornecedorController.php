<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\FornecedorService;
use app\util\UtilService;

class FornecedorController extends Controller{
    private $tabela = "fornecedor";
    private $campo  = "id_fornecedor";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]   = "Fornecedor/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["fornecedor"] = Flash::getForm();
        $dados["view"] = "Fornecedor/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $fornecedor = Service::get($this->tabela, $this->campo, $id);
        if(!$fornecedor){
            $this->redirect(URL_BASE."fornecedor");
        }
        $dados["fornecedor"] = $fornecedor;
        $dados["view"] = "Fornecedor/Create";
        $this->load("template", $dados);
    }
    
    public function buscar($f){
        $fornecedor = Service::getLike("fornecedores", "nomefornecedor", $f, true);
        echo json_encode($fornecedor);
    }
    
    public function salvar(){
        $fornecedor = new \stdClass();
        $fornecedor->id_fornecedor    = $_POST["id_fornecedor"];
        $fornecedor->pf_pj         = $_POST["pf_pj"];
        $fornecedor->nome          = $_POST["nome"];
        
        $str = $_POST["nome"];
        $fornecedor->nome = ltrim($str);
        //retira espaço em branco no início
        
        $fornecedor->celular       = preg_replace('/[^0-9]/', '', $_POST["celular"]);
        $fornecedor->email         = $_POST["email"];
        $volta_chamado          = $_POST["volta_chamado"];
        $volta_treinamento      = $_POST["volta_treinamento"];
        $volta_agenda           = $_POST["volta_agenda"];
        $volta_professor        = $_POST["volta_professor"];
        $idi                    = $_POST["id_responsavel"];
        $ide                    = $_POST["ide"];
        $di                                     = $_POST['data_inicio1'];
        $fornecedor->data_cadastro = date("Y-m-d");
        
        Flash::setForm($fornecedor);
        if(FornecedorService::salvar($fornecedor, $this->campo, $this->tabela)){
            if($volta_chamado){
                $this->redirect(URL_BASE."chamado/create");
            } elseif($volta_treinamento) {
                $this->redirect(URL_BASE."treinamento?ide=".$ide);
            } elseif($volta_agenda) {
                $this->redirect(URL_BASE."agenda?dat=".$ide);
            } elseif($volta_professor) {
                $this->redirect(URL_BASE."professor?dat=".$ide."&id_responsavel=".$idi);
            } else {
            $this->redirect(URL_BASE."fornecedor");
            }
        } else {
            if(!$fornecedor->id_fornecedor){
                $this->redirect(URL_BASE."fornecedor/create");
            } else {
                $this->redirect(URL_BASE."fornecedor/edit/".$fornecedor->id_fornecedor);
            }
    }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."fornecedor");
    }
    

    
}
?>

