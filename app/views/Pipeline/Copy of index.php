<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Pipeline de Pedidos</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
<li class="breadcrumb-item active">Pipeline de Pedidos</li>
</ol>
</div>

<?php 
                if ($_GET['pesquisar'] == "sim") {
                if ($_GET['data_inicio']) {
                    $inicioBR = $_GET['data_inicio'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                } else {
                    $inicioBR = $_GET['data_inicio1'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                }
                
                if ($_GET['data_fim']) {
                    $fimBR = $_GET['data_fim'];
                    $fim = implode("-",array_reverse(explode("/",$fimBR)));
                } else {
                    $fimBR = $_GET['data_fim1'];
                    $fim = implode("-",array_reverse(explode("/",$fimBR)));
                }

                if ($_GET['st']) {
                    $idi = $_GET['st'];
                } else {
                    $idi = "%%";
                }
                $start_date = date_create($inicio);
                $end_date   = date_create($fim);
                } else {
                    $fim = date('Y-m-d');
                    $fimBR = date('d/m/Y');
                    $inicio = date('Y-m-01');
                    $inicioBR = date('d/m/Y', strtotime($inicio));
                    //echo $inicio." ".$inicioBR;
                    
                    
                    
                    $idi = "%%";

                }
                
                ?>

<div class="col-sm-6 table-responsive">
<!-- Bookmark Start-->
<div class="bookmark">
<a href="orcamento" class="btn btn-primary">Orçamentos</a>
</div>
<!-- Bookmark Ends-->

<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="<?php echo URL_BASE ?>kan/dist/jkanban.css" />
<!– modal de inserção –>

								<style type="text/css">
								.listaClientes{
                                        text-align:left;
                                    	position:absolute;
                                    	left:20px;
                                    	right:15px;
                                    	top:105px;
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
                       
                           		</style>
                    
                    
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" action="<?php echo URL_BASE . "orcamento/salvar" ?>" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Gerar Orçamento <?php echo date('d/m/Y H:i') ?></h5>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
                          </div>
                  	
                  			 <script type="text/javascript">
                           		$(function(){
                           		$("#nome").on("keyup", function(){
                            	var d  = $(this).val();
                            	if(d == ""){
                            		$(".listaClientes").hide();
                            		return;
                            	}
                            	$.ajax({
                            	  url: base_url + "cliente/buscar/" +d ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#nome").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (p = 0; p < data.length; p++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente(this)"'
                            		  + 'data-idp="' + data[p].id_cliente + '" data-celular="' + data[p].celular + ' "data-email="' + data[p].email +
                            		   '" data-nomep="' + data[p].nome + '">' +
                            		  data[p].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes").html(html);
                                    $(".listaClientes").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente(obj){
                                	var idp = $(obj).attr("data-idp");
                                	var nomep = $(obj).attr("data-nomep");
                                	var celularp = $(obj).attr("data-celular");
                                	var emailp = $(obj).attr("data-email");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#nome").val(nomep);
                                	$("#cliente").val(nomep);
                                	$("#id_cliente").val(idp);
                                	$("#celular").val(celularp);
                                	$("#email").val(emailp);
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                           		</script>
                           		
                           		<div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input type="hidden" id="id_cliente" name="id_cliente" class="form-control">
                                    <input  class="form-control" name="nome" id="nome" type="text" value="" autocomplete="off" placeholder="Nome do Cliente" required="required">
                                  </div>
                           		<div class="form-group row">
                           		 <div class="col-6">
                            		<label>Telefone</label>
                                     <input type="text" name="celular" id="celular" class="form-control" placeholder="Telefone do Cliente" autocomplete="off">   
                           		</div>
                           		<div class="col-6">
                            		<label>e-mail</label>
                                     <input type="text" name="email" id="email" class="form-control" placeholder="email do produto" autocomplete="off">   
                           		</div>
                           		</div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario_solicitou" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                          	<input type="hidden" name="data_pedido" value="<?php echo date('Y-m-d') ?>">
                          	<input type="hidden" name="hora_pedido" value="<?php echo date('H-i') ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent" onClick="return vazio()">Enviar</button>
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



<style>
#myKanban {
        overflow-x: auto;
        padding: 20px 0;
      }
</style>







<!-- Container-fluid starts-->

<div class="container-fluid jkanban-container">
            <div class="row">
            
            <div class="col-12 colorfull-kanban">
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Andamento dos pedidos</h5>
                    <p class="mb-0"><i class="icon-hand-drag"></i> Arraste o box do pedido para mudar o status  </p>
                  </div>
                  <div class="card-body">                    
                    <div id="myKanban"></div>
                  </div>
                </div>
              </div>
            
              
              
              
              <div class="col-12">
                <div class="card note p-20">Voce pode mudar o status de acordo com seu acesso</div>
              </div>
            </div>
          </div>
          
<script src="<?php echo URL_BASE ?>kan/dist/jkanban.js"></script>

    <script type="text/javascript">
    //Função de arrastar e trocar status   
   	$(document).ready(function(){
   		$("#myKanban")
   	});
    </script>
          
	<script>
      var KanbanTest = new jKanban({
        element: "#myKanban",
        gutter: "10px",
        widthBoard: "400px",
        dragBoards: false,
        
        boards: [
        {
            id: "_todo",
            title: "Orçamento",
            class: "bg-primary",
            dragTo: ["1"],
            item: [
            <?php foreach ($lista as $orcamento){ ?>
              {
                id: "<?php echo $orcamento->id_pedido ?>",
                title: 
				`
                               <a class="kanban-box" href="#"><span class="date"><?php echo date('d/m/Y', strtotime($orcamento->data_pedido))." ".date('H:i', strtotime($orcamento->hora_pedido)); ?></span> <span class="badge badge-danger f-right">Novo</span> <span class="f-right" style="margin-right:5px"><strong>Nº <?php echo $orcamento->id_pedido ?> </strong></span> 
                                <h6><?php echo $orcamento->nome ?></h6>
                                <div class="media" ondragover="allowDrop(event)" data-id-pedido="<?php echo $orcamento->id_pedido ?>" data-id-status="<?php echo $orcamento->id_status_pedido ?>" data-id-statusa="1"><img class="img-20 me-1 rounded-circle" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $orcamento->imagem; ?>" alt="" data-original-title="" title="">
                                  <div class="media-body">
                                    <p><?php echo $orcamento->nome_usuario ?></p>
                                  </div>
                                </div>
                                <div class="d-flex mt-3">
                                  <ul class="list">
                                    <h6>R$ <?php echo number_format($orcamento->total,2,",","."); ?></h6>
                                  </ul>
                                  <div class="customers">
                                    <ul>
                                      <li class="d-inline-block me-3">
                                        <p class="f-12">Produtos <?php echo $orcamento->qtd_produtos ?></p>
                                      </li>
                                      
                                    </ul>
                                  </div>
                                </div></a>
                            `
              },
              <?php } ?>
            ]
          },
        {
            id: "_todo",
            title: "Agardando aprovação",
            class: "bg-warning",
            dragTo: ["2"],
            item: [
            
             <?php foreach ($aguardando as $aguardandoap){ ?>
              {
                id: "<?php echo $aguardandoap->id_pedido ?>",
                title: 
				`
                               <a class="kanban-box" href="#"><span class="date"><?php echo date('d/m/Y', strtotime($aguardandoap->data_pedido))." ".date('H:i', strtotime($aguardandoap->hora_pedido)); ?></span> <span class="badge badge-danger f-right">Novo</span> <span class="f-right" style="margin-right:5px"><strong>Nº <?php echo $aguardandoap->id_pedido ?> </strong></span> 
                                <h6><?php echo $aguardandoap->nome ?></h6>
                                <div class="media" data-id-pedido="<?php echo $aguardandoap->id_pedido ?>" data-id-status="<?php echo $aguardandoap->id_status_pedido ?>" data-id-statusa="2"><img class="img-20 me-1 rounded-circle" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $aguardandoap->imagem; ?>" alt="" data-original-title="" title="">
                                  <div class="media-body">
                                    <p><?php echo $aguardandoap->nome_usuario ?></p>
                                  </div>
                                </div>
                                <div class="d-flex mt-3">
                                  <ul class="list">
                                    <h6>R$ <?php echo number_format($aguardandoap->total,2,",","."); ?></h6>
                                  </ul>
                                  <div class="customers">
                                    <ul>
                                      <li class="d-inline-block me-3">
                                        <p class="f-12">Produtos <?php echo $aguardandoap->qtd_produtos ?></p>
                                      </li>
                                      
                                    </ul>
                                  </div>
                                </div></a>
                            `
              },
              <?php } ?>
            ]
          },
          {
            id: "_todo",
            title: "Aprovado",
            class: "bg-secondary",
            dragTo: ["_working"],
            item: [
              <?php foreach ($lista as $orcamento){ ?>
              {
                id: "_test_delete",
                title: 
				`
                               <a class="kanban-box" href="#"><span class="date"><?php echo date('d/m/Y', strtotime($orcamento->data_pedido))." ".date('H:i', strtotime($orcamento->hora_pedido)); ?></span><span class="badge badge-danger f-right">Novo</span>
                                <h6><?php echo $orcamento->nome ?></h6>
                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                  <div class="media-body">
                                    <p><?php echo $orcamento->nome_usuario ?></p>
                                  </div>
                                </div>
                                <div class="d-flex mt-3">
                                  <ul class="list">
                                    <h6>R$ <?php echo number_format($orcamento->total,2,",","."); ?></h6>
                                  </ul>
                                  <div class="customers">
                                    <ul>
                                      <li class="d-inline-block me-3">
                                        <p class="f-12">Produtos <?php echo $orcamento->qtd_produtos ?></p>
                                      </li>
                                      
                                    </ul>
                                  </div>
                                </div></a>
                            `
              },
              <?php } ?>
            ]
          },
          {
            id: "_working",
            title: "Contrato Enviado",
            class: "bg-atencao",
            item: [
             <?php foreach ($lista as $orcamento){ ?>
              {
                id: "_test_delete",
                title: 
				`
                               <a class="kanban-box" href="#"><span class="date"><?php echo date('d/m/Y', strtotime($orcamento->data_pedido))." ".date('H:i', strtotime($orcamento->hora_pedido)); ?></span><span class="badge badge-danger f-right">Novo</span>
                                <h6><?php echo $orcamento->nome ?></h6>
                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                  <div class="media-body">
                                    <p><?php echo $orcamento->nome_usuario ?></p>
                                  </div>
                                </div>
                                <div class="d-flex mt-3">
                                  <ul class="list">
                                    <h6>R$ <?php echo number_format($orcamento->total,2,",","."); ?></h6>
                                  </ul>
                                  <div class="customers">
                                    <ul>
                                      <li class="d-inline-block me-3">
                                        <p class="f-12">Produtos <?php echo $orcamento->qtd_produtos ?></p>
                                      </li>
                                      
                                    </ul>
                                  </div>
                                </div></a>
                            `
              },
              <?php } ?>
            ]
          },
          {
            id: "_done",
            title: "Contrato Assinado",
            class: "bg-danger",
            dragTo: ["_working"],
            item: [
             <?php foreach ($lista as $orcamento){ ?>
              {
                id: "_test_delete",
                title: 
				`
                               <a class="kanban-box" href="#"><span class="date"><?php echo date('d/m/Y', strtotime($orcamento->data_pedido))." ".date('H:i', strtotime($orcamento->hora_pedido)); ?></span><span class="badge badge-danger f-right">Novo</span>
                                <h6><?php echo $orcamento->nome ?></h6>
                                <div class="media"><img class="img-20 me-1 rounded-circle" src="../assets/images/user/3.jpg" alt="" data-original-title="" title="">
                                  <div class="media-body">
                                    <p><?php echo $orcamento->nome_usuario ?></p>
                                  </div>
                                </div>
                                <div class="d-flex mt-3">
                                  <ul class="list">
                                    <h6>R$ <?php echo number_format($orcamento->total,2,",","."); ?></h6>
                                  </ul>
                                  <div class="customers">
                                    <ul>
                                      <li class="d-inline-block me-3">
                                        <p class="f-12">Produtos <?php echo $orcamento->qtd_produtos ?></p>
                                      </li>
                                      
                                    </ul>
                                  </div>
                                </div></a>
                            `
              },
              <?php } ?>
            ]
          }
        ]
      });

    </script>

          <!-- Container-fluid Ends-->
        </div>