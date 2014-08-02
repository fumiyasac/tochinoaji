@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>特集記事の編集</h1>
		<p class="lead">特集記事の編集を行います。</p>
	</div>
	
	<br>
	
	<form action="../edit_complete" method="post" enctype="multipart/form-data">
	<div class="panel panel-default">
		
		<!-- データリストの説明 -->
		<div class="panel-heading"><strong>入力時の注意事項</strong></div>
		<div class="panel-body">
		    <ol>
		    	<li>必須項目を入力しているかを確認して下さい。</li>
		    	<li>初回登録時は「非公開状態」で設定されます。</li>
		    	<li>メイン画像は640×320ピクセルにリサイズされます。<br>また、サムネイルは100×75ピクセルになります。</li>
		    	<li>サブ1,サブ2画像は300×420ピクセルにリサイズされます。<br>また、サムネイルは55×77ピクセルになります。</li>
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
				<th width="20%">特集記事ID</th>
				<td width="5%"><span class="label label-warning">primary</span></td>
				<td>
					{{$special->special_id}}
					<input name="special_id" value="{{$special->special_id}}" type="hidden" id="inputSpecialId" />
				</td>
			</tr>
			<tr>
				<th width="20%">タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="title" value="@if($errors->all()){{Input::old("title")}}@else{{$special->title}}@endif" type="text" id="inputTitle" class="form-control" placeholder="タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">キャッチコピー</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="kcpy" value="@if($errors->all()){{Input::old("kcpy")}}@else{{$special->kcpy}}@endif" type="text" id="inputKcpy" class="form-control" placeholder="キャッチコピーを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">メイン本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="main_text" id="inputMainText" class="form-control" rows="4" placeholder="メイン本文を入力して下さい">@if($errors->all()){{Input::old("main_text")}}@else{{$special->main_text}}@endif</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">メイン画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<img src="{{$special->mainimg->url('medium')}}" style="margin-bottom:10px;">
					<br>
					<input name="mainimg" type="file" id="inputMainImage" class="" placeholder="メイン画像をアップして下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="sub1_title" value="@if($errors->all()){{Input::old("sub1_title")}}@else{{$special->sub1_title}}@endif" type="text" id="inputSub1Title" class="form-control" placeholder="サブ1タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="sub1_text" id="inputSub1Text" class="form-control" rows="4" placeholder="サブ1本文を入力して下さい">@if($errors->all()){{Input::old("sub1_text")}}@else{{$special->sub1_text}}@endif</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<img src="{{$special->sub1img->url('medium')}}" style="margin-bottom:10px;">
					<br>
					<input name="sub1img" type="file" id="inputSub1Image" class="" placeholder="サブ1画像をアップして下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="sub2_title" value="@if($errors->all()){{Input::old("sub2_title")}}@else{{$special->sub2_title}}@endif" type="text" id="inputSub2Title" class="form-control" placeholder="サブ2タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="sub2_text" id="inputSub2Text" class="form-control" rows="4" placeholder="サブ2本文を入力して下さい">@if($errors->all()){{Input::old("sub2_text")}}@else{{$special->sub2_text}}@endif</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<img src="{{$special->sub2img->url('medium')}}" style="margin-bottom:10px;">
					<br>
					<input name="sub2img" type="file" id="inputSub2Image" class="" placeholder="サブ2画像をアップして下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">公開日</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="published" value="@if($errors->all()){{Input::old("published")}}@else{{$special->published}}@endif" type="text" id="inputPublished" class="form-control" placeholder="yyyy-mm-dd" />
					<script type="text/javascript">
					$(function(){
						$('#inputPublished').datepicker({
							format: 'yyyy-mm-dd'
						});
					});
					</script>
				</td>
			</tr>
			<tr>
				<th width="20%">その他タイトル</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="other_title" value="@if($errors->all()){{Input::old("other_title")}}@else{{$special->other_title}}@endif" type="text" id="inputOtherTitle" class="form-control" placeholder="その他タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">その他本文</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<textarea name="other_text" id="inputOtherText" class="form-control" rows="4" placeholder="その他本文を入力して下さい">@if($errors->all()){{Input::old("other_text")}}@else{{$special->other_text}}@endif</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">公開フラグ</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
				
					<label style="font-weight:normal;"><input type="radio" name="flag" value="1" @if($special->flag == "1")checked@endif> 公開</label>&nbsp;
					<label style="font-weight:normal;"><input type="radio" name="flag" value="2" @if($special->flag == "2")checked@endif> 非公開</label>
				</td>
			</tr>
		</table>
	</div>
	<!-- ページネーション -->
	<div>
		<button type="submit" class="btn btn-primary" style="margin:20px 0;">編集をする</button>
	</div>
	</form>
		
</div>
@stop