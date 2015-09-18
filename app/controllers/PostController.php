<?php

class PostController extends \BaseController {

	public function createPost() 
	{
		// postの作成
		Log::debug('post create start');
		Log::debug([Input::all()]);
		
		$num = date("YmdHis", time())."_".Auth::user()->acc_name;
		
		$post = new Post;
		$post->num = $num;
		$post->user_id = Auth::user()->id;
		$post->order_id = Input::get('order_id');
		$post->post = Input::get('user_post');
		
		$post->pop_filename = Input::get('user_pop');
		
		$post->save();
		
		return Redirect::to('/');
	}


}


