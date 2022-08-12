<?php
include_once '../../db.php';
$idCliente = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$query_event = "
                SELECT *
                FROM  cliente 
                WHERE
                id_cliente='$idCliente'";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$idCliente);
$select_event->execute();
$f=$select_event->fetch(\PDO::FETCH_ASSOC);
echo json_encode($f);