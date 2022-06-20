<link href="Assets/js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="Assets/js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {

      $('.dathat_detail,.btn_muahang').click(function(e) {
        var pid = $(this).data('id');
        var type = $(this).data('type');

        var soluong = $('#soluong').val();
        if(soluong <= 0){
          alert(<?=_banchuachonsoluong?>);
          return false;
        }

        var size = $('#sizes li.active').data('id');
        if(!size && $('#sizes li').length>0){
          alert('Bạn chưa chọn size!' );
          return false;
        }

        var mausac = $('#mausacs li.active').data('id');
        if(!mausac && $('#mausacs li').length>0){
          alert('Bạn chưa chọn màu !' );
          return false;
        }

        $.ajax({
          type: "POST",
          url: "ajax/giohang.php", 
          data: {pid:pid,soluong:soluong,mausac:mausac,size:size,act:'add'},
          success: function(string){
            var getData = $.parseJSON(string);   
            var result = getData.result_giohang;
            var count = getData.count;
            if(result > 0) {    
              alert('<?=_dathemgiohang?>');
              if(type=='muangay'){
                window.location.href="thanh-toan.html"; 
              }
            }
            else if (result == -1) alert('<?=_sanphamkhongtontai?>');
            else if (result == 0) { 
              alert('<?=_dacongthemgiohang?>'); 
              if(type=='muangay'){
                window.location.href="thanh-toan.html"; 
              }      
            }
          }          
        });
      });

      $('#tabs li a').click(function(event) {
        /* Act on the event */
        $('#tabs li').removeClass('active');
        $(this).parent().addClass('active');
        var id = $(this).attr('href');
        $('.tab_hidden').slideUp(500);
        $('#'+id).slideDown(500);
        return false;
      });

      $('#mausacs li,#sizes li').click(function(event) {
        /* Act on the event */
        $(this).parent().find('li').removeClass('active');
        $(this).addClass('active');
      });
      $('.giam_sl').click(function(event) {
          /* Act on the event */
          var soluong = parseInt($('#soluong').val());
          if(soluong>1){
              soluong = soluong-1;
          }
          $('#soluong').val(soluong);
      });
      $('.tang_sl').click(function(event) {
          /* Act on the event */
          var soluong = parseInt($('#soluong').val());
          if(soluong<100){
              soluong = soluong+1;
          }
          $('#soluong').val(soluong);
      });

      $('.owl_carousel_detail').owlCarousel({
          loop:false,
          margin:10,
          responsiveClass:true,
          responsive:{
              0:{
                  items:3,
                  nav:true
              },
              600:{
                  items:5,
                  nav:true
              },
              1000:{
                  items:6,
                  nav:true,
              }
          }
    })

  });
