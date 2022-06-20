<div id="info">
    <div id="sanpham">
        <div class="thanh_title"><h2><?=_timkiem?> ' <?=$_GET['keywords']?> '</h2> </div> 
        <div class="clear"></div>
        <div class="khung_in">
        <ul class="khung_sp ul">
        <?php if(count($item)!=0){?>
          <?php for($i=0, $count_tt=count($item);$i<$count_tt;$i++){
            $com = 'san-pham';
            ?> 
            <li class="item">
              <a class="effect-v3" href="<?=$com?>/<?=$item[$i]['slug']?>.html"><img src="<?=_upload_product_l.'275x320x1/'.$item[$i]['photo']?>" alt="<?=$item[$i]['name_'.$lang]?>" /></a>
              <h3><a href="<?=$com?>/<?=$item[$i]['slug']?>.html"><?=$item[$i]['name_'.$lang]?></a></h3>
              <p class="giaban"><?=_gia?> : <span><?=$func->giaban($item[$j]['price'])?></span></p>
            </li>
           <?php }?>
        <?php } else {?><div style="text-align:center; color:#FF0000; font-weight:bold; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>
        </ul>
      </div>
         <div class="paging"><?=$paging?></div> 
    </div>
</div> 