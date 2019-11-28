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
                <li id="country_sidebar_li_id" class="submenu-item">
                  <a id="country_sidebar_a_id" href="{{ route('master.hotel') }}" class="submenu-target">{{ __('All Hotels') }}</a>
                </li>
                <li id="state_sidebar_li_id" class="submenu-item">
                  <a id="state_sidebar_a_id" href="{{route('hotel.new')}}" class="submenu-target">{{ __('Add New Hotel') }}</a>
                </li>
                <li id="amenities_sidebar_li_id" class="submenu-item">
                  <a id="amenities_sidebar_a_id" href="{{route('amenities.new')}}" class="submenu-target">{{ __('Add New Amenities') }}</a>
                </li>
                <li id="amenities_sidebar_li_id" class="submenu-item">
                  <a id="amenities_sidebar_a_id" href="{{route('roomtype.new')}}" class="submenu-target">{{ __('Add Room Type') }}</a>
                </li>
              </ul>
            </li>     
      </ul><!-- /.menubar -->
    </div><!-- /.scrollbar -->  
  </nav><!-- /.main-menu -->
  