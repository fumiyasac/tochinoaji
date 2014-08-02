@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>特集記事の閲覧</h1>
		<p class="lead">特集記事の閲覧を行います。（長文になりますので必ず確認）</p>
	</div>
	
	<br>
	
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>確認時のポイント</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>誤字・脱字がないか。</li>
		    	<li>写真の加工・レイアウトは適切か。</li>
		    	<li>余計なHTMLタグ・過度な文字配色を用いていないか。</li>
		    	<li>読者が不快になるような表現・言い回しを用いていないか。</li>
		    </ol>
		</div>

		<!-- 入力項目 -->		
		<table class="table table-bordered">
			<tr class="info">
				<th colspan="3">入力項目</th>
			</tr>
			<tr>
				<th width="20%">特集記事ID</th>
				<td width="5%"><span class="label label-warning">primary</span></td>
				<td>
					{{$special->special_id}}
				</td>
			</tr>
			<tr>
				<th width="20%">タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->title}}
				</td>
			</tr>
			<tr>
				<th width="20%">キャッチコピー</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->kcpy}}
				</td>
			</tr>
			<tr>
				<th width="20%">メイン本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->main_text}}
				</td>
			</tr>
			<tr>
				<th width="20%">メイン画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<img src="{{$special->mainimg->url('medium')}}" style="margin-bottom:10px;">
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->sub1_title}}
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->sub1_text}}
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<img src="{{$special->sub1img->url('medium')}}" style="margin-bottom:10px;">
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->sub2_title}}
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->sub2_text}}
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<img src="{{$special->sub2img->url('medium')}}" style="margin-bottom:10px;">
				</td>
			</tr>
			<tr>
				<th width="20%">公開日</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					{{$special->published}}
				</td>
			</tr>
			<tr>
				<th width="20%">その他タイトル</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					{{$special->other_title}}
				</td>
			</tr>
			<tr>
				<th width="20%">その他本文</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					{{$special->other_text}}
				</td>
			</tr>
			<tr>
				<th width="20%">公開フラグ</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
				@if($special->flag == "1")
					<span class="label label-primary">公開中</span>
				@else
					<span class="label label-default">非公開</span>
				@endif
				</td>
			</tr>
		</table>
	</div>
	<!-- ページネーション -->
	<div>
		<a href="/admin/specials/index" class="btn btn-large btn-primary">一覧へ戻る</a>
	</div>
		
</div>
@stop