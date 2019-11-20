$(document).ready(function() {
	
	$('[rel=popover]').popover().click(function(e) {
        e.preventDefault();        
        var open = $(this).attr('data-easein');

    	if(open == 'shake') {
            $(this).next().velocity('callout.' + open);
        } else if(open == 'pulse') {
          $(this).next().velocity('callout.' + open);
        } else if(open == 'tada') {
            $(this).next().velocity('callout.' + open);
        } else if(open == 'flash') {
              $(this).next().velocity('callout.' + open);
        }  else if(open == 'bounce') {
             $(this).next().velocity('callout.' + open);
        } else if(open == 'swing') {
             $(this).next().velocity('callout.' + open);
        }else {
         $(this).next().velocity('transition.' + open); 
        }                
    });

});