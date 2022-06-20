<?php

	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
	error_reporting(0);
	defined( 'C_EMAIL' ) ?:  define( 'C_EMAIL', 'contact@phuongthienland.com' );
	defined( 'C_PASS' ) ?:  define( 'C_PASS', 'yrl2zoRSw' );
	defined( 'C_IP' ) ?:  define( 'C_IP', '45.117.169.196' );

	$config_url = $config['config_url']=$_SERVER["SERVER_NAME"].'/tuananhland99';
//	var_dump($config_url);
//	die();
	$config['config_base']="http://".$config['config_url'].'/';
	$config['debug']=0;
	$config['lang']=array("vi"=>"Tiếng việt");
	$config['activelang'] = 'vi';
	$config['ip'] = $_SERVER['REMOTE_ADDR'];

	$config['servername'] = 'localhost';
	$config['username'] = 'root';
	$config['password'] = '';
	$config['database'] = 'tuananhland99';
	$config['refix'] = 'table_';

	$config['setup']['dongdau']['active'] = 'false';
	$config['setup']['dongdau']['loai'] = 'admin';
	$config['setup']['responsive'] = 'true';
	$config['setup']['mobile'] = 'false';
	$config['setup']['amp'] = 'false';
	$config['setup']['cart'] = 'false';

	@define ( _updating , "Đang cập nhật thông tin" );

	@define ( _upload_download , '../download/' );
	@define ( _upload_download_l , 'download/' );

	@define ( _upload_project , '../Upload/project/' );
	@define ( _upload_project_l , 'Upload/project/' );

	@define ( _upload_hinhanh , '../Upload/hinhanh/' );
	@define ( _upload_hinhanh_l , 'Upload/hinhanh/' );

	@define ( _upload_product , '../Upload/product/' );
	@define ( _upload_product_l , 'Upload/product/' );

	@define ( _upload_post , '../Upload/post/' );
	@define ( _upload_post_l , 'Upload/post/' );

	@define ( _upload_album , '../Upload/album/' );
	@define ( _upload_album_l , 'Upload/album/' );

	@define ( _upload_tieude , '../Upload/tieude/' );
	@define ( _upload_tieude_l , 'Upload/tieude/' );

	@define ( _upload_cate , '../Upload/cate/' );
	@define ( _upload_cate_l , 'Upload/cate/' );

?>
