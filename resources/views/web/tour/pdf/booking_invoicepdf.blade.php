<html>
	<head>
	<title>Tours and Travels</title>
	<style>
	#table1 {
		border-collapse:collapse;
	}
	
	</style>
	</head>
	@php 
	//$row = $data['booking_details'][0]; 
	$row = $booking_details[0];
	$website_dat = CommonHelper::getWebsiteDetails();   
	//$data['booking_place_data'] = CommonHelper::getBookingPlaceDetails($row->id);
	$booking_place_data = CommonHelper::getBookingPlaceDetails($row->id);
	$customer_data = CommonHelper::getCustomerData($row->customer_id);
	$customer_country_name = CommonHelper::getCountryName($customer_data->country_id);
	$customer_state_name = CommonHelper::getstateName($customer_data->state_id);
	$customer_city_name = CommonHelper::getcityName($customer_data->city_id);
	$date_array = explode("-",$row->from_date);           							
	$date_format = $date_array[2]."-".$date_array[1]."-".$date_array[0];
	$from_date = date('d-M-Y', strtotime($date_format)); 

	$date_array1 = explode("-",$row->to_date);           							
	$date_format1 = $date_array1[2]."-".$date_array1[1]."-".$date_array1[0];
	$to_date = date('d-M-Y', strtotime($date_format1)); 
	@endphp
	<body>
		<div class="">
			<table style="width:100%;" border="0">
				<tr >
					<td colspan="1" style="font-size: 15px;color: #2b80a2;font-weight:bold;"> {{Ucfirst($website_dat->company_name)}} </td>
					<td colspan="1" style="text-align:right;font-weight:bold;font-size:13px;"> Web: {{ $website_dat->company_website ? $website_dat->company_website : '' }} </td>
				</tr>
				<tr>
					<td colspan="1"></td>
					<td colspan="1" style="text-align:right;font-weight:bold;font-size:13px;">E-mail:{{ $website_dat->company_email ? $website_dat->company_email : '' }}</td>
				</tr>
				<tr>
					<td colspan="2"> <hr> </td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr>
					<td style="text-align:right;font-size: 22px;color: #2b80a2;padding-bottom: 30px; padding-top: 20px;font-weight:bold;">
						@if($row->payment_type ==1 )
						INVOICE 
						@else
						PRO-FORMA INVOICE 
						@endif
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr>
					<td colspan="1" style="padding-bottom: 30px;vertical-align: top;">
						<table style="width: 90%;  border-collapse:collapse;border: 1px solid black;">
							<tr >
								<td style="text-align:center;background: #01518f;font-weight:bold;color:#fff">TO</td>
							</tr>
							<tr>
								<td style="padding-left:13px;">
								<br> 
								{{$customer_data->address_one ? Ucfirst($customer_data->address_one) : ''}}, {{$customer_data->address_two ? Ucfirst($customer_data->address_two) : ''}}
								<br>
								{{$customer_country_name}},{{$customer_state_name}}, <br>{{$customer_city_name}} - {{$customer_data->zipcode ? $customer_data->zipcode : ''}}   <br> {{$customer_data->phone}} , <br> {{$customer_data->email}}  <br> <br></td>
							</tr>
						</table>
					</td>
					<td align="right"  style="padding-bottom: 30px;vertical-align:top;">
						<table style="width: 90%;border-collapse:collapse;border: 1px solid black;">
							<tr>
								<td colspan="1" style="text-align:center;background:#01518f;font-weight:bold;color:#fff">DATE</td>
							</tr>
							<tr>
								<td style="text-align:center;font-weight:bold;"><br><br>{{$from_date}} - <br> {{$to_date}}<br><br><br><br></td>
							</tr>
						</table>
					</td>
					<td align="right" style="padding-bottom: 30px;vertical-align:top;">
						<table style="width: 90%; border-collapse:collapse;border: 1px solid black;">
							<tr>
								<td colspan="1" style="text-align:center;background:#01518f;font-weight:bold;color:#fff">INVOICE</td>
							</tr>
							<tr>
								<td style="text-align:center;font-weight:bold;"><br><br>#{{$row->booking_number}}<br><br><br><br><br></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr>
					<td colspan="1">
						<table >
							<tr>
								<td style="font-weight:bold;color: #2b80a2;    font-size: 28px;">Places
								<hr style="margin: 8px 0px;"></td>
							</tr>
						</table>
					</td>
					<td colspan="1">
						<table style="text-align:left;margin-left: 35px;">
							<tr>
								<td  style="font-weight:bold;color: #2b80a2; font-size: 28px;">Details
								<hr style="margin: 8px 0px;">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table style="width:100%;">
				<tr>
					<td  style="">
						@php
						$total_nights =0 ;
						$startday = 1;
						@endphp
						@foreach($booking_place_data as $place) 
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
						{{ $place_state_name }} : &nbsp;  {{ $place_city_name }} - ({{$days_val}}) <br>
						@endforeach
						@php $packagename = CommonHelper::getPackaName($row->package_id); @endphp
						@php
							$booking_adult_count = $row->adult_count;
							$booking_child_count = $row->child_count;
							$booking_infant_count = $row->infant_count;
						if($booking_adult_count == 0 )
						{
						$booking_adult_count = '';
						}
						elseif($booking_adult_count == 1){
							$booking_adult_count = $booking_adult_count.' '.'Adult';
						}
						else{
							$booking_adult_count = $booking_adult_count.' '.'Adults';
						}
						if($booking_child_count == 0)
						{
						$booking_child_count = '';
						}
						elseif($booking_child_count == 1){
						$booking_child_count = $booking_child_count.' '.'Child';
						}
						else{
						$booking_child_count = $booking_child_count.' '.'Childrens';
						}

						if($booking_infant_count == 0)
						{
						$booking_infant_count = '';
						}
						elseif($booking_infant_count == 1){
						$booking_infant_count = $booking_infant_count.' '.'Infant';
						}
						else{
						$booking_infant_count = $booking_infant_count.' '.'infants';
						}
						if($booking_adult_count !='')
						{
								
						}
						$booking_adult_child_infant = $booking_adult_count.' '.$booking_child_count.' '.$booking_infant_count; @endphp
					</td>
					<td  style="padding-right:10px;">
						<table>
							<tr>
								<td  colspan="1" >Package : &nbsp; {{Ucfirst($packagename)}} </td>
							</tr>
							<tr>
								<td colspan="1">Persons :  &nbsp; {{$booking_adult_child_infant}}</td>
							</tr>
						</table>
					</td>
					
				</tr>
			</table>
			<br>
			<table id="table1" style="width:100%;">
				<tr style="background:#01518f;color:#fff">
					<td colspan="2" style="font-weight:bold;border: 1px solid #000;    padding-left: 20px;">DESCRIPTION</td>
					<td colspan="1" style="text-align:right;font-weight:bold;border: 1px solid #000;">AMOUNT</td>
				</tr>
				<tr>
					<td colspan="2" style="border: 1px solid #000;padding-top: 15px; padding-bottom: 20px; padding-left: 20px;">
						Package  with tax({{$row->tax_percentage}}%) <br>
						Discount <br>
					</td>
					<td colspan="1" style="text-align:right;  border-collapse:collapse;border: 1px solid black;">
						{{$row->total_amount}} <br>
						{{$row->discount_amount}} <br>
					</td>
				</tr>
				<tr>
					<td colspan="1" style="text-align:center; border: 1px solid #000;">Thank you for your Booking!</td>
					<td colspan="1" style="font-weight:bold; border: 1px solid #000;text-align:center;">TOTAL</td>
					<td colspan="1" style="text-align:right; border: 1px solid #000;padding-bottom: 15px;">{{$row->grand_total}}</td>
				</tr>
			</table>
			<br>
			<table>
				<tr>
					<td colspan="1" style="padding: 5px;">Payment Mode &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; :  &nbsp;{{Ucfirst($row->payment_mode)}}</td>
				</tr>
				@if($row->payment_mode == 'online_payment')
				<tr>
					<td colspan="1" style="padding: 5px;">Code &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp; &nbsp; &nbsp; {{$row->reference_number ? $row->reference_number : ''}}</td>
				</tr>
				@endif
			</table>
			<br>
			<table style="width:100%;">
				<tr style="background:#01518f;">
					<td colspan="4" style="text-align:center;color:#fff;">Thank You !</td>
				</tr>
			</table>
		</div>
	</body>
</html>