<?php
  $price = $db->query("select name_$lang,description_$lang,slug,photo from #_post where shows=1 and type='banggia' order by number,id desc limit 0,2");
?>
<div class="price_in">
    <div class="thanh_title"><h4><?=_banggia?></h4></div>
    <div class="table_prive">
      <?php for($i=0;$i<count($price);$i++){?>
        <div class="owl_price">
            <a class="img" href="bang-gia/<?=$price[$i]['slug']?>.html"><img src="<?=_upload_post_l.'710x520x1/'.$price[$i]['photo']?>" alt="<?=$price[$i]['name_'.$lang]?>" /></a>
            <div class="des_price">
              <h3><a href="bang-gia/<?=$price[$i]['slug']?>.html"><?=$price[$i]['name_'.$lang]?></a></h3>
              <?=$price[$i]['description_'.$lang]?>
            </div>
        </div>
      <?php } ?>
    </div>
</div>