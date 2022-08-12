$(function(){
	
	//pesquisar lista de produtos
	
	$("#produto").on("keyup", function(){
		var q  = $(this).val();
		if(q == ""){
		$(".listaProdutos").hide();
		return;
	}
	$.ajax({
		url: base_url + "produto/buscar/" +q ,
		type: "GET",
		dataType: "json",
		data:{},
		success: function (data){
		$("#produto").after('<div class="listaProdutos"></div>');
		html = "";
		for (i = 0; i < data.length; i++) {		  
		html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto(this)"'
		+ 'data-id="' + data[i].id_produto +
		'" data-valor="' + data[i].preco +
		'" data-estoque="' + data[i].estoque_real +
		'" data-nome="' + data[i].produto + '">' +
		data[i].produto + '</a></div>'; 
		}
	$(".listaProdutos").html(html);
	$(".listaProdutos").show();
	}
	});
	});
	});
	function selecionarProduto(obj){
	var id = $(obj).attr("data-id");
	var nome = $(obj).attr("data-nome");
	var valor = $(obj).attr("data-valor");
	var estoque = $(obj).attr("data-estoque");
	
		$(".listaProdutos").hide();
		$("#produto").val(nome);
		$("#id_produto").val(id);    
		$("#valor").val(valor);   
		$("#estoque").val(estoque);             	
	};
	
	//inserir itens no bd
	
	$("#btnInserirItens").on("click", function(){
		
		var id_pedido		= $("#id_pedido").html();
		var id_produto		= $("#id_produto").val();
		var qtde			= $("#qtde").val();
		var preco			= $("#valor").val();
		var frete			= $("#vfrete_inicial").val();
		
		var total			= parseInt(qtde)*parseInt(preco);
		var total_somado	= parseInt(qtde)*(parseInt(preco)+parseInt(frete));
		
		$.ajax({
			url: base_url + "orcamento/inserir", 
			type: "POST",
			data: {id_pedido: id_pedido, id_produto: id_produto, qtde:qtde, preco:preco, frete:frete, total:total, total_somado:total_somado },
			dataType: "json",
			success: function(data){
				inserirItens()
			}
		});
		
		
	});
	
	//criar uma taleba java dos inseridos
	
	function inserirItens(){
		var id_pedido				= $("#id_pedido").html();
		var id						= $("#id_produto").val();
		var produto					= $("#produto").val();
		var qtde					= $("#qtde").val();
		var preco					= $("#valor").val();
		var estoque					= $("#estoque").val();
		var frete					= $("#vfrete_inicial").val();
		var desconto_percentual		= 0;
		var desconto_valor			= 0;
		var subtotal				= preco*qtde;
		var total_somado			= (parseInt(preco)+parseInt(frete))*parseInt(qtde);
		var qtd_produtos			= $("#qtd_produtos").html();
		var d 						= parseInt(qtd_produtos)+1;
		if($('input[name="quant[' + id +']"').length==0){
		var tr		= "<tr>" +
					   "<td style='text-align:center'>" + d++ + "</td>" +
					   "<td style='text-align:center'>" + id + "</td>" +
					   "<td style='text-align:left'>" + produto + "</td>" +
					   "<td style='text-align:center'>" + preco + "</td>" +
					   '<td style=""text-align:center"><input onchange="atualizaSubTotal(this)" style="text-align:center;width:100px" type="number" name="quant[' + id +']" id="qtde' + id + '" value="' + qtde + '" value="' + qtde + '" data-preco="'+ preco +'" class="p_quant" data-pedido="'+ id_pedido +'" data-produto="' + id +'"> </td>' +
					   '<td style="text-align:center" class="subtotal">' + subtotal + '</td>' +
					   '<td style="text-align:center"><input onchange="atualizaFreteSubTotal(this)" style="text-align:center" type="text" id="vfrete' + id + '" name="vfrete" value="' + frete + '" class="form-control" data-preco="'+ preco +'" class="p_quant" data-pedido="'+ id_pedido +'" data-produto="' + id +'"> </td>' +
					   '<td style="text-align:center"><input onchange="atualizaDesPerSubTotal(this)" style="text-align:center" type="number"  id="dpercentual' + id + '" value="' + 0 + '" class="form-control" data-preco="'+ preco +'" class="p_quant" data-pedido="'+ id_pedido +'" data-produto="' + id +'"></td>' +
					   '<td style="text-align:center"><input onchange="atualizaDesValorSubTotal(this)" style="text-align:center" type="text" name="dvalor" id="dvalor' + id + '" value="' + 0 + '" class="form-control" data-preco="'+ preco +'" class="p_quant" data-pedido="'+ id_pedido +'" data-produto="' + id +'"></td>' +
					   '<td style="text-align:center" class="subtotal_somado">' + total_somado + '</td>' +
					   "<td style='text-align:center'>" + estoque + "</td>" +
					   '<td style="text-align:center"><a href="javascript:;" onclick="excluirProduto(this)" data-entidade="itemorcamento" class="btn btn-danger" data-pedido="'+ id_pedido +'" data-produto="' + id +'">Excluir</a></td>' +
                       "</tr>"
                       
                       $("#lista_item").append(tr);
                       
                       limpar();
                       
                       AtualizaTotal();
                       	} else {
							alert('Item já se encontra na lista, voce pode mudar a quantidade');
							limpar();
						}
	 }
	
	//Atualiza frete item
	
	function atualizaFreteSubTotal(obj){
		var id_pedido 	= $(obj).attr('data-pedido');
		var id_produto 	= $(obj).attr('data-produto');
		var preco 		= $(obj).attr("data-preco");
		var qtde 		= $("#qtde"+id_produto).val();
		var total 	 	= preco * qtde;
		var frete 		= $("#vfrete"+id_produto).val();
		var dper 		= $("#dpercentual"+id_produto).val();
		var dvalor 		= 0 + (parseInt(dper)*total/100);
		
		//alert(dvalor);

		var desconto_valor = 1 + dvalor;
		var desconto_percentual = 0 + dper;

		var total_somado = (parseInt(preco) + parseInt(frete)) * qtde - dvalor;
		
		//alert(total_somado);
		
		var total_cs = parseFloat(total_somado).toFixed(2).replace(".", ",");

		$(obj).closest('tr').find('.subtotal_somado').html(total_cs);
		atualizaQtdeBanco(id_pedido, id_produto, qtde, total, total_somado, frete, desconto_percentual, desconto_valor)
		AtualizaTotal();
	}
	
	//Atualiza desconto percentual item
	
	function atualizaDesPerSubTotal(obj){
		var id_pedido 	= $(obj).attr('data-pedido');
		var id_produto 	= $(obj).attr('data-produto');
		var preco 		= $(obj).attr("data-preco");
		var qtde 		= $("#qtde"+id_produto).val();
		var total 	 	 = preco * qtde;
		
		var frete 		=  $("#vfrete"+id_produto).val();
		var dper 		=  $("#dpercentual"+id_produto).val();
		
		if(dper < 0){
			$("#dpercentual"+id_produto).val(1);
			dper = 0;
		}
		
		var dvalor 		=  parseInt(dper)*total/100;
		
		var desconto_valor = 1 + dvalor;
		var desconto_percentual = 0 + dper;

		var total_somado = (parseInt(preco) + parseInt(frete)) * qtde - dvalor;
		
		var total_cs = parseFloat(total_somado).toFixed(2).replace(".", ",");

		$(obj).closest('tr').find('.subtotal_somado').html(total_cs);
		
		 $("#dvalor"+id_produto).val(dvalor);
		atualizaQtdeBanco(id_pedido, id_produto, qtde, total, total_somado, frete, desconto_percentual, desconto_valor)
		AtualizaTotal();
	}
	
	//Atualiza desconto valor item
	
	function atualizaDesValorSubTotal(obj){
		var id_pedido 	= $(obj).attr('data-pedido');
		var id_produto 	= $(obj).attr('data-produto');
		var preco 		= $(obj).attr("data-preco");
		var qtde 		= $("#qtde"+id_produto).val();
		var total 	 	= preco * qtde;
		
		var frete 		=  $("#vfrete"+id_produto).val();
		var dvalor 		=  $("#dvalor"+id_produto).val();
		
		var dper		=  parseInt(dvalor)*100/total;
		
		var desconto_valor = 1 + parseInt(dvalor);
		var desconto_percentual = parseFloat(dper.toFixed(0));

		var total_somado = (parseInt(preco) + parseInt(frete)) * qtde - dvalor;
		
		var total_cs = parseFloat(total_somado).toFixed(2).replace(".", ",");

		$(obj).closest('tr').find('.subtotal_somado').html(total_cs);
		
		 $("#dpercentual"+id_produto).val(desconto_percentual);
		atualizaQtdeBanco(id_pedido, id_produto, qtde, total, total_somado, frete, desconto_percentual, desconto_valor)
		AtualizaTotal();
	}
	
	//Atualiza subtotal no item
	
	
	function atualizaSubTotal(obj){
		var id_pedido 	= $(obj).attr('data-pedido');
		var id_produto 	= $(obj).attr('data-produto');
		var qtde 		= $("#qtde"+id_produto).val();
		if(qtde <= 0){
			$(obj).val(1);
			qtde = 1;
		}
		
		var preco 						= $(obj).attr("data-preco");
		var frete 						=  $("#vfrete"+id_produto).val();
		
		var dper		=  $("#dpercentual"+id_produto).val();
		
		var subtotal 	 	= parseInt(preco) * parseInt(qtde);
		var total 	 	 	= parseInt(preco) * parseInt(qtde);
		var dvalor 			= parseInt(dper)*total/100;
		
		
		var desconto_valor = 1 + dvalor;
		var desconto_percentual = 0 + dper;

		
		var total_somado = (parseInt(preco) + parseInt(frete)) * parseInt(qtde) - dvalor;
		
		//alert(frete);
		
		$(obj).closest('tr').find('.subtotal').html(subtotal);
		
		var total_cs = parseFloat(total_somado).toFixed(2).replace(".", ",");

		$(obj).closest('tr').find('.subtotal_somado').html(total_cs);

		$("#dvalor"+id_produto).val(dvalor);
		 atualizaQtdeBanco(id_pedido, id_produto, qtde, total, total_somado, frete, desconto_percentual, desconto_valor)
		 AtualizaTotal();
	}
	
	
		//atualiza itens no BD
		
		function atualizaQtdeBanco(id_pedido, id_produto, qtde, total, total_somado, frete, desconto_percentual, desconto_valor){
			
		$.ajax({
			url: base_url + "orcamento/atualizaQtde/" + id_pedido + "/" + id_produto + "/" + qtde + "/" + total + "/" + total_somado + "/" + frete + "/" + desconto_percentual + "/" + desconto_valor,  
			type: "GET",
			data: { },
			dataType: "json",
			success: function(data){
			}
		});
		

		
		}
	
	//Desconto da % no total
	
	function DescontoPer(obj){
		var valor_frete 	= $("#valor_frete").val();
		var desconto_per 	= $("#desconto_percentual").val();
		var desconto_valor	= $("#desconto_valor").val();
		var qtde = $(obj).val();
		if(qtde < 0){
			$(obj).val(0);
			qtde = 0;
		}
		var valorTotal		= $("#total_occ").val();
		var dt = parseInt(valorTotal);
		var valorTotalFinal	= parseInt(valor_frete)+dt-dt*parseInt(desconto_per)/100; 
		var desconto		= dt*parseInt(desconto_per)/100; 
		
		var total_completo = parseFloat(valorTotalFinal).toFixed(2).replace(".", ",");
		
		$("#total_t").html(total_completo);
		document.querySelector('#desconto_valor').value = parseFloat(desconto).toFixed(2);
		
		var id_pedido		= $("#id_pedido").html();
		var DescontoValorBD	= document.querySelector('#desconto_valor').value;
		var DescontoPerBD	= document.querySelector('#desconto_percentual').value;
		
		$.ajax({
			url: base_url + "orcamento/atualizaPerBanco/" + id_pedido,  
			type: "POST",
			data: { total_somado: valorTotalFinal, id_pedido: id_pedido , desconto_percentual: DescontoPerBD, desconto_valor: DescontoValorBD },
			dataType: "json",
			success: function(data){
			}
		});
		
	}
	
	
	
	//Aplica Frete no total
	
	function AplicarFrete(obj){
		var valor_frete 	= $("#valor_frete").val();
		var valorTotal		= $("#total_occ").val();
		var desconto_valor	= $("#desconto_valor").val();
		var valorTotalFinal	= parseInt(valor_frete)+parseInt(valorTotal)-parseInt(desconto_valor); 
		var total_completo = parseFloat(valorTotalFinal).toFixed(2).replace(".", ",");
		
		$("#total_t").html(total_completo);
		
		var id_pedido		= $("#id_pedido").html();
		var valorFreteBD	= document.querySelector('#valor_frete').value;
		
		$.ajax({
			url: base_url + "orcamento/atualizaFreteBanco/" + id_pedido,  
			type: "POST",
			data: { total_somado: valorTotalFinal, id_pedido: id_pedido , frete: valorFreteBD },
			dataType: "json",
			success: function(data){
			}
		});
		
	}
	
	//Desconto de valor no total
	
	function DescontoVal(obj){
		var valor_frete 	= $("#valor_frete").val();
		var desconto_valor	= $("#desconto_valor").val();
		var valorTotal		= $("#total_occ").val();
		var dt = parseInt(valorTotal);
		var valorTotalFinal	= parseInt(valor_frete)+dt-parseInt(desconto_valor); 
		var desconto		= (parseInt(desconto_valor)/dt)*100; 
		var desconto_dec 	= parseFloat(desconto.toFixed(0));
		
		var total_completo = parseFloat(valorTotalFinal).toFixed(2).replace(".", ",");
		
		$("#total_t").html(total_completo);
		
		document.querySelector('#desconto_percentual').value = desconto_dec;
		
		var id_pedido		= $("#id_pedido").html();
		var DescontoValorBD	= document.querySelector('#desconto_valor').value;
		var DescontoPerBD	= document.querySelector('#desconto_percentual').value;
		
		$.ajax({
			url: base_url + "orcamento/atualizaPerBanco/" + id_pedido,  
			type: "POST",
			data: { total_somado: valorTotalFinal, id_pedido: id_pedido , desconto_percentual: DescontoPerBD, desconto_valor: DescontoValorBD },
			dataType: "json",
			success: function(data){
			}
		});
		
	}
	
	//Exclui um item
	
	function excluirProduto(obj){
	var id_pedido = $(obj).attr('data-pedido');
	var id_produto = $(obj).attr('data-produto');
	if(confirm('Deseja realmente excluir ?')){
		$.ajax({
			url: base_url + "orcamento/excluirProduto/" + id_pedido,  
			type: "POST",
			data: { id_produto: id_produto, id_pedido: id_pedido },
			dataType: "json",
			success: function(data){
				$(obj).closest("tr").remove();
				AtualizaTotal();
			}
		});	
		
	
	}
	}
	
	function ExcluirItens(){
		var id_pedido	= $("#id_pedido").html();
		$.ajax({
			url: base_url + "orcamento/ExcluirItens/" + id_pedido,  
			type: "GET",
			data: { },
			dataType: "json",
			success: function(data){
			$("#total_oc").html(0);
			$("#total_t").html(0);
			$("#qtd_produtos").html(0);
			$("#lista_item").html("");
				
			}
		});
	}
	
	//Limpa formulário
	
	function limpar(){
		$("#id_produto").val("");
		$("#produto").val("");
		$("#qtde").val(1);
		$("#valor").val("");
		$("#estoque").val("");
	}
	
	//Atualizar total
	
	function AtualizaTotal(){
		var total = 0;
		var total_somado = 0;
		var total_frete = 0;
		for(var i=0; i < $(".p_quant").length; i++){
			var quant = $(".p_quant").eq(i);
			var preco = quant.attr("data-preco");
			var subtotal = preco * parseInt(quant.val());
			var id_produto = quant.attr("data-produto");
			var frete =  $("#vfrete"+id_produto).val();
			var dvalor =  $("#dvalor"+id_produto).val();
			var sub_total_somado = (parseInt(preco) + parseInt(frete)) * parseInt(quant.val()) - dvalor;
			
			
			
			total += subtotal;
			total_somado += sub_total_somado;
			total_frete += parseInt(frete);
			//alert(total_somado);
			
			}
			var qtde_p = i;
			var totalsomado_completo = parseFloat(total_somado).toFixed(2).replace(".", ",");
			$("#total_oc").html(totalsomado_completo);
			var valor_frete 	= $("#valor_frete").val();
			var desconto_per	= $("#desconto_percentual").val();
			var desconto_valor 	= total_somado*parseInt(desconto_per)/100;
			var total_calculado = parseInt(total_frete) + total_somado - desconto_valor;
			
			var total_completo = parseFloat(total_calculado).toFixed(2).replace(".", ",");
			
			//alert(total_calculado);
			
			$("#total_t").html(total_completo);
			document.querySelector('#valor_frete').value 	= total_frete;
			document.querySelector('#desconto_valor').value = parseFloat(desconto_valor).toFixed(2);
			document.querySelector('#total_occ').value 		= parseFloat(total_somado).toFixed(2);
			$("#qtd_produtos").html(qtde_p);
			atualizaTotalBanco(total_somado, total_calculado);
			
		}
		
		//Atualiza total pedidos BD
		
		function atualizaTotalBanco(total_somado, total_calculado){
		var id_pedido			= $("#id_pedido").html();
		var qtd_produtos		= $("#qtd_produtos").html();
		var desconto_valor		= $("#desconto_valor").val();
		var frete 				= $("#valor_frete").val();
		$.ajax({
			url: base_url + "orcamento/atualizaTotalBanco/" + id_pedido,  
			type: "POST",
			data: { total: total_somado, total_somado: total_calculado, desconto_valor: desconto_valor, id_pedido: id_pedido , qtd_produtos: qtd_produtos, frete: frete },
			dataType: "json",
			success: function(data){
			}
		});

		
		}
		
