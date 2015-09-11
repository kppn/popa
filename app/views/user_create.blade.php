<!-- app/views/user/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
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

<h1>Create a Nerd</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'user')) }}

    <div class="form-group">
        {{ Form::label('acc_name', 'Account Name') }}
        {{ Form::text('acc_name', Input::old('acc_name'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('confirm_password', 'Confirm Password') }}
        {{ Form::password('confirm_password', array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('User Register!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
