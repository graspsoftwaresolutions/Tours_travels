$(document).ready(function() {

	var options = {
		// the classnames where we can filter on
	    valueNames: [ 'name', 'team' ] 
	};

	// teamList is the ID on the list wrapper in the html markup.
	var demoList = new List('teamList', options);

	// Filter function on the select
	$('#filterTeams').on('change', function() {
		var filterItem = $(this).val();

		//check if the selected option has a value.
		if (filterItem.length) {
			demoList.filter(function(item) {
		        return (item.values().team === filterItem);
		    });
	    // If value is empty reset filters.
		} else {
			demoList.filter();
		}
	});

	// Functions on te table
	var tableListOptions = {
	  valueNames: [ 'invoiceNr', 'client', 'amount', 'status'],
	   page: 4, // records on each page
	   plugins: [
	      ListPagination({
	      	innerWindow: "3", // How many pages should be visible on each side of the current page.
	      })
	    ]
	};

	var tableList = new List('demoTable', tableListOptions);

});