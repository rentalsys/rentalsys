<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Lista de Pedidos</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Lista de Pedidos</li>
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
                    $inicio = date('Y-m-01');
                    $inicioBR = date('d/m/Y', strtotime($inicio));
                    //echo $inicio." ".$inicioBR;
                    
                    
                    
                    $idi = "%%";

                }
                
                ?>

<div class="col-sm-6">
<!-- Bookmark Start-->
<div class="bookmark">
<a href="<?php echo URL_BASE . "pipeline" ?>" class="btn btn-info"> Pipeline</a>
<a href="<?php echo URL_BASE . "pedido" ?>" class="btn btn-secondary"> Pedidos</a>
<a href="<?php echo URL_BASE . "orcamento" ?>" class="btn btn-primary"> Orçamentos</a>
</div>
<!-- Bookmark Ends-->

<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<!– modal de inserção –>

								<style type="text/css">
								.listaClientes{
                                        text-align:left;
                                    	position:absolute;
                                    	left:20px;
                                    	right:15px;
                                    	top:105px;
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
                       
                           		</style>
                    
                    
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" action="<?php echo URL_BASE . "orcamento/salvar" ?>" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Gerar Orçamento <?php echo date('d/m/Y H:i') ?></h5>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
                          </div>
                  	
                  			 <script type="text/javascript">
                           		$(function(){
                           		$("#nome").on("keyup", function(){
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
                            		  $("#nome").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (p = 0; p < data.length; p++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente(this)"'
                            		  + 'data-idp="' + data[p].id_cliente + '" data-celular="' + data[p].celular + ' "data-email="' + data[p].email +
                            		   '" data-nomep="' + data[p].nome + '">' +
                            		  data[p].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes").html(html);
                                    $(".listaClientes").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente(obj){
                                	var idp = $(obj).attr("data-idp");
                                	var nomep = $(obj).attr("data-nomep");
                                	var celularp = $(obj).attr("data-celular");
                                	var emailp = $(obj).attr("data-email");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#nome").val(nomep);
                                	$("#cliente").val(nomep);
                                	$("#id_cliente").val(idp);
                                	$("#celular").val(celularp);
                                	$("#email").val(emailp);
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                           		</script>
                           		
                           		<div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input type="hidden" id="id_cliente" name="id_cliente" class="form-control">
                                    <input  class="form-control" name="nome" id="nome" type="text" value="" autocomplete="off" placeholder="Nome do Cliente" required="required">
                                  </div>
                           		<div class="form-group row">
                           		 <div class="col-6">
                            		<label>Telefone</label>
                                     <input type="text" name="celular" id="celular" class="form-control" placeholder="Telefone do Cliente" autocomplete="off">   
                           		</div>
                           		<div class="col-6">
                            		<label>e-mail</label>
                                     <input type="text" name="email" id="email" class="form-control" placeholder="email do produto" autocomplete="off">   
                           		</div>
                           		</div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario_solicitou" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                          	<input type="hidden" name="data_pedido" value="<?php echo date('Y-m-d') ?>">
                          	<input type="hidden" name="hora_pedido" value="<?php echo date('H-i') ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent" onClick="return vazio()">Enviar</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
            <!-- Modal Inserir-->

</div>
</div>
</div>
</div>



<!-- Container-fluid starts-->
<div class="container-fluid list-products">

<div class="col-md-12 project-list">
                <div class="card">
                  <form class="needs-validation" action="<?php echo URL_BASE . "cotacao/filtro/"?> method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                      <div class="col-md-2 mb-3">
 
                    
                        </div>
                       
                        <div class="col-md-2 mb-3">
                                    <select class="form-control btn-square" id="st" name="st" >
                                    <option value="%%">Todos os Status</option>
                                       		<?php foreach ($status_cotacao as $st){
                                       		    $selecionado = ($st->id_status_cotacao == $idi) ? "selected" :"";
            								    echo "<option value='$st->id_status_cotacao' $selecionado>$st->status_cotacao</option>";
            								}?> 
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
                        <div class="col-md-2 mb-3">
                          <button class="form-control btn btn-primary" type="submit" style="color:#fff">Filtrar</button>
                        </div>
                      </div>
                      
                      <input type="hidden" name="pesquisar" value="sim">
                    </form>
                </div>
              </div>

<div class="row">
<!-- Individual column searching (text inputs) Starts-->
<div class="col-sm-12">
<div class="card">

<?php
$this->verMsg();
$this->verErro();
?>
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th col style="text-align:center;">ID</th>
                            <th col style="text-align:center;">Data</th>
                            <th col style="text-align:left;">Solicitante</th>
                            <th col style="text-align:left;">Cliente</th>
                            <th col style="text-align:center;">Produtos</th>
                            <th col style="text-align:center;">Valor Total</th>
                            <th col style="text-align:center;">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $cotacao){?>
                          <tr>
                          <td style="text-align:center"><?php echo $cotacao->id_pedido ?></td>
                           <td style="text-align:center"><?php echo date('d/m/Y', strtotime($cotacao->data_pedido))." ".date('H:i', strtotime($cotacao->hora_pedido)); ?></td>
                           <td><?php echo $cotacao->nome_usuario ?></td>
                            <td style="text-align:left"><?php echo $cotacao->nome ?></td>
                            <td style="text-align:center"><?php echo $cotacao->qtd_produtos ?></td>
                            <td style="text-align:center"><?php echo number_format($cotacao->total,2,",","."); ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="categoria" data-id="<?php echo $cotacao->id_cotacao ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="<?php echo URL_BASE ."pedido/create/".$cotacao->id_pedido ?>" class="btn btn-primary"><?php echo $cotacao->status_pedido ?></a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $cotacao->id_categoria ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $categoria->id_categoria ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "categoria/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar Categoria</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Categoria</label>
                            <input  class="form-control" name="categoria" type="text" placeholder="Nome da Categoria" value="<?php echo $categoria->categoria ?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Nome Abreviado da Categoria</label>
                            <input  class="form-control" name="abreviatura" type="text" placeholder="Nome Abreviado da Categoria" value="<?php echo $categoria->abreviatura ?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Tipo de Receita</label>
                            <input  class="form-control" name="tipo_receita" type="text" placeholder="Tipo de Receita" value="<?php echo $categoria->tipo_receita ?>">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  <!-- Modal Editar-->
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Individual column searching (text inputs) Ends-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>