<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Lista de Cotações</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Lista de Cotações</li>
</ol>
</div>

<div class="col-sm-6">
<!-- Bookmark Start-->
<div class="bookmark">
<a href="<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar" data-whatever="@mdo">Adicionar</a>
<a href="<?php echo URL_BASE . "cotacao" ?>" class="btn btn-primary"> Cotacao</a>
<a href="<?php echo URL_BASE . "solicitacao" ?>" class="btn btn-primary"> Solicitacao</a>
<a href="<?php echo URL_BASE . "cotacao/finalizar/" . $cotacao->id_cotacao ?>" class="btn btn-warning"> Finalizar Cotação</a>
</div>
<!-- Bookmark Ends-->

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

</div>
</div>
</div>
</div>
<!-- Container-fluid starts-->
<div class="container-fluid">
            <div class="row">
              <div class="col-lg-12">
                <div class="site">
                  <div class="site-bd">
                    <div class="wrapper">
                    <?php $this->verErro(); ?>
                      <div class="card">
                        <div class="card-body row">
                          <div class="col-sm-6">
							<h5>Solicitações</h5>
							<form action="<?php echo URL_BASE."solicitacaocotacao/inserir"?>" name = "frmsolicitacao" method="Post" class="row row-cols-sm-2 theme-form mt-3 form-bottom">
                          <div class="mb-2">
                            <div class="mb-1">
                            <select class="form-select" id="id_solicitacao" name="id_solicitacao" required="">
                            <option value="">Selecione uma Solicitação</option>
                                       		<?php foreach ($solicitacoes as $soli){
            								    echo "<option value='$soli->id_solicitacao'>$soli->produto</option>";
            								}?> 
                          </select>
                      </div>
                          </div>
                         <div class="mb-2">
                         <input type="hidden" name="id_cotacao" value="<?php echo $cotacao->id_cotacao ?>">
                            <button class="btn btn-secondary">Inserir</button>
                          </div>
                        </form>
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table table-bordernone table-xs">                                         
                            <thead>
                              <tr>     
                              	<th>ID</th>
                                <th>Produto</th>
                                <th>Qtde</th>
                                <th>Ação</th>                                   
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($solicitacoes_cotacao as $soli){?>
                              <tr>
                                <td>
                                  <?php echo $soli->id_solicitacao ?>
                                </td>
                                <td>
                                  <p><?php echo $soli->produto ?></p>
                                </td>
                                <td>
                                  <p><?php echo $soli->qtde ?></p>
                                </td>
                                <td align="center"><a href="<?php echo URL_BASE."solicitacaocotacao/excluir/".$soli->id_solicitacao_cotacao."/".$soli->id_solicitacao . "/".$soli->id_cotacao ?>" class="link-vermelho"><i class="icon-trash" style="color:#FF0000"></i><!-- Excluir--></a>
                              </tr>
							<?php } ?>
                            </tbody>
                          </table>
                        </div>
                        
                      </div>
                          </div>
                          
                          <div class="col-sm-6">
                          <h5>Fornecedores</h5> 
                          <form action="<?php echo URL_BASE."fornecedorcotacao/inserir"?>" name="frmfornecedores" method="Post" class="row row-cols-sm-2 theme-form mt-3 form-bottom">	
                          <div class="mb-2">
                            <div class="mb-1">
                        

                           		<div class="mb-2">
                                    <div class="col-12">
                           			<select class="form-select" name="id_fornecedor" id="id_fornecedor" >
                                            <option value="">Escolha uma Opção</option>
                                            <?php foreach ($fornecedores as $fornecedor){
                                            echo "<option value='$fornecedor->id_fornecedor' >$fornecedor->nome_fornecedor</option>";  
                                            } ?>                                         
										</select>
                        		</div>            
                           		</div>
                        </select>
                      </div>
                          </div>
                         <div class="mb-2">
                         <input type="hidden" name="id_cotacao" value="<?php echo $cotacao->id_cotacao ?>">
                            <button class="btn btn-secondary">Inserir</button>
                          </div>
                        </form>
                            <div class="card-body">
                        <div class="table-responsive">
                          
                          <table class="table table-bordernone table-xs">                                         
                            <thead>
                              <tr>                                        
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Whatsaap</th>
                                <th>Ação</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($fornecedores_cotacao as $f){?>   
                              <tr>
                                <td>
                                  <?php echo $f->id_fornecedor_cotacao ?>
                                </td>
                                <td>
                                  <strong class="d-block"><?php echo $f->nome_fornecedor ?></strong>
                                </td>
                                <td>
                                  <p><?php echo $f->email ?></p>
                                </td>
                                <td><?php echo $f->celular ?></td>
                                <td>
                                  <a href="<?php echo URL_BASE."fornecedorcotacao/excluir/".$f->id_fornecedor_cotacao."/".$f->id_cotacao ?>"><i class="icon-trash" style="color:#FF0000"></i><!-- Excluir--></a>
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
              </div>
              
              

            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>