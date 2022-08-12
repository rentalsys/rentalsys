<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Unidades</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Unidades</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "produto" ?>" class="btn btn-primary">Produtos</a>
                    	<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo">Cadastrar Unidade</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  <div class="modal fade" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalcat" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "unidade/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Unidade</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Unidade</label>
                            <input  class="form-control" name="nome_unidade" type="text" placeholder="Nome da Unidade" value="">
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
                            <th style="text-align:left;width:15%">Tipo de Cálculo</th>
                            <th style="text-align:center;width:10%">Data de Cadastro</th>
                            <th style="text-align:center;width:20%">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $unidade){?>
                          <tr>
                          <td style="text-align:center"><?php echo $unidade->id_unidade ?></td>
                           <td><h6> <?php echo $unidade->nome_unidade ?> </h6></td>
                           <td><?php echo $unidade->tipo_receita ?></td>
                            <td class="font-success" style="text-align:center"><?php echo date('d/m/Y', strtotime($unidade->data_cadastro)) ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="unidade" data-id="<?php echo $unidade->id_unidade ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo $unidade->id_unidade ?>" data-whatever="@mdo">Editar</a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $unidade->id_unidade ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $unidade->id_unidade ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "unidade/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar Unidade</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Categoria</label>
                            <input  class="form-control" name="nome_unidade" type="text" placeholder="Nome da Unidade" value="<?php echo $unidade->nome_unidade ?>">
                          </div>

                      </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="hidden" name="id_unidade" value="<?php echo $unidade->id_unidade ?>">
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