<?php 
	namespace Library;
	// Define App Directories
		/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
class Lang{

	public function __construct()
    {
       if($_GET['lang']!=''){
			$_SESSION['lang']=$_GET['lang'];
			header("location:".$_SESSION['links']);
		} else {
			$_SESSION['links']=Lang::getCurrentPageURL();
		}
    }

    static public function getCurrentPageURL() {
	    $pageURL = 'http';
	    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	    $pageURL .= "://";
	    if ($_SERVER["SERVER_PORT"] != "80") {
	        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	    } else {
	        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	    }
		$pageURL = explode("&page=", $pageURL);
	    return $pageURL[0];
	}

	public function lang(){
		if(!isset($_SESSION['lang']))
		{
			$_SESSION['lang']='vi';
		}
			$lang=$_SESSION['lang'];
		return $lang;
	}
	public function langadmin(){
		if(!isset($_SESSION['langadmin']))
		{
			$_SESSION['langadmin']='vi';
		}
			$lang=$_SESSION['langadmin'];
		return $lang;
	}

}
?>