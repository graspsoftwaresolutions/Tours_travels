<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
@php $company_data = $website_data[0]; 
     $booking_data = $booking_data[0];
     $package_data = $booking_package[0];
     $customer_data = $booking_customer[0];
     $booking_place_details = $booking_place;
   @endphp
	<title>Invoice Details : {{$package_data->package_name ? ucfirst($package_data->package_name) : ''}}</title>
	<style>
		.company-details{
			text-align:center;
			font-weight: 900;
			font-size:15px;
		}
		.page{
			padding:30px;
		}
		.align-right{
			text-align:right;
		}
		.sign-top{
			padding-top:90px
		}
		.member-info{
			font-size:13px;
		}
		.member-info td{
			padding-top:5px;
		}
		.payment-info td{
			border-right: 2px dotted grey;
			border-collapse: separate;
			border-spacing: 2px;
			padding-right:10px;
		}
		.payment-info td{
			padding-top:7px;
		}
		.payment-info{
			font-size:14px;
		}
		body {
			font-family: Arial, Helvetica, sans-serif;
		}
		label{
		  font-size:10px !important;
		  font-weight:550;
		}
		p{
			margin-left: 20px !important;
		}
		#sub_deposit tr td{
			border:1px solid grey;
		  
	   }
		table, th, td {
		  border: 1px solid black;
		   border-collapse: collapse;
		}
		th, td {
		  padding : 10px !important;
		}
		.clearfix{
			clear:both !important;
		}
		.package_table
		{
			margin-left: 20px !important;
		}
		.inner-bullets
		{
			margin-left: 40px !important;
            
		}
		
		</style>
