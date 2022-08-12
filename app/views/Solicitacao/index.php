<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Lista de Solicitações</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Lista de Solicitações</li>
</ol>
</div>



<div class="col-sm-6">


<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<!– modal de inserção –>

								<style type="text/css">
								.listaClientes1{
                                        text-align:left;
                                    	position:absolute;
                                    	left:30px;
                                    	right:15px;
                                    	top:165px;
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
                    
                    
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" action="<?php echo URL_BASE . "solicitacao/salvar" ?>" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Solicitação</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
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
                                };
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Produto</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_produto<?php echo $id_h ?>" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Quantidade</label>
                                     <input type="text" name="qtde" class="form-control" placeholder="Digite nome do produto" autocomplete="off">   
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



<!-- Bookmark Start-->
<div class="bookmark">
<a href="<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar" data-whatever="@mdo">Adicionar</a>
<a href="cotacao" class="btn btn-primary">Cotações</a>

</div>
<!-- Bookmark Ends-->

</div>
</div>
</div>
</div>
<!-- Container-fluid starts-->
<form id="frmCotar" name="frmCotar" method="POST" action="<?php echo URL_BASE . "cotacao/em_massa" ?>" enctype="multipart/form-data" class="theme-form mega-form ">


<div class="container-fluid list-products">
<div class="bookmark">
<button class="btn btn-primary" type="submit"><i class="fas fa-arrow-alt-circle-right"></i> Fazer cotação </button>	
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
                      <table class="display table-xs" id="basic-1">
                        <thead>
                          <tr>
                          	<th style="text-align:center;width:5%">
                          	<!-- Individual column searching (text inputs) Starts
							<input type='checkbox' name='tudo' id="example-select-all"  />
							-->
							</th>
                            <th style="text-align:center;width:5%">ID</th>
                            <th style="text-align:left;width:20%">Produto</th>
                            <th style="text-align:center;width:15%">Data Solicitação</th>
                            <th style="text-align:left;width:15%">Status</th>
                            <th style="text-align:center;width:10%">Qtde</th>
                            <th style="text-align:center;width:10%">Solicitante</th>
                            <th style="text-align:center;width:10%">Excluir</th>
                            <th style="text-align:center;width:15%">Editar</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $solicitacao){?>
                          <tr>
                          <td style="text-align:center"><input type="checkbox" name="idSolicitacao[]" value="<?php echo $solicitacao->id_solicitacao ?>" ></td>
                          <td style="text-align:center"><?php echo $solicitacao->id_solicitacao ?></td>
                           <td><?php echo $solicitacao->produto ?></td>
                           <td style="text-align:center"><?php echo date('d/m/Y', strtotime($solicitacao->data_solicitacao)) ?></td>
                           <td><?php echo $solicitacao->status_solicitacao ?></td>
                            <td style="text-align:center"><?php echo $solicitacao->qtde ?></td>
                            <td style="text-align:center"><?php echo $solicitacao->nome_usuario ?></td>
                            <td class="font-success" style="text-align:center"></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="categoria" data-id="<?php echo $solicitacao->id_categoria ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo $solicitacao->id_categoria ?>" data-whatever="@mdo">Editar</a>
                              
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
            </form>
          </div>
          
          <!-- Container-fluid Ends-->
        </div>