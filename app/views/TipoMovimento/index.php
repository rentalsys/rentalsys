<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Estoque - Tipos de Movimento</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Tipos de Movimento</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "estoque" ?>" class="btn btn-primary">Estoque</a>
                    	<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo">Cadastrar</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  <div class="modal fade" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalcat" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "tipomovimento/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Tipo de Movimento</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Descrição</label>
                            <input  class="form-control" name="tipo_movimento" type="text" placeholder="Descrição" value="">
                          </div>
                          
                            <div class="mb-3">
                            <label class="col-form-label">Tipo</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="ent_sai" type="radio" name="ent_sai" value="E" >Entrada
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="ent_sai" type="radio" name="ent_sai" value="S">Saída
                              </label>
                            </div>
                          </div>
                          
                            <div class="mb-3">
                            <label class="col-form-label">Movimenta Estoque</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="movimenta_estoque" type="radio" name="movimenta_estoque" value="S">Sim
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="movimenta_estoque" type="radio" name="movimenta_estoque" value="N">Não
                              </label>
                            </div>
                          </div>
                      </div>
                          <div class="modal-footer">
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
                            <th style="text-align:left;width:40%">Tipo</th>
                            <th style="text-align:center;width:10%">E/S</th>
                            <th style="text-align:center;width:20%">Movimenta Estoques</th>
                            <th style="text-align:center;width:10%">Data de Cadastro</th>
                            <th style="text-align:center;width:15%">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $tipo){?>
                          <tr>
                          <td style="text-align:center"><?php echo $tipo->id_tipo_movimento ?></td>
                           <td><h6> <?php echo $tipo->tipo_movimento ?> </h6></td>
                            <td style="text-align:center"><?php echo $tipo->ent_sai ?></td>
                            <td style="text-align:center"><?php echo $tipo->movimenta_estoque ?></td>
                            <td class="font-success" style="text-align:center"><?php echo date('d/m/Y', strtotime($tipo->data_cadastro)) ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="tipomovimento" data-id="<?php echo $tipo->id_tipo_movimento ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo $tipo->id_tipo_movimento ?>" data-whatever="@mdo">Editar</a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $tipo->id_tipo_movimento ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $tipo->id_tipo_movimento ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "tipomovimento/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar Marca</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Descrição</label>
                            <input  class="form-control" name="tipo_movimento" type="text" placeholder="Nome da Marca" value="<?php echo $tipo->tipo_movimento ?>">
                          </div>
                          
                            <div class="mb-3">
                            <label class="col-form-label">Tipo</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="ent_sai" type="radio" name="ent_sai" value="E" <?php echo ($tipo->ent_sai=="E") ? "checked" : null?>>Entrada
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="ent_sai" type="radio" name="ent_sai" value="S" <?php echo ($tipo->ent_sai=="S") ? "checked" : null?>>Saída
                              </label>
                            </div>
                          </div>
                          
                            <div class="mb-3">
                            <label class="col-form-label">Movimenta Estoque</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="movimenta_estoque" type="radio" name="movimenta_estoque" value="S" <?php echo ($tipo->movimenta_estoque=="S") ? "checked" : null?>>Sim
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="movimenta_estoque" type="radio" name="movimenta_estoque" value="N" <?php echo ($tipo->movimenta_estoque=="N") ? "checked" : null?>>Não
                              </label>
                            </div>
                          </div>
                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="hidden" name="id_tipo_movimento" value="<?php echo $tipo->id_tipo_movimento ?>">
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