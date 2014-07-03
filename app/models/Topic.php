<?php
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Topic extends Eloquent implements StaplerableInterface {

	//Staplerの読み込み
	use EloquentTrait;
	
	protected $fillable = ['topic_id','title','description','flag','published','eyecatch'];
	
	//primary_keyの設定
	protected $primaryKey = 'topic_id';
		
	//コンストラクタ
	public function __construct(array $attributes = array()) {
		//画像の投稿設定
		$this->hasAttachedFile('eyecatch', [
			'styles' => [
				'medium' => '640x480#',
				'thumb' => '100x75#'
			],
			'url' => '/system/topics/:id/:style/:filename'
			//'url' => '/system/topics/:id_partition/:style/:filename'
		]);
		parent::__construct($attributes);
	}
		
}