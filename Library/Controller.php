<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */

	// $path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
	// $elements = explode('/', $path);                // Split path on slashes
	// if(empty($elements[0])) {                       // No path elements means home
	//     $com = 'index';
	// } else switch(array_shift($elements))             // Pop off first item and switch
	// {
	//     case 'Some-text-goes-here':
	//         break;
	//     case 'more':
	//         break;
	//     default:
	//         header('HTTP/1.1 404 Not Found');
	// }

	$_SESSION['ONWEB'] = true;
	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;

	$row_setting  =  $db->row("select * from #_setting limit 0,1");

	$db->bindMore(array("type"=>"bgweb"));
	$row_background  =  $db->row("select * from #_bgweb where type=:type limit 0,1");

	$db->bindMore(array("type"=>"favicon"));
	$favicon  =  $db->row("select thumb_$lang,photo_vi from #_photo where type=:type limit 0,1 ");

	if($row_background['hienthi']==1){
		$plugin_css .="body{";
		$plugin_css .="background:url("._upload_hinhanh_l.$row_background['photo'].") ".$row_background['re_peat']." ".$row_background['tren']." ".$row_background['trai'].";";
		$plugin_css .="background-color:".$row_background['mauneen'].";";
		$plugin_css .="background-attachment:".$row_background['fix_bg']."; ";
		$plugin_css .="}";
	}
    $video = new \Library\plugins('video','type1');
    $plugin_css .= $video->css();

    $bando = new \Library\plugins('bando','multi');
    $plugin_css .= $bando->css();

    $nhantin = new \Library\plugins('nhantin','3field');
    $plugin_css .= $nhantin->css();

    $chinhsach = new \Library\plugins('chinhsach','type1');
    $plugin_css .= $chinhsach->css();

    $timkiem = new \Library\plugins('timkiem','coban');
    $plugin_css .= $timkiem->css();

    $mangxh = new \Library\plugins('mangxh','mangxh');
    $plugin_css .= $mangxh->css();

    $thongtin_ft = new \Library\plugins('thongtin','listul');
    $plugin_css .= $thongtin_ft->css();

    $facebook = new \Library\plugins('facebook','type1');
    $plugin_css .= $facebook->css();

    $thongke = new \Library\plugins('thongke','2truong');
    $plugin_css .= $thongke->css();

    $bocongthuong = new \Library\plugins('bocongthuong','type1');
    $plugin_css .= $bocongthuong->css();

    $map = new \Library\plugins('bando','map');
    $plugin_css .= $map->css();

    $lienket = new \Library\plugins('mangxh','mangxh');
    $plugin_css .= $lienket->css();

    $tags = new \Library\plugins('tags','type1');
    $plugin_css .= $tags->css();
    
	switch($com){
		
		/*case 'video':
			$source = "video";
			$template = isset($_GET['id']) ? "video_detail" : "video";
			break;
			
		case 'ban-do':
			$source = "map";
			$template ="map";
			break;*/
		case 'du-an':
			$source = "project";
			$template = isset($_GET['id']) ? "project_detail" : "project";
			$type_bar = 'project';
			$title_com = _duan;
			break;
		case 'sang-nhuong':
			$source = "project";
			$template = isset($_GET['id']) ? "project_detail" : "project";
			$type_bar = 'sang-nhuong';
			$title_com = 'Sang Nhượng';
			break;
		case 'cho-thue':
			$source = "project";
			$template = isset($_GET['id']) ? "project_detail" : "project";
			$type_bar = 'cho-thue';
			$title_com = 'Cho Thuê';
			break;
		/*case 'album':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "album";
			$type_bar = 'album';
			$title_com = "album";
			break;*/
		case 'site-map':
			$source = "sitemap";
			$template ="sitemap";
			break;

		/*case 'thu-vien':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$title_com = _thuvien;
			$type_bar = 'thuvien';
			break;
*/
		case 'chinh-sach':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$title_com = _chinhsach;
			$type_bar = 'chinhsach';
			break;

		/*case 'tuyen-dung':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$title_com = _tuyendung;
			$type_bar = 'tuyendung';
			break;*/

		/*case 'tinh-dau':
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			$title_com = _tinhdau;
			$type_bar = 'tinhdau';
			break;

		case 'thiet-bi':
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			$title_com = _thietbi;
			$type_bar = 'product';
			break;*/

		case 'tags':
			$source = "tags";
			$template ="tags";
			$title_com = "Tags";
			break;
		
		/*case 'phan-hoi':
			$source = "gopy";
			$template = "gopy";
			break;	*/
		
		case 'gioi-thieu':
			$source = "about";
			$template = "about";
			$title_com = _gioithieu;
			$type_bar = 'gioithieu';
			break;
		case 'error':
			$source = "error";
			$template = "error";
			$title_com = _loi;
			break;
		/*case 'ho-tro-khach-hang':
			$source = "about";
			$template = "about";
			$title_com = _hotrokhachhang;
			$type_bar = 'htkhachhang';
			break;*/
	
		/*case 'giai-phap':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$type_bar = 'giaiphap';
			$title_com = _giaiphapchomoikhonggian;
			break;*/
			
		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tintuc';
			$title_com = _tintuc;
			break;

		/*case 'khuyen-mai':
			$source = "service";
			$template = isset($_GET['id']) ? "service_detail" : "service";
			$type_bar = 'khuyenmai';
			$title_com = _khuyenmai;
			break;*/

		/*case 'san-pham':
			$source = "product";
			$template =isset($_GET['id']) ? "product_detail" : "product";
			$title_com = _sanpham;
			$type_bar = 'product';	
			break;	
		break;*/
	
		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;

		/*case 'huong-dan-mua-hang':
			$source = "huongdanmuahang";
			$template = "huongdanmuahang";
			break;
		
		case 'tim-kiem':
			$source = "search";
			$template = "search";
			break;
		case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			break;	
		case 'thanh-toan':
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;
		case 'xac-nhan':
			$source = "xacnhan";
			$template = "xacnhan";
			break;	*/	

		default: 
			if($com!=''){
				header("HTTP/1.1 301 Moved Permanently"); 
				header("Location: /"); 
				exit();
			}
			$source = "index";
			$template = "index";
			break;
	}
	
	if($source!="") include MODEL.$source.".php";
	
	if($_REQUEST['com']=='logout')
	{
	session_unregister($login_name);
	header("Location:index.php");
	}		

	if($_REQUEST['com']=='thoat')
	{
		unset($_SESSION['login']);
		header("location:trang-chu.html");
	}	

	if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
		$pid=$_REQUEST['productid'];
		$soluong=1;
		addtocart($pid,$soluong);
		redirect("thanh-toan.html");
	}
	
	if($_GET['lang']!=''){
		$_SESSION['lang']=$_GET['lang'];
		header("location:".$_SESSION['links']);
	} else {
		$_SESSION['links']=$func->getCurrentPageURL();
	}



?>