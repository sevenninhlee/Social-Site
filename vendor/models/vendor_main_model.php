<?php
class vendor_main_model {
	protected $con;
	protected $table;
	public $nopp = 20;
	public $curp = 1;
	public $errors = false;

	public function __construct(){
		global $app;
		if(isset($app['prs']['p'])) $this->curp = $app['prs']['p'];

		//$this->con =  mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		$this->con =  new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
		if(mysqli_connect_error()) {
			echo "Failed to connect to MySQL". mysqli_connect_error();exit();
		}
		if(!$this->table)	$this->setTableName();
	}
	
	protected function setTableName($table=null){
		if($table) {
			$this->table=$table;
		} else {
			$cln = get_class($this);
			$clnf = str_split($cln, strrpos($cln, '_'))[0];
			//$this->table = $this->getTableNameFromModelName($clnf);
			$this->table = vendor_noun_util::pluralize($clnf);
		}
	}
	
	/* Old code! Should you vendor_noun_util::pluralize instead of this function */
	public function getTableNameFromModelName($modelName) {
		if (strrpos($modelName,"y")) {
			if ((strrpos($modelName,"y") + 1) == strlen($modelName)) {
				return str_split($modelName, strrpos($modelName, 'y'))[0].'ies'; 
			} 
		} else {
			return $modelName.'s';
		}
	}
	
	public function getAllFieldsOfTable($tableName) {
		$sql = "SHOW COLUMNS FROM ".$tableName;
		$fields = $this->con->query($sql);
		$result = [];
		while($field = mysqli_fetch_array($fields)) {
    		array_push($result, $field['Field']);
    	}
		return $result;
	}
	
	public function getTableName() {
		return $this->table;
	}

