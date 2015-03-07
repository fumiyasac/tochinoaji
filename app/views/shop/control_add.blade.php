@extends('layouts.master')

@section('content')
<div class="container">

	<div class="page-header">
    	<h1>店舗紹介の新規追加</h1>
		<p class="lead">店舗紹介の新規追加を行います。</p>
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
		    	<li>メイン画像は640×320ピクセルにリサイズされます。<br>また、サムネイルは100×75ピクセルになります。</li>
		    	<li>サブ1〜4画像は300×420ピクセルにリサイズされます。<br>また、サムネイルは55×77ピクセルになります。</li>
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
				<th width="20%">キャッチコピー</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="kcpy" value="{{Input::old("kcpy")}}" type="text" id="inputKcpy" class="form-control" placeholder="キャッチコピーを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">メイン本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="main_text" id="inputMainText" class="form-control" rows="4" placeholder="メイン本文を入力して下さい">{{Input::old("main_text")}}</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">メイン画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="mainimg" type="file" id="inputMainImage" class="" placeholder="メイン画像をアップして下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="sub1_title" value="{{Input::old("sub1_title")}}" type="text" id="inputSub1Title" class="form-control" placeholder="サブ1タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="sub1_text" id="inputSub1Text" class="form-control" rows="4" placeholder="サブ1本文を入力して下さい">{{Input::old("sub1_text")}}</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">サブ1画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="sub1img" type="file" id="inputSub1Image" class="" placeholder="サブ1画像をアップして下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2タイトル</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="sub2_title" value="{{Input::old("sub2_title")}}" type="text" id="inputSub2Title" class="form-control" placeholder="サブ2タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2本文</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<textarea name="sub2_text" id="inputSub2Text" class="form-control" rows="4" placeholder="サブ2本文を入力して下さい">{{Input::old("sub2_text")}}</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">サブ2画像</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="sub2img" type="file" id="inputSub2Image" class="" placeholder="サブ2画像をアップして下さい" />
				</td>
			</tr>
			
			<tr>
				<th width="20%">サブ3タイトル</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="sub3_title" value="{{Input::old("sub3_title")}}" type="text" id="inputSub3Title" class="form-control" placeholder="サブ3タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ3本文</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<textarea name="sub3_text" id="inputSub3Text" class="form-control" rows="4" placeholder="サブ3本文を入力して下さい">{{Input::old("sub3_text")}}</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">サブ3画像</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="sub3img" type="file" id="inputSub3Image" class="" placeholder="サブ3画像をアップして下さい" />
				</td>
			</tr>
			
			<tr>
				<th width="20%">サブ4タイトル</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="sub4_title" value="{{Input::old("sub4_title")}}" type="text" id="inputSub4Title" class="form-control" placeholder="サブ4タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">サブ4本文</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<textarea name="sub4_text" id="inputSub4Text" class="form-control" rows="4" placeholder="サブ4本文を入力して下さい">{{Input::old("sub4_text")}}</textarea>
				</td>
			</tr>
			<tr>
				<th width="20%">サブ4画像</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="sub4img" type="file" id="inputSub4Image" class="" placeholder="サブ4画像をアップして下さい" />
				</td>
			</tr>
			
			<tr>
				<th width="20%">ぐるなびURL</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="gurunabi_api_id" value="{{Input::old("gurunabi_api_id")}}" type="text" id="inputGurunabiApiId" class="form-control" placeholder="ぐるなびURLを入力してください" />
				</td>
			</tr>
				<th width="20%">ホットペッパーURL</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="hotpepper_api_id" value="{{Input::old("hotpepper_api_id")}}" type="text" id="inputHotpepperApiId" class="form-control" placeholder="ぐるなびURLを入力してください" />
				</td>
			</tr>
			<tr>
				<th width="20%">ロケタッチグルメURL</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="livedoor_api_id" value="{{Input::old("livedoor_api_id")}}" type="text" id="inputLivedoorApiId" class="form-control" placeholder="ロケタッチグルメURLを入力してください" />
				</td>
			</tr>			
			<tr>
				<th width="20%">サントリーURL</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="suntory_api_id" value="{{Input::old("suntory_api_id")}}" type="text" id="inputSuntoryApiId" class="form-control" placeholder="サントリーURL" />
				</td>
			</tr>
			
			<tr>
				<th width="20%">その他タイトル</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<input name="other_title" value="{{Input::old("other_title")}}" type="text" id="inputOtherTitle" class="form-control" placeholder="その他タイトルを入力して下さい" />
				</td>
			</tr>
			<tr>
				<th width="20%">その他本文</th>
				<td width="5%"><span class="label label-default">任意項目</span></td>
				<td>
					<textarea name="other_text" id="inputOtherText" class="form-control" rows="4" placeholder="その他本文を入力して下さい">{{Input::old("other_text")}}</textarea>
				</td>
			</tr>

			<tr>
				<th width="20%">公開日</th>
				<td width="5%"><span class="label label-danger">必須項目</span></td>
				<td>
					<input name="published" value="{{Input::old("published")}}" type="text" id="inputPublished" class="form-control" placeholder="yyyy-mm-dd" />
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