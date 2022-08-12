<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Clientes</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Clientes</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "cliente/create" ?>" class="btn btn-primary btn-xs"><i class="icon-control-backward"></i> Cadastrar</a>
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
          <?php 
                $this->verMsg();
                $this->verErro();
                ?>
          <!-- Container-fluid starts-->
          <div class="container-fluid list-products">
            <div class="row">
              <!-- Individual column searching (text inputs) Starts-->
              <div class="col-sm-12">
                <div class="card">
                  
                   
                <div class="card-block row">
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table class="display table-xs" id="basic-1">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th>email</th>
                            <th scope="col">whatsaap</th>
                            <th scope="col">Inicio</th>
                            <th scope="col">PF/PJ</th>
                            <th scope="col">CPF/CNPJ</th>
                            <th scope="col">UF</th>
                            <th scope="col" style="text-align:center">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $cliente){?>
                          <tr>
                          <td scope="row" style="padding-top:10px"><?php echo $cliente->id_cliente ?></td>
                              <td scope="row" style="padding-top:10px"><?php echo $cliente->nome ?></td>
                              <td style="padding-top:10px"><?php echo $cliente->email?></td>
                              <td style="padding-top:10px"><?php echo $cliente->celular?></td>
                              <td style="padding-top:10px"><?php echo date('d/m/Y', strtotime($cliente->data_cadastro)); ?></td>
                              <td style="padding-top:10px"><?php echo $cliente->pf_pj?></td>
                              <td>-</td>
                              <td style="padding-top:10px">-</td>
                              <td style="text-align:center;padding-top:10px">
								<a href="<?php echo URL_BASE ."cliente/edit/".$cliente->id_cliente ?>" data-entidade ="cliente"  type="button" data-original-title="btn btn-danger btn-xs" title="" style="margin-left:5px"><i class="icofont icofont-edit"></i></a>
                              <!-- 
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="chamado" data-id="<?php //echo $chamado->id_chamado ?>" type="button" data-original-title="btn btn-danger btn-xs" title=""><i class="icofont icofont-trash" style="color:#fd2e64"></i></a>
                             -->
                              </td>
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

        