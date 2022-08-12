<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'id',FILTER_DEFAULT);

$query_eventg = "delete from posvenda_treinamento_grupo where id_treinamento=?";
$select_eventg = $conex->prepare($query_eventg);
$select_eventg->bindValue(1,$idEvento);
$delg=$select_eventg->execute();


$query_event = "delete from posvenda_treinamento where id_treinamento=?";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$idEvento);
$del=$select_event->execute();
echo json_encode($del);
