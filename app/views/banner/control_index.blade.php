@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>バナー広告情報の管理</h1>
		<p class="lead">バナー広告情報の管理を行います。</p>
	</div>

    <h3>バナー広告情報とは？</h3>
    <p>土地の味で掲載しているバナー広告です。<br>トップページ部分等の部分に掲載されます。</p>
	<br>
		
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>対象となる主なもの</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>バナー広告情報すべて（掲載日・バナー画像・タイトル等の文言も含みます）</li>
		    </ol>
		    <p><a href="/admin/banners/add" class="btn btn-large btn-primary">バナー広告情報を新規登録する</a></p>
		</div>

		<!-- データリストテーブル -->
		<table class="table table-bordered">
			<tr class="info">
				<th>ID</th>
				<th>画像</th>
				<th>タイトル</th>
				<th>本文</th>
				<th>掲載開始日</th>
				<th>掲載終了日</th>
				<th>状態</th>
				<th>作成日</th>
				<th>更新日</th>
				<th>編集</th>
				<th>削除</th>
			</tr>
			
			@if(!empty($banners))			
			@foreach($banners as $banner)
			<tr>
				<td>{{$banner->slide_id}}</td>
				<td><img src="{{$banner->eyecatch->url('thumb')}}"></td>
				<td>{{$banner->title}}</td>
				<td>{{$banner->description}}</td>
				<td>{{$banner->published_start}}</td>
				<td>{{$banner->published_end}}</td>
				<td>
				@if($banner->flag == "1")
					<span class="label label-primary">公開中</span>
				@else
					<span class="label label-default">非公開</span>
				@endif
				</td>
				<td>{{$banner->created_at}}</td>
				<td>{{$banner->updated_at}}</td>
				<td style="text-align:center;">
					<a class="btn btn-success" href="/admin/banners/edit/{{$banner->banner_id}}" roll="button">編集</a>
				</td>
				<td style="text-align:center;">
					<a class="btn btn-danger" href="javascript:deleteDialog('/admin/banners/delete/{{$banner->banner_id}}','このデータを削除してもよろしいですか？');" roll="button">削除</a>
				</td>
			</tr>
			@endforeach
			@endif
			
		</table>
	</div>
	
	<!-- ページネーション -->
	<div>
		@if(!empty($banners))
		{{$banners->links()}}
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