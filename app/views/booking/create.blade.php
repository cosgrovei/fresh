@extends('layout.main')

@section('content')
{{ HTML::script('http://localhost/js/jquery.timepicker.js') }}
{{ HTML::script('http://localhost/js/booking.js')}}
{{ HTML::script('http://localhost/js/Datepair.js')}}


<style>
form  {
    width: 250px;
}
label {
	width: 250px;
}
input {
	width: 150px;
	display:block;
	-webkit-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	-moz-box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
	box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.3);
}
input[type=submit] {
    padding:5px 15px;
	background:#ccc;
	border:0 none;
    cursor:pointer;
	margin-top:15px;
	float: right;
    -webkit-border-radius: 5px;
    border-radius: 5px; }
</style>




<!-- I want this part to set the finish time to an hour automatically
<script>
$(document).ready(function(){
	
	$("#start").change(function() {
		
		var date1 = new Date().toString("hh:mm tt");
		var date2 = date1.set
		
		$("#finish").val(date1);
	});

});
</script>

-->

<h1>Create Booking</h1>


	{{ Form::open(array('url' => 'booking/store', 'method' => 'post')) }}
	<fieldset id="timeOnly">
		
		{{ Form::label('date', 'Date:') }}
		{{ Form::text('date', null, array('id'=>'datepicker')) }}
		
		{{ Form::label('start', 'Start:') }}
		{{ Form::text('start', null, array('id'=>'start','class'=>'time start')) }}

		{{ Form::label('finish', 'Finish:') }}
		{{ Form::text('finish', null, array('id'=>'finish', 'class'=>'time end')) }}

		{{ Form::label('GuestId', 'Guest Id:') }}
		{{ Form::text('guestId') }}
		
		{{ Form::hidden('tableId',$tableId) }}
	
	{{ Form::submit('Add booking') }}

	</fieldset>
	{{ Form::close() }}
<br>
@stop