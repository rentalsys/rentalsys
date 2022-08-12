<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Lista de Pedidos A Faturar</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Lista de Pedidos A Faturar</li>
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
<a href="<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar" data-whatever="@mdo">Adicionar</a>
</div>
<!-- Bookmark Ends-->

                    
                    
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" action="<?php echo URL_BASE . "ordemcompra/novo" ?>" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Ordem de Compra</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
                          </div>
                  	
                  			<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>

								<style type="text/css">
								.listaFornecedor{
                                        text-align:left;
                                    	position:absolute;
                                    	left:10px;
                                    	right:15px;
                                    	top:35px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1041
                                    }
                                     .listaFornecedor a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                        
                           		</style>
                           		<script type="text/javascript">
                           		$(function(){
                           		$("#fornecedor").on("keyup", function(){
                            	var t  = $(this).val();
                            	if(t == ""){
                            		$(".listaFornecedor").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "fornecedor/buscar/" +t ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#fornecedor").after('<div class="listaFornecedor"></div>');
                            	   html = "";
                            		for (y = 0; y < data.length; y++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarFornecedor(this)"'
                            		  + 'data-id="' + data[y].id_fornecedor +
                            		   '" data-nome="' + data[y].nome_fornecedor + '">' +
                            		  data[y].nome_fornecedor + '</a></div>';
                            		  
                            		}
                            		$(".listaFornecedor").html(html);
                                    $(".listaFornecedor").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarFornecedor(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	
                                	
                                	$(".listaFornecedor").hide();
                                	$("#fornecedor").val(nome);
                                	$("#id_fornecedor").val(id);            	
                                };
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Fornecedor</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_fornecedor" name="id_fornecedor" class="form-control">
                        	
                        		<input type="text" id="fornecedor" class="form-control" placeholder="Digite nome do Fornecedor" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Data</label>
                                     <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data" placeholder="<?php echo $fimBR; ?>">
                      		<input type="hidden" name="data1" value="<?php echo $fimBR; ?>">  
                           		</div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario_solicitou" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
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
                            <th style="text-align:center;width:5%">ID</th>
                            <th style="text-align:left;width:15%">Cliente</th>
                            <th style="text-align:left;width:10%">Contato</th>
                            <th style="text-align:center;width:15%">Data</th>
                            <th style="text-align:center;width:15%">Origem</th>
                            <th style="text-align:left;width:15%">Subtotal</th>
                            <th style="text-align:center;width:10%">Status</th>
                            <th style="text-align:center;width:15%">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $pedido){?>
                          <tr>
                          
                          
                          <td style="text-align:center"><?php echo $pedido->id_pedido ?></td>
                           <td style="text-align:left"><?php echo $pedido->nome ?></td>
                           <td><?php echo $pedido->celular ?></td>
                            <td style="text-align:center"><?php echo date('d/m/Y', strtotime($pedido->data_pedido)) ?></td>
                            <td>-</td>
                            <td><?php echo number_format($pedido->total,2,",","."); ?></td>
                            <td style="text-align:center"><?php echo $pedido->status_pedido ?></td>
                            <td style="text-align:center">
                            <a href="<?php echo URL_BASE ."financeiro/faturar_pedido/". $pedido->id_pedido?>" class="btn btn-primary">Faturar</a>                       
                            </td>
                          </tr>
                          
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
