<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	@include('layouts.head')
</head>
   
	<body id="main-homepage">	
		<!--========== COLOR-PANEL ==========-->
        <div id="colorPanel" class="colorPanel">
            <a id="cpToggle" href="{{asset('public/web-assets/css/') }}"></a>
            <ul></ul>
		</div>
		<!-- end colorPanel -->
		@include('layouts.header')
		@include('layouts.sidebar')
		@section('main-content')
		@show
		@include('layouts.footer')
		@include('layouts.foot-script')
	</body>
</html>
