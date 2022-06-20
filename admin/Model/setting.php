<?php
switch($act){
	case "capnhat":
		get_gioithieu();
		$template = "setting/item_add";
		break;
	case "save":
		save_gioithieu();
		break;
		
	default:
		$template = "index";
}

function get_gioithieu(){
	global $db,$item;
	$item = $db->row("select * from #_setting limit 0,1");
}

function save_gioithieu(){
	global $db,$func,$config;
	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");
		
	foreach ($config['lang'] as $key => $value) {
		$data['name_'.$key] = $_POST['name_'.$key];
		$data['shortname_'.$key] = $_POST['shortname_'.$key];
		$data['slogan_'.$key] = $_POST['slogan_'.$key];
		$data['address_'.$key] = $_POST['address_'.$key];
	}
	$data['zalo'] = $_POST['zalo'];
	if($_FILES){
		$img_dongdau = $func->upload_image("dongdau", 'png', '../upload/','watermark');
		$func->create_thumb($img_dongdau, 250, 250,'../upload/','watermark',_style_thumb);	
	}

	$data['phone'] = $_POST['phone'];
	$data['email'] = $_POST['email'];
	$data['website'] = $_POST['website'];
	$data['giayphep'] = $_POST['giayphep'];
	$data['noicap'] = $_POST['noicap'];
	
	$data['facebook'] = $_POST['facebook'];
	$data['location_map'] = $_POST['location_map'];
	$data['hotline'] = $_POST['hotline'];
	$data['opentime'] = $_POST['opentime'];
	$data['timelive'] = $_POST['timelive'];
	$data['support_phone'] = $_POST['support_phone'];
	$data['consult_phone'] = $_POST['consult_phone'];

	$data['twitter'] = $_POST['twitter'];
	$data['keymap'] = $_POST['keymap'];
	$data['idfacebook'] = $_POST['idfacebook'];
	$data['codebody'] = $_POST['codebody'];
	$data['codehead'] = $_POST['codehead'];
	$data['codebottom'] = $_POST['codebottom'];
	$data['googleplus'] = $_POST['googleplus'];

	$data['analytics'] = $_POST['analytics'];
	$data['vchat'] = $_POST['vchat'];

	$data['title'] = $_POST['title'];
	$data['keywords'] = $_POST['keywords'];
	$data['description'] = $_POST['description'];							
	
	$data['dateupdate'] = date("Y-m-d H:i:s");
	$db->setTable('setting');
	$db->update($data);
	$func->redirect($_SESSION['links_re']);

}

?>