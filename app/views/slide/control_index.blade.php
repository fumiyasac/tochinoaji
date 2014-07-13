@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>TOPページスライド情報の管理</h1>
		<p class="lead">TOPページスライドの最新情報の管理を行います。</p>
	</div>

    <h3>TOPページスライド情報とは？</h3>
    <p>TOPページに出しているスライドショーの画像等の情報です。<br>注目のトピックや広告情報等を一面に掲載したい場合に使用して下さい。</p>
	<br>
		
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>対象となる主なもの</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>TOPページに出すスライドとニュースティッカーの編集</li>
		    </ol>
		    <p><a href="/admin/slides/add" class="btn btn-large btn-primary">TOPページスライド情報を新規登録する</a></p>
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
			
			@if(!empty($slides))			
			@foreach($slides as $slide)
			<tr>
				<td>{{$slide->slide_id}}</td>
				<td><img src="{{$slide->eyecatch->url('thumb')}}"></td>
				<td>{{$slide->title}}</td>
				<td>{{$slide->description}}</td>
				<td>{{$slide->published}}</td>
				<td>
				@if($slide->flag == "1")
					<span class="label label-primary">公開中</span>
				@else
					<span class="label label-default">非公開</span>
				@endif
				</td>
				<td>{{$slide->created_at}}</td>
				<td>{{$slide->updated_at}}</td>
				<td style="text-align:center;">
					<a class="btn btn-success" href="/admin/slides/edit/{{$slide->slide_id}}" roll="button">編集</a>
				</td>
				<td style="text-align:center;">
					<a class="btn btn-danger" href="javascript:deleteDialog('/admin/slides/delete/{{$slide->slide_id}}','このデータを削除してもよろしいですか？');" roll="button">削除</a>
				</td>
			</tr>
			@endforeach
			@endif
			
		</table>
	</div>
	
	<!-- ページネーション -->
	<div>
		@if(!empty($slides))
		{{$slides->links()}}
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