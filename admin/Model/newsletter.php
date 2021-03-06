<?php
switch($act){
	case "man":
		get_mails();
		$template = "newsletter/items";
		break;
	case "add":
		$template = "newsletter/item_add";
		break;
	case "edit":
		get_mail();
		$template = "newsletter/item_add";
		break;	
	case "send":
		send();
		break;
	case "save":
		save_mail();
		break;	
	case "delete":
		delete();
		break;	
	default:
		$template = "index";
}

function get_mails(){
	global $db, $items,$func;
	$items  =  $db->query("select * from #_newsletter order by id desc");
	if(!$items) { $func->transfer("Dữ liệu chưa khởi tạo.", "index.html"); }
}

function get_mail(){
	global $db, $item,$func;
	$id = $_GET['id'];

	$db->bindMore(array("id"=>$id));
	$item  =  $db->row("select * from #_newsletter where id=:id");

	if(!$item) { $func->transfer("Dữ liệu không có thực", "index.html?com=newsletter&act=man"); }

}

function save_mail(){
	global $d;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.html?com=newsletter&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){

		$data['email'] = $_POST['email'];
		$data['number'] = $_POST['number'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;

		$db->setTable('newsletter');
		$db->setWhere('id', $id);
		$db->update($data);
		$func->redirect("index.html?com=newsletter&act=man");
		
	}else{
		
		$data['email'] = $_POST['email'];
		$data['number'] = $_POST['number'];
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = time();
		
		$db->setTable('newsletter');
		$db->insert($data);
		$func->redirect("index.html?com=newsletter&act=man");
	}
}


function delete(){
	global $db,$func;
	if(isset($_GET['id'])){
		$id =  $_GET['id'];
		$db->bindMore(array("id"=>$id));
		$db->query("delete from #_newsletter where id=:id");
		$func->redirect("index.html?com=newsletter&act=man");
	} else {
		$func->transfer("Không nhận được dữ liệu", "index.html?com=newsletter&act=man");
	}
}

function send(){
	global $db,$func;

	$file_name= $func->changeTitle($_FILES['file']['name']);
	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.html?com=newsletter&act=man");
	if($file = $func->upload_image("file",_download_type, _upload_hinhanh,$file_name)){
		$data['file'] = $file;
	}
	
	$db->setTable('setting');
	$db->setType('row');
	$company_mail = $db->select();

	if(isset($_POST['listid'])){
		include_once LIB."phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = C_IP; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = C_EMAIL; // SMTP account username
		$mail->Password   = C_PASS;  
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($config_email,$_POST['ten_vi']);
		$listid = explode(",",$_POST['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 

			$db->bindMore(array("id"=>$id));
			$row = $db->row("select email from #_newsletter where id=:id");
			if($row){
				$mail->AddAddress($row['email'], $company_mail['ten_vi']);
			}
		}
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['ten_vi'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		$body = $_POST['noidung_vi'];
		
		$mail->Body = $body;
		if($data['file']){
		$mail->AddAttachment(_upload_hinhanh.$data['file']);
		}
		if($mail->Send())
		transfer("Thông tin đã được gửi đi.", "index.html?com=newsletter&act=man");
		else
		transfer("Hệ thống bị lỗi, xin thử lại sau.", "index.html?com=newsletter&act=man");
	
	}
	
}

?>