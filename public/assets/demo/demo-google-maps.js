(function($){

// MAP TYPES

	//Create a function to initialize the map.
	function initialize() {

		// create an object (mapProp) to define the properties for the map.
		var mapProp1 = {

			/* The center property specifies where to center the map. 
			   Create a LatLng object to center the map on a specific point. 
			   Pass the coordinates in the order: latitude, longitude. */
			center: new google.maps.LatLng(25.765383,-80.192655),

			// The zoom property specifies the zoom level for the map (0 shows full earth).
			zoom: 10,

			// Disable scroll zoom
			scrollwheel: false,

			/* The mapTypeId property specifies the map type to display. 
			The following map types are supported:
			ROADMAP (normal, default 2D map)
			SATELLITE (photographic map)
			HYBRID (photographic map + roads and city names)
			TERRAIN (map with mountains, rivers, etc.) */
			mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var myCenter = {lat: 25.765383, lng: -80.192655};

		var mapProp2 = {
			center: myCenter,
			zoom: 10,
			scrollwheel: false,
			mapTypeId: google.maps.MapTypeId.HYBRID
		};		

		// MAP OVERLAYS
		var mapProp3 = {
		    center: myCenter,
		    zoom: 5,
		    scrollwheel: false,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var mapProp4 = {
		    center: myCenter,
		    zoom: 10,
		    scrollwheel: false,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
		};

		var contentString = '<h2>Our office</h2>'+
			'<div id="bodyContent">'+
			'<p><b>346 Brickell Ave <br />' +
			'Miami, FL 33103 <br />'+
			'+1 (786) 123 6548.</b></p>'+
			'</div>';

		

		var map1 = new google.maps.Map(document.getElementById("googleMap1"),mapProp1);
		var map2 = new google.maps.Map(document.getElementById("googleMap2"),mapProp2);
		var map3 = new google.maps.Map(document.getElementById("googleMap3"),mapProp3);
		var marker1 = new google.maps.Marker({
		    position: myCenter,
		});
		marker1.setMap(map3);
		var map4 = new google.maps.Map(document.getElementById("googleMap4"),mapProp4);
		var infowindow = new google.maps.InfoWindow({
		    content: contentString
		});
		var marker2 = new google.maps.Marker({
		    position: myCenter,
		    map: map4,
		    title: 'Our office'
		});
		marker2.addListener('click', function() {
		    infowindow.open(map4, marker2);
		});
	}

	//Add a DOM listener that will execute the initialize() function on window load.
	google.maps.event.addDomListener(window, 'load', initialize);



// MAP STYLES

	function initStyleMap1() {
	  var customMapType = new google.maps.StyledMapType([
	      {
	        stylers: [
	          {hue: '#890000'},
	          {visibility: 'simplified'},
	          {gamma: 0.5},
	          {weight: 0.5}
	        ]
	      },
	      {
	        elementType: 'labels',
	        stylers: [{visibility: 'off'}]
	      },
	      {
	        featureType: 'water',
	        stylers: [{color: '#890000'}]
	      }
	    ], {
	      name: 'Custom Style'
	  });
	  var customMapTypeId = 'custom_style';

	  var map = new google.maps.Map(document.getElementById('googleMap10'), {
	    center: {lat: 25.765383, lng: -80.192655},
	    zoom: 12,
	    scrollwheel: false, 
	    mapTypeControlOptions: {
	      mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
	    }
	  });

	  map.mapTypes.set(customMapTypeId, customMapType);
	  map.setMapTypeId(customMapTypeId);
	}

	initStyleMap1();

	function initStyleMap2() {
	  var customMapType = new google.maps.StyledMapType([
	      {
		    "elementType": "labels",
		    "stylers": [
		      { "color": "#808080" },
		      { "hue": "#0022ff" },
		      { "visibility": "simplified" },
		      { "weight": 0.5 },
		      { "gamma": 0.48 }
		    ]
		  },{
		    "elementType": "labels",
		    "stylers": [
		      { "visibility": "off" }
		    ]
		  },{
		    "featureType": "water",
		    "stylers": [
		      { "hue": "#0000ff" }
		    ]
		  },{
		    "featureType": "landscape",
		    "stylers": [
		      { "hue": "#e6ff00" },
		      { "weight": 0.1 },
		      { "color": "#3a246e" }
		    ]
		  }
	    ], {
	      name: 'Custom Style'
	  });
	  var customMapTypeId = 'custom_style';

	  var map = new google.maps.Map(document.getElementById('googleMap11'), {
	    center: {lat: 25.765383, lng: -80.192655}, 
	    zoom: 1,
	    scrollwheel: false, 
	    mapTypeControlOptions: {
	      mapTypeIds: [google.maps.MapTypeId.ROADMAP, customMapTypeId]
	    }
	  });

	  map.mapTypes.set(customMapTypeId, customMapType);
	  map.setMapTypeId(customMapTypeId);
	}

	initStyleMap2();	

})(jQuery);