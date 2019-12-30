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

    



        <!--=============== HOTEL OFFERS ===============-->
        <section id="hotel-offers" class="section-padding">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-12">
                    	<div class="page-heading">
                        	<h2>Hotels Offers</h2>
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        
                        <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-hotel-offers">
                            
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                    	<a href="#">
                                        	<img src="{{ asset('public/web-assets/images/Hotel/hotel-1.jpg')}}" class="img-responsive" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                        	<ul class="list-unstyled list-inline offer-price-1">
                                            	<li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                                <li class="rating">
                                                	<span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->
                                    
                                    <div class="main-info hotel-info">
                                    	<div class="arrow">
                                        	<a href="#"><span><i class="fa fa-angle-right"></i></span></a>
                                        </div><!-- end arrow -->
                                        
                                    	<div class="main-title hotel-title">
                                            <a href="#">Herta Berlin Hotel</a>
                                            <p>From: Scotland</p>
                                        </div><!-- end hotel-title -->
                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                        	
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                    	<a href="#">
                                        	<img src="{{ asset('public/web-assets/images/Hotel/hotel-2.jpg')}}" class="img-responsive" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                        	<ul class="list-unstyled list-inline offer-price-1">
                                            	<li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                                <li class="rating">
                                                	<span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->
                                    
                                    <div class="main-info hotel-info">
                                    	<div class="arrow">
                                        	<a href="#"><span><i class="fa fa-angle-right"></i></span></a>
                                        </div><!-- end arrow -->
                                        
                                    	<div class="main-title hotel-title">
                                            <a href="#">Roosevelt Hotel</a>
                                            <p>From: Germany</p>
                                        </div><!-- end hotel-title -->
                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                            
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                    	<a href="#">
                                        	<img src="{{ asset('public/web-assets/images/Hotel/hotel-3.jpg')}}" class="img-responsive" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                        	<ul class="list-unstyled list-inline offer-price-1">
                                            	<li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                                <li class="rating">
                                                	<span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->
                                    
                                    <div class="main-info hotel-info">
                                    	<div class="arrow">
                                        	<a href="#"><span><i class="fa fa-angle-right"></i></span></a>
                                        </div><!-- end arrow -->
                                        
                                    	<div class="main-title hotel-title">
                                            <a href="#">Hotel Fort De</a>
                                            <p>From: Austria</p>
                                        </div><!-- end hotel-title -->
                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                            
                            <div class="item">
                                <div class="main-block hotel-block">
                                    <div class="main-img">
                                        <a href="#">
                                        	<img src="{{ asset('public/web-assets/images/Hotel/hotel-4.jpg')}}" class="img-responsive" alt="hotel-img" />
                                        </a>
                                        <div class="main-mask">
                                        	<ul class="list-unstyled list-inline offer-price-1">
                                            	<li class="price">$568.00<span class="divider">|</span><span class="pkg">Avg/Night</span></li>
                                                <li class="rating">
                                                	<span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star orange"></i></span>
                                                    <span><i class="fa fa-star lightgrey"></i></span>
                                                </li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end offer-img -->
                                    
                                    <div class="main-info hotel-info">
                                    	<div class="arrow">
                                        	<a href="#"><span><i class="fa fa-angle-right"></i></span></a>
                                        </div><!-- end arrow -->
                                        
                                    	<div class="main-title hotel-title">
                                            <a href="#">Roosevelt Hotel</a>
                                            <p>From: Germany</p>
                                        </div><!-- end hotel-title -->
                                    </div><!-- end hotel-info -->
                                </div><!-- end hotel-block -->
                            </div><!-- end item -->
                            
                        </div><!-- end owl-hotel-offers -->
                        
                        <div class="view-all text-center">
                        	<a href="#" class="btn btn-orange">View All</a>
                        </div><!-- end view-all -->
                    </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end hotel-offers -->

        <!--======================= BEST FEATURES =====================-->
        <section id="best-features" class="banner-padding black-features">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-dollar"></i></span>
                        	<h3>Best Price Guarantee</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-lock"></i></span>
                        	<h3>Safe and Secure</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-thumbs-up"></i></span>
                        	<h3>Best Travel Agents</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-bars"></i></span>
                        	<h3>Travel Guidelines</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end best-features -->

                <!--=============== TOUR OFFERS ===============-->
                <section id="tour-offers" class="section-padding">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-12">
                    	<div class="page-heading">
                        	<h2>Tour Offers</h2>
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        
                         <div class="owl-carousel owl-theme owl-custom-arrow" id="owl-tour-offers">
                            
                            <div class="item">
                                <div class="main-block tour-block">
                                    <div class="main-img">
                                    	<a href="#">
                                        	<img src="{{ asset('public/web-assets/images/tour-1.jpg')}}" class="img-responsive" alt="tour-img" />
                                    	</a>
                                    </div><!-- end offer-img -->
                                    
                                    <div class="offer-price-2">
                                        <ul class="list-unstyled">
                                            <li class="price">$568.00<a href="#" ><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                        </ul>
                                    </div><!-- end offer-price-2 -->
                                        
                                    <div class="main-info tour-info">
                                    	<div class="main-title tour-title">
                                            <a href="#">China Temple Tour</a>
                                            <p>From: China</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div>
                                        </div><!-- end tour-title -->
                                    </div><!-- end tour-info -->
                                </div><!-- end tour-block -->
                            </div><!-- end item -->
                            
                            <div class="item">
                                <div class="main-block tour-block">
                                    <div class="main-img">
                                        <a href="#">
                                        	<img src="{{ asset('public/web-assets/images/tour-2.jpg')}}" class="img-responsive" alt="tour-img" />
                                    	</a>
                                    </div><!-- end offer-img -->
                                    
                                    <div class="offer-price-2">
                                        <ul class="list-unstyled">
                                            <li class="price">$745.00<a href="#" ><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                        </ul>
                                    </div><!-- end offer-price-2 -->
                                        
                                    <div class="main-info tour-info">
                                    	<div class="main-title tour-title">
                                            <a href="#">African Safari Tour</a>
                                            <p>From: Africa</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div>
                                        </div><!-- end tour-title -->
                                    </div><!-- end tour-info -->
                                </div><!-- end tour-block -->
                            </div><!-- end item -->
                            
                            <div class="item">
                                <div class="main-block tour-block">
                                    <div class="main-img">
                                        <a href="#">
                                        	<img src="{{ asset('public/web-assets/images/tour-3.jpg')}}" class="img-responsive" alt="tour-img" />
                                    	</a>
                                    </div><!-- end offer-img -->
                                    
                                    <div class="offer-price-2">
                                        <ul class="list-unstyled">
                                            <li class="price">$459.00<a href="#" ><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                        </ul>
                                    </div><!-- end offer-price-2 -->
                                        
                                    <div class="main-info tour-info">
                                    	<div class="main-title tour-title">
                                            <a href="#">Paris City Tour</a>
                                            <p>From: Paris</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div>
                                        </div><!-- end tour-title -->
                                    </div><!-- end tour-info -->
                                </div><!-- end tour-block -->
                            </div><!-- end item -->
                            
                            <div class="item">
                                <div class="main-block tour-block">
                                    <div class="main-img">
                                        <a href="#">
                                        	<img src="{{ asset('public/web-assets/images/tour-4.jpg')}}" class="img-responsive" alt="tour-img" />
                                    	</a>
                                    </div><!-- end offer-img -->
                                    
                                    <div class="offer-price-2">
                                        <ul class="list-unstyled">
                                            <li class="price">$745.00<a href="#" ><span class="arrow"><i class="fa fa-angle-right"></i></span></a></li>
                                        </ul>
                                    </div><!-- end offer-price-2 -->
                                        
                                    <div class="main-info tour-info">
                                    	<div class="main-title tour-title">
                                            <a href="#">China Temple Tour</a>
                                            <p>From: China</p>
                                            <div class="rating">
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star orange"></i></span>
                                                <span><i class="fa fa-star grey"></i></span>
                                            </div>
                                        </div><!-- end tour-title -->
                                    </div><!-- end tour-info -->
                                </div><!-- end tour-block -->
                            </div><!-- end item -->
                            
                        </div><!-- end owl-tour-offers -->
                        
                        <div class="view-all text-center">
                        	<a href="#" class="btn btn-orange">View All</a>
                        </div><!-- end view-all -->
                    </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end tour-offers -->

        
        

@endsection
		
@section('footerSection')
@endsection