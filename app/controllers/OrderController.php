<?php

class OrderController extends \BaseController {

	public function top()
	{
		// 募集期間中の依頼を取得
		$allorders = Order::all();
		
		$order_sets = array();

		while(! $allorders->isEmpty()){
			array_push($order_sets, [$allorders->shift(), $allorders->shift()] );
		}

		Log::debug('orders top : ', [$order_sets]);
		
		$view = View::make('top', compact('order_sets'));
		Log::debug($view->render());
		return $view;
	}

	public function orderDetail($id)
	{
		//
		Log::debug('orderDetail start : ', [$id]);

		$order = Order::find($id);
		
		$order->num_view++;
		DB::table('orders')->where('id', $id)->update(array('num_view' => $order->num_view));

		Log::debug($order);
		
		$view = View::make('post', compact('order'));
		Log::debug($view->render());
		return $view;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		if(Auth::check())
		{
			return View::make('order_create');
		}
		else{
			Session::flash('message', 'you must be login or register');
			return Redirect::to('user/login');
		}
			
	}

	public function createOrder()
	{
		$rules = array(
            'store_name'	=> 'required',
            'title'	=> 'required',
            'description'=>'required',
            'list_image_filename1'=>'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('user/order')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
        
        date_default_timezone_set('Asia/Tokyo');//日時ゾーン
        $fileFormat = date("YmdHis", time())."_".Input::get('acc_name');//エクセルファイルフォーマット
        $destinationPath = 'order_images/';

		$list_image_filename1 = Input::file('list_image_filename1');
		
		$list_image_filename2 = Input::file('list_image_filename2');
		$list_image_filename3 = Input::file('list_image_filename3');
		$list_image_filename4 = Input::file('list_image_filename4');
		$list_image_filename5 = Input::file('list_image_filename5');

		$list_image_filename1 = $fileFormat."_1.".$list_image_filename1->getClientOriginalExtension();
		Input::file('list_image_filename1')->move($destinationPath, $list_image_filename1);


		if (!empty($list_image_filename2)) {
			$list_image_filename2 = $fileFormat."_2.".$list_image_filename2->getClientOriginalExtension();
			Input::file('list_image_filename2')->move($destinationPath, $list_image_filename2);

		}else{
			$list_image_filename2 = "null";
		}

		if (!empty($list_image_filename3)) {
			$list_image_filename3 = $fileFormat."_3.".$list_image_filename3->getClientOriginalExtension();
			Input::file('list_image_filename3')->move($destinationPath, $list_image_filename3);

		}else{
			$list_image_filename3 = "null";
		}

		if (!empty($list_image_filename4)) {
			$list_image_filename4 = $fileFormat."_4.".$list_image_filename4->getClientOriginalExtension();
			Input::file('list_image_filename4')->move($destinationPath, $list_image_filename4);

		}else{
			$list_image_filename4 = "null";
		}

		if (!empty($list_image_filename5)) {
			$list_image_filename5 = $fileFormat."_5.".$list_image_filename5->getClientOriginalExtension();
			Input::file('list_image_filename5')->move($destinationPath, $list_image_filename5);

		}else{
			$list_image_filename5 = "null";
		}

		//exit();

		//Input::get('email'),
		//'password'  => Input::get('password')

		$orders= array
		(
			'store_name' =>Input::get('store_name'),
			'store_name_publication' =>Input::get('store_name_publication'),
			'postal_code' => Input::get('postal_code'),
			'phone_number' =>Input::get('phone_number'),
			'title' =>Input::get('title'),
			'description' =>Input::get('description'),
			'category_id' =>Input::get('category_id'),
			'target_customer_sex' =>Input::get('target_customer_sex'),
			'target_customer_age' =>Input::get('target_customer_age'),

			'list_image_filename1' => $list_image_filename1,
			'list_image_filename2' => $list_image_filename2,
			'list_image_filename3' => $list_image_filename3,
			'list_image_filename4' => $list_image_filename4,
			'list_image_filename5' => $list_image_filename5,

			'money' => 'null',
			'point' => 'null'
		);

		//var_dump($orders);
		//exit();

		//$store_name = Input::get('store_name');

		if (Input::get('free')) {
			return View::make('order_confirm')
				->with('orders',$orders);
		}elseif (Input::get('pay')) {
			return View::make('order_payment')
				->with('orders',$orders);
		}
        }
	}

