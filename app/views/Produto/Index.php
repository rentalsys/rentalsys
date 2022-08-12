<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Produtos</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Produtos</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                  <a href="<?php echo URL_BASE . "categoria" ?>" class="btn btn-primary"> Categorias</a>
                  <a href="<?php echo URL_BASE . "marca" ?>" class="btn btn-primary"> Marcas</a>
                  <a href="<?php echo URL_BASE . "produto/create" ?>" class="btn btn-primary"> Cadastrar Produto</a>
                    	
                  </div>
                  <!-- Bookmark Ends-->
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
                  <div class="card-header pb-0">
                    <h5>Total de produtos cadastrados:  </h5><span></span>
                  </div>
                   <?php 
                $this->verMsg();
                $this->verErro();
                ?>
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table class="display table-xs" id="basic-1">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Imagem</th>
                            <th scope="col" >Nome</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Site</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $produto){?>
                        <?php $imagem = ($produto->imagem) ? $produto->imagem: "semproduto.png" ?>
                          <tr>
                          <td scope="row" style="text-align:center"><?php echo $produto->id_produto ?></td>
                            <td style="text-align:center"><a href="product-page.html"><img src="<?php echo URL_IMAGEM . $imagem ?>" alt="" height="50px"></a></td>
                            
                            <td><strong> <?php echo $produto->produto ?> </strong></td>
                                <td class="font-success" style="text-align:left"><?php echo $produto->marca ?></td>
                                <td class="font-success" style="text-align:left"><?php echo $produto->categoria ?></td>
                            <td style="text-align:center"><?php echo ($produto->preco) ? number_format($produto->preco,2,",","."): null?></td>
                            <td class="font-success" style="text-align:center"><?php echo ($produto->ativo == "s")? "Sim":null?></td>
                            <td style="text-align:center"><?php echo date('d/m/Y', strtotime($produto->data_cadastro)); ?></td>
                            <td style="text-align:center">
                            <!-- 
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="produto" data-id="<?php //echo $produto->id_produto ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                             -->  
                              <a href="<?php echo URL_BASE ."produto/edit/".$produto->id_produto ?>" data-entidade ="produto" class="btn btn-primary btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Editar</a>
                            </td>
                          </tr>
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