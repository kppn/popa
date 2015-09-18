<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

    class Post extends Eloquent
    {
    	use SoftDeletingTrait;

    	protected $table = 'posts';

    	protected $dates = ['deleted_at'];

	public function user() {
		return $this->belongsTo('User');
	}

	public function order() {
		return $this->belongsTo('Order');
	}

    }
?>
