<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\InstrutorService;
use app\models\service\Service;
use app\util\UtilService;

class InstrutorController extends Controller{
    private $tabela     = "posvenda_treinamento";
    private $campo      = "id_treinamento";
       
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    
    
    public function index(){  
       
        $dados["lista"]             = InstrutorService::lista();
        $dados["clientes"]          = InstrutorService::listaclientes("cliente");
        $dados["instrutores"]       = InstrutorService::listainstrutor();
        $dados["formatos"]          = Service::lista("posvenda_treinamento_formato");
        $dados["tipoocupacao"]      = Service::lista("posvenda_treinamento_ocupacao");
        $dados["horarios"]          = InstrutorService::listaHorariotreinamento();
        $dados["horariossala"]      = InstrutorService::listaHorario("posvenda_treinamento_horario");
        $dados["produtos"]          = Service::lista("produto");
        $dados["usos"]              = Service::lista("posvenda_treinamento_uso");
        $dados["salas"]             = Service::lista("posvenda_treinamento_sala");
        $dados["view"]              = "instrutor/Index";
        $this->load("template", $dados);
    }
    
    
    
    public function edit($id){
        $instrutor = Service::get($this->tabela, $this->campo, $id);
        if(!$instrutor){
            } else {
                $this->redirect(URL_BASE."instrutor?id_responsavel=".$instrutor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe."/");
        }
        
        $dados["view"]          = "instrutor";
        $this->load("template", $dados);
    }
    
    
    
