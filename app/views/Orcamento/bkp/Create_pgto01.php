<?php 
$_SESSION['random'] = rand(0,10000000);
?>

<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<style>
@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
</style>


<div class="page-body">
<link rel="stylesheet" type="text/css" href="<?php echo URL_BASE ?>drop/dropzone/dropzone.css" />
<script type="text/javascript" src="<?php echo URL_BASE ?>drop/dropzone/dropzone.js"></script>
<script>
    window.onload = function () {
        				alert("oi");
            let idPedido = <?php echo $orcamento_pedido->id_pedido; ?>;              
            $.ajax({
    			url: '<?php echo URL_BASE ?>app/views/orcamento/controller/pedidos.php',  
    			type: 'POST',
    			dataType: 'json',
    			data: {id:idPedido},
    			success: function(result){
    				$('#n_pedido').append(result.nome);
    				let data_ing_entrega = result.data_entrega_prevista;
    				let data_brasileira_entrega = data_ing_entrega.split('-').reverse().join('/');
    				$("#data_entrega_prevista").val(data_brasileira_entrega);
    				let e_comprador = result.comprador;
                    if(e_comprador == "s"){
                    $("input[name=comprador][value='s']").prop("checked",true);
                    
                    				$("#id_comprador").val(result.id_cliente);
                    				$("#nome_comprador").val(result.nome);
                    				$("#cpf_comprador").val(result.cpf);
                    				$("#rg_comprador").val(result.rg);
                    				$("#cnpj_comprador").val(result.cnpj);
                    				$("#iestadual_comprador").val(result.iestadual);
                    				$("#imunicipal_comprador").val(result.imunicipal);
                    				$("#celular_comprador").val(result.celular);
                    				$("#email_comprador").val(result.email);
                    				$("#telefone_comprador").val(result.telefone);
                    				$("#data_nascimento").val(result.data_nascimento);
									let id_comprador = result.id_comprador;
                                    if(id_comprador != null){
                                     $("#validar").show();
                                     }
                    				
                    				let e_pf_pj = result.pf_pj;
                    				//alert(e_pf_pj);
                                    if(e_pf_pj== "pf"){
                                    $("input[name=pf_pj][value='pf']").prop("checked",true);
                                    $("input[name=pf_pj][value='pj']").prop("checked",false);
                                    
                                     $("#pf").show(); 
                                     $("#rg").show(); 
                                     
                                     $("#pj").hide();
                                     $("#ie").hide();
                                     $("#im").hide();
                                    } else {
                                     $("input[name=pf_pj][value='pf']").prop("checked",false);
                                     $("input[name=pf_pj][value='pj']").prop("checked",true);
                                    
                                     $("#pj").show(); 
                                     $("#ie").show();
                                     $("#im").show();
                                     
                                     $("#pf").hide();   
                                     $("#rg").hide(); 
                                    };
                    				
                    
                    } else {
                    $("input[name=comprador][value='s']").prop("checked",false);
                    };
    				console.log(result);
    			}
			});
			
			//leitura do pagamento 01
			
			 $.ajax({
    			url: '<?php echo URL_BASE ?>app/views/orcamento/controller/pedidospagamentos.php',  
    			type: 'POST',
    			dataType: 'json',
    			data: {id:idPedido, id_forma: 1},
    			success: function(result){
    				let res = result.primeiro;
    				$("#id_pedido_pagamento01").val(result.id_pedido_pagamento);
    				

    				$("#forma_pagamento01").val(result.id_forma_pagamento);
    				$("#banco_pagamento01").val(result.id_banco);
    				if(result.valor_apagar){
    				let vpagar = result.valor_apagar;
    				$("#valor_pgto01").val(parseFloat(vpagar).toFixed(2).replace(".", ","));
    				}
    				
    				
    				
    				$("#taxa01").val(result.taxa); 
    				let data_ing = result.data_pagamento;
    				let data_brasileira = data_ing.split('-').reverse().join('/');
    				$("#primeira_parcela01").val(data_brasileira);
    				//let anexo01 = result.anexo;
    				$("#arquivoanexo01").val(anexo01);
    				if(result.anexo) {
    				$("#anexo01ver").show();
    				}
 
    				
    				
    				if(result.id_pedido_pagamento){  
    				 
    				 	 let total_pgto01str = document.querySelector('#valor_pgto01').value;
                      	 let total_somadostr = $("#total_somado").html();                      
                         let total_pgto01 	= total_pgto01str.replace('.', '').replace(',', '.');
                         let total_somado 	= total_somadostr.replace('.', '').replace(',', '.');
    				  	 var restante02 = parseFloat(total_somado.replace(',', '.')) - parseInt(total_pgto01);
                      	 document.getElementById("total_restante02").innerHTML = parseFloat(restante02).toFixed(2).replace(".", ",");
                      	 
                      	 
                      	 let datap01 = data_brasileira;
                      	 let forma01 = result.nparcelas;
                      	 let parcela01 = parseInt(total_pgto01)/parseInt(forma01);
                      	 //alert(parcela01);
                         	for (i = 1; i <= forma01; i++) {		
							 
                    		 document.getElementById("parcelas_01").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela01).toFixed(2).replace(".", ",") + " - " + datap01 + " | ";
                    			var datainicial = datap01;
                                var dias = 1;
                                var partes = datainicial.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial = new Date(ano,mes,dia);
                                datafinal = new Date(datainicial);
                                datafinal.setMonth(datainicial.getMonth()+1);
                                
                                var dd = ("0" + datafinal.getDate()).slice(-2);
                                var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
                                var y = datafinal.getFullYear();
                                
                                var dataformatada = dd + '/' + mm + '/' + y;
                                datap01 = dataformatada;
 							   // criar um if para descartar feriados e finais de semana
 							   
 							   
                    		}
                      	 
                      	 
                      	 $("#pagamento_02").show();
    				}
    				
    				let selFormaPagamento = result.id_forma_pagamento;
    				let nParcelas = document.querySelector('#nvezes01');
    				$.ajax({
        			url: '<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',  
        			type: 'POST',
        			dataType: 'json',
        			data: {formadepagamento:selFormaPagamento},
        			success: function(resultado){
					let maxParcelas = resultado.parcela_max;  
					let obrigatorio = resultado.obrigatorio; 
 
              		if(obrigatorio == "a"){
              		$("#anexo01").show(); 
              		$("#proposta01").hide(); 
              		}
              		
              		if(obrigatorio == "n"){
              		$("#anexo01").hide(); 
              		$("#proposta01").show(); 
              		} 
              				         		
              		nParcelas.options.length = 0;
                   for (let i = 0; i<maxParcelas; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas.appendChild(opt);
                    }
                    nParcelas.removeAttribute('disabled'); 

    				console.log(resultado);
    			}
			});

    				console.log(result);
    			}
			});
			
			if(document.querySelector('#forma_pagamento01')){	
                	
              	let selFormaPagamento = document.querySelector('#forma_pagamento01');
              	let nParcelas = document.querySelector('#nvezes01');
              	selFormaPagamento.addEventListener('change',async(e)=>{              
              		let reqs = await fetch('<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',{
              			method:'POST',
              			headers:{
              				'Content-Type':'application/x-www-form-urlencoded'
              			},
              			body:`formadepagamento=${selFormaPagamento.value}`
              		});
              		let ress = await reqs.json();
              		let maxParcelas = ress.parcela_max;   
              		
              		let obrigatorio = ress.obrigatorio;  
              		if(obrigatorio == "a"){
              		$("#anexo01").show(); 
              		$("#proposta01").hide(); 
              		}
              		
              		if(obrigatorio == "n"){
              		$("#anexo01").hide(); 
              		$("#proposta01").show(); 
              		}
              		
              		document.getElementById('taxa01').value = ress.taxa;           		
              		nParcelas.options.length = 0;
                   for (let i = 0; i<maxParcelas; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas.appendChild(opt);
                    }
                    nParcelas.removeAttribute('disabled');          
              	});
            }
            
            //forma de pagamento02
            
            $.ajax({
    			url: '<?php echo URL_BASE ?>app/views/orcamento/controller/pedidospagamentos.php',  
    			type: 'POST',
    			dataType: 'json',
    			data: {id:idPedido, id_forma: 2},
    			success: function(result02){
    				let res = result02.primeiro;
    				//alert(result02.id_pedido_pagamento);
    				$("#id_pedido_pagamento02").val(result02.id_pedido_pagamento);
    				$("#forma_pagamento02").val(result02.id_forma_pagamento);
    				$("#banco_pagamento02").val(result02.id_banco);
    				if(result02.valor_apagar){
    				let vpagar02 = result02.valor_apagar;
    				$("#valor_pgto02").val(parseFloat(vpagar02).toFixed(2).replace(".", ","));
    				}
    				
    				
    				    				
    				$("#taxa02").val(result02.taxa); 
    				if(result02.data_pagamento){
    				let data_ing02 = result02.data_pagamento;
    				let data_brasileira02 = data_ing02.split('-').reverse().join('/');
    				$("#primeira_parcela02").val(data_brasileira02);
					}

    				$("#arquivoanexo02").val(anexo02);
    				if(anexo02 != null) {
    				$("#anexo02ver").show(); 
    				} else {
    				$("#anexo02ver").hide(); 
    				}

    				
    				
    				if(result02.id_pedido_pagamento){  
    				 
    				 	 let total_pgto02str 		= document.querySelector('#valor_pgto01').value;
                      	 let total_restante02str 	= $("#total_restante02").html();                      
                         let total_pgto02 			= total_pgto02str.replace('.', '').replace(',', '.');
                         let total_restante02 		= total_restante02str.replace('.', '').replace(',', '.');
    				  	 var restante03 			= parseFloat(total_restante02.replace(',', '.')) - parseInt(total_pgto02);
                      	 document.getElementById("total_restante03").innerHTML = parseFloat(restante03).toFixed(2).replace(".", ",");
                      	 
                      	 
                      	 let datap02 = data_brasileira02;
                      	 let forma02 = result02.nparcelas;
                      	 let parcela02 = parseInt(total_pgto02)/parseInt(forma02);
                      	 //alert(parcela02);
                         	for (i = 1; i <= forma02; i++) {		
							 
                    		 document.getElementById("parcelas_02").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela01).toFixed(2).replace(".", ",") + " - " + datap02 + " | ";
                    			var datainicial02 = datap02;
                                var dias = 1;
                                var partes = datainicial02.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial02 = new Date(ano,mes,dia);
                                datafinal02 = new Date(datainicial02);
                                datafinal02.setMonth(datainicial02.getMonth()+1);
                                
                                var dd = ("0" + datafinal02.getDate()).slice(-2);
                                var mm = ("0" + (datafinal02.getMonth()+1)).slice(-2);
                                var y = datafinal02.getFullYear();
                                
                                var dataformatada02 = dd + '/' + mm + '/' + y;
                                datap02 = dataformatada02;
 							   // criar um if para descartar feriados e finais de semana
                    		}
                      	 
                      	 
                      	 $("#pagamento_03").show();
    				}
    				
    				let selFormaPagamento02 = result02.id_forma_pagamento;
    				let nParcelas02 = document.querySelector('#nvezes02');
    				$.ajax({
        			url: '<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',  
        			type: 'POST',
        			dataType: 'json',
        			data: {formadepagamento:selFormaPagamento02},
        			success: function(resultado02){
					let maxParcelas02 = resultado02.parcela_max;  
					let obrigatorio02 = resultado02.obrigatorio; 
 
              		if(obrigatorio02 == "a"){
              		$("#anexo02").show(); 
              		$("#proposta02").hide(); 
              		}
              		
              		if(obrigatorio02 == "n"){
              		$("#anexo02").hide(); 
              		$("#proposta02").show(); 
              		} 
              				         		
              		nParcelas02.options.length = 0;
                   for (let i = 0; i<maxParcelas02; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas02.appendChild(opt);
                    }
                    nParcelas02.removeAttribute('disabled'); 

    				console.log(resultado02);
    			}
			});

    				console.log(result02);
    			}
			});
			
			// colocar numero de vezes, taxa e arquivo
			if(document.querySelector('#forma_pagamento02')){	
                	
              	let selFormaPagamento = document.querySelector('#forma_pagamento02');
              	let nParcelas = document.querySelector('#nvezes02');
              	selFormaPagamento.addEventListener('change',async(e)=>{              
              		let reqs = await fetch('<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',{
              			method:'POST',
              			headers:{
              				'Content-Type':'application/x-www-form-urlencoded'
              			},
              			body:`formadepagamento=${selFormaPagamento.value}`
              		});
              		let ress = await reqs.json();
              		let maxParcelas = ress.parcela_max;   
              		
              		let obrigatorio = ress.obrigatorio;  
              		if(obrigatorio == "a"){
              		$("#anexo02").show(); 
              		$("#proposta02").hide(); 
              		}
              		
              		if(obrigatorio == "n"){
              		$("#anexo02").hide(); 
              		$("#proposta02").show(); 
              		}
              		
              		document.getElementById('taxa02').value = ress.taxa;           		
              		nParcelas.options.length = 0;
                   for (let i = 0; i<maxParcelas; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas.appendChild(opt);
                    }
                    nParcelas.removeAttribute('disabled');          
              	});
            }
            
            
            // pagamento03
            

            if(document.querySelector('#forma_pagamento03')){	
                	
              	let selFormaPagamento = document.querySelector('#forma_pagamento03');
              	let nParcelas = document.querySelector('#nvezes03');
              	selFormaPagamento.addEventListener('change',async(e)=>{              
              		let reqs = await fetch('<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',{
              			method:'POST',
              			headers:{
              				'Content-Type':'application/x-www-form-urlencoded'
              			},
              			body:`formadepagamento=${selFormaPagamento.value}`
              		});
              		let ress = await reqs.json();
              		let maxParcelas = ress.parcela_max; 
              		
              		let obrigatorio = ress.obrigatorio;  
              		if(obrigatorio == "a"){
              		$("#anexo03").show(); 
              		$("#proposta03").hide(); 
              		}
              		
              		if(obrigatorio == "n"){
              		$("#anexo03").hide(); 
              		$("#proposta03").show(); 
              		}
              		  
              		document.getElementById('taxa03').value = ress.taxa;  
              		document.getElementById('tipo_pgto03').innerHTML = ress.forma;		         		
              		nParcelas.options.length = 0;
                   for (let i = 0; i<maxParcelas; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas.appendChild(opt);
                    }
                    nParcelas.removeAttribute('disabled');          
              	});
            }
            
            if(document.querySelector('#forma_pagamento04')){	
                	
              	let selFormaPagamento = document.querySelector('#forma_pagamento04');
              	let nParcelas = document.querySelector('#nvezes04');
              	selFormaPagamento.addEventListener('change',async(e)=>{              
              		let reqs = await fetch('<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',{
              			method:'POST',
              			headers:{
              				'Content-Type':'application/x-www-form-urlencoded'
              			},
              			body:`formadepagamento=${selFormaPagamento.value}`
              		});
              		let ress = await reqs.json();
              		let maxParcelas = ress.parcela_max;   
              		
              		let obrigatorio = ress.obrigatorio;  
              		if(obrigatorio == "a"){
              		$("#anexo04").show(); 
              		$("#proposta04").hide(); 
              		}
              		
              		if(obrigatorio == "n"){
              		$("#anexo04").hide(); 
              		$("#proposta04").show(); 
              		}
              		
              		document.getElementById('taxa04').value = ress.taxa;  
              		document.getElementById('tipo_pgto04').innerHTML = ress.forma;		         		
              		nParcelas.options.length = 0;
                   for (let i = 0; i<maxParcelas; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas.appendChild(opt);
                    }
                    nParcelas.removeAttribute('disabled');          
              	});
            }
            
            if(document.querySelector('#forma_pagamento05')){	
                	
              	let selFormaPagamento = document.querySelector('#forma_pagamento05');
              	let nParcelas = document.querySelector('#nvezes05');
              	selFormaPagamento.addEventListener('change',async(e)=>{              
              		let reqs = await fetch('<?php echo URL_BASE ?>app/views/orcamento/controller/pedidosformapagamento.php',{
              			method:'POST',
              			headers:{
              				'Content-Type':'application/x-www-form-urlencoded'
              			},
              			body:`formadepagamento=${selFormaPagamento.value}`
              		});
              		let ress = await reqs.json();
              		let maxParcelas = ress.parcela_max;   
              		
              		let obrigatorio = ress.obrigatorio;  
              		if(obrigatorio == "a"){
              		$("#anexo05").show(); 
              		$("#proposta05").hide(); 
              		}
              		
              		if(obrigatorio == "n"){
              		$("#anexo05").hide(); 
              		$("#proposta05").show(); 
              		}
              		
              		document.getElementById('taxa05').value = ress.taxa;  
              		document.getElementById('tipo_pgto05').innerHTML = ress.forma;		         		
              		nParcelas.options.length = 0;
                   for (let i = 0; i<maxParcelas; i++){
                        let opt = document.createElement('option');
                        opt.value = i+1;
                        opt.innerHTML = i+1;
                        nParcelas.appendChild(opt);
                    }
                    nParcelas.removeAttribute('disabled');          
              	});
            }
      }      
      
      
      
  </script>


