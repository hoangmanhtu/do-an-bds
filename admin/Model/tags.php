<?php
switch($act){
	#===================================================
	case "man":
		get_mans();
		$template = "tags/items";
		break;
	case "add":		
		$template = "tags/item_add";
		break;
	case "edit":		
		get_man();
		$template = "tags/item_add";
		break;
	case "save":
		save_man();
		break;
	case "delete":
		delete_man();
		break;	
	default:
		$template = "index";
}

#====================================
function get_mans(){

		global $db,$func,$items, $paging,$page;
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_tags ";
		$where .= " where id<>0 ";

		
		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_vi LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by id desc";

		$db->bindMore($arr_dpo);
	    $items  =  $db->query("select * from $where $limit");

		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);		
		
	}

	function get_man(){
		global $db,$func,$item,$ds_photo;
		$id = $_GET['id'];
		if(!$id) $func->transfer("Không nhận được dữ liệu", $_SESSION['links_re']);

		$db->bindMore(array("id"=>$id));
	    $item  =  $db->row("select * from #_tags where id=:id");
	    if(!$item) $func->transfer("Dữ liệu không có thực", $_SESSION['links_re']);


	}

	function save_man(){
		global $db,$func,$config;
		
		if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", $_SESSION['links_re']);
		$id = isset($_POST['id']) ? $_POST['id'] : "";
	

		foreach ($config['lang'] as $key => $value) {
			$data['name_'.$key] = $_POST['name_'.$key];
			$data['description_'.$key] = $_POST['description_'.$key];
			$data['content_'.$key] = $_POST['content_'.$key];
		}
		

		$data['slug'] = $func->changeTitle($_POST['name_'.$config['activelang']]);
		$data['title'] = $_POST['title'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		
		$data['number'] = $_POST['number'];
		
		$data['shows'] = isset($_POST['shows']) ? 1 : 0;
		$data['dateupdate'] = date("Y-m-d H:i:s");
		if($id){
			
			$db->setTable('tags');
			$db->setWhere('id', $id);
			$db->update($data);
			$func->redirect($_SESSION['links_re']);
			
		} else {
			$data['datecreate'] = date("Y-m-d H:i:s");
			$db->setTable('tags');
			$db->insert($data);
			$func->redirect($_SESSION['links_re']);
		}

	}

	
	function delete_man(){
		global $db,$func;
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$id=$listid[$i]; 
			$db->query("delete from #_tags where id=:id ");
		}
		$func->redirect($_SESSION['links_re']);
	}


?>