<?php 
    $db->bindMore(array("type"=>"slider"));
    $slide_home  =  $db->query("select * from #_photo where shows=1 and type=:type order by number,id desc");
?>

<div id="banner">
	<div class="mainSlider" rel="one">
	<?php for($i=0;$i<count($slide_home);$i++){?>
		<div class="sliderItem">
			<a href="<?=$slide_home[$i]['link']?>"><img src="<?=_upload_hinhanh_l.$slide_home[$i]['thumb_'.$lang]?>" class="monitor" alt="<?=$slide_home[$i]['name_'.$lang]?>" /></a>
		</div>	
	<?php } ?>
	</div>	

	<div class="subSlider">
	<?php for($i=0;$i<count($slide_home);$i++){?>
		<div class="sliderItem">
			<p class="envatoHeader"><a href="<?=$slide_home[$i]['link']?>"><img src="<?=_upload_hinhanh_l.$slide_home[$i]['photo2_'.$lang]?>" alt="<?=$slide_home[$i]['name_'.$lang]?>" /></a></p>
			<div class="line_text"></div>
			<p class="envatoText"><?=$slide_home[$i]['description_'.$lang]?></p>					
			<p class="envatoText xemthems"><a href="<?=$slide_home[$i]['link']?>"><?=_xemthem?></a></p>
		</div>
	<?php } ?>
		
	</div>		
</div>           