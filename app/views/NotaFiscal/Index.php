<div class="rows">	
                <div class="col-12">
                <div class="caixa">
                    <div class="p-2 py-1 bg-title text-light text-uppercase h4 mb-0 text-branco d-flex justify-content-space-between">
						<span class="d-flex center-middle"><i class="far fa-list-alt mr-1"></i> Lista de Notas Fiscais </span>
						<div>
							<a href="<?php echo URL_BASE ."notafiscal/create"?>" class="btn btn-verde mx-1 d-inline-block"><i class="fas fa-plus-circle"></i> Adicionar novo</a>
							<a href="" class="btn btn-laranja filtro mx-1 d-inline-block"><i class="fas fa-filter"></i> Filtrar</a>
						</div>
					</div>
                        
					<form name="busca" action="" method="GET">
                        <div class="px-2 pt-2">	
							  <div class="mostraFiltro bg-padrao mt-2 p-2 radius-4">
							  <div class="rows">
                                        <div class="col-8">	
                                                <label class="text-label d-block text-branco">Nome </label>
                                                <input type="text" name="categoria" value="" class="form-campo">
                                        </div>
                                        <div class="col-2">	
                                             <label class="text-label d-block text-branco">Ativo </label>
                                            <select name="ativo" class="form-campo">
                                                <option value="S">Sim</option>                                                 
                                                <option value="N">Não</option>                                                 
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

		<div class="col-12">
			<div class="px-2">			
				<div class="p-1">
					<?php 
					   $this->verMsg(); 
					   $this->verErro();
					?>
				</div>
               <div class="tabela-responsiva pb-4 mt-3">
                    <table cellpadding="0" cellspacing="0"  width="100%" id="dataTable">
                            <thead>
                                    <tr>
                                        <th align="center">Id</th>
                                        <th align="left" >Empresa</th> 
                                        <th align="left" >Chave</th>
                                        <th align="left" >Recibo</th>   
                                        <th align="left" >Protocolo</th>                                  
                                        <th align="center">Operação</th>
                                        <th align="center">Ação</th>
                                </tr>
                            </thead>
                            <tbody>  
                       <?php 
                            foreach ($lista as $nota){
                                
                            ?>                      
								<tr>
									<td align="center"><?php echo $nota->id_nfe  ?></td>
									<td align="center"><?php echo $nota->dest_xNome ?></td>
									<td align="center"><?php echo $nota->chave ?></td>
									<td align="center"><?php echo $nota->recibo ?></td>
									<td align="center"><?php echo $nota->protocolo ?></td>
									<td align="center">
									<?php if($nota->id_status<=2){	?>								
										<a href="<?php echo URL_BASE . "nfe/gerarNfe/" .$nota->id_nfe ?>" class="d-inline-block btn btn-outline-verde btn-pequeno"><i class="fas fa-edit"></i> Gerar XML</a>
									<?php } else if($nota->id_status ==3){ ?>									
										<a href="<?php echo URL_BASE . "nfe/assinarNfe/" .$nota->id_nfe ?>" class="d-inline-block btn btn-outline-verde btn-pequeno"><i class="fas fa-edit"></i> Assinar XML</a>
									<?php } else if($nota->id_status ==4){ ?>	
										<a href="<?php echo URL_BASE . "nfe/enviarNfe/" .$nota->id_nfe ?>" class="d-inline-block btn btn-outline-verde btn-pequeno"><i class="fas fa-edit"></i> Enviar XML</a>
									<?php } else if($nota->id_status ==5){ ?>	
										<a href="<?php echo URL_BASE . "nfe/autorizarNfe/" .$nota->id_nfe ?>" class="d-inline-block btn btn-outline-verde btn-pequeno"><i class="fas fa-edit"></i> Autorizar XML</a>
									<?php } else if($nota->id_status<=7){ ?>	
										<a href="<?php echo URL_BASE . "nfe/danfe/" .$nota->id_nfe ?>" class="d-inline-block btn btn-outline-verde btn-pequeno"><i class="fas fa-edit"></i> Danfe</a>
									<?php }?>
									</td>
									<td align="center">
										<a href="<?php echo URL_BASE . "notafiscal/excluir/" .$nota->id_nfe ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a>
									</td>
								</tr>                    
							<?php } ?>	            						
                        </tbody>
                    </table>
								
                        </div>

            </div>
        </div>

        </div>