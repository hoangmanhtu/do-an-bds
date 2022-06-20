<div class="container">
<div id="info">
<div id="sanpham">
<div class="thanh_title"><h2><?=$title_detail?></h2> </div> 
    <div class="khung">
        <h1 class="tieude"> <?=$row_detail['name_'.$lang]?></h1>
        <p><strong><?=$row_detail['discription_'.$lang]?></strong></p>
        <br /><br />
        <div class="noidung">
        <div style="clear:left;"></div>
        <?=$row_detail['content_'.$lang]?>
        <div style="clear:left;"></div>
        <br /><br />
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570467c6b3882b22"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <br />
        <?=$fb->comment();?>
        </div>
    <div style="clear:left;"></div><br /><br />
    <div class="thanh_title"><h2><?=_cactinkhac?></h2></div>
    <div class="tinkhac">
        <ul class="ul">
        <?php for($i=0, $count=count($item);$i<$count;$i++){  ?> 
        <li class="box_new">
            <a href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><img src="<?=_upload_post_l.'370x300x1/'.$item[$i]['photo']?>"  alt="<?=$item[$i]['name_'.$lang]?>"  /></a>
            <h3><a href="<?=$com?>/<?=$item[$i]['slug']?>.html" ><?=$item[$i]['name_'.$lang]?></a></h3>
            <span class="ngaydang"><i class="fa fa-clock-o" aria-hidden="true"></i><?=_ngaydang?> : <?=date('l, F d, Y', strtotime($item[$i]['datecreate']));?></span><br />
            <?=$func->catchuoi($item[$i]['description_'.$lang],225)?>
        </li>
        <?php }?>
        </ul>
    </div>
    </div>      
</div>
</div>
</div>