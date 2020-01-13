<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
@php 	//$company_data = $data['website_data'][0]; 
   		//$package = $data['package_data'][0];
       // $package_place_data = $data['package_place'][0];
       // $package_hotel_data = $data['package_hotel'][0];

		$company_data = $website_data[0]; 
   		$package = $package_data[0];
      	$package_place_data = $package_place;
        $package_hotel_data = $package_hotel;
		$custom_data  = $customized_data;
		
   @endphp
	<title>{{$package->package_name ? ucfirst($package->package_name) : ''}}</title>
	<style>
		.company-details{
			text-align:center;
			font-weight: 900;
			font-size:15px;
		}
		.page{
			padding:25px;
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
			margin-left: 20px !important;
            
		}
		table.company_headings th, td,.company_headings{
			border: none !important;
		}
		.tour-details{
			margin-left: 20px;
		}
		.address-icons{
			margin-right: 10px;
		}
		.first-page-sections th,td{
			//border: 1px solid black !important;
		   border-collapse: collapse;
		}
		.first-page-sections .heading{
			background: #000;
		    color: #fff;
		    border-radius: 10px 10px 0 0;
		    padding: 5px;
		}
		.first-page-sections .content{
			background: #c3986a;
		    color: #fff;
		    padding: 5px;
		}
		.ameneties-list-container a {
		    //display: block;
		    ///float: left;
		    margin: 10px;
		    border: 1px solid #c39869;
		    color: #579dc5;
		    padding: 9px 17px;
		    border-radius: 30px;
		    background-color: #fbf6f9;
		   // width: 30%;
		    //float: left;
		}
		.width100{
			width:100% !important;
			float: none !important;
		}
		</style>
