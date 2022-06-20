<?php
	
	session_start();
	@define ( '_lib' , '../libraries/');
	
	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.getso.php";
	include_once _lib."class.database.php";

	$d = new database($config['database']);
	$xoso = new xoso($config['database']);

	$getso = new getso();
	
	// $ngaybatdau = strtotime('10-1-2018');
	// $ngayketthuc = strtotime('30-1-2018');
	// $dem = ($ngayketthuc-$ngaybatdau)/86400;
	// for($i=0;$i<=$dem;$i++){
	// 	$ngayload = $ngaybatdau + $i*86400;
	// 	//$getso->getveso($ngayload);
	// }
	//echo "Xong";
	//$getso->gettinhthanh();
	//$getso->getidtinhthanh();
	//$getso->getngayxo();
	//$getso->update_thu();
	//$getso->getsomo();
	

?>