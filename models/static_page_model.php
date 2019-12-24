<?php
class static_page_model extends vendor_frap_model
{
    public function rules() {
		global $app;
	    return [
        	'title' 	=> ['required', 'string', ['min', 'value'=>2]],
        	'content' 	=> ['required', 'string'],
        	'title_slug' 	=> ['required', 'unique', 'string', ['min', 'value'=>2]],
	    ];
	}
}
?>