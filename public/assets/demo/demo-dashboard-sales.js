(function($){

	/*  3 ways to set a background color on the statistic cards:
	 *  Add selected="selected" on an option in the html.
	 *  Use the option "setColor": set hex code.
	 *  Use the option "setValue": use one of the values. 
	 */

	// Initialize the color selector on each statistic card.
	$('#colorselector_1').colorselector('setColor', '#ffc107');
	$('#colorselector_2').colorselector('setValue', 'cyan-dark');
	$('#colorselector_3').colorselector('setValue', 'lime');
	$('#colorselector_4').colorselector('setValue', 'blue-grey');

	// Check if the card bg-color is saved in localstorage and apply it.
	// On color selector change save new value in localStorage.
	$('#statisticsTiles .card').each(function(){
		var card = $(this),
			id = $(this).attr('id'),
        	value = card.css('backgroundColor');
        	
		store.get(id, value);

		if (id === id) {
			card.css('backgroundColor',store.get(id, value));
		};

		$('select.color-selector').on('change', function() {
			var card = $(this).closest('.card');
			var id = card.prop('id');
			var el = card.css('backgroundColor');

			store.set(id, el);		
		});
	});

	// Make the statistics card sortable, and save the new order in localStorage.
	if($(window).width() > 768) {
		Sortable.create(statisticsTiles, {
		    group: 'statisticsTiles',
		    store: {
		        get: function (sortable) {
		            var order = store.get(sortable.options.group['name']);

		            return order ? order.split('|') : [];
		        },
		        set: function (sortable) {
		            var order = sortable.toArray();
		            
		            store.set(sortable.options.group['name'], order.join('|'));
		        }
		    }
		});
	}

	/* For this demo we created some functions to create data and draw
	 the peity bar charts when input[name=stats] is changed */
	function commaSeparateNumber(val) {
	    while (/(\d+)(\d{3})/.test(val.toString())) {
	        val = val.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	    }
	    return val;
	};
	
	// Create some random data for the small peity bar charts	
	function SparklineTestData(){
		var arr = [];
		for (var i=1; i<16; i++){
			arr.push(Math.floor(10*Math.random()));
		}
		return arr;
	}

	// Run the random data for each statistic tile.
	function reArangeArray() {
		var sparkline_arr_1 = SparklineTestData(),
			sparkline_arr_2 = SparklineTestData(),
			sparkline_arr_3 = SparklineTestData(),
			sparkline_arr_4 = SparklineTestData();
		$('.stat-graph-clients .bar').text(sparkline_arr_1);
		$('.stat-graph-orders .bar').text(sparkline_arr_2);
		$('.stat-graph-subscribers .bar').text(sparkline_arr_3);
		$('.stat-graph-4 .bar').text(sparkline_arr_4);
	}

	// Create each bar chart on the statistic tiles.
	function DrawPeityStat(){
		var stat_selectors = $('.stat-footer > span');

		stat_selectors.each(function() {
			
			stat_selectors.peity("bar", {
				  fill: ["#fff", "#ccc"],
				  width: 92,
				  height: 18 
				});
		});
	}
	DrawPeityStat();

	// Run the functions when the input[name=stats] is changed.
	$('input[name=stats]').on('click', function()  {
    	var count = $('.count');

    	SparklineTestData();
    	reArangeArray();
    	DrawPeityStat();

	    switch ($('input[name=stats]:checked').val()) {
	        case 'today':
	            count.animate({ someValue: 84 }, {
				    duration: 800,
				    easing: 'swing',
				    step: function () {
				        $(this).text((Math.round(this.someValue)));	
				    }
				});				  
	            break;
            case 'week':
	            count.animate({ someValue: 742 }, {
				    duration: 1400,
				    easing: 'swing',
				    step: function () {
				        $(this).text(commaSeparateNumber(Math.round(this.someValue)));	
				    }
				}); 
	            break;
            case 'month':
	            count.animate({ someValue: 2346 }, {
				    duration: 1000,
				    easing: 'swing',
				    step: function () {
				        $(this).text(commaSeparateNumber(Math.round(this.someValue)));	
				    }
				}); 
	            break;
            case 'year':
	            count.animate({ someValue: 46583 }, {
				    duration: 1400,
				    easing: 'swing',
				    step: function () {
				        $(this).text(commaSeparateNumber(Math.round(this.someValue)));	
				    }
				}); 
	            break;
	        case 'alltime':
	            count.animate({ someValue: 284301 }, {
				    duration: 1400,
				    easing: 'swing',
				    step: function () {
				        $(this).text(commaSeparateNumber(Math.round(this.someValue)));	
				    }
				}); 
	            break;            
		};
	});


// jVectormap

	// set timeout to first receive the themecolor value
	setTimeout(drawDashboardcharts, 100 );

	function drawDashboardcharts() {

		// jvectormap data
	    var visitorsData = {
	        "US": 398, //USA
	        "SA": 400, //Saudi Arabia
	        "CA": 1000, //Canada
	        "DE": 500, //Germany
	        "FR": 760, //France
	        "CN": 300, //China
	        "AU": 700, //Australia
	        "BR": 600, //Brazil
	        "IN": 800, //India
	        "GB": 320, //Great Britain
	        "RU": 3000 //Russia
	    };

		// World map by jvectormap
	    $('#world-map').vectorMap({
	        map: 'world_mill_en',
	        backgroundColor: "",
	        regionStyle: {
	            initial: {
	                fill: '#c9c9c9',
	                "fill-opacity": 1,
	                stroke: 'none',
	                "stroke-width": 0,
	                "stroke-opacity": 1
	            }
	        },
	        series: {
	            regions: [{
	                    values: visitorsData,
	                    // set the theme color with the var themeColorCode.
	                    scale: [themeColorCode],
	                    normalizeFunction: 'polynomial'
	                }]
	        },
	        onRegionTipShow: function(e, el, code) {
	            if (typeof visitorsData[code] != "undefined")
	                el.html(el.html() + ': ' + visitorsData[code] + ' new visitors');
	        }
	    });


// C3 charts

		var chartVisitors = c3.generate({
			bindto: '#visitorsChart',
	    	data: {
		      	columns: [
		        	['data', 3002, 3500, 3140, 3800, 3220, 3320, 3630, 4420, 3862, 3300, 3650, 3725,
		        	3002, 3500, 3140, 3800, 3220, 3320, 3630, 4420, 3862, 3300, 3650, 3725,
		        	3002, 3500, 3140, 3800, 3220, 3320, 3630]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		data: themeColorCode
	         	},
	         	names: {
	         		data: 'Daily Visitors'
	         	}
		    },
		    axis: {
			  	y: {
			    	show: false
  				}
			},
			grid: {
	        	y: {
		            lines: [
		                {value: 4000, text: '4000 visitors', position:'start'}
		            ]
		        }
		    }
		});

		// Draw the main chart
	    var chartTransform = c3.generate({
			bindto: '#bar-chart',
			
		    data: {
		        columns: [
		            ['Sales', 70, 50, 60, 80, 48, 54, 59],
		            ['Quotes', 130, 120, 140, 160, 130, 100, 126]
		        ],
		        type: 'bar',
		        colors: {
		       		Sales: '#ffc107',
		       		Quotes: '#ccc'
		     	}
		    }	    
		});

	    // Draw the 4 smaller area charts
		var chart = c3.generate({
		    bindto: '#chartQuotes',
		    data: {
		      	columns: [
		        	['Quotes', 30, 300, 140, 400, 220, 320]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		Quotes: '#ff9800'
	         	}
		    },
		    axis: { y: {show: false}, x: {show: false} },
			legend: {show: false}
		});

		var chart = c3.generate({
		    bindto: '#chartSales',
		    data: {
		      	columns: [
		        	['Sales', 30, 300, 140, 400, 220, 320]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		Sales: '#0097a7'
	         	}
		    },
		    axis: { y: {show: false}, x: {show: false} },
			legend: {show: false}
		});

		var chart = c3.generate({
		    bindto: '#chartRenewals',
		    data: {
		      	columns: [
		        	['Renewals', 30, 300, 140, 400, 220, 320]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		Renewals: '#8bc34a'
	         	}
		    },
		    axis: { y: {show: false}, x: {show: false} },
			legend: {show: false}
		});

		var chart = c3.generate({
		    bindto: '#chartCrossSell',
		    data: {
		      	columns: [
		        	['data', 30, 300, 140, 400, 220, 320]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		data: '#607D8B'
	         	},
	         	names: {
	         		data: 'Cross Sales'
	         	}
		    },
		    axis: { y: {show: false}, x: {show: false} },
			legend: {show: false}
		});

		$('#chartTypeBtn').on('click', function(){
			var $this = $(this);
			$this.toggleClass('bar-chart');
			if($this.hasClass('bar-chart')){
				$this.text('area chart');
				chartTransform.transform('bar');			
			} else {
				$this.text('bar chart');
				chartTransform.transform('area-spline');
			}
		});

	}    

}(jQuery));

