<h1>{{$product->name}}</h1>

<p>{{$product->description}}</p>
<!--
<style>
.submitLink {
background-color: transparent;
text-decoration: underline;
border: none;
color: blue;
cursor: pointer;
}
</style>-->

<span>
{{HTML::linkRoute('edit_product', 'edit', array($product->id))}}
{{Form::open(array('url'=>'product/delete','method'=>'DELETE','style'=>'display: inline;')) }}
{{Form::hidden('id', $product->id)}}
{{Form::submit('Delete', array('class' => 'submitLink'))}}
{{Form::close()}}
</span>
