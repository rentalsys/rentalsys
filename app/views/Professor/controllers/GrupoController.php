<?php
include_once '../../db.php';
$idGrupo = filter_input(INPUT_POST,'id_treinamento_grupo',FILTER_DEFAULT);
$query_grupo = "
                SELECT * 
                FROM   posvenda_treinamento_grupo AS g
                INNER JOIN posvenda_treinamento AS t
                ON g.id_treinamento    = t.id_treinamento
                INNER JOIN cliente AS c
                ON g.id_cliente    = c.id_cliente
                WHERE
                g.id_treinamento_grupo=?";
$select_grupo = $conex->prepare($query_grupo);
$select_grupo->bindValue(1,$idGrupo);
$select_grupo->execute();
$g=$select_grupo->fetch(\PDO::FETCH_ASSOC);
echo json_encode($g);
