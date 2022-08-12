$(function(){

	 $("#btnInserir").on("click", function(){
	var id_produto  	= $("#id_produto").val();
	var id_ordem_compra = $("#id_ordem_compra").val();
	var qtde  			= $("#qtde").val();
	var valor  			= $("#valor").val();
	
	$.ajax({
	  url: base_url + "Itemordemcompra/inserir",
	  type: "POST",
	  dataType: "json",
	  data:{
		id_produto		: id_produto,
		id_ordem_compra	: id_ordem_compra,
		qtde			: qtde,
		valor			: valor
	},
	  success: function (data){
		lista_entradas(data.lista);
		limpar();
	  }
   });
	
   }) ;

   
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
		   '" data-preco="' + data[i].preco +
		   '" data-nome="' + data[i].produto + '">' +
		  data[i].produto + " - R$ " + data[i].preco + '</a></div>';
		  
		}
		$(".listaProdutos").html(html);
        $(".listaProdutos").show();
	  }
   });
	
   }) ;
});

function selecionarProduto(obj){
	var id = $(obj).attr("data-id");
	var nome = $(obj).attr("data-nome");
	var preco = $(obj).attr("data-preco");
	
	
	$(".listaProdutos").hide();
	$("#produto").val(nome);
	$("#preco").val(preco);
	$("#qtde").val(1);
	$("#qtde").focus();
	$("#id_produto").val(id);
	
	listarLocalizacao(id);
	
}

function listarLocalizacao(id){
	
	$.ajax({
	  url: base_url + "produtolocalizacao/listaPorProduto/" +id ,
	  type: "GET",
	  dataType: "json",
	  data:{},
	  success: function (data){
		html = "";
		 for (i = 0; i < data.length; i++) {
			html +="<option value='"+ data[i].id_localizacao +"'>" + data[i].localizacao + "</option>";
		}
		$("#id_localizacao").html(html);
	  }
   });
	
}

function lista_entradas(data){    
    html = "<tr>";
    var total_entrada = 0.00;
    for(var i in data){ 
        total_entrada += parseFloat(data[i].subtotal);
        var j = parseInt(i)+1;
        html += '<td align="center">' + data[i].id_item_ordem_compra  + '</td>' + 	
            '<td align="left" width="590">' + data[i].produto + '</td>' + 
            '<td align="center">' + data[i].qtde + '</td>' + 
            '<td align="center">' + data[i].valor + '</td>' + 
            '<td align="center">' + data[i].subtotal + '</td>' +
            '<td align="center"><a href="javascript:;" onclick="return excluir_ioc(this)" data-entidade ="itemordemcompra"  data-id="'+ data[i].id_item_ordem_compra + '"data-ide="'+ data[i].id_ordem_compra +
            '" class="btn btn-danger"> Excluir </a></td></tr>'
            '</tr>';
     }
     
     html += '<tr><td align="right" colspan="6" ><b>Total:</b> R$ '+ total_entrada + '</span></td> </tr>'
     $("#lista_itens_ordem_compra").html(html);
     $("#total_oc").html(total_entrada);
    
}

function limpar(){
	$("#produto").val("");
	$("#valor").val("");
	$("#qtde").val(1);
	$("#produto").focus();
	$("#id_produto").val(id);
}

function excluir_ioc(obj){
	var entidade = $(obj).attr('data-entidade');
	var id = $(obj).attr('data-id');
	var ide = $(obj).attr('data-ide');
	if(confirm('Deseja realmente excluir ?')){
		window.location.href = base_url + entidade +"/excluir/" + id + "?ide=" + ide;	
		}
}