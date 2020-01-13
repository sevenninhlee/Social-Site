<?php
class vendor_pagination_model extends vendor_frap_model {
	
	public function read_paging($model, $filed_oder_by = 'created_at', $wheres = null) {
		global $app;
		$ctl = $app['ctl'];
		$act = $app['act'];

		// search data
		$search = null;
		if(isset($_GET['search']) && strlen($_GET['search']) > 1) {
			// $search = $_GET['search'];	
			$search = vendor_html_helper::processSQLString($_GET['search']);
		}

		$conditions = ' ';
		if( !empty($wheres)) {
			$i=0;
			foreach ($wheres as $key => $value) {
				if($key === "categories_arr"){
					$conditions .= (($i)? ' AND ':''). $key." like '%,".$value.",%'";
				}else{
					$conditions .= (($i)? ' AND ':''). $key.'="'.$value.'"';
				}
				$i++;
			}
		}
		if(isset($search) && strlen($search) > 0){
			$conditions .= (($conditions)? ' AND (':'(').
			' title like "%'.$search.'%" OR '.
			' description like "%'.$search.'%")';
		}
		// home page url
		$home_url=RootURL;
		// page given in URL parameter, default page is one
		$page = isset($_GET['page']) ? $_GET['page'] : 1;
		 
		// set number of records per page
		$records_per_page = isset($_GET['per_page']) ? $_GET['per_page'] : 10;
		 
		// calculate for the query LIMIT clause
		$from_record_num = ($records_per_page * $page) - $records_per_page;
		$stmt = $model->readPaging($from_record_num, $records_per_page, $filed_oder_by, $conditions);
		$num = count($stmt);
		// check if more than 0 record found
		if($num>0){
		 
		    // products array
		    $products_arr=array();
		    // $products_arr["records"]=array();
		    $products_arr["data"]=$stmt;
		    $products_arr["paging"]=array();
	 
	        // array_push($products_arr["records"], $stmt);

		    $total_rows=$this->rowCount($conditions);
		    $page_url = $this->getPageUrl($_GET);
		    $paging=$this->getPaging($page, $total_rows, $records_per_page, $page_url);
		    $products_arr["paging"]=$paging;
		    
		    return $products_arr;
		}
		 
		else{
		    return false;
		}
	}


	public function rowCount($conditions)
	{
		if(!empty($conditions)) {
			$query = "SELECT COUNT(*) as total_rows FROM " . $this->table . " WHERE " . $conditions;
		} else {
			$query = "SELECT COUNT(*) as total_rows FROM " . $this->table;
		}
	    $result = $this->con->query($query);
		if($result) {
			$record = $result->fetch_assoc();
		} else $record=false;
	 
	    return $record['total_rows'];
	}

	public function getPaging($page, $total_rows, $records_per_page, $page_url){
 
        // paging array
        $paging_arr=array();
 
        // button for first page
        $paging_arr["first"] = $page>1 ? "{$page_url}page=1" : "";
 
        // count all products in the database to calculate total pages
        // $total_pages = ceil($total_rows / $records_per_page);
        $total_pages = ceil($total_rows / $records_per_page);
        // range of links to show
        $range = 1;
        // echo "Start <br/>"; echo '<pre>'; print_r($total_pages);echo '</pre>';exit("End Data");
 
        // display links to 'range of pages' around 'current page'
        $initial_num = $page - $range;
        $condition_limit_num = ($page + $range)  + 1;
 
        $paging_arr['pages']=array();
        $page_count=0;
         
        for($x=$initial_num; $x<$condition_limit_num; $x++){
            // be sure '$x is greater than 0' AND 'less than or equal to the $total_pages'
            if(($x > 0) && ($x <= $total_pages)){
                $paging_arr['pages'][$page_count]["page"]=$x;
                $paging_arr['pages'][$page_count]["url"]="{$page_url}page={$x}";
                $paging_arr['pages'][$page_count]["current_page"] = $x==$page ? "yes" : "no";
 
                $page_count++;
            }
        }
 
        // button for last page
        $paging_arr["last"] = $page<$total_pages ? "{$page_url}page={$total_pages}" : "";
 
        // json format
        return $paging_arr;
    }

    public function getPageUrl($get)
    {
    	global $app;
		$ctl = $app['ctl'];
		if ($ctl == "book_groups") {
			$ctl = "book-groups";
		}
		if ($ctl == "opinions_debates") {
			$ctl = "opinions-debates";
		}
		$act = $app['act'];
		$home_url=RootURL;
    	$page_url="{$home_url}{$ctl}/{$act}?";

    	switch ($get) {
    		case isset($_GET['search']):
    			return $page_url."search={$_GET['search']}&";
    			break;

    		case isset($_GET['cat']):
    			return $page_url."cat={$_GET['cat']}&";
    			break;

    		case isset($_GET['archive']):
    			return $page_url."archive={$_GET['archive']}&";
    			break;

    		default:
    			return $page_url;
    			break;
    	}
    }
}?>