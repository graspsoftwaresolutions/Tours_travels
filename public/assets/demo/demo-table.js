(function($){

	// Sort and Pagination functionality with the List.js plugin.
	var tableListOptions = {
	  valueNames: [ 'invoiceNr', 'client', 'amount', 'status'],
	   page: 4, // records on each page
	   plugins: [
	      ListPagination({
	      	innerWindow: "3", // How many pages should be visible on each side of the current page.
	      })
	    ]
	};

	var tableList = new List('tableFunctions', tableListOptions);
	
	// The following functions are for demo purpose only

	// The function to select all rows in the table can be found in the:
	// js > app > miscellaneous.js file
	
	// Add contextual color to the table
	var myVar = setInterval(function(){ randomClass() }, 3000);

	function randomClass() {
		var $tr = $("#exampleTable tr"),
			rng = Math.round(Math.random()*3),
	    	classes = ["alert-info", "alert-success", "alert-warning", "alert-danger"],
	    	alert = classes[rng];

	    $tr.eq( Math.floor( Math.random() * $tr.length ) ).addClass(alert);

	    setTimeout(function(){
	    	$tr.removeClass(alert);
	    }, 2000); 
	}

	// Add the selected classes to the demo table.
	$("[id^=table-]").on('change', function(e) {
		var table = $('#demoTable');
		var id = $(this).attr('id');
		
		if ((this).checked) {
			table.addClass(id);
		} else {
			table.removeClass(id);
		}
	});

})(jQuery);