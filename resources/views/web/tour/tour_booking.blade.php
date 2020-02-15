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
/* .error {
    color:red;
}
.valid {
    color:green;
} */

</style>

@endsection
@php
        $package_info = $data['package_info'];
        //dd($package_info->package_type);
        $package_place = $data['package_place'];
        $pack_total_nights = 0;
       
        $citys_data = [];
        foreach($data['package_place'] as $place){
          $citys_data[] = $place->city_id;
         
          
        }
   @endphp
@section('main-content')
<section class="page-cover" id="cover-hotel-grid-list">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                    	<h1 class="page-title">Package</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active">Package Detail </li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

                <!--===== INNERPAGE-WRAPPER ====-->
                <section class="innerpage-wrapper">
        	<div id="cruise-booking" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 content-side">
                        	
                            <h3>{{ ucfirst($package_info->package_name) }}</h3>
                            @php
                            $pack_total_nights = 0;
                            @endphp
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
                                        $pack_night_count = $place->nights_count;
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
                                                    <img src="{{ $hotel_image }}" class="img-responsive" style="height: 100px !important;border-radius: 5px;width:111px;" alt="tour-img">
                                                </div>
                                                <div class="col-md-9 col-sm-12">
                                                    <div class="listing-right-custom">   
                                                       <a style="text-decoration:none;" href="{{URL::to('hotel_view/'.Crypt::encrypt($package_hotel->id),Crypt::encrypt($package_info->id))}}"> <h4 class="block-title">{{ $package_hotel->hotel_name }}</h4> </a>
                                                     
                                                        <p class="block-minor" style="color:#faa61a">{!! $rating_string !!} </p> 
                                                        <p>{{ $amenitystring }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                          @endforeach
                                            <br>
                                            @for($n=1;$n<=$pack_night_count;$n++)
                                            @php
                                            $pack_daynumber = $pack_total_nights+$n;
                                            $package_activities = CommonHelper::getPackageActivitiesDays($package_info->id,$place->city_id,$pack_daynumber);
                                          
                                              //  $sum_package_activities = CommonHelper::getPackageActivities($package_info->id,$place->city_id);
                                            @endphp
                                            <p> Day - {{$pack_daynumber}}  </p>
                                            @foreach($package_activities as $activity)
                                            @php
                                                $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                                                
                                                $hours = floor($activity->duartion_hours / 60) ;
                                                $minutes = floor($activity->duartion_hours % 60) ;

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
                                            <div class="timeline-heading"> 
                                                    
                                                    <a style="text-decoration:none;" href="{{route('sightseeing_viewmore',Crypt::encrypt($activity->id))}}"> <h4 class="timeline-title"> * {{ $activity->title_name }}</h4> </a>
                                                     <p style="margin-left: 15px;"><small class="text-muted"><i class="glyphicon glyphicon-time"></i> {{ $hours_and_minutes }}</small></p>

                                            </div>
                                            @endforeach
                                            @endfor
                                            @php
                                            $pack_total_nights += $pack_night_count;
                                            @endphp
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
						
                        
                        
                        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 side-bar right-side-bar">
                                        
                                <div class="col-xs-12 col-sm-6 col-md-12"> 
                                
                                <!-- <div class="lg-booking-form-heading">
                                
                                	<h3>Payment Information</h3>
                                </div> -->
                                    <div class="side-bar-block support-block">
                                    <h3 style="color: #faa61a;">Payment Information</h3>
                                   <!-- end lg-bform-heading -->
                                
                                <div class="payment-tabs">
                                @include('includes.messages') 
                                <br>
                                    <!-- <div class="tab-content"> -->
                                    	<div class="tab-pane fade in active">
                                        <form id="payment_form" class="form-horizontal" method="post" action="{{route('booking_confirm')}}">
                                        @csrf
                                        <input type="hidden" name="packageid" value="{{$package_info->id}}">
                                        <div class="form-group">
                                            <label class="control-label col-sm-4" for="email">From Date</label>
                                            <div class="col-sm-8"> 
                                                    <input type="date" readonly class="form-control" name="form_date" id="form_date" value="{{$data['form_date']}}">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-sm-4" for="email">To Date</label>
                                            <div class="col-sm-8"> 
                                                <input type="date" readonly class="form-control" name="to_date" id="to_date" value="{{$data['to_date']}}">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-sm-4" for="email">Payment Mode:</label>
                                            <div class="col-sm-8">
                                               <select id="payment_mode" required name="payment_mode" class="form-control" >
                                                    <option selected="true" value="0" disabled>Select</option>
                                                    <option value="1">Card</option>
                                                    <option value="2">Cash</option>
                                                    <option value="3">Online Payment</option>
                                               </select>
                                            </div>
                                            
                                            </div>
                                            <div class="online_mode hide">
                                                <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">Reference Number</label>
                                                <div class="col-sm-8">          
                                                    <input type="text" class="form-control" id="reference_number" name="reference_number">
                                                </div>
                                            </div>
                                            </div>

                                            <div class="card_mode hide">
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">Card Type</label>
                                                <div class="col-sm-8">          
                                                    <input type="radio" id="credit" value="1" name="card_type">
                                                    <label for = "credit">Credit</label>
                                                    <input type="radio" id="debit" value="2" name="card_type">
                                                    <label for = "debit">Debit</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">Card Number</label>
                                                <div class="col-sm-8">          
                                                    <input type="text" data-inputmask="'mask': '9999 9999 9999 9999'" class="form-control" id="card_number" name="card_number">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">Card Holder Name</label>
                                                <div class="col-sm-8">          
                                                    <input type="text" class="form-control" id="card_holder_name" name="card_holder_name">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">CVV</label>
                                                <div class="col-sm-8">   

                                                    <input type="text"  data-inputmask="'mask': '999'"   class="form-control" id="cvv" name="cvv">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">Expiry Date</label>
                                                <div class="col-sm-4">      
                                                    <select  class="form-control" id="expiry_month" name="cardExpYear">
                                                    <option selected="true" disabled value="0">MM</option>
                                                        @for($i=1;$i<=12;$i++)
                                                            @if($i<=9)
                                                               <option value="{{$i}}">0{{$i}}</option>
                                                            @else
                                                               <option value="{{$i}}">{{$i}}</option>
                                                            @endif
                                                        @endfor
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">      
                                                    <select  class="form-control" id="expiry_year" name="cardExpYear">
                                                    <option selected="true" disabled value="0">YYYY</option>
                                                    @php   $this_year = date("Y"); // Run this only once
                                                    for ($year = $this_year; $year <= $this_year + 20; $year++) {
                                                        @endphp
                                                        <option value={{$year}}> {{$year}}  </option>
                                                        @php
                                                    } @endphp
                                                    </select>
                                                </div>
                                                <br>
                                                <!-- <div class="errorTxt"></div> -->
                                            </div>
                                            
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-sm-4" for="pwd">Package Amount</label>
                                                <div class="col-sm-8">          
                                                    <input type="text" class="form-control" id="pwd" readonly name="package_amount" value="{{ number_format($package_info->total_amount,2) }}">
                                                </div>
                                            </div>
                                            <div class="form-group">        
                                           
                                            </div>
                                            <div class="form-group">        
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" id="savePaymentButton" class="btn btn-orange pull-right">Submit</button>
                                            </div>
                                            </div>
                                        </form>
                                            
                                          </div> 
                                        
                                        
                                        
                                    <!-- </div> -->
                                </div>
                                        <!-- <h3>Need Help</h3>
                                        <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis. Est atqui timeam mnesarchum.</p>
                                        <div class="support-contact">
                                            <span><i class="fa fa-phone"></i></span>
                                            <p>+1 123 1234567</p>
                                        </div> -->
                                    </div>
                                </div>
                                
                            </div><!-- end row -->
                        
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end cruise-booking -->
        </section><!-- end innerpage-wrapper -->
@endsection
@section('footerSection')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.1.60/inputmask/jquery.inputmask.js"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script type="text/javascript">

    $("#home_menu_id").removeClass('active');
    $("#package_menu_id").addClass('active');
    $(document).ready(function(e){
        $(":input").inputmask();
        $('#expiry_year').change(function(e){
                var expiry_year = $('#expiry_year').val();
                var expiry_month = $('#expiry_month').val();
             
        });

       
    
      $('#payment_mode').change(function(e){
        var payment_mode =  $('#payment_mode').val();
            if(payment_mode == '3')
            {
                $('.online_mode').removeClass('hide');
                $('.card_mode').addClass('hide');
            }
            else if(payment_mode == '2')
            {
                $('.online_mode').addClass('hide');
                $('.card_mode').addClass('hide');
            }
            else if(payment_mode == '1')
            {
                $('.card_mode').removeClass('hide');
                $('.online_mode').addClass('hide');
            }
      });
      $("#payment_form").validate({
        rules: {
            payment_mode: {
                required: true,
            },
            card_number : {
                minlength: 16,
            },
            cvv : {
                minlength: 3,
                maxlength: 3,
            },
            cardExpYear: {
               
            CCExp: {
                month: '#expiry_month',
                year: '#expiry_year'
            },
            },
        },
        messages: {
            payment_mode: {
                required: '{{__("Please select Payment Mode") }}',
            },
            card_number : {
                minlength: '{{__("Please enter 16 digits") }}',

            },  
            cvv : {
                minlength: '{{__("Please enter 3 digits") }}',
                maxlength: '{{__("Please enter only 3 digits") }}',
                
            },
        },
        errorLabelContainer: '.errorTxt',
    });
    $('#payment_form').submit(function() {
        spinner.show();
       return true;
     });
    $.validator.addMethod('CCExp', function(value, element, params) {
    var minMonth = new Date().getMonth() + 1;
    var minYear = new Date().getFullYear();
    var month = parseInt($(params.month).val(), 10);
    var year = parseInt($(params.year).val(), 10);

    return ( !year || !month ||  year > minYear || (year === minYear && month >= minMonth));
    }, 'Expiration date is not correct..');
        });
</script>
@endsection