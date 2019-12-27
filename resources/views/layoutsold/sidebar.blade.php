<nav class="main-menu menu-vertical-js menu-light toggler-hide">
    <div class="top-bar">
      <div class="menu-toggler-small"><i class="toggler-small-icon"></i></div>
    </div>
    <!-- Wrapper to attach the scrollbar to -->
    <div id="mmScroll" class="scroller">
      <div class="sidemenu-header" >
        <img src="{{ asset('public/assets/demo/images/demo-13.jpg') }}" alt="" class="img-responsive">    
      </div><!-- /.side-menu-header -->           
    
      <!-- Menu items -->
      <ul id="mainMenu" class="menubar treeview ">
        <li class="user-menu">
          <a class="sidemenu-username media" href="#">
            <div class="media-left">
              <img class="avatar circle" src="{{ asset('public/assets/images/admin.png') }}" alt="">
            </div>
            <div class="media-body">
              <h5>Tours and Travels</h5>
              <span class="media-subhead">{{ Auth::user()->email }}</span>
            </div>                  
              </a>
                <ul id="settings-dropdown" class="sidemenu-dropdown">
                  <!--li>
              <a class="menu-dropdown" href="#">
                <span class="text">Email</span>
              </a>
              <ul class="submenu lvl-1">
                <li class="submenu-item">
                  <a href="inbox.html" class="submenu-target"><i class="icon mdi mdi-email"></i>Inbox</a>
                </li>
                <li class="submenu-item">
                  <a href="#:;" class="submenu-target"><i class="icon mdi mdi-star"></i>Starred</a>
                </li>
                <li class="submenu-item">
                  <a href="#:;" class="submenu-target"><i class="icon mdi mdi-send"></i>Sent</a>
                </li>
                <li class="submenu-item">
                  <a href="#:;" class="submenu-target"><i class="icon mdi mdi-email-open"></i>Drafts</a>
                </li>             
                <li class="submenu-item">
                  <a href="#:;" class="submenu-target"><i class="icon mdi mdi-alert-circle"></i>Spam</a>
                </li>
                <li class="submenu-item">
                  <a href="#:;" class="submenu-target"><i class="icon mdi mdi-delete"></i>Trash</a>
                </li>
              </ul>
            </li-->
            <!--li>
              <a class="menu-dropdown" href="#">
                <span class="text">Files</span>
              </a>
              <ul class="submenu lvl-1">
                <li class="submenu-item">
                  <a href="filemanager.html" class="submenu-target"><i class="icon mdi mdi-content-copy"></i>Documents</a>
                </li>
                <li class="submenu-item">
                  <a href="filemanager.html" class="submenu-target"><i class="icon mdi mdi-download"></i>Downloads</a>
                </li>
                <li class="submenu-item">
                  <a href="filemanager.html" class="submenu-target"><i class="icon mdi mdi-image-filter"></i>Pictures</a>
                </li>
                <li class="submenu-item">
                  <a href="filemanager.html" class="submenu-target"><i class="icon mdi  mdi-music-note"></i>Music</a>
                </li>             
                <li class="submenu-item">
                  <a href="filemanager.html" class="submenu-target"><i class="icon mdi mdi-video"></i>Videos</a>
                </li>
              </ul>
            </li-->
                    <li>
                        <a href="#:;">Profile</a>
                    </li>

                    <li>
                        <a href="{{ route('changepassword') }}">{{__('Change Password') }}</a>
                    </li>
                    
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    </li>
                </ul>
            </li>
            <li id="dashboard_sidebar_li_id" class="menubar-item">
              <a class="menu-dropdown" href="{{ route('home') }}">
                <i class="icon mdi mdi-speedometer"></i>
                <span class="text">{{ __('Dashboard') }}</span>
              </a>
            </li>
            <li id="master-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-format-list-bulleted"></i>
                <span class="text">{{ __('Masters') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="country_sidebar_li_id" class="submenu-item">
                  <a id="country_sidebar_a_id" href="{{ route('master.country') }}" class="submenu-target">{{ __('Country Details') }}</a>
                </li>
                <li id="state_sidebar_li_id" class="submenu-item">
                  <a id="state_sidebar_a_id" href="{{route('master.state')}}" class="submenu-target">{{ __('State Details') }}</a>
                </li>
                <li id="city_sidebar_li_id" class="submenu-item">
                  <a id="city_sidebar_a_id" href="{{route('master.city')}}" class="submenu-target">{{ __('City Details') }}</a>
                </li>
              </ul>
            </li>    
            <li id="master-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-hotel"></i>
                <span class="text">{{ __('Hotels') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="hotel_sidebar_li_id" class="submenu-item">
                  <a id="hotel_sidebar_a_id" href="{{ route('master.hotel') }}" class="submenu-target">{{ __('All Hotels') }}</a>
                </li>
                <li id="hotel_add_sidebar_li_id" class="submenu-item">
                  <a id="hotel_add_sidebar_a_id" href="{{route('hotel.new')}}" class="submenu-target">{{ __('Add New Hotel') }}</a>
                </li>
                <li id="amenities_sidebar_li_id" class="submenu-item">
                  <a id="amenities_sidebar_a_id" href="{{route('amenities.new')}}" class="submenu-target">{{ __('Amenities') }}</a>
                </li>
                <li id="roomtype_sidebar_li_id" class="submenu-item">
                  <a id="roomtype_sidebar_a_id" href="{{route('roomtype.new')}}" class="submenu-target">{{ __(' Room Type') }}</a>
                </li>
                <li id="hotelrooms_sidebar_li_id" class="submenu-item">
                  <a id="hotelrooms_sidebar_a_id" href="{{route('hotel.rooms')}}" class="submenu-target">{{ __(' Hotel Rooms') }}</a>
                </li>
              </ul>
            </li>   
            <li id="activity-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-satellite-variant"></i>
                <span class="text">{{ __('Activities') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="activity_sidebar_li_id" class="submenu-item">
                  <a id="activity_sidebar_a_id" href="{{ route('master.activity') }}" class="submenu-target">{{ __('All Activities') }}</a>
                </li>
                <li id="activity_add_sidebar_li_id" class="submenu-item">
                  <a id="activity_add_sidebar_a_id" href="{{route('activity.new')}}" class="submenu-target">{{ __('Add Activity') }}</a>
                </li>
                
              </ul>
            </li>  
            <li id="packages-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-package"></i>
                <span class="text">{{ __('Packages') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="packages_sidebar_li_id" class="submenu-item">
                  <a id="packages_sidebar_a_id" href="{{ route('package.list') }}" class="submenu-target">{{ __('All Packages') }}</a>
                </li>
                <li id="package_add_sidebar_li_id" class="submenu-item">
                  <a id="package_add_sidebar_a_id" href="{{route('package.new')}}" class="submenu-target">{{ __('Add Package') }}</a>
                </li>
                <li id="package_add_sidebar_li_id" class="submenu-item">
                  <a id="packagetype_add_sidebar_a_id" href="{{route('packagetype.list')}}" class="submenu-target">{{ __('Package Type') }}</a>
                </li>
              </ul>
            </li> 
            <li id="booking-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-package"></i>
                <span class="text">{{ __('Booking') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="booking_sidebar_li_id" class="submenu-item">
                  <a id="booking_sidebar_a_id" href="{{ route('bookings.list') }}" class="submenu-target">{{ __('All Bookings') }}</a>
                </li>
                <li id="booking_add_sidebar_li_id" class="submenu-item">
                  <a id="booking_add_sidebar_a_id" href="{{route('booking.new')}}" class="submenu-target">{{ __('Add Booking') }}</a>
                </li>
              </ul>
            </li>    
           
            <li id="customer-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-account-settings"></i>
                <span class="text">{{ __('Customers') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="customer_sidebar_li_id" class="submenu-item">
                  <a id="customer_sidebar_a_id" href="{{route('customer.new')}}" class="submenu-target">{{ __('All Customers') }}</a>
                </li>
                <li id="customer_add_sidebar_li_id" class="submenu-item">
                  <a id="customer_add_sidebar_a_id" href="{{route('customer.add')}}" class="submenu-target">{{ __('Add Customer') }}</a>
                </li>
              </ul>
            </li> 
            <li id="enquiry-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-phone"></i>
                <span class="text">{{ __('Enquiries') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="enquiries_sidebar_li_id" class="submenu-item">
                  <a id="enquiries_sidebar_a_id" href="{{route('enquiry.new')}}" class="submenu-target">{{ __('All Enquiries') }}</a>
                </li>
                <li id="enquiries_add_sidebar_li_id" class="submenu-item">
                  <a id="enquiries_add_sidebar_a_id" href="{{route('enquiry.add')}}" class="submenu-target">{{ __('Add Enquiry') }}</a>
                </li>
              </ul>
            </li> 
            <li id="settings-menu" class="menubar-item">
              <a class="menu-dropdown" href="#">
                <i class="icon mdi mdi-settings"></i>
                <span class="text">{{ __('Settings') }}</span>
              </a>
              <ul class="submenu lvl-1">
                <li id="tax_sidebar_li_id" class="submenu-item">
                  <a id="tax_sidebar_a_id" href="{{route('tax.new')}}" class="submenu-target">{{ __('Tax') }}</a>
                </li>
                <li id="website_sidebar_li_id" class="submenu-item">
                  <a id="website_sidebar_a_id" href="{{route('website.new')}}" class="submenu-target">{{ __('Website') }}</a>
                </li>        
              </ul>
            </li>
      </ul><!-- /.menubar -->
    </div><!-- /.scrollbar -->  
  </nav><!-- /.main-menu -->
  