<?php
class book_category_model extends vendor_frap_model
{
	public $nopp = 10;
	public static $status = [
						0 => 'Disable',
						1 => 'Enable'
					];

	public function rules() {
		global $app;
		return [
			'name' => ['string','unique', ['max', 'value'=>50]],
			'slug' => ['string','unique', ['max', 'value'=>50]],
		];
	}

	protected $relationships = [
		'hasMany'	=>	[
			['book_article', 'key'=>'categories_id', 'on_del'=>false],
		],
	];

	public function isCategory($cate_name){
		$cateNames = $this->all('book_categories.name',['conditions'=>'', 'joins'=>false, 'order'=>'id ASC']);
		$nameArr = [];
		foreach ($cateNames as $cateName) {
			array_push($nameArr, $cateName['name']);
		}
		if(in_array($cate_name, $nameArr)){
		    return true;
		}
		return false;
	}
	
	public function getCatOfBook($id_str){
		$id_str = rtrim($id_str, ",");
		$id_str = ltrim($id_str, ",");
		$sql = "SELECT * FROM book_categories where id in ($id_str)";
		$allRow = $this->con->query($sql);
		$categories = array();
		while( $row =  $allRow->fetch_assoc()) {   
			array_push($categories, $row);
		}   
		return ($categories);
	}

}
?>