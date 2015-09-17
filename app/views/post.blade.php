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
          <!-- 期間 -->
          募集期間：あと{{ $order->term }}日
        </div>
        <div class="col-md-12">
          <!-- ポイント -->
          ポイント：{{ $order->point }}
        </div>
        <div class="col-md-12">
          <!-- 対象顧客の性別 -->
          対象顧客の性別：
          @if($order->target_customer_sex  == 0)
            All
          @endif
          @if( $order->target_customer_sex == 1)
            Male
          @endif
          @if( $order->target_customer_sex == 2)
            Female
          @endif
        </div>
        <div class="col-md-12">
          <!-- 対象顧客の年齢層 -->
          対象顧客の年齢層：
          @if($order->target_customer_age == 0)
            All
          @endif
          @if($order->target_customer_age == 1)
            ～20
          @endif
          @if($order->target_customer_age == 20)
            20～40
          @endif
          @if($order->target_customer_age == 40)
            40～65
          @endif
          @if($order->target_customer_age == 65)
            65～
          @endif
        </div>
        <div class="col-md-12">
          <!-- viewの数 -->
          View：{{ $order->num_view }}
        </div>
        <div class="col-md-12">
          <!-- タグ -->
          タグ：{{-- $order->category_id --}} ダミー
        </div>
        @if($order->store_name_publication == 1)
          <!-- お店情報 -->
          <div class="col-md-12">
            店舗名：{{ $order->store_name }}
          </div>
        @endif  
      </div>
    </div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-2">
          商品説明
        </div>
        <div class="col-md-12">
          {{ $order->description }}
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

@stop

