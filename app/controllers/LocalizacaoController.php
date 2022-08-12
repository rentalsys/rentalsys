<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\LocalizacaoService;
use app\util\UtilService;

class LocalizacaoController extends Controller{
    private $tabela = "localizacao";
    private $campo  = "id_localizacao";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"]   = "Localizacao/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["localizacao"] = Flash::getForm();
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Localizacao/Index";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $localizacao = Service::get($this->tabela, $this->campo, $id);
        if(!$localizacao){
            $this->redirect(URL_BASE."localizacao");
        }
        $dados["localizacao"] = $localizacao;
        $dados["view"] = "Localizacao/Index";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $localizacao = new \stdClass();
        $localizacao->id_localizacao        = $_POST["id_localizacao"];
        $localizacao->localizacao           = $_POST["localizacao"];
        $localizacao->cep_unidade           = $_POST["cep_unidade"];
        $localizacao->rua_unidade           = $_POST["rua_unidade"];
        $localizacao->numero_unidade        = $_POST["numero_unidade"];
        $localizacao->complemento_unidade   = $_POST["complemento_unidade"];
        $localizacao->bairro_unidade        = $_POST["bairro_unidade"];
        $localizacao->cidade_unidade        = $_POST["cidade_unidade"];
        $localizacao->uf_unidade            = $_POST["uf_unidade"];
        $localizacao->galpao                = $_POST["galpao"];
        
        
        
        Flash::setForm($localizacao);
        if(LocalizacaoService::salvar($localizacao, $this->campo, $this->tabela)){
                $this->redirect(URL_BASE."localizacao");
        } else {
            if(!$localizacao->id_localizacao){
                $this->redirect(URL_BASE."localizacao/create");
            } else {
                $this->redirect(URL_BASE."localizacao/edit/".$localizacao->id_localizacao);
            }
        }
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."localizacao");
    }
}
?>

