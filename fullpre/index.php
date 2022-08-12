<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
     <link href='C:/xampp/htdocs/022022/fullpre/timeline/src/main.css' rel='stylesheet' />
    <script src='C:/xampp/htdocs/022022/fullpre/timeline/src/main.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'resourceTimelineWeek'
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>