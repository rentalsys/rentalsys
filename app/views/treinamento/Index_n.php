<meta http-equiv="refresh" content="320;url=#">
<?php include_once 'db.php';?>
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Ocupação da Sala Presencial</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">treinamentos</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                   <a  class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>
                 	<a class="btn btn-success btn-xs" href="<?php echo URL_BASE . "treinamento/exportar"?>">Exportar Excel</a>
                                          
                   	</ul>
                  </div>
                  <div class="card-body btn-showcase">
                  
                       
                   	
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
 
                <?php 
                if ($_GET['pesquisar'] == "sim") {
                    if ($_GET['data_inicio']) {
                        $inicioBR = $_GET['data_inicio'];
                        $datai = explode("/", $inicioBR);
                        $validai = checkdate((int)$datai[1], (int)$datai[0], (int)$datai[2]);
                        $inicio = $datai[2]."-".$datai[1]."-".$datai[0];
                    } else {
                        $inicioBR = $_GET['data_inicio'];
                        $datai = explode("/", $inicioBR);
                        $validai = checkdate((int)$datai[1], (int)$datai[0], (int)$datai[2]);
                        $inicio = $datai[2]."-".$datai[1]."-".$datai[0];
                    }
                    
                    if ($_GET['data_fim']) {
                        $fimBR = $_GET['data_fim'];
                        $dataf = explode("/", $fimBR);
                        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
                        $fim = $dataf[2]."-".$dataf[1]."-".$dataf[0];
                    } else {
                        $fimBR = $_GET['data_fim1'];
                        $dataf = explode("/", $fimBR);
                        $validaf = checkdate((int)$dataf[1], (int)$dataf[0], (int)$dataf[2]);
                        $fim = $dataf[2]."-".$dataf[1]."-".$dataf[0];
                    }
                
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                    
                    $idi = "%%";
                    $hoje7 = date('Y-m-d', strtotime($inicio . ' +1 day'));
                    $hoje7br = date('d/m/Y', strtotime($inicio . ' +1 day'));
                    $fim = $hoje7;
                    $fimBR = $hoje7br;
                }
                
                //echo $inicio." ".$fim;
                //$end_date   = date_create($fim);
                //$start_date = date_create($inicio);
                
                //$interval = DateInterval::createFromDateString('1 day');
                //$daterange = new DatePeriod($start_date, $interval ,$end_date);
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
                            <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                            <input class="form-control" name="email" type="text" placeholder="Email" value="">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_treinamento" value="sim">
                          			<input type="hidden" name="id_instrutor" value="<?php echo $idi; ?>">
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
                  <form class="needs-validation" novalidate="" action="<?php echo URL_BASE . "treinamento/filtro/"?>" method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                       
          				<div class="col-md-3">
                         <div class="media">
                         <?php if($idi == "%%"){} else {?>
                         <img class="img-60 rounded-circle me-3" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $cur_tre['imagem']; ?>" alt="">
                               <?php } ?>
                              <div class="media-body align-self-center">
                              <?php if($idi == "%%"){?>
                        <h5 class="user-name">Sala </h5>
                        <h6>Todas</h6>
                        <?php } else {?>
                                  <h5 class="user-name"><?php echo $cur_tre['nome_usuario']; ?> </h5>
                                <h6><?php echo $cur_tre['cargo']; ?></h6>
                                <?php } ?>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                        
                          <select class="form-control btn-square" id="select-1" name="id_sala" >
                                      		<option value="1">Sala Presencial</option>
                         </select>  
                        </div>
                        <div class="col-md-2 mb-3">
                        <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="value" data-language="en" name="data_inicio" placeholder="<?php echo $inicioBR; ?>">
                         <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                    
                        </div>
                        <div class="col-md-2 mb-3">
                         <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data_fim" placeholder="<?php echo $fimBR; ?>">
                      		<input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                      </div>
                        <div class="col-md-3 mb-3">
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
                  <H5 style="padding:10px">&nbsp;&nbsp;&nbsp;HORÁRIOS DA SALA DE TREINAMENTO</H5>
                    <div class="card-body">
                    <div class="table-responsive">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                          	<th scope="col" style="text-align:center">Horário</th>
                          	<th scope="col" style="text-align:center">Status</th>
                          	<th scope="col" style="text-align:center">Ação</th>
                          	<th scope="col">Responsável</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Produto</th>
                            <th scope="col">Ocupação</th>
                            <th scope="col">Data Reserva</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php foreach($datas as $data){?>
                        		
                                <?php   
                                $datae = $data->data_ing;
                                $data_semana = $datae; 
                                //echo $data_semana."<br>";
                                $dia_semana = date("D", strtotime($inicio.'+ '.$di.' days'));
                                //echo $dia_semana;
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

                          
                          <?php foreach ($horarios as $hora){?>
                          <?php 
                          //$ila = $datae->format('Y-m-d');
                          $ila = $datae;
                          $ocupado_agora = preg_replace('/[^0-9]/', '', date('Y-m-d H:i:s'));
                          $ocupado_horai = preg_replace('/[^0-9]/', '', $ila." ".$hora->inicio);
                          $ocupado_horaf = preg_replace('/[^0-9]/', '', $ila." ".$hora->fim);
                          ?>
                          <tr <?php if($ocupado_agora > $ocupado_horai){ $status_oc = "REALIZADO";?>class="btn-light btn-square digits"<?php } else  { $status_oc = "A REALIZAR"; } ?>>
                          <?php if($hora->id_horario == 7){ ;?>
                          <td style="text-align:center" colspan=14 class="btn-square digits btn-warning"><strong><i class="fa fa-coffee"></i> <?php echo $hora->horario ?> </strong></td>
                          
                          <?php } else {?>
                          <?php 
                          $horario_id = $hora->id_horario;
                          $id_responsavel = $cur_tre['id_responsavel'];
                          $id_hora = $hora->id_horario;

                                $conex = new PDO('mysql:host=localhost;dbname=rentalsys', 'rentalsys', '@#alex2021');
                                $dados = $conex->query("SELECT
                                    t.id_treinamento, t.id_produto, t.id_produto,t.id_responsavel,t.id_horario, t.id_ocupacao,
                                    t.id_formato, t.id_horario, t.data_evento, t.data_lancamento, t.id_uso,
                                    c.id_cliente, p.id_produto, u.id_usuario, h.id_horario, f.id_formato, o.id_ocupacao, t.id_usuario, u.nome_usuario,
                                    c.nome, u.instrutor, p.produto, o.ocupacao, us.uso, t.pedido, t.obs_treinamento, t.pratica, t.concluido
                                    
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
                                    t.id_uso            = us.id_uso AND
                                    t.id_formato        = '1' AND
                                    t.id_horario        = '$id_hora' AND
                                    t.data_evento       = '$ila'
                                    ORDER BY t.data_evento ASC");
                                $dados->execute();
                                $linha = $dados->fetch(PDO::FETCH_OBJ);
                                
                                ?>
                          
                           <td style="text-align:center">
                           <?php if($linha->nome_usuario){ ?>
                           <i class="icofont icofont-ui-lock" style="color:##FF0000"></i>
                           <?php } else {?>
                           <i class="icofont icofont-ui-unlock" style="color:#32CD32"></i>
                           <?php } ?>
                           <?php echo $hora->horario ?>
                           <?php 
                           if($ocupado_agora < $ocupado_horaf && $ocupado_agora >= $ocupado_horai && ($linha->nome_usuario)){ $status = "OCUPADO";
                           ?>
                           <i class="fa fa-spin icon-flickr-alt" style="color:#32CD32"></i> 
                           <?php } else { $status = $status_oc; } ?>
                           </td>
                           <td style="text-align:center"><strong><?php if($linha->concluido != "s" && $status == "REALIZADO") { echo "REALIZADO"; } else { echo $status;} ?></strong></td>
                           <td style="text-align:center">
                              <?php if($linha->id_treinamento){?>
                              
                              <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || ($_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $_SESSION[SESSION_LOGIN]->editar = "s") ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalfat<?php echo $linha->id_treinamento ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="user-check"></i></a>
                              <?php } else {}?>
                              
                              <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                              <a href="javascript:;" onclick="return excluirtreinamento(this)" 
                              data-entidade ="treinamento" 
                              data-instrutor ="<?php echo $id_responsavel ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $linha->id_treinamento ?>" style="margin:2px"><i data-feather="user-x" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              <input type="hidden" name="id_treinamento" value="<?php echo $linha->id_treinamento ?>">
                              <?php } else {?>
                              
                              <!– inserção –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $_SESSION[SESSION_LOGIN]->inserir == "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalfatedicao<?php echo $id_e ?>" data-whatever="@mdo"><i data-feather="user-plus"></i></a>
                              <?php } else {}?>
                              
                              <?php }?>
							
                              </td>
                              <td><strong><?php echo $linha->nome_usuario; ?></strong></td>
                           <td><?php echo ($linha->id_ocupacao == 1) ? $linha->nome : null; ?></td>
                              <td><?php echo ($linha->id_ocupacao  == 1) ? $linha->produto :null; ?></td>
                              <td><?php echo $linha->ocupacao; ?></td>
                              <td><?php echo ($linha->data_evento)?date('d/m/Y', strtotime($linha->data_evento)):null; ?></td>
                              
                              
                              
                             
                              <!– modal de inserção –>
                          
                      <div class="modal fade bd-example-modal-lg" id="Modalfatedicao<?php echo $id_e ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."treinamento/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar horário</h5>
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
                            		<label for="select-1">Horário</label>
                                      <input readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                            <label for="select-1">Responsável (Professor)</label>

                                    <select class="form-control btn-square" id="select-1" name="id_responsavel" >
                                       		<?php foreach ($instrutores as $instrutor){
            								    echo "<option value='$instrutor->id_usuario'>$instrutor->nome_usuario</option>";
            								}?> 
                                    </select>            
                           		</div>
                           		   <div class="col-6">
                           		   <label for="select-1">Tipo de Ocupação</label>
                                    <select class="form-control btn-square" id="select-1" name="id_ocupacao" >
                                      		<option value="">Selecione o Tipo</option>
                                       		<?php foreach ($tipoocupacao as $ocupacao){
            								    echo "<option value='$ocupacao->id_ocupacao'>$ocupacao->ocupacao</option>";
            								}?> 
                                    </select> 
                                </div>
                          </div>
                           		<div class="mb-2">
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

                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($current_id['obs_treinamento']) ? $current_id['obs_treinamento'] : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                           <input type="hidden" name="id_formato" value="1">
                          
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
                            <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                            <input class="form-control" name="email" type="text" placeholder="Email" value="">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_treinamento" value="sim">
                          	<input type="hidden" name="id_formato" value="1">
                          			<input type="hidden" name="id_instrutor" value="<?php echo $idi; ?>">
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
                         
                      <div class="modal fade" id="exampleModalfat<?php echo $linha->id_treinamento ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."treinamento/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
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
                        
                                <div class="form-group row">
                                <div class="col-6">
                            <label for="select-1">Responsável (Professor)</label>

                                    <select class="form-control btn-square" id="select-1" name="id_responsavel" >
                                       		<?php foreach ($instrutores as $instrutor){
                                       		    $selecionado = ($instrutor->id_usuario == $linha->id_responsavel) ? "selected" :"";
            								    echo "<option value='$instrutor->id_usuario' $selecionado>$instrutor->nome_usuario</option>";
            								}?> 
                                    </select>            
                           		</div>
                           		   <div class="col-6">
                            <label for="select-1">Tipo Ocupação</label>

                                     <label for="select-1">Tipo de Ocupação</label>
                                    <select class="form-control btn-square" id="select-1" name="id_ocupacao" >
                                      		<option value="">Selecione o Tipo</option>
                                       		<?php foreach ($tipoocupacao as $ocupacao){
                                       		    $selecionado = ($ocupacao->id_ocupacao == $linha->id_ocupacao) ? "selected" :"";
            								    echo "<option value='$ocupacao->id_ocupacao' $selecionado>$ocupacao->ocupacao</option>";
            								}?> 
                                    </select>               
                           		</div>
                          </div>
                           		<div class="mb-2">
                            <label for="select-1">Cliente</label>

                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $linha->id_cliente) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>  
                           		</div>

                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $linha->id_produto) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
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
                                       		    $selecionado = ($uso->id_uso == $linha->id_uso) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linha->obs_treinamento) ? $linha->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          <input type="hidden" name="id_formato" value="1">
                           <input type="hidden" name="data_e" value="<?php echo ($data_semana) ? date('Ymd', strtotime($data_semana)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_instrutor" value="<?php echo ($instrutor_idi) ? $instrutor_idi : null ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento" value="<?php echo $linha->id_treinamento ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Modificar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                              
                              <?php  }?>
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