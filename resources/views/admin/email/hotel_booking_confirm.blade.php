@php
$website_data = CommonHelper::getWebsiteDetails();
$hotel_info = CommonHelper::getBookingHotelDetails($bookingid,$cityid,$hotel_id);
$booking_info = CommonHelper::getBookinginfo($bookingid,$cityid,$hotel_id);
$nightcount = CommonHelper::getBookingPlaceNights($bookingid,$cityid);
$booking_places = CommonHelper::getBookingPlaceDetails($bookingid);
//dd($booking_info);
$sum_package_hotel_types = CommonHelper::getConfirmedHotelTypes($bookingid,$cityid,$hotel_id);
//dd($sum_package_hotel_types);
$order_no = 1; 
$days = 0;
foreach($booking_places as $place){
	if($place->city_id==$cityid){
		break;
	}	
	$order_no++;
	$days += $place->nights_count;
}
//echo $days+$nightcount;
$book_fromdate = date('Y-m-d',strtotime("+".($days)." day", strtotime($booking_info->from_date)));
$book_todate = date('Y-m-d',strtotime("+".($days+$nightcount-1)." day", strtotime($booking_info->from_date)));
//echo $order_no;
 $logo = CommonHelper::getlogo();  
$myvalue = $website_data->company_name;
  $arr = explode(' ',trim($myvalue));
  $variable = $website_data->company_name;
  $str = explode(' ', $variable);
  $str = array_slice($str, 1);
  $str = implode(' ', $str);
@endphp


