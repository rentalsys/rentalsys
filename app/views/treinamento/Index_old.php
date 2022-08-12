<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Treinamentos</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">treinamentos</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    <ul>
                    <button class="btn btn-primary btn-xs" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">Incluir novo</button>
                      <a class="btn btn-success btn-xs" href="<?php echo URL_BASE . "treinamento/exportar"?>">Exportar Excel</a>
                                          
                   	</ul>
                  </div>
                  
                  <div class="card-body btn-showcase">
                  
                       <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                          <form action="<?php echo URL_BASE."treinamento/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar horário</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-xl-5 col-sm-9">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data_evento" placeholder="<?php echo date('d/m/Y', strtotime(date('Y-m-d'))); ?>"  value="<?php echo date('d/m/Y', strtotime(date('Y-m-d'))); ?>">
                            </div>
                          </div>
                        </div>
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
            								    echo "<option value='$cliente->id_cliente'>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Formato</label>
                                    <select class="form-control btn-square" id="select-1" name="id_formato" >
                                      		<option value="">Selecione o Formato</option>
                                       		<?php foreach ($formatos as $formato){
            								    echo "<option value='$formato->id_formato'>$formato->formato</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Horário</label>
                                    <select class="form-control btn-square" id="select-1" name="id_horario" >
                                      		<option value="">Selecione o Horário</option>
                                       		<?php foreach ($horarios as $horario){
            								    echo "<option value='$horario->id_horario'>$horario->horario</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Sala</label>
                                    <select class="form-control btn-square" id="select-1" name="id_sala" >
                                      		<option value="">Selecione a Sala</option>
                                       		<?php foreach ($salas as $sala){
            								    echo "<option value='$sala->id_sala'>$sala->sala</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
            								    echo "<option value='$produto->id_produto'>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Pedido</label>
                                      <input class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="">
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s"><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s"><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s"><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label" for="message-text">Observação:</label>
                                <textarea class="form-control" id="message-text" name="obs_treinamento" placeholder="Observações"></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input class="form-control" type="hidden" name="inserir" value="s">
                            <input type="submit" value="Inserir" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                   	
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
          <div class="container-fluid list-products">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="card">
                  
                  <div class="card-block row">
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="display table-xs" id="basic-1">
                        <thead>
                          <tr>
                          	<th scope="col">Horário</th>
                          	<th scope="col">Sala</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Contato</th>
                            <th scope="col">Formato</th>
                            <th scope="col">Equipamento</th>
                            <th scope="col">Pedido</th>
                            <th scope="col">UsoEq</th>
                            <th scope="col" style="text-align:center">Obs</th>
                            <th scope="col">Prática</th>
                            <th scope="col">Concluído</th>
                            <th scope="col">Certificado</th>
                            <th scope="col" style="text-align:center">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        $start_date = date_create(date('Y-m-d'));
                        $hoje = date('Y-m-d');
                        $hoje7 = date('Y-m-d', strtotime($hoje . ' +8 day'));
                        $end_date   = date_create($hoje7); // If you want to include this date, add 1 day
                        
                        $interval = DateInterval::createFromDateString('1 day');
                        $daterange = new DatePeriod($start_date, $interval ,$end_date);
                        ?>

                        <?php foreach ($daterange as $date1){?>
                        		
                                <?php   $data_semana = $date1->format('Y-m-d'); 
                                        $dia_semana = $date1->format('D'); 
                                        if($dia_semana == "Sat" || $dia_semana == "Sun"){} else {
                                ?>
                                <tr>
                                <td colspan=14 class="btn-warning btn-square digits"><h6 class="primary-color">
                                <?php 
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                echo utf8_encode(strftime('%A, %d de %B de %Y', strtotime($data_semana))); ?>
                                </h6></td>
                                </tr>

                          
                          <?php foreach ($horarios as $hora){?>
                          <tr>
                          <?php if($hora->id_horario == 7){?>
                          <td style="text-align:center" colspan=14 class="btn-square digits btn-light"><strong><?php echo $hora->horario ?></strong></td>
                          <?php } else {?>
                          <?php 
                          $ila = $date1->format('Ymd');
                          $horario_id = $hora->id_horario;
                          $id_e = $ila.$horario_id;
                                require_once ("db.php");
                                $sql = "SELECT * FROM posvenda_treinamento t, cliente c, posvenda_treinamento_horario h,  usuario u, posvenda_treinamento_formato f, posvenda_treinamento_sala s
                                    WHERE
                                    t.id_cliente    = c.id_cliente AND
                                    t.id_usuario    = u.id_usuario AND
                                    t.id_horario    = h.id_horario AND
                                    t.id_sala       = s.id_sala AND
                                    t.id_treinamento = $id_e
                                    ORDER BY t.data_evento ASC";
                                $sql = mysqli_query($conn, $sql);
                                $current_id = mysqli_fetch_assoc($sql);
                                
                                $versao =  $current_id['versao'];
                          
                          ?>
                           <td style="text-align:center"><?php echo $hora->horario ?></td>
                           <td><?php echo $current_id['sala']; ?></td>
                              <td><?php echo $current_id['nome']; ?></td>
                              <td><?php echo $current_id['celular']; ?></td>
                              <td><?php echo $trev->formato ?></td>
                              <td><?php echo $trev->produto ?></td>
                              <td><?php echo $hora->pedido ?></td>
                              <td><?php echo $trev->uso ?></td>
                              <td style="text-align:center">
                              <?php $ob = $trev->obs_treinamento; ?>
                              <div class="example-popover" data-container="body<?php echo $trev->id_treinamento ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $ob; ?>"><i class="fa fa-eye"></i></div>
                              </td>
                              <td><?php echo ($trev->pratica == "s") ? "Sim": "Não"; ?></td>
                              <td><?php echo ($trev->concluido == "s") ? "Sim": "Não"; ?></td>
                              <td><?php echo ($trev->certificado == "s") ? "Sim": "Não"; ?></td>
                              <td style="text-align:center">
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="treinamento" data-id="<?php echo $tre->id_treinamento ?>" style="margin:2px"><i class="icofont icofont-trash" style="color:#fd2e64"></i></a>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalfat<?php echo ($trev->id_treinamento) ? $tre->id_treinamento : null ?>" data-whatever="@mdo" style="margin-left:5px"><i class="icofont icofont-edit"></i></a>
                              <input type="hidden" name="id_chamado" value="<?php echo ($trev->id_treinamento) ? $trev->id_treinamento : null ?>">
                              </td>
                              <?php }?>
                              <?php }?>
                          </tr>
                          
                         
                          <div class="modal fade" id="exampleModalfat<?php echo ($tre->id_treinamento) ? $tre->id_treinamento : null ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                          <form action="<?php echo URL_BASE."treinamento/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar horário</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-xl-5 col-sm-9">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input autocomplete="off" class="datepicker-here form-control digits" id="date-picker" type="text" data-language="en" name="data_evento" placeholder="<?php echo date('d/m/Y', strtotime(($tre->data_evento) ? $tre->data_evento : null)); ?>"  value="<?php echo date('d/m/Y', strtotime(($tre->data_evento) ? $tre->data_evento : null)); ?>">
                            </div>
                          </div>
                        </div>
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $tre->id_cliente) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Formato</label>
                                    <select class="form-control btn-square" id="select-1" name="id_formato" >
                                      		<option value="">Selecione o Formato</option>
                                       		<?php foreach ($formatos as $formato){
                                       		    $selecionado = ($formato->id_formato == $tre->id_formato) ? "selected" :"";
            								    echo "<option value='$formato->id_formato' $selecionado>$formato->formato</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Horário</label>
                                    <select class="form-control btn-square" id="select-1" name="id_horario" >
                                      		<option value="">Selecione o Horário</option>
                                       		<?php foreach ($horarios as $horario){
                                       		    $selecionado = ($horario->id_horario == $tre->id_horario) ? "selected" :"";
            								    echo "<option value='$horario->id_horario' $selecionado>$horario->horario</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Sala</label>
                                    <select class="form-control btn-square" id="select-1" name="id_sala" >
                                      		<option value="">Selecione a Sala</option>
                                       		<?php foreach ($salas as $sala){
                                       		    $selecionado = ($sala->id_sala == $tre->id_sala) ? "selected" :"";
            								    echo "<option value='$sala->id_sala'  $selecionado>$sala->sala</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $tre->id_produto) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Pedido</label>
                                      <input class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($tre->pedido) ? $tre->pedido : null ?>">
                           		</div>
                           		<div class="mb-2">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
                                       		    $selecionado = ($uso->id_uso == $tre->id_uso) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($tre->pratica=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($tre->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($tre->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($tre->obs_treinamento) ? $tre->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          <input type="hidden" name="id_treinamento" value="<?php echo ($tre->id_treinamento) ? $tre->id_treinamento : null ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Modificar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                          <?php $dataef = $tre->data_evento; } ?>
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
          <!-- Container-fluid Ends-->
        </div>