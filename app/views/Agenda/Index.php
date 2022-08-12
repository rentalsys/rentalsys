<?php include_once 'db.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>

<?php 
session_start();
?>
<?php 
//acessos
$user_inserir = $_SESSION[SESSION_LOGIN]->inserir;
$user_excluir = $_SESSION[SESSION_LOGIN]->excluir;
$user_editar = $_SESSION[SESSION_LOGIN]->editar;
$user_instrutor = $_SESSION[SESSION_LOGIN]->instrutor;
$user_usuario = $_SESSION[SESSION_LOGIN]->id_usuario;
$user_aprofessor = $_SESSION[SESSION_LOGIN]->aprofessor;
$user_geral = $_SESSION[SESSION_LOGIN]->geral;
$user_idsetor = $_SESSION[SESSION_LOGIN]->id_setor;
$user_id = $_SESSION[SESSION_LOGIN]->id_usuario;
$user_nome = $_SESSION[SESSION_LOGIN]->nome_usuario;

?>
<meta http-equiv="refresh" content="520;url=#">
<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
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
								.listaClientes1{
                                        text-align:left;
                                    	position:absolute;
                                    	left:30px;
                                    	right:15px;
                                    	top:165px;
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
    
      height: 'auto',
      expandRows: true,
      slotMinTime: '09:00',
      slotMaxTime: '20:30',
      slotDuration: '00:30',
      slotLabelInterval: '00:30',
      //showNonCurrentDates: false,
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
            endTime: '20:30' // 4pm
          },
          
        ],   
      //selectConstraint:"businessHours",
      hiddenDays: [ 0 ],
      buttonText:{
		 today:    'hoje',
		 month:    'mês',
		 week:     'semana',
		 day:      'dia'
	},
	
	selectOverlap: function(event) {
    // Here you will get all background events which are on same time.
    	console.log(event);
    	return event.rendering === 'background';
		},

		locale:'pt-br',
      	headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialView: 'timeGridWeek',
      initialDate: '<?php echo $inicio ?>', 
      navLinks: true, // can click day/week names to navigate views
      
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
  	  <?php if($user_editar =="s" && $user_idsetor == 2){ ?>
      editable: true,
      droppable: true,  
      <?php } else {} ?> 
      displayEventTime: false,
      allDaySlot: false,
      expandRows: true,
      events: '<?php echo URL_BASE ?>calendario/eventos.php', 
      eventDrop: function(info){
        resizeAndDrop(info);
      },
      
      eventResize: function(info) {
        resizeAndDrop(info);
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
        let DataBR = document.querySelector('#startEdit').value;
        document.querySelector('#horarioEdit').value=horaInicio+':'+minutoInicio;
        
        let dataFim = new Date(ress.data_fim);
        let dataFimDate=(dataFim.getDate()>9)?dataFim.getDate():'0'+dataFim.getDate();
        let dataFimMes=((dataFim.getMonth()+1)>9)?dataFim.getMonth()+1:'0'+(dataFim.getMonth()+1);
        let horaFim = (dataFim.getHours()>9)?+dataFim.getHours():'0'+dataFim.getHours();
        let minutoFim = (dataFim.getMinutes()>9)?+dataFim.getMinutes():'0'+dataFim.getMinutes();
        document.querySelector('#horarioEditFim').value=horaFim+':'+minutoFim;
        document.querySelector('#selectRespEdit').value = ress.id_responsavel;
        document.querySelector('#selectClienteEdit').value = ress.id_cliente;
        document.querySelector('#selectUsoEdit').value = ress.id_uso;
        document.querySelector('#selectObsEdit').value = ress.obs_treinamento;
        document.querySelector('#EditPedido').value = ress.pedido;
        document.querySelector('#selectProdutoEdit').value = ress.id_produto;
        document.querySelector('#idEvento').value = idEvento;
        let ocupEdit = ress.id_ocupacao;
        if(ocupEdit == "1"){
        $("input[name=id_ocupacao][value='1']").prop("checked",true);
         		$(".individual").show(); 
                $(".grupo").hide();
        } else if(ocupEdit == "2"){
        $("input[name=id_ocupacao][value='2']").prop("checked",true);
        		$(".grupo").show(); 
                $(".individual").hide();
        };
       let e_concluido = ress.concluido;
        if(e_concluido == "s"){
        $("input[name=concluido][value='s']").prop("checked",true);
                 	$(".emitir").show();
         			$(".emitir2").show();
        } else {
        $("input[name=concluido][value='s']").prop("checked",false);
                	$(".emitir").hide();
        			$(".emitir2").hide();
        };
        
        let e_certificado = ress.certificado;
        if(e_certificado== "s"){
        $("input[name=certificado][value='s']").prop("checked",true);
        } else {
        $("input[name=certificado][value='s']").prop("checked",false);
        };
        
       let e_tipo = ress.id_tipo;
        if(e_tipo== "1"){
        $("input[name=id_tipo][value='1']").prop("checked",true);
        $("input[name=id_tipo][value='2']").prop("checked",false);
        } else {
        $("input[name=id_tipo][value='1']").prop("checked",false);
        $("input[name=id_tipo][value='2']").prop("checked",true);
        };
        
        //visualização
       var ider = ress.id_responsavel;
        var ide = ress.id_treinamento;
        var nome = ress.nome;
        var email = ress.email;
        var cpf = ress.cpf;
        var produto = ress.produto;
        var professor = ress.nome_usuario;
        var imagem_certificado = ress.imagem_certificado;
        $('.custom-certificado').attr('href', '<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=' + nome + '&email=' + email + '&cpf=' + cpf + '&data=' + DataBR + '&produto=' + produto + '&professor=' + professor + '&imagem=' + imagem_certificado);
        $('.custom-url').attr('href', '<?php echo URL_BASE . "treinamento"?>?ide=' + ide + '&dat=' + DataBR);
        document.getElementById('responsavel').innerHTML = ress.nome_usuario;
        document.getElementById('ocupacao').innerHTML = ress.ocupacao;
        document.getElementById('tipo').innerHTML = ress.tipo;
        let ocup = ress.id_ocupacao;
        if(ocup == "1")
            {
                $(".individual_r").show(); 
                $(".grupo_r").hide();
            }
            else if(ocup == "2")
            {
                $(".grupo_r").show(); 
                $(".individual_r").hide();   
            }
        
        document.getElementById('nomecliente').innerHTML = ress.nome;
        document.getElementById('nomeproduto').innerHTML = ress.produto;
        document.getElementById('produtonome').innerHTML = ress.produto;
        document.getElementById('numpedido').innerHTML = ress.pedido;
        document.getElementById('usoeq').innerHTML = ress.uso;
        let r_concluido = ress.concluido;
        if(r_concluido == "s"){
        document.getElementById('concluido').innerHTML = "Sim";
        } else {
        document.getElementById('concluido').innerHTML = "Não";
        }
        let r_certificado= ress.certificado;
        if(r_certificado == "s"){
        document.getElementById('certificado').innerHTML = "Sim";
        } else {
        document.getElementById('certificado').innerHTML = "Não";
        }
        document.getElementById('obs').innerHTML = ress.obs_treinamento;

      	$('#exampleModalfat #startMostrar').text(info.event.start.toLocaleString('pt-br',{year: 'numeric', month: '2-digit', day: '2-digit'}));
      	$('#exampleModalfat #startMostrarHini').text(info.event.start.toLocaleString('pt-br',{hour: '2-digit', minute: '2-digit', second: '2-digit'}));
      	$('#exampleModalfat #startMostrarHfim').text(info.event.end.toLocaleString('pt-br',{hour: '2-digit', minute: '2-digit', second: '2-digit'}));
      	$('#exampleModalfat #end').val(info.event.end.toDateString());
			
			if(ider == <?php echo $user_id; ?> || <?php if($user_idsetor > 0){ $fator = $user_idsetor; } else { $fator = 0; }; echo $fator; ?> == 2){
      	    $('#exampleModalfat').modal('show');
      	    } else {}

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
            //if(ress == 'error'){
             // alert('Horário de almoço incluso, gentileza entrar no dia e escolher outro horário.');
            //}else{
              let selEndHours = document.querySelector('#hend');
              selEndHours.options.length = 0;
              for (let i =0; i< ress.length; i++){                  
                  let opt = document.createElement('option');
                  opt.value = ress[i].fim;
                  opt.innerHTML = ress[i].fim;
                  selEndHours.appendChild(opt);
              //}
              selEndHours.selectedIndex = 1;
              // verifica se pode reservar horário
              <?php if($user_inserir =="s"){ ?>
               	$('#cadastrar').modal('show');
                <?php } else {}; ?>
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
		
		 $("input:radio[name=id_ocupacao_inserir]").on("change", function () {   
            if($(this).val() == "1")
            {
                $(".individualinserir").show(); 
                $(".grupoinserir").hide();
            }
            else if($(this).val() == "2")
            {
                $(".grupoinserir").show(); 
                $(".individualinserir").hide();   
            }
		});
        
  });


