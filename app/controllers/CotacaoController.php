<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\CotacaoService;
use app\models\service\FornecedorCotacaoService;
use app\models\service\ItemcotacaoService;
use app\models\service\Service;
use app\models\service\SolicitacaoCotacaoService;
use app\models\service\SolicitacaoService;
use app\util\UtilService;

class CotacaoController extends Controller{
    private $tabela = "compra_cotacao";
    private $campo  = "id_cotacao";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = CotacaoService::lista($this->tabela);
        $dados["status_cotacao"]          = Service::lista("compra_status_cotacao");
        $dados["view"]   = "Cotacao/Index";
        $this->load("template", $dados);
    }
    
    public function filtro()
    {
        $filtro = new \stdClass();
        $filtro->id_status_cotacao = $_GET["st"];
        $data1br = ($_GET["data_inicio"])?$_GET["data_inicio"]:$_GET["data_inicio1"];
        $dataa = explode("/", $data1br);
        $validaa = checkdate((int)$dataa[1], (int)$dataa[0], (int)$dataa[2]);
        $data1 = $dataa[2]."-".$dataa[1]."-".$dataa[0];
        $data2br = ($_GET["data_fim"])?$_GET["data_fim"]:$_GET["data_fim1"];
        $dataa = explode("/", $data2br);
        $validaa = checkdate((int)$dataa[1], (int)$dataa[0], (int)$dataa[2]);
        $data2 = $dataa[2]."-".$dataa[1]."-".$dataa[0];
        $dados["lista"]     = CotacaoService::filtro($filtro,$data1,$data2);
        $dados["status_cotacao"]          = Service::lista("compra_status_cotacao");
        $dados["view"]   = "Cotacao/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $cotacao = Service::get($this->tabela, "id_status_cotacao", 1);
        if(!$cotacao){
            $id_cotacao = Service::inserir(["id_status_cotacao"=>1, "data_abertura"=>date('Y-m-d')], $this->tabela);
            $cotacao = Service::get($this->tabela, $this->campo, $id_cotacao);
        }
        $this->redirect(URL_BASE."cotacao/cotar/" . $cotacao->id_cotacao);
    }
    
    public function em_massa(){
        $cotacao = Service::get($this->tabela, "id_status_cotacao", 1);
        if(!$cotacao){
            $id_cotacao = Service::inserir(["id_status_cotacao"=>1, "data_abertura"=>date('Y-m-d')], $this->tabela);
            $cotacao = Service::get($this->tabela, $this->campo, $id_cotacao);
        }
        
        $solicitacoes = ($_POST["idSolicitacao"]) ? $_POST["idSolicitacao"]:null;
        if($solicitacoes){
            SolicitacaoCotacaoService::inserirEmMassa($cotacao->id_cotacao, $solicitacoes);
            $this->redirect(URL_BASE."cotacao/cotar/" . $cotacao->id_cotacao);
        }
        
        $this->redirect(URL_BASE."solicitacao");
    }
    
    public function cotar($id_cotacao){
        $cotacao = Service::get($this->tabela, $this->campo, $id_cotacao);
        if(!$cotacao){
            $this->redirect(URL_BASE."cotacao");
        }
        
        if($cotacao->id_status_cotacao > 1){
            $this->redirect(URL_BASE."cotacao");
        }
        
        $dados["cotacao"] = $cotacao;
        $dados["solicitacoes"]          = SolicitacaoService::listaPorStatus(1);
        $dados["fornecedores"]          = Service::lista("fornecedor");
        $dados["solicitacoes_cotacao"]  = SolicitacaoCotacaoService::listaPorCotacao($id_cotacao);
        $dados["fornecedores_cotacao"]  = FornecedorCotacaoService::listaPorCotacao($id_cotacao);
        $dados["view"] = "Cotacao/Create";
        $this->load("template", $dados);
    }
    
    public function salvar(){
        $cotacao = new \stdClass();
        $cotacao->id_cotacao            = $_POST["id_cotacao"];
        $cotacao->id_usuario_solicitou      = $_POST["id_usuario_solicitou"];
        $cotacao->id_produto                = $_POST["id_produto"];
        $cotacao->qtde                      = $_POST["qtde"];
        $cotacao->data_cotacao          = date('Y-m-d');
        $cotacao->hora_cotacao          = date('H:i');
        $cotacao->id_status_cotacao     = 1;

        Flash::setForm($cotacao);
        CotacaoService::salvar($cotacao, $this->campo, $this->tabela);
            
            $this->redirect(URL_BASE."cotacao");
        
    }
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."cotacao");
    }
    
    public function finalizar($id_cotacao){
        
        $solicitacoes_cotacao  = SolicitacaoCotacaoService::listaPorCotacao($id_cotacao);
        $fornecedores_cotacao  = FornecedorCotacaoService::listaPorCotacao($id_cotacao);
        
        if(!$solicitacoes_cotacao || !$fornecedores_cotacao){
            $this->redirect(URL_BASE."cotacao/cotar/" . $id_cotacao);
        }
        
        foreach($fornecedores_cotacao as $f){
            
            foreach($solicitacoes_cotacao as $s){
                $item = new \stdClass();
                $item->id_cotacao               = $id_cotacao;
                $item->id_fornecedor            = $f->id_fornecedor;
                $item->id_solicitacao           = $f->id_solicitacao;
                $item->id_produto               = $s->id_produto;
                $item->qtde                     = $s->qtde;
                $item->id_status_item_cotacao   = 1;
                
                $tem = ItemcotacaoService::getItemCotacaoFornecedor($item->id_cotacao, $item->id_fornecedor, $item->id_solicitacao);
                if(!$tem){
                    Service::inserir(objToArray($item), "compra_item_cotacao");
                }
                
            }
            
        }
        
        Service::editar(["id_status_cotacao"=>2, "id_cotacao"=>$id_cotacao],  "id_cotacao","compra_cotacao");
        
        $this->redirect(URL_BASE."cotacao");
    }
}
?>

