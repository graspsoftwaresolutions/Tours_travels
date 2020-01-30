@extends('layouts.admin')
@section('headSection')
<style>
  .ameneties-list-container a {
      display: block;
      float: left;
      margin: 0 10px 10px 0;
      border: 1px solid #ffbce4;
      color: #ec008c;
      padding: 9px 17px;
      border-radius: 30px;
      background-color: #fbf6f9;
  }
  .inner-bullets
		{
			margin-left: 20px !important;
            
		}
</style>
@endsection
@section('main-content')

 <!--================= PAGE-COVER ================-->
 <section class="page-cover" id="cover-hotel-grid-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Hotel</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Hotel Detail </li>
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
                  @php  $row = $data['hotel_data']; 
                        $package    = $data['package_info'];
                            $country_name = CommonHelper::getCountryName($row->country_id);
                            $state_name = CommonHelper::getstateName($row->state_id);
                            $city_name = CommonHelper::getcityName($row->city_id); @endphp
                        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 content-side">
                            
                            <div class="detail-slider">
                                <div class="feature-slider">
                                @php  $hotelImage = CommonHelper::getallHotelImages($row->id); 
                                        $hotelAmenites = CommonHelper::getallHotelAmenites($row->id);
                                        $package_hotel_types = CommonHelper::getPackageHotelTypes($package->id,$row->city_id,$row->id);
                                  @endphp
                                   
                                   @foreach($hotelImage as $key => $values)
                                   @if($key==0)
                                   <div  ><img  id="zoomimage" src="{{asset('storage/app/hotels/'.$values->image_name)}}" style="width:848px; height:494px;" class="img-responsive" alt="feature-thumb"/></div>
                                   @endif
                                   @endforeach 
                                </div><!-- end feature-slider -->
                            	
                                <div class="row">
                                 @foreach($hotelImage as $values)  
                                 @php $imagename = asset('storage/app/hotels/'.$values->image_name); 
                                        $id = $values->id;
                                        
                                 @endphp
                                    <div class="col-md-3"><img 
                                    src="{{$imagename}}"  style="width:200px; height:150px;padding:5px;cursor:pointer;" class="img-responsive" alt="feature-thumb"  onclick="return setFullImage('{{$imagename}}',{{$id}}) " /></div>
                                    @endforeach
                                </div><!-- end feature-slider-nav -->
                            </div>  <!-- end detail-slider -->

                            <div class="detail-tabs">
                            	<ul class="nav nav-tabs nav-justified">
                                    <!-- <li class="active"><a href="#hotel-overview" data-toggle="tab">Hotel Overview</a></li> -->
                                    <!-- <li><a href="#restaurant" data-toggle="tab">Restaurant</a></li>
                                    <li><a href="#pick-up" data-toggle="tab">Pick Up Services</a></li>
                                    <li><a href="#luxury-gym" data-toggle="tab">Luxury Gym</a></li>
                                    <li><a href="#sports-club" data-toggle="tab">Sports Club</a></li> -->
                                </ul>
                            	
                                <div class="tab-content">
                                    <div id="hotel-overview" class="tab-pane in active">
                                    	<div class="row">
                                            <div class="col-sm-12 col-md-12 tab-text">
                                        		<h3>{{$row->hotel_name}}</h3>
                                                <h4> {{$country_name}} , {{$state_name}} , {{$city_name}}</h4>
                                                <h4 style="color: #faa61a;">Over View</h4>
                                                <p> {!! $row->overview !!}</p>
                                                <h4 style="color: #faa61a;">Amenites</h4>
                                                @foreach($hotelAmenites as $values)
                                                <!-- <div id="ameneties-list-container" class="ameneties-list-container"> -->
                                                <p style="list-style-type: circle;" class="inner-bullets">  *  {{$values->amenities_name}} <p>
                                                <!-- </div> -->
                                                @endforeach
                                                <p style="color: #faa61a;"> <b> Room Types  </b>
                                               
                                              @foreach($package_hotel_types as $tkey => $types)
                                               <p class="inner-bullets">  {{ $types->room_type }} - {{ $types->total_rooms }} </p>
                                              @endforeach
                                            </p>
                                            </div><!-- end columns -->
                                        </div><!-- end row -->
                                    </div><!-- end hotel-overview -->
                                </div><!-- end tab-content -->
                            </div><!-- end detail-tabs -->
                        </div><!-- end columns -->
                                                
                        <div class="col-xs-12 col-sm-12 col-md-3 side-bar right-side-bar">
                            
                            <div class="side-bar-block booking-form-block">
                                @foreach($data['related_package'] as $values)
                            	@php  $row_packages = CommonHelper::getRelatedPackges($values->id); 
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
                                                <li class="price">Rs. {{$row_packages->total_amount}} /-<span class="divider"></li>
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
                                @endforeach
                            </div><!-- end side-bar-block -->                     
                        </div><!-- end columns -->  
                        
                    </div><!-- end row -->
            	</div><!-- end container -->
            </div><!-- end hotel-details -->
        </section><!-- end innerpage-wrapper -->
@endsection
		
@section('footerSection')
<script type="text/javascript" charset="utf-8">
    function setFullImage(imageobj,imageid){       
    $("#zoomimage").attr("src",imageobj) ;
  }
</script>
@endsection