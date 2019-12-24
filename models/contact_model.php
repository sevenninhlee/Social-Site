<?php
class contact_model extends vendor_frap_model
{
	public function rules() {
		global $app;
	    return [
        	'firstname' => [['required', 'errmsg'=>'Fistname can not blank!'],'string', ['max', 'value'=>50]],
        	'lastname' 	=> [['required', 'errmsg'=>'Lastname can not blank!'],'string', ['max', 'value'=>50]],
        	'email' 	=> [['required', 'errmsg'=>'Email can not blank!'],['email','errmsg'=>'Value is invalid email format!'], ['max', 'value'=>60]],
	        'content' 	=> [['required', 'errmsg'=>'Content can not blank!'],'string'],
	    ];
	}
}
?>