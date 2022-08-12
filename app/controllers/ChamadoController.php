<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ChamadoService;
use app\models\service\Service;
use app\util\UtilService;

class ChamadoController extends Controller{
    private $tabela     = "posvenda_chamado";
    private $tabela1    = "posvenda_chamado_item";
    private $campo      = "id_chamado";
       
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    public function index(){  
        $data2 = date('Y-m-d');
        $data1 = date('Y-m-d', strtotime($data2. ' - 60 days'));
        $dados["lista"] = ChamadoService::lista($data1,$data2);  
        $dados["chamado"]  = ChamadoService::listaTotalData($data1,$data2);
        $dados["listast"] = ChamadoService::listast($data1,$data2);         
        
        $dados["aberto"]  = Service::getSomaExeto("posvenda_chamado", "somatoria","id_status_atendimento",6);
        
        $dados["abertohoje"]    = Service::getSomaData("posvenda_chamado", "somatoria","id_status_atendimento",6,"data_abertura");
        $dados["fechadohoje"]    = Service::getExetoData("posvenda_chamado", "somatoria","id_status_atendimento",6,"data_fechamento");
        
        $dados["statusatendimentos"] = Service::lista("posvendas_status_atendimento");
        $dados["clientes"] = Service::lista("cliente");
        $dados["view"]  = "Chamado/Index";
        $this->load("template", $dados);
    }
    
    public function exportar(){
        $data1 = $_GET["data_inicio1"];
        $data2 = $_GET["data_fim1"];
        $dados["lista"] = ChamadoService::lista($data1,$data2);
        $arquivo    = date('Ymd').'_chamados.xls';
        
        $tabela     = '<table border="1">';
        $tabela     .= '<tr>';
        $tabela     .= '<td colspan="11">Relatório de Chamados RentalMed</td>';
        $tabela     .= '</tr>';
        $tabela     .= '<tr>';
        $tabela     .= '<td><b>ID Chamado</b></td>';
        $tabela     .= '<td><b>Vencido</b></td>';
        $tabela     .= '<td><b>Status</b></td>';
        $tabela     .= '<td><b>Cliente</b></td>';
        $tabela     .= '<td><b>Assunto</b></td>';
        $tabela     .= '<td><b>Fabricante</b></td>';
        $tabela     .= '<td><b>Duração</b></td>';
        $tabela     .= '<td><b>Abertura</b></td>';
        $tabela     .= '<td><b>Incidente</b></td>';
        $tabela     .= '<td><b>Usuário</b></td>';
        $tabela     .= '<td><b>Atualizado</b></td>';;
        $tabela     .= '<td><b>SLA (dias)</b></td>';
        $tabela     .= '</tr>';
        foreach ($dados["lista"] as $pla){
            $tabela     .= '<tr>';
            $tabela     .= '<td>'.$pla->id_chamado.'</td>';
            $data_limite = date('d/m/Y', strtotime('+30 days', strtotime($pla->data_abertura)));
            $data_limite_ing = date('Y-m-d', strtotime('+30 days', strtotime($pla->data_abertura)));
            $hoje = date('d/m/Y', strtotime(date('Y-m-d')));
            //echo $data_limite."<br>";
            //echo $hoje."<br>";
            $diferenca = strtotime($data_limite_ing) - strtotime(date('Y-m-d'));
            $dias = floor($diferenca / (60 * 60 * 24));
            if($dias > 0){
                $vencido = " ";
            } else {
                $vencido = "Sim";
            }
            $tabela     .= '<td>'.$vencido.'</td>';
            $tabela     .= '<td>'.$pla->posvendas_status_atendimento.'</td>';
            $tabela     .= '<td>'.$pla->nome.'</td>';
            $tabela     .= '<td>'.$pla->assunto_chamado.'</td>';
            $tabela     .= '<td>'.$pla->marca.'</td>';
            
            $data_a = date('Y-m-d', strtotime($pla->data_abertura));
            $hoje = date('d/m/Y', strtotime(date('Y-m-d')));
            //echo $data_limite."<br>";
            //echo $hoje."<br>";
            $duracao =  strtotime(date('Y-m-d')) - strtotime($data_a);
            $duracao_dias = floor($duracao / (60 * 60 * 24));
            $tabela     .= '<td>'.$duracao_dias.'</td>';
            $tabela     .= '<td>'.date('d/m/Y H:m', strtotime($pla->data_abertura)).'</td>';
            $tabela     .= '<td>'.$pla->incidente.'</td>';
            $tabela     .= '<td>'.$pla->nome_usuario.'</td>';
            $tabela     .= '<td>'.date('d/m/Y H:m', strtotime($pla->data_atualizacao)).'</td>';
            $data_limite = date('d/m/Y', strtotime('+30 days', strtotime($pla->data_abertura)));
            $data_limite_ing = date('Y-m-d', strtotime('+30 days', strtotime($pla->data_abertura)));
            $hoje = date('d/m/Y', strtotime(date('Y-m-d')));
            //echo $data_limite."<br>";
            //echo $hoje."<br>";
            $diferenca = strtotime($data_limite_ing) - strtotime(date('Y-m-d'));
            $dias = floor($diferenca / (60 * 60 * 24));
            $tabela    .= '<td>'.$dias.'</td>';;
            $tabela     .= '</tr>';
        }
        
        $tabela     .= '</table>';
        
        header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
        header ("Cache-Control: no-cache, must-revalidate");
        header ("Pragma: no-cache");
        header ("Content-type: application/x-msexcel");
        header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
        header ("Content-Description: PHP Generated Data" );
        header("Content-Type: text/html; ISO-8859-1");
        $str = mb_convert_encoding($tabela, "iso-8859-15");
        echo $str;
    }
    
