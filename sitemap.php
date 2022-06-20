<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 */
	
	defined( 'ROOT' ) ?:  define( 'ROOT', __DIR__);
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	defined( 'AJAX' ) ?:  define( 'AJAX', "AJAX" );
	require_once ROOT . '/Library/autoload.php';

	$header_xml = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="https://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="https://www.sitemaps.org/schemas/sitemap/0.9 https://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
	$footer_xml = "</urlset>";
	$file_topic = fopen("Upload/sitemap.xml", "w+");
	fwrite($file_topic, $header_xml);
	fwrite($file_topic, "<url><loc>https://".$config['config_url']."/</loc><lastmod>".date('c')."</lastmod><priority>1</priority></url>");
	fwrite($file_topic, "<url><loc>https://".$config['config_url']."/gioi-thieu.html</loc><lastmod>".date('c')."</lastmod><priority>0.5</priority></url>");
	fwrite($file_topic, "<url><loc>https://".$config['config_url']."/tin-tuc.html</loc><lastmod>".date('c')."</lastmod><priority>0.5</priority></url>");
	fwrite($file_topic, "<url><loc>https://".$config['config_url']."/du-an.html</loc><lastmod>".date('c')."</lastmod><priority>0.5</priority></url>");
	fwrite($file_topic, "<url><loc>https://".$config['config_url']."/lien-he.html</loc><lastmod>".date('c')."</lastmod><priority>0.5</priority></url>");

	/*$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_post where shows=1 and type='dichvu' order by number,id desc");

	for($i=0;$i<count($sanpham);$i++){
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/dich-vu/".$sanpham[$i]['slug'].".html</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>0.85</priority></url>");
	} */

	 

	$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_cate_list where shows=1 and type='project' order by number,id desc ");

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/du-an/".$sanpham[$i]['slug']."</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>0.8</priority></url>");
	}

	$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_project where shows=1 and type='project' order by number,id desc");

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/du-an/".$sanpham[$i]['slug'].".html</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>0.79</priority></url>");
	} 

	$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_post where shows=1 and type='tintuc' order by number,id desc ");

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/tin-tuc/".$sanpham[$i]['slug'].".html</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>0.69</priority></url>");
	}

	$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_tags  order by number,id desc ");

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/tags/".$sanpham[$i]['slug']."</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>0.59</priority></url>");
	}
	
	/*$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_cate_list where shows=1 and type='product' order by number,id desc ");

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/san-pham/".$sanpham[$i]['slug']."</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>0.85</priority></url>");

		$sanpham_cat = $db->query("select name_$lang,id,slug,dateupdate from #_cate_cat where shows=1 and type='product' and id_list='".$sanpham[$i]['id']."' order by number,id desc ");

		for($j=0;$j<count($sanpham_cat);$j++){      
			fwrite($file_topic, "<url><loc>https://".$config['config_url']."/san-pham/".$sanpham[$i]['slug']."/".$sanpham_cat[$j]['slug']."</loc><lastmod>".date('c',strtotime($sanpham_cat[$j]['dateupdate']))."</lastmod><priority>0.85</priority></url>");
		}

	}*/

	/*$sanpham = $db->query("select name_$lang,id,slug,dateupdate from #_product where shows=1 and type='product' order by number,id desc ");

	for($i=0;$i<count($sanpham);$i++){      
		fwrite($file_topic, "<url><loc>https://".$config['config_url']."/san-pham/".$sanpham[$i]['slug'].".html</loc><lastmod>".date('c',strtotime($sanpham[$i]['dateupdate']))."</lastmod><priority>1</priority></url>");
	} */
	 
	fwrite($file_topic, $footer_xml);
	fclose($file_topic);

	$func->transfer("Đã tạo xong sitemap ! ", "sitemap.xml");
?>