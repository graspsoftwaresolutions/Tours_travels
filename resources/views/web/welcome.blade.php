@extends('layouts.admin')
@section('headSection')
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">

@endsection

@section('main-content')
@php
    $packages = $data['packages'];
    //dd($packages);
@endphp
<section class="flexslider-container" id="flexslider-container-1">

<div class="flexslider slider" id="slider-1">
    <ul class="slides">
        
        <li class="item-1" style="background:linear-gradient(rgba(0,0,0,0.3),rgba(0,0,0,0.3)),url(public/web-assets/images/slider/homepage-slider-1.jpg) 50% 0%;
background-size:cover;
height:100%;">
            <div class=" meta">         
                <div class="container">
                    <h2>Discover</h2>
                    <h1>Tours</h1>
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
                    <h1>Tours</h1>
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
                        <form method="post" action="{{route('package_search')}}">
                        <input type="hidden" name="_method" value="PUT">
                        @csrf
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input id="form_details" required value="{{$data['fr_details'] ? $data['fr_details'] : ''}}" type="text" class="form-control" placeholder="From" >
                                                <i class="fa fa-map-marker"></i>
                                                <input type="hidden" name="from_city_id" id="from_city_id" value="{{$data['from_city_id'] ? $data['from_city_id'] : ''}}">
                                                <input type="hidden" name="from_state_id" id="from_state_id" value="{{$data['from_state_id'] ? $data['from_state_id'] : ''}}">
                                                <input type="hidden" name="from_country_id"  id="from_country_id" value="{{$data['from_country_id'] ? $data['from_country_id'] : ''}}">
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input id="to_details" required value="{{$data['todetails'] ? $data['todetails'] : ''}}" type="text" class="form-control" placeholder="To" >
                                                <i class="fa fa-map-marker"></i>
                                                <input type="hidden" name="to_city_id" id="to_city_id" value="{{$data['to_city_id'] ? $data['to_city_id'] : ''}}">
                                                <input type="hidden" name="to_state_id" id="to_state_id" value="{{$data['to_state_id'] ? $data['to_state_id'] : ''}}">
                                                <input type="hidden" name="to_country_id"  id="to_country_id" value="{{$data['to_country_id'] ? $data['to_country_id'] : ''}}">
                                            </div>
                                        </div><!-- end columns -->
                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                                <!-- <div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
                                    <div class="row">
                                    
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd1" placeholder="Check In" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                        
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input type="text" class="form-control dpd2" placeholder="Check Out" >
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>

                                    </div>								
                                </div> -->
                                <div class="col-xs-12 col-sm-12 col-md-2 col-lg-3">
                                    <div class="form-group right-icon">
                                        <select name="type" required class="form-control">
                                            <option value="0" selected="true"  disabled>Type</option>
                                            @foreach($data['pacakge_type'] as $values)
                                             <option value="{{$values->id}}" @if($data['type']==$values->id) selected @endif>{{$values->package_type}}</option>
                                            @endforeach
                                        </select>                                        
                                        <i class="fa fa-angle-down"></i>
                                        
                                    </div>
                                </div>
                                <!-- <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                                    <div class="form-group right-icon">
                                    <input type="text" name="adult_count" value="{{$data['adult_count'] ? $data['adult_count'] : ''}}" class="form-control"  placeholder="Adults" >
                                        
                                    </div>
                                </div> -->
                                <!-- end columns -->
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2 search-btn">
                                    <button type="submit" class="btn btn-orange">Search</button>
                                </div><!-- end columns -->
                                
                            </div><!-- end row -->
                        </form>
                    </div><!-- end flights -->
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
                        <center><a href="{{ route('add_package') }}" class="btn btn-orange">Create your own package</a></center>
                        <br>
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
                                                <img src="{{ $to_city_image }}" style="width:360px;height:255px;" class="img-responsive" alt="hotel-img" />
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
                               
                                @php
                                if(count($packages)==0)
                                {
                                    @endphp
                                    <div class="col-md-12">
                                    
                                    <center >   <h2> <span class="label label-info"> No results found</span></h2>  </center>
								    </div>
                                    @php
                                }
                                else{
                                    @endphp
                                    <div class="col-md-12">
                               
                                    <center><a href="{{route('packages')}}" class="btn btn-orange">View All Packages</a></center>
                                    </div>
                                    @php
                                }
								@endphp
                               
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
                        <div class="clearfix"></div>
                        <div class="view-all text-center">
                        	<a href="#" class="btn btn-orange">View All</a>
                        </div><!-- end view-all -->
                    </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end tour-offers -->

        
        

@endsection
		
@section('footerSection')
<script src="{{ asset('public/js/jquery.dragsort.js') }}"></script>
<script src ="{{ asset('public/assets/dist/js/jquery-ui.js') }}"></script>
<script>
$(document).ready(function(){ 
    $('#form_details').autocomplete({
    // minChars: 1,
    source: function(request, response) {
        $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('fromcountry_autocomplete')}}",
        data: 'action=from_country'+'&name='+request.term,
        success: function(data) {
         //console.log(data.length);
         if (data.length === 0) {
               var res_msg = "No Results";
                alert(res_msg);
              
            }
          response( $.map( data, function( item ) {
            //console.log(data.length);
                  var object = new Object();
                  object.label = item.value;
                  object.value = item.name;
                  object.cityid = item.cityid;
                  object.countyid = item.countyid;
                  object.stateid = item.stateid;
                  return object 
          }));
        }
   
      });
    },
    select: function (event, ui) {
         $("#form_details").val(ui.item.value);
         $("#from_country_id").val(ui.item.countyid);
         $("#from_state_id").val(ui.item.stateid);
         $("#from_city_id").val(ui.item.cityid);
      },
   });
   
   $('#to_details').autocomplete({
    // minChars: 1,
    source: function(request, response) {
        $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('fromcountry_autocomplete')}}",
        data: 'action=from_country'+'&name='+request.term,
        success: function(data) {
         //console.log(data.length);
         if (data.length === 0) {
               var res_msg = "No Results";
                alert(res_msg);
              
            }
          response( $.map( data, function( item ) {
            //console.log(data.length);
                  var object = new Object();
                  object.label = item.value;
                  object.value = item.name;
                  object.cityid = item.cityid;
                  object.countyid = item.countyid;
                  object.stateid = item.stateid;
                  return object 
          }));
        }
   
      });
    },
    select: function (event, ui) {
         $("#to_details").val(ui.item.value);
         $("#to_country_id").val(ui.item.countyid);
         $("#to_state_id").val(ui.item.stateid);
         $("#to_city_id").val(ui.item.cityid);
      },
   });
});
</script>
@endsection