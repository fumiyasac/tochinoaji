<?php
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Shop extends Eloquent implements StaplerableInterface {

	//Staplerの読み込み
	use EloquentTrait;
	
	protected $fillable = [
		'shop_id',
		'title',
		'kcpy',
		'main_text',
		'mainimg',
		'sub1_title',
		'sub1_text',
		'sub1img',
		'sub2_title',
		'sub2_text',
		'sub2img',
		'other_title',
		'other_text',
		'flag',
		'published'
	];
	
	//primary_keyの設定
	protected $primaryKey = 'shop_id';
		
	//コンストラクタ
	public function __construct(array $attributes = array()) {
		//画像の投稿設定
		$this->hasAttachedFile('mainimg', [
			'styles' => [
				'medium' => '640x320#',
				'thumb' => '100x75#'
			],
			'url' => '/system/shops/main/:id/:style/:filename'
			//'url' => '/system/shops/:id_partition/:style/:filename'
		]);
		$this->hasAttachedFile('sub1img', [
			'styles' => [
				'medium' => '640x320#',
				'thumb' => '55x77#'
			],
			'url' => '/system/shops/sub1/:id/:style/:filename'
			//'url' => '/system/shops/sub1/:id_partition/:style/:filename'
		]);
		$this->hasAttachedFile('sub2img', [
			'styles' => [
				'medium' => '640x320#',
				'thumb' => '55x77#'
			],
			'url' => '/system/shops/sub2/:id/:style/:filename'
			//'url' => '/system/shops/sub2/:id_partition/:style/:filename'
		]);
		$this->hasAttachedFile('sub3img', [
			'styles' => [
				'medium' => '640x320#',
				'thumb' => '55x77#'
			],
			'url' => '/system/shops/sub3/:id/:style/:filename'
			//'url' => '/system/shops/sub3/:id_partition/:style/:filename'
		]);
		$this->hasAttachedFile('sub2img', [
			'styles' => [
				'medium' => '640x320#',
				'thumb' => '55x77#'
			],
			'url' => '/system/shops/sub4/:id/:style/:filename'
			//'url' => '/system/shops/sub4/:id_partition/:style/:filename'
		]);
		parent::__construct($attributes);
	}
		
}