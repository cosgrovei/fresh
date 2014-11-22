<style>
table {
	margin: 20px;

}

td {
	text-align: left;
	
}

</style>
<script type="text/javascript">
  function checkForm(form)
  {
    if(!form.isDinner.checked) {
      alert("Please indicate dish either lunch/takeawy, dinner or both.");
      form.terms.focus();
      return false;
    }
    return true;
  }
</script>
@if($errors->has())
<ul>
	{{ $errors->first('dishId','<li>:message</li>') }}
	{{ $errors->first('name','<li>:message</li>') }}
	{{ $errors->first('price1','<li>:message</li>') }}
</ul>
@endif
<table>
{{ Form::open(array('url'=>'menu/store', 'files' => true , 'method'=> 'post', 'onsubmit' => 'return checkForm(this);' )) }}
{{ Form::hidden('type',$type) }}
<tr>
	<td>Menu ID Number</td>
</tr>
<tr>
	<td>
		{{ Form::text('dishId',Input::old('dishId')) }}
	</td>
</tr>
<tr>
	<td>Name</td>
</tr>
<tr>
	<td>{{ Form::text('name',Input::old('name')) }}</td>
</tr>
<tr>
	<td>Description</td>
</tr>
<tr>
	<td>
		{{ Form::text('description') }}
	</td>
</tr>
<tr>
	<td>Price 1</td>
</tr>
<tr>
	<td>
		{{ Form::input('number', 'price1', $value = null,$attributes = ['step' => 0.1] ) }}
	</td>
</tr>
<tr>
	<td>Price information</td>
</tr>
<tr>
	<td>{{ form::text('price1description')}}</td>
</tr>
<tr>
	<td>Price 2</td>
</tr>
<tr>
	<td>
		{{ Form::input('number', 'price2', $value = null,$attributes = ['step' => 0.1] ) }}
	</td>
</tr>
<tr>
	<td>Price information</td>
</tr>
<tr>
	<td>{{ form::text('price2description')}}</td>
</tr>
<tr>
	<td>Price 3</td>
</tr>
<tr>
	<td>
		{{ Form::input('number', 'price3', $value = null,$attributes = ['step' => 0.1] ) }}
	</td>
</tr>
<tr>
	<td>Price information</td>
</tr>
<tr>
	<td>{{ form::text('price3description')}}</td>
</tr>
<tr>
	<td>
		Specials menu {{ Form::checkbox('isSpecial', '1') }}
	</td>
</tr>
<tr>
	<td>
		Lunch/Takeaway menu {{ Form::checkbox('isLunch', '1',true) }}
	</td>
</tr>
<tr>
	<td>
		Dinner menu {{ Form::checkbox('isDinner','1',true) }}
	</td>
</tr>
<tr>
	<td>Image
	</td>
</tr>
<tr>
	<td>{{ Form::file('image') }}
	</td>
</tr>
<tr>
	<td>
		Category
	</td>
</tr>
<tr>
	<td>
		{{ Form::select('categories', $categories)}} 
	</td>
</tr>
<tr>
	<td>
		{{ Form::submit('Add Menu Item') }}
	</td>
</tr>
{{ Form::close()}}
</table>