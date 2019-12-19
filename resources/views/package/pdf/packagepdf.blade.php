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
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
<body style="margin:0px !important;padding:10px !important;">
   <div class="container">
   <div class="row">
   @php $company_data = $website_data[0]; 
   		$package = $package_data[0];
        $package_place_data = $package_place[0];
   @endphp
   <div class="col-md-12">
      <div class="row">
      <div class="col-md-12">
      <div class="row">&nbsp;</div>
	  <div style="width:80%;margin:0 auto;">
		<a style="width:10%;float:left;padding:10px !important;" href="index.html"><img src="{{ asset('public/assets/images/website_logo/'.$company_data->company_logo) }}" style="width:70px;height:70px;xmargin-top:20px;"></a>
		<h1 style="text-align:center;width:90%;float:left;color:#4A7885">{{$company_data->company_name}}</h1>
		<h2 style="text-align:center;"><b> {{$package->package_name}}</b> </h2>	
		</div>
		<table  style="width:90%;border:2px solid #4A7885 !important;margin-left:90px">
                <thead>
				<tr style="border-top:2px solid #4A7885;">
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
                <td >
				<p >Persons :  {{$package->adult_count ? $package->adult_count : 0 }} persons , {{$package->child_count ? $package->child_count : 0 }}  childerns and {{$package->infant_count ? $package->infant_count : 0 }} Infants </p>	
                </td> </tr> 
                <tr> 
                <td >
                @php $Nights  = $package_place_data->nights_count ; 
                    $Days = $Nights+1; 
                    if($Days > 1)
                    {
                        $plu_days = "Days";
                    }
                    else{
                        $sing_days = 'Day';
                    }
                    if($Nights > 1)
                    {
                        $plu_nights = "Nights";
                    }
                    else{
                        $plu_nights = "Night";
                    }
                  @endphp
                <p >Days and Nights : {{$Days ? $Days : 0}} {{$plu_days}}  and {{$Nights ? $Nights : 0}} {{plu_nights}}</p>			
				</tr>         
		</table>
	 
     
 
    </div>
    </div>
 </div>
  </div> </div>

</body>
		</html>