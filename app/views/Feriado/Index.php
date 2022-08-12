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
    
      height: 'auto',
      expandRows: true,
      slotMinTime: '09:00',
      slotMaxTime: '18:30',
      businessHours: [ // specify an array instead
          {
            daysOfWeek: [ 1, 2, 3, 4, 5, 6], // Monday, Tuesday, Wednesday
            startTime: '09:00', // 8am
            endTime: '18:30', // 6pm
            selectable: true,
          },

        ],   
      buttonText:{
		 today:    'hoje',
		 month:    'mês',
		 week:     'semana',
		 day:      'dia'
	},

		locale:'pt-br',
      	headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: ''
      },
      	selectOverlap: function(event) {
    // Here you will get all background events which are on same time.
    	console.log(event);
    	return event.rendering === 'background';
		},
      initialView: 'dayGridMonth',
      initialDate: '<?php echo $inicio ?>', 
      <?php if($user_inserir =="s"){ ?>
      editable: true,
      droppable: true,  
      <?php } else {} ?>    
      selectable: true,
      selecHelper: true,
      nowIndicator: true,
      eventOverlap: false,
      //second: 'hide',
      slotLabelFormat:
      {
      hour: 'numeric',
      minute: '2-digit',
      omitZeroMinute: false,
      },
  		
      displayEventTime: false,
      allDaySlot: false,
      expandRows: true,
      events: '<?php echo URL_BASE ?>calendario/eventos_feriado.php', 
      eventDrop: function(info){
        resizeAndDrop(info);
      },
      eventResize: function(info) {
        resizeAndDrop(info);
      },
      
      
      
//editar evento
      
      eventClick: async function(info) { 
           
        info.jsEvent.preventDefault();
        let idEvento = info.event._def.publicId;      	
        let reqs = await fetch('<?php echo URL_BASE ?>app/views/Feriado/controllers/EdicaoController.php',{
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
        
        let dataFim = new Date(ress.data_fim);
        let dataFimDate=(dataFim.getDate()>9)?dataFim.getDate():'0'+dataFim.getDate();
        let dataFimMes=((dataFim.getMonth()+1)>9)?dataFim.getMonth()+1:'0'+(dataFim.getMonth()+1);
        let horaFim = (dataFim.getHours()>9)?+dataFim.getHours():'0'+dataFim.getHours();
        let minutoFim = (dataFim.getMinutes()>9)?+dataFim.getMinutes():'0'+dataFim.getMinutes();
        document.querySelector('#feriadoEdit').value = ress.titulo_feriado;
        document.querySelector('#idEvento').value = idEvento;

        
       
        
      
        
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
        document.getElementById('titulo_feriado').innerHTML = ress.titulo_feriado;

      	$('#exampleModalfat #startMostrar').text(info.event.start.toLocaleString('pt-br',{year: 'numeric', month: '2-digit', day: '2-digit'}));

      	
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
          req.open("get", "cad_event_feriado.php", true); 
          req.send();
   

              // verifica se pode reservar horário
              <?php if($user_inserir =="s"){ ?>
              $('#cadastrar').modal('show');
              <?php } else {}; ?>
          
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
      let reqs = await fetch('<?php echo URL_BASE ?>calendario/cad_event_feriado.php',{
        method:'POST',   
        dat:  $(start).serialize(),       
        body:formData
      });
      let ress = await reqs.json();
      var dt = document.querySelector('#start').value;
      window.location.href = '<?php echo URL_BASE ?>feriado?dat=' + dt;
  });
});

<?php } else {}?>

