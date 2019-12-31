<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
@php $company_data = $website_data[0]; 
   		$package = $package_data[0];
        $package_place_data = $package_place;
        $package_hotel_data = $package_hotel;
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
			margin-left: 40px !important;
            
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
		</style>
</head>
<body>
	
	<div class="page">
		@php $company_country_name = CommonHelper::getCountryName($company_data->country_id);
		  $company_state_name = CommonHelper::getstateName($company_data->state_id);
		  $company_city_name = CommonHelper::getcityName($company_data->city_id);
	  @endphp
	
		<div class="first-page" style="background-image: url(http://localhost/Tours_travels/public/assets/images/boxes_only_3.png);background-repeat: no-repeat;background-position: right;">
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
			<br><br>	
		</div>
		<div class="clearfix"/>
		@php
	        $package_type = CommonHelper::getPackagetypename($package->package_type);
	        $summary_cities='';
	        $night_count=0;

            foreach($package_place_data as $key => $place){
               $sum_city_name = CommonHelper::getcityName($place->city_id);
               $summary_cities .= $sum_city_name.', ';
               $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
            }
            
        @endphp   
		<h4 style="color: #548594;font-weight: bold;">Package Information</h4>
		<div class="first-page-sections" width="30%" style="float: left;width: 30%">
			<div class="heading" style="" width="100%">
				Persons :
			</div>
			<div class="clearfix"></div>
			<div class="content" style="font-size: 14px;">
				{{$package->adult_count ? $package->adult_count : 0 }} persons , {{$package->child_count ? $package->child_count : 0 }}  children and {{$package->infant_count ? $package->infant_count : 0 }} Infant
			</div>
			
		</div>
		<div width="70%" style="float: left;">
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
				Package Type :
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
		<div class="first-page-sections" width="30%" style="float: left;width: 30%">
			<div class="heading" style="" width="100%">
				Date :
			</div>
			<div class="clearfix"></div>
			<div class="content" style="font-size: 14px;">
				From : 12 persons, To: 555
			</div>
			
		</div>
		<div width="70%" style="float: left;">
			&nbsp;
		</div>
		<div class="clearfix"/>
		</div>
		<div class="clearfix"/> <br><br>
		@php  $sno = 0; $slno = 1; $start = 0;
				$days = 1; @endphp
		
		<h2 style="color:#4A7885"><b>Detailed Summary</b> </h2>
		@foreach($package_place_data as $place) 
			@php 
			  $place_state_name = CommonHelper::getstateName($place->state_id);
			  $place_city_data = CommonHelper::getcityDetails($place->city_id);
			  $place_city_name = $place_city_data->city_name;
			  $place_city_image = $place_city_data->city_image;
			  @endphp
			   @if($place->nights_count!=0)
				  @php
					 $sum_package_hotel = CommonHelper::getPackageHotel($package->packageautoid,$place->city_id);
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
					  $sum_package_activities = CommonHelper::getPackageActivities($package->packageautoid,$place->city_id);
                     
				    @endphp
                    <p > <b> {{$slno}} . {{ $place_state_name }} - {{ $place_city_name }} </b> </p>
				    @if($sum_package_hotel!=null)
                        @php
                        $hotelimages  = CommonHelper::getHotelImages($sum_package_hotel->id); 
                       // $hotelimages = $sum_package_hotel->hotelimages;
                        $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                        @endphp
                        <p class="inner-bullets"> <b> Hotel Name : </b> {{ $sum_package_hotel->hotel_name ? ucfirst($sum_package_hotel->hotel_name) : '' }} </p>
                       <br>
                        <p> @php
                        if(count($hotelimages) > 0)
                        {
                            @endphp
                            @foreach($hotelimages as $val)
                        <img style="width:150px;height:150px;border-width:5px;border-style:solid;border-color:#8ebfed   ;" alt="{{ ucfirst($sum_package_hotel->hotel_name) }}" border="5" src="{{ asset('storage/app/hotels/'.$val->image_name) }}"> 
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
                    <p class="inner-bullets"><b> Amenities </b> : {{ $amenitystring  ? $amenitystring : ''}}</p>
                    <div class="clearfix" /> 
                        <p class="inner-bullets"> <b> Overview : </b> </p>
                        <div class="clearfix"/> 
                        <div class="overview-section inner-bullets">
                            {!! $sum_package_hotel->overview !!} 
                        </div>
                        <div class="clearfix"/> 
                        <p class="inner-bullets"> <b> Room Type : </b> {{$roomtypesstring ? $roomtypesstring : ''}} </p>
                        <p class="inner-bullets"> <b> No of Rooms : </b> {{ $sum_package_hotel->total_rooms ? $sum_package_hotel->total_rooms : '' }} </p>
                        <p class="inner-bullets"> <b> Total Amount : </b> {{ $sum_package_hotel->total_amount ? $sum_package_hotel->total_amount : '' }} </p>
			    <br>
					@endif
                    @foreach($sum_package_activities as $activity)
                        @php
                        $activityimages = $activity->activity_images;
                        $act_image = count($activityimages)>0 ? asset('storage/app/activity/'.$activityimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                       // $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                            $package_activity_cost= CommonHelper::getPackageActivityCost($package->packageautoid,$activity->id);
                            $activity_images  = CommonHelper::getActivityImages($activity->id);
                        @endphp
                        <p class="inner-bullets"><b>  Activity Name : </b> {{ $activity->title_name ? ucfirst($activity->title_name) : '' }}  </p>  <br>
                              <p > 
                                      @php
                                        if(count($activity_images) > 0)
                                        {
                                          @endphp
                                            @foreach($activity_images as $valu)
										
												<img class="inner-bullets" style="width:150px;height:150px;border-width:5px;border-style:solid;border-color:#8ebfed " alt="{{ ucfirst($activity->title_name) }}" src="{{ asset('storage/app/activity/'.$valu->image_name) }}"> 
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
                              <p class="inner-bullets"><b> Amount </b> : {{$package_activity_cost ? $package_activity_cost : ''}} </p>

                        @endforeach   
                @endif 
                @php $slno++; @endphp  

		@endforeach
        <p><b> Price Summary </b>  </p>
                        <table width="100%" class="package_table"> 
							<tr> 
							  <td style="color:#4A7885"> Accommodation </td>
							  <td> {{$package->total_accommodation ? $package->total_accommodation : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Activities </td>
							  <td> {{$package->total_activities ? $package->total_activities : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Transport Charges </td>
							  <td> {{$package->transport_charges ? $package->transport_charges : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Additional Charges </td>
							  <td> {{$package->additional_charges ? $package->additional_charges : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> Total package value </td>
							  <td> {{$package->total_accommodation ? $package->total_accommodation : ''}} </td>
						   </tr>
						   <tr> 
							  <td style="color:#4A7885"> GST </td>
							  <td> {{$package->tax_percentage ? $package->tax_percentage : ''}} % </td>
						   </tr>
						    <tr> 
							  <td style="color:#4A7885"> Tax Amount </td>
							  <td> {{$package->tax_amount ? $package->tax_amount : ''}} </td>
						   </tr> <tr> 
							  <td style="color:#4A7885"> Total Amount </td>
							  <td> {{$package->total_amount ? $package->total_amount : ''}} </td>
						   </tr>
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

					
</body>
</html>