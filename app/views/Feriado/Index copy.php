<?php include_once 'db.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>

<?php 
session_start();
?>
<meta http-equiv="refresh" content="1320;url=#">
<script src='<?php echo URL_BASE ?>lib/main.js'></script>
<link href='<?php echo URL_BASE ?>lib/main.css' rel='stylesheet' />
<link href='<?php echo URL_BASE ?>calendario/calend.css' rel='stylesheet' />


<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 1500px;
    margin: 0 auto;
  }
  
  .fc-timegrid-col-events{
  margin: 0!important;
  }
  .fc-time-grid-event.fc-short .fc-time:before {
   content: attr(data-full);
}

</style>
<style type="text/css">
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
				<?php 
                
                
                if ($_GET['dat']) {
                    $inicioBR = $_GET['dat'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                } 
                
                //echo $inicioBR;
                ?>



<script>
	document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');   

    var calendar = new FullCalendar.Calendar(calendarEl, {
    schedulerLicenseKey: '0373772499-fcs-1648818123',
    
      height: '700px',
      expandRows: true,
      slotMinTime: '09:00',
      slotMaxTime: '18:30',
      slotDuration: '00:30',
      slotLabelInterval: '00:30',
      showNonCurrentDates: false,
      weekends: true,
      businessHours: [ // specify an array instead
          {
            daysOfWeek: [ 1, 2, 3, 4, 5, 6], // Monday, Tuesday, Wednesday
            startTime: '09:00', // 8am
            endTime: '12:00', // 6pm
            selectable: true,
          },
          {
            daysOfWeek: [1, 2, 3, 4, 5, 6], // Thursday, Friday
            startTime: '13:30', // 10am
            endTime: '18:30' // 4pm
          },
          
        ],   
      selectConstraint:"businessHours",
      hiddenDays: [ 0 ],
      buttonText:{
		 today:    'hoje',
		 month:    'm??s',
		 week:     'semana',
		 day:      'dia'
	},

		locale:'pt-br',
      	headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialView: 'timeGridDay',
      initialDate: '<?php echo $inicio ?>', 
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      droppable: true,      
      selectable: true,
      selecHelper: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      eventOverlap: false,
      //second: 'hide',
      slotLabelFormat:
      {
      hour: 'numeric',
      minute: '2-digit',
      omitZeroMinute: false,
      },
  		
      //displayEventTime: false,
      allDaySlot: false,
      expandRows: true,
      events: '<?php echo URL_BASE ?>calendario/eventos.php', 
      eventDrop: function(info){
        console.log(info.event.id + info.event.title + " was dropped on " + info.event.start);
        //Atualiza data-hora
        $(document).ready(async function(){
            let newDate = new Date(info.event.start); 
            let month=((newDate.getMonth()+1)<9)?"0"+(newDate.getMonth()+1):newDate.getMonth()+1;
            let day=((newDate.getDate())<9)?"0"+newDate.getDate():newDate.getDate();
            let minutes=((newDate.getMinutes())<9)?"0"+newDate.getMinutes():newDate.getMinutes();
            newDate = `${newDate.getFullYear()}-${month}-${day} ${newDate.getHours()}:${minutes}:00`;         

            let newDateEnd = new Date(info.event.end); 
            let monthEnd=((newDateEnd.getMonth()+1)<9)?"0"+(newDateEnd.getMonth()+1):newDateEnd.getMonth()+1;
            let dayEnd=((newDateEnd.getDate())<9)?"0"+newDateEnd.getDate():newDateEnd.getDate();
            let minutesEnd=((newDateEnd.getMinutes())<9)?"0"+newDateEnd.getMinutes():newDateEnd.getMinutes();
            newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} ${newDateEnd.getHours()}:${minutesEnd}:00`;                    
            
            let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/UpdateDateController.php',{
              method:'POST',
              headers:{
                  'Content-Type':'application/x-www-form-urlencoded'
              },
              body:`id=${info.event.id}&start=${newDate}&end=${newDateEnd}`                  
            });
            let ress = await reqs.json();           
            window.location.href = '<?php echo URL_BASE ?>agenda?dat=' + ress;                                           
        });        
      },
      
      dateClick: function(info){
      if(info.view.type == 'timeGridDay'){
      		var dateClicked = new Date(info.dateStr).getTime();
      		for(let i=0; i < unavailableDays.length; i++){
      			var day1 = new Date(unavailableDays[i][0]).getTime();
      			var day2 = new Date(unavailableDays[i][1]).getTime();
      			
      			if(dateClicked > day1 && dateClicked < day2){
      			var dateClickedStatus = false;
      			breack;
      			} else {
      			var dateClickedStatus = true;
      		}
      	}
      	
      	if(dateClickedStatus){
      	}
      }
      },
      
//editar evento
      
      eventClick: async function(info) {      
        info.jsEvent.preventDefault();
        let idEvento = info.event._def.publicId;      	
        let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/EdicaoController.php',{
          method:'POST',
          headers:{
              'Content-Type':'application/x-www-form-urlencoded'
          },
          body:`id=${idEvento}`         
        });
        let ress = await reqs.json();   
        console.log(ress);   
        let dataInicio = new Date(ress.data_inicio);
        let dataInicioDate=(dataInicio.getDate()>9)?dataInicio.getDate():'0'+dataInicio.getDate();
        let dataInicioMes=((dataInicio.getMonth()+1)>9)?dataInicio.getMonth()+1:'0'+(dataInicio.getMonth()+1);
        let horaInicio = (dataInicio.getHours()>9)?+dataInicio.getHours():'0'+dataInicio.getHours();
        let minutoInicio = (dataInicio.getMinutes()>9)?+dataInicio.getMinutes():'0'+dataInicio.getMinutes();
        document.querySelector('#startEdit').value=dataInicioDate+'/'+dataInicioMes+'/'+dataInicio.getFullYear();
        document.querySelector('#horarioEdit').value=horaInicio+':'+minutoInicio;
        
        let dataFim = new Date(ress.data_fim);
        let dataFimDate=(dataFim.getDate()>9)?dataFim.getDate():'0'+dataFim.getDate();
        let dataFimMes=((dataFim.getMonth()+1)>9)?dataFim.getMonth()+1:'0'+(dataFim.getMonth()+1);
        let horaFim = (dataFim.getHours()>9)?+dataFim.getHours():'0'+dataFim.getHours();
        let minutoFim = (dataFim.getMinutes()>9)?+dataFim.getMinutes():'0'+dataFim.getMinutes();
        document.querySelector('#horarioEditFim').value=horaFim+':'+minutoFim;
        
        document.querySelector('#selectRespEdit').value = ress.id_responsavel;
   		document.getElementById('lancamento').innerHTML = ress.nome_usuario;
        document.querySelector('#idEvento').value = idEvento;
        
        //document.querySelector('#nome_usuario').value = ress.nome_usuario;
        

      	$('#exampleModalfat #startMostrar').text(info.event.start.toLocaleString('pt-br',{year: 'numeric', month: '2-digit', day: '2-digit'}));
      	$('#exampleModalfat #startMostrarHini').text(info.event.start.toLocaleString('pt-br',{hour: '2-digit', minute: '2-digit', second: '2-digit'}));
      	$('#exampleModalfat #startMostrarHfim').text(info.event.end.toLocaleString('pt-br',{hour: '2-digit', minute: '2-digit', second: '2-digit'}));
      	$('#exampleModalfat #end').val(info.event.end.toDateString());
        $('#exampleModalfat').modal('show');
      },
      
      selectable: true,
    	select: function(info) {
          $('#cadastrar #start').val(info.start.toLocaleString('pt-br', {year: 'numeric', month: '2-digit', day: '2-digit'}));
          $('#cadastrar #datadia').text(info.start.toLocaleString('pt-br',{year: 'numeric', month: '2-digit', day: '2-digit'}));
          $('#cadastrar #hstart').val(info.start.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit'}));
          $('#cadastrar #end').val(info.end.toLocaleString('pt-br', {year: 'numeric', month: '2-digit', day: '2-digit'}));
          $('#cadastrar #hend').val(info.end.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit', second: '2-digit'}));
          $('#cadastrar #final').val(info.end.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit'}));          
          var req = new XMLHttpRequest(); 
          req.onload = function() {
              console.log(this.responseText); 
          };
          req.open("get", "cad_event.php", true); 
          req.send();
          async function getHours(){                
            let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/HorasController.php',{
              method:'POST',
              headers:{
                  'Content-Type':'application/x-www-form-urlencoded'
              },
              body:`hstart=${document.querySelector('#hstart').value}&data=${document.querySelector('#start').value}`                  
            });
            let ress = await reqs.json();    
            if(ress == 'error'){
              alert('Hor??rio de almo??o incluso, gentileza entrar no dia e escolher outro hor??rio.');
            }else{
              let selEndHours = document.querySelector('#hend');
              selEndHours.options.length = 0;
              for (let i =0; i< ress.length; i++){                  
                  let opt = document.createElement('option');
                  opt.value = ress[i].fim;
                  opt.innerHTML = ress[i].fim;
                  selEndHours.appendChild(opt);
              }
              selEndHours.selectedIndex = 1;
              $('#cadastrar').modal('show');
            }            
          }     
          getHours();   
          verificaRepetidos();
          
    },    
    });
    calendar.render();  
    
    $('.btn-vis').on("click", function(){
    $('.visevent').slideToggle();
    $('.formedit').slideToggle();
    });
    
     $('.btn-can').on("click", function(){
     $('.formedit').slideToggle();
     $('.visevent').slideToggle();
     });
        
        
        $("input:radio[name=id_ocupacao]").on("change", function () {   
            if($(this).val() == "1")
            {
                $(".individual").show(); 
                $(".grupo").hide();
            }
            else if($(this).val() == "2")
            {
                $(".grupo").show(); 
                $(".individual").hide();   
            }
		});
        
  });


//Cadastrar eventos
$(document).ready(function(){
  $("#addevent").on("submit", async function (event){
      event.preventDefault();
      let form = document.querySelector('#addevent');
      let formData = new FormData(form);
      let reqs = await fetch('<?php echo URL_BASE ?>calendario/cad_event.php',{
        method:'POST',   
        dat:  $(start).serialize(),       
        body:formData
      });
      let ress = await reqs.json();
      var dt = document.querySelector('#start').value;
      window.location.href = '<?php echo URL_BASE ?>agenda?dat=' + dt;
  });
});

//Excluir eventos
$(document).ready(function(){
  $("#btnExcluir").on("click", async function (event){
      event.preventDefault();      
      if(confirm('Deseja mesmo apagar este dado?')){
        let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/ExclusaoController.php',{
        method:'POST',
        headers:{
            'Content-Type':'application/x-www-form-urlencoded'
        },
        body:`id=${document.querySelector('#idEvento').value}`                  
       });
        let ress = await reqs.json(); 
        var dt = document.querySelector('#startEdit').value;
        window.location.href = '<?php echo URL_BASE ?>agenda?dat=' + dt;
      }                       
  });
});


//Update dos eventos
$(document).ready(function(){
  $("#formUpdate").on("submit", async function (event){
      event.preventDefault();     
      let form = document.querySelector("#formUpdate"); 
      let formData = new FormData(form);
      let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/UpdateController.php',{
      method:'POST',
      body: formData                  
      });
      let ress = await reqs.json();             
      let dt = document.querySelector('#startEdit').value;
      window.location.href = '<?php echo URL_BASE ?>agenda?dat=' + dt;  
  });
});


//Verifica se o evento n??o esta repetido
async function verificaRepetidos()
{        
  let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/EventosRepetidosController.php',{
  method:'POST',
  headers:{
      'Content-Type':'application/x-www-form-urlencoded'
  },
  body:`data=${document.querySelector('#start').value}&hstart=${document.querySelector('#hstart').value}&hend=${document.querySelector('#hend').value}`                  
  });
  let ress = await reqs.json(); 
  if(ress === false){
    alert('J?? existe um evento marcado nesta data-hora, escolha outro hor??rio de fim!');
    document.querySelector('#hend').value='';
    document.querySelector('#hend').style.borderColor='red';
    setTimeout(()=>{
      document.querySelector('#hend').style.borderColor='#ccc';
    },6000);
  }      
}
$(document).ready(function(){
$("#hend").on("change",(e)=>verificaRepetidos());
});
</script>





                    <!??? modal de inser????o ???>
                      
                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar hor??rio na Sala - <span id="datadia"></span></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
                          </div>
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Hora inicial</label>
                            <div class="input-group">
                              <input readonly="readonly" id="hstart" class="form-control" type="text" name="hstart" placeholder="Hora Inicial" value="<?php echo ($inicio) ? date('Y-m-d', strtotime($inicio)) : null; ?>">                             
                                  </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Hora Final</label>
     
                            		<select class="form-control btn-square" id="hend" name="hend" required>

                                    </select>  
      
                         </div>
                        </div>
                        <div class="form-group row">
                         <div class="col-6">
                            <label for="select-1">Respons??vel</label>
									
                                    <select class="form-control btn-square" id="select-1" name="title" >
                                    		<option value="">Selecione o Respons??vel</option>
                                       		<?php foreach ($instrutores as $instrutor){
            								    echo "<option value='$instrutor->id_usuario'>$instrutor->nome_usuario</option>";
            								}?> 
                                    </select>            
                           		</div>
                        
                       <div class="col-6">
                            <label>Tipo de Ocupa????o:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao" checked="" value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao" value="2">Grupo
                              </label>
                            </div>
                          </div>
                  	</div>
                        
                             <script type="text/javascript">
                           		$(function(){
                           		$("#cliente<?php echo $id_h ?>").on("keyup", function(){
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
                            		  $("#cliente<?php echo $id_h ?>").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (j = 0; j < data.length; j++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente<?php echo $id_h ?>(this)"'
                            		  + 'data-idc="' + data[j].id_cliente +
                            		   '" data-nomec="' + data[j].nome + '">' +
                            		  data[j].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes").html(html);
                                    $(".listaClientes").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarCliente<?php echo $id_h ?>(obj){
                                	var idc = $(obj).attr("data-idc");
                                	var nomec = $(obj).attr("data-nomec");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#cliente<?php echo $id_h ?>").val(nomec);
                                	$("#id_cliente<?php echo $id_h ?>").val(idc);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Cliente <a data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo"><i class="icofont icofont-plus-circle"></i></a></label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_cliente<?php echo $id_h ?>" name="id_cliente" class="form-control">
                        	
                        		<input type="text" id="cliente<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		
                           		<script type="text/javascript">
                           		$(function(){
                           		$("#produto<?php echo $id_h ?>").on("keyup", function(){
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
                            		  $("#produto<?php echo $id_h ?>").after('<div class="listaProdutos"></div>');
                            	   html = "";
                            		for (i = 0; i < data.length; i++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProduto<?php echo $id_h ?>(this)"'
                            		  + 'data-id="' + data[i].id_produto +
                            		   '" data-nome="' + data[i].produto + '">' +
                            		  data[i].produto + '</a></div>';
                            		  
                            		}
                            		$(".listaProdutos").html(html);
                                    $(".listaProdutos").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarProduto<?php echo $id_h ?>(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produto<?php echo $id_h ?>").val(nome);
                                	$("#id_produto<?php echo $id_h ?>").val(id);
                                	listarLocalizacao(id);              	
                                };
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_produto<?php echo $id_h ?>" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>            
                           		</div>
                                               
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="N??mero do pedido" value="<?php echo $linha->pedido ? $linha->pedido : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Conclu??do</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($linha->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($linha->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observa????o:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observa????es"><?php echo ($linha->obs_treinamento) ? $linha->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                          <div class="modal-footer">
                          
                          <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                          <input type="hidden" name="id_responsavel" value="<?php echo $idi ?>">
                          <input type="hidden" name="id_formato" value="1">
                          
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                           <input type="hidden" name="pesquisar" value="sim">
                          
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent">Reservar Hor??rio</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <!??? modal de edi????o ???>
                    
                    <style>
                    
                      .visevent {
                        display: block;
                      }
                    
                      .formedit {
                        display: none;
                      }
                      
                      .grupo {
                        display: none;
                      }
                    
                      .individual {
                        display: block;
                      }

                    </style>
                    
                    <div class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                    
                    	<div class="visevent">
                    	
                    	<div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Detalhes do Evento </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Respons??vel: <span id="lancamento"></span></label>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Data do Evento: </label>
                                      <span id="startMostrar"></span>
                           		</div>
                        </div>
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Hora do In??cio: </label>
                              <span id="startMostrarHini"></span>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Hor??rio do Fim: </label>
                                      <span id="startMostrarHfim"></span>
                           		</div>
                        </div>

                        
                        <div class="form-group">
                            <label>Tipo de Ocupa????o:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <?php echo ($linhai->id_ocupacao=="1") ? "Individual" : "Grupo"; ?>
                              </label>
                            </div>
                          </div>
                        
							
                        
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                            
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                                
                           		</div>
                           		
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <?php echo ($linhai->pedido) ? $linhai->pedido : null ?>
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                                  
                           		</div>
                           		</div>
                              	<div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Conclu??do</label>
                                <label class="switch">
                                    <?php echo ($linhai->concluido=="s") ? "Sim" : null?>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                  <?php echo ($linhai->certificado=="s") ? "Sim" : null?>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observa????o:</label>
                                <?php echo ($linhai->obs_treinamento) ? $linhai->obs_treinamento : null ?>
                              </div>
                                 </div>
                          <div class="modal-footer">

                            <button class="btn btn-primary btn-vis" type="button">Editar</button>

                          </div>
                        </div>
                    	
                    	</div>
                    	<!- visevent ->
                    
                         
                      <div class="formedit"> 
                          <form action="<?php echo URL_BASE . "cliente/salvar" ?>" id="formUpdate" name="formUpdate" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                          <input type="hidden" name='idEvento' id='idEvento'>


                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar hor??rio </h5>
                            
                            
                          </div>
                          <div class="modal-body">

                          <div class="form-group row">
                         <div class="col-6">
                            <label for="select-1">Respons??vel</label>
									
                                    <select class="form-control btn-square" id="selectRespEdit" name="selectRespEdit" >
                                    		<option value="">Selecione o Respons??vel</option>
                                       		<?php foreach ($instrutores as $instrutor){
            								    echo "<option value='$instrutor->id_usuario'>$instrutor->nome_usuario</option>";
            								}?> 
                                    </select>            
                           		</div>
                           		<div class="col-6">
                          <label for="select-1">Data do Treinamento</label>
                            <div class="input-group">
                              <input id="startEdit" class="form-control" type="text" name="startEdit" placeholder="Data do Evento" value="" disabled> 

                            </div>
                          </div>
                           		
                               </div>

                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Hora do In??cio</label>
                            <div class="input-group">
                              <input id="horarioEdit" class="form-control" type="text" name="horarioEdit" placeholder="Data do Evento" value="" disabled>

                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Hora do Fim</label>
                            		 <input id="horarioEditFim" class="form-control" type="text" name="horarioEditFim" placeholder="Data do Evento" value="" disabled>
                                    </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Tipo de Ocupa????o:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated btn-ind" id="edo-ani" type="radio" name="id_ocupacao" <?php echo ($linhai->id_ocupacao=="1") ? "checked" : null?> value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated btn-grp" id="edo-ani1" type="radio" name="id_ocupacao" <?php echo ($linhai->id_ocupacao=="2") ? "checked" : null?> value="2">Grupo
                              </label>
                            </div>
                          </div>
                        
                         <!??? escolher grupo ???>
                         <div class="grupo">
                         AQUI ?? POR GRUPO
                         </div>
                         
                         
                         <div class="individual">
                        
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                    <select class="form-control btn-square" id="select-1" name="id_cliente" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
                                       		    $selecionado = ($cliente->id_cliente == $linhai->id_cliente) ? "selected" :"";
            								    echo "<option value='$cliente->id_cliente' $selecionado>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_produto" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
                                       		    $selecionado = ($produto->id_produto == $linhai->id_produto) ? "selected" :"";
            								    echo "<option value='$produto->id_produto' $selecionado>$produto->produto</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input  autocomplete="off" class="form-control" type="text" name="pedido" placeholder="N??mero do pedido" value="<?php echo ($linhai->pedido) ? $linhai->pedido : null ?>">
                           		</div><div id="id" ></div><div id="title" ></div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
                                       		    $selecionado = ($uso->id_uso == $linhai->id_uso) ? "selected" :"";
            								    echo "<option value='$uso->id_uso' $selecionado>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Conclu??do</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s" <?php echo ($linhai->concluido=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s" <?php echo ($linhai->certificado=="s") ? "checked" : null?>><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observa????o:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observa????es"><?php echo ($linhai->obs_treinamento) ? $linhai->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                                 
                                 </div>
                                 
                          <div class="modal-footer">
                           <input type="hidden" name="data_e" value="<?php echo ($inicio) ? date('Ymd', strtotime($inicio)) : null; ?>">
                          <input type="hidden" name="id_horario" value="<?php echo ($hora->id_horario) ? $hora->id_horario : null ?>">
                    
                          <input type="hidden" name="id_responsavel" value="<?php echo $linhai->id_responsavel ?>">
                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                          <input type="hidden" name="pesquisar" value="sim">
                          <input type="hidden" name="id_treinamento" value="<?php echo $linhai->id_treinamento ?>">
                          <input type="hidden" name="id_formato" value="<?php echo $linhai->id_formato ?>">
                          <button class="btn btn-secondary btn-can" type="button" data-bs-dismiss="modal">Cancelar</button>
                          <input type="submit" value="Modificar" class="btn btn-primary" id="btnUpdate">
                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal" id='btnExcluir'>Excluir</button>
                          </div>
                        </div>
                        </form>
                        
                        </div>
                        
                      </div>
                    </div>

<!??? modal de cliente ???>
                              <div style="z-index:1044" class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente" aria-hidden="true">
                              <div class="modal-dialog" role="document">
        
                               <form action="<?php echo URL_BASE . "cliente/salvar" ?>" method="Post" enctype="multipart/form-data" class="theme-form mega-form">
                                      
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Novo Cliente</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="card-body">
                              <div class="mb-3">
                                    <label class="col-form-label">Tipo de Cadastro</label>
                                 		<div class="col">
                                <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                                  <div class="radio radio-primary">
                                    <input checked id="radioinline1" type="radio" name="pf_pj" value="pf">
                                    <label class="mb-0" for="radioinline1">Pessoa F??sica</label>
                                  </div>
                                  <div class="radio radio-primary">
                                    <input id="radioinline2" type="radio" name="pf_pj" value="pj">
                                    <label class="mb-0" for="radioinline2">Pessoa Jur??dica</label>
                                  </div>
                                </div>
                              </div>
                                         
                              </div>

                                  <div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Raz??o Social</label>
                                    <input  class="form-control" name="nome" type="text" placeholder="Nome" value="">
                                  </div>
                                   <div class="mb-3">
                                    <label class="col-form-label">Celular do Cliente (Somente N??meros com DDD)<i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                                    <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="">
                                  </div>
                                  <div class="mb-3">
                                    <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                                    <input class="form-control" name="email" type="text" placeholder="Email" value="">
                                  </div>
        
                              </div>
                                  <div class="modal-footer">
                                  	<input type="hidden" name="volta_instrutor" value="sim">
                                  	<input type="hidden" name="id_formato" value="1">
                                  			<input type="hidden" name="id_instrutor" value="<?php echo $idi; ?>">
                                          <input type="hidden" name="data_inicio1" value="<?php echo $inicioBR; ?>">
                                          <input type="hidden" name="data_fim1" value="<?php echo $fimBR; ?>">
                                          <input type="hidden" name="pesquisar" value="sim">
                                    <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" value="Enviar" class="btn btn-primary">
                                  </div>
                                </div>
                                </form>
                              </div>
                            </div>
                           <!??? modal de cliente ???>

		<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Treinamentos </h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">Agenda Instrutores</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                  <a  class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModalMassa" data-whatever="@mdo">Reservar em massa</a>
                   <a  class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>
                 	<a class="btn btn-success btn-xs" href="<?php echo URL_BASE . "instrutor/exportar"?>">Exportar Excel</a>	             		
                   	</ul>
                  </div>
                  
                  <div class="card-body btn-showcase">
                 
                 
                 
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
  

          <!-- Container-fluid starts-->
          <div class="container-fluid list-products">
            <div class="row">
              
              <div class="col-sm-12">
                <div class="card">
                  
                  <div class="card-block row">
                    <div class="card-body">
						<?php 
						if(isset($_SESSION['msg'])){
						    echo $_SESSION['msg'];
						    unset($_SESSION['msg']);
						}
						?>
                        <div id='calendar'></div>
                    
                    </div>
                  </div>
                </div>
              </div>
              
                 

            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        