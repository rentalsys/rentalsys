<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Localização Estoque</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Localização Estoque</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "produto" ?>" class="btn btn-primary">Produtos</a>
                    	<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo">Cadastrar Localização</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  
                   <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">

                       <form action="<?php echo URL_BASE . "localizacao/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Unidade</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="form-group row">
                          
                          <div class="col-6">
                            <label class="col-form-label">Nome da Unidade</label>
                            <input  class="form-control" name="localizacao" type="text" placeholder="Nome da Unidade" value="">
                          </div>
                          
                           <div class="col-6">
                            <label class="col-form-label">CEP da Unidade</label>
                            <input  class="form-control mascara-cep busca_cep" name="cep_unidade" id="cep" type="text" placeholder="CEP da Unidade" value="">
                          </div>
                          
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Rua</label>
                            <input  class="form-control rua" name="rua_unidade" type="text" id="rua"  placeholder="Rua" value="">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Bairro</label>
                            <input  class="form-control bairro" name="bairro_unidade" type="text" id="bairro"  placeholder="Bairro" value="">
                          </div>
                          <div class="form-group row">
                          <div class="col-6">
                            <label class="col-form-label">Número da Unidade</label>
                            <input  class="form-control" name="numero_unidade" type="text" placeholder="Número da Unidade" value="">
                          </div>
                          <div class="col-6">
                            <label class="col-form-label">Complemento</label>
                            <input  class="form-control" name="complemento_unidade" type="text" placeholder="Complemento" value="">
                          </div>
                          </div>
                          
                           <div class="form-group row">
                          <div class="col-6">
                            <label class="col-form-label">Cidade</label>
                            <input  class="form-control cidade" name="cidade_unidade" id="cidade" type="text" placeholder="Cidade" value="" readonly>
                          </div>
                          <div class="col-6">
                            <label class="col-form-label">Estado</label>
                            <input  class="form-control estado" name="uf_unidade" id="estado" type="text" placeholder="UF" value="" readonly>
                          </div>
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Galpão</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="galpao" type="radio" name="galpao" value="S">Sim
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="galpao" type="radio" name="galpao" value="N" checked="">Não
                              </label>
                            </div>
                          </div>
                        

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
                            <th style="text-align:left;width:50%">Nome da Unidade</th>
                            <th style="text-align:left;width:15%">Cidade</th>
                            <th style="text-align:center;width:10%">Data de Cadastro</th>
                            <th style="text-align:center;width:20%">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $localizacao){?>
                          <tr>
                          <td style="text-align:center"><?php echo $localizacao->id_localizacao ?></td>
                           <td><h6> <?php echo $localizacao->localizacao ?> </h6></td>
                           <td><?php echo $localizacao->cidade_unidade." - ".$localizacao->uf_unidade ?></td>
                            <td class="font-success" style="text-align:center"><?php echo date('d/m/Y', strtotime($localizacao->data_cadastro)) ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="localizacao" data-id="<?php echo $localizacao->id_localizacao ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo $localizacao->id_localizacao ?>" data-whatever="@mdo">Editar</a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $localizacao->id_localizacao ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $localizacao->id_localizacao ?>" aria-hidden="true">
                       <div class="modal-dialog modal-lg" role="document">

                       <form action="<?php echo URL_BASE . "localizacao/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar Unidade</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="form-group row">
                          
                          <div class="col-6">
                            <label class="col-form-label">Nome da Unidade</label>
                            <input  class="form-control" name="localizacao" type="text" placeholder="Nome da Unidade" value="<?php echo $localizacao->localizacao ?>">
                          </div>
                          
                           <div class="col-6">
                            <label class="col-form-label">CEP da Unidade</label>
                            <input  class="form-control mascara-cep busca_cep" name="cep_unidade" id="cep" type="text" placeholder="CEP da Unidade" value="<?php echo $localizacao->cep_unidade ?>">
                          </div>
                          
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Rua</label>
                            <input  class="form-control rua" name="rua_unidade" type="text" id="rua"  placeholder="Rua" value="<?php echo $localizacao->rua_unidade ?>">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Bairro</label>
                            <input  class="form-control bairro" name="bairro_unidade" type="text" id="bairro"  placeholder="Bairro" value="<?php echo $localizacao->bairro_unidade ?>">
                          </div>
                          <div class="form-group row">
                          <div class="col-6">
                            <label class="col-form-label">Número da Unidade</label>
                            <input  class="form-control" name="numero_unidade" type="text" placeholder="Número da Unidade" value="<?php echo $localizacao->numero_unidade ?>">
                          </div>
                          <div class="col-6">
                            <label class="col-form-label">Complemento</label>
                            <input  class="form-control" name="complemento_unidade" type="text" placeholder="Complemento" value="<?php echo $localizacao->complemento_unidade ?>">
                          </div>
                          </div>
                          
                           <div class="form-group row">
                          <div class="col-6">
                            <label class="col-form-label">Cidade</label>
                            <input  class="form-control cidade" name="cidade_unidade" id="cidade" type="text" placeholder="Cidade" value="<?php echo $localizacao->cidade_unidade ?>" readonly>
                          </div>
                          <div class="col-6">
                            <label class="col-form-label">Estado</label>
                            <input  class="form-control estado" name="uf_unidade" id="estado" type="text" placeholder="UF" value="<?php echo $localizacao->uf_unidade ?>" readonly>
                          </div>
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Galpão</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="galpao" type="radio" name="galpao" value="S" <?php echo ($localizacao->galpao=="S") ? "checked" : null?>>Sim
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="galpao" type="radio" name="galpao" value="N" <?php echo ($localizacao->galpao=="N") ? "checked" : null?>>Não
                              </label>
                            </div>
                          </div>
                        

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                             <input type="hidden" name="id_localizacao" value="<?php echo $localizacao->id_localizacao ?>">
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