<div id="info">
      <div class="thanh_title"><h2>" <?=$title_detail?> "</h2> </div> 
      <div class="khung list_giaiphap ">

      <div class="box_service ">     
      <?php for($i=0, $count_tt=count($item);$i<$count_tt;$i++){  ?> 
        <div class="item_gp">
            <a class="effect-v5 img" href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><img src="<?=_upload_post_l.'410x400x1/'.$item[$i]['photo']?>"  alt="<?=$item[$i]['name_'.$lang]?>"/></a>
            <h3><a href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><?=$item[$i]['name_'.$lang]?></a></h3>
        </div>
        <?php if(($i+1)%2==0 && ($i+1)!=count($item)) { echo '</div><div class="box_service">';}?>
       <?php }?>
     </div>

      </div>
</div> 

<script type="text/javascript">
    $(document).ready(function(e) {
        $('.list_giaiphap').owlCarousel({
            loop:true,
            margin:50,
            pagination: false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:2,
                    nav:true,
                    dots : false,
                },
                600:{
                    items:3,
                    nav:true,
                    dots : false,
                },
                1000:{
                    items:4,
                    nav:true,
                    dots : false,
                }
            }
        })
    });
</script>