</head>
<body>
	
	<div class="page">
		<div width="100%">
		<h5 style="text-align:right;">Invoice Details</h5>
			<div style="text-align:center;">
		  	<a style="padding:0 !important;" ><img src="{{ asset('storage/app/website/'.$company_data->company_logo) }}" style="width:70px;height:70px;"></a>
				<h1 style="color:#4A7885;margin: 0 0 10px 0;">{{$company_data->company_name ? ucfirst($company_data->company_name) : ''}}</h1>
				<h2 style="margin: 10px;"><b> {{$package_data->package_name ? ucfirst($package_data->package_name) : ''}}</b> </h2>
			</div>		
		</div>
        <div class="clearfix"/>
		<table width="100%">
			<thead>
			<tr >
				<th width="20%" style="color:#4A7885">From Place</th>
				<th width="20%" style="color:#4A7885">To Place </th>
			</tr> </thead>    
			<tr> 
				@php $from_country_name = CommonHelper::getCountryName($booking_data->from_country_id);
					$from_state_name = CommonHelper::getstateName($booking_data->from_state_id);
					$from_city_name = CommonHelper::getcityName($booking_data->from_city_id);
			 	@endphp
			<td >
			<p >Country Name : {{$from_country_name ? $from_country_name : ''}} </p>
			<p >State name : {{$from_state_name ? $from_state_name : ''}} </p>
			<p >City Name : {{$from_city_name ? $from_city_name : ''}} </p>
			</td>
			<td >
			<p >Country Name : {{$booking_data->country_name ? $booking_data->country_name : ''}}</p>
			<p >State name : {{$booking_data->state_name ? $booking_data->state_name : ''}}</p>
			<p >City Name : {{$booking_data->city_name ? $booking_data->city_name : ''}}</p> </td>
			</tr>            
		</table>
		<div class="clearfix"/>
		<br>
		<h2 style="color:#4A7885"><b> Itinerary Information</b> </h2>	
		<table width="100%" class="package_table">
			   
			<tr>   
                <td style="color:#4A7885"> Persons   </td> 
				<td> {{$booking_data->adult_count ? $booking_data->adult_count : 0 }} persons , {{$booking_data->child_count ? $booking_data->child_count : 0 }}  children and {{$booking_data->infant_count ? $booking_data->infant_count : 0 }} Infants </p> </td>
			</tr> 
                @php
                $package_type = CommonHelper::getPackagetypename($booking_data->package_type);
                $from_date = CommonHelper::convert_date_datepicker($booking_data->from_date);
                $to_date = CommonHelper::convert_date_datepicker($booking_data->to_date);
                $summary_cities='';
                    $night_count=0;

                    foreach($booking_place_details as $key => $place){
                       $sum_city_name = CommonHelper::getcityName($place->city_id);
                       $summary_cities .= $sum_city_name.', ';
                       $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
                    }
                 @endphp   
                <tr> 
					<td style="color:#4A7885"> Days and Nights </td>
					<td> {{ $night_count }} nights and {{ $night_count+1 }} days </td>
				</tr>
				<tr> 
					<td style="color:#4A7885"> Itinerary Type  </td>
					<td>  {{ $package_type ? ucfirst($package_type) : ''}} </td>
				</tr>
                <tr>
					<td style="color:#4A7885"> From date  </td>
					<td>  {{ $from_date ? $from_date : ''}} </td>
				</tr>
                <tr> 
					<td style="color:#4A7885"> To date  </td> 
					<td>  {{ $to_date ? $to_date : ''}} </td>
				</tr>
		</table>
		<div class="clearfix"/> <br>
        <br>
		<h2 style="color:#4A7885"><b> Customer Information</b> </h2>	
		<table width="100%" class="package_table">
			   
                <tr> 
					<td> 
					
					<p> Name  : {{ $customer_data->name ? ucfirst($customer_data->name) : ''}}</p> 
					<p> Email : {{ $customer_data->email ? $customer_data->email : ''}} </p>
					<p> Phone : {{ $customer_data->phone ? $customer_data->phone : ''}} </p>
					@php $customer_country_name = CommonHelper::getCountryName($customer_data->country_id);
					$customer_state_name = CommonHelper::getstateName($customer_data->state_id);
					$customer_city_name = CommonHelper::getcityName($customer_data->city_id);
			 	@endphp
					<p> Country : {{ $customer_country_name ? $customer_country_name : ''}} </p>
					<p> State : {{ $customer_state_name ? $customer_state_name : ''}} </p>
					<p> City : {{ $customer_city_name ? $customer_city_name : ''}} </p>
					<p> Address : {{ $customer_data->address_one ? ucfirst($customer_data->address_one) : ''}} , {{ $customer_data->address_two ? ucfirst($customer_data->address_two) : ''}} </p>
					<p> Zipcode : {{ $customer_data->zipcode ? $customer_data->zipcode : ''}}  </p>
					</td>
				</tr>
		</table>
		<div class="clearfix"/> <br>
        <h2 style="color:#4A7885"><b> Trip Information</b> </h2>	
		@php
			$total_nights =0 ;
			$startday = 1;
			$slno = 1;
		@endphp
		@foreach($booking_place_details as $place) 
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;
							  $nightcount = $place->nights_count ;
				

				if($nightcount == 1 )
                {
                    $days_val = 'Day '.$startday ;
                }
                else{
                	$days_val = 'Day '.$startday.' - '.($startday+$nightcount-1) ;
                	//dd($days_val);
                }

                if($nightcount <= 1)
                {
                    $nights =  $nightcount.' Night';
                }
                else{
                    $nights =  $nightcount.' Nights';
                }
                $startday = $startday+$nightcount;
                $total_nights = $nightcount+$total_nights;
                
            @endphp
			<div class="" width="30%" style="float: left;width: 30%;font-size: 15px;margin-right: 10px; padding: 5px;background: #c3986a;color: #fff; border-radius: 8px;">
			<div class="content" style="" width="100%">
				{{ $place_state_name }}, {{ $place_city_name }}
				<br> [ {{$days_val}} ]
			</div>
			<div class="clearfix"></div>
			
		</div>
			
		@endforeach
		<div class="clearfix"/> <br>
        <div class="clearfix"/> <br>
		<h2 style="color:#4A7885"><b>Detailed Summary</b> </h2>
		@foreach($booking_place_details as $place) 
        @php
			  $place_state_name = CommonHelper::getstateName($place->state_id);
			  $place_city_data = CommonHelper::getcityDetails($place->city_id);
			  $place_city_name = $place_city_data->city_name;
			  $place_city_image = $place_city_data->city_image;
			  $sum_booking_activities = CommonHelper::getBookingActivities($booking_data->id,$place->city_id);
			  @endphp
			   @if($place->nights_count!=0)
			   	@php
					 $package_hotels = CommonHelper::getBookingHotel($booking_data->id,$place->city_id);
					 dd($package_hotels);
				@endphp
				$amenity_count = $sum_package_hotel!=null ? count($sum_package_hotel->amenities) : 0;
					 
					 $amenitystring = '';

					 if($sum_package_hotel!=null){
						foreach($sum_package_hotel->amenities as $key => $amenity){
						 $amenitystring .= $amenity->amenities_name;
						 if($amenity_count-1 != $key){
						   $amenitystring .= ', ';
						 } 
					   }
					 }
					 $roomtypesstring = '';
					 $type_count = $sum_package_hotel!=null ? count($sum_package_hotel->roomtypes) : 0;

					 if($sum_package_hotel!=null){
					   foreach($sum_package_hotel->roomtypes as $key => $roomtype){
						 if($roomtype->pivot->roomtype_id==$sum_package_hotel->roomtype_id){
						   $roomtypesstring = $roomtype->room_type;
						   //dd($roomtypesstring);
						 } 
					   }
					 }				 
					 $sum_booking_activities = CommonHelper::getBookingActivities($booking_data->id,$place->city_id);
					
				   @endphp
				   <p > <b> {{$slno}} . {{ $place_state_name }} - {{ $place_city_name }} </b> </p>
				   @if($sum_package_hotel!=null)
					   @php
					   $hotelimages  = CommonHelper::getHotelImages($sum_package_hotel->id); 
					   //dd($hotelimages);
					  // $hotelimages = $sum_package_hotel->hotelimages;
					   $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
					   @endphp
					   <p class="inner-bullets" style="text-decoration: underline;"> <b> Hotel Name : </b> {{ $sum_package_hotel->hotel_name ? ucfirst($sum_package_hotel->hotel_name) : '' }} </p>
					  <br>
					   <p> @php
					   if(count($hotelimages) > 0)
					   {
						   @endphp
						   @foreach($hotelimages as $val)
					   <img class="inner-bullets" alt="hotel_images" style="width:150px;height:150px;border-width:5px;border-style:solid;border-color:#8ebfed   ;"  border="5" src="{{ asset('storage/app/hotels/'.$val->image_name) }}">
						   @endforeach
					   @php
					   }
					   else{ 
					   @endphp
					   <img class="inner-bullets" style="width:200px;height:200px;padding-top:30px " src="{{ asset('public/assets/images/no_image.jpg') }}">
					   @php
					   }
				   @endphp  
			 </p> 
				   <p class="inner-bullets"><b> Amenities </b> : {{ $amenitystring  ? $amenitystring : ''}}</p>
				   <div class="clearfix"/> 
					   <p class="inner-bullets"> <b> Overview : </b> </p>
					   <div class="clearfix"/> 
					   <div class="overview-section inner-bullets">
						   {!! $sum_package_hotel->overview !!} 
					   </div>
					   <div class="clearfix"/> 
					   <p class="inner-bullets">  <b> Room Type : </b> {{$roomtypesstring ? $roomtypesstring : ''}} </p>
					   <p class="inner-bullets"> <b> No of Rooms : </b> {{ $sum_package_hotel->total_rooms ? $sum_package_hotel->total_rooms : '' }} </p>
					   <p class="inner-bullets"> <b> Total Amount : </b> {{ $sum_package_hotel->total_amount ? $sum_package_hotel->total_amount : '' }} </p>
				@endif 
				
				  @foreach($sum_booking_activities as $activity)
                        @php
                        $activityimages = $activity->activity_images;
                        $act_image = count($activityimages)>0 ? asset('storage/app/activity/'.$activityimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                        //$activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                            $booking_activity_cost= CommonHelper::getBookingActivityCost($booking_data->id,$activity->id);
                            $activity_images  = CommonHelper::getActivityImages($activity->id);
                        @endphp
                        <p class="inner-bullets" style="text-decoration: underline;"><b>  Activity Name : </b> {{ $activity->title_name ? $activity->title_name : '' }}  </p>  <br>
                              <p > 
                                      @php
                                        if(count($activity_images) > 0)
                                        {
                                          @endphp
                                            @foreach($activity_images as $valu)
                                          	<img alt="activity_images" class="inner-bullets" style="width:150px;height:150px;border-width:5px;border-style:solid;border-color:#8ebfed " src="{{ asset('storage/app/activity/'.$valu->image_name) }}">
                                            @endforeach
                                          @php
                                        }
                                        else{
                                          @endphp
                                          <img class="inner-bullets" style="width:200px;height:200px;border-width:5px;border-style:solid;border-color:#8ebfed "  src="{{ asset('public/assets/images/no_image.jpg') }}">
                                          @php
                                        }
                                      @endphp
                               </p>
							   @php 
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
                              <p class="inner-bullets" style="margin-left:90px;"><b> Duration </b> : {{ $hours_and_minutes ? $hours_and_minutes : '' }} </p>
                              <p class="inner-bullets" style="margin-left:90px;"><b> Overview </b> : </p>
							  <div class="inner-bullets">
                             	 <p  >{!! $activity->overview !!}</p>
							  </div>
                              @php
                                    //  dd($activity);
                               
                                   $inclusion = $activity->inclusion_name; 
                                   
                                    if(!empty($inclusion))
                                    {
                                        $someArray = json_decode($inclusion, true);
                                    }
                                    $exclusion = $activity->exclusion_name; 
                                    if(!empty($exclusion))
                                    {
                                        $excsomeArray = json_decode($exclusion, true);
                                    }
                                    @endphp
                              <p class="inner-bullets"><b> Inclusions </b> : </p>
							 
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

                              <p class="inner-bullets"><b> Exclusions </b> : </p>
                              <ul style="list-style-type:disc;">
							  @php
								if(!empty($someArray))
								{
									@endphp
									@foreach($excsomeArray as $values)
										<li class="inner-bullets">{{$values ? $values : ''}}</li>
									@endforeach
									@php
								} @endphp
							  </ul> 
							  <p class="inner-bullets"><b> Additional Info </b> :  </p>
							  <div class="inner-bullets">
							  	{!! $activity->additional_info !!}
							  </div>
                             
                              <p class="inner-bullets"><b> Amount </b> : {{$booking_activity_cost ? $booking_activity_cost : ''}} </p>

                              @endforeach   
                @endif 
                @php $slno++; @endphp
                @endforeach   
				<p style="color:#4A7885;"><label style="margin-left:10px; font-size:15px !important; padding: 10px; background: #b39371;
    color: #fff;width:50%"><b> Total Cost </b>  : {{$booking_data->grand_total ? $booking_data->grand_total : '' }} </label>  </p>
                <!-- <p ><b> Price Summary </b> </p>
                        <table width="100%" class="package_table"> 
							<tr> 
							  <td style="color:#4A7885"> Accommodation </td>
							  <td> {{$booking_data->total_accommodation ? $booking_data->total_accommodation : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Activities </td>
							  <td> {{$booking_data->total_activities ? $booking_data->total_activities : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Transport Charges </td>
							  <td> {{$booking_data->transport_additional_charges ? $booking_data->transport_additional_charges : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Total package value </td>
							  <td> {{$booking_data->total_package_value ? $booking_data->total_package_value : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> GST </td>
							  <td> {{$booking_data->tax_percentage ? $booking_data->tax_percentage : ''}} % </td>
						   </tr>
						    <tr> 
							  <td style="color:#4A7885"> Tax Amount </td>
							  <td> {{$booking_data->tax_amount ? $booking_data->tax_amount : ''}} </td>
						   </tr> <tr> 
							  <td style="color:#4A7885"> Total Amount </td>
							  <td> {{$booking_data->total_amount ? $booking_data->total_amount : ''}} </td>
						   </tr>
					</table> -->
                    <!-- <p ><b> Additional price </b> </p>
                        <p > [Including transport and additional Charges] </p>             
							 <table width="100%" class="package_table">
                        
							<tr> 
							  <td style="color:#4A7885"> Adult per price </td>
							  <td> {{$booking_data->adult_price_person ? $booking_data->adult_price_person : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Child per price </td>
							  <td> {{$booking_data->child_price_person ? $booking_data->child_price_person : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Infant per price </td>
							  <td> {{$booking_data->infant_price ? $booking_data->infant_price : ''}} </td>
						   </tr>	
						</table> -->
                        <p>	<address style="text-align:center">
					@php $company_country_name = CommonHelper::getCountryName($company_data->country_id);
					  $company_state_name = CommonHelper::getstateName($company_data->state_id);
					  $company_city_name = CommonHelper::getcityName($company_data->city_id);
				  @endphp
					{{ $company_data->company_name ? ucfirst($company_data->company_name) : '' }}<br> 
					{{$company_data->company_address_one ? ucfirst($company_data->company_address_one) : '' }} , {{$company_data->company_address_two ? ucfirst($company_data->company_address_two) : '' }} , <br> {{ $company_country_name }} , {{ $company_state_name }} , {{ $company_city_name }} {{ $company_data->zipcode }}<br>
					Contact :  {{$company_data->company_phone ? $company_data->company_phone : '' }}<br>
						Website : {{$company_data->company_website ? $company_data->company_website : '' }}  <br>
						Email : {{$company_data->company_email ? $company_data->company_email : '' }}.
					</address>
	</div>
</body>
</html>