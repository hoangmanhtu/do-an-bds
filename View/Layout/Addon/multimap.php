<?php
$thongtin = $func->thongtinduan($item[0]['id']);
?>
<div id="map" class="menu-padding" style="height: 500px"></div>
<script>
	jQuery(document).ready(function($) {
		var propertyDefault = {
			url: "",
			thumb: "<?=_upload_project_l.'300x200x1/'.$item[0]['photo']?>",
			title: "<?=$item[$i]['name_'.$lang]?>",
			price: "<?=$thongtin['giaban']?>/<?=$thongtin['donvi']?>"
		};
		var locations = [
		<?php for($i=0;$i<count($item);$i++){
			$lat = explode(',',$item[$i]['toado']);
			$thongtin = $func->thongtinduan($item[$i]['id']);
		?>
		{
		    "lat": <?=trim($lat[0])?>,
		    "lng": <?=trim($lat[1])?>,
		    "property": {
		        "url": "du-an/<?=$item[$i]['slug']?>.html",
		        "thumb": "<?=_upload_project_l.'300x200x1/'.$item[$i]['photo']?>",
		        "title": "<?=$item[$i]['name_'.$lang]?>",
		        "price": "<?=$thongtin['giaban']?>/<?=$thongtin['donvi']?>"
		    }
		},<?php } ?>];
		var setupMap = {
			zoom: 11,
			icon_marker: "Assets/images/icon/map-marker.png",
			icon_cluster: "Assets/images/icon/cluster-icon.png"
		}
		var iconClose = "Assets/images/icon/closem.png";

		function initMap() {

			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: setupMap['zoom'],
				center: centerMap()
			});

			// var markers = locations.map(function(location, i) {
			// 	return new google.maps.Marker({
			// 		position: location,
			// 		icon: "images/map-marker.png"
			// 	});
			// });
			var markers = [];
			locations.forEach(function(location){
				var marker = new google.maps.Marker({
					map: map,
					draggable: true,
					position: new google.maps.LatLng(location.lat, location.lng),
					visible: true,
					icon: setupMap['icon_marker']
				});
				markers.push(marker);

				setEventMarkerInfo(marker, map, location.property);
			})

			var markerClustererOptions = {
				ignoreHidden: true,
				maxZoom: 14,
				styles: [{
					textColor: '#ffffff',
					url: setupMap['icon_cluster'],
					height: 48,
					width: 48
				}]
			};

			var markerCluster = new MarkerClusterer(map, markers, markerClustererOptions);

		}
		function centerMap(){
			var centerMap = {lat: 10.773453, lng: 106.692760};
			if (locations.length > 0){
				centerMap.lat = locations[0].lat;
				centerMap.lng = locations[0].lng;
			}

			// locations.forEach(function(item){
			// 	centerMap.lat += item.lat;
			// 	centerMap.lng += item.lng;
			// })
			// centerMap.lat = centerMap.lat / locations.length;
			// centerMap.lng = centerMap.lng / locations.length;
			return centerMap;
		}
		function setEventMarkerInfo(marker, map, property){
			var boxText = document.createElement("div");
			boxText.className = 'map-info-window';
			var innerHTML = "";
			if ( property.thumb ) {
				innerHTML += '<a class="thumb-link" href="' + property.url + '">' +
				'<img class="prop-thumb" src="' + property.thumb + '" alt="' + property.title + '"/>' +
				'</a>';
			}
			innerHTML += '<h5 class="prop-title"><a class="title-link" href="' + property.url + '">' + property.title + '</a></h5>';
			if ( property.price ) {
				innerHTML += '<p><span class="price">' + property.price + '</span></p>';
			}
			innerHTML += '<div class="arrow-down"></div>';
			boxText.innerHTML = innerHTML;

			var myOptions = {
				content: boxText
				,disableAutoPan: false
				,maxWidth: 0
				,boxStyle: { width: '240px' }
				,pixelOffset: new google.maps.Size(-120, -45)
				,zIndex: null
				,alignBottom: true
				,closeBoxMargin: "0 0 -16px -16px"
				,closeBoxURL: iconClose
				,infoBoxClearance: new google.maps.Size(1, 1)
				,isHidden: false
				,pane: "floatPane"
				,enableEventPropagation: false
			};

			var ib = new InfoBox(myOptions);
			marker.addListener("click", function(){
				ib.open(map, marker);
			})
		}

		if ($("#map").length > 0)
			initMap();
	});
</script>