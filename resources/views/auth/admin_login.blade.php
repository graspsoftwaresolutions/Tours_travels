@extends('admin.layouts.app')

@section('content')
<style>
    body {
        background-image: url({{ asset('public/assets/images/login.png') }});
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
</style>
 <div class="page-background lr-page">
      <div class="page-background lr-page">

        <!-- Place your logo here. -->
        <!--img src="#" alt="" class="login-logo"-->

        <div class="form-box paper" id="login-box">
            <div class="header text-theme" style="color: #fff;"><span>{{ __('Login') }}</span></div>
            <form id="signInForm" action="{{ route('admin.login.submit') }}" method="post">
                 @csrf
                <div class="body">
                  
                    @include('includes.messages')
                    <div class="input-field label-float @error('email') is-invalid @enderror">
                        <i class="mdi mdi-account prefix"></i>
                        <input id="email" name="email" type="text" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        <label for="email" style="color: #83b1be;" class="fixed-label">{{ __('E-Mail Address') }}</label>
                        <div class="input-highlight"></div>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-field label-float @error('password') is-invalid @enderror">
                        <i class="mdi mdi-key prefix"></i>
                        <input id="password" name="password" type="password">
                        <label for="password" style="color: #9ac4d0;" class="fixed-label">{{ __('Password') }}</label>
                        <div class="input-highlight"></div>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt40 hide">
                        <label for="rememberMe" class="checkbox-filled ml30">
                            <input id="rememberMe" class="filled theme" type="checkbox">
                            <i class="highlight"></i>
                            <span class="text-blue-grey text-lighten-1">Remember me</span>
                        </label>
                    </div>
                </div><!-- /.body -->

                <div class="footer">                                          
                    <button type="submit" class="btn theme btn-block waves-effect waves-light">Sign me in</button>  
                    
                    <p class="form-type mt20">
                        <a class="btn-flat forgot-password waves-effect waves-theme text-blue-grey text-lighten-2" style="color: #9ac4d0;" href="#">Forgot password</a>
                        
    
                    </p>
                </div>
            </form>
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
        </div><!-- /.form-box -->
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
@endsection
