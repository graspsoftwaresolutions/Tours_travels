@php
// $row = $data['booking_details'][0]; 
$row = $booking_details[0];
$website_dat = CommonHelper::getWebsiteDetails();   
//$data['booking_place_data'] = CommonHelper::getBookingPlaceDetails($row->id);
$booking_place_data = CommonHelper::getBookingPlaceDetails($row->id);
@endphp

<p style="color:#3e2e29;font-size:12px;font-weight:bold;margin-bottom:40px"> {{ $website_dat->company_address_one ? $website_dat->company_address_one : '' }},{{ $website_dat->company_address_two ? $website_dat->company_address_two : '' }}<br>  
    {{ $website_dat->company_website ? $website_dat->company_website : '' }},{{ $website_dat->company_email ? $website_dat->company_email : '' }},{{ $website_dat->company_phone ? $website_dat->company_phone : '' }},
</p>  
@if($row->payment_type ==1 )
    <h4> Invoice Details </h4>
@else
<h4> Pro Forma Invoice Details </h4>
@endif
Customer Details <br>
@php 
$customer_data = CommonHelper::getCustomerData($row->customer_id);
@endphp
{{$customer_data->name}},
{{$customer_data->email}}

@php $customer_country_name = CommonHelper::getCountryName($customer_data->country_id);
    $customer_state_name = CommonHelper::getstateName($customer_data->state_id);
    $customer_city_name = CommonHelper::getcityName($customer_data->city_id);
@endphp

{{$customer_country_name}},{{$customer_state_name}},{{$customer_city_name}}
<br>
Invoice Number : {{$row->booking_number}} <br>

@php
$date_array = explode("-",$row->from_date);           							
        $date_format = $date_array[2]."-".$date_array[1]."-".$date_array[0];
        $from_date = date('d-M-Y', strtotime($date_format)); 

        $date_array1 = explode("-",$row->to_date);           							
        $date_format1 = $date_array1[2]."-".$date_array1[1]."-".$date_array1[0];
        $to_date = date('d-M-Y', strtotime($date_format1)); 
        @endphp 
        From date : {{$from_date}} <br>
    To Date : {{$to_date}} <br>
    Places
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
				{{ $place_state_name }}- {{ $place_city_name }} : [ {{$days_val}} ]
		@endforeach
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
                <br>
Persons : {{$booking_adult_child_infant}}
<br>
Details
<br> @php $packagename = CommonHelper::getPackaName($row->package_id); @endphp
PackageName : {{$packagename}}
<br>
Description : <br>
Package Value with tax({{$row->tax_percentage}}%) : {{$row->grand_total}}<br>
Discount : {{$row->discount_amount}}<br>
Total Amount : {{$row->grand_total}}<br>
payment Mode : {{$row->payment_mode}}<br>
@if($row->payment_mode == 'online_payment')
{
    Reference Number : {{$row->reference_number}}
}
@endif