(function($){

	// Options on smoothscroll plugin
	smoothScroll.init({
			speed: 800,
			easing: 'easeInOutCubic',
			offset: 0,
			updateURL: false
	});

// Sortable	

	// list
	$("#sortList").sortable();

	// List handle
	$('#sortListHandle').sortable({
		handle: '.sort-handle',
  		animation: 150
	});

	// Disable list
	var sortable = Sortable.create(disableList);

	switcher.onclick = function () {
		var state = sortable.option("disabled"); // get

		sortable.option("disabled", !state); // set
	  
	    switcher.innerHTML = state ? 'disable' : 'enable';
	};

	// Tags
	$("#sortTags").sortable();

	// Store
	Sortable.create(storeList, {
	    group: 'storeList',
	    store: {
	        /**
	         * Get the order of elements. Called once during initialization.
	         * @param   {Sortable}  sortable
	         * @returns {Array}
	         */
	        get: function (sortable) {
	            var order = localStorage.getItem(sortable.options.group['name']);

	            return order ? order.split('|') : [];
	        },

	        /**
	         * Save the order of elements. Called onEnd (when the item is dropped).
	         * @param {Sortable}  sortable
	         */
	        set: function (sortable) {
	            var order = sortable.toArray();
	            
	            localStorage.setItem(sortable.options.group['name'], order.join('|'));
	        }
	    }
	});

	// Make each group in Multi groups sortable
	Sortable.create(multi, {
		animation: 150,
		draggable: '.sortable',
		handle: '.card-title'
	});

	// Make each list in a Multi group sortable
	$('#multi .list-group').each(function(){
		$(this).sortable({
			group: 'group',
			animation: 150
		})
	});

	// Add a scrollbar to each list in a Multi group
	$('#multi .scroller').mCustomScrollbar({
	    theme:"dark",
	    autoHideScrollbar: true,
	    setHeight: 250
	});


	// advanced groups
	Sortable.create(groupA, {
	  group: {
	    name: 'groupA',
	    put: ['groupB', 'groupC']
	  },
	  animation: 100
	});

	Sortable.create(groupB, {
	  group: {
	    name: 'groupB',
	    pull: 'clone',
	    put: false
	  },
	  animation: 100
	});

	Sortable.create(groupC, {
	  group: {
	    name: 'groupC',
	    put: ['groupB', 'groupA'],
	    pull: false
	  },
	  animation: 100
	})

	// add scrollbar on each advanced group list
	$('#advanced .scroller').mCustomScrollbar({
		    theme:"dark",
		    autoHideScrollbar: true,
		    setHeight: 250
	});

})(jQuery);