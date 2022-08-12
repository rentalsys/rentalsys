<script src="<?php echo URL_BASE ?>assets/js/js_geral.js"></script>

<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Cadastrar Produto</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Cadastrar Produto</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "produto" ?>" class="btn btn-primary"><i class="icon-control-backward"></i> Lista de Produtos</a>
                    	<a href="<?php echo URL_BASE . "categoria" ?>" class="btn btn-primary"><i class="icon-control-backward"></i> Categorias</a>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
                <?php 
                $this->verMsg();
                $this->verErro();
                $imagem = ($produto->imagem) ? $produto->imagem: "semproduto.png"
                ?>
              </div>
            </div>
          </div>
          
          <div class="modal fade" id="exampleModalbet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "marca/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Marca</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Marca</label>
                            <input  class="form-control" name="marca" type="text" placeholder="Nome da Marca" value="">
                          </div>

                      </div>
                          <div class="modal-footer">
                          <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <div class="modal fade" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalcat" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "categoria/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                          <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Categoria</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Categoria</label>
                            <input  class="form-control" name="categoria" type="text" placeholder="Nome da Categoria" value="">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <div class="container-fluid list-products">
            <div class="row">
            
            <div class="col-md-12 project-list">
              </div>
              
              <div class="col-sm-12">
                <div class="card">
  
                  <div class="card-block row">
                    <div class="card-body">
   

                       <form action="<?php echo URL_BASE . "produto/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
          
   
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-5">
                     <div class="card-header pb-0">
                        <h5>Ficha do Produto</h5>
                      </div>
                      <div class="card-body">
                      
                      <div class="py-1 px-2 mt-3 border text-center  campo-upload">
					<label for="arquivo">
						<img src="<?php echo URL_IMAGEM . $imagem ?>" class="img-fluido opaco" id="imgUp" style="max-width:550px">
						<span>Trocar imagem</span>
					</label>
						<input type="hidden" name="arquivo1" id="arquivo1" value="<?php echo isset($produto->imagem) ? $produto->imagem: null?>">
						<input type="file" name="arquivo" id="arquivo" onchange="pegaArquivo(this.files)">
					
					</div>
                      </div>
                      
                      <div class="mb-3">
                            <label class="col-form-label">Descrição</label>
                           <textarea name="descricao" class="form-control" rows="20" placeholder="Escreva a descrição"><?php echo isset($produto->descricao) ? $produto->descricao: null?></textarea>
                          </div>
                  
              </div>
              
              <div class="col-md-7">
                     <div class="card-header pb-0">
                        <h5><?php echo ($produto->produto) ? $produto->produto: null?></h5>
                      </div>
                      <div class="card-body">
                      
                      <div class="form-group row">
                         <div class="col-6">
                                    <label for="select-1">Marca <a data-bs-toggle="modal" data-bs-target="#exampleModalbet" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>
                                    <select class="form-control btn-square" id="select-1" name="id_marca" >
                                      <option value="">Escolha uma marca</option>
                                       		<?php foreach ($marcas as $marca){
                                       		    $selecionado = ($marca->id_marca == $produto->id_marca) ? "selected" :"";
            								    echo "<option value='$marca->id_marca' $selecionado>$marca->marca</option>";
            								}?> 
                                    </select>
                                   
                      </div>
                      <div class="col-6">
                                    <label for="">Categoria <a data-bs-toggle="modal" data-bs-target="#exampleModalcat" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>
                                    <select class="form-control btn-square" id="select-1" name="id_categoria">
                                      <option value="">Escolha uma Categoria</option>
                                      <?php foreach ($categorias as $categoria){
                                          $selecionado = ($categoria->id_categoria == $produto->id_categoria) ? "selected" :"";
            								    echo "<option value='$categoria->id_categoria' $selecionado>$categoria->categoria</option>";
            								}?> 
                                    </select>
                                    
                             </div>
                            </div> 
                            <div class="mb-3">
                            <label class="col-form-label">Nome do Produto</label>
                            <input class="form-control" name="produto" type="text" placeholder="Name" value="<?php echo ($produto->produto) ? $produto->produto: null?>">
                          	</div>
                          	
                          	 <div class="form-group row">
                         <div class="col-4">
                                    <label for="select-1">Preço de Custo</label>
                                   <script language="JavaScript" >
                                function moeda(z){
                                v = z.value;
                                v=v.replace(/\D/g,"") // permite digitar apenas numero
                                v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
                                v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
                                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
                                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
                                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
                                z.value = v;
                                }
                            </script>
                            <input class="form-control" type="text" name="custo_atual" placeholder="Preco de Custo" value="<?php echo ($produto->custo_atual) ? number_format($produto->custo_atual,2,",","."): null?>" onKeyUp="moeda(this);">
                                   
                      </div>
                      <div class="col-4">
                                    <label for="select-1">Preço de Venda</label>
                                   <script language="JavaScript" >
                                function moeda(z){
                                v = z.value;
                                v=v.replace(/\D/g,"") // permite digitar apenas numero
                                v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
                                v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
                                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
                                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
                                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
                                z.value = v;
                                }
                            </script>
                            <input class="form-control" type="text" name="preco" placeholder="Preco" value="<?php echo ($produto->preco) ? number_format($produto->preco,2,",","."): null?>" onKeyUp="moeda(this);">
                                   
                                    
                             </div>
                             
                             <div class="col-4">
                                    <label for="select-1">Peso em Kg</label>
                                   <script language="JavaScript" >
                                function moeda(z){
                                v = z.value;
                                v=v.replace(/\D/g,"") // permite digitar apenas numero
                                v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
                                v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
                                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
                                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
                                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
                                z.value = v;
                                }
                            </script>
                            <input class="form-control" type="text" name="peso" placeholder="Peso em Kg" value="<?php echo ($produto->peso) ? number_format($produto->peso,2,",","."): null?>" onKeyUp="moeda(this);">
                                   
                      </div>
                            </div> 
                            
                            <div class="form-group row">
                         <div class="col-4">
                                    <label for="select-1">Altura</label>
                                   <script language="JavaScript" >
                                function moeda(z){
                                v = z.value;
                                v=v.replace(/\D/g,"") // permite digitar apenas numero
                                v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
                                v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
                                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
                                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
                                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
                                z.value = v;
                                }
                            </script>
                            <input class="form-control" type="text" name="altura" placeholder="Altura" value="<?php echo ($produto->altura) ? number_format($produto->altura,2,",","."): null?>" onKeyUp="moeda(this);">
                                   
                      </div>
                      <div class="col-4">
                                    <label for="select-1">Largura</label>
                                   <script language="JavaScript" >
                                function moeda(z){
                                v = z.value;
                                v=v.replace(/\D/g,"") // permite digitar apenas numero
                                v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
                                v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
                                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
                                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
                                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
                                z.value = v;
                                }
                            </script>
                            <input class="form-control" type="text" name="largura" placeholder="Largura" value="<?php echo ($produto->largura) ? number_format($produto->largura,2,",","."): null?>" onKeyUp="moeda(this);">
                                   
                                    
                             </div>
                             <div class="col-4">
                                    <label for="select-1">Comprimento</label>
                                   <script language="JavaScript" >
                                function moeda(z){
                                v = z.value;
                                v=v.replace(/\D/g,"") // permite digitar apenas numero
                                v=v.replace(/(\d{1})(\d{14})$/,"$1.$2") // coloca ponto antes dos ultimos digitos
                                v=v.replace(/(\d{1})(\d{11})$/,"$1.$2") // coloca ponto antes dos ultimos 11 digitos
                                v=v.replace(/(\d{1})(\d{8})$/,"$1.$2") // coloca ponto antes dos ultimos 8 digitos
                                v=v.replace(/(\d{1})(\d{5})$/,"$1.$2") // coloca ponto antes dos ultimos 5 digitos
                                v=v.replace(/(\d{1})(\d{1,2})$/,"$1,$2") // coloca virgula antes dos ultimos 2 digitos
                                z.value = v;
                                }
                            </script>
                            <input class="form-control" type="text" name="comprimento" placeholder="Comprimento" value="<?php echo ($produto->comprimento) ? number_format($produto->comprimento,2,",","."): null?>" onKeyUp="moeda(this);">
                             
                             </div>
                             
                            </div> 
                            
                            <div class="form-group row">
                         <div class="col-4">
                                    <label for="select-1">Variação</label>
                                    <select class="form-control btn-square" id="select-1" name="variacao">
											<option value='Não' <?php if($produto->variacao == "n") { ?>"selected"<?php } else {} ?>>Não</option>
											<option value='Sim' <?php if($produto->variacao == "s") { ?>"selected"<?php } else {} ?>>Sim</option>
                                    </select>      
                      </div>
                      <div class="col-4">
                                    <label for="select-1">SKU-PAI</label>
                            		<input class="form-control" type="text" name="skupai" placeholder="SKU PAI" value="<?php echo ($produto->skupai) ? $produto->skupai: null?>" ">
                             		</div>
                             <div class="col-4">
                                    <label for="select-1">SKU</label>
                            		<input class="form-control" type="text" name="sku" placeholder="SKU" value="<?php echo ($produto->sku) ? $produto->sku: null?>" ">
                             		</div>
                                    
                             </div>
                             
                             <div class="form-group row">
                         <div class="col-4">
                                    <label for="select-1">Estoque Gerenciado</label>
                                    <select class="form-control btn-square" id="select-1" name="estoquegerenciado">
											<option value='Não' <?php if($produto->estoquegerenciado == "n") { ?>"selected"<?php } else {} ?>>Não</option>
											<option value='Sim'  <?php if($produto->estoquegerenciado == "s") { ?>"selected"<?php } else {} ?>>Sim</option>
                                    </select>      
                      </div>
                      <div class="col-4">
                                    <label for="select-1">Estoque atual</label>
                            		<input class="form-control" type="text" name="estoque_real" placeholder="Estoque Real" value="<?php echo ($produto->estoque_real) ? $produto->estoque_real: null?>" ">
                             		</div>
                             <div class="col-4">
                                    <label for="select-1">Estoque Reservado</label>
                            		<input class="form-control" type="text" name="estoque_reservado" placeholder="Estoque Reservado" value="<?php echo ($produto->estoque_reservado) ? $produto->estoque_reservado: null?>" ">
                             		</div>
                                    
                             </div>
                             
                             <div class="form-group row">
                         <div class="col-4">
                                    <label for="select-1">NCM</label>
                            <input class="form-control" type="text" name="ncm" placeholder="NCM" value="<?php echo ($produto->ncm) ? $produto->ncm: null?>">
                                   
                      </div>
                      <div class="col-4">
                                    <label for="select-1">GTIN</label>
                                   
                            <input class="form-control" type="text" name="gtin" placeholder="GTIN" value="<?php echo ($produto->gtin) ? $produto->gtin: null?>" >
                                   
                                    
                             </div>
                             <div class="col-4">
                                    <label for="select-1">Voltagem</label>
                                    <select class="form-control btn-square" id="select-1" name="voltagem">
											<option value='220' <?php if($produto->estoquegerenciado == "220") { ?>"selected"<?php } else {} ?>>220 V</option>
											<option value='110' <?php if($produto->estoquegerenciado == "110") { ?>"selected"<?php } else {} ?>>110 V</option>
                                    </select>   
                             </div>
                             
                            </div> 
                             
                       <div class="mb-3">
                            <label class="col-form-label">Observação</label>
                            <input class="form-control" type="text" name="observacao" placeholder="Observacao" value="<?php echo ($produto->observacao) ? $produto->observacao: null?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Url Youtube</label>
                            <input class="form-control" type="text" name="urlyoutube" placeholder="URL vídeo Youtube" value="<?php echo ($produto->urlyoutube) ? $produto->urlyoutube: null?>">
                          </div>
                          
                          <div class="mb-3">
                                   <label class="col-form-label">Ativo</label>
                         		<div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="radioinline1" type="radio" name="ativo" value="s" <?php echo ($produto->ativo=="s") ? "checked" : null?>>
                                    <label class="mb-0" for="radioinline1">Sim</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="ativo" value="" <?php echo ($produto->ativo==null) ? "checked" : null?>>
                                    <label class="mb-0" for="radioinline2">Não</label>
                                  </div>
                                </div>
                                    
                             	</div>
                        </div>
                      <input type="hidden" name="id_produto" value="<?php echo isset($produto->id_produto) ? $produto->id_produto : null ?>">
                      	<input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                      </div>
                      
                       
                            
                  
              </div>
              
            
           
          </div>
          
                     <div class="card-footer">
                      	
                        <button class="btn btn-primary">Enviar</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
                 

            </div>
          </div>
          
          <!-- Container-fluid starts-->
          
          <!-- Container-fluid Ends-->
        </div>