<div id="project">
<div id="sub-menu">
      <nav class="navbar navbar-inverse">
         <div class="container">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#sub-menu-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span> 
               </button>
            </div>
            <ul class="nav navbar-nav navbar-right nav-with-toggle">
               <li>
                  <a class="phone-number" href="tel:<?=$row_setting['hotline']?>">
                  <i class="icon ion-ios-telephone-outline"></i><span><?=$row_setting['hotline']?></span>
                  </a>
               </li>
            </ul>
            <div class="collapse navbar-collapse nav-main" id="sub-menu-collapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#tong-quan">Tổng quan</a></li>
                  <li class=""><a href="#vi-tri">Vị trí</a></li>
                  <li class=""><a href="#tien-ich">Tiện ích</a></li>
                  <li class=""><a href="#thiet-ke">Mặt bằng</a></li>
                  <li class=""><a href="#quy-hoach">Nhà mẫu</a></li>
                  <li class=""><a href="#tiem-nang">Pháp lý</a></li>

                  <!-- <li class=""><a href="#uu-dai">Ưu Đãi</a></li> -->
                  <li class=""><a href="#thanh-toan">PT Thanh toán</a></li>
                  <li class=""><a href="#lien-he">Liên hệ</a></li>
               </ul>
            </div>
         </div>
      </nav>
   </div>
   <section class="property menu-padding sub-menu-padding" id="tong-quan-du-an">
      <div class="base-infos-container">
         <div class="slider">
            <div class="img" style="background: url(<?=_upload_project_l.$row_detail['photo']?>) no-repeat center; background-size: cover;"></div>
         </div>
         <div class="base-infos">
            <div class="left-container">
               <h1 class="title yellow-text-gradient line-bottom"><?=$row_detail['name_'.$lang]?></h1>
               <div class="description">
                  <p><?=$row_detail['description_'.$lang]?></p>
               </div>
               <div class="list-info">
                  <div class="property-type"><?=$thongtin['loai']?></div>
                  <div class="property-price"><big><?=$thongtin['giaban']?></big>/<?=$thongtin['donvi']?></div>
                  <ul class="more-info">
                     <li><big><?=$thongtin['dientich']?></big></li>
                  </ul>
               </div>
               <div class="text-right"><a href="#lien-he" id="lienhengay" class="btn-yellow">Tư vấn ngay</a></div>
            </div>
         </div>
      </div>
   </section>
   <section class="property-content bg-smooth blur">
      <div class="container">
         <div class="breadcrumb2"><span><span><a href="">Trang Chủ</a> » <a href="<?=$com?>.html" class="breadcrumb_last"><?=$title_com?></a>  » <span class="breadcrumb_last"><?=$row_detail['name_'.$lang]?></span> </span></span></div>


      <div class="khung_l">
        <div class="block" id="tong-quan">
           <div class="container">
              <?=$row_detail['tongquan_'.$lang]?>
           </div>
        </div>
        <div class="block" id="vi-tri">
           <div class="container">
             <?=$row_detail['vitri_'.$lang]?>
           </div>
        </div>
        <div class="block" id="tien-ich">
           <div class="container">
             <?=$row_detail['tienich_'.$lang]?>
           </div>
        </div>
        <div class="block" id="thiet-ke">
           <div class="container">
              <?=$row_detail['thietke_'.$lang]?>
           </div>
        </div>

        <div class="block" id="quy-hoach">
           <div class="container">
              <?=$row_detail['quyhoach_'.$lang]?>
           </div>
        </div>

        <div class="block" id="tiem-nang">
           <div class="container">
              <?=$row_detail['tiemnang_'.$lang]?>
           </div>
        </div>

        
        <?php /*
        <div class="block" id="uu-dai">
           <div class="container">
             <?=$row_detail['uudai_'.$lang]?>
           </div>
        </div>
        */?>
         <div class="block" id="thanh-toan">
         <div class="container">
           <?=$row_detail['thanhtoan_'.$lang]?>
         </div>
      </div>
        <div class="block" id="lien-he" >
         <form method="POST" action="lien-he.html" onsubmit="return lienhe_form(this);" >
            <div class="form-submit form-blog submit-type-2 bottom-single ">
               <div class="cta">NHẬN THÔNG TIN CHI TIẾT <?=$row_detail['name_'.$lang]?></div>
               <div class="inputs">
                  <div class="group-input">
                     <input type="text" name="name" placeholder="Họ và tên">
                  </div>
                  <div class="group-input">
                     <input type="text" name="email" placeholder="Email">
                  </div>
                  <div class="group-input">
                     <input type="text" name="phone" placeholder="Số điện thoại">
                  </div>
                  <input type="hidden" name="id" value="<?=$row_detail['id']?>">
                  <input type="hidden" name="duan" value="<?=$row_detail['name_'.$lang]?>">
                  <input type="hidden" name="form_name" value="ĐĂNG KÝ NHẬN BẢN TIN">
                  <div class="group-input group-submit">
                     <button class="btn-yellow submit"  type="submit">Đăng ký ngay</button>
                  </div>
               </div>
            </div>
            </form>

            <?php 

              $maps = explode(",", $row_setting['location_map']);
              if($row_detail['toado']){
                $maps = explode(",", $row_detail['toado']);
              }
            ?>

            <div id="map-4966" style="height: 500px"></div>
               <script type="text/javascript">
                  jQuery(document).ready(function($) {
                    var locationCompany = {lat: <?=$maps[0]?>, lng: <?=$maps[1]?>};
                    if ($("#map-4966").length > 0){
                      var map = new google.maps.Map(document.getElementById('map-4966'), {
                        zoom: <?=$maps[2]?$maps[2]:12?>,
                        center: locationCompany
                      });
                      var marker = new google.maps.Marker({
                        map: map,
                        draggable: true,
                        position: new google.maps.LatLng(locationCompany.lat, locationCompany.lng),
                        visible: true,
                        icon: "Assets/images/icon/map-marker.png"
                      });
                    }
                  });
               </script>
               
      </div>
      <link rel="stylesheet" type="text/css" href="/Assets/css/jquery.rateyo.css">
      <script type="text/javascript" src="Assets/js/jquery.rateyo.js"></script>
      <?php 
        include_once 'Library/Rating.php';
        $rating = new Rating($db,$func);
        $rating->html($com,$row_detail['id']);
      ?>
        <div class="clearfix"></div>
        <?=$func->show_tags($row_detail['tags'])?>

      </div><!-- khung_l -->

      <div class="khung_r">
      
       <div class="thanh_title"><h4>Tin liên quan</h4></div>
        <div class="tinkhac">
            <?php for($i=0, $count=count($item);$i<$count;$i++){  ?> 
            <div class="box_new" style="width: 100%;">
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
        </div>
        <div class="clearfix"></div>
        <?php 
          $form_photo  =  $db->row("select photo_vi from #_photo where type='form_photo' ");
        ?>
        <div id="form_project">
        <div id="form_project_child">
        <form method="POST" action="lien-he.html" id="lien-he2" onsubmit="return lienhe_form(this);" >
        <div class="form-submit form-blog submit-type-2 bottom-single " style="padding-bottom:15px">
          <div class="thanh_title frm" style="padding:0px;margin-top:0px;"><h4>TƯ VẤN MIỄN PHÍ</h4></div>
              <p class="text-center">
              <a href="lien-he.html">
                <img width="130" src="<?=_upload_hinhanh_l.$form_photo['photo_vi']?>" alt="Phuongthienland.com" />
              </a>
              </p>
             <div class="cta text-center" >ĐĂNG KÝ NGAY ĐỂ NHẬN BẢNG GIÁ CỰC HẤP DẪN</div>
              <div class="form-group">
                 <input type="text" name="name" placeholder="Họ và tên" class="form-control" />
              </div>
              <div class="form-group">
                 <input type="text" name="email" placeholder="Email" class="form-control" />
              </div>
              <div class="form-group">
                 <input type="text" name="phone" placeholder="Số điện thoại" class="form-control" />
              </div>
              <input type="hidden" name="id" value="<?=$row_detail['id']?>">
              <input type="hidden" name="duan" value="<?=$row_detail['name_'.$lang]?>">
              <input type="hidden" name="form_name" value="ĐĂNG KÝ NHẬN BẢN TIN">
              <div class="form-group">
                 <button class="btn btn-warning submit btn-block "  type="submit">Đăng ký ngay</button>
              </div>
              <div class="clearfix"></div>
          </div>
          </form>
          </div>
        </div>
        
    </div><!-- khung_r -->

      <div class="clearfix"></div>

      <div id="sanpham">
        <div class="thanh_title"><h4>Dự án khác</h4></div>
        <?php for($i=0, $count=count($item_duan);$i<$count;$i++){
            $thongtin = $func->thongtinduan($item_duan[$i]['id']);
        ?> 
        <div class="box_duan" >
            <div class="item_da ">
                <a href="<?=$com?>/<?=$item_duan[$i]['slug']?>.html" ><img src="<?=_upload_project_l.'430x450x1/'.$item_duan[$i]['photo']?>"  alt="<?=$item_duan[$i]['name_'.$lang]?>"  /></a>
                <div class="project_des">
                    <h3><a href="<?=$com?>/<?=$item_duan[$i]['slug']?>.html" ><?=$item_duan[$i]['name_'.$lang]?></a></h3>
                    <p><span><?=$thongtin['giaban']?>/<?=$thongtin['donvi']?></span> - <?=$thongtin['loai']?></p>
                    <p><i class="fas fa-map-marker-alt"></i> <?=$thongtin['khuvuc']?></p>
                    <div class="xemtiep"><a href="<?=$com?>/<?=$item_duan[$i]['slug']?>.html">Chi tiết</a></div>
                </div>
            </div>
        </div>
       <?php }?>
       <div class="clearfix"></div>
       </div><!-- sanpham -->
    </div>

      
      
   </section>

   <?php /*
   <div id="sanpham">
        <div class="thanh_title" style="padding-left: 10px;"><h2>Các dự án khác</h2> </div> 
        <div class="clear"></div>
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
    <div class="clear"></div>
    <div class="paging"><?=$paging?></div> 

  </div>
  */?>

<script type="text/javascript">
   $(document).ready(function() {
      $(window).scroll(function(event) {
         if($(window).scrollTop()>92){
            $('#sub-menu').addClass('active');
         } else {
            $('#sub-menu').removeClass('active');
         }
         
      });
      $('#sub-menu-collapse li a').click(function(event) {
         /* Act on the event */
         $('#sub-menu-collapse li').removeClass('active');
         $(this).parent().addClass('active');
         var id = $(this).attr('href');
         $('html,body').animate({
         scrollTop: $(id).offset().top-60},
        'slow');
         return false;
      });
      $('#lienhengay').click(function(event) {
         var id = $(this).attr('href');
         $('html,body').animate({scrollTop: $(id).offset().top-60},'slow');
         return false;
      });
   });
</script>
</div>

<script type="text/javascript">

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
               $("#form_project_child").addClass('fixed').css('top', (top_pa+60)+'px');;

         } else {
            $("#form_project_child").removeClass('fixed').css('top', '0px');
         }
      });
   }

});

</script>