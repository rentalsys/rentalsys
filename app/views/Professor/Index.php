<?php include_once 'db.php';?>
<?php 
//acessos
$user_inserir = $_SESSION[SESSION_LOGIN]->inserir;
$user_excluir = $_SESSION[SESSION_LOGIN]->excluir;
$user_editar = $_SESSION[SESSION_LOGIN]->editar;
$user_instrutor = $_SESSION[SESSION_LOGIN]->instrutor;
$user_usuario = $_SESSION[SESSION_LOGIN]->id_usuario;

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>

<?php 
session_start();
?>
<meta http-equiv="refresh" content="1320;url=#">
<script src='<?php echo URL_BASE ?>lib/main.js'></script>
<link href='<?php echo URL_BASE ?>lib/main.css' rel='stylesheet' />



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
                           		
                           		
                           		
                           		<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
				<?php 
                
                
                if ($_GET['dat']) {
                    $inicioBR = $_GET['dat'];
                    $inicio = implode("-",array_reverse(explode("/",$inicioBR)));
                } else {
                    $inicio = date('Y-m-d');
                    $inicioBR = date('d/m/Y');
                } 
                                    
                if ($_GET['id_responsavel']) {
                    $idi = $_GET['id_responsavel'];
                    $idi_acesso = "%%";
                } elseif($user_instrutor == 's'){
                    $idi = $user_usuario;
                    $idi_acesso = $user_usuario;
                } else {
                    $idi_acesso = "%%";
                    $idi = "5";
                }

               
                
                //echo $inicio." ".$inicioBR."<br>";
                //echo $fim." ".$fimBR."<br>";
                // If you want to include this date, add 1 day
                $sql_tre = "SELECT * FROM   usuario
                                WHERE
                                (id_usuario = '$idi') AND
                                (id_usuario LIKE '$idi_acesso') AND
                                instrutor = 's'";
                $sql_tre = mysqli_query($conn, $sql_tre);
                $cur_tre = mysqli_fetch_assoc($sql_tre);
                ?>
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
  
  .fc-title{
  font-size: 2.85em;
  }
  
  .fc-time-grid-event.fc-short .fc-time:before {
   content: attr(data-full);
}