	public function createOrderConfirm()
	{
		if (Input::has('back'))
        {
        	$list_image_filename1 = Input::get('list_image_filename1');
        	$destinationPath = 'order_images/';
        	File::delete($destinationPath.$list_image_filename1);

        	$list_image_filename2 = Input::get('list_image_filename2');
        	$list_image_filename3 = Input::get('list_image_filename3');
        	$list_image_filename4 = Input::get('list_image_filename4');
        	$list_image_filename5 = Input::get('list_image_filename5');

        	if ($list_image_filename2!="null") {
        		File::delete($destinationPath.$list_image_filename2);
			}

			if ($list_image_filename3!="null") {
        		File::delete($destinationPath.$list_image_filename3);
			}

			if ($list_image_filename4!="null") {
        		File::delete($destinationPath.$list_image_filename4);
			}

			if ($list_image_filename5!="null") {
        		File::delete($destinationPath.$list_image_filename5);
			}

        	

        	return View::make('order_create');

        }
        else if (Input::has('confirm'))
        {
        	date_default_timezone_set('Asia/Tokyo');//日時ゾーン
	        $num = date("YmdHis", time())."_".Input::get('acc_name');//エクセルファイルフォーマット

		//echo $num;
		//exit();

		$input = Input::all();

			// store
	        $order = new Order;

	        $order->num = $num;
	        $order->user_id = Input::get('user_id');
	        $order->store_name         = Input::get('store_name');
	        $order->store_name_publication        = Input::get('store_name_publication');
	        $order->postal_code           = Input::get('postal_code');
	        $order->phone_number = Input::get('phone_number');
	        $order->title   = Input::get('title');
	        $order->description = Input::get('description');
	        $order->category_id = Input::get('category_id');

	        $order->target_customer_sex = Input::get('target_customer_sex');
	        $order->target_customer_age = Input::get('target_customer_age');

	        $order->list_image_filename1 = Input::get('list_image_filename1');

	        $list_image_filename2 = Input::get('list_image_filename2');
        	$list_image_filename3 = Input::get('list_image_filename3');
        	$list_image_filename4 = Input::get('list_image_filename4');
        	$list_image_filename5 = Input::get('list_image_filename5');
		
		// TODO: 有料時は期間を選択させる
		$order->term = 7;

		$order->num_comment = 0;
		$order->num_view = 0;
		$order->num_pop = 0;

		//$order->payment_order = 0;

	        if ($list_image_filename2!="null") {
				$order->list_image_filename2 = $list_image_filename2;
		}

		if ($list_image_filename3!="null") {
        		$order->list_image_filename3 = $list_image_filename3;
		}

		if ($list_image_filename4!="null") {
        		$order->list_image_filename4 = $list_image_filename4;
		}

		if ($list_image_filename5!="null") {
			$order->list_image_filename5 = $list_image_filename5;
		}

		$money = Input::get('money');
		$point = Input::get('point');

		if ($money!="null") {
       			$order->money = $money;
			$order->payment_order = 1;
		}
		else{
			$order->money = 0;
			$order->payment_order = 0;
		}
			

		if($point!="null") {
        		$order->point = $point;
		}
		else {
			$order->point = 0;
		}

	        $order->save();

	    	// redirect
	        Session::flash('message', 'Successfully created Order!');
	        return Redirect::to('user/home');
        }
	}

	public function createOrderPayment()
	{
		if (Input::has('back'))
        {
       		$list_image_filename1 = Input::get('list_image_filename1');
        	$destinationPath = 'order_images/';
        	File::delete($destinationPath.$list_image_filename1);

        	$list_image_filename2 = Input::get('list_image_filename2');
        	$list_image_filename3 = Input::get('list_image_filename3');
        	$list_image_filename4 = Input::get('list_image_filename4');
        	$list_image_filename5 = Input::get('list_image_filename5');

        	if ($list_image_filename2!="null") {
        		File::delete($destinationPath.$list_image_filename2);
			}

			if ($list_image_filename3!="null") {
        		File::delete($destinationPath.$list_image_filename3);
			}

			if ($list_image_filename4!="null") {
        		File::delete($destinationPath.$list_image_filename4);
			}

			if ($list_image_filename5!="null") {
        		File::delete($destinationPath.$list_image_filename5);
			}

        	

        	return View::make('order_create');	
        }
        else if (Input::has('confirm'))
        {
        	$orders= array
			(
				'store_name' =>Input::get('store_name'),
				'store_name_publication' =>Input::get('store_name_publication'),
				'postal_code' => Input::get('postal_code'),
				'phone_number' =>Input::get('phone_number'),
				'title' =>Input::get('title'),
				'description' =>Input::get('description'),
				'category_id' =>Input::get('category_id'),
				'target_customer_sex' =>Input::get('target_customer_sex'),
				'target_customer_age' =>Input::get('target_customer_age'),

				'list_image_filename1' => Input::get('list_image_filename1'),
				'list_image_filename2' => Input::get('list_image_filename2'),
				'list_image_filename3' => Input::get('list_image_filename3'),
				'list_image_filename4' => Input::get('list_image_filename4'),
				'list_image_filename5' => Input::get('list_image_filename5'),

				'money' => Input::get('money'),
				'point' => Input::get('money')
			);

			return View::make('order_confirm')
				->with('orders',$orders);

        }	
	}


		private function testMethod() {

		}


}
