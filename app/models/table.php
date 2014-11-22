<?php

class Table extends Eloquent {
	
	protected $fillable = array('id','seats');
	protected $table = 'tables';
	public $timestamps = false;
	
}

?>