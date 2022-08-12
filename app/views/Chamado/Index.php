<?php include_once 'db.php';?>
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de chamados</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">chamado</li>
                  </ol>
                </div>
                <?php 
                if ($_GET['pesquisar'] == "sim") {
                if ($_GET['data_inicio']) {
                    $inicioBR = $_GET['data_inicio'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                } else {
                    $inicioBR = $_GET['data_inicio1'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                }
                
                if ($_GET['data_fim']) {
                    $fimBR = $_GET['data_fim'];
                    $fim = implode("-",array_reverse(explode("/",$fimBR)));
                } else {
                    $fimBR = $_GET['data_fim1'];
                    $fim = implode("-",array_reverse(explode("/",$fimBR)));
                }

                if ($_GET['st']) {
                    $idi = $_GET['st'];
                } else {
                    $idi = "%%";
                }
                $start_date = date_create($inicio);
                $end_date   = date_create($fim);
                } else {
                    $fim = date('Y-m-d');
                    $fimBR = date('d/m/Y');
                    $inicio = date('Y-m-d', strtotime($fim. ' - 60 days'));
                    $inicioBR = date('d/m/Y', strtotime($inicio));
                    //echo $inicio." ".$inicioBR;
                    
                    
                    
                    $idi = "%%";

                }
                
                ?>
                <div class="col-sm-6">
                
                  <!-- Bookmark Start-->
                  <div class="bookmark" >
                  <?php 
                  $hoje = date('Y-m-d');
                  $sql_tre = "SELECT *, SUM(somatoria) AS TOTAL, SUM(id_status_atendimento = 6 AND DATE_FORMAT(data_fechamento, '%Y-%m-%d') = '$hoje') AS CONCLUIDOSHJ, SUM(somatoria) AS TOTAL, SUM(id_status_atendimento != 6) AS ABERTOS, SUM(DATE_FORMAT(data_abertura, '%Y-%m-%d') = '$hoje') AS ABERTOSH, SUM(id_status_atendimento = 6 AND DATE_FORMAT(data_abertura, '%Y-%m-%d') = '$hoje') AS ABERTOSF FROM   posvenda_chamado
                                WHERE
                                (data_abertura BETWEEN '$inicio' AND '$fim 23:59:59')
                                GROUP BY somatoria
                                ";
                  $sql_tre = mysqli_query($conn, $sql_tre);
                  $cur_tre = mysqli_fetch_assoc($sql_tre);
                  ?>
                  
                    <ul style="padding:20px">
                    
                      <button class="btn btn-outline-primary btn-xs" type="button" style="margin:5px">Chamados: <?php echo $cur_tre['TOTAL']; ?> </button>
                      <button class="btn btn-outline-primary btn-xs" type="button" style="margin:5px">Abertos: <?php echo $cur_tre['ABERTOS']; ?> </button>
                      <button class="btn btn-outline-primary btn-xs" type="button" style="margin:5px">Abertos Hoje: <?php echo $cur_tre['ABERTOSH']; ?></button>
                      <button class="btn btn-outline-primary btn-xs" type="button" style="margin:5px">Concluídos Hoje: <?php echo $cur_tre['CONCLUIDOSHJ']; ?></button>
                      <a class="btn btn-primary btn-xs" href="<?php echo URL_BASE . "chamado/create"?>" style="margin:5px">Abrir Chamado</a>
                      <a class="btn btn-success btn-xs" href="<?php echo URL_BASE . "chamado/exportar?st=".$idi."&data_inicio1=".$inicio."&data_fim1=".$fim."&pesquisar=sim"?>" style="margin:5px">Exportar Excel</a>
                                          
                   	</ul>
                   	
                   	
                   	
                  <form class="needs-validation" action="<?php echo URL_BASE . "chamado/filtro/"?> method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                       
                        <div class="col-md-3">
                         
                        </div>
                        <div class="col-md-2 mb-3">
                        <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="value" data-language="en" name="data_inicio" placeholder="<?php echo $inicioBR; ?>">
                         <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                    
                        </div>
                        <div class="col-md-2 mb-3">
                         <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data_fim" placeholder="<?php echo $fimBR; ?>">
                      		<input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                      		
                      		<input type="hidden" name="st" value="<?php echo $idi; ?>">
                      </div>
                        <div class="col-md-2 mb-3">
                          <button class="form-control btn btn-primary" type="submit" style="color:#fff"><i class="icofont icofont-search-alt-1"></i></button>
                        </div>
                      </div>
                      
                      <input type="hidden" name="pesquisar" value="sim">
                    </form>

                  </div>
                  

                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <?php 
                $this->verMsg();
                $this->verErro();
                ?>
                

                
          <!-- Container-fluid starts-->
          <div class="container-fluid list-products8">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="card">
                  	<div class="btn-group" style="margin-bottom:10px">
                   <a class="btn  btn-outline-primary" href="<?php echo URL_BASE . "chamado/filtro/?st=%%&data_inicio1=".$inicioBR."&data_fim1=".$fimBR."&pesquisar=sim" ?>">Todos : <?php echo $cur_tre['TOTAL']; ?></a>
                  <?php foreach ($listast as $st){?>
                  <?php 
                  $id_e = $st->id_status_atendimento;
                  $sql_st = "SELECT *, SUM(id_status_atendimento = $id_e) AS TOTAL FROM   posvenda_chamado
                                WHERE
                                (data_abertura BETWEEN '$inicio' AND '$fim 23:59:59')
                                GROUP BY somatoria
                                ";
                  $sql_st = mysqli_query($conn, $sql_st);
                  $sql_st = mysqli_fetch_assoc($sql_st);
                  ?>
                  <a class="btn <?php echo $st->classe ?>" href="<?php echo URL_BASE . "chamado/filtro/?st=".$st->id_status_atendimento."&data_inicio1=".$inicioBR."&data_fim1=".$fimBR."&pesquisar=sim" ?>"><?php echo $st->posvendas_status_atendimento ?> : <?php echo $sql_st['TOTAL']; ?></a>
                  <?php } ?>
                	</div>      	
                  <div class="card-block row">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="display table-xs" id="basic-2">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Cliente</th>
                            <th>Assunto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Data</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Atualização</th>
                            <th scope="col">SLA</th>
                            <th scope="col" style="text-align:center">Situação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $chamado){?>
                          <tr>
                          <td scope="row" style="padding-top:10px" class="<?php echo $chamado->classe ?>">
                          <a href="<?php echo URL_BASE ."chamado/edit/".$chamado->id_chamado ?>" data-entidade ="chamado"  type="button" data-original-title="btn btn-danger btn-xs" title="" style="margin-left:5px;color:#FFFFFF"><?php echo $chamado->id_chamado ?> </a></td>
                              <td scope="row" style="padding-top:10px"><?php echo $chamado->nome ?> 
                              <?php if(date('Y-m-d', strtotime($chamado->data_abertura))." 59:59:59" > $chamado->data_atualizacao){ ?> <span class="badge badge-primary">Novo</span><?php } else {}?></td>
                              <td style="padding-top:10px"><?php echo $chamado->assunto_chamado ?></td>
                              <td style="padding-top:10px"><?php echo $chamado->posvendas_status_atendimento ?></td>
                              <td style="padding-top:10px"><?php echo date('d/m/Y', strtotime($chamado->data_abertura)); ?></td>
                              <td style="padding-top:10px"><?php echo $chamado->nome_usuario ?></td>
                              <td><?php echo date('d/m/Y', strtotime($chamado->data_atualizacao)); ?></td>
                              <td style="padding-top:10px">
                              <?php 
                              $data_limite = date('d/m/Y', strtotime('+30 days', strtotime($chamado->data_abertura)));
                              $data_limite_ing = date('Y-m-d', strtotime('+30 days', strtotime($chamado->data_abertura)));
                              $hoje = date('d/m/Y', strtotime(date('Y-m-d')));
                              //echo $data_limite."<br>";
                              //echo $hoje."<br>";
                              $diferenca = strtotime($data_limite_ing) - strtotime(date('Y-m-d'));
                              $dias = floor($diferenca / (60 * 60 * 24));
                              echo $dias." dias";
                              ?></td>
                              <td style="text-align:center;padding-top:10px">
							 <?php if($chamado->id_prioridade == "2"){ ?><i class="icofont icofont-fire-burn" style="color:#FF0000;font-size:20px"></i><?php } else {}?>
                              <!-- 
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="chamado" data-id="<?php //echo $chamado->id_chamado ?>" type="button" data-original-title="btn btn-danger btn-xs" title=""><i class="icofont icofont-trash" style="color:#fd2e64"></i></a>
                             -->
                              </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                      
                      
                    </div>
                    
                    
                    
                    </div>
                  </div>
                </div>
              </div>
              
              </div>
              
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>