<?php if($user_inserir =="s"){ ?>


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

<?php } else {}?>

<?php if($user_excluir =="s"){ ?>

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
<?php } else {}?>

<?php if($user_editar =="s"){ ?>
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

 <?php if($user_inserir =="s" && $user_idsetor == 2){ ?>

//Função de arrastar e redimensionar enventos
//console.log(info.event.id + info.event.title + " was dropped on " + info.event.start);      
async function resizeAndDrop(info){
    let newDate = new Date(info.event.start); 
    let month=((newDate.getMonth()+1)<9)?"0"+(newDate.getMonth()+1):newDate.getMonth()+1;
    let day=((newDate.getDate())<9)?"0"+newDate.getDate():newDate.getDate();
    let minutes=((newDate.getMinutes())<9)?"0"+newDate.getMinutes():newDate.getMinutes();
    
    if(newDate.getHours() < 9){
    alert('horário inicial inválido, irá ser mudado para 09:00');
    newDate = `${newDate.getFullYear()}-${month}-${day} 9:00:00`; 
    location.reload();
    //return false;
    } else {
    newDate = `${newDate.getFullYear()}-${month}-${day} ${newDate.getHours()}:${minutes}:00`;
    }

    let newDateEnd = new Date(info.event.end); 
    let monthEnd=((newDateEnd.getMonth()+1)<9)?"0"+(newDateEnd.getMonth()+1):newDateEnd.getMonth()+1;
    let dayEnd=((newDateEnd.getDate())<9)?"0"+newDateEnd.getDate():newDateEnd.getDate();
    let minutesEnd=((newDateEnd.getMinutes())<9)?"0"+newDateEnd.getMinutes():newDateEnd.getMinutes();
    
    if((newDateEnd.getHours() + ":" + newDateEnd.getMinutes()) > '20:30'){
    alert('horário final inválido, irá ser modificado para 20:30');
    newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} 20:30:00`; 
    location.reload();
    //return false;
    } else {
    newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} ${newDateEnd.getHours()}:${minutesEnd}:00`;   
    }
    
                     
    
    let reqs = await fetch('<?php echo URL_BASE ?>app/views/Agenda/controllers/UpdateDateController.php',{
      method:'POST',
      headers:{
          'Content-Type':'application/x-www-form-urlencoded'
      },
      body:`id=${info.event.id}&start=${newDate}&end=${newDateEnd}`                  
    });
    let ress = await reqs.json();           
    window.location.href = '<?php echo URL_BASE ?>agenda?dat=' + ress;                                           
}

<?php } else {}?>

