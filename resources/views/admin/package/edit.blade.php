@extends('admin.layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/pages/inbox.css') }}" rel="stylesheet" type="text/css"> 
<style type="text/css">
   .form-group {
   margin-bottom: 10px !important;
   }
   /* .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
   width: 250px !important;
   }*/
   .error{
   color: #A94442 !important;
   }
   .button-close{
   z-index: 99;
   position: absolute;
   top: -37px;
    left: 45px;
   /* opacity: 0; */
   font-size: 13px;
   min-width: 100%;
   max-width: 100%;
   padding: 2em 1em;
   text-align: center;
   color: rgba(0, 0, 0, 0.9);
   line-height: 150%;
   }
   .dropdown-menu li {
   padding: 0 20px !important;
   }
   .label-travellers{
      padding: 7px 10px;
      margin-right: 10px;
   }
   .state-cities button{
      border-radius: 30px;
      margin: 5px;
   }
   .state-cities i.left {
       margin-right: 6px;
   }
   .list-group-item {
       padding: 10px 20px !important;
   }

   .form-control {
       display: block;
       width: 100%;
       height: 34px;
       padding: 6px 12px;
       font-size: 14px;
       line-height: 1.42857143;
       color: #555;
       background-color: #fff;
       background-image: none;
       border: 1px solid #dedea8;
       border-radius: 4px;
       -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
       box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
       -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
       -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
       -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
       transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
       transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
       transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
   }
   .sortable li:hover{
      background: #f2f2f2;
   }
   .night-place-name{
      color: #4f516d;
   }
   .fixed{
     //top:50px;
   }

  .xfixed {
    position: fixed;
    top:50px;
    left: 1020px;
    width: 260px;
    height: auto;
  }
  .placecitylist {
    counter-reset: my-place-counter;
  }
  .placecitylist li:before {
    content: counter(my-place-counter);
    counter-increment: my-place-counter;
  }
  .overallplacecitylist {
    counter-reset: overall-place-counter;
  }
  /*.overallplacecitylist span.summaryno::before {
    content: counter(overall-place-counter);
    counter-increment: overall-place-counter;
  }*/
  .timeline>li:after, .timeline>li:before {
      content: " ";
      display: initial !important;
  }
  .card.media-card-sm {
      margin: 10px;
  }
  .timeline-icon.ti-text {
    width: 110px;
    right: -36px;
    left: auto;
    font-size: 10px;
    line-height: 2.3;
    text-transform: uppercase;
}
.modal-header {
        border-bottom: 0;
        padding: 2px !important;
    }
    #listhotelsarea .card.media-card-sm {
         margin: 0px !important; 
    }
    #listhotelsarea .media-img {
      width: 12%;
      height: inherit;
  }
  button .form-control {
    padding: 3px 6px !important;
  }

    .modal-lg {
        width: 1100px;
    }
    .ameneties-list-container a {
      display: block;
      float: left;
      margin: 0 10px 10px 0;
      border: 1px solid #ffbce4;
      color: #ec008c;
      padding: 9px 17px;
      border-radius: 30px;
      background-color: #fbf6f9;
  }
  .timeline.timeline-single {
      max-width: 800px;
      overflow-x: hidden;
      padding-left: 40px;
      padding-right: 10px;
  }
  #place-activities .list-group-item.item-avatar {
      padding-left: 72px !important;
      position: relative;
      min-height: 59px;
  }
  .msg-row .msg-wrapper {
      padding: 15px 15px;
  }
  #place-activities .list-group-item.item-avatar .avatar {
      position: absolute;
      display: inline-block;
      left: 16px;
      width: 64px;
      height: 64px;
      font-size: 22px;
      line-height: 42px;
      font-style: normal;
      text-align: center;
      overflow: hidden;
      vertical-align: middle;
      border-radius: 5px;
  }
  #listactivitiesarea .card.media-card-sm {
         margin: 0px !important; 
    }
    #listactivitiesarea .media-img {
      width: 12%;
      height: inherit;
  }

  #listactivitiesarea .form-control {
      display: block;
      width: 100%;
      height: 27px;
      padding: 3px 8px;
  }

  #listactivitiesarea .media{
     height: 110px;
  }
  .list-group-item.item-avatar .overall-place-activitylist {
    padding-left: 120px !important;
    position: relative;
    min-height: 59px;
}
 .overall-place-activitylist img {
      position: absolute;
      display: inline-block;
      left: 16px;
      width: 100px !important;
      height: 100px !important;
      font-size: 22px;
      line-height: 42px;
      font-style: normal;
      text-align: center;
      overflow: hidden;
      vertical-align: middle;
      border-radius: 5px;
  }

  .activities-summary{
    padding-top: 40px;
  }

  .timeline-icon.ti-text {
      width: auto !important;
  }
  #place-activities,#overall-summary, .place-activitylist {
    list-style: none !important;
  }
  .summary-day-title{
    font-weight: bold;
    font-size: 1.5em;
  }

  .sub-summary-activity{
    margin: 0 20px;
  }

  .price-section label{
    font-size: 14px;
    font-weight: normal;
  }
  input[readonly] {
      background-color: #e9ecef;
  }

