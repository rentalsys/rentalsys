<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\SaidaService;
use app\models\service\Service;
use app\util\UtilService;

class SaidaController extends Controller{
    private $tabela = "saida_avulsa";
    private $campo  = "id_saida";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = SaidaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "Saida/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["saida_avulsa"] = Flash::getForm();
        $dados["lista"] = SaidaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "Saida/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $saida = Service::get($this->tabela, $this->campo, $id);
        if(!$saida){
            $this->redirect(URL_BASE."saida");
        }
        $dados["saida_avulsa"] = $saida;
        $dados["lista"] = SaidaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"] = "Saida/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $saida = new \stdClass();
        $saida->id_saida        = $_POST["id_saida"];
        $saida->id_produto        = $_POST["id_produto"];
        $saida->id_usuario        = $_POST["id_usuario"];
        $saida->valor_saida     = $_POST["valor_saida"];
        $saida->qtde_saida      = $_POST["qtde_saida"];
        $saida->data_saida      = date('Y-m-d');
        $saida->hora_saida      = date('H:i');
        $saida->subtotal_saida  = $_POST["valor_saida"]*$_POST["qtde_saida"];
        $saida->id_localizacao    = $_POST["id_localizacao"];
        $saida->qtde_saida      = $_POST["qtde_saida"];

        Flash::setForm($saida);
        if(SaidaService::salvar($saida, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."saida");
            } else {
            if(!$saida->id_saida){
                $this->redirect(URL_BASE."saida/create");
            } else {
                $this->redirect(URL_BASE."saida/edit/".$saida->id_saida);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."saida");
    }
}
?>

