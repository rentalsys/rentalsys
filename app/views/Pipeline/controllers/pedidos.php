<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$query_event = "
                SELECT *
                FROM  venda_pedido AS t
                INNER JOIN usuario AS u
                ON t.id_usuario    = u.id_usuario
                INNER JOIN cliente AS c
                ON t.id_cliente    = c.id_cliente
                WHERE
                t.id_pedido='$idEvento'";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$idEvento);
$select_event->execute();
$f=$select_event->fetch(\PDO::FETCH_ASSOC);
echo json_encode($f);