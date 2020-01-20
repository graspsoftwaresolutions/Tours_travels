@if(auth())
@extends('layouts.admin')
@section('headSection')
<style>
    #cover-tour-grid-list {
        background: url('{{ asset("public/web-assets/images/cover-tour-grid-list.jpg") }}') 50% 84%;
        background-size: 140%;
        color: white;
    }
    .section-padding{
        padding-top: 50px;
        padding-bottom: 50px;
    }
</style>
@endsection
@section('main-content')
@php 
   $authid =  Auth::user()->id ;
   if($authid!='' && $authid!=null)
   {
        $Created_Itineraries = CommonHelper::getCreatedItineraries($authid);    
   }
@endphp
            <!--===== INNERPAGE-WRAPPER ====-->
            <section class="innerpage-wrapper">
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                        	<div class="dashboard-heading">
                                <h2>My <span>Trips</span></h2>
                                <p>Hi {{ Auth::check() ? Auth::user()->name : '' }}, Welcome to Aspire Tours and Travels!</p>
                                <p>All your trips booked with us will appear here and you'll be able to manage everything!</p>
                            </div><!-- end dashboard-heading -->
                        	
                            
                            <div id="dashboard-tabs">
                            	<ul class="nav nav-tabs nav-justified">
                                    <li class="active"><a href="#dsh-dashboard" data-toggle="tab"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                    <!-- <li><a href="#dsh-profile" data-toggle="tab"><span><i class="fa fa-user"></i></span>Profile</a></li> -->
                                    <li><a href="#dsh-wishlist" data-toggle="tab"><span><i class="fa fa-briefcase"></i></span>Itineraries created</a></li>
                                    <li><a href="#dsh-booking" data-toggle="tab"><span><i class="fa fa-briefcase"></i></span>Booked Trips</a></li>
                                    
                                    <li><a href="#dsh-cards" data-toggle="tab"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li>
                                </ul>
                                <div class="tab-content">
                                	<div id="dsh-dashboard" class="tab-pane in active fade">
                                		<div class="dashboard-content">
                                            <!-- <h2 class="dash-content-title">Total Traveled</h2> -->
                                            <!-- <div class="row info-stat">
                                            
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="stat-block">
                                                        <span><i class="fa fa-tachometer"></i></span>
                                                        <h3>1548</h3>
                                                        <p>Miles</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="stat-block">
                                                        <span><i class="fa fa-globe"></i></span>
                                                        <h3>12%</h3>
                                                        <p>World</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="stat-block">
                                                        <span><i class="fa fa-building"></i></span>
                                                        <h3>312</h3>
                                                        <p>Cities</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-sm-6 col-md-3">
                                                    <div class="stat-block">
                                                        <span><i class="fa fa-paper-plane"></i></span>
                                                        <h3>102</h3>
                                                        <p>Trips</p>
                                                    </div>
                                                </div>
                                                
                                            </div> -->
                                            
                                            <!-- <div class="dashboard-listing recent-activity">
                                                <h3 class="dash-listing-heading">Recent Activites</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bars"></i></td>
                                                                <td class="dash-list-text recent-ac-text">Your listing <span>The Star Travel</span> has been approved!</td>
                                                                <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon recent-ac-icon"><i class="fa fa-star"></i></td>
                                                                <td class="dash-list-text recent-ac-text">Kathy Brown left a review on <span>The Star Travel</span></td>
                                                                <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bookmark"></i></td>
                                                                <td class="dash-list-text recent-ac-text">Someone bookmarked your Norma <span>Spa Center</span> listing!</td>
                                                                <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon recent-ac-icon"><i class="fa fa-star"></i></td>
                                                                <td class="dash-list-text recent-ac-text">Kathy Brown left a review on <span>Auto Repair Shop</span></td>
                                                                <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon recent-ac-icon"><i class="fa fa-bookmark"></i></td>
                                                                <td class="dash-list-text recent-ac-text">Someone bookmarked your <span>The Star Apartment</span> listing!</td>
                                                                <td class="dash-list-btn del-field"><button class="btn">X</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> -->
                                            
                                            <!-- <div class="dashboard-listing invoices">
                                                <h3 class="dash-listing-heading">Invoices</h3>
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                                <td class="dash-list-text invoice-text">
                                                                    <h4 class="invoice-title">Professional Plan</h4>
                                                                    <ul class="list-unstyled list-inline invoice-info">
                                                                        <li class="invoice-status red">Unpaid</li>
                                                                        <li class="invoice-order"> Order: #00214</li>
                                                                        <li class="invoice-date"> Date: 25/08/2017</li>
                                                                    </ul>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                                <td class="dash-list-text invoice-text">
                                                                    <h4>Extended Plan</h4>
                                                                    <ul class="list-unstyled list-inline invoice-info">
                                                                        <li class="invoice-status green">Paid</li>
                                                                        <li class="invoice-order"> Order: #00214</li>
                                                                        <li class="invoice-date"> Date: 25/08/2017</li>
                                                                    </ul>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                                <td class="dash-list-text invoice-text">
                                                                    <h4>Extended Plan</h4>
                                                                    <ul class="list-unstyled list-inline invoice-info">
                                                                        <li class="invoice-status red">Unpaid</li>
                                                                        <li class="invoice-order"> Order: #00214</li>
                                                                        <li class="invoice-date"> Date: 25/08/2017</li>
                                                                    </ul>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon invoice-icon"><i class="fa fa-bars"></i></td>
                                                                <td class="dash-list-text invoice-text">
                                                                    <h4>Basic Plan</h4>
                                                                    <ul class="list-unstyled list-inline invoice-info">
                                                                        <li class="invoice-status red">Unpaid</li>
                                                                        <li class="invoice-order"> Order: #00214</li>
                                                                        <li class="invoice-date"> Date: 25/08/2017</li>
                                                                    </ul>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">View Invoice</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> -->
                                        </div><!-- end dashboard-content -->
                                    </div><!-- end dsh-dashboard -->
                                    
                                    <div id="dsh-profile" class="tab-pane fade">
                                    	<div class="dashboard-content user-profile">
                                            <h2 class="dash-content-title">My Profile</h2>
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><h4>Profile Details</h4></div>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-sm-5 col-md-4 user-img">
                                                            <img src="images/user-profile.jpg" class="img-responsive" alt="user-img" />
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-sm-7 col-md-8  user-detail">
                                                            <ul class="list-unstyled">
                                                                <li><span>Name:</span> Lisa Jorge</li>
                                                                <li><span>Date of Birth:</span> 25 Jan 1987</li>
                                                                <li><span>Email:</span> youremail@gmail.com</li>
                                                                <li><span>Phone:</span> +31 123 456 7890</li>
                                                                <li><span>Address:</span> 23 Block, Lorem Ipsum, California.</li>
                                                                <li><span>Country:</span> United States of America</li>
                                                            </ul>
                                                            <button class="btn" data-toggle="modal" data-target="#edit-profile">Edit Profile</button>
                                                        </div><!-- end columns -->
                                                        
                                                        <div class="col-sm-12 user-desc">
                                                            <h4>About You</h4>
                                                            <p>Vestibulum tristique, justo eu sollicitudin sagittis, metus dolor eleifend urna, quis scelerisque purus quam nec ligula. Suspendisse iaculis odio odio, ac vehicula nisi faucibus eu. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse posuere semper sem ac aliquet. Duis vel bibendum tellus, eu hendrerit sapien. Proin fringilla, enim vel lobortis viverra, augue orci fringilla diam, sed cursus elit mi vel lacus. Nulla facilisi. Fusce sagittis, magna non vehicula gravida, ante arcu pulvinar arcu, aliquet luctus arcu purus sit amet sem. Mauris blandit odio sed nisi porttitor egestas. Mauris in quam interdum purus vehicula rutrum quis in sem. Integer interdum lectus at nulla dictum luctus. Sed risus felis, posuere id condimentum non, egestas pulvinar enim. Praesent pretium risus eget nisi ullamcorper fermentum. Duis lacinia nisi ac rhoncus vestibulum.</p>
                                                        
                                                        </div><!-- end columns -->
                                                    </div><!-- end row -->
                                                    
                                                </div><!-- end panel-body -->
                                            </div><!-- end panel-detault -->
                                        </div><!-- end dashboard-content -->
                                    </div><!-- end dsh-profile -->
                                    
                                    <div id="dsh-wishlist" class="tab-pane fade">
                                    	<div class="dashboard-content wishlist">
                                            <h2 class="dash-content-title">Your Itineraries!!</h2>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <tbody>
                                                    @foreach($Created_Itineraries as $values)
                                                        @php
                                                            $package_night = CommonHelper::getPackagePlace($values->packageid);
                                                            $night_count=0;
                                                             $night_count = $package_night>0 ? $night_count+$package_night : $night_count;
                                                             $enc_id = Crypt::encrypt($values->packageid);
                                                             $view = route('package.details',$enc_id);
                                                        @endphp
                                                        <tr class="list-content">
                                                            @if($values->to_city_id)
                                                                @php
                                                                $cityImage = CommonHelper::getCityImage($values->to_city_id);
                                                                $to_city_image = $cityImage->city_image ==null || $cityImage->city_image=='' ?  asset("public/assets/images/no_image.jpg") :  asset('storage/app/city/'.$cityImage->city_image) ;
                                                                @endphp
                                                                <td class="list-img wishlist-img">
                                                                <a href="{{$view}}"> 
                                                                <img src="{{$to_city_image}}" class="img-responsive" style="width: 200px;height: 200px;"  alt="{{$cityImage->city_name}}" />
                                                                </a> </td>
                                                           @endif
                                                            <td class="list-text wishlist-text">
                                                                <h3>{{$values->package_name}} <span><small> {{ $night_count }} Nights and {{ $night_count+1 }} Days </small></span>
                                                                </h3>
                                                                <p>{{$values->reference_number}}</p>
                                                                <p class="order">{{$values->adult_count}} Adults,{{$values->child_count}} Childrens and {{$values->infant_count}} Infants </p>
                                                                <button class="btn btn-orange">Book Now</button>
                                                                <button class="btn btn-orange visible-sm pull-right">INR : {{$values->total_amount}} </button>
                                                            </td>
                                                            <td class="wishlist-btn hidden-sm"><button class="btn btn-orange">INR : {{$values->total_amount}}</button></td>
                                                        </tr>
                                                        @endforeach
                                                     </tbody>
                                                 </table>
                                            </div><!-- end table-responsive -->
                                        </div><!-- end dashboard-content -->
                                    </div><!-- end dsh-wishlist -->


                                    <div id="dsh-booking" class="tab-pane fade">
                                    	<div class="dashboard-content booking-trips">
                                            <h2 class="dash-content-title">Trips You have Booked!</h2>
                                            <div class="dashboard-listing booking-listing">
                                                <div class="dash-listing-heading">
                                                    <div class="custom-radio">
                                                        <input type="radio" id="radio01" name="radio" checked/>
                                                        <label for="radio01"><span></span>All Types</label>
                                                    </div><!-- end custom-radio -->
                                                        
                                                    <div class="custom-radio">
                                                        <input type="radio" id="radio02" name="radio" />
                                                        <label for="radio02"><span></span>Hotels</label>
                                                    </div><!-- end custom-radio -->
                                                    
                                                    <div class="custom-radio">
                                                        <input type="radio" id="radio03" name="radio" />
                                                        <label for="radio03"><span></span>Flights</label>
                                                    </div><!-- end custom-radio -->
                                                    
                                                    <div class="custom-radio">
                                                        <input type="radio" id="radio04" name="radio" />
                                                        <label for="radio04"><span></span>Cars</label>
                                                    </div><!-- end custom-radio -->
                                                </div>
                                                
                                                <div class="table-responsive">
                                                    <table class="table table-hover">
                                                        <tbody>
                                                            <tr>
                                                                <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>18</h3><p>October</p></div></td>
                                                                <td class="dash-list-text booking-list-detail">
                                                                    <h3>Tom's Restaurant</h3>
                                                                    <ul class="list-unstyled booking-info">
                                                                        <li><span>Booking Date:</span> 26.12.2017 at 03:20 pm</li>
                                                                        <li><span>Booking Details:</span> 3 to 6 People</li>
                                                                        <li><span>Client:</span> Lisa Smith<span class="line">|</span>lisasmith@youremail.com<span class="line">|</span>125 254 2578</li>
                                                                    </ul>
                                                                    <button class="btn btn-orange">Message</button>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">Cancel</button><button class="btn">Approve</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>18</h3><p>October</p></div></td>
                                                                <td class="dash-list-text booking-list-detail">
                                                                    <h3>Tom's Restaurant</h3>
                                                                    <ul class="list-unstyled booking-info">
                                                                        <li><span>Booking Date:</span> 26.12.2017 at 03:20 pm</li>
                                                                        <li><span>Booking Details:</span> 3 to 6 People</li>
                                                                        <li><span>Client:</span> Lisa Smith<span class="line">|</span>lisasmith@youremail.com<span class="line">|</span>125 254 2578</li>
                                                                    </ul>
                                                                    <button class="btn btn-orange">Message</button>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">Cancel</button><button class="btn">Approve</button></td>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <td class="dash-list-icon booking-list-date"><div class="b-date"><h3>18</h3><p>October</p></div></td>
                                                                <td class="dash-list-text booking-list-detail">
                                                                    <h3>Tom's Restaurant</h3>
                                                                    <ul class="list-unstyled booking-info">
                                                                        <li><span>Booking Date:</span> 26.12.2017 at 03:20 pm</li>
                                                                        <li><span>Booking Details:</span> 3 to 6 People</li>
                                                                        <li><span>Client:</span> Lisa Smith<span class="line">|</span>lisasmith@youremail.com<span class="line">|</span>125 254 2578</li>
                                                                    </ul>
                                                                    <button class="btn btn-orange">Message</button>
                                                                </td>
                                                                <td class="dash-list-btn"><button class="btn btn-orange">Cancel</button><button class="btn">Approve</button></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div><!-- end table-responsive -->
                                            </div><!-- end booking-listings -->
                                        </div><!-- end dashboard-content -->
                                    </div><!-- end dsh-booking -->
                                    

                                    
                                    <div id="dsh-cards" class="tab-pane fade">
                                    	<div class="dashboard-content my-cards">
                                            <h2 class="dash-content-title">Credit/Debit Cards</h2>
                                            <div class="row">
                                            
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="card-block">
                                                        <h2 class="card-number">xxxx xxxx xxxx 1234</h2>
                                                        <h3 class="card-expiry">Vaild Thru 06/17</h3>
                                                        <div class="card-name">
                                                            <h4>Name On Card</h4>
                                                            <h3 class="user-name">Lisa</h3>
                                                        </div><!-- end card-name -->
                                                        
                                                        <div class="primary-tag">
                                                            <h4>Primary</h4>
                                                        </div><!-- end primary-tag -->
                                                        
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="card-img"><img src="images/master-card.png" class="img-responsive" alt="card-img" /></li>
                                                            <li class="card-links"><button class="btn" data-toggle="modal" data-target="#edit-card" ><span><i class="fa fa-pencil"></i></span></button><button class="btn"><span><i class="fa fa-close"></i></span></button></li>
                                                        </ul>
                                                    </div><!-- end card-block -->
                                                </div><!-- end columns -->
                                                
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="card-block">
                                                        <h2 class="card-number">xxxx xxxx xxxx 1234</h2>
                                                        <h3 class="card-expiry">Vaild Thru 06/17</h3>
                                                        <div class="card-name">
                                                            <h4>Name On Card</h4>
                                                            <h3 class="user-name">Lisa</h3>
                                                        </div><!-- end card-name -->
                                                        
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="card-img"><img src="images/master-card.png" class="img-responsive" alt="card-img" /></li>
                                                            <li class="card-links"><button class="btn" data-toggle="modal" data-target="#edit-card" ><span><i class="fa fa-pencil"></i></span></button><button class="btn"><span><i class="fa fa-close"></i></span></button></li>
                                                        </ul>
                                                    </div><!-- end card-block -->
                                                </div><!-- end columns -->
                                                
                                                <div class="col-sm-12 col-md-6">
                                                    <div class="card-block">
                                                        <h2 class="card-number">xxxx xxxx xxxx 1234</h2>
                                                        <h3 class="card-expiry">Vaild Thru 06/17</h3>
                                                        <div class="card-name">
                                                            <h4>Name On Card</h4>
                                                            <h3 class="user-name">Lisa</h3>
                                                        </div><!-- end card-name -->
                                                        
                                                        <ul class="list-unstyled list-inline">
                                                            <li class="card-img"><img src="images/master-card.png" class="img-responsive" alt="card-img" /></li>
                                                            <li class="card-links"><button class="btn" data-toggle="modal" data-target="#edit-card" ><span><i class="fa fa-pencil"></i></span></button><button class="btn"><span><i class="fa fa-close"></i></span></button></li>
                                                        </ul>
                                                    </div><!-- end card-block -->
                                                </div><!-- end columns -->
                                                
                                                <div class="col-sm-12 col-md-6">
                                                    <a href="#add-card" data-toggle="modal">
                                                        <div class="card-block add-card">
                                                            <span><i class="fa fa-plus-circle"></i></span> 
                                                            <h4>Add New Card</h4>
                                                        </div><!-- end card-block -->
                                                    </a>
                                                </div><!-- end columns -->
                                                
                                            </div><!-- end row -->
                                        </div><!-- end dashboard-content -->
                                    </div><!-- end cards -->
                                    
                                </div><!-- end tab-content -->
                            </div><!-- end dashboard-tabs -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->   
            </div><!-- end contact-us -->
        </section><!-- end innerpage-wrapper -->

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


           <!--========================= NEWSLETTER-1 ==========================-->
           <section id="newsletter-1" class="section-padding back-size newsletter"> 
            <div class="container">
                <div class="row">
                	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                        <h2>Subscribe Our Newsletter</h2>
                        <p>Subscibe to receive our interesting updates</p>	
                        <form>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="email" class="form-control input-lg" placeholder="Enter your email address" required/>
                                    <span class="input-group-btn"><button class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                                </div>
                            </div>
                        </form>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end newsletter-1 -->
@endsection
		
@section('footerSection')
<script type="text/javascript">
  
</script>
@endsection
@endif