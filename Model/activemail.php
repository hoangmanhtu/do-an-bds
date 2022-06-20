<?php
		
		$kichhoat = $_GET['mathanhvien'];

		$db->bindMore(array("mathanhvien"=>$kichhoat));
    	$nguoi_gt  =  $db->row("select * from #_member where mathanhvien=:mathanhvien");
		
		$db->bindMore(array("shows"=>1,"mathanhvien"=>$kichhoat));
		$db->query("UPDATE table_thanhvien SET shows=:shows WHERE mathanhvien=:mathanhvien ");
		
		$title_detail = "Kích hoạt tài khoản .";