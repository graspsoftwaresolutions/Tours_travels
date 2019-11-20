(function($){

	$("#pageFooterFixed").on('change', function() {
		var footer = $('#pageFooter');		
		if ((this).checked) {
			footer.addClass('fixed theme');
		} else {
			footer.removeClass('fixed theme');
		}
	});

})(jQuery);