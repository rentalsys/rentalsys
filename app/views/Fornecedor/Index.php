<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Fornecedors</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Fornecedores</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                    	<a href="<?php echo URL_BASE . "fornecedor/create" ?>" class="btn btn-primary btn-xs"><i class="icon-control-backward"></i> Cadastrar</a>
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
                            <th scope="col">Contato</th>
                            <th scope="col">CPF/CNPJ</th>
                            <th scope="col">Transportadora</th>
                            <th scope="col">Cidade</th>
                            <th scope="col" style="text-align:center">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $fornecedor){?>
                          <tr>
                          <td scope="row" style="padding-top:10px"><?php echo $fornecedor->id_fornecedor ?></td>
                              <td scope="row" style="padding-top:10px"><?php echo $fornecedor->nome_fornecedor ?></td>
                              <td style="padding-top:10px"><?php echo $fornecedor->email_fornecedor?></td>
                              <td style="padding-top:10px"><?php echo $fornecedor->celular_fornecedor?></td>
                              <td style="padding-top:10px"><?php echo $fornecedor->contato_fornecedor ?></td>
                              <td style="padding-top:10px"><?php echo $fornecedor->CNPJ?></td>
                              <td><?php echo ($fornecedor->transportadora == "s")? "Sim":"";?></td>
                              <td style="padding-top:10px"><?php echo $fornecedor->cidade."-".$fornecedor->uf?></td>
                              <td style="text-align:center;padding-top:10px">
								<a href="<?php echo URL_BASE ."fornecedor/edit/".$fornecedor->id_fornecedor ?>" data-entidade ="fornecedor"  type="button" data-original-title="btn btn-danger btn-xs" title="" style="margin-left:5px"><i class="icofont icofont-edit"></i></a>
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

        