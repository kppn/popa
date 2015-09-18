@extends('layouts.default')

@section('content')

{{ HTML::style('css/quill.base.css', array('media'=>'screen')); }}
{{ HTML::style('css/quill.snow.css', array('media'=>'screen')); }}
{{ HTML::script('js/quill.js'); }}
{{ HTML::script('js/quill.min.js'); }}

<div class="container">

<!-- ここのスタイルは後で消す。わかり易くするため -->
<style>
  div {
    border: solid 1px;
    // margin: 10px;
  }

  .plan{
    color:red;

    margin-left: 250px;
    background:url('/images/star.png');
    background-size: 80px; 
    background-repeat: no-repeat;
  }


</style>

<h1>Post Page</h1>
  
  <!-- Order -->
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <!-- 画像 -->
        {{HTML::image('order_images/'.$order->list_image_filename1, $order->title, array('width' => 300 , 'height' => 300))}}
      </div>
    </div>
    <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <!-- タイトル -->
          タイトル：{{ $order->title }}
        </div>

        <div class="col-md-12">
          <!-- ポイント -->
          ポイント：{{ $order->point }}
        </div>



 
      </div>
    </div>

  </div>
   
  {{-- <!-- Create Post --> --}}
  <div class="row">
    <div class="col-md-12">
      POPの雛形
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-10">
          @include('wysiwyg')
        </div>
        <div class="col-md-2">
          送信ボタン
        </div>
      </div>
    </div>
  </div>

  {{-- <!-- Old Post --> --}}
  <div class="row">
    <div class="col-md-12">
      過去のPOP
    </div>
    <div class="col-md-8">
      POP

      <div>

  <p id="gg">Gold</p>

  <p id="ss">Silver</p>

  <p id="bb">Browse</p>

  <button id="cancel">Cancel</button><br/><br/>

  <!--<button id="post1" value="">Post 1</button><br/><br/>
  <button id="post2" value="">Post 2</button><br/><br/>
  <button id="post3" value="">Post 3</button>-->


  <p id="p_type1" class="plan"></p><br/><br/>
  <img src="{{ asset('images')}}/pop (1).jpg" class="img-responsive" alt="Responsive image" id="post1" width="304" height="236"><br/><br/>

  <p id="p_type2" class="plan"></p><br/><br/>
  <img src="{{ asset('images')}}/pop (2).jpg" class="img-responsive" alt="Responsive image" id="post2" width="304" height="236"><br/><br/>

  <p id="p_type3" class="plan"></p><br/><br/>
  <img src="{{ asset('images')}}/pop (3).jpg" class="img-responsive" alt="Responsive image" id="post3" width="304" height="236"><br/><br/>

</div>


    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12">
          作者：
        </div>
        <div class="col-md-12">
          作成日時：
        </div>
        <div class="col-md-12">
          ？？？：
        </div>
      </div>
    </div>
  </div>

</div>


<script src="{{ asset('js')}}/jquery.js"></script>
<script src="{{ asset('js')}}/jquery.min.js"></script>

<script>
$(document).ready(function(){


    $("#post1 , #post2, #post3").click(function(){
        //$("#g").hide();

        if ($('#gg').is(':visible') && $('#ss').is(':visible') && $('#bb').is(':visible')) {  
            $("#gg").hide();

            $("#p_type1").text($('#gg').text());
        }

        else if ($("#gg").is(":hidden") && $('#ss').is(':visible') && $('#bb').is(':visible')) {  
            $("#ss").hide();

            $("#p_type2").text($('#ss').text());
        }
        else{
            $("#bb").hide();
            
            $("#p_type3").text($('#bb').text());
        }

        //$(this).css('background-color','red');
        //$(this).removeClass( "img-responsive" ).addClass( "img-circle" );

        //alert('ok');

        });



    $("#cancel").click(function(){
        $("p").show();

        $("#p_type1").text('');
        $("#p_type2").text('');
        $("#p_type3").text('');

        /*$("#post1").removeClass( "img-circle" ).addClass( "img-responsive" );
        $("#post2").removeClass( "img-circle" ).addClass( "img-responsive" );
        $("#post3").removeClass( "img-circle" ).addClass( "img-responsive" );*/
    });

});
</script>

@stop

