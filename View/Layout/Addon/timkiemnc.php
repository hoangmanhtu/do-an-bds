<?php
	$khuvuc = $db->query("select * from #_place_city where shows=1 order by number,id desc");
    $quanhuyen = $db->query("select * from #_place_dist where shows=1 and id_city='2' order by name desc");
	$loaiduan = $db->query("select * from #_cate_list where shows=1 and type='project' order by number,id desc");
	$giaduan = $db->query("select * from #_title where shows=1 and type='khoangia' order by number,id desc");
	$phongngu = $db->query("select * from #_title where shows=1 and type='phongngu' order by number,id desc");
//    var_dump($quanhuyen);
//    die();
?>
<section class="map_project menu-padding">
	<div id="map_project" class="menu-padding"></div>
	<form class="filter-map" method="get" action="du-an.html">
		<div class="container">
			<div class="gutter-10">
				<div class="col-lg-2 col-sm-4 input">
					<label for="input-text">Từ khóa</label>
					<input type="text" name="q" id="input-key" placeholder="Nhập từ khóa">
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$("#input-text").val("");
						});
					</script>
				</div>
				<div class="col-lg-2 col-sm-4 input">
					<label for="input-location">Khu vực</label>
					<select class="select2" name="location" id="input-location">
							<option value="2">Hà Nội</option>
					</select>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$("#input-location").val("all");
							$("#input-location").select2();
						});
					</script>
				</div>
                <div class="col-lg-2 col-sm-4 input">
                    <label for="input-location-dist">Quuận/Huyện</label>
                    <select class="select2" name="location" id="input-location-dist">
                        <option value="">Tất cả</option>
                        <?php for($i=0;$i<count($quanhuyen);$i++){?>
                            <option value="<?=$quanhuyen[$i]['id']?>"><?=$quanhuyen[$i]['name']?></option>
                        <?php } ?>
                    </select>
                    <script type="text/javascript">
                        jQuery(document).ready(function($) {
                            $("#input-location-dist").val("all");
                            $("#input-location-dist").select2();
                        });
                    </script>
                </div>
				<div class="col-lg-2 col-sm-4 input">
					<label for="input-type">Loại dự án</label>
					<select class="select2" name="type" id="input-type">
						<option value="">Tất cả</option>
						<?php for($i=0;$i<count($loaiduan);$i++){?>
							<option value="<?=$loaiduan[$i]['id']?>"><?=$loaiduan[$i]['name_'.$lang]?></option>
						<?php } ?>
					</select>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$("#input-type").val("all");
							$("#input-type").select2();
						});
					</script>
				</div>
				<div class="col-lg-2 col-sm-4 input">
					<label for="input-price">Giá</label>
					<select class="select2" name="price" id="input-price">
						<option value="">Tất cả</option>
						<?php for($i=0;$i<count($giaduan);$i++){?>
							<option value="<?=$giaduan[$i]['id']?>"><?=$giaduan[$i]['name_'.$lang]?></option>
						<?php } ?>
					</select>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$("#input-price").val("all");
							$("#input-price").select2();
						});
					</script>
				</div>
				<div class="col-lg-2 col-sm-4 input">
					<label for="input-badroom">Số phòng ngủ</label>
					<select class="select2" name="badroom" id="input-badroom">
						<option value="">Tất cả</option>
						<?php for($i=0;$i<count($phongngu);$i++){?>
							<option value="<?=$phongngu[$i]['id']?>"><?=$phongngu[$i]['name_'.$lang]?></option>
						<?php } ?>
					</select>
					<script type="text/javascript">
						jQuery(document).ready(function($) {
							$("#input-badroom").val("all");
							$("#input-badroom").select2();
						});
					</script>
				</div>
				<div class="col-lg-2 col-sm-4 input text-right">
					<label for="input-location">&nbsp;</label>
					<button id="timnhanh" class="btn-yellow submit">TÌM NHANH</button>
				</div>
			</div>
		</div>
	</form>
</section>
