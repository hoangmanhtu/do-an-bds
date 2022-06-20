
<div id="info">
  <div class="container clearfix">
    <div class="khung_in">
      <div class="thanh_title"><h2> Tags: <?=$title_detail?></h2> </div>

      <?php if(count($product)!=0){?>
          <?php for($i=0,$count_sp=count($product);$i<$count_sp;$i++){
              $thongtin = $func->thongtinduan($product[$i]['id']);
            ?>
            <div class="box_duan">
            <div class="item_da">
                <a href="du-an/<?=$product[$i]['slug']?>.html" ><img src="<?=_upload_project_l.'430x450x1/'.$product[$i]['photo']?>"  alt="<?=$product[$i]['name_'.$lang]?>"  /></a>
                <div class="project_des">
                    <h3><a href="du-an/<?=$product[$i]['slug']?>.html" ><?=$product[$i]['name_'.$lang]?></a></h3>
                    <p><span><?=$thongtin['giaban']?>/<?=$thongtin['donvi']?></span> - <?=$thongtin['loai']?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$thongtin['khuvuc']?></p>
                    <p class="desc"><?=$product[$i]['description_'.$lang]?></p>
                    <div class="xemtiep"><a href="du-an/<?=$product[$i]['slug']?>.html">Chi tiết</a></div>
                </div>
            </div>
        </div>
          <?php } ?>
      <?php } else { ?>
        <div style="text-align:center; color:#e91678; font-size:14px; text-transform:uppercase;"> Chưa có sản phẩm cho mục này . </div>
      <?php }?>

       <?php for($i=0, $count=count($item);$i<$count;$i++){  ?> 
        <div class="box_new">
            <a class="effect-v7" href="tin-tuc/<?=$item[$i]['slug']?>.html" ><img src="<?=_upload_post_l.'380x200x1/'.$item[$i]['photo']?>"  alt="<?=$item[$i]['name_'.$lang]?>"  /></a>
            <div class="tt_new">
              <div class="ngaytao"><span class="firsst"><?=date('d',strtotime($item[$i]['datecreate']))?></span><span><?=date('M',strtotime($item[$i]['datecreate']))?></span></div>
              <div class="right_n">
                <h3><a href="tin-tuc/<?=$item[$i]['slug']?>.html"><?=$item[$i]['name_'.$lang]?></a></h3>
                <p><?=$func->catchuoi($item[$i]['description_'.$lang],180)?></p>
              </div>
            </div>
        </div>
       <?php }?>


      <div class="clear"></div>
      <div class="paging"><?=$paging?></div> 
    </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>