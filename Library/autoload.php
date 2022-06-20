<?php
	namespace Library;
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
	defined( 'DS' ) ?:  define( 'DS', DIRECTORY_SEPARATOR );
	defined( 'LIB' ) ?:  define( 'LIB', ROOT.DS.'Library'.DS );
	defined( 'MODEL' ) ?:  define( 'MODEL', ROOT.DS.'Model'.DS );
	defined( 'VIEW' ) ?:  define( 'VIEW', ROOT.DS.'View'.DS );
	defined( 'LAYOUT' ) ?:  define( 'LAYOUT', VIEW.'Layout'.DS );
	defined( 'ADDON' ) ?:  define( 'ADDON', LAYOUT.'Addon'.DS );
	defined( 'ASSETS' ) ?:  define( 'ASSETS', ROOT.DS.'Assets'.DS );
	require_once LIB."Config.php";
	class autoload
	{
	    public function __construct()
	    {
	        spl_autoload_register(array($this,'_autoload'));
	    }
	    private function _autoload($file){
	    	$file = ROOT.DS.str_replace("\\","/",trim($file,'\\')).'.php';
	    	if(file_exists($file)){
	    		require_once $file;
	    	}
	    }
	}
	session_start();
	new autoload();
	$db = new ClassPDO($config);
	new \Library\Counter($db);
	$clg = new Lang;
	$lang = $clg->lang();
	$func = new functions($db,$lang);
	$fb= new facebook($db,$lang);
	$js= new script($db,$lang);
	$json= new JsonsChema($db,$func);
	$cart = new \Library\Cart($db,$func,$lang);
	$url_tk = ROOT.DS."Upload/lang/lang_".$lang.".json";
	$myfile = fopen($url_tk, "r") or die("Unable to open file!");
	$json_lang = json_decode(fgets($myfile), true);
	foreach ($json_lang as $key => $value) {
		@define($key,$value);
	}
	//print_r($_SESSION['cart']);
	if(!defined('AJAX')){
		require_once LIB."Controller.php";
		require_once LAYOUT."home.php";
	} else {
		if(!isset($_SESSION['ONWEB'])){ DIE("You have no permission to here ! ");}
	}
?>