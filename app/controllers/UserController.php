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

	/**
	 * Login user with facebook
	 *
	 * @return void
	 */
	public function oauthFacebook()
	{
		Log::debug("Input::all() : ", Input::all());

		$code = Input::get( 'code' );
	
		$fb = OAuth::consumer( 'Facebook' );
		
		// if code is provided get user data and sign in
		if ( !empty( $code ) ) 
		{
			Log::debug("oauthFacebook: callback from Facebook");
			
			$token = $fb->requestAccessToken( $code );
			$result = json_decode( $fb->request( '/me' ), true );

			Log::debug('$fb->request() : ', $result);
			
			$uid = array('uid' => $result['id']);
			
			// バリデーションのルール指定, メッセージの指定
			// usersテーブルのproviderがfacebookの行でuidが一意かをチェック
			$rules = array(
				'uid' => 'unique:users,uid,NULL,id,provider,facebook',
			);
			$messages = array(
				'unique' => 'このユーザーは既に登録されています。', 
			);
			
			// バリデーションチェック
			$validator = Validator::make($uid, $rules, $messages);
			
			if($validator->fails())
			{
				Log::debug('validator fails');
				return Redirect::to('register')->withInput()->withErrors($validator);
			}
			
			// Eloquent ORMで$userインスタンスを作成してデータベースへ書き込む
			$user = new User;
			$user->provider = "facebook";
			$user->uid = $result['id'];
			$user->nicname = $result['name'];

			// TODO: Nameが一意かどうか調べる
			$user->acc_name = $user->nicname;

			// SNSアカウントではpasswordはダミー
			$user->password_digest = Hash::make('dummy');
			$user->sign_in_count   = '0';
			$user->activated       = '0';

			// TODO: emailが無い場合は取得ページへ遷移
			if (isset($result['email'])) {
				$user->email = $result['email'];
			}
			else {
				Log::debug('Email can't retrieved');
				$user->email = 'dummy@dummy.com';
			}
			$user->save();
			
			// TODO: セッション作成・ログイン情報の更新処理
			
			$id = Auth::user()->id;
			return Redirect::to('user/'.$id);
		}
		
		// 一番最初にアクセスした時
		else {
			Log::debug("oauthFacebook: first access");
			
			$url = $fb->getAuthorizationUri();
			// $url = '[object] (OAuth\\Common\\Http\\Uri\\Uri: ' . str_replace('oauthfacebook', 'oauthfacebook/', $url);

			Log::debug('$fb->getAuthorizationUri() : ', array(0 => $url));
			
			return Redirect::to( (string)$url );
		}
	}
}

