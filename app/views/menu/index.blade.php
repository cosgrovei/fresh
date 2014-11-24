@extends('layout.main')

@section('content')



@if(Session::has('message'))
	<p style="color: green">{{ Session::get('message') }}</p>
@endif 

<style>
table {
	border-collapse: collapse;
	width="100%";
	line-height: 2em;
}
a {
	text-decoration:none;
}
a:visited {
	color: #000;
}
a:hover { 

}
</style>
<h2><strong>{{ $message }}</strong></h2>


Please download a {{ $type }}  menu <a href="{{ $link }}" >{{$type}}.pdf</a>

<?php $cat=""; ?>
<?php $name=""; ?>
<div>
<table>
@foreach($dishes as $dish)
@if($cat != $dish->category)
<tr>
	<td colspan="4"><h3>{{ $dish->category }}</h3></td>

		<?php $cat=$dish->category ?>
</tr>
@endif
@if($dish->image != null)
<tr>
	<td  colspan="4" width="100%" align="center" ><br><img src="http://localhost/img/{{ $dish->image }}" width="200"> </td>
</tr>
@endif
<tr>
	<td nowrap><small><b>{{ $dish->dishId }}.</b></small></td>
	@if(Auth::check())
	<td width="100%"><b>{{ HTML::LinkRoute('dish', $dish->name, $parameters = array($dish->dishId,$type)) }} </b></td>
	@else
	<td width="100%"><b>{{$dish->name}}</b></td>
	@endif
	<td nowrap><small>{{ $dish->price1description}}</small></td>
	<td nowrap align="right">${{ $dish->price1}}</td>
</tr>

<tr>
	<td nowrap></td>
	<td width="100%">{{$dish->description}}</td>
	<td nowrap><small>{{ $dish->price2description}}</small></td>
	@if($dish->price2 > 0)
	<td nowrap align="right">${{ $dish->price2 }}</td>
	@else
	<td nowrap align="right"></td>
	@endif
</tr>
<tr class="border_bottom">
	<td nowrap></td>
	<td width="100%"></td>
	<td nowrap><small>{{ $dish->price3description}}</small></td>
	@if($dish->price3 > 0)
	<td nowrap align="right">${{ $dish->price3 }}</td>
	@else
	<td nowrap align="right"></td>
	@endif
</tr >

@endforeach
</table>
</div>
<br>

@if(Auth::check())
<p><button id="my-btn">{{ HTML::LinkRoute('dish_create', 'New dish',  $parameters = array($type))}}</button></p>
@endif
@stop