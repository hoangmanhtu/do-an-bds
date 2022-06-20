<div class="menubar">
  <nav class="menu_top">
      <ul>
          <li class="icon <?php if($_GET['com']==''){?>active<?php }?>"><a href=""><?=_trangchu?></i></a></li>
          <li class="icon <?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a  href="gioi-thieu.html"><?=_gioithieu?></i></a></li>
          <li class="icon <?php if($_GET['com']=='nghe-si'){?>active<?php }?>"><a href="nghe-si.html"><?=_nghesi?></a></li>
          <li class="icon <?php if($_GET['com']=='thu-vien'){?>active<?php }?>"><a  href="thu-vien.html"><?=_thuvien?></i></a></li>
          <li class="icon <?php if($_GET['com']=='blog'){?>active<?php }?>"><a  href="blog.html"><?=_blog?></i></a></li>
          <li class="<?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he.html"><?=_lienhe?></a></li>
      </ul>
  </nav>
  <div class="header_mm"><a href="#menu_mm"><span></span></a></div>  
</div> 