<?php
class html_helper{
	const helpersDirectory = "/helpers/";

	public static function pagination($norecords, $nocurp, $curp, $nopp) {
		$from 	= ($curp-1)*$nopp+1;
		$to 	= ($curp-1)*$nopp + $nocurp;
		// $nopages= ceil($norecords/$nopp);
		$nopages= 5;
		$relpath = self::helpersDirectory.__FUNCTION__."/index.php";
		if(is_file("views".$relpath)) include "views".$relpath;
		else include "vendor".$relpath;
	}

	public static function like($obJectID, $model, $checkUserLike, $totalLike) {
		$relpath = self::helpersDirectory.__FUNCTION__."/index.php";
		if(is_file("views".$relpath)) include "views".$relpath;
		else include "vendor".$relpath;
	}
}
?>