    public function filtro()
    {
        $filtro = new \stdClass();
        $filtro->id_status_atendimento = $_GET["st"];
        $data1br = ($_GET["data_inicio"])?$_GET["data_inicio"]:$_GET["data_inicio1"];
        $dataa = explode("/", $data1br);
        $validaa = checkdate((int)$dataa[1], (int)$dataa[0], (int)$dataa[2]);
        $data1 = $dataa[2]."-".$dataa[1]."-".$dataa[0];
        $data2br = ($_GET["data_fim"])?$_GET["data_fim"]:$_GET["data_fim1"];
        $dataa = explode("/", $data2br);
        $validaa = checkdate((int)$dataa[1], (int)$dataa[0], (int)$dataa[2]);
        $data2 = $dataa[2]."-".$dataa[1]."-".$dataa[0];
        $dados["lista"]     = ChamadoService::filtro($filtro,$data1,$data2);
        $dados["listast"] = ChamadoService::listast();
        $dados["chamado"]  = Service::getTotal("posvenda_chamado", "somatoria", 1);
        $dados["aberto"]  = Service::getSomaExeto("posvenda_chamado", "somatoria","id_status_atendimento",6);
        
        $dados["abertohoje"]    = Service::getSomaData("posvenda_chamado", "somatoria","id_status_atendimento",6,"data_abertura");
        $dados["fechadohoje"]    = Service::getExetoData("posvenda_chamado", "somatoria","id_status_atendimento",6,"data_fechamento");
        
        $dados["statusatendimentos"] = Service::lista("posvendas_status_atendimento");
        $dados["clientes"]      = ChamadoService::listaclientes("cliente");
        $dados["view"]  = "Chamado/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["chamado"]       = Flash::getForm();
        $dados["clientes"]      = ChamadoService::listaclientes("cliente");
        $dados["status"]        = Service::lista("posvendas_status_atendimento");
        $dados["usuarios"]      = Service::lista("usuario");
        $dados["marcas"]        = Service::lista("produto_marca");
        $dados["incidentes"]    = Service::lista("posvenda_incidente");
        $dados["respostas"]     = Service::lista("posvenda_resposta_padrao");
        $dados["notificacoes"]  = Service::lista("posvenda_notificacao");
        $dados["chamadoitens"]  = ChamadoService::listaitens($id);
        $dados["chamadoanexo"]  = ChamadoService::listaanexo($id);
        $dados["view"] = "Chamado/Create";
        $this->load("template", $dados);
    }
    
    public function edit($id){
        $chamado = Service::get($this->tabela, $this->campo, $id);
        if(!$chamado){
            
            if($chamado->id_fechamento == 6){
                $this->redirect(URL_BASE."chamado/edit/".$chamado->id_chamado);
            } else {
                $this->redirect(URL_BASE."chamado");
            }
        }
        
        $dados["chamado"]       = $chamado;
        $dados["clientes"]      = ChamadoService::listaclientes("cliente");
        $dados["status"]        = Service::lista("posvendas_status_atendimento");
        $dados["usuarios"]      = Service::lista("usuario");
        $dados["marcas"]        = Service::lista("produto_marca");
        $dados["incidentes"]    = Service::lista("posvenda_incidente");
        $dados["respostas"]     = Service::lista("posvenda_resposta_padrao");
        $dados["notificacoes"]  = Service::lista("posvenda_notificacao");
        $dados["fechamento"]    = Service::lista("posvenda_fechamento_chamado");
        $dados["chamadoitens"]  = ChamadoService::listaitens($id);
        $dados["chamadoanexo"]  = ChamadoService::listaanexo($id);
        $dados["view"]          = "Chamado/Create";
        $this->load("template", $dados);
    }
    
    
    
