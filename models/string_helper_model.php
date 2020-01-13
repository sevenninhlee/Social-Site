<?php 
class string_helper_model extends vendor_backend_controller
{
    public static function process($string){

            // $patterns = array();
			// $replacements = array();
            // $patterns[0] = "/'/";
			// $replacements[0] = '&#39;';
			// $patterns[1] = '/"/';
            // $replacements[1] = '&quot;';
            // $patterns[2] = '/</';
            // $replacements[2] = '&lt;';
            // $patterns[3] = '/>/';
            // $replacements[3] = '&gt;';
            // $patterns[3] = '/&/';
            // $replacements[3] = '&amp;'; 
            // $newString = preg_replace($patterns, $replacements, $string);
            $newString = htmlspecialchars($string, ENT_QUOTES);
            // $newString = htmlspecialchars($newString); // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
        return $newString;
    }

    public static function processForm($data){
        $newData = array();
        foreach($data as $key => $value){
            if($key == 'description') {
                $newData[$key] = $value;
            }else
            $newData[$key] = htmlspecialchars($value, ENT_QUOTES);
        }
        return $newData;
    }
}

?>