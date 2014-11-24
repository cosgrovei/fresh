<?php

class MenuController extends BaseController {
	public $restful = true;
	
	public function menu($type) {
		
	if($type == 'lunch') 
	{
		$dishes = DB::table('dishes')
		->join('categories', 'dishes.categoryId', '=', 'categories.categoryId')
		->where('isLunch','1')
		->select('dishes.dishId',
				 'dishes.name',
				 'dishes.description',
				 'dishes.image',
				 'dishes.price1',
				 'dishes.price2',
				 'dishes.price3',
				 'dishes.price1description',
				 'dishes.price2description',
				 'dishes.price3description',
				 'dishes.categoryId',
				 'categories.name AS category')
		->get();
		$link = 'http://localhost/takeaway.pdf';
		
		$type = 'lunch';
		$message = 'Lunch & Takeaway Menu';
		
		return View::make('menu.index')
		->with('dishes',$dishes)
		//I pass this type variable to enable the user to the menu page they where on before
		->with('type',$type)
		->with('message',$message)
		->with('link',$link);
	}
	elseif($type == 'dinner'){
	
	}
		$dishes = DB::table('dishes')
		->join('categories', 'dishes.categoryId', '=', 'categories.categoryId')
		->where('isDinner','1')
		->select('dishes.dishId',
				 'dishes.name',
				 'dishes.description',
				 'dishes.image',
				 'dishes.price1',
				 'dishes.price2',
				 'dishes.price3',
				 'dishes.price1description',
				 'dishes.price2description',
				 'dishes.price3description',
				 'dishes.categoryId',
				 'categories.name AS category',
				 'categories.englishName AS englishName')
		->get();
		$link =  'http://localhost/dinner-menu.pdf';
		$message = 'Dinner Menu';
		$type = 'dinner';
		
		return View::make('menu.index')
		->with('dishes',$dishes)
		//this variable enables the user to return to the menu page they where on before
		->with('type',$type)
		->with('message',$message)
		->with('link',$link);
		
	}
	
	
	
	public function dish_create ($type) {
		
		$categories = Category::lists('name','categoryId');
		Return View::make('menu.create')
		->with('type', $type)
		->with('categories',$categories);
	}
	
	public function dish($id, $type) {
		$dish = Dish::find($id);
		
		$category = Category::where('categoryId',$dish->categoryId)->first(); 
		return View::make('menu.view')
			->with('dish', $dish)
			->with('type', $type)
			->with('category',$category);
	}
	
	public function store() {
	
		$validation  = Dish::validate(Input::all());
		
		if($validation->fails()) {
			$categories = Category::lists('name','categoryId');
			return View::make('menu.create')
			->with('type',Input::get('type'))
			->with('categories',$categories)
			->withErrors($validation)
			->withInput(Input::all());
		}

		
	    $dishId = Input::get('dishId');
		$name = Input::get('name');
		$description = Input::get('description');
		$price1 = Input::get('price1');
		$price1description = Input::get('price1description');
		$price2 = Input::get('price2');
		$price2description = Input::get('price2description');
		$price3 = Input::get('price3');
		$price3description = Input::get('price3description');
		$isSpecial = Input::get('isSpecial');
		$isLunch = Input::get('isLunch');
		$isDinner = Input::get('isDinner');
		$categoryId = 	Input::get('categories');
		
		if($isLunch == 0 && $isDinner == 0) {
			return View::make('menu.create');
		}
		
		
		
		$destinationPath = '';
		$filename        = '';
		
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			$destinationPath = public_path().'/img/';
			$filename = Input::file('image')->getClientOriginalName();
			$upload_success = $file->move($destinationPath, $filename);
		}
		
		
		
		DB::table('dishes')->insert(
			array('dishId' => $dishId,
				'name' => $name,
				'description' => $description,
				'isSpecial' => $isSpecial,
				'isLunch' => $isLunch,
				'isDinner' => $isDinner,
				'price1' => $price1,
				'image' => $filename,
				'price1description' => $price1description,
				'price2' => $price2,
				'price2description' => $price2description,
				'price3' => $price3,
				'price3description' => $price3description,
				'categoryId' => $categoryId
				));
		
		
		$message = $dishId.' '.$name.' added.';
		return Redirect::Route('menu',array('type' => input::get('type')))
		->with('message', $message);
	}
	
	public function edit($id,$type) {
	
		$categories = Category::lists('name','categoryId');
		return View::make('menu.edit')
		->with('dish', Dish::find($id))
		->with('type', $type)
		->with('categories',$categories);
	}
	
	public function update () {
	
		//get form data and saves to db
		$dishId = Input::get('dishId');
		$name = Input::get('name');
		$description = Input::get('description');
		$price1 = Input::get('price1');
		$price1description = Input::get('price1description');
		$price2 = Input::get('price2');
		$price2description = Input::get('price2description');
		$price3 = Input::get('price3');
		$price3description = Input::get('price3description');
		
		$isSpecial = Input::get('isSpecial');
		$isLunch = Input::get('isLunch');
		$isDinner = Input::get('isDinner');
		$isVegetarian = Input::get('isVegetarian');
		$isGlutenFree = Input::get('isGlutenFree');
		$categoryId = 	Input::get('categories');
		
		$destinationPath = '';
		$filename        = '';
				
		if (Input::hasFile('image')) {
			$file = Input::file('image');
			$destinationPath = public_path().'/img/';
			$filename = Input::file('image')->getClientOriginalName();
			$upload_success = $file->move($destinationPath, $filename);
		}
		

		
		
		DB::table('dishes')
			->where('dishId',$dishId)
			->update(array(
				'name' => $name,
				'description' => $description,
				'isSpecial' => $isSpecial,
				'isLunch' => $isLunch,
				'isDinner' => $isDinner,
				'isVegetarian' => $isVegetarian,
				'image' => $filename,
				'price1' => $price1,
				'price1description' => $price1description,
				'price2' => $price2,
				'price2description' => $price2description,
				'price3' => $price3,
				'price3description' => $price3description,
				'categoryId' => $categoryId
				));
		
		$message = 'dish '.$name.' is updated';
		
		return Redirect::Route('menu',array('type' => input::get('type')))
		->with('message', $message);
	}
	
	public function delete () {
		$message = Input::get('dishId').' deleted';
		Dish::find(Input::get('dishId'))->delete();
		return Redirect::Route('menu',array('type' =>input::get('type')))
		->with('message', $message);
	}
	
	
}

?>