(function($){

	// Sweet-alert 
    $('button[data-toggle="sweet-alert"]').click(function(e) {
	    e.preventDefault();
	    var id = $(this).attr('data-toggle-id');

	    switch (id) {
	        case 'info':
	            swal({   
	            	title: "Heads up!",
	            	text: "This is a info alert",   
	            	type: "info"
	            });				  
	            break;
            case 'success':
	           swal({   
	            	title: "Well done!",
	            	text: "This is a success alert",   
	            	type: "success"
	            });	
	            break;
            case 'warning':
	            swal({   
	            	title: "Attention!",
	            	text: "This is a warning alert",   
	            	type: "warning"
	            });	
	            break;
            case 'error':
	            swal({   
	            	title: "Oh snap!",
	            	text: "This is a error alert",   
	            	type: "error"
	            });	 
	            break;           
		};     
	});

	$('#swalExample-1').on('click', function(){
		swal("Here's a message!")
	});

	$('#swalExample-2').on('click', function(){
		swal({   
			title: "Auto close alert!",   
			text: "I will close in 2 seconds.",   
			timer: 2000,   
			showConfirmButton: false 
		});
	});

	$('#swalExample-3').on('click', function(){
		swal({   
			title: "Are you sure?",   
			text: "You will not be able to recover this imaginary file!",   
			type: "warning",   
			showCancelButton: true,  
			confirmButtonText: "Yes, delete it!",   
			cancelButtonText: "No, cancel plx!",   
			closeOnConfirm: false,   
			closeOnCancel: false 
		}, 
		function(isConfirm){   
			if (isConfirm) {     
				swal("Deleted!", "Your imaginary file has been deleted.", "success");   
			} else {     
				swal("Cancelled", "Your imaginary file is safe :)", "error");   
			} 
		});
	});

	$('#swalExample-4').on('click', function(){
		swal({   title: "Ajax request example",   
		text: "Submit to run ajax request",
	    type: "info",   showCancelButton: true,   
	    closeOnConfirm: false,   
	    showLoaderOnConfirm: true, 
		}, function(){   
			setTimeout(function(){     
				swal("Ajax request finished!");   
			}, 2000); });
	});

})(jQuery);