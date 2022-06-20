<?php
    $gioithieu = $db->row("select * from #_info where type='trangchu'");
    $khuvuc = $db->query("select * from #_place_city where shows=1 order by number,id desc");
	$loaiduan = $db->query("select * from #_cate_list where shows=1 and type='project' order by number,id desc");
	$giaduan = $db->query("select * from #_title where shows=1 and type='khoangia' order by number,id desc");
	$phongngu = $db->query("select * from #_title where shows=1 and type='phongngu' order by number,id desc");
?>
<div class="container" style="display: grid; justify-items: center">
<!--<div class="gioithieu">-->
	<div class="noidung_gt">
        <div class="title_about"><h2><?=$gioithieu['name_'.$lang]?></h2></div>
        <div class="content_about"><?=$gioithieu['content_'.$lang]?></div>
        <div class="xemthem_gt" style="width: 100%;display: grid;justify-items: center;padding-bottom: 30px"><a href="gioi-thieu.html"><?=_xemchitiet?></a></div>
    </div>
<!--</div>-->
<!--<div class="timkiem_about">-->
<!--	<form class="" action="du-an.html" method="get">-->
<!--	<h3 class="blue-text-gradient cta line-bottom">Đi tìm tổ ấm cho gia đình bạn</h3>-->
<!--	<div class="gutter-30">-->
<!--		<div class="col-sm-6 group-input">-->
<!--			<label for="input-key">Từ khóa</label>-->
<!--			<input type="text" name="q" id="input-key" placeholder="Nhập từ khóa">-->
<!--		</div>-->
<!--		<div class="col-sm-6 group-input">-->
<!--			<label for="input-location">Khu vực</label>-->
<!--			<select name="location" class="select2" id="input-location">-->
<!--				<option value="all">Tất cả</option>-->
<!--				--><?php //for($i=0;$i<count($khuvuc);$i++){?>
<!--					<option value="--><?//=$khuvuc[$i]['id']?><!--">--><?//=$khuvuc[$i]['name']?><!--</option>-->
<!--				--><?php //} ?>
<!--			</select>-->
<!--		</div>-->
<!--		<div class="col-sm-6 group-input">-->
<!--			<label for="input-type">Loại dự án</label>-->
<!--			<select name="type" class="select2" id="input-type">-->
<!--				<option value="all">Tất cả</option>-->
<!--				--><?php //for($i=0;$i<count($loaiduan);$i++){?>
<!--							<option value="--><?//=$loaiduan[$i]['id']?><!--">--><?//=$loaiduan[$i]['name_'.$lang]?><!--</option>-->
<!--						--><?php //} ?>
<!--			</select>-->
<!--		</div>-->
<!--		<div class="col-sm-6 group-input">-->
<!--			<label for="input-price">Giá</label>-->
<!--			<select name="price" class="select2" id="input-price">-->
<!--				<option value="all">Tất cả</option>-->
<!--				--><?php //for($i=0;$i<count($giaduan);$i++){?>
<!--							<option value="--><?//=$giaduan[$i]['id']?><!--">--><?//=$giaduan[$i]['name_'.$lang]?><!--</option>-->
<!--						--><?php //} ?>
<!--			</select>-->
<!--		</div>-->
<!--		<div class="col-sm-6 group-input">-->
<!--			<label for="input-badroom">Số phòng ngủ</label>-->
<!--			<select name="badroom" class="select2" id="input-badroom">-->
<!--				<option value="all">Tất cả</option>-->
<!--				--><?php //for($i=0;$i<count($phongngu);$i++){?>
<!--							<option value="--><?//=$phongngu[$i]['id']?><!--">--><?//=$phongngu[$i]['name_'.$lang]?><!--</option>-->
<!--						--><?php //} ?>
<!--			</select>-->
<!--		</div>-->
<!--		<div class="col-sm-6 group-input">-->
<!--			<button type="submit" class="btn-yellow submit">TÌM KIẾM NGAY</button>-->
<!--		</div>-->
<!--	</div>-->
<!--</form>-->
<!--</div>-->
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$("select").select2();
	});
</script>