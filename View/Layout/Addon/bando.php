<?php
  $bando_bt  =  $db->row("select thumb_$lang from #_photo where type='bando'");
?>
<div class="bando_"><a href="lien-he.html"><img src="<?=_upload_hinhanh_l.$bando_bt['thumb_'.$lang]?>" alt="map" /></a></div>