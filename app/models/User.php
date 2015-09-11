<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;
use Illuminate\Auth\UserInterface;

class User extends Eloquent implements UserInterface{
	use SoftDeletingTrait;

	//use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	protected $dates = ['deleted_at'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
	}

	public static $rules = array(
		'acc_name' => 'required|min:5',
		'email'    => 'required|email'
	);

	public function getAuthIdentifier() {
		return $this->uid;
	}
	public function getAuthPassword() {
		return $this->password_digest;
	}
	public function setRememberToken($r) {
		$this->remember_token = $r;
	}
	public function getRememberToken() {
		return $this->remember_token;
	}
	public function getRememberTokenName() {
		return 'remember_token';
	}
}
