<title>Index</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="Tours and Travels">
        <meta name="keywords" content="Tours and Travels">
        <meta name="author" content="Tours and Travels">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" href="{{ asset('public/assets/images/logo.png') }}">
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/images/logo.png') }}">
        <!-- Google Fonts -->	
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

        <!-- Bootstrap Stylesheet -->	
        <link href="{{ asset('public/web-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
           
        <!-- Font Awesome Stylesheet -->
        <link href="{{ asset('public/web-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
            
        <!-- Custom Stylesheets -->	
        <link href="{{ asset('public/web-assets/css/style.css') }}" rel="stylesheet" type="text/css">    
        <link href="{{ asset('public/web-assets/css/orange.css') }}" rel="stylesheet" id="cpswitch" type="text/css">
        

        <link href="{{ asset('public/web-assets/css/responsive.css') }}" rel="stylesheet" type="text/css">
        
    
        <!-- Owl Carousel Stylesheet -->
        <link href="{{ asset('public/web-assets/css/owl.carousel.css') }}" rel="stylesheet" type="text/css">
       

        <link href="{{ asset('public/web-assets/css/owl.theme.css') }}" rel="stylesheet" type="text/css">
        
        
        <!-- Flex Slider Stylesheet -->
        <link href="{{ asset('public/web-assets/css/flexslider.css') }}" rel="stylesheet" type="text/css">
        
        
        <!--Date-Picker Stylesheet-->
        <link href="{{ asset('public/web-assets/css/datepicker.css') }}" rel="stylesheet" type="text/css">
        
        
        <!-- Magnific Gallery -->
        <link href="{{ asset('public/web-assets/css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
       
        
        <!-- Color Panel -->
        <link href="{{ asset('public/web-assets/css/jquery.colorpanel.css') }}" rel="stylesheet" type="text/css">
        <style type="text/css">
            .main-navbar .navbar-header {
                position: relative;
                margin: 10px;
            }
        </style>
    @section('headSection')
    @show
    <style>
			body{
				font-family: sans-serif !important;
			}
            #loader {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75) url('{{ asset("public/assets/images/spinner.gif") }}') no-repeat center center;
            z-index: 10000;
            }
			#footer .widget-title {
				font-size: 20px;
				font-weight: bold;
				margin-bottom: 3.3rem;
				margin-top: 0;
				text-transform: uppercase;
			}
		</style>
        @section('headSection')
    @show

    


