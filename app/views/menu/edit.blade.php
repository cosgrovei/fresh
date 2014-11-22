@extends('layout.main')

@section('content')
<style>
table {
	
}
</style>

<h1>Editing</h1>
<h2> {{$dish->dishId }}  {{ $dish->name }}</h2>


<table>
{{ Form::model($dish, array('url'=>'menu/update','method' => 'PUT','files' => true )) }} 
{{ Form::hidden('type',$type) }}
<tr>
	<td>{{ Form::label('dishId','Dish ID') }} </td>
	<td>{{ Form::text('dishId') }} </td>
</tr>
<tr>
	<td>{{ Form::label('name','Name')}}</td>
	<td>{{ Form::text('name') }}</td>
</tr>
<tr>
	<td>{{ Form::label('description','Description')}}</td>
	<td>{{ Form::textarea('description', null, array('size' => '20x5')) }}</td>
</tr>
<tr>
	<td>{{ Form::label('price1','Price 1') }} </td>
	<td>{{ Form::input('number', 'price1',null,$attributes = ['step' => 0.1]) }}</td>
</tr>
<tr>
	<td>{{ Form::label('price1description','Description')}}</td>
	<td>{{ Form::text('price1description') }}</td>
</tr>
<tr>
	<td>{{ Form::label('price2','Price 2') }} </td>
	<td>{{ Form::input('number', 'price2',null,$attributes = ['step' => 0.1]) }}</td>
</tr>
<tr>
	<td>{{ Form::label('price2description','Description')}}</td>
	<td>{{ Form::text('price2description') }}</td>
</tr>
<tr>
	<td>{{ Form::label('price3','Price 3') }} </td>
	<td>{{ Form::input('number', 'price3',null,$attributes = ['step' => 0.1]) }}</td>
</tr>
<tr>
	<td>{{ Form::label('price3description','Description')}}</td>
	<td>{{ Form::text('price3description') }}</td>
</tr>
<tr>
	<td>{{ Form::label('isLunch', 'Lunch dish') }} </td>
	<td>{{ Form::checkbox('isLunch')}} 
</tr>
<tr>
	<td>{{ Form::label('isDinner', 'Dinner dish') }} </td>
	<td>{{ Form::checkbox('isDinner')}} 
</tr>
<tr>
	<td>{{ Form::label('isVegetarian', 'Vegetarian dish') }} </td>
	<td>{{ Form::checkbox('isVegetarian')}} 
</tr>
<tr>
	<td>{{ Form::label('isGlutenFree', 'Gluten free dish') }} </td>
	<td>{{ Form::checkbox('isGlutenFree')}} 
</tr>
<tr>
	<td>{{ Form::label('image','Image file upload')}}</td>
	<td>{{ Form::file('image') }}</td>
</tr>
<tr>
	<td>Category</td>
	<td>{{ Form::select('categories', $categories, $dish->categoryId)}} </td>
</tr>
<tr>
	<td>{{ Form::submit('Update dish') }} </td>
</tr>
{{ Form::close()}}

</table>
<!--
<table>
{{ Form::open(array('url'=>'dish/update', 'method' => 'PUT')) }}

<tr>
	<td>{{ Form::label('Dish ID') }}</td>

	<td>{{ Form::text('dishId',$dish->dishId) }}</td>
</tr>
<tr>
	<td>{{ Form::label('Dish Name') }}</td>

	<td>{{ Form::text('name',$dish->name) }}</td>
</tr>
<tr>
	<td>{{ Form::label('Description') }}</td>

	<td>{{ Form::textarea('description',$dish->description, ['size' => '20x5']) }}</td>
</tr>
<tr>
	<td>{{ Form::label('Price')}}</td>
	<td>{{ Form::input('number', 'price', $dish->price,$attributes = ['step' => 0.1] ) }}</td>
</tr>
<tr>
	<td>{{ Form::label('Special') }}</td>
	<td>{{ Form::checkbox('isSpecial',$dish->isSpecial) }}</td>
</tr>
<tr>
	<td>{{ Form::label('Lunch') }}</td>
	<td>{{ Form::checkbox('isLunch',$dish->isLunch) }}</td>
</tr>
<tr>
	<td>{{ Form::label('Dinner') }}</td>
	<td>{{ Form::checkbox('isDinner',$dish->isDinner) }}</td>
</tr>
<tr>
	<td>{{ Form::submit('Update dish') }} </td>
</tr>
{{ Form::close() }}
</table>
-->

@stop