<div id="CityHotelModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title" style="padding-left: 10px;">Choose your hotel</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                        <h4 id="hotelcityname" class="">Sarawak - Bintulu</h4>   
                        <div id="dayHotelScroll" class="col-sm-12">

                          <div id="dayHotelList" class="row ">
                              <div class="col-md-12">  

                                <div class="theme z-depth-2 hide">
                                  <div class="toolbar">
                                    <button class="btn-flat sort" data-sort="name">sort on hotel name</button>

                                    <!-- <select id="filterTeams" class="selectpicker hide" data-width="auto">
                                      <option value="">All Teams</option>
                                      <option value="Team A">Team A</option>
                                      <option value="Team B">Team B</option>
                                      <option value="Team C">Team C</option>
                                    </select> -->

                                    <div class="pull-right mr12">
                                      <div class="float-left input-field theme hidden-xs">
                                        <i class="mdi mdi-magnify prefix"></i>
                                <!-- IMPORTANT the input needs class="search" for list.js functions -->
                                        <input class="search" type="text" placeholder="Search...">
                                        <div class="input-highlight"></div>
                                      </div>              

                                      <div class="search-wrapper pull-right">     
                                        <i class="icon action mdi toolbar-search visible-xs-inline-block"></i>

                                        <form class="search-form visible-xs-inline-block">
                                          <div class="input-group">
                                            <span class="input-group-btn no-border">
                                              <i class="icon action mdi toolbar-back "></i>
                                            </span>
                                            <div class="input-field">
                                              <input type="search" class="search input no-border" placeholder="Search...">
                                            </div><!-- /.inpt-field -->
                                            <span class="input-group-addon no-border">
                                              <i class="icon mdi mdi-magnify"></i>
                                            </span>
                                          </div>
                                        </form>
                                      </div><!-- /.search-wrapper -->               
                                    </div>
                                  </div><!-- /.toolbar -->
                                </div>
                                
                            <!-- The class "list" on the UL element is needed for the list.js functions -->
                                <ul id="listhotelsarea" class="list list-group list-group-animation item-border paper">
                                   
                                   
                                </ul>
                              </div><!-- /.col -->
                              <div class="clearfix">  </div>
                            </div><!-- /.row -->        
                          
                           
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                        
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

  <!-- /.container-fluid style="top: -44px;" -->
   <div id="CityHotelDetailsModal" class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme-accent">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title">Hotel details</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                       <div id="dayHotelScroll" class="col-sm-12">
                          <div class="row">
                            <div id="hotel-leftpanel" class="col-md-6">
                              <h2 id="view-hotel-name" class="">La Digue Island Lodge</h2>
                              <p id="view-state-city-name" class="address">Anse Reunion, La Digue</p>

                              <div class="hotel-rating-details">
                                 <img id="view-city-full-image" src="{{ asset('public/assets/demo/images/demo-12.jpg') }}" alt="" style="width: 100%;height: 230px;" class="img-responsive">
                                  <!--<div class="right-part">80 Good <a class="sur-ipink">(156 reviews)</a></div>-->
                                  <div style="clear:both"></div>
                              </div> 
                              <div class="row ">

                                  <div class="divider theme ml14 mr14"></div>
                                  <div id="view-hotel-imagearea">
                                  </div>
                                  
                              </div>   
                              <br>
                              <h2>Ameneties</h2>
                              <div id="ameneties-list-container" class="ameneties-list-container">
                                
                                 <div style="clear:both"></div>                                                                                         
                              </div>
                           
                               <h2>Overview </h2>
                               
                              <div id="view-hotel-overview" class="hotel-description">
                                 
                              </div>
                            </div>
                            <div id="hotel-rightpanel" class="col-md-6">
                              <div class="row"> 
                                <div class="col-md-2">
                                  <h3>
                                  Rating</h3>
                                </div>
                                <div class="col-md-8">
                                  <div class="rating" style="color: #faa61a;">
                                    <span><i id="viewrating-1" class="viewrating icon mdi mdi-star"></i></span>
                                    <span><i id="viewrating-2" class="viewrating icon mdi mdi-star"></i></span>
                                    <span><i id="viewrating-3" class="viewrating icon mdi mdi-star"></i></span>
                                    <span><i id="viewrating-4" class="viewrating icon mdi mdi-star"></i></span>
                                    <span><i id="viewrating-5" class="viewrating icon mdi mdi-star-outline"></i></span>
                                  </div>
                                </div>
                              </div>
                              <br>
                               
                               
                              <h2>Room Types</h2>
                              <div id="view-hotel-roomtypes" class="room-type-header">

                              </div>
                               <h2>Listing Descriptions </h2>
                              <div id="view-hotel-listdescription" class="hotel-description">

                              </div>
                              <br><br>
                             
                            </div>
                          </div>
                           
                              
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <!-- /.container-fluid -->
   <div id="CityActivityModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title" style="padding-left: 10px;">Choose your activity</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                        <h4 id="activitycityname" class="">Sarawak - Bintulu</h4>   
                        <div id="dayactivityScroll" class="col-sm-12">

                          <div id="dayActivityList" class="row ">
                              <div class="col-md-12">  

                                <div class="theme z-depth-2 hide">
                                  <div class="toolbar">
                                    <button class="btn-flat sort" data-sort="name">sort on hotel name</button>

                                    <!-- <select id="filterTeams" class="selectpicker hide" data-width="auto">
                                      <option value="">All Teams</option>
                                      <option value="Team A">Team A</option>
                                      <option value="Team B">Team B</option>
                                      <option value="Team C">Team C</option>
                                    </select> -->

                                    <div class="pull-right mr12">
                                      <div class="float-left input-field theme hidden-xs">
                                        <i class="mdi mdi-magnify prefix"></i>
                                <!-- IMPORTANT the input needs class="search" for list.js functions -->
                                        <input class="search" type="text" placeholder="Search...">
                                        <div class="input-highlight"></div>
                                      </div>              

                                      <div class="search-wrapper pull-right">     
                                        <i class="icon action mdi toolbar-search visible-xs-inline-block"></i>

                                        <form class="search-form visible-xs-inline-block">
                                          <div class="input-group">
                                            <span class="input-group-btn no-border">
                                              <i class="icon action mdi toolbar-back "></i>
                                            </span>
                                            <div class="input-field">
                                              <input type="search" class="search input no-border" placeholder="Search...">
                                            </div><!-- /.inpt-field -->
                                            <span class="input-group-addon no-border">
                                              <i class="icon mdi mdi-magnify"></i>
                                            </span>
                                          </div>
                                        </form>
                                      </div><!-- /.search-wrapper -->               
                                    </div>
                                  </div><!-- /.toolbar -->
                                </div>
                                
                            <!-- The class "list" on the UL element is needed for the list.js functions -->
                                <ul id="listactivitiesarea" class="list list-group list-group-animation item-border paper">
                                   
                                   
                                </ul>
                              </div><!-- /.col -->
                              <div class="clearfix">  </div>
                            </div><!-- /.row -->        
                           
                           
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                        
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->



    <div id="CityActivityDetailsModal" class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme-accent">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title">Activity details</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                       <div id="dayHotelScroll" class="col-sm-12">
                          <div class="row">
                            <div id="hotel-leftpanel" class="col-md-6">
                              <h2 id="view-activity-name" class="">La Digue Island Lodge</h2>
                              <p id="activity-state-city-name" class="address">Anse Reunion, La Digue</p>

                              <div class="hotel-rating-details">
                                 <img id="view-activity-full-image" src="{{ asset('public/assets/demo/images/demo-12.jpg') }}" alt="" style="width: 100%;height: 230px;" class="img-responsive">
                                  <!--<div class="right-part">80 Good <a class="sur-ipink">(156 reviews)</a></div>-->
                                  <div style="clear:both"></div>
                              </div> 
                              <div class="row ">

                                  <div class="divider theme ml14 mr14"></div>
                                  <div id="view-activity-imagearea">
                                  </div>
                                  
                              </div>   
                              <br>
                             
                               <h2>Overview </h2>
                               
                              <div id="view-activity-overview" class="hotel-description">
                                 
                              </div>
                            </div>
                            <div id="hotel-rightpanel" class="col-md-6">
                              <h2 id="activity_duration" style="font-size: 16px;"> <span style="font-weight: bold;"> Minimum Approx. </span>  <span id="view_activity_duration"> Room Types </span>  <a id="activity_price" class="pull-right hide">1500</a></h2>
                              <div id="view-hotel-roomtypes" class="room-type-header">

                              </div>
                               <h2>Inclusions </h2>
                                <div id="view-activity-inclusion" class="hotel-description">
                                  <ul id="view-activity-inclusion-list">
                                    
                                  </ul>
                                </div>
                              <br>
                               <h2>Exclusions </h2>
                                <div id="view-activity-exclusion" class="hotel-description">
                                  <ul id="view-activity-exclussion-list">
                                   
                                  </ul>
                                </div>
                              <br>
                               <h2>Additional info </h2>
                                <div id="view-activity-additional-info" class="hotel-description">
                                 
                               </div>
                              
                              <button id="viewactivityconfirm" type="button" onclick="" class="btn btn-sm green waves-effect waves-theme">Confirm</button>
                            </div>
                          </div>
                           
                              
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->