</script>
<div id="info">
<div id="sanpham">
<div class="clear"></div>
<div class="thanh_title" style="margin-bottom:40px;"><h2><?=$title_detail?></h2> </div>
<div class="khung_pro">
    <div class="row">
         <div class="frame_images col-md-5 col-sm-5 col-xx-12 col-xs-12" >
                <div class="app-figure" id="zoom-fig">
                <a href="<?=_upload_product_l.$row_detail['photo']?>" id="Zoom-1" class="MagicZoom" title="<?=$row_detail['name_'.$lang]?> .">
                <img src="<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['name_'.$lang]?>" width="250" /></a></div>
                <div class="selectors">
                  <ul class="owl_carousel_detail ul">
                      <li><a  data-zoom-id="Zoom-1" href="<?=_upload_product_l.$row_detail['photo']?>" data-image="<?=_upload_product_l.$row_detail['photo']?>"> <img u="image" src="<?=_upload_product_l.$row_detail['photo']?>"  /></a> </li>
                      <?php for($i=0,$count_ch=count($item_photos);$i<$count_ch;$i++){?>
                          <li><a  data-zoom-id="Zoom-1" href="<?=_upload_product_l.$item_photos[$i]['photo']?>" data-image="<?=_upload_product_l.$item_photos[$i]['photo']?>"> <img u="image" src="<?=_upload_product_l.$item_photos[$i]['photo']?>"  height="" /></a>  </li>
                      <?php } ?>
                  </ul>
                </div>
         </div>

         <ul class="khung_thongtin col-md-7 col-sm-7 col-xx-12 col-xs-12 ul">
                <li><h1><?=$row_detail['name_'.$lang]?></h1></li>
                <li>
                <span class="danhgia">
                   <span class="luotxem"><i class="fas fa-eye"></i> <?=$row_detail['view']?> lượt xem sản phẩm</span> |<span class="luotmua"> <i class="fas fa-cart-plus"></i> <?=$luotmua['tong']?> lượt mua</span></li>
                <li class="masp"><b><?=_masp?> :</b> <?=$row_detail['code']?></li>
                <?php if($row_detail['oldprice']){?><li class="giacu_detail"><b><?=_giacu?>:</b> <?=$func->giaban($row_detail['oldprice'])?></li><?php } ?>
                <li class="gia_detail"><b><?=_giaban?> :</b> <?=$func->giaban($row_detail['price'])?></li>
                <li class="mota_detail"><?=$row_detail['description_'.$lang]?></li>
                <?php if($config['setup']['cart']=='true'){?>
                <li>
                  <?php if(is_array($attributes['size'])){?>
                  <div class="size_detail">
                    <label>Size : </label>
                    <ul id="sizes" class="ul">
                    <?=$func->exarray('size',$row_detail['attributes'])?>
                    </ul>
                  </div>
                  <?php } ?>
                  <?php if(is_array($attributes['mausac'])){?>
                  <div class="mausac_detail">
                    <label>Màu : </label>
                    <ul id="mausacs" class="ul">
                    <?=$func->exarray('mausac',$row_detail['attributes'])?>
                    </ul>
                  </div>
                  <?php } ?>

                  <div class="soluong_detail">
                    <label><?=_soluong?> : </label>
                    <div class="input-group bootstrap-touchspin">
                    <span class="input-group-btn giam_sl"><button class="btn btn-default bootstrap-touchspin-down" type="button">-</button></span>
                    <input id="soluong" type="tel" name="soluong" value="1" min="1" max="100" class="form-control" style="display: block;">
                    <span class="input-group-btn tang_sl"><button class="btn btn-default bootstrap-touchspin-up" type="button">+</button></span></div>
                  </div>
                </li>

                <li>
                  <div class="dathat_detail" data-id="<?=$row_detail['id']?>" data-type="muangay"><p>Đặt hàng</p><span>( Giao hàng và lắp đặt sản phẩm tận nơi )</span></div>
                </li>
                <li class="huongdan_detail"><a href="huong-dan-dat-hang.html" class="huongdan"> <i class="fas fa-question"></i><?=_huongdanmuahang?></a></li>
                <?php } ?>

                <li>
                  <!-- Go to www.addthis.com/dashboard to customize your tools -->
                  <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-59dacff91f6d1f35"></script>
                  <!-- Go to www.addthis.com/dashboard to customize your tools -->
                  <div class="addthis_inline_share_toolbox"></div>
                </li>
                <?php if($row_detail["tags"]!=''){?>
                <li>Tags: &nbsp; <?=$func->show_tags($row_detail["tags"])?></li>
                <?php }?>
        </ul>
    </div>
</div> 

<div id="container_product">

    <div >
          <ul class="ul" id="tabs">
              <li class="active"><a href="tab-1"><?=_chitietsanpham?></a></li>
          </ul>
          <div class="clear"></div>
          <div id="tab-1" class="tab_hidden active">
              <div class="noidung_ta">
                <?=$row_detail['content_'.$lang]?>
                <div class="clear"></div>
                <?=$fb->comment()?>
              </div>
          </div>
    </div>
</div>
<div class="sanpham_khac">
<div class="thanh_title"><h2><?=_sanphamkhac?></h2></div>
<div class="clear"></div>
<ul class="khung_sp ul">
    <?php for($j=0,$count_sp=count($item);$j<$count_sp;$j++){?>
         <li class="item">
            <a class="effect-v3 img" href="san-pham/<?=$item[$j]['slug']?>.html">
                <img src="<?=_upload_product_l.'288x288x1/'.$item[$j]['photo']?>" alt="<?=$item[$j]['name_'.$lang]?>" /></a>
            <h3><a href="san-pham/<?=$item[$j]['slug']?>.html"><?=$item[$j]['name_'.$lang]?></a></h3>
            <p class="giaban"><?=_gia?> : <span><?=$func->giaban($item[$j]['price'])?></span></p>
        </li>
    <?php } ?>
</ul>
</div>
</div></div>