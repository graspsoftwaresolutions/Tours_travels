@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
   .form-group {
   margin-bottom: 10px !important;
   }
   /* .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
   width: 250px !important;
   }*/
   .error{
   color: #A94442 !important;
   }
   .button-close{
   z-index: 99999;
   position: absolute;
   top: -40px;
   left: 89px;
   /* opacity: 0; */
   font-size: 13px;
   min-width: 100%;
   max-width: 100%;
   padding: 2em 1em;
   text-align: center;
   color: rgba(0, 0, 0, 0.9);
   line-height: 150%;
   }
   .dropdown-menu li {
   padding: 0 20px !important;
   }
</style>
@endsection
@section('main-content')	
<section class="content-wrapper">

	<!-- =========================================================== -->
	<!-- Start page content  -->
	<!-- =========================================================== -->

		<div class="aside-panel"></div>

		<div class="container-fluid">			

			<div class="page-header">
				<h1>Tax Information</h1>
				<ul class="breadcrumbs">
					<li>Tax</li>
					<li>Add Tax</li>
				</ul>
			</div>			
                @php              
                $row = $data; 
                 @endphp
			<div class="page-content clearfix">
				<!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
					<form id="formValidate" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
						<h6 class="text-display-1">Tax Information</h6>
                  <input type="hidden" name="tax_id" value="{{ isset($row->id) ? $row->id : ' '}}">
						   <div class="row">
							<div class="col-sm-6">
								<div class="form-group input-field label-float"> 
                        <input placeholder="Name" class="clearable"  value="{{ isset($row->tax_name) ? $row->tax_name : ''}}" id="tax_name" name="tax_name" autofocus type="text">
                           <label for="tax_name" class="fixed-label">{{__('Tax Name') }}*</label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">   
                              <input placeholder="Tax Value" class="clearable" value="{{ isset($row->tax_value) ? $row->tax_value : ''}}" id="tax_value" name="tax_value" type="text">
                              <label for="tax_value" class="fixed-label">{{__('Tax Value') }}</label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   
                  
                   <br>
                   <div class="row">
							
						<div class="form-group clearfix">
							<button type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
						</div><!-- /.form-group -->
                 
					</form>
					
				<!--</div> --><!-- /.row -->
			</div><!-- /.page-content -->

			<a id="back-to-top" href="#" class="btn-circle theme back-to-top">
				<i class="mdi mdi-chevron-up medium"></i>
			</a>
				
		</div><!-- /.container-fluid -->

	<!-- =========================================================== -->
	<!-- End page content  -->
	<!-- =========================================================== -->

	</section> <!-- /.content-wrapper -->

<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script>
$(document).ready(function(){
    
    $("#settings-menu").addClass('active');
    $("tax_sidebar_li_a_d").addClass('active');
   $("#formValidate").validate({
			rules: {
				"tax_name": {
					required: true,
				},
                "tax_value": {
					required: true,
                    
				},
            
			},
			messages: {
				"tax_name": {
					required: "Please, enter Name",
                    
				},
            "tax_value": {
					required: "Please, enter Tax Value",
                   
				},
			},
			submitHandler: function (form) {
				$.ajax({
					type: 'post',
					url: "{{ route('tax_save') }}",
					data: $('form').serialize(),
					success: function(response){
						if(response)
						{ 
                        
						window.location.reload();
						}
					}
			});
			// for demo
			//alert('Form Saved succesfully'); // for demo
		//	return false; // for demo
         }
		});

});



</script>
@endsection