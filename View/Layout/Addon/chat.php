<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>
<link rel="stylesheet" id="messenger-css" href="Assets/js/facebook/messenger.css" type="text/css" media="all">
<script src="https://cdn.rawgit.com/admsev/jquery-play-sound/master/jquery.playSound.js"></script>
<script>

	jQuery(document).ready(function(){
		var clickedOnce = false;
		$(".facebook-messenger-avatar").click(function(){
			if(!clickedOnce) {
				clickedOnce = true;
				$.playSound("http://<?=$config_url?>/js/facebook/facebook_messenger");
			}
		})
	});
	
</script> 
<!-- JS BLOCK-->
<div class="drag-wrapper">
   <div data-drag="data-drag" class="thing" style="transform: translate(1190px, 20px);">
      <a class="drag_messenger_button toby_tooltip" title="Chat Facebook" data-toggle="tooltip">
         <div class="circle facebook-messenger-avatar">
            <img class="facebook-messenger-avatar" src="Assets/images/chat.png">
         </div>
      </a>
      <div class="content" style="display: none; max-height: 563px;">
         <div class="inside" id="fbmessenger_content">
            <div class="arrow"></div>
            <div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-tabs="messages" data-width="310" data-height="270" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?=$row_setting['facebook']?>" class="fb-xfbml-parse-ignore"><a href="<?=$row_setting['facebook']?>">Facebook</a></blockquote></div>
         </div>
      </div>
   </div>
   <div class="magnet-zone">
      <div class="magnet"></div>
   </div>
</div>
<div id="messenger_bg"> </div>

<script type="text/javascript" src="Assets/js/facebook/popup.js"></script>
<script type="text/javascript" src="Assets/js/facebook/jquery.event.move.js"></script>
<script type="text/javascript" src="Assets/js/facebook/rebound.min.js"></script>
<script type="text/javascript" src="Assets/js/facebook/index.js"></script>