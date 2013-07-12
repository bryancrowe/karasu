<?php
	$metadata = unserialize($node['Metadatum'][0]['data']);
?>

<div id="map-canvas-<?php echo $node['Node']['id']; ?>" style="width: 250px; height: 250px;"></div>

<script>
	function initialize() {
		var myLatlng = new google.maps.LatLng(<?php echo $metadata['latitude']; ?>, <?php echo $metadata['longitude']; ?>);
		var mapOptions = {
			zoom: 15,
			center: myLatlng,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		var map = new google.maps.Map(document.getElementById('map-canvas-<?php echo $node['Node']['id']; ?>'), mapOptions);

		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map,
			title: 'Hello World!'
		});
	}

	google.maps.event.addDomListener(window, 'load', initialize);
</script>