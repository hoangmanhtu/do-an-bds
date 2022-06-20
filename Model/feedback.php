<?php  if(!defined('_source')) die("Error");

	$db->bindMore(array("type"=>$type_bar));
    $info_detail  =  $db->row("select * from #_info where type=:type");

	$title_bar .= $info_detail['title'];
	$keyword_bar .= $info_detail['keywords'];
	$description_bar .= $info_detail['description'];

	$share_facebook = '<meta property="og:url" content="'.$func->getCurrentPageURL().'" />';
	$share_facebook .= '<meta property="og:type" content="website" />';
	$share_facebook .= '<meta property="og:title" content="'.$info_detail['name_'.$lang].'" />';
	$share_facebook .= '<meta property="og:description" content="'.$info_detail['discription_'.$lang].'" />';
	$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_info_l.$info_detail['photo'].'" />';

	$db->bindMore(array("shows"=>1,"id_baiviet"=>$info_detail['id']));
    $album_images  =  $db->row("select * from #_cate_photo where shows=:shows and id_baiviet=:id_baiviet order by id desc");
?>