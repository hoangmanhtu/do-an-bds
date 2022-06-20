<?php 
$item_service = $db->query("select * from #_tags where shows=1 order by number,datecreate desc");
?>
<div class="container">
	<ul>
		<?php for ($i=0; $i < count($item_service); $i++) { ?>
			<li  class="tags">
				<a class="tag" href="tags/<?=$item_service[$i]['slug']?>.html"><i class="fas fa-tag"></i><?=$item_service[$i]['name_'.$lang]?></a>
			</li>
		<?php } ?>	
	</ul>

</div>