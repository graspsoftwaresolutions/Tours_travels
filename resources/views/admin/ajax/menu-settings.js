(function ($) {	

	var mw = $('.main-wrapper');
		
	$(".selectpicker").selectpicker();

	$('[data-toggle="tooltip"]').tooltip();

	// function to close the aside panel.
	$('.aside-panel-close').on('click', function() {
		$('.aside-panel').removeClass('open');
	});

	// Add scrollbar when content is larger then screen.
	$(".ap-body").mCustomScrollbar({
	 	theme:"dark",
		autoHideScrollbar: 2,
		autoExpandScrollbar:true
	});

	// Init function to set settings and check localstorage values.
	function init() {
		var menuPosition = store.get('menuPosition'),
			skinType = store.get('skinType'),
			pageLayout = store.get('pageLayout'),
			menuStyle = store.get('menuStyle'),
			navbarStyle = store.get('navbarStyle'),
			menuVertical = $('#menuVertical'),
			menuHorizontal = $('#menuHorizontal'),
			mainMenu = $('.main-menu'),
			menuTheme = $('#menuTheme'),
			menuLight = $('#menuLight'),
			menuDark = $('#menuDark'),
			navThemeInverseId = $('#navThemeInverse'),
			navThemeId = $('#navTheme'),
			direction = store.get('Direction'),
			StyleSheetSwitch = $('#switchStyleSheet');

		if (menuPosition) { 
			if (menuPosition === 'vertical') {
		    	menuVertical.prop("checked", true);
		    }else {
		    	menuHorizontal.prop("checked", true);
		    };
	    } else if ($('.main-menu').hasClass('menu-vertical-js')) {
	    	menuVertical.prop("checked", true);
	    } else {
	    	menuHorizontal.prop("checked", true);
	    }

	    if (skinType) {
		    if (skinType === 'light') {
		    	$('#lightSkin').prop("checked", true);
		    } else if (skinType === 'dark') {
	    		$('#darkSkin').prop("checked", true);
		    }
		} else if ($('body').hasClass('light-skin')) {
	    	$('#lightSkin').prop("checked", true);
	    } else if ($('body').hasClass('dark-skin')) {
	    	$('#darkSkin').prop("checked", true);
	    }

		if (pageLayout) {
		    if (pageLayout === 'classic') {
		    	$('#classic').prop("checked", true);
		    } else if (pageLayout === 'elevated') {
	    		$('#elevated').prop("checked", true);
		    }
		} else if ($('body').hasClass('ev-page')) {
	    	$('#elevated').prop("checked", true);
	    } else {
	    	$('#classic').prop("checked", true);
	    }

		if ($('.header-bar').hasClass('theme-inverse')) {
			navThemeInverseId.prop("checked", true);
		}else {
			navThemeId.prop("checked", true);
		}

		if (navbarStyle) { 
			if (navbarStyle === 'theme') {
		    	navThemeId.prop("checked", true);
		    }else {
		    	navThemeInverseId.prop("checked", true);
		    };
	    }

	    if (mainMenu.hasClass('menu-light')) {
	    	menuLight.prop("checked", true);
	    } else if (mainMenu.hasClass('menu-dark')) {
	    	menuDark.prop("checked", true);
	    } else {
	    	menuTheme.prop("checked", true);
	    }

	    if (menuStyle) { 
			if (menuStyle === 'theme') {
		    	menuTheme.prop("checked", true);
		    } else if (menuStyle === 'light') {
		    	menuLight.prop("checked", true);
		    } else if (menuStyle === 'dark') {
	    		menuDark.prop("checked", true);
		    }
	    }

	    if (direction) {
	    	if (direction === 'RTL') {
    			StyleSheetSwitch.prop("checked", true);
	    	} else {
    			StyleSheetSwitch.prop("checked", false);
	    	}
	    }
	};

	init();

	// Hide the menu positioner on small screens.
	hideMenuPosition();

	function hideMenuPosition() {
		var menuPositioner = $('#menuPositioner');
		if($(window).width() < 976) {
			menuPositioner.css('display', 'none');
		} else {
			menuPositioner.css('display', 'block');
		}
	}
	
	$(window).resize(function() {
	    hideMenuPosition();
	});	

	// function to switch the main menu's position.	
    $('input[name=menuPosition]').on('click',function() {		
		var	mm = $('.main-menu'),
			mmWidth = null;
				
		$('.toggler-small-icon').removeClass('closed');
		$('.main-menu').removeClass('.menu-small');	
		$('.main-wrapper').removeClass('.menu-small');
		store.set('menuState', 'open');		

		switch ($('input[name=menuPosition]:checked').val()) {
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
    $('input[name=pageLayout]').on('click',function() {		
		var	body = $('body');				

		switch ($('input[name=pageLayout]:checked').val()) {
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

    $('input[name=skin]').on('click', function() {		
		var	body = $('body');			

		switch ($('input[name=skin]:checked').val()) {
	        case 'light':
	            body.removeClass("dark-skin").addClass("light-skin");
	            store.set('skinType', 'light');
	            break;
	        case 'dark':	            
	            body.removeClass("light-skin").addClass("dark-skin");
	            store.set('skinType', 'dark');
	            break;           
		};	
    });

    $('input[name=menuStyle]').on('click', function() {		
		var	menu = $('.main-menu');			

		switch ($('input[name=menuStyle]:checked').val()) {
	        case 'theme':
	            menu.removeClass("menu-light menu-dark");
	            store.set('menuStyle', 'theme');
	            break;
	        case 'light':
	            menu.removeClass("menu-dark");
	            menu.addClass("menu-light");
	            store.set('menuStyle', 'light');
	            break;
            case 'dark':
	            menu.removeClass("menu-light");
	            menu.addClass("menu-dark");
	            store.set('menuStyle', 'dark');
	            break;          
		};	
    });

    $('input[name=navbarTheme]').on('click', function() {		
		var	hb = $('.header-bar');			

		switch ($('input[name=navbarTheme]:checked').val()) {
	        case 'theme':
	            hb.removeClass("theme-inverse");
	            hb.addClass("theme");
	            store.set('navbarStyle', 'theme');
	            break;
	        case 'themeInverse':
	            hb.removeClass("theme");
	            hb.addClass("theme-inverse");
	            store.set('navbarStyle', 'themeInverse');
	            break;           
		};	
    });    

	function setStyles() {
    	if (localStorage["Theme"]) {
			var currentTheme = store.get('Theme');
			$('body').removeClass(function (index, css) {
	    		return (css.match (/\btheme-\S+/g) || []).join(' ');
			});
			$('body').addClass('theme-'+ currentTheme); 
		}
	};

	setStyles();
		
	$('#themePicker').change(function(e) {

		var body = $('body'),
			selectedTheme = $(this).val();

		// Remove Theme class from the body element
		body.removeClass(function (index, css) {
    		return (css.match (/\btheme-\S+/g) || []).join(' ');
		});

		// Add selected Theme class to the body element
		body.addClass('theme-' + selectedTheme);

		// save selected Theme in localStorage
		store.set('Theme', selectedTheme);

		setActiveTheme();
    });

    $('#clearStorage').on('click', function(){
    	store.clear()
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

	function setActiveTheme() {
		var selectedTheme = $("body").prop('class');
		$('#currentThemeDisplay').text(' ' + selectedTheme);
	}
	setActiveTheme();

	// Fuction to switch stylesheets to RTL css.
	$('#switchStyleSheet').on('change', function() {
		var $link = $(".rtl_switch_css"),
			$linkpage = $(".rtl_switch_page_css");
		if (this.checked) {
			$("html").attr("dir", "rtl");
			$.each($link, function(i) {
				var $text = ($(this).attr('href'));
				$text = $text.replace(/min/, "rtl.min");
				$(this).attr('href', $text);
			});
			$.each($linkpage, function(i) {
				var $text = ($(this).attr('href'));
				$text = $text.trim().replace(".css", ".rtl.css");
				$(this).attr('href', $text);
			});
			store.set('Direction', 'RTL');
		} else {
			$("html").removeAttr("dir");
			$.each($link, function(i) {
				var $text = ($(this).attr('href'));
				$text = $text.replace(/rtl.min/, "min");
				$(this).attr('href', $text);
			});
			$.each($linkpage, function(i) {
				var $text = ($(this).attr('href'));
				$text = $text.trim().replace("rtl.css", "css");
				$(this).attr('href', $text);
			});
			store.set('Direction', 'LTR');
		}

		location.reload();
	});

})(jQuery);