@extends('layouts.default')
 
@section('content')
<div class="col-lg-8">
<h4 class="alert alert-success">Hi there friend! Thanks for registering your email of  {{ Auth::user()->email }} </h4>
<a href="{{ URL::to('user/logout') }}">Logout</a>
</div>
@stop