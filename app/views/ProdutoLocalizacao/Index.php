<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Produto Localização</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Produto Localização</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "produto" ?>" class="btn btn-primary">Produtos</a>
                    	<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo">Produto na Localização</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  
                   <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                       <form action="<?php echo URL_BASE . "produtolocalizacao/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Produto na Localização</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Produto</label>
                            <select class="form-control btn-square" id="select-1" name="id_produto" required>
                                      		<option value="">Escolha o Produto</option>
                                       		<?php foreach ($produtos as $produto){
            								    echo "<option value=$produto->id_produto'>$produto->produto</option>";
            								}?> 
                                    </select>    
                          </div>
                          
                           <div class="mb-3">
                            <label class="col-form-label">Localização</label>
                            <select class="form-control btn-square" id="select-1" name="id_localizacao" required>
                                      		<option value="">Escolha a Localização</option>
                                       		<?php foreach ($locais as $local){
            								    echo "<option value=$local->id_localizacao'>$local->localizacao</option>";
            								}?> 
                                    </select>      </div>

                      	</div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  <!-- Modal Inserir-->
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid list-products">
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
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th style="text-align:center;width:5%">ID</th>
                            <th style="text-align:left;width:40%">Produto</th>
                            <th style="text-align:left;width:15%">Localização</th>
                            <th style="text-align:center;width:10%">Estoque</th>
                            <th style="text-align:center;width:10%">Data de Cadastro</th>
                            <th style="text-align:center;width:20%">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $Plocalizacao){?>
                          <tr>
                          <td style="text-align:center"><?php echo $Plocalizacao->id_produto_localizacao ?></td>
                           <td><h6> <?php echo $Plocalizacao->produto ?> </h6></td>
                           <td><?php echo $Plocalizacao->localizacao." - ".$Plocalizacao->cidade_unidade."-".$Plocalizacao->uf_unidade ?></td>
                           <td style="text-align:center"><?php echo $Plocalizacao->estoque ?></td>
                            <td class="font-success" style="text-align:center"><?php echo date('d/m/Y', strtotime($Plocalizacao->data_cadastro)) ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="localizacao" data-id="<?php echo $Plocalizacao->id_localizacao ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo $Plocalizacao->id_produto_localizacao ?>" data-whatever="@mdo">Editar</a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $Plocalizacao->id_produto_localizacao ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $Plocalizacao->id_produto_localizacao ?>" aria-hidden="true">
                       <div class="modal-dialog modal-lg" role="document">

                       <form action="<?php echo URL_BASE . "produtolocalizacao/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Produto Localização</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Produto</label>
                            <select class="form-control btn-square" id="select-1" name="id_produto" required>
                                      		<option value="">Escolha o Produto</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $Plocalizacao->id_produto) ? "selected" :"";
            								    echo "<option value=$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>    
                          </div>
                          
                           <div class="mb-3">
                            <label class="col-form-label">Localização</label>
                            <select class="form-control btn-square" id="select-1" name="id_localizacao" required>
                                      		<option value="">Escolha a Localização</option>
                                       		<?php foreach ($locais as $local){
                                       		    $selecionado = ($local->id_localizacao == $Plocalizacao->id_localizacao) ? "selected" :"";
            								    echo "<option value=$local->id_localizacao' $selecionado>$local->localizacao</option>";
            								}?> 
                                    </select>      </div>

                      	</div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                             <input type="hidden" name="id_produto_localizacao" value="<?php echo $Plocalizacao->id_produto_localizacao ?>">
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  <!-- Modal Editar-->
                          <?php } ?>
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