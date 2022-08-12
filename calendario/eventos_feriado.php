<?php include_once '../db.php';?>
<?php                            
                    $dados = $conex->query("SELECT * 
                             FROM   posvenda_treinamento 
                                    WHERE
                                    feriado = 's'
                            ");
                    $dados->execute();
                    
                    $eventos = [];
                    
                    while($rows_events = $dados->fetch(PDO::FETCH_ASSOC)){
                        $id         = $rows_events['id_treinamento'];
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
                                'editable'          => true
                                

                                
                                
                            ];


                    }
                    
                    echo json_encode($eventos);
?>