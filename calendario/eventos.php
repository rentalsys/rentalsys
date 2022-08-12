<?php include_once '../db.php';?>
<?php                            
                    $dados = $conex->query("SELECT * 
                             FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN produto AS p
                                    ON t.id_produto   = p.id_produto
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente   = c.id_cliente
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE
                                    t.id_formato        = '1' GROUP BY t.id_treinamento
                            ");
                    $dados->execute();
                    
                    $eventos = [];
                    
                    while($rows_events = $dados->fetch(PDO::FETCH_ASSOC)){
                        $feriado         = $rows_events['feriado'];
                        
                        if($feriado == "s"){
                            
                            $title      = $rows_events['titulo_feriado'];
                            $start      = $rows_events['data_inicio'];
                            $endInicial = date('Y-m-d', strtotime($start));
                            $end        = $rows_events['data_fim'];
                            $endFinal   = date('Y-m-d', strtotime($end));
                            $display    = "'background'";
                            
                            
                            
                            $eventos[] = [
                                'id'                => $id,
                                'title'             => $title,
                                'start'             => $endInicial,
                                'display'           => "background",
                                'color'             => "#A2B5CD",
                                'overlap'           => false,
                                'constraint'        => "availableForMeeting",
                                'editable'          => false
                                
                            ];
                            
                            
                            
                        } else {
                        
                        
                        $id         = $rows_events['id_treinamento'];
                        $ocup       = $rows_events['id_ocupacao'];
                        if($rows_events['confirmado'] == "s"){
                            $conf = "[CONFIRMADO] ";
                        } else {};
                        if($rows_events['concluido'] == "s"){
                            $concluido = "[CONCLUÍDO] ";
                        } else {};
                        if($rows_events['id_tipo'] == "1"){
                            $tp = "";
                        } else {
                            $tp = "[".strtoupper($rows_events['tipo'])."] ";
                        };
                        if($ocup == 1){
                            $title      = strtoupper($conf).strtoupper($tp).strtoupper($rows_events['nome_usuario'])." | ".strtoupper($rows_events['produto'])." | ".strtoupper($rows_events['nome']);
                        } else {
                            $title      = strtoupper($conf).strtoupper($tp).strtoupper($rows_events['nome_usuario'])." | ".strtoupper($rows_events['produto'])." | ".strtoupper($rows_events['ocupacao']);
                        }
                        
                        //$title      = strtoupper($rows_events['nome_usuario']);
                        $cliente    = strtoupper($rows_events['formato']);
                        $color      = $rows_events['color'];
                        $textColor  = $rows_events['id_responsavel'];
                        $start      = $rows_events['data_inicio'];
                        $end        = $rows_events['data_fim'];
                        
                        $eventos[] = [
                            'id'            => $id,
                            'title'         => $title,
                            'color'         => $color,
                            'textColor'     => $textColor,
                            'start'         => $start,
                            'end'           => $end
                            
                        ];
                        
                        }
                        
                        
                    }
                    
                    echo json_encode($eventos);
?>