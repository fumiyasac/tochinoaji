@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>特集記事の管理</h1>
		<p class="lead">特集記事の管理を行います。</p>
	</div>

    <h3>特集記事とは？</h3>
    <p>運営スタッフが厳選＋キュレーションしてお届けする「記事・エッセイ」等を指します。</p>
	<br>
		
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>対象となる主なもの</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>筆者及び運営スタッフによる記事・エッセイ</li>
		    	<li>おすすめ商品を実際に購入して食べてみた感想等</li>
		    	<li>アンケートコンテンツへのランディングページ</li>
		    </ol>
		    <p><a href="/admin/shops/add" class="btn btn-large btn-primary">特集記事を新規登録する</a></p>
		</div>

		<!-- データリストテーブル -->
		<table class="table table-bordered">
			<tr class="info">
				<th>ID</th>
				<th>メイン画像</th>
				<th>タイトル</th>
				<th>キャッチコピー</th>
				<th>公開日</th>
				<th>状態</th>
				<th>作成日</th>
				<th>更新日</th>
				<th>閲覧</th>
				<th>編集</th>
				<th>削除</th>
			</tr>
			
			@if(!empty($shops))
			@foreach($shops as $shop)
			<tr>
				<td>{{$shop->shop_id}}</td>
				<td><img src="{{$shop->mainimg->url('thumb')}}"></td>
				<td>{{$shop->title}}</td>
				<td>{{$shop->kcpy}}</td>
				<td>{{$shop->published}}</td>
				<td>
				@if($shop->flag == "1")
					<span class="label label-primary">公開中</span>
				@else
					<span class="label label-default">非公開</span>
				@endif
				</td>
				<td>{{$shop->created_at}}</td>
				<td>{{$shop->updated_at}}</td>
				<td style="text-align:center;">
					<a class="btn btn-warning" href="/admin/shops/view/{{$shop->shop_id}}" roll="button">閲覧</a>
				</td>
				<td style="text-align:center;">
					<a class="btn btn-success" href="/admin/shops/edit/{{$shop->shop_id}}" roll="button">編集</a>
				</td>
				<td style="text-align:center;">
					<a class="btn btn-danger" href="javascript:deleteDialog('/admin/shops/delete/{{$shop->shop_id}}','このデータを削除してもよろしいですか？');" roll="button">削除</a>
				</td>
			</tr>
			@endforeach
			@endif
			
		</table>
	</div>
	
	<!-- ページネーション -->
	<div>
		@if(!empty($shops))
		{{$shops->links()}}
		@endif
	</div>
		
	<!-- 削除ボタン用 -->
	<script type="text/javascript">
		function deleteDialog(url,message){
			if(confirm(message)){
				location.href = url;
			}
		}
	</script>
	
</div>
@stop