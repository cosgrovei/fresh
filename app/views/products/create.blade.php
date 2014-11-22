<h1>Add new Product</h1>
@if($errors->has())
	<p>{{ $errors->first('name')}}</p>
@endif


	{{ Form::open(array('url' => 'products/store', 'method' => 'post')) }}

	<p>
		{{ Form::label('name', 'Name:') }}<br />
		{{ Form::text('name') }}
	</p>

	<p>
		{{ Form::label('brand', 'Brand:') }}<br />
		{{ Form::text('brand') }}
	</p>
	<p>
		{{ Form::label('description', 'Description:') }}<br />
		{{ Form::text('description') }}
	</p>
	<p>{{ Form::submit('Add product') }}</p>

	{{ Form::close() }}