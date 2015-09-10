<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// get all the users
		$users = User::all();
		// load the view and pass the users
		return View::make('user_index')
			->with('users', $users);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('user_create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validate
		// read more on validation at http://laravel.com/docs/validation
		$rules = array(
			'name'       => 'required',
			'acc_name'   => 'required|unique:users',
			'email'      => 'required|email|unique:users',
			'password'   => Config::get('constants.VALIDATION_POPA_ACCOUNT_PASSWORD')
		);

		$validator = Validator::make(Input::all(), $rules);

		$input = Input::all();

		// process the register
		if ($validator->fails()) {
			return Redirect::to('user/create')
				->withErrors($validator)
				->withInput(Input::except('password'));
		} else {
			// store
			$user = new User;
			$user->nicname         = Input::get('name');
			$user->acc_name        = Input::get('acc_name');
			$user->email           = Input::get('email');
			$user->password_digest = Hash::make(Input::get('password'));
			$user->sign_in_count   = '0';
			$user->activated       = '0';
			$user->save();

			// redirect
			Session::flash('message', 'Successfully created nerd!');
			return Redirect::to('user');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
	}


}
