<?php
  $phongcach = $db->query("select name_$lang,description_$lang,slug,photo from #_post where shows=1 and type='phongcach' order by number,id desc");
  
?>
<div class="style">
    <div class="thanh_title"><h4><?=_phongcach?></h4></div>
    <div class="slide_pc">
      
    </div>
    <div class="container">
    <div class="style_owl hide_control">
      <?php for($i=0;$i<count($phongcach);$i++){?>
        <div class="style-item">
            <a class="effect-v5" href="phong-cach/<?=$phongcach[$i]['slug']?>.html"><img src="<?=_upload_post_l.'275x240x1/'.$phongcach[$i]['photo']?>" alt="<?=$phongcach[$i]['name_'.$lang]?>" /></a>
            <h3><a href="phong-cach/<?=$phongcach[$i]['slug']?>.html"><?=$phongcach[$i]['name_'.$lang]?></a></h3>
        </div>
      <?php } ?>
    </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.style_owl').owlCarousel({
                loop:true,
                margin:10,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2,
                        nav:true
                    },
                    400:{
                        items:3,
                        nav:true
                    },
                    600:{
                        items:4,
                        nav:true
                    },
                    1000:{
                        items:5,
                        nav:true,
                    },
                    1300:{
                        items:6,
                        nav:true,
                    }
                }
        })
    });
</script>