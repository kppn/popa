<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

    class Order extends Eloquent
    {
    	use SoftDeletingTrait;

    	protected $table = 'orders';

    	protected $dates = ['deleted_at'];



    }
?>