<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\SolicitacaoService;
use app\util\UtilService;

class SolicitacaoController extends Controller{
    private $tabela = "compra_solicitacao";
    private $campo  = "id_solicitacao";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = SolicitacaoService::lista($this->tabela);
        $dados["view"]   = "Solicitacao/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["compra_solicitacao"] = Flash::getForm();
        $dados["lista"] = Service::lista($this->tabela);
        $dados["view"] = "Solicitacao/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $solicitacao = Service::get($this->tabela, $this->campo, $id);
        if(!$solicitacao){
            $this->redirect(URL_BASE."solicitacao");
        }
        $dados["compra_solicitacao"] = $solicitacao;
        $dados["view"] = "Solicitacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $solicitacao = new \stdClass();
        $solicitacao->id_solicitacao            = $_POST["id_solicitacao"];
        $solicitacao->id_usuario_solicitou      = $_POST["id_usuario_solicitou"];
        $solicitacao->id_produto                = $_POST["id_produto"];
        $solicitacao->qtde                      = $_POST["qtde"];
        $solicitacao->data_solicitacao          = date('Y-m-d');
        $solicitacao->hora_solicitacao          = date('H:i');
        $solicitacao->id_status_solicitacao     = 1;

        Flash::setForm($solicitacao);
        SolicitacaoService::salvar($solicitacao, $this->campo, $this->tabela);
            
            $this->redirect(URL_BASE."solicitacao");
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."solicitacao");
    }
}
?>

