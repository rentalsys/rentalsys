<div class="rows">
	<div class="col-12">
 <form action="<?php echo URL_BASE ."ordemcompra/faturarOrdemCompra" ?>" method="post">     
    <div class="rows">	
        <div class="col-12">
            <div class="caixa">
				<div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
					<span class="d-flex center-middle"><i class="fas fa-search mr-1"></i> Faturar Ordem de Compra: <?php echo $ordem_compra->id_ordem_compra ?> </span>			
                    <a href="<?php echo URL_BASE ."financeiro/lista_faturar_ordem_compra"?>" class="btn btn-verde btn-pequeno float-right "><i class="fas fa-arrow-left mb-0"></i> Voltar</a>
                </div>
                </div>
                    <div class="py-4 px-4">
                        <div class="rows text-escuro">										
							<div class="col-3 px-1 d-flex">
									<div class="px-3 py-4 border radius-4 width-100">
											<i class="fas fa-users pequeno-font float-left mr-1 text-padrao"></i>
											<small>Nome do Fornecedor</small>
											<h4 style="line-height:1rem"><?php echo $ordem_compra->nome ?> </h4>
									</div>
							</div>
                            <div class="col d-flex">
                                 <div class="px-3 py-4 border radius-4 width-100">
                                         <i class="fas fa-calendar-alt pequeno-font float-left mr-1 text-padrao"></i>
                                         <small>Data Emissão</small>
                                         <h4><?php echo databr($ordem_compra->data_emissao) ?> </h4>
                                 </div>
                            </div>
                            <div class="col d-flex">	
                                 <div class="px-3 py-4 border radius-4 width-100">
                                         <i class="far fa-clock pequeno-font float-left mr-1 text-padrao"></i>
                                         <small>Data Aprovação</small>
                                         <h4><?php echo databr(hoje()) ?> </h4>
                                 </div>
                            </div>
                            <div class="col d-flex">
                                 <div class="px-3 py-4 border radius-4 width-100">
                                         <i class="fab fa-bitcoin pequeno-font float-left mr-1 text-padrao"></i>
                                         <small>Total</small>
                                         <h4>R$ <?php echo moedabr($ordem_compra->valor_total) ?> </h4>
                                 </div>
                            </div>
                            <div class="col d-flex">
                                 <div class="px-3 py-4 border radius-4 width-100">
										<i class="fas fa-map-marker-alt  pequeno-font float-left mr-1 text-padrao"></i>
                                         <small>Status</small>
                                         <h4><?php echo $ordem_compra->status_ordem_compra ?> </h4>
                                 </div>
                            </div>
						</div>
                    </div>
            </div>
        </div>         
        
        <div class="col-12 mb-4">
            <div class="caixa border radius-4">
            <span class="p-2 bg-title text-light text-uppercase h4 mb-0 text-branco"><i class="far fa-list-alt"></i> Dados do Pagamento</span>

            <div class="caixa">
				<div class="px-4">
				<div class="rows pt-3 pb-4">
					<div class="col-4 mb-3">
						<label class="text-label">Documento Origem</label>
						<select class="form-campo" name="id_documento_origem">
						<?php 
						  foreach($documentos as $doc){
							echo "<option value='$doc->id_documento_origem'>$doc->documento_origem</option>";
						  }
							?>
						</select>
					</div>
					
					<div class="col-2 mb-3">
						<label class="text-label">Núm. Documento</label>
						<input type="number" name="numero_documento" id="numero_documento" value="100" class="form-campo">
					</div>
					
					<div class="col-2 mb-3">
						<label class="text-label">Intervalo Parcelas</label>
						<select class="form-campo" name="intervalo_entre_parcela" ">
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
					<div class="col-2 mb-3">
						<label class="text-label">Qtde Parcela</label>
						<input type="number" min="1" name="qtde_parcela" id="qtde_parcela"  value="1" class="form-campo">
					</div>					
					
					<div class="col-2 mb-3">
						<label class="text-label">Valor Total</label>
						<input type="text" name="valor_total" value="<?php echo $ordem_compra->valor_total ?>" readonly id="valor_total"  class="form-campo">												
					</div>
					<div class="col-2 mb-3">
						<label class="text-label">Juros</label>
						<input type="text" name="juros"  id="juros" value="0" class="form-campo">												
					</div>
					<div class="col-2 mb-3">
						<label class="text-label">Desconto</label>
						<input type="text" name="desconto" value="0"    class="form-campo">												
					</div>
					<div class="col-2 mb-3">
						<label class="text-label">Multa</label>
						<input type="text" name="multa" value="0"    class="form-campo">												
					</div>
					
					<div class="col-2 mb-3">
						<label class="text-label">Valor a Pagar</label>
						 <input type="text" name="valor_a_pagar" value="<?php echo moedabr($ordem_compra->valor_total) ?>" readonly id="valor_a_pagar"  class="form-campo">												
					</div>                
					
					<div class="col-2 mb-3">
						<label class="text-label">Data Lançamento</label>
						 <input type="date" name="data_lancamento" value="<?php echo hoje() ?>"  id="data_lancamento"  class="form-campo">												
					</div>
					
					<div class="col-2 mb-3">
						<label class="text-label">Primeiro Vencimento</label>
						 <input type="date" name="primeiro_vencimento" id="primeiro_vencimento" required  class="form-campo">												
					</div>	
												
					   
					</div>
				</div>          
			</div>
			<div class="caixa p-2">                   
                <div class="caixa-rodape">
					<input type="hidden" value="<?php echo $ordem_compra->id_ordem_compra ?>" name="id_ordem_compra" />
					<input type="hidden" value="<?php echo $ordem_compra->id_fornecedor ?>" name="id_fornecedor" />
					<input type="submit" value="Faturar Ordem de Conta" class="btn btn-verde btn-medio d-inline-block" />                   
				</div>
            </div>
        </div>
	</div>
    <div class="col-12 mb-3">
            <div class="caixa border radius-4">
            <span class="p-2 bg-title text-light text-uppercase h4 mb-0 text-branco"><i class="far fa-list-alt"></i> Itens do Pedido</span>
            <div class="tabela-responsiva">
               <table cellpadding="0" cellspacing="0" class="table-bordered">
                   <thead>
                      <tr>
                        <th align="center">ID</th>
                        <th align="left" width="380">Produto</th>
                        <th align="center">Preço</th>
                        <th align="center">Qtde</th>                                                    
                        <th align="center">Subtotal</th>                               
                      </tr>
                   </thead>
                   <tbody>
                   <?php foreach($itens as $i){?>                                                        
                       <tr>
                           <td align="center"><?php echo $i->id_item_ordem_compra  ?> </td>	
                           <td align="left"><?php echo $i->produto  ?></td>
                           <td align="center">R$ <?php echo $i->valor  ?></td>
                           <td align="center"><?php echo $i->qtde  ?></td>  
                           <td align="center">R$ <?php echo $i->subtotal  ?></td>
                        </tr>
                   <?php } ?>                                      
                       
                        <tr>
                            <td align="right" colspan="9" ><b>Total:</b> <span class="text-verde minimo-font">R$ <?php echo $ordem_compra->valor_total  ?></span></td>
                        </tr>	
                    </tbody>
               </table>
                  
            </div>
                    
             
            </div>
    </div>
    </form>
    </div>
   
</div>