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

{{ Form::open(array('url' => 'user/orderConfirm')) }}

    <h2>Are you sure confirm</h2>
    <input type="hidden" name="acc_name" value="{{ Auth::user()->acc_name }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

    <input type="hidden" name="money" value="">
    
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

    <input type="hidden" name="money" value="{{$orders['money']}}"/>
    <input type="hidden" name="point" value="{{$orders['point']}}"/>

    <table class="table">
        <tr><td>Store Name</td><td>{{$orders['store_name']}}</td></tr>

        
            <tr><td>Store Name Publication</td>
            @if($orders['store_name_publication'] == '0')
                <td>private</td>
            @else
                <td>public</td>
            @endif
            </tr>

        <tr><td>Postal Code</td><td>{{$orders['postal_code']}}</td></tr>
        <tr><td>Phone Number</td><td>{{$orders['phone_number']}}</td></tr>
        <tr><td>Title</td><td>{{$orders['title']}}</td></tr>
        <tr><td>Description</td><td>{{$orders['description']}}</td></tr>
        <tr><td>Category</td><td>{{$orders['category_id']}}</td></tr>

        <tr><td>Target Customer Sex</td>
        @if($orders['target_customer_sex'] == '0')
            <td>All</td>
        @elseif($orders['target_customer_sex'] == '1')
            <td>Male</td>
        @else
            <td>Female</td>
        @endif
        </tr>

        <tr><td>Target Customer Age</td>
        @if($orders['target_customer_age'] == '0')
            <td>All</td>
        @elseif($orders['target_customer_age'] == '1')
            <td>1-20</td>
        @elseif($orders['target_customer_age'] == '20')
            <td>20-40</td>
        @elseif($orders['target_customer_age'] == '40')
            <td>40-65</td>
        @else
            <td>65></td>
        @endif
        </tr>

        <tr><td>List Image Filename1</td><td><img src="{{ asset('order_images')}}/{{$orders['list_image_filename1']}}"></td></tr>

        @if($orders['list_image_filename2']!="null")
        <tr><td>List Image Filename2</td><td><img src="{{ asset('order_images')}}/{{$orders['list_image_filename2']}}"></td></tr>
        @endif

        @if($orders['list_image_filename3']!="null")
        <tr><td>List Image Filename3</td><td><img src="{{ asset('order_images')}}/{{$orders['list_image_filename3']}}"></td></tr>
        @endif

        @if($orders['list_image_filename4']!="null")
        <tr><td>List Image Filename4</td><td><img src="{{ asset('order_images')}}/{{$orders['list_image_filename4']}}"></td></tr>
        @endif

        @if($orders['list_image_filename5']!="null")
        <tr><td>List Image Filename5</td><td><img src="{{ asset('order_images')}}/{{$orders['list_image_filename5']}}"></td></tr>
        @endif

    </table>

    {{ Form::submit('Back', array('class' => 'btn btn-primary', 'name' =>'back')) }}
    {{ Form::submit('Confirm', array('class' => 'btn btn-primary', 'name' =>'confirm')) }}

{{ Form::close() }}

</div>
</body>
</html>