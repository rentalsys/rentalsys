<?php
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
      
      hiddenDays: [ 0 ],
      buttonText:{
		 today:    'hoje',
		 month:    'mês',
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
      //initialDate: '<?php echo $inicio ?>', 
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      selectable: true,
      selecHelper: true,
      nowIndicator: true,
      dayMaxEvents: true, // allow "more" link when too many events
      second: 'hide',
      events: '/eventos.php', 
      TimeFormat: { // like '14:30:00'
        
      },
      eventClick: function(info) {
      	info.jsEvent.preventDefault();
      	$('#exampleModalfat #start').text(info.event.start.toDateString());
      	$('#exampleModalfat #end').val(info.event.end.toDateString());
        $('#exampleModalfat').modal('show');
      },

      selectable: true,
    	select: function(info) {
    	
          $('#cadastrar #start').val(info.start.toLocaleString('pt-br', {year: 'numeric', month: 'numeric', day: 'numeric'}));
          $('#cadastrar #datadia').text(info.start.toLocaleString('pt-br', {year: 'numeric', month: 'numeric', day: 'numeric'}));
          $('#cadastrar #hstart').val(info.start.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit'}));
          $('#cadastrar #end').val(info.end.toLocaleString('pt-br', {year: 'numeric', month: 'numeric', day: 'numeric'}));
          $('#cadastrar #hend').val(info.end.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit'}));
          $('#cadastrar #final').val(info.end.toLocaleString('pt-br', {hour: '2-digit', minute: '2-digit'}));
          $('#cadastrar').modal('show');
          var req = new XMLHttpRequest(); 
                req.onload = function() {
                console.log(this.responseText); 
             };
            req.open("get", "get-data.php", true); 
            req.send();
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
        
  });
  
  $(document).ready(function(){
            $("#addevent").on("submit", function (event){
            	//event.preventDefault();
            	$.ajax({
            		method: "POST", 
            		url: 'cad_event.php',
            		data: new FormData(this),
            		contentyType: false,
            		processData: false,
            		success: function(retorna){
            			if(retorna['sit']){
            				location.reload();
            			} else {
            				$("#msg-cad").html(retorna['msg']);
            			}
    				}
            	 });
            		
            });
  		});
</script>