<!DOCTYPE html>
<html class="no-js">

<head>

<style>
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('{{ asset("public/web-assets/images/loader.gif") }}') 50% 50% no-repeat rgb(249,249,249);
    opacity: .8;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<!-- <meta charset='UTF-8'>
	
	<title>Simple Loader</title>
	
	<style>
		/* This only works with JavaScript, 
		   if it's not present, don't show loader */
		.no-js #loader { display: none;  }
		.js #loader { display: block; position: absolute; left: 100px; top: 0; }
	</style>
	
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	
	
	<script src="https://github.com/Modernizr/Modernizr/raw/master/modernizr.js"></script> -->

		
        <script type="text/javascript">
            $(window).load(function() {
                $(".loader").fadeOut("slow");
            });
            </script>
	
</head>

<body>
</html>