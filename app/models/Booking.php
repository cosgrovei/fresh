<?php 

class Booking extends Eloquent {
	
	protected $fillable  = array('id','date','start','finish','tableId');
	
	protected $table = 'bookings';
	
	public $timestamps = false;
	
	public static $rules = array(
		'date' => 'required',
		'start' => 'required',
		'finish' => 'required',
		'table' => 'required'
	);
	
	public static function validate($data) {
		return Validator::make($data,static::$rules);
	}

}

?>