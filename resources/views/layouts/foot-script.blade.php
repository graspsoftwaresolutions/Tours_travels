
<!-- Page Scripts Starts -->
<script src="{{ asset('public/web-assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('public/web-assets/js/jquery.colorpanel.js') }}"></script>

<script src="{{ asset('public/web-assets/js/jquery.magnific-popup.min.js') }}"></script>

<script src="{{ asset('public/web-assets/js/bootstrap.min.js') }}"></script>

<script src="{{ asset('public/web-assets/js/jquery.flexslider.js') }}"></script>

<script src="{{ asset('public/web-assets/js/bootstrap-datepicker.js') }}"></script>

<script src="{{ asset('public/web-assets/js/owl.carousel.min.js') }}"></script>

<script src="{{ asset('public/web-assets/js/custom-navigation.js') }}"></script>

<script src="{{ asset('public/web-assets/js/custom-flex.js') }}"></script>

<script src="{{ asset('public/web-assets/js/custom-owl.js') }}"></script>

<script src="{{ asset('public/web-assets/js/custom-date-picker.js') }}"></script>

<script src="{{ asset('public/web-assets/js/custom-video.js') }}"></script>

<script src="{{ asset('public/web-assets/js/popup-ad.js') }}"></script>
        <!-- Page Scripts Ends -->
<script type="text/javascript">
	var base_url = '{{ URL::to("/") }}';
	var image_url = '{{ asset("storage/app/") }}';
	var no_image_url = '{{ asset("public/assets/images/no_image.jpg") }}';
</script>
@section('footerSection')
@show
<!-- app -->
<!-- <script src="{{ asset('public/assets/dist/js/app.js') }}"></script> -->
@section('footerSecondSection')
@show
<script type="text/javascript">
	$(".alert").fadeTo(4000, 1000).slideUp(2500, function () {
	    $(".alert").slideUp(2500);
	});
</script>