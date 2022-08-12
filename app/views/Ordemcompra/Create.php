<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/js/js_ordemcompra.js"></script>
<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Ordem de Compra</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Ordem de Compra</li>
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
<a href="<?php echo URL_BASE . "ordemcompra" ?>" class="btn btn-primary"> Ordens de compra</a>
</div>
<!-- Bookmark Ends-->

                    



</div>
</div>
</div>
</div>



<!-- Container-fluid starts-->
<div class="container-fluid list-products">

<div class="col-md-12 project-list">
                <div class="card">
                <div class="card-header">
                    <h5>ORDEM DE COMPRA</h5>
                  </div>
                
                      <div class="row g-3">
                      <div class="col-md-4 mb-3">
                      <span>FORNECEDOR</span>
 					  <h5><?php echo $compra_ordem_compra->nome_fornecedor; ?></h5>
                    
                        </div>

                        <div class="col-md-2 mb-3">
                        <span>DATA DE EMISSÃO</span>
                          <h5><?php echo date('d/m/Y', strtotime($compra_ordem_compra->data_emissao)); ?></h5>
                        </div>
                        <div class="col-md-2 mb-3">
                        <span>DATA DA APROVAÇÃO</span>
                         <h5><?php echo ($compra_ordem_compra->data_aprovacao)?date('d/m/Y', strtotime($compra_ordem_compra->data_aprovacao)):null; ?></h5>
                      </div>
                        <div class="col-md-2 mb-3">
                        <span>VALOR TOTAL</span>
                          <h5>R$ <span id="total_oc"><?php echo number_format($compra_ordem_compra->valor_total,2,",","."); ?></span></h5>
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span>STATUS</span>
                          <h5><?php echo  $compra_ordem_compra->status_ordem_compra; ?></h5>
                        </div>
                      </div>
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
                  
                  <form action="" method="POST">
                     
                      <div class="row g-3">

                       
                        <div class="col-md-4 mb-3">
                        
                        </style>
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
                                
                                function selecionarProduto(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto").val(nome);
                                	$("#id_produto").val(id);
                                	listarLocalizacao(id);              	
                                };
                           		</script>
                                    <input type="hidden" id="id_produto" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto" class="form-control" placeholder="Digite nome do produto" autocomplete="off">  
                    
                        </div>
                        <div class="col-md-2 mb-3">
                        <input autocomplete="off" class="form-control" type="value" data-language="en" name="qtde" id="qtde" placeholder="Qtd">
                    
                        </div>
                        <div class="col-md-2 mb-3">
                         <input autocomplete="off" class="form-control" type="value" data-language="en" name="valor" id="valor" placeholder="Valor">
                      		
                      </div>
                        <div class="col-md-2 mb-3">
                        <input type="hidden" id="id_ordem_compra" name="id_ordem_compra" value="<?php echo $compra_ordem_compra->id_ordem_compra; ?>" class="form-control">
                          <input type="button" name="Submit" class="btn btn-primary" value="Inserir" id="btnInserir">
                        </div>
                      </div>
                    </form>
                  
                    <div class="table-responsive ">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;width:5%">Item</th>
                            <th style="text-align:left;width:40%">Produto</th>
                            <th style="text-align:center;width:10%">Qtde</th>
                            <th style="text-align:center;width:10%">Valor</th>
                            <th style="text-align:center;width:10%">Total</th>
                            <th style="text-align:center;width:10%">Ação</th>
                          </tr>
                        </thead>
                        <tbody id="lista_itens_ordem_compra">
                        <?php $i = 0; foreach ($lista as $item){ $i++; $total = $total + $item->subtotal; $qtotal = $qtotal + $item->qtde?>
                          <tr>
                          <td style="text-align:center"><?php echo $item->id_item_ordem_compra ?></td>
                           <td><?php echo $item->produto ?></td>
                            <td style="text-align:center"><?php echo $item->qtde ?></td>
                            <td style="text-align:center"><?php echo $item->valor ?></td>
                            <td style="text-align:center"><?php echo $item->subtotal ?></td>
                            <td style="text-align:center">
                            	<a href="javascript:;" onclick="return excluir_ioc(this)" 
                              	data-entidade ="itemordemcompra" 
                              	data-id="<?php echo $item->id_item_ordem_compra ?>"
                              	data-ide="<?php echo $item->id_ordem_compra ?>"
                              	class="btn btn-danger">Excluir
                              	</a>
                              </td>
                          </tr>
                          
                          <?php } ?>
                           <tr>
                          <td style="text-align:center"><strong><?php echo $i ?></strong></td>
                           <td><strong>Total</strong></td>
                            <td style="text-align:center"><strong><?php echo $qtotal ?></strong></td>
                            <td></td>
                            <td style="text-align:center"><strong><?php echo number_format($total,2,",","."); ?></strong></td>
                            <td style="text-align:center"></td>
                          </tr>
                          <tr>
                          <td style="text-align:center"></td>
                           <td></td>
                            <td style="text-align:center"></td>
                            <td></td>
                            <td style="text-align:right"><a href="<?php echo URL_BASE."ordemcompra/excluir/".$compra_ordem_compra->id_ordem_compra ?>" class="btn btn-danger" >Excluir</a></td>
                            <td style="text-align:center"> <a href="<?php echo URL_BASE."ordemcompra/finalizar/".$compra_ordem_compra->id_ordem_compra ?>" class="btn btn-primary">Finalizar</a></td>
                          </tr>
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