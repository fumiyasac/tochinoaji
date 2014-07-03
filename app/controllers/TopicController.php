<?php
class TopicController extends BaseController
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
        $topics = Topic::orderBy('topic_id','desc')->paginate($this->admin_page_num);           
        return View::make('topic.control_index')->with('topics', $topics);
    }

	/* 新規追加 */
    public function control_add()
    {
        return View::make('topic.control_add');
    }
	
    public function control_add_complete()
    {	
    	try{
    		
	    	$topic      = Input::all();
			$rules      = $this->validate_add;
			$validation = Validator::make($topic, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->withInput();
			}else{
				//正常の場合
				Topic::create($topic);
				return Redirect::to('/admin/topics/index');
	        }
	        
    	}catch(Exception $e){
    	
			return Redirect::to('/admin/topics/index');
			
    	}
    }
	
	/* 編集 */
	function control_edit($topic_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($topic_id) && !is_numeric($topic_id)){
			return Redirect::to('/admin/topics/index');
		}
		
        try{
        	
	        $topic = Topic::where('topic_id', $topic_id)->first();
	        return View::make('topic.control_edit')->with('topic', $topic);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/topics/index');
			
    	}
	}
	
    public function control_edit_complete()
    {	
		//プライマリキーがなければリダイレクト
        $topic_id = Input::get('topic_id');
        if(!isset($topic_id) && !is_numeric($topic_id)){
			return Redirect::to('/admin/topics/index');
		}
		
    	try{
    		//更新時の値のバリデーション
	        $new_topic  = Input::all();	        	        
			$rules      = $this->validate_edit;
			$validation = Validator::make($new_topic, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->with('topic', $new_topic);
			}else{
				//正常の場合
		        $topic = Topic::firstOrNew( array('topic_id' => $topic_id) );
		        if( !empty($new_topic['title']) )       $topic->title       = $new_topic['title'];
		        if( !empty($new_topic['eyecatch']) )    $topic->eyecatch    = $_FILES['eyecatch'];
		        if( !empty($new_topic['published']) )   $topic->published   = $new_topic['published'];
		        if( !empty($new_topic['description']) ) $topic->description = $new_topic['description'];
		        if( !empty($new_topic['flag']) )        $topic->flag        = $new_topic['flag'];
				$topic->save();
				
				return Redirect::to('/admin/topics/index');
	        }
	        
    	}catch(Exception $e){
    		
			return Redirect::to('/admin/topics/index');
			
    	}
    }	
	
	/* 削除 */
	function control_delete($topic_id)
	{
		//プライマリキーがなければリダイレクト
		if(!isset($topic_id) && !is_numeric($topic_id)){
			return Redirect::to('/admin/topics/index');
		}

        try{
		
	        Topic::find($topic_id)->delete();
	        return Redirect::to('/admin/topics/index');
	    
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/topics/index');
			
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
