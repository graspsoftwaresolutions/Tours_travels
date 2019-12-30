@extends('layouts.app')
@include('layouts.head')
@include('layouts.header')
@include('layouts.sidebar')


@section('content')
<style>
	#cover-login {
		background: url({{ asset('public/web-assets/images/cover-login.jpg') }}) 50% 76%;
		background-size: 145%;
	}
    body {
        //xbackground-size: 100% 100% !important;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    .paper{
        background: #174551;
        outline: beige;
        box-shadow: 2px 2px 10px 10px #143a45 inset;
        border: 2px solid #a9b0b7;
    }
    .form-box .body {
        min-height: 130px;
        padding: 0px 20px;
    }
    #login-box{
        margin-top: 140px;
    }
    .theme-mda .collapse-indicator:after, .theme-mda .input-field .prefix.active{
       color: #74b1c3;
    }
	#newsletter-1 {
    background: linear-gradient(rgba(0, 0, 0,0.6),rgba(0, 0, 0,0.6)),url({{ asset('public/web-assets/images/newsletter.jpg') }}) 50% 78%;
    background-size: 140%;
    color: white;
}
</style>
 <div class="page-background lr-page">
      <div class="page-background lr-page">
		
			 <!--============= PAGE-COVER =============-->
        <section class="page-cover" id="cover-login">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Login 1</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Login 1</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->
		
		
		
		        <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
        	<div id="login" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>Login</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                      <form id="signInForm" action="{{ route('login') }}" method="post">
                                          @csrf    
										<div class="form-group">
										
											<div class="input-field label-float @error('email') is-invalid @enderror">
												<i class="mdi mdi-account prefix"></i>
												<input id="email" name="email" type="text" style="width:100%;height: 45px;padding-left: 40px;" placeholder="Username" value="{{ old('email') }}" required autocomplete="email" autofocus>
											<!--	<label for="email" style="color: #83b1be;" class="fixed-label">{{ __('E-Mail Address') }}</label> -->
												<div class="input-highlight"></div>
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
										 	</div> 
										
										 <span><i class="fa fa-user"></i></span>
                                          <!--   <input type="text" class="form-control" placeholder="Username"  required/> -->
                                          
                                        </div>
										
										
                                        
                                        <div class="form-group">
                                             <!--<input type="password" class="form-control" placeholder="Password"  required/> -->
                                            
											 
											 <div class="input-field label-float @error('password') is-invalid @enderror">
												<i class="mdi mdi-key prefix"></i>
												<input id="password" style="width:100%;height:37px;padding-left:40px;" name="password" type="password">
											<!--	<label for="password" style="color: #9ac4d0;" class="fixed-label">{{ __('Password') }}</label> -->
												<div class="input-highlight"></div>
												@error('password')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											</div>
											 <span><i class="fa fa-lock"></i></span> 
                                        </div> 
                                        
                                        <div class="checkbox">
											  <label for="rememberMe" class="checkbox-filled ml30">
													<input id="rememberMe" class="filled theme" type="checkbox">
													<i class="highlight"></i>
													<span class="text-blue-grey text-lighten-1">Remember me</span>
												</label>
                                        </div>
										
										<div class="footer">                                          
											<button type="submit" class="btn btn-orange btn-block ">Sign me in</button>  
											
											<p class="form-type mt20">
												
												
											</p>
										</div>
                                        
                                    </form>
                                    
                                    <div class="other-links">
                                    	<p class="link-line">New Here ? <a href="#">Signup</a></p>
                                      
									<!--	<a class="btn-flat simple-link forgot-password" href="#">Forgot password ?</a>-->
										<p class="form-type mt20">
                        <a class="btn-flat forgot-password waves-effect waves-theme text-blue-grey text-lighten-2" style="color: #9ac4d0;" href="#">Forgot password</a>

                    </p>
                                    </div><!-- end other-links -->
									
									<form id="forgotPasswordForm" method="POST" action="{{ route('password.email') }}">
									@csrf
										<div class="body">
											 @include('includes.messages')
											<p class="text-center help-text pt40">Submit us your email address:</p>
											<div class="form-group input-field label-float">
												<i class="mdi mdi-email prefix"></i>
												<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
												@error('email')
													<span class="invalid-feedback" role="alert">
														<strong>{{ $message }}</strong>
													</span>
												@enderror
											   
												<label for="regEmail">Your Email:</label>
												<div class="input-highlight"></div>

											</div>
										</div><!-- /.body -->

										<div class="footer">                                          
											<button type="submit" class="btn theme btn-block waves-effect waves-light">Submit</button>  
											
											<p class="form-type mt20">
												<a class="btn-flat sign-in waves-effect waves-theme text-blue-grey text-lighten-2" href="#">Sign in</a>
												
												<a href="register.html" class="btn-flat waves-effect waves-theme text-blue-grey text-lighten-2 pull-right">Register</a>
											</p>
										</div>
									</form>
									   <div class="text-center text-blue-grey text-lighten-2 hide">
											<div class="mb8">Sign in using social networks</div>

											<div class="btn-group">                    
												<a href="#!" class="btn text-blue-grey text-lighten-3 btn-animate bottom">
													<i class="slideIn-icon mdi mdi-twitter info waves-effect waves-light"></i>
													<i class="animate-text mdi mdi-twitter"></i>
												</a>
												<a href="#!" class="btn text-blue-grey text-lighten-3 btn-animate bottom">
													<i class="slideIn-icon fa mdi mdi-facebook blue-dark waves-effect waves-light"></i>
													<i class="animate-text fa mdi mdi-facebook"></i>
												</a>
												<a href="#!" class="btn text-blue-grey text-lighten-3 btn-animate bottom">
													<i class="slideIn-icon mdi mdi-google-plus red darken-2 waves-effect waves-light"></i>
													<i class="animate-text mdi mdi-google-plus"></i>
												</a>
											</div><!-- /.btn-group -->
										</div>
										 <div class="ecorner_1 theme"></div>
											<div class="ecorner_2 theme"></div>
									
                                </div><!-- end custom-form -->
                                
                                <div class="flex-content-img custom-form-img">
                                    <img src="{{ asset('public/web-assets/images/login.jpg') }}" class="img-responsive" alt="registration-img" />
                                </div><!-- end custom-form-img -->
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end login -->
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
		
        <!-- Place your logo here. -->
        <!--img src="#" alt="" class="login-logo"-->


        <div class="ecorner_1 theme"></div>
        <div class="ecorner_2 theme"></div>
    </div><!-- /.page-background -->
    <!-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

</div>
@include('layouts.footer')
@include('layouts.foot-script')
@endsection
