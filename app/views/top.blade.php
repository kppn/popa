@extends('layouts.default')

@section('content')

<div class="container">

<!-- ここのスタイルは後で消す。わかり易くするため -->
<style>
  div {
    border: solid 1px;
    // margin: 10px;
  }
</style>

<h1>Top Page</h1>

  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-8">
          ここには認証やタグ、その他のコンテンツが入る<br>
          いまはダミー<br>
          いまはダミー<br>
        </div>
        <div class="col-md-3">
          いまはダミー<br>
          いまはダミー
        </div>
      </div>
    </div>
  </div>

  @if(!empty($order_sets))
    <div class="row">
      <div class="col-md-8">
        <?php $count = 0; ?>
        @while(!empty($order_sets))
          <?php $order_set = array_shift($order_sets); ?>
          @if($count == 3)
            <div class="row">
              <div class = "col-md-12">
                <div class="row-md-12">
                  <div class="col-md-12">
                    <a href="#">
                      ダミー広告
                    </a>
                  </div>
                  <div class="col-md-12">
                    ダミータイトル
                  </div>
                  <div class="col-md-12">
                    ダミー
                  </div>
                  <div class="col-md-12">
                    ダミー
                  </div>
                  <div class="col-md-12">
                    ダミー
                  </div>
                </div>
              </div>
            </div>
          @endif
          <div class="row">
            @while(!empty($order_set))
              <?php $order = array_shift($order_set); ?>
              <?php if ($order == null) {break;} ?>
              <div class = "col-md-6">
                <div class="row-md-12">
                  <div class="col-md-12">

                    <a href="post/{{ $order->id }}">
                      {{HTML::image('order_images/'.$order->list_image_filename1, $order->title, array('class' => 'img-responsive')) }}
                    </a>

                  </div>
                  <div class="col-md-12">
                    Title: {{ $order->title }}
                  </div>
                  <div class="col-md-12">
                    View: {{ $order->num_view }}
                  </div>
                  <div class="col-md-12">
                    Comments: {{ $order->num_comment }}
                  </div>
                  <div class="col-md-12">
                    POP: {{ $order->num_pop }}
                  </div>
                </div>
              </div>
            @endwhile
          </div>
          <?php $count++; ?>
        @endwhile
      </div>
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-11">
            後でメニューや広告が入る
            <ul>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-11">
            後でメニューや広告が入る
            <ul>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
              <li>今はダミー</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="row">
      <div class="col-md-12">
        <h1>募集中の依頼はありません</h1>
      </div>
    </div>
  @endif
</div>

@stop

