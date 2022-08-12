<?php include_once 'db_mco.php';?>
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Treinamentos</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">Agenda Instrutores</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                  <a  class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModalMassa" data-whatever="@mdo">Reservar em massa</a>
                   <a  class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>
                 	<a class="btn btn-success btn-xs" href="<?php echo URL_BASE . "instrutor/exportar"?>">Exportar Excel</a>
                 	
                 				<style type="text/css">
                                        .listaProdutos{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:15px;
                                    	top:36px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1
                                    }
                                    .listaProdutos a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                    .listaProdutos a:hover {
                                        background: #eee;
                                    }
                           		</style>
                           		    <script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
                           		
                   	</ul>
                  </div>
                  
                  <?php 
                $this->verMsg();
                $this->verErro();
                ?>
                  <div class="card-body btn-showcase">
                  
                       <!– modal de inserção –>
                          
                      <div class="modal fade bd-example-modal-lg" id="#exampleModalMassa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."instrutor/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar Diversos Horários</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($data_semana) ? date('d/m/Y', strtotime($data_semana)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>
                        
                       <div class="form-group">
                            <label>Tipo de Ocupação:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao" checked="" value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao" value="2">Grupo
                              </label>
                            </div>
                          </div>
                  				
                        
                            <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente<?php echo $id_e ?>" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>
									
                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
            								    echo "<option value='$cliente->id_cliente'>$cliente->nome</option>";
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
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($current_id['pedido']) ? $current_id['pedido'] : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($current_id['pratica']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($current_id['concluido']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($current_id['certificado']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_id['obs_treinamento']) ? $current_id['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                          <input type="hidden" name="id_responsavel" value="<?php echo $idi ?>">
                          <input type="hidden" name="id_formato" value="1">
                          
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
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
                
                if ($_GET['id_responsavel']) {
                    $idi = $_GET['id_responsavel'];
                } else {
                    $idi = "5";
                }
                
                if ($_GET['horarios']) {
                    $horarios_e = $_GET['horarios'];
                } else {
                    $horarios_e = 1;
                }
                
                $hoje = 
                $start_date = date_create($inicio);
                $end_date   = date_create($fim);
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                    
                    $idi = 5;
                    $hoje7 = date('Y-m-d', strtotime($inicio . ' +3 day'));
                    $hoje7br = date('d/m/Y', strtotime($inicio . ' +3 day'));
                    $fim = $hoje7;
                    $fimBR = $hoje7br;
                    $end_date   = date_create($hoje7);
                    $start_date = date_create($inicio);
                    $horarios_e = 1;
                }
                
                if($_SESSION[SESSION_LOGIN]->instrutor == "s"){
                  $idi = $_SESSION[SESSION_LOGIN]->id_usuario;
                } else {} 
                           
                
                //echo $inicio." ".$inicioBR."<br>";
                //echo $fim." ".$fimBR."<br>";
                 // If you want to include this date, add 1 day
                                $sql_tre = "SELECT * FROM   usuario
                                WHERE 
                                (id_usuario = '$idi') AND
                                instrutor = 's'";
                                $sql_tre = mysqli_query($conn_mco, $sql_tre);
                                $cur_tre = mysqli_fetch_assoc($sql_tre);
                          ?>
                          
                          <!– modal de cliente –>
                              <div class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "cliente/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      <div class="mb-3">
                            <label class="col-form-label">Tipo de Cadastro</label>
                         		<div class="col">
                        <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                          <div class="radio radio-primary">
                            <input checked id="radioinline1" type="radio" name="pf_pj" value="pf">
                            <label class="mb-0" for="radioinline1">Pessoa Física</label>
                          </div>
                          <div class="radio radio-primary">
                            <input id="radioinline2" type="radio" name="pf_pj" value="pj">
                            <label class="mb-0" for="radioinline2">Pessoa Jurídica</label>
                          </div>
                        </div>
                      </div>
                                 
                      </div>

                          <div class="mb-3">
                            <label class="col-form-label">Nome do Cliente / Razão Social</label>
                            <input  class="form-control" name="nome" type="text" placeholder="Nome" value="">
                          </div>
                           <div class="mb-3">
                            <label class="col-form-label">Celular do Cliente (Somente Números com DDD)<i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                            <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="" onKeyUp="moeda(this);">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                            <input class="form-control" name="email" type="text" placeholder="Email" value="">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_instrutor" value="sim">
                          			<input type="hidden" name="id_responsavel" value="<?php echo $idi; ?>">
                                  <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                                  <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                                  <input type="hidden" name="pesquisar" value="sim">
                            <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                   <!– modal de cliente –>
           
            <div class="col-md-12 project-list">
                <div class="card">
                  <form class="needs-validation" novalidate="" method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                       
          				<div class="col-md-3">
                         <div class="media"><img class="img-60 rounded-circle me-3" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $cur_tre['imagem']; ?>" alt="">
                              <div class="media-body align-self-center">
                                  <h5 class="user-name"><?php echo $cur_tre['nome_usuario']; ?></h5>
                                <h6><?php echo $cur_tre['cargo']; ?></h6>
                              </div>
                            </div>
                        </div>
                        
                        <div class="col-md-2">
                          <select class="form-select digits btn-light" id="select-1" name="id_responsavel">
                                      		<option value="">Selecione o Professor </option>
                                       		<?php foreach ($instrutores as $instr){
                                       		    $selecionado = ($instr->id_usuario == $idi) ? "selected" :"";
            								    echo "<option value='$instr->id_usuario' $selecionado >$instr->nome_usuario</option>";
            								}?> 
                                    </select>  
                        </div>
                        
                        <div class="col-md-2">
                          <select class="form-select digits" id="select-1" name="horarios" >
                                      		<option value="1" <?php echo ($horarios_e == 1)? "selected":null;?>>Todos horários</option>
                                      		<option value="2" <?php echo ($horarios_e == 2)? "selected":null;?>>Horários Vagos</option>
                                    </select>  
                        </div>
                        
                        <div class="col-md-1 mb-3">
                        <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="value" data-language="en" name="data_inicio" placeholder="<?php echo $inicioBR; ?>">
                         <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                    
                        </div>
                        <div class="col-md-1 mb-3">
                         <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data_fim" placeholder="<?php echo $fimBR; ?>">
                      		<input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                      </div>
                        <div class="col-md-2 mb-3">
                          <button class="form-control btn btn-primary" type="submit" style="color:#fff">Filtrar</button>
                        </div>
                      </div>
                      
                      <input type="hidden" name="pesquisar" value="sim">
                    </form>
                </div>
              </div>
                
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
                          	<th scope="col" style="text-align:center">Reserva</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Contato</th>
                            <th scope="col">Ocupação</th>
                            <th scope="col">Equipamento</th>
                            <th scope="col">Pedido</th>
                            <th scope="col">UsoEq</th>
                            <th scope="col" style="text-align:center">Obs</th>
                            <th scope="col">Prática</th>
                            <th scope="col">Concluído</th>
                            <th scope="col">Certificado</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        
                        
                        $interval = DateInterval::createFromDateString('1 day');
                        $daterange = new DatePeriod($start_date, $interval ,$end_date);
                        ?>

                        <?php foreach ($daterange as $date1){?>
                        		
                                <?php   $data_semana = $date1->format('Y-m-d'); 
                                        $dia_semana = $date1->format('D'); 
                                        if($dia_semana == "Sun"){} else {
                                ?>
                                <tr>
                                <td colspan=14 class="btn-primary btn-square digits"><h6 class="primary-color">
                                <?php 
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.UTF-8', 'pt_BR.UTF-8', 'Portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                echo strftime('%A, %d de %B de %Y', strtotime($data_semana)); ?>
                                </h6></td>
                                </tr>

                          <?php 
                          
                          
                          $horarios = "SELECT *
                          FROM  posvenda_treinamento_horario
                          ORDER BY id_horario ASC";
                          $horarios = mysqli_query($conn_mco, $horarios);
                          $rew_horarios = mysqli_fetch_assoc($horarios);
                          ?>
                          <?php foreach ($horarios as $hora){?>
                          <?php 
                          $ila = $date1->format('Y-m-d');
                          $ocupado_agora = preg_replace('/[^0-9]/', '', date('Y-m-d H:i:s'));
                          $ocupado_horai = preg_replace('/[^0-9]/', '', $ila." ".$hora->inicio);
                          $ocupado_horaf = preg_replace('/[^0-9]/', '', $ila." ".$hora->fim);
                          ?>
                          <?php 
                          $id_hora = $rew_horarios['id_horario'];
                          $sql = "SELECT 
                                        t.id_treinamento, t.id_produto, t.id_produto,t.id_responsavel,t.id_horario, t.id_ocupacao, 
                                         t.id_formato, t.id_horario, t.data_evento, t.data_lancamento, t.id_uso,
                                         c.id_cliente, p.id_produto, u.id_usuario, h.id_horario, f.id_formato, o.id_ocupacao, t.id_usuario, u.nome_usuario, 
                                         c.nome, u.instrutor, p.produto, o.ocupacao, us.uso, t.pedido, t.obs_treinamento, t.pratica
                                         
                                         FROM   posvenda_treinamento t, cliente c, posvenda_treinamento_horario h,  
                                                usuario u, posvenda_treinamento_formato f, 
                                                 produto p, posvenda_treinamento_uso us, posvenda_instrutor ins, posvenda_treinamento_ocupacao o
                                    WHERE
                                    t.id_cliente        = c.id_cliente AND
                                    t.id_responsavel    = u.id_usuario AND
                                    t.id_horario        = h.id_horario AND
                                    t.id_formato        = f.id_formato AND
                                    t.id_produto        = p.id_produto AND
                                    t.id_ocupacao       = o.id_ocupacao AND
                                    us.id_uso           = t.id_uso AND
                                    t.id_formato        = '1' AND
                                    t.id_horario        = '$id_hora' AND
                                    t.data_evento       = '$ila'
                                    ORDER BY t.data_evento ASC";
                          $sql = mysqli_query($conn_mco, $sql);
                          $current_id = mysqli_fetch_assoc($sql);
                          $totalRows_sql = mysqli_num_rows($sql);
                          
                          //echo $totalRows_sql."<br>";
                          
                          $sqli = "SELECT 
                                         t.id_treinamento, t.id_produto, t.id_produto,t.id_responsavel,t.id_horario, t.id_ocupacao, 
                                         t.id_formato, t.id_horario, t.data_evento, t.data_lancamento, t.id_uso,
                                         c.id_cliente, p.id_produto, u.id_usuario, h.id_horario, f.id_formato, o.id_ocupacao, t.id_usuario, u.nome_usuario, 
                                         c.nome, u.instrutor, p.produto, o.ocupacao, us.uso, t.pedido, t.obs_treinamento, t.pratica
                                         
                                         FROM   posvenda_treinamento t, cliente c, posvenda_treinamento_horario h,  
                                                usuario u, posvenda_treinamento_formato f, 
                                                 produto p, posvenda_treinamento_uso us, posvenda_instrutor ins, posvenda_treinamento_ocupacao o

                                    WHERE
                                    (t.id_cliente        = c.id_cliente OR t.id_cliente = 0) AND
                                    (t.id_produto        = p.id_produto OR t.id_produto = 0) AND
                                    t.id_responsavel    = u.id_usuario AND
                                    t.id_horario        = h.id_horario AND
                                    t.id_formato        = f.id_formato AND
                                    t.id_ocupacao       = o.id_ocupacao AND
                                    us.id_uso           = t.id_uso AND
                                    t.id_responsavel    = '$idi' AND
                                    t.id_horario        = '$id_hora' AND
                                    t.data_evento       = '$ila'
                                    ORDER BY t.data_evento ASC";
                          $sqli = mysqli_query($conn_mco, $sqli);
                          $current_idi = mysqli_fetch_assoc($sqli);
                          
                          ?>
                          
                          
                          <tr <?php if($ocupado_agora > $ocupado_horai){?>class="btn-light btn-square digits"<?php } else  {} ?>>
                          <?php if($rew_horarios['id_horario'] == 7){?>
                          <td style="text-align:center" colspan=14 class="btn-square digits btn-warning"><strong> <i class="fa fa-coffee"></i> <?php echo $hora->horario ?></strong></td>
                          <?php } else {?>
                          
                           <td style="text-align:center"> 
                            <label class="form-check-label" for="invalidCheck<?php echo $ila.$hora->horario ?>"><?php echo $rew_horarios['horario'] ?></label>

                           <?php 
                           if($ocupado_agora < $ocupado_horaf && $ocupado_agora >= $ocupado_horai && ($current_id['nome_usuario'])){  ;
                           ?>
                           <i class="fa fa-spin fa-circle-o-notch"></i> 
                           <?php } else {} ?>
                           </td>
                           
                           <?php if($current_idi['id_responsavel']){?>
                           <td style="text-align:center">
                              <?php if($current_idi['id_formato'] == 2){?>
                              
                              <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_id['id_usuario']) && $_SESSION[SESSION_LOGIN]->edicao = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalfat<?php echo $current_idi['id_treinamento'] ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="video"></i></a>
                              <?php } else {}?>
                              
                               <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_id['id_usuario']) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                              <a href="javascript:;" onclick="return excluirinstrutor(this)" 
                              data-entidade ="instrutor" 
                              data-instrutor ="<?php echo $current_idi['id_responsavel']  ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $current_idi['id_treinamento'] ?>" style="margin:2px"><i data-feather="x-circle" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              
                              <input type="hidden" name="id_treinamento" value="<?php echo $current_idi['id_treinamento'] ?>">
                              <?php } else {?>
                              
                               <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_id['id_usuario']) && $_SESSION[SESSION_LOGIN]->edicao = "s"){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalfat<?php echo $current_idi['id_treinamento'] ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="edit"></i></a>
                              <?php } else {}?>
                              
                                  <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_id['id_usuario']) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                       
                              <a href="javascript:;" onclick="return excluirinstrutor(this)" 
                              data-entidade ="instrutor" 
                              data-instrutor ="<?php echo $current_idi['id_responsavel']  ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $current_idi['id_treinamento'] ?>" style="margin:2px"><i data-feather="x-circle" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              
                              <input type="hidden" name="id_treinamento" value="<?php echo $current_idi['id_treinamento'] ?>">
                              <?php } ?>
                              </td>
                              <?php if($current_idi['id_ocupacao'] == "2"){?>
                              <td>
                              
                              <a href="" data-bs-toggle="modal" data-bs-target="#ModalonGrupo<?php echo $id_e ?>" data-whatever="@mdo"><i data-feather="users"></i></a>
                              
                              </td>
                              <td>-</td>
                              <?php } else { ?>
                              <td><?php echo ($current_idi['id_ocupacao'] != "2")?$current_idi['nome']:null; ?></td>
                              <td><a href="https://api.whatsapp.com/send?phone=+55<?php echo ($current_idi['id_ocupacao'] != "2" && ($current_id['instrutor'] > 0))?$current_idi['celular']:null; ?>" target="_blank"><?php echo $current_idi['celular']; ?></a></td>
                              <?php } ?>
                              <td><?php echo $current_idi['ocupacao']; ?></td>
                              <td><?php echo ($current_idi['id_ocupacao'] != "2")?$current_idi['produto']:null; ?></td>
                              <td><?php echo ($current_idi['id_ocupacao'] != "2")?$current_idi['pedido']:null; ?></td>
                              <td><?php echo ($current_idi['id_ocupacao'] != "2")?$current_idi['uso']:null; ?></td>
                              <td style="text-align:center">
                              <?php if($current_idi['id_treinamento'] && $current_idi['id_ocupacao'] != "2"){?>
                              <div class="example-popover" data-container="body<?php echo $current_idi['id_treinamento'] ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $current_idi['obs_treinamento'] ?>"><i data-feather="eye"></i></div>
                              <?php } else {}?>
                              </td>
                              <td style="text-align:center"><?php echo ($current_idi['pratica'] == "s" && $current_idi['id_ocupacao'] != "2") ? "Sim": ""; ?></td>
                              <td style="text-align:center"><?php echo ($current_idi['concluido'] == "s" && $current_idi['id_ocupacao'] != "2") ? "Sim": ""; ?></td>
                              <td style="text-align:center"><?php echo ($current_idi['certificado'] == "s" && $current_idi['id_ocupacao'] != "2") ? "Sim": ""; ?> <?php if($current_idi['concluido'] == "s" && $current_idi['id_ocupacao'] != "2"){?><a href="<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=<?php echo $current_idi['nome']; ?>&email=<?php echo $current_idi['email']; ?>&cpf=<?php echo $current_idi['cpf']; ?>&data=<?php echo $data_semanabr; ?>&produto=<?php echo $current_idi['produto']; ?>&professor=<?php echo $cur_tre['nome_usuario']; ?>&imagem=<?php echo $cur_tre['imagem_certificado']; ?>" target="_blank"><i data-feather="award"></i></a><?php } else {} ?></td>
                              
                              <?php if($current_idi['id_ocupacao'] == 2){ ?>
                              
                              <?php 
                              $id_grupo = $current_idi['id_treinamento'];
                              //echo $id_grupo;
                              $sqlg = "SELECT
                                         t.id_treinamento_grupo, t.id_treinamento, t.id_produto, t.id_produto,t.id_responsavel,t.id_horario, t.id_ocupacao,
                                         t.id_formato, t.id_horario, t.data_evento, t.data_lancamento, t.id_uso,
                                         c.id_cliente, c.celular, p.id_produto, u.id_usuario, h.id_horario, f.id_formato, t.id_usuario, u.nome_usuario,
                                         c.nome, u.instrutor, p.produto, us.uso, t.pedido, t.obs_treinamento, t.pratica, t.concluido, t.certificado
                                         
                                         FROM   posvenda_treinamento_grupo t, cliente c, posvenda_treinamento_horario h,
                                                usuario u, posvenda_treinamento_formato f,
                                                 produto p, posvenda_treinamento_uso us, posvenda_instrutor ins
                                                 
                                    WHERE
                                    t.id_cliente            = c.id_cliente AND
                                    t.id_responsavel        = u.id_usuario AND
                                    t.id_horario            = h.id_horario AND
                                    t.id_formato            = f.id_formato AND
                                    t.id_produto            = p.id_produto AND
                                    us.id_uso               = t.id_uso AND
                                    t.id_treinamento       = '$id_grupo'
                                    GROUP BY t.id_treinamento_grupo
                                    ";
                              $sqlg = mysqli_query($conn_mco, $sqlg);
                              $current_idg = mysqli_fetch_assoc($sqlg);
                              ?>
                              
                              <?php $i = 1; do { ?>
                              <?php if($current_idg['id_treinamento_grupo']){ ?>
                              <tr>
                              
                              <td style="text-align: center"><?php echo $i;?></td>
                              <td>
                              <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_id['id_usuario']) && $_SESSION[SESSION_LOGIN]->edicao = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#ModalonGrupoe<?php echo $current_idg['id_treinamento_grupo'] ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="user-check"></i></a>
                              
                              <!– modal grupo edição–>
                          
                      <div class="modal fade bd-example-modal-lg" id="ModalonGrupoe<?php echo $current_idg['id_treinamento_grupo'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."instrutor/salvargrupo" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Grupo de Treinamento</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($data_semana) ? date('d/m/Y', strtotime($data_semana)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>

                            <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Cliente</label>

                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $current_idg['id_cliente']) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $current_idg['id_produto']) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($current_idg['pedido']) ? $current_idg['pedido'] : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
                                       		    $selecionado = ($uso->id_uso == $current_idg['id_uso']) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado >$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($current_idg['pratica']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($current_idg['concluido']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($current_idg['certificado']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_idg['obs_treinamento']) ? $current_id['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                         <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $current_idi['id_responsavel'] ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento_grupo" value="<?php echo $current_idg['id_treinamento_grupo'] ?>">
                          <input type="hidden" name="id_treinamento" value="<?php echo $current_idg['id_treinamento'] ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $current_idg['id_formato'] ?>">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                              
                              <?php } else {}?>
                              
                               <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_id['id_usuario']) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                              <a href="javascript:;" onclick="return excluiritemgrupo(this)" 
                              data-entidade ="instrutor" 
                              data-instrutor ="<?php echo $current_idg['id_responsavel']  ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $current_idg['id_treinamento_grupo'] ?>" style="margin:2px"><i data-feather="user-x" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              </td>
                              <td><?php echo $current_idg['nome']; ?></td>
                              <td><?php echo $current_idg['celular']; ?></td>
                              <td>Grupo</td>
                              <td><?php echo $current_idg['produto']; ?></td>
                              <td><?php echo $current_idg['pedido']; ?></td>
                              <td><?php echo $current_idg['uso']; ?></td>
                              <td style="text-align:center">
                              <?php if($current_idg['id_treinamento']){?>
                              <div class="example-popover" data-container="body<?php echo $current_idg['id_treinamento'] ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $current_idg['obs_treinamento'] ?>"><i data-feather="eye"></i></div>
                              <?php } else {}?>
                              </td>
                              <td style="text-align:center"><?php echo ($current_idg['pratica'] == "s") ? "Sim": ""; ?></td>
                              <td style="text-align:center"><?php echo ($current_idg['concluido'] == "s") ? "Sim": ""; ?></td>
                              <td style="text-align:center"><?php echo ($current_idg['certificado'] == "s") ? "": ""; ?> <?php if($current_idg['concluido'] == "s"){?><a href="<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=<?php echo $current_idg['nome']; ?>&email=<?php echo $current_idg['email']; ?>&cpf=<?php echo $current_idg['cpf']; ?>&data=<?php echo $data_semanabr; ?>&produto=<?php echo $current_idg['produto']; ?>&professor=<?php echo $cur_tre['nome_usuario']; ?>&imagem=<?php echo $cur_tre['imagem_certificado']; ?>" target="_blank"><i data-feather="award"></i></a><?php } else {} ?></td>
                           
                              </tr>
                              <?php } else {}?>
                              <?php $i++; } while ($current_idg = mysqli_fetch_array($sqlg));  ?>
                              
                              <?php } else {}?>
                              
                              <?php } else {?>
                               <td style="text-align:center">
                              <?php if($totalRows_sql > 0){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalonline<?php echo $id_e ?>" data-whatever="@mdo"><i data-feather="video"></i></a>
                              <?php } else {?>
                              
                                <!– inserção –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $current_idi['id_usuario']) && $_SESSION[SESSION_LOGIN]->insercao = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalfatedicao<?php echo $id_e ?>" data-whatever="@mdo"><i data-feather="user-plus"></i></a>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalonline<?php echo $id_e ?>" data-whatever="@mdo"><i data-feather="video"></i></a>
   
                              <?php } else {}?>
                              
                              <?php }?>
                              
                              </td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td style="text-align:center">
                              </td>
                              <td style="text-align:center"></td>
                              <td style="text-align:center"></td>
                              <td style="text-align:center"></td>
                              
                             <?php } ?>
                             
                              <!– modal de inserção –>
                          
                      <div class="modal fade bd-example-modal-lg" id="Modalfatedicao<?php echo $id_e ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."instrutor/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar horário na Sala</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($data_semana) ? date('d/m/Y', strtotime($data_semana)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>
                        
                       <div class="form-group">
                            <label>Tipo de Ocupação:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao" checked="" value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao" value="2">Grupo
                              </label>
                            </div>
                          </div>
                  
                        
                            <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente<?php echo $id_e ?>" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>

                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
            								    echo "<option value='$cliente->id_cliente'>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<script type="text/javascript">
                           		$(function(){
                                   
                                   $("#produto<?php echo $id_i ?>").on("keyup", function(){
                                   		var q  = $(this).val();
                                   		if(q == ""){
                                    		$(".listaProdutos").hide();
                                    		return;
                                    	}
                                    	$.ajax({
                                    	  url: base_url + "produto/buscar/" + q,
                                    	  type: "GET",
                                    	  dataType: "json",
                                    	  data:{},
                                    	  success: function (data){
                                    		  $("#produto<?php echo $id_i ?>").after('<div class="listaProdutos"></div>');
                                    		   html = "";
                                		for (i = 0; i < data.length; i++) {		  
                                		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto<?php echo $id_i ?>(this)"'
                                		  + 'data-id<?php echo $id_i ?>="' + data[i].id_produto +
                                		   '" data-nome<?php echo $id_i ?>="' + data[i].produto + '">' + data[i].produto + '</a></div>';
                                		  
                                		}
                                		$(".listaProdutos").html(html);
                                        $(".listaProdutos").show();
                                    	  }
                                       	});
                                   }) ;
                                });
                                
                               function selecionarProduto<?php echo $id_i ?>(obj){
                                	var id = $(obj).attr("data-id<?php echo $id_i ?>");
                                	var nome = $(obj).attr("data-nome<?php echo $id_i ?>");
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto<?php echo $id_i ?>").val(nome);
                                	$("#id_produto<?php echo $id_i ?>").val(id);
                                	
                                }
                                
                                	$("#btnInserir").on("click", function(){
                                	var id_produto  	= $("#id_produto<?php echo $id_i ?>").val();
                                	
                                	$.ajax({
                                	  url: base_url + "instrutor/inserir",
                                	  type: "GET",
                                	  dataType: "json",
                                	  data:{
                                		id_produto<?php echo $id_i ?>		: id_produto<?php echo $id_i ?>,
                                	},
                                	  success: function (data){
                                		lista_entradas(data.lista);
                                	  }
                                   });
                                	
                                   }) ;
                           		</script>

                           		<div class="mb-2">
                           		
                            		<label for="select-1">Equipamento</label>
                            		<div class="col-12 position-relative">
                           			<input type="hidden" id="id_produto<?php echo $id_i ?>" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto<?php echo $id_i ?>" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>
                            		
                                               
                           		</div>
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($current_id['pedido']) ? $current_id['pedido'] : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($current_id['pratica']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($current_id['concluido']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($current_id['certificado']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_id['obs_treinamento']) ? $current_id['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                          <input type="hidden" name="id_responsavel" value="<?php echo $idi ?>">
                          <input type="hidden" name="id_formato" value="1">
                          
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary" id="btnInserir">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <!– modal de inserção on line–>
                          
                      <div class="modal fade bd-example-modal-lg" id="Modalonline<?php echo $id_e ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."instrutor/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar horário On Line</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($data_semana) ? date('d/m/Y', strtotime($data_semana)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>
                        
                       <div class="form-group">
                            <label>Tipo de Ocupação:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao" checked="" value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao" value="2">Grupo
                              </label>
                            </div>
                          </div>
                        
                            <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente<?php echo $id_e ?>" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>

                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
            								    echo "<option value='$cliente->id_cliente'>$cliente->nome</option>";
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
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($current_id['pratica']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($current_id['concluido']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($current_id['certificado']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_id['obs_treinamento']) ? $current_id['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                          <input type="hidden" name="id_responsavel" value="<?php echo $idi ?>">
                          <input type="hidden" name="id_formato" value="2">
                          
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <!– modal grupo–>
                          
                      <div class="modal fade bd-example-modal-lg" id="ModalonGrupo<?php echo $id_e ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."instrutor/salvargrupo" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Grupo de Treinamento</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($data_semana) ? date('d/m/Y', strtotime($data_semana)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>

                            <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente<?php echo $id_e ?>" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>

                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
            								    echo "<option value='$cliente->id_cliente'>$cliente->nome</option>";
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
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($current_id['pratica']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($current_id['concluido']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($current_id['certificado']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_id['obs_treinamento']) ? $current_id['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                         <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $current_idi['id_responsavel'] ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento" value="<?php echo $current_idi['id_treinamento'] ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $current_idi['id_formato'] ?>">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    
                    
                    <!– modal de cliente –>
                              <div class="modal fade" id="exampleModalCliente<?php echo $id_e ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente<?php echo $id_e ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "cliente/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      
                      
                      <div class="form-group">
                            <label>Tipo de Cadastro:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="pf_pj" checked="" value="pf">Pessoa Física
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="pf_pj" value="pj">Pessoa Jurídica
                              </label>
                            </div>
                          </div>
                                 


                          <div class="mb-3">
                            <label class="col-form-label">Nome do Cliente / Razão Social</label>
                            <input  class="form-control" name="nome" type="text" placeholder="Nome" value="">
                          </div>
                           <div class="mb-3">
                            <label class="col-form-label">Celular do Cliente (Somente Números com DDD)<i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                            <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                            <input class="form-control" name="email" type="text" placeholder="Email" value="">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_treinamento" value="sim">
                          			<input type="hidden" name="id_responsavel" value="<?php echo $idi; ?>">
                                  <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                                  <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                                  <input type="hidden" name="pesquisar" value="sim">
                            <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                   <!– modal de cliente –>
                    
                         <!– modal de edição –>
                         
                      <div class="modal fade" id="exampleModalfat<?php echo $current_idi['id_treinamento'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."instrutor/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar horário </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($data_semana) ? date('d/m/Y', strtotime($data_semana)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário <?php echo $hora->horario ?></label>
                                      <input readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                           		</div>
                        </div>
                        
                        <div class="form-group">
                            <label>Tipo de Ocupação:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao" <?php echo ($current_idi['id_ocupacao']=="1") ? "checked" : null?> value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao" <?php echo ($current_idi['id_ocupacao']=="2") ? "checked" : null?> value="2">Grupo
                              </label>
                            </div>
                          </div>
                        
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $current_idi['id_cliente']) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $current_idi['id_produto']) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($current_idi['pedido']) ? $current_idi['pedido'] : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
                                       		    $selecionado = ($uso->id_uso == $current_idi['id_uso']) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" >Prática</label>
                                <label class="switch">
                                    <input type="checkbox" name="pratica" value="s" <?php echo ($current_idi['pratica']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($current_idi['concluido']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($current_idi['certificado']=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observaçãoooo:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_idi['obs_treinamento']) ? $current_idi['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                           <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $current_idi['id_responsavel'] ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento" value="<?php echo $current_idi['id_treinamento'] ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $current_idi['id_formato'] ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Modificar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    
                    
                              
                              <?php }?>
                          </tr>
                          
                    <?php }?>
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