<div class="container-fluid">
<div class="page-header">
<div class="row">
<div class="col-sm-6">
<h3>Orçamento</h3>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Home</a></li>
<li class="breadcrumb-item active">Orçamento</li>
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
<a href="<?php echo URL_BASE . "orcamento" ?>" class="btn btn-primary"> Orçamentos</a>
</div>
<!-- Bookmark Ends-->

<!– modal de inserção cliente –>

								<style type="text/css">
								.listaClientes1{
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
                                     .listaClientes1 a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                     
                                    .listaClientes1 a:hover {
                                        background: #eee;
                                    }
                       
                           		</style>
                    
                    
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar_cliente" tabindex="-1" role="dialog" aria-labelledby="cadastrar_cliente" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                        <script>
                		function CadastrarComprador(obj){
                    			var id_cliente 	= $("#id_cliente_novo").val();
                    			var id_usuario 	= $("#id_usuario_solicitou").val();
                    			var nome		= $("#nome_novo").val();
                    			var celular_e	= $("#celular_novo").val();
                    			var celular		= parseInt(celular_e.split(/\D+/).join(""), 10);
                    			var telefone_e	= $("#telefone_novo").val();
                    			var telefone	= parseInt(telefone_e.split(/\D+/).join(""), 10);
                    			var email		= $("#email_novo").val();
                    			var cpf			= $("#cpf_novo").val();
                    			var cnpj		= $("#cnpj_novo").val();
                    			var pf_pj		= document.querySelector('input[name="pf_pj_novo"]:checked').value;
                    			
                               
                               if(!document.querySelector("#radio_novo1").checked && !document.querySelector("#radio_novo2").checked ){
                                  $("#mensagem").html("&diams; ESCOLHER PF OU PJ &diams; ");
                                  return false;
                               }
                               
                               if(nome == ""){
                                  $("#mensagem").html("&diams; ESCREVA O NOME DO CLIENTE &diams; ");
                                  document.getElementById("nome_novo").focus()
                                  return false;
                               } else {
                               $("#mensagem").html("");
                               }
                               
                               if(document.querySelector('input[name="pf_pj_novo"]:checked').value == "pf" && cpf == ""){
                                  $("#mensagem").html("&diams; COLOQUE O CPF &diams; ");
                                  document. getElementById("cpf_novo"). focus()
                                  return false;
                               } else {
                               $("#mensagem").html("");
                               }
                               
                               if(document.querySelector('input[name="pf_pj_novo"]:checked').value == "pj" && cnpj == ""){
                                  $("#mensagem").html("&diams; COLOQUE O CNPJ &diams; ");
                                  document. getElementById("cnpj_novo"). focus()
                                  return false;
                               } else {
                               $("#mensagem").html("");
                               }
                               
                               if(celular_e == ""){
                                  $("#mensagem").html("&diams; COLOQUE O NÚMERO DO CELULAR &diams; ");
                                  document.getElementById("celular_novo").focus()
                                  return false;
                               } else {
                               $("#mensagem").html("");
                               }
                               
                               if(telefone_e == ""){
                                  $("#mensagem").html("&diams; COLOQUE O NÚMERO DO TELEFONE &diams; ");
                                  document.getElementById("telefone_novo").focus()
                                  return false;
                               } else {
                               $("#mensagem").html("");
                               }
                               
                               if(email == ""){
                                  $("#mensagem").html("&diams; COLOQUE UM EMAIL VÁLIDO &diams; ");
                                  document.getElementById("email_novo").focus()
                                  return false;
                               } else {
                               $("#mensagem").html("");
                               }

                    			if(id_cliente != ""){
                    			 $("#mensagem").html("&diams; O CLIENTE " + nome + " CLIENTE JÁ EXISTENTE &diams; ");
                    			} else {
                    			
                    			$.ajax({
                    				url: base_url + "cliente/CadastrarComprador/" + id_cliente,  
                    				type: "POST",
                    				data: { pf_pj: pf_pj, nome: nome , celular: celular, telefone: telefone, email: email, cpf: cpf, cnpj: cnpj, id_usuario: id_usuario },
                    				dataType: "json",
                    				success: function(data){
                    				}
                    			});
                    			limparorcamento();
                    			$("#mensagem_cadastro").html("&diams; " + nome + " já se encontra na lista de compradores &diams; ");
                    			}
                        }
                		</script>   
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Comprador</h5>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          </div>
                  			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
                  			 <script type="text/javascript">
                           		$(function(){
                           		$("#nome_novo").on("keyup", function(){
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
                            		  $("#nome_novo").after('<div class="listaClientes1"></div>');
                            	   html = "";
                            		for (z = 0; z < data.length; z++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente1(this)"'
                            		  + 'data-idp="' + data[z].id_cliente + '" data-celular="' + data[z].celular  + ' "data-cep="' + data[z].cep + ' "data-cpf="' + data[z].cpf + ' "data-cnpj="' + data[z].cnpj + ' "data-email="' + data[z].email + ' "data-cidade="' + data[z].cidade + ' "data-uf="' + data[z].uf + ' "data-bairro=" ' + data[z].bairro + ' "data-tipo="' + data[z].pf_pj +
                            		   '" data-nomep="' + data[z].nome + '">' +
                            		  data[z].nome + '</a></div>';
                            		  
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
                                	var celularp = $(obj).attr("data-celular");
                                	var cepp = $(obj).attr("data-cep");
                                	var cpfp = $(obj).attr("data-cpf");
                                	var cnpjp = $(obj).attr("data-cnpj");
                                	var emailp = $(obj).attr("data-email");
                                	
                                	$(".listaClientes1").hide();
                                	$("#nome_novo").val(nomep);
                                	$("#cliente_novo").val(nomep);
                                	$("#id_cliente_novo").val(idp);
                                	$("#celular_novo").val(celularp).mask('(00) 0000-00009');
                                	$("#email_novo").val(emailp);
                                	

                                	
									var tipo_novo = $(obj).attr("data-tipo");
                                	//alert(tipo);
                                	
                                     if(tipo_novo == "pf") {
                                	    $(".pf_novo").show();
                                        $(".pj_novo").hide();
                                        $("input[name=pf_pj_novo][value='pf']").prop("checked",true);
                                     } else {}
                                     
                                     if(tipo_novo == "pj") {
                                	    $(".pj_novo").show();
                                        $(".pf_novo").hide();
                                        $("input[name=pf_pj_novo][value='pj']").prop("checked",true)
                                     } else {}
                                	
                                	 if (isNaN(cpfp)) {
                                     } else {
                                     $("#cpf_novo").val(cpfp).mask('000.000.000-00');
                                     }
                                     
                                     if (isNaN(cnpjp)) {
                                     } else {
                                     $("#cnpj_novo").val(cnpjp).mask('00.000.000/0000-00');
                                     }
                                     
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                                
                                function limparorcamento(){
                            		$("#nome_novo").val("");
                                	$("#cliente_novo").val("");
                                	$("#id_cliente_novo").val("");
                                	$("#celular_novo").val("").mask('(00) 0000-00009');
                                	$("#email_novo").val("");
                                	$("#telefone_novo").val("");
                                	$("#cpf_novo").val("");
                                	$("#cnpj_novo").val("");
                                	$("#mensagem").html("");
                            	}
                           		</script>
                           		<div class="form-group row">
                           		
                           		 <div class="col-2">
                                   <div class="radio radio-primary">
                                    <input <?php if (!(strcmp($cliente->pf_pj,"pf"))) {echo "checked=\"checked\"";} ?> id="radio_novo1" type="radio" name="pf_pj_novo" value="pf" required="required">
                                    <label class="mb-0" for="radio_novo1">P Física</label>
                                  </div>
                                  <div class="radio radio-primary" style="margin-top:5px">
                                    <input <?php if (!(strcmp($cliente->pf_pj,"pj"))) {echo "checked=\"checked\"";} ?> id="radio_novo2" type="radio" name="pf_pj_novo" value="pj" required="required">
                                    <label class="mb-0" for="radio_novo2">P Jurídica</label>
                                  </div>
                                   </div>
                           		
                           		<div class="col-7">
                                    <label class="col-form-label">Nome do Cliente / Razão Social *</label>
                                    <input type="hidden" id="id_cliente_novo" name="id_cliente_novo" value="" class="form-control">
                                    <input  class="form-control" name="nome_novo" id="nome_novo" type="text" value="" autocomplete="off" placeholder="Nome do Cliente" required="required">
                                  </div>
                                  
                                  	<style>
                                      .pf_novo {
                                        display: none;
                                      }
                                    
                                      .pj_novo {
                                        display: none;
                                      }
                
                                    </style>
                                  <script> 
                                  $("input:radio[name=pf_pj_novo]").on("change", function () {   
                                        if($(this).val() == "pf")
                                        {
                                            $(".pf_novo").show(); 
                                            $(".pj_novo").hide();
                                        }
                                        else if($(this).val() == "pj")
                                        {
                                            $(".pj_novo").show(); 
                                            $(".pf_novo").hide();   
                                        }
                            		});
                                  </script>
                                    <div class="col-3">
                                    <div class="pf_novo">

                                    <label class="col-form-label">CPF</label>
                                    <input onkeypress="$(this).mask('000.000.000-00');" class="form-control" name="cpf_novo" id="cpf_novo" type="text" value="" autocomplete="off" placeholder="CPF">

                                    </div>
                                    
                                    <div class="pj_novo">
   
                                     <label class="col-form-label">CNPJ</label>
                                    <input class="form-control mascara-cnpj" name="cnpj_novo" id="cnpj_novo" type="text" value="" autocomplete="off" placeholder="CNPJ">
                                  	</div>
                                  	</div>
                                  	
                                  	</div>
                                  
                           		<div class="form-group row">
                           		 <div class="col-3">
                            		<label>Celular *</label>
                                     <input onkeypress="$(this).mask('(00) 0000-00009')" type="text" name="celular_novo" id="celular_novo" class="form-control mascara-telefone" placeholder="Celular do Cliente" autocomplete="off" required="required">   
                           		</div>
                           		<div class="col-3">
                            		<label>Telefone</label>
                                     <input onkeypress="$(this).mask('(00) 0000-00009')" type="text" name="telefone_novo" id="telefone_novo" class="form-control mascara-telefone" placeholder="Telefone do Cliente" autocomplete="off" >   
                           		</div>
                           		<div class="col-6">
                            		<label>e-mail*</label>
                                     <input type="text" name="email_novo" id="email_novo" class="form-control" placeholder="email do produto" autocomplete="off" required="required">   
                           		</div>

                           		</div>

                                 
                           </div>
                          <div class="modal-footer">
                          	<small id="mensagem" style="color:#FF0000;text-align:left"></small><small id="mensagem_cadastro" style="color:#009933;text-align:left"></small>
                          	<input type="hidden" name="id_usuario_solicitou" id="id_usuario_solicitou"   value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" onclick="limparorcamento()">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent" onClick="return CadastrarComprador()">Salvar</button>
                          </div>
                        </div>
                      </div>
                    </div>
            <!-- Modal Inserir-->

</div>
</div>
</div>
</div>

        <!-- Container-fluid starts-->
		<div class="container-fluid list-products">
		
		
		 <!– validar campos –>
              
              <script>
              //abertura da validação de dados
              function Mudarestado(el) {              		
                $("#fazer_pedido").hide();
                $("#validar").fadeIn(1000);    
              }
              </script>
              
              <style>
              #validar {
               display: none;
              }
              </style>
              
              <div id="validar">
              
              <div class="col-md-12 project-list">
                <div class="card">

               
                <div class="card-header">
                    <h5>CONFIRMAÇÃO DOS DADOS DO PEDIDO # <span id="id_pedido"><?php echo $orcamento_pedido->id_pedido; ?></span> </h5>
                  </div>
                
                      <div class="row g-3">
                      
                <form name='formPedido' id='formPedido' method='post'>      
                <div id="dados_cliente" class="row g-2">   
                
                		<script>
                		function AtualizaCliente(obj){
                    			var id_cliente 	= $("#id_cliente").val();
                    			var nome		= $("#nome").val();
                    			var celular_e	= $("#celular").val();
                    			var celular		= parseInt(celular_e.split(/\D+/).join(""), 10);
                    			var email		= $("#email").val();
                    			var cpf			= $("#cpf").val();
                    			var cnpj		= $("#cnpj").val();
                    			
                    			$.ajax({
                    				url: base_url + "cliente/AtualizaCliente/" + id_cliente,  
                    				type: "POST",
                    				data: { id_cliente: id_cliente, nome: nome , celular: celular, email: email, cpf: cpf, cnpj: cnpj },
                    				dataType: "json",
                    				success: function(data){
                    				}
                    			});
                        }
                		</script>   

                        <div class="col-md-3 mb-3">
                        <input type="hidden" name="id_cliente" id="id_cliente"  value="<?php echo $orcamento_pedido->id_cliente; ?>"    class="form-control ">
                      <span style="h6 txt-grey"><small>NOME [CLIENTE]</small></span>
 					  <input type="text" name="nome" id="nome"  value="<?php echo $orcamento_pedido->nome; ?>"    class="form-control" onchange="AtualizaCliente(this)">
                      </div>

                       <div class="col-md-1 mb-3">
                       <span style="h6 txt-grey"><small>CELULAR</small></span>
 					   <input type="text" name="celular" id="celular"  value="<?php echo $orcamento_pedido->celular; ?>"    class="form-control  mascara-celular" onchange="AtualizaCliente(this)">  
                        </div>
                         
                        <div class="col-md-3 mb-3">
                        <span style="h6 txt-grey"><small>EMAIL</small></span>
                        <input type="text" name="email" id="email"  value="<?php echo $orcamento_pedido->email; ?>"    class="form-control mascara-email" onchange="AtualizaCliente(this)">
                        </div>
                        
                        <?php if($orcamento_pedido->pf_pj == "pf"){; ?>
                        
                        <div class="col-md-2 mb-3">
                        <span style="h6 txt-grey"><small>CPF</small></span>
                        <input type="text" name="cpf" id="cpf"  value="<?php echo $orcamento_pedido->cpf; ?>"    class="form-control mascara-cpf" onchange="AtualizaCliente(this)">
                      	</div>
                      	
                      	<?php } else { ?>
                      	
                      	<div class="col-md-2 mb-3">
                        <span style="h6 txt-grey"><small>CNPJ</small></span>
                        <input type="text" name="cnpj" id="cnpj"  value="<?php echo $orcamento_pedido->cnpj; ?>"    class="form-control mascara-cnpj" onchange="AtualizaCliente(this)">
                      	</div>
                      	
                      	<?php } ?>
                        
                      <script>
                      	function mudar(obj){
                        var selecionado = obj.checked;
                        if (selecionado) {
                            let idCliente = $("#id_cliente").val();           
                            $.ajax({
                    			url: '<?php echo URL_BASE ?>app/views/orcamento/controller/clientes.php',  
                    			type: 'POST',
                    			dataType: 'json',
                    			data: {id:idCliente},
                    			success: function(result){
                    				$("#id_comprador").val(result.id_cliente);
                    				$("#nome_comprador").val(result.nome);
                    				$("#cpf_comprador").val(result.cpf);
                    				$("#rg_comprador").val(result.rg);
                    				$("#cnpj_comprador").val(result.cnpj);
                    				$("#iestadual_comprador").val(result.iestadual);
                    				$("#imunicipal_comprador").val(result.imunicipal);
                    				$("#celular_comprador").val(result.celular);
                    				$("#email_comprador").val(result.email);
                    				$("#telefone_comprador").val(result.telefone);
                    				$("#data_nascimento").val(result.data_nascimento);
                    				
                    				let sexo_e = result.sexo;
                    				//alert(sexo_e);
                                    if(sexo_e== "m"){
                                    $("input[name=sexo][value='m']").prop("checked",true);
                                    $("input[name=sexo][value='f']").prop("checked",false);
                                    } else {
                                    $("input[name=sexo][value='f']").prop("checked",true);
                                    $("input[name=sexo][value='m']").prop("checked",false);
                                    };
                    				
                    				let e_pf_pj = result.pf_pj;
                    				//alert(e_pf_pj);
                                    if(e_pf_pj== "pf"){
                                    $("input[name=pf_pj][value='pf']").prop("checked",true);
                                    $("input[name=pf_pj][value='pj']").prop("checked",false);
                                    
                                     $("#pf").show(); 
                                     $("#rg").show(); 
                                     
                                     $("#pj").hide();
                                     $("#ie").hide();
                                     $("#im").hide();
                                    } else {
                                     $("input[name=pf_pj][value='pf']").prop("checked",false);
                                     $("input[name=pf_pj][value='pj']").prop("checked",true);
                                    
                                     $("#pj").show(); 
                                     $("#ie").show();
                                     $("#im").show();
                                     
                                     $("#pf").hide();   
                                     $("#rg").hide(); 
                                    };
                                    
                                    $("#novo_cliente").hide();
                                    
                                    var id_comprador 	= $("#id_cliente").val();
                                    var id_pedido		= $("#id_pedido").html();
                                    var comprador		= "s";
                                    
                        			$.ajax({
                        				url: base_url + "orcamento/AtualizaClientePedido/" + id_pedido,  
                        				type: "POST",
                        				data: { id_comprador: id_comprador, comprador, id_pedido: id_pedido  },
                        				dataType: "json",
                        				success: function(data){
                        				}
                        			});
                    				
                    				
                    				console.log(result);
                    			}
                			});
                            
                        } else { 
                        			$("#id_comprador").val("");
                    				$("#nome_comprador").val("");
                    				$("#cpf_comprador").val("");
                    				$("#rg_comprador").val("");
                    				$("#cnpj_comprador").val("");
                    				$("#iestadual_comprador").val("");
                    				$("#imunicipal_comprador").val("");
                    				$("#celular_comprador").val("");
                    				$("#email_comprador").val("");
                    				$("#telefone_comprador").val("");
                    				$("#data_nascimento").val("");
                    				 $("#novo_cliente").show();
                        }
						}
                      </script>
                      
                      <div class="col-md-2 mb-3">
                        <span style="h6 txt-grey"><small>REPETIR P/ COMPRADOR</small></span>
                       <div class="media">
                       
                                <label class="switch">
                                    <input type="checkbox" name="comprador" name="comprador" value="s" onchange="mudar(this);"><span class="switch-state" ></span> 
                                </label>
                                <label class="col-form-label m-r-10" style="padding-left:3px">SIM</label>
                            </div>
                       </div>
                      
                   </div>
                      
                   <div class="row g-2" id="dados_comprador">  
                   
                   <style type="text/css">
								.listaClientes{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:10px;
                                    	top:55px;
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
					  			<script type="text/javascript">
    					  			$(function(){
                               		$("#nome_comprador").on("keyup", function(){
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
                                		  $("#nome_comprador").after('<div class="listaClientes"></div>');
                                	   html = "";
                                		for (p = 0; p < data.length; p++) {		  
                                		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente(this)"'
                                		  +'data-idp="'+data[p].id_cliente+'"data-celular="'+data[p].celular+'"data-cpf="'+data[p].cpf+'"data-rg="'+data[p].rg+'"data-cnpj="'+data[p].cnpj+'"data-ie="'+data[p].iestadual+'"data-im="'+data[p].imunicipal+'"data-email="'+data[p].email+
                                		  '"data-nascimento="'+ data[p].data_nascimento+'"data-sexo="'+ data[p].sexo+
                                		  '"data-tipo="'+data[p].pf_pj+
                                		  '"data-cep="'+data[p].cep+'"data-cidade="'+data[p].cidade+'"data-uf="'+data[p].cidade+'"data-bairro="'+data[p].bairro+'"data-endereco="'+data[p].endereco+'"data-numero="'+data[p].numero+'"data-complemento="'+data[p].complemento+
                                		   '"data-cep_cobranca="'+data[p].cep_cobranca+'"data-cidade_cobranca="'+data[p].cidade_cobranca+'"data-uf_cobranca="'+data[p].uf_cobranca+'"data-bairro_cobranca="'+data[p].bairro_cobranca+'"data-endereco_cobranca="'+data[p].endereco_cobranca+'"data-numero_cobranca="'+data[p].numero_cobranca+'"data-complemento_cobranca="'+data[p].complemento_cobranca+
                                	
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
                                	var cpfp = $(obj).attr("data-cpf");
                                	var rgp = $(obj).attr("data-rg");
                                	var cnpjp = $(obj).attr("data-cnpj");
                                	var iep = $(obj).attr("data-ie");
                                	var imp = $(obj).attr("data-im");
                                	var nascimentop = $(obj).attr("data-nascimento");
                                	var sexop = $(obj).attr("data-sexo");
                                	var emailp = $(obj).attr("data-email");
                                	
                                	//endereço de entrega
                                	
                                	var cepp = $(obj).attr("data-cep");
                                	var cidadep = $(obj).attr("data-cidade");
                                	var ufp = $(obj).attr("data-uf");
                                	var bairrop = $(obj).attr("data-bairro");
                                	var enderecop = $(obj).attr("data-endereco");
                                	var numerop = $(obj).attr("data-numero");
                                	var complementop = $(obj).attr("data-complemento");
                                	
                                	//endereço de cobrança
                                	
                                	var cep_cobrancap = $(obj).attr("data-cep_cobranca");
                                	var cidade_cobrancap = $(obj).attr("data-cidade_cobranca");
                                	var uf_cobrancap = $(obj).attr("data-uf_cobranca");
                                	var bairro_cobrancap = $(obj).attr("data-bairro_cobranca");
                                	var endereco_cobrancap = $(obj).attr("data-endereco_cobranca");
                                	var numero_cobrancap = $(obj).attr("data-numero_cobranca");
                                	var complemento_cobrancap = $(obj).attr("data-complemento_cobranca");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#nome_comprador").val(nomep);
                                	$("#id_comprador").val(idp);
                                	$("#cpf_comprador").val(cpfp);
                                	$("#rg_comprador").val(rgp);
                                	$("#iestadual").val(iep);
                                	$("#imunicipal").val(imp);
                                	$("#cnpj_comprador").val(cnpjp);
                                	$("#celular_comprador").val(celularp).mask('(00) 0000-00009');
                                	$("#email_comprador").val(emailp);
                                	
                                	//endereco entrega
                                	
                                	$("#cidade").val(cidadep);
                                	                                	$("#estado").val(ufp);
                                	$("#bairro").val(bairrop);
                                	$("#endereco").val(enderecop);
                                	$("#numero").val(numerop);
                                	$("#complemento").val(complementop);   
                                	
                                	//endereco cobrança         
                                	
                                	$("#cidade_cobranca").val(cidade_cobrancap);
                                	$("#estado_cobranca").val(uf_cobrancap);
                                	$("#bairro_cobranca").val(bairro_cobrancap);
                                	$("#endereco_cobranca").val(endereco_cobrancap);
                                	$("#numero_cobranca").val(numero_cobrancap);
                                	$("#complemento_cobranca").val(complemento_cobrancap)
                    	
                                	
                                	var nascimentobr = nascimentop.split('-').reverse().join("/");
                                	$("#data_nascimento").val(nascimentobr);
                                	
									var sexo = $(obj).attr("data-sexo");
                                	//alert(tipo);
                                	
                                     if(sexo == "f") {
                                        $("input[name=sexo][value='f']").prop("checked",true);
                                     } else {}
                                     if(sexo == "m") {
                                        $("input[name=sexo][value='m']").prop("checked",true)
                                     } else {}
                                	
									var tipo = $(obj).attr("data-tipo");
                                	//alert(tipo);
                                	
                                     if(tipo == "pf") {
                                	    $("#pf").show();
                                        $("#pj").hide();
                                        $("input[name=pf_pj][value='pf']").prop("checked",true);
                                     } else {}
                                     
                                     if(tipo == "pj") {
                                	    $("#pj").show();
                                        $("#pf").hide();
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
                                     
                                     if (isNaN(cep_cobrancap)) {
                                     } else {
                                     $("#cep_cobranca").val(cep_cobrancap).mask('00.000-000');
                                     }
                                     
                                	alert('O cliente '+ nomep +' já existe, pode escolher como comprador!');
                                	$("#novo_cliente").hide();
                                	$('#exampleModalCliente').modal('hide'); 
                                }
                                
                           		</script>
                           		 <style>
                                  #novo_cliente {
                                   display: none;
                                  }
                                  </style>
					  
                      <div class="col-md-3 mb-3">
                      <span style="h6 txt-grey"><small>NOME [COMPRADOR]</small> </span> <a id="novo_cliente" data-bs-toggle="modal" data-bs-target="#cadastrar_cliente" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a> 
                      <input type="hidden" name="id_comprador" id="id_comprador"  value="<?php echo $orcamento_pedido->id_comprador; ?>"    class="form-control ">
 					  <input type="text" name="nome_comprador" id="nome_comprador"  value=""    class="form-control">
                    
                        </div>

                        <div class="col-md-1 mb-3">
                        <span style="h6 txt-grey"><small>PF</small></span>
                                   <div class="radio radio-primary" style="margin-top:5px">
                                    <input <?php if (!(strcmp($orcamento_pedido->pf_pj,"pf"))) {echo "checked=\"checked\"";} ?> id="radioinline1" type="radio" name="pf_pj" value="pf" required="required">
                                    <label class="mb-0" for="radioinline1">P FÍSICA</label>
                                  </div>
                        </div>
                         <div class="col-md-1 mb-3">
                        <span style="h6 txt-grey"><small>PJ</small></span>
                                  <div class="radio radio-primary" style="margin-top:5px">
                                    <input <?php if (!(strcmp($orcamento_pedido->pf_pj,"pj"))) {echo "checked=\"checked\"";} ?> id="radioinline2" type="radio" name="pf_pj" value="pj" required="required">
                                    <label class="mb-0" for="radioinline2">P JURÍDICA</label>
                                  </div>
                        </div>
                        
                        <style>
                         #pf {
                          display: none;
                         }
                                            
                        #pj {
                        display: none;
                        }
                        #rg {
                        display: none;
                        }
                        #ie {
                        display: none;
                        }
                        #im {
                        display: none;
                        }
                        </style>
                        
                        <script> 
                          $("input:radio[name=pf_pj]").on("change", function () {   
                            if($(this).val() == "pf")
                            {
                             $("#pf").show(); 
                             $("#rg").show(); 
                             
                             $("#pj").hide();
                             $("#ie").hide();
                             $("#im").hide();
                             }
                             else if($(this).val() == "pj")
                             {
                             $("#pj").show(); 
                             $("#ie").show();
                             $("#im").show();
                             
                             $("#pf").hide();   
                             $("#rg").hide(); 
                             }
                           });
                       </script>
                       
                       
                       <script>
                		function salvar_dados_comprador(obj){
                    			var id_comprador 		= $("#id_comprador").val();
                    			var id_usuario 	 		= $("#id_usuario_solicitou").val();
                    			var nome_comprador		= $("#nome_comprador").val();
                    			var celular_e	 		= $("#celular_comprador").val();
                    			var celular_comprado	= parseInt(celular_e.split(/\D+/).join(""), 10);
                    			var telefone_e	 		= $("#telefone_comprador").val();
                    			var telefone_comprado	= parseInt(telefone_e.split(/\D+/).join(""), 10);
                    			var email_comprado		= $("#email_comprador").val();
                    			var cpf_comprado		= $("#cpf_comprador").val();
                    			var rg_comprado			= $("#rg_comprador").val();
                    			var ie_comprado			= $("#iestadual").val();
                    			var im_comprado			= $("#imunicipal").val();
                    			var cnpj_comprado		= $("#cnpj_comprador").val();
                    			var pf_pj		 		= document.querySelector('input[name="pf_pj"]:checked').value;
                    			var data_nascimento 	= $("#data_nascimento").val();
                    			var sexo		 		= document.querySelector('input[name="sexo"]:checked').value;
                    			var entrega_cobranca	= document.querySelector('input[entrega_cobranca="s"]:checked').value;
                    			
                    			
                    			//endereço de entrega
                    			var cep 		= $("#cep").val();
                    			var cidade 		= $("#cidade").val();
                    			var estado 		= $("#estado").val();
                    			var endereco 	= $("#endereco").val();
                    			var bairro 		= $("#bairro").val();
                    			var numero	 	= $("#numero").val();
                    			var complemento	= $("#complemento").val();
                    			
                    			//endereço de faturamento
                    			var cep_cobranca 		= $("#cep_cobranca").val();
                    			var cidade_cobranca 	= $("#cidade_cobranca").val();
                    			var estado_cobranca 	= $("#estado_cobranca").val();
                    			var endereco_cobranca 	= $("#endereco_cobranca").val();
                    			var bairro_cobranca 	= $("#bairro_cobranca").val();
                    			var numero_cobranca	 	= $("#numero_cobranca").val();
                    			var complemento			= $("#complemento_cobranca").val();
                               
                               if(!document.querySelector("#radio1").checked && !document.querySelector("#radio2").checked ){
                                  $("#mensagem_comprador").html("&diams; ESCOLHER PF OU PJ &diams; ");
                                  return false;
                               }
                               
                               if(nome_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; ESCREVA O NOME DO CLIENTE &diams; ");
                                  document.getElementById("nome_comprador").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               //validar cpf
                               
                               if(document.querySelector('input[name="pf_pj"]:checked').value == "pf" && cpf == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE O CPF &diams; ");
                                  document. getElementById("cpf_comprador"). focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(document.querySelector('input[name="pf_pj"]:checked').value == "pf" && rg == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE O CPF &diams; ");
                                  document. getElementById("rg_comprador"). focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               //validar cnpj
                               
                               if(document.querySelector('input[name="pf_pj"]:checked').value == "pj" && cnpj == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE O CNPJ &diams; ");
                                  document. getElementById("cnpj_comprador"). focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                                if(document.querySelector('input[name="pf_pj"]:checked').value == "pj" && iestadual == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE INSCRIÇÃO ESTADUAL &diams; ");
                                  document. getElementById("iestadual"). focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                                if(document.querySelector('input[name="pf_pj"]:checked').value == "pj" && imunicipal == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE A INSCRIÇÃO MUNICIPAL &diams; ");
                                  document. getElementById("imunicipal"). focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               //validar contatos
                               
                               if(celular_e == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE O NÚMERO DO CELULAR &diams; ");
                                  document.getElementById("celular_comprador").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(telefone_e == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE O NÚMERO DO TELEFONE &diams; ");
                                  document.getElementById("telefone_comprador").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(email_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM EMAIL VÁLIDO &diams; ");
                                  document.getElementById("email_comprador").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               //validar endereço de entrega
                               
                               if(cep_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM CEP VÁLIDO &diams; ");
                                  document.getElementById("cep_entrega").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(cidade_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UMA CIDADE &diams; ");
                                  document.getElementById("cidade_entrega").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(uf_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM ESTADO &diams; ");
                                  document.getElementById("uf_entrega").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(bairro_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM BAIRRO &diams; ");
                                  document.getElementById("bairro_entrega").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(numero_entrega == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM NÍMERO &diams; ");
                                  document.getElementById("numero_entrega").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               
                               //validar endereço de faturamento
                               
                               
                                if(cep_cobranca == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM CEP VÁLIDO &diams; ");
                                  document.getElementById("cep_cobranca").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(cidade_cobranca == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UMA CIDADE &diams; ");
                                  document.getElementById("cidade_cobranca").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(uf_cobranca == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM ESTADO &diams; ");
                                  document.getElementById("uf_cobranca").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(bairro_cobranca == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM BAIRRO &diams; ");
                                  document.getElementById("bairro_cobranca").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }
                               
                               if(numero_cobranca == ""){
                                  $("#mensagem_comprador").html("&diams; COLOQUE UM NÍMERO &diams; ");
                                  document.getElementById("numero_cobranca").focus()
                                  return false;
                               } else {
                               $("#mensagem_comprador").html("");
                               }

                    			
                    			$.ajax({
                    				url: base_url + "cliente/AtualizarComprador/" + id_cliente,  
                    				type: "POST",
                    				data: { pf_pj: pf_pj, nome: nome , celular: celular, telefone: telefone, email: email, 
                    						cpf: cpf, rg: rg, cnpj: cnpj, ie: ie, im: im, sexo: sexo, 
                    						data_nascimento: data_nascimento, id_usuario: id_usuario
                    						 cep: cep, cidade: cidade, estado: estado, endereco: endereco, bairro: bairro, numero: numero, complemento: complemento,
                    						 cep_cobranca: cep_cobranca, cidade_cobranca: cidade_cobranca, estado_cobranca: estado_cobranca, endereco_cobranca: endereco_cobranca, bairro_cobranca: bairro_cobranca, numero_cobranca: numero_cobranca, complemento_cobranca: complemento_cobranca
                    						 },
                    				dataType: "json",
                    				success: function(data){
                    				}
                    			});
                        }
                        
                		</script>   

                        <div class="col-md-2 mb-3" id="pf">
                        <span style="h6 txt-grey"><small>CPF [COMPRADOR]</small></span>
                        <input onkeypress="$(this).mask('000.000.000-00');" type="text" name="cpf_comprador" id="cpf_comprador"  value="<?php echo $orcamento_pedido->cpf_comprador; ?>"  placeholder="Digite aqui..."  class="form-control mascara-cpf">
                      </div>
                      <div class="col-md-2 mb-3" id="pj">
                        <span style="h6 txt-grey"><small>CNPJ [COMPRADOR]</small></span>
                        <input onkeypress="$(this).mask(''00.000.000/0000-00');" type="text" name="cnpj_comprador" id="cnpj_comprador"  value="<?php echo $orcamento_pedido->cnpj_comprador; ?>"  placeholder="Digite aqui..."  class="form-control mascara-cnpj">
                      </div>
                      <div class="col-md-2 mb-3" id="rg">
                        <span style="h6 txt-grey"><small>RG [COMPRADOR]</small></span>
                        <input type="text" name="rg" id="rg_comprador"  value="<?php echo $orcamento_pedido->rg; ?>" class="form-control" placeholder="Digite aqui...">
                      </div>
                      <div class="col-md-2 mb-3" id="ie">
                        <span style="h6 txt-grey"><small>INS. ESTADUAL [COMPRADOR]</small></span>
                        <input type="text" name="iestadual" id="iestadual"  value="<?php echo $orcamento_pedido->iestadual; ?>" class="form-control" placeholder="Digite aqui...">
                        </div>
                      <div class="col-md-2 mb-3" id="im">
                        <span style="h6 txt-grey"><small>INS. MUNICIPAL [COMPRADOR]</small></span>
                        <input type="text" name="imunicipal"  id="imunicipal" value="<?php echo $orcamento_pedido->imunicipal; ?>" class="form-control" placeholder="Digite aqui...">
                      </div>
                      
                   </div>
                      
                      <!– CONTATOS –>
                       <div class="row g-2" id="dados_contato">   
                       
                      	<div class="col-md-1 mb-3">
                       <span style="h6 txt-grey"><small>CELULAR</small></span>
 					   <input type="text" name="celular_comprador" id="celular_comprador"  value="<?php echo $orcamento_pedido->celular_comprador; ?>"    class="form-control mascara-celular">  
                        </div>
                         <div class="col-md-1 mb-3">
                        <span style="h6 txt-grey"><small>TELEFONE</small></span>
                        <input type="text" name="telefone_comprador" id="telefone_comprador"  value="<?php echo $orcamento_pedido->telefone_comprador; ?>"    class="form-control mascara-celular">
                      	</div>
                        <div class="col-md-3 mb-3">
                        <span style="h6 txt-grey"><small>EMAIL</small></span>
                        <input type="text" name="email_comprador" id="email_comprador"  value="<?php echo $orcamento_pedido->email_comprador; ?>"    class="form-control mascara-email">
                        </div>
                      	<div class="col-md-2 mb-3">
                        <span><small>DATA DE NASCIMENTO</small></span>
                        <input type="text" name="data_nascimento" id="data_nascimento"  value="<?php echo $orcamento_pedido->data_nascimento; ?>"    class="form-control mascara-data">
                      	</div>
                      	 <div class="col-md-2 mb-3">
                                <span><small>SEXO</small></span>
                                <div class="form-group m-t-10 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="radio1" type="radio" name="sexo" value="m" <?php echo ($orcamento_pedido->sexo=="m") ? "checked" : null?>>
                                    <label class="mb-0" for="radio1">Masculino</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="radio2" type="radio" name="sexo" value="f" <?php echo ($orcamento_pedido->sexo=="f") ? "checked" : null?>>
                                    <label class="mb-0" for="radio2">Feminino</label>
                                  </div>
                                </div>
                        </div>
                       
                       </div>
                       
                        <!– CONTATOS –>
                        
                        
                      
                      <!– endereço de entrega –>
                      
                      <div class="row g-2" id="endereco_entrega">   
                       
                       <div class="col-md-1 mb-3">
                      <span><small>CEP [ENTREGA]</small></span>
 					  <input type="text" name="cep" id="cep"  value="<?php echo $orcamento_pedido->cep; ?>"    class="form-control mascara-cep busca_cep">
                    
                        </div>

                        <div class="col-md-2 mb-3">
                        <span><small>CIDADE [ENTREGA]</small></span>
                        <input type="text" name="cidade" id="cidade"  value="<?php echo $orcamento_pedido->cidade; ?>"    class="form-control cidade">
                        </div>
                        <div class="col-md-1 mb-3">
                        <span><small>UF</small></span>
                        <input type="text" name="estado" id="estado"  value="<?php echo $orcamento_pedido->uf; ?>"    class="form-control estado" >
                      </div>
                      <div class="col-md-2 mb-3">
                        <span><small>BAIRRO</small></span>
                        <input type="text" name="bairro" id="bairro"  value="<?php echo $orcamento_pedido->bairro; ?>"    class="form-control bairro">
                        </div>
                      <div class="col-md-3 mb-3">
                        <span><small>RUA</small></span>
                        <input type="text" name="endereco" id="endereco"  value="<?php echo $orcamento_pedido->endereco; ?>"    class="form-control rua">
                      </div>
                      <div class="col-md-1 mb-3">
                        <span><small>Nº</small></span>
                       <input type="text" name="numero" id="numero"  value="<?php echo $orcamento_pedido->numero; ?>"    class="form-control">
                       </div>
                       <div class="col-md-1 mb-3">
                        <span><small>COMPLEMENTO</small></span>
                       <input type="text" name="complemento" id="complemento"  value="<?php echo $orcamento_pedido->complemento; ?>"    class="form-control">
                       </div>
                        <div class="col-md-1 mb-3">
                        <span><small>REPLICAR</small></span>
                       <div class="media">
                                <label class="switch">
                                    <input type="checkbox" name="entrega_cobranca" value="s" onchange="mudarec(this);" ><span class="switch-state"></span> 
                                  </label>
                                 <label class="col-form-label m-r-10" style="padding-left:3px"><small>SIM</small></label>
                       </div>
                       </div>
                        
                       </div>
                       
                       <script>
                      	function mudarec(obj){
                        var selecionado = obj.checked;
                        if (selecionado) {
                            document.querySelector('#cep_cobranca').value 			= document.querySelector('#cep').value;
                            document.querySelector('#cidade_cobranca').value 		= document.querySelector('#cidade').value;
                            document.querySelector('#estado_cobranca').value 		= document.querySelector('#estado').value;
                            document.querySelector('#bairro_cobranca').value 		= document.querySelector('#bairro').value;
                            document.querySelector('#endereco_cobranca').value 		= document.querySelector('#endereco').value;
                            document.querySelector('#numero_cobranca').value 		= document.querySelector('#numero').value;
                            document.querySelector('#complemento_cobranca').value 	= document.querySelector('#complemento').value;
                        } else {
                            document.querySelector('#cep_cobranca').value 			= "";
                            document.querySelector('#cidade_cobranca').value 		= "";
                            document.querySelector('#estado_cobranca').value 		= "";
                            document.querySelector('#bairro_cobranca').value 		= "";
                            document.querySelector('#endereco_cobranca').value 		= "";
                            document.querySelector('#numero_cobranca').value 		= "";
                            document.querySelector('#complemento_cobranca').value 	= "";
                        }
						}
                      </script>
                        <!– endereço de entrega –>
                        <hr/>
                        <!– endereço de cobrança –>
                        
                        <div class="row g-2" id="endereco_cobrança">   
                       
                       <div class="col-md-1 mb-3">
                      <span><small>CEP [COBRANÇA]</small></span>
 					  <input type="text" name="cep_cobranca" id="cep_cobranca"  value="<?php echo $orcamento_pedido->cep_cobranca; ?>"    class="form-control">
                    
                        </div>

                        <div class="col-md-2 mb-3">
                        <span><small>CIDADE</small></span>
                        <input type="text" name="cidade_cobranca" id="cidade_cobranca"  value="<?php echo $orcamento_pedido->cidade_cobranca; ?>"    class="form-control">
                        </div>
                        <div class="col-md-1 mb-3">
                        <span><small>UF</small></span>
                        <input type="text" name="estado_cobranca" id="estado_cobranca"  value="<?php echo $orcamento_pedido->estado_cobranca; ?>"    class="form-control">
                      </div>
                      <div class="col-md-2 mb-3">
                        <span><small>BAIRRO</small></span>
                        <input type="text" name="bairro_cobranca" id="bairro_cobranca"  value="<?php echo $orcamento_pedido->bairro_cobranca; ?>"    class="form-control">
                        </div>
                      <div class="col-md-3 mb-3">
                        <span><small>RUA</small></span>
                        <input type="text" name="endereco_cobranca" id="endereco_cobranca"  value="<?php echo $orcamento_pedido->cidade; ?>"    class="form-control">
                      </div>
                      <div class="col-md-1 mb-3">
                        <span><small>Nº </small></span>
                       <input type="text" name="numero_cobranca" id="numero_cobranca"  value="<?php echo $orcamento_pedido->uf; ?>"    class="form-control">
                       </div>
                      <div class="col-md-1 mb-3">
                        <span><small>COMPLEMENTO</small></span>
                       <input type="text" name="complemento_cobranca" id="complemento_cobranca"  value="<?php echo $orcamento_pedido->uf; ?>"    class="form-control">
                       </div>
                       
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:30px" onclick="salvar_dados_comprador(this);"><i data-feather="save" Style="color:#008000"></i></p>
                       </div>
                       <small id="mensagem_comprador" style="color:#FF0000;text-align:left"></small>
                       </div>
                       
                        <!– TRANSPORTADORA –>
                        
                        <style type="text/css">
								.listaFornecedor{
                                        text-align:left;
                                    	position:absolute;
                                    	left:15px;
                                    	right:10px;
                                    	top:55px;
                                    	border: solid 1px #ccc;
                                        background: #fff;
                                    	border-radius:0 0 5px 5px;
                                    	z-index:1
                                    }
                                     .listaFornecedor a {
                                        display: block;
                                        text-transform: uppercase;
                                        letter-spacing: 1px;
                                        font-size: .9em;
                                        line-height: 23px;
                                        padding: 6px;
                                    	color: #7d8e94;
                                    }
                                     
                                    .listaFornecedor a:hover {
                                        background: #eee;
                                    }
                       
                        </style>    
                       			<script type="text/javascript">
                           		$(function(){
                           		$("#nomefornecedor").on("keyup", function(){
                           		
                            	var q  = $(this).val();
                            	if(q == ""){
                            		$(".listaFornecedor").hide();
                            		return;
                            	}
                            	
                            	$.ajax({
                            	  url: base_url + "orcamento/buscar/" +q ,
                            	  type: "GET",
                            	  dataType: "json",
                            	  data:{},
                            	  success: function (data){
                            		  $("#nomefornecedor").after('<div class="listaFornecedor"></div>');
                            	   html = "";
                            		for (u = 0; u < data.length; u++) {		  
                            		  html +='<div class="sif"><a href="javascript:;" onclick="selecionarFornecedor(this)"'
                            		  + 'data-idf="' + data[u].id_fornecedor +
                            		   '" data-nomef="' + data[u].nome_fornecedor + '" data-celularf="' + data[u].celular_fornecedor + '" data-contatof="' + data[u].contato_fornecedor +'" data-emailf="' + data[u].email_fornecedor +'">' +
                            		  data[u].nome_fornecedor + '</a></div>';
                            		  
                            		}
                            		$(".listaFornecedor").html(html);
                                    $(".listaFornecedor").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                function selecionarFornecedor(obj){
                                	var id = $(obj).attr("data-idf");
                                	var nome = $(obj).attr("data-nomef");
                                	var celular = $(obj).attr("data-celularf");
                                	var email = $(obj).attr("data-emailf");
                                	var contato = $(obj).attr("data-contatof");
                                	
                                	let valorfretefinal = 
                                	
                                	$(".listaFornecedor").hide();
                                	$("#nomefornecedor").val(nome);
                                	$("#celular_fornecedor").val(celular);
                                	$("#email_fornecedor").val(email);
                                	$("#contato_fornecedor").val(contato);
                                	$("#id_fornecedor").val(id);           	
                                };
                           		</script>
                           		
                         <div class="row g-2" id="escolher_transportadora">   
                           		
                        <div class="col-md-3 mb-3">
                        <span><small>TRANSPORTADORA</small></span>
                        <input type="hidden" name="id_fornecedor" id="id_fornecedor"  value="<?php echo $orcamento_pedido->id_transportadora; ?>">
                        <input  class="form-control" name="nomefornecedor" id="nomefornecedor" type="text" value="<?php echo $orcamento_pedido->nome_fornecedor; ?>" autocomplete="off" placeholder="Nome da Transportadora" required="required">
                        </div>
                        <div class="col-md-1 mb-3">
                        <span><small>TIPO DE FRETE</small></span>
                        <select class="form-select" name="id_tipo_frete" id="id_tipo_frete">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($tipofrete as $fretes){
                              $selecionado = ($fretes->id_tipo_frete == $orcamento_pedido->id_tipo_frete) ? "selected" :"";
            					echo "<option value='$fretes->id_tipo_frete'>$fretes->tipo_frete</option>";
            			  }?> 
                        </select>
                      </div>
                      <div class="col-md-1 mb-3">
                        <span><small>CONTATO</small></span>
                        <input type="text" name="contato_fornecedor" id="contato_fornecedor"  value="<?php echo $orcamento_pedido->contato_fornecedor; ?>"    class="form-control">
                        </div>
                      <div class="col-md-1 mb-3">
                        <span><small>TELEFONE</small></span>
                        <input type="text" name="celular_fornecedor" id="celular_fornecedor"  value="<?php echo $orcamento_pedido->celular_fornecedor; ?>"    class="form-control">
                      </div>
                      <div class="col-md-3 mb-3">
                        <span><small>EMAIL</small></span>
                        <input type="text" name="email_fornecedor" id="email_fornecedor"  value="<?php echo $orcamento_pedido->email_fornecedor; ?>"    class="form-control">
                      </div>
                      <div class="col-md-1 mb-3">
                        <span><small>VALOR DO FRETE </small></span>
                       <input type="text" name="valor_frete_final" id="valor_frete_final"  value="<?php echo number_format($orcamento_pedido->frete,2,",","."); ?>"    class="form-control">
                       </div>
                      <div class="col-md-1 mb-3">
                        <span><small>PRAZO DE ENTREGA</small></span>
                        <input type="text" name="data_entrega_prevista" id="data_entrega_prevista" autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" data-language="en" value="<?php echo $orcamento_pedido->data_entrega_prevista; ?>">
				      </div>
                       <script>
                       function atualizarTrans(obj){
                       		
                       		var id_transportadora 		= $("#id_fornecedor").val();
                       		
                   			var id_tipo_frete 			= $("#id_tipo_frete").val();
                   			let data_entrega_prevista 	= $("#data_entrega_prevista").val();
                            var id_pedido				= $("#id_pedido").html();
                            
                            
                       
                       			$.ajax({
                    				url: base_url + "orcamento/atualizarTransportadora/" + id_pedido,  
                    				type: "POST",
                    				data: { id_pedido: id_pedido, id_transportadora: id_transportadora , id_tipo_frete: id_tipo_frete, data_entrega_prevista: data_entrega_prevista },
                    				dataType: "json",
                    				success: function(data){
                    				alert(id_pedido);
                    				}
                    			});

                    	}
                       </script>
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:30px" onclick="atualizarTrans(this);"><i data-feather="save" Style="color:#008000"></i></p>
                       </div>
                       <small id="mensagem_comprador" style="color:#FF0000;text-align:left"></small>
                       </div>
                       
                       </div>
                       
                        <!– forma de pagamento –>
                        
                        <style>
                        
                        #anexo01ver {
                        display: none;
                        }
                        
                         #anexo02ver {
                        display: none;
                        }
                        
                        #anexo03ver {
                        display: none;
                        }
                        
                        #anexo04ver {
                        display: none;
                        }
                        
                        #anexo05ver {
                        display: none;
                        }
                        
                        #aparecer_02 {
                        display: none;
                        }
                         #pagamento_02 {
                          display: none;
                         }
                                            
                        #pagamento_03 {
                        display: none;
                        }
                        #pagamento_04 {
                        display: none;
                        }
                        #pagamento_05 {
                        display: none;
                        }
                        
                        #anexo01 {
                        display: none;
                        }
                         #proposta01 {
                          display: none;
                         }
                         
                          #anexo01 {
                        display: none;
                        }
                         #proposta01 {
                          display: none;
                         }
                         
                          #anexo02 {
                        display: none;
                        }
                         #proposta02 {
                          display: none;
                         }
                         
                          #anexo03 {
                        display: none;
                        }
                         #proposta03 {
                          display: none;
                         }
                         
                          #anexo04 {
                        display: none;
                        }
                         #proposta04 {
                          display: none;
                         }
                         
                          #anexo05 {
                        display: none;
                        }
                         #proposta05 {
                          display: none;
                         }
                        

                        </style>
                        
                        <!– ENTRADA –>
                        
                        <div id="pagamento_01">

                        <div class="row g-2">  
                        
                        <div class="col-md-1 mb-3">
                        <span><small>VALOR PEDIDO</small></span>
                        <h5 id="total_somado"><?php echo number_format($orcamento_pedido->total_somado,2,",","."); ?></h5>
                      	</div>
 
                       	<div class="col-md-2 mb-3">
                       	<span><small><b>TIPO DE PAGAMENTO 01</b></small></span>
                       	 <select class="form-select" name="forma_pagamento01" id="forma_pagamento01">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($formas as $forma){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$forma->id_forma_pagamento'>$forma->forma</option>";
            			  }?> 
                        </select>
                        </div>
                        <input type="hidden" name="id_pedido_pagamento01" id="id_pedido_pagamento01"  value=""    class="form-control"> 
                         

                         <div class="col-md-2 mb-3">
                        <span><small>BANCO</small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="banco_pagamento01" id="banco_pagamento01">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($bancos as $banco){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$banco->id_banco'>$banco->nome_banco | $banco->agencia | $banco->conta</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>

                       <div class="col-md-1 mb-3">
                        <span><small>VALOR </small></span>
                        <input type="text" name="valor_pgto01" id="valor_pgto01"  value="<?php echo $orcamento_pedido->valor_pgto01; ?>"    class="form-control mascara-dinheiro"> 
                      </div>
                      
                       <div class="col-md-1 mb-3">
                        <span><small>TAXA %</small></span>
                        <input type="text" name="taxa01" id="taxa01"  value="<?php echo $orcamento_pedido->taxa01; ?>"    class="form-control">
                      </div>
                      
                      <div class="col-md-1 mb-3">
                        <span><small>PRIMEIRA PARCELA</small></span>
                        <input type="text" name="primeira_parcela01" id="primeira_parcela01" autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" data-language="en" value="">
                      </div>
                     	<script>
                      	function mostrarparcelas01(obj){
                      	 var forma01 = $('#nvezes01 :selected').text(); //
                      	 document.getElementById("parcelas_01").innerHTML = "";
                      	 
                      	 if (($("#forma_pagamento01").val() == "")||($("#forma_pagamento01").val()  == null)) {
                                alert("Escolha uma forma de pagamento");
                                document.querySelector("#forma_pagamento01").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#forma_pagamento01").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                          if (($("#banco_pagamento01").val() == "")||($("#banco_pagamento01").val()  == null)) {
                                alert("Escolha um banco");
                                document.querySelector("#banco_pagamento01").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#banco_pagamento01").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                      	                      
                      	 let total_pgto01str = document.querySelector('#valor_pgto01').value;
                      	 let total_somadostr = $("#total_somado").html();
                      	                          
                         let total_pgto01 	= total_pgto01str.replace('.', '').replace(',', '.');
                         let total_somado 	= total_somadostr.replace('.', '').replace(',', '.');
                         
                         if ((total_pgto01 == "") || (total_pgto01 == null) ||(total_pgto01 == 0)) {
                                alert("Coloque o valor a ser pago nesse formato");
                                document.querySelector('input[name="valor_pgto01"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="valor_pgto01"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                          var primeira_parcela01 = document.querySelector('input[name="primeira_parcela01"]').value;
                         
                         if(parseInt(total_pgto01) > total_somado){
                         alert("Valor do pagamento não pode ser maior que o total");
                         document.querySelector('input[name="valor_pgto01"]').style.borderColor='red';
                         setTimeout(()=>{ 
                         document.querySelector('input[name="valor_pgto01"]').style.borderColor='#ccc';
                                },6000);
                         return false; 
                         } else { }
                         
                      	 
                      	 if ((primeira_parcela01 == "")||(primeira_parcela01 == null)) {
                                alert("Escolha uma data");
                                document.querySelector('input[name="primeira_parcela01"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="primeira_parcela01"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                          if(!$('input[name="anexo01arquivo"]').val() && ($("#arquivoanexo01").val() == null)){
                                alert("Anexar arquivo");
                                 return false; 
                         };
                         
                         let parcela01 = parseInt(total_pgto01)/parseInt(forma01);
                         //alert(parseFloat(parcela01).toFixed(2).replace(".", ","));
                         
                         let datap01 = primeira_parcela01;
                         	for (i = 1; i <= forma01; i++) {		
							 
                    		 document.getElementById("parcelas_01").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela01).toFixed(2).replace(".", ",") + " - " + datap01 + " | ";
                    			var datainicial = datap01;
                                var dias = 1;
                                var partes = datainicial.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial = new Date(ano,mes,dia);
                                datafinal = new Date(datainicial);
                                datafinal.setMonth(datainicial.getMonth()+1);
                                
                                var dd = ("0" + datafinal.getDate()).slice(-2);
                                var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
                                var y = datafinal.getFullYear();
                                
                                var dataformatada = dd + '/' + mm + '/' + y;
                                datap01 = dataformatada;
 							   // criar um if para descartar feriados e finais de semana
 							   
 							   var restante02 = parseFloat(total_somado.replace(',', '.')) - parseInt(total_pgto01);
 							   
                    		}
                    		//alert(restante02);
                    		document.getElementById("total_restante02").innerHTML = parseFloat(restante02).toFixed(2).replace(".", ",");
                    		
                    		//gravar no bd
                    		
                    		let id_pedido_pagamento	= $("#id_pedido_pagamento01").val();
                    		let data_pagamento 		= $("#primeira_parcela01").val();
                    		let id_forma_pagamento 	= $("#forma_pagamento01").val();
                    		let id_banco 			= $("#banco_pagamento01").val();
                    		let parcela 			= 1;
                    		let nparcelas 			= $("#nvezes01").val();
                    		let valor_pedido		= total_somado;
    						let valor_parcial		= total_somado;
    						let valor_apagar		= $("#valor_pgto01").val();
    						let taxa	 			= $("#taxa01").val();
							let id_pedido 			= $("#id_pedido").html();
							let id_forma 			= 1;
							
							if($('input[name="anexo01arquivo"]').val()){
							var  _nomeArquivo		= document.getElementById("anexo01arquivo");
							var nomeArquivo			= _nomeArquivo.files[0].name; 
							var  extensao			= nomeArquivo.split(".").pop();
							let rand				= Math.floor(Math.random() * 100);
							//alert(extensao);
							var  anexo01				= "comprovante_" + id_pedido + "_" + id_pedido_pagamento + "_" +  id_forma + rand + "_" + "." + extensao; 
							//alert(anexo01);
							$("#nome_arquivo").val(anexo01);
							} else {
							var  anexo01 = $("#arquivoanexo01").val();
							}
                          
                          	//alert(anexo);
    						
    						//inserir forma de pgto
                            		$.ajax({
                        				url: base_url + "orcamento/CadastrarAtualizarPagamento/" + id_pedido,  
                        				type: "POST",
                        				data: { id_pedido_pagamento:id_pedido_pagamento, data_pagamento: data_pagamento, id_forma_pagamento: id_forma_pagamento, id_banco: id_banco, parcela: parcela, nparcelas: nparcelas, valor_pedido: valor_pedido, valor_parcial: valor_parcial, valor_apagar: valor_apagar, taxa: taxa, id_pedido: id_pedido, id_forma: id_forma, anexo: anexo01},
                        				dataType: "json",
                        				success: function(data){
                        				}
                        			});
                        			if($('input[name="anexo01arquivo"]').val()){
 									envia_arquivo1(id_pedido);
                         			}
                        			
                        			
                        	if(parseFloat(total_pgto01.replace(',', '.')) != parseFloat(total_somado.replace(',', '.')) && parseFloat(total_pgto01.replace(',', '.')) < parseFloat(total_somado.replace(',', '.')) && primeira_parcela01 != ""){
                              $("#pagamento_02").fadeIn(1000);  
                             } else { 
                             $("#pagamento_02").hide();  
                             }
							 document.location.reload(true);
						}
						
						//enviar arquivo
						async function envia_arquivo1(id_pedido)
						{
							let formData = new FormData(document.querySelector('#formPedido'));
							
							let reqs = await fetch( base_url + "orcamento/enviaArquivo1/" + id_pedido,{
								method:'post',
								body:formData
							} ); 
						}
                      	</script>
                     
                      <div class="col-md-1 mb-3">
                        <span><small>Nº PARCELAS</small></span>
                       <select class="form-select" name="nvezes01" id="nvezes01" disabled onchange="mostrarparcelas01(this);">
                          
                        </select>
                       </div>
                       
                       <div class="col-md-1 mb-3" id="anexo01">
                       <span><small>Anexo</small></span>
                       <input  name="anexo01arquivo" id="anexo01arquivo" class="form-control" type="file"> 
                       <input  name="anexo01arquivo01" id="anexo01arquivo01" class="form-control" type="hidden">     
                       <input  name="nome_arquivo" id="nome_arquivo" class="form-control" type="hidden">  
                       </div>
                        <script>
                                  function myFunc(){
                                  var arquivoanexo01 = document.querySelector('#arquivoanexo01').value;
                                    window.open('<?php echo URL_BASE ?>app/upload/' + arquivoanexo01, '_blank')
                                  }
                               </script>
                       <input type="hidden" name="arquivoanexo01" id="arquivoanexo01"  value=""    class="form-control">
                       <div class="col-md-1 mb-3" id="anexo01ver">
                       <button style="margin-left:5px;margin-top:25px" class="btn btn-secondary btn-xs" onclick="myFunc()"><i data-feather="paperclip"></i></button>  
                       </div>
                       
                       <div class="col-md-1 mb-3" id="proposta01">
                       <span><small>Nº Proposta</small></span>
                        <input type="text" name="nproposta01" id="nproposta01"  value=""    class="form-control">
                       </div>
                       
                       <script>
                       function excluirparcelas01(){
                       		
                       		var resposta = confirm("Deseja remover esse registro?");
                             if (resposta == true) {

                             
                       		
                       		let id_pedido 			= $("#id_pedido").html();
							let id_forma 			= 1;
                       
                       $.ajax({
                        	url: base_url + "orcamento/ExcluitPagamento/" + id_pedido,  
                        	type: "POST",
                        	data: { id_pedido: id_pedido, id_forma: id_forma },
                        	dataType: "json",
                        	success: function(data){
                        	}
                       });
                       document.location.reload(true);
                       }
                       }
                       </script>
                       
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:25px"><i data-feather="save" Style="color:#008000" onclick="mostrarparcelas01(this);"></i> <i data-feather="trash-2" Style="color:#FF0000;margin-left:20px" onclick="excluirparcelas01(this);"></i></p>
                       </div>
                      
                       <span id="parcelas_01"> PARCELAS </span>
                       </div>
                       
                       </div>
                       
                        <!– SEGUNDO PAGAMENTO –>
                       
                       <div id="pagamento_02">
                       <div class="row g-2">  
                        
                         <div class="col-md-1 mb-3">
                        <span><small>VALOR RESTANTE</small></span>
                        <h5 id="total_restante02"><?php echo number_format($orcamento_pedido->total_restante02,2,",","."); ?></h5>
                      	</div>

                        <div class="col-md-2 mb-3">
                        <span><small><b>TIPO DE PAGAMENTO 02</b></small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="forma_pagamento02" id="forma_pagamento02">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($formas as $forma){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$forma->id_forma_pagamento'>$forma->forma</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span><small>BANCO</small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="banco_pagamento02" id="banco_pagamento02">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($bancos as $banco){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$banco->id_banco'>$banco->nome_banco | $banco->agencia | $banco->conta</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>

                       <div class="col-md-1 mb-3">
                        <span><small>VALOR </small></span>
                        <input type="text" name="valor_pgto02" id="valor_pgto02"  value="<?php echo $orcamento_pedido->valor_pgto02; ?>"    class="form-control mascara-dinheiro"> 
                      </div>
                      
                       <div class="col-md-1 mb-3">
                        <span><small>TAXA %</small></span>
                        <input type="text" name="taxa02" id="taxa02"  value="<?php echo $orcamento_pedido->taxa02; ?>"    class="form-control">
                      </div>
                      
                      <div class="col-md-1 mb-3">
                        <span><small>PRIMEIRA PARCELA</small></span>
                        <input type="text" name="primeira_parcela02"  autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" data-language="en" value="<?php echo $orcamento_pedido->primeira_parcela02; ?>">
                      </div>
                     	<script>
                      	function mostrarparcelas02(obj){
                      	 var forma02 = $('#nvezes02 :selected').text(); //
                      	 document.getElementById("parcelas_02").innerHTML = "";
                      	 
                      	 if (($("#forma_pagamento02").val() == "")||($("#forma_pagamento02").val()  == null)) {
                                alert("Escolha uma forma de pagamento");
                                document.querySelector("#forma_pagamento02").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#forma_pagamento02").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                          if (($("#banco_pagamento02").val() == "")||($("#banco_pagamento02").val()  == null)) {
                                alert("Escolha um banco");
                                document.querySelector("#banco_pagamento02").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#banco_pagamento02").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                      	                      
                      	 let total_pgto02str = document.querySelector('#valor_pgto02').value;
                      	 let total_restantestr = $("#total_restante02").html();
                      	                          
                         let total_pgto02 		= total_pgto02str.replace('.', '').replace(',', '.');
                         let total_restante 	= total_restantestr.replace('.', '').replace(',', '.');
                         
                         if ((total_pgto02 == "") || (total_pgto02 == null) ||(total_pgto02 == 0)) {
                                alert("Coloque o valor a ser pago nesse formato");
                                document.querySelector('input[name="valor_pgto02"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="valor_pgto02"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                          var primeira_parcela02 = document.querySelector('input[name="primeira_parcela02"]').value;
                         
                         if(parseInt(total_pgto02) > total_somado){
                         alert("Valor do pagamento não pode ser maior que o total");
                         document.querySelector('input[name="valor_pgto02"]').style.borderColor='red';
                         setTimeout(()=>{ 
                         document.querySelector('input[name="valor_pgto02"]').style.borderColor='#ccc';
                                },6000);
                         return false; 
                         } else { }
                         
                      	 
                      	 if ((primeira_parcela02 == "")||(primeira_parcela02 == null)) {
                                alert("Escolha uma data");
                                document.querySelector('input[name="primeira_parcela02"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="primeira_parcela02"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         //alert($("#arquivoanexo02").val());
                         
                          if(!$('input[name="anexo02arquivo"]').val() && ($("#arquivoanexo02").val() == null)){
                                alert("Anexar arquivo");
                                 return false; 
                         };
                         
                         let parcela02 = parseInt(total_pgto02)/parseInt(forma02);
                         //alert(parseFloat(parcela02).toFixed(2).replace(".", ","));
                         
                         let datap02 = primeira_parcela02;
                         	for (i = 1; i <= forma02; i++) {		
							 
                    		 document.getElementById("parcelas_02").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela02).toFixed(2).replace(".", ",") + " - " + datap02 + " | ";
                    			var datainicial = datap02;
                                var dias = 1;
                                var partes = datainicial.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial = new Date(ano,mes,dia);
                                datafinal = new Date(datainicial);
                                datafinal.setMonth(datainicial.getMonth()+1);
                                
                                var dd = ("0" + datafinal.getDate()).slice(-2);
                                var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
                                var y = datafinal.getFullYear();
                                
                                var dataformatada = dd + '/' + mm + '/' + y;
                                datap02 = dataformatada;
 							   // criar um if para descartar feriados e finais de semana
 							   
 							   var restante03 = parseFloat(total_somado.replace(',', '.')) - parseInt(total_pgto02);
 							   
                    		}
                    		//alert(restante03);
                    		document.getElementById("total_restante03").innerHTML = parseFloat(restante03).toFixed(2).replace(".", ",");
                    		
                    		//gravar no bd
                    		
                    		let id_pedido_pagamento	= $("#id_pedido_pagamento02").val();
                    		let data_pagamento 		= $("#primeira_parcela02").val();
                    		let id_forma_pagamento 	= $("#forma_pagamento02").val();
                    		let id_banco 			= $("#banco_pagamento02").val();
                    		let parcela 			= 1;
                    		let nparcelas 			= $("#nvezes02").val();
                    		let valor_pedido		= total_somado;
    						let valor_parcial		= restante02;
    						let valor_apagar		= $("#valor_pgto02").val();
    						let taxa	 			= $("#taxa02").val();
							let id_pedido 			= $("#id_pedido").html();
							let id_forma 			= 2;
							
							if($('input[name="anexo02arquivo"]').val()){
							var  _nomeArquivo		= document.getElementById("anexo02arquivo");
							var nomeArquivo			= _nomeArquivo.files[0].name; 
							var  extensao			= nomeArquivo.split(".").pop();
							let rand				= Math.floor(Math.random() * 100);
							//alert(extensao);
							var  anexo02				= "comprovante_" + id_pedido + "_" + id_pedido_pagamento + "_" +  id_forma_pagamento + rand + "_" + "." + extensao; 
							$("#nome_arquivo02").val(anexo);
							} else {
							var  anexo02 = $("#arquivoanexo02").val();
							}
                          
                          	//alert(anexo);
    						
    						//inserir forma de pgto
                            		$.ajax({
                        				url: base_url + "orcamento/CadastrarAtualizarPagamento/" + id_pedido,  
                        				type: "POST",
                        				data: { id_pedido_pagamento:id_pedido_pagamento, data_pagamento: data_pagamento, id_forma_pagamento: id_forma_pagamento, id_banco: id_banco, parcela: parcela, nparcelas: nparcelas, valor_pedido: valor_pedido, valor_parcial: valor_parcial, valor_apagar: valor_apagar, taxa: taxa, id_pedido: id_pedido, id_forma: id_forma, anexo: anexo02},
                        				dataType: "json",
                        				success: function(data){
                        				}
                        			});
                        			
                        			
                        			if($('input[name="anexo02arquivo"]').val()){
 									envia_arquivo2(id_pedido);
                         			}
                        			
                        			
                        	if(parseFloat(total_pgto02.replace(',', '.')) != parseFloat(valor_parcial.replace(',', '.')) && parseFloat(total_pgto02.replace(',', '.')) < parseFloat(valor_parcial.replace(',', '.')) && primeira_parcela02 != ""){
                              $("#pagamento_03").fadeIn(1000);  
                             } else { 
                             $("#pagamento_03").hide();  
                             }
							 document.location.reload(true);
						}
						
						//enviar arquivo
						async function envia_arquivo2(id_pedido)
						{
							let formData = new FormData(document.querySelector('#formPedido'));
							
							let reqs = await fetch( base_url + "orcamento/enviaArquivo2/" + id_pedido,{
								method:'post',
								body:formData
							} ); 
						}
                      	</script>
                     
                      <div class="col-md-1 mb-3">
                        <span><small>Nº PARCELAS</small></span>
                       <select class="form-select" name="nvezes02" id="nvezes02" disabled onchange="mostrarparcelas02(this);">
                          
                        </select>
                       </div>
                       
                        <div class="col-md-1 mb-3" id="anexo02">
                       <span><small>Anexo</small></span>
                       <input  name="anexo02arquivo" id="anexo02arquivo" class="form-control" type="file"> 
                       <input  name="anexo02arquivo02" id="anexo02arquivo02" class="form-control" type="hidden">     
                       <input  name="nome_arquivo02" id="nome_arquivo02" class="form-control" type="hidden">  
                       </div>
                        <script>
                                  function myFunc2(){
                                  var arquivoanexo02 = document.querySelector('#arquivoanexo02').value;
                                    window.open('<?php echo URL_BASE ?>app/upload/' + arquivoanexo02, '_blank')
                                  }
                               </script>
                       <input type="hidden" name="arquivoanexo02" id="arquivoanexo02"  value=""    class="form-control">
                       <div class="col-md-1 mb-3" id="anexo02ver">
                       <button style="margin-left:5px;margin-top:25px" class="btn btn-secondary btn-xs" onclick="myFunc2()"><i data-feather="paperclip"></i></button>  
                       </div>
                       
                       <div class="col-md-1 mb-3" id="proposta02">
                       <span><small>Nº Proposta</small></span>
                        <input type="text" name="nproposta02" id="nproposta02"  value=""    class="form-control">
                       </div>
                       
                       <script>
                       function excluirparcelas02(){
                       		
                       		var resposta = confirm("Deseja remover esse registro?");
                             if (resposta == true) {

                             
                       		
                       		let id_pedido 			= $("#id_pedido").html();
							let id_forma 			= 2;
                       
                       $.ajax({
                        	url: base_url + "orcamento/ExcluitPagamento/" + id_pedido,  
                        	type: "POST",
                        	data: { id_pedido: id_pedido, id_forma: id_forma },
                        	dataType: "json",
                        	success: function(data){
                        	}
                       });
                       document.location.reload(true);
                       }
                       }
                       </script>
                       
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:25px"><i data-feather="save" Style="color:#008000" onclick="mostrarparcelas02(this);"></i> <i data-feather="trash-2" Style="color:#FF0000;margin-left:20px" onclick="excluirparcelas02(this);"></i></p>
                       </div>
                      
                       <span id="parcelas_02"> PARCELAS </span>
                       </div>
                       
                       </div>
                      
                       <!– TERCEIRO PAGAMENTO –>
                       
                       <div id="pagamento_03">
                       <div class="row g-2">    
                         <div class="col-md-1 mb-3">
                        <span><small>VALOR RESTANTE</small></span>
                        <h5 id="total_restante03"><?php echo number_format($orcamento_pedido->total_restante03,2,",","."); ?></h5>
                      	</div>

                        <div class="col-md-2 mb-3">
                        <span><small><b>TIPO DE PAGAMENTO 03</b></small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="forma_pagamento03" id="forma_pagamento03">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($formas as $forma){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$forma->id_forma_pagamento'>$forma->forma</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span><small>BANCO</small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="banco_pagamento03" id="banco_pagamento03">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($bancos as $banco){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$banco->id_banco'>$banco->nome_banco | $banco->agencia | $banco->conta</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>

                       <div class="col-md-2 mb-3">
                        <span><small>VALOR <span id="tipo_pgto03"></span></small></span>
                        <input type="text" name="valor_pgto03" id="valor_pgto03"  value="<?php echo $orcamento_pedido->valor_pgto03; ?>"    class="form-control mascara-dinheiro"> 
                      </div>
                      
                       <div class="col-md-1 mb-3">
                        <span><small>TAXA %</small></span>
                        <input type="text" name="taxa03" id="taxa03"  value="<?php echo $orcamento_pedido->taxa03; ?>"    class="form-control">
                      </div>
                      
                      <div class="col-md-1 mb-3">
                        <span><small>PRIMEIRA PARCELA</small></span>
                        <input type="text" name="primeira_parcela03"  autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" data-language="en" value="<?php echo $orcamento_pedido->primeira_parcela03; ?>">
                      </div>
                     	<script>
                      	function mostrarparcelas03(obj){
                      	 var forma03 = $('#nvezes03 :selected').text(); //
                      	 document.getElementById("parcelas_03").innerHTML = "";
                      	 
                      	 if (($("#forma_pagamento03").val() == "")||($("#forma_pagamento03").val()  == null)) {
                                alert("Escolha uma forma de pagamento");
                                document.querySelector("#forma_pagamento03").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#forma_pagamento03").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                      	                          
                         let total_pgto03str = document.querySelector('#valor_pgto03').value;
                      	 let total_restante03str = $("#total_restante03").html();
                      	                          
                         let total_pgto03 	= total_pgto03str.replace('.', '').replace(',', '.');
                         let total_restante03 	= total_restante03str.replace('.', '').replace(',', '.');
                         
                         if ((total_pgto03 == "") || (total_pgto03 == null) ||(total_pgto03 == 0)) {
                                alert("Coloque o valor a ser pago nesse formato");
                                document.querySelector('input[name="valor_pgto03"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="valor_pgto03"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         var primeira_parcela03 = document.querySelector('input[name="primeira_parcela03"]').value;
                         
                         if(parseFloat(total_pgto03.replace(',', '.')) != parseFloat(total_restante03.replace(',', '.')) && parseFloat(total_pgto03.replace(',', '.')) < parseFloat(total_restante03.replace(',', '.')) && primeira_parcela03 != ""){
                         $("#pagamento_04").fadeIn(1000);  
                         } else { 
                         $("#pagamento_04").hide();  
                         }
                         
                         if(parseInt(total_pgto03) > parseInt(total_restante03)){
                         alert("Valor do pagamento não pode ser maior que o total");
                         document.querySelector('input[name="valor_pgto03"]').style.borderColor='red';
                         setTimeout(()=>{ 
                         document.querySelector('input[name="valor_pgto03"]').style.borderColor='#ccc';
                                },6000);
                         return false; 
                         } else { }
                      	 
                      	 if ((primeira_parcela03 == "")||(primeira_parcela03 == null)) {
                                alert("Escolha uma data");
                                document.querySelector('input[name="primeira_parcela03"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="primeira_parcela03"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         let parcela03 = parseInt(total_pgto03)/parseInt(forma03);
                         //alert(parseFloat(parcela03).toFixed(2).replace(".", ","));
                         
                         let datap03 = primeira_parcela03;
                         	for (i = 1; i <= forma03; i++) {		
							 
                    		 document.getElementById("parcelas_03").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela03).toFixed(2).replace(".", ",") + " - " + datap03 + " | ";
                    			var datainicial = datap03;
                                var dias = 1;
                                var partes = datainicial.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial = new Date(ano,mes,dia);
                                datafinal = new Date(datainicial);
                                datafinal.setMonth(datainicial.getMonth()+1);
                                
                                var dd = ("0" + datafinal.getDate()).slice(-2);
                                var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
                                var y = datafinal.getFullYear();
                                
                                var dataformatada = dd + '/' + mm + '/' + y;
                                datap03 = dataformatada;
 							   // criar um if para descartar feriados e finais de semana
 							   
 							   var restante04 = parseFloat(total_restante03.replace(',', '.')) - parseInt(total_pgto03);
 							   
 							   document.getElementById("total_restante04").innerHTML = parseFloat(restante04).toFixed(2).replace(".", ",");
                    		}
						}
                      	</script>
                     
                      <div class="col-md-1 mb-3">
                        <span><small>Nº PARCELAS</small></span>
                       <select class="form-select" name="nvezes03" id="nvezes03" disabled onchange="mostrarparcelas03(this);">
                          
                        </select>
                       </div>
                       
                       <div class="col-md-1 mb-3" id="anexo03">
                       <span><small>Anexo</small></span>
                                <input class="form-control" type="file">
                       </div>
                       
                       <div class="col-md-1 mb-3" id="proposta03">
                       <span><small>Nº Proposta</small></span>
                        <input type="text" name="nproposta03" id="nproposta03"  value=""    class="form-control">
                       </div>
                       
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:30px" onclick="mostrarparcelas03(this);"><i data-feather="save" Style="color:#008000"></i></p>
                       </div>
                      
                       <span id="parcelas_03"> PARCELAS </span>
                       </div>
                       
                       </div>
                       
                       
                       <!– QUARTO PAGAMENTO –>
                       
                       <div id="pagamento_04">
                       <div class="row g-2">  
                        
                         <div class="col-md-1 mb-3">
                        <span><small>VALOR RESTANTE</small></span>
                        <h5 id="total_restante04"><?php echo number_format($orcamento_pedido->total_restante04,2,",","."); ?></h5>
                      	</div>

                        <div class="col-md-2 mb-3">
                        <span><small><b>TIPO DE PAGAMENTO 04</b></small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="forma_pagamento04" id="forma_pagamento04">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($formas as $forma){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$forma->id_forma_pagamento'>$forma->forma</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span><small>BANCO</small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="banco_pagamento04" id="banco_pagamento04">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($bancos as $banco){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$banco->id_banco'>$banco->nome_banco | $banco->agencia | $banco->conta</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>

                       <div class="col-md-2 mb-3">
                        <span><small>VALOR <span id="tipo_pgto04"></span></small></span>
                        <input type="text" name="valor_pgto04" id="valor_pgto04"  value="<?php echo $orcamento_pedido->valor_pgto04; ?>" class="form-control mascara-dinheiro"> 
                      </div>
                      
                       <div class="col-md-1 mb-3">
                        <span><small>TAXA %</small></span>
                        <input type="text" name="taxa04" id="taxa04"  value="<?php echo $orcamento_pedido->taxa04; ?>"    class="form-control">
                      </div>
                      
                      <div class="col-md-1 mb-3">
                        <span><small>PRIMEIRA PARCELA</small></span>
                        <input type="text" name="primeira_parcela04"  id="primeira_parcela04" autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" data-language="en" value="<?php echo $orcamento_pedido->primeira_parcela04; ?>">
                      </div>
                     	<script>
                      	function mostrarparcelas04(obj){
                      	 var forma04 = $('#nvezes04 :selected').text(); //
                      	 document.getElementById("parcelas_04").innerHTML = "";
                      	 
                      	 if (($("#forma_pagamento04").val() == "")||($("#forma_pagamento04").val()  == null)) {
                                alert("Escolha uma forma de pagamento");
                                document.querySelector("#forma_pagamento04").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#forma_pagamento04").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                      	                          
                         let total_pgto04str = document.querySelector('#valor_pgto04').value;
                      	 let total_restante04str = $("#total_restante04").html();
                      	                          
                         let total_pgto04 	= total_pgto04str.replace('.', '').replace(',', '.');
                         let total_restante04 	= total_restante04str.replace('.', '').replace(',', '.');
                         
                         if ((total_pgto04 == "") || (total_pgto04 == null) ||(total_pgto04 == 0)) {
                                alert("Coloque o valor a ser pago nesse formato");
                                document.querySelector('input[name="valor_pgto04"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="valor_pgto04"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         var primeira_parcela04 = document.querySelector('input[name="primeira_parcela04"]').value;
                         
                         if(parseFloat(total_pgto04.replace(',', '.')) != parseFloat(total_restante04.replace(',', '.')) && parseFloat(total_pgto04.replace(',', '.')) < parseFloat(total_restante04.replace(',', '.')) && primeira_parcela04 != ""){
                         $("#pagamento_05").fadeIn(1000);  
                         } else { 
                         $("#pagamento_05").hide();  
                         }
                         
                         if(parseInt(total_pgto04) > parseInt(total_restante04)){
                         alert("Valor do pagamento não pode ser maior que o total");
                         document.querySelector('input[name="valor_pgto04"]').style.borderColor='red';
                         setTimeout(()=>{ 
                         document.querySelector('input[name="valor_pgto04"]').style.borderColor='#ccc';
                                },6000);
                         return false; 
                         } else { }
                      	 
                      	 if ((primeira_parcela04 == "")||(primeira_parcela04 == null)) {
                                alert("Escolha uma data");
                                document.querySelector('input[name="primeira_parcela04"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="primeira_parcela04"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         let parcela04 = parseInt(total_pgto04)/parseInt(forma04);
                         //alert(parseFloat(parcela04).toFixed(2).replace(".", ","));
                         
                         let datap04 = primeira_parcela04;
                         	for (i = 1; i <= forma04; i++) {		
							 
                    		 document.getElementById("parcelas_04").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela04).toFixed(2).replace(".", ",") + " - " + datap04 + " | ";
                    			var datainicial = datap04;
                                var dias = 1;
                                var partes = datainicial.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial = new Date(ano,mes,dia);
                                datafinal = new Date(datainicial);
                                datafinal.setMonth(datainicial.getMonth()+1);
                                
                                var dd = ("0" + datafinal.getDate()).slice(-2);
                                var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
                                var y = datafinal.getFullYear();
                                
                                var dataformatada = dd + '/' + mm + '/' + y;
                                datap04 = dataformatada;
 							   // criar um if para descartar feriados e finais de semana
 							   
 							   var restante05 = parseFloat(total_restante04.replace(',', '.')) - parseInt(total_pgto04);
 							   
 							   document.getElementById("total_restante05").innerHTML = parseFloat(restante05).toFixed(2).replace(".", ",");
                    		}
						}
                      	</script>
                     
                      <div class="col-md-1 mb-3">
                        <span><small>Nº PARCELAS</small></span>
                       <select class="form-select" name="nvezes04" id="nvezes04" disabled onchange="mostrarparcelas04(this);">
                          
                        </select>
                       </div>
                       
                        <div class="col-md-1 mb-3" id="anexo04">
                       <span><small>Anexo</small></span>
                                <input class="form-control" type="file">
                       </div>
                       
                       <div class="col-md-1 mb-3" id="proposta04">
                       <span><small>Nº Proposta</small></span>
                        <input type="text" name="nproposta04" id="nproposta04"  value=""    class="form-control">
                       </div>
                       
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:30px" onclick="mostrarparcelas04(this);"><i data-feather="save" Style="color:#008000"></i></p>
                       </div>
                      
                       <span id="parcelas_04"> PARCELAS </span>
                       </div>
                       
                       </div>
                       
                       <!– QUINTO PAGAMENTO –>
                       
                       <div id="pagamento_05">
                       <div class="row g-2">  
                        
                         <div class="col-md-1 mb-3">
                        <span><small>VALOR RESTANTE</small></span>
                        <h5 id="total_restante05"><?php echo number_format($orcamento_pedido->total_restante05,2,",","."); ?></h5>
                      	</div>

                        <div class="col-md-2 mb-3">
                        <span><small>TIPO DE PAGAMENTO 05</small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="forma_pagamento05" id="forma_pagamento05">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($formas as $forma){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$forma->id_forma_pagamento'>$forma->forma</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>
                        
                        <div class="col-md-2 mb-3">
                        <span><small>BANCO</small></span>
						 <div class="mb-2">
						 
                        <select class="form-select" name="banco_pagamento05" id="banco_pagamento05">
                          <option value="" "selected">Escolha</option>
                          <?php foreach ($bancos as $banco){
                                $selecionado = ($motivo->id_fechamento == $chamado->id_fechamento) ? "selected" :"";
            					echo "<option value='$banco->id_banco'>$banco->nome_banco | $banco->agencia | $banco->conta</option>";
            			  }?> 
                        </select>
                      	</div>                       
                        </div>

                       <div class="col-md-2 mb-3">
                        <span><small>VALOR <span id="tipo_pgto05"></span></small></span>
                        <input type="text" name="valor_pgto05" id="valor_pgto05"  value="<?php echo $orcamento_pedido->valor_pgto05; ?>"    class="form-control mascara-dinheiro"> 
                      </div>
                      
                       <div class="col-md-1 mb-3">
                        <span><small>TAXA %</small></span>
                        <input type="text" name="taxa05" id="taxa05"  value="<?php echo $orcamento_pedido->taxa05; ?>"    class="form-control">
                      </div>
                      
                      <div class="col-md-1 mb-3">
                        <span><small>PRIMEIRA PARCELA</small></span>
                        <input type="text" name="primeira_parcela05"  autocomplete="off" class="datepicker-here form-control digits" id=".date-picker" data-language="en" value="<?php echo $orcamento_pedido->primeira_parcela05; ?>">
                      </div>
                     	<script>
                      	function mostrarparcelas05(obj){
                      	 var forma05 = $('#nvezes05 :selected').text(); //
                      	 document.getElementById("parcelas_05").innerHTML = "";
                      	 
                      	 if (($("#forma_pagamento05").val() == "")||($("#forma_pagamento05").val()  == null)) {
                                alert("Escolha uma forma de pagamento");
                                document.querySelector("#forma_pagamento05").style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector("#forma_pagamento05").style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                      	                          
                         let total_pgto05str = document.querySelector('#valor_pgto05').value;
                      	 let total_restante05str = $("#total_restante05").html();
                      	                          
                         let total_pgto05 	= total_pgto05str.replace('.', '').replace(',', '.');
                         let total_restante05 	= total_restante05str.replace('.', '').replace(',', '.');
                         
                         if ((total_pgto05 == "") || (total_pgto05 == null) ||(total_pgto05 == 0)) {
                                alert("Coloque o valor a ser pago nesse formato");
                                document.querySelector('input[name="valor_pgto05"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="valor_pgto05"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         var primeira_parcela05 = document.querySelector('input[name="primeira_parcela05"]').value;
                         
                         if(total_pgto05 != total_restante05 && total_pgto05 < total_restante05 && primeira_parcela05 != ""){
						 alert("Quinta forma de pagamento não pode ser menor que " + total_restante05);
						 document.querySelector('input[name="valor_pgto05"]').style.borderColor='red';
                         setTimeout(()=>{ 
                         document.querySelector('input[name="valor_pgto05"]').style.borderColor='#ccc';
                                },6000);
                         return false;  
                         } else { 

                         }
                         
                         if(parseInt(total_pgto05) > parseInt(total_restante05)){
                         alert("Valor do pagamento não pode ser maior que o total");
                         document.querySelector('input[name="valor_pgto05"]').style.borderColor='red';
                         setTimeout(()=>{ 
                         document.querySelector('input[name="valor_pgto05"]').style.borderColor='#ccc';
                                },6000);
                         return false; 
                         } else { }
                         
                      	 
                      	 if ((primeira_parcela05 == "")||(primeira_parcela05 == null)) {
                                alert("Escolha uma data");
                                document.querySelector('input[name="primeira_parcela05"]').style.borderColor='red';
                                setTimeout(()=>{
                                  document.querySelector('input[name="primeira_parcela05"]').style.borderColor='#ccc';
                                },6000);
                                return false; 
                         };
                         
                         let parcela05 = parseInt(total_pgto05)/parseInt(forma05);
                         //alert(parseFloat(parcela05).toFixed(2).replace(".", ","));
                         
                         let datap05 = primeira_parcela05;
                         	for (i = 1; i <= forma05; i++) {		
							 
                    		 document.getElementById("parcelas_05").innerHTML += "[ " + i + " ] R$ " + parseFloat(parcela05).toFixed(2).replace(".", ",") + " - " + datap05 + " | ";
                    			var datainicial = datap05;
                                var dias = 1;
                                var partes = datainicial.split("/");
                                var ano = partes[2];
                                var mes = partes[1]-1;
                                var dia = partes[0];
                                
                                datainicial = new Date(ano,mes,dia);
                                datafinal = new Date(datainicial);
                                datafinal.setMonth(datainicial.getMonth()+1);
                                
                                var dd = ("0" + datafinal.getDate()).slice(-2);
                                var mm = ("0" + (datafinal.getMonth()+1)).slice(-2);
                                var y = datafinal.getFullYear();
                                
                                var dataformatada = dd + '/' + mm + '/' + y;
                                datap05 = dataformatada;
 							   // criar um if para descartar feriados e finais de semana
                    		}
						}
                      	</script>
                     
                      <div class="col-md-1 mb-3">
                        <span><small>Nº PARCELAS</small></span>
                       <select class="form-select" name="nvezes05" id="nvezes05" disabled onchange="mostrarparcelas05(this);">
                          
                        </select>
                       </div>
                       
                        <div class="col-md-1 mb-3" id="anexo05">
                       <span><small>Anexo</small></span>
                                <input class="form-control" type="file">
                       </div>
                       
                       <div class="col-md-1 mb-3" id="proposta05">
                       <span><small>Nº Proposta</small></span>
                        <input type="text" name="nproposta05" id="nproposta05"  value=""    class="form-control">
                       </div>
                       
                       <div class="col-md-1 mb-3">
                       <p Style="text-align:center; padding-top:30px" onclick="mostrarparcelas05(this);"><i data-feather="save" Style="color:#008000"></i></p>
                       </div>
                      
                       <span id="parcelas_05"> PARCELAS </span>
                       </div>
                       
                       </div>
                       </form>
                       
                        <!– FIM forma de pagamento  –>
                        
                        <HR/>
                        
                        <!– ANEXAR ARQUIVOS  –>
                        <div id="anexar_arquvos" class="row g-2">    

                        <div class="col-md-3 mb-2">
                      <span style="h6 txt-grey"><small>ANEXAR ARQUIVOS</small></span>
					  <div class="card-body add-post">
                      <form name="frmImage" action="image-add.php?action=saveimg" class="dropzone">
                      <div class="m-0 dz-message needsclick" ><i class="icon-cloud-up"></i>
                          <h6 class="mb-0">Solte os arquivos aqui ou clique para fazer upload.</h6>
                          <input type="hidden" name="id_pedido" value="<?php echo $orcamento_pedido->id_pedido ?>">
                        </div>                      
                      </form>
                    	<div class="btn-menu">
                        <a href="" class="link">
                        <button class="btn btn-primary">Enviar anexos</button>
                        </a>
                    	</div>
                      
                    	</div> 					  

                      </div>
                       <div class="col-md-6 mb-2">
                       <span style="h6 txt-grey"><small>ARQUIVOS ANEXOS</small></span>
                        <div class="card-body">
                        <ul class="icon-lists border navs-icon">
                        <?php $i =0; foreach ($pedidoanexo as $panexo){ $i++;
                          $extension = pathinfo($panexo->arquivo, PATHINFO_EXTENSION);
                          ?>
                          <?php if($extension == "jpg" or $extension == "png" or $extension == "jpeg" or $extension == "gif"){?>
                        <li style="line-height: 1;">
                        <table>
                        <tr><td><a href="<?php echo ($panexo->arquivo) ? URL_BASE."app/upload/".$panexo->arquivo : null ?>" target="_blank"><i data-feather="image"></i><span> <?php echo ($panexo->arquivo) ? $panexo->arquivo : null ?></span></a></td>
                        <td><button class="btn btn-outline" href="javascript:;" onclick="return excluirarquivo(this)" data-entidade ="orcamento" data-id="<?php echo $panexo->id_pedido_arquivo ?>" data-id-pedido="<?php echo $panexo->id_pedido ?>"><i class="fa fa-trash" style="color:#ff5f24"></i></button></td></tr>
                        </table>
            			</li>
                        <?php } else {?>
                        <li>
                        <table>
                        <tr><td><a href="<?php echo ($panexo->arquivo) ? URL_BASE."app/upload/".$panexo->arquivo : null ?>" target="_blank"><i data-feather="file-text"></i><span> <?php echo ($panexo->arquivo) ? $panexo->arquivo : null ?></span></a></td>
                     	<td><button class="btn btn-outline" href="javascript:;" onclick="return excluirarquivo(this)" data-entidade ="orcamento" data-id="<?php echo $panexo->id_pedido_arquivo ?>" data-id-pedido="<?php echo $panexo->id_pedido ?>"><i class="fa fa-trash" style="color:#ff5f24"></i></button></td></tr>
                        </table>
						</li>
                        <?php } ?>
                        <?php } ?>	
                        </ul>
                        
                      	</div>

                      	</div>
                      
                      </div>
                      
                      <script>
                      document.querySelector('#btnMultiplosArquivos').addEventListener('click',()=>{
                      	document.querySelector('#multiplosArquivos').click();
                      });
                      
                      </script>

                   		<!– FINAL ANEXAR ARQUIVOS  –>
                   		
                   		<!– observações –>
                   		
                   		<script>
                   		function AtualizarTextos(obj){
                   		
                   			var textolivre 		= $("#textolivre").val();
                   			var observacao 		= $("#observacao").val();
                            var id_pedido		= $("#id_pedido").html();
                            
                            //alert(id_pedido);
                                    
                        	$.ajax({
                        		url: base_url + "orcamento/AtualizarTextosBD/" + id_pedido,  
                        		type: "POST",
                        		data: { textolivre: textolivre, observacao: observacao, id_pedido: id_pedido  },
                        		dataType: "json",
                        		success: function(data){
                        		}
                        	});
                        }
                   		</script>
                   		
                   		
                   		
                        <div id="observacoes" class="row g-2">    

                        <div class="col-md-6 mb-3">
                       <span style="h6 txt-grey"><small>TEXTO LIVRE</small></span>
 					   <textarea onchange="AtualizarTextos(this);" name="textolivre" id="textolivre"  class="form-control" rows="10" placeholder="Escreva o texto livre interno, não sairá na nota"><?php echo $orcamento_pedido->textolivre; ?></textarea>
                       </div>

                       <div class="col-md-6 mb-3">
                       <span style="h6 txt-grey"><small>OBSERVAÇÕES</small></span>
 					   <textarea onchange="AtualizarTextos(this);"  name="observacao" id="observacao" class="form-control" rows="10" placeholder="Escreva as observações que sairão na nota"><?php echo $orcamento_pedido->observacao; ?></textarea>
                       </div>
                      
                   		</div>
                   		
                   		<!– final de observações  –>
                   		
                   		
                   		<div id="finalizar_pedido" class="row g-2">    
						<div class="col-md-6 mb-3" style="display: flex;">
						
						<a href="http://localhost/022022/dompdf/" target=”_blank”  class="btn btn-warning" style="white-space: nowrap;" id="btnImprimir" onclick="CriaPDF()" />VIZUALIZAR PRÉ NOTA DO PEDIDO Nº <?php echo $orcamento_pedido->id_pedido; ?></a>
                       </div>
                        <div class="col-md-6 mb-3">
                       <a href="#" class="btn btn-success" style="white-space: nowrap;"> FINALIZAR PEDIDO Nº <?php echo $orcamento_pedido->id_pedido; ?></a>
                       </div>

                   		</div>

                      </div>

                      </div>
                      
                </div>
                
                </div>
                
              
              <!– final validar campos –>

				<div class="col-md-12 project-list">
                <div class="card">
                <div class="card-header">
                    <h5>ORÇAMENTO N<sup>o</sup> <span id="id_pedido"><?php echo $orcamento_pedido->id_pedido; ?></span> <span id="n_pedido"></span></h5>
                  </div>
                
                      <div class="row g-3">
                      <div class="col-md-3 mb-3">
                      <span>CLIENTE</span>
 					  <h5><?php echo $orcamento_pedido->nome; ?></h5>
                    
                        </div>

                        <div class="col-md-1 mb-3">
                        <span>ORÇAMENTO</span>
                          <h5><?php echo ($orcamento_pedido->data_pedido)?date('d/m/Y', strtotime($orcamento_pedido->data_pedido)):null; ?></h5>
                        </div>
                        <div class="col-md-2 mb-3">
                        <span>SOLICITANTE</span>
                         <h5><?php echo $orcamento_pedido->nome_usuario; ?></h5>
                      </div>
                      <div class="col-md-1 mb-3">
                        <span>VALOR TOTAL</span>
                          <h5>R$ <span id="total_oc"><?php echo number_format($orcamento_pedido->total,2,",","."); ?></span></h5>
                        </div>
                      <div class="col-md-1 mb-3">
                        <span>VALOR FRETE</span>
                        <input type="text" style="text-align:center" name="valor_frete" id="valor_frete" value="<?php echo number_format($orcamento_pedido->frete,2,",","."); ?>" class="form-control" onchange="AplicarFrete(this)">
                        </div>
                      <div class="col-md-1 mb-3">
                        <span>DESCONTO %</span>
                        <input type="number" style="text-align:center" name="desconto_percentual" id="desconto_percentual" value="<?php echo $orcamento_pedido->desconto_percentual; ?>" class="form-control" onchange="DescontoPer(this)">
                        </div>
                        <div class="col-md-1 mb-3">
                        <span>DESCONTO R$</span>
                         <input type="text" style="text-align:center" name="desconto_valor" id="desconto_valor"  value="<?php echo number_format($orcamento_pedido->desconto_valor,2,",","."); ?>"    class="form-control" onchange="DescontoVal(this)">
                        </div>
                        <div class="col-md-1 mb-3">
                        <span>VALOR FINAL</span>
                          <h5>R$ <span id="total_t"><?php echo number_format($orcamento_pedido->total_somado,2,",","."); ?></span></h5>
                          <input type="hidden" id="total_occ" value="<?php echo $orcamento_pedido->total; ?>">
                        </div>
                        
                        <div class="col-md-1 mb-3">
                        <span>EXPIRAÇÃO</span>
                          <h5><?php echo date('d/m/Y', strtotime($orcamento_pedido->data_pedido. ' + 2 days')); ?></h5>
                        </div>
                        
                      </div>
                      
                      <div class="row g-3" id="fazer_pedido">

                        <div class="col-md-3 mb-3">
                      <span>CIDADE</span>
 					  <h6><?php echo $orcamento_pedido->cidade; ?></h6>
                    
                        </div>

                        <div class="col-md-1 mb-3">
                        <span>ESTADO</span>
                          <h6><?php echo $orcamento_pedido->uf; ?></h6>
                        </div>
                        <div class="col-md-2 mb-3">
                        <span>CPF</span>
                         <h6><?php echo $orcamento_pedido->cpf; ?></h6>
                      </div>
                      <div class="col-md-1 mb-3">
                        <span>CEP</span>
                          <h6><?php echo $orcamento_pedido->cep; ?></h6>
                        </div>
                      <div class="col-md-1 mb-3">
                        <span>CELULAR</span>
                        <h6><?php echo formataTelefone($orcamento_pedido->celular); ?></h6>
                      </div>
                      <div class="col-md-3 mb-3">
                        <span>E-MAIL</span>
                       <h6><?php echo $orcamento_pedido->email; ?></h6>
                       </div>
                       <div class="col-md-1 mb-3">
                       <a onclick="Mudarestado('validar')" href="#" class="btn btn-primary" style="white-space: nowrap;"> Fazer Pedido</a>
                       </div>
                      </div>
                      
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
                  
                     
                      <div class="row g-3">

                       
                        <div class="col-md-4 mb-3">
                        
                        </style>
								<style type="text/css">
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
                        		
                                    <input type="hidden" id="id_produto" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto" class="form-control" placeholder="Digite nome do produto" autocomplete="off">  
                    
                        </div>
                        <div class="col-md-1 mb-3">
                        <input autocomplete="off" class="form-control" type="text" name="qtde" id="qtde" placeholder="Qtd" value="1">
                    
                        </div>
                        <div class="col-md-1 mb-3">
                         <input class="form-control" type="text" name="frete_aproximado" id="frete_aproximado" placeholder="Frete" readonly>
                      		
                      </div>
                      <div class="col-md-1 mb-3">
                         <input class="form-control" type="text" name="valor" id="valor" placeholder="Valor" readonly>
                      		
                      </div>
                      <div class="col-md-1 mb-3">
                         <input class="form-control" type="text" name="estoque_reservado" id="estoque_reservado" placeholder="Estoque Reservado" readonly>
                      		
                      </div>
                      <div class="col-md-1 mb-3">
                         <input class="form-control" type="text" name="estoque" id="estoque" placeholder="Estoque" readonly>
                         <input class="form-control" type="hidden" name="frete" id="vfrete_inicial" value="15" placeholder="Estoque" readonly>
                         <input class="form-control" type="hidden" name="dvalor" id="dvalor" value="0" placeholder="Estoque" readonly>
                      		
                      </div>
                        <div class="col-md-2 mb-3">
                        <input type="hidden" id="id_ordem_compra" name="id_ordem_compra" value="<?php echo $compra_ordem_compra->id_ordem_compra; ?>" class="form-control">
                          <input type="button" class="btn btn-primary" value="Inserir" id="btnInserirItens">
                        </div>
                      </div>
                  
                    <div class="table-responsive ">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="text-align:center;width:5%">Item</th>
                            <th style="text-align:center;width:5%">ID</th>
                            <th style="text-align:left;width:30%">Produto</th>
                            <th style="text-align:center;width:10%">Valor</th>
                            <th style="text-align:center;width:5%">Qtde</th>
                            <th style="text-align:center;width:10%">Total</th>
                            <th style="text-align:center;width:10%">V Frete (UN)</th>
                            <th style="text-align:center;width:12%">Desconto%</th>
                            <th style="text-align:center;width:15%">DescontoR$</th>
                            <th style="text-align:center;width:15%">ValorTotal</th>
                            <th style="text-align:center;width:10%">Estoque</th>
                            <th style="text-align:center;width:10%">Excluir</th>
                          </tr>
                        </thead>
                        <tbody id="lista_item">
                        <?php  $i = 0; foreach ($itenspedido as $itemp) { $i++; ?>
                       		<tr>
					   		<td style='text-align:center'><?php echo $i ?></td>
					    	<td style='text-align:center'><?php echo $itemp->id_produto ?></td>
					   		<td style='text-align:left'><?php echo $itemp->produto ?></td>
					   		<td style='text-align:center'><?php echo number_format($itemp->preco,2,",","."); ?></td>
					   		<td style=""text-align:center"><input onchange="atualizaSubTotal(this)" style="text-align:center;width:100px" type="number" name="quant[<?php echo $itemp->id_produto ?>]" id="qtde<?php echo $itemp->id_produto ?>" class="p_quant" value="<?php echo $itemp->qtde ?>" data-preco="<?php echo $itemp->preco ?>"   data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>"> </td>
					   		<td style="text-align:center" class="subtotal"><?php echo number_format($itemp->preco*$itemp->qtde,2,",","."); ?></td>
					   		<td style='text-align:center'><input onchange="atualizaFreteSubTotal(this)" style="text-align:center;width:100px" type="text" name="vfrete" id="vfrete<?php echo $itemp->id_produto ?>" class="form-control" value="<?php echo $itemp->frete ?>" data-preco="<?php echo $itemp->preco ?>"   data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>"></td>
					   		<td style='text-align:center'><input onchange="atualizaDesPerSubTotal(this)" style="text-align:center;" type="number" name="dpercentual" id="dpercentual<?php echo $itemp->id_produto ?>" value="<?php echo $itemp->desconto_percentual; ?>" class="form-control" data-preco="<?php echo $itemp->preco ?>"   data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>"></td>
					   		<td style='text-align:center'><input onchange="atualizaDesValorSubTotal(this)" style="text-align:center;" type="text" name="dvalor<?php echo $itemp->id_produto ?>" id="dvalor<?php echo $itemp->id_produto ?>" value="<?php echo $itemp->desconto_valor; ?>" class="form-control" data-preco="<?php echo $itemp->preco ?>"   data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>"></td>
					   		<td style='text-align:center' class="subtotal_somado"><?php echo number_format($itemp->total_somado,2,",","."); ?></td>
					   		<td style='text-align:center'><?php echo $itemp->estoque_real ?></td>
					   		<td style="text-align:center"><a href="javascript:;" onclick="excluirProduto(this)" data-produto="<?php echo $itemp->id_produto ?>" data-pedido="<?php echo $itemp->id_pedido ?>" class="btn btn-danger">Excluir</a></td>
                       		</tr>
                        	<?php }?>
                        </tbody>
                           <tr>
                            <th style="text-align:center;width:5%"><span id="qtd_produtos"><?php echo $i ?></span></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:left;width:40%"></th>
                            <th style="text-align:center;width:10%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:5%"></th>
                            <th style="text-align:center;width:10%"><!-- <a href="<?php echo URL_BASE ."orcamento/cancelar/".$itemp->id_pedido ?>" class="btn btn-secondary"> Cancelar</a>Ends--></th>
                            <th style="text-align:center;width:10%"></th>
                            <th style="text-align:center;width:10%"><button class="btn btn-danger" onclick="ExcluirItens()"> Limpar</button></th>
                          </tr>
                        </thead>
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
        
        <script src="<?php echo URL_BASE ?>assets/js/js_pedido.js"></script>