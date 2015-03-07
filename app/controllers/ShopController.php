<?php
class ShopController extends BaseController
{
    
    /* 管理用ページネーション */
    private $admin_page_num = 10;
    
    /* 追加時のバリデーション */
    private $validate_add = array(
		'title'            => 'required|max:256',
		'kcpy'             => 'required|max:256',
		'main_text'        => 'required|max:1000',
		'mainimg' 	       => 'required|image|max:2000',
		'sub1img' 	       => 'image|max:2000',
		'sub2img' 	       => 'image|max:2000',
		'sub3img' 	       => 'image|max:2000',
		'sub4img' 	       => 'image|max:2000',
		'gurunabi_api_id'  => 'max:256',
		'hotpepper_api_id' => 'max:256',
		'livedoor_api_id'  => 'max:256',
		'suntory_api_id'   => 'max:256',
		'flag'             => 'required',
		'published'        => 'required',
    );

    /* 編集時のバリデーション */
    private $validate_edit = array(
		'title'            => 'required|max:256',
		'kcpy'             => 'required|max:256',
		'main_text'        => 'required|max:1000',
		'mainimg' 	       => 'image|max:2000',
		'sub1img' 	       => 'image|max:2000',
		'sub2img' 	       => 'image|max:2000',
		'sub3img' 	       => 'image|max:2000',
		'sub4img' 	       => 'image|max:2000',
		'gurunabi_api_id'  => 'max:256',
		'hotpepper_api_id' => 'max:256',
		'livedoor_api_id'  => 'max:256',
		'suntory_api_id'   => 'max:256',
		'flag'             => 'required',
		'published'        => 'required',
    );
    
    /* 管理画面TOP */
    public function control_index()
    {
        $shops = Shop::orderBy('shop_id','desc')->paginate($this->admin_page_num);           
        return View::make('shop.control_index')->with('shops', $shops);
    }

	/* 新規追加 */
    public function control_add()
    {
        return View::make('shop.control_add');
    }
	
    public function control_add_complete()
    {	
    	try{
    		
	    	$shop       = Input::all();
			$rules      = $this->validate_add;
			$validation = Validator::make($shop, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->withInput();
			}else{
				//正常の場合
				Shop::create($shop);
				return Redirect::to('/admin/shops/index');
	        }
	        
    	}catch(Exception $e){
    	
			return Redirect::to('/admin/shops/index');
			
    	}
    }
	
	/* 編集 */
	function control_edit($shop_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($shop_id) && !is_numeric($shop_id)){
			return Redirect::to('/admin/shops/index');
		}
		
        try{
        	
	        $shop = Shop::where('shop_id', $shop_id)->first();
	        return View::make('shop.control_edit')->with('shop', $shop);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/shops/index');
			
    	}
	}
	
    public function control_edit_complete()
    {	
		//プライマリキーがなければリダイレクト
        $shop_id = Input::get('shop_id');
        if(!isset($shop_id) && !is_numeric($shop_id)){
			return Redirect::to('/admin/shops/index');
		}
		
    	try{
    		//更新時の値のバリデーション
	        $new_shop   = Input::all();	        	        
			$rules      = $this->validate_edit;
			$validation = Validator::make($new_shop, $rules);
			if($validation->fails()){
				//エラーの場合
				return Redirect::back()->withErrors($validation)->with('shop', $new_shop);
			}else{
				//正常の場合
		        $shop = Shop::firstOrNew( array('shop_id' => $shop_id) );
		        if( !empty($new_shop['title']) )       $shop->title       = $new_shop['title'];
		        if( !empty($new_shop['kcpy']) )        $shop->kcpy        = $new_shop['kcpy'];
		        if( !empty($new_shop['main_text']) )   $shop->main_text   = $new_shop['main_text'];
		        if( !empty($new_shop['mainimg']) )     $shop->mainimg     = $_FILES['mainimg'];		        
		        if( !empty($new_shop['sub1_title']) )  $shop->sub1_title  = $new_shop['sub1_title'];
		        if( !empty($new_shop['sub1_text']) )   $shop->sub1_text   = $new_shop['sub1_text'];
		        if( !empty($new_shop['sub1img']) )     $shop->sub1img     = $_FILES['sub1img'];
		        if( !empty($new_shop['sub2_title']) )  $shop->sub2_title  = $new_shop['sub2_title'];
		        if( !empty($new_shop['sub2_text']) )   $shop->sub2_text   = $new_shop['sub2_text'];
		        if( !empty($new_shop['sub2img']) )     $shop->sub2img     = $_FILES['sub2img'];		        
		        if( !empty($new_shop['other_title']) ) $shop->other_title = $new_shop['other_title'];
		        if( !empty($new_shop['other_text']) )  $shop->other_text  = $new_shop['other_text'];
		        if( !empty($new_shop['published']) )   $shop->published   = $new_shop['published'];
		        if( !empty($new_shop['flag']) )        $shop->flag        = $new_shop['flag'];
				$shop->save();
				
				return Redirect::to('/admin/shops/index');
	        }
	        
    	}catch(Exception $e){
    		
			return Redirect::to('/admin/shops/index');
    	}
    }	
	
	/* 削除 */
	function control_delete($shop_id)
	{
		//プライマリキーがなければリダイレクト
		if(!isset($shop_id) && !is_numeric($shop_id)){
			return Redirect::to('/admin/shops/index');
		}

        try{
		
	        Shop::find($shop_id)->delete();
	        return Redirect::to('/admin/shops/index');
	    
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/shops/index');
    	}
    }

	/* 個別記事 */
	function control_view($shop_id)
	{
		//プライマリキーがなければリダイレクト
        if(!isset($shop_id) && !is_numeric($shop_id)){
			return Redirect::to('/admin/shops/index');
		}
		
        try{
        	
	        $shop = Shop::where('shop_id', $shop_id)->first();
	        return View::make('shop.control_view')->with('shop', $shop);
	        
	    }catch(Exception $e){
	    
			return Redirect::to('/admin/shops/index');
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
