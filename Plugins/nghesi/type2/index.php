<?php
  $nghesi = $db->query("select name_$lang,description_$lang,slug,photo from #_post where shows=1 and type='nghesi' order by number,id desc");
  
?>
<div class="nghesi">
    <div class="thanh_title"><h4><?=_nghesi?></h4></div>
    <div class="nghesi_owl">
      <?php for($i=0;$i<count($nghesi);$i++){?>
        <div class="nghesi-item">
            <a class="effect-v5" href="nghe-si/<?=$nghesi[$i]['slug']?>.html"><img src="<?=_upload_post_l.'537x450x1/'.$nghesi[$i]['photo']?>" alt="<?=$nghesi[$i]['name_'.$lang]?>" /></a>
            <div class="dv_info">
              <h3><a href="nghe-si/<?=$nghesi[$i]['slug']?>.html"><?=$nghesi[$i]['name_'.$lang]?></a></h3>
              <p class="phongcach"><?=_phongcach?></p>
              <?=$nghesi[$i]['description_'.$lang]?>
            </div>
        </div>
      <?php } ?>
    </div>
</div>