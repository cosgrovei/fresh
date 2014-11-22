$(document).ready(function(){
	
$( "#date" ).datepicker({
	minDate: 1,
	dateFormat: "yy-mm-dd",
	changeMonth: true,
	changeYear: true
	});
	
$("#start, #finish").timepicker();


	//caching the DOM
	var $bookings = $('#bookings');
	var $date = $('#date');
	var $start= $('#start');
	var $finish = $('#finish');
	var $tableId = $('#tableId');
	var date = $date.val();
	var $msg = $("#msg");

$("#date").change(function () {
	
	$("#bookings").empty();
	$("#msg").empty();
	
	$msg.append('<h3>' + 'Bookings for ' + $date.val()+ '</h3>');
	$bookings.append('<tr><td>'+ 'Table number' + '</td><td>' + 'Start time' + '</td><td>' + 'Finish time' + '</td></tr>');
	
	$.ajax({
	type: 'GET',
	url: '/api/bookings/'+ $('#date').val(),
	success: function(bookings) {
		$.each(bookings, function(i, booking) {
			$bookings.append('<tr><td>'+ booking.tableId +'</td><td>'+ booking.start +'</td><td>'+ booking.finish +'</td></tr>');
		});
	  }
	});
	
	});
	
	
$('form').submit(function (e) {
	
	e.preventDefault();
	
	
	var start= $start.val();
	var date = $date.val();
	var finish = $finish.val();
	var tableId = $tableId.val();
	
	
	//post ajax
	$.post('api/bookings', {date: date, start: start, finish: finish, tableId: tableId }, function (newBooking) {
		$bookings.append('<tr><td>'+ newBooking.tableId +'</td><td>'+ newBooking.start +'</td><td>'+ newBooking.finish +'</td></tr>');		
	});
	
	this.reset();

});
	
});