 <?php 
                if ($_GET['pesquisar'] == "sim") {
                if ($_GET['data1']) {
                    $inicioBR = $_GET['data1'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                } else {
                    $inicioBR = $_GET['data1a'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                }
                
                if ($_GET['data_fim']) {
                    $fimBR = $_GET['data2'];
                    $fim = implode("-",array_reverse(explode("/",$fimBR)));
                } else {
                    $fimBR = $_GET['data2a'];
                    $fim = implode("-",array_reverse(explode("/",$fimBR)));
                }
                
                if ($_GET['id_produto']) {
                    $idi = $_GET['id_produto'];
                } else {
                    $idi = "%%";
                }
                
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                    
                    $idi = "%%";
                    $hoje7 = date('Y-m-d', strtotime($inicio . ' +3 day'));
                    $hoje7br = date('d/m/Y', strtotime($inicio . ' +3 day'));
                    $fim = $hoje7;
                    $fimBR = $hoje7br;
                }
                ?>

<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Ficha Razão</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Ficha Razão</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "transferencia" ?>" class="btn btn-primary">Tranferências</a>
                  </div>
                  <!-- Bookmark Ends-->
                  
                  
                  <!-- Modal Inserir-->
                  <div class="modal fade" id="exampleModalcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalcat" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "marca/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Marca</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Marca</label>
                            <input  class="form-control" name="marca" type="text" placeholder="Nome da Marca" value="">
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
          
          <div class="col-md-12 project-list">
                <div class="card">
                  <form class="needs-validation" action="<?php echo URL_BASE . "movimento/filtro"?>" novalidate="" method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                       <?php if($idi == "%%") {} else {?>
                       <?php $imagem = ($produto->imagem) ? $produto->imagem: "semproduto.png" ?>
          				<div class="col-md-3">
                         <div class="media">
                              <div class="media-body align-self-center">
                                  <h5 class="user-name"><?php echo $produto->produto; ?></h5>
                                <h6>Estoque Atual: <?php echo $produto->estoque_atual; ?></h6>
                              </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                         <div class="media">
                              <div class="media-body align-self-center">
                                <h6>Estoque Reservado: <?php echo $produto->estoque_reservado; ?></h6>
                                <h6>Estoque Real: <?php echo $produto->estoque_real; ?></h6>
                              </div>
                            </div>
                        </div>
                        <?php }?>
                        <div class="col-md-2">
                          <select class="form-select digits btn-light" id="select-1" name="id_produto">
                                      		<option value="%%" <?php echo ($idi == "%%")? "selected":"";?>>Selecione o Produto </option>
                                       		<?php foreach ($produtos as $prd){
                                       		    $selecionado = ($prd->id_produto == $idi) ? "selected" :"";
            								    echo "<option value='$prd->id_produto' $selecionado>$prd->produto</option>";
            								}?> 
                                    </select>  
                        </div>

                        <div class="col-md-1 mb-3">
                        <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="value" data-language="en" name="data1" placeholder="<?php echo $inicioBR; ?>">
                         <input type="hidden" name="data1a" value="<?php echo $inicioBR; ?>">
                    
                        </div>
                        <div class="col-md-1 mb-3">
                         <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data2" placeholder="<?php echo $fimBR; ?>">
                      		<input type="hidden" name="data2a" value="<?php echo $fimBR; ?>">
                      </div>
                        <div class="col-md-2 mb-3">
                          <button class="form-control btn btn-primary" type="submit" style="color:#fff">Filtrar</button>
                        </div>
                      </div>
                      
                      <input type="hidden" name="pesquisar" value="sim">
                    </form>
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
                    <div class="card-block row">
                  <div class="card-body">
                    <div class="table-responsive">
                       <table class="display table-xs" id="basic-1">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Data</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Produto</th>
                            <th scope="col" style="text-align:center;">QTD</th>
                            <th scope="col" style="text-align:center;">Saldo</th>
                            <th scope="col">Valor</th>
                            <th scope="col" style="text-align:center">Valor Saldo</th>
                            <th scope="col" style="text-align:center">Localização</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $cliente){?>
                          <tr>
                          <td scope="row"><?php echo $cliente->id_movimento ?></td>
                              <td scope="row"><?php echo date('d/m/Y', strtotime($cliente->data_movimento)); ?></td>
                              <td><?php echo $cliente->tipo_movimento ?></td>
                              <td><?php echo $cliente->produto ?></td>
                              <td style="text-align:center;"><?php echo $cliente->qtde_movimento ?></td>
                              <td style="text-align:center;"><?php echo $cliente->saldoestoque ?></td>
                              <td style="text-align:right;"><?php echo $cliente->valor_movimento ?></td>
                              <td style="text-align:right;"><?php echo $cliente->subtotal_movimento ?></td>
                              <td style="text-align:center;"><?php echo $cliente->localizacao ?></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <!-- Individual column searching (text inputs) Ends-->
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>