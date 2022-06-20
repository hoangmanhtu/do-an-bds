<link rel='stylesheet' id='bxslider-css'  href='Assets/js/bxslider/jquery.bxslider.css' type='text/css' media='all' />
<style type="text/css" media="screen">
	section.slider { position: relative; overflow: hidden; font-family: 'UTMAvo'; }
	section.slider ul.bxslider, section.slider .bx-wrapper, section.slider .bx-viewport { position: absolute !important; z-index: 10; left: 0px; right: 0px; bottom: 0px; top: 0px; }
	section.slider .bx-wrapper { border: none; margin-bottom: 0px; }
	section.slider ul.bxslider > li { height: 100%; }
	section.slider ul.bxslider > li > .bg-cover { width: 100%; height: 100%; opacity: .6; position: relative; }
	section.slider ul.bxslider > li:before { position: absolute; content: ""; left: 0px; right: 0px; top: 0px; bottom: 0px; background-color: #000; background: radial-gradient(#333,#000) }
	section.slider .caption { display: table; width: 100%; height: 100vh; position: relative; z-index: 11; color: #fff; }
	section.slider .caption .body { background-color: rgba(0,0,0,0.3); padding-top: 20px; }
	section.slider .caption .body .title { transition: all cubic-bezier(0.6, 0.02, 1, 0.63) .5s; transition-delay: 0s; opacity: 0; transform: translateX(-50vw);  font-size: 28px; }
	section.slider .caption .body .description { transition: all cubic-bezier(0.6, 0.02, 1, 0.63) .5s; transition-delay: 0.1s; opacity: 0; transform: translateX(1000px); }
	section.slider .caption .body .viewmore { transition: all cubic-bezier(0.6, 0.02, 1, 0.63) .5s; transition-delay: 0.2s; opacity: 0; transform: translateX(-1000px); }
	section.slider .caption .body.animation .title { opacity: 1; transform: translateX(0); transition: all cubic-bezier(0, 0.63, 0.58, 1) .5s; }
	section.slider .caption .body.animation .description { opacity: 1; transform: translateX(0); transition: all cubic-bezier(0, 0.63, 0.58, 1) .5s; }
	section.slider .caption .body.animation .viewmore { opacity: 1; transform: translateX(0); transition: all cubic-bezier(0, 0.63, 0.58, 1) .5s; }
	section.slider .caption > .table-cell { display: table-cell; vertical-align: middle; vertical-align: middle; padding-top: 150px; padding-bottom: 120px; height: 100%; }
	section.slider .control a .icon:before { color: #fff; font-size: 60px; line-height: 30px; }
	section.slider .control a, section.slider .control a .icon { line-height: 0; display: inline-block; }
	section.slider .caption .title { font-size: 39px; text-transform: uppercase; margin-bottom: 25px; margin-top: 0px; font-weight: bold; }
	section.slider .caption .description { font-size: 18px; margin-bottom: 25px; }
	section.slider .caption .viewmore { text-transform: uppercase; margin-bottom: 20px; }
	section.slider .caption .prev { margin-bottom: 10px; }
	section.slider .caption .prev i{ color:#fff; font-size: 20px; }
	section.slider .caption .next i{ color:#fff; font-size: 20px; }
	section.slider .caption .next i:hover,section.slider .caption .prev i:hover{ color: #e7b737 }
	section.slider .scroll-next { padding-bottom: 20px; bottom: 0px; position: absolute; z-index: 11; left: 50%; transform: translateX(-50%); -webkit-transform: translateX(-50%); transition: all ease .3s; -webkit-transition: all ease .3s; transition-delay: .2s; }
	section.slider .scroll-next img { max-width: 100%; max-height: 100%; }
	section.slider .scroll-next .icon { display: block; text-align: center; position: absolute; left: 0px; right: 0px; color: #fff; font-size: 18px; transition: all ease .3s; -webkit-transition: all ease .3s; opacity: 0; }
	section.slider .scroll-next .icon:nth-of-type(1) { top: -30px; transition-delay: 0s; }
	section.slider .scroll-next .icon:nth-of-type(2) { top: -23px; transition-delay: .1s; }
	section.slider .scroll-next:hover { padding-top: 20px; padding-bottom: 0px;  transition-delay: 0s; }
	section.slider .scroll-next:hover .icon:nth-of-type(1) { top: -10px; opacity: 1; transition-delay: .2s; }
	section.slider .scroll-next:hover .icon:nth-of-type(2) { top: -3px; opacity: 1; transition-delay: .1s; }
	.btn-yellow { line-height: 1.42857143; border: none; position: relative; z-index: 1; overflow: hidden; display: inline-block; font-size: 18px; color: #3e0404; padding: 8px 60px 12px 60px; border-radius: 5px; cursor: pointer; background-color: transparent; }
	.btn-yellow:before { background: linear-gradient(0deg, #d6a221, #ffefa5); opacity: 1; z-index: -1; position: absolute; left: 0px; right: 0px; bottom: 0px; top: 0px; content: ""; transition: all ease .4s; -webkit-transition: all ease .4s; }
	.btn-yellow:after { background: linear-gradient(0deg, #031b52, #4295cb); opacity: 0; z-index: -1; position: absolute; left: 0px; right: 0px; bottom: 0px; top: 0px; content: ""; transition: all ease .4s; -webkit-transition: all ease .4s; }
	.btn-yellow:hover { color: #fff; }
	.btn-yellow:hover:before { opacity: 0; }
	.btn-yellow:hover:after { opacity: 1; }

	.yellow-text-gradient { color: #e7b737; transition: all ease .4s; -webkit-transition: all ease .4s; line-height: 1.4; }
	.hover-text.yellow-text-gradient:hover, .hover-text:hover .yellow-text-gradient { color: #031b52; }
	.hover-text-white.yellow-text-gradient:hover, .hover-text-white:hover .yellow-text-gradient { color: #fff; }
	section.slider .scroll-next { padding-bottom: 20px; bottom: 25px; position: absolute; z-index: 11; left: 50%; transform: translateX(-50%); -webkit-transform: translateX(-50%); transition: all ease .3s; -webkit-transition: all ease .3s; transition-delay: .2s; }
	section.slider .scroll-next img { max-width: 100%; max-height: 100%; }
	section.slider .scroll-next .icon { display: block; text-align: center; position: absolute; left: 0px; right: 0px; color: #fff; font-size: 18px; transition: all ease .3s; -webkit-transition: all ease .3s; opacity: 0; }
	section.slider .scroll-next .icon:nth-of-type(1) { top: -30px; transition-delay: 0s; }
	section.slider .scroll-next .icon:nth-of-type(2) { top: -23px; transition-delay: .1s; }
	section.slider .scroll-next:hover { padding-top: 20px; padding-bottom: 0px;  transition-delay: 0s; }
	section.slider .scroll-next:hover .icon:nth-of-type(1) { top: -10px; opacity: 1; transition-delay: .2s; }
	section.slider .scroll-next:hover .icon:nth-of-type(2) { top: -3px; opacity: 1; transition-delay: .1s; }
	@supports ((background-clip: text) or (-webkit-background-clip: text)) and ((text-fill-color: transparent) or (-webkit-text-fill-color: transparent)){
	    .yellow-text-gradient { background: linear-gradient(0deg, #d6a221 0%, #ffefa5 100%); -webkit-background-clip: text; background-clip: text; text-fill-color: transparent; -webkit-text-fill-color: transparent; }
		.hover-text.yellow-text-gradient:hover, .hover-text:hover .yellow-text-gradient { background: linear-gradient(0deg, #031b52 40%, #4295cb 60%); }
	}

	.blue-text-gradient { color: #031b52; transition: all ease .4s; -webkit-transition: all ease .4s; line-height: 1.4; }
	.hover-text.blue-text-gradient:hover, .hover-text:hover .blue-text-gradient { color: #e7b737; }
	.hover-text-white.blue-text-gradient:hover, .hover-text-white:hover .blue-text-gradient { color: #fff; }
	@supports ((background-clip: text) or (-webkit-background-clip: text)) and ((text-fill-color: transparent) or (-webkit-text-fill-color: transparent)){
	    .blue-text-gradient { background: linear-gradient(0deg, #031b52 0%, #4295cb 100%); -webkit-background-clip: text; background-clip: text; text-fill-color: transparent; -webkit-text-fill-color: transparent; }
		.hover-text.blue-text-gradient:hover, .hover-text:hover .blue-text-gradient { background: linear-gradient(0deg, #b4891f 40%, #f3db86 60%); }
	}

</style>
<?php 
    $db->bindMore(array("type"=>"slider"));
    $slide_home  =  $db->query("select * from #_photo where shows=1 and type=:type order by number,id desc");
?>
<section class="slider">
	<ul class="bxslider">
	<?php for($i=0;$i<count($slide_home);$i++){?>
		<li data-title="<?=$slide_home[$i]['name_'.$lang]?>" data-description="<?=$slide_home[$i]['description_'.$lang]?>" data-link="<?=$slide_home[$i]['link']?>" >
		<div class="bg-cover" style="background-image: url(<?=_upload_hinhanh_l.$slide_home[$i]['photo_'.$lang]?>);" ></div></li>
	<?php } ?>
	</ul>
	<div class="caption">
		<div class="table-cell">
			<div class="container">
				<div class="row">
					<div class="col-lg-7 col-md-9 col-sm-11 col-xs-12 centered text-center body">
						<h1 class="yellow-text-gradient title">“Go Blue” độc đáo hút nhà đầu tư</h1>
						<div class="description">
							<p>GO BLUE Saigon tọa lạc ở ba mặt tiền các đường Ký Con, Đặng Thị Nhu và Lê Thị Hồng Gấm (Q.1,TP.HCM) có những lợi thế lớn nhờ vị trí đắc địa và thiết kế độc đáo</p>
						</div>
						<a class="btn-yellow viewmore" href="#">Chi tiết</a>
					</div>
					<div class="control text-center">
						<div class="prev bx-next"></div>
						<div class="next bx-prev"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a href="#" class="scroll-next">
		<i class="icon fas fa-angle-down"></i>
		<i class="icon fas fa-angle-down"></i>
		<img src="Assets/js/bxslider/mouse-scroll.png" alt="icon">
	</a>
</section>
<script type='text/javascript' src='Assets/js/bxslider/jquery.bxslider.js'></script>
<script type="text/javascript">
$(document).ready(function() {
	var eSlider = $("ul.bxslider");
	var eItems = eSlider.children();
	var eCaption = $('section.slider .caption');
	eSlider.bxSlider({
			mode: 'fade',
			pager: false,
			controls: true,
			speed: 1000,
			auto: true,
		  autoControls: true,
		  stopAutoOnClick: true,
			prevText: "<i class='fas fa-arrow-left'></i>",
			prevSelector: 'section.slider .control .prev',
			nextText: "<i class='fas fa-arrow-right'></i>",
			nextSelector: 'section.slider .control .next',
			onSliderLoad: function (currentIndex){
				eCurrentIndex = $(eItems[currentIndex]);
				eCaption.find('.title').html(eCurrentIndex.data("title"));
				eCaption.find('.description p').html(eCurrentIndex.data("description"));
				eCaption.find('.viewmore').attr({'href':eCurrentIndex.data("link")});
				eCaption.find('.body').addClass('animation');
			},
			onSlideBefore: function($slideElement, oldIndex, newIndex){
				eCaption.find('.body').removeClass('animation');
			},
			onSlideAfter: function($slideElement, oldIndex, newIndex){
				eCurrentIndex = $(eItems[newIndex]);
				eCaption.find('.title').html(eCurrentIndex.data("title"));
				eCaption.find('.description p').html(eCurrentIndex.data("description"));
				eCaption.find('.viewmore').attr({'href':eCurrentIndex.data("link")});
				eCaption.find('.body').addClass('animation');
			}
		});
	$('.scroll-next').click(function(event) {
		/* Act on the event */
		$('html,body').animate({
        	scrollTop: $("#main").offset().top},
        'slow');
		return false;
	});
});
</script>