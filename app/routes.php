<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|


*/

// =============================================
// API ROUTES ==================================
// =============================================





Route::get('/api/bookings/{date}', array (
		'uses' => 'BookingController@getBooking'
));

Route::post('/api/bookings', array (
		'uses' => 'BookingController@postBooking'
));



Route::get('/products', function(){
	
	if(Request::ajax()) {
		$products = Product::all();
		//this route should returns json response
        return $products;
	}
});
	
Route::post('/products', function(){
	
	if(Request::ajax()) {
		
		$brand = Input::get('brand');
		$name = Input::get('name');
		$description = Input::get('description');
		
		DB::table('products')->insert(
			array('brand' => $brand,
				  'name' => $name,
				  'description' => $description
				  ));
		$product = new Product;
		$product->name = Input::get('name');
		$product->brand = Input::get('brand');
		$product->description = Input::get('description');
		
		return Response::json($product);
	}
    
});	
	

Route::get('/product/{id}', array(
	'as' => 'product',
	'uses' => 'ProductsController@get_view'
	));

Route::get('products/create', array(
	'as'=> 'create', 
	'uses'=>'ProductsController@Create'
	));

Route::post('products/store', array(
	'uses'=>'ProductsController@store'
	));

Route::get('product/{id}/edit', array(
	'as'=>'edit_product',
	'uses'=>'ProductsController@edit'));	
	
Route::put('product/update', array('uses' => 'ProductsController@update'));

Route::delete('product/delete', array('uses'=>'ProductsController@destroy'));

//
Route::get('prices', array(
	'as'=>'prices',
	'uses' => 'ProductsController@prices'
	));

// Menus routes 


Route::get('menu/create/{type}', array(
	'as' => 'dish_create',
	'before' => 'auth',
	'uses' => 'MenuController@dish_create'
	));

Route::get('menu/{type}', array(
	'as'=>'menu',
	'uses'=>'MenuController@menu'
	));
	
Route::get('takeaway', array(
	'as'=>'takeaway',
	'uses'=>'MenuController@takeaway'
	));
	
Route::get('dinner', array(
	'as'=>'dinner',
	'uses'=>'MenuController@dinner'
	));
	
	
Route::get('dish/{id}/{type}/edit', array(
	'before' => 'auth',
	'as'=>'edit_dish',
	'uses'=>'MenuController@edit'
	));

	
Route::post('menu/store', array(
	'before' => 'auth',
	'uses'=>'MenuController@store'
	));

Route::get('dish/{id}/{type}', array(
	'before' => 'auth',
	'as'=>'dish',
	'uses'=>'MenuController@dish'
	));	
	
Route::put('menu/update/', array(
	'before' => 'auth',
	'uses' => 'MenuController@update'
	));

Route::delete('menu/delete',array(
	'before' => 'auth',
	'uses' => 'MenuController@delete'
	));
	

Route::get('booking', array(
	'as'=>'booking',
	'uses'=>'BookingController@index'
	));
	
Route::post('booking/store', array(
	'uses'=>'BookingController@store'
	));
	
	
/*
Route::controller('booking', 'BookingController');
	
Route::get('booking/create/{tableId}', array(
	'as'=>'create_booking',
	'uses'=>'BookingController@create'
	));
	
Route::get('booking/james', array (
	'uses' => 'BookingController@james'
	));
	
Route::post('booking/store', array(
	'uses'=>'BookingController@store'
	));
	*/
Route::get('/',array(
	'as' => 'home',
	'uses' => 'HomeController@home'
	));
	
Route::get('contact',array(
	'as' => 'contact',
	'uses' => 'HomeController@contact'
	));

Route::get('catering',array(
	'as' => 'catering',
	'uses' => 'HomeController@catering'
	));
	
Route::put('product/update', array('uses' => 'ProductsController@update'));
	
	

// =============================================
// Admin Routes ================================
// =============================================

Route::get('admin', array('as' => 'admin', function () {
	
    return View::make('admin');
}));


Route::get('login', array('as' => 'login', function () {
	return View::make('login');
	}))->before('guest');

Route::post('login', function () {
        
		$user = array(
            'username' => Input::get('username'),
            'password' => Input::get('password')
        );
		
        if(Auth::attempt($user)) {
            return Redirect::route('admin')
                ->with('flash_notice', 'You are successfully logged in.');
        } else {
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
            ->with('flash_error', 'Your username/password combination was incorrect.')
            ->withInput();
		}
});

Route::get('logout', array('as' => 'logout', function () {
    Auth::logout();

    return Redirect::route('admin')
        ->with('flash_notice', 'You are successfully logged out.');
}))->before('auth');;



// =============================================
// Admin Routes ================================
// =============================================



	
Route::get('users', 'UsersController@actionIndex');

Route::get('users/about','UsersController@actionAbout');



?>