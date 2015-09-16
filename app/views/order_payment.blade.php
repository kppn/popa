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

{{ Form::open(array('url' => 'user/orderPayment')) }}

    <h2>Order Payment</h2>

    <div class="form-group">
        <label for="money">Money</label>
        <input class="" name="money" type="radio" id="" value="300" checked="">300 yen
        <input class="" name="money" type="radio" id="" value="500">500 yen
        <input class="" name="money" type="radio" id="" value="800">800 yen
    </div>
    
    <input type="hidden" name="store_name" value="{{$orders['store_name']}}" />
    <input type="hidden" name="store_name_publication" value="{{$orders['store_name_publication']}}" />
    <input type="hidden" name="postal_code" value="{{$orders['postal_code']}}" />
    <input type="hidden" name="phone_number" value="{{$orders['phone_number']}}" />
    <input type="hidden" name="title" value="{{$orders['title']}}" />
    <input type="hidden" name="description" value="{{$orders['description']}}" />
    <input type="hidden" name="category_id" value="{{$orders['category_id']}}" />
    <input type="hidden" name="target_customer_sex" value="{{$orders['target_customer_sex']}}" />
    <input type="hidden" name="target_customer_age" value="{{$orders['target_customer_age']}}" />

    <input type="hidden" name="list_image_filename1" value="{{$orders['list_image_filename1']}}"/>
    
    <input type="hidden" name="list_image_filename2" value="{{$orders['list_image_filename2']}}"/>
    <input type="hidden" name="list_image_filename3" value="{{$orders['list_image_filename3']}}"/>
    <input type="hidden" name="list_image_filename4" value="{{$orders['list_image_filename4']}}"/>
    <input type="hidden" name="list_image_filename5" value="{{$orders['list_image_filename5']}}"/>

    {{ Form::submit('Back', array('class' => 'btn btn-primary', 'name' =>'back')) }}
    {{ Form::submit('Confirm', array('class' => 'btn btn-primary', 'name' =>'confirm')) }}

{{ Form::close() }}

</div>
</body>
</html>