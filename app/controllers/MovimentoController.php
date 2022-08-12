<?php
namespace app\controllers;

use app\core\Controller;
use app\models\service\Service;
use app\core\Flash;
use app\models\service\MovimentoService;
use app\util\UtilService;

class MovimentoController extends Controller{
    private $tabela = "movimento";
    private $campo  = "id_movimento";
    
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){
        $dados["lista"] = MovimentoService::listaMovimento($this->tabela);
        $dados["produtos"] = Service::lista("produto");
        $dados["view"]   = "Movimento/Index";
        $this->load("template", $dados);
    }
    
    public function filtro()
    {
        $filtro = new \stdClass();
        $filtro->id_produto = $_GET["id_produto"];
        if($_GET["data1"]){
            $filtro->data1      = implode("-",array_reverse(explode("/",$_GET["data1"])));
        } else {
            $filtro->data1      = implode("-",array_reverse(explode("/",$_GET["data1a"])));
        }
        if($_GET["data2"]){
            $filtro->data2      = implode("-",array_reverse(explode("/",$_GET["data2"])));
        } else {
            $filtro->data2      = implode("-",array_reverse(explode("/",$_GET["data2a"])));
        }
        $dados["lista"]     = MovimentoService::filtro($filtro);
        $dados["produto"]  = Service::get("produto", "id_produto", $filtro->id_produto);
        $dados["produtos"]  = Service::lista("produto");
        $dados["view"]      = "Movimento/Index";
        $this->load("template", $dados);
    }
    
    
}
?>

