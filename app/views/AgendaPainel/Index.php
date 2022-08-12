<?php include_once 'db.php';?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js"></script>

<meta http-equiv="refresh" content="520;url=#">
<script src="<?php echo URL_BASE ?>assets/js/jquery-3.5.1.min.js"></script>
<script src='<?php echo URL_BASE ?>lib/main.js'></script>
<link href='<?php echo URL_BASE ?>lib/main.css' rel='stylesheet' />
<link href='<?php echo URL_BASE ?>calendario/calend.css' rel='stylesheet' />


<style>

  body {
    margin: 10px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    margin: 0 auto;
  }
  
  .fc-timegrid-col-events{
  margin: 0!important;

  }
  .fc-time-grid-event.fc-short .fc-time:before {
   content: attr(data-full);
}

html, body {
    overflow: hidden; /* don't do scrollbars */
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
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
      width: '100%',
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

      editable: false,
      droppable: false,  

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
                    
                    
                           

		<div class="page-body" style="margin-top:0px;padding-top:45px">
          <div class="container-fluid">
            <div class="page-header">
             
            </div>
          </div>
          
          
  

          <!-- Container-fluid starts-->

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
                  <span class="btn btn-outline-light txt-dark disabled" type="button" style="margin:5px;padding:1px;font-size:10px"><i class="icofont icofont-ui-press" style="color:<?php echo $cor->color; ?>"></i> <?php echo $cor->nome_usuario; ?></span>
                  <?php } ?>

              </div>
              
                  
						
                        <script>

                    function tempoatualiza(){
                    
                    setInterval("atualiza()",5000);
                    
                    }
                    
                    function atualiza(){
                    
                    document.getElementById('calendar').innerHTML = location.reload();
                    
                    }
                    
                    </script>
                    
                        <script src="https://cdn.jsdelivr.net/npm/react@16.12/umd/react.production.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/react-dom@16.12/umd/react-dom.production.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/prop-types@15.7.2/prop-types.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
                        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                        <script src="https://cdn.jsdelivr.net/npm/react-apexcharts@1.3.6/dist/react-apexcharts.iife.min.js"></script>
                    
                    <div class="form-group row">
                         <div class="col-4">

                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Uso da sala de treinamento</h5>
                  </div>
                  <div class="card-body">
                    <div id="pie"></div>
                    <script>
                    
                    var options = {
                  	series: [<?php foreach ($responsavel as $re){?>
                            <?php echo $re->so ?>,
                            <?php } ?>],
                            
                  chart: {
                  width: '100%',
                  type: 'pie',
                },
                labels: [
        				<?php foreach ($responsavel as $re){
        				    $primeiroNome = explode(" ", $re->resp );
        				    ?>
                            '<?php echo  $primeiroNome[0] ?>',
                            <?php } ?>
        				],
                theme: {
                  monochrome: {
                    enabled: false
                  }
                },
                fill: {
                  type: 'gradient',
                },
                plotOptions: {
                  pie: {
                    dataLabels: {
                      offset: 15
                    }
                  }
                },
                
                dataLabels: {
                  style: {
                  fontSize: '18px',
                    colors: ['#000000'],
                  },
                  stroke: {
                  width: 1,
                  colors: ['#FFFFFF']
                },
                
                dropShadow: {
                    enabled: false,
                    
                  },
                 
                  formatter(val, opts) {
                    const name = opts.w.globals.labels[opts.seriesIndex]
                    return [name, val.toFixed(1) + '%']
                  }
                },
                
                
                
                legend: {
                  show: false
                }
                };
        
                var chart = new ApexCharts(document.querySelector("#pie"), options);
                chart.render();
      
    			</script>
                    
                  </div>
                </div>
                
                <div class="card">
                  <div class="card-header pb-0">
                    <h5>Índice de Ocupação Semanal</h5>
                    <?php $i=0; foreach ($responsavels as $res){  
                        $i = $i + $res->so;
                            }; $d = 138;
                            ?>
                  </div>
                  <div class="card-body">
                    <div id="app"></div>
                   

    <script type="text/babel">
      class ApexChart extends React.Component {
        constructor(props) {
          super(props);

          this.state = {
          
            series: [<?php echo $i ?>, <?php echo $d - $i ?>],
            options: {
              chart: {
                type: 'donut',
              },
            labels: [ 'coupada','desocupada'],
              plotOptions: {
                pie: {
                  startAngle: -90,
                  endAngle: 90,
                  offsetY: 10
                }
              },
              grid: {
                padding: {
                  bottom: -80
                }
              },
              responsive: [{
                breakpoint: 480,
                options: {
                  chart: {
                    width: 200
                  },
                  legend: {
                    position: 'bottom'
                  }
                }
              }]
            },
          
          
          };
        }

      

        render() {
          return (
            <div>
              <div id="chart">
                <ReactApexChart options={this.state.options} series={this.state.series} type="donut" />
              </div>
              <div id="html-dist"></div>
            </div>
          );
        }
      }

      const domContainer = document.querySelector('#app');
      ReactDOM.render(React.createElement(ApexChart), domContainer);
    </script>
                    
                  </div>
                </div>

                        

              		</div>
              		<div class="col-8">
						
                        <div id='calendar' onload="tempoatualiza();"></div>

              		</div>
              		</div>
                 

            </div>

          <!-- Container-fluid Ends-->
        </div>
        