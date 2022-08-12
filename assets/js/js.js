$(function (){
	
	$('.filtro').click (function(){
	$('.mostraFiltro').slideToggle();
	$(this).toggleClass('active');
		return false;
	});
	
	$('.mobmenu').click (function(){
	$('.menutopo').slideToggle();
	$(this).toggleClass('active');
		return false;
	});	
	
	$('.senha').click (function(){
		$('.mostraCampo').slideToggle();
		$(this).toggleClass('active');
		return false;
	});
				
	$( "#accordion" ).accordion({
		collapsible: true,
		autoHeight: false,
		active: false,
		heightStyle: "content" 
    });    

});

function excluir(obj){
	var entidade  = $(obj).attr('data-entidade');
	var id  = $(obj).attr('data-id');	
	if(confirm('Deseja realmente excluir ?')){
		window.location.href = base_url + entidade +"/excluir/" + id;	
	}
}

function excluirimg(obj){
	var entidade  		= $(obj).attr('data-entidade');
	var id_img  		= $(obj).attr('data-id');	
	var id  			= $(obj).attr('data-id-chamado');	
	if(confirm('Deseja realmente excluir essa imagem?')){
		window.location.href = base_url + entidade +"/excluirimg/" + id + "?img=" + id_img;
	}
}

function excluirtreinamento(obj){
	var entidade  		= $(obj).attr('data-entidade');
	var id 				= $(obj).attr('data-id');	
	var instrutor 		= $(obj).attr('data-instrutor');
	var data_i 			= $(obj).attr('data-i');
	var data_f 			= $(obj).attr('data-f');
	if(confirm('Deseja realmente excluir essa reserva?')){
		window.location.href = base_url + entidade +"/excluirtreinamento/" + id + "?id=" + id + "&$id_responsavel=" + instrutor + "&data_i=" + data_i+ "&data_f=" + data_f;
	}
}

function excluirinstrutor(obj){
	var entidade  		= $(obj).attr('data-entidade');
	var id 				= $(obj).attr('data-id');	
	var instrutor 		= $(obj).attr('data-instrutor');
	var data_i 			= $(obj).attr('data-i');
	var data_f 			= $(obj).attr('data-f');
	if(confirm('Deseja realmente excluir essa reserva?')){
		window.location.href = base_url + entidade +"/excluirinstrutor/" + id + "?id=" + id + "&id_responsavel=" + instrutor + "&data_i=" + data_i+ "&data_f=" + data_f;
	}
}

function excluiritemgrupo(obj){
	var entidade  		= $(obj).attr('data-entidade');
	var id 				= $(obj).attr('data-id');	
	var ide 			= $(obj).attr('data-ide');	
	var idr 			= $(obj).attr('data-responsavel');	
	var data 			= $(obj).attr('data-data');	
	if(confirm('Deseja realmente excluir essa reserva?')){
		window.location.href = base_url + entidade +"/excluiritemgrupo/" + id + "?id_responsavel=" + idr + "&dat=" + data+ "&ide=" + ide;
	}
}


function fecharMsg(obj){	
	$(".msg").hide();
}

function pegaArquivo(files){
	var file = files[0];
	const fileReader = new FileReader();
	fileReader.onloadend = function(){
		$("#imgUp").attr("src", fileReader.result);
	}
	fileReader.readAsDataURL(file);
	
}


function listar(){
       $.ajax({
          url: base_url + "ajax/listarProduto",
          type: "GET",
          dataType: "json",
          data:{},
          success: function (data){
        	  console.log(data);
              lista_itens(data);
          }
       });
 }


function lista_itens(data){    
    html = "<tr>";
    var total_entrada = 0.00;
    for(var i in data){ 
        total_entrada += parseFloat(data[i].preco);
        var j = parseInt(i)+1;
        html += '<td align="left">' + data[i].id_produto  + '</td>' + 	
            '<td align="left">' + data[i].produto + '</td>' + 
            '<td align="left">' + data[i].cfop + '</td>' + 
            '<td align="left">' + data[i].preco + '</td></tr>';
     }
     
     html += '<tr><td align="right" colspan="6" ><b>Total:</b> R$ '+ total_entrada + '</span></td> </tr>'
     $("#lista_itens").html(html);
    
}
	