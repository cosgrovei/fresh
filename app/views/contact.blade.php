@extends('layout.main')

@section('content')
<ul id='products'>
</ul>



<h4>Add an item</h4>
<form id="contactForm" name="contactForm" method="post">
	<table>
		<tr>
			<td><label>Brand</label></td>
			<td><input type="text" name="brand" id="brand"></td>
		</tr>
		<tr>
			<td><label>Name</label></td>
			<td><input type="text" name="name" id="name"></td>
		</tr>
		<tr>
			<td><label>Description</label></td>
			<td><input type="text" name="description" id="description"></td>
		</tr>
		<tr>
			<td><button id="add-product">Add</button></td>
			<td></td>
		</tr>
	</table>
</form>
<br>



<script>

$(function (){
	load();
	//caching the DOM
	// var $products = $('#products');
	// var $name = $('#name');
	// var $brand = $('#brand');
	// var $description = $('#description');
	
	// $.ajax({
		// type: 'GET',
		// url: '/products/',
		// success: function(products) {
			// $.each(products, function(i, product) {
				// $products.append('<li>'+ product.brand +' '+ product.name +' '+ product.description +'</li>');
			// });
		// }
	// });

	$('#add-product').on('click', function () {
	
		// var product = {
			// brand: $brand.val(),
			// name: $name.val(),
			// description: $description.val()
		// };
		//alert();
		$.post( "/products/store", $( "form" ).serialize() );
		//load();
		
		// $.ajax({
			// type: 'POST',
			// url: '/products/store',
			// data: product,
			// success: function(data) {
				// console.log('success', data);
			// }
		// });

	});
	

});

function load(){
//caching the DOM
	var $products = $('#products');
	var $name = $('#name');
	var $brand = $('#brand');
	var $description = $('#description');
	
	$.ajax({
		type: 'GET',
		url: '/products/',
		success: function(products) {
			$.each(products, function(i, product) {
				$products.append('<li>'+ product.brand +' '+ product.name +' '+ product.description +'</li>');
			});
		}
	});
}
</script>


@stop