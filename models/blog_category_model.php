<?php
class blog_category_model extends vendor_frap_model
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
			['blog_article', 'key'=>'categories_id', 'on_del'=>false],
		],
	];

	public function getCatOfBolog($id_str){
		$id_str = rtrim($id_str, ",");
		$id_str = ltrim($id_str, ",");
		$sql = "SELECT * FROM blog_categories where id in ($id_str)";
		$allRow = $this->con->query($sql);
		$categories = array();
		while( $row =  $allRow->fetch_assoc()) {   
			array_push($categories, $row);
		}   
		return ($categories);
	}

	public function getCatOfBologPublic($id_str){
		$id_str = rtrim($id_str, ",");
		$id_str = ltrim($id_str, ",");
		$sql = "SELECT * FROM blog_categories where id in ($id_str) and status=1";
		$allRow = $this->con->query($sql);
		$categories = array();
		while( $row =  $allRow->fetch_assoc()) {   
			array_push($categories, $row);
		}   
		return ($categories);
	}
	
}
?>