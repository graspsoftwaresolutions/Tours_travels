@extends('layouts.app')
@include('layouts.head')
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
      @php $companydata = CommonHelper::getWebsiteDetails(); @endphp
           
		        <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
       
        	<div id="login" class="innerpage-section-padding">
            <h3 Style="text-align:center;color:#faa61a;font-size:40px"> {{$companydata->company_name}}  </h3>
                <div class="container" style="margin-left: 208px;">
                    <div class="row">
                        <div class="col-sm-12">
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>Reset Password</h3>
                                    
                                      <form method="POST" action="{{ route('password.update') }}">
										@csrf
										@include('includes.messages')
										<input type="hidden" name="token" value="{{ $token }}">    
										<div class="form-group">
										
											<div class="input-field label-float @error('email') is-invalid @enderror">
												<i class="mdi mdi-account prefix"></i>
												<input id="email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
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
                                        
                                       <div class="form-group">
                                             <!--<input type="password" class="form-control" placeholder="Password"  required/> -->
                                            
											 
											 <div class="input-field label-float @error('password') is-invalid @enderror">
												<i class="mdi mdi-key prefix"></i>
												 <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
										
										<div class="footer">                                          
											<button type="submit" class="btn btn-orange btn-block ">{{ __('Reset Password') }}</button>  
											
											<p class="form-type mt20">
												
												
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
                    </form>
                </div>
            </div>
        </div>
    </div> 

</div>
@include('layouts.foot-script')
@endsection
