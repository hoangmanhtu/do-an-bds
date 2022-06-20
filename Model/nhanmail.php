<?php
		$title_bar .= " - Dang ky";
		if(!empty($_POST)&&isset($_POST['nhanmail'])){
			
		$data['email'] = $_POST['email'];
		$data['name'] = $_POST['tieude'];
		$data['content'] = $_POST['noidung'];
		$data['datecreate'] = date('Y-m-d H:i:s');
		$d->setTable('nhanmail');
		if($d->insert($data))
			transfer("Bạn đã đăng ký thành công<br/>Cảm ơn", "index.php");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=register");
		}