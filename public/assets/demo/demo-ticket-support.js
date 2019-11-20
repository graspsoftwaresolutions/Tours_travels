(function($){
	
	$('#summernote').summernote({
		height: 240,   //set editable area's height
		toolbar: [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline', 'clear']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']]
		]
	});

})(jQuery);