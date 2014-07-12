<?php
class SlideController extends BaseController
{
    
    /* 管理用ページネーション */
    private $admin_page_num = 10;
    
    /* 追加時のバリデーション */
    private $validate_add = array(
		'title'       => 'required|max:256',
		'description' => 'required|max:1000',
		'eyecatch' 	  => 'required|image|max:2000',
		'flag'        => 'required',
		'published'   => 'required',    
    );

    /* 編集時のバリデーション */
    private $validate_edit = array(
		'title'       => 'required|max:256',
		'description' => 'required|max:1000',
		'eyecatch' 	  => 'image|max:2000',
		'flag'        => 'required',
		'published'   => 'required',    
    );
    
    /* 管理画面TOP */
    public function control_index()
    {
        $slides = Slide::orderBy('slide_id','desc')->paginate($this->admin_page_num);           
        return View::make('slide.control_index')->with('slides', $slides);
    }

	/* 新規追加 */
    public function control_add()
    {
        return View::make('slide.control_add');
    }
	
    public function control_add_complete()
    {	
    	try{
    		
	    	$slide      = Input::all();
			$rules      = $this->validate_add;
			$validation = Validator::make($slide, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->withInput();
			}else{
				//正常の場合
				Slide::create($slide);
				return Redirect::to('/admin/slides/index');
	        }
	        
    	}catch(Exception $e){
    	
			return Redirect::to('/admin/slides/index');
			
    	}
    }
	
	/* 編集 */
	function control_edit($slide_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($slide_id) && !is_numeric($slide_id)){
			return Redirect::to('/admin/slides/index');
		}
		
        try{
        	
	        $slide = Slide::where('slide_id', $slide_id)->first();
	        return View::make('slide.control_edit')->with('slide', $slide);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/slides/index');
			
    	}
	}
	
    public function control_edit_complete()
    {	
		//プライマリキーがなければリダイレクト
        $slide_id = Input::get('slide_id');
        if(!isset($slide_id) && !is_numeric($slide_id)){
			return Redirect::to('/admin/slides/index');
		}
		
    	try{
    		//更新時の値のバリデーション
	        $new_slide  = Input::all();	        	        
			$rules      = $this->validate_edit;
			$validation = Validator::make($new_slide, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->with('slide', $new_slide);
			}else{
				//正常の場合
		        $slide = Slide::firstOrNew( array('slide_id' => $slide_id) );
		        if( !empty($new_slide['title']) )       $slide->title       = $new_slide['title'];
		        if( !empty($new_slide['eyecatch']) )    $slide->eyecatch    = $_FILES['eyecatch'];
		        if( !empty($new_slide['published']) )   $slide->published   = $new_slide['published'];
		        if( !empty($new_slide['description']) ) $slide->description = $new_slide['description'];
		        if( !empty($new_slide['flag']) )        $slide->flag        = $new_slide['flag'];
				$slide->save();
				
				return Redirect::to('/admin/slides/index');
	        }
	        
    	}catch(Exception $e){
    		
			return Redirect::to('/admin/slides/index');
			
    	}
    }	
	
	/* 削除 */
	function control_delete($slide_id)
	{
		//プライマリキーがなければリダイレクト
		if(!isset($slide_id) && !is_numeric($slide_id)){
			return Redirect::to('/admin/slides/index');
		}

        try{
		
	        Slide::find($slide_id)->delete();
	        return Redirect::to('/admin/slides/index');
	    
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/slides/index');
			
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
