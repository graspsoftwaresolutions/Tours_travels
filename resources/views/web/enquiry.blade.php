@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<style>
   #cover-contact-us {
   background: url('{{ asset("public/web-assets/images/cover-contact-us.jpg") }}') 50% 20%;
   background-size: cover;
   }
   .clearfix{
       clear:both;
   }
   .custom-form .form-group input {
      height: 45px;
      /* padding-left: 40px; */
   }
   .read
   {
      pointer-events: none;
   }
   .selectstyle
   {
      height: 44px;
      padding-left: 37px;
   }
   /* #loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url('{{ asset("public/assets/images/spinner.gif") }}') no-repeat center center;
  z-index: 10000;
} */


</style>
@endsection
@section('main-content')
<!--================ PAGE-COVER ===============-->
<section class="page-cover" id="cover-contact-us">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="page-title">Enquiry</h1>
            <ul class="breadcrumb">
               <li><a href="#">Home</a></li>
               <li class="active">Enquiry</li>
            </ul>
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end page-cover -->
<!--===== INNERPAGE-WRAPPER ====-->
<section class="innerpage-wrapper">
   <div id="contact-us" class="innerpage-section-padding">
      <div class="container">
         <div class="row">
            <div class="custom-form contact-form">
               <h3>Enquiry</h3>
               @include('includes.messages')
               <form method='post' id='formValidate' >
               @csrf
               <div class="col-md-6">
                        <div class="form-group">
                         <input type="hidden" value="{{ Auth::check() ? Auth::user()->id : '' }}" name='auth_id' id='auth_id' class="form-control" placeholder="Name"  />
                           <input type="text" value="{{ Auth::check() ? Auth::user()->name : old('name') }}" name='name' id='name' class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" placeholder="Name"  /> 
                           <span><i class="fa fa-user"></i></span>
                        </div>
                  </div>
                  <div class=" col-md-6">
                        <div class="form-group">
                            <input type="email" name='email' class="{{ Auth::check() ? 'read form-control' : 'form-control'}}"  value="{{ Auth::check() ? Auth::user()->email : '' }}" id='email'  placeholder="Email or Username"  />
                            <span><i class="fa fa-envelope"></i></span>
                        </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <input type="text" name='phone' value="{{ Auth::check() ? Auth::user()->phone : '' }}" id='phone' class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" placeholder="phone" />
                     <span><i class="fa fa-phone"></i></span>
                    </div>
                    </div>
                  <div class="col-md-6">
                   <div class="form-group">
                     <select name='type' id='type' class="form-control selectstyle">
                        <option value='0' selected="true" disabled>Select Type</option>
                        <option value='general'>General</option>
                        <option value='package'>Package</option>
                     </select>
                     <span><i class="fa fa-list-alt" aria-hidden="true"></i></span>
                     </div> 
                  </div> 
                  <div class="clearfix"></div>
                      <div class="col-sm-12 packages" >
                        <div class="form-group ">
                          <label for="" style='padding: 10px 0px;'><strong>Select Packages:</strong></label>
                          <div class="row"> 
                              @foreach($data['packages_view'] as $value)
                              <div class="col-md-3" >
                                   <div class="form-group">     
                                     <label class="checkbox-filled" for="package_{{ $value->id }}">
                                      <input type="checkbox" class="filled" style='height: auto;' name="package[]" id="package_{{ $value->id }}" value="{{ $value->id }}">
                                      <i class="highlight"></i>
                                      {{ $value->package_name }}
                                    </label>
                                  </div>                       
                              </div>
                               @endforeach
                          </div>
                        </div>
                      </div>
                    <!-- </div> -->
                    <div class="clearfix"></div> 
                                  @php $data['country_view'] = CommonHelper::getCountryDetails(); @endphp
											<div class="col-md-6">
												 <div class="form-group">
													<select name="country_id" style="@if(Auth::check()) pointer-events:none; @endif"  required="true" id="country_id" value="{{ old('country_id') }}"  class="selectstyle form-control @error('country_id') is-invalid @enderror"> 
														<option value="0" selected="true" disabled="true"> Select Country </option>
                                                @foreach($data['country_view'] as $value)
                                                
                                                <option value="{{$value->id}}" @if(Auth::check()) @if(Auth::user()->country_id==$value->id)  selected @endif @endif>
                                                   {{$value->country_name}}</option>
                                                @endforeach
													</select>
													@error('country_id')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
                                       <span><i class="fa fa-flag" aria-hidden="true"></i></span>
												 </div>
											</div>
											@if(Auth::check())
											<div class="col-md-6">
                                    <div class="form-group"> 
                                       <!-- To validate the select add class "select-validate" -->     
                                             @php
                                             $stateName = CommonHelper::getstateName(Auth::user()->state_id);
                                             @endphp
                                             <select  style="@if(Auth::check()) pointer-events:none; @endif" class="form-control @error('country_id') is-invalid @enderror selectstyle" data-live-search="true" data-width="100%">
                                             <option value="0" selected="true">{{ $stateName }}
                                             </option>
                                            </select>
                                            <span><i class="fa fa-flag" aria-hidden="true"></i></span>
                                       <div class="input-highlight"></div>
                                       </div>
											</div>
                                 @else
                                 <div class="col-md-6">
                                    <div class="select-row form-group"> 
                                       <!-- To validate the select add class "select-validate" -->     
                                       <select id="state_id" required="true" style="@if(Auth::check()) pointer-events:none; @endif" name="state_id" class="selectstyle form-control @error('state_id') is-invalid @enderror" value="{{ old('state_id') }}" data-live-search="true" data-width="100%">
                                             <option value="0" selected="">{{__('Select State') }}
                                             </option>
                                             @if(Auth::check())
                                             @php
                                             $stateName = CommonHelper::getstateName(Auth::user()->state_id);
                                             @endphp
                                               <option value="{{ $stateName }}" >{{ $stateName }}</option>
                                 
                                             @endif
                                       </select>   
                                       <span><i class="fa fa-flag" aria-hidden="true"></i></span>
                                       <div class="input-highlight"></div>
                                       </div>
											</div>
                                 @endif
                                 <div class="clearfix"></div> 
                                 @if(Auth::check())
											<div class="col-md-6">
                                    <div class="form-group"> 
                                       <!-- To validate the select add class "select-validate" -->     
                                             @php
                                             $cityName = CommonHelper::getcityName(Auth::user()->city_id);
                                             @endphp
                                             <select  style="@if(Auth::check()) pointer-events:none; @endif" class="selectstyle form-control @error('city_id') is-invalid @enderror" data-live-search="true" data-width="100%">
                                             <option value="0" selected="true">{{ $cityName }}
                                             </option>
                                            </select>
                                            <span><i class="fa fa-flag" aria-hidden="true"></i></span>
                                       <div class="input-highlight"></div>
                                       </div>
											</div>
                                 @else
											<div class="col-md-6">
												 <div class="form-group">
													<select name="city_id" required="true" style="@if(Auth::check()) pointer-events:none; @endif"  id="city_id" value="{{ old('city_id') }}" class="selectstyle form-control @error('city_id') is-invalid @enderror"> 
														<option value="0"> Select City </option>
													</select>
													@error('city_id')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
                                       <span><i class="fa fa-flag" aria-hidden="true"></i></span>
												 </div>
											</div>
                                 @endif
											 <div class="col-md-6">
												 <div class="form-group">
													<input id="pincode" type="pincode" value="{{ Auth::check() ? Auth::user()->pincode : '' }}" placeholder="Pincode" class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" name="pincode" required autocomplete="Pincode">
													<span><i class="fa fa-map-pin" aria-hidden="true"></i></span>
												 </div>
											</div>
                                 <div class="clearfix"></div>
											<div class="col-md-6">
												 <div class="form-group">
														<input placeholder="Address One" value="{{ Auth::check() ? Auth::user()->address_one : '' }}" class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" name="address_one" id="address_one">
															@error('address_one')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
                                             <span><i class="fa fa-address-card"></i></span>
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group">
														<input placeholder="Address Two" value="{{ Auth::check() ? Auth::user()->address_two : '' }}" class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" name="address_two" id="address_two">
															@error('address_two')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
                                             <span><i class="fa fa-address-card"></i></span>
												 </div>
											</div>
                                 <div class="clearfix"></div> 
                  <div class=" col-md-6">
                    <div class="form-group">
                        <textarea class="form-control" id='message' name='message' placeholder="Message" ></textarea>
                        <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        </div>
                  </div>
                  <div class="clearfix"></div>
                  <input type='submit' id="SaveEnquiryButton" value='submit' class='pull-right btn btn-orange'>
                  <!-- <button id='start_call'>Refresh</button> -->
               <div id='loading' class='pull-right'></div>
              
               </form>
            </div>
         </div>
         <!-- end row -->
      </div>
      <!-- end container -->   
   </div>
   <!-- end contact-us -->
