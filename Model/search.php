<?php
		$title_detail = _timkiem;

		$id_list=trim($_GET['loainha']);
		$huongnha=trim($_GET['huongnha']);
		$tinhthanh=trim($_GET['tinhthanh']);
		$quanhuyen=trim($_GET['quanhuyen']);
		$dientich=trim($_GET['dientich']);
		$gia=trim($_GET['gia']);
		$key=trim($_GET['keywords']);
		$key_khong_dau=$func->changeTitle($key);

		$per_page = 20; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_product where shows=:shows and type=:type ";
		$ten=trim($_POST['timkiem']);
		if($key!='')
		{
			$where.=" and name_$lang like :key or slug like :key_khong_dau ";
			$arr_pdo['key'] = "%".$key."%";
			$arr_pdo['key_khong_dau'] = "%".$key_khong_dau."%";
		}
		if($loainha!='')
		{
			$where.=" and loainha=:loainha ";
			$arr_pdo['loainha'] = $loainha;
		}
		if($huongnha!='')
		{
			$where.=" and huongnha=:huongnha ";
			$arr_pdo['huongnha'] = $huongnha;
		}
		if($tinhthanh!='')
		{
			$where.=" and tinhthanh=:tinhthanh ";
			$arr_pdo['tinhthanh'] = $tinhthanh;
		}
		if($quanhuyen!='')
		{
			$where.=" and quanhuyen=:quanhuyen ";
			$arr_pdo['quanhuyen'] = $quanhuyen;
		}

		if($dientich!='')
		{
			$dientich_s = explode('-',$dientich);
			if($dientich_s[0]==0){
				$where.= " and dientich < :dientichtu ";
			} else if($dientich_s[1]==0){
				$where.= " and dientich > :dientichden  ";
			} else {
				$where.= " and dientich > :dientichden and dientich < :dientichtu ";
			}
			$arr_pdo['dientichtu'] = $dientich_s[1];
			$arr_pdo['dientichden'] = $dientich_s[0];

		}

		if($gia!='')
		{
			$gia_s = explode('-',$gia);
			if($gia_s[0]==0){
				$where.= " and price < :giabantu ";
			} else if($gia_s[1]==0){
				$where.= " and price > :giabanden  ";
			} else {
				$where.= " and price > :giabanden and price < :giabantu ";
			}
			$arr_pdo['giabantu'] = $gia_s[1];
			$arr_pdo['giabanden'] = $gia_s[0];

		}


		$where .= " order by number,id desc";

		$arr_pdo['shows']=1;
		$arr_pdo['type']='product';

		$db->bindMore($arr_pdo);
    	$item  =  $db->query("select name_$lang,slug,id,thumb,price,oldprice,photo,description_$lang from $where $limit");

		$url = $func->getCurrentPageURL();
		$paging = $func->pagination($where,$per_page,$page,$url,$arr_pdo);