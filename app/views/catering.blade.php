@extends('layout.main')

@section('content')
@if($errors->has())
<ul>
	{{ $errors->first('date')}}
	{{ $errors->first('start')}}
	{{ $errors->first('finish')}}
</ul>

@endif

<br>
<style>
table#bookings {
	border: solid black 1px;
	border-collapse: collapse;
}
table#bookings td {
	border: solid black 1px;
	padding: 10px;
}
</style>
<aside>
<br>
<br>

<table id='bookings'>
</table>
</aside>
<div id="msg"><h3>Please select a date to book a table</h3></div>
<form action="" method="post" class="ajax">
<table>
<tr>
	<td>
		<input name="date" type="text" id="date" placeholder="date">
	</td>
</tr>
<tr>
	<td>
		<input type="text" name="start" id="start" placeholder="start time">
	</td>
</tr>
<tr>
	<td>
		<input type="text" name="finish" id="finish" placeholder="finish time">
	</td>
</tr>
<tr>
	<td>
		<input type="text" name="tableId" id="tableId" placeholder="Table number">
	</td>
</tr>
<tr>
	<td>
		<input type="submit" value="book">
	</td>
</tr>
</table>
</form>

{{ HTML::script('js/jquery.timepicker.js') }}

{{ HTML::script('js/jquery-ui.min.js') }}

<script src="js/main.js"></script>



			
@stop