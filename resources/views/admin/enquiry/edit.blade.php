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
				<h1>Enquiry Information</h1>
				<ul class="breadcrumbs">
					<li>Enquiry</li>
					<li>Edit Enquiry</li>
				</ul>
			</div>			
                @php $row = $data['enq_view'][0]; @endphp
			<div class="page-content clearfix">
				<!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
					<form id="formValidate" class="wrapper-boxed paper p30 mt30" method="post" enctype="multipart/form-data" data-toggle="validator">
                  @csrf
						<h1 class="text-display-1">Edit Enquiry Information</h1>
                  <input type="hidden" name="enquiry_id" value="{{$row->id}}">
						   <div class="row">
							<div class="col-sm-6">
								<div class="form-group input-field label-float">
                        <input placeholder="Name" value="{{$row->name}}" class="clearable" id="name" name="name" autofocus type="text">
                           <label for="name" class="fixed-label">{{__('Name') }}<span style="color:red;"> *</span></label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">   
                              <input placeholder="Email" value="{{$row->email}}" class="clearable" id="email" name="email" type="email">
                              <label for="" class="fixed-label">{{__('Email') }}<span style="color:red;"> *</span></label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
                     <div class="select-row form-group">
                           <label for="country_id" class="block">{{__('Country Name') }}<span style="color:red;"> *</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="country_id" name="country_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select country')}}</option>
                              @php
                              $defcountry = CommonHelper::DefaultCountry();
                              @endphp
                              @foreach($data['country_view'] as $value)
                              <option value="{{$value->id}}" @php if($row->country_id == $value->id) echo 'selected' @endphp>
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
                           <label for="state_id" class="block">{{__('State Name') }}<span style="color:red;"> *</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="state_id" name="state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($statelist as $state)
                              <option value="{{ $state->id }}" @php if($row->state_id == $state->id) echo 'selected' @endphp>{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                        @php
                          $citylist = CommonHelper::getCityList($row->state_id);
                        @endphp
                   <div class="row">
							<div class="col-sm-6">
                     <div class="select-row form-group">
                           <label for="city_id" class="block">{{__('City Name') }}<span style="color:red;"> *</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="city_id" name="city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              @foreach ($citylist as $city)
                                  <option value="{{ $city->id }}" @if($row->city_id == $city->id) selected @endif>{{ $city->city_name }}</option>
                                  @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">   
                              <input placeholder="Address" class="clearable" value="{{$row->address}}" id="address" name="address" type="text">
                              <label for="address" class="fixed-label">{{__('Address') }}</label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
								<div class="form-group input-field label-float">
                        <div class="input-field label-float">
                           <label for="type" class="fixed-label">{{__('Type') }}<span style="color:red;"> *</span></label>
                           <select id="type" name="type" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select Type') }}</option>
                              <option value="general" @if($row->type=='general') selected @endif>General</option>
                              <option value="package" @if($row->type=='package') selected @endif>Package</option>
                           </select>
                              
                              <div class="input-highlight"></div>
                           </div>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
							</div><!-- ./col- -->

							<div class="col-sm-6">
								<div class="form-group input-field label-float">   
                        <input placeholder="phone" class="clearable" value="{{$row->phone}}" id="phone" name="phone" type="text">
                              <label for="phone" class="fixed-label">{{__('Phone') }}<span style="color:red;"> *</span></label>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->			
							</div><!-- ./col- -->	
                   </div><!-- /.row -->

                   

                   @if($row->type=='package')
                   <div class="row packages" >
                      <div class="col-sm-12" >
                        <div class="form-group">
                          <label for=""><strong>Select Packages:</strong></label>
                          <div class="row">  
                              @foreach($data['packages_view'] as $value)
                              <div class="col-md-3" >
                                   <div class="form-group">    
                                     <label class="checkbox-filled" for="package_{{ $value->id }}">
                                      <input type="checkbox" class="filled" name="package[]" id="package_{{ $value->id }}" value="{{ $value->id }}"  @if(in_array($value->id, $data['enquiry_packages'] )) checked @endif >
                                      <i class="highlight"></i>
                                      {{ $value->package_name }}
                                    </label>
                                  </div>                       
                              </div>
                               @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                   <div class="row">
							<div class="col-sm-6">
                     <div class="form-group">
                           <label for="message" class="fixed-label">{{__('Message') }}</label>
                           <textarea class="textarea-auto-resize"  placeholder="Enter Message" name="message" id="message">{{$row->message}}</textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div><!-- ./col- -->	
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label for="remarks" class="fixed-label">{{__('Remarks') }}</label>
                           <textarea class="textarea-auto-resize"  placeholder="Enter Remarks" name="remarks" id="remarks">{{$row->remarks}}</textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div><!-- ./col- -->	
					    </div><!-- /.row -->
                   <div class="row">
							<div class="col-sm-6">
                         <div class="form-group">
                           <label for="message" class="fixed-label">{{__('Status') }}</label>
                              <select name="enquiry_status" id="enquiry_status" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select Status') }}</option>
                              <option value="pending" @if($row->enquiry_status=='pending') selected @endif>Pending</option>
                              <option value="inprogress" @if($row->enquiry_status=='inprogress') selected @endif>Inprogress</option>
                              <option value="complete" @if($row->enquiry_status=='complete') selected @endif>Complete</option>
                              </select>
                           <p class="no-margin em"></p>
                        </div>
                     </div><!-- ./col- -->		  
                     <!-- <div class="col-sm-6">
                     <div class="form-group">
                     <label for="message" class="fixed-label">{{__('Status') }}</label>
                     <button type="submit" id="submittext" class="btn theme-accent waves-effect waves-light pull-right">Send Quotation</button> &nbsp;&nbsp;&nbsp;
                           <p class="no-margin em"></p>
                        </div>
                     </div> -->
                     <!-- ./col- -->
                     <input type="hidden" name="send_quotation_value" id="send_quotation_value">
                     
                     <div class="col-sm-6">
                        <div class="form-group">
                        
                          
                           <button type="submit" style="margin-top:22px;" id="send_quotation" class="btn waves-effect waves-light theme-accent clearable">Send Quotation</button> &nbsp;&nbsp;&nbsp;  
                           <p class="no-margin em"></p>
                        </div>
                     </div><!-- ./col- -->	
                  
                  
                  
                  </div><!-- /.row -->
                   <p><span style="color:red;"> Mandatory (*)</span></p>
                  
                  <div class="clearfix"></div> <br>
                   <div class="form-group clearfix">
                
							<button type="submit" id="submittext" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Update</button>
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

   $('#send_quotation').click(function(){
      var sen_quotation_value = 'yes';
      $('#send_quotation_value').val(sen_quotation_value);
      $("#formValidate").validate({
			rules: {
				"name": {
					required: true,
				},
            "email": {
					required: true,
               email : true,
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
            "type" : {
               required: true,
            },
            "phone" : {
               required: true,
               digits : true,
            },	
			},
			messages: {
				"name": {
					required: "Please, enter Name",
				},
            "email": {
					required: "Please, enter Email",
               email : "Please enter valid email",
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
            "type" : {
               required: "Please, choose type",
            },
            "phone" : {
               required: "Please, enter Phone Number",
               digits : "Numbers only",
            },
			},
			submitHandler: function (form) {
				$.ajax({
					type: 'post',
					url: "{{ route('enquiry_save') }}",
					data: $('form').serialize(),
					success: function(response){
						if(response)
						{
							window.location.href = "{{route('enquiry.new')}}";
						}
					}
			});
         }
		});

   });

   $('#type').change(function(){
     var type =   $('#type').val();
    
      if(type == 'package')
      {
         $('.packages').show();
        
      }
      else{
         $('.packages').hide();
      }
   });

   $("#enquiry-menu").addClass('active');
   $("#enquiries_sidebar_li_id").addClass('active');
   $("#formValidate").validate({
			rules: {
				"name": {
					required: true,
				},
            "email": {
					required: true,
               email : true,
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
            "type" : {
               required: true,
            },
            "phone" : {
               required: true,
               digits : true,
            },	
			},
			messages: {
				"name": {
					required: "Please, enter Name",
				},
            "email": {
					required: "Please, enter Email",
               email : "Please enter valid email",
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
            "type" : {
               required: "Please, choose type",
            },
            "phone" : {
               required: "Please, enter Phone Number",
               digits : "Numbers only",
            },
			},
			submitHandler: function (form) {
				$.ajax({
					type: 'post',
					url: "{{ route('enquiry_save') }}",
					data: $('form').serialize(),
					success: function(response){
						if(response)
						{
							window.location.href = "{{route('enquiry.new')}}";
						}
					}
			});
			// for demo
			//alert('Form Saved succesfully'); // for demo
		//	return false; // for demo
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