</section>
<!-- end innerpage-wrapper -->
<!--======================= BEST FEATURES =====================-->
<section id="best-features" class="banner-padding black-features">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-dollar"></i></span>
               <h3>Best Price Guarantee</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-lock"></i></span>
               <h3>Safe and Secure</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-thumbs-up"></i></span>
               <h3>Best Travel Agents</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-bars"></i></span>
               <h3>Travel Guidelines</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end best-features -->
<!--========================= NEWSLETTER-1 ==========================-->
<section id="newsletter-1" class="section-padding back-size newsletter">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Subscribe Our Newsletter</h2>
            <p>Subscibe to receive our interesting updates</p>
            <form>
               <div class="form-group">
                  <div class="input-group">
                     <input type="email" class="form-control input-lg" placeholder="Enter your email address" required/>
                     <span class="input-group-btn"><button class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                  </div>
               </div>
            </form>
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end newsletter-1 -->

@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script>


$(document).ready(function(){
   $('#country_id').change(function(){
       var countryID = $(this).val();
      
       if(countryID!='' && countryID!='undefined')
       {
			if(countryID){
				$.ajax({
				type:"GET",
				url:" {{ URL::to('/get-state-list') }}?country_id="+countryID,
				success:function(res){               
					if(res){
						$("#state_id").empty();
						$("#state_id").append("<option value='0' disabled selected='true'>Select State</option>");
						$.each(res,function(key,entry){
							$("#state_id").append($('<option>Select State</option>').attr('value', entry.id).text(entry.state_name));
						});
					}
					}
				});
			}
	   }
	});

	$('#state_id').change(function(){
       var StateId = $(this).val();
       if(StateId!='' && StateId!='undefined')
       {
         $.ajax({
            type: "GET",
            url : "{{'get-cities-list'}}?State_id="+StateId,
            dataType: "json",
            url : "{{ URL::to('/get-cities-list') }}?State_id="+StateId,
            success:function(res){
                if(res)
                {
                    $('#city_id').empty();
					$("#city_id").append("<option value='0' disabled selected='true'>Select City</option>");
                    $.each(res,function(key,entry){
                        $('#city_id').append($('<option></option>').attr('value',entry.id).text(entry.city_name));
                    });   
                }else{
                    $('#city_id').empty();
                }
            }
         });
       }else{
           $('#city_id').empty();
       }
   });

    $('.packages').hide();
   $('#type').change(function(){
     var type =   $('#type').val();
      if(type == 'package')
      {
         $('.packages').show();
         $('#submittext').text('Get quotation');
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
            "country_id": {
					required: true,
               
				},
            "state_id": {
					required: true,
				},
            "city_id": {
					required: true,
				},
            "address_one": {
					required: true,
				},
            "address_two": {
					required: true,
				},
            "pincode" : {
               required: true,
            },
            "phone" : {
               required: true,
               digits : true,
            },	
            "message" : {
               required: true,
            },
			},
			messages: {
				"name": {
					required: "Please enter Name",
				},
            "email": {
					required: "Please enter Email",
               email : "Please enter valid email",
				},
            "type" : {
               required: "Please choose type",
            },
            "phone" : {
               required: "Please enter Phone Number",
               digits : "Numbers only",
            },
            "message" : {
               required: "Please, enter message",
            },
            "country_id": {
					required: "Please choose country",
               
				},
            "state_id": {
					required: "Please choose state",
				},
            "city_id": {
					required: "Please choose city",
				},
            "address_one": {
					required: "Please Enter Address",
				},
            "address_two": {
					required: "Please Enter Address",
				},
            "pincode" : {
               required: "Please Enter Pincode",
            },
			},
			submitHandler: function (form) {
            spinner.show();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
				$.ajax({
					type: 'post',
					url: "{{ route('enquiry_email') }}",
					data: $('form').serialize(),
               dataType: "json",
					success: function(response){
                  console.log(response);
                     if(response.status == 0)
                     {
                        alert(response.message);
                        spinner.hide();
                        //window.location.reload();
                     }
                     else{
                        spinner.hide();
                        alert('Enquiry form submitted succesfully');
                        window.location.reload();
                     } 
					}
			});
         }
		});
});
$(document).on('submit','form#formValidate',function(){
      $("#SaveEnquiryButton").prop('disabled',true);
      
});
$("#home_menu_id").removeClass('active');
$("#enquiry_menu_id").addClass('active');
</script>
@endsection