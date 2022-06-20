<?php
	@$idl =  $_GET['idl'];
	@$id =  $_GET['id'];
	#các sản phẩm khác======================
	$select_field = "name_$lang,slug,id,thumb,photo,description_$lang,datecreate";
	if($id!=''){

		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$id));
		$row_detail  =  $db->row("select * from #_post where shows=:shows and type=:type and slug=:slug");
		if (empty($row_detail)) {header("HTTP/1.0 404 Not Found"); header('Location: /');}

	    $db->bindMore(array("shows"=>1,"type"=>$type_bar,"id_cate"=>$row_detail['id']));
		$item_photos  =  $db->row("select thumb,id,photo from #_cate_photo where shows=:shows and type=:type and id_cate=:id_cate order by number,id desc");
		
		if($row_detail['tags']!=''){
			$ida = explode(',',$row_detail['tags']);
			$db->bindMore(array("shows"=>1,"type"=>'project'));
	    	$item_duan = $db->query("select name_$lang,slug,id,thumb,price,photo,description_$lang,toado from #_project where shows=:shows and type=:type and id='".$ida[0]."' order by number,id desc limit 0,1");
    	}


		$func->daxem($row_detail['id']);
		$func->luotxem('product',$row_detail['id']);

		$json_code .= $json->BreadcrumbList($row_detail,'post','tin-tuc','tintuc','Tin tức',0);
		$json_code .= $json->NewsArticle($row_detail);

		$share_facebook = '<meta property="og:url" content="'.$func->getCurrentPageURL().'" />';
		$share_facebook .= '<meta property="og:title" content="'.$row_detail['name_'.$lang].'" />';
		$share_facebook .= '<meta property="og:description" content="'.$row_detail['description_'.$lang].'" />';
		$share_facebook .= '<meta property="og:image" content="https://'.$config_url.'/'._upload_post_l.'600x315x2/'.$row_detail['photo'].'" />';

		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id_list"=>$row_detail['id_list'],"id"=>$row_detail['id']));
		$item = $db->query("select $select_field from #_post where shows=:shows and type=:type and id_list=:id_list and id!=:id order by number,id desc limit 0,3");

		$item_ads = $db->query("select * from #_photo where shows=1 and type='hinhanh_gt' order by number,id desc");

		$title_detail .= $title_com;
		if($row_detail['title']!=''){
				$title_bar .= $row_detail['title'];
			} else {
				$title_bar .= $row_detail['name_vi'];
			}
			if($row_detail['keywords']!=''){
				$keywords_bar .= $row_detail['keywords'];
			} else {
				$keywords_bar .= $row_detail['description_vi'];
			}
			if($row_detail['description']!=''){
				$description_bar .= $row_detail['description'];
			} else {
				$description_bar .= $row_detail['description_vi'];
			}

	} elseif($idl!=''){

		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idl));
		$row_detail  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and slug=:slug");


		$per_page = 12; // Set how many records do you want to display per page .
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_post where shows=:shows and type=:type and id_list=:id_list ";
		$where .= $where_tk;
		$where .= " order by number,datecreate desc ";

		$arr_dpo = array("type"=>$type_bar,"shows"=>1,"id_list"=>$row_detail['id']);
		$db->bindMore($arr_dpo);
		$item  =  $db->query("select $select_field from $where $limit");

		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

		$func->luotxem('cate_list',$row_detail['id']);
		$title_detail = $row_detail['name_'.$lang];
		$title_bar .= $row_detail['title'];
		$keyword_bar .= $row_detail['keywords'];
		$description_bar .= $row_detail['description'];

	} else {
		
		$per_page = 12; // Set how many records do you want to display per page .
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_post where shows=:shows and type=:type ";
		$where .= $where_tk;
		$where .= " order by number,datecreate desc ";

		$arr_dpo = array("type"=>$type_bar,"shows"=>1);
		$db->bindMore($arr_dpo);
		$item  =  $db->query("select $select_field from $where $limit");

		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

		$title_detail = $title_com;
		
	}