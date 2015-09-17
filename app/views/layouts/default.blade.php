<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>POPA</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
 
<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
 
<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<style>
body {
  padding-top: 70px;
}
.navbar-user-info {
  content: "";
  display: block;
  clear: both
}
.navbar-user-name {
  float: left;
  margin-left: 10px;
  margin-right: 10px;
}
.navbar-points {
  float: left;
  color: #ff6600;
  font-weight: bold;
  margin-left: 10px;
  margin-right: 10px;
}
</style>

</head>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample8">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ URL::to('/') }}">
        POPA
      </a>
    </div>
  <form class="navbar-form navbar-left" role="search">
    <div class="form-group">
      <input type="text" class="form-control" placeholder="検索キーワード">
    </div>
    <button type="submit" class="btn btn-default">検索</button>
  </form>
  <div class="navbar-collapse collapse" id="navbarEexample8">
    <ul class="nav navbar-nav">
      <li><a href="{{ URL::to('user/order') }}">依頼</a></li>
    </ul>
    @if(UserController::is_logined())
      <div class="navbar-text navbar-right">
        <div class="navbar-user-info">
          <div class="navbar-points">ポイント</div>
          {{-- {{$user->points}} --}}
          <div class="navbar-user-name">{{Auth::user()->acc_name}}</div>
        </div>
      </div>
    @else
      <p class="navbar-text navbar-right"><a href="{{ URL::to('user') }}" class="navbar-link">ログイン</a></p>
    @endif
  </div>
</div>
</nav>

<body>
 
@yield('content')
 
</div>


<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="question">
          問い合わせ<br>
          <ul class="footer-ul">
            <li> <a href="#">利用規約</a> </li>
            <li> <a href="#">個人情報の取り扱いについて</a> </li>
            <li> <a href="#">問い合わせ</a> </li>
            <li> <a href="#">運営会社</a> </li>
          </ul>
        </div>
        <div class="question">
          このサイトについて<br>
          <ul class="footer-ul">
            <li> <a href="#">POPA.comとは</a> </li>
            <li> <a href="#">よくある質問</a> </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>


</body>
 
</html>
