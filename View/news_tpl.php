<div class="container">
<div id="info">
      <div class="thanh_title"><h2><?=$title_detail?></h2> </div> 
      <div class="khung">       
      <div class="row">
      <?php for($i=0, $count=count($item);$i<$count;$i++){  ?> 
        <div class="box_new">
            <a class="effect-v7" href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><img src="<?=_upload_post_l.'380x200x1/'.$item[$i]['photo']?>"  alt="<?=$item[$i]['name_'.$lang]?>"  /></a>
            <div class="tt_new">
              <div class="ngaytao"><span class="firsst"><?=date('d',strtotime($item[$i]['datecreate']))?></span><span><?=date('M',strtotime($item[$i]['datecreate']))?></span></div>
              <div class="right_n">
                <h3><a href="tin-tuc/<?=$item[$i]['slug']?>.html"><?=$item[$i]['name_'.$lang]?></a></h3>
                <p><?=$func->catchuoi($item[$i]['description_'.$lang],180)?></p>
              </div>
            </div>
        </div>
       <?php }?>
       </div>
       <div class="clear"></div>
       <div align="center" ><div class="paging"><?=$paging?></div></div>
      </div>
</div> 
</div>