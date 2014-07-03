@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>トピック情報の管理</h1>
		<p class="lead">アプリの最新情報の管理を行います。</p>
	</div>

    <h3>トピック情報とは？</h3>
    <p>アプリの最新情報や運営からのお知らせを指します。主に運営からの公式情報となります。</p>
	<br>
		
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>対象となる主なもの</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>アプリのバグ修正やアップデートがあった場合</li>
		    	<li>コンテンツ内で更新があった場合</li>
		    	<li>掲載情報やコラボ企画等のお知らせを行う場合</li>
		    	<li>サーバーサイドのメンテナンスを行う場合</li>
		    </ol>
		    <p><a href="/admin/topics/add" class="btn btn-large btn-primary">トピック情報を新規登録する</a></p>
		</div>

		<!-- データリストテーブル -->
		<table class="table table-bordered">
			<tr class="info">
				<th>ID</th>
				<th>画像</th>
				<th>タイトル</th>
				<th>本文</th>
				<th>公開日</th>
				<th>状態</th>
				<th>作成日</th>
				<th>更新日</th>
				<th>編集</th>
				<th>削除</th>
			</tr>
			
			@foreach($topics as $topic)
			<tr>
				<td>{{$topic->topic_id}}</td>
				<td><img src="{{$topic->eyecatch->url('thumb')}}"></td>
				<td>{{$topic->title}}</td>
				<td>{{$topic->description}}</td>
				<td>{{$topic->published}}</td>
				<td>
				@if($topic->flag == "1")
					<span class="label label-primary">公開中</span>
				@else
					<span class="label label-default">非公開</span>
				@endif
				</td>
				<td>{{$topic->created_at}}</td>
				<td>{{$topic->updated_at}}</td>
				<td style="text-align:center;">
					<a class="btn btn-success" href="/admin/topics/edit/{{$topic->topic_id}}" roll="button">編集</a>
				</td>
				<td style="text-align:center;">
					<a class="btn btn-danger" href="javascript:deleteDialog('/admin/topics/delete/{{$topic->topic_id}}','このデータを削除してもよろしいですか？');" roll="button">削除</a>
				</td>
			</tr>
			@endforeach
			
		</table>
	</div>
	
	<!-- ページネーション -->
	<div>
		{{$topics->links()}}
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