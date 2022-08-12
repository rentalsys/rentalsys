<?php include_once '../db.php';?>
<?php                            
                    $idi = $_GET['id_responsalvel'];
                    $dados = $conex->query("SELECT * 
                             FROM   posvenda_treinamento AS t
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente    = c.id_cliente
                                    INNER JOIN produto AS p
                                    ON t.id_produto    = p.id_produto
                                    INNER JOIN posvenda_treinamento_tipo AS tp
                                    ON t.id_tipo    = tp.id_tipo
                                    WHERE
                                    t.id_formato = '1' OR
                                    t.id_responsavel = '$idi'
                                    GROUP BY t.id_treinamento
                            ");
                    $dados->execute();
                    
                    $eventos = [];
                    
                    while($rows_events = $dados->fetch(PDO::FETCH_ASSOC)){
                        
                        $feriado         = $rows_events['feriado'];
                        $confirmado      = $rows_events['confirmado'];
                        $crtenviado      = $rows_events['certificado'];
                        $concluido       = $rows_events['concluido'];
                        $id_cliente      = $rows_events['id_cliente '];
                        $data_fim        = $rows_events['data_fim'];
                        $id_ocupacao     = $rows_events['id_ocupacao'];
                        $disponivel      = $rows_events['disponivel'];
                        $data_evento      = $rows_events['data_inicio'];
                        $hoje = date('Y-m-d');
                        
                        

                        $id_t = $rows_events['id_treinamento'];
                        $dadosg = $conex->query("SELECT *
                             FROM   posvenda_treinamento_grupo 
                                    WHERE
                                    confirmado = 's' AND
                                    id_treinamento = '$id_t'");
                        $dadosg->execute();
                        $rows_eventsg = $dadosg->fetch(PDO::FETCH_ASSOC);
                        $id_g = $rows_eventsg['id_treinamento_grupo'];
                        $concluido_g = $rows_eventsg['concluido'];
                        
                        $hoje = date('Y-m-d');
                        
                        $dadosc = $conex->query("SELECT *
                             FROM   posvenda_treinamento_grupo
                                    WHERE
                                    concluido = 's' AND
                                    id_treinamento = '$id_t'");
                        $dadosc->execute();
                        $rows_eventsc = $dadosc->fetch(PDO::FETCH_ASSOC);
                        
                        $dadoscrt = $conex->query("SELECT *
                             FROM   posvenda_treinamento_grupo
                                    WHERE
                                    certificado = 's' AND
                                    id_treinamento = '$id_t'");
                        $dadoscrt->execute();
                        $rows_eventscrt = $dadoscrt->fetch(PDO::FETCH_ASSOC);
                        
                        $id_c = $rows_eventsc['id_treinamento_grupo'];
                        
                        if(($confirmado != "s" && $id_cliente != 0 && $data_fim < $hoje && $id_ocupacao == 1 && $concluido != "s" && $data_evento < $hoje) || ($confirmado != "s" && $data_fim < $hoje && $id_ocupacao == 2 && (!$id_c) && $data_evento < $hoje)){
                            $ncompareceu = "";
                            $cor_c = "#FF4040";
                        } else {
                            $ncompareceu = "Sim";
                            $cor_c = "#32CD32";
                            
                            if($crtenviado == "s" || ($rows_eventscrt == $rows_eventsc AND $id_ocupacao == 2)){
                                $crt_env = "{c} ";
                            } else {
                                $crt_env = "";
                            }
                        }
                        
                        
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
                        $idie         = $rows_events['id_responsavel'];
                        if($idie != $idi){
                            $title      = "SALA RESERVADA";
                            $color      = "#696969";
                            $edit       = "availableForMeeting";
                            $ed         = "false";
                        } else {
                            if($rows_events['confirmado'] == "s"){
                                $conf = "[CONFIRMADO] ";
                            } else {};
                            if($rows_events['concluido'] == "s" || ($id_c)){
                                $con = "[CONCLUÍDO] ";
                            } else {
                                $con = ""; 
                            };
                            if($rows_events['id_ocupacao'] == "1"){
                                $ocup = $rows_events['nome'];
                            } else {
                                $ocup = $rows_events['ocupacao'];
                            }
                            
                            if($rows_events['id_tipo'] == "1"){
                                $tp = "";
                            } else {
                                $tp = "[".strtoupper($rows_events['tipo'])."] ";
                            };
                                
                            $title      = $crt_env.strtoupper($con).strtoupper($tp).strtoupper($rows_events['formato'])." | ".strtoupper($ocup)." | ".strtoupper($rows_events['produto']);
                        //$title      = strtoupper($rows_events['nome_usuario']);
                        $id_formato    = strtoupper($rows_events['id_formato']);
                        $color      = $rows_events['color'];
                        $edit       = "";
                        $ed         = "true";
                        }
                        $textColor  = $rows_events['id_responsavel'];
                        $start      = $rows_events['data_inicio'];
                        $end        = $rows_events['data_fim'];
                        
                        
                        if($idie != $idi){
                            $eventos[] = [
                                'id'            => $id,
                                'title'         => $title,
                                'color'         => $color,
                                'textColor'     => $textColor,
                                'start'         => $start,
                                'end'           => $end,
                                'constraint'    => $edit,
                                'editable'      => $ed,
                                'type'          => "A"
                                
                            ];
                            
                        } elseif($disponivel != 's') {
                            
                            $eventos[] = [
                                'id'            => $id,
                                'title'         => "PROFESSOR INDISPONÍVEL NESSE PERÍODO",
                                'color'         => "#FFEC8B",
                                'textColor'     => "#000000",
                                'start'         => $start,
                                'end'           => $end,
                                'overlap'       => false,
                                
                            ];
                            
                        } elseif($confirmado == 's'|| ($id_g)) {
                        
                        $eventos[] = [
                            'id'            => $id,
                            'title'         => $title,
                            'color'         => $cor_c,
                            'textColor'     => $textColor,
                            'start'         => $start,
                            'end'           => $end,
                            'overlap'       => false,
                            
                        ];

                        } else {
                            $eventos[] = [
                                'id'            => $id,
                                'title'         => $title,
                                'color'         => "#FA8072",
                                'textColor'     => $textColor,
                                'start'         => $start,
                                'end'           => $end,
                                'overlap'       => true,
                                
                                
                            ];
                            
                            
                        }
                            
                        }
                        
                        
                    }
                    
                    echo json_encode($eventos);
?>