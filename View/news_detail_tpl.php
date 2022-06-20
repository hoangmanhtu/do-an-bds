<div class="container">
<div id="info">

    <div class="slide_mobile">
        <?php include LAYOUT."/slideowl.php";?>
    </div>

<div class="homesearch">
    <form action="du-an.html" id="frm_tim" method="get" accept-charset="utf-8">
        <input required="" type="text" id="homequicksearch" name="keywords" placeholder="Tìm kiếm bất động sản" />
        <button type="submit" id="homequickbt"><i class="fas fa-search"></i></button>
    </form>
</div>

<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="css/rating.css" />


<div id="sanpham">

    <div class="khung_l">
        <div class="thanh_title"><h2><?=$title_detail?></h2> </div> 
        <h1 class="tieude"> <?=$row_detail['name_'.$lang]?></h1>
         <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-570467c6b3882b22"></script>
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
        <div class="addthis_native_toolbox"></div>
        <p class="ngaydang"><?=_ngaydang?> : <?=date('l, F d, Y', strtotime($row_detail['datecreate']));?></p>
        

        <p><strong><?=$row_detail['discription_'.$lang]?></strong></p>
        <br /><br />
        <div class="noidung">
        <div style="clear:left;"></div>
        <?=$row_detail['content_'.$lang]?>
        <div style="clear:left;"></div>
        <br />
       
        <link rel="stylesheet" type="text/css" href="/Assets/css/jquery.rateyo.css">
      <script type="text/javascript" src="Assets/js/jquery.rateyo.js"></script>
      <?php 
        include_once 'Library/Rating.php';
        $rating = new Rating($db,$func);
        echo $rating->html($com,$row_detail['id']);
      ?>
      <div class="clearfix"></div>
        <?=$func->show_tags($row_detail['tags'])?>
      
        <br />
        <?=$fb->comment();?>
		</div>
    </div>

    <div class="khung_r">
        <div class="thanh_title"><h4>Dự án</h4></div>
        <?php for($i=0, $count=count($item_duan);$i<$count;$i++){
            $thongtin = $func->thongtinduan($item_duan[$i]['id']);
        ?> 
        <div class="box_duan" style="width: 100%; padding: 0px;">
            <div class="item_da active">
                <a href="du-an/<?=$item_duan[$i]['slug']?>.html" ><img src="<?=_upload_project_l.'430x450x1/'.$item_duan[$i]['photo']?>"  alt="<?=$item_duan[$i]['name_'.$lang]?>"  /></a>
                <div class="project_des">
                    <h3><a href="du-an/<?=$item_duan[$i]['slug']?>.html" ><?=$item_duan[$i]['name_'.$lang]?></a></h3>
                    <p><span><?=$thongtin['giaban']?>/<?=$thongtin['donvi']?></span> - <?=$thongtin['loai']?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$thongtin['khuvuc']?></p>
                    <div class="xemtiep"><a href="du-an/<?=$item_duan[$i]['slug']?>.html">Chi tiết</a></div>
                </div>
            </div>
        </div>
       <?php }?>
       <div class="thanh_title"><h4>Tin liên quan</h4></div>
        <div class="tinkhac">
            <?php for($i=0, $count=count($item);$i<$count;$i++){  ?> 
            <div class="box_new" style="width: 100%;">
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
        <div class="clearfix"></div>

        <div id="form_project">
        <div id="form_project_child">
            
            <div class="thanh_title" style="padding:0px;margin-top:0px;"><h4>FANPAGE</h4></div>

<div style="margin-bottom:15px;" class="fb-like-box" data-href="<?=$row_setting["facebook"]?>" data-width="300" data-show-faces="true" data-stream="false" data-show-border="false" data-header="false"></div>
    
        </div>
        </div>

    </div><!-- khung_r -->
    
</div>
</div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#frm_tim').submit(function(event) {
            /* Act on the event */
            var key = $('#homequicksearch').val();
            window.location.href='du-an.html&keywords='+key;
            return false; 
        });
    });
$(function() {
   if( $('#content').length  ){
      $('#form_project_child').width($('#form_project').width());
         $(window).scroll(function() {
         var frm = parseInt($('#form_project').offset().top);
         var top = parseInt($(window).scrollTop());
         var top_cancel = $('#content').height() +  $('#content').offset().top;
         if(top > frm) {
            var top_pa = top-frm;
            if( (top+$("#form_project_child").height() ) < (top_cancel -50))
               $("#form_project_child").addClass('fixed').css('top', (top_pa+10)+'px');;

         } else {
            $("#form_project_child").removeClass('fixed').css('top', '0px');
         }
      });
   }

});

</script>