@extends('layout.main')

@section('content')


<h2>{{$dish->dishId}}. {{ $dish->name }} </h2>
<h3></h3>
<p>{{ $dish->description }}</p>
<p>{{ $dish->price }}</p>
<p>{{ $category->name }}</p>
<span>
{{ HTML::LinkRoute('menu', 'back to menu', $parameters = array($type)) }} | 
{{ HTML::linkRoute('edit_dish', 'edit',$parameters = array($dish->dishId, $type)) }} |
{{ Form::open(array('url'=>'menu/delete', 'method'=>'DELETE', 'style'=>'display:inline;')) }}
{{ Form::hidden('dishId', $dish->dishId) }}
{{ Form::hidden('type', $type) }}
{{Form::submit('Delete', array('class' => 'submitLink'))}}
{{Form::close()}}
</span>
@stop