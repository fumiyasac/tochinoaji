<?php
class BannerController extends BaseController
{
    
    /* 管理用ページネーション */
    private $admin_page_num = 10;
    
    /* 追加時のバリデーション */
    private $validate_add = array(
		'title'       	  => 'required|max:256',
		'description' 	  => 'required|max:1000',
		'eyecatch' 	  	  => 'required|image|max:2000',
		'flag'        	  => 'required',
		'published_start' => 'required',
		'published_end'   => 'required',
    );

    /* 編集時のバリデーション */
    private $validate_edit = array(
		'title'           => 'required|max:256',
		'description'     => 'required|max:1000',
		'eyecatch' 	      => 'image|max:2000',
		'flag'            => 'required',
		'published_start' => 'required',
		'published_end'   => 'required',
    );
    
    /* 管理画面TOP */
    public function control_index()
    {
        $banners = Banner::orderBy('banner_id','desc')->paginate($this->admin_page_num);           
        return View::make('banner.control_index')->with('banners', $banners);
    }

	/* 新規追加 */
    public function control_add()
    {
        return View::make('banner.control_add');
    }
	
    public function control_add_complete()
    {	
    	try{
    		
	    	$banner     = Input::all();
			$rules      = $this->validate_add;
			$validation = Validator::make($banner, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->withInput();
			}else{
				//正常の場合
				Banner::create($banner);
				return Redirect::to('/admin/banners/index');
	        }
	        
    	}catch(Exception $e){
    	
			return Redirect::to('/admin/banners/index');
			
    	}
    }
	
	/* 編集 */
	function control_edit($banner_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($banner_id) && !is_numeric($banner_id)){
			return Redirect::to('/admin/banners/index');
		}
		
        try{
        	
	        $banner = Banner::where('banner_id', $banner_id)->first();
	        return View::make('banner.control_edit')->with('banner', $banner);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/banners/index');
			
    	}
	}
	
    public function control_edit_complete()
    {	
		//プライマリキーがなければリダイレクト
        $banner_id = Input::get('banner_id');
        if(!isset($banner_id) && !is_numeric($banner_id)){
			return Redirect::to('/admin/banners/index');
		}
		
    	try{
    		//更新時の値のバリデーション
	        $new_banner = Input::all();	        	        
			$rules      = $this->validate_edit;
			$validation = Validator::make($new_banner, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->with('banner', $new_banner);
			}else{
				//正常の場合
		        $banner = Banner::firstOrNew( array('banner_id' => $banner_id) );
		        if( !empty($new_banner['title']) )           $banner->title           = $new_banner['title'];
		        if( !empty($new_banner['eyecatch']) )        $banner->eyecatch        = $_FILES['eyecatch'];
		        if( !empty($new_banner['published_start']) ) $banner->published_start = $new_banner['published_start'];
		        if( !empty($new_banner['published_end']) )   $banner->published_end   = $new_banner['published_end'];
		        if( !empty($new_banner['description']) )     $banner->description     = $new_banner['description'];
		        if( !empty($new_banner['flag']) )            $banner->flag            = $new_banner['flag'];
				$banner->save();
				
				return Redirect::to('/admin/banners/index');
	        }
	        
    	}catch(Exception $e){
    		
			return Redirect::to('/admin/banners/index');
			
    	}
    }	
	
	/* 削除 */
	function control_delete($banner_id)
	{
		//プライマリキーがなければリダイレクト
		if(!isset($banner_id) && !is_numeric($banner_id)){
			return Redirect::to('/admin/banners/index');
		}

        try{
		
	        Banner::find($banner_id)->delete();
	        return Redirect::to('/admin/banners/index');
	    
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/banners/index');
			
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
