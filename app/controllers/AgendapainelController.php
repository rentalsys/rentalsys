<?php

namespace app\controllers;

use app\core\Controller;

use app\core\Flash;
use app\models\service\AgendaService;
use app\models\service\Service;
use app\util\UtilService;

class AgendapainelController extends Controller{
    private $tabela     = "posvenda_agenda";
    private $campo      = "id";

    
    public function index(){  
        $data1 = date('Y-m-d');
        $data2 = date('Y-m-d', strtotime($data1 . ' +1 day'));
        $dados["clientes"]          = AgendaService::listaclientes("cliente");
        $dados["instrutores"]       = AgendaService::listainstrutor();
        $dados["formatos"]          = Service::lista("posvenda_treinamento_formato");
        $dados["tipoocupacao"]      = Service::lista("posvenda_treinamento_ocupacao");
        $dados["horarios"]          = AgendaService::listaHorarioagenda();
        $dados["horariossala"]      = AgendaService::listaHorario("posvenda_agenda_horario");
        $dados["produtos"]          = AgendaService::listaiproduto("produto");
        $dados["usos"]              = Service::lista("posvenda_treinamento_uso");
        $dados["salas"]             = Service::lista("posvenda_treinamento_sala");
        $dados["responsavel"]       = AgendaService::Responsavel();
        $dados["responsavels"]       = AgendaService::ResponsavelSemana();
        $dados["view"]              = "AgendaPainel/Index";
        $this->load("agendapainel", $dados);
    }

    
}


?>
