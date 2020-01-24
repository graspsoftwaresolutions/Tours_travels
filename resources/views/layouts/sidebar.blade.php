@php $logo = CommonHelper::getlogo();  @endphp
@php $website_dat = CommonHelper::getWebsiteDetails(); @endphp
   
        <nav class="navbar navbar-default main-navbar navbar-custom navbar-white affix-top" id="mynavbar-1">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" id="menu-button">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <div class="header-search hidden-lg">
                        <a href="javascript:void(0)" class="search-button hide"><span><i class="fa fa-search"></i></span></a>
                    </div>
                    <a href="{{ URL('/') }}" class="navbar-brand"><span> <img class="pull-left" src="{{ asset('storage/app/website/'.$logo)}}" width='33' > <span> &nbsp;&nbsp;{{ $website_dat->company_name ? $website_dat->company_name : '' }} </span></a>
                </div><!-- end navbar-header -->
                
                <div class="collapse navbar-collapse" id="myNavbar1">
                    <ul class="nav navbar-nav navbar-right navbar-search-link">
                        
                        <li id="home_menu_id" class="active"><a href="{{URL('/')}}">Home</a> </li>
                        <li id="package_menu_id"><a href="{{route('packages')}}">Itinerary</a>  </li>
                        <li id="package_menu_id"><a href="{{route('sight_seeing')}}">Sight Seeing</a>  </li>
                        <!-- @auth
                        <li id="itinerary_created_menu"><a href="{{route('itineray_created')}}">Itinerary Created</a>  </li>
                        @endauth -->
                        <li id="enquiry_menu_id" style=""><a href="{{route('enquiry')}}">Enquiry</a>  </li>
                        <li class="hide"><a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a></li>
                    </ul>
                </div><!-- end navbar collapse -->
            </div><!-- end container -->
        </nav>
        <div class="sidenav-content">
       
            <div id="mySidenav" class="sidenav" >
                <h2 id="web-name"><span> <img class="pull-left" src="{{ asset('storage/app/website/'.$logo)}}" style='height:50px;width:50px;margin-left:7px;'> </span>{{ $website_dat->company_phone ? $website_dat->company_phone : 'Tours Travles' }}</h2>

                <div id="main-menu">
                	<div class="closebtn">
                        <button class="btn btn-default" id="closebtn">&times;</button>
                    </div><!-- end close-btn -->
                    
                    <div class="list-group panel">
                    
                        <a href="{{route('home')}}" class="list-group-item active"><span><i class="fa fa-home link-icon"></i></span>Home<span></i></span></a>
                       
                        @if (Route::has('login'))
                            @auth
                        <a href="{{route('tour_booking')}}" class="list-group-item" ><span><i class="fa fa-plane link-icon"></i></span>Booking<span></span></a>
                        @endauth
                        @endif
                        
                        <a href="{{route('enquiry')}}" class="list-group-item" ><span><i class="fa fa-building link-icon"></i></span>Enquiry<span></span></a>

                            <!-- <a href="#f-forms-links" class="list-group-item" data-toggle="collapse">Forms<span><i class="fa fa-caret-down arrow"></i></span></a>
                            <div class="collapse sub-menu mega-sub-menu-links" id="f-forms-links">
                                <a href="login-1.html" class="list-group-item">Login 1</a>
                                <a href="login-2.html" class="list-group-item">Login 2</a>
                                <a href="registration-1.html" class="list-group-item">Registration 1</a>
                                <a href="registration-2.html" class="list-group-item">Registration 2</a>
                                <a href="forgot-password-1.html" class="list-group-item">Forgot Password 1</a>
                                <a href="forgot-password-2.html" class="list-group-item">Forgot Password 2</a>
                            </div>
                        </div>end sub-menu -->

                    </div><!-- end list-group -->
                </div><!-- end main-menu -->
            </div><!-- end mySidenav -->
        </div><!-- end sidenav-content -->