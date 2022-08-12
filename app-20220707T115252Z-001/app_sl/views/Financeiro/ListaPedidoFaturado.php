
              <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
                <span class="d-flex center-middle"><i class="fas fa-arrow-right mr-1"></i>  Lista de pedidos Faturados </span>
				 <div>
					<a href="" class="btn btn-laranja filtro mx-1 d-inline-block"><i class="fas fa-filter"></i> Filtrar</a>
				</div>
			</div>	
            <form action="" method="Post">  								
                <div class="rows">	  	

                    <div class="col-12 mb-3">
						<form name="busca" action="" method="post">                        
                        <div class="px-3">
							  <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
							  <div class="rows">
                                        <div class="col-3">	
                                            <label class="text-label d-block text-branco">Data 1</label>
                                            <input type="date" name="categoria" value="" class="form-campo">
                                        </div>
                                        <div class="col-3">	
                                            <label class="text-label d-block text-branco">Data 2</label>
                                            <input type="date" name="categoria" value="" class="form-campo">
                                        </div>
                                        <div class="col-4">	
                                            <label class="text-label d-block text-branco">Produto</label>
                                            <select class="form-campo">
												<option>Opção</option>
												<option>Opção</option>
												<option>Opção</option>
											</select>
                                        </div>
                                        <div class="col-2 mt-1 pt-1">
                                                <input type="submit" value="Pesquisar" class="btn btn-roxo text-uppercase">
                                        </div>
                                </div>
                                </div>
							</div>
						</form>
					</div>
					
					
                    <div class="col-12">
                        <div class="caixa mb-3 mt-3">		   
                            
							<div class="col-12 mb-3">
								<div class="border p-1 radius-4 pb-4">
									<div class="tabela-responsiva sm tborder tborder pb-3">  
											<table cellpadding="0" cellspacing="0" id="dataTable" class="mb-0 table-bordered">
												<thead>
												   <tr>
														<th align="center">Id</th>
														<th align="left">Cliente</th>
														<th align="center">Data</th>
														<th align="center">Subtotal</th>
														<th align="center">Origem</th>
														<th align="center">Status</th>
														<th align="center">Ação</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach($lista as $pedido){?>
													<tr>
														<td align="center"><?php echo $pedido->id_pedido?></td>
														<td align="center"><?php echo $pedido->nome?></td>
														<td align="center"><?php echo databr($pedido->data_pedido) ?></td>
														<td align="center">R$ <?php echo moedaBr($pedido->total) ?></td>
														<td align="center"><?php echo $pedido->origem?></td>
														<td align="center"><span class="status status-amarelo"><?php echo $pedido->status_pedido?></span></td>
														<td align="center">	<a href="<?php echo URL_BASE ."notafiscal/emitirNfe/". $pedido->id_pedido?>" class="d-inline-block btn btn-verde btn-pequeno"> Emitir NFE </a>	</td>
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
        </form>		
