    <style>
      #map_canvas {
	float:right;
        width: 225px;
        height: 225px;
      }   
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script>
      function initialize() {
        var map_canvas = document.getElementById('map_canvas');
        var map_options = {
          center: new google.maps.LatLng(49.280267, -123.127866),
          zoom: 15,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(map_canvas, map_options);

var marker = new google.maps.Marker({
            position: new google.maps.LatLng(49.280267, -123.127866),
            map: map,
        });

	marker.setMap(map);

      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>
		<h2>Contact information</h2>

		<p>I am always happy to answer your questions. Please feel free to give me a call if you have any questions about your colonoscopy preparation.</p>

		<br/>

		<div id="map_canvas"></div>


		<p>
			<b>Dr. Robert Enns, MD</b><br/>
			(604) 688-6332, extension 222<br/>
			St. Paul's Hospital (GI clinic)<br/>
			1081 Burrard Street, Vancouver<br/>
			V6Z 1Y6<br/>
		</p>

		<br/><br/>

		<p>If you need immediate medical attention, dial 911.</p>

