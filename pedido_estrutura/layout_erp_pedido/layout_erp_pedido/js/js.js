//abas
$(document).ready(function(){
	
	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	});
	


/*** modal **/
	$("a[rel=modal]").click( function(ev){
        ev.preventDefault();
 
        var id = $(this).attr("href");
 
        var alturaTela = $(document).height();
        var larguraTela = $(window).width();
		
		
			
        //colocando o fundo preto
        $('#mascara').css({'width':larguraTela,'height':alturaTela});
        //$('#mascara').fadeIn(500); 
        $('#mascara').fadeTo("slow",0.8);
 
        var left = ($(window).width() /2) - ( $(id).width() / 2 );
        var top = ($(window).height() / 2) - ( $(id).height() / 2 );
     
        $(id).css({'top':top,'left':left});
        $(id).show(); 
		$(window).scrollTop(0) ;
		
    });
 
    $("#mascara").click( function(){
        $(this).hide();
        $(".window").hide();
    });
 
    $('.fechar').click(function(ev){
        ev.preventDefault();
        $("#mascara").hide();
        $(".window").hide();
    });
	
	/*** fim modal 	**/  
	
	/**
		  $(".slide-toggle").click(function(){	
			$(".menu").animate({width: '240px'})
			
			$(".menu").addClass('scroll');
			$(".add").animate({width: '240px'});
			$(".add").css("display", "block");
			$(".icones").css("left", "0");
			$(".v_icones ").css("left", "0");
		  });
	 **/
	 
		
		/*mostra meu*/
		$('.menu-anchor').on('click touchstart', function(e){
		$('html').toggleClass('menu-active');
		e.preventDefault();
		});
		
		/**/
		$("input[name=nome_cliente]").click( function(ev){
			$('.cx_op').css("display","block");
			ev.preventDefault();
		});
		
		
		//Definimos que todos as tags dd terão display:none menos o primeiro filho
		$('dd').hide();
		//Ao clicar no link, executamos a funcao
		$('dt a').click(function(){
			//As tags dd's visíveis agora ficam com display:none
			$("dd:visible").slideUp("slow");
			//Apos, a funcao é transferida para seu pai, que procura o proximo irmao no codigo o tonando visível
			$(this).parent().next().slideDown("slow");
			return false;
		});
		 
});