<!-- app/views/user/create.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm CRUDding</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<h4 class="alert alert-success">Welcome  <a href="{{ URL::to('user/home') }}">{{ Auth::user()->acc_name }}</a> </h4>

<h1>Create a Order</h1>

<!-- if there are creation errors, they will show here -->
{{ HTML::ul($errors->all()) }}

{{ Form::open(array('url' => 'user/order', 'files'=>true)) }}

	<input type="hidden" name="acc_name" value="{{ Auth::user()->acc_name }}">
	<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">




    <div class="form-group">
        <label for="store_name">Store Name</label>
        <input class="form-control" name="store_name" type="text" id="store_name" value="">
    </div>

    <div class="form-group">
        <label for="store_name_publication">Store Name Publication</label>
        <input class="" name="store_name_publication" type="radio" id="store_name_publication" value="1">public
        <input class="" name="store_name_publication" type="radio" id="store_name_publication" value="0">private
    </div>

    <div class="form-group">
        <label for="postal_code">Postal Code</label>
        <input class="form-control" name="postal_code" type="text" id="postal_code">
    </div>

    <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <input class="form-control" name="phone_number" type="text" id="phone_number">
    </div>

    <div class="form-group">
        <label for="title">Title</label>
        <input class="form-control" name="title" type="text" id="title">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="" name="description" id="description"></textarea>
    </div>

    <div class="form-group">
        <label for="list_image_filename1">List Image Filename1</label>
        <input class="form-control" name="list_image_filename1" type="file" id="list_image_filename1">
    </div>

    <div class="form-group">
        <label for="list_image_filename2">List Image Filename2</label>
        <input class="form-control" name="list_image_filename2" type="file" id="list_image_filename2">
    </div>

    <div class="form-group">
        <label for="list_image_filename3">List Image Filename3</label>
        <input class="form-control" name="list_image_filename3" type="file" id="list_image_filename3">
    </div>

    <div class="form-group">
        <label for="list_image_filename4">List Image Filename4</label>
        <input class="form-control" name="list_image_filename4" type="file" id="list_image_filename4">
    </div>

    <div class="form-group">
        <label for="list_image_filename5">List Image Filename5</label>
        <input class="form-control" name="list_image_filename5" type="file" id="list_image_filename5">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select name="category_id">
        	<option value="category one">category one</option>
        	<option value="category two">category two</option>
        	<option value="category three">category three</option>
        </select>
    </div>

    <div class="form-group">
        <label for="target_customer_sex">Target Customer Sex</label>
        <input class="" name="target_customer_sex" type="radio" id="target_customer_sex" value="0" checked="">All
        <input class="" name="target_customer_sex" type="radio" id="target_customer_sex" value="1">Male
        <input class="" name="target_customer_sex" type="radio" id="target_customer_sex" value="2">Female
    </div>

    <div class="form-group">
        <label for="target_customer_age">Target_customer_age</label>
        <input class="" name="target_customer_age" type="radio" id="target_customer_age" value="0" checked="">All
        <input class="" name="target_customer_age" type="radio" id="target_customer_age" value="1">1-20
        <input class="" name="target_customer_age" type="radio" id="target_customer_age" value="20">20-40
        <input class="" name="target_customer_age" type="radio" id="target_customer_age" value="40">40-65
        <input class="" name="target_customer_age" type="radio" id="target_customer_age" value="65">65>
    </div>

    {{ Form::submit('Free', array('class' => 'btn btn-primary', 'name' =>'free')) }}
    {{ Form::submit('Pay', array('class' => 'btn btn-primary', 'name' => 'pay')) }}

{{ Form::close() }}

</div>
</body>
</html>