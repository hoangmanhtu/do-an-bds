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
class plugins{

	public $folder;

	function __construct($folder, $type)
    {
        $this->folder = $folder;
        $this->type = $type;
    }
    public function css(){
    	$link_css = ROOT."/Plugins/".$this->folder."/".$this->type."/style.css";
    	$myfile = fopen($link_css, "r") or die("Unable to open file!");
        if(filesize($link_css)!=0){
            return self::compress(fread($myfile,filesize($link_css)));
        }
		
    }
    public function html(){
    	global $db,$func,$lang,$row_setting;
    	include ROOT."/Plugins/".$this->folder."/".$this->type."/index.php";
    }

    static public function compress($buffer){
    	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		$buffer = str_replace(': ', ':', $buffer);
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
		return $buffer;
    }

    static public function addcss($url){
        $link_css = $url;
        $myfile = fopen($link_css, "r") or die("Unable to open file!");
        return self::compress(fread($myfile,filesize($link_css)));
    }

}

?>