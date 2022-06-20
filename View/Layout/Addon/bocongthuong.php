<?php
  $bocongthuong  =  $db->row("select thumb_$lang,link from #_photo where type='bocongthuong'");
?>
<div class="bocongthuong"><a href="<?=$bocongthuong['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$bocongthuong['thumb_'.$lang]?>" alt="bộ công thuong" /></a></div>