<?php include_once '../db.php';?>
<?php   
session_start();
$startFinal = implode("-",array_reverse(explode("/", $_POST['start'])));
$endFinal = implode("-",array_reverse(explode("/", $_POST['start'])));

$start = $startFinal;
$end = $startFinal;

$query_event = "INSERT INTO posvenda_treinamento 
(id_responsavel, data_inicio, data_fim, id_formato, id_ocupacao, id_usuario, id_produto, id_cliente, id_uso, id_tipo, pedido, concluido, obs_treinamento, certificado, feriado, titulo_feriado) 
VALUE 
(:id_responsavel, :data_inicio, :data_fim, :id_formato, :id_ocupacao, :id_usuario, :id_produto, :id_cliente, :id_uso, :id_tipo, :pedido, :concluido, :obs_treinamento, :certificado, :feriado, :titulo_feriado)";
$insert_event = $conex->prepare($query_event);
$insert_event->bindValue(':id_responsavel',"2");
$insert_event->bindValue(':id_formato',"1");
$insert_event->bindValue(':id_ocupacao',"1");
$insert_event->bindValue(':id_usuario',$_POST['id_usuario']);
$insert_event->bindValue(':id_produto',0);
$insert_event->bindValue(':id_cliente',0);
$insert_event->bindValue(':id_uso',"1");
$insert_event->bindValue(':id_tipo',"1");
$insert_event->bindValue(':pedido',"Sem Número");
$insert_event->bindValue(':concluido', "n");
$insert_event->bindValue(':obs_treinamento',"Sem Observação");
$insert_event->bindValue(':certificado',"n");
$insert_event->bindValue(':feriado',"s");
$insert_event->bindValue(':titulo_feriado',$_POST['nome_feriado']);

$insert_event->bindValue(':data_inicio', $start.':00:00');
$insert_event->bindValue(':data_fim', $end.':00:00 ');

if($insert_event->execute()){
    $retorna = ['sit' => true, 'msg' => 'Evento Cadastrado'];
    $_SESSION['msg'] = '';
} else {
    $retorna = ['sit' => true, 'msg' => 'Evento Não Cadastrado'];
}

header('Content-Type: application/json');
echo json_encode($retorna);
?>