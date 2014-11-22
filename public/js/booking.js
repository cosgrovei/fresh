
$(function() {
$( "#datepicker" ).datepicker({
	minDate: 1,
	dateFormat: "yy-mm-dd",
	changeMonth: true,
	changeYear: true
	});

$('#timeOnly .time').timepicker({
	'step': 15,
	'forceRoundTime': true,
	'disableTimeRanges': [
	['12am', '10:59am'],
	['3pm', '4:59pm'],
	['9:30pm', '11:59pm']]
	});	
	
	
	var timeOnlyExampleEl = document.getElementById('timeOnly');
    var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);
});


