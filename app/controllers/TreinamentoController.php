<?php
namespace app\controllers;

use app\core\Controller;
use app\core\Flash;
use app\models\service\TreinamentoService;
use app\models\service\Service;
use app\util\UtilService;

class TreinamentoController extends Controller{
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
        $data1 = date('Y-m-d');
        $data2 = date('Y-m-d', strtotime($data1 . ' +1 day'));
        $dados["lista"]             = TreinamentoService::lista();  
        $dados["datas"]             = TreinamentoService::listapordata($data1,$data2);  
        $dados["clientes"]          = TreinamentoService::listaclientes("cliente");
        $dados["instrutores"]       = TreinamentoService::listainstrutor();
        $dados["formatos"]          = Service::lista("posvenda_treinamento_formato");
        $dados["tipoocupacao"]      = Service::lista("posvenda_treinamento_ocupacao");
        $dados["horarios"]          = TreinamentoService::listaHorariotreinamento();
        $dados["horariossala"]      = TreinamentoService::listaHorario("posvenda_treinamento_horario");
        $dados["produtos"]          = TreinamentoService::listaiproduto("produto");
        $dados["usos"]              = Service::lista("posvenda_treinamento_uso");
        $dados["salas"]             = Service::lista("posvenda_treinamento_sala");
        $dados["view"]              = "treinamento/Index";
        $this->load("template", $dados);
    }
    
    
    
    public function edit($id){
        $treinamento = Service::get($this->tabela, $this->campo, $id);
        if(!$treinamento){
            } else {
                $this->redirect(URL_BASE."treinamento?id_responsavel=".$treinamento->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe."/");
        }
        
        $dados["view"]          = "treinamento";
        $this->load("template", $dados);
    }
    
    
    
    public function salvar(){
        $treinamento = new \stdClass();
        $treinamento->id_treinamento            = $_POST["id_treinamento"];
        $dataf_pr = $_POST["data_evento"];
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data_cad_e_in = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        $treinamento->data_inicio               = $data_cad_e_in;
        $treinamento->id_cliente                = $_POST["id_cliente"];
        $treinamento->id_usuario                = $_SESSION[SESSION_LOGIN]->id_usuario;
        $treinamento->id_ocupacao               = ($_POST["id_ocupacao"]) ? $_POST["id_ocupacao"]: "1";
        $treinamento->id_formato                = $_POST["id_formato"];
        $treinamento->id_horario                = $_POST["id_horario"];
        $treinamento->id_responsavel            = $_POST["id_responsavel"];
        $data_e                                 = $_POST['data_e'];
        
        //$treinamento->id_treinamento            = ($id_treinamento)?$id_treinamento:$data_e.$treinamento->id_horario.$treinamento->id_formato.$treinamento->id_responsavel;
        $treinamento->id_produto                = $_POST["id_produto"];
        $treinamento->pratica                   = $_POST["pratica"];
        $treinamento->pedido                    = $_POST["pedido"];
        $treinamento->id_uso                    = ($_POST["id_uso"]) ? $_POST["id_uso"]: "1";
        $treinamento->concluido                 = $_POST["concluido"];
        $treinamento->obs_treinamento           = ($_POST["obs_treinamento"]) ? ($_POST["obs_treinamento"]): "Sem Observações";
        $treinamento->certificado               = $_POST["certificado"];
        $treinamento->confirmado               = $_POST["confirmado"];
        $edicao                                 = $_POST['id_edicao'];
        $di                                     = $_POST['ide'];


        Flash::setForm($treinamento);
        
        if(TreinamentoService::salvar($treinamento, $this->campo, $this->tabela)){
            $this->redirect(URL_BASE."treinamento"."?id_responsavel=".$treinamento->id_responsavel."&dat=".$di);
        }else{
            
            TreinamentoService::salvar($treinamento, $treinamento->id_treinamento, $this->tabela);
            
           
            if(!$treinamento->id_treinamento){
                
               $this->redirect(URL_BASE."treinamento"."?id_responsavel=".$treinamento->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
            }else{
               $this->redirect(URL_BASE."treinamento"."?id_responsavel=".$treinamento->id_responsavel."&dat=".$di."&data_fim=".$df."&pesquisar=".$pe."&/edit/".$treinamento->id_treinamento);
            }
        }
    }
    
    //salvando item
    
    public function exportar(){
        $dados["lista"] = TreinamentoService::lista();
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
        $datai_pr = $_GET["data_inicio"];
        $datai = explode("/", $datai_pr);
        $validai = checkdate((int)$datai[1], (int)$datai[0], (int)$datai[2]);
        $data1 = $datai[2]."-".$datai[1]."-".$datai[0];
        $dataf_pr = $_GET["data_fim"];
        $dataf = explode("/", $dataf_pr);
        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
        $data2 = $dataf[2]."-".$dataf[1]."-".$dataf[0];
        
        $dados["lista"]             = TreinamentoService::lista();
        $dados["datas"]             = TreinamentoService::listapordata($data1,$data2);
        $dados["clientes"]          = TreinamentoService::listaclientes("cliente");
        $dados["instrutores"]       = TreinamentoService::listainstrutor();
        $dados["formatos"]          = Service::lista("posvenda_treinamento_formato");
        $dados["tipoocupacao"]      = Service::lista("posvenda_treinamento_ocupacao");
        $dados["horarios"]          = TreinamentoService::listaHorariotreinamento();
        $dados["horariossala"]      = TreinamentoService::listaHorario("posvenda_treinamento_horario");
        $dados["produtos"]          = TreinamentoService::listaiproduto("produto");
        $dados["usos"]              = Service::lista("posvenda_treinamento_uso");
        $dados["salas"]             = Service::lista("posvenda_treinamento_sala");
        $dados["view"]  = "treinamento/Index";
        $this->load("template", $dados);
    }
    
    public function create(){
        $dados["treinamento"]       = Flash::getForm();
        $dados["clientes"]      = Service::lista("cliente");
        $dados["status"]        = Service::lista("posvendas_status_atendimento");
        $dados["usuarios"]      = Service::lista("usuario");
        $dados["marcas"]        = Service::lista("produto_marca");
        $dados["incidentes"]    = Service::lista("posvenda_incidente");
        $dados["respostas"]     = Service::lista("posvenda_resposta_padrao");
        $dados["notificacoes"]  = Service::lista("posvenda_notificacao");
        $dados["salas"]         = Service::lista("posvenda_treinamento_sala");
        $dados["view"] = "treinamento";
        $this->load("template", $dados);
    }
    
    
    public function excluir($id){
        Service::excluir($this->tabela, $this->campo, $id);
         $this->redirect(URL_BASE."treinamento"."?id_responsavel=".$treinamento->id_responsavel."&data_inicio1=".$di."&data_fim1=".$df."&pesquisar=".$pe);
    }
    
    public function excluiritemgrupo($id){
        
        $ide = $_GET['ide'];
        $dat = $_GET['dat'];
        $id_responsavel = $_GET['id_responsavel'];
        //echo $ide." | ".$dat." | ".$id_responsavel;

        Service::excluir("posvenda_treinamento_grupo", "id_treinamento_grupo", $id);
        $this->redirect(URL_BASE."treinamento"."?ide=".$ide."&dat=".$dat."&id_responsavel=".$id_responsavel);
    }


    public function buscar($q){
        $treinamentos = Service::getLike($this->tabela, "treinamento", $q, true);
        echo json_encode($treinamentos);
    }
    
    public function salvargrupo(){
        $grupo = new \stdClass();
        $grupo->id_treinamento_grupo      = $_POST["id_treinamento_grupo"];
        $grupo->id_treinamento            = $_POST["id_treinamento"];
        $grupo->id_cliente                = $_POST["id_cliente"];
        $grupo->pedido                    = $_POST["pedido"];
        $grupo->id_uso                    = ($_POST["id_uso"]) ? $_POST["id_uso"]: "1";
        $grupo->concluido                 = $_POST["concluido"];
        $grupo->obs_treinamento           = ($_POST["obs_treinamento"]) ? ($_POST["obs_treinamento"]): "Sem Observações";
        $grupo->certificado               = $_POST["certificado"];
        $grupo->confirmado               = $_POST["confirmado"];
        $ide                              = $_POST["ide"];
        $id_responsavel                   = $_POST["id_responsavel"];
        $inicio                           = $_POST["dat"];


        
        Flash::setForm($grupo);
        
        if(TreinamentoService::salvar($grupo, "id_treinamento_grupo", "posvenda_treinamento_grupo")){
            if($grupo->concluido == "s"){
            Service::editar(["concluido"=>$grupo->concluido, "id_treinamento"=>$grupo->id_treinamento], "id_treinamento", "posvenda_treinamento");
            } else {};
            $this->redirect(URL_BASE."treinamento"."?ide=".$ide."&id_responsavel=".$id_responsavel."&dat=".$inicio);
        }else{
            TreinamentoService::salvar($grupo, $grupo->id_treinamento, $this->tabela);
            if(!$treinamento->id_treinamento){
                
                $this->redirect(URL_BASE."treinamento"."?ide=".$ide."&id_responsavel=".$id_responsavel."&dat=".$inicio);
            }else{
                $this->redirect(URL_BASE."treinamento"."?ide=".$ide."&id_responsavel=".$id_responsavel."&dat=".$inicio."&/edit/".$grupo->id_treinamento);
            }
        }
    }
    
}


?>
