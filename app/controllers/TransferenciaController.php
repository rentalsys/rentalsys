<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\TransferenciaService;
use app\models\service\Service;
use app\util\UtilService;

class TransferenciaController extends Controller{
    private $tabela = "transferencia";
    private $campo  = "id_transferencia";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = TransferenciaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "Transferencia/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["transferencia"] = Flash::getForm();
        $dados["lista"] = TransferenciaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "Transferencia/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $transferencia = Service::get($this->tabela, $this->campo, $id);
        if(!$transferencia){
            $this->redirect(URL_BASE."transferencia");
        }
        $dados["transferencia"] = $transferencia;
        $dados["lista"] = TransferenciaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"] = "Transferencia/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $transferencia = new \stdClass();
        $transferencia->id_transferencia        = $_POST["id_transferencia"];
        $transferencia->id_produto              = $_POST["id_produto"];
        $transferencia->id_usuario              = $_POST["id_usuario"];
        $transferencia->qtde_transferencia      = $_POST["qtde_transferencia"];
        $transferencia->data_transferencia      = date('Y-m-d');
        $transferencia->id_origem               = $_POST["id_origem"];
        $transferencia->id_destino               = $_POST["id_destino"];

        Flash::setForm($transferencia);
        if(TransferenciaService::salvar($transferencia, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."transferencia");
            } else {
            if(!$transferencia->id_transferencia){
                $this->redirect(URL_BASE."transferencia/create");
            } else {
                $this->redirect(URL_BASE."transferencia/edit/".$transferencia->id_transferencia);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."transferencia");
    }
}
?>

