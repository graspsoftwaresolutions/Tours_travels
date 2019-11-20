(function($){

	setTimeout(function(){
		smoothScroll.init({
			speed: 800,
			easing: 'easeInOutCubic',
			offset: 0
		});

	// TRANSFORM
		var chartTransform = c3.generate({
			bindto: '#transform-chart',
	    	data: {
		      	columns: [
		        	['data1', 30, 300, 140, 400, 220, 320],
		        	['data2', 240, 120, 280, 120, 175, 110]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		data1: '#ccc',
	           		data2: '#ffc107'
	         	}
		    }
		});
		$('#transformBar').on('click', function () {
		    chartTransform.transform('bar');
		});
		$('#transformArea').on('click', function () {
		    chartTransform.transform('area-spline');
		});

	// COMBINATION
		var chart = c3.generate({
			bindto: '#combination-chart',
		    data: {
		        columns: [
		            ['data1', 30, 20, 50, 40, 60, 50, 50, 60],
		            ['data2', 200, 130, 90, 240, 130, 220, 140, 180],
		            ['data3', 300, 200, 160, 400, 250, 250, 320, 280],
		            ['data4', 130, 120, 150, 140, 160, 150, 130, 100],
		            ['data5', 90, 70, 20, 50, 60, 100, 60, 50],
		        ],
		        type: 'bar',
		        types: {
		            data3: 'spline',
		            data5: 'area-spline',
		        },
		        groups: [
		            ['data1','data2']
		        ],
		        colors: {
		       		data1: '#313447',
		       		data2: '#1266F1',
		       		data3: '#ffc107',
		       		data4: '#ccc',
		       		data5: '#ff4081'
		     	}
		    },
		    bar: {
		      	width: {
		        	ratio: 0.4
		      	}
		    }
		});

	// BAR
		var chart = c3.generate({
			bindto: '#bar-chart',
		    data: {
		        columns: [
		            ['data1', 70, 160, 100, 120, 150, 120],
		            ['data2', 130, 120, 140, 200, 130, 80],
		            ['data3', 100, 90, 120, 160, 90, 100]
		        ],
		        type: 'bar',
		        colors: {
		       		data1: '#ff4081',
		       		data2: '#7C4DFF',
		       		data3: '#313447',
		     	}
		    },
		    bar: {
		        width: {
		            ratio: 0.5 // this makes bar width 50% of length between ticks
		        }
		        // or
		        //width: 100 // this makes bar width 100px
		    }
		    ,
		    tooltip: {
		        show: false
		    }
		});

	// AREA SPLINE
		var chart = c3.generate({
		    bindto: '#area-spline-chart',
		    data: {
		      	columns: [
		        	['data1', 30, 300, 140, 400, 220, 320],
		        	['data2', 240, 120, 280, 120, 175, 110]
		      	],
		      	type: 'area-spline',
		       	colors: {
	           		data1: '#ccc',
	           		data2: '#ffc107'
	         	}
		    }
		});

	// GAUGE
		var gaugechart = c3.generate({
			bindto: '#gauge-chart',
		    data: {
		        columns: [
		            ['data', 78.2]
		        ],
		        type : 'gauge'
		    },
		    gauge: {
		        label: {
		            // format: function(value, ratio) {
		            //     return value;
		            // },
		            show: false // to turn off the min/max labels.
		        },
				min: 0, // 0 is default, //can handle negative min e.g. vacuum / voltage / current flow / rate of change
				max: 100, // 100 is default
				units: ' %',
				width: 20 // for adjusting arc thickness
		    },
		    color: {
		        pattern: ['#D50000', '#313447', '#F6C600', '#009688'], // the three color levels for the percentage values.
		        threshold: {
					// unit: 'value', // percentage is default
					// max: 200, // 100 is default
					values: [30, 60, 90, 100]
		        }
		    },
		    size: {
		        height: 130
		    }
		});
		$('#refreshChart').on('click', function(){
			setTimeout(function () {
			    gaugechart.load({
			        columns: [['data', 10]]
			    });
			}, 1000);

			setTimeout(function () {
			    gaugechart.load({
			        columns: [['data', 50]]
			    });
			}, 2000);

			setTimeout(function () {
			    gaugechart.load({
			        columns: [['data', 70]]
			    });
			}, 3000);

			setTimeout(function () {
			    gaugechart.load({
			        columns: [['data', 0]]
			    });
			}, 4000);

			setTimeout(function () {
			    gaugechart.load({
			        columns: [['data', 100]]
			    });
			}, 5000);
		});

	// PIE
		var chart = c3.generate({
			bindto: '#pie-chart',
		    data: {
		        columns: [
		            ['data1', 8],
		            ['data2', 17],
		            ['data3', 43],
		            ['data4', 32],
		        ],
		        type : 'pie',
		        colors: {
	           		data1: '#ffc107',
	           		data2: '#ff4081',
	           		data4: '#313447',
	           		data3: '#1266F1'
	         	}
		    }
		});

	// DONUT
		var chart = c3.generate({
			bindto: '#donut-chart',
		    data: {
		        columns: [
		            ['data1', 8],
		            ['data2', 17],
		            ['data3', 43],
		            ['data4', 32],
		        ],
		        type : 'donut',
		        colors: {
	           		data1: '#ffc107',
	           		data2: '#ff4081',
	           		data4: '#313447',
	           		data3: '#1266F1'
	         	}
		    },
		    donut: {
		        title: "Data title",
		        width: "50",
		        label: {
				    show: true
				}
		    }
		});
		
	}, 100);

})(jQuery);