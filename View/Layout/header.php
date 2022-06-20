<?php
    

    $db->bindMore(array("type"=>"logo"));
    $logo_top  =  $db->row("select thumb_vi from #_photo where type=:type ");

    $db->bindMore(array("shows"=>1,"type"=>"product","highlight"=>0));
    $row_list  =  $db->row(" select * from #_cate_list where shows=:shows and type=:type and highlight!=:highlight  order by number,id desc ");
?>
<div class="container">
<div class="header_top">
    <div id="logo"><a href=""><img src="<?=_upload_hinhanh_l.$banner_top['thumb_vi']?>" alt="logo" /></a></div>
    <div class="menubar">
      <nav class="menu_top">
          <ul>
              <li class="icon <?php if($_GET['com']==''){?>active<?php }?>"><a href=""><?=_trangchu?></a></li>
              <li class="icon <?php if($_GET['com']=='du-an'){?>active<?php }?>"><a  href="du-an.html"><?=_duan?></i></a>
                <ul>
                    <?=$func->danhmuccap('cate','du-an','project',1)?>
                </ul>
              </li>
              <li class="icon <?php if($_GET['com']=='sang-nhuong'){?>active<?php }?>"><a  href="sang-nhuong.html">Sang Nhượng</i></a>
                <ul>
                    <?=$func->danhmuccap('cate','sang-nhuong','sang-nhuong',1)?>
                </ul>
              </li>
<!--              <li class="icon --><?php //if($_GET['com']=='cho-thue'){?><!--active--><?php //}?><!--"><a  href="cho-thue.html">Cho Thuê</i></a>-->
<!--                <ul>-->
<!--            $func->danhmuccap('cate','cho-thue','cho-thue',1)?>-->
<!--               </ul>-->
<!--              </li>-->
              <li class="icon <?php if($_GET['com']=='tin-tuc'){?>active<?php }?>"><a href="tin-tuc.html"><?=_tintuc?></a>
                <ul>
                    <?=$func->danhmuccap('cate','tin-tuc','tintuc',1)?>
                </ul>
              </li>
              <li class="icon <?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a  href="lien-he.html"><?=_lienhe?></i></a></li>
          </ul>
      </nav>
      <div class="header_mm"><a href="#menu_mm"><span></span></a></div>  
    </div> 
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('.header_mm a').click(function(event) {
      /* Act on the event */
      $('.menu_top').slideToggle(500);
      return false;
    });
  });
</script>