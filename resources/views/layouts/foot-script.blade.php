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
	$(".alert").fadeTo(3000, 1000).slideUp(1000, function () {
	    $(".alert").slideUp(1000);
	});
</script>