<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\EntradaService;
use app\models\service\Service;
use app\util\UtilService;

class EntradaController extends Controller{
    private $tabela = "entrada_avulsa";
    private $campo  = "id_entrada";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = EntradaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "Entrada/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["entrada_avulsa"] = Flash::getForm();
        $dados["lista"] = EntradaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"]   = "Entrada/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $entrada = Service::get($this->tabela, $this->campo, $id);
        if(!$entrada){
            $this->redirect(URL_BASE."entrada");
        }
        $dados["entrada_avulsa"] = $entrada;
        $dados["lista"] = EntradaService::lista($this->tabela);
        $dados["locais"] = Service::lista("localizacao");
        $dados["view"] = "Entrada/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $entrada = new \stdClass();
        $entrada->id_entrada        = $_POST["id_entrada"];
        $entrada->id_produto        = $_POST["id_produto"];
        $entrada->id_usuario        = $_POST["id_usuario"];
        $entrada->valor_entrada     = $_POST["valor_entrada"];
        $entrada->qtde_entrada      = $_POST["qtde_entrada"];
        $entrada->data_entrada      = date('Y-m-d');
        $entrada->hora_entrada      = date('H:i');
        $entrada->subtotal_entrada  = $_POST["valor_entrada"]*$_POST["qtde_entrada"];
        $entrada->id_localizacao    = $_POST["id_localizacao"];
        $entrada->qtde_entrada      = $_POST["qtde_entrada"];

        Flash::setForm($entrada);
        if(EntradaService::salvar($entrada, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."entrada");
            } else {
            if(!$entrada->id_entrada){
                $this->redirect(URL_BASE."entrada/create");
            } else {
                $this->redirect(URL_BASE."entrada/edit/".$entrada->id_entrada);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."entrada");
    }
}
?>

