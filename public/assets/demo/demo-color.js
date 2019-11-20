(function($){

	function colorPalette() {
		var windowHeight = $(window).height()-190;
		
		if ($('.main-wrapper').hasClass('side-menu')) {
			$('.demo-palette').css({height: windowHeight});
		} else {
			$('.demo-palette').css({height: windowHeight - 60});
		}
	}
	
	setTimeout(colorPalette, 100);

	$(window).on("resize", function () {
    	colorPalette();
	});

	$('.demo-color').not('.text-field').on('click', function(){

		$('.demo-palette').addClass('accent-color-active');
		var color = $(this).text();

		$('.demo-c-accent').removeClass().addClass(color).addClass('demo-c-accent');	

		setTimeout(function() {
			$('.demo-c-accent').each(function(){
			    var id = $(this).attr('id');
			    $(this).addClass(id);
			    $(this).find('.caption').text(color + " " + id);
			});
		}, 50);
	});

	$('.acp-palette-close').on('click', function(){
		$('.demo-palette').removeClass('accent-color-active');
	});

	$(".example-text").mCustomScrollbar({
	 	theme:"dark",
		autoHideScrollbar: 2,
		autoExpandScrollbar:true,
		advanced:{ updateOnContentResize: true }
	});

})(jQuery);