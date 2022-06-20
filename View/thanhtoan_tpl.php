<script language="javascript">

	$(document).ready(function() {
		$('.capnhat_sl').keyup(function(event) {
			/* Act on the event */
			var wap = $(this).parents('tr');
			var soluong = $(this).val();
			var pid = wap.data('id');
			var size = wap.data('size');
			var mausac = wap.data('mausac');
			var act = 'capnhat';
			$.ajax({
		            type:'POST',
		            url:'ajax/giohang.php',
		            data:{soluong:soluong,pid:pid,size:size,mausac:mausac,act:act},
		            success: function(result) {
		            	var getData = $.parseJSON(result);
		            	wap.find('.capnhat_price').html(getData.price_item);
		            	$('.capnhat_full').html(getData.full_item);
		            }
	        });
		});

		$('.xoa_cart').click(function(event) {
			/* Act on the event */
			if(confirm('Bạn muốn xóa sản phẩm này ! ')){
				var wap = $(this).parents('tr');
				var soluong = $(this).val();
				var pid = wap.data('id');
				var size = wap.data('size');
				var mausac = wap.data('mausac');
				var act = 'delete';
				$.ajax({
			            type:'POST',
			            url:'ajax/giohang.php',
			            data:{soluong:soluong,pid:pid,size:size,mausac:mausac,act:act},
			            success: function(result) {
			            	wap.slideUp(500);
			            	$('.capnhat_full').html(result);
			            }
		        });
			}
		});

		$('.delete_all').click(function(event) {
			/* Act on the event */
			if(confirm('Bạn muốn xóa tất cả sản phẩm này ! ')){
				var act = 'deleteall';
				$.ajax({
			            type:'POST',
			            url:'ajax/giohang.php',
			            data:{act:act},
			            success: function(result) {
			            	window.location.href=""; 
			            }
		        });
			}
		});

	});

</script>
<div id="info">
<div id="sanpham">
     <div class="thanh_title"><h2><?=_thanhtoan?></h2> </div> 
     <form method="post" name="frm_order" action="xac-nhan.html" enctype="multipart/form-data"  id="frm_order">
        <div class="khung">   
           <table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">

           <tr class="menu_giohang" >
	           <td class="res_cart">STT</td>
	           <td><?=_sanpham?></td>
	           <td><?=_soluong?></td>
	           <td class="res_cart"><?=_tonggia?></td>
	           <td><?=_xoa?></td>
           </tr>

    		<?php 
			if(is_array($_SESSION['cart'])){
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$q=$_SESSION['cart'][$i]['qty'];
					$size=$_SESSION['cart'][$i]['size'];
					$mausac=$_SESSION['cart'][$i]['mausac'];
					$pname=$cart->get_product_name($pid);
					if($q==0) continue;
			?>
    		<tr class="form_giohang" data-id="<?=$pid?>" data-size="<?=$size?>" data-mausac="<?=$mausac?>" >
	        		<td width="5%" class="res_cart"><?=$i+1?></td>
	                <td width="30%" class="tt_cart"><a href="san-pham/<?=$func->changeTitle($pname)?>.html">
	                    <img src="upload/product/<?=$cart->get_thumb($pid)?>" alt="<?=$pname?>" class='img' />
	                    <h3><?=$pname?> </h3>
	                    <p class="tt_cart2">Size : <span><?=$cart->getsize($size)?></span> - Màu sắc : <?=$cart->getmausac($mausac)?></p>
						<span><?=_gia?> : <?=number_format($cart->get_price($pid),0, ',', '.')?>&nbsp;đ</span>
	                </a></td>
	                <td width="8%"><input name="soluong" value="<?=$q?>" class="capnhat_sl" /></td>                    
	                <td width="10%" class="res_cart capnhat_price"><?=number_format($cart->get_price($pid)*$q,0, ',', '.')?>&nbsp;đ</td>
	                <td width="10%"><img src="assets/images/icon/disabled.png" border="0" class="xoa_cart" /></td>
	    		</tr>
            <?php } ?>
				
            <tr class="tonggia">
            	<td colspan="7"><?=_tonggia?> : <b  class="capnhat_full" ><?=number_format($cart->get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
            </tr>
			<?php }	else{ echo "<tr bgColor='#FFFFFF'><td>"._bankhongcosanphamnaotronggiohang."</td>"; } ?>
        
        </table>
    <div class="row">
    <div class="giohang_form col-md-12 col-sm-12 col-xx-12 col-xs-12">
	    <div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">
	   		<label><img src="assets/images/icon/accuont.png" alt="" /> <?=_hoten?> <span class="alert">*</span></label>
	    	<input name="ten" id="ten" class="formsubmit" value="<?=$thanhvien_tv['hoten']?>" required="required" />
	    </div>
	    
		<div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">
		    <label><img src="assets/images/icon/phone.png" alt="" /> <?=_dienthoai?> <span class="alert">*</span></label>
		    <input name="dienthoai" id="dienthoai" class="formsubmit" value="<?=$thanhvien_tv['dienthoai']?>" required="required" />
	    </div>
		<div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">
		    <label><img src="assets/images/icon/house.png" alt=""  /> <?=_diachi?> <span class="alert">*</span></label>
		    <input  name="diachi"  id="diachi" class="formsubmit" required="required"  value="<?=$thanhvien_tv['diachi']?>"/>
	    </div>
		<div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_input">
		    <label><img src="assets/images/icon/batquai.png" alt="" /> E-mail <span class="alert">*</span></label>
		    <input type="email" name="email" id="email" class="formsubmit" required="required"  value="<?=$thanhvien_tv['email']?>"/>
	    </div>
	</div>

    <div class="col-md-12 col-sm-12 col-xx-12 col-xs-12 cl_area">
		<label><img src="assets/images/icon/thutuc.png" alt="" /> <?=_thongtinnguoinhan?> </label>
	    <textarea name="noidung"><?=$_POST['noidung']?></textarea>
    </div>
    </div>
      
    <div class="icon_thanh">
        <input id="submit_thanhtoan" type="submit" name="next" value="<?=_thanhtoan?>" class="g_muatiep" />
    </div>
    
    </div> 

</form>
                
</div>           
</div>