<?php 

class UsersController extends BaseController {
/*
	public function getIndex ()	{
		$my_form = "<form method='post'>
						<input name='text' value='Testing'>
						<input type='submit'>
						</form>";
		return $my_form;
	}
	
	public function postIndex ()
	{
		dd(Input::all());
	}

	public function actionAbout()
	{
		return "This is a User About page";
	}
	
	*/
	public function actionIndex()
	{
		return "This is a User Index page";
	}
	public function actionAbout()
	{
		return "This is a User About page";
	}
}
?>