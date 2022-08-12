				<section class="caixa">
				<div class="thead"><i class="ico lista"></i> Lista de contatos</div>
				<div class="base-lista">
			
					<div>
						<div class="text-end d-flex">
							<a href="<?php echo URL_BASE ."cliente/create"?>" class="btn d-inline-block mb-2 mx-1"><i class="fas fa fa-plus-circle" aria-hidden="true"></i> Cadastrar cliente</a>
							<a href="" class="btn btn-roxo d-inline-block mb-2 filtro"><i class="fas fa fa-filter" aria-hidden="true"></i> Filtrar</a>
						</div>
					</div>
					<div class="lst mostraFiltro">
						<form action="" method="">
						<div class="rows">
								<div class="col-4">
									<select name="txt_id_empresa">
										<option selected>Selecione o valor...</option>
										<option value="1">Código</option>
										<option value="2">Nome</option>
										<option value="3">Email</option>
										<option value="4">Cidade</option>
										<option value="5">Site</option>
										<option value="6">Fone</option>
									</select>
								</div>
								<div class="col-6">
									<input type="text"  name="" placeholder="Valor da pesquisar..." >
								</div>
								<div class="col-2">
									<input type="submit" class="btn" value="pesquisar">
								</div>
						</div>
						</form>
					</div>
				<?php $this->verMsg() ?>		
				<div class="tabela-responsiva">
					<table width="100%" border="0" cellspacing="0" cellpadding="0" id="dataTable">
						<thead> 
						  <tr>
						  	<th style="text-align:center;width:5%">ID</th>
                            <th style="text-align:left;width:10%">Data</th>
                            <th style="text-align:left;width:45%">Produto</th>
                            <th style="text-align:center;width:5%">QTD</th>
                            <th style="text-align:center;width:10%">Origem</th>
                            <th style="text-align:center;width:10%">Destino</th>
						  </tr>
						</thead> 
						<tbody>
						 <?php foreach ($lista as $entra){?>
                          <tr>
                          <td style="text-align:center"><?php echo $entra->id_transferencia ?></td>
                           <td><?php echo date('d/m/Y', strtotime($entra->data_transferencia)) ?> </td>
                           <td><h6> <?php echo $entra->produto ?></h6></td>
                           <td style="text-align:center;"><?php echo $entra->qtde_transferencia ?></td>
                           <td style="text-align:center"><?php echo $entra->origem ?></td>
                            <td style="text-align:center"><?php echo $entra->destino ?></td>             
                          </tr>
                          
                          <?php } ?>
											
						</tbody>
					 
					</table>
					</div>
				</div>
			</section>