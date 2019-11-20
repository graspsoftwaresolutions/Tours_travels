$(document).ready(function() {

	// Label formatter function for flot charts
	function labelFormatter(label, series) {
        return "<div style='font-size:11px; text-align:center; color: #fff; font-weight: 500;'>"
                + Math.round(series.percent) + "%</div>";
    }

    // Priority donut chart with flot.js
	var pieData1 = [
        {label: "High", data: 17, color: "#ff9100"},
        {label: "Normal", data: 50, color: "#0097a7"},
        {label: "Low", data: 19, color: "#cddc39"}
    ];

    $.plot("#priorityChart", pieData1, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.7,
                label: {
                    show: true,
                    radius: 4/5,
                    formatter: labelFormatter,
                    threshold: 0.1
                }

            }
        },
        legend: {
            position: 'ne'
        }
    });

	// Category pie chart with Flot.js
	var pieData2 = [
	    { label: "Order", data: 1, color: "#cddc39"},
	    { label: "Shipping", data: 3, color: "#ff9100"}, 
	    { label: "Account", data: 4, color: "#607d8b"},
	    { label: "System", data: 2, color: "#0097a7"}
    ];    

    var plotObj = $.plot($("#catPieChart"), pieData2, {
        series: {
	        pie: {
	            show: true,
	            radius: 0.8,
            	tilt: 0.6,// makes the chart tilt
            	label: {
	                show: true,
	                radius: 3/5,
	                formatter: labelFormatter
	            },
	            legend: {
	            	position: 'ne'
	            }
	        }
	    }
    });

	// Circle progressbars with progressbar.js for service level agreement.
	setTimeout(function(){
		var slResponseTime = new ProgressBar.Circle('#slResponseTime', {
			color: themeColorCode, // theme color var
			strokeWidth: 4,
			trailColor: 'rgba(50,50,50, 0.15)',
			easing: 'easeInOut',
			text: {
		        className: 'progressbar-text h2',
		        color: themeColorCode
		    },
		    step: function(state, bar) {
		        bar.setText((bar.value() * 100).toFixed(0) + '%');
		    },
		});

		slResponseTime.set(0.79);		

		var slHandlingTime = new ProgressBar.Circle('#slHandlingTime', {
			color: themeColorCode, // theme color var
			strokeWidth: 4,
			trailColor: 'rgba(50,50,50, 0.15)',
			easing: 'easeInOut',
			text: {
		        className: 'progressbar-text h2',
		        color: themeColorCode
		    },
		    step: function(state, bar) {
		        bar.setText((bar.value() * 100).toFixed(0) + '%');
		    },
		});

		slHandlingTime.set(0.87);

	}, 100);

	// C3 Response handling time chart
	setTimeout(function(){
		var chart = c3.generate({
		    bindto: '#handlingTime',
		    data: {
		      	columns: [
		        	['data1', 7.5, 8, 8.2, 7.5, 8, 7.4, 8, 9, 8.4, 7.5,
		        			8, 8.4, 9.4, 8.1, 8.5, 9.3, 7.5, 8, 8.5, 8,
		        			7.5, 8, 8.2, 7.5, 8, 7.4, 8, 9, 8.4, 9
		        	],
		        	['data2', 1.6, 2, 2.1, 1.7, 2.2, 2.6, 2, 1.7, 2.4, 2,
		        			2.7, 2, 1.6, 1.7, 2, 1.7, 2.2, 2, 2.7, 2,
		        			1.6, 2, 2.1, 1.7, 2.2, 2.6, 2, 1.7, 2.4, 2
		        	]
		      	],
		      	types: {
		            data1: 'spline',
		            data2: 'area-spline',
		        },
		        names: {
	         		data1: 'Handling Time',
	         		data2: 'Response Time'
	         	},
		       	colors: {
	           		data2: '#ccc',
	           		data1: themeColorCode, // theme color var
	         	}
		    },
		    grid: {
	        	y: {
		            lines: [
		                {value: 8, text: 'SLA', position:'start'},
		                {value: 2, text: 'SLA', position:'start'}
		            ]
		        }
		    }
		});
	}, 100);

// Service level Gauge
	// On small devices the side col is hidden,
	// So no need to draw the gauge.
	if ($(window).width() > 768) {
		
		var gaugeServiceLevel = new JustGage({
	        id: 'gaugeServiceLevel',
	        value: getRandomInt(75, 99),
	        min: 0,
	        max: 100,
	        title: "Service Level",
	        symbol: '%',
	        pointer: true,
	        pointerOptions: {
	          toplength: 14,
	          bottomlength: 50,
	          bottomwidth: 4,
	          color: '#8e8e93'
	        },
	        gaugeWidthScale: 0.7,        
	        customSectors: [{
	          color: '#009688',
	          lo: 80,
	          hi: 100
	        },{
	        	color: '#ffc107',
	        	lo: 70,
	        	hi: 78	
	        }, {
	          color: '#ff0000',
	          lo: 0,
	          hi: 69
	        }],
	        counter: true
		});

	
		setInterval(function() {
	        gaugeServiceLevel.refresh(getRandomInt(60, 92));
	    }, 10000);
	}

// Expandig card functions
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
			$('body').removeClass('show-form-overlay');
			card.removeClass('expand').children().removeClass('expand');
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

});