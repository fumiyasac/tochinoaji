<?php
class SpecialController extends BaseController
{
    
    /* 管理用ページネーション */
    private $admin_page_num = 10;
    
    /* 追加時のバリデーション */
    private $validate_add = array(
		'title'       => 'required|max:256',
		'kcpy'        => 'required|max:256',
		'main_text'   => 'required|max:1000',
		'mainimg' 	  => 'required|image|max:2000',
		'sub1_title'  => 'required|max:256',
		'sub1_text'   => 'required|max:1000',
		'sub1img' 	  => 'required|image|max:2000',
		'sub2_title'  => 'required|max:256',
		'sub2_text'   => 'required|max:1000',
		'sub2img' 	  => 'required|image|max:2000',
		'flag'        => 'required',
		'published'   => 'required',
    );

    /* 編集時のバリデーション */
    private $validate_edit = array(
		'title'       => 'required|max:256',
		'kcpy'        => 'required|max:256',
		'main_text'   => 'required|max:1000',
		'mainimg' 	  => 'image|max:2000',
		'sub1_title'  => 'required|max:256',
		'sub1_text'   => 'required|max:1000',
		'sub1img' 	  => 'image|max:2000',
		'sub2_title'  => 'required|max:256',
		'sub2_text'   => 'required|max:1000',
		'sub2img' 	  => 'image|max:2000',
		'flag'        => 'required',
		'published'   => 'required',
    );
    
    /* 管理画面TOP */
    public function control_index()
    {
        $specials = Special::orderBy('special_id','desc')->paginate($this->admin_page_num);           
        return View::make('special.control_index')->with('specials', $specials);
    }

	/* 新規追加 */
    public function control_add()
    {
        return View::make('special.control_add');
    }
	
    public function control_add_complete()
    {	
    	try{
    		
	    	$special    = Input::all();
			$rules      = $this->validate_add;
			$validation = Validator::make($special, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->withInput();
			}else{
				//正常の場合
				Special::create($special);
				return Redirect::to('/admin/specials/index');
	        }
	        
    	}catch(Exception $e){
    	
			return Redirect::to('/admin/specials/index');
			
    	}
    }
	
	/* 編集 */
	function control_edit($special_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($special_id) && !is_numeric($special_id)){
			return Redirect::to('/admin/specials/index');
		}
		
        try{
        	
	        $special = Special::where('special_id', $special_id)->first();
	        return View::make('special.control_edit')->with('special', $special);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/specials/index');
			
    	}
	}
	
    public function control_edit_complete()
    {	
		//プライマリキーがなければリダイレクト
        $special_id = Input::get('special_id');
        if(!isset($special_id) && !is_numeric($special_id)){
			return Redirect::to('/admin/specials/index');
		}
		
    	try{
    		//更新時の値のバリデーション
	        $new_special = Input::all();	        	        
			$rules       = $this->validate_edit;
			$validation  = Validator::make($new_special, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->with('special', $new_special);
			}else{
				//正常の場合
		        $special = Special::firstOrNew( array('special_id' => $special_id) );
		        if( !empty($new_special['title']) )       $special->title       = $new_special['title'];
		        if( !empty($new_special['kcpy']) )        $special->kcpy        = $new_special['kcpy'];
		        if( !empty($new_special['main_text']) )   $special->main_text   = $new_special['main_text'];
		        if( !empty($new_special['mainimg']) )     $special->mainimg     = $_FILES['mainimg'];		        
		        if( !empty($new_special['sub1_title']) )  $special->sub1_title  = $new_special['sub1_title'];
		        if( !empty($new_special['sub1_text']) )   $special->sub1_text   = $new_special['sub1_text'];
		        if( !empty($new_special['sub1img']) )     $special->sub1img     = $_FILES['sub1img'];
		        if( !empty($new_special['sub2_title']) )  $special->sub2_title  = $new_special['sub2_title'];
		        if( !empty($new_special['sub2_text']) )   $special->sub2_text   = $new_special['sub2_text'];
		        if( !empty($new_special['sub2img']) )     $special->sub2img     = $_FILES['sub2img'];		        
		        if( !empty($new_special['other_title']) ) $special->other_title = $new_special['other_title'];
		        if( !empty($new_special['other_text']) )  $special->other_text  = $new_special['other_text'];
		        if( !empty($new_special['published']) )   $special->published   = $new_special['published'];
		        if( !empty($new_special['flag']) )        $special->flag        = $new_special['flag'];
				$special->save();
				
				return Redirect::to('/admin/specials/index');
	        }
	        
    	}catch(Exception $e){
    		
			return Redirect::to('/admin/specials/index');
			
    	}
    }	
	
	/* 削除 */
	function control_delete($special_id)
	{
		//プライマリキーがなければリダイレクト
		if(!isset($special_id) && !is_numeric($special_id)){
			return Redirect::to('/admin/specials/index');
		}

        try{
		
	        Special::find($special_id)->delete();
	        return Redirect::to('/admin/specials/index');
	    
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/specials/index');
			
    	}
    }

	/* 個別記事 */
	function control_view($special_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($special_id) && !is_numeric($special_id)){
			return Redirect::to('/admin/specials/index');
		}
		
        try{
        	
	        $special = Special::where('special_id', $special_id)->first();
	        return View::make('special.control_view')->with('special', $special);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/specials/index');
			
    	}
	}
	
/*
    public function show($id)
    {
        $post = Topic::findOrFail($id);
        return View::make('topic.show', ['topic' => $post]);
    }
*/

}
