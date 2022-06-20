<?php

		@$idc =  $_GET['idc'];
		@$idl =  $_GET['idl'];
		@$idi =  $_GET['idi'];
		@$ids =  $_GET['ids'];
		@$id =  $_GET['id'];
		#các sản phẩm khác======================
		$select_field = "name_$lang,slug,id,thumb,price,oldprice,photo,description_$lang";
		if($id!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$id));
    		$row_detail  =  $db->row("select * from #_product where shows=:shows and type=:type and slug=:slug");
    		//print_r($row_detail);

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
    		$item_photos  =  $db->query("select thumb,id,photo from #_cate_photo where type=:type and id_cate=:id_cate and type='product' order by number,id desc");

    		$db->bindMore(array("type"=>"muahang"));
    		$chinhsach_bv  =  $db->row("select content_$lang from #_info where type=:type");

			$func->daxem($row_detail['id']);
			$func->luotxem('product',$row_detail['id']);

			$json_code .= $json->BreadcrumbList($row_detail,'product','san-pham','product','Sản phẩm',2);
			$json_code .= $json->Product($row_detail,count($row_star),$num_star);
			$json_code .= $json->Review($row_detail,count($row_star),$num_star);

			$luotmua = $db->row("select COUNT(*) as tong from #_order_detail where id_product='".$row_detail['id']."' ");

			
			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id_cat"=>$row_detail['id_cat'],"id"=>$row_detail['id']));
    		$item = $db->query("select $select_field from #_product where shows=:shows and type=:type and id_cat=:id_cat and id!=:id order by number,id desc");

    		$title_detail = _sanphamchitiet;

			if($row_detail['title']!=''){
			$title_bar .= $row_detail['title'];
			} else {
				$title_bar .= $row_detail['name_vi'];
			}
			if($row_detail['keywords']!=''){
				$keywords_bar .= $row_detail['keywords'];
			} else {
				$keywords_bar .= $row_detail['name_vi'];
			}
			if($row_detail['description']!=''){
				$description_bar .= $row_detail['description'];
			} else {
				$description_bar .= $row_detail['description_vi'];
			}

			$share_facebook = '<meta property="og:url" content="'.$func->getCurrentPageURL().'" />';
			$share_facebook .= '<meta property="og:title" content="'.$title_bar.'" />';
			$share_facebook .= '<meta property="og:description" content="'.$description_bar.'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config['config_url'].'/'._upload_product_l.'600x315x2/'.$row_detail['photo'].'" />';


		} elseif($idl!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idl));
    		$row_detail  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and slug=:slug");


			$per_page = 30; // Set how many records do you want to display per page .
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where shows=:shows and type=:type and id_list=:id_list ";
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

		} elseif($idc!=''){

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"slug"=>$idc));
    		$row_detail  =  $db->row("select * from #_cate_cat where shows=:shows and type=:type and slug=:slug");

			$db->bindMore(array("shows"=>1,"type"=>$type_bar,"id"=>$row_detail['id_list']));
    		$row_detail_list  =  $db->row("select * from #_cate_list where shows=:shows and type=:type and id=:id");

			$per_page = 30; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where shows=:shows and type=:type and id_cat=:id_cat  order by number,id desc";

			$arr_dpo = array("shows"=>1,"type"=>$type_bar,"id_cat"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
			$item  =  $db->query("select $select_field from $where $limit");

			$url = $func->getCurrentPageURL();
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
			
			$where = " #_product where shows=:shows and type=:type and id_item=:id_item  order by number,id desc";
			$arr_dpo = array("shows"=>1,"type"=>$type_bar,"id_item"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
			$item  =  $db->query("select $select_field from $where $limit");

			$url = getCurrentPageURL();
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
			
			$where = " #_product where shows=:shows and type=:type and id_sub=:id_sub  order by number,id desc";
			$arr_dpo = array("shows"=>1,"type"=>$type_bar,"id_sub"=>$row_detail['id']);
			$db->bindMore($arr_dpo);
			$item  =  $db->query("select $select_field from $where $limit");

			$url = getCurrentPageURL();
			$paging = pagination($where,$per_page,$page,$url,$arr_dpo);

			$func->luotxem('cate_sub',$row_detail['id']);

			$title_detail = $row_detail['name_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

		} else {
			
			$per_page = 30; // Set how many records do you want to display per page .
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_product where shows=:shows and type=:type ";
			$where .= $where_tk;
			$where .= " order by number,datecreate desc ";

			$arr_dpo = array("type"=>$type_bar,"shows"=>1);
			$db->bindMore($arr_dpo);
    		$item  =  $db->query("select $select_field from $where $limit");

			$url = $func->getCurrentPageURL();
			$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);

			$title_detail = $title_com;
		}
?>