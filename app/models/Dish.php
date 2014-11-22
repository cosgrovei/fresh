<?php 

class Dish extends Eloquent {
	
	protected $fillable = array('dishId', 'name', 'description', 'price','categoryId');
	
	protected $table = 'dishes';
	
	//validation is taken care of in the model with the $rules and $validate methods
	public static $rules = array(
		'dishId' => 'required|min:2|unique:dishes',
		'name' => 'required|min:5',
		'price1' => 'required|numeric'
		);
	
	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}
	
	protected $primaryKey = 'dishId';
    public $timestamps = false;

}

?>