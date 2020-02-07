<html>
<head>
<title>Tours and Travels</title>
<style>
	#table1 {
		border-collapse: collapse;
	}
	.page{
		padding:25px;
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
<body style="">
<div class="page">
<table id="table1" style="width:100%;" border="0">
	<tr>
		<td colspan="2" style="font-size: 30px;color: #2b80a2;font-weight:bold;"> {{Ucfirst($website_dat->company_name)}} </td>
		<td colspan="2" style="text-align:right;font-weight:bold;"> Web: {{ $website_dat->company_website ? $website_dat->company_website : '' }} </td>
	</tr>
	<tr>
		<td colspan="2" style="letter-spacing: 2px;font-size: 11px;padding-left: 30px;font-weight:bold;"></td>
		<td colspan="2" style="text-align:right;font-weight:bold;">E-mail:{{ $website_dat->company_email ? $website_dat->company_email : '' }}</td>
	</tr>
	<tr>
		<td colspan="4">
			<hr>
		</td>
	</tr>
	<tr>
		<td colspan="4" style="text-align:right;font-size: 27px;color: #2b80a2;padding-bottom: 30px; padding-top: 20px;font-weight:bold;">
	 
        @if($row->payment_type ==1 )
             INVOICE 
            @else
             PRO-FORMA INVOICE 
        @endif
        </td>
	</tr>
	<tr>
		<td  colspan="2" style="padding-bottom: 30px;">
			<table  style="width: 100%;  border-collapse:collapse;border: 1px solid black;">
			
				<tr>
					<th style="text-align:center;background: #01518f;font-weight:bold;color:#fff">TO</th>
				</tr>
				<tr>
					<td style="">
                    <br> 
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$customer_data->address_one ? Ucfirst($customer_data->address_one) : ''}}, {{$customer_data->address_two ? Ucfirst($customer_data->address_two) : ''}}
					<br>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{$customer_country_name}},{{$customer_state_name}}, <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$customer_city_name}} - {{$customer_data->zipcode ? $customer_data->zipcode : ''}}   <br>&nbsp;&nbsp;&nbsp;&nbsp; {{$customer_data->phone}} , <br>&nbsp;&nbsp;&nbsp;&nbsp; {{$customer_data->email}}  <br> &nbsp;&nbsp;&nbsp;&nbsp;</td>
                   
                </tr>
			</table>
		</td>
		<!-- <td  colspan="2" style="padding-bottom: 30px;">
			<table  style="width: 80%;  border-collapse:collapse;border: 1px solid black;">
				<tr>
					<td style="text-align:center;background: #01518f;font-weight:bold;color:#fff;">date</td>
				</tr>
				<tr>
					<td style="">
                    <br> <br><br>{{$from_date}} to {{$to_date}} <br><br><br>
					</td>
                   
                </tr>
			</table>
		</td> -->
		<td align="right"  style="padding-bottom: 30px;vertical-align:top;">
			<table  style="width: 100%;border-collapse:collapse;border: 1px solid black;">
				<tr>
					<td colspan="1" style="text-align:center;background:#01518f;font-weight:bold;color:#fff">DATE</td>
				</tr>
				<tr>
					<td style="text-align:center;font-weight:bold;"><br><br>{{$from_date}} to {{$to_date}}<br><br><br></td>
				</tr>
			</table>
		</td>
		<td align="right" style="padding-bottom: 30px;vertical-align:top;">
			<table  style="width: 100%; border-collapse:collapse;border: 1px solid black;">
				<tr>
					<td colspan="1" style="text-align:center;background:#01518f;font-weight:bold;color:#fff">INVOICE</td>
				</tr>
				<tr>
					<td style="text-align:center;font-weight:bold;"><br><br>#{{$row->booking_number}}<br><br><br></td>
				</tr>
			</table>
		</td>
		<!-- <td  style="padding-bottom: 30px;">
			<table  style="width: 100%; border-collapse:collapse;border: 1px solid black;">
				<tr>
					<td colspan="1" style="text-align:center;background:#01518f;font-weight:bold;color:#fff">INVOICE</td>
				</tr>
				<tr>
					<td style="text-align:center;font-weight:bold;"><br><br>#{{$row->booking_number}}<br><br><br></td>
				</tr>
			</table>
		</td> -->
	</tr>
	
	<tr>
		<td colspan="1" style="font-weight:bold;color: #2b80a2;    font-size: 30px;">Places
		<hr style="margin: 8px 0px;">
		</td>
		<td></td>
		<td></td>
		<td colspan="1" style="text-align:left;font-weight:bold;color: #2b80a2;    font-size: 30px;padding-right: 54px;">Details
		<hr style="margin: 8px 0px;">
		</td>
		
	</tr>
	
	<tr>
	
		<td colspan="2" style="padding-left: 22px;">
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
		<td colspan="2" style="text-align:right;    padding-right: 17px;">Package : &nbsp; {{Ucfirst($packagename)}} 
		<p style="padding-right: 28px;">Persons :  &nbsp; {{$booking_adult_child_infant}} </p></td>
	</tr>
	<tr>
		<td colspan="2" style="padding-bottom: 25px;"></td>
		
		<!-- <td colspan="2" style="text-align:right;padding-bottom: 25px;">Persons :  &nbsp;   &nbsp;{{$booking_adult_child_infant}}</td> -->
	</tr>

	<tr style="background:#01518f;color:#fff">
	
		<td colspan="2" style="font-weight:bold;border: 1px solid #000;    padding-left: 20px;">DESCRIPTION</td>
		<td colspan="2" style="text-align:right;font-weight:bold;border: 1px solid #000;">AMOUNT</td>
	</tr>
	<tr>
		<td colspan="2" style="border: 1px solid #000;padding-top: 15px; padding-bottom: 20px; padding-left: 20px;">
			Package  with tax({{$row->tax_percentage}}%) <br>
			Discount <br>
		</td>
		<td colspan="2" style="text-align:right;  border-collapse:collapse;border: 1px solid black;">
		{{$row->total_amount}} <br>
		{{$row->discount_amount}} <br>
		
		</td>
	</tr>
	<tr>
		<td colspan="1" style="text-align:center; border: 1px solid #000;">Thank you for your Booking!</td>
		<td colspan="1" style="font-weight:bold; border: 1px solid #000;">TOTAL</td>
		<td colspan="2" style="text-align:right; border: 1px solid #000;padding-bottom: 15px;">{{$row->grand_total}}</td>
	</tr>
	<tr><td colspan="4">&nbsp;</td></tr>
	<tr >

		
		<td></td>
	</tr>
	
	<tr>
		<td colspan="1" style="padding: 5px;">Payment Mode &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  &nbsp; &nbsp; &nbsp;{{Ucfirst($row->payment_mode)}}</td>
		<td colspan="3"></td>

	</tr>
	@if($row->payment_mode == 'online_payment')
	<tr>
		<td colspan="1" style="padding: 5px;">Code &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = &nbsp; &nbsp; &nbsp; {{$row->reference_number ? $row->reference_number : ''}}</td>
		<td colspan="3"></td>
	</tr>
	@endif
	<tr>
		<td colspan="1"></td>
		<td colspan="1"></td>
		<td colspan="2" style="text-align:center;"> 	<br></td>

	</tr>

	<tr style="background:#01518f;">
		<td colspan="4" style="text-align:center;color:#fff;">Thank You !</td>
	</tr>
	
</table>
<br>
</div>
</body>



</html>