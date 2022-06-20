<?php
	$counter = new Library\Counter($db);
	$row_thongke = $counter->get_counter();
?>
<div class="thongke">
	<ul>
		<li class="dang_onl"><?=_dangonline?> : <span>1</span></li>
		<li class="da_onl"><?=_tongtruycap?> : <span><?=$row_thongke['totalaccess']?></span></li>
	</ul>
</div>
