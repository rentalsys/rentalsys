<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
									<style type="text/css">
                                       
                                        .listaProdutos{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:15px;
                                    	top:148px;
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
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Saidas Avulsas</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Saidas Avulsas</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo">Cadastrar Saida</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  <div class="modal fade" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalcat" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "saida/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Saida Avulsa</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      	  <script type="text/javascript">
                           		$(function(){
                           		$("#produto").on("keyup", function(){
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
                            		  $("#produto").after('<div class="listaProdutos"></div>');
                            	   html = "";
                            		for (i = 0; i < data.length; i++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
                            		  + 'data-id="' + data[i].id_produto +  '"data-preco="' + data[i].preco +
                            		   '" data-nome="' + data[i].produto + '">' +
                            		  data[i].produto + '</a></div>';
                            		  
                            		}
                            		$(".listaProdutos").html(html);
                                    $(".listaProdutos").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarProduto(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	var preco = $(obj).attr("data-preco");
                                	var qtd = document.querySelector('#qtd').value;
                                	var sub = preco*qtd;
                                	var subtotal = sub.toLocaleString('pt-br', {minimumFractionDigits: 2});
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto").val(nome);
                                	$("#id_produto").val(id);
                                	$("#preco").val(preco);
                                	$("#subtotal").val(subtotal);
                                	
                                	listarLocalizacao(id); 
                                	}      
                                	
                                	function listarLocalizacao(id){
                                	
                                	$.ajax({
                                    	  url: base_url + "produtolocalizacao/ListaPorProduto/" +id ,
                                    	  type: "GET",
                                    	  dataType: "json",
                                    	  data:{},
                                    	  success: function (data){
                                    		html = "";
                                    		 for (i = 0; i < data.length; i++) {
                                    			html +="<option value='"+ data[i].id_localizacao +"'>" + data[i].localizacao + "</option>";
                                    		}
                                    		$("#id_localizacao").html(html);
                                    	  }
                                     });       	
                                };
                           		</script>

                          <div class="mb-3">
                            <label class="col-form-label">Produto</label>
                            <input type="hidden" id="id_produto" name="id_produto" class="form-control">
                        	
                        	<input type="text" id="produto" class="form-control" placeholder="Digite nome do produto" autocomplete="off" required>
                   
                          </div>

                          <div class="form-group row">
                          <div class="col-6">
							<label class="col-form-label">Pre??o</label>
                            <input id="preco" class="form-control" name="valor_saida" type="text" placeholder="Pre??o" value="" readonly>
                          </div>
                           <script>
                           function recalcula() {
    						var valor1 = parseInt(document.getElementById('qtd').value, 10);
    						var valor2 = parseInt(document.getElementById('preco').value, 10);
    						var subt = valor1 * valor2;
    						document.getElementById('subtotal').value = subt.toLocaleString('pt-br', {minimumFractionDigits: 2});
    						
                          	}
        					</script>
                          <div class="col-6">
                            <label class="col-form-label">QTD</label>
                            <input  class="form-control" id="qtd" name="qtde_saida" type="text" placeholder="Quantidade" value="1" onblur="return recalcula()">
                          </div>
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Subtotal</label>
                            <input  class="form-control" id="subtotal" name="subtotal_saida" type="text" placeholder="Subtotal" value="" readonly>
                          </div>
                          
                          <div class="mb-3">
                             <label class="col-form-label">Localiza????o</label>
                             <select class="form-control btn-square" name="id_localizacao" id="id_localizacao" required>
                             </select>
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="submit" value="Enviar" class="btn btn-primary" onblur="return recalcula()">
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
                            <th style="text-align:left;width:10%">Data</th>
                            <th style="text-align:left;width:45%">Produto</th>
                            <th style="text-align:left;width:15%">Localiza????o</th>
                            <th style="text-align:center;width:5%">QTD</th>
                            <th style="text-align:center;width:10%">Valor</th>
                            <th style="text-align:center;width:10%">SubTotal</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $entra){?>
                        <?php $imagem = ($entra->imagem) ? $entra->imagem: "sementrada.png" ?>
                          <tr>
                          <td style="text-align:center"><?php echo $entra->id_saida ?></td>
                           <td><?php echo date('d/m/Y', strtotime($entra->data_saida)) ?> </td>
                           <td><h6> <?php echo $entra->produto ?></h6></td>
                           <td><?php echo $entra->localizacao ?></td>
                           <td style="text-align:center"><?php echo $entra->qtde_saida ?></td>
                            <td style="text-align:center"><?php echo number_format($entra->valor_saida,2,",","."); ?></td>
                            <td style="text-align:center"><?php echo number_format($entra->subtotal_saida,2,",","."); ?></td>
                            
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $entra->id_saida ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $entra->id_saida ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "saida/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Saida Avulsa #<?php echo $entra->id_saida ?></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      	  <script type="text/javascript">
                           		$(function(){
                           		$("#produto<?php echo $entra->id_saida ?>").on("keyup", function(){
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
                            		  $("#produto<?php echo $entra->id_saida ?>").after('<div class="listaProdutos"></div>');
                            	   html = "";
                            		for (i = 0; i < data.length; i++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto<?php echo $entra->id_saida ?>(this)"'
                            		  + 'data-id="' + data[i].id_produto +  '"data-preco="' + data[i].preco +
                            		   '" data-nome="' + data[i].produto + '">' +
                            		  data[i].produto + '</a></div>';
                            		  
                            		}
                            		$(".listaProdutos").html(html);
                                    $(".listaProdutos").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarProduto<?php echo $entra->id_saida ?>(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	var preco = $(obj).attr("data-preco");
                                	var qtd = document.querySelector('#qtd<?php echo $entra->id_saida ?>').value;
                                	var sub = preco*qtd;
                                	var subtotal = sub.toLocaleString('pt-br', {minimumFractionDigits: 2});
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto<?php echo $entra->id_saida ?>").val(nome);
                                	$("#id_produto<?php echo $entra->id_saida ?>").val(id);
                                	$("#preco<?php echo $entra->id_saida ?>").val(preco);
                                	$("#subtotal<?php echo $entra->id_saida ?>").val(subtotal);
                                	
                                	listarLocalizacao<?php echo $entra->id_saida ?>(id); 
                                	}      
                                	
                                	function listarLocalizacao<?php echo $entra->id_saida ?>(id){
                                	
                                	$.ajax({
                                    	  url: base_url + "produtolocalizacao/ListaPorProduto/" + id,
                                    	  type: "GET",
                                    	  dataType: "json",
                                    	  data:{},
                                    	  success: function (data){
                                    		html = "";
                                    		 for (j = 0; j < data.length; j++) {
                                    			html +="<option value='"+ data[i].id_localizacao +"'>" + data[i].localizacao + "</option>";
                                    		}
                                    		$("#id_localizacao<?php echo $entra->id_saida ?>").html(html);
                                    	  }
                                     });       	
                                };
                           		</script>

                          <div class="mb-3">
                            <label class="col-form-label">Produto</label>
                            <input type="hidden" id="id_produto<?php echo $entra->id_saida ?>" name="id_produto" value="<?php echo $entra->id_produto ?>" class="form-control">
                        	
                        	<input type="text" id="produto<?php echo $entra->id_saida ?>" class="form-control" placeholder="Digite nome do produto" value="<?php echo $entra->produto ?>" autocomplete="off" required>
                   
                          </div>

                          <div class="form-group row">
                          <div class="col-6">
							<label class="col-form-label">Pre??o</label>
                            <input id="preco<?php echo $entra->id_saida ?>" class="form-control" name="valor_saida" type="text" placeholder="Pre??o" value="<?php echo number_format($entra->valor_saida,2,",","."); ?>" readonly>
                          </div>
                           <script>
                           function recalcula<?php echo $entra->id_saida ?>() {
    						var valor1 = parseInt(document.getElementById('qtd<?php echo $entra->id_saida ?>').value, 10);
    						var valor2 = parseInt(document.getElementById('preco<?php echo $entra->id_saida ?>').value, 10);
    						var subt = valor1 * valor2;
    						document.getElementById('subtotal<?php echo $entra->id_saida ?>').value = subt.toLocaleString('pt-br', {minimumFractionDigits: 2});
    						
                          	}
        					</script>
                          <div class="col-6">
                            <label class="col-form-label">QTD</label>
                            <input  class="form-control" id="qtd<?php echo $entra->id_saida ?>" name="qtde_saida" type="text" placeholder="Quantidade" value="<?php echo $entra->qtde_saida ?>" onblur="return recalcula<?php echo $entra->id_saida ?>()">
                          </div>
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Subtotal</label>
                            <input  class="form-control" id="subtotal<?php echo $entra->id_saida ?>" name="subtotal_saida" type="text" placeholder="Subtotal" value="<?php echo number_format($entra->subtotal_saida,2,",","."); ?>" readonly>
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Localiza????o</label>
                             <select class="form-control btn-square" name="id_localizacao" id="id_localizacao<?php echo $entra->id_saida ?>" required>
                            </select>      
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="hidden" name="id_saida" value="<?php echo $entra->id_saida ?>">
                            <input type="submit" value="Enviar" class="btn btn-primary" onblur="return recalcula<?php echo $entra->id_saida ?>()">
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