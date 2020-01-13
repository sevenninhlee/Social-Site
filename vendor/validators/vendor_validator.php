<?php
trait vendor_validator {
	public static function convertErrorMessage($errmsgs) {
		$rs = [];
		foreach ($errmsgs as $key => $value) {
			$rs[$key] = implode("<br>",$value);
		}
		return $rs;
	}

	public function requiredField($field, $value, $errmsg=null) {
		if(!strlen(trim($value))) {
			if(!$errmsg)	$errmsg = "This field can not blank!";
			return ['status'=>false, 'message'=>$errmsg];
		} 
		return ['status'=>true];
	}

	public function minField($field, $value, $length, $errmsg=null) {
		if(strlen($value)<$length) {
			if(!$errmsg)	$errmsg = "The length of this field can not less than $length character!";
			return ['status'=>false, 'message'=>$errmsg];
		} 
		return ['status'=>true];
	}

	public function maxField($field, $value, $length, $errmsg=null) {
		if(strlen($value)>$length) {
			if(!$errmsg)	$errmsg = "The length of this field can not more than $length character!";
			return ['status'=>false, 'message'=>$errmsg];
		}
		return ['status'=>true];
	}

	public function booleanField($field, $value, $errmsg=null) {
		if(is_bool($value))
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "The type of this field should be boolean!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function integerField($field, $value, $errmsg=null) {
		if(is_int($value))
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "The type of this field should be interger!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function floatField($field, $value, $errmsg=null) {
		if(is_float($value))
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "The type of this field should be float!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function doubleField($field, $value, $errmsg=null) {
		if(is_double($value))
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "The type of this field should be double!";
		return ['status'=>false, 'message'=>$errmsg];
	}
 
	public function numberField($field, $value, $errmsg=null) {
		if(is_numeric($value))
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "The type of this field should be number!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function stringField($field, $value, $errmsg=null) {
		if(is_string($value))
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "The type of this field should be string!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function emailField($field, $value, $errmsg=null) {
		if (filter_var($value, FILTER_VALIDATE_EMAIL)) {
		  	return ['status'=>true];
		}
		if(!$errmsg)	$errmsg = "Invalid email format!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function urlField($field, $value, $errmsg=null) {
		if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$value)) {
			return ['status'=>true];
		} 
		if(!$errmsg)	$errmsg = "Invalid url format!";
		return ['status'=>false, 'message'=>$errmsg];
	}

	public function fileField() {
		return ['status'=>true];
	}

	public function imageField() {
		return ['status'=>true];
	}

	public function uniqueField($field, $value, $editId=false, $errmsg=null) {
		if($value !== "") {
			if($editId===false)
				$checkExist = $this->getCountRecords(['conditions'=>$field.'="'.$value.'"']);
			else 	$checkExist = $this->getCountRecords(['conditions'=>$field.'="'.$value.'" AND id<>'.$editId]);
			if($checkExist) {
				if(!$errmsg)	$errmsg = "This value already exist!";
				return ['status'=>false, 'message'=>$errmsg];
			} 
		}
		return ['status'=>true];
	}

	public function inlistField($field, $value, $list, $errmsg=null) {
		if (in_array($value, $list))
			return ['status'=>true];

		if(!$errmsg)	$errmsg = "Value of this field should in ".implode(", ",$list);
		return ['status'=>false, 'message'=>$errmsg];
	}

	public static function datetimeField($field, $datetime, $errmsg=null, $format = 'Y-m-d H:i:s') {
		if(substr_count($datetime, ':') < 2)	$datetime .= ":00";
	    $d = DateTime::createFromFormat($format, $datetime);
	    if($d && $d->format($format) == $datetime)
			return ['status'=>true];
		
		if(!$errmsg)	$errmsg = "This value invalid datetime!";
		return ['status'=>false, 'message'=>$errmsg];
	}
}
?>