<?php
class page_controller extends vendor_main_controller
{
	public function index() 
	{
		global $app;
		$title_slug['title_slug'] = $app['prs'][1];
		$im = new static_page_model();
    $this->record = $im->getRecordWhere($title_slug);
    if($this->record){
      $this->display();
    }else{
      include "views/".$app['areaPath']."staticpages/error.php";    }
	} 
}
?>