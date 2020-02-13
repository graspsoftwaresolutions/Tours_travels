
@php 
$Hotel_name = CommonHelper::getHotelName($hotel_id);
$sum_package_hotel_types = CommonHelper::getBookingHotelTypes($bookingid,$cityid,$hotel_id);
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
			<td style="padding-left:15px;">Dear,  <br><br>
			We have received a reservation for your hotel. <br><br>
			Please refer to attached file not to acknowledge the reservation and see the reservation details.</td>
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
	<table id="table1" style="width:50%;text-align:center;">
        Hotel Name : {{$Hotel_name}} <br>
        From Date :  <br>
        To Date :  <br>
        No of Nights :  <br>
			<tr>
				<td colspan="1" style="font-weight:bold;border: 1px solid #000;    padding-left: 20px;">Type</td>
				<td colspan="1" style="font-weight:bold;border: 1px solid #000;">No of Rooms</td>
			</tr>
            @foreach($sum_package_hotel_types as $tkey => $types)
			<tr>
				<td colspan="1" style="border: 1px solid #000;padding-top: 15px; padding-bottom: 20px; padding-left: 20px;">{{ $types->room_type }}</td>
				<td colspan="1" style="border: 1px solid #000;padding-top: 15px; padding-bottom: 20px; padding-left: 20px;">{{ $types->total_rooms }}</td>
			</tr>
            @endforeach
	</table>
	<br>
	
	<button class="button" style="font-weight:bolder;">Confirm</button>
	</center>
	<br>
	<table width="84%">
		<tr>
			<td style="text-align:right;padding-right: 30px;">Thank You</td>
		</tr>
	</table>
	<br>
	<table width="100%;">
		<tr>
			<td colspan="1" style="font-weight:bold;padding-left:15px;width:20%;">Date &nbsp; &nbsp; : </td>
			<td colspan="1" style="width:20%;">Tuesday, 25 May 2020</td>
			<td colspan="1" style="text-align:left;width:15%;">Bizsoft Solution,</td>
		</tr>
		<tr>
			<td colspan="2" ></td>
			<td style="text-align:left;">Soranambika Layout,</td>
		</tr>
		<tr>
			<td colspan="2" ></td>
			<td style="text-align:left;">Gandhipuram,</td>
		</tr>
		<tr>
			<td colspan="2" ></td>
			<td  style="text-align:left;">Coimbatore,</td>
		</tr>
		<tr>
			<td colspan="2" ></td>
			<td style="text-align:left;">641009.</td>
		</tr>
	</table>
	</div>
	</div>
</html>