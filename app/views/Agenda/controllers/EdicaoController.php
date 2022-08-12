<?php
include_once '../../db.php';
$idEvento = filter_input(INPUT_POST,'id',FILTER_DEFAULT);
$query_event = "
                SELECT * 
                FROM   posvenda_treinamento AS t
                INNER JOIN usuario AS u
                ON t.id_responsavel    = u.id_usuario
                INNER JOIN posvenda_treinamento_ocupacao AS o
                ON t.id_ocupacao    = o.id_ocupacao
                INNER JOIN cliente AS c
                ON t.id_cliente    = c.id_cliente
                INNER JOIN produto AS p
                ON t.id_produto    = p.id_produto
                INNER JOIN posvenda_treinamento_uso AS us
                ON t.id_uso    = us.id_uso
                INNER JOIN posvenda_treinamento_tipo AS tp
                ON t.id_tipo    = tp.id_tipo
                WHERE
                t.id_treinamento=?";
$select_event = $conex->prepare($query_event);
$select_event->bindValue(1,$idEvento);
$select_event->execute();
$f=$select_event->fetch(\PDO::FETCH_ASSOC);
echo json_encode($f);
