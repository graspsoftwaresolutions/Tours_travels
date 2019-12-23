<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Package PDF</title>
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
	@php $company_data = $website_data[0]; 
   		$package = $package_data[0];
        $package_place_data = $package_place;
        $package_hotel_data = $package_hotel;
   @endphp
	<div class="page">
		<div width="100%">
		
			<div style="text-align:center;">
		  	<a style="padding:10px !important;" href="index.html"><img src="{{ asset('public/assets/images/website_logo/'.$company_data->company_logo) }}" style="width:70px;height:70px;"></a>
				<h1 style="color:#4A7885">{{$company_data->company_name ? $company_data->company_name : ''}}</h1>
				<h2 style=""><b> {{$package->package_name ? $package->package_name : ''}}</b> </h2>
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
				@php $from_country_name = CommonHelper::getCountryName($package->from_country_id);
					$from_state_name = CommonHelper::getstateName($package->from_state_id);
					$from_city_name = CommonHelper::getcityName($package->from_city_id);
			 	@endphp
			<td >
			<p >Country Name : {{$from_country_name ? $from_country_name : ''}} </p>
			<p >State name : {{$from_state_name ? $from_state_name : ''}} </p>
			<p >City Name : {{$from_city_name ? $from_city_name : ''}} </p>
			</td>
			<td >
			<p >Country Name : {{$package->country_name ? $package->country_name : ''}}</p>
			<p >State name : {{$package->state_name ? $package->state_name : ''}}</p>
			<p >City Name : {{$package->city_name ? $package->city_name : ''}}</p> </td>
			</tr>            
		</table>
		<div class="clearfix"/>
		<br>
		<h2 style="color:#4A7885"><b> Package Information</b> </h2>	
		<table width="100%" class="package_table">
			   
			<tr>   
                <td style="color:#4A7885"> Persons   </td> 
				<td> {{$package->adult_count ? $package->adult_count : 0 }} persons , {{$package->child_count ? $package->child_count : 0 }}  childerns and {{$package->infant_count ? $package->infant_count : 0 }} Infants </p> </td>
			</tr> 
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
                <tr> 
					<td style="color:#4A7885"> Days and Nights </td>
					<td> {{ $night_count }} nights and {{ $night_count+1 }} days </td>
				</tr>
				<tr> 
					<td style="color:#4A7885"> Package Type  </td>
					<td>  {{ $package_type ? $package_type : ''}} </td>
				</tr>
		</table>
		<div class="clearfix"/> <br>
        @php  $sno = 0; $slno = 1; @endphp
		 @foreach($package_place_data as $place) 
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;
							  $nightcount = $place->nights_count ;
							    
				if($nightcount > 1 )
                {
                    $days_val = 'Day 1 - '.$nightcount ;
                }
                else{
                    $days_val = 'Day '.$nightcount;
                }
                if($nightcount <= 1)
                {
                    $nights =  $nightcount.' Night';
                }
                else{
                    $nights =  $nightcount.' Nights';
                }
            @endphp
			
			<p > {{$sno+1}} . {{ $place_state_name }}, {{ $place_city_name }} </p>
			<div class="inner-bullets" > * {{$days_val}} [ {{$nights }} ] </div>
			@php $sno++; @endphp
		
		@endforeach
		<div class="clearfix"/> <br>
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
                        $hotelimages  = CommonHelper::getHotelImages($sum_package_hotel->hotel_id); 
                        $hotelimages = $sum_package_hotel->hotelimages;
                        $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                        @endphp
                        <p > <b> Hotel Name : </b> {{ $sum_package_hotel->hotel_name ? ucfirst($sum_package_hotel->hotel_name) : '' }} </p>
                       <br>
                        <p> @php
                        if(count($hotelimages) > 0)
                        {
                            @endphp
                            @foreach($hotelimages as $val)
                        <img style="width:200px;height:180px;border-width:5px;border-style:solid;border-color:#8ebfed   ;" border="5" src="{{ asset('storage/app/hotels/'.$val->image_name) }}"> &nbsp;&nbsp;
                            @endforeach
                        @php
                        }
                        else{ 
                        @endphp
                        <img style="width:200px;height:200px;padding-top:30px " src="{{ asset('public/assets/images/no_image.jpg') }}">
                        @php
                        }
                    @endphp  
			  </p> 
                    <p><b> Amenities </b> : {{ $amenitystring  ? $amenitystring : ''}}</p>
                    <div class="clearfix"/> 
                        <p > <b> Overview : </b> </p>
                        <div class="clearfix"/> 
                        <div class="overview-section">
                            {!! $sum_package_hotel->overview !!} 
                        </div>
                        <div class="clearfix"/> 
                        <p> Room Type : {{$roomtypesstring ? $roomtypesstring : ''}} </p>
                        <p> No of Rooms : {{ $sum_package_hotel->total_rooms ? $sum_package_hotel->total_rooms : '' }} </p>
                        <p> Total Amount : {{ $sum_package_hotel->total_amount ? $sum_package_hotel->total_amount : '' }} </p>
			    <br>
					@endif
                    @foreach($sum_package_activities as $activity)
                        @php
                        $activityimages = $activity->activity_images;
                        $act_image = count($activityimages)>0 ? asset('storage/app/activity/'.$activityimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                        $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                            $package_activity_cost= CommonHelper::getPackageActivityCost($package->packageautoid,$activity->id);
                            $activity_images  = CommonHelper::getActivityImages($activity->id);
                        @endphp
                        <p ><b>  Activity Name : </b> {{ $activity->title_name ? $activity->title_name : '' }}  </p>  <br>
                              <p > 
                                      @php
                                        if(count($activity_images) > 0)
                                        {
                                          @endphp
                                            @foreach($activity_images as $valu)
                                          <img style="width:200px;height:200px;border-width:5px;border-style:solid;border-color:#8ebfed " src="{{ asset('storage/app/activity/'.$valu->image_name) }}">
                                            @endforeach
                                          @php
                                        }
                                        else{
                                          @endphp
                                          <img style="width:200px;height:200px;border-width:5px;border-style:solid;border-color:#8ebfed "  src="{{ asset('public/assets/images/no_image.jpg') }}">
                                          @php
                                        }
                                      @endphp
                               </p>
                              <p style="margin-left:90px;"><b> Duration </b> : {{ $activityduration ? $activityduration : '' }} </p>
                              <p style="margin-left:90px;"><b> Overview </b> : </p>
                              <p style="margin-left:90px;">{!! $activity->overview !!}</p>
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
                              <p ><b> Inclusions </b> : </p>
                              @foreach($someArray as $values)
                                <p class="inner-bullets"> *  {{$values ? $values : ''}} </p>
                              @endforeach

                              <p ><b> Exclusions </b> : </p>
                              @foreach($excsomeArray as $values)
                                <p class="inner-bullets"> *  {{$values ? $values : ''}} </p>
                              @endforeach
                              <p><b> Additional Info </b> : {!! $activity->additional_info !!} </p>
                              <p ><b> Amount </b> : {{$package_activity_cost ? $package_activity_cost : ''}} </p>

                        @endforeach   
                @endif 
                @php $slno++; @endphp  

		@endforeach
        <p style="color:#4A7885"><b> Price Summary </b> : </p>
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
							  <td style="color:#4A7885"> Adult Per price </td>
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
			<h2 style="color:#4A7885"><b>  Contact Info</b> </h2>
				<p ><b> Company Name </b> : {{$company_data->company_name ? $company_data->company_name : '' }}  </p>
				<p ><b> Company Website </b> : {{$company_data->company_website ? $company_data->company_website : '' }} </p>
				<p ><b> Company Email </b> : {{$company_data->company_email ? $company_data->company_email : '' }} </p>
				<p ><b> Company Phone </b> : {{$company_data->company_phone ? $company_data->company_phone : '' }} </p>
				  @php $company_country_name = CommonHelper::getCountryName($company_data->country_id);
					  $company_state_name = CommonHelper::getstateName($company_data->state_id);
					  $company_city_name = CommonHelper::getcityName($company_data->city_id);
				  @endphp
			 <p ><b> Company Address </b> : {{$company_data->company_address_one ? $company_data->company_address_one : '' }} , {{$company_data->company_address_two ? $company_data->company_address_two : '' }} , {{ $company_country_name }} , {{ $company_state_name }} , {{ $company_city_name }} {{ $company_data->zipcode }}  </p>
	</div>
</body>
</html>