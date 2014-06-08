<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>土地の味 | マスター管理画面</title>
<meta name="viewport" content="width=device-width,minimum-scale=1">
<link media="all" type="text/css" rel="stylesheet" href="/asset/css/bootstrap.css">
<link media="all" type="text/css" rel="stylesheet" href="/asset/css/bootstrap-theme.css">
</head>
<body style="padding-top:50px;" role="document">

<!-- 共通ナビゲーション -->
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/admin">土地の味 管理ツール</a>
    </div>
    
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
	    
	    <!-- マスタデータの管理 -->
	    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">マスターデータ管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
			  <li class="dropdown-header">アプリ内コンテンツ管理</li>
              <li><a href="#">最新情報の管理</a></li>
			  <li><a href="#">飲食店紹介の管理</a></li>
			  <li><a href="#">セレクトショップの管理</a></li>
			  <li class="divider"></li>
			  <li class="dropdown-header">デザインコンテンツの管理</li>
			  <li><a href="#">スライドメニューの管理</a></li>
			  <li><a href="#">ポップアップ広告の管理</a></li>
			</ul>
        </li>
		
		<!-- ユーザーデータの管理 -->
	    <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">ユーザーデータ管理<b class="caret"></b></a>
            <ul class="dropdown-menu">
			  <li class="dropdown-header">アプリ内コンテンツ管理</li>
              <li><a href="#">郷土料理紹介（投稿）の管理</a></li>
			  <li><a href="#">郷土料理紹介（コメント）の管理</a></li>
			  <li><a href="#">郷土料理紹介（ユーザー情報）の管理</a></li>
			</ul>
        </li>
        
		<!-- ユーザーデータの管理 -->        
        <li><a href="#">コンテンツ運用について</a></li>
        	        
      </ul>
    </div>
    <!--/.nav-collapse -->
    
  </div>
</div>

@yield('content')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script src="/asset/js/bootstrap.min.js"></script>
</body>
</html>