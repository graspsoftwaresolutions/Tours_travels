<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('layouts.head')
</head>
    <body class="theme-mda light-skin ev-page" >
    	<div class="preloader-bg"></div>
		<div class="preloader-overlay"></div>
		<div class="main-wrapper side-menu">
			@include('layouts.header')
			@include('layouts.sidebar')
			<div class="menu-toggler-hide pos-left"><i class="toggler-hide-icon"></i></div>
			@section('main-content')
				@show
			 @include('layouts.footer')
		</div>
		@include('layouts.foot-script')
    </body>
</html>
