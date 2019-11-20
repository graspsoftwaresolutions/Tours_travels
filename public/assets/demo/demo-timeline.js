(function($) {

	// The js functionality for the timeline to position each tl-item
	// is automatically initialized.


	// This following is for demo purpose only.
	$("#tlSwitch").on('change', function(e) {
		var el = $('.timeline');
		
		if ((this).checked) {
			el.addClass('timeline-single');
		} else {
			el.removeClass('timeline-single');
		}
	});	

})(jQuery);