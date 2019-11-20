(function($) {

	prettyPrint();

	// smoothscroll on the page
	smoothScroll.init({
			speed: 1000,
			easing: 'easeInOutCubic',
			offset: 0,
			updateURL: false,
	});

	// Set the buttons to disabled state
	$("#btnDisabled").on('change', function(e) {
		var el = $('#buttons :button, #buttons .btn, #buttons .btn-circle, #buttons .fixed-action-btn');
		
		if ((this).checked) {
			el.addClass('disabled');
			el.prop( "disabled", true );
		} else {
			el.removeClass('disabled');
			el.prop( "disabled", false );
		}
	});

	setTimeout(setProgressBarJsValues, 200);
	

	function setProgressBarJsValues() {

		var circle = new ProgressBar.Circle('#pbCircle', {
			color: themeColorCode,
			strokeWidth: 4,
			trailColor: 'rgba(50,50,50, 0.15)',
			easing: 'easeInOut',
			text: {
		        value: '50 % Done',
		        // add classes to style the text for font-size and color.
		        // progressbar-text set the defaults.
		        // Use typography classes for the font-size (e.g. h1, h2, text-*).
		        className: 'progressbar-text h2',
		        // themeColorCode var will give the text the theme color.
		        color: themeColorCode
		    },
		    step: function(state, bar) {
		        bar.setText((bar.value() * 100).toFixed(0) + ' % Done');
		    },
		});

		circle.set(0.68);

		
		$('#pbCircleRun').on('click', function(){
			circle.set(0);
			circle.animate(0.82, {
			    duration: 2000
			});
		});

		// Semi Circle
		var semiCircle = new ProgressBar.SemiCircle('#pbSemiCircle', {
			color: themeColorCode,
			strokeWidth: 4,
			trailColor: 'rgba(50,50,50, 0.15)',
			easing: 'easeInOut',
			text: {
		        value: '50 % Done',
		        className: 'sc-progressbar-text text-title',
		        // themeColorCode var will give the text the theme color.
		        color: themeColorCode
		    },
		    step: function(state, bar) {
		        bar.setText((bar.value() * 100).toFixed(0) + ' %');
		    },
		});

		semiCircle.set(0.75);

		
		$('#pbSemiCircleRun').on('click', function(){
			semiCircle.set(0);
			semiCircle.animate(1, {
			    duration: 1500,
			});
		});
	}		

	var clicks = 0; $("#buttonLike").click(function(){ 
		clicks++; $('.thumbs-up').html(clicks);
	});

	$('#fabMarkup').mCustomScrollbar({
	  	axis:"x",
		theme:"dark-thin",
		scrollInertia: 200,
		autoExpandScrollbar:true,
        advanced:{autoExpandHorizontalScroll:true}
	});

	// open the aside panel on link click
    $('.themePicker').on('click', function(e) {
		e.preventDefault();
		var aside = $('.aside-panel');
		var href = $(this).attr('href');
		aside.load(href);	
		$('.aside-panel').addClass('open');
	});

})(jQuery);