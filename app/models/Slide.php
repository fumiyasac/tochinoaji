<?php
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Slide extends Eloquent implements StaplerableInterface {

	//Staplerの読み込み
	use EloquentTrait;
	
	protected $fillable = ['slide_id','title','description','flag','published','eyecatch'];
	
	//primary_keyの設定
	protected $primaryKey = 'slide_id';
		
	//コンストラクタ
	public function __construct(array $attributes = array()) {
		//画像の投稿設定
		$this->hasAttachedFile('eyecatch', [
			'styles' => [
				'medium' => '640x290#',
				'thumb' => '100x75#'
			],
			'url' => '/system/slides/:id/:style/:filename'
			//'url' => '/system/slides/:id_partition/:style/:filename'
		]);
		parent::__construct($attributes);
	}
		
}