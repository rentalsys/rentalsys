<?php include_once 'db.php';?>
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
                                        .listaClientes{
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
                                    .listaClientes a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                    .listaClientes a:hover {
                                        background: #eee;
                                    }
                       
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
                
                if ($_GET['id_responsavel']) {
                    $idi = $_GET['id_responsavel'];
                } else {
                    $idi = "5";
                }
                
                $start_date = date_create($inicio);
                $end_date   = date_create($fim);
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                    $idi = 5;
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
                                $sql_tre = mysqli_query($conn, $sql_tre);
                                $cur_tre = mysqli_fetch_assoc($sql_tre);
                          ?>
                          
                          <!– modal de cliente –>
                              <div style="z-index:1044" class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente" aria-hidden="true">
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
                                  	<input type="hidden" name="volta_instrutor" value="sim">
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
                        <div class="col-md-2">
                        <a href="?id_responsavel=<?php echo $idi; ?>&data_inicio1=<?php echo date('d/m/Y', strtotime($inicio. ' - 1 days'));; ?>&pesquisar=sim">
                        <i data-feather="skip-back"></i></a> 
                        <a href="?id_responsavel=<?php echo $idi; ?>&data_inicio1=<?php echo date('d/m/Y', strtotime($inicio. ' + 1 days'));; ?>&pesquisar=sim">
                        <i data-feather="skip-forward"></i>
                        </a> 
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
                            <th scope="col">Concluído</th>
                            <th scope="col">Certificado</th>
                          </tr>
                        </thead>
                        <tbody>
                                <tr>
                                <td colspan=14 class="btn-primary btn-square digits"><h6 class="primary-color">
                                <?php 
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.UTF-8', 'pt_BR.UTF-8', 'Portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                echo strftime('%A, %d de %B de %Y', strtotime($inicio)); ?>
                                </h6></td>
                                </tr>

                          <?php foreach ($horarios as $hora){?>
                          <?php 
                          $indice++;
                          $indice_ol = $indice+100;
                          //$ila = $datae->format('Y-m-d');
                          $ila = $inicio;
                          $ocupado_agora = preg_replace('/[^0-9]/', '', date('Y-m-d H:i:s'));
                          $ocupado_horai = preg_replace('/[^0-9]/', '', $ila." ".$hora->inicio);
                          $ocupado_horaf = preg_replace('/[^0-9]/', '', $ila." ".$hora->fim);
                          
                          $horario_id = $hora->id_horario;
                          $id_hora = $hora->id_horario;
                          $id_h =  $indice;
                          $id_hol =  $indice_ol;
                          
                          $diaehora = $ila.$horario_id;
                          ?>
                          <?php 
                          
                                
                                $dados = $conex->query("SELECT *
                                    
                                    FROM   posvenda_treinamento AS t
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente        = c.id_cliente 
                                    INNER JOIN produto AS p
                                    ON t.id_produto        = p.id_produto
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN posvenda_treinamento_horario AS h
                                    ON t.id_horario    = h.id_horario
                                    INNER JOIN posvenda_treinamento_uso AS us
                                    ON t.id_uso    = us.id_uso
                                    WHERE
                                    t.id_formato        = '1' AND
                                    t.id_horario        = '$id_hora' AND
                                    t.data_evento       = '$ila'
                                    ORDER BY t.data_evento ASC");
                                $dados->execute();
                                $linha = $dados->fetch(PDO::FETCH_OBJ);
                                $id_e = $linha->id_treinamento;

                                
                                
                                
                                $dadosi = $conex->query("SELECT *
                                    
                                    FROM   posvenda_treinamento AS t
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente        = c.id_cliente 
                                    INNER JOIN produto AS p
                                    ON t.id_produto        = p.id_produto
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_ocupacao AS o
                                    ON t.id_ocupacao    = o.id_ocupacao
                                    INNER JOIN posvenda_treinamento_horario AS h
                                    ON t.id_horario    = h.id_horario
                                    INNER JOIN posvenda_treinamento_uso AS us
                                    ON t.id_uso    = us.id_uso
                                    WHERE
                                    t.id_responsavel    = '$idi' AND
                                    t.id_horario        = '$id_hora' AND
                                    t.data_evento       = '$ila'
                                    ORDER BY t.data_evento ASC");
                                $dadosi->execute();
                                $linhai = $dadosi->fetch(PDO::FETCH_OBJ);

                                $id_ei = $linhai->id_treinamento;
                                ?>
                          
                          	<tr <?php if($ocupado_agora > $ocupado_horai){?>class="btn-light btn-square digits"<?php } else  {} ?>>
                     		<?php if($hora->id_horario == 7){ ;?>
                          	<td style="text-align:center" colspan=14 class="btn-square digits btn-warning"><strong><i class="fa fa-coffee"></i> <?php echo $hora->horario ?> </strong></td>
                          	<?php } else {?>
                          
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
                           
                           <?php if($linhai->id_responsavel){?>
                           <td style="text-align:center">
                              <?php if($linhai->id_formato == 2){?>
                              
                              <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhai->id_usuario) && $_SESSION[SESSION_LOGIN]->edicao = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalfat<?php echo $linhai->id_treinamento ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="video"></i></a>
                              <?php } else {}?>
                              
                               <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhai->id_usuario) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                              <a href="javascript:;" onclick="return excluirinstrutor(this)" 
                              data-entidade ="instrutor" 
                              data-instrutor ="<?php echo $linhai->id_responsavel ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $linhai->id_treinamento ?>" style="margin:2px"><i data-feather="x-circle" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              
                              <input type="hidden" name="id_treinamento" value="<?php echo $linhai->id_treinamento ?>">
                              <?php } else {?>
                              
                               <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhai->id_usuario) && $_SESSION[SESSION_LOGIN]->edicao = "s"){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#exampleModalfat<?php echo $linhai->id_treinamento ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="edit"></i></a>
                              <?php } else {}?>
                              
                                  <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhai->id_usuario) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                       
                              <a href="javascript:;" onclick="return excluirinstrutor(this)" 
                              data-entidade ="instrutor" 
                              data-instrutor ="<?php echo $linhai->id_responsavel ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $linhai->id_treinamento ?>" style="margin:2px"><i data-feather="x-circle" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              
                              <input type="hidden" name="id_treinamento" value="<?php echo $linhai->id_treinamento ?>">
                              <?php } ?>
                              </td>
                              <?php if($linhai->id_ocupacao == "2"){?>
                              <td>
                              
                              <a href="" data-bs-toggle="modal" data-bs-target="#ModalonGrupo<?php echo $id_e ?>" data-whatever="@mdo"><i data-feather="users"></i></a>
                              
                              </td>
                              <td>-</td>
                              <?php } else { ?>
                              <td><?php echo ($linhai->id_ocupacao != "2")?$linhai->nome:null; ?></td>
                              <td><a href="https://api.whatsapp.com/send?phone=+55<?php echo ($linhai->id_ocupacao != "2" && ($linhai->instrutor > 0))? $linhai->celular:null; ?>" target="_blank"><?php echo $linhai->celular; ?></a></td>
                              <?php } ?>
                              <td><?php echo $linhai->ocupacao; ?></td>
                              <td><?php echo ($linhai->id_ocupacao != "2") ? $linhai->produto:null; ?></td>
                              <td><?php echo ($linhai->id_ocupacao != "2") ? $linhai->pedido:null; ?></td>
                              <td><?php echo ($linhai->id_ocupacao != "2") ? $linhai->uso:null; ?></td>
                              <td style="text-align:center">
                              <?php if($linhai->id_treinamento && $linhai->id_ocupacao != "2"){?>
                              <div class="example-popover" data-container="body<?php echo $linhai->id_treinamento ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $linhai->obs_treinamento ?>"><i data-feather="eye"></i></div>
                              <?php } else {}?>
                              </td>
                              <td style="text-align:center"><?php echo ($linhai->concluido == "s" && $linhai->id_ocupacao != "2") ? "Sim": ""; ?></td>
                              <td style="text-align:center"><?php echo ($linhai->certificado == "s" && $linhai->id_ocupacao != "2") ? "Sim": ""; ?> 
                              <?php if($linhai->concluido  == "s" && $linhai->id_ocupacao != "2"){?><a href="<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=<?php echo $linhai->nome; ?>&email=<?php echo $linhai->email; ?>&cpf=<?php echo $linhai->cpf; ?>&data=<?php echo $iniciobr; ?>&produto=<?php echo $linhai->produto; ?>&professor=<?php echo $cur_tre['nome_usuario']; ?>&imagem=<?php echo $cur_tre['imagem_certificado']; ?>" target="_blank"><i data-feather="award"></i></a><?php } else {} ?></td>
                              
                              <?php if($linhai->id_ocupacao == 2){ ?>
                              
                              <?php 
                              $id_grupo = $linhai->id_treinamento;
                              $dadosg = $conex->query("SELECT *

                                    FROM   posvenda_treinamento AS t
                                    INNER JOIN cliente AS c
                                    ON t.id_cliente        = c.id_cliente 
                                    INNER JOIN produto AS p
                                    ON t.id_produto        = p.id_produto
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    INNER JOIN posvenda_treinamento_formato AS f
                                    ON t.id_formato    = f.id_formato
                                    INNER JOIN posvenda_treinamento_horario AS h
                                    ON t.id_horario    = h.id_horario
                                    INNER JOIN posvenda_treinamento_uso AS us
                                    ON t.id_uso    = us.id_uso
                                    WHERE                                
                                    t.id_treinamento       = '$id_grupo'
                                    GROUP BY t.id_treinamento_grupo");
                              $dadosg->execute();
                              $dadosgrupo = $dadosg->fetchAll(PDO::FETCH_OBJ);
                              //$dadosgrupo = $dadosg->fetchAll();
                              //$id_eg = $linhag->id_treinamento;
                              
                              ?>
                              
                              <?php $i = 1; foreach ($dadosgrupo as $linhagr) { ?>
                              <?php if($linhagr->id_treinamento_grupo){ ?>
                              <tr>
                              <td style="text-align: center"><?php echo $i;?></td>
                              <td style="text-align: center">
                              <!– edição –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhagr->id_usuario) && $_SESSION[SESSION_LOGIN]->edicao = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#ModalonGrupoe<?php echo $linhagr->id_treinamento_grupo ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="user-check"></i></a>
                              
                              <!– modal grupo edição–>
                          
                      <div class="modal fade bd-example-modal-lg" id="ModalonGrupoe<?php echo $linhagr->id_treinamento_grupo ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo date('d/m/Y', strtotime($linha->id_treinamento_grupo); ?>">
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
                                       		    $selecionado = ($cliente->id_cliente == $linhagr->id_cliente) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $linhagr->id_produto) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($linhagr->pedido) ? $linhagr->pedido : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
                                       		    $selecionado = ($uso->id_uso == $linhagr->id_uso) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado >$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($linhagr->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($linhagr->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linhagr->obs_treinamento) ? $linhagr->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                         <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $linhagr->id_responsavel ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento_grupo" value="<?php echo $linhagr->id_treinamento_grupo ?>">
                          <input type="hidden" name="id_treinamento" value="<?php echo $linhagr->id_treinamento ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $linhagr->id_formato ?>">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                              
                              <?php } else {}?>
                              
                               <!– exclusão –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhagr->id_usuario) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ){?>
                              <a href="javascript:;" onclick="return excluiritemgrupo(this)" 
                              data-entidade ="instrutor" 
                              data-instrutor ="<?php echo $linhagr->id_responsavel ?>"
                              data-i = "<?php echo $inicioBR; ?>"
                              data-f = "<?php echo $fimBR; ?>" 
                              data-id="<?php echo $linhagr->id_treinamento_grupo ?>" style="margin:2px"><i data-feather="user-x" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              </td>
                              <td><?php echo $linhagr->nome; ?></td>
                              <td><?php echo $linhagr->celular; ?></td>
                              <td>Grupo</td>
                              <td><?php echo $linhagr->produto; ?></td>
                              <td><?php echo $linhagr->pedido; ?></td>
                              <td><?php echo $linhagr->uso; ?></td>
                              <td style="text-align:center">
                              <?php if($linhagr->id_treinamento){?>
                              <div class="example-popover" data-container="body<?php echo $linhagr->id_treinamento ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $linhagr->obs_treinamento ?>"><i data-feather="eye"></i></div>
                              <?php } else {}?>
                              </td>
                              <td style="text-align:center"><?php echo ($linhagr->concluido == "s") ? "Sim": ""; ?></td>
                              <td style="text-align:center"><?php echo ($linhagr->certificado == "s") ? "": ""; ?> <?php if($linhagr->concluido == "s"){?><a href="<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=<?php echo $linhagr->nome; ?>&email=<?php echo $linhagr->email; ?>&cpf=<?php echo $linhagr->cpf; ?>&data=<?php echo $inicioBR; ?>&produto=<?php echo $linhagr->produto; ?>&professor=<?php echo $cur_tre['nome_usuario']; ?>&imagem=<?php echo $cur_tre['imagem_certificado']; ?>" target="_blank"><i data-feather="award"></i></a><?php } else {} ?></td>
                           
                              </tr>
                              <?php } else {}?>
                              <?php $i++; };  ?>
                              
                              <?php } else {}?>
                              
                              <?php } else {?>
                               <td style="text-align:center">
                              <?php if($id_e > 0){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalonline<?php echo $diaehora ?>" data-whatever="@mdo"><i data-feather="video"></i></a>
                              <?php } else {?>
                              
                                <!– inserção –>
                              <?php if(($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linhagr->id_usuario) && $_SESSION[SESSION_LOGIN]->insercao = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalfatedicao<?php echo $diaehora ?>" data-whatever="@mdo"><i data-feather="user-plus"></i></a>
                              <a href="" data-bs-toggle="modal" data-bs-target="#Modalonline<?php echo $diaehora ?>" data-whatever="@mdo"><i data-feather="video"></i></a>
   
                              <?php } else {}?>
                              
                              <?php }?>
                              
                              </td>
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
                              
                             
                             
                              <!– modal de inserção –>
                          
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="Modalfatedicao<?php echo $diaehora ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($inicio) ? date('d/m/Y', strtotime($inicio)) : null; ?>">
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
                  
                        
                             <script type="text/javascript">
                           		$(function(){
                           		$("#cliente<?php echo $id_h ?>").on("keyup", function(){
                            	var d  = $(this).val();
                            	if(d == ""){
                            		$(".listaClientes").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "cliente/buscar/" +d ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#cliente<?php echo $id_h ?>").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (j = 0; j < data.length; j++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente<?php echo $id_h ?>(this)"'
                            		  + 'data-idc="' + data[j].id_cliente +
                            		   '" data-nomec="' + data[j].nome + '">' +
                            		  data[j].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes").html(html);
                                    $(".listaClientes").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente<?php echo $id_h ?>(obj){
                                	var idc = $(obj).attr("data-idc");
                                	var nomec = $(obj).attr("data-nomec");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#cliente<?php echo $id_h ?>").val(nomec);
                                	$("#id_cliente<?php echo $id_h ?>").val(idc);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_cliente<?php echo $id_h ?>" name="id_cliente" class="form-control">
                        	
                        		<input type="text" id="cliente<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		
                           		<script type="text/javascript">
                           		$(function(){
                           		$("#produto<?php echo $id_h ?>").on("keyup", function(){
                            	var q  = $(this).val();
                            	if(q == ""){
                            		$(".listaProdutos").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "produto/buscar/" +q ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#produto<?php echo $id_h ?>").after('<div class="listaProdutos"></div>');
                            	   html = "";
                            		for (i = 0; i < data.length; i++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto<?php echo $id_h ?>(this)"'
                            		  + 'data-id="' + data[i].id_produto +
                            		   '" data-nome="' + data[i].produto + '">' +
                            		  data[i].produto + '</a></div>';
                            		  
                            		}
                            		$(".listaProdutos").html(html);
                                    $(".listaProdutos").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarProduto<?php echo $id_h ?>(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto<?php echo $id_h ?>").val(nome);
                                	$("#id_produto<?php echo $id_h ?>").val(id);
                                	
                                	listarLocalizacao(id);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_produto<?php echo $id_h ?>" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>            
                           		</div>
                                               
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo $linha->pedido ? $linha->pedido : null ?>">
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
                                
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($linha->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($linha->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linha->obs_treinamento) ? $linha->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
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
                          
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="Modalonline<?php echo $diaehora ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($inicio) ? date('d/m/Y', strtotime($inicio)) : null; ?>">
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
                        
                             <script type="text/javascript">
                           		$(function(){
                           		$("#cliente<?php echo $id_hol ?>").on("keyup", function(){
                            	var d  = $(this).val();
                            	if(d == ""){
                            		$(".listaClientes").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "cliente/buscar/" +d ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#cliente<?php echo $id_hol ?>").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (j = 0; j < data.length; j++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente<?php echo $id_hol ?>(this)"'
                            		  + 'data-idc="' + data[j].id_cliente +
                            		   '" data-nomec="' + data[j].nome + '">' +
                            		  data[j].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes").html(html);
                                    $(".listaClientes").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente<?php echo $id_hol ?>(obj){
                                	var idc = $(obj).attr("data-idc");
                                	var nomec = $(obj).attr("data-nomec");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#cliente<?php echo $id_hol ?>").val(nomec);
                                	$("#id_cliente<?php echo $id_hol ?>").val(idc);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_cliente<?php echo $id_hol ?>" name="id_cliente" class="form-control">
                        	
                        		<input type="text" id="cliente<?php echo $id_hol ?>" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		
                           		<script type="text/javascript">
                           		$(function(){
                           		$("#produto<?php echo $id_hol ?>").on("keyup", function(){
                            	var q  = $(this).val();
                            	if(q == ""){
                            		$(".listaProdutos").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "produto/buscar/" +q ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#produto<?php echo $id_hol ?>").after('<div class="listaProdutos"></div>');
                            	   html = "";
                            		for (i = 0; i < data.length; i++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto<?php echo $id_hol ?>(this)"'
                            		  + 'data-id="' + data[i].id_produto +
                            		   '" data-nome="' + data[i].produto + '">' +
                            		  data[i].produto + '</a></div>';
                            		  
                            		}
                            		$(".listaProdutos").html(html);
                                    $(".listaProdutos").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarProduto<?php echo $id_hol ?>(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto<?php echo $id_hol ?>").val(nome);
                                	$("#id_produto<?php echo $id_hol ?>").val(id);
                                	
                                	listarLocalizacao(id);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_produto<?php echo $id_hol ?>" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto<?php echo $id_hol ?>" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>            
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
                                
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($linha->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($linha->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linha->obs_treinamento) ? $linha->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
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
                          
                      <div style="z-index:1043" class="modal fade bd-example-modal-lg" id="ModalonGrupo<?php echo $id_e ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($inicio) ? date('d/m/Y', strtotime($inicio)) : null; ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($hora->horario) ? $hora->horario : null ?>">
                          </div>
                        </div>

                            <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>

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
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s"><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s"><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                         <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $linhai->id_responsavel ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento" value="<?php echo $linhai->id_treinamento ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $linhai->id_formato ?>">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>


                          <?php }?>
                    
                         <!– modal de edição –>
                         
                      <div class="modal fade" id="exampleModalfat<?php echo $linhai->id_treinamento ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <input readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo ($inicio) ? date('d/m/Y', strtotime($inicio)) : null; ?>">
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
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao" <?php echo ($linhai->id_ocupacao=="1") ? "checked" : null?> value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao" <?php echo ($linhai->id_ocupacao=="2") ? "checked" : null?> value="2">Grupo
                              </label>
                            </div>
                          </div>
                        
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $linhai->id_cliente) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $linhai->id_produto) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo ($linhai->pedido) ? $linhai->pedido : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
                                       		    $selecionado = ($uso->id_uso == $linhai->id_uso) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($linhai->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($linhai->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observaçãoooo:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linhai->obs_treinamento) ? $linhai->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                           <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $linhai->id_responsavel ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento" value="<?php echo $linhai->id_treinamento ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $linhai->id_formato ?>">
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