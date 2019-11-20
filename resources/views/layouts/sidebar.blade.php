<nav class="main-menu menu-vertical-js menu-light toggler-hide">
    <div class="top-bar">
      <div class="menu-toggler-small"><i class="toggler-small-icon"></i></div>
    </div>
    <!-- Wrapper to attach the scrollbar to -->
    <div id="mmScroll" class="scroller">
      <div class="sidemenu-header" >
        <img src="demo/images/demo-13.jpg" alt="" class="img-responsive">    
      </div><!-- /.side-menu-header -->           
    
      <!-- Menu items -->
      <ul id="mainMenu" class="menubar treeview ">
        <li class="user-menu">
          <a class="sidemenu-username media" href="#">
            <div class="media-left">
              <img class="avatar circle" src="demo/images/faces/face-23.jpg" alt="">
            </div>
            <div class="media-body">
              <h5>Tours and Travels</h5>
              <span class="media-subhead">admin@tours.com</span>
            </div>                  
              </a>
                <ul id="settings-dropdown" class="sidemenu-dropdown">
                  <li>
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
            </li>
            <li>
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
            </li>
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

        <!-- <li class="menubar-item">
          <a class="menu-dropdown" href="#">
            <i class="icon mdi mdi-speedometer"></i>
            <span class="text">Dashboards</span>
          </a>
          <ul class="submenu lvl-1">
            <li class="submenu-item">
              <a href="index-2.html" class="submenu-target">Sales</a>
            </li>
            <li class="submenu-item">
              <a href="helpdesk.html" class="submenu-target">Helpdesk</a>
            </li>
          </ul>
        </li>        -->
      </ul><!-- /.menubar -->
    </div><!-- /.scrollbar -->  
  </nav><!-- /.main-menu -->
  