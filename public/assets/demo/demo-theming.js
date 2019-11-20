(function ($) {

	// Init function to set settings and check localstorage values.
	function init() {
		var skinType = store.get('skinType'),
			mainMenuStyle = store.get('menuStyle'),
			headerbarStyle = store.get('navbarStyle'),
			mainMenu = $('.main-menu'),
			mainMenuTheme = $('#mainMenuTheme'),
			mainMenuLight = $('#mainMenuLight'),
			mainMenuDark = $('#mainMenuDark'),
			headerbarThemeInverseId = $('#headerbarThemeInverse'),
			headerbarThemeId = $('#headerbarTheme');

	    if (skinType) {
		    if (skinType === 'light') {
		    	$('#lightSkinType').prop("checked", true);
		    } else if (skinType === 'dark') {
	    		$('#darkSkinType').prop("checked", true);
		    }
		} else if ($('body').hasClass('light-skin')) {
	    	$('#lightSkinType').prop("checked", true);
	    } else if ($('body').hasClass('dark-skin')) {
	    	$('#darkSkinType').prop("checked", true);
	    }

		if($('.header-bar').hasClass('theme-inverse')) {
			headerbarThemeInverseId.prop("checked", true);
		}else {
			headerbarThemeId.prop("checked", true);
		}

		if (headerbarStyle) { 
			if (headerbarStyle === 'theme') {
		    	headerbarThemeId.prop("checked", true);
		    }else {
		    	headerbarThemeInverseId.prop("checked", true);
		    };
	    }

	    if (mainMenu.hasClass('menu-light')) {
	    	mainMenuLight.prop("checked", true);
	    } else if (mainMenu.hasClass('menu-dark')) {
	    	mainMenuDark.prop("checked", true);
	    } else {
	    	mainMenuTheme.prop("checked", true);
	    }

	    if (mainMenuStyle) { 
			if (mainMenuStyle === 'theme') {
		    	mainMenuTheme.prop("checked", true);
		    } else if (mainMenuStyle === 'light') {
		    	mainMenuLight.prop("checked", true);
		    } else if (mainMenuStyle === 'dark') {
	    		mainMenuDark.prop("checked", true);
		    }
	    }
	};

	init();

    $('input[name=skinType]').on('click', function() {		
		var	body = $('body');			

		switch ($('input[name=skinType]:checked').val()) {
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

    $('input[name=mainMenuStyle]').on('click', function() {		
		var	menu = $('.main-menu');			

		switch ($('input[name=mainMenuStyle]:checked').val()) {
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

    $('input[name=headerbarTheme]').on('click', function() {		
		var	hb = $('.header-bar');			

		switch ($('input[name=headerbarTheme]:checked').val()) {
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
		body.removeClass(function (index, css) {
    		return (css.match (/\btheme-\S+/g) || []).join(' ');
		});
		body.addClass('theme-' + selectedTheme);
		store.set('Theme', selectedTheme);
		setActiveTheme();
    });	

	function setActiveTheme() {
		var selectedTheme = $("body").prop('class');
		$('#currentThemeDisplay').text(' ' + selectedTheme);
	}
	setActiveTheme();

})(jQuery);