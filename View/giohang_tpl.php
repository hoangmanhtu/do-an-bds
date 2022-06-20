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
          <div class="thanh_title"><h2><span class="before">1</span><?=_giohang?><span class="after"></span></h2> </div> 
            <div class="khung">
                
            <form name="form1" method="post">
		    <input type="hidden" name="pid" />
			<input type="hidden" name="command" />
	  		<table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">

	           <tr class="menu_giohang" >
		           <td class="res_cart"><?=_stt?></td>
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
						$pname=get_product_name($pid);
						if($q==0) continue;
				?>
	    		<tr class="form_giohang" data-id="<?=$pid?>" data-size="<?=$size?>" data-mausac="<?=$mausac?>" >
	        		<td width="5%" class="res_cart"><?=$i+1?></td>
	                <td width="30%" class="tt_cart"><a href="san-pham/<?=changeTitle($pname)?>.html">
	                    <img src="upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>" class='img' />
	                    <h3><?=$pname?> </h3>
	                    <p class="tt_cart2">Size : <span><?=getsize($size)?></span> - Màu sắc : <?=getmausac($mausac)?></p>
						<span><?=_gia?> : <?=number_format(get_price($pid),0, ',', '.')?>&nbsp;đ</span>
	                </a></td>
	                <td width="8%"><input name="soluong" value="<?=$q?>" class="capnhat_sl" /></td>                    
	                <td width="10%" class="res_cart capnhat_price"><?=number_format(get_price($pid)*$q,0, ',', '.')?>&nbsp;đ</td>
	                <td width="10%"><img src="assets/images/icon/disabled.png" class="xoa_cart" border="0" /></td>
	    		</tr>
	            <?php } ?>
					
	            <tr class="tonggia">
	            	<td colspan="5" ><?=_tonggia?> : <b class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
	            </tr>
				<?php }	else{ echo "<tr bgColor='#FFFFFF'><td colspan='5'>"._bankhongcosanphamnaotronggiohang."</td>"; } ?>
	        
	        </table>

            <input type="button" value="<?=_muatiep?>" onclick="window.location='trang-chu.html'" class="g_muatiep">
            <input type="button" value="<?=_xoatatca?>" class="g_muatiep delete_all">
            <input type="button" value="<?=_thanhtoan?>" onclick="window.location='thanh-toan.html'" class="g_muatiep">
   
  </form>
               
          </div>
        </div>
      </div>