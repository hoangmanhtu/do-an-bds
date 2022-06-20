<?php
	$db->bindMore(array("type"=>"logo"));
    $banner_top  =  $db->row("select thumb_vi from #_photo where type=:type ");
?>
<div class="thongtin_bt">
	<div class="logo_bottom"><img src="<?=_upload_hinhanh_l.$banner_top['thumb_vi']?>" alt="logo" /></div>
    <ul class="ul">
    	<li><i class="fas fa-map-marker-alt"></i> <?=$row_setting['address_'.$lang]?></li>
    	<li><i class="far fa-envelope"></i> <?=$row_setting['email']?></li>
    	<li><i class="fas fa-phone-volume"></i> <?=$row_setting['phone']?></li>
    	<li><i class="fas fa-globe"></i> <?=$row_setting['website']?></li>
    </ul>
</div>