@extends('layouts.admin')
@section('headSection')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/pages/inbox.css') }}" rel="stylesheet" type="text/css"> 
<style>
#cover-contact-us {
    background: url('{{ asset("public/web-assets/images/cover-contact-us.jpg") }}') 50% 20%;
    background-size: cover;
}
.innerpage-section-padding {
    padding-top: 50px;
    padding-bottom: 50px;
}
.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}
    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 3%;
        margin-left: -1.5px;
    }
    .timeline > li {
        margin-bottom: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 91%;
            float: left;
           // border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
           // -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
           // box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 50px;
            height: 50px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            //left: 15%;
            //margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: left;
            left: 8%;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 15px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}
.listing-right-custom{
    padding: 5px;
}


</style>
@endsection

@section('main-content')
    @php
        $package_info = $data['package_info'];
        //dd($package_info->package_type);
        $package_place = $data['package_place'];
       
        $citys_data = [];
        foreach($data['package_place'] as $place){
          $citys_data[] = $place->city_id;
        }
   @endphp
    <!--================ PAGE-COVER ===============-->
    <section class="page-cover" id="cover-contact-us">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Package</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">View</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

             <!--===== INNERPAGE-WRAPPER ====-->
             <section class="innerpage-wrapper">
        	<div id="contact-us" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 col-md-8 no-pd-r">
                            <h3>{{ ucfirst($package_info->package_name) }}</h3>
                            @php
                                $to_state_name = CommonHelper::getstateName($package_info->to_state_id);
                                $to_city_data = CommonHelper::getcityDetails($package_info->to_city_id);
                                $to_city_name = $to_city_data->city_name;
                                $to_city_image = $to_city_data->city_image;
                                $to_city_image = $to_city_image==null || $to_city_image=='' ?  asset("public/assets/images/no_image.jpg") :  asset('storage/app/city/'.$to_city_image) ;
                                $place_counts = count($data['package_place']);
                                $summary_cities='';
                                $night_count=0;
                                $startday = 1;
                                foreach($data['package_place'] as $key => $place){
                                   $sum_city_name = CommonHelper::getcityName($place->city_id);
                                   $summary_cities .= $sum_city_name.', ';
                                    
                                   $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
                                }
                              //die;
                            @endphp
                        	<div class="detail-slider">
                                <div class="feature-slider">
                                    <div><img src="{{ $to_city_image }}" style="width:700px;height:500px;" class="img-responsive" alt="feature-img"/></div>
                                </div><!-- end feature-slider -->
                                
                                <ul class="list-unstyled features tour-features">
                                    <li><div class="f-icon"><i class="fa fa-map-marker"></i></div><div class="f-text"><p class="f-heading">{{ $to_state_name }}</p><p class="f-data">{{$summary_cities}}</p></div></li>
                                    <li><div class="f-icon"><i class="fa fa-user"></i></div><div class="f-text"><p class="f-heading">Persons</p><p class="f-data">{{ $package_info->adult_count }} adults, {{ $package_info->child_count }} children</p></div></li>
                                    <li><div class="f-icon"><i class="fa fa-calendar"></i></div><div class="f-text"><p class="f-heading">Duration</p><p class="f-data">{{ $night_count }} Nights & {{ $night_count+1 }} Days</p></div></li>
                                    
                                </ul>
                            </div><!-- end detail-slider -->  
                            <div class="row">
                                <div class="col-md-12">
                                    <h3 class="bold">Itinerary</h3>
                                    <br>
                                     
                                </div>
                                <div class="clearfix">
                                </div>
                                
                                 <ul class="timeline">
                                    @foreach($data['package_place'] as $key => $place)
                                    @php
                                    $nightcount = $place->nights_count;
                                    if($nightcount == 1 )
                                    {
                                        $days_val = 'Day '.$startday ;
                                    }
                                    else{
                                        $days_val = 'Day '.$startday.' - '.($startday+$nightcount-1) ;
                                    }
                                    $place_state_name = CommonHelper::getstateName($place->state_id);
                                    $place_city_data = CommonHelper::getcityDetails($place->city_id);
                                    $package_hotels = CommonHelper::getPackageHotels($package_info->id,$place->city_id);
                                    @endphp
                                    <li class="timeline-inverted">
                                      <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>

                                      <div class="timeline-panel">
                                        <p style="font-size: 16px;font-weight: bold;"> {{ $days_val }}
                                         [ {{$place_state_name}} - {{$place_city_data->city_name}} ]
                                        </p>
                                        <div class="col-md-12">
                                        @foreach($package_hotels as $hotel)
                                        @php
                                        $package_hotel_types = CommonHelper::getPackageHotelTypes($package_info->id,$place->city_id,$hotel->hotel_id);
                                        $package_hotel = CommonHelper::getPackageHotelDetails($package_info->id,$place->city_id,$hotel->hotel_id);
                                        @endphp
                                      <div id="picked_city_hotel_{{ $package_hotel->id }}" class="card media-card-sm">
                                        <div id="picked-hotelmedia-{{ $package_hotel->id }}" class="media">
                                          
                                          @php
                                            $hotelimages = $package_hotel->hotelimages;
                                            $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");

                                            $amenity_count = $package_hotel!=null ? count($package_hotel->amenities) : 0;

                                            $amenitystring = '';
                                            $a_count = 0;

                                            if($package_hotel!=null){
                                              foreach($package_hotel->amenities as $key => $amenity){
                                                if($a_count<4){
                                                  $amenitystring .= $amenity->amenities_name;
                                                  if($amenity_count-1 != $key){
                                                    $amenitystring .= ', ';
                                                  } 
                                                }
                                                $a_count++;
                                              }
                                            }

                                            $rating_string = '';
                                            if($package_hotel!=null){
                                              $ratings = $package_hotel->ratings;
                                             
                                              if($ratings!=null){
                                                $rating_string = $ratings.' <i id="pickviewrating" class="pickviewrating fa fa-star"></i>';
                                              }
                                            }
                                            $total_hotel_prices = 0;
                                          @endphp
                                          <div style="margin-top: 15px;" class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <img src="{{ $hotel_image }}" class="img-responsive" style="height: 120px !important;border-radius: 5px;" alt="tour-img">
                                                </div>
                                                <div class="col-md-9 col-sm-12">
                                                    <div class="listing-right-custom">
                                                        <h4 class="block-title">{{ $package_hotel->hotel_name }}</h4>
                                                        <p class="block-minor">{!! $rating_string !!} </p> 
                                                        <p>{{ $amenitystring }}</p>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                          @endforeach
                                            <br>
                                            @php
                                                $sum_package_activities = CommonHelper::getPackageActivities($package_info->id,$place->city_id);
                                            @endphp
                                            @foreach($sum_package_activities as $activity)
                                            @php
                                                 $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                                            @endphp
                                            <div class="timeline-heading">
                                              <h4 class="timeline-title">- {{ $activity->title_name }}</h4>
                                              <p style="margin-left: 15px;"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{ $activityduration }}</small></p>
                                            </div>
                                            @endforeach
                                         </div>
                                      </div>
                                    </li>
                                    @php
                                     $startday = $startday+$nightcount;
                                    @endphp
                                    @endforeach
                                </ul>
                             </div>
                        </div><!-- end columns -->
                        <div class="col-sm-12 col-md-4">
                            <br> <br>
                            <label>Price starts from</label>
                            <p id="priceText" style="padding: 10px;"><span class="price" style="color: #543304;font-size: 24px;font-weight: 500;">RM {{ number_format($package_info->total_amount,2) }}</span> for {{ $package_info->adult_count+$package_info->child_count }} persons</p>
                            @auth
                            <!--label>Persons</label>
                            <div class="form-group right-icon">
                                <select class="form-control">
                                    <option disabled="">Adults</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                </select>
                               
                            </div-->
                            <form id="dir_booking" class="" method="post" enctype="multipart/form-data"  action="{{ route('direct_booking') }}">
                                @csrf
                                 <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group left-icon">
                                             <input type="text" id="package_id" name="package_id" readonly required="" class="form-control hide" value="{{ $package_info->id }}" placeholder="Package id" >
                                            <input type="text" id="form_date" name="form_date" readonly required="" class="form-control dpd1" placeholder="Check In" >
                                        </div>
                                    </div><!-- end columns -->
                                    
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group left-icon">
                                            <input type="text" id="to_date" name="to_date" readonly="" required="" class="form-control dpd2" placeholder="Check Out" >
                                        </div>
                                    </div><!-- end columns -->

                                </div><!-- end row -->  
                                <button type="submit" class="btn btn-orange">BOOK NOW</button>
                            </form>
                            <br>
                            <br>
                            <a href="#" class="btn btn-default">CUSTOMIZE AND BOOK </a>
                            <!--a href="{{route('tour_booking')}}" class="btn btn-default">CUSTOMIZE AND BOOK </a-->
                            @endauth
                            @guest
                                <a class="btn btn-orange" href="{{ route('login') }}" style="color:white;">Login to Book</a>
                            @endguest
                        </div>
                        
                    </div><!-- end row -->
                </div><!-- end container -->   
            </div><!-- end contact-us -->
        </section><!-- end innerpage-wrapper -->

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

         <!--========================= NEWSLETTER-1 ==========================-->
         <section id="newsletter-1" class="section-padding back-size newsletter hide"> 
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
@endsection