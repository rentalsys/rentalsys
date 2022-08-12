(function(win,doc){
	'use strict';
	
	let calendarEl=doc.querySelector('.calendar');
	let calendar = new FullCalendar.Calendar(calendarEl, {
  	initialView: 'dayGridMonth',
  	headerToolbar:{
		start: 'prev,next,today',
	  	center: 'title',
	  	end: 'dayGridMonth,timeGridWeek,timeGridDay'
	},
	buttonText:{
		 today:    'hoje',
		 month:    'mês',
		 week:     'semana',
		 day:      'dia',
		 list:     'lista'
	},
	locale:'pt-br',
	dateClick: function(info) {
    alert('Clicked on: ' + info.dateStr);
    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    alert('Current view: ' + info.view.type);
    // change the day's background color just for fun
    info.dayEl.style.backgroundColor = 'red';
  },
	events: "assets/js/full/eventos.json",
	eventClick: function(info) {
    alert('Event: ' + info.event.title);
    alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
    alert('View: ' + info.view.type);

    // change the border color just for fun
    info.el.style.borderColor = 'red';
  }
		
	});
	calendar.render();
	
})(window,document)