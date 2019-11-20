(function($){

	setTimeout(function() {

		//World map by jvectormap
	    $('#worldMap').vectorMap({
	        map: 'world_mill_en',
	        backgroundColor: "#eee",
	        regionStyle: {
	            initial: {
	            	// themeColorCode var will give the theme color.
	                fill: themeColorCode,
	                "fill-opacity": 1,
	                stroke: 'none'
	            }
	        }
	    });

	}, 200);

})(jQuery);