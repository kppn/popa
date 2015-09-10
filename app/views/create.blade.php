@extends('layouts.default')

@section('content')
{{ Form::open(array('route' => 'sessions.store', 'class'=>'form-horizontal' )) }}

<div class="form-group">
<div class="col-lg-1">
{{ Form::label('email', 'Email:') }}
</div>

<div class="col-lg-7">
{{ Form::text('email', '', array('class' => 'form-control')) }}
</div>
</div>

<div class="form-group">
<div class="col-lg-1">
{{ Form::label('password', 'Password:') }}
</div>

<div class="col-lg-7">
{{ Form::password('password', array('class' => 'form-control')) }}
</div>
</div>

<div class="form-group">
<div class="col-lg-8">
{{ Form::submit('Login', array('class' => 'btn btn-lg btn-info btn-block')) }}
</div>
</div>

{{ Form::close() }}
@stop