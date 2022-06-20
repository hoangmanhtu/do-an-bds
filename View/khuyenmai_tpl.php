<script language="javascript">
  function addtocart(pid){
    document.form_giohang.productid.value=pid;
    document.form_giohang.command.value='add';
    document.form_giohang.submit();
  }
</script>
<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>
<div id="info">
    <div id="sanpham">

    
        
    <div class="khung">
    <div class="thanh_title"><h4>Khuyến mãi</h4> </div>
<ul class="row_uudai">
    <?php for($j=0,$count_da=count($product);$j<$count_da;$j++){?>
      <li class="item_uudai">
          <a class="effect-v5" href="khuyen-mai/<?=$product[$j]['tenkhongdau']?>.html"><img src="<?=_upload_tieude_l.'580x250x1/'.$product[$j]['photo']?>" alt="<?=$product[$j]['ten_vi']?>" /></a>
          <h3><a href="khuyen-mai/<?=$product[$j]['tenkhongdau']?>"><?=$product[$j]['ten_vi']?></a></h3>
      </li>
    <?php } ?>
</ul>
<div class="clear"></div>
<div class="paging"><?=$paging?></div> 

</div>
</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>


<div style='display:none'>
<div id='inline_content'></div>
</div>