<?php
class action_model extends vendor_frap_model
{
	public $nopp = 10;
	protected $relationships = [
		'belongTo'	=>	[
            ['user','key'=>'user_id'],
            ['book_category', 'key'=>'categories_id']
		]
    ];
    
    public function getActionStatus($table, $model, $action, $status, $user_id, $status_name)
    {
        $query = " SELECT
                	act.id as act_id, tb.*
					FROM
	                " . $this->table . " act
	                LEFT JOIN
	                    {$table} tb
	                        ON act.object_article_id = tb.id 
				WHERE act.table_model = '{$model}'
                AND act.{$action} = 1
                AND act.{$status_name} = {$status}
                AND act.user_id = {$user_id}
				";
				$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}

	public function getAllAction($table, $model, $action , $status_name)
	{
		$query = " SELECT
                	act.id as act_id,act.{$status_name} as act_status, tb.*
	            FROM
	                " . $this->table . " act
	                LEFT JOIN
						{$table} tb
						ON act.object_article_id = tb.id
				WHERE act.table_model = '{$model}'
				AND act.{$action} = 1
				AND act.user_id = {$_SESSION['user']['id']}";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
	
	public function getActions($model, $user_id, $table, $action, $status_name){
		$query = " SELECT DISTINCT {$table}.* FROM actions
		LEFT JOIN {$table} ON actions.object_article_id = {$table}.id
		WHERE table_model ='{$model}' and actions.$status_name = 1 and {$action}=1 and actions.user_id= '{$user_id}'";
		$result = $this->con->query($query);
		$rows = array();
		while($row = mysqli_fetch_assoc($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
}
?>