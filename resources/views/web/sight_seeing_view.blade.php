@extends('layouts.admin')
@section('headSection')
<link href="{{ asset('public/web-assets/css/slick.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/web-assets/css/slick-theme.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('main-content')
  <!--================= PAGE-COVER ================-->
  <section class="page-cover" id="cover-hotel-grid-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Sight Seeing</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Sight Seeing Detail </li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

                <!--===== INNERPAGE-WRAPPER ====-->
                <section class="innerpage-wrapper">
        	<div id="hotel-details" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">        	
                        
                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                            
                            <div class="side-bar-block booking-form-block">
                            	<h2 class="selected-price">$568.00 <span>De Forte</span></h2>
                            
                            	<div class="booking-form">
                                	<h3>Book Hotel</h3>
                                    <p>Find your dream hotel today</p>
                                    
                                    <form>
                                    	<div class="form-group">
                                    		<input type="text" class="form-control" placeholder="First Name" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="Last Name" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="email" class="form-control" placeholder="Email" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="Phone" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control" placeholder="Country" required/>                                       
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control dpd1" placeholder="Arrival Date" required/>                                       		<i class="fa fa-calendar"></i>
                                        </div>
                                        
                                        <div class="form-group">
                                    		<input type="text" class="form-control dpd2" placeholder="Departure Date" required/>                                       		<i class="fa fa-calendar"></i>
                                        </div>
                                        
                                        <div class="row">
                                        	<div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected>Rooms</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">    
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected>Beds</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        	<div class="col-sm-6 col-md-12 col-lg-6 no-sp-r">
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected>Adults</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div>
                                            
                                            <div class="col-sm-6 col-md-12 col-lg-6 no-sp-l">    
                                                <div class="form-group right-icon">
                                                    <select class="form-control">
                                                        <option selected>Childs</option>
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                    </select>
                                                    <i class="fa fa-angle-down"></i>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group right-icon">
                                            <select class="form-control">
                                                <option selected>Payment Method</option>
                                                <option>Credit Card</option>
                                                <option>Paypal</option>
                                            </select>
                                            <i class="fa fa-angle-down"></i>
                                        </div>
                                        
                                        <div class="checkbox custom-check">
                                        	<input type="checkbox" id="check01" name="checkbox"/>
                                            <label for="check01"><span><i class="fa fa-check"></i></span>By continuing, you are agree to the <a href="#">Terms & Conditions.</a></label>
                                        </div>
                                        
                                        <button class="btn btn-block btn-orange">Confirm Booking</button>
                                    </form>

                                </div><!-- end booking-form -->
                            </div><!-- end side-bar-block -->
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-6 col-md-12">
                                    <div class="side-bar-block main-block ad-block">
                                        <div class="main-img ad-img">
                                            <a href="#">
                                                <img src="images/car-ad.jpg" class="img-responsive" alt="car-ad" />
                                                <div class="ad-mask">
                                                    <div class="ad-text">
                                                        <span>Luxury</span>
                                                        <h2>Car</h2>
                                                        <span>Offer</span>
                                                    </div><!-- end ad-text -->
                                                </div><!-- end columns -->
                                            </a>
                                        </div><!-- end ad-img -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-6 col-md-12">    
                                    <div class="side-bar-block support-block">
                                        <h3>Need Help</h3>
                                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum.</p>
                                        <div class="support-contact">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>+1 123 1234567</p>
                                        </div><!-- end support-contact -->
                                    </div><!-- end side-bar-block -->
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </div><!-- end columns -->
                        
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                            
                            <div class="detail-slider">
                                <div class="feature-slider">
                                    @php
                                $row = $data['activities_view'][0];
                                 $activityimage = CommonHelper::getActivityImages($row->id);   @endphp
                                   
                                    @foreach($activityimage as $values)
                                    <div><img src="{{asset('storage/app/activity/'.$values->image_name)}}" style="width:848px; height:494px;" class="img-responsive" alt="feature-thumb"/></div>
                                    @endforeach
                                </div><!-- end feature-slider -->
                            	
                                <div class="feature-slider-nav">
                                @foreach($activityimage as $values)
                                    <div><img src="{{asset('storage/app/activity/'.$values->image_name)}}" style="width:200px; height:150px;padding:5px;" class="img-responsive" alt="feature-thumb"/></div>
                                    @endforeach
                                </div><!-- end feature-slider-nav -->
                            </div>  <!-- end detail-slider -->

                            <div class="detail-tabs">
                            	<!-- <ul class="nav nav-tabs nav-justified">
                                    <li class="active"><a href="#hotel-overview" data-toggle="tab">Hotel Overview</a></li>
                                    <li><a href="#restaurant" data-toggle="tab">Restaurant</a></li>
                                    <li><a href="#pick-up" data-toggle="tab">Pick Up Services</a></li>
                                    <li><a href="#luxury-gym" data-toggle="tab">Luxury Gym</a></li>
                                    <li><a href="#sports-club" data-toggle="tab">Sports Club</a></li>
                                </ul> -->
                            	
                                <div class="tab-content">

                                    <div id="hotel-overview" class="tab-pane in active">
                                    	<div class="row">
                                    
                                        	
                                            <div class="col-sm-12 col-md-12 tab-text">
                                        		<h3> {{$row->title_name}}</h3>
                                                @php
                                                $hours = floor($row->duartion_hours / 60) ;
                                                $minutes = floor($row->duartion_hours % 60) ;

                                                if($hours == 0 )
                                                {
                                                    $hours = '';
                                                }
                                                elseif($hours == 1){
                                                    $hours = $hours.' '.'hour';
                                                }
                                                else{
                                                    $hours = $hours.' '.'hours';
                                                }

                                                    if($minutes == 0)
                                                    {
                                                        $minutes = '';
                                                    }
                                                    elseif($minutes == 1){
                                                        $minutes = $minutes.' '.'minute';
                                                    }
                                                    else{
                                                        $minutes = $minutes.' '.'minutes';
                                                    }

                                                    $hours_and_minutes = $hours.' '.$minutes;
                                                   
                                                     $country_name = CommonHelper::getCountryName($row->country_id);
                                                        $state_name = CommonHelper::getstateName($row->state_id);
                                                        $city_name = CommonHelper::getcityName($row->city_id);
                                               
                                                    @endphp
                                                <h4> Duration : {{$hours_and_minutes}} </h4>
                                                <h5> Place : {{$country_name}} , {{$state_name}} , {{$city_name}}  </h5>
                                                <p>{!! $row->short_description ? $row->short_description : '' !!}</p>
                               
                                            @php    $inclusion = $row->inclusion_name; 
                                                
                                                    if(!empty($inclusion))
                                                    {
                                                        $someArray = json_decode($inclusion, true);
                                                    }
                                                    $exclusion = $row->exclusion_name; 
                                                    if(!empty($exclusion))
                                                        {
                                                            $excsomeArray = json_decode($exclusion, true);
                                                        }
                                                        @endphp
                                                <p class="inner-bullets" style="color: #faa61a;font-size: 16px;"><b> Inclusions </b>  </p>
                                                <ul style="list-style-type:disc;">

                                                @php
                                                    if(!empty($someArray))
                                                    {
                                                        @endphp
                                                        @foreach($someArray as $values)		
                                                                <li class="inner-bullets">{{$values ? $values : ''}}</li>
                                                        @endforeach
                                                    @php
                                                    }
                                                    @endphp
                                                </ul> 

                                                <p class="inner-bullets"   style="color: #faa61a;font-size: 16px;"><b> Exclusions </b>  </p>
                                                <ul style="list-style-type:disc;">
                                                    @php
                                                    if(!empty($someArray))
                                                    {
                                                        @endphp
                                                        @foreach($excsomeArray as $values)
                                                            <li class="inner-bullets">{{$values ? $values : ''}}</li>
                                                        @endforeach
                                                        @php
                                                    }
                                                    @endphp
                                                </ul> 

                                            </div><!-- end columns -->
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                	
                                    
                                    
                                  
                                    
                                    
                                    
                                    
                                </div><!-- end tab-content -->
                            </div><!-- end detail-tabs -->
                            
                            
                            
                            
                            <div class="pages">
                                <ol class="pagination">
                                    <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                                </ol>
                            </div><!-- end pages -->
                        </div><!-- end columns -->

                    </div><!-- end row -->
            	</div><!-- end container -->
            </div><!-- end hotel-details -->
        </section><!-- end innerpage-wrapper -->


@endsection
		
@section('footerSection')
<script src ="{{ asset('public/web-assets/js/slick.min.js') }}"></script>
<script src ="{{ asset('public/web-assets/js/custom-slick.js') }}"></script>
@endsection