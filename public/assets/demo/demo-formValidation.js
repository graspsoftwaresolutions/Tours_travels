(function($){

	$("#formValidate")
		.find('[name="langauges"]')
			.change(function(){
				$('#langauges').valid();
			})
			.end()
		.find('[name="skills"]')
			.change(function(){
				$('#skills').valid();
			})
			.end()
		.validate({ // the "name=" attribute is the hook for the rules.
			rules: {
	            'firstName': {
	                required: true
	            },
	            'lastName': {
	                required: true
	            },
	            'gender': {
	                required: true
	            },
	            'email': {
	                required: true,
	                email: true
	            },
	            'password': {
	                required: true,
	                minlength: 6
	            },
	            'confirmPassword': {
	                required: true,
	                minlength: 6,
	                equalTo: "#password"
	            },
	            'langauges': {
	                required: true,
	                minlength: 1
	            },
	            'skills': {
	                required: true
	            },
	            'aboutMe': {
	                required: true,
	                minlength: 10,
	                maxlength: 60
	            },
	            'terms': {
	                required: true
	            }
	        },
	        // The default message on a invalid field is "This field is required"
	        // Customize a message for a field in the following way
	        messages: {
	            'langauges': {
	                required: 'Please select a langauge from the dropdown.'
	            },
	            'terms': {
	                required: 'Please agree with our terms and conditions.'
	            }
	        }
		});
	$( ".bootstrap-tagsinput input" ).on('change', function() {
  		$(this).valid();
	});

})(jQuery);