</head>
<body>
	
	<div class="page">
		@php $company_country_name = CommonHelper::getCountryName($company_data->country_id);
		  $company_state_name = CommonHelper::getstateName($company_data->state_id);
		  $company_city_name = CommonHelper::getcityName($company_data->city_id);
	  @endphp
	
		<div class="first-page" style="background-image: url({{ asset('/public/assets/images/boxes_only_3.png') }});background-repeat: no-repeat;background-position: right;">
			<br>
			<table class="company_headings" width="100%">
				<tr>
					<td colspan="2" align="center" style="color: #548594;font-weight: bold;">
						{{$package->package_name ? ucfirst($package->package_name) : ''}}
					</td> 
				</tr>
				<tr>
					<td width="50%">
						<img src="{{ asset('storage/app/website/'.$company_data->company_logo) }}" style="width:70px;height:70px;"><br>
						<div width="5%" style="float: left;">
							<img class="address-icons" src="{{ asset('public/assets/images/map.png') }}" width="20px" > 
						</div>
						<div  style="float: left;">
							{{$company_data->company_address_one!='' ? ucfirst($company_data->company_address_one) : '' }} {{$company_data->company_address_two!='' ? ','.ucfirst($company_data->company_address_two) : '' }}, <br>
							{{ $company_state_name }} , {{ $company_city_name }} - {{ $company_data->zipcode }}<br>
						</div>
						<br style="clear: both;">
						<div width="5%" style="float: left;">
							<img class="address-icons" src="{{ asset('public/assets/images/phone-call.png') }}" width="20px" > 
						</div>
						<div >
							{{$company_data->company_phone}}<br>
						</div>
						<br>
						<div width="5%" style="float: left;">
							<img class="address-icons" src="{{ asset('public/assets/images/mail.png') }}" width="20px" > 
						</div>
						<div >
							{{$company_data->company_email}}<br>
						</div>
						<br>
						<!--div width="5%" style="float: left;">
							<img class="address-icons" src="{{ asset('public/assets/images/global.png') }}" width="20px" > 
						</div>
						<div >
							{{$company_data->company_website}}<br>
						</div-->
						
						 

					</td>
					<td width="50%" style="margin-left: 10px;vertical-align: top;">
						<div class="tour-details">
							<h4 style="color: #548594;">{{$company_data->company_name ? ucfirst($company_data->company_name) : ''}}</h4>
							<h5 style="margin-left: 20px;">
								@php
									 $from_country_name = CommonHelper::getCountryName($package->from_country_id);
								@endphp
								From : {{ $from_country_name }} <br><br>
								To : {{ $package->country_name }}
							</h5>
							
						</div>
						
					</td>
				</tr>
			</table>
		<div width="100%" style="height: 250px;">
			<br>	
			<br>
			<br>
			<br>
		</div>
		<div class="clearfix"/>
		@php
	        $package_type = CommonHelper::getPackagetypename($package->package_type);
	        $summary_cities='';
	        $night_count=0;
			
            foreach($package_place_data as $key => $place){
				//dd($place->city_id);
               $sum_city_name = CommonHelper::getcityName($place->city_id);
			   
               $summary_cities .= $sum_city_name.', ';
               $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
            }
            
        @endphp   
		<h4 style="color: #548594;font-weight: bold;">Itinerary Information</h4>
		<div class="first-page-sections" width="35%" style="float: left;width: 30%">
			<div class="heading" style="" width="100%">
				Persons :
			</div>
			<div class="clearfix"></div>
			<div class="content" style="font-size: 14px;">
				{{$package->adult_count ? $package->adult_count : 0 }} persons , {{$package->child_count ? $package->child_count : 0 }}  children and {{$package->infant_count ? $package->infant_count : 0 }} Infant
			</div>
			
		</div>
		<div width="65%" style="float: left;">
			&nbsp;
		</div>
		<div class="clearfix"/>
		<br>
		<div class="first-page-sections" width="30%" style="float: left;width: 30%">
			<div class="heading" style="" width="100%">
				Days & Nights :
			</div>
			<div class="clearfix"></div>
			<div class="content" style="font-size: 14px;">
				{{ $night_count }} nights and {{ $night_count+1 }} days
			</div>
			
		</div>
		<div width="70%" style="float: left;">
			&nbsp;
		</div>
		<div class="clearfix"/>
		<br>
		<div class="first-page-sections" width="30%" style="float: left;width: 30%">
			<div class="heading" style="" width="100%">
			Itinerary Type :
			</div>
			<div class="clearfix"></div>
			<div class="content" style="font-size: 14px;">
				{{ $package_type ? ucfirst($package_type) : ''}}
			</div>
			
		</div>
		<div width="70%" style="float: left;">
			&nbsp;
		</div>
		<div class="clearfix"/>
		<br>
		@php
			$total_nights =0 ;
			$startday = 1;
		@endphp
		@foreach($package_place_data as $place) 
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
		</div>
		<!--div class="" width="30%" style="float: left;width: 30%;font-size: 15px;margin-right: 10px; padding: 5px;background: #c3986a;color: #fff; border-radius: 8px;">
			<div class="content" style="" width="100%">
				TamilNadu, Chennai 
				<br> [ Day 1 - 2]
			</div>
			<div class="clearfix"></div>
			
		</div>
		<div width="30%" class="content" style="float: left;background: #000;color: #fff;font-size: 15px;padding: 5px;margin-right: 10px;  border-radius: 8px;">
			<div class="heading" style="" width="100%">
				 TamilNadu, Chennai <br> [ Day 1 - 2]
			</div>
		</div>
		<div width="30%" class="content" style="float: left;background: #c3986a;color: #fff;font-size: 15px;padding: 5px; border-radius: 8px;">
			<div class="heading" style="" width="100%">
				TamilNadu, Chennai <br> [ Day 1 - 2]
			</div>
		</div>
		<div class="clearfix"/>
		</div-->
		<div class="clearfix"/> <br><br>
		@php  $sno = 0; $slno = 1; $start = 0;
				$days = 1;
				//dd(2);
		@endphp
		
		<h2 style="color:#4A7885"><b>Detailed Summary</b> </h2>
		@foreach($package_place_data as $key => $place)
            
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;

                              $package_hotels = CommonHelper::getPackageHotels($package->packageautoid,$place->city_id);
                             
                            @endphp		

							@foreach($package_hotels as $hotel)
                                    @php
                                      $package_hotel_types = CommonHelper::getPackageHotelTypes($package->packageautoid,$place->city_id,$hotel->hotel_id);
                                      $package_hotel = CommonHelper::getPackageHotelDetails($package->packageautoid,$place->city_id,$hotel->hotel_id);
									 
                                    @endphp
                                      <div id="picked_city_hotel_{{ $package_hotel->id }}" class="card media-card-sm">
                                        <div id="picked-hotelmedia-{{ $package_hotel->id }}" class="media">
                                          
                                          @php
										  	$hotelimages  = CommonHelper::getHotelImages($package_hotel->id);
                                            
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
                                                $rating_string = $ratings.' <i id="pickviewrating" class="pickviewrating mdi mdi-star"></i>';
                                              }
                                            }
                                            $total_hotel_prices = 0;
											$sum_package_activities = CommonHelper::getPackageActivities($package->packageautoid,$place->city_id);
                                          @endphp   
                                          <div class="media-body p10">     
												<div class="" style="float: left;width: 100%;font-size: 16px;margin-right: 10px; padding: 10px;background: #c3986a;color: #fff; ">
													<b>  {{ $place_state_name }} - {{ $place_city_name }} <span class="pull-right" style="font-size: 16px;"> {!! $rating_string !!} </span> </b> 
												</div>
                                            
                                            	<div class="clearfix"></div> 
												<br>
												<div class="" style="float: left;width: 20%;font-size: 16px;margin-left: 20px;margin-right: 10px; padding: 0px;background: #b39371;color: #fff; ">
													<p class="inner-bullets" style="margin: 5px;"> <b> {{$slno}} . Hotel Name  </p>
												</div>
												<div class="" style="float: left;width: 74%;font-size: 16px;margin-right: 10px; padding: 0px; ">
													<p class="inner-bullets" style="margin: 5px;"> {{ $package_hotel->hotel_name ? ucfirst($package_hotel->hotel_name) : '' }} </b> </p>
												</div>
												<div class="clearfix"></div>
												<br>
												<br> 
												<p> @php
										 		 $slno =1;
												if(count($hotelimages) > 0)
												{
													@endphp
													@foreach($hotelimages as $val)
													<img style="width:150px;height:150px;border-width:3px;border-style:solid;border-color:#c39869;  margin-right: 10px ;" alt="{{ ucfirst($package_hotel->hotel_name) }}" border="5" src="{{ asset('storage/app/hotels/'.$val->image_name) }}"> 
													@endforeach
												@php
												}
												else{ 
												@endphp
												<img style="width:150px;height:150px;padding-top:30px " src="{{ asset('public/assets/images/no_image.jpg') }}">
												@php
												}
											@endphp  
											</p> 
											<div class="inner-bullets ">
											<h2 class="">Amenities</h2>
											<div class="ameneties-list-container">
												@if($package_hotel!=null)
													@foreach($package_hotel->amenities as $key => $amenity)
														<p style="padding: 5px;border: 1px solid #c39869;color: #579dc5;padding: 9px 17px; border-radius: 5px;">{{$amenity->amenities_name}}</a>
													@endforeach
												@endif
											</div>	
										</div>
										<div class="clearfix" /> 
										<p class="inner-bullets"> <b> Overview : </b> </p>
										<div class="clearfix"/> 
										<div class="overview-section inner-bullets">
											{!! $package_hotel->overview !!} 
										</div>
												<p> </p>
                                           	 	<p> <b> Room Types : </b>
                                              @foreach($package_hotel_types as $tkey => $types)
                                                 {{ $types->room_type }} - {{ $types->total_rooms }}
                                                 @if($tkey!=count($package_hotel_types)-1)
                                                    ,
                                                 @endif
                                                 @php $total_hotel_prices += $types->total_rooms * $types->total_amount; @endphp  
                                              @endforeach
                                            </p>
                                            @php $slno++; @endphp  
                                          </div>
										  <p class="inner-bullets"> <b> Total Amount : </b> {{ $total_hotel_prices ?  $total_hotel_prices  : '' }} </p>
                                  @endforeach
							@foreach($sum_package_activities as $activity)
                        @php
                        $activityimages = $activity->activity_images;
                        $act_image = count($activityimages)>0 ? asset('storage/app/activity/'.$activityimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                       // $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                            $package_activity_cost= CommonHelper::getPackageActivityCost($package->packageautoid,$activity->id);
                            $activity_images  = CommonHelper::getActivityImages($activity->id);
                        @endphp
                          <div class="clearfix"></div>
                        <div class="" style="float: left;width: 20%;font-size: 16px;margin-left: 20px;margin-right: 10px; padding: 0px;background: #b39371;color: #fff; ">
	                        <p class="inner-bullets" style="margin: 5px;"> <b> Activity Name <br> </b> </p>
	                    </div>
	                     <div class="" style="float: left;width: 74%;font-size: 16px;margin-right: 10px; padding: 0px; ">
	                        <p class="inner-bullets" style="margin: 5px;"> {{ $activity->title_name ? ucfirst($activity->title_name) : '' }} </p>
	                    </div>
                        <div class="clearfix"></div>
                         <br><br>
                              <p style="margin-left: 0px !important;"> 
                                      @php
                                        if(count($activity_images) > 0)
                                        {
                                          @endphp
                                            @foreach($activity_images as $valu)
										
												<img class="inner-bullets" style="width:150px;height:150px;border-width:5px;border-style:solid;border-color:#c39869 " alt="{{ ucfirst($activity->title_name) }}" src="{{ asset('storage/app/activity/'.$valu->image_name) }}"> 
											@endforeach
											@php
											}
											else{ 
											@endphp
											<img class="inner-bullets" style="width:150px;height:150px;padding-top:30px " src="{{ asset('public/assets/images/no_image.jpg') }}">
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
								}
								  @endphp
							  </ul> 
                              <p class="inner-bullets"><b> Additional Info </b> : {!! $activity->additional_info !!} </p>
								@if($custom_data=='no')
									<p class="inner-bullets"><b> Amount </b> : {{$package_activity_cost ? $package_activity_cost : ''}} </p>
							  @endif

                        @endforeach   
               
                @php $slno++; @endphp  

		@endforeach
		<hr style="margin : 0px 0 20px 10px">
						<p style="width: 20%;font-size: 16px;margin-left: 20px;margin-right: 10px; padding: 10px; background: #b39371;
					color: #fff;"><b> Price Summary </b>  </p>
					@if($custom_data=='no')
                        <table width="100%" class="package_table"> 
                        	<thead>
                        		<tr>
                        			<th style="font-weight: bold;">
                        				Particulars
                        			</th>	
                        			<th style="font-weight: bold;">
                        				Cost
                        			</th>	
                        		</tr>
                        	</thead>
                        	<tbody>
                        		<tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> Accommodation </td>
								  <td> {{$package->total_accommodation ? $package->total_accommodation : ''}} </td>
							   </tr>
							   <tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> Activities </td>
								  <td> {{$package->total_activities ? $package->total_activities : ''}} </td>
							   </tr>
							   <tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> Transport Charges </td>
								  <td> {{$package->transport_charges ? $package->transport_charges : ''}} </td>
							   </tr>
							   <tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> Additional Charges </td>
								  <td> {{$package->additional_charges ? $package->additional_charges : ''}} </td>
							   </tr>
							   <tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> Total Itinerary value </td>
								  <td> {{$package->total_package_value ? $package->total_package_value : ''}} </td>
							   </tr>
							   <tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> GST </td>
								  <td> {{$package->tax_percentage ? $package->tax_percentage : ''}} % </td>
							   </tr>
							    <tr> 
								  <td style="color:#4A7885;font-style: italic;border-right: 1px solid #000 !important;"> Tax Amount </td>
								  <td> {{$package->tax_amount ? $package->tax_amount : ''}} </td>
							   </tr> 
                        	</tbody>
                        	<tfoot>
                        		<tr> 
								  <td style="color:#4A7885;border: 1px solid #000 !important;"> Total Amount </td>
								  <td style="border: 1px solid #000 !important;"> {{$package->total_amount ? $package->total_amount : ''}} </td>
							   </tr>
                        	</tfoot>
							
					</table>
					
			<p ><b> Additional price </b> </p>
                        <p > [Including transport and additional Charges] </p>             
							 <table width="100%" class="package_table">
                        
							<tr> 
							  <td style="color:#4A7885"> Adult per price </td>
							  <td> {{$package->adult_price_person ? $package->adult_price_person : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Child per price </td>
							  <td> {{$package->child_price_person ? $package->child_price_person : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Infant per price </td>
							  <td> {{$package->infant_price ? $package->infant_price : ''}} </td>
						   </tr>	
						</table>
			@else
				<p style='margin-left:1px'>	<b>Total Package Cost : </b> {{$package->total_amount ? $package->total_amount : ''}} </p>
			
			@endif

					
</body>
</html>