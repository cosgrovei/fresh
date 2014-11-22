@extends('layout.main')

@section('content')

@include('booking.bookingform')












<!--


<!--
<style>
table {
   border: 1px solid black;
   margin: 20px 0px;
}

th, td {
   border: 1px solid black;
}
</style


@if(Session::has('message'))
	<p style="color: green">{{ Session::get('message') }}</p>
@else
	<h2>Please choose a date<h2>
@endIf

{{ Form::open(array('url' => 'booking/james', 'method' => 'get')) }}
	
		{{ Form::label('date', 'Date:') }}
		{{ Form::text('date', null, array('id'=>'datepicker')) }}

	{{ Form::submit('Add booking') }}

{{ Form::close() }}



<!--
<table>

<tr>
	<th>Table Number</th>
	<th>Number of Seats</th>
</tr>
@foreach($tables as $table)
<tr>
	<td>{{ $table->Id }}</td>
	<td>{{ $table->seats }}</td>
</tr>
@endforeach
</table>

<div>
{{ HTML::LinkRoute('create_booking', 'Table 1 seats 4',$parameters = array('1'),array('class'=>'tableAnchor')) }} 
{{ HTML::LinkRoute('create_booking', 'Table 2 seats 4',$parameters = array('2'),array('class'=>'tableAnchor')) }} 

</div>







<table>
<tr>
	<td>
	<svg width="400" height="180">
	  <rect x="50" y="20" rx="20" ry="20" width="150" height="150" style="fill:red;stroke:black;stroke-width:5;opacity:0.5">
	  Sorry, your browser does not support inline SVG.
	</svg>
	</td>
	<td> {{ HTML::LinkRoute('create_booking','book table') }}</td>
</tr>
</table>
-->
@stop