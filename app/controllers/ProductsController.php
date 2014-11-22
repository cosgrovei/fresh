<?php

class ProductsController extends BaseController {

	public $restful = true;

/* 	public function Load () {
		
		$Product = Product();		
		/*$data = $Product->description;
		
		return View::make('product')
				->with('data',$data);
	} */
	
	public function get_index() {
	
		$products = Product::all();
/*			
		return View::make('products.index')
			->with('title','Musical Instruments')
			->with('products', Product::all());
			
	return Response::json(array(
          'products' => $products->toArray())
		*/	
		return Response::json(Product::all()):
		
		
      );
	
	}
	
	public function get_view($id) {
		return View::make('products.view')
			->with('product', Product::find($id));
	}
	
	public function create() {
		return View::make('products.create')
			->with('title', 'add New product');
	}
	
	public function store() {
		
			$new = Input::all();
	*/	
	$name = Input::get('name');
	
	echo $name;
	
	/*
	// create a new model instance
	$p = new Product();
	$validation = $p->validate($new);
	if($validation == false)
		{
			$errors = $p->errors();
			return Redirect::route('create')
			->withErrors($errors);
		}
		else
		{
			return Redirect::route('products');	
		}
		
	
		$name  = Request::get('name');
		//$product->description  = Request::get('description');
		
		//$product->save();
		
		
		
		*/
		//$products = Product::all();
		
		
		
		
		$name = Input::get('name');
		$brand = Input::get('name');
		$description = Input::get('description');
		
		DB::table('products')->insert(
			array('brand' => $brand,
				  'name' => $name,
				  'description' => $description
				  ));
				  
		
		return Response::json(Product::all()):
			
	}
	
	public function edit($id) {
		return View::make('products.edit')->with('product', Product::find($id));
	}
	
	public function update() {
		
		
		$id = Input::get('id');
		/*
		$validation = Product::validate(Input::all());
		*/
		$name  = Input::get('name');
		$brand = Input::get('brand');	
		$description = Input::get('description');
		
		/*
		$product = Product::find($id);
		$product->name = Input::get('name');
		$product->brand = Input::get('brand');
		$product->description = Input::get('description');
		$product->save();
		*/
		
		DB::table('products')
			->where('id',$id)
			->update(array(
				'name' => $name,
				'brand' => $brand,
				'description' => $description
				));
		
		return Redirect::Route('products');
	}
	
	public function destroy () {
		Product::find(Input::get('id'))->delete();
		
		return Redirect::Route('products')
		->with('message', 'The product was deleted successfully!');
	}
	
	public function prices (){
		
		$products = DB::table('products')
			->join('prices','prices.productId','=','products.id')
			->select('products.id',
					 'products.brand',
					 'products.name',
					 'prices.cost',
					 'prices.description AS priceDescription',
					 'products.description')
			->get();
		

			
		return View::make('products.prices')
		->with('products',$products);
		
	}

}
