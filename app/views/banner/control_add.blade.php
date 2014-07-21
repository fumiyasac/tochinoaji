@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>バナー広告情報の新規追加</h1>
		<p class="lead">バナー広告情報の新規追加を行います。</p>
	</div>
	
	<br>
	
	<form action="./add_complete" method="post" enctype="multipart/form-data">
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>入力時の注意事項</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>必須項目を入力しているかを確認して下さい。</li>
		    	<li>初回登録時は「非公開状態」で設定されます。</li>
		    	<li>画像は300×80ピクセルにリサイズされます。<br>また、サムネイルは150×40ピクセルになります。</li>
		    </ol>
		    
		    <ul>
				@foreach ($errors->all() as $error)
				<li style="color:#ff0000;">{{{ $error }}}</li>
				@endforeach
			</ul>
		</div>

		<!-- 入力項目 -->		
		<table class="table table-bordered">
			<tr class="info">
				<th colspan="3">入力項目</th>
			</tr>
			<tr>
				<th width="20%">タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="title" value="{{Input::old("title")}}" type="text" id="inputTitle" class="form-control" placeholder="タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="eyecatch" type="file" id="inputSlideImage" class="" placeholder="画像をアップして下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">掲載開始日</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="published_start" value="{{Input::old("published_start")}}" type="text" id="inputPublishedStart" class="form-control" placeholder="yyyy-mm-dd" />
					<script type="text/javascript">
					$(function(){
						$('#inputPublishedStart').datepicker({
							format: 'yyyy-mm-dd'
						});
					});
					</script>
				</td>
			</tr>
			<tr>
				<th width="20%">掲載終了日</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="published_end" value="{{Input::old("published_end")}}" type="text" id="inputPublishedEnd" class="form-control" placeholder="yyyy-mm-dd" />
					<script type="text/javascript">
					$(function(){
						$('#inputPublishedEnd').datepicker({
							format: 'yyyy-mm-dd'
						});
					});
					</script>
				</td>
			</tr>
			<tr>
				<th width="20%">本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="description" id="inputDescription" class="form-control" rows="4" placeholder="本文を入力して下さい">{{Input::old("description")}}</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">公開フラグ</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<label style="font-weight:normal;"><input type="radio" name="flag" value="1"> 公開</label>&nbsp;
					<label style="font-weight:normal;"><input type="radio" name="flag" value="2" checked> 非公開</label>
				</td>
			</tr>
		</table>
	</div>
	<!-- ページネーション -->
	<div>
		<button type="submit" class="btn btn-primary" style="margin:20px 0;">新規追加をする</button>
	</div>
	</form>
		
</div>
@stop