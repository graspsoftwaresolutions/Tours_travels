@extends('layouts.admin')
@section('headSection')
@endsection

@section('main-content')
<!--=================== PAGE-COVER =================-->
<section class="page-cover" id="cover-hotel-grid-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Activities</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">All Activities</li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
                <br><br><br><br><br><br><br><br><br>
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
                        <form method="post" action="http://localhost/Tours_travels/package_search">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="_token" value="vwOWqeMcQGIjGr52SgHjqqUI0PfcoFFAIfx3k01z">           
                                         <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-5 col-lg-6">
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-6">
                                            <div class="form-group left-icon">
                                                <input id="form_details" required value="" type="text" class="form-control" placeholder="Place" >
                                                <i class="fa fa-map-marker"></i>
                                                <input type="hidden" name="from_city_id" id="from_city_id" value="">
                                                <input type="hidden" name="from_state_id" id="from_state_id" value="">
                                                <input type="hidden" name="from_country_id"  id="from_country_id" value="">
                                            </div>
                                        </div><!-- end columns -->
                                        
                                        
                                    </div><!-- end row -->								
                                </div><!-- end columns -->
                                
                               
                                
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
            </div><!-- end container -->
            
        </section><!-- end page-cover -->


           <!--===== INNERPAGE-WRAPPER ====-->
           <section class="innerpage-wrapper">
        	<div id="hotel-listing" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">        	
                        
                        <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 content-side">
							@foreach($data['activities_view'] as $values)
                            @php $activityimage = CommonHelper::getActivityImages($values->id);  @endphp
                            <div class="list-block main-block h-list-block">
                            	<div class="list-content">
                            		<div class="main-img list-img h-list-img">
                                        <a href="{{route('sightseeing_viewmore',Crypt::encrypt($values->id))}}">
                                        @if($activityimage[0]->image_name!='')
                                            <img src="{{asset('storage/app/activity/'.$activityimage[0]->image_name)}}" style="width:410px;height:240px;" class="img-responsive" alt="{{$values->title_name}}" />
                                           @else
                                           <img src="{{$no_image_url}}" style="width:360px;height:240px;" class="img-responsive" alt="hotel-img" />
                                           @endif
                                        </a>
                                        @php
                                        $hours = floor($values->duartion_hours / 60) ;
                                        $minutes = floor($values->duartion_hours % 60) ;

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
                                            $description = substr($values->short_description,6); 
                                            
                                            @endphp
                                        <div class="main-mask">
                                            <ul class="list-unstyled list-inline offer-price-1">
                                                <li class="price">{{$hours_and_minutes}}</li>
                                                
                                            </ul>
                                        </div><!-- end main-mask -->
                                    </div><!-- end h-list-img -->
                                    
                                    <div class="list-info h-list-info">
                                        <h3 class="block-title"><a href="{{route('sightseeing_viewmore',Crypt::encrypt($values->id))}}">{{$values->title_name}}</a></h3>
                                        <!-- <p class="block-minor">From: Scotland</p> -->
                                        <p>{!! $values->short_description ? substr($values->short_description, 0, 200) : '' !!}..More</p>
                                        <a href="hotel-detail-left-sidebar.html" class="btn btn-orange btn-lg">View More</a>
                                     </div><!-- end h-list-info -->
                            	</div><!-- end list-content -->
                            </div><!-- end h-list-block -->
                            @endforeach

                            <!-- <div class="pages">
                                <ol class="pagination">
                                    <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="fa fa-angle-left"></i></span></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="fa fa-angle-right"></i></span></a></li>
                                </ol>
                            </div>
                        </div> -->

                    </div><!-- end row -->
            	</div><!-- end container -->
            </div><!-- end hotel-listing -->
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

@endsection