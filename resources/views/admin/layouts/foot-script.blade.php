<script src="{{ asset('public/assets/dist/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/bower.min.js') }}"></script>
<script src="{{ asset('public/web-assets/js/menu-settings.js') }}"></script>
<script type="text/javascript">
	var base_url = '{{ URL::to("/") }}';
	var image_url = '{{ asset("storage/app/") }}';
	var no_image_url = '{{ asset("public/assets/images/no_image.jpg") }}';
</script>
@section('footerSection')
@show
<!-- app -->
<script src="{{ asset('public/assets/dist/js/app.js') }}"></script>
@section('footerSecondSection')
@show
<script type="text/javascript">
	$(".alert").fadeTo(4000, 1000).slideUp(2500, function () {
	    $(".alert").slideUp(2500);
	});
	(function () {

$('.aside-panel-close').on('click', function() {
	$('.aside-panel').removeClass('open');
});

$(".ap-body").mCustomScrollbar({
	 theme:"dark",
	autoHideScrollbar: 2,
	autoExpandScrollbar:true
});

})();	
</script>