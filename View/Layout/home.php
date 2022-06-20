<!DOCTYPE html>
<html lang="<?=$lang?>">
<head>
	<?php
	$db->bindMore(array("type"=>"logo"));
    $banner_top  =  $db->row("select thumb_vi from #_photo where type=:type ");

	require_once LAYOUT."head.php"; ?>
</head>
<body >
<?=$row_setting['codebody']?>
<div id="container">
  <header id="header" <?php if($template!='index'){ echo "class='pagein'";} ?> itemscope itemtype="http://schema.org/WPHeader" >
      <?php include LAYOUT."header.php"; ?>
  </header>
  <?php  if($template=='index'){?>
	<section id="slide_show"><?php include LAYOUT."bxslider.php";?></section>
	<div id="gioithieu" style="text-align: center;margin-top: 30px"><?=$gioithieu->html()?></div>
  <?php } ?>
  <main id="main">
      <section id="content">
          <?php  include VIEW.$template."_tpl.php";?>
      </section>
      <div class="clear"></div>
  </main>
  <footer id="footer" itemscope itemtype="http://schema.org/WPFooter">
	<?php include LAYOUT."footer2.php"; ?>
  </footer>
</div>
<script src="Assets/js/bootstrap-3.2.0/js/bootstrap.js"></script>
<script src="Assets/js/owl_carousel/owl.carousel.min.js"></script>
<script src="Assets/js/menu_bar/js/enscroll-0.5.2.min.js"></script>
<script src="Assets/js/menu_bar/js/script.js"></script>
<script src="Assets/js/jquery.validationEngine-<?=$lang?>.js"></script>
<script src="Assets/js/jquery.validationEngine.js"></script>
<script src="Assets/js/star-rating.js" type="text/javascript"></script>
<script src="Assets/slider/js/jquery.easing.min.js"></script>
<script src="Assets/slider/js/jquery.simpleslider.min.js"></script>
<script src="Assets/slider/js/jquery.touchwipe.min.js"></script>
<script src="Assets/js/plugins.js"></script>
<script src="Assets/js/main.js"></script>
<script type='text/javascript' src='Assets/js/select2.min.js?ver=1.0'></script>
<script>
$(document).ready(function(){
	$('#banner').simpleSlider({height: 500});
});
</script>
<script type="text/javascript">
/*oncopy="return copy_website(this);" oncut="return copy_website(this);"*/
	$(document).ready(function() {
		$("form").validationEngine('attach',{
			promptPosition : "topLeft",
			showOneMessage: true,
			maxErrorsPerField:1
		});
		$('#myModal').on('shown.bs.modal', function () {
		  $('#myInput').trigger('focus')
		})
		var wi = $(window).innerHeight();
		var ca = $('#container').height();
		if(ca < wi){
			$('#footer').addClass('active');
		}
		$('.timkiem_about form').submit(function(event) {
			/* Act on the event */
			timkiem();
			return false;
		});
		$('#timnhanh').click(function(event) {
			/* Act on the event */
			timkiem();
			return false;
		});




	});
	function timkiem(){
		$url = 'du-an.html';
		var keywords = $('#input-key').val();
		var khuvuc = $('#input-location').val();
		var loai = $('#input-type').val();
		var gia = $('#input-price').val();
		var phongngu = $('#input-badroom').val();
		var quanhuyen = $('#input-location-dist').val();
		if(keywords){ $url = $url+'&keywords='+keywords; }
		if(khuvuc){ $url = $url+'&khuvuc='+khuvuc; }
		if(quanhuyen){ $url = $url+'&quanhuyen='+quanhuyen; }
		if(loai){ $url = $url+'&loai='+loai; }
		if(gia){ $url = $url+'&gia='+gia; }
		if(phongngu){ $url = $url+'&phongngu='+phongngu; }
		window.location.href=$url;
	}
function lienhe_form(frm){
			/* Act on the event */
			var name = $(frm).find('input[name=name]').val();
			var email = $(frm).find('input[name=email]').val();
			var phone = $(frm).find('input[name=phone]').val();
			var id = $(frm).find('input[name=id]').val();
			var duan = $(frm).find('input[name=duan]').val();
			if(!name || !email || !phone){
		        alert('Bạn cần nhập đủ trường yêu cầu');
		    } else {
		        $.ajax ({
		          type: "POST",
		          url: "Ajax/dangky_email.php",
		          data: {email:email,dienthoai:phone,ten:name,id:id,act:'duan',duan:duan},
		          success: function(result) {
		            if(result==0){
		              alert('Gửi mail thành công ! ');
		            } else if(result==2){
		              alert(' ! Gửi mail không thành công . Vui lòng thử lại ');
		            }
		            $(frm).find('input[name=name]').attr('value','');
		            $(frm).find('input[name=email]').attr('value','');
		            $(frm).find('input[name=phone]').attr('value','');
		          }
		        });
		    }
		    return false;
		}

</script>

<ul class="vcard" style="display:none">
   <li class="fn"><?=$row_setting['shortname_'.$lang]?></li>
   <li class="org"><?=$row_setting['name_'.$lang]?></li>
   <li class="adr"><?=$row_setting['address_'.$lang]?></li>
   <li class="tel"><?=$row_setting['phone']?></li>
   <li><img class="photo" src="<?=$config['config_base'].'/'._upload_hinhanh_l.$favicon['photo_vi']?>" alt="<?=$row_setting['name_'.$lang]?>" /></li>
   <li><a class="url" href="<?=$row_setting['website']?>"><?=$row_setting['website']?></a></li>
</ul>
<?=$row_setting['codebottom']?>
<?=$fb->sdk()?>
<?php if($source=='contact' || $source=='project'){?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDmPq7GJGWrVXertDiV_JZcUUpAXp1cb5c"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"> </script>
<script type='text/javascript' src='Assets/js/infobox.js'></script>
<?php } ?>
</body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1872612452832657',
      xfbml      : true,
      version    : 'v3.1'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<script type='text/javascript'>
function copy_website(el){
    alert('Content Copyright!');
    return false;
}
window.addEventListener("keydown", function(event) {
	console.log(event.keyCode);
  if(event.keyCode == 123 || event.keyCode==17){
  	event.preventDefault();
  	return false;
  }
})
var message="NoRightClicking"; function defeatIE() {if (document.all) {(message);return false;}} function defeatNS(e) {if (document.layers||(document.getElementById&&!document.all)) { if (e.which==2||e.which==3) {(message);return false;}}} if (document.layers) {document.captureEvents(Event.MOUSEDOWN);document.onmousedown=defeatNS;} else{document.onmouseup=defeatNS;document.oncontextmenu=defeatIE;} document.oncontextmenu=new Function("return false")

</script>
</html>
