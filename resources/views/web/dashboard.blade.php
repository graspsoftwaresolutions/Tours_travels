@extends('layouts.admin')
@section('headSection')
<style>


</style>
@endsection

@section('main-content')
   
     <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">My Account</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">My Account</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->
        <section class="innerpage-wrapper">
            <div id="dashboard" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="dashboard-heading">
                                <h2>Travel <span>Profile</span></h2>
                                <p>Hi {{ ucfirst(Auth::user()->name) }}, Welcome to Tours and Travels!</p>
                                <p>All your trips booked with us will appear here and you'll be able to manage everything!</p>
                            </div><!-- end dashboard-heading -->
                            
                            <div class="dashboard-wrapper hide">
                                <div class="row">
                                
                                    <div class="col-xs-12 col-sm-2 col-md-2 dashboard-nav">
                                        <ul class="nav nav-tabs nav-stacked text-center">
                                            <li class="active"><a href="#"><span><i class="fa fa-cogs"></i></span>Dashboard</a></li>
                                            <li><a href="user-profile.html"><span><i class="fa fa-user"></i></span>Profile</a></li>
                                            <li><a href="booking.html"><span><i class="fa fa-briefcase"></i></span>Booking</a></li>
                                            <li><a href="wishlist.html"><span><i class="fa fa-heart"></i></span>Wishlist</a></li>
                                            <li><a href="cards.html"><span><i class="fa fa-credit-card"></i></span>My Cards</a></li>
                                        </ul>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-12 col-sm-10 col-md-10 dashboard-content">
                                        <h2 class="dash-content-title">Total Traveled</h2>
                                        <div class="row info-stat">
                                        
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-tachometer"></i></span>
                                                    <h3>1548</h3>
                                                    <p>Miles</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-globe"></i></span>
                                                    <h3>12%</h3>
                                                    <p>World</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-building"></i></span>
                                                    <h3>312</h3>
                                                    <p>Cities</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                            <div class="col-sm-6 col-md-3">
                                                <div class="stat-block">
                                                    <span><i class="fa fa-paper-plane"></i></span>
                                                    <h3>102</h3>
                                                    <p>Trips</p>
                                                </div><!-- end stat-block -->
                                            </div><!-- end columns -->
                                            
                                        </div><!-- end row -->
                                        
                                        <div class="dashboard-listing recent-activity">
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
                                            </div><!-- end table-responsive -->
                                        </div><!-- end recent-activity -->
                                        
                                        <div class="dashboard-listing invoices">
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
                                            </div><!-- end table-responsive -->
                                        </div><!-- end invoices -->
                                    </div><!-- end columns -->
                                    
                                </div><!-- end row -->
                            </div><!-- end dashboard-wrapper -->
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->          
            </div><!-- end dashboard -->
        </section><!-- end innerpage-wrapper -->
@endsection
		
@section('footerSection')
@endsection