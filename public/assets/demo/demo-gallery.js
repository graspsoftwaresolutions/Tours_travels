(function($){

	// init Masonry grid
	var $grid = $('.masonry-grid').masonry({
		itemSelector: '.grid-item',
		percentPosition: true
	});

	// Unloaded images can throw off Masonry layouts and cause item elements to overlap. 
	// imagesLoaded resolves this issue.
	// layout Masonry after each image loads
	$grid.imagesLoaded().progress( function() {
		$grid.masonry('layout');
	});

	// For demo purpose only

	$("#addClass").on('change', function(e) {
		var gallery = $('.masonry-grid');
		if ((this).checked) {
			gallery.addClass('grey-scale-img');
		} else {
			gallery.removeClass('grey-scale-img');
		}
	});	

})(jQuery);