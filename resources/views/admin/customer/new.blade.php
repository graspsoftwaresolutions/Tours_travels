@extends('admin.layouts.admin')
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
				<h1>Customer Information</h1>
				<ul class="breadcrumbs">
					<li>Customer</li>
					<li>Add Customer</li>
				</ul>
			</div>			

			<div class="page-content clearfix">
				<!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
					<form id="formValidate" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
						@csrf
                  <h1 class="text-display-1">Customer Information</h1>
                       <input type="hidden" name="customer_id">
						   <div class="row">
							<div class="col-sm-6">
								<div class="form-group input-field label-float">
                        <input placeholder="Name" class="clearable" id="name" name="name" autofocus type="text">
                           <label for="name" class="fixed-label">{{__('Name') }}<span style="color:red">*</span></label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">   
                              <input placeholder="Email" class="clearable" id="email" name="email" type="email">
                              <label for="" class="fixed-label">{{__('Email') }}<span style="color:red">*</span></label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
                     <div class="select-row form-group">
                           <label for="country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="country_id" name="country_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select country')}}</option>
                              @php
                              $defcountry = CommonHelper::DefaultCountry();
                              @endphp
                              @foreach($data['country_view'] as $value)
                              <option value="{{$value->id}}" @if($defcountry==$value->id) selected @endif >
                              {{$value->country_name}}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
							</div><!-- ./col- -->
                     @php
                     $statelist = CommonHelper::getStateList($defcountry);
                     @endphp
							<div class="col-sm-6">
                     <div class="select-row form-group">
                           <label for="state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="state_id" name="state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($statelist as $state)
                              <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
                     <div class="select-row form-group">
                           <label for="city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="city_id" name="city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              <!--  @foreach ($data['state_view'] as $state)
                                 <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                 @endforeach -->
                           </select>
                           <div class="input-highlight"></div>
                        </div>
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">   
                              <input placeholder="Address One" class="clearable" id="address_one" name="address_one" type="text">
                              <label for="address_one" class="fixed-label">{{__('Address One') }}</label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
								<div class="form-group input-field label-float">
                        <div class="input-field label-float">
                           <input placeholder="Address Two" class="clearable" id="address_two" name="address_two" type="text">
                              <label for="address_two" class="fixed-label">{{__('Address Two') }}</label>
                           </select>
                              
                              <div class="input-highlight"></div>
                           </div>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">
                                    <input placeholder="Zipcode" class="clearable" id="zipcode" name="zipcode" type="text">
                                    <label for="phone" class="fixed-label">{{__('Zipcode') }}<span style="color:red">*</span></label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
                     <div class="form-group input-field label-float">
                                <input placeholder="phone" class="clearable" id="phone" name="phone" type="text">
                              <label for="phone" class="fixed-label">{{__('Phone') }}<span style="color:red">*</span></label>
                           <p class="no-margin em"></p>
                        </div>
                     </div><!-- ./col- -->	
                    
					    </div><!-- /.row -->
                   <p><span style="color:red;    margin-left: 0px;"> Mandatory (*)</span></p>
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
   
   $("#formValidate").validate({
			rules: {
				"name": {
					required: true,
				},
            "email": {
					required: true,
               email : true,
               remote: {
                url: "{{ url('/customer_emailexists')}}",
                type: "post",
                data: {
                     email: function() {
                        return $("#email").val();
                    },
                    _token: "{{csrf_token()}}",
                    email: $(this).data('email')
                },  
            },
				},
            "country_id" : {
               required: true,
            },
            "state_id" : {
               required: true,
            },
            "city_id" : {
               required: true,
            },
            "zipcode" : {
               required: true,
               digits : true,
            },
            "phone" : {
               required: true,
               digits : true,
               remote: {
                url: "{{ url('/customer_phoneexists')}}",
                type: "post",
                data: {
                    phone: function() {
                        return $("#phone").val();
                    },
                    _token: "{{csrf_token()}}",
                    phone: $(this).data('phone')
                },  
            },
            },	
			},
			messages: {
				"name": {
					required: "Please, enter Name",
				},
            "email": {
					required: "Please, enter Email",
               email : "Please enter valid email",
               remote: "Email Already Exists",
				},
            "country_id" : {
               required: "Please, choose country",
            },
            "state_id" : {
               required: "Please, choose state",
            },
            "city_id" : {
               required: "Please, choose city",
            },
            "zipcode" : {
               required: "Please, Enter Zipcode",
               digits : "Numbers only",
            },
            "phone" : {
               required: "Please, enter Phone Number",
               digits : "Numbers only",
               remote: "Phone Number Already Exists",
            },
			},
			submitHandler: function (form) {
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
               }
            });
				$.ajax({
					type: 'post',
					url: "{{ route('customer_save') }}",
					data: $('form').serialize(),
					success: function(response){
						if(response)
						{ 
								window.location.href = "{{route('customer.new')}}";
						}
					}
			});
         }
		});

});
    $('#overview').summernote({
      height: 200,   //set editable area's height
      placeholder: 'Write here...'
    });
    $('#additional_info').summernote({
      height: 200,   //set editable area's height
      placeholder: 'Write here...'
    });
    $(function() {
      $('select[name=country_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();
   
          $.get(url, function(data) {
              $('#state_id').empty('');
              $("#state_id").append("<option value=''>Select</option>");
              $("#state_id").selectpicker("refresh");
              //var select = $('form select[name=state_id]');
   
             // select.empty();
              //$("#state_id").append("<option value=''>Select</option>");
              $.each(data, function(key, value) {
                  $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
                      '</option>');
              });
               $("#state_id").selectpicker("refresh");
          });
      });
   
      $('select[name=state_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
          $.get(url, function(data) {
              $('#city_id').empty('');
              $("#city_id").append("<option value=''>Select</option>");
              $("#city_id").selectpicker("refresh");
              //var select = $('form select[name=state_id]');
   
             // select.empty();
              //$("#state_id").append("<option value=''>Select</option>");
              $.each(data, function(key, value) {
                  $("#city_id").append('<option value=' + value.id + '>' + value.city_name +
                      '</option>');
              });
               $("#city_id").selectpicker("refresh");
          });
      });
   });
</script>
@endsection