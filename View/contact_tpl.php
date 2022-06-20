<!-- <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDDIouQVxBaQ59hnY6aaFC_jOhsrjcW3WA&sensor=false"></script> -->
<script>
	$(document).ready(function() { 
	 // refresh captcha
	 $('img#captcha-refresh').click(function() {  
			change_captcha();
	 });
	 function change_captcha(){document.getElementById('captcha').src="Library/reCaptcha/get_captcha.php?rnd=" + Math.random();}
	});
</script>


<script type="text/javascript">
	jQuery(document).ready(function($) {
		var locationCompany = {lat: 21.022767499980972, lng: 105.80924135855363};
		if ($("#mapCompany").length > 0){
			var map = new google.maps.Map(document.getElementById('mapCompany'), {
				zoom: 15,
				center: locationCompany
			});
			var marker = new google.maps.Marker({
				map: map,
				draggable: true,
				position: new google.maps.LatLng(locationCompany.lat, locationCompany.lng),
				visible: true,
				icon: "Assets/images/icon/map-marker.png"
			});
		}
	});
</script>
<div class="container">		 
<div id="info">
<div id="sanpham">
      <div class="thanh_title"><h2><?=_contact?></h2> </div>     
   <div class="khung_contact">

   <div class="khung_trai">
		<div class="form_contact">
			<p><?=$row_detail['content_'.$lang]?></p>
		</div>
		<div id="mapCompany" style="height: 320px;"></div>
		<div class="clear"></div>
		
    </div>

    <div class="khung_phai">
      	<div class="form_lh">
	    <form method="post" action="" name="frm_contact">
			<div class="form-row">

			<div class="form-group col-md-6 col-sm-12">
			<label for="hoten"><?=_hoten?></label>
			<input type="text" class="form-control validate[required]" name="hoten" id="hoten" placeholder="">
			</div>

			<div class="form-group col-md-6 col-sm-12">
			<label for="diachi"><?=_diachi?></label>
			<input type="text" class="form-control validate[required]" name="diachi" id="diachi" placeholder="">
			</div>

			<div class="form-group col-md-6 col-sm-12">
			  <label for="email">Email</label>
			  <input type="text" class="form-control validate[required,custom[email]]" name="email" id="email" placeholder="">
			</div>

			<div class="form-group col-md-6 col-sm-12">
			  <label for="dienthoai"><?=_dienthoai?></label>
			  <input type="text" class="form-control validate[required,minSize[10],maxSize[12],custom[integer]]" name="dienthoai" id="dienthoai" placeholder="">
			</div>

			<div class="form-group col-md-12 col-sm-12">
			  <label for="tieude"><?=_tieude?></label>
			  <input type="text" class="form-control validate[required]" name="tieude" id="tieude" placeholder="">
			</div>

			<div class="form-group col-md-12 col-sm-12">
			  <label for="noidung"><?=_noidung?></label>
			  <textarea name="noidung" class="form-control validate[required]" id="noidung" placeholder=""></textarea>
			</div>
			<div class="form-group col-md-12 col-sm-12">
				<div id="captcha-wrap">
					<div class="captcha-box">
						<img src="Library/reCaptcha/get_captcha.php" alt="" id="captcha" />
					</div>
					<div class="text-box">
						<label style="padding-left:0px;">Type the two words:</label>
						<input name="captcha-code" type="text" id="captcha-code">
					</div>
					<div class="captcha-action">
						<img src="Library/reCaptcha/refresh.jpg"  alt="" id="captcha-refresh" />
					</div>
				</div>
			</div>
		
			<div class="form-group col-md-12 col-sm-12">
			<button type="submit" class="btn btn-primary"><?=_gui?></button>
			</div>
			</div>
			</form>
		</div>
      </div>
         
</div></div></div></div>
