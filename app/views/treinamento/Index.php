<?php include_once 'db.php';?>
<?php 
//acessos
$user_inserir = $_SESSION[SESSION_LOGIN]->inserir;
$user_excluir = $_SESSION[SESSION_LOGIN]->excluir;
$user_editar = $_SESSION[SESSION_LOGIN]->editar;
$user_instrutor = $_SESSION[SESSION_LOGIN]->instrutor;
$user_usuario = $_SESSION[SESSION_LOGIN]->id_usuario;

?>
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Grupo de Treinamento</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">treinamentos</li>
                  </ol>
                </div>
                <?php 
                if ($_GET['dat']) {
                    $inicioBR = $_GET['dat'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                } 
                
                ?>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                  <a class="btn btn-success btn" href="<?php echo URL_BASE . "agenda?dat=".$inicioBR ?>">Agenda Sala</a>
                  <?php $idi = $_GET['id_responsavel']; ?>
                  <a class="btn btn-success btn" href="<?php echo URL_BASE . "professor?id_responsavel=".$idi."&dat=".$inicioBR ?>">Agenda Professor</a>  
                  <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>                  
                   	</ul>
                  </div>
                  <div class="card-body btn-showcase">
                  
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
                                     .listaClientes1{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:15px;
                                    	top:150px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1
                                    }
                                     .listaClientes1 a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
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
 
               <?php $id_evento = $_GET['ide']; ?>
                          
                        
                   
                   <!– modal de cliente inserir –>
                            <script language="JavaScript" >
                            function enviarform(){
                            
                            if(document.form1.nome.value=="" || document.form1.nome.value.length < 2)
                            {
                            alert( "Preencha campo NOME corretamente!" );
                            document.form1.nome.focus();
                            return false;
                            }
                            
                            if(document.form1.celular.value=="" || document.form1.celular.value.length < 10)
                            {
                            alert( "Preencha campo Celular com DDD corretamente!" );
                            document.form1.celular.focus();
                            return false;
                            }
                            
                            
                            return true;
                            }


        				</script>
                              <div style="z-index:1043" class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente<?php echo $id_h ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
        
                               <form action="<?php echo URL_BASE . "cliente/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form" id="form1">
                                      
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="card-body">
                                  
                                  <script type="text/javascript">
                           		$(function(){
                           		$("#nome").on("keyup", function(){
                            	var d  = $(this).val();
                            	if(d == ""){
                            		$(".listaClientes1").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "cliente/buscar/" +d ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#nome").after('<div class="listaClientes1"></div>');
                            	   html = "";
                            		for (p = 0; p < data.length; p++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente1(this)"'
                            		  + 'data-idp="' + data[p].id_cliente +
                            		   '" data-nomep="' + data[p].nome + '">' +
                            		  data[p].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes1").html(html);
                                    $(".listaClientes1").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente1(obj){
                                
                                	var idp = $(obj).attr("data-idp");
                                	var nomep = $(obj).attr("data-nomep");
                                	$(".listaClientes1").hide();
                                	$("#nome").val(nomep);
                                	$("#cliente").val(nomep);
                                	$("#id_cliente").val(idp);
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                           		</script>
                           		
                           		<div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input  class="form-control" name="nome" id="nome" type="text" placeholder="Nome" value="" autocomplete="off" required="required">
                                  </div>

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
                                    <label class="col-form-label">Celular do Cliente (Somente Números com DDD) <i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                                    <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="" required="required">
                                  </div>
                                  <div class="mb-3">
                                    <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                                    <input class="form-control" name="email" type="text" placeholder="Email" value="" required="required">
                                  </div>
        
                              </div>
          
                                   <div class="modal-footer">
                          	<input type="hidden" name="volta_treinamento" value="sim">
                          	<input type="hidden" name="ide" value="<?php echo $id_evento; ?>">
                            <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Fechar</button>
                            <input type="submit" value="Cadastrar Novo Cliente" class="btn btn-primary" onClick="return enviarform();">
                          </div>
                                </div>
                                </form>
                              </div>
                            </div>
                           <!– modal de cliente –>
                   
                    
                    <?php    
                                $dados = $conex->query("SELECT *                          
                                    FROM   posvenda_treinamento AS t
                                    INNER JOIN produto AS p
                                    ON t.id_produto        = p.id_produto
                                    INNER JOIN produto_marca AS m
                                    ON p.id_marca   = m.id_marca
                                    INNER JOIN usuario AS u
                                    ON t.id_responsavel    = u.id_usuario
                                    WHERE
                                    t.id_ocupacao        = '2' AND
                                    t.id_treinamento        = '$id_evento'
                                    ");
                                $dados->execute();
                                $linha = $dados->fetch(PDO::FETCH_OBJ);
                                $id_e = $linha->id_treinamento;
                                //echo $ila_i." |".$linha->inicio."| ".$ila_f."<br>";
                    ?>
           
            <div class="col-md-12 project-list">
                <div class="card">
                     
                      <div class="row g-3">
                       
          				<div class="col-md-3">
                         <div class="media"><img class="img-60 rounded-circle me-3" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $linha->imagem; ?>" alt="">
                              <div class="media-body align-self-center">
                                  <h5 class="user-name"><?php echo $linha->nome_usuario; ?></h5>
                                <h6><?php echo $linha->cargo; ?></h6>
                              </div>
                            </div>
                        </div>

                        <div class="col-md-1">
                           <h6 class="user-name">DATA: </h6>
                           <h5><?php echo date('d/m/Y', strtotime($linha->data_inicio)); ?></h5>
                        </div>
                        
                        <div class="col-md-1">
                           <h6 class="user-name">PERÍODO:</h6>
                        <h5><?php echo date('H:i', strtotime($linha->data_inicio))." - ".date('H:i', strtotime($linha->data_fim)); ?></h5>
                        </div>
                        
                       <div class="col-md-5">
                           <h6 class="user-name">EQUIPAMENTO: </h6>
                           <h5><?php echo $linha->produto; ?></h5>
                        </div>
             
                        <div class="col-md-2 mb-1">
                          <a  class="btn btn-primary btn" data-bs-toggle="modal" data-bs-target="#ModalonGrupo" data-whatever="@mdo">Inserir Cliente no Grupo</a>
                        </div>
                      </div>
                </div>
              </div>
              
              <!– modal grupo–>
                          
                      <div style="z-index:1043" class="modal fade bd-example-modal-lg" id="ModalonGrupo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."treinamento/salvargrupo" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
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
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo date('d/m/Y', strtotime($linha->data_inicio)); ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Período</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo date('H:i', strtotime($linha->data_inicio)); ?> - <?php echo date('H:i', strtotime($linha->data_fim)); ?>">
                          </div>
                        </div>
							
							<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                     <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo $linha->produto; ?>">
                           		</div>
                            <script type="text/javascript">
                           		$(function(){
                           		$("#cliente").on("keyup", function(){
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
                            		  $("#cliente").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (j = 0; j < data.length; j++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente(this)"'
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
                                
                                function selecionarCliente(obj){
                                	var idc = $(obj).attr("data-idc");
                                	var nomec = $(obj).attr("data-nomec");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#cliente").val(nomec);
                                	$("#id_cliente").val(idc);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Cliente </label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_cliente" name="id_cliente" class="form-control">
                        	
                        		<input type="text" id="cliente" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
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
                              	
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"></textarea>
                              </div>
                              
                             
                                 </div>
                          <div class="modal-footer">
                          
                         <input type="hidden" name="ide" value="<?php echo $id_evento; ?>">
                          <input type="hidden" name="id_responsavel" value="<?php echo $linha->id_responsavel; ?>">
                        
                         <input type="hidden" name="id_treinamento" value="<?php echo $linha->id_treinamento; ?>">
                         <input type="hidden" name="dat" value="<?php echo $inicioBR; ?>">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <?php if($user_editar =="s"){ ?>
                            <input type="submit" value="Reservar Horário" class="btn btn-primary">
                            <?php } else {} ?>
                          </div>
                        </div>
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
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th scope="col">Ação</th>
                            <th scope="col">Confirmado</th>
                            <th scope="col">Cliente</th>
                            <th scope="col">Contato</th>
                            <th scope="col">Pedido</th>
                            <th scope="col">UsoEq</th>
                            <th scope="col" style="text-align:center">Obs</th>
                            <th scope="col" style="text-align:center">Concluído</th>
                            <th scope="col" style="text-align:center">Certificado</th>
                          </tr>
                        </thead>
                        
                                 <?php 
                                    $dadosg = $conex->query("SELECT *                          
                                        FROM   posvenda_treinamento_grupo AS t
                                        INNER JOIN cliente AS c
                                        ON t.id_cliente        = c.id_cliente 
                                        INNER JOIN posvenda_treinamento_uso AS us
                                        ON t.id_uso    = us.id_uso
                                        WHERE                                
                                        t.id_treinamento       = '$id_e'
                                        GROUP BY t.id_treinamento_grupo");
                                    $dadosg->execute();
                                    $linhag = $dadosg->fetchAll(PDO::FETCH_OBJ);
                                ?>
                            <tbody>
                           
                         	<?php foreach ($linhag as $linhagr) { ?> 
                         	<tr>
                         	<td>
								<?php if($linha->id_formato == 2){?>
                              
                              <!– edição –>
                              <?php if((($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $_SESSION[SESSION_LOGIN]->edicao = "s" )|| $_SESSION[SESSION_LOGIN]->exepcional = "s" ){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#ModalonGrupoe<?php echo $linhagr->id_treinamento_grupo ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="video"></i></a>
                              <?php } else {}?>
                              
                               <!– exclusão –>
                              <?php if((($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $user_excluir =="s") || $_SESSION[SESSION_LOGIN]->exepcional = "s"){?>
                              <a href="javascript:;" onclick="return excluiritemgrupo(this)" 
                              data-entidade ="treinamento" 
                              data-ide="<?php echo $linha->id_treinamento ?>"
                              data-id="<?php echo $linhagr->id_treinamento_grupo ?>" style="margin:2px"><i data-feather="x-circle" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              
                              <input type="hidden" name="id_treinamento_grupo" value="<?php echo $linhagr->id_treinamento ?>">
                              <?php } else {?>
                              
                               <!– edição –>
                              <?php if((($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $_SESSION[SESSION_LOGIN]->edicao = "s") || $_SESSION[SESSION_LOGIN]->exepcional = "s"){?>
                              <a href="" data-bs-toggle="modal" data-bs-target="#ModalonGrupoe<?php echo $linhagr->id_treinamento_grupo ?>" data-whatever="@mdo" style="margin-left:5px"><i data-feather="edit"></i></a>
                              <?php } else {}?>
                              
                                  <!– exclusão –>
                              <?php if((($_SESSION[SESSION_LOGIN]->id_setor == 2 || $_SESSION[SESSION_LOGIN]->id_usuario == $linha->id_usuario) && $_SESSION[SESSION_LOGIN]->exclusao = "s" ) || $_SESSION[SESSION_LOGIN]->exepcional = "s"){?>
                       
                              <a href="javascript:;" onclick="return excluiritemgrupo(this)" 
                              data-entidade ="treinamento" 
                              data-responsavel="<?php echo $linha->id_responsavel ?>" 
                              data-data="<?php echo $inicioBR ?>" 
                              data-ide="<?php echo $linha->id_treinamento ?>" 
                              data-id="<?php echo $linhagr->id_treinamento_grupo ?>" style="margin:2px"><i data-feather="x-circle" style="color:#fd2e64"></i></a>
                              <?php } else {}?>
                              
                              <input type="hidden" name="id_treinamento_grupo" value="<?php echo $linhagr->id_treinamento ?>">
                              <?php } ?>

							</td>
							<td style="text-align:center"><?php echo ($linhagr->confirmado == "s") ? "Sim": ""; ?></td>
                            <td><?php echo ($linhagr->nome) ? $linhagr->nome : null ?></td>
                            <td><a href="https://wa.me/+55<?php echo $linhagr->celular ?>?text=Meu nome é <?php echo $linha->nome_usuario; ?> da RentalMed, gostaria de confirmar seu treinamento" target="_blank"><?php echo "(".substr($linhagr->celular,0,2).") ".substr($linhagr->celular,2,-4)." - ".substr($linhagr->celular,-4);; ?></a></td>
                            <td><?php echo ($linhagr->pedido) ? $linhagr->pedido : null ?></td>
                            <td><?php echo ($linhagr->uso) ? $linhagr->uso : null ?></td>
                            <td style="text-align:center"><div class="example-popover" data-container="body<?php echo $linhagr->id_treinamento_grupo ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $linhagr->obs_treinamento ?>"><i data-feather="eye"></i></div></td>
                            <td style="text-align:center"><?php echo ($linhagr->concluido == "s") ? "Sim": "Não"; ?></td>
                            <?php $texto_crt = "Participou do treinamento do equipamento ". $linha->produto." ".$linha->marca. ", promovido pela RentalMed Locação e Comércio de Equipamentos, realizado em ".$inicioBR." com carga horária total de ".$linha->tempo_treinamento." hs, ministrado pelo(a) Prof(a) ".$linha->nome_usuario ."."?>
                            <td style="text-align:center"> <?php if($linhagr->concluido == "s"){?><a href="<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=<?php echo $linhagr->nome; ?>&email=<?php echo $linhagr->email; ?>&cpf=<?php echo $linhagr->cpf; ?>&data=<?php echo $inicioBR; ?>&produto=<?php echo $linha->produto." ".$linha->marca; ?>&tempo_treinamento=<?php echo $linha->tempo_treinamento; ?>&professor=<?php echo $linha->nome_usuario ?>&imagem=<?php echo $linha->imagem_certificado ?>&texto=<?php echo $texto_crt?>" target="_blank"><i data-feather="award"></i></a> <?php if($linhagr->certificado != "s") {} else {; ?><i data-feather="thumbs-up"></i><?php } ?><?php } else {} ?></td>
                            </tr>
                            
                            <!– modal grupo edição–>
                          
                      <div class="modal fade bd-example-modal-lg" id="ModalonGrupoe<?php echo $linhagr->id_treinamento_grupo ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                          <form action="<?php echo URL_BASE."treinamento/salvargrupo" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
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
                              <input  readonly="readonly" class="form-control" type="text" name="data_evento" placeholder="Data do Evento" value="<?php echo date('d/m/Y', strtotime($linha->data_inicio)); ?>">
                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Período</label>
                                      <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo date('H:i', strtotime($linha->data_inicio)); ?> - <?php echo date('H:i', strtotime($linha->data_fim)); ?>">
                          </div>
                        </div>
                        
                        <div class="mb-2" style="margin-top:20px">
                            <label for="select-1">Produto</label>

                                         <input  readonly="readonly" class="form-control" type="text" name="horario" placeholder="Horário" value="<?php echo ($linha->produto); ?>">
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
                              	 <label class="col-form-label m-r-10" style="padding-left:3px">Confirmado</label>
                                <label class="switch">
                                    <input type="checkbox" name="confirmado" value="s" <?php echo ($linhagr->confirmado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
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
                              <script>
                                  function myFunc<?php echo $linhagr->id_treinamento_grupo ?>(){
                                  var nome = "<?php echo $linhagr->nome; ?>";
                                  var email = "<?php echo $linhagr->email; ?>";
                                  var imagem_certificado = "<?php echo $linha->imagem_certificado ?>";
                                  var texto_padrao<?php echo $linhagr->id_treinamento_grupo ?> = document.querySelector('#texto_mudar<?php echo $linhagr->id_treinamento_grupo ?>').value;
                                    window.open('<?php echo URL_BASE ?>crt/gerar_certificado/gerador.php?nome=' + nome  + '&email=' + email + '&texto=' + texto_padrao<?php echo $linhagr->id_treinamento_grupo ?> + '&imagem=' + imagem_certificado, '_blank')
                                  }
                               </script>
                              <div class="mb-2">
                               <label class="col-form-label">Texto do Certificado: </label><span id="meu" style="margin-left:5px" class="btn btn-secondary btn-xs" onclick="myFunc<?php echo $linhagr->id_treinamento_grupo ?>()">Emitir Certificado Modificado</span>
                                <textarea rows="3" onchange="MudarTextoCertificado()" class="form-control" name="texto_mudar" id="texto_mudar<?php echo $linhagr->id_treinamento_grupo ?>" placeholder="Texto do Certificado"><?php echo $texto_crt; ?></textarea>
                       			</div>
                              
                                 </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_treinamento_grupo" value="<?php echo $linhagr->id_treinamento_grupo ?>">
                          	 <input type="hidden" name="id_treinamento" value="<?php echo $linha->id_treinamento; ?>">
                          	  <input type="hidden" name="id_responsavel" value="<?php echo $linha->id_responsavel; ?>">
                          	  <input type="hidden" name="dat" value="<?php echo $inicioBR; ?>">
                          	 
                          	<input type="hidden" name="ide" value="<?php echo $id_evento; ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <?php if($user_editar =="s"){ ?>
                            <input type="submit" value="Enviar" class="btn btn-primary">
                            <?php } else {}?>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                            
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