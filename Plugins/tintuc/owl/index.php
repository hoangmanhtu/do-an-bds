<?php
    $db->bindMore(array("shows"=>1,"type"=>"tintuc","highlight"=>0));
    $tintuc_nb  =  $db->query("select name_$lang,id,slug,thumb,datecreate,photo,description_$lang from #_post where shows=:shows and type=:type and highlight!=:highlight order by number,id desc");
?>

<div class="thanh_title"><h4><?=_tintucnoibat?></h4></div>
<div class="tintuc_hot">
  <ul class="hotnew ul">
  <?php for($i=0,$count_tt=count($tintuc_nb);$i<$count_tt;$i++){  ?> 
      <li>
        <a class="effect-v7" href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><img src="<?=_upload_post_l.'373x250x1/'.$tintuc_nb[$i]['photo']?>" alt="<?=$tintuc_nb[$i]['name_'.$lang]?>" /></a>
        <div class="tt_new">
        <div class="ngaytao"><span class="firsst"><?=date('d',$tintuc_nb[$i]['datecreate'])?></span><span><?=date('M',$tintuc_nb[$i]['datecreate'])?></span></div>
        <h3><a href="tin-tuc/<?=$tintuc_nb[$i]['slug']?>.html"><?=$tintuc_nb[$i]['name_'.$lang]?></a></h3>
        <p><?=$func->catchuoi($tintuc_nb[$i]['description_'.$lang],180)?></p>
        </div>
      </li>
  <?php } ?>
  </ul>
</div>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.hotnew').owlCarousel({
            loop:true,
            margin:40,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:true
                },
                425:{
                    items:2,
                    nav:true
                },
                768:{
                    items:2,
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