<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
 
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	$config_open = array();
	@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
	@define ( _download_type , 'doc|docx|pdf|rar|zip|ppt|pptx|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|xls|xlsx|jpg|png|gif|JPG|PNG|GIF|txt' );
	switch($type){
		//-------------product------------------
		case 'project':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_open = array('name','seo');
					@define ( _width_thumb , 24 );
					@define ( _height_thumb , 24 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'cat':
					$title_main = "Danh mục cấp 2";
					$config_open = array('name','seo','description','image');
					@define ( _width_thumb , 250 );
					@define ( _height_thumb , 250 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'item':
					$title_main = "Danh mục cấp 3";
					$config_open = array('name','seo','description','image');
					@define ( _width_thumb , 250 );
					@define ( _height_thumb , 250 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				case 'sub':
					$title_main = "Danh mục cấp 4";
					$config_open = array('name','seo','description','image');
					@define ( _width_thumb , 250 );
					@define ( _height_thumb , 250 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Dự án";
					$config_open = array('name','content','description','image','seo','images','list','price','oldprice','code','view','tags');
					@define ( _width_thumb , 285 );
					@define ( _height_thumb , 285 );
					@define ( _style_thumb , 2 );
					$ratio_ = 3;
					break;
				}
			break;
		//-------------product------------------
		case 'sang-nhuong':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_open = array('name','seo');
					@define ( _width_thumb , 24 );
					@define ( _height_thumb , 24 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Sang Nhượng";
					$config_open = array('name','content','description','image','seo','images','list','price','oldprice','code','view');
					@define ( _width_thumb , 285 );
					@define ( _height_thumb , 285 );
					@define ( _style_thumb , 2 );
					$ratio_ = 3;
					break;
				}
			break;
		case 'cho-thue':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_open = array('name','seo');
					@define ( _width_thumb , 24 );
					@define ( _height_thumb , 24 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Cho Thuê";
					$config_open = array('name','content','description','image','seo','images','list','price','oldprice','code','view');
					@define ( _width_thumb , 285 );
					@define ( _height_thumb , 285 );
					@define ( _style_thumb , 2 );
					$ratio_ = 3;
					break;
				}
			break;
		case 'donvibds':
			$title_main = "đơn vị tính";
			$config_open = array('name');
			break;
		case 'phongngu':
			$title_main = "Phòng ngủ";
			$config_open = array('name','amount');
			break;

		case 'tintuc':
			switch($act){
				case 'list':
					$title_main = "Danh mục tin tức";
					$config_open = array('name','seo');
					@define ( _width_thumb , 24 );
					@define ( _height_thumb , 24 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Tin tức";
					$config_open = array('name','content','description','image','seo','view','highlight','list','tags');
					@define ( _width_thumb , 285 );
					@define ( _height_thumb , 285 );
					@define ( _style_thumb , 2 );
					$ratio_ = 3;
					break;
				}
			break;

		case 'duan':
			$title_main = "Dự án";
			$config_open = array('name','description','content','image','images','seo');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'banggia':
			$title_main = "Bảng giá";
			$config_open = array('name','description','content','image','images','seo');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'thuvien':
			$title_main = "Thư viện";
			$config_open = array('name','description','content','image','images','seo');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'phongcach':
			$title_main = "Phong cách";
			$config_open = array('name','description','content','image','images','seo');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'dichvu':
			$title_main = "Dịch vụ";
			$config_open = array('name','description','content','image','seo','noibat','view');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'camnhan':
			$title_main = "cảm nhận";
			$config_open = array('name','description','content','image','seo','noibat','view');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'hotro':
			$title_main = "Hỗ trợ";
			$config_open = array('name','description','icon');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'thongtin':
			$title_main = "Thông tin";
			$config_open = array('name','description','image');
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;

		case 'size':
			$title_main = "size";
			$config_open = array('name');
			break;
		case 'mausac':
			$title_main = "màu sắc";
			$config_open = array('name');
			break;

		case 'chinhsach':
			$title_main = "Chính sách";
			$config_open = array('name','content','description','seo');
			@define ( _width_thumb , 250 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;

		case 'khachhang':
			$title_main = "Ngân hàng";
			$config_image = "true";
			@define ( _width_thumb , 98 );
			@define ( _height_thumb , 98 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;

		case 'chinhanh':
			$title_main = "Chi Nhánh";
			$config_image = "false";
			$config_open = array('name','description');
			@define ( _width_thumb , 98 );
			@define ( _height_thumb , 98 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;

		case 'download':
			$title_main = "Download File";
			$config_images = "true";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		
		case 'album':
			$title_main = "Album";
			$config_open = array('description','image','seo','images','name');
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 260 );
			@define ( _style_thumb , 1 );
			$ratio_ = 2;
			break;

		//-------------info------------------
		case 'gioithieu':
			$title_main = 'giới thiệu';
			$config_open = array('content','seo','name','description','image','images');
			@define ( _width_thumb , 600 );
			@define ( _height_thumb , 415 );
			break;

		case 'tags':
			$title_main = 'tags';
			$config_open = array('content','seo','name','description','view');
			$config_name = 'true';
			break;
			
		case 'trangchu':
			$title_main = 'Trang chủ';
			$config_open = array('name','content','image');
			@define ( _width_thumb , 920 );
			@define ( _height_thumb , 810 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;

		case 'footer':
			$title_main = 'Thông tin footer';
			$config_open = array('content');
			break;

		case 'lienhe':
			$title_main = 'Thông tin Liên hệ';
			$config_open = array('content');
			break;

		case 'httt':
			$title_main = 'Hình thức thanh toán';
			$config_open = array('name','description');
			break;
		case 'tinhtrangdh':
			$title_main = 'Tình trạng đơn hàng';
			$config_open = array('name');
			break;
		case 'khoangia':
			$title_main = 'Khoản giá';
			$config_open = array('name');
			break;
		case 'size':
			$title_main = 'Size';
			break;
		case 'mausac':
			$title_main = 'Màu sắc';
			break;

		case 'banner':
			$title_main = 'Banner';
			$config_open = array();
			@define ( _width_thumb , 325 );
			@define ( _height_thumb , 97 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'bgfooter':
			$title_main = 'BG Footer';
			$config_open = array();
			@define ( _width_thumb , 1349 );
			@define ( _height_thumb , 320 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'banner_footer':
			$title_main = 'Banner Bottom';
			$config_open = array();
			@define ( _width_thumb , 253 );
			@define ( _height_thumb , 175 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'bocongthuong':
			$title_main = 'Bộ công thương';
			$config_open = array('link');
			@define ( _width_thumb , 147 );
			@define ( _height_thumb , 52 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;

		case 'logo':
			$title_main = 'Logo';
			$config_open = array();
			@define ( _width_thumb , 329 );
			@define ( _height_thumb , 118 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;

		case 'hinhanh_top':
			$title_main = 'Hình ảnh top';
			$config_open = array('link');
			@define ( _width_thumb , 557 );
			@define ( _height_thumb , 64 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'popup':
			$title_main = 'Popup';
			$config_open = array('link','hienthi');
			@define ( _width_thumb , 717 );
			@define ( _height_thumb , 170 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'bando':
			$title_main = 'Bản đồ';
			$config_open = array();
			@define ( _width_thumb , 324 );
			@define ( _height_thumb , 173 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;

		case 'favicon':
			$title_main = 'Favicon';
			$config_open = array();
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;
		case 'form_photo':
			$title_main = 'Favicon';
			$config_open = array();
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 200 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;

		case 'bgweb':
			$title_main = 'background web';
			@define ( _width_thumb , 500 );
			@define ( _height_thumb , 120 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$config_open = array('link','description','name');
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 600 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			$links_ = "false";
			break;
		case 'slider2':
			$title_main = "Slider trang trong";
			$config_open = array('link');
			@define ( _width_thumb , 1349 );
			@define ( _height_thumb , 350 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			$links_ = "false";
			break;
		case 'quangcao':
			$title_main = "Hình ảnh ADS";
			$config_open = array('link');
			@define ( _width_thumb , 406 );
			@define ( _height_thumb , 190 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;

		case 'doitac':
		    $title_main = "đối tác";
		    $config_open = array('link');
			@define ( _width_thumb , 190 );
			@define ( _height_thumb , 110 );
			@define ( _style_thumb , 2 );
			$ratio_ = 1;
			break;
		case 'hinhanh_gt':
		    $title_main = "Hình ảnh giới thiệu";
		    $config_open = array('link');
			@define ( _width_thumb , 300 );
			@define ( _height_thumb , 300 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'link':
		    $title_main = "Liên kết web";
		    $config_open = array('link','name','image');
			@define ( _width_thumb , 60 );
			@define ( _height_thumb , 60 );
			@define ( _style_thumb , 1 );
			$ratio_ = 1;
			break;
		case 'mangxh':
		    $title_main = "Mạng xã hội";
		    $config_open = array('link','name','image');
			@define ( _width_thumb , 60 );
			@define ( _height_thumb , 60 );
			@define ( _style_thumb , 1 );
 			$ratio_ = 1;
			break;
		default: 
			break;
	}