<div id="info" class="">
   
<div class="container">
    <?php if(count($item)>0) { include ADDON."multimap.php"; } ?>
     <?php include ADDON."timkiemnc.php";?>
     
    <div id="sanpham">
        <div class="thanh_title" style="padding-left: 10px;"><h2><?=$title_detail?></h2> </div> 
        <div class="clear"></div>
        <?php for($i=0, $count=count($item);$i<$count;$i++){
            $thongtin = $func->thongtinduan($item[$i]['id']);
        ?> 
        <div class="box_duan">
            <div class="item_da">
                <a href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><img src="<?=_upload_project_l.'430x450x1/'.$item[$i]['photo']?>"  alt="<?=$item[$i]['name_'.$lang]?>"  /></a>
                <div class="project_des">
                    <h3><a href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><?=$item[$i]['name_'.$lang]?></a></h3>
                    <p><span><?=$thongtin['giaban']?>/<?=$thongtin['donvi']?></span> - <?=$thongtin['loai']?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$thongtin['khuvuc']?></p>
                    <p class="desc"><?=$item[$i]['description_'.$lang]?></p>
                    <div class="xemtiep"><a href="<?=$com?>/<?=$item[$i]['slug']?>.html">Chi tiết</a></div>
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
