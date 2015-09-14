@extends('layouts.default')

@section('content')
{{ Form::open(array('action' => 'UserController@registerSNS', 'class'=>'form-horizontal' )) }}

<div class="form-group">
<div class="col-lg-1">
{{ Form::label('acc_neme', 'アカウント名:') }}
</div>

<div class="col-lg-7">
@if(isset($acc_name))
{{ Form::text('acc_name', $acc_name, array('class' => 'form-control')) }}
@else
{{ Form::text('acc_name', '', array('class' => 'form-control')) }}
@endif
</div>
</div>


<div class="form-group">
<div class="col-lg-1">
{{ Form::label('email', 'メールアドレス:') }}
</div>

<div class="col-lg-7">
@if(isset($email))
{{ Form::text('email', $email, array('class' => 'form-control')) }}
@else
{{ Form::text('email', '', array('class' => 'form-control')) }}
@endif
</div>
</div>

{{Form::hidden('provider', $provider)}}
{{Form::hidden('uid', $uid)}}
{{Form::hidden('nicname', $nicname)}}

<div class="form-group">
<div class="col-lg-8">
{{ Form::submit('OK', array('class' => 'btn btn-lg btn-info btn-block')) }}
</div>
</div>

{{ Form::close() }}
@stop