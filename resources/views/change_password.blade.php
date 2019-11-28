@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')	
	<section class="content-wrapper">

	<!-- =========================================================== -->
	<!-- Start page content  -->
	<!-- =========================================================== -->
		<div class="aside-panel"></div>				
	
		<div class="container-fluid">
			<div class="page-header">
				<h1>Change Password</h1>
				<!--ul class="breadcrumbs">
					<li>Dashboard</li>
					
				</ul-->
			</div>

		</div><!-- /.container-fluid -->
		<div class="row">
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-6">
				<div class="paper p40 pt20">

					<h4 class="text-headline text-center">Change Password</h4>

					@include('includes.messages')
					<form method="POST" id="FormChangePasswordValidate" action="{{ route('changePassword') }}">
						@csrf
					<div class="col-md-12">
						<div class="input-field " style="">
							NAME : {{ Auth::user()->name }}
						</div>
						<div class="input-field " >
							EMAIL : {{ Auth::user()->email }}
						</div>
					</div>
					<div class="clearfix"></div>
					<hr>

					<div class="input-field label-float {{ $errors->has('current-password') ? ' has-error' : '' }}">
						<input placeholder="Current Password" class="clearable" id="currentpassword" name="currentpassword" type="password">
						<label for="currentpassword" class="fixed-label">{{ __('Current Password') }}*</label>
						<div class="input-highlight"></div>
					</div>

					<div class="input-field label-float {{ $errors->has('new-password') ? ' has-error' : '' }}">
						<input placeholder="New Password" class="clearable" id="password" name="password" type="password">
						<label for="password" class="fixed-label">{{ __('New Password') }}*</label>
						<div class="input-highlight"></div>
					</div>


					<div class="input-field label-float ">
						<input placeholder="Confirm Password" class="clearable" id="password_confirmation" name="password_confirmation" type="password">
						<label for="password_confirmation" class="fixed-label">{{ __('Confirm Password') }}*</label>
						<div class="input-highlight"></div>
					</div>
					<div class="clearfix"></div>
					<div class="row">
						<br>
					</div>
					<div class="form-group clearfix">
						<button type="submit" class="btn theme-accent pull-right">{{ __('Update Password') }}</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		

	<!-- =========================================================== -->
	<!-- End page content  -->
	<!-- =========================================================== -->		

		<!--footer class="page-footer toolbar">
        	<p class="hidden-xs pull-left pl20 pr12">Follow us</p>
			<a href="#!"><i class="icon action mdi mdi-twitter"></i></a>
			<a href="#!"><i class="icon action mdi mdi-facebook"></i></a>
			<a href="#!"><i class="icon action mdi mdi-linkedin"></i></a>
        	<p class="pull-right pr20">© 2016 YourApp</p>
		</footer-->
	</section> <!-- /.content-wrapper -->
@endsection
		
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script>
	$("#dashboard_sidebar_li_id").addClass('active');
	$("#FormChangePasswordValidate").validate({
        rules: {
            currentpassword:{
                required: true,
			},
			password:{
                required: true,
			},
			password_confirmation:{
                required: true,
            },
        },
        //For custom messages
        messages: {
            
			currentpassword: {
                required: '{{__("Please enter Current Password") }}', 
			},
			password: {
                required: '{{__("Please enter Password") }}', 
			},
			password_confirmation: {
                required: '{{__("Please enter Password Confirmation") }}', 
            },
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error)
        } else {
            error.insertAfter(element);
        }
        }
    });
</script>
@endsection