</style>


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
      selectConstraint:"businessHours",
      hiddenDays: [ 0 ],
      buttonText:{
		 today:    'hoje',
		 month:    'mês',
		 week:     'semana',
		 day:      'dia'
	},
	
	//selectOverlap: function(event) {
    // Here you will get all background events which are on same time.
    	//console.log(event);
    	//return event.rendering === 'background';
		//},

		locale:'pt-br',
      	headerToolbar: {
        left: 'prev,next',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      initialView: 'timeGridWeek',
      initialDate: '<?php echo $inicio ?>', 
      navLinks: true, // can click day/week names to navigate views
      <?php if($user_inserir =="s"){ ?>
      editable: true,
      droppable: true,  
      
      selectable: true,
      <?php } else {} ?>
      selecHelper: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      eventOverlap: true,
      //second: 'hide',
	
      slotLabelFormat:
      {
      hour: 'numeric',
      minute: '2-digit',
      omitZeroMinute: false,
      },
      
      titleFormat: { // will produce something like "Tuesday, September 18, 2018"
        month: 'long',
        year: 'numeric',
        day: 'numeric'
      },
  		
      displayEventTime: false,
      allDaySlot: false,
      expandRows: true,
      events: '<?php echo URL_BASE ?>calendario/eventos_prof.php?id_responsalvel=<?php echo $idi ?>', 
      
      <?php if($user_inserir =="s"){ ?>
      eventDrop: function(info){
        resizeAndDrop(info);
      },
      eventResize: function(info) {
        resizeAndDrop(info);
      },
      <?php } else {} ?>
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
        let reqs = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/EdicaoController.php',{
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
        document.querySelector('#clienteEdit').value = ress.nome;
        document.querySelector('#selectUsoEdit').value = ress.id_uso;
        document.querySelector('#selectObsEdit').value = ress.obs_treinamento;
        document.querySelector('#EditPedido').value = ress.pedido;
        document.querySelector('#nequipEdit').value = ress.nequip;
        document.querySelector('#selectProdutoEdit').value = ress.id_produto;
        document.querySelector('#produtoEditar').value = ress.produto;
        var tempo_t 								   = ress.tempo_treinamento
        var tempo_e = (tempo_t.slice(0, -3));
        document.querySelector('#idEvento').value = idEvento;
        
        document.querySelector('#texto_mudar').value = "Participou do treinamento do equipamento " + ress.produto + ", promovido pela RentalMed Locação e Comércio de Equipamentos, realizado em " + DataBR + " com carga horária total de " + tempo_e + " hs, ministrado pelo(a) Prof(a) " + ress.nome_usuario + ".";
        document.querySelector('#texto_padrao').value = "Participou do treinamento do equipamento " + ress.produto + ", promovido pela RentalMed Locação e Comércio de Equipamentos, realizado em " + DataBR + " com carga horária total de " + tempo_e + " hs, ministrado pelo(a) Prof(a) " + ress.nome_usuario + ".";
        
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
        
        let e_confirmado = ress.confirmado;
        if(e_confirmado== "s"){
        $("input[name=confirmado][value='s']").prop("checked",true);
        } else {
        $("input[name=confirmado][value='s']").prop("checked",false);
        };
        
        let e_disponivel = ress.disponivel;
        if(e_disponivel== "s"){
        $("input[name=disponivel][value='s']").prop("checked",true);
        } else {
        $("input[name=disponivel][value='s']").prop("checked",false);
        };
        
        let e_formato = ress.id_formato;
        if(e_formato== "1"){
        $("input[name=id_formatoEdit][value='1']").prop("checked",true);
        $("input[name=id_formatoEdit][value='2']").prop("checked",false);
        } else {
        $("input[name=id_formatoEdit][value='1']").prop("checked",false);
        $("input[name=id_formatoEdit][value='2']").prop("checked",true);
        };
        
        
        let e_tipo = ress.id_tipo;
        if(e_tipo== "1"){
        $("input[name=id_tipo][value='1']").prop("checked",true);
        } else if(e_tipo== "2"){
        $("input[name=id_tipo][value='2']").prop("checked",true);
        } else if(e_tipo== "4"){
        $("input[name=id_tipo][value='4']").prop("checked",true);
        } else {
        $("input[name=id_tipo][value='5']").prop("checked",true);
        };
        

        //visualização
        var ider = ress.id_responsavel;
        var ide = ress.id_treinamento;
        var nome = ress.nome;
        var email = ress.email;
        var cpf = ress.cpf;
        var professor = ress.nome_usuario;
        var produto = ress.produto;
        var categoria = ress.categoria;
        var tempo_treinamento = ress.tempo_treinamento;
        var marca = ress.marca;
        var imagem_certificado = ress.imagem_certificado;
        document.querySelector('#emailEdit').value = ress.email;
        document.querySelector('#imagem_certificado').value = ress.imagem_certificado;

        var texto_crt = document.querySelector('#texto_padrao').value;
        $('.custom-certificado').attr('href', '<?php echo URL_BASE ?>/crt/gerar_certificado/gerador.php?nome=' + nome + '&email=' + email + '&texto=' + texto_crt + '&cpf=' + cpf + '&tempo_treinamento=' + tempo_treinamento + '&data=' + DataBR + '&categoria=' + categoria + '&produto=' + produto + ' ' + marca + '&professor=' + professor + '&imagem=' + imagem_certificado);
        $('.custom-url').attr('href', '<?php echo URL_BASE . "treinamento"?>?ide=' + ide + '&id_responsavel=' + ider + '&dat=' + DataBR);
        document.getElementById('responsavel').innerHTML = ress.nome_usuario;
       	document.getElementById('ocupacao').innerHTML = ress.ocupacao;
       	document.getElementById('tipo').innerHTML = ress.tipo;
       	document.getElementById('dataevent').innerHTML = DataBR;
        document.getElementById('formato').innerHTML = ress.formato;
        document.getElementById('formatoEdit').innerHTML = ress.formato;
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
		document.getElementById('celular').value = ress.celular;
		
		//formatar número para celular
		let cel_f = ress.celular;
		cel_f = cel_f.replace(/\D/g,""); //Remove tudo o que não é dígito
    	cel_f=cel_f.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    	cel_f=cel_f.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
		document.getElementById('mobile_e').innerHTML = cel_f;
		
		
		
		document.getElementById('mensagem').value = "Oi, sou " + ress.nome_usuario + " da RentalMed, posso confirmar seu treinamento, do " + ress.produto + " no dia " + DataBR + " das " + horaInicio + ":"+minutoInicio+" às " + horaFim+":"+minutoFim + "?";
        document.getElementById('nomeproduto').innerHTML = ress.produto;
        document.getElementById('numpedido').innerHTML = ress.pedido;
        document.getElementById('usoeq').innerHTML = ress.uso;
        document.getElementById('nequip').innerHTML = ress.nequip;
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
        
        let r_confirmado= ress.confirmado;
        if(r_confirmado == "s"){
        document.getElementById('confirmado').innerHTML = "Sim";
        } else {
        document.getElementById('confirmado').innerHTML = "Não";
        }
        
        let r_disponivel= ress.disponivel;
        if(r_disponivel == "s"){
        document.getElementById('disponivel').innerHTML = "Sim";
        } else {
        document.getElementById('disponivel').innerHTML = "Não";
        }
        
        document.getElementById('obs').innerHTML = ress.obs_treinamento;
        //document.querySelector(".fc-timegrid-col-events").style.width = "50%";

      	$('#exampleModalfat #startMostrar').text(info.event.start.toLocaleString('pt-br',{year: 'numeric', month: '2-digit', day: '2-digit'}));
      	$('#exampleModalfat #startMostrarHini').text(info.event.start.toLocaleString('pt-br',{hour: '2-digit', minute: '2-digit', second: '2-digit'}));
      	$('#exampleModalfat #startMostrarHfim').text(info.event.end.toLocaleString('pt-br',{hour: '2-digit', minute: '2-digit', second: '2-digit'}));
      	$('#exampleModalfat #end').val(info.event.end.toDateString());
      	let r_resp = ress.id_responsavel;
      	if(r_resp == <?php echo $idi; ?>){
        $('#exampleModalfat').modal('show');
        } else {
         $(event).css('width','50%');
        }

      }, 
      
      
      
      selectable: true,
    	select: function(info) {
          $('#cadastrar #start').val(info.start.toLocaleString('pt-br', {year: 'numeric', month: '2-digit', day: '2-digit'}));
          $('#cadastrar #datadia').text(info.start.toLocaleString('pt-br',{year: 'numeric', month: '2-digit', day: '2-digit'}));
          $('#cadastrar #hstart').val(info.start.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit', second: '2-digit'}));
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
            let reqs = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/HorasController.php',{
              method:'POST',
              headers:{
                  'Content-Type':'application/x-www-form-urlencoded'
              },
              body:`hstart=${document.querySelector('#hstart').value}&data=${document.querySelector('#start').value}`                  
            });
            let ress = await reqs.json(); 
            if(ress == 'error'){
             alert('Horário de almoço incluso, gentileza entrar no dia e escolher outro horário.');
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
              verificaRepetidos();
              <?php if($user_inserir =="s"){ ?>
              $('#cadastrar').modal('show');
              <?php } else {}; ?>
            }            
          }     
          getHours();   
          verificaRepetidos();
          
    },    
    eventDidMount: function (arg) {
        var type = arg.event.extendedProps.type;
        if (type === "A") {
          console.log(arg.event);
          var node = arg.el.parentElement;
          node.style.setProperty("width", "50%");
        }
      }
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
    
    //alert(newDateEnd.getHours() + ":" + newDateEnd.getMinutes());
    
   if((newDateEnd.getHours() + ":" + newDateEnd.getMinutes()) > '20:30'){
    alert('horário final inválido, irá ser modificado para 20:30');
    newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} 20:30:00`; 
    location.reload();
    //return false;
    } else {
    newDateEnd = `${newDateEnd.getFullYear()}-${monthEnd}-${dayEnd} ${newDateEnd.getHours()}:${minutesEnd}:00`;   
    }
                       
    
    let reqs = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/UpdateDateController.php',{
      method:'POST',
      headers:{
          'Content-Type':'application/x-www-form-urlencoded'
      },
      body:`id=${info.event.id}&start=${newDate}&end=${newDateEnd}`                  
    });
    let ress = await reqs.json();           
    window.location.href = '<?php echo URL_BASE ?>professor?dat=' + ress + '&id_responsavel=<?php echo $idi?>';                                           
}

 <?php } else {}; ?>
 
 
<?php if($user_inserir =="s"){ ?>


//Cadastrar eventos
$(document).ready(function(){
  $("#addevent").on("submit", async function (event){
      event.preventDefault();
      let form = document.querySelector('#addevent');
      let formData = new FormData(form);
      let reqs = await fetch('<?php echo URL_BASE ?>calendario/cad_event_prof.php',{
        method:'POST',   
        dat:  $(start).serialize(),       
        body:formData
      });
      let ress = await reqs.json();
      var dt = document.querySelector('#start').value;
      window.location.href = '<?php echo URL_BASE ?>professor?dat=' + dt + '&id_responsavel=<?php echo $idi?>';
  });
});

<?php } else {}?>

<?php if($user_excluir =="s"){ ?>
//Excluir eventos
$(document).ready(function(){
  $("#btnExcluir").on("click", async function (event){
      event.preventDefault();      
      if(confirm('Deseja mesmo apagar este dado?')){
        let reqs = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/ExclusaoController.php',{
        method:'POST',
        headers:{
            'Content-Type':'application/x-www-form-urlencoded'
        },
        body:`id=${document.querySelector('#idEvento').value}`                  
       });
        let ress = await reqs.json(); 
        var dt = document.querySelector('#startEdit').value;
        window.location.href = '<?php echo URL_BASE ?>professor?dat=' + dt + '&id_responsavel=<?php echo $idi?>';
      }                       
  });
});

 <?php } else {}; ?>
 
 <?php if($user_editar =="s"){ ?>
//Update dos eventos
$(document).ready(function(){
  $("#formUpdate").on("submit", async function (event){
      event.preventDefault();     
      let form = document.querySelector("#formUpdate"); 
      let formData = new FormData(form);
      let reqs = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/UpdateController.php',{
      method:'POST',
      body: formData                  
      });
      let ress = await reqs.json();             
      let dt = document.querySelector('#startEdit').value;
      window.location.href = '<?php echo URL_BASE ?>professor?dat=' + dt + '&id_responsavel=<?php echo $idi?>';  
  });
});

 <?php } else {}; ?>
 
 <?php if($user_inserir =="s"){ ?>
//Verifica se o evento não esta repetido
async function verificaRepetidos(){        
  let reqs = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/EventosRepetidosController.php',{
  method:'POST',
  headers:{
      'Content-Type':'application/x-www-form-urlencoded'
  },
  body:`data=${document.querySelector('#start').value}&hstart=${document.querySelector('#hstart').value}&hend=${document.querySelector('#hend').value}`                  
  });
  let ress = await reqs.json(); 
  //alert(ress);
  
  let reqst = await fetch('<?php echo URL_BASE ?>app/views/Professor/controllers/EventosMesmoController.php',{
  method:'POST',
  headers:{
      'Content-Type':'application/x-www-form-urlencoded'
  },
  body:`datai=${document.querySelector('#start').value}&hstarti=${document.querySelector('#hstart').value}&hendi=${document.querySelector('#hend').value}&id_responsavel=<?php echo $idi;?>`                  
  });
  let rest = await reqst.json();
  //alert(rest);
  
  let idf = document.querySelector('input[name="id_formato"]:checked').value;   
  if((ress === false && idf === '1') || (rest === false)){
    alert('Já existe um evento marcado nesta data-hora, escolha outro horário de fim ou escolha a opção OnLine!');
    //alert(document.querySelector('#hstart').value);
    //alert(document.querySelector('#hend').value);
    
    document.querySelector('#hend').value='';
    document.querySelector('#hend').style.borderColor='red';

    setTimeout(()=>{
      document.querySelector('#hend').style.borderColor='#ccc';
    },10000);
	 return false;
  } 
    
}


$(document).ready(function(){
$("#hend").on("change",(e)=>verificaRepetidos());
});


$(document).ready(function(){
$("#edo-form").on("change",(e)=>verificaRepetidos());
});

$(document).ready(function(){
$("#edo-form1").on("change",(e)=>verificaRepetidos());
});

 <?php } else {}; ?>
 

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
                            <h5 class="modal-title" id="exampleModalLabel2">Reservar horário do Professor - <span id="datadia"></span></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                       	    <input id="start" class="form-control" type="hidden" name="start" placeholder="Data Final" value="">
                       	    <input id="end" class="form-control" type="hidden" name="end" placeholder="Data Final" value="">
                          </div>
                          
                          <div class="form-group row">
                          <div class="col-6">
                          <div class="media"><img class="img-60 rounded-circle me-3" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $cur_tre['imagem']; ?>" alt="">
                              <div class="media-body align-self-center">
                                  <h5 class="user-name"><?php echo $cur_tre['nome_usuario']; ?></h5>
                                  <input type="hidden" id="id_responsavel" name="id_responsavel" value="<?php echo $idi; ?>">
                                <h6><?php echo $cur_tre['cargo']; ?></h6>
                              </div>
                            </div>
                          </div>
                          <div class="col-4">
                           <label>Usar Sala de Treinamento:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani" id="presencial">
                                <input class="radio_animated" id="edo-form" type="radio" name="id_formato" checked="" value="1">Sim
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-form1" type="radio" name="id_formato" value="2">Não
                              </label>
                            </div>  
                         </div>
                         
                         <div class="col-2">
                           <label>Disponível:</label>
                            <div class="media">
                                <label class="switch">
                                    <input type="checkbox" name="disponivel" value="s" checked=""><span class="switch-state"></span> 
                                  </label>
                                   </div>
                         </div>
                         
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
                        
                       <div class="col-4">
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
                          
                          <div class="col-8">
                            <label>Tipo:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="id_tipo_inserir" type="radio" name="id_tipo_inserir" checked="" value="1">Venda
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="id_tipo_inserir1" type="radio" name="id_tipo_inserir" value="2">Locação
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="id_tipo_inserir1" type="radio" name="id_tipo_inserir" value="4">Marketing
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="id_tipo_inserir1" type="radio" name="id_tipo_inserir" value="5">Eccos
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
                           		<div class="col-4">
                            		<label for="select-1">Pedido</label>
                                      <input autocomplete="off" class="form-control" type="text" name="pedido" placeholder="Número do pedido" value="<?php echo $linha->pedido ? $linha->pedido : null ?>">
                           		</div>
                           		<div class="col-4">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="select-1" name="id_uso" >
                                      		<option value="1">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso'>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="col-4">
                            		<label for="select-1">Nº Equipamentos</label>
                                      <input autocomplete="off" class="form-control" type="number"  name="nequip" placeholder="Número de Equipamento" value="1">
                           		</div>
                           		</div>
                  	
                  	     <!– escolher grupo –>
                         <div class="grupoinserir">
                         </div>
                         
                         
                         <div class="individualinserir">
                        
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
                            		  html +='<div class="sj"><a href="javascript:;" onclick="selecionarCliente<?php echo $id_h ?>(this)"'
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
                            		<label for="select-1">Cliente</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_cliente<?php echo $id_h ?>" name="id_cliente" class="form-control">
                        	
                        		<input type="text" id="cliente<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
                        		</div>            
                           		</div>
                           		

                              <div class="mb-2">
                                <label class="col-form-label">Observação:</label>
                                <textarea class="form-control" name="obs_treinamento" placeholder="Observações"><?php echo ($linha->obs_treinamento) ? $linha->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent" onClick="return verificaRepetidos()">Reservar Horário</button>
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
                            <h5 class="modal-title" id="exampleModalLabel2">Detalhes do Evento <span id="formato"></span></h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                          <div class="form-group row">
                          <div class="col-4">
                          <label for="select-1">Responsável: <span id="responsavel"></span></label>
                          </div>
                          <div class="col-2">
                          <label for="select-1">Disponivel: <span id="disponivel"></span></label>
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
                           		
                           		<div class="form-group row">
                           		<div class="col-4">
                            		<label for="select-1">Pedido: <span id="numpedido"></span></label>
                           		</div>
                           		<div class="col-4">
                            		<label for="select-1">Uso Equipamento: <span id="usoeq"></span></label>
                                                  
                           		</div>
                           		<div class="col-4">
                            		<label for="select-1">Nº Equipamentos: <span id="nequip"></span></label>
                                                  
                           		</div>
                           		</div>
                         
                         
                         <div class="individual_r">
							
                        	<div class="form-group row">
                                <div class="col-6">
                            <label for="select-1">Cliente: <span id="nomecliente"></span> </label>
                                            
                           		</div>
                           		
                           		<div class="col-6">
                           		<input type="hidden" id="celular" placeholder="Digite numero do telefone com DDD">
                                <input id="mensagem" type="hidden" valor="Aqui é da RentalMed, Vamos agendar seu treinamento?">
                           		<label>Celular:</label>
                           		<script>
                           		function enviarMensagem(){
                                  var celular = document.querySelector("#celular").value;
                                  celular = celular.replace(/\D/g,''); //Deixar apenas números
                                  
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


                           		<span id="mobile_e"></span>  <button onclick="enviarMensagem()" id="cel" class="btn btn-outline-light txt-dark" data-js="phone" style="border-radius: 30px;border: 0px;"><i class="icofont icofont-brand-whatsapp" style="color:#32CD32"></i> </button> 
                           				</div>
                           		</div>
                           		
                              	<div class="media">
                              	<label class="col-form-label m-r-10" style="padding-left:3px" >Confirmado:  <span id="confirmado"></span> </label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído: <span id="concluido"></span></label>
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado:  <span id="certificado"></span> </label>
                                  <label  class="col-form-label m-r-10 emitir" style="padding-left:3px" > <a id="emitir" class="custom-certificado" href="#" target="_blank" id="custom-certificado"><i data-feather="award"></i></a></label>
                                  
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
                            <h5 class="modal-title" id="exampleModalLabel2">Editar horário <span id="formatoEdit"></span> - <span id="dataevent"></span></h5>
                            
                            
                          </div>
                          <div class="modal-body">

                          <div class="form-group row">
                         <div class="col-6">
                            <label for="select-1">Responsável</label>  
                            <h5 class="user-name"><?php echo $cur_tre['nome_usuario']; ?></h5>      
                                    <input id="selectRespEdit" class="form-control" type="hidden" name="selectRespEdit" placeholder="Data do Evento" value="">          
                           			     <input id="startEdit" class="form-control" type="hidden" name="startEdit" placeholder="Data do Evento" value="" disabled> 
                           		</div>
                           		<div class="col-6">
                          <label for="select-1">Hora do Início</label>
                            <div class="input-group">
                              <input id="horarioEdit" class="form-control" type="text" name="horarioEdit" placeholder="Data do Evento" value="" disabled>

                            </div>
                          </div>
                           		
                               </div>

                          <div class="form-group row">
                          <div class="col-4">
                           <label>Usar Sala de Treinamento:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated" id="edo-form" type="radio" name="id_formatoEdit" checked="" value="1">Sim
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated" id="edo-form1" type="radio" name="id_formatoEdit" value="2">Não
                              </label>
                            </div>
                          </div>
                          
                          <div class="col-2">
                           <label>Disponivel:</label>
                            <div class="media">
                                <label class="switch">
                                    <input type="checkbox" name="disponivel" value="s"><span class="switch-state"></span> 
                                  </label>
                                   </div>
                          </div>
                          
                          <div class="col-6">
                            		<label for="select-1">Hora do Fim</label>
                            		 <input id="horarioEditFim" class="form-control" type="text" name="horarioEditFim" placeholder="Data do Evento" value="" disabled>
                                    </div>
                        </div>
                        
                        <div class="form-group row">
                        <div class="col-4">
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
                          
                          <div class="col-8">
                            <label>Tipo:</label>
                            <div class="m-checkbox-inline">
                              <label class="f-w-500" for="edo-ani">
                                <input class="radio_animated btn-ind" id="id_tipo" type="radio" name="id_tipo" value="1">Venda
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated btn-grp" id="id_tipo1" type="radio" name="id_tipo" value="2">Locação
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated btn-grp" id="id_tipo1" type="radio" name="id_tipo" value="4">Marketing
                              </label>
                              <label class="f-w-500" for="edo-ani1">
                                <input class="radio_animated btn-grp" id="id_tipo1" type="radio" name="id_tipo" value="5">Eccos
                              </label>
                            </div>
                          </div>
                          
                           </div>
                           
                           
                           <script type="text/javascript">
                           		$(function(){
                           		$("#produtoEditar").on("keyup", function(){
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
                            		  $("#produtoEditar").after('<div class="listaProdutos"></div>');
                            	   html = "";
                            		for (i = 0; i < data.length; i++) {		  
                            		  html +='<div class="si"><a href="javascript:;" onclick="selecionarProdutoEditar(this)"'
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
                                
                                function selecionarProdutoEditar(obj){
                                	var id = $(obj).attr("data-id");
                                	var nome = $(obj).attr("data-nome");
                                	
                                	
                                	$(".listaProdutos").hide();
                                	$("#produtoEditar").val(nome);
                                	$("#selectProdutoEdit").val(id);
            	
                                };
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Equipamento</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="selectProdutoEdit" name="selectProdutoEdit" class="form-control">
                        	
                        		<input type="text" id="produtoEditar" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		<div class="form-group row">
                           		<div class="col-4">
                            		<label for="select-1">Pedido</label>
                                      <input  autocomplete="off" class="form-control" type="text" id="EditPedido" name="EditPedido" placeholder="Número de Equipamentos" value="">
                           		</div>
                           		<div class="col-4">
                            		<label for="select-1">Uso Equipamento</label>
                                    <select class="form-control btn-square" id="selectUsoEdit" name="selectUsoEdit" >
                                      		<option value="">Selecione o Tipo de Uso</option>
                                       		<?php foreach ($usos as $uso){
            								    echo "<option value='$uso->id_uso' $selecionado>$uso->uso</option>";
            								}?> 
                                    </select>                 
                           		</div>
                           		<div class="col-4">
                            		<label for="select-1">Nº Equipamentos</label>
                                      <input  autocomplete="off" class="form-control" type="number" id="nequipEdit" name="nequipEdit" placeholder="Número do pedido" value="">
                           		</div>
                           		</div>

                         <div class="individual">
                         
                         <script type="text/javascript">
                           		$(function(){
                           		$("#clienteEdit").on("keyup", function(){
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
                            		  $("#clienteEdit").after('<div class="listaClientes"></div>');
                            	   html = "";
                            		for (n = 0; n < data.length; n++) {		  
                            		  html +='<div class="sj"><a href="javascript:;" onclick="selecionarClienteEdit(this)"'
                            		  + 'data-idn="' + data[n].id_cliente +
                            		   '" data-nomen="' + data[n].nome + '">' +
                            		  data[n].nome + '</a></div>';
                            		  
                            		}
                            		$(".listaClientes").html(html);
                                    $(".listaClientes").show();
                            	  }
                                   });
                                	
                                   }) ;
                                });
                                
                                function selecionarClienteEdit(obj){
                                	var idn = $(obj).attr("data-idn");
                                	var nomen = $(obj).attr("data-nomen");
                                	
                                	
                                	$(".listaClientes").hide();
                                	$("#clienteEdit").val(nomen);
                                	$("#selectClienteEdit").val(idn);
                                	
                                }
                           		</script>

                           		<div class="mb-2">
                            		<label for="select-1">Cliente</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="selectClienteEdit" name="selectClienteEdit" class="form-control">
                        	
                        		<input type="text" id="clienteEdit" class="form-control" placeholder="Digite nome do cliente" autocomplete="off">
                        		</div>            
                           		</div>
                           		
                           		
                           		<div class="form-group row">
                              	
                              	<div class="col-3">
                                  <div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Confirmado</label>
                                <label class="switch">
                                    <input type="checkbox" name="confirmado" value="s"><span class="switch-state"></span> 
                                  </label>
                                   </div>

                              	</div>
                              	
                              	<div class="col-3">
                              	<div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px">Concluído</label>
                                <label class="switch">
                                    <input type="checkbox" name="concluido" value="s"><span class="switch-state"></span>
                                  </label>
                                  </div>
                                  </div>
                                  
                                  <div class="col-3">
                                  <div class="media">
                                  <label class="col-form-label m-r-10" style="padding-left:3px" >Certificado</label>
                                <label class="switch">
                                    <input type="checkbox" name="certificado" value="s"><span class="switch-state"></span> 
                                  </label>
                                   </div>

                              	</div>
                              	
                              	<div class="col-3">
                              	<div class="media emitir2">
                                  <label class="col-form-label m-r-10" style="padding-left:3px"> Emitir </label>
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
                              
                              <div class="mb-2">
                              <script>
                              function MudarTexto(){
                              alert("foi");
                              var texto_padrao = document.querySelector('#texto_mudar').value;
                              document.querySelector('#texto_padrao').value = texto_padrao;
                            	}
                              </script>
                              <script>
                              	window.onload = function () {
                               	$('#emitir_corrigido').attr('href', '<?php echo URL_BASE ?>crt/gerar_certificado/gerador.php?nome=' + nome + '&email=' + email + '&texto=' + texto_crt + '&cpf=' + cpf + '&tempo_treinamento=' + tempo_treinamento + '&data=' + DataBR + '&categoria=' + categoria + '&produto=' + produto + ' ' + marca + '&professor=' + professor + '&imagem=' + imagem_certificado);
                              	}
                              </script>
                              
                              	

                               <script>
                                  function myFunc(){
                                  var nome = document.querySelector('#clienteEdit').value;
                                  var email = document.querySelector('#emailEdit').value;
                                  var imagem_certificado = document.querySelector('#imagem_certificado').value;
                                  
                                  var texto_padrao = document.querySelector('#texto_mudar').value;
                                    window.open('<?php echo URL_BASE ?>crt/gerar_certificado/gerador.php?nome=' + nome  + '&email=' + email + '&texto=' + texto_padrao + '&imagem=' + imagem_certificado, '_blank')
                                  }
                               </script>
                                <label class="col-form-label">Texto do Certificado: </label><button style="margin-left:5px" class="btn btn-secondary btn-xs" onclick="myFunc()">Emitir Certificado Modificado</button>
                                <textarea rows="3" onchange="MudarTextoCertificado()" class="form-control" name="texto_mudar" id="texto_mudar" placeholder="Texto do Certificado"><?php echo ($linhai->obs_treinamento) ? $linhai->obs_treinamento : null ?></textarea>
                              </div>
                                 </div>
                                 <input type="hidden" name="texto_padrao" id="texto_padrao" value="">
                                 <input type="hidden" name="emailEdit" id="emailEdit" value="">
                                 <input type="hidden" name="imagem_certificado" id="imagem_certificado" value="">
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
                          <?php  } else {}?>
                           <?php if($user_excluir =="s"){ ?>
                          <button class="btn btn-danger" type="button" data-bs-dismiss="modal" id='btnExcluir'>Excluir</button>
                          <?php  } else {}?>
                          </div>
                        </div>
                        </form>
                        
                        </div>
                        
                      </div>
                    </div>
                    
                    
                    <!– modal de grupo –>
                    
                    <style>

                      .grupoinserir {
                        display: none;
                      }
                    
                      .individualinserir {
                        display: block;
                      }

                    </style>
                      
                      <div style="z-index:1043" class="modal fade bd-example-modal-lg" id="ModalGrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                      <div id="msg-cad"></div>

                          <form id="addevent" method="POST" enctype="multipart/form-data" class="theme-form mega-form ">
                       
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel2">Grupo de Treinamento - <span id="datadia"></span></h5>
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
									
                                    <select class="form-control btn-square" id="select-1" name="id_responsavel" >
                                    		<option value="">Selecione o Responsável</option>
                                       		<?php foreach ($instrutores as $instrutor){
            								    echo "<option value='$instrutor->id_usuario'>$instrutor->nome_usuario</option>";
            								}?> 
                                    </select>            
                           		</div>
                           		
                           		<div class="col-6">
                            		<label for="select-1">Equipamento</label>
                                    <div class="col-12 position-relative">
                           			<input type="hidden" id="id_produto<?php echo $id_h ?>" name="id_produto" class="form-control">
                        	
                        		<input type="text" id="produto<?php echo $id_h ?>" class="form-control" placeholder="Digite nome do produto" autocomplete="off">
                        		</div>            
                           		</div>

                  	</div>
                  	
                  	     <!– escolher grupo –>
                         <div class="grupoinserir">
                         </div>
                         
                         
                         <div class="individualinserir" >
                        
                                               
                           		<div class="form-group row" style="border-bottom: 1px solid grey;">
                           		<div class="col-6">
                            		<label for="select-1">Cliente</label>
                                    		</div>
                           		<div class="col-6">
                            		<label for="select-1">Contato</label>          
                           		</div>
                           		</div>

                           </div>
                                 
                           </div>
                          <div class="modal-footer">
                          	<input type="hidden" name="id_usuario" value="<?php echo $_SESSION[SESSION_LOGIN]->id_usuario ?>">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" id="cadEvent" name="cadEvent" value="cadEvent" onClick="return vazio()">Editar Grupo</button>
                          </div>
                        </div>
                        </form>
                      </div>
                    </div>

                    

		<div class="page-body">
          <div class="container-fluid">
            <div class="page-header">
              <div class="row">
                <div class="col-sm-6">
                  <h3>Agenda Professores </h3>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo URL_BASE ?>">Home</a></li>
                    <li class="breadcrumb-item">Agenda Professores </li>
                  </ol>
                </div>
                
                <div class="col-sm-6">
                  <!-- Bookmark Start-->
                  <div class="bookmark">
                  <a  class="btn btn-primary" href="<?php echo URL_BASE . "agenda"?>">Agenda da Sala</a>
                   <a  class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalCliente" data-whatever="@mdo">Cadastrar Cliente</a>            		
                   	</ul>
                  </div>
                  
                  <div class="card-body btn-showcase">
                 
                 
                 
                  </div>
                  <!-- Bookmark Ends-->
                </div>
              </div>
            </div>
          </div>
  
		<div class="col-md-12 project-list">
                <div class="card">
                  <form class="needs-validation" novalidate="" method="GET" enctype="multipart/form-data">
                     
                      <div class="row g-3">
                       
                       <div class="col-md-3">
                         <div class="media"><img class="img-60 rounded-circle me-3" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $cur_tre['imagem']; ?>" alt="">
                              <div class="media-body align-self-center">
                                  <h5 class="user-name"><?php echo $cur_tre['nome_usuario']; ?></h5>
                                <h6><?php echo $cur_tre['cargo']; ?></h6>
                              </div>
                            </div>
                        </div>
          				
                        <?php 
                        if($idi_acesso == '%%'){
                        $dados = $conex->query("SELECT * FROM   usuario
                                WHERE
                                id_usuario != '$idi' AND
                                instrutor = 's'");
                        $dados->execute();
                        $professores = $dados->fetchALL(PDO::FETCH_OBJ);
                        $id_e = $linha->id_treinamento;
                        //echo $idi_acesso.$user_instrutor ;
                        
                        ?>
                        <?php foreach ($professores as $profs){?>
                        
                        <div class="col-md-3" style="opacity : 0.3;">
                        <a href="<?php echo URL_BASE ?>professor?id_responsavel=<?php echo $profs->id_usuario;?>">
                         <div class="media"><img class="img-60 rounded-circle me-3" src="<?php echo URL_BASE ?>assets/images/dashboard/<?php echo $profs->imagem; ?>" alt="">
                              <div class="media-body align-self-center">
                                  <h5 class="user-name"><?php echo $profs->nome_usuario; ?></h5>
                                <h6><?php echo $profs->cargo; ?></h6>
                              </div>
                            </div>
                            </a>
                        </div>
						
						<?php } ?>
                       <?php } else {} ?>
                      </div>
                      
                      
                    </form>
                </div>
              </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid list-products">
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  
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
                  
                  <div class="col-md-12 project-list">

                         <?php 
                        $dados = $conex->query("SELECT * FROM   usuario
                                WHERE
                                usuario_sala = 's'");
                        $dados->execute();
                        $professores = $dados->fetchALL(PDO::FETCH_OBJ);
                        $id_e = $linha->id_treinamento;
                        ?>
                  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:15px;"><i class="icofont icofont-ui-press" style="color:#FF4040"></i> Não Concluídos</span>
                  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:15px;"><i class="icofont icofont-ui-press" style="color:#FFEC8B"></i> Professor indisponível</span>
                  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:15px;"><i class="icofont icofont-ui-press" style="color:#FA8072"></i> Não Confirmados</span>
				  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:15px;"><i class="icofont icofont-ui-press" style="color:#32CD32"></i> Confirmados</span>
				  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:15px;"><i class="icofont icofont-ui-press" style="color:#696969"></i> Sala Reservada Por Outro Usuário</span>
              	 </div>
                  
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
        