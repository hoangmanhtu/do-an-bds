<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
	defined( 'ROOT' ) ?:  define( 'ROOT', dirname(__DIR__));
	defined( 'AJAX' ) ?:  define( 'AJAX', "AJAX" );
	require_once ROOT . '/Library/autoload.php';

	@$pid = $_POST['pid'];
	@$act = $_POST['act'];
	@$size = $_POST['size'];
	@$mausac = $_POST['mausac'];

	if($_POST['soluong']>0){
		@$soluong = $_POST['soluong'];
	}else {
		@$soluong = 1;
	}

    switch($act){
		//-------------capnhat------------------
		case 'add':
		    $result_giohang = $cart->addtocart($pid,$soluong,$size,$mausac);
		    $count = count($_SESSION['cart']);
			$result = array('result_giohang' => $result_giohang,'count' => $count);
			echo json_encode($result);
			break;

		case 'capnhat':
			$max=count($_SESSION['cart']);
			for($i=0;$i<$max;$i++){
				$pids=$_SESSION['cart'][$i]['productid'];
				$sizes=$_SESSION['cart'][$i]['size'];
				$mausacs=$_SESSION['cart'][$i]['mausac'];
				if($pids==$pid && $size==$sizes && $mausac==$mausacs ){
					if($soluong>0 && $soluong<=999){
						$soluong = str_replace(",", '.', $soluong);
						$_SESSION['cart'][$i]['qty']=$soluong;
					}
				}
			}
			$price_item = number_format($cart->get_price($pid)*$soluong,0, ',', '.')." &nbsp; VND ";
			$full_item = number_format($cart->get_order_total(),0, ',', '.')." &nbsp; VND ";
			$get_order_info = array('price_item' => $price_item ,'full_item' => $full_item);
			echo json_encode($get_order_info);
			break;
			
		case 'delete':
		    $cart->remove_product($pid,$size,$mausac);
		    echo $full_item = number_format($cart->get_order_total(),0, ',', '.')." &nbsp; VND ";
			break;
		case 'deleteall':
		    unset($_SESSION['cart']);
		    echo $full_item = number_format($cart->get_order_total(),0, ',', '.')." &nbsp; VND ";
			break;
		case 'shipping':
			$d->reset();
			$sql = "select * from #_tieude where id='".$_POST['id']."' ";
			$d->query($sql);
			$shipping = $d->fetch_array();
		    echo $full_item = number_format($cart->get_order_total()+$shipping['phiship'],0, ',', '.')." &nbsp;VND ";
			break;
		default: 
			
			break;

	}