<?php } else {}?>

//Verifica se o evento não esta repetido
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
    alert('Já existe um evento marcado nesta data-hora, escolha outro horário de fim!');
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





                    <!– modal de inserção –>
                    
                    <style>

                      .grupoinserir {
                        display: none;
                      }
                    
                      .individualinserir {
                        display: block;
                      }

                    </style>

                      <div style="z-index:1041" class="modal fade bd-example-modal-lg" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar horário na Sala - <span id="datadia"></span></h5>
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
                        <script>
                           function vazio() {
                             var x;
                             x = document.getElementById("select-1").value;
                             if ((x == "")||(x == null)) {
                                alert("Selecione um responsável");
                                return false;
                             };
                             let ini = document.getElementById("hstart").value;
                             let fi = document.getElementById("hend").value;
                             if ((ini+':00') == fi) {
                                alert("Selecione um horário diferente do de início");
                                return false;
                             };
                          }
        				</script>
                        <div class="form-group row">
                         <div class="col-6">
                            <label for="select-1">Responsável</label>
									<?php if($user_idsetor == 2){?>
                                    <select class="form-control btn-square" id="select-1" name="id_responsavel" >
                                    		<option value="">Selecione o Responsável</option>
                                       		<?php foreach ($instrutores as $instrutor){
            								    echo "<option value='$instrutor->id_usuario'>$instrutor->nome_usuario</option>";
            								}?> 
                                    </select>
                                    <?php } else { echo "<br>".$user_nome;?>
                                    <input type="hidden" name="id_responsavel" class="form-control" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario; ?>">      
                                    <?php } ?>             
                           		</div>
                        
                       <div class="col-6">
                            <label>Ocupação:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-ani" type="radio" name="id_ocupacao_inserir" checked="" value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-ani1" type="radio" name="id_ocupacao_inserir" value="2">Grupo
                              </label>
                            </div>
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
                  	
                  	     <!– escolher grupo –>
                         <div class="grupoinserir">
                         </div>
                         
                         
                         <div class="individualinserir">
                        
                             <script type="text/javascript">
                           		$(function(){
                           		$("#cliente").on("keyup", function(){
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
                            		  $("#cliente").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (j = 0; j < data.length; j++) {		  
                            		  html +='<div class="s"><a href="javascript:;" onclick="selecionarCliente(this)"'
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
                                
                                function selecionarCliente(obj){
                                	var idc = $(obj).attr("data-idc");
                                	var nomec = $(obj).attr("data-nomec");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#cliente").val(nomec);
                                	$("#id_cliente").val(idc);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Cliente</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_cliente" name="id_cliente" class="form-control">
                        	
                        		<input type="text" id="cliente" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		
                           		
                                               
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo $linha->pedido ? $linha->pedido : null ?>">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="1">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                              	<div class="media">
                                
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido_insert" value="s"><span class="switch-state"></span>
                                  </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado_insert" value="s"><span class="switch-state"></span>
                                  </label>
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linha->obs_treinamento) ? $linha->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                          	<input type="hidden" name="id_formato" value="1">
                          	<input type="hidden" name="id_tipo" value="3">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent" onClick="return vazio()">Reservar Horário</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>
                    
                    <!– modal de edição –>
                    
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
                    
                    <div style="z-index:1042" class="modal fade" id="exampleModalfat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                          <label for="select-1">Responsável: <span id="responsavel"></span></label>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Data do Evento: </label>
                                      <span id="startMostrar"></span>
                           		</div>
                        </div>
                          <div class="form-group row">
                          <div class="col-6">
                          <label for="select-1">Hora do Início: </label>
                              <span id="startMostrarHini"></span>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Horário do Fim: </label>
                                      <span id="startMostrarHfim"></span>
                           		</div>
                        </div>

                        <div class="form-group row">
                        <div class="col-6">
                        <div class="form-group">
                            <label>Ocupação: <span id="ocupacao"></span></label>
                          </div>
                        
                        </div>
                        <div class="col-6">
                        <div class="form-group">
                            <label>Tipo: <span id="tipo"></span></label>
                          </div>
                        
                        </div>
                        </div>
                        <div class="mb-2">
                            		<label for="select-1">Equipamento: <span id="nomeproduto"></span>  </label>
                                                
                           		</div>
                         
                         
                         <div class="individual_r">
							
                        
                                <div class="mb-2">
                            <label for="select-1">Cliente: <span id="nomecliente"></span> </label>
                                            
                           		</div>
                           		
                           		
                           		
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido: <span id="numpedido"></span></label>
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento: <span id="usoeq"></span></label>
                                                  
                           		</div>
                           		</div>
                              	<div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído: <span id="concluido"></span></label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado:  <span id="certificado"></span> </label>
                                  <label  class="col-form-label m-r-10 emitir" style="padding-left:3px" ><a id="emitir" class="custom-certificado" href="#" target="_blank" id="custom-certificado"><i data-feather="award"></i></a> </label>
                                  
                              	</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação: <span id="obs"></span></label>
                              </div>
                          </div>
                          
                           </div>
                          <div class="modal-footer">
                          
							<!– escolher grupo –>
                         <div class="grupo_r">
                         <a  class="btn btn-warning-gradien custom-url" href="#"><i class="icofont icofont-people"></i> VER GRUPO</a>
                         </div>
                         <?php if($user_editar =="s"){ ?>
                            <button class="btn btn-primary btn-vis" type="button">Editar</button>
						<?php } else {}?>
                          </div>
                        </div>
                    	
                    	</div>
                    	<!- visevent ->
                    
                         
                      <div class="formedit"> 
                          <form action="<?php echo URL_BASE . "cliente/salvar" ?>" id="formUpdate" name="formUpdate" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                          <input type="hidden" name='idEvento' id='idEvento'>


                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Editar horário </h5>
                            
                            
                          </div>
                          <div class="modal-body">

                          <div class="form-group row">
                         <div class="col-6">
                            <label for="select-1">Responsável</label>
                                    <select class="form-control btn-square" id="selectRespEdit" name="selectRespEdit" >
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
                          <label for="select-1">Hora do Início</label>
                            <div class="input-group">
                              <input id="horarioEdit" class="form-control" type="text" name="horarioEdit" placeholder="Data do Evento" value="" disabled>

                            </div>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Hora do Fim</label>
                            		 <input id="horarioEditFim" class="form-control" type="text" name="horarioEditFim" placeholder="Data do Evento" value="" disabled>
                                    </div>
                        </div>
                        
                        <div class="form-group row">
                        <div class="col-6">
                            <label>Ocupação:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated btn-ind" id="edo-ani" type="radio" name="id_ocupacao" value="1">Individual
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated btn-grp" id="edo-ani1" type="radio" name="id_ocupacao" value="2">Grupo
                              </label>
                            </div>
                          </div>
                          <div class="col-6">
                            <label>Tipo:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated btn-ind" id="id_tipo" type="radio" name="id_tipo" value="1">Venda
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated btn-grp" id="id_tipo1" type="radio" name="id_tipo" value="2">Locação
                              </label>
                            </div>
                          </div>
                          
                           </div>
                        
                         <div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                     
                                    
                                    <?php if($user_idsetor == 2){?>
                                    <select class="form-control btn-square" id="selectProdutoEdit" name="selectProdutoEdit" >
                                      		<option value="">Selecione o Equipamento</option>
                                       		<?php foreach ($produtos as $produto){
            								    echo "<option value='$produto->id_produto'>$produto->produto</option>";
            								}?> 
                                    </select>    
                                    <span id="produtonome" style="display:none;"></span>
                                    <?php } else {?><br>
                                    <span id="produtonome"></span>
                                    <input type="hidden" name="selectProdutoEdit" id="selectProdutoEdit" class="form-control" value="">      
                                    <?php } ?>                  
                           		</div>
                         
                         
                         <div class="individual">
                        
                                <div class="mb-2">
                            <label for="select-1">Cliente</label>
                                    <select class="form-control btn-square" id="selectClienteEdit" name="selectClienteEdit" >
                                      		<option value="">Selecione o Cliente</option>
                                       		<?php foreach ($clientes as $cliente){
            								    echo "<option value='$cliente->id_cliente'>$cliente->nome</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		
                           		
                           		
                           		<div class="form-group row">
                           		<div class="col-6">
                            		<label for="select-1">Pedido</label>
                                      <input  autocomplete="off" class="form-control" type="text" id="EditPedido" name="EditPedido" placeholder="Número do pedido" value="">
                           		</div>
                           		<div class="col-6">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="selectUsoEdit" name="selectUsoEdit" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		</div>
                           		<div class="form-group row">
                              	
                              	<div class="col-4">
                              	<div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s"><span class="switch-state"></span>
                                  </label>
                                  </div>
                                  </div>
                                  <div class="col-4">
                                  <div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s"><span class="switch-state"></span> 
                                  </label>
                                   </div>

                              	</div>
                              	
                              	<div class="col-4">
                              	<div class="media emitir2">
                                  <label class="col-form-label m-r-10" style="padding-left:3px"> Emitir Certificado </label>
                                <label class="switch">
                                    <a id="emitir" class="custom-certificado" href="#" target="_blank" id="custom-certificado"><i data-feather="award"></i></a> 
                                  </label>
                                  </div>
                                  </div>
                           		</div>
                           		
                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="selectObsEdit" id="selectObsEdit" placeholder="Observações"><?php echo ($linhai->obs_treinamento) ? $linhai->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                                 
                                 </div>
                                 
                          <div class="modal-footer">
                          <input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario; ?>">
                          <!– escolher grupo –>
                         <div class="grupo">
                         <a  class="btn btn-warning-gradien custom-url" href="#"><i class="icofont icofont-people"></i> VER GRUPO</a>
                         </div>
                          <button class="btn btn-secondary btn-can" type="button" data-bs-dismiss="modal">Cancelar</button>
                          <?php if($user_editar =="s"){ ?>
                          <input type="submit" value="Modificar" class="btn btn-primary" id="btnUpdate">
                          <?php } else {}?>
                          <?php if($user_excluir =="s"){ ?>
                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal" id='btnExcluir'>Excluir</button>
                          <?php } else {}?>
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
                              <div style="z-index:1043" class="modal fade" id="exampleModalCliente<?php echo $id_h ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente<?php echo $id_h ?>" aria-hidden="true">
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
                                	$("#cliente<?php echo $id_h ?>").val(nomep);
                                	$("#id_cliente<?php echo $id_h ?>").val(idp);
                                	alert('O cliente '+ nomep +' já existe e já pode ser inserido no grupo!');
                                	$('#exampleModalCliente').modal('hide'); 
                                	
                                }
                           		</script>
                           		
                           		<div class="mb-3">
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input  class="form-control" name="nome" id="nome" type="text" placeholder="Nome" value="" autocomplete="off" required="required">
                                  </div>
                                  
                                   <div class="mb-3">
                                  <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Esolher o período doEvento</button>
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
                                  	<input type="hidden" name="volta_professor" value="sim">
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
                           

		<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Agenda da Sala de Treinamento</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">Agenda da Sala</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
				<?php if($user_aprofessor == "s"){ ?>
                  <a  class="btn btn-primary" href="<?php echo URL_BASE . "professor"?>">Agenda dos Professores</a>
                  <?php } else {}?>
                  
                  <?php if($user_geral == "s"){ ?>
                   <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>	
                   <?php } else {}?>
                  	
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
            
            <div class="col-md-12 project-list">

                         <?php 
                        $dados = $conex->query("SELECT * FROM   usuario
                                WHERE
                                usuario_sala = 's'");
                        $dados->execute();
                        $professores = $dados->fetchALL(PDO::FETCH_OBJ);
                        $id_e = $linha->id_treinamento;
                        ?>
                  
                  
                  <?php foreach ($professores as $cor){?>
                  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:15px;"><i class="icofont icofont-ui-press" style="color:<?php echo $cor->color; ?>"></i> <?php echo $cor->nome_usuario; ?></span>
                  <?php } ?>

              </div>
              
              <div class="col-sm-12">
                <div class="card">
                  
                  <div class="card-block row">
                    <div class="card-body">
						
                        <script>

                    function tempoatualiza(){
                    
                    setInterval("atualiza()",5000);
                    
                    }
                    
                    function atualiza(){
                    
                    document.getElementById('calendar').innerHTML = location.reload();
                    
                    }
                    
                    </script>
						
                        <div id='calendar' onload="tempoatualiza();"></div>
                    
                    </div>
                  </div>
                </div>
              </div>
              
                 

            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        