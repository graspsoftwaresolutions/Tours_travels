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
    $packages = $data['packages'];
    //dd($packages);
@endphp
        <section class="page-cover" id="cover-tour-grid-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title">Tour Packages</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Packages</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section>

        <!--=============== HOTEL OFFERS ===============-->
        <section id="hotel-offers" class="section-padding">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-12">
                    	<div class="page-heading">
                        	<h2>Packages</h2>
                            <hr class="heading-line" />
                        </div><!-- end page-heading -->
                        
                        <div class="row">
                                @foreach($packages as $package)
                                @php
                                    $to_city_data = CommonHelper::getcityDetails($package->to_city_id);
                                    $to_city_name = $to_city_data->city_name;
                                    $to_city_image = $to_city_data->city_image;

                                    $to_city_image = $to_city_image==null || $to_city_image=='' ?  asset("public/assets/images/no_image.jpg") :  asset('storage/app/city/'.$to_city_image) ;

                                    $summary_cities='';
                                    $night_count=0;
                                    foreach($package->places as $key => $place){
                                        $sum_city_name = CommonHelper::getcityName($place->city_id);
                                        $summary_cities .= $sum_city_name.' - '.$place->nights_count.'N';
                                        if($key!=count($package->places)-1){
                                            $summary_cities .= ', ';
                                        }
                                        $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;

                                    }

                                    $dayscount = $night_count+1;

                                    $enc_id = Crypt::encrypt($package->id);
                                    $view = route('package.details',$enc_id);

                                @endphp
                                <div class="col-sm-6 col-md-4 col-lg-4">
                                    <div class="grid-block main-block t-grid-block">
                                        <div class="main-img t-grid-img">
                                            <a href="{{$view}}">
                                                <img src="{{ $to_city_image }}" class="img-responsive" alt="hotel-img" />
                                            </a>
                                            <div class="main-mask">
                                                <ul class="list-unstyled list-inline offer-price-1">
                                                    <li class="price">RM {{ number_format($package->total_amount,2) }}<span class="divider">|</span><span class="pkg">{{$dayscount}} Days Tour</span></li>
                                                </ul>
                                            </div><!-- end main-mask -->
                                        </div><!-- end t-grid-img -->
                                        
                                         <div class="block-info t-grid-info">
                                            <h3 class="block-title"><a href="{{$view}}">{{ ucfirst($package->package_name) }}</a></h3>
                                            <p class="block-minor">{{ $package->adult_count }} Adults @if($package->child_count>0) {{$package->child_count}}, Kids @endif </p>
                                            <p>{{ $summary_cities }} </p>
                                            <div class="grid-btn hide">
                                                <a href="{{$view}}" class="btn btn-orange btn-block btn-lg">View Details</a>
                                            </div><!-- end grid-btn -->
                                         </div><!-- end t-grid-info -->
                                    </div><!-- end t-grid-block -->
                                </div><!-- end columns -->
                                @endforeach
                                <!--center><a href="{{route('packages')}}" class="btn btn-orange">View All Packages</a></center-->
                            </div><!-- end row -->
                       
                    </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end hotel-offers -->

        <!--======================= BEST FEATURES =====================-->
        <section id="best-features" class="banner-padding black-features hide">
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
                <section id="tour-offers" class="section-padding hide">
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
                        
                        <div class="view-all text-center hide">
                        	<a href="#" class="btn btn-orange">View All</a>
                        </div><!-- end view-all -->
                    </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end tour-offers -->

        
        

@endsection
		
@section('footerSection')
<script type="text/javascript">
    $("#home_menu_id").removeClass('active');
    $("#package_menu_id").addClass('active');
</script>
@endsection