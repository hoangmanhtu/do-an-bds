<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="Assets/images/headerlogo.png" width="120"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.html"><span>Trang chủ</span></a></li>
  
  <li class="categories_li <?php if($com=='tags' || $type=='project' || $com=='place' || $type=='phongngu' || $type=='donvibds') echo ' activemenu' ?>" id="menu_sp"><a href="" title="" class="exp"><span>Dự Án</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type=='project' && $fact=='list') echo ' class="this"' ?>><a href="index.html?com=cate&act=man_list&type=project">Danh mục cấp 1</a></li>
      <li<?php if($type=='project' && $fact=='') echo ' class="this"' ?>><a href="index.html?com=project&act=man&type=project">Quản lý dự án</a></li>

      <li><a href="index.html?com=title&act=man&type=phongngu">Phòng ngủ</a></li>
      <li><a href="index.html?com=title&act=man&type=donvibds">Đơn vị BDS</a></li>
      <li><a href="index.html?com=title&act=man&type=khoangia">Khoảng Giá</a></li>
      <li><a href="index.html?com=place&act=man_city">Tỉnh thành</a></li>
      <li><a href="index.html?com=place&act=man_dist">Quận huyện</a></li>
<!--       <li><a href="index.html?com=place&act=man_ward">Phường</a></li>-->
<!--      <li><a href="index.html?com=place&act=man_street">Đường</a></li>-->
      <li><a href="index.html?com=tags&act=man">Tags</a></li>
    </ul>
  </li>

  <li class="categories_li <?php if($type=='sang-nhuong' ) echo ' activemenu' ?>" id="menu_sp2"><a href="" title="" class="exp"><span>Sang Nhượng </span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type=='sang-nhuong' && $fact=='list') echo ' class="this"' ?>><a href="index.html?com=cate&act=man_list&type=sang-nhuong">Danh mục cấp 1</a></li>
      <li<?php if($type=='sang-nhuong' && $fact=='') echo ' class="this"' ?>><a href="index.html?com=project&act=man&type=sang-nhuong">Quản lý sang nhượng</a></li>
    </ul>
  </li>

<!--  <li class="categories_li --><?php //if($type=='cho-thue' ) echo ' activemenu' ?><!--" id="menu_sp3"><a href="" title="" class="exp"><span>Cho Thuê</span><strong></strong></a>-->
<!--    <ul class="sub">-->
<!--      <li--><?php //if($type=='cho-thue' && $fact=='list') echo ' class="this"' ?><!--
        <a href="index.html?com=cate&act=man_list&type=cho-thue">Danh mục cấp 1</a></li>-->
<!--      <li--><?php //if($type=='cho-thue' && $fact=='') echo ' class="this"' ?><!--
         <a href="index.html?com=project&act=man&type=cho-thue">Quản lý cho thuê</a></li>-->
<!--    </ul>-->
<!--  </li>-->

  <li class="categories_li <?php if($_GET['com']=='post') echo ' activemenu' ?>" id="menu_bv"><a href="" title="" class="exp"><span>Bài viết chi sẻ</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type=='tintuc' && $fact=='') echo ' class="this"' ?>><a href="index.html?com=cate&act=man_list&type=tintuc">Danh mục</a></li>
      <li<?php if($type=='tintuc' && $fact=='') echo ' class="this"' ?>><a href="index.html?com=post&act=man&type=tintuc">Tin tức</a></li>

      <li<?php if($type=='chinhsach' && $fact=='') echo ' class="this"' ?>><a href="index.html?com=post&act=man&type=chinhsach">Chính sách</a></li>

    </ul>
  </li>


  <!-- <li class="template_li<?php if($_GET['com']=='chinhanh' || $_GET['com']=='tinhthanh') echo ' activemenu' ?>" id="menu_mb"><a href="#" title="" class="exp"><span>Chi Nhánh</span><strong></strong></a>
        <ul class="sub">
          <li<?php if($_GET['act']=='man_cat') echo ' class="this"' ?>><a href="index.html?com=tinhthanh&act=man_cat" title="">Quản lý tỉnh thành</a></li>
          <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.html?com=tinhthanh&act=man" title="">Quản lý quận huyện</a></li>

          <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.html?com=chinhanh&act=man&type=chinhanh" title="">Quản lý chi nhánh</a></li>
        </ul>
    </li> 
 -->


   <li class="categories_li <?php if($_GET['com']=='info') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Giới thiệu công ty</span><strong></strong></a>
    <ul class="sub">
      <li <?php if($type=='gioithieu') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=gioithieu">Giới thiệu</a></li>
