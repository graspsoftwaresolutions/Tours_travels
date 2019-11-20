(function($){

	init();

	hideMenuPosition();

	// Init function to set settings and check localstorage values.
	function init() {
		var demoMenuPosition = store.get('menuPosition'),
			demoPageLayout = store.get('pageLayout'),
			demoMenuVertical = $('#demoMenuVertical'),
			demoMenuHorizontal = $('#demoMenuHorizontal'),
			mainMenu = $('.main-menu');

		if (demoMenuPosition) { 
			if (demoMenuPosition === 'vertical') {
		    	demoMenuVertical.prop("checked", true);
		    } else {
		    	demoMenuHorizontal.prop("checked", true);
		    }
	    } else if ($('.main-menu').hasClass('menu-vertical-js')) {
	    	demoMenuVertical.prop("checked", true);
	    } else {
	    	demoMenuHorizontal.prop("checked", true);
	    }

		if (demoPageLayout) {
		    if (demoPageLayout === 'classic') {
		    	$('#classic').prop("checked", true);
		    } else if (demoPageLayout === 'elevated') {
	    		$('#elevated').prop("checked", true);
		    }
		} else if ($('body').hasClass('ev-page')) {
	    	$('#elevated').prop("checked", true);
	    } else {
	    	$('#classic').prop("checked", true);
	    }
	}

	// function to switch the main menu's position.	
    $('input[name=demoMenuPosition]').on('click',function() {		
		var	mm = $('.main-menu'),
			mw = $('.main-wrapper'),
			mmWidth = null;
				
		$('.toggler-small-icon').removeClass('closed');
		$('.main-menu').removeClass('.menu-small');	
		$('.main-wrapper').removeClass('.menu-small');
		store.set('menuState', 'open');		

		switch ($('input[name=demoMenuPosition]:checked').val()) {
	        case 'horizontal':
	            mm.removeClass("menu-vertical-js menu-small");
	        	mm.addClass("menu-js");
	        	mw.removeClass('side-menu menu-small');        	
	        	store.set('menuPosition', 'horizontal');
	        	store.set('menuState', 'open');
	        	menuHorizontalWidth();		  
	            break;
	        case 'vertical':
	            mm.removeClass("menu-js");
	            mm.addClass("menu-vertical-js");
	            mw.addClass('side-menu');
	            setTimeout(function(){
	        		mmWidth = mm.width();
	            	$('.main-menu .scroller').css("width", mmWidth + "px");
	            }, 100);
	            store.set('menuPosition', 'vertical');
	            break;           
		};		            
    });

	// function to switch the page layout.	
    $('input[name=demoPageLayout]').on('click',function() {		
		var	body = $('body');				

		switch ($('input[name=demoPageLayout]:checked').val()) {
	        case 'elevated':
	        	body.addClass('ev-page');       	
	        	store.set('pageLayout', 'elevated');	  
	            break;
	        case 'classic':
	        	body.removeClass('ev-page');
	            store.set('pageLayout', 'classic');
	            break;           
		};		            
    });

	$(window).on('resizeend', function() {
	    hideMenuPosition();
	});

	function menuHorizontalWidth() {
		var width = 40,
			mw = $('.main-wrapper');
		$('.main-menu .menubar-item').each(function() {
		 width += $(this).outerWidth();
		});
	    if (width > $(window).width()) {
	    	mw.addClass('mb-collapsed');
	    	mw.removeClass('mb-open');
    	} else {
    		mw.addClass('mb-open');
    		mw.removeClass('mb-collapsed');
    	}
	}

	function hideMenuPosition() {
		var menuPositioner = $('#demoMenuPositioner'),
			text = $('#demoMenuPositionerText');
		if($(window).width() < 976) {
			text.css('display', 'block');
			menuPositioner.css('display', 'none');
		} else {
			menuPositioner.css('display', 'block');
			text.css('display', 'none');
		}
	}

})(jQuery);