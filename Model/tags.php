<?php

@$idl =  addslashes($_GET['idl']);

#các sản phẩm khác======================
	$sql_sort = " order by number,id desc ";

	if($idl!=''){

		$row_detail = $db->row("select * from #_tags where slug='".$idl."' order by number,datecreate desc");
		if (empty($row_detail)) {header("HTTP/1.0 404 Not Found"); header('Location: /');}

		$title_detail = $title_cat = $row_detail['name_'.$lang];

		if($row_detail['title']!="")
			$title_bar = $row_detail['title'];
		else
			$title_bar = "Tags: ".$row_detail["name_$lang"];
		if($row_detail['keywords']!="")
			$keywords_bar = $row_detail['keywords'];
		else
			$keywords_bar = $row_detail["name_$lang"];
		if($row_detail['description']!="")
			$description_bar = $row_detail['description'];
		else
			$description_bar = "Tags: ".$row_detail["name_$lang"];



	
		$where = " #_project where FIND_IN_SET(".$row_detail['id'].",tags) and shows=1 ".$sql_sort;
		$sql = "select * from $where";		
		$product = $db->query($sql);		


		#tin tức
		$per_page = 12; // Set how many records do you want to display per page .
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_post where shows=:shows and type='tintuc' ";
		$where .= " and FIND_IN_SET(".$row_detail['id'].",tags)";
		$where .= " order by number,datecreate desc ";

		$arr_dpo = array("shows"=>1);
		$db->bindMore($arr_dpo);
		$item  =  $db->query("select name_$lang,slug,id,thumb,photo,description_$lang,datecreate from $where $limit");

		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

	} else{
		transfer("Dữ Liệu Không Có Thực", "index.html");
	}