<html>
	<head>
		<title>Hotel Confirmation</title>
	</head>
	<style>
		.container {
		position: relative;
		}
		
		.top-left {
		position: absolute;
		top: 0px;
		}
		
		.top {
		position:absolute;
		}
		
		.one-edge-shadow {
		 box-shadow: 0px 8px 3px -5px black;
		}
		
		.bottom-right {
		position: absolute;
		bottom: 10px;
		right: 30px;
		}
		
		.button {
		display: inline-block;
		padding: 5px 18px;
		font-size: 20px;
		cursor: pointer;
		text-align: center;
		text-decoration: none;
		outline: none;
		color: #fff;
		background-color: #f7941d;
		border: none;
		border-radius: 8px;
		box-shadow: 0 3px #999;
		font-weight:bold;
		padding-right: 20px;
		}
		.button:active {
	    background-color: #f7941d;
	    box-shadow: 0 3px #666;
	    transform: translateY(4px);
	    }	
	</style>	
	<body>
		<div style="width:600px;margin: 0 auto; border:1px solid #fff;">
			<div class="container">
				<div>
                <img src="{{ env('LIVE_URL') ."public/assets/images/hotel_confirm.png"}}" alt="image" style="width:100%;height:800px;">
					<table class="top-left" width="100%">
						<tr>
							<td colspan="1" style="width: 10%;    padding-left: 22px;"><img src="{{ $message->embed(storage_path() . '/app/website/'.$website_data->company_logo) }}" alt="logo" width="70" height="50"></td>
							<td colspan="1" style="width:23%;"><span style="color: #f7941d;font-size: 44px;font-weight: bold;">{{$arr[0]}}</span> 
								<br>
								<span style="background: #f7941d; color: #fff;font-weight: bold; font-size: 11px;">{{$str}}</span>
							</td>
							<td style="font-size:12px;font-weight:bold;float: right;padding-top: 30px;    padding-right: 25px;"> 
								<span style="color:#f7941d;">Web:</span> {{$website_data->company_website}}
								<br>
								<span style="color:#f7941d;">E-mail:</span>{{$website_data->company_email}}
							</td>
						</tr>
						<tr>
							<td colspan="3"><hr style="width: 93%; border:1px solid #f7941d;"></td>
						</tr>
					</table>
					<table style="position: absolute;top: 78px;" width="100%">
						<tr>
							<td style="width:10%"><img src="{{ $message->embed(public_path() . '/assets/images/pin3.png') }}" style="float: right;    padding-right: 10px;padding-top: 6px;"></td>
							<td class="one-edge-shadow"style="text-align: center;font-size: 28px;color: #fff; background: #f7941d;font-weight: bold;width:20%">
								Hotel Confirmation
							</td>
							<td style="width:10%"><img src="{{ $message->embed(public_path() . '/assets/images/right.png') }}" style="position: absolute;top: 6px;right: 140px;"></td>
						</tr>
						<tr>
							<td colspan="2" style="    padding: 15px 25px; font-size: 13px;">
							Dear {{ $hotel_info->contact_name }},<br><br>
							We have received a reservation for your hotel.<br><br>
							Please refer the reservation details.</td>
							<td></td>
						</tr>
					</table>
					<table style="position: absolute;top: 220px;" width="100%">
						<tr>
							<td colspan="2" style="padding: 0 23px;background:#f7941d;color:#fff;font-size:24px;font-weight:bold;text-align:left;">Room Details</td>
							<td colspan="1"></td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 5px 25px; font-size: 13px;" >
							Hotel Name &nbsp;&nbsp;&nbsp; :  {{$hotel_info->hotel_name}}</td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 5px 25px; font-size: 13px;" >
							No of Nights &nbsp;&nbsp;&nbsp;:  {{ $nightcount }} </td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 5px 25px; font-size: 13px;"  >
							From Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : {{ date('d/M/Y',strtotime($book_fromdate)) }} </td>
							<td></td>
						</tr>
						<tr>
							<td colspan="2" style="padding: 5px 25px; font-size: 13px;" >
							To Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;:  {{ date('d/M/Y',strtotime($book_todate)) }} </td>
							<td></td>
						</tr>
						@foreach($sum_package_hotel_types as $tkey => $types)
						<tr>
							<td colspan="2" style="text-align:left;color:#f7941d;font-size:20px;font-weight:bold;width:38%">
								<p style="margin: 0;padding-left: 25px;"> {{ Ucfirst($types->room_type) }} </p>
								<hr style="border:1px solid #f7941d;">
							</td>
							<td colspan="1">&nbsp;</td>
						</tr>
						<tr>
							<td colspan="1" style="padding: 0px 20px; font-size: 13px;" >
								Rooms Availability  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:  </td>
							<td colspan="1">{{ $types->total_rooms }}</td>
							
						</tr>
                        <td colspan="1" style="padding: 0px 20px; font-size: 13px;" >
								Cost  &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:  </td>
                                @if($types->updated_total!=0)
                                    <td colspan="1">{{ $types->updated_total }}</td>
                                @else
                                    <td colspan="1">{{ $types->total_amount }}</td>
                                @endif
						</tr>
						@endforeach
                        <br>
						<tr>
							<td style="font-size:13px;padding: 10px 25px;">Thank You</td>
						</tr>
						@if(!empty($website_data))
						<tr>
							<td style="font-size:13px;padding: 2px 25px;"> &nbsp; {{ $website_data->company_name }} <br> {{ $website_data->company_address_one }}</td>
						</tr>
						<tr>
							<td style="font-size:13px; padding: 2px 25px;">{{ $website_data->company_address_two }}</td>
						</tr>
						<tr>
							<td style="font-size:13px;padding: 2px 25px;">{{ CommonHelper::getcityName($website_data->city_id) }} - {{$website_data->zipcode}}.</td>
						</tr>
						@endif
					</table>
					@php
						$enc_hotelid = Crypt::encrypt($hotel_id);
						$enc_email = Crypt::encrypt($hotel_info->contact_email);
						$enc_booking_id = Crypt::encrypt($bookingid);
						$linkConfirmation = route('view_hotel_Confirmation',[$enc_hotelid,$enc_email,$enc_booking_id]);
					@endphp
					
				</div>
			</div>
		</div>
	</body>
</html>