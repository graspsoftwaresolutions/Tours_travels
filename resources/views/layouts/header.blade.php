 <!--============= TOP-BAR ===========-->
 <div id="top-bar" class="tb-text-white">
            <div class="container">
                <div class="row">          
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div id="info">
                            <ul class="list-unstyled list-inline">
                            @php $website_dat = CommonHelper::getWebsiteDetails(); @endphp
                                <li><span><i class="fa fa-map-marker"></i></span>{{ $website_dat->company_address_one ? $website_dat->company_address_one : '' }} , {{ $website_dat->company_address_two ? $website_dat->company_address_two : '' }}</li>
                                <li><span><i class="fa fa-phone"></i></span>{{ $website_dat->company_phone ? $website_dat->company_phone : '' }}</li>
                            </ul>
                        </div><!-- end info -->
                    </div><!-- end columns -->
                    
                            <ul class="list-unstyled list-inline">
                            @if (Route::has('login'))
                            @auth
                            <a style="float:right;color:white;margin-left: 7px;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a style="float:right;color:white;" href="{{ url('/home') }}">Dashboard</a> 
                            @else
                                <li><a href="{{ route('login') }}" style="color:white;"><span><i class="fa fa-lock"></i></span>Login</a></li>

                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}" style="color:white;"><span><i class="fa fa-plus"></i></span>Sign Up</a></li>
                                <li>
                                @endif
                            @endauth
                            @endif
                                	<form>
                                    	<ul class="list-inline">
                                        	<li>
                                                <div class="form-group currency">
                                                    <span><i class="fa fa-angle-down"></i></span>
                                                    <select class="form-control">
                                                        <option value="">$</option>
                                                        <option value="">£</option>
                                                    </select>
                                                </div><!-- end form-group -->
											</li>
                                            
                                            <li>
                                                <div class="form-group language">
                                                    <span><i class="fa fa-angle-down"></i></span>
                                                    <select class="form-control">
                                                        <option value="">EN</option>
                                                        <option value="">UR</option>
                                                        <option value="">FR</option>
                                                        <option value="">IT</option>
                                                    </select>
                                                </div><!-- end form-group -->
                                            </li>
										</ul>
                                    </form>
                                </li>
                            </ul>
                        </div><!-- end links -->
                    </div><!-- end columns -->				
                </div><!-- end row -->