<?php 
	@$id= $_GET['id'];
	#các sản phẩm khác======================
	if($id){

		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$id));
		$row_detail = $db->row("select * from #_title where shows=:shows and type=:type and slug=:slug");

		$title_detail = $row_detail['ten_'.$lang];
		$per_page = 24; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where shows=:shows and type=:type and id_promotion=:id_promotion order by number,id desc";

		$db->bindMore(array("shows"=>1,"type"=>'product',"id_promotion"=>$row_detail['id']));
		$product = $db->query("select name_$lang,id,thumb,description_$lang,price,oldprice,slug,photo from $where $limit");

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

	} else {
		$per_page = 24; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		$where = " #_title where shows=:shows and type=:type order by number,id desc";

		$db->bindMore(array("shows"=>1,"type"=>"uudai"));
		$product = $db->query("select * from $where $limit");

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);
	}