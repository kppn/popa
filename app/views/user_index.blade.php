<!-- app/views/nerds/index.blade.php -->

<!DOCTYPE html>
<!--
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
    <style>
      .auth-sns-logos {
        height: 50px;
        width: 50px;
        padding: 0px;
      }
    </style>
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('user') }}">Nerd Alert</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('user') }}">View All Nerds</a></li>
        <li><a href="{{ URL::to('user/create') }}">User Register</a>
    </ul>
</nav>
-->
@extends('layouts.default')

@section('content')

<h1>Welcome </h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url'=>'user/login', 'class'=>'form-vertical')) }}


<div class="form-group has-feedback animated fadeInLeft delayp1">
        <label>{{ Lang::get('core.email'); }}   </label>
        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        <i class="icon-users form-control-feedback"></i>
    </div>
    
    <div class="form-group has-feedback  animated fadeInRight delayp1">
        <label>{{ Lang::get('core.password'); }}    </label>
        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}
        <i class="icon-lock form-control-feedback"></i>
    </div>

    <button type="submit" class="btn btn-primary btn-sm btn-block" >Log In</button>
{{ Form::close() }}


<div class="row">
    <div class="col-md-1">
        <a href="{{URL::to('/oauthfacebook')}}"><img src={{asset('system/images/system_logo_facebook.png')}} alt="Facebook" class="auth-sns-logos"></a>
    </div>
    <div class="col-md-1">
        <a href="{{URL::to('/oauthfacebook')}}"><img src={{asset('system/images/system_logo_twitter.png')}}  alt="Twitter"  class="auth-sns-logos"></a>
    </div>
</div>


</div>

@stop

</body>
</html>

