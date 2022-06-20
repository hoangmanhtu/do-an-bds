<meta charset="UTF-8">
<meta name="google-site-verification" content="NbJ-i4LqWwykZfSrebSAgqUZ6om4RLxTL62BnElwluE" />
<link href='//maxcdn.bootstrapcdn.com' rel='dns-prefetch'/>
<link href='//fonts.googleapis.com' rel='dns-prefetch'/>
<link href='//maps.googleapis.com' rel='dns-prefetch'/>
<link href='//maps.gstatic.com/' rel='dns-prefetch'/>
<link href='//www.facebook.com' rel='dns-prefetch'/>
<link href='//plus.google.com' rel='dns-prefetch'/>
<link href='//csi.gstatic.com' rel='dns-prefetch'/>
<link href='//www.youtube.com' rel='dns-prefetch'/>
<link href='//feedburner.google.com' rel='dns-prefetch'/>
<link href='//scontent.fsgn3-1.fna.fbcdn.net' rel='dns-prefetch'/>
<link href='//googleads.g.doubleclick.net' rel='dns-prefetch'/>
<link href='//static.doubleclick.net' rel='dns-prefetch'/>
<link href='//apis.google.com' rel='dns-prefetch'/>
<link href='//maps.google.com' rel='dns-prefetch'/>
<link href='//connect.facebook.net' rel='dns-prefetch'/>
<link href="//www.google-analytics.com" rel="dns-prefetch" />
<link href="//www.googletagmanager.com/" rel="dns-prefetch" />
<base href="<?=$config['config_base']?>">
<?php 
	$favicon  =  $db->row("select photo_vi from #_photo where type='favicon' ");
?>
<link id="favicon" rel="shortcut icon" href="<?=$config['config_base'].'/'._upload_hinhanh_l.$favicon['photo_vi']?>" type="image/x-icon" />
<title><?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?></title>
<meta name="description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
<meta name="keywords" content="<?php if($keywords_bar!='') echo $keywords_bar; else echo $row_setting['keywords']; ?>">
<?php if($config['setup']['responsive']=='true'){?>
<meta name="viewport" content="width=device-width, initial-scale=1" />
<?php } else { ?>
<meta name="viewport" content="width=1200" />
<?php } ?>
<meta name="robots" content="<?php if($meta_index!=''){ echo $meta_index;} else { echo "noodp,index,follow";} ?>" />
<meta http-equiv="audience" content="General" />
<meta name="resource-type" content="Document" />
<meta name="distribution" content="Global" />
<meta name='revisit-after' content='1 days' />
<meta name="ICBM" content="<?=$row_setting['toado']?>">
<meta name="geo.position" content="<?=$row_setting['toado']?>">
<meta name="geo.placename" content="<?=$row_setting['address_'.$lang]?>">
<meta name="author" content="<?=$row_setting['name_'.$lang]?>">
<link rel="publisher" href="<?=$row_setting['googleplus']?>" />
<link rel="author" href="<?=$row_setting['googleplus']?>" />
<link rel="canonical" href="<?=$func->canonical($template)?>" />
<?php if($share_facebook){?>
	<?=$share_facebook?>
<?php } else { ?>
	<meta property="og:site_name" content="<?=$row_setting['website']?>" />
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="vi_VN" />
	<meta property="og:title" content="<?=$row_setting['title']?>" />
	<meta property="og:description" content="<?=$row_setting['description']?>" />
	<meta property="og:url" content="https://phuongthienland.com" />
<?php } ?>
<meta name="twitter:card" value="summary">
<meta name="twitter:url" content="<?=$url_now?>">
<meta name="twitter:title" content="<?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?>">
<meta name="twitter:description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
<meta name="twitter:image" content="https://<?=$config['config_url']?>/<?=_upload_hinhanh_l.$favicon['thumb_'.$lang]?>"/>
<meta name="twitter:site" content="@">
<meta name="twitter:creator" content="@">
<meta name="dc.language" CONTENT="vietnamese">
<meta name="dc.source" CONTENT="https://<?=$config['config_url']?>/">
<meta name="dc.title" CONTENT="<?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?>">
<meta name="dc.keywords" CONTENT="<?php if($keywords_bar!='') echo $keywords_bar; else echo $row_setting['keywords']; ?>">
<meta name="dc.description" CONTENT="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
<meta name="dc.publisher" content="<?=$row_setting['googleplus']?>" />
<?=$row_setting['codehead']?> 
<link type="text/css" rel="stylesheet" href="admin/Assets/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css" />
<link type="text/css" rel="stylesheet" href="Assets/js/bootstrap-3.2.0/css/bootstrap.css" />
<link type="text/css" rel="stylesheet" href="Assets/js/bootstrap-3.2.0/css/bootstrap-theme.css" />
<link type="text/css" rel="stylesheet" href="Assets/js/owl_carousel/assets/owl.carousel.css" />
<link type="text/css" rel="stylesheet" href="Assets/js/menu_bar/css/style.css" />
<link type="text/css" rel="stylesheet" href="Assets/css/awesome/css/fontawesome-all.min.css" />
<link type="text/css" rel="stylesheet" href="Assets/css/elements.css" />
<link type="text/css" rel="stylesheet" href="Assets/css/style.css?v=2" />
<link type="text/css" rel="stylesheet" href="Assets/css/jquery.simplyscroll.css">
<link type="text/css" rel="stylesheet" href="Assets/js/datetimepicker/jquery.datetimepicker.css"/>
<link rel="stylesheet" href="Assets/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="Assets/css/project.css" />
<link rel="stylesheet" href="Assets/slider/css/style.css" />
<link rel="stylesheet" href="Assets/slider/css/simpleslider.css" />
<link rel='stylesheet' id='select2-css'  href='Assets/css/select2.min.css' type='text/css' media='all' />
<?php if($config['setup']['responsive']=='true'){?>
<link type="text/css" rel="stylesheet" href="Assets/css/media.css" />
<link type="text/css" rel="stylesheet" href="Assets/js/mmmenu/dist/css/jquery.mmenu.all.css" />
<?php } ?>

<script src="Assets/js/jquery-1.9.1.js"></script>
<style type="text/css"><?=$plugin_css?></style>
<?=$json->SearchAction('https://'.$config['config_url'])?>
<?=$json->Organization()?>
<?=$json->Person()?>
<?=$json->Library()?>
<?=$json_code?>

<?php 
	if($row_detail["code_more"])
		echo stripslashes($row_detail["code_more"]);
?>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '205155500725004');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=205155500725004&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->