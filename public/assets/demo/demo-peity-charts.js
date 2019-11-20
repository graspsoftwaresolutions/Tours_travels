(function($){

	//Peity
	$(".bar").peity("bar", {
				  fill: ["#0097a7", "#ccc"],
				  width: 80,
				  height: 18 
				});

	$(".line").peity("line", {
				  fill: "",
				  stroke: "#0097a7",
  				  strokeWidth: 1.5,
				  width: 80,
				  height: 18 
				});

	$(".area").peity("line", {
				  fill: "#e0e0e0",
				  stroke: "#0097a7",
				  strokeWidth: 1.5,
				  width: 80 
				});

	$(".pie").peity("pie", {
				  fill: ["#0097a7", "#ccc", "#FFC107"]
				});

	$(".donut").peity("donut", {
				  fill: ["#0097a7", "#ccc", "#FFC107"]
				});

	$(".data-attributes span").peity("donut")

})(jQuery);