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
                        
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>Registration</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                     <form method="POST" action="{{ route('register') }}">
										@csrf
                                            
                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control" placeholder="Username"  required/> -->
											 <div class="form-group row">
													<!--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label> -->

													<div class="col-md-12">
														<input id="name" Placeholder="UserName" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

														@error('name')
															<span class="invalid-feedback" role="alert">
																<strong>{{ $message }}</strong>
															</span>
														@enderror
													</div>
												</div>
                                             <span><i class="fa fa-user"></i></span>
                                        </div>
        
                                        <div class="form-group">
                                            
											
											<!--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> -->
												
													<input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

													@error('email')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												
											
                                             <span><i class="fa fa-envelope"></i></span>
                                        </div>

                                        <div class="form-group">
                                            
											
											<!--<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label> -->
												
													<input id="phone" placeholder="Enter Phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

													@error('phone')
														<span class="invalid-feedback" role="alert">
															<strong>{{ $message }}</strong>
														</span>
													@enderror
												
											
                                             <span><i class="fa fa-phone"></i></span>
                                        </div>
                                       
                                        <div class="form-group">
                                          
											  <input id="password" type="password" placeholder="Password"  required class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

															@error('password')
																<span class="invalid-feedback" role="alert">
																	<strong>{{ $message }}</strong>
																</span>
															@enderror
                                             <span><i class="fa fa-lock"></i></span> 
                                        </div>
        
                                        <div class="form-group">
											  
												<input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">
											
                                             <span><i class="fa fa-lock"></i></span>
                                        </div>
                                        <button type="submit" class="btn btn-orange btn-block">
                                    {{ __('Register') }}
                                </button>
                                       
                                    </form>
                                    
                                    <div class="other-links">
                                    	<p class="link-line">Already Have An Account ? <a href="{{ route('login') }}">Login Here</a></p>
                                    </div><!-- end other-links -->
                                </div><!-- end custom-form -->
                                
                                <div class="flex-content-img custom-form-img">
                                    <img src="{{ asset('public/web-assets/images/registration.jpg') }}" class="img-responsive" alt="registration-img" />
                                </div><!-- end custom-form-img -->
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
@endsection
