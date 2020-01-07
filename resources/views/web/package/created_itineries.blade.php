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
    <!--===== INNERPAGE-WRAPPER ====-->
    <section class="innerpage-wrapper">
        	<div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        	<div class="dashboard-heading">
                                <h2>Created <span>Itineries</span></h2>
                                <p>Hi , Welcome to Star Travels!</p>
                                <p>All your trips booked with us will appear here and you'll be able to manage everything!</p>
                            </div><!-- end dashboard-heading -->
                            
                            <div class="dashboard-wrapper">
                            	<div class="row">
                                
                                	<div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                		<ul class="nav nav-tabs nav-stacked text-center">
                                    		<li><a href="dashboard-1.html"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                        	<li><a href="user-profile.html"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            <li  class="active"><a href="#"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                            <li><a href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                            <li><a href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content booking-trips">
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
                                        
                                    </div><!-- end columns -->
                                    
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->

        
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