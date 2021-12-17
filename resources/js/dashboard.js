require('./bootstrap');

import './chart.js';
$(document).ready(function(){
    $('#navbar_side').hide(0).animate({width:'toggle'},1000);
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendar1 = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendar1, {
          initialView: 'dayGridDay',
          headerToolbar: {
            left:'listYear,dayGridDay'
            
        },
          events:[
      
          ],
          googleCalendarApiKey: 'AIzaSyDcnW6WejpTOCffshGDDb4neIrXVUA1EAE',
          events: 'en.philippines#holiday@group.v.calendar.google.com',
        });
        calendar.render();
      });