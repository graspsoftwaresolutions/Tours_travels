(function($){

	//INITIALIZE SPARKLINE CHARTS
    $(".sparkline").each(function() {
        var $this = $(this);
        $this.sparkline('html', $this.data());
    });

    
    drawDocSparklines();


    function drawDocSparklines() {

        // Area chart
        $('#area').sparkline('html',
                {height: '1.5em', width: '8em', lineColor: '#0097a7', fillColor: '#0097a7',
                    minSpotColor: false, maxSpotColor: false, spotColor: false});

        // Line chart
        $('#line').sparkline('html', {lineColor: '#0097a7', fillColor: false,  minSpotColor: false, maxSpotColor: false, spotColor: false});

        // Pie charts
        $('.sparkpie').sparkline('html', {type: 'pie', height: '1.2em'});

        // Discrete charts
        $('#discrete').sparkline('html',
                {type: 'discrete', lineColor: '#0097a7', thresholdColor: 'red', thresholdValue: 4});

        // Box plots
        $('.sparkboxplot').sparkline('html', {type: 'box'});

        // Bullet charts
        $('.sparkbullet').sparkline('html', {type: 'bullet'});

        // Bar charts using inline values
        $('.sparkbar').sparkline('html', {type: 'bar', barColor: '#0097a7'});

        // Bar composite chart
        $('#compositebar').sparkline('html', {type: 'bar', barColor: '#0097a7'});
        $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7],
                {composite: true, fillColor: false, lineColor: 'red'});

        // Tri-state charts using inline values
        $('.sparktristate').sparkline('html', {type: 'tristate'});
        $('.sparktristatecols').sparkline('html',
                {type: 'tristate', colorMap: {'-2': '#fa7', '2': '#44f'}});
    }

})(jQuery);