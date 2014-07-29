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
	public function test(){
		//$transaction = Transaction::find('53d641702a5f5c3b682ca7e5');
		$transactions = Transaction::take(10)->get();
		foreach ($transactions as $transaction) {
			$output[]=array('name'=>$transaction->user->name,'age'=>$transaction->amount);
		}
		//var_dump($transaction);
		//echo $transaction;
		//

		return Response::json($output);
		//echo $transaction->user->name;
	}

}