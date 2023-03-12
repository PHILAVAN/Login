<?php 

$file_name = basename($_SERVER['PHP_SELF'], '.php');	
    
    define ('ROOT_PATH', realpath(dirname(__FILE__).''));


    function base_url(){
    if(isset($_SERVER['HTTPS'])){
        $protocol = ($_SERVER['HTTPS'] != "off") ? "https" : "http";
    }
	    else{
	        $protocol = 'http';
	    }
      return $protocol . "://" . $_SERVER['HTTP_HOST'].'/login';
	}
   
?>