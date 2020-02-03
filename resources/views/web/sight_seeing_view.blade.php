@extends('layouts.admin')
@section('headSection')
<link href="{{ asset('public/web-assets/css/slick.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/web-assets/css/slick-theme.css') }}" rel="stylesheet" type="text/css">
<style>
.feature-slider-nav{margin-left:0px; } 
</style>
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
                    @php  $row = $data['activities_view'][0]; 
                            $package_id = $data['package_id'];
                            $country_name = CommonHelper::getCountryName($row->country_id);
                            $state_name = CommonHelper::getstateName($row->state_id);
                            $city_name = CommonHelper::getcityName($row->city_id);
                            
                         //$packages = CommonHelper::getRelatedPackges($country_name,$state_name);
                            
                        
                            @endphp    	
                    
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                            
                            <div class="detail-slider">
                                <div class="feature-slider">
                              @php  $activityimage = CommonHelper::getallActivityImages($row->id);   @endphp
                                   
                                    @foreach($activityimage as $key => $values)
                                    @if($key==0)
                                    <div  ><img  id="zoomimage" src="{{asset('storage/app/activity/'.$values->image_name)}}" style="width:848px; height:494px;" class="img-responsive" alt="feature-thumb"/></div>
                                    @endif
                                    @endforeach
                                </div><!-- end feature-slider -->
                                <div class="row">
                                 @foreach($activityimage as $values)  
                                 @php $imagename = asset('storage/app/activity/'.$values->image_name); 
                                        $id = $values->id;
                                        
                                 @endphp
                                    <div class="col-md-3"><img  
                                    src="{{$imagename}}"  style="width:200px; height:150px;padding:5px;cursor:pointer;" class="img-responsive" alt="feature-thumb"  onclick="return setFullImage('{{$imagename}}',{{$id}}) " /></div>
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
                            
                            
                            
                          
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar left-side-bar">
                            
                            <div class="side-bar-block booking-form-block">
                            	<h4 class="selected-price" style="font-size: 25px;">Related Packages</h4>
                                <!-- <img src="{{asset('storage/app/activity/1_202001221156531.jpg')}}" > -->
                            
                            	<div class="booking-form">
                                	<!-- <h3>Book Hotel</h3>
                                    <p>Find your dream hotel today</p> -->
                                    <!-- <div class="row"> -->
                                @foreach($data['package_id'] as $key => $values)
                                @if($key<3)
                                @php  $row_packages = CommonHelper::getRelatedPackges($values->package_id); 
                                 $city_image = CommonHelper::getCityImage($row_packages->to_city_id);  @endphp
                                <div class="grid-block main-block h-grid-block">
                                    <div class="main-img h-grid-img">
                                        <a href="{{route('package.details',Crypt::encrypt($row_packages->id))}}">
                                            @if($city_image!='')
                                            <img style="width:264px;height:190px;"  src="{{asset('storage/app/city/'.$city_image->city_image)}}" class="img-responsive" alt="hotel-img" />
                                            @else
                                            <img style="width:264px;height:190px;"  src="{{asset('public/assets/images/no_image.jpg')}}" class="img-responsive" alt="hotel-img" />
                                            @endif
                                        </a>
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price">Rs {{$row_packages->total_amount}} /- <span class="divider"></li>
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end h-grid-img -->

                                    @php 
                                    $country_name = CommonHelper::getCountryName($row_packages->to_country_id);
                                    $state_name = CommonHelper::getstateName($row_packages->to_state_id);
                                    $city_name = CommonHelper::getcityName($row_packages->to_city_id);

                                    @endphp
                                     <div class="block-info h-grid-info">
                                         <h5 class="block-title"><a href="{{route('package.details',Crypt::encrypt($row_packages->id))}}">{{$row_packages->package_name}}</a></h5>
                                         <p class="">{{ $country_name}} - {{ $state_name}} - {{ $city_name}} </p>
                                         <p class="">{{ $row_packages->adult_count}} Adult {{ $row_packages->child_count}} Childern  {{ $row_packages->infant_count}} Infants </p>
                                        <div class="grid-btn">
                                            <a href="{{route('package.details',Crypt::encrypt($row_packages->id))}}" class="btn btn-orange btn-block btn-lg">View More</a>
                                        </div><!-- end grid-btn -->
                                     </div><!-- end h-grid-info -->
                                </div><!-- end h-grid-block -->
                               @endif
                             @endforeach
                                </div><!-- end booking-form -->
                            </div><!-- end side-bar-block -->
                            
                           
                        </div><!-- end columns -->

                    </div><!-- end row -->
            	</div><!-- end container -->
            </div><!-- end hotel-details -->
        </section><!-- end innerpage-wrapper -->


@endsection
		
@section('footerSection')
<script src ="{{ asset('public/web-assets/js/slick.min.js') }}"></script>
<script src ="{{ asset('public/web-assets/js/custom-slick.js') }}"></script>
<script>
$("#home_menu_id").removeClass('active');
$('#sighseeing_menu_id').addClass('active');
</script>
<script type="text/javascript" charset="utf-8">
    function setFullImage(imageobj,imageid){       
    $("#zoomimage").attr("src",imageobj) ;
  }
</script>
@endsection