<nav id="menu_mm">
   <ul>
              <li class="icon <?php if($_GET['com']==''){?>active<?php }?>"><a href=""><?=_trangchu?></a></li>
              <li class="icon <?php if($_GET['com']=='du-an'){?>active<?php }?>"><a  href="du-an.html"><?=_duan?></i></a>
                <ul>
                    <?=$func->danhmuccap('cate','du-an','project',1)?>
                </ul>
              </li>
              <li class="icon <?php if($_GET['com']=='sang-nhuong'){?>active<?php }?>"><a  href="sang-nhuong.html">Sang Nhượng</i></a>
                <ul>
                    <?=$func->danhmuccap('cate','sang-nhuong','project',1)?>
                </ul>
              </li>
<!--              <li class="icon --><?php //if($_GET['com']=='cho-thue'){?><!--active--><?php //}?><!--"><a  href="cho-thue.html">Cho Thuê</i></a>-->
<!--                <ul>-->
<!--                    --><?//=$func->danhmuccap('cate','cho-thue','project',1)?>
<!--                </ul>-->
<!--              </li>-->
              <li class="icon <?php if($_GET['com']=='tin-tuc'){?>active<?php }?>"><a href="tin-tuc.html"><?=_tintuc?></a>
                <ul>
                    <?=$func->danhmuccap('cate','tin-tuc','tintuc',1)?>
                </ul>
              </li>
              <li class="icon <?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a  href="lien-he.html"><?=_lienhe?></i></a></li>
          </ul>
</nav>
