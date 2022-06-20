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
class View{

	private $db;
	private $func;

	public function __construct()
    {
    	
    }

    public function db(){
        return new functions;
    }

    public function func(){
    	return new functions;
    }

    public function lang(){
        return new Lang;
    }

}