<?php if($user_excluir =="s"){ ?>

//Excluir eventos
$(document).ready(function(){
  $("#btnExcluir").on("click", async function (event){
      event.preventDefault();      
      if(confirm('Deseja mesmo apagar este dado?')){
        let reqs = await fetch('<?php echo URL_BASE ?>app/views/Feriado/controllers/ExclusaoController.php',{
        method:'POST',
        headers:{
            'Content-Type':'application/x-www-form-urlencoded'
        },
        body:`id=${document.querySelector('#idEvento').value}`                  
       });
        let ress = await reqs.json(); 
        var dt = document.querySelector('#startEdit').value;
        window.location.href = '<?php echo URL_BASE ?>feriado?dat=' + dt;
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
      let reqs = await fetch('<?php echo URL_BASE ?>app/views/Feriado/controllers/UpdateController.php',{
      method:'POST',
      body: formData                  
      });
      let ress = await reqs.json();             
      let dt = document.querySelector('#startEdit').value;
      window.location.href = '<?php echo URL_BASE ?>feriado?dat=' + dt;  
  });
});

 <?php if($user_inserir =="s"){ ?>
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
    
    if((newDateEnd.getHours() + ":" + newDateEnd.getMinutes()) > '18:30'){
    alert('horário final inválido, irá ser modificado para 18:30');
    newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} 18:30:00`; 
    location.reload();
    //return false;
    } else {
    newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} ${newDateEnd.getHours()}:${minutesEnd}:00`;   
    }
    
                     
    
    let reqs = await fetch('<?php echo URL_BASE ?>app/views/Feriado/controllers/UpdateDateController.php',{
      method:'POST',
      headers:{
          'Content-Type':'application/x-www-form-urlencoded'
      },
      body:`id=${info.event.id}&start=${newDate}&end=${newDateEnd}`                  
    });
    let ress = await reqs.json();           
    window.location.href = '<?php echo URL_BASE ?>feriado?dat=' + ress;                                           
}
<?php } else {}?>

<?php } else {}?>

//Verifica se o evento não esta repetido
async function verificaRepetidos()
{        
  let reqs = await fetch('<?php echo URL_BASE ?>app/views/Feriado/controllers/EventosRepetidosController.php',{
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
                            <h5 class="modal-title" id="exampleModalLabel2">Cadastrar Feriado - <span id="datadia"></span></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
                          </div>
                         
                           		
                           		<div class="mb-2">
                            		<label for="select-1">Nome do Feriado</label>
                                    <div class="col-12 position-relative">
                        		<input type="text" id="nome_feriado" name="nome_feriado" class="form-control" placeholder="Digite nome do feriado" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                     			
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                          	<input type="hidden" name="id_formato" value="1">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent">Cadastrar Feriado</button>
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
                          <label for="select-1">Feriado: <span id="titulo_feriado"></span></label>
                          </div>
                          <div class="col-6">
                            		<label for="select-1">Data do Evento: </label>
                                      <span id="startMostrar"></span>
                           		</div>
                        </div>
                         

                       
                         <div class="individual_r">

                          </div>
                          
                           </div>
                          <div class="modal-footer">
                          
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
                            <label for="select-1">Nome do Feriado</label>
									<input id="feriadoEdit" class="form-control" type="text" name="feriadoEdit" placeholder="Nome do Feriado" value=""> 
                
                           		</div>
                           		<div class="col-6">
                          <label for="select-1">Data do Feriado</label>
                            <div class="input-group">
                              <input id="startEdit" class="form-control" type="text" name="startEdit" placeholder="Data do Evento" value="" disabled> 

                            </div>
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
                    
                    
                    <!– modal de cliente –>
                              <div style="z-index:1043" class="modal fade" id="exampleModalCliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalCliente" aria-hidden="true">
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
                                    <label class="col-form-label">Nome do Cliente / Razão Social</label>
                                    <input  class="form-control" name="nome" type="text" placeholder="Nome" value="">
                                  </div>
                                   <div class="mb-3">
                                    <label class="col-form-label">Celular do Cliente (Somente Números com DDD) <i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i></label>
                                    <input class="form-control mascara-celular" name="celular" type="text" placeholder="Celular" value="">
                                  </div>
                                  <div class="mb-3">
                                    <label class="col-form-label">Email do Cliente <i class="icofont icofont-ui-email"></i></label>
                                    <input class="form-control" name="email" type="text" placeholder="Email" value="">
                                  </div>
        
                              </div>
                                  <div class="modal-footer">
                                  	<input type="hidden" name="volta_feriado" value="sim">
                                     <input type="hidden" name="ide" value="<?php echo $inicioBR; ?>">
                                    <button class="btn btn-secondary" type="submit" data-bs-dismiss="modal">Cancelar</button>
                                    <input type="submit" value="Enviar" class="btn btn-primary">
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
                  <h3>Feriados e Outras Datas Bloqueadas</h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">Feriados</li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
				<a  class="btn btn-primary" href="<?php echo URL_BASE . "agenda"?>">Agenda da Sala</a>
                  <?php if($user_aprofessor == "s"){ ?>
                  <a  class="btn btn-primary" href="<?php echo URL_BASE . "professor"?>">Agenda dos Professores</a>
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
              </div>
              
              <div class="col-sm-12">
                <div class="card">
                  
                  <div class="card-block row">
                    <div class="card-body">

                        <div id='calendar'></div>
                    
                    </div>
                  </div>
                </div>
              </div>
              
                 

            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        