	/* Need update it with Relationship, group by ( and maybe Limit?) */
	public function getAllRecords($fields='*', $options=null) {
		$join = '';
		if(isset($this->relationships) && (isset($options['joins']) && $options['joins'])) {
			$joinFields = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					if(isset($options['joins']) && !in_array($v[0],$options['joins']))
						continue;
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="belongTo") {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " LEFT JOIN ".$joinTable." ON ".$this->table.".".$v['key']."=".$joinTable.".id ";
					} else if($k=="hasMany" && isset($options['get-child']) && $options['get-child']) {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
					}
				}
			}
			if($joinFields)	$fields .= $joinFields;
		}
		$conditions = (isset($options['conditions']) && $options['conditions'])? ' where '.$options['conditions']: "";

		/* Becaful with group */
		$group = "";
		if(isset($options['group'])) {
			$group = " GROUP BY ";
			if (strpos($options['group'], '.') !== false) {
				$group .= $options['group'];
			} else 	$group .= $this->table.".".$options['group'];
		}

		$order = " ORDER BY ";
		if(isset($options['order'])) {
			if (strpos($options['order'], '.') !== false) {
				$order .= $options['order'];
			} else 	$order .= $this->table.".".$options['order'];
		} else
			$order .= $this->table.".created DESC";
		$sql = "SELECT ".$fields." FROM ".$this->table.$join.$conditions.$group.$order;
		return $this->con->query($sql);
	}

	public function getAllRecordsArray($fields='*', $options=null) {
		$records = [];
		$resultMObject = $this->getAllRecordsLimit($fields, $options);
		$records['data'] = [];
		if($resultMObject) {
			while($row = $resultMObject->fetch_assoc()) {
	    		$records['data'][] = $row;
	    	}
		}
		//$records['norecords']= $this->getCountRecords($options);
		$records['norecords'] 	= count($records['data']);
		return $records;
	}
	
	public function getCountRecords($options=null) {
		$conditions = (isset($options['conditions']) && $options['conditions'])? ' where '.$options['conditions']: "";
		$join = "";
		if(isset($this->relationships) && (isset($options['joins']) && $options['joins'])) {
			$joinFields = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					if(isset($options['joins']) && !in_array($v[0],$options['joins']))
						continue;
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="belongTo") {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " LEFT JOIN ".$joinTable." ON ".$this->table.".".$v['key']."=".$joinTable.".id ";
					} else if($k=="hasMany" && isset($options['get-child']) && $options['get-child']) {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
					}
				}
			}
		}
		if(isset($options['group'])) {
			$group = " GROUP BY ";
			if (strpos($options['group'], '.') !== false) {
				$group .= $options['group'];
			} else 	$group .= $this->table.".".$options['group'];
			$query = "SELECT COUNT(*) as total FROM (SELECT ".$options['group']." FROM ".$this->table.$join.$conditions.$group.") AS SUBQUERY";
		} else {
			//$query = "SELECT COUNT(*) as total FROM ".$this->table.$conditions;
			$query = "SELECT COUNT(*) as total FROM ".$this->table.$join.$conditions;
		}

		$result = $this->con->query($query);
		return $result->fetch_assoc()['total'];
	}

	public function getAllRecordsLimit($fields='*', $options=null) {
		if($fields=='*') $fields = $this->table.".*";
		$join = "";

		if(isset($this->relationships) && (isset($options['joins']) && $options['joins'])) {
			$joinFields = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					if(isset($options['joins']) && !in_array($v[0],$options['joins']))
						continue;
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="belongTo") {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " LEFT JOIN ".$joinTable." ON ".$this->table.".".$v['key']."=".$joinTable.".id ";
					} else if($k=="hasMany" && isset($options['get-child']) && $options['get-child']) {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
					}
				}
			}
			if($joinFields)	$fields .= $joinFields;
		}
		$conditions = (isset($options['conditions']) && $options['conditions'])? ' where '.$options['conditions']: "";

		if(isset($options['pagination'])) {
			if(isset($options['pagination']['page'])) $this->curp = $options['pagination']['page'];
			if(isset($options['pagination']['nopp'])) $this->nopp = $options['pagination']['nopp'];
		}

		/* Becaful with */
		$group = "";
		if(isset($options['group'])) {
			$group = " GROUP BY ";
			if (strpos($options['group'], '.') !== false) {
				$group .= $options['group'];
			} else 	$group .= $this->table.".".$options['group'];
		}

		$order = " ORDER BY ";
		if(isset($options['order'])) {
			if (strpos($options['order'], '.') !== false) {
				$order .= $options['order'];
			} else 	$order .= $this->table.".".$options['order'];
		} else
			$order .= $this->table.".created DESC";

		$limit = " LIMIT $this->nopp OFFSET ".($this->curp-1)*$this->nopp;
		$sql = "SELECT ".$fields." FROM ".$this->table.$join.$conditions.$group.$order.$limit;
		return $this->con->query($sql);
	}

	public function getRecord($id, $fields='*', $options=null) {
		if(is_array($id)) {
			$id = array_key_exists('id', $id)? $id['id']: $id[1];
		}
		$id = vendor_html_helper::processSQLString($id);
		$conditions = ' WHERE '. $this->table.'.id='.$id;
		return $this->getRecordCondition($conditions, $fields, $options);
	}

	public function getRecordWhere($wheres, $fields='*', $options=null) {
		$conditions = ' WHERE ';
		$i=0;
		foreach ($wheres as $key => $value) {
			$conditions .= (($i)? " AND ":""). $key."='".$value."'";
			$i++;
		}
		return $this->getRecordCondition($conditions, $fields, $options);
	}

	private function getRecordCondition($conditions, $fields='*', $options=null) {
		$join = '';
		if(isset($this->relationships) && (isset($options['joins']) && $options['joins'])) {
			$joinFields = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					if(isset($options['joins']) && !in_array($v[0],$options['joins']))
						continue;
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="belongTo") {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " LEFT JOIN ".$joinTable." ON ".$this->table.".".$v['key']."=".$joinTable.".id ";
					} else if($k=="hasMany" && ((isset($options['get-child']) && $options['get-child']) || isset($options['group']))){
						if(!isset($options['group'])) {
							foreach ($joinTableFields as $field) {
								$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
							}
						}
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
					}
				}
			}
			if($joinFields)	$fields .= $joinFields;
		}
		//$conditions = ' WHERE '. $this->table.'.id='.$id;
		$conditions.= (isset($options['conditions']) && $options['conditions'])? ' AND '.$options['conditions']: "";

		/* Becaful with group */
		$group = "";
		if(isset($options['group'])) {
			$group = "GROUP BY ";
			if (strpos($options['group'], '.') !== false) {
				$group .= $options['group'];
			} else 	$group .= $this->table.".".$options['group'];
		}

		$order = (isset($options['order']))? "ORDER BY ".$options['order']:'';

		$limit = (isset($options['limit']))? "LIMIT ".$options['limit']:"";

		$sql = "SELECT $fields FROM $this->table $join $conditions $group $order $limit";
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}

	public function getTotal($field, $conditions=null, $table=null) {
		if(!$table)	$table = $this->table;

		$sql = "SELECT SUM($field) as total FROM $table WHERE $conditions";
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record['total'];
	}

	public function getRecordRelation($id=null, $fields='*', $options=null) {
		if(is_array($id)) {
			$id = array_key_exists('id', $id)? $id['id']: $id[1];
		}

		$join = "";
		if(isset($this->relationships)) {
			$joinFields = "";
			foreach($this->relationships as $k=>$rv) {
				if(!vendor_app_util::is_multi_array($rv)) {
					$vtmp = $rv;
					$rv = [];
					$rv[] = $vtmp;
				}
				foreach($rv as $v) {
					$joinTable = $this->getTableNameFromModelName($v[0]);
					$joinTableFields = $this->getAllFieldsOfTable($joinTable);
					if($k=="belongTo") {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " LEFT JOIN ".$joinTable." ON ".$this->table.".".$v['key']."=".$joinTable.".id ";
					} else if($k=="hasMany" && isset($options['get-child']) && $options['get-child']) {
						foreach ($joinTableFields as $field) {
							$joinFields .= ", ".$joinTable.".".$field." as ".$joinTable."_".$field;
						}
						$join .= " RIGHT JOIN ".$joinTable." ON ".$this->table.".id=".$joinTable.".".$v['key']." ";
					}
				}
			}
			if($joinFields)
				$fields = $this->table.".*".$joinFields;
		}

		$conditions = '';
		if(isset($options['conditions']) && $options['conditions']) {
			$conditions .= ' and '. $options['conditions'];
		}
		$id = vendor_html_helper::processSQLString($id);
		$sql = "SELECT $fields FROM $this->table $join where $this->table.id=$id $conditions";
		$result = $this->con->query($sql);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
		return $record;
	}
	
	public function getAllRecordsLeftJoin($fields=null, $options=null) {
		if(!$fields)	$fields = '*';
		$conditions = '';
		$joins = '';
		if(isset($options['conditions']) && $options['conditions']) {
			$conditions .= ' where '.$options['conditions'];
		}
		if(isset($options['table2'])) {
			$joins .= ' LEFT JOIN '.$options['table2'].' AS b'.' ON '.$options['column1'].'='.$options['column2'];
			if(isset($options['table3'])) {
				$joins .= ' LEFT JOIN '.$options['table3'].' AS c'.' ON '.$options['column2_3'].'='.$options['column3'];
			}
		}
		$query = "SELECT ".$fields." FROM ".$this->table.' AS a'.$joins.$conditions.'  GROUP BY a.id ORDER BY a.id DESC';
		$result = $this->con->query($query);
		return $result;
	}
	
	public function delRecordByCond($conditions=null) {
		if($conditions)
			$query = "DELETE FROM $this->table WHERE ".$conditions;
		return mysqli_query($this->con,$query);
	}

	public function getAllRecordsFul($fields='*', $options=null) {
		$conditions = '';
		if(isset($options['conditions']) && $options['conditions']) {
			$conditions .= ' where '.$options['conditions'];
		}
		$conndition = (isset($this->relationship['conndition']) && $this->relationship['conndition'])? 
					  	$this->relationship['conndition'] : 
					  	$this->relationship['table'].".".$this->table."_id=".$this->table.".id";

		$query = "SELECT $fields FROM ".$this->table." LEFT JOIN ".$this->relationship['table']." ON ".$conndition;
		// exit($query);
		$result = mysqli_query($this->con,$query);
		return $result;
	}

	public function getAllRecordsDetail($id=null, $fields='*', $options=null) {
		$conditions = '';
		if(isset($options['conditions']) && $options['conditions']) {
			$conditions .= ' where '.$options['conditions'];
		}
		$conndition = (isset($this->relationship['conndition']) && $this->relationship['conndition'])? 
					  	$this->relationship['conndition'] : 
					  	$this->relationship['table'].".".$this->table."_id=".$this->table.".id";
		$id = vendor_html_helper::processSQLString($id);
		$query = "SELECT $fields FROM ".$this->table." LEFT JOIN ".$this->relationship['table']." ON ".$conndition. " WHERE ".$this->table."_id=". $id;
		// exit($query);
		$result = mysqli_query($this->con,$query);
		return $result;
	}

	public function getAllRecordsHasRelationship($fields='*',$id=null,  $options=null) {
		$conditions = '';
		if(isset($options['conditions']) && $options['conditions']) {
			$conditions .= ' where '.$options['conditions'];
		}
		$conndition = (isset($this->relationship['conndition']) && $this->relationship['conndition'])? 
					  	$this->relationship['conndition'] : 
					  	$this->table.".".$this->relationship['table']."_id=".$this->relationship['table'].".id";

		$query = "SELECT $fields FROM ".$this->table." LEFT JOIN ".$this->relationship['table']." ON ".$conndition;
		$result = mysqli_query($this->con,$query);
		return $result;
	}

    public static function convertToList($mysqliObject, $valueName) {
    	$arrReturn = [];
    	while($row = mysqli_fetch_array($mysqliObject)) {
    		$arrReturn[$row['id']] = $row[$valueName];
    	}
    	return $arrReturn;
    }

}
?>