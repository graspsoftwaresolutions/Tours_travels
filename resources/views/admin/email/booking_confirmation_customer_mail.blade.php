<html>
	<head>
		<title>Email</title>
	</head>
	<div style="width:900px;margin: 0 auto;border: 1px solid #c3bbbb;">
		<table width="100%;" style="text-align:center;font-weight:bold;font-size:23px;background:#faa61a;color:#fff;">
			<tr>
				<td >Booking Information</td>
			</tr>
		</table>
		<div style="background:#e6e4e1">
			<br>
            @php $booking_details = CommonHelper::getBookingDetails($bookingid); 
                  $package_name = CommonHelper::getfirstPackageName($booking_details->package_id);
                  $from_date = CommonHelper::convert_date_frontend($booking_details->from_date);
                  $to_date = CommonHelper::convert_date_frontend($booking_details->to_date);
            @endphp
			<p >Dear {{$customer_data->name}},</p>
			<p style="margin-left:20px">Package Name: {{$package_name ? $package_name : ''}} </p>
            <p style="margin-left:20px">From Date : {{ $from_date  ?  $from_date  : ''}} </p>
            <p style="margin-left:20px">To Date : {{ $to_date  ?  $to_date  : ''}} </p>
            <p style="margin-left:20px">Total Cost: {{$booking_details->grand_total ? $booking_details->grand_total : ''}} </p>
            <p style="margin-left:20px">Here with we have attached the booking details PDF for your kind references. </p>
		</div>
	</div>
</html>