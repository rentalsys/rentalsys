<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Lista de Clientes (Agendamento)</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item active">Lista de Clientes</li>
                  </ol>
                </div>
               
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                  <a  class="btn btn-primary" href="<?php echo URL_BASE . "agenda"?>">Agenda da Sala</a>
                  <a  class="btn btn-primary" href="<?php echo URL_BASE . "professor"?>">Agenda dos Professores</a>
                    	<a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>
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
                  
                  <!– modal de cliente inserir –>
                              <div style="z-index:1043" class="modal fade" id="exampleModalCliente<?php echo $id_h ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente<?php echo $id_h ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
        
                               <form action="<?php echo URL_BASE . "clientecursos/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                                      
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente a Agendar</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="card-body">
                              <div class="mb-3">
                                    <label class="col-form-label">Tipo de Cadastro</label>
                                 		<div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="radioinline1" type="radio" name="pf_pj" value="pf">
                                    <label class="mb-0" for="radioinline1">Pessoa Física</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="pf_pj" value="pj">
                                    <label class="mb-0" for="radioinline2">Pessoa Jurídica</label>
                                  </div>
                                </div>
                              </div>
                                         
                              </div>

                                  <div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input  class="form-control" name="nome" type="text" placeholder="Nome" value="">
                                  </div>
                                   <div class="mb-3">
                                    <label class="col-form-label">Celular do Cliente (Somente Números com DDD) <i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                                    <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="">
                                  </div>
                                  <div class="mb-3">
                                    <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                                    <input class="form-control" name="email" type="text" placeholder="Email" value="">
                                  </div>
        
                              </div>
                                  <div class="modal-footer">
                                     <input type="hidden" name="ide" value="<?php echo $inicioBR; ?>">
                                    <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" value="Enviar" class="btn btn-primary">
                                  </div>
                                </div>
                                </form>
                              </div>
                            </div>
                           <!– modal de cliente –>
                   
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
                            <th scope="col">Agenda</th>
                            <th scope="col">Agendado</th>
                            <th scope="col">Cadastro</th>
                            <th scope="col">PF/PJ</th>
                            <th scope="col" style="text-align:center">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $cliente){?>
                          <tr>
                          	  <td  style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo $cliente->id_cliente ?></td>
                              <td  style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo $cliente->nome ?></td>
                              <td style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo $cliente->email?></td>
                              <td style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo $cliente->celular?></td>
                              <td style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php if($cliente->treinamento == "s") { echo "Sim"; } else { echo "Não"; }  ?></td>
                              <td style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo $cliente->agendado; ?></td>
                              <td style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo date('d/m/Y', strtotime($cliente->data_cadastro)); ?></td>
                              <td style="padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>"><?php echo $cliente->pf_pj?></td>
                              <td style="text-align:center;padding-top:10px;<?php if($cliente->treinamento=="s" && $cliente->agendado=="n" ){?>background-color:#F5DEB3<?php } elseif($cliente->agendado=="s") { ?>background-color:#00FFFF<?php } else { } ?>">
								<a href="#" data-bs-toggle="modal" data-bs-target="#ModalCliente<?php echo $cliente->id_cliente ?>" data-whatever="@mdo"><i class="icofont icofont-edit"></i></a>
                              <!-- 
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="chamado" data-id="<?php //echo $chamado->id_chamado ?>" type="button" data-original-title="btn btn-danger btn-xs" title=""><i class="icofont icofont-trash" style="color:#fd2e64"></i></a>
                             -->
                              </td>
                              <!– modal de cliente inserir –>
                              <div style="z-index:1043" class="modal fade" id="ModalCliente<?php echo $cliente->id_cliente ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente<?php echo $id_h ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
        
                               <form action="<?php echo URL_BASE . "clientecursos/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                                      
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente a Agendar</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="card-body">
                                  
                                  <div class="mb-3">
                                    <label class="col-form-label">Agendado</label>
                                 		<div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="radioinline1" type="radio" name="agendado" value="s" <?php if (!(strcmp($cliente->agendado,"s"))) {echo "checked=\"checked\"";} ?> >
                                    <label class="mb-0" for="radioinline1">Sim</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="agendado" value="n" <?php if (!(strcmp($cliente->agendado,"n"))) {echo "checked=\"checked\"";} ?>>
                                    <label class="mb-0" for="radioinline2">Não</label>
                                  </div>
                                </div>
                              </div>
                                         
                              </div>
                                  
                              <div class="mb-3">
                                    <label class="col-form-label">Tipo de Cadastro</label>
                                 		<div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="radioinline1" type="radio" name="pf_pj" value="pf" <?php if (!(strcmp($cliente->pf_pj,"pf"))) {echo "checked=\"checked\"";} ?> >
                                    <label class="mb-0" for="radioinline1">Pessoa Física</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="pf_pj" value="pj" <?php if (!(strcmp($cliente->pf_pj,"pj"))) {echo "checked=\"checked\"";} ?>>
                                    <label class="mb-0" for="radioinline2">Pessoa Jurídica</label>
                                  </div>
                                </div>
                              </div>
                                         
                              </div>

                                  <div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input  class="form-control" name="nome" type="text" placeholder="Nome" value="<?php echo $cliente->nome ?>">
                                  </div>
                                   <div class="mb-3">
                                    <label class="col-form-label">Celular do Cliente (Somente Números com DDD) <i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                                    <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="<?php echo ($cliente->celular) ? $cliente->celular: null?>">
                                  </div>
                                  <div class="mb-3">
                                    <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                                    <input class="form-control" name="email" type="text" placeholder="Email" value="<?php echo ($cliente->email) ? $cliente->email: null?>">
                                  </div>
        
                              </div>
                                  <div class="modal-footer">
                                     <input type="hidden" name="id_cliente" value="<?php echo isset($cliente->id_cliente) ? $cliente->id_cliente : null ?>">
                                    <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" value="Enviar" class="btn btn-primary">
                                  </div>
                                </div>
                                </form>
                              </div>
                            </div>
                           <!– modal de cliente –>
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

        