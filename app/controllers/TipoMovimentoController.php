<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\TipoMovimentoService;
use app\util\UtilService;

class TipoMovimentoController extends Controller{
    private $tabela = "tipo_movimento";
    private $campo  = "id_tipo_movimento";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]   = "TipoMovimento/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["tipo_movimento"] = Flash::getForm();
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "tipomovimento/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $tipomovimento = Service::get($this->tabela, $this->campo, $id);
        if(!$tipomovimento){
            $this->redirect(URL_BASE."tipomovimento");
        }
        $dados["tipo_movimento"] = $tipomovimento;
        $dados["view"] = "tipomovimento/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $tipomovimento = new \stdClass();
        $tipomovimento->id_tipo_movimento       = $_POST["id_tipo_movimento"];
        $tipomovimento->tipo_movimento          = $_POST["tipo_movimento"];
        $tipomovimento->ent_sai                 = $_POST["ent_sai"];
        $tipomovimento->movimenta_estoque       = $_POST["movimenta_estoque"];
        $tipomovimento->id_usuario              = $_POST["id_usuario"];
        
        Flash::setForm($tipomovimento);
        if(TipoMovimentoService::salvar($tipomovimento, $this->campo, $this->tabela)){
             $this->redirect(URL_BASE."tipomovimento");
        } else {
            if(!$tipomovimento->id_tipo_movimento){
                $this->redirect(URL_BASE."tipomovimento/create");
            } else {
                $this->redirect(URL_BASE."tipomovimento/edit/".$tipomovimento->id_tipo_movimento);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."tipomovimento");
    }
}
?>

