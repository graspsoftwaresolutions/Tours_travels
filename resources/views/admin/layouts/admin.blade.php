<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('admin.layouts.head')
</head>
    <body class="theme-mda light-skin ev-page" >
    	<div class="preloader-bg"></div>
		<div class="preloader-overlay"></div>
		<div class="main-wrapper side-menu">
			@include('admin.layouts.header')
			@include('admin.layouts.sidebar')
			<div class="menu-toggler-hide pos-left"><i class="toggler-hide-icon"></i></div>
			@section('main-content')
				@show
			 @include('admin.layouts.footer')
		</div>
		@include('admin.layouts.foot-script')
    </body>
</html>
