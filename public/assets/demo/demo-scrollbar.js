(function($){

	prettyPrint();

	$("#manuScrollbar").mCustomScrollbar({
	    theme:"dark",
	    autoHideScrollbar: true,
	    setHeight: 250,
	});

	$('#manuScrollbarHeight').mCustomScrollbar({
		setHeight: 200,
		theme:"dark"
	});

	$("#manuScrollbarHorizontal").mCustomScrollbar({
		axis:"x",
		setHeight: 120,
		theme:"dark",
		autoExpandScrollbar:true,
		advanced:{autoExpandHorizontalScroll:true}
	});

})(jQuery);