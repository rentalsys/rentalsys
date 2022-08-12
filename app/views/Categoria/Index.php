<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Categorias</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Categorias</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "produto" ?>" class="btn btn-primary">Produtos</a>
                    	<a href="<?php echo URL_BASE . "marca" ?>" class="btn btn-primary"> Marcas</a>
                    	<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo">Cadastrar Categoria</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  <div class="modal fade" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalcat" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "categoria/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Categoria</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Categoria</label>
                            <input  class="form-control" name="categoria" type="text" placeholder="Nome da Categoria" value="">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Nome Abreviado da Categoria</label>
                            <input  class="form-control" name="abreviatura" type="text" placeholder="Nome Abreviado da Categoria" value="">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Tipo de Receita</label>
                            <input  class="form-control" name="tipo_receita" type="text" placeholder="Tipo de Receita" value="">
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
                            <th style="text-align:left;width:20%">Nome da Categoria</th>
                            <th style="text-align:left;width:15%">Nome Abreviado</th>
                            <th style="text-align:left;width:15%">Tipo de Receita</th>
                            <th style="text-align:center;width:10%">Total de Produtos</th>
                            <th style="text-align:center;width:10%">Estoque</th>
                            <th style="text-align:center;width:10%">Data de Cadastro</th>
                            <th style="text-align:center;width:15%">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $categoria){?>
                        <?php $imagem = ($categoria->imagem) ? $categoria->imagem: "semcategoria.png" ?>
                          <tr>
                          <td style="text-align:center"><?php echo $categoria->id_categoria ?></td>
                           <td><h6> <?php echo $categoria->categoria ?> </h6></td>
                           <td><?php echo $categoria->abreviatura ?></td>
                           <td><?php echo $categoria->tipo_receita ?></td>
                            <td style="text-align:center"><?php echo $categoria->preco ?></td>
                            <td style="text-align:center"><?php echo $categoria->estoque_real ?></td>
                            <td class="font-success" style="text-align:center"><?php echo date('d/m/Y', strtotime($categoria->data_cadastro)) ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="categoria" data-id="<?php echo $categoria->id_categoria ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="#" class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#editarCategoria<?php echo $categoria->id_categoria ?>" data-whatever="@mdo">Editar</a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $categoria->id_categoria ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $categoria->id_categoria ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "categoria/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar Categoria</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Categoria</label>
                            <input  class="form-control" name="categoria" type="text" placeholder="Nome da Categoria" value="<?php echo $categoria->categoria ?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Nome Abreviado da Categoria</label>
                            <input  class="form-control" name="abreviatura" type="text" placeholder="Nome Abreviado da Categoria" value="<?php echo $categoria->abreviatura ?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Tipo de Receita</label>
                            <input  class="form-control" name="tipo_receita" type="text" placeholder="Tipo de Receita" value="<?php echo $categoria->tipo_receita ?>">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
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