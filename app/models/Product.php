<?php

class Product extends Eloquent {


	/*Define all the variables that are fillable*/ 
	protected $fillable  = array('name','brand','description');
	
	protected $table = 'products';

	private $rules = array(
		'name'=>'required|min:2',
		'brand'=>'required|min:2'
	);
	
	private $errors;
	
	public function validate($data) {
		// make a new validator object
        $v = Validator::make($data, $this->rules);
        		
		// check for failure
        if ($v->fails())
        {
            // set errors and return false
            $this->errors = $v->errors();
            return false;
        }
		
		// validation pass
        return true;
	}
	
	public function errors() {
        return $this->errors;
    }
}
?>