@extends('layouts.master')

@section('content')
<div class="container">
	<div class="page-header">
    	<h1>土地の味 管理ツールへようこそ！</h1>
		<p class="lead">アプリのコンテンツ管理ツールになります。</p>
	</div>

    <h3>3つの管理を行うための画面です</h3>
    <p>マスターデータ管理・ユーザーデータ管理・運用マニュアルやポリシーを記載しています。<br>運用を行う際は、運用マニュアルとポリシーページをご一読ください。</p>
    <br>
    <div class="row">
        <div class="col-md-4">
        	<h4>● マスターデータ管理</h4>
        	<p>広告バナーやお店情報等のものを入力・変更・削除の際に使用します。</p>
        </div>
        <div class="col-md-4">
        	<h4>● ユーザーデータ管理</h4>
        	<p>ユーザー情報等を入力・変更・削除の際に使用します。</p>
        </div>
        <div class="col-md-4">
	        <h4>● コンテンツ運用について</h4>
        	<p>まずはご一読した上でご確認をお願いします。</p>
        </div>
    </div>
</div>
@stop