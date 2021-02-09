<script>
	var lat = 35.562345; // latitude par défaut
	var lng = -5.363353; // longitude par défaut
	var homeLatlng = new google.maps.LatLng(lat, lng); // coordonnée par défaut
	var infowindow;
	var marker;
	var map;
	

	function initialize(){
		var myOptions={
			center: homeLatlng, // centre de la carte
			zoom: 12, //zoom level à 10
			mapTypeId: google.maps.MapTypeId.HYBRID //type de map
		};
		map = new google.maps.Map(document.getElementById('map-canvas'),myOptions); // initialisation de la map

		downloadUrl("xml/point.xml", function(data) {
		      var markers = data.documentElement.getElementsByTagName("marker");
		      for (var i = 0; i < markers.length; i++) {
			var latlng = new google.maps.LatLng(parseFloat(markers[i].getAttribute("lat")),
				                    parseFloat(markers[i].getAttribute("lng")));
			marker = createMarker(markers[i].getAttribute("description"), latlng);
		       }
		  });

	}
	function createMarker(description, latlng) {
	    var marker = new google.maps.Marker({position: latlng, map: map});
	    google.maps.event.addListener(marker, "click", function() {
	      if (infowindow) infowindow.close();
	      infowindow = new google.maps.InfoWindow({content: description});
	      infowindow.open(map, marker);
	    });
	    return marker;
	  }
	
	google.maps.event.addDomListener(window, 'load',initialize);
</script>
