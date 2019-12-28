@extends('layouts.admin')
@section('headSection')
@endsection

@section('main-content')
<section class="flexslider-container" id="flexslider-container-1">

<div class="flexslider slider" id="slider-1">
    <ul class="slides">
        
        <li class="item-1" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(public/web-assets/images/slider/homepage-slider-1.jpg) 50% 0%;
background-size:cover;
height:100%;">
            <div class=" meta">         
                <div class="container">
                    <h2>Discover</h2>
                    <h1>Australia</h1>
                    <a href="#" class="btn btn-default">View More</a>
                </div><!-- end container -->  
            </div><!-- end meta -->
        </li><!-- end item-1 -->
        
        <li class="item-2" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(public/web-assets/images/slider/homepage-slider-1.jpg) 50% 0%;
background-size:cover;
height:100%;">
            <div class=" meta">         
                <div class="container">
                    <h2>Discover</h2>
                    <h1>Australia</h1>
                    <a href="#" class="btn btn-default">View More</a>
                </div><!-- end container -->  
            </div><!-- end meta -->
        </li><!-- end item-2 -->
       
    </ul>
</div><!-- end slider -->

<div class="search-tabs" id="search-tabs-1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
            
                <ul class="nav nav-tabs center-tabs">
                    <li class="active hide"><a href="#flights" data-toggle="tab"><span><i class="fa fa-plane"></i></span><span class="st-text">Flights</span></a></li>
                    <!--li><a href="#hotels" data-toggle="tab"><span><i class="fa fa-building"></i></span><span class="st-text">Hotels</span></a></li>
                    <li><a href="#tours" data-toggle="tab"><span><i class="fa fa-suitcase"></i></span><span class="st-text">Tours</span></a></li>
                    <li><a href="#cruise" data-toggle="tab"><span><i class="fa fa-ship"></i></span><span class="st-text">Cruise</span></a></li>
                    <li><a href="#cars" data-toggle="tab"><span><i class="fa fa-car"></i></span><span class="st-text">Cars</span></a></li-->
                </ul>

                <div class="tab-content">

                    <div id="flights" class="tab-pane in active">
                        <form>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <div class="row">
                                    
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="From" >
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="To" >
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <div class="row">
                                    
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd1" placeholder="Check In" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd2" placeholder="Check Out" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group right-icon">
                                        <select class="form-control">
                                            <option selected>Adults</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                    <button class="btn btn-orange">Search</button>
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </form>
                    </div><!-- end flights -->
                    
                    <div id="hotels" class="tab-pane">
                        <form>
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                    <div class="row">
                                    
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd1" placeholder="Check In" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd2" placeholder="Check Out" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5">
                                    <div class="row">
                                    
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Rooms</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Adults</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-6 col-sm-6 col-md-4">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Kids</option>
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                    <button class="btn btn-orange">Search</button>
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </form>
                    </div><!-- end hotels -->

                    <div id="tours" class="tab-pane">
                        <form>
                            <div class="row">
                            
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-4">
                                    <div class="form-group left-icon">
                                        <input type="text" class="form-control" placeholder="City,Country" />
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                    <div class="form-group right-icon">
                                        <select class="form-control">
                                            <option selected>Month</option>
                                            <option>January</option>
                                            <option>February</option>
                                            <option>March</option>
                                            <option>April</option>
                                            <option>May</option>
                                            <option>June</option>
                                            <option>July</option>
                                            <option>August</option>
                                            <option>September</option>
                                            <option>October</option>
                                            <option>November</option>
                                            <option>December</option>
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Adults</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="form-group right-icon">
                                                <select class="form-control">
                                                    <option selected>Kids</option>
                                                    <option>0</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                </select>
                                                <i class="fa fa-angle-down"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                    <button class="btn btn-orange">Search</button>
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </form>
                    </div><!-- end tours -->
                    
                    <div id="cruise" class="tab-pane">
                        <form>
                            <div class="row">
                                
                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <div class="row">
                                    
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="From" >
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="To" >
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <div class="row">
                                    
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd1" placeholder="Check In" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd2" placeholder="Check Out" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->

                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group right-icon">
                                        <select class="form-control">
                                        <option selected>Adults</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </div>
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                    <button class="btn btn-orange">Search</button>
                                </div><!-- end columns -->
                                
                            </div><!-- end columns -->
                        </form>
                    </div><!-- end cruises -->

                    <div id="cars" class="tab-pane">
                        <form>					
                            <div class="row">
                            
                                <div class="col-xs-12 col-sm-12 col-md-7 col-lg-6">
                                    <div class="row">
                                    
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="Country" />
                                                <i class="fa fa-globe"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-sm-6 col-md-4">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="City" />
                                                <i class="fa fa-map-marker"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-sm-12 col-md-4">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control" placeholder="Location" />
                                                <i class="fa fa-street-view"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <div class="row">
                                    
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd1" placeholder="Check In" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd2" placeholder="Check Out" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div><!-- end columns -->
                                        
                                    </div><!-- end row -->
                                </div><!-- end columns -->

                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                    <button class="btn btn-orange">Search</button>
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->					
                        </form>
                    </div><!-- end cars -->
                    
                </div><!-- end tab-content -->
                
            </div><!-- end columns -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end search-tabs -->

</section><!-- end flexslider-container -->

@endsection
		
@section('footerSection')
@endsection