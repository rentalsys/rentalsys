<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\UnidadeService;
use app\util\UtilService;

class UnidadeController extends Controller{
    private $tabela = "produto_unidade";
    private $campo  = "id_unidade";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]   = "Unidade/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["produto_unidade"] = Flash::getForm();
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Unidade/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $unidade = Service::get($this->tabela, $this->campo, $id);
        if(!$unidade){
            $this->redirect(URL_BASE."unidade");
        }
        $dados["produto_unidade"] = $unidade;
        $dados["view"] = "Unidade/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $unidade = new \stdClass();
        $unidade->id_unidade    = $_POST["id_unidade"];
        $unidade->nome_unidade       = $_POST["nome_unidade"];
        
        Flash::setForm($unidade);
        if(UnidadeService::salvar($unidade, $this->campo, $this->tabela)){
                $this->redirect(URL_BASE."unidade");
        } else {
            if(!$unidade->id_unidade){
                $this->redirect(URL_BASE."unidade/create");
            } else {
                $this->redirect(URL_BASE."unidade/edit/".$unidade->id_unidade);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."unidade");
    }
}
?>

