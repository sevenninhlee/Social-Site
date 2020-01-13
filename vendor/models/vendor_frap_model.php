<?php
class vendor_frap_model extends vendor_fra_model {
	public function allp($fields='*', $options=null) {
		$pagination = [];
		$resultMObject = parent::getAllRecordsLimit($fields, $options);
		$pagination['data'] = [];
		if($resultMObject) {
			while($row = $resultMObject->fetch_assoc()) {
	    		$pagination['data'][] = $row;
	    	}
		}
		$pagination['norecords']= parent::getCountRecords($options);
		$pagination['nocurp'] 	= count($pagination['data']);
		$pagination['curp'] 	= $this->curp;
		$pagination['nopp'] 	= $this->nopp;
		return $pagination;
	}

	public function allp2($fields='*', $options=null) {
		$pagination = [];
		$resultMObject = parent::getAllRecordsLimit($fields, $options);
		$pagination['data'] = [];
		if($resultMObject) {
			while($row = $resultMObject->fetch_assoc()) {
				$conditions = 'parent_comment_id='.$row['id'];
				$row['num_replies'] = $this->getCountRecords(['conditions'=>$conditions]);
	    		$pagination['data'][] = $row;
	    	}
		}
		$pagination['norecords']= parent::getCountRecords($options);
		$pagination['nocurp'] 	= count($pagination['data']);
		$pagination['curp'] 	= $this->curp;
		$pagination['nopp'] 	= $this->nopp;
		return $pagination;
	}

	public function getFourRecord($where = ''){
		$sql = 'SELECT * FROM '.$this->table.' WHERE owner_status = 1 AND add_homepage = 1'.$where.' ORDER BY created DESC';
		$allRow = $this->con->query($sql);
		$listpost = array();
		while( $row =  $allRow->fetch_assoc()) {  
			$row['category_name']="";
			$row['author'] ="";
			$cm=null;
			switch($this->table){
				case 'blog_articles':
					$cm = new blog_category_model();
					break;
				case 'book_group_articles': 
					$cm = new book_group_category_model();
					break;
				case 'film_articles': 
					$cm = new film_category_model();
					break;
			}
			$um = new user_model();
			$row['author'] = $um->getRecord($row['user_id'])['firstname']." ".$um->getRecord($row['user_id'])['lastname'];
			if($cm!=null)
				$row['category_name'] = $cm->getRecord($row['categories_id'])['name'];
			array_push($listpost, $row);
		}   
		return ($listpost);
	}

	/*
	public function allhrp($fields='*', $options=null) {
		$pagination = [];
		$resultMObject = parent::getAllRecordsLimitHasRelationship($fields, $options);
		$pagination['data'] = [];
		if($resultMObject) {
			while($row = $resultMObject->fetch_assoc()) {
	    		$pagination['data'][] = $row;
	    	}
		}
		$pagination['norecords']= parent::getCountRecords();
		$pagination['nocurp'] 	= count($pagination['data']);
		$pagination['curp'] 	= $this->curp;
		$pagination['nopp'] 	= $this->nopp;
		return $pagination;
	}
	*/
}
?>