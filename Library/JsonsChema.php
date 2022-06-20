<?php 
namespace Library;

class JsonsChema {

	public function __construct($db,$func)
    {  
    	$this->db = $db;
    	$this->func = $func;
    }

	public function ItemList(){
		$html = '<script type="application/ld+json">
		{
		  "@context":"https://schema.org",
		  "@type":"ItemList",
		  "itemListElement":[
		    {
		      "@type":"ListItem",
		      "position":1,
		      "url":"https://example.com/desserts/apple-pie"
		    },
		    {
		      "@type":"ListItem",
		      "position":2,
		      "url":"https://example.com/desserts/cherry-pie"
		    },
		    {
		      "@type":"ListItem",
		      "position":3,
		      "url":"https://example.com/desserts/blueberry-pie"
		    }
		  ]
		}
		</script>';
		return self::compress($html);
	}

	public function BreadcrumbList($data,$tbl,$com,$type,$title,$cate=0){
		global $config,$db,$lang;
		$k=1;
		$bread_kq .= '{
		   "@type": "ListItem",
		   "position": '.$k.',
		   "item":
		   {
		    "@id": "https://'.$config['config_url'].'",
		    "name": "Home"
		    }
		  },';

		if($com=='du-an'){
			$k++;
			$bread_kq .= '{
			   "@type": "ListItem",
			   "position": '.$k.',
			   "item":
			   {
			    "@id": "https://'.$config['config_url'].'/'.$com.'.html",
			    "name": "'.$title.' ✅ Chủ Đầu Tư"
			    }
			  },';
		}else{
			$k++;
			$bread_kq .= '{
			   "@type": "ListItem",
			   "position": '.$k.',
			   "item":
			   {
			    "@id": "https://'.$config['config_url'].'/'.$com.'.html",
			    "name": "'.$title.'"
			    }
			  },';
		}
		
		/*if($cate>=1){
			$k++;
			$row_detail1 = $db->row("select * from #_cate_list where id='".$data['id_list']."' and type='".$type."' ");
			$bread_kq .= '{
			   "@type": "ListItem",
			   "position": '.$k.',
			   "item":
			   {
			    "@id": "https://'.$config['config_url'].'/'.$com.'/'.$row_detail1['slug'].'",
			    "name": "'.$row_detail1['name_'.$lang].'"
			    }
			},';
		}
		if($cate>=2){
			$k++;

			$row_detail2 = $db->row("select * from #_cate_cat where id='".$data['id_cat']."' and type='".$type."' ");
			$bread_kq .= '{
			   "@type": "ListItem",
			   "position": '.$k.',
			   "item":
			   {
			    "@id": "https://'.$config['config_url'].'/'.$com.'/'.$row_detail1['slug'].'/'.$row_detail2['slug'].'",
			    "name": "'.$row_detail2['name_'.$lang].'"
			    }
			},';
		}*/
		$k++;
		$bread_kq .= '{
		   "@type": "ListItem",
		   "position": '.$k.',
		   "item":
		   {
		    "@id": "https://'.$config['config_url'].'/'.$com.'/'.$data['slug'].'.html",
		    "name": "'.$data['name_vi'].'"
		    }
		  },';

		$html = '<script type="application/ld+json">
		{
		 "@context": "https://schema.org",
		 "@type": "BreadcrumbList",
		 "itemListElement":
		 ['.trim($bread_kq,',').']
		}
		</script>';
		return self::compress($html);
	}


	public function Library(){
		global $config,$favicon,$row_setting;
		$html = '<script type="application/ld+json">{
		"@context": "https://schema.org/",
		  	"@type": "Library",
			"url": "https://phuongthienland.com",
			"name": "'.$row_setting['name_vi'].'",
			"image": "https://'.$config['config_url'].'/'._upload_hinhanh_l.$favicon['photo_vi'].'",
			"priceRange":"FREE",
			"hasMap": "https://www.google.com/maps/place/132+Nguy%E1%BB%85n+Tr%E1%BB%8Dng+Tuy%E1%BB%83n,+Ph%C6%B0%E1%BB%9Dng+8,+Ph%C3%BA+Nhu%E1%BA%ADn,+H%E1%BB%93+Ch%C3%AD+Minh,+Vi%E1%BB%87t+Nam/@10.7975953,106.6748903,17z/data=!3m1!4b1!4m5!3m4!1s0x317528d63b59f135:0xde93707ad39cd597!8m2!3d10.79759!4d106.677079",	
			"email": "mailto:phanthiphuongthien@gmail.com",
		  	"address": {
		    	"@type": "PostalAddress",
		    	"addressLocality": "Phú Nhuận",
		    	"addressRegion": "Ho Chi Minh",
		    	"postalCode":"700000",
		    	"streetAddress": "132 Nguyễn Trọng Tuyễn"
		  	},
		  	"description": "'.$row_setting['description'].'",
		  	"telephone": "+84 '.$row_setting['phone'].'",
		  	"geo": {
		    	"@type": "GeoCoordinates",
		   		"latitude": "10.797569",
		    	"longitude": "106.677036"
		 		}, 			
		  	"sameAs" : [ "'.$row_setting['facebook'].'"]
			}</script>';
		return self::compress($html);
	}

	public function SearchAction($url){
		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Website",
		  "url": "'.$url.'/",
		  "potentialAction": [{
		    "@type": "SearchAction",
		    "target": "'.$url.'/du-an.html&keywords={searchbox_target}",
		    "query-input": "required name=searchbox_target"
		  }]
		}
		</script>';
		return self::compress($html);
	}

	public function Person(){
		global $config,$row_setting,$lang;
		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Person",
		  "name": "'.$row_setting['name_'.$lang].'",
		  "url": "https://'.$config['config_url'].'",
		  "sameAs": [
		    "'.$row_setting['facebook'].'",
		    "'.$row_setting['googleplus'].'"
		  ]
		}
		</script>';
		return self::compress($html);
	}

	public function NewsArticle($data){
		global $config,$lang,$row_setting,$favicon;
		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "NewsArticle",
		  "mainEntityOfPage": {
		    "@type": "WebPage",
		    "@id": "'.$this->func->getCurrentPageURL().'"
		  },
		  "headline": "'.$data['name_'.$lang].'",
		  "image": [
		    "https://'.$config['config_url'].'/'._upload_post_l.$data['photo'].'"
		   ],
		  "datePublished": "'.date('c',strtotime($data['datecreate'])).'",
		  "dateModified": "'.date('c',strtotime($data['dateupdate'])).'",
		  "author": {
		    "@type": "Person",
		    "name": "'.$row_setting['name_'.$lang].'"
		  },
		  "aggregateRating": {
		    "@type": "AggregateRating",
		    "ratingValue": "5.0",
		    "reviewCount": "3"
		  },
		   "publisher": {
		    "@type": "Organization",
		    "name": "'.$row_setting['name_'.$lang].'",
		    "logo": {
		      "@type": "ImageObject",
		      "url": "https://'.$config['config_url'].'/'._upload_hinhanh_l.$favicon['photo_vi'].'"
		    }
		  },
		  "description": "'.$data['description_'.$lang].'"
		}
		</script>';
		return self::compress($html);
	}

	public function VideoObject(){
		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "VideoObject",
		  "name": "Title",
		  "description": "Video description",
		  "thumbnailUrl": "https://www.example.com/thumbnail.jpg",
		  "uploadDate": "2015-02-05T08:00:00+08:00",
		  "duration": "PT1M33S",
		  "publisher": {
		    "@type": "Organization",
		    "name": "Example Publisher",
		    "logo": {
		      "@type": "ImageObject",
		      "url": "https://example.com/logo.jpg",
		      "width": 600,
		      "height": 60
		    }
		  },
		  "contentUrl": "https://www.example.com/video123.flv",
		  "embedUrl": "https://www.example.com/videoplayer.swf?video=123",
		  "interactionCount": "2347"
		}
		</script>';
		return self::compress($html);
	}

	public function JobPosting(){
		$html = '<script type="application/ld+json"> {
		  "@context" : "https://schema.org/",
		  "@type" : "JobPosting",
		  "title" : "Fitter and Turner",
		  "description" : "<p>Widget assembly role for pressing wheel assemblies.</p>
		    <p><strong>Educational Requirements:</strong> Completed level 2 ISTA
		    Machinist Apprenticeship.</p>
		    <p><strong>Required Experience:</strong> At
		    least 3 years in a machinist role.</p>",
		  "identifier": {
		    "@type": "PropertyValue",
		    "name": "MagsRUs Wheel Company",
		    "value": "1234567"
		  },
		  "datePosted" : "2017-01-18",
		  "validThrough" : "2017-03-18T00:00",
		  "employmentType" : "CONTRACTOR",
		  "hiringOrganization" : {
		    "@type" : "Organization",
		    "name" : "MagsRUs Wheel Company",
		    "sameAs" : "https://www.magsruswheelcompany.com",
		    "logo" : "https://www.example.com/images/logo.png"
		  },
		  "jobLocation" : {
		    "@type" : "Place",
		    "address" : {
		      "@type" : "PostalAddress",
		      "streetAddress" : "555 Clancy St",
		      "addressLocality" : "Detroit",
		      "addressRegion" : "MI",
		      "postalCode" : "48201",
		      "addressCountry": "US"
		    }
		  },
		  "baseSalary": {
		    "@type": "MonetaryAmount",
		    "currency": "USD",
		    "value": {
		      "@type": "QuantitativeValue",
		      "value": 40.00,
		      "unitText": "HOUR"
		    }
		  }
		}
		</script>';
		return self::compress($html);
	}

	public function Restaurant(){
		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org",
		  "@type": "Restaurant",
		  "image": [
		    "https://example.com/photos/1x1/photo.jpg",
		    "https://example.com/photos/4x3/photo.jpg",
		    "https://example.com/photos/16x9/photo.jpg"
		   ],
		  "@id": "https://davessteakhouse.example.com",
		  "name": "Dave s Steak House",
		  "address": {
		    "@type": "PostalAddress",
		    "streetAddress": "148 W 51st St",
		    "addressLocality": "New York",
		    "addressRegion": "NY",
		    "postalCode": "10019",
		    "addressCountry": "US"
		  },
		  "geo": {
		    "@type": "GeoCoordinates",
		    "latitude": 40.761293,
		    "longitude": -73.982294
		  },
		  "url": "https://www.example.com/restaurant-locations/manhattan",
		  "telephone": "+12122459600",
		  "openingHoursSpecification": [
		    {
		      "@type": "OpeningHoursSpecification",
		      "dayOfWeek": [
		        "Monday",
		        "Tuesday"
		      ],
		      "opens": "11:30",
		      "closes": "22:00"
		    },
		    {
		      "@type": "OpeningHoursSpecification",
		      "dayOfWeek": [
		        "Wednesday",
		        "Thursday",
		        "Friday"
		      ],
		      "opens": "11:30",
		      "closes": "23:00"
		    },
		    {
		      "@type": "OpeningHoursSpecification",
		      "dayOfWeek": "Saturday",
		      "opens": "16:00",
		      "closes": "23:00"
		    },
		    {
		      "@type": "OpeningHoursSpecification",
		      "dayOfWeek": "Sunday",
		      "opens": "16:00",
		      "closes": "22:00"
		    }
		  ],
		  "menu": "https://www.example.com/menu",
		  "acceptsReservations": "True"
		}
		</script>
		';
		return self::compress($html);
	}

	public function Review($row_detail,$row_star=1,$num_star=5){
		global $lang,$func;
		if(!$num_star){
			$num_star = 5;
		}
		if(!$row_star){
			$row_star = 1;
		}

		$html = '<script type="application/ld+json">
			{
			  "@context": "https://schema.org/",
			  "@type": "Product",
			  "image": "https://phuongthienland.com/upload/product/'.$row_detail['photo'].'",
			  "name": "'.$row_detail['name_'.$lang].'",
			  "review": {
			    "@type": "Review",
			    "reviewRating": {
			      "@type": "Rating",
			      "ratingValue": "'.$num_star.'"
			    },
			    "name": "'.$row_detail['name_'.$lang].'",
			    "author": {
			      "@type": "Person",
			      "name": "0909 750 537"
			    },
			    "datePublished": "'.date('Y-m-d',strtotime($row_detail['datecreate'])).'",
			    "reviewBody": "'.$row_detail['description_vi'].'",
			    "publisher": {
			      "@type": "Organization",
			      "name": "0909 750 537"
			    }
			  }
			}
			</script>';
		return self::compress($html);
	} 

	public function Product($row_detail,$row_star=1,$num_star=5){
		global $lang,$func;
		if(!$num_star){
			$num_star = 5;
		}
		if(!$row_star){
			$row_star = 1;
		}

		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org/",
		  "@type": "Product",
		  "name": "'.$row_detail['name_'.$lang].'",
		  "image": [
		    "https://phuongthienland.com/upload/product/600x600x2/'.$row_detail['photo'].'",
		    "https://phuongthienland.com/upload/product/600x450x2/'.$row_detail['photo'].'",
		    "https://phuongthienland.com/upload/product/600x315x2/'.$row_detail['photo'].'"
		   ],
		  "description": " '.$row_detail['description_vi'].' ",
		  "mpn": "'.$row_detail['code'].'",
		  "brand": {
		    "@type": "Thing",
		    "name": "ACME"
		  },
		  "aggregateRating": {
		    "@type": "AggregateRating",
		    "ratingValue": "'.$num_star.'",
		    "reviewCount": "'.$row_star.'"
		  },
		  "offers": {
		    "@type": "Offer",
		    "priceCurrency": "VND",
		    "price": "'.$row_detail['price'].'",
		    "priceValidUntil": "2020-12-30",
		    "itemCondition": "https://schema.org/UsedCondition",
		    "availability": "https://schema.org/InStock",
		    "seller": {
		      "@type": "Organization",
		      "name": "0909 750 537"
		    }
		  }
		}
		</script>';
		return self::compress($html);
	}

	public function ShopProduct(){
		$html = '<script type="application/ld+json">
		{
		  "@context": "https://schema.org/",
		  "@type": "Product",
		  "name": "Executive Anvil",
		  "image": [
		    "https://example.com/photos/1x1/photo.jpg",
		    "https://example.com/photos/4x3/photo.jpg",
		    "https://example.com/photos/16x9/photo.jpg"
		   ],
		  "brand": {
		    "@type": "Thing",
		    "name": "ACME"
		  },
		  "aggregateRating": {
		    "@type": "AggregateRating",
		    "ratingValue": "4.4",
		    "ratingCount": "89"
		  },
		  "offers": {
		    "@type": "AggregateOffer",
		    "lowPrice": "119.99",
		    "highPrice": "199.99",
		    "priceCurrency": "USD"
		  }
		}
		</script>';
		return self::compress($html);
	}

	public function Organization(){
		global $config,$row_setting,$favicon,$lang;
		$html = '
		<script type="application/ld+json">
		{ "@context" : "https://schema.org",
		  "@type" : "Organization",
		  "name":"'.$row_setting['name_'.$lang].'",
		  "url" : "'.$this->func->getCurrentPageURL().'",
		  "logo":"https://'.$config['config_url'].'/'._upload_hinhanh_l.$favicon['photo_vi'].'",
		  "contactPoint" : [
		    {
		      "@type" : "ContactPoint",
		      "telephone" : "+84 '.$row_setting['phone'].'",
		      "contactType" : "Customer Service",
		      "contactOption" : "Support",
		      "areaServed" : ["VN"],
		      "availableLanguage" : ["Viet Nam"]
		    } 
		    ] }
		</script>';
		return self::compress($html);
	}

	public function Recipe(){
		$html = ' <script type="application/ld+json">
		{
		  "@context": "https://schema.org/",
		  "@type": "Recipe",
		  "name": "Grandmas Holiday Apple Pie",
		  "author": "Elaine Smith",
		  "image": "https://images.edge-generalmills.com/56459281-6fe6-4d9d-984f-385c9488d824.jpg",
		  "description": "A classic apple pie.",
		  "aggregateRating": {
		    "@type": "AggregateRating",
		    "ratingValue": "4",
		    "reviewCount": "276",
		    "bestRating": "5",
		    "worstRating": "1"
		  },
		  "prepTime": "PT30M",
		  "totalTime": "PT1H",
		  "recipeYield": "8",
		  "nutrition": {
		    "@type": "NutritionInformation",
		    "servingSize": "1 medium slice",
		    "calories": "230 calories",
		    "fatContent": "1 g",
		    "carbohydrateContent": "43 g",
		  },
		  "recipeIngredient": [
		    "1 box refrigerated pie crusts, softened as directed on box",
		    "6 cups thinly sliced, peeled apples (6 medium)",
		    "..."
		  ],
		  "recipeInstructions": [
		    "1...",
		    "2..."
		   ]
		}
		</script>';
	
	return self::compress($html);
	}

	static public function compress($buffer){
    	$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		$buffer = str_replace(': ', ':', $buffer);
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
		return $buffer;
    }

}
?>