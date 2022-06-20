<ul class="ul owl_new">
	<?php for($i=0, $count=count($item_ads);$i<$count;$i++){  ?> 
		<li class="quangcao_right">
		    <a class="effect-v7" href="<?=$item_ads[$i]['link']?>" ><img src="<?=_upload_hinhanh_l.'500x300x1/'.$item_ads[$i]['photo_vi']?>"  alt="<?=$item_ads[$i]['name_'.$lang]?>"  /></a>
		</li>
	<?php }?>
</ul>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('.owl_new').owlCarousel({
                loop:true,
                margin:0,
                responsiveClass:true,
                autoplay:true,
				autoplayTimeout:2000,
				autoplayHoverPause:false,
                responsive:{
                    0:{
                        items:1,
                        nav:false
                    },
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:1,
                        nav:false,
                    }
                }
        })
    });
</script>