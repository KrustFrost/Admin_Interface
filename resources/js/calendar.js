require('./bootstrap');
import './/evo-calendar.min.js';
$(document).ready(function() {
    $('#calendar').evoCalendar({
      'eventListToggler': true,
  });
  $('#calendar').evoCalendar('selectYear', 2021);
  $('#calendar').evoCalendar('setTheme', 'Midnight blue');
  return false;
});