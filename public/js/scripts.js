
$(function() {
    $('#timeOnly .time').timepicker({
		'showDuration': true,
		'timeFormat': 'g:ia'
    });
	
	var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
    var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);
	
	
});