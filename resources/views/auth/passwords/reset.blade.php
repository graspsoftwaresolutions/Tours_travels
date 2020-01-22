@extends('layouts.app')
@section('content')

	        <!--===== INNERPAGE-WRAPPER ====-->
            <section class="innerpage-wrapper">
        	<div id="login" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        
                        	<div class="flex-content">
                                <div class="custom-form custom-form-fields">
                                    <h3>Reset Password</h3>
                                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p> -->
                                    <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @include('includes.messages')
                                    <input type="hidden" name="token" value="{{ $token }}">
										<div class="form-group ">
										
											<div class="input-field label-float @error('email') is-invalid @enderror">
												<i class="mdi mdi-account prefix"></i>
                                                <div class="col-md-12">

                                                <input id="email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                                    </div>
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror


												
										 	
                                                </div>
										 <span><i class="fa fa-user"></i></span>
                                         
                                          <br><br>
                                        </div>
                                   
							
                                        
                                        <div class="form-group ">
                                             <!--<input type="password" class="form-control" placeholder="Password"  required/> -->
                                            
											 
											 <div class="input-field label-float @error('password') is-invalid @enderror">
												<i class="mdi mdi-key prefix"></i>
                                                <div class="col-md-6">
                                                <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                                </div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
											</div>
											 <span><i class="fa fa-lock"></i></span> 
                                        </div> 

                                        <div class="form-group ">
                                             <!--<input type="password" class="form-control" placeholder="Password"  required/> -->
                                            
											 
											 <div class="input-field label-float @error('password') is-invalid @enderror">
												<i class="mdi mdi-key prefix"></i>
                                                <div class="col-md-6">
                                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                          
											</div>
											 <span><i class="fa fa-lock"></i></span> 
                                        </div> 
										<br><br><br>


                                        <div class="form-group row mb-0">
                                            <div class="col-md-12 offset-md-4">
                                                <button type="submit" class="btn btn-orange pull-right btn-primary">
                                                    {{ __('Reset Password') }}
                                                </button>
                                            </div>
                                        </div>
										
                                        
                                    </form>
                                    
                                    <div class="other-links">
                                    	
                                      
									<!--	<a class="btn-flat simple-link forgot-password" href="#">Forgot password ?</a>-->
										
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end login -->
        </section><!-- end innerpage-wrapper -->







<!-- <div class="page-background lr-page">
      <div class="page-background lr-page">

      <div class="form-box" id="login-box">
            <div class="header text-theme"><span>{{ __('Reset Password') }}</span></div>
        </div>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="" style="margin-left: 351px;">

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                         @include('includes.messages')
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                           
                            <div class="col-md-6">
                                <input id="email" readonly type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
</div>
</div> -->
@endsection
