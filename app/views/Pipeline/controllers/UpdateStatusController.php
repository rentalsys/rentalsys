<?php
include_once '../../db.php';
$idElem = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$boardDestino = filter_input(INPUT_POST,'boardDestino',FILTER_DEFAULT);
$boardoOrigem = filter_input(INPUT_POST,'boardoOrigem',FILTER_DEFAULT);

if($boardoOrigem != 1 AND $boardDestino != 1){

$b = $conex->prepare("UPDATE venda_pedido SET id_status_pedido = ? WHERE id_pedido=?");
$b->bindValue(1,$boardDestino);
$b->bindValue(2,$idElem);
$execute = $b->execute();
echo ($execute)?json_encode(true):json_encode(false);
} else {}