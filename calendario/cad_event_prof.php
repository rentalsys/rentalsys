<?php include_once '../db.php';?>
<?php   
session_start();
$startFinal = implode("-",array_reverse(explode("/", $_POST['start'])));
$endFinal = implode("-",array_reverse(explode("/", $_POST['start'])));

$start = $startFinal;
$end = $startFinal;

$query_event = "INSERT INTO posvenda_treinamento 
(id_responsavel, data_inicio, data_fim, id_formato, id_ocupacao, id_usuario, id_produto, id_cliente, id_uso, pedido, concluido, obs_treinamento, certificado, id_tipo, confirmado, nequip, disponivel) 
VALUE 
(:id_responsavel, :data_inicio, :data_fim, :id_formato, :id_ocupacao, :id_usuario, :id_produto, :id_cliente, :id_uso, :pedido, :concluido, :obs_treinamento, :certificado, :id_tipo, :confirmado, :nequip, :disponivel)";
$insert_event = $conex->prepare($query_event);
$insert_event->bindValue(':id_responsavel',$_POST['id_responsavel']);
$insert_event->bindValue(':id_formato',$_POST['id_formato']);
$insert_event->bindValue(':id_ocupacao',$_POST['id_ocupacao_inserir']);
$insert_event->bindValue(':id_usuario',$_POST['id_usuario']);
$insert_event->bindValue(':id_produto',isset($_POST['id_produto'])?$_POST['id_produto']:0);
$insert_event->bindValue(':id_cliente',isset($_POST['id_cliente'])?$_POST['id_cliente']:0);
$insert_event->bindValue(':id_uso',isset($_POST['id_uso'])?$_POST['id_uso']:1);
$insert_event->bindValue(':pedido',isset($_POST['pedido'])?$_POST['pedido']:"Sem Número");
$insert_event->bindValue(':concluido', isset($_POST['concluido_insert'])?$_POST['concluido_insert']:"n");
$insert_event->bindValue(':obs_treinamento',($_POST['obs_treinamento'])?$_POST['obs_treinamento']:"Sem Observação");
$insert_event->bindValue(':certificado',isset($_POST['certificado_insert'])?$_POST['certificado_insert']:"n");
$insert_event->bindValue(':id_tipo',isset($_POST['id_tipo_inserir'])?$_POST['id_tipo_inserir']:1);
$insert_event->bindValue(':nequip',isset($_POST['nequip'])?$_POST['nequip']:1);
$insert_event->bindValue(':confirmado',isset($_POST['confirmado'])?$_POST['confirmado']:"n");
$insert_event->bindValue(':disponivel',isset($_POST['disponivel'])?$_POST['disponivel']:"n");

$insert_event->bindValue(':data_inicio', $start.' '.$_POST['hstart']);
$insert_event->bindValue(':data_fim', $end.' '.$_POST['hend']);

if($insert_event->execute()){
    $retorna = ['sit' => true, 'msg' => 'Evento Cadastrado'];
    $_SESSION['msg'] = '';
} else {
    $retorna = ['sit' => true, 'msg' => 'Evento Não Cadastrado'];
}

header('Content-Type: application/json');
echo json_encode($retorna);
?>