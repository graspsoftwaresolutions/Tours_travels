(function($){

	setTimeout(function(){
		toastr.info('<h3>Invoice</h3>This a working invoice creator. Fill in the fields, and click on the preview button to see your invoice. <br /><button type="button" class="btn-flat pull-right clear">Close</button>');
	}, 3000);

	toastr.options = {
		"timeOut": 0,
		"extendedTimeOut": 0
	}

	$("#ccNumber").mask("0000-0000-0000-0000");

// Expandig card Add client functions:	

	// Open the new ticket form.
	$('.expanding-card').on('click', '.button-expand', function(e) {
		e.preventDefault();
		var card = $(this).parent();

		$('body').addClass('show-form-overlay');
		card.addClass('expand').children().addClass('expand');
		cpInit();
		if ($(window).width() < 480) {
			setTimeout(function(){
				$('#scrollingTabs').scrollingTabs();
				$('#scrollingTabs').underlineTab();
			}, 100);
		};

		card.find($('.btn-close')).on('click', function(){
			$('body').removeClass('show-form-overlay');
			card.removeClass('expand').children().removeClass('expand');
			$('#scrollingTabs').scrollingTabs('destroy');
		});
	});

	$('input[name=contactType]').on('click',function() {
  		$('.ctype').hide(200);

  		switch ($('input[name=contactType]:checked').val()) {
	        case 'person':
				$('.ct-person').show(200);
				$('.company-cp').hide();		  
	            break;
	        case 'company':
				$('.ct-company').show(200);
				$('.company-cp').show();	
	            break;           
		};
	});

	function cpInit() {  
		$('.ctype').hide();
		$('.ct-person').show();
		$('.company-cp').hide();
		switch ($('input[name=contactType]:checked').val()) {
	        case 'person':
				$('.ct-person').show();
				$('.company-cp').hide();		  
	            break;
	        case 'company':
	        	$('.ct-person').hide();
				$('.ct-company').show();
				$('.company-cp').show();	
	            break;           
		};
	}

	// Add additional input field in the "cotact details" tab
	$('.btn-add-field').on('click', function(e){
		e.preventDefault();
		var field = $(this).attr('name'),
			insertPlace = $(this).closest('.field-wrapper'),
			$template = $('#' + field),
            $clone    = $template
                            .clone()
                            .removeClass('hide')
                            .removeAttr('id');                           
                            
        $clone.insertAfter(insertPlace).find('select').removeClass('templateSelect');
        $('#contactDetails select').not('.templateSelect').selectpicker();

        $('.remove-button').on('click', function() {
            var $row    = $(this).parents('.field-remove');
            $row.remove();
        });
	});

})(jQuery);