<h1>Editing </h1>

<h2>{{$product->brand}} {{$product->name}}</h2>

{{Form::open(array('url'=>'product/update', 'method' => 'PUT'))}}
		{{Form::hidden('id', $product->id)}}
	<p>
		{{ Form::label('name', 'Name:') }}<br />
		{{ Form::text('name', $product->name) }}
	</p>
	<p>
		{{ Form::label('brand', 'Brand:') }}<br />
		{{ Form::text('brand', $product->brand) }}
	</p>
	<p>
		{{ Form::label('description', 'Description:') }}<br />
		{{ Form::text('description', $product->description) }}
	</p>
	<p>{{ Form::submit('Update product') }}</p>
{{Form::close()}}