    public function salvar(){
        $instrutor = new \stdClass();
        $instrutor->id_treinamento            = $_POST["id_treinamento"];
        $dataf_pr = $_POST["data_evento"];
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data_cad_e_in = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        $instrutor->data_evento               = $data_cad_e_in;
        $instrutor->id_cliente                = $_POST["id_cliente"];
        $instrutor->id_usuario                = $_SESSION[SESSION_LOGIN]->id_usuario;
        $instrutor->id_formato                = $_POST["id_formato"];
        $instrutor->id_horario                = $_POST["id_horario"];
        $instrutor->id_responsavel            = $_POST["id_responsavel"];
        $instrutor->id_ocupacao               = $_POST["id_ocupacao"];
        $data_e                               = $_POST['data_e'];
        
        //$instrutor->id_treinamento            = ($id_treinamento)?$id_treinamento:$data_e.$instrutor->id_horario.$instrutor->id_formato.$instrutor->id_responsavel;
        $instrutor->id_produto                = $_POST["id_produto"];
        $instrutor->pratica                   = $_POST["pratica"];
        $instrutor->pedido                    = $_POST["pedido"];
        $instrutor->id_uso                    = ($_POST["id_uso"]) ? $_POST["id_uso"]: "1";
        $instrutor->concluido                 = $_POST["concluido"];
        $instrutor->obs_treinamento           = ($_POST["obs_treinamento"]) ? ($_POST["obs_treinamento"]): "Sem Observações";
        $instrutor->certificado               = $_POST["certificado"];

        $edicao                                 = $_POST['id_edicao'];
        $di                                     = $_POST['data_inicio1'];
        $df                                     = $_POST['data_fim1'];
        $pe                                     = $_POST['pesquisar'];      

        Flash::setForm($instrutor);
        
        if(InstrutorService::salvar($instrutor, $this->campo, $this->tabela)){         
            $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$instrutor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
        }else{
            InstrutorService::salvar($instrutor, $instrutor->id_treinamento, $this->tabela);
            if(!$instrutor->id_treinamento){
                
                $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$instrutor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
            }else{
                $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$instrutor->id_responsavel."&data_inicio=".$di."&data_fim=".$df."&pesquisar=".$pe."&/edit/".$instrutor->id_treinamento);
            }
        }
    }
    
    public function salvargrupo(){
        $grupo = new \stdClass();
        $grupo->id_treinamento_grupo      = $_POST["id_treinamento_grupo"];
        $grupo->id_treinamento            = $_POST["id_treinamento"];
        $dataf_pr = $_POST["data_evento"];
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data_cad_e_in = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        $grupo->data_evento               = $data_cad_e_in;
        $grupo->id_cliente                = $_POST["id_cliente"];
        $grupo->id_usuario                = $_SESSION[SESSION_LOGIN]->id_usuario;
        $grupo->id_formato                = $_POST["id_formato"];
        $grupo->id_horario                = $_POST["id_horario"];
        $grupo->id_responsavel            = $_POST["id_responsavel"];
        $data_e                           = $_POST['data_e'];
        
        //$instrutor->id_treinamento            = ($id_treinamento)?$id_treinamento:$data_e.$instrutor->id_horario.$instrutor->id_formato.$instrutor->id_responsavel;
        $grupo->id_produto                = $_POST["id_produto"];
        $grupo->pratica                   = $_POST["pratica"];
        $grupo->pedido                    = $_POST["pedido"];
        $grupo->id_uso                    = ($_POST["id_uso"]) ? $_POST["id_uso"]: "1";
        $grupo->concluido                 = $_POST["concluido"];
        $grupo->obs_treinamento           = ($_POST["obs_treinamento"]) ? ($_POST["obs_treinamento"]): "Sem Observações";
        $grupo->certificado               = $_POST["certificado"];
        
        $edicao                           = $_POST['id_edicao'];
        $di                               = $_POST['data_inicio1'];
        $df                               = $_POST['data_fim1'];
        $pe                               = $_POST['pesquisar'];
        
        Flash::setForm($grupo);
        
        if(InstrutorService::salvar($grupo, "id_treinamento_grupo", "posvenda_treinamento_grupo")){
            $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$grupo->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
        }else{
            InstrutorService::salvar($grupo, $grupo->id_treinamento, $this->tabela);
            if(!$instrutor->id_treinamento){
                
                $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$grupo->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
            }else{
                $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$grupo->id_responsavel."&data_inicio=".$di."&data_fim=".$df."&pesquisar=".$pe."&/edit/".$grupo->id_treinamento);
            }
        }
    }
    
    //salvando item
    
    public function exportar(){
        $dados["lista"] = InstrutorService::lista();
        $arquivo    = date('Ymd').'_treinamentos.xls';
        
        $tabela     = '<table border="1">';
        $tabela     .= '<tr>';
        $tabela     .= '<td colspan="11">Relatório de treinamentos RentalMed</td>';
        $tabela     .= '</tr>';
        $tabela     .= '<tr>';
        $tabela     .= '<td><b>ID treinamento</b></td>';
        $tabela     .= '<td><b>Vencido</b></td>';
        $tabela     .= '<td><b>Status</b></td>';
        $tabela     .= '<td><b>Cliente</b></td>';
        $tabela     .= '<td><b>Assunto</b></td>';
        $tabela     .= '<td><b>Duração</b></td>';
        $tabela     .= '<td><b>Abertura</b></td>';
        $tabela     .= '<td><b>Incidente</b></td>';
        $tabela     .= '<td><b>Usuário</b></td>';
        $tabela     .= '<td><b>Atualizado</b></td>';;
        $tabela     .= '<td><b>SLA (dias)</b></td>';
        $tabela     .= '</tr>';
        foreach ($dados["lista"] as $pla){
            $tabela     .= '<tr>';
            $tabela     .= '<td>'.$pla->id_treinamento.'</td>';
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
            $tabela     .= '<td>'.$pla->assunto_treinamento.'</td>';
            
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
        $dados["lista"]     = InstrutorService::filtro($filtro);
        $dados["listast"] = InstrutorService::listast();
        $dados["treinamento"]  = Service::getTotal("posvenda_treinamento", "somatoria", 1);
        $dados["aberto"]  = Service::getSomaExeto("posvenda_treinamento", "somatoria","id_status_atendimento",6);
        
        $dados["abertohoje"]    = Service::getSomaData("posvenda_treinamento", "somatoria","id_status_atendimento",6,"data_abertura");
        $dados["fechadohoje"]    = Service::getExetoData("posvenda_treinamento", "somatoria","id_status_atendimento",6,"data_fechamento");
        
        $dados["statusatendimentos"] = Service::lista("posvendas_status_atendimento");
        $dados["clientes"] = Service::lista("cliente");
        $dados["salas"]         = Service::lista("posvenda_treinamento_sala");
        $dados["view"]  = "instrutor/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["instrutor"]       = Flash::getForm();
        $dados["clientes"]      = Service::lista("cliente");
        $dados["status"]        = Service::lista("posvendas_status_atendimento");
        $dados["usuarios"]      = Service::lista("usuario");
        $dados["marcas"]        = Service::lista("produto_marca");
        $dados["incidentes"]    = Service::lista("posvenda_incidente");
        $dados["respostas"]     = Service::lista("posvenda_resposta_padrao");
        $dados["notificacoes"]  = Service::lista("posvenda_notificacao");
        $dados["salas"]         = Service::lista("posvenda_treinamento_sala");
        $dados["view"] = "instrutor";
        $this->load("template", $dados);
    }
    
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
         $this->redirect(URL_BASE."instrutor"."?id_instrutor=".$instrutor->id_instrutor."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
    }
    
    public function excluirinstrutor($id){
        
        $inst = $_GET['id_responsavel'];;
        $dt_i = $_GET['data_i'];
        $dt_f = $_GET['data_f'];
        //echo $inst." ".$dt_i." ".$dt_f;
        //exit;
        Service::excluir("posvenda_treinamento_grupo", "id_treinamento", $id);
        Service::excluir("posvenda_treinamento", "id_treinamento", $id);

        $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$inst."&data_inicio=".$dt_i."&data_fim=".$dt_f."&pesquisar=sim");
    }
    
    public function excluiritemgrupo($id){
        
        $inst = $_GET['id_responsavel'];;
        $dt_i = $_GET['data_i'];
        $dt_f = $_GET['data_f'];;
        Service::excluir("posvenda_treinamento_grupo", "id_treinamento_grupo", $id);
        $this->redirect(URL_BASE."instrutor"."?id_responsavel=".$inst."&data_inicio=".$dt_i."&data_fim=".$dt_f."&pesquisar=sim");
    }
    


    public function buscar($q){
        $treinamentos = Service::getLike($this->tabela, "treinamento", $q, true);
        echo json_encode($treinamentos);
    }
    
   
    
}


?>
