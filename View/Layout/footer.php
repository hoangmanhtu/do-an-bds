<?php

	$db->bindMore(array("type"=>"footer"));
    $footer  =  $db->row("select content_$lang from #_info where type=:type ");

    $db->bindMore(array("type"=>"banner_footer"));
    $banner_footer  =  $db->row("select thumb_vi from #_photo where type=:type ");

?>

<div id="nhantin">
	<div class="container"><?=$nhantin->html();?></div>
</div>

<div class="container">
	<div class="footer">
	<div class="row">
		<div class="col-md-6 col-sm-6 col-xx-12 col-xs-12">
			<?=$thongtin_ft->html();?>
		</div>
		<div class="col-md-3 col-sm-3 col-xx-6 col-xs-12">
			<?=$chinhsach->html();?>
			<?=$bocongthuong->html();?>
		</div>
		<div class="col-md-3 col-sm-3 col-xx-6 col-xs-12">
			<?=$facebook->html();?>
		</div>
	</div>
</div>
</div>
<div id="copy">
	<div class="container">
		<div class="copy">Copyright © 2018 <span> <?=$row_setting['name_'.$lang]?> </span>. All rights reserved .</div>
		<?=$thongke->html();?>
	</div>
</div>

