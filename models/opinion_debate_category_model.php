<?php
class opinion_debate_category_model extends vendor_frap_model
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
			['opinion_debate_article', 'key'=>'categories_id', 'on_del'=>false],
		],
	];

	// public function getAllCategories(){
	// 	$sql = "SELECT * FROM opinion_debate_categories";
	// 	$allRow = $this->con->query($sql);
	// 	$categories = array();
	// 	while( $row =  $allRow->fetch_assoc()) {   
	// 		array_push($categories, $row);
	// 	}   
	// 	return ($categories);
	// }
	public function getCatOfOpinion($id_str){
		$id_str = rtrim($id_str, ",");
		$id_str = ltrim($id_str, ",");
		$sql = "SELECT * FROM opinion_debate_categories where id in ($id_str)";
		$allRow = $this->con->query($sql);
		$categories = array();
		while( $row =  $allRow->fetch_assoc()) {   
			array_push($categories, $row);
		}   
		return ($categories);
	}	
	public function getCatOfOpinionPublic($id_str){
		$id_str = rtrim($id_str, ",");
		$id_str = ltrim($id_str, ",");
		$sql = "SELECT * FROM opinion_debate_categories where id in ($id_str) and status=1";
		$allRow = $this->con->query($sql);
		$categories = array();
		while( $row =  $allRow->fetch_assoc()) {   
			array_push($categories, $row);
		}   
		return ($categories);
	}
}
?>