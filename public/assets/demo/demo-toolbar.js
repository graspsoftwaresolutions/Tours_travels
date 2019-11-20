(function($){

	smoothScroll.init({
			speed: 1000,
			easing: 'easeInOutCubic',
			offset: 0,
			updateURL: false
	});	

	prettyPrint();

	$('#toolbarRefresh').toolbarRefresh({
		source: 'demo/refresh.php'
	});

	$('#refreshWidget').toolbarRefresh({
		source: 'demo/refresh.php',
		loader: 'cyan' 
	});

	$("#tc_bottom").on('change', function(e) {
		if ((this).checked) {
			$('#tc_example1').addClass('bottom');
		} else {
			$('#tc_example1').removeClass('bottom');
		}
	});	

})(jQuery);