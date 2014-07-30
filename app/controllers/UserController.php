<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// GET 	/user 	index 	user.index
    $model = User::take(100)->get();
 
    return Response::json(array(
        'error' => false,
        'user' => $model->toArray()),
        200
    );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		    $user = new User;
		    $user->user = Request::get('user');
		    $user->username = Request::get('username');
		    		 
		    // Validation and Filtering is sorely needed!!
		    // Seriously, I'm a bad person for leaving that out.
		 
		    $user->save();
		 
		    return Response::json(array(
		        'error' => false,
		        'user' => $user->toArray()),
		        200
		    );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::where('id', $id)
            ->take(1)
            ->get();
 
	    return Response::json(array(
	        'error' => false,
	        'user' => $user->toArray()),
	        200
	    );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		    $user = User::find($id);
 
		    if ( Request::get('user') )
		    {
		        $user->user = Request::get('user');
		    }
		 
		    if ( Request::get('username') )
		    {
		        $user->username = Request::get('username');
		    }
		 
		    $user->save();
		 
		    return Response::json(array(
		        'error' => false,
		        'message' => 'user updated'),
		        200
		    );
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		    $user = User::find($id);
 
		    $user->delete();
		 
		    return Response::json(array(
		        'error' => false,
		        'message' => 'user deleted'),
		        200
		        );
	}

}