    public function salvar(){
        $chamado = new \stdClass();
        $chamado->id_chamado              = $_POST["id_chamado"];
        $chamado->id_cliente              = $_POST["id_cliente"];
        $chamado->assunto_chamado         = $_POST["assunto_chamado"];
        $chamado->id_status_atendimento   = $_POST["id_status_atendimento"];
        $chamado->id_usuario              = $_POST["id_usuario"];
        $chamado->id_marca                = $_POST["id_marca"];
        $chamado->num_pedido              = $_POST["num_pedido"];
        $chamado->id_incidente            = $_POST["id_incidente"];
        $chamado->id_resposta_padrao      = $_POST["id_resposta_padrao"];
        $chamado->descricao               = $_POST["descricao"];
        $chamado->id_notificacao          = $_POST["id_notificacao"];
        
        $dataa_pr                         = $_POST["data_abertura"];
        $dataa = explode("/", $dataa_pr);
        $validaa = checkdate((int)$dataa[1], (int)$dataa[0], (int)$dataa[2]);
        $data_cad_a_in = $dataa[2]."-".$dataa[1]."-".$dataa[0];
        $chamado->data_abertura         = $data_cad_a_in." ".date('H:i:s');
        
        $dataf_pr                         = ($_POST["data_fechamento"])?$_POST["data_fechamento"]:date('d/m/Y');
        //exit;
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data_cad_e_in = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        $chamado->data_fechamento         = $data_cad_e_in;
        $chamado->id_fechamento           = $_POST["id_fechamento"];
        $chamado->obs_fechamento          = $_POST["obs_fechamento"];
        $chamado->id_prioridade          = ($_POST["id_prioridade"])?$_POST["id_prioridade"]:1;
        $edicao                           = $_POST['id_edicao'];

        Flash::setForm($chamado);
        if(ChamadoService::salvar($chamado, $this->campo, $this->tabela)){
            if($_POST["fechamento"] == 's'  || $edicao != NULL){
                $this->redirect(URL_BASE."chamado/edit/".$chamado->id_chamado);
            } else {
            $this->redirect(URL_BASE."chamado");
            }
        }else{
            if(!$chamado->id_chamado){
                $this->redirect(URL_BASE."chamado/create");
            }else{
                $this->redirect(URL_BASE."chamado/edit/".$chamado->id_chamado);
            }
        }
    }
    
    //salvando item
    
    public function salvaritem(){
        $chamadoitem = new \stdClass();
        $chamadoitem->id_chamado              = $_POST["id_chamado"];
        $chamadoitem->id_status_atendimento   = $_POST["id_status_atendimento"];
        $chamadoitem->id_usuario              = $_POST["id_usuario"];
        $chamadoitem->id_incidente            = $_POST["id_incidente"];
        $chamadoitem->descricao_item          = $_POST["descricao_item"];
        $chamadoitem->id_notificacao          = $_POST["id_notificacao"];
        $chamadoitem->id_marca                = $_POST["id_marca"];
        $chamadoitem->data_item               = $_POST["data_item"];
        
        Flash::setForm($chamadoitem);
        
        $this->redirect(URL_BASE."chamado/edit/".$chamadoitem->id_chamado);
    }
    
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
        $this->redirect(URL_BASE."chamado");
    }
    
    public function excluirimg($ig){
        $img = $_GET['img'];
        //echo $img;
        //exit;
        Service::excluir("images_info", "image_id", $img);
        $this->redirect(URL_BASE."chamado/edit/".$ig);
    }

    public function buscar($q){
        $chamados = Service::getLike($this->tabela, "chamado", $q, true);
        echo json_encode($chamados);
    }
    
   
    
}

if (!empty($_FILES)) {
    $imagePath = isset($_FILES["file"]["name"]) ? $_FILES["file"]["name"] : "Undefined";
    $targetPath = "app/upload/";
    $imagePath = $targetPath . $imagePath;
    $tempFile = $_FILES['file']['tmp_name'];
    
    $nomearq = $_FILES['file']['name'];
    
    $targetFile = $targetPath . $_FILES['file']['name'];
    
    if (move_uploaded_file($tempFile, $targetFile)) {
        echo "true";
    } else {
        echo "false";
    }
}

if (!empty($_GET["action"]) && $_GET["action"] == "saveimg") {
    require_once ("db.php");
    $id_chamado             = $_POST['id_chamado'];
    $sql = "INSERT INTO images_info (image_path, id_chamado, nome_anexo) VALUES ('" . $imagePath . "','$id_chamado','$nomearq')";
    mysqli_query($conn, $sql);
}

if (!empty($_POST["action"]) && $_POST["action"] == "saveitem") {
    require_once ("db.php");
    $id_chamado             = $_POST['id_chamado'];
    $id_status_atendimento  = $_POST['id_status_atendimento'];
    $id_usuario             = $_POST['id_usuario'];
    $id_incidente           = $_POST['id_incidente'];
    $descricao_item         = addslashes($_POST['descricao_item']);
    $id_notificacao         = $_POST['id_notificacao'];
    $datai_pr               = ($_POST["data_item"])? $_POST["data_item"]:date('d/m/Y');
    $datai = explode("/", $datai_pr);
    $validai = checkdate((int)$datai[1], (int)$datai[0], (int)$datai[2]);
    $dataitem = $datai[2]."-".$datai[1]."-".$datai[0];
    
    $sql = "INSERT INTO posvenda_chamado_item (id_chamado, id_status_atendimento, id_usuario, id_incidente, descricao_item, id_notificacao, data_item) VALUES ('$id_chamado', '$id_status_atendimento', '$id_usuario', '$id_incidente', '$descricao_item', '$id_notificacao', '$dataitem')";
    mysqli_query($conn, $sql);
    
    $sqlu = "UPDATE posvenda_chamado SET
                data_atualizacao = '$dataitem'
                WHERE id_chamado = $id_chamado";
    mysqli_query($conn, $sqlu);

}

?>
