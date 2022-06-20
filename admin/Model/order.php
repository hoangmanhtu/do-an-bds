<?php

$urldanhmuc ="";
$urldanhmuc.= (isset($_REQUEST['id_user'])) ? "&id_user=".addslashes($_REQUEST['id_user']) : "";
$urldanhmuc.= (isset($_REQUEST['datefm'])) ? "&id_user=".addslashes($_REQUEST['datefm']) : "";
$urldanhmuc.= (isset($_REQUEST['dateto'])) ? "&id_user=".addslashes($_REQUEST['dateto']) : "";
$urldanhmuc.= (isset($_REQUEST['status'])) ? "&status=".addslashes($_REQUEST['status']) : "";

$id=$_REQUEST['id'];
switch($act){

	case "man":
		get_items();
		$template = "order/items";
		break;
	case "add":		
		$template = "order/item_add";
		break;
	case "edit":		
		get_item();
		$template = "order/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;	
	default:
		$template = "index";
}

#====================================

function get_items(){		
	global $db,$func,$items, $paging,$page;
		$per_page = 10; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_order ";
		$where .= " where id!=:id ";

		if($_REQUEST['id_list']!='')
		{
			$where.=" and id_list = :id_list ";
			$arr_dpo['id_list'] = $_GET['id_list'];
		}

		if($_REQUEST['keyword']!='')
		{
			$where.=" and name_vi LIKE :keyword ";
			$arr_dpo['keyword'] = '%'.$_GET['keyword'].'%';
		}
		$where .=" order by id desc";

		$arr_dpo['id'] = 0;
		$db->bindMore($arr_dpo);
	    $items  =  $db->query("select * from $where $limit");

		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($where,$per_page,$page,$url,$arr_dpo);	
}

function get_item(){
	global $db,$func,$item,$result_ctdonhang;
	$id = $_GET['id'];
	if(!$id) $func->transfer("Không nhận được dữ liệu", "index.html?com=order&act=man");

	$db->bindMore(array("id"=>$id));
    $item  =  $db->row("select * from #_order where id=:id");
    if(!$item) $func->transfer("Dữ liệu không có thực", $_SESSION['links_re']);

	$db->bindMore(array("id_order"=>$item['id']));
    $result_ctdonhang = $db->query("select * from #_order_detail where id_order = :id_order");

    $db->bindMore(array("id"=>$id));
    $db->query("UPDATE table_order SET view =1 WHERE  id = :id");
}

function save_item(){
	global $db,$func;
	if(empty($_POST)) $func->transfer("Không nhận được dữ liệu", "index.html?com=order&act=man");
	$id = $_POST['id'];
	if($id){
		$data['note'] = $_POST['note'];
		$data['status'] = $_POST['id_tinhtrang'];
		if($data['status'] == 8){
			for($i=0;$i<count($_POST['idproduct']);$i++){
				$d->reset();
				$sql="select amount from #_product where id = '".$_POST['idproduct'][$i]."'";
				$d->query($sql);
				$result_sl = $d->fetch_array();

				$slton = $result_sl['amount'] - $_POST['amount'][$i];
				$db->bindMore(array("amount"=>$slton,"id"=>$_POST['idproduct'][$i]));
				$db->query("UPDATE table_product SET amount =:amount WHERE  id = :id");
			}
		}	

		$db->setTable('order');
		$db->setWhere('id', $id);
		$db->update($data);
		$func->redirect($_SESSION['links_re']);
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_order where id='".$id."'";
		$d->query($sql);
		
		$d->reset();
		$sql = "delete from #_order_detail where id_order 	='".$id."'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.html?com=order&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.html?com=order&act=man");
	}else transfer("Không nhận được dữ liệu", "index.html?com=order&act=man");
}
?>