</style>
@endsection
@section('main-content')	
<section class="content-wrapper">
   <!-- =========================================================== -->
   <!-- Start page content  -->
   <!-- =========================================================== -->
   <div class="aside-panel"></div>
   <div class="container-fluid">
   <div class="page-header">
      <h1>Tours and Travels</h1>
      <ul class="breadcrumbs">
         <li>Masters</li>
         <li>{{__('Edit Package') }}</li>
      </ul>
   </div>
   @php
    $package_info = $data['package_info'];
    //dd($package_info->package_type);
    $package_place = $data['package_place'];
   
    $citys_data = [];
    foreach($data['package_place'] as $place){
      $citys_data[] = $place->city_id;
    }
   @endphp
   <div class="page-content">
      @include('includes.messages')
      <div class="paper toolbar-parent mt10">
          <div class="col-md-8">
          <form id="wizard1"  class="paper formValidate" method="post" enctype="multipart/form-data"  action="{{ route('package_update') }}">
            @csrf
            <h3>Travel Data</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Package Information</h4>
                  <!-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> -->
                  <div class="row">
                     <div class="col-md-4">
                        <div class="input-field label-float">
                           <input placeholder="Package Name" class="clearable" id="package_name" name="package_name" value="{{ $package_info->package_name }}" autofocus type="text">
                           <label for="package_name" class="fixed-label">{{__('Package Name') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="select-row form-group">
                           <label for="package_type" class="block">{{__('Package Type') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="package_type" name="package_type" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select Package')}}</option>
                              
                              @foreach($data['package_type'] as $type)
                                <option @if($package_info->package_type==$type->id) selected @endif value="{{$type->id}}" >
                                 {{$type->package_type}}
                                </option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-4">
                        <div class="input-field label-float">
                           <label for="package_name" class="fixed-label">{{__('Persons') }}<span style="color:red">*</span></label>
                           <br>
                           <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span class="adult-count" id="adult-count">{{ $package_info->adult_count }}</span> Adults & <span class="child-count" id="child-count">{{ $package_info->child_count }}</span> Children & <span class="infant-count" id="infant-count">{{ $package_info->infant_count }}</span> Infants</a></p>
                           <input type="text" name="adult_count" id="adult-count-val" class="hide" value="{{ $package_info->adult_count }}">
                           <input type="text" name="child_count" id="child-count-val" class="hide" value="{{ $package_info->child_count }}">
                           <input type="text" name="infant_count" id="infant-count-val" class="hide" value="{{ $package_info->infant_count }}">
                           <input type="text" name="auto_id" id="auto_id" class="hide" value="{{ $package_info->id }}">
                           <div class="input-highlight"></div>
                        </div>
                        <div id="infantsModal" class="modal" tabindex="-1" role="dialog" style="display: none; opacity: 1;">
                           <div class="modal-dialog modal-sm" role="document" style="transform: scaleX(0.7); top: 40%; opacity: 0;">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="btn-close modal-close" style="margin: 1rem;" data-dismiss="modal" aria-label="Close"></button>
                                    <h2 class="text-headline">Travellers Details</h2>
                                 </div><!-- /.modal-header -->
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="fixed-label">{{__('Adult:') }}</label>
                                          <br>
                                          <small>Age 13 and above</small>
                                       </div>
                                       <div class="col-md-6">
                                           <input type="text" name="adult-travellers" class="adult-travellers allow_decimal" value="{{ $package_info->adult_count }}" />

                                       </div>  
                                       
                                    </div>
                                     <br>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="fixed-label">{{__('Children:') }}</label>
                                          <br>
                                          <small>Age 3 to 12</small>
                                       </div>

                                       <div class="col-md-6">
                                          <input type="text" name="child-travellers" class="child-travellers allow_decimal" value="{{ $package_info->child_count }}" />
                                          
                                       </div>  
                                       
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="fixed-label">{{__('Infant:') }}</label>
                                          <br>
                                          <small>Age 0 - 2</small>
                                       </div>

                                       <div class="col-md-6">
                                          <input type="text" name="infant-travellers" class="infant-travellers allow_decimal" value="{{ $package_info->infant_count }}" />
                                          
                                       </div>  
                                       
                                    </div>

                                 </div><!-- /.modal-body -->
                                 <div class="modal-footer">
                                    Total travellers : <span id="total-travellers">{{ $package_info->adult_count+$package_info->child_count+$package_info->infant_count }}</span>
                                    <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                                    <button class="btn-flat waves-effect waves-theme hide">Save changes</button>
                                 </div><!-- /.modal-footer -->
                              </div><!-- /.modal-content -->
                           </div><!-- /.modal-dialog -->
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12">
                     <p class="no-margin em"></p>
                  </div>
                  <div class="col-md-12">
                     <p class="no-margin em"></p>
                  </div>
                  <div class="row">
                    
                     <div class="col-md-6" style="background-color: #f2f2f2;">
                        <h4 class="text-headline text-center">Traveling From</h4>
                        <div class="select-row form-group">
                           <label for="from_country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="from_country_id" name="from_country_id" onchange="ChangeStates(this.value,0)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select country')}}</option>
                             
                              @foreach($data['country_view'] as $value)
                              <option value="{{$value->id}}" @if($package_info->from_country_id==$value->id) selected @endif >
                              {{$value->country_name}}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                        @php
                          $fromstatelist = CommonHelper::getStateList($package_info->from_country_id);
                        @endphp
                        <div class="select-row form-group">
                           <label for="from_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="from_state_id" name="from_state_id"  onchange="ChangeCities(this.value,0)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($fromstatelist as $state)
                              <option @if($package_info->from_state_id==$state->id) selected @endif value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        @php
                          $fromcitylist = CommonHelper::getCityList($package_info->from_state_id);
                        @endphp
                        <div class="select-row form-group">
                           <label for="from_city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="from_city_id" name="from_city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              @foreach ($fromcitylist as $city)
                              <option @if($package_info->from_city_id==$city->id) selected @endif value="{{ $city->id }}">{{ $city->city_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-6" style="background-color: #a6777726;">
                        <h4 class="text-headline text-center">Traveling To</h4>
                        <div class="select-row form-group">
                           <label for="to_country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_country_id" name="to_country_id" onchange="ChangeStates(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select country')}}</option>
                             
                              @foreach($data['country_view'] as $value)
                              <option @if($package_info->to_country_id==$value->id) selected @endif value="{{$value->id}}" >
                              {{$value->country_name}}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                         @php
                        $tostatelist = CommonHelper::getStateList($package_info->to_country_id);
                        @endphp
                        <div class="select-row form-group">
                           <label for="to_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_state_id" name="to_state_id" onchange="ChangeCities(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($tostatelist as $state)
                              <option @if($package_info->to_state_id==$state->id) selected @endif value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        @php
                          $tocitylist = CommonHelper::getCityList($package_info->to_state_id);
                          //dd($data['package_place']);
                        @endphp
                        <div class="select-row form-group">
                           <label for="to_city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_city_id" name="to_city_id" class="selectpicker select-validate" onchange="ChangeCityvalues(this.id)" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              @foreach ($tocitylist as $city)
                              <option @if($package_info->to_city_id==$city->id) selected @endif value="{{ $city->id }}">{{ $city->city_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                      <br>
                         <div class="col-md-12">
                            <h4 class="text-headline">Add more destinations</h4>
                            <small>Choose more destinations from below</small>
                             <br>
                              <br>
                         </div>
                          @php
                          $tocitylist = CommonHelper::getCityList($package_info->to_state_id);
                          
                          //dd($citys_data);
                          @endphp
                        <div class="col-md-12">
                           <div id="destination-division" class="destinations-division">
                              @foreach ($tostatelist as $state)
                                @php
                                  $pickcitylist = CommonHelper::getCityList($state->id);
                                @endphp
                                @if(count($pickcitylist)>0)
                                <div id="state-cities-{{ $state->id }}" class="col-md-12 state-cities">
                                  <h5 class="text-headline text-bold">{{ $state->state_name }}</h5>
                                   
                                    <div class="destination-city" id="destination-city-1">
                                      @foreach ($pickcitylist as $scity)
                                         <button id="place_button_{{ $scity->id }}" type="button" onclick="PickPlace({  cityid: {{ $scity->id }},  stateid: {{ $state->id }}, cityname: '{{ $scity->city_name }}', statename: '{{ $state->state_name }}' , cityimage: '{{ $scity->city_image }}' })" class="btn theme-accent waves-effect waves-light " @if (in_array($scity->id, $citys_data)) disabled @endif ><i class="mdi mdi-plus left"></i>{{ $scity->city_name }}</button>
                                      @endforeach
                                      
                                    </div>
                                </div>
                                @endif
                              @endforeach
                           </div>
                        </div>
                        <div class="col-md-4">
                          <!--  <div id="destination-chart" class="destinations-division">
                              <div class="sortable">
                                 <div class="card">
                                    <div class="p14 pl20 blue-grey">
                                       <div class="card-title">Places (State-City)</div>
                                    </div>
                                    <div class="card-block">
                                       <div class="scroller ">
                                          <ul id="place-sortList" class="list-group item-border">
                                             
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                             
                           </div>
                           <div id="destination-nights" class="destinations-nights">
                              <div class="row">

                                  <div class="divider theme ml14 mr14"></div> 
                                 
                                 <div id="destination-night-area" class="destination-night-area">
                                     
                                 </div>
                                
                                  
                              </div>
                           </div> -->
                        </div>
                        <div class="clearfix"/>

                  </div>
                  <div class="clearfix"></div>
                
               </div>
               <!-- /.col- -->
            </fieldset>

            <h3>Hotels</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Accommodation</h4>
                  <div class="row">
                    <ul id="place-hotels" class="timeline bg-color-switch mt40 timeline-single">
                         @foreach($data['package_place'] as $key => $place)

                           @if($place->nights_count!=0)
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;

                              //$place_city_name = CommonHelper::getcityName($place->city_id);
                              $package_hotel = CommonHelper::getPackageHotel($package_info->id,$place->city_id);
                              //dd($package_hotel->roomtype);
                             

                              $amenity_count = $package_hotel!=null ? count($package_hotel->amenities) : 0;

                             // 
                              $amenitystring = '';

                              if($package_hotel!=null){
                                foreach($package_hotel->amenities as $key => $amenity){
                                  $amenitystring .= $amenity->amenities_name;
                                  if($amenity_count-1 != $key){
                                    $amenitystring .= ', ';
                                  } 
                                }
                              }
                              
                              //dd($package_hotel);

                              $roomtypesstring = '';
                              $type_count = $package_hotel!=null ? count($package_hotel->roomtypes) : 0;
                              $room_cost = 0;
                              $cityhotelid = '';
                              $cityhotelroomtype = '';
                              $cityhotelroomnumbers = 0;
                               
                              if($package_hotel!=null){
                                $room_cost = $package_hotel->total_amount;
                                $cityhotelid = $package_hotel->id;
                                $cityhotelroomtype = $package_hotel->roomtype_id;
                                $cityhotelroomnumbers = $package_hotel->total_rooms;
                                foreach($package_hotel->roomtypes as $key => $roomtype){

                                  if($roomtype->pivot->roomtype_id==$package_hotel->roomtype_id){
                                    $roomtypesstring = $roomtype->room_type.' - '.$package_hotel->total_rooms;

                                    
                                  }
                                 
                                }
                              }
                             
                            @endphp

                              <li data-cityid="{{ $place->city_id }}" id="picked-hotelli-{{ $place->city_id }}" class="tl-item">
                                <div class="timeline-icon ti-text">{{ $place_state_name }} - {{ $place_city_name }}</div>
                                <div class="card media-card-sm">
                                  <div id="picked-hotelmedia-{{ $place->city_id }}" class="media">
                                    @if($package_hotel!=null)
                                    @php
                                      $hotelimages = $package_hotel->hotelimages;
                                      $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                                    @endphp

                                    <div class="media-left media-img">
                                      <a href="#">
                                        <img class="responsive-img" src="{{ $hotel_image }}" alt="Hotel Image">
                                      </a>
                                    </div>
                                    <div class="media-body p10">
                                      <h4 class="media-heading">{{ $package_hotel->hotel_name }}</h4>
                                      <p>{{ $place_state_name }} - {{ $place_city_name }}</p>
                                      <p class="sub-text mt10">{{ $amenitystring }}</p>
                                      <p class="sub-text mt10">{{ $roomtypesstring }} <span class="" style="margin-left: 20px;font-weight:bold;">at <i class="fa fa-inr"></i> {{ $room_cost }} </span> <button id="edit_hotel_button_{{ $place->city_id }}" style="margin-left: 20px;" type="button" onclick="EditHotel({  cityid: {{ $place->city_id }},  stateid: {{ $place->state_id }}, cityname: '{{ $place_city_name }}', statename: '{{ $place_state_name }}' , cityimage: '{{ $place_city_image }}' },{{$package_hotel->id}},{{$package_hotel->roomtype_id}},{{$package_hotel->total_rooms}})" class="btn btn-sm blue waves-effect waves-light ">Edit Hotel</button>
                                        <button id="add_hotel_button_{{ $place->city_id }}" type="button" onclick="PickHotel({  cityid: {{ $place->city_id }},  stateid: {{ $place->state_id }}, cityname: '{{ $place_city_name }}', statename: '{{ $place_state_name }}' , cityimage: '{{ $place_city_image }}' })" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button>
                                      </p>
                                      <input type="text" class="hide" name="second_hotel_{{ $place->city_id }}[]" id="second_hotel_{{ $place->city_id }}" value="{{ $cityhotelid }}"/>
                                      <input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="{{ $place->city_id }}"/>
                                      <input type="text" class="hide hotel_cost" name="hotel_cost_{{ $place->city_id }}[]" id="hotel_cost_{{ $place->city_id }}" value="{{ $room_cost }}"/>
                                      <input type="text" class="hide hotel_number_count" name="hotel_number_count_{{ $place->city_id }}[]" id="hotel_number_count_{{ $place->city_id }}" value="{{ $cityhotelroomnumbers }}"/>
                                      <input type="text" class="hide hotel_room_type" name="hotel_room_type_{{ $place->city_id }}[]" id="hotel_room_type_{{ $place->city_id }}" value="{{ $cityhotelroomtype }}"/>
                                    </div>
                                    @else
                                    <div class="media-left media-img">
                                      <a>
                                        <img class="responsive-img" src="{{ asset('public/assets/images/no_image.jpg') }}" alt="Hotel Image">
                                      </a>
                                    </div>
                                    <div class="media-body p10">
                                      <h4 class="media-heading">Please choose hotel</h4> 
                                      <button id="add_hotel_button_{{ $place->city_id }}" type="button" onclick="PickHotel({  cityid: {{ $place->city_id }},  stateid: {{ $place->state_id }}, cityname: '{{ $place_city_name }}', statename: '{{ $place_state_name }}' , cityimage: '{{ $place_city_image }}' })" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add Hotel</button>
                                    </div>
                                    @endif
                                  </div>
                                </div>
                              </li>

                           @endif
                        @endforeach

                    </ul>
                    <div id="dummy-hotels">
                      
                    </div>
                  </div>
                </div>
                  
                  
            </fieldset>
            <h3>Activities</h3>

            <fieldset>
                <div class="col-sm-12">
                  <h4 class="text-headline">Activities</h4>
                  <div class="row">
                    <ul id="place-activities" class="timeline bg-color-switch mt40 timeline-single">
                      @foreach($data['package_place'] as $place)
                        @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;

                              $package_activities = CommonHelper::getPackageActivities($package_info->id,$place->city_id);
                             // dd($package_activities);
                        @endphp
                        <li data-cityid="{{$place->city_id}}" id="picked-activityli-{{$place->city_id}}" class="tl-item list-group-item item-avatar msg-row unread">
                          <div class="timeline-icon ti-text">{{ $place_state_name }} - {{ $place_city_name }}</div>
                        @if($package_activities!=null)
                            <ul id="place-activitylist-{{$place->city_id}}" style="list-style: none !important;" class="place-activitylist" >
                              @foreach($package_activities as $activity)
                               @php
                                  $activityimages = $activity->activity_images;
                                  $act_image = count($activityimages)>0 ? asset('storage/app/activity/'.$activityimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                                 // dd($activity);
                                  $package_activity_cost= CommonHelper::getPackageActivityCost($package_info->id,$activity->id);
                                @endphp
                              <li>
                                <div id="city_activity_id_{{ $activity->id }}" class="msg-wrapper">
                                  <img src="{{ $act_image }}" alt="" class="avatar "><a class="msg-sub">{{ $activity->title_name }}</a><a class="msg-from"><i class="fa fa-inr"></i> <span id="total_activity_value_{{ $activity->id }}">{{ $package_activity_cost }}</span></a>
                                  <p>
                                    <input type="text" class="hide" name="second_activity_{{$place->city_id}}[]" id="second_activity_{{$place->city_id}}" value="{{ $activity->id }}"/>
                                    <input type="text" class="hide activity_cost" name="activity_cost_{{$place->city_id}}[]" id="activity_cost_{{ $activity->id }}" value="{{ $package_activity_cost }}"/>
                                    <input type="text" class="hide activity_person_cost" name="activity_person_cost_{{$place->city_id}}[]"  id="activity_person_cost_{{ $activity->id }}" value="{{$activity->amount}}" />
                                    <a onclick="return RemoveActivityDB({{ $package_info->id }}, {{ $activity->id }},{{$place->city_id}})" style="color: red;cursor:pointer;" class="">Remove</a></p>
                                </div>
                              </li>
                              @endforeach
                            </ul>
                            <a id="pick-actitity-link-{{$place->city_id}}" href="#" onclick="PickActity({  cityid: {{ $place->city_id }},  stateid: {{ $place->state_id }}, cityname: '{{ $place_city_name }}', statename: '{{ $place_state_name }}' , cityimage: '{{ $place_city_image }}' })" class="btn btn-sm purple waves-effect waves-light pull-right" style="top: -20px;"><i class="mdi mdi-plus left"></i>Add activity</a>
                        @else
                            <ul id="place-activitylist-{{$place->city_id}}" style="list-style: none !important;" class="place-activitylist" ></ul>
                            <a id="pick-actitity-link-{{$place->city_id}}" href="#" onclick="PickActity({  cityid: {{ $place->city_id }},  stateid: {{ $place->state_id }}, cityname: '{{ $place_city_name }}', statename: '{{ $place_state_name }}' , cityimage: '{{ $place_city_image }}' })" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a>
                        @endif
                        </li>
                      @endforeach
                    </ul>
                    <div id="dummy-activities">
                      
                    </div>
                  </div>
                </div>
            
            </fieldset>
            <h3>Summary</h3>
            <fieldset>
                <div class="col-sm-12">
                  <h4 class="text-headline">Summary</h4>
                  @php
                    $to_state_name = CommonHelper::getstateName($package_info->to_state_id);
                    $to_city_data = CommonHelper::getcityDetails($package_info->to_city_id);
                    $to_city_name = $to_city_data->city_name;
                    $to_city_image = $to_city_data->city_image;
                    $to_city_image = $to_city_image==null || $to_city_image=='' ?  asset("public/assets/images/no_image.jpg") :  asset('storage/app/city/'.$to_city_image) ;
                    $place_counts = count($data['package_place']);
                    $summary_cities='';
                    $night_count=0;
                    foreach($data['package_place'] as $key => $place){
                       $sum_city_name = CommonHelper::getcityName($place->city_id);
                       $summary_cities .= $sum_city_name.', ';
                       $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
                    }
                  
                  @endphp

                  <div class="row sortable">
                    <div class="card">
                      <div class="card-image">
                          <img id="summary-banner" src="{{ $to_city_image }}" style="height: 250px;" alt="">
                          <div class="row">
                            <div class="card-title">
                                <div class="col-md-4"> 
                                  <span id="summary-state">{{ $to_state_name }}</span><br><span id="summary-cities" class="text-small">{{ $summary_cities }}</span>
                                </div>
                                <div class="col-md-4"> 
                                  <p id="summary-nights"><span class="night-count">{{ $night_count }}</span> nights</p><span id="summary-days" class="text-small"><span class="days-count">{{ $night_count+1 }}</span> days</span>
                                </div>
                                 <div class="col-md-4"> 
                                  <p id="summary-family"><span class="adult-count">{{ $package_info->adult_count }}</span> Adults <span class="child-count">{{ $package_info->child_count }}</span> Children</p><span id="summary-infants" class="text-small"><span class="infant-count">{{ $package_info->infant_count }}</span> Infant</span>
                                </div>
                            </div>
                          </div>
                          
                      </div>
                       <ul id="overall-summary" class="timeline overallplacecitylist bg-color-switch mt40 timeline-single">
                          @foreach($data['package_place'] as $place) 
                           
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;
                             
                            @endphp
                            <li data-cityid="{{$place->city_id}}" id="summary-activityli-{{$place->city_id}}" class="tl-item summary-activity list-group-item item-avatar msg-row unread">
                                <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span id="summary-night-{{$place->city_id}}" class="summaryno"></span></span> <br> {{ $place_state_name }} - <span id="summary-city-name-{{$place->city_id}}">{{ $place_city_name }}</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-{{$place->city_id}}" value="{{$place->city_id}}"></div>

                                <div id="summary-hotelarea-{{$place->city_id}}" class="overall-place-activitylist">
                                  @if($place->nights_count!=0)
                                  @php
                                     $sum_package_hotel = CommonHelper::getPackageHotel($package_info->id,$place->city_id);
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
                                      $sum_package_activities = CommonHelper::getPackageActivities($package_info->id,$place->city_id);
                                  @endphp
                                  @if($sum_package_hotel!=null)
                                    @php
                                      $hotelimages = $sum_package_hotel->hotelimages;
                                      $hotel_image = count($hotelimages)>0 ? asset('storage/app/hotels/'.$hotelimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                                    @endphp
                                  <div id="summary_hotel_id_{{$place->city_id}}" class="msg-wrapper">
                                    <img style="width:80px !important;height:80px !important;" id="summary-hotel-img-{{$place->city_id}}" src="{{ $hotel_image }}" alt="" class="avatar "><a id="summary-hotel-name-{{$place->city_id}}" class="msg-from" style="display: initial;">{{ $sum_package_hotel->hotel_name }}</a><br><a id="summary-hotel-type-{{$place->city_id}}" class="msg-sub">{{ $roomtypesstring }}</a>
                                    <p id="summary-features-{{$place->city_id}}">{{ $amenitystring }}</p>
                                  </div>
                                  @endif
                                  @endif
                                  <div style="clear:both"></div>
                                </div>

                                <div style="clear:both"></div>
                                <div id="summary-activity-section-{{$place->city_id}}" class="activities-summary">
                                  @foreach($sum_package_activities as $activity)
                                  @php
                                    $activityimages = $activity->activity_images;
                                    $act_image = count($activityimages)>0 ? asset('storage/app/activity/'.$activityimages[0]->image_name) : asset("public/assets/images/no_image.jpg");
                                    $activityduration = round($activity->duartion_hours/60).' hour '.($activity->duartion_hours%60).' minutes';
                                     $package_activity_cost= CommonHelper::getPackageActivityCost($package_info->id,$activity->id);
                                  @endphp
                                  <div id="summary_city_activity_id_{{ $activity->id }}" class="">
                                    <h3 style="text-decoration: underline;">{{ $activity->title_name }} <a class="pull-right"><i class="fa fa-inr"></i> {{ $package_activity_cost }}</a></h3>
                                    <div class="sub-summary-activity">
                                      <h5>Overview</h5>
                                      <div id="activity-summary-overview" class="activity-description">
                                        {!! $activity->overview !!}
                                      </div>
                                      <h5>Duration: {{ $activityduration }}</h5>
                                    </div>
                                  </div>
                                  @endforeach
                                </div>
                              </li>
                            
                          @endforeach
                       </ul>
                       <br>
                        <br>
                    </div>
                    <div id="dummyRightList">
                    </div>
                  </div>
                </div>
            
            </fieldset>
            <p><span style="color:red;    margin-left: 40px;"> Mandatory (*)</span></p>
         </form>
          </div>
          <div id="right-section-packagearea" class="col-md-4  p8 sticky fixed" >
             <div id="travel-section" class="">
               <div id="destination-chart" class="destinations-division">
                    <div class="sortable">
                       <div class="card">
                          <div class="p8 blue-grey">
                             <div class="card-title">Places (State-City)</div>
                          </div>
                          <div class="card-block">
                             <div class="scroller ">
                                <ul id="place-sortList" class="list-group placecitylist item-border">
                                  @foreach($data['package_place'] as $place)
                                  @php 
                                    $place_state_name = CommonHelper::getstateName($place->state_id);
                                    $place_city_name = CommonHelper::getcityName($place->city_id);
                                  @endphp
                                  <li data-cityid="{{ $place->city_id }}" id="picked-li-{{ $place->city_id }}" class="list-group-item cityplace sort-handle">. {{ $place_state_name }} - {{ $place_city_name }}<span class="callout-left blue-grey"></span>
                                    <input type="text" name="picked_state[]" class="hide" id="picked-state-{{ $place->city_id }}" value="{{ $place->state_id }}">
                                    <input type="text" name="picked_city[]" class="hide" id="picked-city-{{ $place->city_id }}" value="{{ $place->city_id }}">
                                  </li>
                                  @endforeach
                                </ul>
                                <div id="dummyList">

                                </div>
                             </div>
                          </div><!-- /.card-block -->
                       </div><!-- /.card -->
                    </div>
                   
                 </div>

                 <div id="destination-nights" class="destinations-nights">
                    <div class="row">

                      <div class="divider theme ml14 mr14"></div> 
                       
                      <div id="destination-night-area" class="destination-night-area">
                         @foreach($data['package_place'] as $place)
                           @if($place->nights_count!=0)
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;
                              $place_city_image = $place_city_image==null || $place_city_image=='' ?  asset("public/assets/images/no_image.jpg") :  asset('storage/app/city/'.$place_city_image) ;
                            @endphp
                           <div data-cityid="{{ $place->city_id }}" id="place_night_{{ $place->city_id }}" class="col-xs-6 col-sm-6 col-md-4 mt20">
                              <img class="responsive-img z-depth-1" src="{{ $place_city_image }}" style="width:190px;height: 100px;" alt=""/>
                              <div id="place_night_remove_{{ $place->city_id }}" class="button-close">
                                <button type="button" onclick="return DeleteNight({{ $place->city_id }})" class="btn btn-sm red waves-effect waves-circle waves-light">x</button>
                              </div>
                              <small class="night-place-name">{{ $place_city_name }}</small>
                              <div class="form-group">
                                <select id="place_night_select_{{ $place->city_id }}" name="place_night_select[]" class="form-control place-night-select">
                                  @for($l=1;$l<=10;$l++)
                                  <option value="{{ $l }}" @if($place->nights_count==$l) selected @endif >{{ $l }} @if($l==1)Night @else Nights @endif</option>
                                  @endfor
                                 <!--  <option value="2">2 Nights</option>
                                  <option value="3">3 Nights</option>
                                  <option value="4">4 Nights</option>
                                  <option value="5">5 Nights</option>
                                  <option value="6">6 Nights</option>
                                  <option value="7">7 Nights</option>
                                  <option value="8">8 Nights</option>
                                  <option value="9">9 Nights</option>
                                  <option value="10">10 Nights</option> -->
                                </select>
                                <input type="text" class="hide" id="place_night_count_{{ $place->city_id }}" name="place_night_count_{{ $place->city_id }}[]" value="{{$place->nights_count}}">
                              </div>
                            </div> 
                            @endif 
                          @endforeach
                      </div>
                      <div id="dummyListNights">

                      </div>
                        
                        
                    </div>
                 </div>
               </div>
               <div class="price-section hide">
                  <div class="form-horizontal paper p20 ">   
                        <h4 class="text-headline">Price Summary</h4>   
                        <br>
                        <div class="form-group">
                            <label for="total_accommodation" class="col-sm-5 control-label">Accommodation
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_accommodation" readonly="true" name="total_accommodation" value="{{ $package_info->total_accommodation }}" class="allow_decimal" placeholder="Accommodation">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="total_activities" class="col-sm-5 control-label">Activities
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_activities" value="{{ $package_info->total_activities }}" readonly="true" name="total_activities" class="allow_decimal" placeholder="Activities">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                          </div>
                           <div class="form-group">
                            <label for="transport_charges" class="col-sm-5 control-label">Transport Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="transport_charges" value="{{ $package_info->transport_charges }}" name="transport_charges" class="allow_decimal" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="additional_charges" class="col-sm-5 control-label">Additional Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="additional_charges" name="additional_charges" class="allow_decimal" value="{{ $package_info->additional_charges }}" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="total_package_value" class="col-sm-5 control-label">Total package value
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_package_value" name="total_package_value" value="{{ $package_info->total_package_value }}" class="allow_decimal" placeholder="Total package value">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="gst_amount" class="col-sm-5 control-label">GST <span>{{ $package_info->tax_percentage }}</span>% <input type="text" name="gst_per" id="gst_per" value="{{ $package_info->tax_percentage }}" class="hide" /> </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="gst_amount" name="gst_amount" value="{{ $package_info->tax_amount }}" readonly="true" placeholder="Total GST Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="total_amount" class="col-sm-5 control-label">Total</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount" name="total_amount" value="{{ $package_info->total_amount }}" readonly="true" placeholder="Total Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                        <h5 class="text-headline">Additional Price</h5> 
                        <small>[Incl. Transport Charges &amp; Additional Charges]</small>
                         <div class="form-group">
                            <label for="adult_price" class="col-sm-5 control-label">Adult Price/person* </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="adult_price" class="allow_decimal" value="{{ $package_info->adult_price_person }}" name="adult_price" placeholder="Adult Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="child_price" class="col-sm-5 control-label">Child Price/person </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="child_price" class="allow_decimal" value="{{ $package_info->child_price_person }}" name="child_price" placeholder="Child Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="infant_price" class="col-sm-5 control-label">Infant Price/person</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="infant_price" class="allow_decimal" value="{{ $package_info->infant_price }}" name="infant_price" placeholder="Infant Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                    </div>
                    
               </div>
           </div>
           <div class="clearfix"/>
         </div>
      </div>
      <!-- /.page-content -->
      <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
      <i class="mdi mdi-chevron-up medium"></i>
      </a>                
   </div>
   <!-- /.container-fluid -->
   @include('admin.package.common-modal')
</section>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<!--script src="{{ asset('public/assets/dist/js/plugins/sortable/sortable.min.js') }}"></script-->
<script src="{{ asset('public/assets/dist/js/plugins/smoothscroll/smooth-scroll.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/list/list.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/list/list.pagination.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/code-prettify/prettify.js') }}"></script>
<script src="https://www.jqueryscript.net/demo/Create-Draggable-Sortable-Lists-In-jQuery-Dragsort/dist/js/jquery.dragsort.js"></script>
  <!--script src="https://code.jquery.com/jquery-1.12.4.js"></script-->
  <!--script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script-->
 <!--script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 <script src="{{ asset('public/assets/dist/js/sortable-ui.js') }}"></script-->
<script>
   $("#dashboard_sidebar_li_id").addClass('active');
    var form = $("#wizard1").show();
     

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        onStepChanging: function (event, currentIndex, newIndex)
        {
           $("#travel-section").removeClass('hide');
           $(".price-section").addClass('hide');
         // console.log('test changes');
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            if (newIndex === 1 )
            {
               var formsubmit =true; 
               if($("#from_country_id").val()==''){
                  $('.from_country_id-error').remove();
                  $( '<div id="from_country_id-error" class="error from_country_id-error custom-error" >Please choose Country.</div>' ).insertAfter( '#from_country_id' );
                  formsubmit =false; 
               }else{
                 $("#from_country_id-error").remove();
               }
               if($("#to_country_id").val()==''){
                  $('.to_country_id-error').remove();
                  $( '<div id="to_country_id-error" class="error to_country_id-error custom-error" >Please choose Country.</div>' ).insertAfter( '#to_country_id' );
                  formsubmit =false; 
               }else{
                 $("#to_country_id-error").remove();
               }
              if($("#from_state_id").val()==''){
                  $('.from_state_id-error').remove();
                  $( '<div id="from_state_id-error" class="error from_state_id-error custom-error">Please choose State.</div>' ).insertAfter( '#from_state_id' );
                  formsubmit =false; 
               }else{
                 $("#from_state_id-error").remove();
               }
               if($("#to_state_id").val()==''){
                  $('.to_state_id-error').remove();
                  $( '<div id="to_state_id-error" class="error to_state_id-error custom-error">Please choose State.</div>' ).insertAfter( '#to_state_id' );
                  formsubmit =false; 
               }else{
                 $("#to_state_id-error").remove();
               }
               if($("#from_city_id").val()==''){
                  $('.from_city_id-error').remove();
                  $( '<div id="from_city_id-error" class="error from_city_id-error custom-error">Please choose City.</div>' ).insertAfter( '#from_city_id' );
                  formsubmit =false; 
               }else{
                 $("#from_city_id-error").remove();
               }
               if($("#to_city_id").val()==''){
                  $('.to_city_id-error').remove();
                  $( '<div id="to_city_id-error" class="error to_city_id-error custom-error">Please choose City.</div>' ).insertAfter( '#to_city_id' );
                  formsubmit =false; 
               }else{
                 $("#to_city_id-error").remove();
               }
                if($("#package_name").val()==''){
                  $('.package_name-error').remove();
                  $( '<div id="package_name-error" class="error package_name-error custom-error">Please enter package name.</div>' ).insertAfter( '#package_name' );
                  formsubmit =false; 
               }else{
                 $("#package_name-error").remove();
               }

               if($('#place-sortList li').length==0 && formsubmit==true){
                  alert("Please pick any place");
                  formsubmit =false; 
               }
                
               return formsubmit;
            }
            if(newIndex===3){
               $(".place-night-select").trigger('change');
              $("#travel-section").addClass('hide');
              $(".price-section").removeClass('hide');
              var total_hotel_cost = 0;
               $(".hotel_cost").each(function() {
                 var hotel_cost = parseFloat($(this).val());
                 total_hotel_cost = parseFloat(total_hotel_cost)+parseFloat(hotel_cost);
              });
              $("#total_accommodation").val(total_hotel_cost);
             var total_activity_cost = 0;
             $(".activity_cost").each(function() {
                 var activity_cost = parseFloat($(this).val());
                 total_activity_cost = parseFloat(total_activity_cost)+parseFloat(activity_cost);
              });
             $("#total_activities").val(total_activity_cost);
            // var total_pack_cost = parseFloat(total_hotel_cost)+parseFloat(total_activity_cost);
              //$("#total_package_value").val(total_pack_cost);
              $("#transport_charges").trigger('keyup');
            }
            // if(newIndex===3){
            //   $(".main-wrapper").addClass('menu-hidden');
            // }else{
            //   $(".main-wrapper").removeClass('menu-hidden');
            // }
            // // Forbid next action on "Warning" step if the user is to young
            // if (newIndex === 3 && Number($("#age-2").val()) < 18)
            // {
            //     return true;
            // }
            // Needed in some cases if the user went back (clean up)
            if (currentIndex < newIndex)
            {
                // To remove error styles
                form.find(".body:eq(" + newIndex + ") label.error").remove();
                form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
            }

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
          form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
          
          var total_package_value = $("#total_package_value").val();
          var adult_price = $("#adult_price").val();
          if(total_package_value!="" && adult_price!=""){
            $("#dummyRightList").empty();
            $("#dummyRightList").append($("#right-section-packagearea").clone());
            $("#dummyRightList").addClass('hide');
            $("#wizard1").trigger('submit');
             return true;

          }else{
            $("#dummyRightList").empty();
            alert('Please enter price details');
          }
          // var child_price = $("#child_price").val();
          // var child_price = $("#child_price").val();
          //  $.ajax({
          //     type: 'POST',
          //     url: "{{ route('package_save') }}",
          //     data: new FormData(this),
          //     dataType: 'json',
          //     contentType: false,
          //     cache: false,
          //     processData:false,
          //   //   beforeSend: function(){
          //   //       $('.submitBtn').attr("disabled","disabled");
          //   //       $('#wizard1').css("opacity",".5");
          //   //   },
          //     success: function(response){

          //      alert('package added succesfully');
          //      window.location.reload();
                
          //     }
          // });
          
        }
      //  $('#wizard1').trigger('submit');
    }).validate({
        rules: {
          // 'package_name': {
          //         required: true,
          //     },
          //     'from_state_id': {
          //         required: true,
          //     },
        },
        messages: {
              // 'package_name': {
              //     required: 'Please enter package name.',
              // },
              // 'from_state_id': {
              //     required: 'Please select State.',
              // },
          },
          errorElement: 'div',
      errorPlacement: function (error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      },
    });
   // $("#wizard1").steps({
   //     headerTag: "h3",
   //     bodyTag: "fieldset"
   // });
    
</script>
@endsection
@section('footerSecondSection')
@include('admin.package.common-scripts')
<script type="text/javascript">
  
  
  function RemoveActivityDB(packageid, activityid,cityid){
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {
      var url = "{{ url('/delete_package_activity') }}" + '?activity_id=' + activityid+'&city_id='+cityid+'&package_id='+packageid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
            if(resultdata){
              $("#city_activity_id_"+activityid).remove();
              $("#summary_city_activity_id_"+activityid).remove();
            }
          }
        });
    }else{

    }

   
  }
 
</script>
@endsection