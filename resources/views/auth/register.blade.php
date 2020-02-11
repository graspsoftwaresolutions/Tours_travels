@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')
@include('layouts.sidebar')
@section('content')
<style>
#cover-registration {
	background: url({{ asset('public/web-assets/images/cover-registration.jpg') }}) 50% 36%;
    background-size: 145%;
}
.clearfix{
	clear:both;
}
</style>
 <div class="page-background lr-page">
      <div class="page-background lr-page">
<!--================ PAGE-COVER =================-->
        <section class="page-cover" id="cover-registration">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Registration 1</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Registration 1</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->
		        <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="registration" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        	<div class="flex-content custom-form custom-form-fields">
                                <div class="custom-form custom-form-fields">
                                    <h3>Registration</h3>
                                     <form method="POST" action="{{ route('register') }}">
										@csrf
										 <div class="row">
											<div class="col-md-6">
												 <div class="form-group">
													<input id="name" Placeholder="UserName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

													@error('name')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<span><i class="fa fa-user"></i></span>
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group">
													<input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

													@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
													<span><i class="fa fa-envelope"></i></span>
												 </div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-6">
												 <div class="form-group">
													<input id="phone" placeholder="Enter Phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
													@error('phone')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												<span><i class="fa fa-phone"></i></span>
												 </div>
											</div>
											@php $data['country_view'] = CommonHelper::getCountryDetails(); @endphp
											<div class="col-md-6">
												 <div class="form-group">
													<select name="country_id" required="true" id="country_id" value="{{ old('country_id') }}"  class="form-control @error('country_id') is-invalid @enderror"> 
														<option value="0" selected="true" disabled="true"> Select Country </option>
                                                        @foreach($data['country_view'] as $value)
                                                        <option value="{{$value->id}}">
                                                            {{$value->country_name}}</option>
                                                        @endforeach
													</select>
													@error('country_id')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												 </div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-6">
                                            <div class="select-row form-group">
                                               
                                                <!-- To validate the select add class "select-validate" -->     
                                                <select id="state_id" required="true"  name="state_id" class="form-control @error('state_id') is-invalid @enderror" value="{{ old('state_id') }}" data-live-search="true" data-width="100%">
                                                    <option value="0" selected="">{{__('Select State') }}
                                                    </option>
                                                </select>   
                                                <div class="input-highlight"></div>
                                                </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group">
													<select name="city_id" required="true"  id="city_id" value="{{ old('city_id') }}" class="form-control @error('city_id') is-invalid @enderror"> 
														<option value="0"> Select City </option>
													</select>
													@error('city_id')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												 </div>
											</div>
											<div class="clearfix"></div>
											 <div class="col-md-6">
												 <div class="form-group">
													<input id="pincode" type="pincode" placeholder="Pincode" value="{{ old('pincode') }}" class="form-control @error('pincode') is-invalid @enderror" name="pincode" required autocomplete="Pincode">
													<span><i class="fa fa-lock"></i></span>
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group">
														<input placeholder="Address One" value="{{ old('address_one') }}" class="form-control  @error('address_one') is-invalid @enderror" name="address_one" id="address_one">
															@error('address_one')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													<span><i class="fa fa-lock"></i></span> 
												 </div>
											</div>
											<div class="clearfix"></div>
											<div class="col-md-6">
												 <div class="form-group">
														<input placeholder="Address Two" value="{{ old('address_two') }}" class="form-control  @error('address_two') is-invalid @enderror" name="address_two" id="address_two">
															@error('address_two')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													<span><i class="fa fa-lock"></i></span> 
												 </div>
											</div>
											<div class="col-md-6">
												 <div class="form-group">
													<input id="password" type="password" placeholder="Password" required class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

															@error('password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
													<span><i class="fa fa-lock"></i></span> 
												 </div>
											</div>
											 <div class="col-md-6">
												 <div class="form-group">
													<input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
											
													<span><i class="fa fa-lock"></i></span>
												 </div>
											</div>
											<div class="clearfix"></div>
										 </div>
                                   
                                        <button type="submit" class="btn btn-orange pull-right ">
											{{ __('Register') }}
										</button>
                                    </form>
                                    <div class="other-links">
                                    	<p class="link-line">Already Have An Account ? <a href="{{ route('login') }}">Login Here</a></p>
                                    </div><!-- end other-links -->
                                </div><!-- end custom-form -->
                                <!-- <div class="flex-content-img custom-form-img">
									 <h3>Registration</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                  <!--  <img src="{{ asset('public/web-assets/images/registration.jpg') }}" class="img-responsive" alt="registration-img" /> -->
                               <!--  </div> -->
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end registration -->
        </section><!-- end innerpage-wrapper -->
        
        
        <!--======================= BEST FEATURES =====================-->
        <section id="best-features" class="banner-padding black-features">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-dollar"></i></span>
                        	<h3>Best Price Guarantee</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-lock"></i></span>
                        	<h3>Safe and Secure</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-thumbs-up"></i></span>
                        	<h3>Best Travel Agents</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-bars"></i></span>
                        	<h3>Travel Guidelines</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end best-features -->
        
        
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
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end newsletter-1 -->

    </div>
</div>
@include('layouts.footer')

@include('layouts.foot-script')
<script>
$(document).ready(function(e){
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




//     $('select[name=country_id]').change(function() {
//      // alert('ok');
//       var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();
   
//       $.get(url, function(data) {
//           $('#state_id').empty('');
//           $("#state_id").append("<option value=''>Select</option>");
//           $("#state_id").selectpicker("refresh");
//           //var select = $('form select[name=state_id]');
//          // select.empty();
//           //$("#state_id").append("<option value=''>Select</option>");
//           $.each(data, function(key, value) {
//               $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
//                   '</option>');
//           });
//            $("#state_id").selectpicker("refresh");
//       });
//    });
});
</script>
@endsection
