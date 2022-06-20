<?php
		$url_now = $func->getCurrentPageURL();
		@$idc =  $_GET['idc'];
		@$idl =  $_GET['idl'];
		@$idi =  $_GET['idi'];
		@$ids =  $_GET['ids'];
		@$id =  $_GET['id'];
		#các sản phẩm khác======================
		$select_field = "name_$lang,slug,id,thumb,price,photo,description_$lang,toado";
		if($id!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$id));
    		$row_detail  =  $db->row("select * from #_project where shows=:shows and type=:type and slug=:slug");
    		if (empty($row_detail)) {header("HTTP/1.0 404 Not Found"); header('Location: /');}
    		//print_r($row_detail);
    		$thongtin = $func->thongtinduan($row_detail['id']);

    		$attributes = json_decode($row_detail['attributes'],true);
    		//print_r($attributes);

    		$row_star = $db->query("select * from #_review where com='".$com."' and id_product='".$row_detail['id']."' ");
    		$tongsao = 0;
		    for($i=0;$i<count($row_star);$i++){
		        $tongsao = $tongsao + $row_star[$i]['star'];
		    }
		    if(count($row_star)>0){
		    	$num_star = round($tongsao/count($row_star),1);
		    }

		    $db->bindMore(array("type"=>$type_bar,"id_cate"=>$row_detail['id']));
    		$item_photos  =  $db->query("select thumb,id,photo from #_cate_photo where type=:type and id_cate=:id_cate and type='project' order by number,id desc");

    		$db->bindMore(array("type"=>"muahang"));
    		$chinhsach_bv  =  $db->row("select content_$lang from #_info where type=:type");

			$func->daxem($row_detail['id']);
			$func->luotxem('project',$row_detail['id']);

			$json_code .= $json->BreadcrumbList($row_detail,'project','du-an','project','Dự Án',2);
			$json_code .= $json->product($row_detail,count($row_star),$num_star);
			$json_code .= $json->Review($row_detail,count($row_star),$num_star);


			//$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id_cat"=>$row_detail['id_cat'],"id"=>$row_detail['id']));
    		//$item = $db->query("select $select_field from #_project where shows=:shows and type=:type and id_cat=:id_cat and id!=:id order by number,id desc");

    		$title_detail = _sanphamchitiet;

			if($row_detail['title']!=''){
			$title_bar .= $row_detail['title'];
			} else {
				$title_bar .= $row_detail['name_vi'];
			}

			if($row_detail['keywords']!=''){
				$keywords_bar .= $row_detail['keywords'];
			}
			if($row_detail['description']!=''){
				$description_bar .= $row_detail['description'];
			}else {
				$description_bar .= $row_detail['description_vi'];
			}

			$share_facebook = '<meta property="og:url" content="'.$url_now.'" />';
			$share_facebook .= '<meta property="og:title" content="'.$title_bar.'" />';
			$share_facebook .= '<meta property="og:description" content="'.$description_bar.'" />';
			$share_facebook .= '<meta property="og:image" content="https://'.$config['config_url'].'/'._upload_project_l.'600x315x2/'.$row_detail['photo'].'" />';

			$db->bindMore(array("shows"=>1,"type"=>'project'));
	    	$item_duan = $db->query("select name_$lang,slug,id,thumb,price,photo,description_$lang,toado from #_project where shows=:shows and type=:type and id<>'".$row_detail['id']."' and id_list='".$row_detail['id_list']."' order by number,id desc ");

	    	$db->bindMore(array("shows"=>1));
			$item = $db->query("select name_$lang,slug,id,thumb,photo,description_$lang,datecreate from #_post where shows=:shows and find_in_set('".$row_detail['id']."',tags) order by number,id desc ");


		} elseif($idl!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idl));
    		$row_detail  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and slug=:slug");


			$per_page = 30; // Set how many records do you want to display per page .
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			$where = " #_project where shows=:shows and type=:type and id_list=:id_list ";
			$where .= $where_tk;
			$where .= " order by number,datecreate desc ";

			$arr_dpo = array("type"=>$type_bar,"shows"=>1,"id_list"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
    		$item  =  $db->query("select $select_field from $where $limit");

			$url = $url_now;
			$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

			$func->luotxem('cate_list',$row_detail['id']);
			$title_detail = $row_detail['name_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} elseif($idc!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idc));
    		$row_detail  =  $db->row("select * from #_cate_cat where shows=:shows and type=:type and slug=:slug");

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_list']));
    		$row_detail_list  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and id=:id");

			$per_page = 30; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			$where = " #_project where shows=:shows and type=:type and id_cat=:id_cat  order by number,id desc";

			$arr_dpo = array("shows"=>1,"type"=>$type_bar,"id_cat"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
			$item  =  $db->query("select $select_field from $where $limit");

			$url = $url_now;
			$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

			$func->luotxem('cate_cat',$row_detail['id']);
			$title_detail = $row_detail['name_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} elseif($idi!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idi));
    		$row_detail  =  $db->row("select * from #_cate_item where shows=:shows and type=:type and slug=:slug");

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_list']));
    		$row_detail_list  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and id=:id");

    		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_cat']));
    		$row_detail_cat  =  $db->row("select * from #_cate_cat where shows=:shows and type=:type and id=:id");

			$per_page = 30; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			$where = " #_project where shows=:shows and type=:type and id_item=:id_item  order by number,id desc";
			$arr_dpo = array("shows"=>1,"type"=>$type_bar,"id_item"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
			$item  =  $db->query("select $select_field from $where $limit");

			$url = $url_now;
			$paging = pagination($where,$per_page,$page,$url,$arr_dpo);

			$func->luotxem('cate_item',$row_detail['id']);

			$title_detail = $row_detail['name_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} elseif($ids!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idi));
    		$row_detail  =  $db->row("select * from #_cate_item where shows=:shows and type=:type and slug=:slug");

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_list']));
    		$row_detail_list  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and id=:id");

    		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_cat']));
    		$row_detail_cat  =  $db->row("select * from #_cate_cat where shows=:shows and type=:type and id=:id");

    		$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_item']));
    		$row_detail_item = $db->row("select * from #_cate_item where shows=:shows and type=:type and id=:id");

			$per_page = 30; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;

			$where = " #_project where shows=:shows and type=:type and id_sub=:id_sub  order by number,id desc";
			$arr_dpo = array("shows"=>1,"type"=>$type_bar,"id_sub"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
			$item  =  $db->query("select $select_field from $where $limit");

			$url = $url_now;
			$paging = pagination($where,$per_page,$page,$url,$arr_dpo);

			$func->luotxem('cate_sub',$row_detail['id']);

			$title_detail = $row_detail['name_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} else {
			$id_list=trim($_GET['loai']);
			$tinhthanh=trim($_GET['khuvuc']);
			$quanhuyen=trim($_GET['quanhuyen']);
			$dientich=trim($_GET['dientich']);
			$gia=trim($_GET['gia']);
			$phongngu=trim($_GET['phongngu']);
			$key=trim($_GET['keywords']);
			$key_khong_dau=$func->changeTitle($key);

			$per_page = 30; // Set how many records do you want to display per page .
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			$arr_dpo = array("type"=>$type_bar,"shows"=>1);
			$where = " #_project where shows=:shows and type=:type ";
			$where .= $where_tk;

			if($key!='')
			{
				$where.=" and name_$lang like :key or slug like :key_khong_dau ";
				$arr_dpo['key'] = "%".$key."%";
				$arr_dpo['key_khong_dau'] = "%".$key_khong_dau."%";
			}

			if($id_list!='')
			{
				$where.=" and id_list=:id_list ";
				$arr_dpo['id_list'] = $id_list;
			}

			if($tinhthanh!='')
			{
				$where.=" and tinhthanh=:tinhthanh ";
				$arr_dpo['tinhthanh'] = $tinhthanh;
			}
            if($quanhuyen!='')
            {
                $where.=" and quanhuyen=:quanhuyen ";
                $arr_dpo['quanhuyen'] = $quanhuyen;
            }


			if($gia!='')
			{
				$row_gia  =  $db->row("select * from #_title where id='".$gia."' ");
				$thongtin = json_decode($row_gia['attributes'],true);
				$giatu = $thongtin['giatu'];
				$giaden = $thongtin['giaden'];
				if($giaden==0){
					$where.=" and giaban >='".$giatu."' ";
				} else {
					$where.=" and giaban >='".$giatu."' and giaban <='".$giaden."' ";
				}
			}

			if($phongngu!='')
			{
				$row_gia  =  $db->row("select * from #_title where shows=:shows and type='phongngu' ");
				$thongtin = json_decode($row_gia['attributes'],true);
				$soluong = $thongtin['soluong'];
				$where.=" and phongngu ='".$soluong ."' ";

			}



			$where .= " order by number,datecreate desc ";
			$db->bindMore($arr_dpo);
    		$item  =  $db->query("select $select_field from $where $limit");

			$url = $url_now;
			$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

			$title_detail = $title_com;
		}
?>
