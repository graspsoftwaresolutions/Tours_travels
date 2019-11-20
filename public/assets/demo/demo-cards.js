(function($){	

	// Add Google map to the card reveal.
	var myCenter = new google.maps.LatLng(26.329422,-80.088615);

	function initialize() {
	  var mapProp = {
	    center: myCenter,
	    zoom: 7,
	    mapTypeId: google.maps.MapTypeId.ROADMAP
	  };
	  var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
	  var marker = new google.maps.Marker({
		  	position: myCenter,
		});

		marker.setMap(map);
	}
	google.maps.event.addDomListener(window, 'load', initialize);

	// open the aside panel on link click
    $('.themePicker').on('click', function(e) {
		e.preventDefault();
		var aside = $('.aside-panel');
		var href = $(this).attr('href');
		aside.load(href);	
		$('.aside-panel').addClass('open');
	});

	//Peity
	$(".cc-bar").peity("bar", {
		fill: ["#1266F1", "#ccc"],
		width: 120,
		height: 60 
	});

})(jQuery);