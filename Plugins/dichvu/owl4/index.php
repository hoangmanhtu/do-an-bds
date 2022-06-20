<?php
  $dichvu = $db->query("select name_$lang,description_$lang,slug,photo from #_post where shows=1 and type='dichvu' order by number,id desc");
?>
<div class="dichvu_in">
    <div class="dichvunb none_control">
      <?php for($i=0;$i<count($dichvu);$i++){?>
        <div class="owl_dichvu">
            <a class="effect-v5" href="dich-vu/<?=$dichvu[$i]['slug']?>.html"><img src="<?=_upload_post_l.'377x200x1/'.$dichvu[$i]['photo']?>" alt="<?=$dichvu[$i]['name_'.$lang]?>" /></a>
            <div class="dv_info">
              <h3><a href="dich-vu/<?=$dichvu[$i]['slug']?>.html"><?=$dichvu[$i]['name_'.$lang]?></a></h3>
              <?=$dichvu[$i]['description_'.$lang]?>
            </div>
        </div>
      <?php } ?>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.dichvunb').owlCarousel({
                loop:true,
                margin:30,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:true
                    },
                    1000:{
                        items:3,
                        nav:true,
                    }
                }
        })
    });
</script>
