<nav class="navbar navbar-default main-navbar navbar-custom navbar-white" id="mynavbar-1">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" id="menu-button">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>                        
                    </button>
                    <div class="header-search hidden-lg">
                    @php $logo = CommonHelper::getlogo();  @endphp
                    	<!-- <spna></span> -->
                    </div>
                    <!-- <img class="pull-left" src="{{ asset('storage/app/website/'.$logo)}}" style='height:50px;width:50px;'> &nbsp;&nbsp; <a href="#" class="navbar-brand">   <span>TOURS </span>TRAVELS </a> -->
                    <br>
                    <img class="pull-left" src="{{ asset('storage/app/website/'.$logo)}}" style='height:50px;width:50px;'> &nbsp;&nbsp; <a href="#" class="navbar-brand">   <span> &nbsp;&nbsp;TOURS </span>TRAVELS </a>
                   
                </div><!-- end navbar-header -->
                <br>
                
                <div class="collapse navbar-collapse" id="myNavbar1">
                    <ul class="nav navbar-nav navbar-right navbar-search-link">
                        <li class="active"><a href="{{route('home')}}">Home</a> </li>
                        @if (Route::has('login'))
                            @auth
                        <li><a href="{{route('tour_booking')}}">Booking</a>	 </li>
                        @endauth
                        @endif
                        <li style="padding-top:18px"><a href="{{route('enquiry')}}">Enquiry</a>	 </li>
                		<!-- <li><a href="javascript:void(0)" class="search-button"><span><i class="fa fa-search"></i></span></a></li> -->
                    </ul>
                </div><!-- end navbar collapse -->
            </div><!-- end container -->
        </nav><!-- end navbar -->   
        <div class="sidenav-content">
            <div id="mySidenav" class="sidenav" >
                <h2 id="web-name"><span> <img class="pull-left" src="{{ asset('storage/app/website/'.$logo)}}" style='height:50px;width:50px;margin-left:7px;'> </span>Tours Travles</h2>

                <div id="main-menu">
                	<div class="closebtn">
                        <button class="btn btn-default" id="closebtn">&times;</button>
                    </div><!-- end close-btn -->
                    
                    <div class="list-group panel">
                    
                        <a href="{{route('home')}}" class="list-group-item active" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-home link-icon"></i></span>Home<span></i></span></a>
                       
                        @if (Route::has('login'))
                            @auth
                        <a href="{{route('tour_booking')}}" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-plane link-icon"></i></span>Booking<span></span></a>
                        @endauth
                        @endif
                        
                        <a href="#hotels-links" class="list-group-item" data-toggle="collapse" data-parent="#main-menu"><span><i class="fa fa-building link-icon"></i></span>Enquiry<span></span></a>

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