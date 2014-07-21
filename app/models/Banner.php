<?php
use Codesleeve\Stapler\ORM\StaplerableInterface;
use Codesleeve\Stapler\ORM\EloquentTrait;

class Banner extends Eloquent implements StaplerableInterface {

	//Staplerの読み込み
	use EloquentTrait;
	
	protected $fillable = ['banner_id','title','description','flag','published_start','published_end','eyecatch'];
	
	//primary_keyの設定
	protected $primaryKey = 'banner_id';
		
	//コンストラクタ
	public function __construct(array $attributes = array()) {
		//画像の投稿設定
		$this->hasAttachedFile('eyecatch', [
			'styles' => [
				'medium' => '300x80#',
				'thumb' => '150x40#'
			],
			'url' => '/system/banners/:id/:style/:filename'
			//'url' => '/system/slides/:id_partition/:style/:filename'
		]);
		parent::__construct($attributes);
	}
		
}