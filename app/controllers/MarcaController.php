<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\MarcaService;
use app\util\UtilService;

class MarcaController extends Controller{
    private $tabela = "produto_marca";
    private $campo  = "id_marca";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]   = "Marca/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["produto_marca"] = Flash::getForm();
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Marca/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $marca = Service::get($this->tabela, $this->campo, $id);
        if(!$marca){
            $this->redirect(URL_BASE."marca");
        }
        $dados["produto_marca"] = $marca;
        $dados["view"] = "Marca/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $marca = new \stdClass();
        $marca->id_marca    = $_POST["id_marca"];
        $marca->marca       = $_POST["marca"];
        
        Flash::setForm($marca);
        if(MarcaService::salvar($marca, $this->campo, $this->tabela)){
            if($volta_produto){
                $this->redirect(URL_BASE."produto/create");
            } else {
                $this->redirect(URL_BASE."marca");
            }
        } else {
            if(!$marca->id_marca){
                $this->redirect(URL_BASE."marca/create");
            } else {
                $this->redirect(URL_BASE."marca/edit/".$marca->id_marca);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."marca");
    }
}
?>

