<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/js/js_pedido.js"></script>
<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Pedido</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Pedido</li>
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
<a href="<?php echo URL_BASE . "Pedido" ?>" class="btn btn-primary"> Pedidos</a>
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
                    <h5>PEDIDO N<sup>o</sup> <span id="id_pedido"><?php echo $orcamento_pedido->id_pedido; ?></span> [ <?php echo $orcamento_pedido->status_pedido; ?> ]</h5>
                  </div>

                      <div class="row g-3">
                      <div class="col-md-4 mb-3">
                      <span>CLIENTE</span>
 					  <h5><?php echo $orcamento_pedido->nome; ?></h5>
                    
                        </div>

                        <div class="col-md-2 mb-3">
                        <span>DATA DO ORÇAMENTO</span>
                          <h5><?php echo ($orcamento_pedido->data_pedido)?date('d/m/Y', strtotime($orcamento_pedido->data_pedido))." ".date('H:i', strtotime($orcamento_pedido->hora_pedido)):null; ?></h5>
                        </div>
                        <div class="col-md-2 mb-3">
                        <span>SOLICITANTE</span>
                         <h5><?php echo $orcamento_pedido->nome_usuario; ?></h5>
                      </div>
                        <div class="col-md-2 mb-3">
                        <span>VALOR TOTAL</span>
                          <h5>R$ <span id="total_oc"><?php echo number_format($orcamento_pedido->total,2,",","."); ?></span></h5>
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span>DATA DE EXPIRAÇÃO</span>
                          <h5><?php echo date('d/m/Y', strtotime($orcamento_pedido->data_pedido. ' + 2 days'))." ".date('H:i', strtotime($orcamento_pedido->hora_pedido)); ?></h5>
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
                        		
                                    <input type="hidden" id="id_produto" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto" class="form-control" placeholder="Digite nome do produto" autocomplete="off">  
                    
                        </div>
                        <div class="col-md-2 mb-3">
                        <input autocomplete="off" class="form-control" type="text" name="qtde" id="qtde" placeholder="Qtd" value="1">
                    
                        </div>
                        <div class="col-md-2 mb-3">
                         <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor" readonly>
                      		
                      </div>
                      <div class="col-md-2 mb-3">
                         <input class="form-control" type="text" name="estoque" id="estoque" placeholder="Estoque" readonly>
                      		
                      </div>
                        <div class="col-md-2 mb-3">
                        <input type="hidden" id="id_ordem_compra" name="id_ordem_compra" value="<?php echo $compra_ordem_compra->id_ordem_compra; ?>" class="form-control">
                          <input type="button" class="btn btn-primary" value="Inserir" id="btnInserirItens">
                        </div>
                      </div>
                  
                    <div class="table-responsive ">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;width:5%">Item</th>
                            <th style="text-align:center;width:5%">ID</th>
                            <th style="text-align:left;width:40%">Produto</th>
                            <th style="text-align:center;width:10%">Valor</th>
                            <th style="text-align:center;width:5%">Qtde</th>
                            <th style="text-align:center;width:10%">Total</th>
                            <th style="text-align:center;width:10%">Estoque</th>
                            <th style="text-align:center;width:10%">Excluir</th>
                          </tr>
                        </thead>
                        <tbody id="lista_item">
                        <?php  $i = 0; foreach ($itenspedido as $itemp) { $i++; ?>
                       		<tr>
					   		<td style='text-align:center'><?php echo $i ?></td>
					    	<td style='text-align:center'><?php echo $itemp->id_produto ?></td>
					   		<td style='text-align:left'><?php echo $itemp->produto ?></td>
					   		<td style='text-align:center'><?php echo number_format($itemp->preco,2,",","."); ?></td>
					   		<td style=""text-align:center"><input onchange="atualizaSubTotal(this)" style="text-align:center;width:100px" type="number" name="quant[<?php echo $itemp->id_produto ?>]" class="p_quant" value="<?php echo $itemp->qtde ?>" data-preco="<?php echo $itemp->preco ?>"   data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>"> </td>
					   		<td style="text-align:center" class="subtotal"><?php echo number_format($itemp->preco*$itemp->qtde,2,",","."); ?></td>
					   		<td style='text-align:center'><?php echo $itemp->estoque_real ?></td>
					   		<td style="text-align:center"><a href="javascript:;" onclick="excluirProduto(this)" data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>" class="btn btn-danger">Excluir</a></td>
                       		</tr>
                        	<?php }?>
                        </tbody>
                           <tr>
                            <th style="text-align:center;width:5%"><span id="qtd_produtos"><?php echo $i ?></span></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:left;width:40%"></th>
                            <th style="text-align:center;width:10%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:10%"><button class="btn btn-danger" onclick="ExcluirItens()"> Limpar</button></th>
                            <th style="text-align:center;width:10%">
                            
                            <a href="<?php echo URL_BASE ."orcamento/finalizar/".$itemp->id_pedido ?>" class="btn btn-primary"> Faturar</a></th>
                          </tr>
                        </thead>
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