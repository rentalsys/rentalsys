<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<script src="<?php echo URL_BASE ?>assets/js/js_ordemcompra.js"></script>
<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Pedido Faturamento</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
<li class="breadcrumb-item active">Pedido Faturamento</li>
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
                    <h5>PEDIDO N<sup>o</sup> <span id="id_pedido"><?php echo $pedido->id_pedido; ?></h5>
                  </div>
                
                      <div class="row g-3">
                      <div class="col-md-4 mb-3">
                      <span>CLIENTE </span>
 					  <h5><?php echo $pedido->nome ?></h5>
                    
                        </div>

                        <div class="col-md-2 mb-3">
                        <span>DATA DE EMISSÃO</span>
                          <h5><?php echo date('d/m/Y', strtotime($pedido->data_pedido)); ?></h5>
                        </div>
                        <div class="col-md-2 mb-3">
                        <span>DATA DA APROVAÇÃO</span>
                         <h5><?php echo ($pedido->data_aprovacao)?date('d/m/Y', strtotime($pedido->data_aprovacao)):null; ?></h5>
                      </div>
                        <div class="col-md-2 mb-3">
                        <span>VALOR TOTAL</span>
                          <h5>R$ <span id="total_oc"><?php echo number_format($pedido->total,2,",","."); ?></span></h5>
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span>STATUS</span>
                          <h5><?php echo  $pedido->status_pedido; ?></h5>
                        </div>
                      </div>
                </div>
              </div>
              
              <form action="<?php echo URL_BASE ."ordemcompra/faturarOrdemCompra" ?>" method="post">    
              <div class="col-md-12 project-list">
                <div class="card">
                <div class="card-header">
                    <h5>Dados do Pagamento</h5>
                  </div>
                
                      <div class="row g-2">
                      <div class="col-md-4 mb-3">
 					  <label class="text-label">Documento Origem</label>
						<select class="form-control" name="id_documento_origem">
						<?php 
						  foreach($documentos as $doc){
							echo "<option value='$doc->id_documento_origem'>$doc->documento_origem</option>";
						  }
							?>
						</select>
                    
                        </div>

                        <div class="col-md-2 mb-3">
                        <label class="text-label">Núm. Documento</label>
						<input type="number" name="numero_documento" id="numero_documento" value="100" class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
                        <label class="text-label">Intervalo Parcelas</label>
						<select class="form-control" name="intervalo_entre_parcela" ">
							<option value="0">&#192; Vista</option>
							<option value="7"> 07 Dias</option>
							<option value="15">15 Dias</option>
							<option value="30" selected>30 Dias</option>
							<option value="60">60 Dias</option>
							<option value="90">90 Dias</option>
							<option value="180">180 Dias</option>
							<option value="360">360 Dias</option>

						</select>
                      </div>
                        <div class="col-md-2 mb-3">
                        <label class="text-label">Valor Total</label>
						<input type="text" name="valor_total" value="<?php echo moedabr($ordem_compra->valor_total) ?>" readonly id="valor_total"  class="form-control">	
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <label class="text-label">Juros</label>
						<input type="text" name="juros"  id="juros" value="0" class="form-control">	
                        </div>
                      </div>
                      
                      <div class="row g-3">
                      <div class="col-md-2 mb-3">
                      <label class="text-label">Desconto</label>
						<input type="text" name="desconto" value="0"    class="form-control">		
                        </div>

                        <div class="col-md-2 mb-3">
                        <label class="text-label">Multa</label>
						<input type="text" name="multa" value="0"    class="form-control">
                        </div>
                        <div class="col-md-2 mb-3">
						<label class="text-label">Data Lançamento</label>
						 <input type="date" name="data_lancamento" value="<?php echo hoje() ?>"  id="data_lancamento"  class="form-control">	
                      </div>
                        <div class="col-md-2 mb-3">
                        <label class="text-label">Primeiro Vencimento</label>
						 <input type="date" name="primeiro_vencimento" id="primeiro_vencimento" required  class="form-control">		
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <label class="text-label">Valor a Pagar</label>
						 <input type="text" name="valor_a_pagar" value="<?php echo moedabr($ordem_compra->valor_total) ?>" readonly id="valor_a_pagar"  class="form-control">		
                        </div>
                        
                         <div class="col-md-2 mb-3">
                        <label class="text-label">&nbsp</label>
						<input type="hidden" value="<?php echo $pedido->id_pedido ?>" name="id_pedido" />
						<input type="hidden" value="<?php echo $pedido->id_cliente ?>" name="id_cliente" />
						<input type="submit" value="Faturar Pedido" class="btn btn-primary" />  		
                        </div>
                        
                      </div>
                      
                    
                      
                </div>
                </div>
				</form>
				
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
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;width:5%">Item</th>
                            <th style="text-align:left;width:40%">Produto</th>
                            <th style="text-align:center;width:10%">Qtde</th>
                            <th style="text-align:center;width:10%">Preço</th>
                            <th style="text-align:center;width:10%">SubTotal</th>
                          </tr>
                        </thead>
                        <tbody id="lista_itens_ordem_compra">
                        <?php $i = 0; foreach ($itens as $item){ $i++; $total = $total + $item->valor*$item->qtde; $qtotal = $qtotal + $item->qtde?>
                          <tr>
                          <td style="text-align:center"><?php echo $item->id_item_pedido ?></td>
                           <td><?php echo $item->produto ?></td>
                            <td style="text-align:center"><?php echo $item->qtde ?></td>
                            <td style="text-align:center"><?php echo number_format($item->valor,2,",",".") ?></td>
                            <td style="text-align:center"><?php echo number_format($item->valor*$item->qtde,2,",",".") ?></td>
                            
                          </tr>
                          
                          <?php } ?>
                           <tr>
                          <td style="text-align:center"><strong><?php echo $i ?></strong></td>
                           <td><strong>Total</strong></td>
                            <td style="text-align:center"><strong><?php echo $qtotal ?></strong></td>
                            <td></td>
                            <td style="text-align:center"><strong><?php echo number_format($total,2,",","."); ?></strong></td>
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



         