<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\ProfessorService;
use app\models\service\Service;
use app\util\UtilService;

class ProfessorController extends Controller{
    private $tabela     = "posvenda_professor";
    private $campo      = "id";
       
    public function __construct(){
        $this->usuario = UtilService::getUsuario();
        if(!$this->usuario){
            $this->redirect(URL_BASE ."login");
            exit;
        }
    }
    
    
    
    public function index(){  
        $data1 = date('Y-m-d');
        $data2 = date('Y-m-d', strtotime($data1 . ' +1 day'));
        $dados["lista"]             = ProfessorService::lista();  
        $dados["datas"]             = ProfessorService::listapordata($data1,$data2);  
        $dados["clientes"]          = ProfessorService::listaclientes("cliente");
        $dados["instrutores"]       = ProfessorService::listainstrutor();
        $dados["formatos"]          = Service::lista("posvenda_treinamento_formato");
        $dados["tipoocupacao"]      = Service::lista("posvenda_treinamento_ocupacao");
        $dados["horarios"]          = ProfessorService::listaHorarioprofessor();
        $dados["horariossala"]      = ProfessorService::listaHorario("posvenda_professor_horario");
        $dados["produtos"]          = ProfessorService::listaiproduto("produto");
        $dados["usos"]              = Service::lista("posvenda_treinamento_uso");
        $dados["salas"]             = Service::lista("posvenda_treinamento_sala");
        $dados["view"]              = "Professor/Index";
        $this->load("template", $dados);
    }
    
    
    
    public function edit($id){
        $professor = Service::get($this->tabela, $this->campo, $id);
        if(!$professor){
            } else {
                $this->redirect(URL_BASE."professor?id_responsavel=".$professor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe."/");
        }
        
        $dados["view"]          = "professor";
        $this->load("template", $dados);
    }
    
    
    
    public function salvar(){
        $professor = new \stdClass();
        $professor->id_professor            = $_POST["id_professor"];
        $dataf_pr = $_POST["data_evento"];
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data_cad_e_in = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        $professor->data_evento               = $data_cad_e_in;
        $professor->id_cliente                = $_POST["id_cliente"];
        $professor->id_usuario                = $_SESSION[SESSION_LOGIN]->id_usuario;
        $professor->id_ocupacao               = ($_POST["id_ocupacao"]) ? $_POST["id_ocupacao"]: "1";
        $professor->id_formato                = $_POST["id_formato"];
        $professor->id_horario                = $_POST["id_horario"];
        $professor->id_responsavel            = $_POST["id_responsavel"];
        $data_e                                 = $_POST['data_e'];
        
        //$professor->id_professor            = ($id_professor)?$id_professor:$data_e.$professor->id_horario.$professor->id_formato.$professor->id_responsavel;
        $professor->id_produto                = $_POST["id_produto"];
        $professor->pratica                   = $_POST["pratica"];
        $professor->pedido                    = $_POST["pedido"];
        $professor->id_uso                    = ($_POST["id_uso"]) ? $_POST["id_uso"]: "1";
        $professor->concluido                 = $_POST["concluido"];
        $professor->obs_professor             = ($_POST["obs_professor"]) ? ($_POST["obs_professor"]): "Sem Observações";
        $professor->certificado               = $_POST["certificado"];
        $professor->confirmado                = $_POST["confirmado"];
        $edicao                               = $_POST['id_edicao'];
        $di                                   = $_POST['data_inicio1'];
        $df                                   = $_POST['data_fim1'];
        $pe                                   = $_POST['pesquisar'];

        Flash::setForm($professor);
        
        if(ProfessorService::salvar($professor, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."professor"."?id_responsavel=".$professor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
        }else{
            ProfessorService::salvar($professor, $professor->id_professor, $this->tabela);
            if(!$professor->id_professor){
                
               $this->redirect(URL_BASE."professor"."?id_responsavel=".$professor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
            }else{
               $this->redirect(URL_BASE."professor"."?id_responsavel=".$professor->id_responsavel."&data_inicio=".$di."&data_fim=".$df."&pesquisar=".$pe."&/edit/".$professor->id_professor);
            }
        }
    }
    
    //salvando item
    
    public function exportar(){
        $dados["lista"] = ProfessorService::lista();
        $arquivo    = date('Ymd').'_professors.xls';
        
        $tabela     = '<table border="1">';
        $tabela     .= '<tr>';
        $tabela     .= '<td colspan="11">Relatório de professors RentalMed</td>';
        $tabela     .= '</tr>';
        $tabela     .= '<tr>';
        $tabela     .= '<td><b>ID professor</b></td>';
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
            $tabela     .= '<td>'.$pla->id_professor.'</td>';
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
            $tabela     .= '<td>'.$pla->assunto_professor.'</td>';
            
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
        $datai_pr = $_GET["data_inicio"];
        $datai = explode("/", $datai_pr);
        $validai = checkdate((int)$datai[1], (int)$datai[0], (int)$datai[2]);
        $data1 = $datai[2]."-".$datai[1]."-".$datai[0];
        $dataf_pr = $_GET["data_fim"];
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data2 = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        
        $dados["lista"]             = ProfessorService::lista();
        $dados["datas"]             = ProfessorService::listapordata($data1,$data2);
        $dados["clientes"]          = ProfessorService::listaclientes("cliente");
        $dados["instrutores"]       = ProfessorService::listainstrutor();
        $dados["formatos"]          = Service::lista("posvenda_treinamento_formato");
        $dados["tipoocupacao"]      = Service::lista("posvenda_treinamento_ocupacao");
        $dados["horarios"]          = ProfessorService::listaHorarioprofessor();
        $dados["horariossala"]      = ProfessorService::listaHorario("posvenda_professor_horario");
        $dados["produtos"]          = ProfessorService::listaiproduto("produto");
        $dados["usos"]              = Service::lista("posvenda_treinamento_uso");
        $dados["salas"]             = Service::lista("posvenda_treinamento_sala");
        $dados["view"]  = "professor/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["professor"]       = Flash::getForm();
        $dados["clientes"]      = Service::lista("cliente");
        $dados["status"]        = Service::lista("posvendas_status_atendimento");
        $dados["usuarios"]      = Service::lista("usuario");
        $dados["marcas"]        = Service::lista("produto_marca");
        $dados["incidentes"]    = Service::lista("posvenda_incidente");
        $dados["respostas"]     = Service::lista("posvenda_resposta_padrao");
        $dados["notificacoes"]  = Service::lista("posvenda_notificacao");
        $dados["salas"]         = Service::lista("posvenda_treinamento_sala");
        $dados["view"] = "professor";
        $this->load("template", $dados);
    }
    
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
         $this->redirect(URL_BASE."professor"."?id_responsavel=".$professor->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
    }
    
    public function excluirprofessor($id){
        
        $inst = $_GET['id_responsavel'];;
        $dt_i = $_GET['data_i'];
        $dt_f = $_GET['data_f'];
        echo $inst." ".$dt_i." ".$dt_f;
        Service::excluir("posvenda_professor", "id_professor", $id);
        $this->redirect(URL_BASE."professor"."?id_responsavel=".$inst."&data_inicio=".$dt_i."&data_fim=".$dt_f."&pesquisar=sim");
    }
    


    public function buscar($q){
        $professors = Service::getLike($this->tabela, "professor", $q, true);
        echo json_encode($professors);
    }
    
   
    
}


?>
