<?php
    $gioithieu = new \Library\plugins('gioithieu','content_search');
    $plugin_css .= $gioithieu->css();

    $tintuc = new \Library\plugins('tintuc','owl');
    $plugin_css .= $tintuc->css();
    
    $per_page = 9; // Set how many records do you want to display per page .
	$startpoint = ($page * $per_page) - $per_page;
	$limit = ' limit '.$startpoint.','.$per_page;
	
	$where = " #_project where shows=:shows and type=:type ";
	$where .= " order by number,datecreate desc ";

	$arr_dpo = array("type"=>'project',"shows"=>1);
	$db->bindMore($arr_dpo);
	$item  =  $db->query("select name_$lang,slug,id,price,photo,description_$lang from $where $limit");

	$url = $func->getCurrentPageURL();
	$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);


?>