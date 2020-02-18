@extends('layouts.app')
@include('layouts.head')

@section('content')
<link href="{{ asset('public/web-assets/css/timeline.css') }}" rel="stylesheet" type="text/css">
<style>
#cover-registration {
    background: url({{ asset('public/web-assets/images/cover-registration.jpg') }}) 50% 36%;
    background-size: 145%;
}
.clearfix{
    clear:both;
}
.selectstyle
{
    height: 44px;
    padding-left: 37px;
}
.innerpage-section-padding{
    padding-top: 53px;
    padding-bottom: 47px;
}
.media-img {
    width: 10%;
    height: inherit;
}
</style>
 <div class="page-background lr-page">
      <div class="page-background lr-page">
<!--================ PAGE-COVER =================-->
        <section class="page-cover" id="cover-registration">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h1 class="page-title">Tours and Travels</h1>
                        <ul class="breadcrumb">
                            <li><a href="#">Hotel Confirmation</a></li>
                        </ul>
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->
                <!--===== INNERPAGE-WRAPPER ====-->
        @php
            //$place_state_name = CommonHelper::getstateName($place->state_id);
            $place_city_data = CommonHelper::getcityDetails($data['city_id']);
            $place_city_name = $place_city_data->city_name;
            $place_city_image = $place_city_data->city_image;

            $package_hotel_types = $data['booking_hotel_types'];
            $package_hotel = $data['booking_hotel'];

            $hotelimages = $package_hotel->hotelimages;
            $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");

            $amenity_count = $package_hotel!=null ? count($package_hotel->amenities) : 0;

            $amenitystring = '';
            $a_count = 0;

            if($package_hotel!=null){
              foreach($package_hotel->amenities as $key => $amenity){
                if($a_count<4){
                  $amenitystring .= $amenity->amenities_name;
                  if($amenity_count-1 != $key){
                    $amenitystring .= ', ';
                  } 
                }
                $a_count++;
              }
            }

            $total_hotel_prices = 0;

        @endphp
        <section class="innerpage-wrapper">
            <div id="registration" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="page-title">Requested room details</h1>
                            <br>
                            <div class="col-md-12">
                                <div id="picked_city_hotel_6" class="card media-card-sm">
                                <div id="picked-hotelmedia-6" class="media">
                                    <div class="media-left media-img">
                                        <a href="#">
                                        <img class="responsive-img" src="{{ $hotel_image }}" alt="Hotel Image">
                                        </a>
                                    </div>
                                    <div class="media-body p10">
                                        <h4 class="media-heading">New hotels</h4>
                                        <span class="pull-right" style="font-size: 20px;">
                                       
                                        </span>
                                        <p>{{ $place_city_name }}</p>
                                        <p class="sub-text mt7"> {{ $amenitystring }}</p>
                                        <p class="sub-text mt7">
                                            @foreach($package_hotel_types as $tkey => $types)
                                                 {{ $types->room_type }} - {{ $types->total_rooms }}
                                                 @if($tkey!=count($package_hotel_types)-1)
                                                    ,
                                                 @endif
                                                  @php $total_hotel_prices += $types->total_rooms * $types->total_amount; @endphp
                                            @endforeach
                                            <span class="" style="margin-left: 20px;font-weight:bold;"><i class="fa fa-inr"></i> {{ $total_hotel_prices }} </span> 
                                          
                                        </p>
                                        <input type="text" class="hide" name="second_hotel_3[]" id="second_hotel_3" value="6">
                                        <input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="3">
                                        <input type="text" class="hide hotel_cost" name="hotel_cost_6[]" id="hotel_cost_6" value="{{ $total_hotel_prices }}">
                                        <input type="text" class="hide hotel_number_count" name="hotel_number_count_6[]" id="hotel_number_count_6" value="2">
                                    </div>
                                </div>
                                <br>
                            </div>
                            </div>
                            <br>
                            <br>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <thead class="bold">
                                      <tr>
                                        <th width="40%">Type</th>
                                        <th width="20%">No of rooms</th>
                                        <th>Amount</th>
                                        <th></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($package_hotel_types as $tkey => $types)
                                    <tr>
                                        <td>{{ $types->room_type }}</td>
                                        <td>
                                         <input type="text" class="form-control" name="hotel_roomtypes_3[]" id="hotel_roomtypes_3" value="{{$types->total_rooms}}">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="hotel_roomtypes_3[]" id="hotel_roomtypes_3" value="{{ $types->total_rooms * $types->total_amount }}">
                                        </td>
                                        <td><i class="fa fa-trash fa-lg "></i></td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                  </table>
                            </div><!-- end form-content -->
                            
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->         
            </div><!-- end registration -->
        </section><!-- end innerpage-wrapper -->
       
    </div>
</div>
@include('layouts.footer')

@include('layouts.foot-script')
<script>
$(document).ready(function(e){
    $('#country_id').change(function(){
       var countryID = $(this).val();
      
       if(countryID!='' && countryID!='undefined')
       {
            if(countryID){
                $.ajax({
                type:"GET",
                url:" {{ URL::to('/get-state-list') }}?country_id="+countryID,
                success:function(res){               
                    if(res){
                        $("#state_id").empty();
                        $("#state_id").append("<option value='0' disabled selected='true'>Select State</option>");
                        $.each(res,function(key,entry){
                            $("#state_id").append($('<option>Select State</option>').attr('value', entry.id).text(entry.state_name));
                        });
                    }
                    }
                });
            }
       }
    });

    $('#state_id').change(function(){
       var StateId = $(this).val();
       if(StateId!='' && StateId!='undefined')
       {
         $.ajax({
            type: "GET",
            url : "{{'get-cities-list'}}?State_id="+StateId,
            dataType: "json",
            url : "{{ URL::to('/get-cities-list') }}?State_id="+StateId,
            success:function(res){
                if(res)
                {
                    $('#city_id').empty();
                    $("#city_id").append("<option value='0' disabled selected='true'>Select City</option>");
                    $.each(res,function(key,entry){
                        $('#city_id').append($('<option></option>').attr('value',entry.id).text(entry.city_name));
                    });   
                }else{
                    $('#city_id').empty();
                }
            }
         });
       }else{
           $('#city_id').empty();
       }
   });




//     $('select[name=country_id]').change(function() {
//      // alert('ok');
//       var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();
   
//       $.get(url, function(data) {
//           $('#state_id').empty('');
//           $("#state_id").append("<option value=''>Select</option>");
//           $("#state_id").selectpicker("refresh");
//           //var select = $('form select[name=state_id]');
//          // select.empty();
//           //$("#state_id").append("<option value=''>Select</option>");
//           $.each(data, function(key, value) {
//               $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
//                   '</option>');
//           });
//            $("#state_id").selectpicker("refresh");
//       });
//    });
});
</script>
@endsection
