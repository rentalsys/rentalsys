<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$idForma = filter_input(INPUT_POST,'id_forma',FILTER_DEFAULT);
$query_event = "
                SELECT *, SUM(IF(id_forma = 1, 1, 0)) AS primeiro
                FROM  venda_pedido_pagamento AS pg
                INNER JOIN venda_pedido AS p
                ON pg.id_pedido    = p.id_pedido
                INNER JOIN usuario AS u
                ON p.id_usuario    = u.id_usuario
                INNER JOIN cliente AS c
                ON p.id_cliente    = c.id_cliente
                WHERE
                pg.id_pedido='$idEvento' AND
                pg.id_forma='$idForma'";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$idEvento);
$select_event->bindValue(1,$idForma);
$select_event->execute();
$f=$select_event->fetch(\PDO::FETCH_ASSOC);
echo json_encode($f);