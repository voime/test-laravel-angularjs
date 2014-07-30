<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	public function test() {
		//$transaction = Transaction::find('53d641702a5f5c3b682ca7e5');
		$pageSize = Input::json('pageSize'); 
		$page = Input::json('page'); 
		$transactions = User::skip(($page -1) * $pageSize)->take($pageSize)->get();
		foreach ($transactions as $transaction) {
			$output[]=array('name'=>$transaction->username,'age'=>$transaction->email);
		}
		return Response::json($output);
		//echo $transaction->user->name;
	}
	public function getNumOfPages()  {
		//$transactions = Transaction::count();
		//$transactions = Transaction::where('id', '53d648742a5f5c41738b4569')->count();
		return 5000;
	}

}