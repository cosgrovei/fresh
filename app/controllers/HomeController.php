<?php

class HomeController extends BaseController {
	public function home () {
		return View::make('home');
				
	}
	
	public function contact () {	
		return View::make('contact');
	}
	
	public function catering () {	
		
		return View::make('catering');
		
	}


}
