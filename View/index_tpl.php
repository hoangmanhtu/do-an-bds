<div id="info">
    <div id="sanpham">
        <div class="thanh_title" style="text-align: center"><h2>Dự Án nổi bật</h2></div>
    	<?php for($i=0, $count=count($item);$i<$count;$i++){
            $thongtin = $func->thongtinduan($item[$i]['id']);
        ?> 
        <div class="box_duan">
            <div class="item_da">
                <a href="du-an/<?=$item[$i]['slug']?>.html" ><img src="<?=_upload_project_l.'430x450x1/'.$item[$i]['photo']?>"  alt="<?=$item[$i]['name_'.$lang]?>"  /></a>
                <div class="project_des">
                    <h3><a href="du-an/<?=$item[$i]['slug']?>.html" ><?=$item[$i]['name_'.$lang]?></a></h3>
                    <p><span><?=$thongtin['giaban']?>/<?=$thongtin['donvi']?></span> - <?=$thongtin['loai']?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$thongtin['khuvuc']?></p>
                    <p class="desc"><?=$item[$i]['description_'.$lang]?></p>
                    <div class="xemtiep"><a href="du-an/<?=$item[$i]['slug']?>.html">Chi tiết</a></div>
                </div>
            </div>
        </div>
       <?php }?>
    </div>

    <div id="new_home">
        <div class="container"><?=$tintuc->html()?></div>
    </div>
</div>