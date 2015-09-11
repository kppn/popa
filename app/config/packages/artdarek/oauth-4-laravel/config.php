<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(
		/**
		 * Facebook
		 */
		'Facebook' => array(
			'client_id'     => Config::get('constants.OAUTH_FACEBOOK_APP_ID'),
			'client_secret' => Config::get('constants.OAUTH_FACEBOOK_APP_SECRET'),
			'scope'         => array('email'),
		),

		/**
		 * Twitter
		 */
		'Twitter' => array(
			'client_id'     => Config::get('constants.OAUTH_TWITTER_COMSUMER_KEY'),
			'client_secret' => Config::get('constants.OAUTH_TWITTER_COMSUMER_SECRET'),
		),
	)

);
