<div class="page-body">
<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Lista de Orçamentos</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Lista de Orçamentos</li>
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

<div class="col-sm-6">
<!-- Bookmark Start-->
<div class="bookmark">
<a href="<?php echo URL_BASE . "pipeline" ?>" class="btn btn-info"> Pipeline</a>
<a href="<?php echo URL_BASE . "pedido" ?>" class="btn btn-secondary"> Pedidos</a>
<a href="<a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cadastrar" data-whatever="@mdo">Gerar Orçamento</a>

</div>
<!-- Bookmark Ends-->

<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<!– modal de inserção –>

								<style type="text/css">
								.listaClientes{
                                        text-align:left;
                                    	position:absolute;
                                    	left:20px;
                                    	right:15px;
                                    	top:70px;
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
                          </div>
                  			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
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
                            		  + 'data-idp="' + data[p].id_cliente + '" data-celular="' + data[p].celular  + ' "data-cep="' + data[p].cep + ' "data-cpf="' + data[p].cpf + ' "data-cnpj="' + data[p].cnpj + ' "data-email="' + data[p].email + ' "data-cidade="' + data[p].cidade + ' "data-uf="' + data[p].uf + ' "data-bairro=" ' + data[p].bairro + ' "data-tipo="' + data[p].pf_pj +
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
                                	var cepp = $(obj).attr("data-cep");
                                	var cpfp = $(obj).attr("data-cpf");
                                	var cnpjp = $(obj).attr("data-cnpj");
                                	var emailp = $(obj).attr("data-email");
                                	var cidadep = $(obj).attr("data-cidade");
                                	var ufp = $(obj).attr("data-uf");
                                	var bairrop = $(obj).attr("data-bairro");
                                	
                                	$(".listaClientes").hide();
                                	$("#nome").val(nomep);
                                	$("#cliente").val(nomep);
                                	$("#id_cliente").val(idp);
                                	$("#celular").val(celularp).mask('(00) 0000-00009');
                                	$("#email").val(emailp);
                                	$("#cidade").val(cidadep);
                                	$("#uf").val(ufp);
                                	$("#bairro").val(bairrop);
                                	

                                	
									var tipo = $(obj).attr("data-tipo");
                                	//alert(tipo);
                                	
                                     if(tipo == "pf") {
                                	    $(".pf").show();
                                        $(".pj").hide();
                                        $("input[name=pf_pj][value='pf']").prop("checked",true);
                                     } else {}
                                     
                                     if(tipo == "pj") {
                                	    $(".pj").show();
                                        $(".pf").hide();
                                        $("input[name=pf_pj][value='pj']").prop("checked",true)
                                     } else {}
                                	
                                	 if (isNaN(cpfp)) {
                                     } else {
                                     $("#cpf").val(cpfp).mask('000.000.000-00');
                                     }
                                     
                                     if (isNaN(cnpjp)) {
                                     } else {
                                     $("#cnpj").val(cnpjp).mask('00.000.000/0000-00');
                                     }
                                     
                                     if (isNaN(cepp)) {
                                     } else {
                                     $("#cep").val(cepp).mask('00.000-000');
                                     }
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                                
                                function limparorcamento(){
                            		$("#nome").val("");
                                	$("#cliente").val("");
                                	$("#id_cliente").val("");
                                	$("#celular").val("").mask('(00) 0000-00009');
                                	$("#email").val("");
                                	$("#cep").val("");
                                	$("#cidade").val("");
                                	$("#uf").val("");
                                	$("#bairro").val("");
                                	$("#cpf").val("");
                                	$("#cnpj").val("");
                                	 $("input[name=pf_pj][value='pf']").prop("checked",false);
                                	 $("input[name=pf_pj][value='pj']").prop("checked",false);
                            	}
                           		</script>
                           		<div class="form-group row">
                           		
                           		 <div class="col-2">
                                   <div class="radio radio-primary">
                                    <input <?php if (!(strcmp($cliente->pf_pj,"pf"))) {echo "checked=\"checked\"";} ?> id="radioinline1" type="radio" name="pf_pj" value="pf" required="required">
                                    <label class="mb-0" for="radioinline1">P Física</label>
                                  </div>
                                  <div class="radio radio-primary" style="margin-top:5px">
                                    <input <?php if (!(strcmp($cliente->pf_pj,"pj"))) {echo "checked=\"checked\"";} ?> id="radioinline2" type="radio" name="pf_pj" value="pj" required="required">
                                    <label class="mb-0" for="radioinline2">P Jurídica</label>
                                  </div>
                                   </div>
                           		
                           		<div class="col-7">
                                    <label class="col-form-label">Nome do Cliente / Razão Social *</label>
                                    <input type="hidden" id="id_cliente" name="id_cliente" class="form-control">
                                    <input  class="form-control" name="nome" id="nome" type="text" value="" autocomplete="off" placeholder="Nome do Cliente" required="required">
                                  </div>
                                  	<style>
                                      .pf {
                                        display: none;
                                      }
                                    
                                      .pj {
                                        display: none;
                                      }
                
                                    </style>
                                  <script> 
                                  $("input:radio[name=pf_pj]").on("change", function () {   
                                        if($(this).val() == "pf")
                                        {
                                            $(".pf").show(); 
                                            $(".pj").hide();
                                        }
                                        else if($(this).val() == "pj")
                                        {
                                            $(".pj").show(); 
                                            $(".pf").hide();   
                                        }
                            		});
                                  </script>
                                  
                                  <div class="col-3">
                                    <input type="hidden" id="id_cliente" name="id_cliente" class="form-control">
                                    <div class="pf">
                                    <label class="col-form-label">CPF</label>
                                    <input onkeypress="$(this).mask('000.000.000-00');" class="form-control" name="cpf" id="cpf" type="text" value="" autocomplete="off" placeholder="CPF">
                                    </div>
                                    <div class="pj">
                                    <label class="col-form-label">CNPJ</label>
                                    <input class="form-control mascara-cnpj" name="cnpj" id="cnpj" type="text" value="" autocomplete="off" placeholder="CNPJ">
                                    </div>

                                  </div>
                                  
                                  </div>
                                  
                           		<div class="form-group row">
                           		 <div class="col-3">
                            		<label>Telefone *</label>
                                     <input onkeypress="$(this).mask('(00) 0000-00009')" type="text" name="celular" id="celular" class="form-control" placeholder="Telefone do Cliente" autocomplete="off" required="required">   
                           		</div>
                           		<div class="col-6">
                            		<label>e-mail*</label>
                                     <input type="text" name="email" id="email" class="form-control" placeholder="email do produto" autocomplete="off" required="required">   
                           		</div>
                           		<div class="col-3">
                            		<label>CEP</label>
                                     <input onkeypress="$(this).mask('00.000-000')" type="text" name="cep" id="cep" class="form-control mascara-cep busca_cep" placeholder="Cep do Cliente" autocomplete="off" >   
                           		</div>
                           		
                           		</div>
                           		
                           		<div class="form-group row">
                           		 <div class="col-5">
                            		<label>Cidade</label>
                                     <input type="text" name="cidade" id="cidade" class="form-control cidade" placeholder="Cidade do Cliente" autocomplete="off" readonly="readonly">   
                           		</div>
                           		<div class="col-1">
                            		<label>UF</label>
                                     <input type="text" name="uf" id="uf" class="form-control estado" placeholder="uf do produto" autocomplete="off" readonly="readonly">   
                           		</div>
                           		<div class="col-6">
                            		<label>Bairro</label>
                                     <input type="text" name="bairro" id="bairro" class="form-control bairro" placeholder="Bairro do Cliente" autocomplete="off" readonly="readonly">   
                           		</div>
                           		
                           		</div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario_solicitou" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                          	<input type="hidden" name="data_pedido" value="<?php echo date('Y-m-d') ?>">
                          	<input type="hidden" name="hora_pedido" value="<?php echo date('H-i') ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" onclick="limparorcamento()">Fechar</button>
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



<!-- Container-fluid starts-->
<div class="container-fluid list-products">

<div class="col-md-12 project-list">
                <div class="card">
                  <form class="needs-validation" action="<?php echo URL_BASE . "cotacao/filtro/"?> method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                      <div class="col-md-4 mb-3">
                        </div>
                        <div class="col-md-1 mb-3">
                        <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="value" data-language="en" name="data_inicio" placeholder="<?php echo $inicioBR; ?>">
                         <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                    
                        </div>
                        <div class="col-md-1 mb-3">
                         <input autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" type="text" data-language="en" name="data_fim" placeholder="<?php echo $fimBR; ?>">
                      		<input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                      		
                      </div>
                        <div class="col-md-2 mb-3">
                          <button class="form-control btn btn-primary" type="submit" style="color:#fff">Filtrar</button>
                        </div>
                      </div>
                      
                      <input type="hidden" name="pesquisar" value="sim">
                    </form>
                </div>
              </div>

<div class="row">
<!-- Individual column searching (text inputs) Starts-->
<div class="col-sm-12">
<div class="card">

<?php
$this->verMsg();
$this->verErro();
?>
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table class="display" id="basic-1">
                        <thead>
                          <tr>
                            <th col style="text-align:center;">ID</th>
                            <th col style="text-align:center;">Data</th>
                            <th col style="text-align:left;">Solicitante</th>
                            <th col style="text-align:left;">Cliente</th>
                            <th col style="text-align:left;">Celular</th>
                            <th col style="text-align:left;">CEP</th>
                            <th col style="text-align:center;">email</th>
                            <th col style="text-align:center;">Produtos</th>
                            <th col style="text-align:center;">Frete</th>
                            <th col style="text-align:center;">Valor Total</th>
                            <th col style="text-align:center;">Ação</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($lista as $cotacao){?>
                          <tr>
                          <td style="text-align:center"><?php echo $cotacao->id_pedido ?></td>
                           <td style="text-align:center"><?php echo date('d/m/Y', strtotime($cotacao->data_pedido))." ".date('H:i', strtotime($cotacao->hora_pedido)); ?></td>
                           <td><?php echo $cotacao->nome_usuario ?></td>
                            <td style="text-align:left"><?php echo $cotacao->nome ?></td>
                            <td style="text-align:left">
                            <?php echo formataTelefone($cotacao->celular) ?>
                            <input id="mensagem" type="hidden" valor="Aqui é da RentalMed?">
                            <script>
                           		function enviarMensagem(){
                                  var celular = <?php echo $cotacao->celular ?>;
                                  
                                  //celular = celular.replace(/\D/g,''); //Deixar apenas números
                                  
                                  //alert(celular);
                                  
                                  //Verificar se tem DDI e adicionar se não tiver
                                  if(celular.length < 13){
                                  	celular = "55" + celular;
                                  }
                                  
                                  var texto = document.querySelector("#mensagem").value;
                                  texto = window.encodeURIComponent(texto);
                                  
                                  let urlApi = "https://web.whatsapp.com/send";
                                  
                                  if(mobileCheck()){
                                  	urlApi = "https://api.whatsapp.com/send";
                                  }
                                  
                                  window.open(urlApi + "?phone=" + celular + "&text=" + texto, "_blank");
                                	//Obs.. use "_system", no lugar de blank, caso você esteja usando Phonegap / Cordova / Ionic ou qualquer um baseado em webview;
                                }
                                
                                function mobileCheck(){
                                  let check = false;
                                  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
                                  return check;
                                }
                           		</script>


                           		<span id="mobile_e"></span>  <a onclick="enviarMensagem()" id="cel" class="" data-js="phone" style="border-radius: 30px;border: 0px;"><i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i> </a> 
                            </td>
                            <td style="text-align:left"><?php echo $cotacao->cep ?></td>
                            <td style="text-align:center"><div class="example-popover" data-container="body<?php echo $cotacao->email ?>" data-bs-toggle="popover" data-bs-placement="left" data-bs-content="<?php echo $cotacao->email ?>"><i data-feather="eye"></i></div></td>
                            <td style="text-align:center"><?php echo $cotacao->qtd_produtos ?></td>
                            <td style="text-align:center"><?php echo number_format($cotacao->frete,2,",","."); ?></td>
                            <td style="text-align:center"><?php echo number_format($cotacao->total,2,",","."); ?></td>
                            <td style="text-align:center">
                            <!-- exclusão
                              <a href="javascript:;" onclick="return excluir(this)" data-entidade ="categoria" data-id="<?php echo $cotacao->id_cotacao ?>" class="btn btn-danger btn-xs" type="button" data-original-title="btn btn-danger btn-xs" title="">Excluir</a>
                            -->
                              
                              <a href="<?php echo URL_BASE ."orcamento/create/".$cotacao->id_pedido ?>" class="btn btn-primary">Detalhe</a>
                              
                            </td>
                          </tr>
                          <!-- Modal Editar-->
                  <div class="modal fade" id="editarCategoria<?php echo $cotacao->id_categoria ?>" tabindex="-1" role="dialog" aria-labelledby="editarCategoria<?php echo $categoria->id_categoria ?>" aria-hidden="true">
                      <div class="modal-dialog" role="document">

                       <form action="<?php echo URL_BASE . "categoria/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                              
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar Categoria</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="card-body">
                      

                          <div class="mb-3">
                            <label class="col-form-label">Nome da Categoria</label>
                            <input  class="form-control" name="categoria" type="text" placeholder="Nome da Categoria" value="<?php echo $categoria->categoria ?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Nome Abreviado da Categoria</label>
                            <input  class="form-control" name="abreviatura" type="text" placeholder="Nome Abreviado da Categoria" value="<?php echo $categoria->abreviatura ?>">
                          </div>
                          
                          <div class="mb-3">
                            <label class="col-form-label">Tipo de Receita</label>
                            <input  class="form-control" name="tipo_receita" type="text" placeholder="Tipo de Receita" value="<?php echo $categoria->tipo_receita ?>">
                          </div>

                      </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="volta_produto" value="sim">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancelar</button>
                            <input type="hidden" name="data_cadastro" value="<?php echo date('Y-m-d') ?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <input type="hidden" name="id_categoria" value="<?php echo $categoria->id_categoria ?>">
                            <input type="submit" value="Enviar" class="btn btn-primary">
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                  <!-- Modal Editar-->
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