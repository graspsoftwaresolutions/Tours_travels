<!DOCTYPE html>
<html lang="en">
   <head>
      <style>
         body{
         margin:0px;
         padding:0px;
         }
         @page {
    margin:0px;
    padding:0px;    
   }
   label{
      font-size:10px !important;
      font-weight:550;
   }
   p{
     text-align:justify;
   }
   #sub_deposit tr td{
    border:1px solid grey;
  
   }
      </style>
      <title>Package</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
<body style="margin:0px !important;padding:10px !important;">
   <div class="container">
   <div class="row">
   @php $company_data = $website_data[0]; 
   		$package = $package_data[0];
        $package_place_data = $package_place;
        $package_hotel_data = $package_hotel;
   @endphp
   <div class="col-md-12">
      <div class="row">
      <div class="col-md-12">
      <div class="row">&nbsp;</div>
	  <div style="width:80%;margin:0 auto;">
		<a style="width:10%;float:left;padding:10px !important;" href="index.html"><img src="{{ asset('public/assets/images/website_logo/'.$company_data->company_logo) }}" style="width:70px;height:70px;xmargin-top:20px;"></a>
		<h1 style="text-align:center;width:90%;float:left;color:#4A7885">{{$company_data->company_name ? $company_data->company_name : ''}}</h1>
		<h2 style="text-align:center;"><b> {{$package->package_name ? $package->package_name : ''}}</b> </h2>	
		</div>
		<table  style="width:90%;border:2px solid #4A7885 !important;margin-left:90px">
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
        <div style="width:80%;margin:0 auto;">
        <h2 style="text-align:left;"><b> Package Information</b> </h2>	
        </div>
        <table  style="width:90%;border:2px solid #4A7885 !important;margin-left:90px">
                <tr>   
                <td>
				<p >Persons :  {{$package->adult_count ? $package->adult_count : 0 }} persons , {{$package->child_count ? $package->child_count : 0 }}  childerns and {{$package->infant_count ? $package->infant_count : 0 }} Infants </p>	
                </td> </tr> 
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
                <td >
                <p > {{ $night_count }} nights and {{ $night_count+1 }} days </p>			
			 </td>	  </tr>
       <tr>
       <td >
                <p > Package Type :  {{ $package_type ? $package_type : ''}} </p>			
			 </td>	
            </tr>
		</table>
        <div style="width:80%;margin:0 auto;">
            <h2 style="text-align:left;"><b> Trip Summary</b> </h2>	
        </div>
        @foreach($package_place_data as $place)      
            @php 
                $place_state_name = CommonHelper::getstateName($place->state_id);
                $place_city_data = CommonHelper::getcityDetails($place->city_id);
                $place_city_name = $place_city_data->city_name;
                $place_city_image = $place_city_data->city_image;
               
                $nightcount = $place->nights_count ;
                if($nightcount > 1)
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
            <p style="margin-left:90px"></p>
        @endforeach
        <div style="width:80%;margin:0 auto;">
            <h2 style="text-align:left;"><b>Summary</b> </h2>	
        </div>
        @foreach($package_hotel_data as $hotel) 
            @php
             $sum_package_hotel = CommonHelper::getPackageHotel($hotel->package_id,$hotel->city_id);
             $hoteloverview = CommonHelper::getHoteloverview($hotel->hotel_id);
           
             ///dd($sum_package_hotel);
             

            //$hoteloverview =  $hotel_overview['overview'];
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
                                            $roomtypesstring = $roomtype->room_type.' - '.$sum_package_hotel->total_rooms;
                                            //dd($roomtypesstring);
                                          } 
                                        }
                                      }
                                      $sum_package_activities = CommonHelper::getPackageActivities($package->packageautoid,$hotel->city_id);
                                     // $hotelimages = $sum_package_hotel->hotelimages;
                                     $hotelimages  = CommonHelper::getHotelImages($hotel->hotel_id); 
                                   
                                    @endphp
                        <p style="margin-left:90px"><b> {{$days_val}} </b> {{ $place_state_name }} - {{ $place_city_name }} </p>
                        <p style="margin-left:90px"> <b> Hotel Name : </b> {{ $sum_package_hotel->hotel_name ? $sum_package_hotel->hotel_name : '' }} </p>
                        <p style="margin-left:90px">  </p>
                        <p style="margin-left:90px;padding-top:20px;"> 
                                      @php
                                        if(count($hotelimages) > 0)
                                        {
                                          @endphp
                                            @foreach($hotelimages as $val)
                                          <img style="width:200px;height:200px" src="{{ asset('storage/app/hotels/'.$val->image_name) }}">
                                            @endforeach
                                          @php
                                        }
                                        else{
                                          @endphp
                                          <img style="width:200px;height:200px" src="{{ asset('public/assets/images/no_image.jpg') }}">
                                          @php
                                        }
                                      @endphp
                                      
                        </p>
                        <p style="margin-left:90px"><b> Aminites </b> : {{ $amenitystring  ? $amenitystring : ''}}</p>
                       
                        <p style="margin-left:90px"> <b> Overview : </b> </p>
                        <p style="margin-left:90px"> {!! $sum_package_hotel->overview !!} </p>
                        <p> </p>
                        
                        <p style="margin-left:90px"> Room Type : {{$roomtypesstring ? $roomtypesstring : ''}} </p>
                        <p style="margin-left:90px"> No of Rooms : {{ $sum_package_hotel->total_rooms ? $sum_package_hotel->total_rooms : '' }} </p>
                        <p style="margin-left:90px"> Total Amount : {{ $sum_package_hotel->total_amount ? $sum_package_hotel->total_amount : '' }} </p>
                        @endforeach
                           
                        <div style="width:80%;margin:0 auto;">
                            <h2 style="text-align:left;"><b> Activities</b> </h2>	
                        </div>
                        @foreach($sum_package_activities as $activity)
                                  @php
                                  
                                        $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                                     $package_activity_cost= CommonHelper::getPackageActivityCost($package->packageautoid,$activity->id);
                                     $package_additionalinfo = CommonHelper::getPackageInfo($package->packageautoid);
                                     $activity_images  = CommonHelper::getActivityImages($activity->id);
                                     
                                    
                                  @endphp
                              <p style="margin-left:90px;text-decoration: underline;"><b> {{ $activity->title_name ? $activity->title_name : '' }}  </b> </p>
                              <p style="margin-left:90px;padding-top:20px;"> 
                                      @php
                                        if(count($activity_images) > 0)
                                        {
                                          @endphp
                                            @foreach($activity_images as $valu)
                                          <img style="width:200px;height:200px" src="{{ asset('storage/app/activity/'.$valu->image_name) }}">
                                            @endforeach
                                          @php
                                        }
                                        else{
                                          @endphp
                                          <img style="width:200px;height:200px" src="{{ asset('public/assets/images/no_image.jpg') }}">
                                          @php
                                        }
                                      @endphp
                               </p>
                              <p style="margin-left:90px;"> Duration: {{ $activityduration ? $activityduration : '' }} </p>
                              <p style="margin-left:90px;"><b> Overview </b> : </p>
                              <p style="margin-left:90px;">{!! $activity->overview !!}</p>  <!-- <textarea> </textarea> -->

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
                              <p style="margin-left:90px;"><b> Inclusions </b> : </p>
                              @foreach($someArray as $values)
                                <p style="margin-left:150px;"> *  {{$values ? $values : ''}} </p>
                              @endforeach

                              <p style="margin-left:90px;"><b> Exclusions </b> : </p>
                              @foreach($excsomeArray as $values)
                                <p style="margin-left:150px;"> *  {{$values ? $values : ''}} </p>
                              @endforeach
                              <p style="margin-left:90px;"><b> Additional Info </b> : {!! $activity->additional_info !!} </p>
                              <p style="margin-left:90px;"><b> Amount </b> : {{$package_activity_cost ? $package_activity_cost : ''}} </p>
                        @endforeach
                        <p style="margin-left:90px;"><b> Price Summary </b> : </p>
                        <table  style="width:90%;border:2px solid #4A7885 !important;margin-left:90px">
                        <thead>
                          <tr> 
                          
                          <td >
                          <p >Accommodation : {{$package->total_accommodation ? $package->total_accommodation : ''}}</p>
                          <p >Activities : {{$package->total_activities ? $package->total_activities : ''}}</p>
                          <p >Transport Charges : {{$package->transport_charges ? $package->transport_charges : ''}}</p> 
                          <p >Additional Charges : {{$package->additional_charges ? $package->additional_charges : ''}}</p> 
                          <p >Total package value : {{$package->total_package_value ? $package->total_package_value : ''}}</p> 
                          <p >GST : {{$package->tax_percentage ? $package->tax_percentage : ''}}</p> 
                          <p >Tax Amount : {{$package->tax_amount ? $package->tax_amount : ''}}</p> 
                          <p >Total Amount : {{$package->total_amount ? $package->total_amount : ''}}</p> </td>
                        </tr>            
              </table>
                        <p style="margin-left:90px;"><b> Additional price </b> </p>
                        <p style="margin-left:90px;"> [Including transport and additional Charges] </p>             
                        <table  style="width:90%;border:2px solid #4A7885 !important;margin-left:90px">
                        <thead>
                          <tr> 
                          <td >  Adult Per price : {{$package->adult_price_person ? $package->adult_price_person : ''}} </td>
                        </tr>  
                        <tr> 
                          <td >Child per price : {{$package->child_price_person ? $package->child_price_person : ''}} </td>
                        </tr>  
                        <tr> 
                          <td >Infant per price : {{$package->infant_price ? $package->infant_price : ''}} </td>
                        </tr>         
              </table>

              <div style="width:80%;margin:0 auto;">
                            <h2 style="text-align:left;"><b>  Contact Info</b> </h2>	
                        </div>
                        
                        <p style="margin-left:90px;"><b> Company Name </b> : {{$company_data->company_name ? $company_data->company_name : '' }}  </p>
                        <p style="margin-left:90px;"><b> Company Website </b> : {{$company_data->company_website ? $company_data->company_website : '' }} </p>
                        <p style="margin-left:90px;"><b> Company Email </b> : {{$company_data->company_email ? $company_data->company_email : '' }} </p>
                        <p style="margin-left:90px;"><b> Company Phone </b> : {{$company_data->company_phone ? $company_data->company_phone : '' }} </p>
                          @php $company_country_name = CommonHelper::getCountryName($company_data->country_id);
                              $company_state_name = CommonHelper::getstateName($company_data->state_id);
                              $company_city_name = CommonHelper::getcityName($company_data->city_id);
                          @endphp
                          <p style="margin-left:90px;"><b> Company Address </b> : {{$company_data->company_address_one ? $company_data->company_address_one : '' }} , {{$company_data->company_address_two ? $company_data->company_address_two : '' }} , {{ $company_country_name }} , {{ $company_state_name }} , {{ $company_city_name }} {{ $company_data->zipcode }}  </p>

    </div>
    </div>
 </div>
  </div> </div>

</body>
		</html>