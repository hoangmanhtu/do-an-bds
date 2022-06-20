<?php
    $gioithieu = $db->row("select * from #_info where type='trangchu'");
?>
<div class="hinhanh_gt"><p><img src="<?=_upload_hinhanh_l.$gioithieu['thumb']?>" alt="<?=$gioithieu['name_'.$lang]?>"></p></div>
<div class="gioithieu">
	   <div class="noidung_gt">
        <div class="title_about"><h5><?=_gioithieu?></h5></div>
        <div class="title_about"><h4><?=$gioithieu['name_'.$lang]?></h4></div>
        <div class="content_about"><?=$gioithieu['content_'.$lang]?></div>
     </div>
<!--      <div class="xemthem_gt"><a href="gioi-thieu.html"><?=_xemchitiet?></a></div>
 --></div>