<!--      <li <?php if($type=='trangchu') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=trangchu">Trang chủ</a></li>
 -->     <!--  <li <?php if($type=='htkhachhang') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=htkhachhang">Hỗ trợ khách hàng</a></li>
      <li <?php if($type=='nhanmay') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=nhanmay">Nhận may theo yêu cầu</a></li> -->

<!--       <li <?php if($type=='trangchu') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=trangchu">Trang chủ</a></li>
 --><!--       <li <?php if($type=='tuyendung') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=tuyendung">Tuyển dụng</a></li>
 -->    </ul>
  </li> 


  <li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='newsletter' || $_GET['com']=='bannerqc'  || $type=='lienhe' || $type=='footer' || $_GET['com']=='background') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type=='logo') echo ' class="this"' ?>><a href="index.html?com=bannerqc&act=capnhat&type=logo" title="">logo</a></li>
     <!--  <li<?php if($type=='banner') echo ' class="this"' ?>><a href="index.html?com=bannerqc&act=capnhat&type=banner" title="">banner</a></li>
      <li<?php if($type=='banner_footer') echo ' class="this"' ?>><a href="index.html?com=bannerqc&act=capnhat&type=banner_footer" title="">Logo Footer</a></li>
      <li<?php if($type=='bocongthuong') echo ' class="this"' ?>><a href="index.html?com=bannerqc&act=capnhat&type=bocongthuong" title="">Bộ công thương</a></li> -->
      <li<?php if($type=='favicon') echo ' class="this"' ?>><a href="index.html?com=bannerqc&act=capnhat&type=favicon" title="">Favicon</a></li>
      <li<?php if($type=='form_photo') echo ' class="this"' ?>><a href="index.html?com=bannerqc&act=capnhat&type=form_photo" title="">Hình Form Dự Án</a></li>
      <li<?php if($type=='bgweb') echo ' class="this"' ?>><a href="index.html?com=background&act=capnhat&type=bgweb" title="">Background</a></li>
      <li<?php if($type=='lienhe') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=lienhe" title="">Liên hệ</a></li>
      <!-- <li<?php if($type=='footer') echo ' class="this"' ?>><a href="index.html?com=info&act=capnhat&type=footer" title="">Footer</a></li> -->
      <!-- <li<?php if($type=='chinhanh') echo ' class="this"' ?>><a href="index.html?com=title&act=man&type=chinhanh" title="">Quản lý chi nhánh</a></li> -->
      <li<?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="index.html?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
      <li<?php if($_GET['com']=='newsletter') echo ' class="this"' ?>><a href="index.html?com=newsletter&act=man" title="">Đăng ký nhận tin</a></li>
    </ul>
  </li>

  <!-- <li class="marketing_li<?php if($_GET['com']=='yahoo' || $_GET['com']=='link') echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hổ Trợ Online</span><strong></strong></a>
    <ul class="sub">
      <li <?php if($type=='mangxh') echo ' class="this"' ?>><a href="index.html?com=link&act=man&type=mangxh" title="">Mạng xã hội</a></li>
      <li <?php if($_GET['com']=='link') echo ' class="this"' ?>><a href="index.html?com=link&act=man&type=link" title="">Liên kết</a></li> 
  </ul>
  </li> -->

  <li class="gallery_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($type=='slider') echo ' class="this"' ?>><a href="index.html?com=photo&act=man&type=slider" title="">Hình ảnh slider</a></li>
      <!-- <li<?php if($type=='slider2') echo ' class="this"' ?>><a href="index.html?com=photo&act=man_photo&type=slider2" title="">Hình ảnh slider trong</a></li> -->
<!--       <li<?php if($type=='quangcao') echo ' class="this"' ?>><a href="index.html?com=photo&act=man_photo&type=quangcao" title="">Quảng cáo</a></li>
 --><!-- <li<?php if($type=='doitac') echo ' class="this"' ?>><a href="index.html?com=photo&act=man_photo&type=doitac" title="">Đối tác</a></li> -->
    <li<?php if($type=='hinhanh_gt') echo ' class="this"' ?>><a href="index.html?com=photo&act=man&type=hinhanh_gt" title="">Quảng cáo</a></li>
    </ul>
  </li>
<!-- <li class="gallery_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['com']=='video') echo ' class="this"' ?>><a href="index.html?com=video&act=man&type=video" title="">Video</a></li>
    </ul>
  </li>  -->

</ul>