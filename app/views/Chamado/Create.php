<style type="text/css">
								.listaClientes1{
                                        text-align:left;
                                    	position:absolute;
                                    	left:25px;
                                    	right:15px;
                                    	top:150px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1
                                    }
                                     .listaClientes1 a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                        .listaClientes{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:15px;
                                    	top:36px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1
                                    }
                                    .listaClientes a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                    .listaClientes a:hover {
                                        background: #eee;
                                    }
                       
                                        .listaProdutos{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:15px;
                                    	top:36px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1
                                    }
                                    .listaProdutos a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                    .listaProdutos a:hover {
                                        background: #eee;
                                    }
                           		</style>
                           		
                           		
                           		
                           		<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>

<script src="<?php echo URL_BASE ?>assets/js/js_geral.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>drop/dropzone/dropzone.css" />
<script type="text/javascript" src="<?php echo URL_BASE ?>drop/dropzone/dropzone.js"></script>
<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Chamados</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">Cadastrar chamados</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                   <div class="bookmark">
                    <ul>
                      <a class="btn btn-primary btn-xm" href="<?php echo URL_BASE . "chamado"?>">Chamados</a>
                      <?php if($chamado->id_chamado){?>
                      <a class="btn btn-info btn-xm" href="<?php echo URL_BASE . "chamado/create"?>">Abrir Novo Chamado</a>  
                      <?php } else {} ?>  
                      <?php if($chamado->id_chamado){?>
                      <?php if($chamado->id_status_atendimento == 6){?>
                          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">Chamado Concluído</button>
                           <?php } else { ?>     
                          <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#exampleModalfat" data-whatever="@mdo">Concluir Chamado</button>
                           <?php }} else {} ?>                   
                   	</ul>
                  </div>
                  <div class="card-body btn-showcase">
                       <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                          <form action="<?php echo URL_BASE."chamado/salvar" ?>" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Concluir Chamado</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="mb-3">
                          <label for="select-1">Data do Fechamento</label>
                            <div class="input-group">
                              <input required autocomplete="off" class="datepicker-here form-control digits" id="date-picker" type="text" data-language="en" name="data_fechamento" placeholder="<?php echo ($chamado->data_fechamento) && $chamado->data_fechamento != '0000-00-00' ? date('d/m/Y', strtotime($chamado->data_fechamento)) : date('d/m/Y'); ?>"  value="<?php echo ($chamado->data_fechamento) ? $chamado->data_fechamento : date('d/m/Y'); ?>" required>
                            </div>
                          </div>
                                <div class="mb-3">
                            <label for="select-1">Motivo da Conclusão</label>
                                    <select class="form-control btn-square" id="select-1" name="id_fechamento" required>
                                      		<option value="">Escolha o Motivo</option>
                                       		<?php foreach ($fechamento as $motivo){
                                       		    $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            								    echo "<option value='$motivo->id_fechamento' $selecionado>$motivo->motivo</option>";
            								}?> 
                                    </select>                 
                           </div>
                              <div class="mb-3">
                                <label class="col-form-label" for="message-text">Observação:</label>
                                <textarea class="form-control" id="message-text" name="obs_fechamento"><?php echo ($chamado->obs_fechamento) ? $chamado->obs_fechamento : null?></textarea>
                              </div>
                               <input type="hidden" name="id_cliente" value="<?php echo ($chamado->id_cliente) ? $chamado->id_cliente : null ?>">
                            <input type="hidden" name="id_chamado" value="<?php echo ($chamado->id_chamado) ? $chamado->id_chamado : null ?>">
                         	<input type="hidden" name="id_status_atendimento" value="6>">
                         	<input type="hidden" name="fechamento" value="s">
                         	<input type="hidden" name="id_usuario" value="<?php echo ($chamado->id_usuario) ? $chamado->id_usuario : null ?>">
           					<input type="hidden" name="id_incidente" value="<?php echo ($chamado->id_incidente) ? $chamado->id_incidente : null ?>">
           					<input type="hidden" name="id_notificacao" value="<?php echo ($chamado->id_notificacao) ? $chamado->id_notificacao : null ?>">
     						<input type="hidden" name="id_marca" value="<?php echo ($chamado->id_marca) ? $chamado->id_marca : null ?>">
     						<input type="hidden" name="num_pedido" value="<?php echo ($chamado->num_pedido) ? $chamado->num_pedido : null ?>">
     						<input type="hidden" name="id_resposta_padrao" value="<?php echo ($chamado->id_resposta_padrao) ? $chamado->id_resposta_padrao : null ?>">
     	        			<input type="hidden" name="assunto_chamado" value="<?php echo ($chamado->assunto_chamado) ? $chamado->assunto_chamado : null ?>">
     	        			<input type="hidden" name="data_abertura" value="<?php echo date('d/m/Y', strtotime(($chamado->data_abertura) ? $chamado->data_abertura : date('Y-m-d'))); ?>">
                          </div>
                          <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="submit" value="Concluir Chamado" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                   	
                  </div>
                  
                  <!– modal de cliente inserir –>
                            <script language="JavaScript" >
                            function enviarform(){
                            
                            if(document.form1.nome.value=="" || document.form1.nome.value.length < 2)
                            {
                            alert( "Preencha campo NOME corretamente!" );
                            document.form1.nome.focus();
                            return false;
                            }
                            
                            if(document.form1.celular.value=="" || document.form1.celular.value.length < 10)
                            {
                            alert( "Preencha campo Celular com DDD corretamente!" );
                            document.form1.celular.focus();
                            return false;
                            }
                            
                            
                            return true;
                            }


        				</script>
                              <div style="z-index:1043" class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente<?php echo $id_h ?>" aria-hidden="true">
                              <div class="modal-dialog" role="document">
        
                               <form action="<?php echo URL_BASE . "cliente/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form" id="form1">
                                      
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="card-body">
                                  
                                  <script type="text/javascript">
                           		$(function(){
                           		$("#nome").on("keyup", function(){
                            	var d  = $(this).val();
                            	if(d == ""){
                            		$(".listaClientes1").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "cliente/buscar/" +d ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#nome").after('<div class="listaClientes1"></div>');
                            	   html = "";
                            		for (p = 0; p < data.length; p++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente1(this)"'
                            		  + 'data-idp="' + data[p].id_cliente +
                            		   '" data-nomep="' + data[p].nome + '">' +
                            		  data[p].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes1").html(html);
                                    $(".listaClientes1").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente1(obj){
                                	var idp = $(obj).attr("data-idp");
                                	var nomep = $(obj).attr("data-nomep");
                                	
                                	
                                	$(".listaClientes1").hide();
                                	$("#nome").val(nomep);
                                	$("#cliente").val(nomep);
                                	$("#id_cliente").val(idp);
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                           		</script>
                           		
                           		<div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input  class="form-control" name="nome" id="nome" type="text" placeholder="Nome" value="" autocomplete="off" required="required">
                                  </div>
                                  
                         
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
                                    <label class="col-form-label">Celular do Cliente (Somente Números com DDD) <i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                                    <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="" required="required">
                                  </div>
                                  <div class="mb-3">
                                    <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                                    <input class="form-control" name="email" type="text" placeholder="Email" value="" required="required">
                                  </div>
        
                              </div>
                                  <div class="modal-footer">
                                  	<input type="hidden" name="volta_chamado" value="sim">
                                  	<input type="hidden" name="id_responsavel" value="<?php echo $idi; ?>">
                                     <input type="hidden" name="ide" value="<?php echo $inicioBR; ?>">
                                    <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Fechar</button>
                                    <input type="submit" value="Cadastrar Novo Cliente" class="btn btn-primary" onClick="return enviarform();">
                                  </div>
                                </div>
                                </form>
                              </div>
                            </div>
                           <!– modal de cliente –>
                  
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
		  <div class="container-fluid">
		  
            <div class="row">
              <div class="col-sm-12 col-xl-6">
                <div class="row">
                  <form action="<?php echo URL_BASE . "chamado/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form " id="form1" name="form1" onSubmit="return concluir();">
                  <div class="col-sm-12">
                    <div class="card">
                      <div class="card-header pb-0">
                        <h5>Chamado número: #<?php echo isset($chamado->id_chamado) ? $chamado->id_chamado : "Abertura" ?> 
                      <?php if($chamado->id_status_atendimento == 6){?>
                          Chamado concluído
                           <?php } else { }?>      
                        </h5>
                        <span>
                        <?php if($chamado->id_status_atendimento == 6){ 
                            echo $chamado->obs_fechamento;
                          } else { }?> 
						</span>
                      </div>
                      <div class="card-body">
                        
                        <div class="mb-3">
                          <label for="select-1">Data de abertura</label>
                            <div class="input-group">
                            <?php 
                                setlocale(LC_TIME, 'pt_BR', 'pt_BR.UTF-8', 'pt_BR.UTF-8', 'Portuguese');
                                date_default_timezone_set('America/Sao_Paulo');
                                 ?>
                                     <input readonly="readonly" class="form-control" type="text" name="data_abertura" value="<?php echo ($chamado->data_abertura) ? date('d/m/Y', strtotime($chamado->data_abertura)) : date('d/m/Y'); ?>">
                      		</div>
                          </div>
                          
                         <div class="mb-3">
                                <label class="col-form-label">Situação</label>
                                <div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="prioridade" type="radio" name="id_prioridade" value="1" <?php if($chamado->id_prioridade == "1"){?>checked="checked" <?php } else {}?>>
                                    <label class="mb-0" for="prioridade">Normal</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="prioridade1" type="radio" name="id_prioridade" value="2" <?php if($chamado->id_prioridade == "2"){?>checked="checked" <?php } else {}?>>
                                    <label class="mb-0" for="prioridade1">Crítica <i class="icofont icofont-fire-burn" style="color:#FF0000;font-size:20px"></i></label>
                                  </div>
                                </div>
                              </div>
                                         
                              </div>
                          
                          <div class="mb-3">
                            <label for="select-1">Cliente 
                            <?php if($chamado->id_chamado){} else {?>
                            <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a>
                            <?php } ?>
                            </label>
                                    <select class="form-control btn-square" id="id_cliente" name="id_cliente" >
                                      		<option value="">Escolha o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $chamado->id_cliente) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           </div>
                           <div class="mb-3">
                            <label class="col-form-label">Assunto</label>
                            <input class="form-control" type="text" name="assunto_chamado" placeholder="Assunto" value="<?php echo ($chamado->assunto_chamado) ? $chamado->assunto_chamado: null?>">
                          </div>
                          <div class="mb-4 draggable">
                                    <label for="select-1">Status</label>
                                    <select class="form-control btn-square" id="select-1" name="id_status_atendimento" >
                                      	<option value="">Escolha um status</option>
                                       		<?php foreach ($status as $st){
                                       		    $selecionado = ($st->id_status_atendimento == $chamado->id_status_atendimento) ? "selected" :"";
                                       		    if($st->id_status_atendimento==6){} else {
            								    echo "<option value='$st->id_status_atendimento' $selecionado>$st->posvendas_status_atendimento</option>";
                                       		    }
            								}?> 
                                    	</select>
                                   
                             </div>
                             <div class="mb-3 draggable">
                                    <label for="">Solicitante</label>
                                    <select class="form-control btn-square" id="select-1" name="id_usuario">
                                      <option value="">Escolha um solicitante</option>
                                      <?php foreach ($usuarios as $usuario){
                                          $selecionado = ($usuario->id_usuario == $chamado->id_usuario) ? "selected" :"";
            								    echo "<option value='$usuario->id_usuario' $selecionado>$usuario->nome_usuario</option>";
            								}?> 
                                    </select>
                                    
                             </div>
                              <div class="mb-3 draggable">
                                    <label for="select-1">Fabricante</label>
                                    <select class="form-control btn-square" id="select-1" name="id_marca">
                                      <option value="">Escolha o fabricante</option>
                                       <?php foreach ($marcas as $marca){
                                           $selecionado = ($marca->id_marca == $chamado->id_marca) ? "selected" :"";
            								    echo "<option value='$marca->id_marca' $selecionado>$marca->marca</option>";
            								}?> 
                                    </select>
                                    
                             </div>
                             <div class="mb-3">
                            <label class="col-form-label">Número do Pedido</label>
                            <input class="form-control" type="text" name="num_pedido" placeholder="Número do Pedido" value="<?php echo ($chamado->num_pedido) ? $chamado->num_pedido: null?>">
                          </div>
                             <div class="mb-3 draggable">
                                    <label for="select-1">Tipo de demanda</label>
                                    <select class="form-control btn-square" id="select-1" name="id_incidente">
                                      <option value="">Escolha o Tipo</option>
                                       <?php foreach ($incidentes as $incidente){
                                           $selecionado = ($incidente->id_incidente == $chamado->id_incidente) ? "selected" :"";
            								    echo "<option value='$incidente->id_incidente' $selecionado>$incidente->incidente</option>";
            								}?> 
                                    </select>
                                    
                             </div>
                          <div class="mb-3">
                            <label for="select-1">Resposta Padrão</label>
                                    <select class="form-control btn-square" id="select-1" name="id_resposta_padrao">
                                      <option value="">Resposta Padrão</option>
                                       <?php foreach ($respostas as $resposta){
                                           $selecionado = ($resposta->id_resposta_padrao == $chamado->id_resposta_padrao) ? "selected" :"";
            								    echo "<option value='$resposta->id_resposta_padrao' $selecionado>$resposta->resposta_padrao</option>";
            								}?> 
                                    </select>                  
                           </div>
                            <div class="mb-3">
                            <label for="select-1">Notificação</label>
                                    <select class="form-control btn-square" id="select-1" name="id_notificacao">
                                      <option value="">Notificação ao cliente</option>
                                       <?php foreach ($notificacoes as $notificacao){
                                           $selecionado = ($notificacao->id_notificacao == $chamado->id_notificacao) ? "selected" :"";
            								    echo "<option value='$notificacao->id_notificacao' $selecionado>$notificacao->notificacao</option>";
            								}?> 
                                    </select>                  
                           </div>
                           
                        
                      </div>
                      <div class="card-footer">
                      		<input type="hidden" name="obs_fechamento" value="<?php echo ($chamado->obs_fechamento) ? $chamado->obs_fechamento : null ?>">
                      		<input type="hidden" name="id_fechamento" value="<?php echo ($chamado->id_fechamento) ? $chamado->id_fechamento : null ?>">
                         	<input type="hidden" name="id_chamado" value="<?php echo ($chamado->id_chamado) ? $chamado->id_chamado : null ?>">
                         	<input type="hidden" name="id_edicao" value="<?php echo ($chamado->id_chamado) ? $chamado->id_chamado : null ?>">
                         	<input type="hidden" name="data_fechamento" value="<?php echo date('d/m/Y', strtotime(($chamado->data_fechamento) ? $chamado->data_fechamento : '0000-00-00')); ?>">
                        <button class="btn btn-primary">Salvar</button>
                      </div>
                    </div>
                  </div>
                  </form>
                  
                </div>
              </div>
              <div class="col-sm-12 col-xl-6">
                <div class="row">
                   <form action="?action=save" method="Post" enctype="multipart/form-data" class="theme-form mega-form ">
             
                  <div class="col-sm-12">
                    <div class="card">
                  <div class="card-header pb-0">
                    <h5>Adicionar etapa</h5>
                  </div>
                  <div class="card-body">
                   <input type="hidden" name="data_item" value="<?php echo date('d/m/Y'); ?>">
                  <textarea name="descricao_item" class="form-control" rows="17" placeholder="Escreva a descrição do item" <?php if($chamado->id_chamado){} else {?>
                        disabled
                        <?php } ?>></textarea>
                  </div>
                  
                  <div class="card-footer">
                         	<input type="hidden" name="id_chamado" value="<?php echo ($chamado->id_chamado) ? $chamado->id_chamado : null ?>">
                         	<input type="hidden" name="id_status_atendimento" value="<?php echo ($chamado->id_status_atendimento) ? $chamado->id_status_atendimento : null ?>">
                         	<input type="hidden" name="id_usuario" value="<?php echo ($chamado->id_usuario) ? $chamado->id_usuario : null ?>">
           					<input type="hidden" name="id_incidente" value="<?php echo ($chamado->id_incidente) ? $chamado->id_incidente : null ?>">
           					<input type="hidden" name="id_notificacao" value="<?php echo ($chamado->id_notificacao) ? $chamado->id_notificacao : null ?>">
     						<input type="hidden" name="id_marca" value="<?php echo ($chamado->id_marca) ? $chamado->id_marca : null ?>">
     						<input type="hidden" name="action" value="saveitem">
                        <button class="btn btn-primary" 
                        <?php if($chamado->id_chamado){} else {?>
                        disabled
                        <?php } ?>
                        >Adicionar Etapa</button>
                      </div>
                </div>
                
                  </div>
					</form>
			<div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card">
                    <div class="card-header pb-0">
                      <h5>Anexos</h5>
                    </div>
                    <div class="card-body add-post">
                      <form name="frmImage" action="image-add.php?action=saveimg" class="dropzone">
                      <div class="m-0 dz-message needsclick" ><i class="icon-cloud-up"></i>
                          <h6 class="mb-0">Solte os arquivos aqui ou clique para fazer upload.</h6>
                          <input type="hidden" name="id_chamado" value="<?php echo ($chamado->id_chamado) ? $chamado->id_chamado : null ?>">
                        </div>                      
                      </form>
                    	<div class="btn-menu">
                        <a href="" class="link"><?php if($chamado->id_chamado){?>
                        <button class="btn btn-primary">Enviar anexo</button><?php } else {}?>
                        </a>
                    	</div>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            

                </div>
              </div>
            </div>
            
            <div class="col-sm-12">
            	
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Etapas do chamado: <?php //echo ($resultado) ? $resultado : "Abertura" ?></h5><span> <?php echo ($chamado->assunto_chamado) ? $chamado->assunto_chamado: null?></span>
                  </div>
                  <div class="card-body">
                    <div class="default-according style-1" id="accordionoc">
                    <?php if($chamado->id_status_atendimento == 6) { $i =0;?>
                   <div class="default-according" id="accordion">
                      <div class="card">
                        <div class="card-header" id="heading<?php echo $i++ ?>">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i ?>" aria-expanded="false" aria-controls="collapse<?php echo $i ?>">
                            <?php echo $i." - ".date('d/m/Y H:i', strtotime($chamado->data_fechamento)); ?> # <?php echo ($chamado->incidente) ? $chamado->incidente : null?> <span><?php echo "Concluído"?> 
                            </button>
                          </h5>
                        </div>
                        <div class="collapse <?php echo ($i == 1) ? "show":"";?>" id="collapse<?php echo $i ?>" aria-labelledby="heading<?php echo $i ?>" data-bs-parent="#accordion">
                          <div class="card-body"><?php echo ($chamado->obs_fechamento) ? $chamado->obs_fechamento : null ?></div>
                        </div>
                      </div>
                    </div>
                   <?php } else { $i =0; }?>
                    
                     <?php foreach ($chamadoitens as $itemc){ $i++;?>
                     
                     <div class="default-according" id="accordion">
                      <div class="card">
                        <div class="card-header" id="heading<?php echo $i ?>">
                          <h5 class="mb-0">
                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i ?>" aria-expanded="false" aria-controls="collapse<?php echo $i ?>">
                            <?php echo $i." - ".date('d/m/Y H:i', strtotime($itemc->data_item)); ?> #<?php //echo ($itemc->id_item) ? $itemc->id_item : null?> <?php echo ($itemc->incidente) ? $itemc->incidente : null?> <span><?php echo ($itemc->posvendas_status_atendimento) ? $itemc->posvendas_status_atendimento : null?> 
                            | <?php echo ($itemc->nome_usuario) ? $itemc->nome_usuario : null?>
                            </button>
                          </h5>
                        </div>
                        <div class="collapse <?php echo ($i == 1) ? "show":"";?>" id="collapse<?php echo $i ?>" aria-labelledby="heading<?php echo $i ?>" data-bs-parent="#accordion">
                          <div class="card-body"><?php echo isset($itemc->descricao_item) ? $itemc->descricao_item : null ?></div>
                        </div>
                      </div>
                    </div>
                      <?php } ?>
                   
                   
                   
                   
                    </div>
                  </div>
                </div>
                
              </div>
              
              <div class="col-sm-12">
                <div class="file-content">
                  <div class="card">
                    <div class="card-header">
                      
                    </div>

                    <div class="card-body file-manager">
                      <h4>Arquivos anexos</h4>
                      <h6>Arquivos anexados no atendimento, clique na ícone para vizualizar</h6>
                      <ul class="files">
                      <?php $i =0; foreach ($chamadoanexo as $anexo){ $i++;
                      $extension = pathinfo($anexo->image_path, PATHINFO_EXTENSION);
                      ?>
                        <li class="file-box" style="margin-bottom:10px">
                        <div class="file-top">  <a href="<?php echo ($anexo->image_path) ? URL_BASE.$anexo->image_path : null ?>" target="_blank">
                        <?php if($extension == "jpg" or $extension == "png" or $extension == "jpeg"){?>
                        <img src="<?php echo ($anexo->image_path) ? URL_BASE.$anexo->image_path : null ?>" width="45px">
                        <?php } else {?>
                        <i class="icofont icofont-file-alt"></i>
                        <?php } ?>
                        </a></div>
                          <div class="file-bottom" style="text-align:center">
                      <div class="btn-group" style="margin-top:4px;">
                        <button class="btn btn-outline"><?php echo ($anexo->nome_anexo) ? $anexo->nome_anexo : null ?></button>
                        <button class="btn btn-outline" href="javascript:;" onclick="return excluirimg(this)" data-entidade ="chamado" data-id="<?php echo $anexo->image_id ?>" data-id-chamado="<?php echo $chamado->id_chamado ?>"><i class="fa fa-trash" style="color:#ff5f24"></i></button>
                      </div>
                          </div>
                        </li>
                       <?php } ?>
                      
                    </div>
                    
                    </div>
                </div>
              </div>
           
          </div>
           
          <!-- Container-fluid Ends-->
        </div>
        
