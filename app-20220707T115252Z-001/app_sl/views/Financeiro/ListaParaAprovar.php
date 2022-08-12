<div class="rows">	
    <div class="col-12">
       <div class="caixa">
          <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
			<span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Lista de ordem de compra </span>
               <div>
					
					<a href="" class="btn btn-laranja filtro mx-1 d-inline-block"><i class="fas fa-filter"></i> Filtrar</a>
				</div>
			</div>
			<form name="busca" action="template_2.php?link=1" method="post">
               
               <div class="px-2 pt-2">
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
                                   <label class="text-label d-block text-branco">Status</label>
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
    </div>

	<div class="col-12 mt-3">
	<?php 
	   $this->verMsg();
	?>
            <div class="px-2">
                    <div class="tabela-responsiva pb-4">
                    <table cellpadding="0" cellspacing="0" id="dataTable" width="100%">
                            <thead>
                              <tr>
                                <th align="center">Id</th>
                                <th align="center">Cotação</th>
                                <th align="center">Fornecedor</th>
                                <th align="center">Data Emissão</th>
                                <th align="center">Data Aprovação</th>
                                <th align="center">Valor</th>
                                <th align="center">Status</th>
                                <th align="center">Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                          <?php 
                            foreach($lista as $ordem){ ?>                                     
                             <tr>
                                <td align="center"><?php echo $ordem->id_ordem_compra ?></td>
                                 <td align="center"><?php echo $ordem->id_cotacao ?></td>
                                 <td align="center"><?php echo $ordem->nome ?></td>
                                 <td align="center"><?php echo databr($ordem->data_emissao) ?></td>
                                 <td align="center"><?php echo $ordem->data_aprovacao ?></td>
                                 <td align="center">R$ <?php echo moedaBr($ordem->valor_total) ?></td>
                                <td align="center"><span class="status <?php echo $ordem->classe ?>"><?php echo $ordem->status_ordem_compra?></span></td>                                                     
                                <td align="center">
                                	<a href="<?php echo URL_BASE ."financeiro/aprovar_ordem_compra/" . $ordem->id_ordem_compra   ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Aprovar</a>
                                 </td>
                             </tr>						 
							<?php } ?> 				 
							    						
                        </tbody>
                    </table>
								
                    </div>
            </div>
        </div>

</div>


