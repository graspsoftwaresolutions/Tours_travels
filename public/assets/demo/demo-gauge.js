$(document).ready(function() {

    // set timeout on drawing the gauges to first receive the "themecolor" value.
    setTimeout(drawGauges, 100 );

    function drawGauges() {

      	// Defaults example
      	var dflt = {
            min: 0,
            max: 200
        }

        var gg1 = new JustGage({
            id: 'gg1',
            value: 125,
            title: 'javascript call',
            defaults: dflt
        });

        var gg2 = new JustGage({
            id: 'gg2',
            title: 'data-attributes',
            defaults: dflt
        });

        // Colors
        var gclrs1 = new JustGage({
            id: 'gclrs1',
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            levelColors: [themeColorCode],
        });

        var gclrs2 = new JustGage({
            id: 'gclrs2',
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            gaugeColor: "#fff",
            levelColors: [themeColorCode],
            hideInnerShadow: true,
        });

        // Responsive example
        var gr1 = new JustGage({
            id: "gr1",
            value: getRandomInt(0, 1000),
            min: 0,
            max: 1000,
            levelColors: [themeColorCode],
            relativeGaugeSize: true
        });

        var gr2 = new JustGage({
            id: "gr2",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            levelColors: [themeColorCode],
            relativeGaugeSize: true,
            gaugeWidthScale: 0.6
        });

        // Shape example
        var gs1 = new JustGage({
            id: "gs1",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            levelColors: [themeColorCode],
            relativeGaugeSize: true,
            donut: true,
            gaugeWidthScale: 0.3
        });

        var gs2 = new JustGage({
            id: "gs2",
            value: getRandomInt(0, 100),
            min: 0,
            max: 100,
            levelColors: [themeColorCode],
            relativeGaugeSize: true,
            gaugeWidthScale: 0.5
        });

        // Pointer examples
        var gp1 = new JustGage({
            id: 'gp1',
            value: 65,
            min: 0,
            max: 100,
            symbol: '%',
            pointer: true,
            pointerOptions: {
                color: '#8e8e93'
            },
            gaugeWidthScale: 0.6,
            customSectors: [{
                color: '#ff0000',
                lo: 50,
                hi: 100
            }, {
                color: '#009688',
                lo: 0,
                hi: 50
            }],
            counter: true
        });

        var gp2 = new JustGage({
            id: 'gp2',
            value: 45,
            min: 0,
            max: 100,
            symbol: '%',
            pointer: true,
            pointerOptions: {
                toplength: -15,
                bottomlength: 10,
                bottomwidth: 12,
                color: '#8e8e93',
                stroke: '#ffffff',
                stroke_width: 3,
                stroke_linecap: 'round'
            },
            gaugeWidthScale: 0.6,
            counter: true
        });

        var gp3 = new JustGage({
            id: 'gp3',
            value: 40,
            min: 0,
            max: 100,
            symbol: '%',
            donut: true,
            pointer: true,
            gaugeWidthScale: 0.4,
            pointerOptions: {
                toplength: 10,
                bottomlength: 10,
                bottomwidth: 8,
                color: '#8e8e93'
            },
            customSectors: [{
                color: "#009688",
                lo: 50,
                hi: 100
            }, {
                color: "#ff0000",
                lo: 0,
                hi: 50
            }],
            counter: true
        });

        var gp4 = new JustGage({
            id: 'gp4',
            value: 70,
            min: 0,
            max: 100,
            symbol: '%',
            levelColors: [themeColorCode],
            pointer: true,
            pointerOptions: {
                toplength: 8,
                bottomlength: -20,
                bottomwidth: 6,
                color: '#8e8e93'
            },
              gaugeWidthScale: 0.1,
              counter: true
        });

        document.getElementById('gauge_refresh').addEventListener('click', function() {
            gp1.refresh(getRandomInt(0, 100));
            gp2.refresh(getRandomInt(0, 100));
            gp3.refresh(getRandomInt(0, 100));
            gp4.refresh(getRandomInt(0, 100));
        });

        // Custom value renderer
        var gc1 = new JustGage({
            id: "gc1",
            value: 50,
            min: 0,
            max: 100,
            title: "Target",
            label: "temperature",
            pointer: true,
            pointerOptions: {
                toplength: 14,
                bottomlength: 30,
                bottomwidth: 4,
                color: '#8e8e93'
            },
            gaugeWidthScale: 0.7,
            textRenderer: function(val) {
                if (val < 50) {
                    return 'Cold';
                } else if (val > 50) {
                    return 'Hot';
                } else if (val === 50) {
                    return 'OK';
                }
            }
        });

        document.getElementById('gc1_refresh').addEventListener('click', function() {
            gc1.refresh(getRandomInt(0, 100));
            return false;
        });
    }

});