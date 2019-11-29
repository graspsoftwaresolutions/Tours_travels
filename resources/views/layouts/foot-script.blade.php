<script src="{{ asset('public/assets/dist/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/bower.min.js') }}"></script>
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
</script>