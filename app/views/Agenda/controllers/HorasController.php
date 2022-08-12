<?php
include_once '../../db.php';
$hstart = $_POST['hstart'].':00';
$query_event = "select * from posvenda_treinamento_horario where inicio = ? or fim = ?";
$insert_event = $conex->prepare($query_event);
$insert_event->bindValue(1,$hstart);
$insert_event->bindValue(2,$hstart);
$insert_event->execute();
$f=$insert_event->fetch(\PDO::FETCH_ASSOC);
$b = $conex->prepare("select * from posvenda_treinamento_horario where id_horario >= ?");
$b->bindValue(1,$f['id_horario']);
$b->execute();
if($b->rowCount() > 0){
    echo json_encode($returnFinal = $b->fetchAll(\PDO::FETCH_ASSOC));
}else{
    echo json_encode('error');
}

