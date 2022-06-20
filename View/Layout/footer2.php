<section class="contact-footer">
    <div class="position-relative overflow-hidden">
        <img class="img" src="<?=_upload_hinhanh_l.$banner_top['thumb_vi']?>" alt="logo" />
        <div>
            <div class="inline-block company-info">
                
        </div>
        <ul class="inline-block contact-info">
            <li><i class="fa fa-map-marker fa-fw icon" aria-hidden="true"></i> <?=$row_setting['address_'.$lang]?></li>
            <li><i class="fa fa-phone fa-fw icon" aria-hidden="true"></i> <?=$row_setting['phone']?></li>
            <li><i class="fa fa-envelope fa-fw icon" aria-hidden="true"></i> <?=$row_setting['email']?></li>
        </ul>
        <ul class="list-social">
            <li><a href="<?=$row_setting['facebook']?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="<?=$row_setting['youtube']?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
            <li><a href="<?=$row_setting['googleplus']?>" target="_blank"><i class="fab fa-google"></i></a></li>
            <li><a href="<?=$row_setting['twitter']?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
        </ul>
    </div>
</section>
<footer class="footer">
    <p>© 2018 <?=$row_setting['shortname_'.$lang]?> . All Rights Reserved. </p>
   

</footer>

<div class="call-now-button">
    <div><p class="call-text"> <?=$row_setting["hotline"]?> </p>
        <a href="tel:<?=$row_setting["hotline"]?>" title="Call Now">
            <div class="quick-alo-ph-circle"></div>
            <div class="quick-alo-ph-circle-fill"></div>
            <div class="quick-alo-phone-img-circle"></div>
        </a>
    </div>
</div>

<a href="https://zalo.me/<?=str_replace(" ", "", $row_setting["hotline"])?>" target="_blank" title="Liên Hệ Qua Zalo">
    <img id="call-zalo" src="images/zaloicon.png" alt="gọi zalo">
    </a>
<style type="text/css">

#call-zalo{
    width:50px;
    position:fixed;
    top: 85%;
    right:25px;
    z-index:1000;
}

</style>