<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$start = filter_input(INPUT_POST,'start',FILTER_DEFAULT);
$end = filter_input(INPUT_POST,'end',FILTER_DEFAULT);
$newDateStart = implode("-",array_reverse(explode("/", $start)));
$newDateEnd = implode("-",array_reverse(explode("/", $end)));

$b = $conex->prepare("UPDATE posvenda_treinamento SET data_inicio = ?, data_fim = ? WHERE id_treinamento=?");
$b->bindValue(1,$start);
$b->bindValue(2,$end);
$b->bindValue(3,$idEvento);
$execute = $b->execute();


echo json_encode($newDateEnd->format("d/m/Y"));