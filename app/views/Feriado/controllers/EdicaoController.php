<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$query_event = "
                SELECT * 
                FROM   posvenda_treinamento 
                WHERE
                id_treinamento=?";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$idEvento);
$select_event->execute();
$f=$select_event->fetch(\PDO::FETCH_ASSOC);
echo json_encode($f);
