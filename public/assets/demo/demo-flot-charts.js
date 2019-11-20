$(document).ready(function() {

// REALTIME CHART

    // We use an inline data source in the example, usually data would
    // be fetched from a server
    var data = [], totalPoints = 200;
    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                    y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values
        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]]);
        }

        return res;
    }

    var interactive_plot = $.plot("#interactive", [getRandomData()], {
        grid: {
            borderWidth: 0,
            tickColor: "#ccc"
        },
        series: {
            shadowSize: 0, // Drawing is faster without shadows
            color: "#22a7f0"
        },
        lines: {
            fill: true, //Converts the line chart to area chart
            color: "#3c8dbc"
        },
        yaxis: {
            min: 0,
            max: 100,
            show: true
        },
        xaxis: {
            show: false
        }
    });

    var updateInterval = 400; //Fetch data ever x milliseconds
    var realtime = "on"; //If == to on then fetch data every x seconds. else stop fetching
    function update() {

        interactive_plot.setData([getRandomData()]);

        // Since the axes don't change, we don't need to call plot.setupGrid()
        interactive_plot.draw();
        if (realtime === "on")
            setTimeout(update, updateInterval);
    }

    // Realtime data fetching
    if (realtime === "on") {
        update();
    };

    // on off switch
	$("#chartRealtime").on('change', function(e) {		
		if ((this).checked) {
			realtime = "on";
			update();
		} else {
			realtime = "off";
		}
	});

// BAR CHART
	

    var bar_data = {
        data: [[0, 4], [1, 3], [2, 5], [3, 7], [4, 8], [5, 10], [6, 11], [7, 9], [8, 5], [9, 12], [10, 10]],
        color: "#1266F1"
    };
    $.plot("#barChart", [bar_data], {
        grid: {
            borderWidth: 0,
            tickColor: "#ccc"
        },
        series: {
            bars: {
                show: true,
                align: "center"
            }
            
        },
        xaxis: {
            mode: "categories",
            tickLength: 0
        }
    });

// LINE CHART    
    var lineData = [[20,20], [42,60], [54, 40], [80,80]];

    $.plot("#lineChart", [lineData], {
        grid: {
            borderWidth: 0,
            hoverable: true //important! flot.tooltip requires this
        },
        tooltip: {
			show: true,
			content: "sales: %y"
		},
        series: {
            shadowSize: 0, // Drawing is faster without shadows
            color: "#1266F1",
            curvedLines: {
                      apply: true,
                      active: true,
                      monotonicFit: true
             }
        },
        lines: {
            fill: false
        },
        yaxis: {
            show: true
        },
        xaxis: {
            show: false
        }
    });

// Area CHART

	var d1 = [[1262304000000, 26007], [1264982400000, 20057], [1267401600000, 24434], [1270080000000, 28982], [1272672000000, 30602], [1275350400000, 26826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
	var d2 = [[1262304000000, 2000], [1264982400000, 2700], [1267401600000, 3905], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];
	 
	var data1 = [
	    { data: d1, color: '#bbb' },
	    { data: d2, color: '#ffd740' }
	];

	$.plot($("#areaChart"), data1, {
	    xaxis: {
	        mode: "time",
	        tickSize: [1, "month"],
	        monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	        tickLength: 0,
	    },
	    yaxis: {
	        show: false
	    },
	     xaxis: {
	        show: false
	    },
	    series: {
	        lines: {
	            show: true,
	            fill: true
	        },
	        points: {
	            show: false
	        },
	        curvedLines: {
				apply: true,
				active: true,
				monotonicFit: true
            }
	    },
	    grid: {
	        borderWidth: 0,
	        hoverable: true
	    }
	});


// DONUT CHART

    var donutData = [
        {label: "Desktop", data: 50, color: "#1266F1"},
        {label: "Tablet", data: 30, color: "#FFC107"},
        {label: "Phone", data: 20, color: "#E91E63"}
    ];
    $.plot("#donutChart", donutData, {
        series: {
            pie: {
                show: true,
                radius: 1,
                innerRadius: 0.5,
                label: {
                    show: true,
                    radius: 2 / 3,
                    formatter: labelFormatter,
                    threshold: 0.1
                }

            }
        },
        legend: {
            show: false
        }
    });

    function labelFormatter(label, series) {
        return "<div style='font-size:12px; text-align:center; padding:8px; color: #fff; font-weight: 600;'>"
                + label
                + "<br/>"
                + Math.round(series.percent) + "%</div>";
    }

// PIE CHART

    var piedata = [
	    { label: "Phone", data: 1, color: "#E91E63"},
	    { label: "Tablet", data: 3, color: "#FFC107"}, 
	    { label: "Desktop", data: 9, color: "#1266F1"}
    ];

    var plotObj = $.plot($("#pieChart"), piedata, {
        series: {
	        pie: {
	            show: true,
	            radius: 1,
            	tilt: 0.5,// makes the chart tilt
            	label: {
	                show: true,
	                radius: 1,
	                formatter: labelFormatter,
	                background: {
	                    opacity: 0.6
	                }
	            },
	        }
	    },
	    legend: {
	        show: false
	    }
    });
});