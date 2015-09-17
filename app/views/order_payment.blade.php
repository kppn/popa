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
        <label for="service stage">Service Stage</label>

        @foreach($service_stages as $ss)
        <input class="" id="money" name="money" type="radio" id="" value="{{$ss->money}}" onclick="generateDate()">{{$ss->money}}
        @endforeach

    </div>


<input type="hidden" id="order_low_term" name="order_low_term" value="0">
                                    <input type="hidden" id="order_high_term" name="order_high_term" value="0">

        <input type="hidden" name="acc_name" value="{{ Auth::user()->acc_name }}">
    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">





                                    <div>
                                        <label>Test Date</label>
                                        <select name="sdate" id="sdate">
                                        </select>
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


<script src="{{ asset('js')}}/jquery.js"></script>
<script src="{{ asset('js')}}/jquery.min.js"></script>

<script type="text/javascript">

</script>

<script>
    
    function generateDate()
    {
            $.ajax({
            type: "GET",
            dataType: "json",
            url: 'orderDate',
            data:'money='+$('#money:checked').val(),

            beforeSend: function(){

            },
            success: function (data) 
            {      

                    //console.log(data[0].order_low_term+"-"+data[0].order_high_term);
                    //alert('oooooooooo');

                    //var order_low_term = data[0].order_low_term;
                    //var order_high_term = data[0].order_high_term;

                    //$('#select_date').val('0000-00-00');
                    //$('#datetimepicker1').empty();




                    //console.log(data);

                    //$('#item').html('');
                    $('#sdate').empty();

                    $.each(data, function(index, item_data){

                        $('#sdate').append('<option value='+item_data.select_date+'>'+item_data.select_date+'</option>')

                        
                    });






                   
                    
               },
               complete: function(){
                    // do the following after success is done.
                },
                error: function(){
                    // do the following if there is error. 
                }
            });
    }
</script>


</body>
</html>