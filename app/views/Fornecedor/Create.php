<script src="<?php echo URL_BASE ?>assets/js/js_geral.js"></script>

<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Cadastrar Fornecedor</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Cadastrar Fornecedor</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "fornecedor" ?>" class="btn btn-primary btn-xs"><i class="icon-control-backward"></i> Voltar</a>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
                <?php 
                $this->verMsg();
                $this->verErro();
                ?>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          
          <form action="<?php echo URL_BASE . "fornecedor/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
          
          
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-body">
                    <div class="form theme-form">
                    
                      <div class="row">
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Nome do Fornecedor / Razão Social</label>
                             <input  class="form-control" name="nome" type="text" placeholder="Nome do Fornecedor" value="<?php echo ($fornecedor->nome_fornecedor) ? $fornecedor->nome_fornecedor: null?>">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>CNPJ</label>
                            <input  class="form-control" name="cnpj" type="text" placeholder="CNPJ do Fornecedor" value="<?php echo ($fornecedor->cnpj) ? $fornecedor->cnpj: null?>">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Email</label>
                            <input  class="form-control" name="email_fornecedor" type="text" placeholder="email do Fornecedor" value="<?php echo ($fornecedor->email_fornecedor) ? $fornecedor->email_fornecedor: null?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>Celular</label>
                            <input  class="form-control" name="celular_fornecedor" type="text" placeholder="celular do Fornecedor" value="<?php echo ($fornecedor->celular_fornecedor) ? $fornecedor->celular_fornecedor: null?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>Nome do Contato</label>
                            <input  class="form-control" name="celular_fornecedor" type="text" placeholder="contato do Fornecedor" value="<?php echo ($fornecedor->contato_fornecedor) ? $fornecedor->contato_fornecedor: null?>">
                          </div>
                        </div>
                        
                      </div>
                      
                     <div class="row">
                        <div class="col-sm-1">
                          <div class="mb-3">
                            <label>CEP</label>
                             <input  class="form-control" name="cep_fornecedor" type="text" placeholder="Cep" value="<?php echo ($fornecedor->cep_fornecedor) ? $fornecedor->cep_fornecedor: null?>">
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Cidade</label>
                            <input  class="form-control" name="cidade_fornecedor" type="text" placeholder="Cidade" value="<?php echo ($fornecedor->cidade_fornecedor) ? $fornecedor->cidade_fornecedor: null?>">
                          </div>
                        </div>
                        <div class="col-sm-1">
                          <div class="mb-3">
                            <label>Estado</label>
                            <input  class="form-control" name="estado_fornecedor" type="text" placeholder="Estado" value="<?php echo ($fornecedor->estado_fornecedor) ? $fornecedor->estado_fornecedor: null?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>Bairro</label>
                            <input  class="form-control" name="bairro_fornecedor" type="text" placeholder="Bairro" value="<?php echo ($fornecedor->bairro_fornecedor) ? $fornecedor->bairro_fornecedor: null?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-3">
                          <div class="mb-3">
                            <label>Rua</label>
                            <input  class="form-control" name="rua__fornecedor" type="text" placeholder="rua" value="<?php echo ($fornecedor->rua__fornecedor) ? $fornecedor->rua__fornecedor: null?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-1">
                          <div class="mb-3">
                            <label>Numero</label>
                            <input  class="form-control" name="numero_fornecedor" type="text" placeholder="Numero" value="<?php echo ($fornecedor->numero_fornecedor) ? $fornecedor->numero_fornecedor: null?>">
                          </div>
                        </div>
                        
                        <div class="col-sm-1">
                          <div class="mb-3">
                            <label>Complemento</label>
                            <input  class="form-control" name="complemento" type="text" placeholder="Complemento" value="<?php echo ($fornecedor->complemento) ? $fornecedor->complemento: null?>">
                          </div>
                        </div>
                        
                      </div>
                      
                      <div class="row">
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>Telefone Fixo</label>
                             <input  class="form-control" name="telefone_fornecedor" type="text" placeholder="Telefone Fixo" value="<?php echo ($fornecedor->telefone_fornecedor) ? $fornecedor->telefone_fornecedor: null?>">
                          </div>
                        </div>
                        <div class="col-sm-2">
                          <div class="mb-3">
                            <label>Transportadora</label>
                           <div class="mb-3">
                            <select class="form-select">
                              <option>Sim</option>
                              <option>Não</option>
                            </select>
                          </div>       </div>
                        </div>
                        
                        <div class="col-sm-8">
                          <div class="mb-3">
                            <label>Observações</label>
                             <textarea class="form-control" name="observacao" id="exampleFormControlTextarea4" rows="3"></textarea>
                          </div>
                        </div>
                        
                      </div>
                      
                       <div class="row">
                        <div class="col">
                          <div class="text-end"><a class="btn btn-secondary me-3" href="#">ENVIAR</a></div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          </form>
          <!-- Container-fluid Ends-->
        </div>