
@php 

$website_data = CommonHelper::getWebsiteDetails();
$hotel_info = CommonHelper::getBookingHotelDetails($bookingid,$cityid,$hotel_id);
$booking_info = CommonHelper::getBookinginfo($bookingid,$cityid,$hotel_id);
$nightcount = CommonHelper::getBookingPlaceNights($bookingid,$cityid);
$booking_places = CommonHelper::getBookingPlaceDetails($bookingid);
//dd($booking_info);
$sum_package_hotel_types = CommonHelper::getBookingHotelTypes($bookingid,$cityid,$hotel_id);
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
@endphp
                                      
<html>
	<head>
		<title>Hotel Confirmation</title>
		<style>
			#table1 {
				border-collapse:collapse;
			}				
			.button {
			  padding: 15px 25px;
			  text-align: center;
			  cursor: pointer;
			  outline: none;
			  color: #fff;
			  background-color: #bfb29f;
			  border: none;
			  border-radius: 15px;
			  box-shadow: 0 4px #999;
			}
			.button:active {
			  box-shadow: 0 5px #666;
			  transform: translateY(4px);
			}
			.roominfo td{
				padding: 10px;
			}
		</style>
			
	</head>
	<div style="width:900px;margin: 0 auto;border: 1px solid #c3bbbb;">
	<table width="100%;" style="text-align:center;font-weight:bold;font-size:20px;background:#faa61a">
		<tr>
			<td style="padding-top: 30px;padding-right: 20px; color: #fff;font-size: 30px;font-weight: bolder;   padding-bottom: 30px;">Hotel Confirmation</td>
		</tr>
	</table>
	<div style="background:#e6e4e1">
	<br>
	<table>
		<tr >
			<td style="padding-left:15px;">Dear {{ $hotel_info->contact_name }},  <br><br>
			We have received a reservation for your hotel. <br><br>
			Please refer the reservation details.</td>
		</tr>
	</table>
	<hr>
	<table width="100%">
		<tr>
			<td style="text-align:center;font-weight:bold;font-size:25px;">Rooms Details</td>
		</tr>
	</table>
	<br>
	<center>
	<div width="100%">
		<table class="roominfo" width="90%" style="margin: 0px 100px;">
			<tr>
				<td width="15%">Hotel Name</td>
				<td width="35%">: {{$hotel_info->hotel_name}}</td>
				<td width="15%">From Date</td>
				<td width="35%">: {{ date('d/M/Y',strtotime($book_fromdate)) }}</td>
			</tr>
			<tr>
				<td width="15%">No of Nights</td>
				<td width="35%">: {{ $nightcount }}</td>
				<td width="15%">To Date</td>
				<td width="35%">: {{ date('d/M/Y',strtotime($book_todate)) }}</td>
			</tr>
		</table>
		  <br>
          <br>
        
	</div>
	<table id="table1" style="width:50%;text-align:center;">
      
			<tr>
				<td colspan="1" style="font-weight:bold;border: 1px solid #000; padding: 10px 10px 10px 20px;">Type</td>
				<td colspan="1" style="font-weight:bold;border: 1px solid #000;padding: 10px 10px 10px 20px;">No of Rooms</td>
			</tr>
            @foreach($sum_package_hotel_types as $tkey => $types)
			<tr>
				<td colspan="1" style="border: 1px solid #000;padding-top: 10px; padding-bottom: 10px; padding-left: 20px;">{{ $types->room_type }}</td>
				<td colspan="1" style="border: 1px solid #000;padding-top: 10px; padding-bottom: 10px; padding-left: 20px;">{{ $types->total_rooms }}</td>
			</tr>
            @endforeach
	</table>
	<br>
	@php
		$enc_hotelid = Crypt::encrypt($hotel_id);
        $enc_email = Crypt::encrypt($hotel_info->contact_email);
        $enc_booking_id = Crypt::encrypt($bookingid);
        $linkConfirmation = route('view_hotel_Confirmation',[$enc_hotelid,$enc_email,$enc_booking_id]);
	@endphp
	<a target="_blank" href="{{$linkConfirmation}}" style="background-color: #ff6c37;font-weight:bolder;padding: 3px 30px;
    border: 1px solid #ff6c37;font-size: 16px;line-height: 22px!important;color: #ffffff!important;text-decoration: none;border-radius: 35px;">Confirm</a>
	</center>
	<br>
	<table width="100%">
		<tr>
			<td style="text-align:left;padding-left: 20px;">
				Thank You, <br>
							 <br>
				@if(!empty($website_data))
				{{ $website_data->company_name }},<br>
				{{ $website_data->company_address_one }},<br>
				{{ $website_data->company_address_two }},<br>
				{{ CommonHelper::getcityName($website_data->city_id) }} - {{$website_data->zipcode}}.
				@endif
			</td>
		</tr>
	</table>
	<br>
	
	</div>
	</div>
</html>