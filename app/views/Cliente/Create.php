<script src="<?php echo URL_BASE ?>assets/js/js_geral.js"></script>

<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Cadastrar Cliente</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Cadastrar Cliente</li>
                  </ol>
                </div>
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "cliente" ?>" class="btn btn-primary btn-xs"><i class="icon-control-backward"></i> Voltar</a>
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
          <form action="<?php echo URL_BASE . "cliente/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
          <div class="container-fluid">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header pb-0">
                        <h5>Ficha do Cliente</h5>
                      </div>
                      <div class="card-body">
                      <div class="mb-3">
                            <label class="col-form-label">Tipo de Cadastro</label>
                         		<div class="col">
                        <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                          <div class="radio radio-primary">
                            <input <?php if (!(strcmp($cliente->pf_pj,"pf"))) {echo "checked=\"checked\"";} ?> id="radioinline1" type="radio" name="pf_pj" value="pf">
                            <label class="mb-0" for="radioinline1">Pessoa Física</label>
                          </div>
                          <div class="radio radio-primary">
                            <input <?php if (!(strcmp($cliente->pf_pj,"pj"))) {echo "checked=\"checked\"";} ?> id="radioinline2" type="radio" name="pf_pj" value="pj">
                            <label class="mb-0" for="radioinline2">Pessoa Jurídica</label>
                          </div>
                        </div>
                      </div>
                                 
                      </div>

                          <div class="mb-3">
                            <label class="col-form-label">Nome do Cliente / Razão Social</label>
                            <input  class="form-control" name="nome" type="text" placeholder="Nome" value="<?php echo ($cliente->nome) ? $cliente->nome: null?>">
                          </div>
                           <div class="mb-3">
                            <label class="col-form-label">Celular do Cliente (Somente Números com DDD)<i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                            <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="<?php echo ($cliente->celular) ? $cliente->celular: null?>">
                          </div>
                          <div class="mb-3">
                            <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                            <input class="form-control" name="email" type="text" placeholder="Email" value="<?php echo ($cliente->email) ? $cliente->email: null?>">
                          </div>

                      </div>
                      <div class="card-footer">
                      	<input type="hidden" name="id_cliente" value="<?php echo isset($cliente->id_cliente) ? $cliente->id_cliente : null ?>">
                        <button class="btn btn-primary">Enviar</button>
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