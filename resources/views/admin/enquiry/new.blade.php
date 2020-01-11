@extends('admin.layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/sweet_alert.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
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
					<li>Add Enquiry</li>
				</ul>
			</div>			

			<div class="page-content clearfix">
				<!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
					<form id="formValidate" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
               @csrf   
               <h1 class="text-display-1">Enquiry Information</h1>
                  <input type="hidden" name="enquiry_id">
						   <div class="row">
							
							
							<div class="col-sm-6">
                                    <div class="form-group input-field label-float">
                                       <label for="customer_name" class="block fixed-label">{{__('Search Customer Name') }}<span style="color:red">*</span></label>                 
                                       
                                       <input class="clearable" id="customer_name" name="customer_name"  type="text" placeholder="Search Customer" autocomplete='off'>
                                       <input type="text" class="hide" name="customer_id" id="customer_id">
                                         
                                       <div class="input-highlight"></div>
                                    </div>
                                 </div>

							  <div class="col-sm-6">
                                    <div class="customer_add">
                                      <div class="form-group input-field label-float">
                                         <button type="button" class="btn theme modal-trigger" data-toggle="modal" data-target="#defaultModal">
                                         Add Customer
                                         </button>
                                         <div class="input-highlight"></div>
                                      </div>
                                      <!-- /.form-group -->     
                                   </div>
                                </div>
					    </div><!-- /.row -->
						<div class="row customer_details">
                               <!-- /.row -->
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <input  id="cus_state" readonly name="cus_state"  type="text" placeholder="Customer State"  autocomplete='off'>
                                     <label  for="address_one" class="fixed-label">{{__('State') }}</label>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->     
                               </div>
                               <!-- ./col- -->  
                               <!-- /.row -->  
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <input id="cus_city" readonly name="cus_city"  type="text" placeholder="Customer City"  autocomplete='off'>
                                     <label for="address_one" class="fixed-label">{{__('City') }}</label>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->     
                               </div>
                               <!-- ./col- -->  
                               <!-- /.row -->      
                               <div class="col-sm-6">
                                  <div class="select-row form-group">
                                     <label for="cus_email"  class="block">{{__('Customer Email') }}<span style="color:red">*</span></label>                 
                                     <!-- To validate the select add class "select-validate" -->     
                                     <input id="cus_email" readonly name="cus_email"  type="text" placeholder="Customer Email"  autocomplete='off'>
                                     <div class="input-highlight"></div>
                                  </div>
                               </div>
                               <!-- ./col- -->  
                               <div class="col-sm-6">
                                  <div class="select-row form-group">
                                     <label for="cus_phone" class="block">{{__('Customer Phone') }}<span style="color:red">*</span></label>                 
                                     <input readonly id="cus_phone" name="cus_phone"  type="text" placeholder="Customer Phone"  autocomplete='off'>
                                     <div class="input-highlight"></div>
                                  </div>
                               </div>
                               <!-- ./col- -->
                               <div class="clearfix"></div>
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input readonly id="cus_zipcode"  name="cus_zipcode"  type="text" placeholder="Customer Zipcode"  autocomplete='off'>
                                        <label for="cus_zipcode"  class="fixed-label">{{__('Zipcode') }}</label>
                                        <div class="input-highlight"></div>
                                     </div>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->
                               </div>
                               <!-- ./col- -->
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input readonly id="address_one"  name="address_one"  type="text" placeholder="Address One"  autocomplete='off'>
                                        <label for="address_one" class="fixed-label">{{__('Address One') }}</label>
                                        <div class="input-highlight"></div>
                                     </div>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->
                               </div>
                               <!-- ./col- -->
                               <div class="clearfix"></div>
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input readonly id="address_two"  name="address_two"  type="text" placeholder="Address two"  autocomplete='off'>
                                        <label for="address_two"  class="fixed-label">{{__('Address two') }}</label>
                                        <div class="input-highlight"></div>
                                     </div>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->
                               </div>
							   
							   
                               
                               <!-- ./col- -->
                   
							   
                   
                   
                         
                            </div>
							<div class="clearfix"></div>
							<div class="row" >
							<div class="col-sm-6">
								<div class="form-group input-field label-float">
                        <div class="input-field label-float">
                           <label for="type" class="fixed-label">{{__('Type') }}<span style="color:red">*</span></label>
                           <select id="type"  name="type" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select Type') }}</option>
                              <option value="general">General</option>
                              <option value="package">Package</option>
                           </select>
                              
                              <div class="input-highlight"></div>
                           </div>
								    <div class="input-highlight"></div>
								</div><!-- /.form-group -->
                     </div><!-- ./col- --> </div>
							 <div class="clearfix"></div>
							<div class="row packages" >
                      <div class="col-sm-12" >
                        <div class="form-group">
                          <label for=""><strong>Select Packages:</strong></label>
                          <div class="row"> 
                              @foreach($data['packages_view'] as $value)
                              <div class="col-md-3" >
                                   <div class="form-group">     
                                     <label class="checkbox-filled" for="package_{{ $value->id }}">
                                      <input type="checkbox" class="filled" name="package[]" id="package_{{ $value->id }}" value="{{ $value->id }}">
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
					 <div class="clearfix"></div>
							<div class="row">
							<div class="col-sm-6">
                     <div class="form-group">
                           <label for="message" class="fixed-label">{{__('Message') }}</label>
                           <textarea class="textarea-auto-resize" placeholder="Enter Message" name="message" id="message"></textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div><!-- ./col- -->	
                    
                   </div><!-- /.row -->
                   <p><span style="color:red;    margin-left: 0px;"> Mandatory (*)</span></p>
						<div class="form-group clearfix">
							<button id="submittext" type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
						</div><!-- /.form-group -->
                  
					</form>
				<!--</div> --><!-- /.row -->
			</div><!-- /.page-content -->
			
										  <!-- Default Modal -->
   <div id="defaultModal" class="modal bs-example-modal-lg" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header theme">
               <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
               <h1 class="modal-title">Customer Details</h1>
            </div>
            <!-- /.modal-header -->
            <div class="modal-body">
               <form id="customerformValidate" class="" method="post" data-toggle="validator">
                  <!-- <h1 class="text-display-1">Customer Information</h1> -->
                  <!--input type="hidden" name="customer_id"-->
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Name" class="clearable" id="name" name="name" autofocus type="text">
                           <label for="name" class="fixed-label">{{__('Name') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- ./col- -->
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Email" class="clearable" id="email" name="email" type="email">
                           <label for="" class="fixed-label">{{__('Email') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->     
                     </div>
                     <!-- ./col- -->  
                     <div class="col-sm-4">
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
                     </div>
                     <!-- ./col- -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                     @php
                     $statelist = CommonHelper::getStateList($defcountry);
                     @endphp
                     <div class="col-sm-4">
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
                     </div>
                     <!-- ./col- -->  
                     <div class="col-sm-4">
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
                     </div>
                     <!-- ./col- -->
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Address One" class="clearable" id="customer_address_one" name="address_one" type="text">
                           <label for="customer_address_one" class="fixed-label">{{__('Address One') }}</label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->     
                     </div>
                     <!-- ./col- -->
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <div class="input-field label-float">
                              <input placeholder="Address Two" class="clearable" id="customer_address_two" name="address_two" type="text">
                              <label for="customer_address_two" class="fixed-label">{{__('Address Two') }}</label>
                              </select>
                              <div class="input-highlight"></div>
                           </div>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- ./col- -->
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Zipcode" class="clearable" id="zipcode" name="zipcode" type="text">
                           <label for="phone" class="fixed-label">{{__('Zipcode') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->     
                     </div>
                     <!-- ./col- -->  
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="phone" class="clearable" id="phone" name="phone" type="text">
                           <label for="phone" class="fixed-label">{{__('Phone') }}<span style="color:red">*</span></label>
                           <p class="no-margin em"></p>
                        </div>
                     </div>
                     <!-- ./col- -->  
                  </div>
                  <!-- /.modal-body -->
                  <div class="modal-footer">
                     <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                     <!-- <button class="btn-flat waves-effect waves-theme">Save changes</button> -->
                     <button type="submit" id="saveCustomerButton" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
                  </div>
                  <!-- /.modal-footer -->
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

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
<script src ="{{ asset('public/assets/dist/js/jquery-ui.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/external_sweet_alert.js') }}"></script>
<script>

$(document).ready(function(){

  // $('#submittext').text('enquiry');
   $('.packages').hide();
   $('#type').change(function(){
     var type =   $('#type').val();
      if(type == 'package')
      {
         $('.packages').show();
        // $('#submittext').text('Get quotation');
      }
      else{
         $('.packages').hide();
      }
   });
   
    

   $("#formValidate").validate({
			rules: {
				"name": {
					required: true,
				},
            "email": {
					required: true,
               email : true,
				},
            // "country_id" : {
            //    required: true,
            // },
            // "state_id" : {
            //    required: true,
            // },
            // "city_id" : {
            //    required: true,
            // },
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
            // "country_id" : {
            //    required: "Please, choose country",
            // },
            // "state_id" : {
            //    required: "Please, choose state",
            // },
            // "city_id" : {
            //    required: "Please, choose city",
            // },
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
                        //alert("Enquiry Details Saved succesfully");
								window.location.href = "{{route('enquiry.new')}}";
						}
					}
			});
			// for demo
			//alert('Form Saved succesfully'); // for demo
		//	return false; // for demo
         }
		});
		
		$("#customerformValidate").validate({
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
               remote: "Phone Number Already Exists!"
            },
      },
      submitHandler: function (form) {
            $.ajax({
              type: 'post',
              url: "{{ route('customer_save') }}",
              data: $('form').serialize(),
              success: function(response){
                if(response)
                {
                     swal("Success!", "Customer Added succesfully!", "success");
                     $('#defaultModal').modal('toggle');
                     $('#name').val('');
                     $('#email').val('');
                     $('#zipcode').val('');
                     $('#phone').val('');
                     $('#customer_address_one').val('');
                     $('#customer_address_two').val('');
                     $('#country_id').selectpicker('val', '');
                     $('#state_id').selectpicker('val', '');
                     $('#city_id').selectpicker('val', '');
                     $('#customer_id').val(response.userid);
                     $('#customer_name').val(response.data.name);
                }
              }
           });
         }
    });

});
// $(document).on('submit','form#customerformValidate',function(){
//         $("#saveCustomerButton").prop('disabled',true);
//     });
 
   $("#dashboard_sidebar_li_id").addClass('active');
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
    $('#customer_name').autocomplete({
    // minChars: 1,
    source: function(request, response) {
        $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('customer_autocomplete')}}",
        data: 'action=customer_name'+'&name='+request.term,
        success: function(data) {
         //console.log(data.length);
         if (data.length === 0) {
              // alert('hii');
              $('.customer_details').hide();
              $('.customer_add').show();
               var res_msg = "No Results found, please add Customer";
                alert(res_msg);
              
            }
          response( $.map( data, function( item ) {
            //console.log(data.length);
                  var object = new Object();
                  object.label = item.value;
                  object.value = item.name;
                  object.city_name = item.city_name;
                  object.state_name = item.state_name;
                  object.zipcode = item.zipcode;
                  object.address_one = item.address_one;
                  object.address_two = item.address_two;
                  object.email = item.email;
                  object.phone = item.phone;
                  object.customer_id = item.customer_id;
                  return object 
                       
                          
          }));
   
        }
   
      });
    },
    select: function (event, ui) {
      $('.customer_add').hide();
         $('.customer_details').show();
         $("#customer_name").val(ui.item.value);
         $("#customer_name").val(ui.item.value);
         $("#cus_name").val(ui.item.name);
         $("#cus_city").val(ui.item.city_name);
         $("#cus_state").val(ui.item.state_name);
         $("#cus_zipcode").val(ui.item.zipcode);
         $("#address_one").val(ui.item.address_one);
         $("#address_two").val(ui.item.address_two);
         $("#cus_phone").val(ui.item.phone);
         $("#cus_email").val(ui.item.email);
         $("#customer_id").val(ui.item.customer_id);
      },
   });
  
</script>
@endsection