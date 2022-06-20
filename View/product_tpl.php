<div id="info">
    <div id="sanpham">
        <div class="thanh_title"><h2><?=$title_detail?></h2> </div> 
        <div class="clear"></div>
        <ul class="khung_sp ul">
        		<?php if(count($item)!=0){?>
                <?php for($i=0,$count_sp=count($item);$i<$count_sp;$i++){?>
                     <li class="item">
                        <a class="effect-v3 img" href="<?=$com?>/<?=$item[$i]['slug']?>.html"><img src="<?=_upload_product_l.'242x220x1/'.$item[$i]['photo']?>" alt="<?=$item[$i]['ten_'.$lang]?>" /></a>
                        <h3><a href="<?=$com?>/<?=$item[$i]['slug']?>.html"><?=$item[$i]['name_'.$lang]?></a></h3>
                        <p class="giaban"><?=_gia?> : <span><?=$func->giaban($item[$i]['price'])?></span></p>
                </li>
                <?php } ?>
        		<?php } else { ?>
            <li style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> <?=_chuacosanphamchomucnay?> . </li>
            <?php }?>
        </ul>
    <div class="clear"></div>
    <div class="paging"><?=$paging?></div> 

</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>