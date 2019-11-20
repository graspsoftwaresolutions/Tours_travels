(function($){

	// List.js functions 
	var listOptions = {
	  valueNames: [ 'id', 'subject', 'status', 'priority', 'agent', 'due-date' ],
	   page: 10, // records on each page
	   plugins: [
	      ListPagination({
	      	innerWindow: "3", // How many pages should be visible on each side of the current page.
	      })
	    ]
	};

	var ticketList = new List('tickets', listOptions);

	// Custom filter function in the right column. 
	$('#filterTickets').on('change', function() {
	    var filterStatus = $('#filterStatus').val(),
	    	filterAgents = $('#filterAgents').val(),
	    	filterPriorty = $('#filterPriority').val(); 

	    if( filterStatus && filterAgents && filterPriorty ) {

		    ticketList.filter(function(item) {
		        return (item.values().status === filterStatus && item.values().agent === filterAgents && item.values().priority === filterPriorty );
		    });

		} else if((filterStatus && filterAgents) || (filterStatus && filterPriorty) || (filterAgents && filterPriorty) ) {	    	

		    ticketList.filter(function(item) {
		        return ((item.values().status === filterStatus && item.values().agent === filterAgents) || (item.values().status === filterStatus && item.values().priority === filterPriorty) || (item.values().agent === filterAgents && item.values().priority === filterPriorty) );
		    });

		} else if (filterStatus || filterAgents || filterPriorty) {
			
			ticketList.filter(function(item) {
				return (item.values().status === filterStatus || item.values().agent === filterAgents || item.values().priority === filterPriorty);
			});

		} else {
			ticketList.filter();			
		}    
	    tableIni();
	    return false;

	});

	$('#filterReset').on('click', function(e){
		e.preventDefault();
		$('#filterStatus, #filterAgents, #filterPriority').val(1);
		$('.selectpicker').selectpicker('refresh');
		ticketList.filter();
	});

	$('.pagination').on('click', function(){
		tableIni();
	});

	tableIni();

	// Function to add classes to the tickets table if the condition is true.
	function tableIni() {
		$('#ticketsTable tr td').each(function() {
			var el = $(this),
				row = $(this).parent();
			// highlight the priority high text.
		    if (el.text() === "high") {
		        row.addClass("priority-high");
		        el.html('<b class="text-red text-darken-1">High</b>');

		    } 
		    // When tickets are overdue, give them a red background.
	        if ( el.text() === "overdue") {
	        	row.addClass('alert-danger');
	        }
		});
	}

//Expandig card functions
	// Make the dropdown menu's open up to the top.
	$('.form-group.dropup').find('.dropdown-menu').addClass('dropup').css('top:auto');		

	/* Functions to add class active on the form-groups
	   inside the ticket-form wich will lighten the bg color*/	
	$('.ticket-form').find('.text-field')
		.focus(function() {
		  $(this).closest('.form-group').addClass('active');
		})
		.blur(function() {
		  	if ($(this).val().length === 0) {
		    	$(this).closest('.form-group').removeClass('active');	    
		  	}
		});

	$('.ticket-form select').on('change', function(){
		$(this).closest('.form-group').addClass('active');
	});

	// Open the tab to add new client iside the ticket-form. 
	$('#btnNewClient').on('click', function(e){
		e.preventDefault();
		$('.nav-tabs a[href="#requestorInfo"]').tab('show');
		$('.ticket-form .nav-tabs').underlineTab();  
	});

	$('#btnBackToTicket').on('click', function(e){
		e.preventDefault();
		$('.nav-tabs a[href="#ticketProperties"]').tab('show');
		$('.ticket-form .nav-tabs').underlineTab(); 
	});

	// Open the new ticket form.
	$('.expanding-card').on('click', '.button-expand', function(e) {
		e.preventDefault();
		var card = $(this).parent();
		card.addClass('expand').children().addClass('expand');
		$('body').addClass('show-form-overlay');

		card.find($('.btn-close')).on('click', function(){
			card.removeClass('expand').children().removeClass('expand');
			$('body').removeClass('show-form-overlay');
			// Clear all form fields
			clearTicketFormFields();
		});
	});

	// Clear all form fields
	function clearTicketFormFields() {
		var form = $('.ticket-form');
		$('.text-field', form).val('');
		$('.form-group', form).removeClass('active');
		$('label', form).removeClass('active');
		$('select', form).val(1);
		$('.selectpicker', form).selectpicker('refresh');
	}	    	

})(jQuery);
