@extends('layouts.admin')
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
  .overallplacecitylist span.summaryno::before {
    content: counter(overall-place-counter);
    counter-increment: overall-place-counter;
  }
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
                     <div class="col-md-6">
                        <div class="input-field label-float">
                           <input placeholder="Package Name" class="clearable" id="package_name" name="package_name" value="{{ $package_info->package_name }}" autofocus type="text">
                           <label for="package_name" class="fixed-label">{{__('Package Name') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-6">
                        <div class="input-field label-float">
                           <label for="package_name" class="fixed-label">{{__('Persons') }}<span style="color:red">*</span></label>
                           <br>
                           <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span class="adult-count" id="adult-count">{{ $package_info->adult_count }}</span> Adults & <span class="child-count" id="child-count">{{ $package_info->child_count }}</span> Children & <span class="infant-count" id="infant-count">{{ $package_info->infant_count }}</span> Infants</a></p>
                           <input type="text" name="adult_count" id="adult-count-val" class="hide" value="{{ $package_info->adult_count }}">
                           <input type="text" name="child_count" id="child-count-val" class="hide" value="{{ $package_info->child_count }}">
                           <input type="text" name="infant_count" id="infant-count-val" class="hide" value="{{ $package_info->infant_count }}">
                           <div class="input-highlight"></div>
                        </div>
                        <div id="infantsModal" class="modal" tabindex="-1" role="dialog" style="display: none; opacity: 1;">
                           <div class="modal-dialog" role="document" style="transform: scaleX(0.7); top: 40%; opacity: 0;">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                                    <h1 class="modal-title">Travellers Details</h1>
                                 </div><!-- /.modal-header -->
                                 <div class="modal-body">
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label class="fixed-label">{{__('Adult:') }}</label>
                                          <br>
                                          <small>Age 13 and above</small>
                                       </div>
                                       <div class="col-md-9">
                                          <a class="label adult-travellers label-travellers z-depth-1 " >1</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 blue-dark ">2</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 " >3</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 " >4</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 " >5</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 " >6</a>
                                          <a class="label adult-travellers label-travellers z-depth-1" >7</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 " >8</a>
                                          <a class="label adult-travellers label-travellers z-depth-1 " >9</a>

                                       </div>  
                                       
                                    </div>
                                     <br>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label class="fixed-label">{{__('Children:') }}</label>
                                          <br>
                                          <small>Age 3 to 12</small>
                                       </div>

                                       <div class="col-md-9">
                                          <a class="label child-travellers label-travellers z-depth-1  blue-dark" >0</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >1</a>
                                          <a class="label child-travellers label-travellers z-depth-1 ">2</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >3</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >4</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >5</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >6</a>
                                          <a class="label child-travellers label-travellers z-depth-1" >7</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >8</a>
                                          <a class="label child-travellers label-travellers z-depth-1 " >9</a>
                                          
                                       </div>  
                                       
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-3">
                                          <label class="fixed-label">{{__('Infant:') }}</label>
                                          <br>
                                          <small>Age 0 - 2</small>
                                       </div>

                                       <div class="col-md-9">
                                           <a class="label infant-travellers label-travellers z-depth-1  blue-dark" >0</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >1</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 ">2</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >3</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >4</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >5</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >6</a>
                                          <a class="label infant-travellers label-travellers z-depth-1" >7</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >8</a>
                                          <a class="label infant-travellers label-travellers z-depth-1 " >9</a>
                                          
                                       </div>  
                                       
                                    </div>

                                 </div><!-- /.modal-body -->
                                 <div class="modal-footer">
                                    Total travellers : <span id="total-travellers">2</span>
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
                         @foreach($data['package_place'] as $place)

                           @if($place->nights_count!=0)
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;

                              //$place_city_name = CommonHelper::getcityName($place->city_id);
                              $package_hotel = CommonHelper::getPackageHotel($package_info->id,$place->city_id);
                              $amenity_count = count($package_hotel->amenities);
                             // dd($package_hotel->amenities);
                              $amenitystring = '';

                              foreach($package_hotel->amenities as $key => $amenity){
                                $amenitystring .= $amenity->amenities_name;
                                if($amenity_count-1 != $key){
                                  $amenitystring .= ', ';
                                } 
                              }

                              $roomtypesstring = '';
                              $type_count = count($package_hotel->roomtypes);

                              foreach($package_hotel->roomtypes as $key => $roomtype){
                                $roomtypesstring .= $roomtype->room_type;
                                if($type_count-1 != $key){
                                  $roomtypesstring .= ', ';
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
                                      <p class="sub-text mt10">{{ $roomtypesstring }}
                                        <button id="add_hotel_button_3" type="button" onclick="PickHotel({  cityid: {{ $place->city_id }},  stateid: {{ $place->state_id }}, cityname: '{{ $place_city_name }}', statename: '{{ $place_state_name }}' , cityimage: '{{ $place_city_image }}' })" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button>
                                      </p>
                                      <input type="text" class="hide" name="second_hotel_3[]" id="second_hotel_3" value="6">
                                      <input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="3">
                                    </div>
                                    @else
                                    <div class="media-left media-img">
                                      <a>
                                        <img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" alt="Hotel Image">
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
                                @endphp
                              <li>
                                <div id="city_activity_id_{{ $activity->id }}" class="msg-wrapper">
                                  <img src="{{ $act_image }}" alt="" class="avatar "><a class="msg-sub">{{ $activity->title_name }}</a><a class="msg-from"><i class="fa fa-inr"></i> {{ $activity->amount }}</a>
                                  <p><input type="text" class="hide" name="second_activity_{{$place->city_id}}[]" id="second_activity_{{$place->city_id}}" value="{{ $activity->id }}"><a onclick="return RemoveActivityDB({{ $package_info->id }}, {{ $activity->id }},{{$place->city_id}})" style="color: red;cursor:pointer;" class="">Remove</a></p>
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
                                  <p id="summary-nights"><span class="night-count">{{ $night_count }}</span> nights</p><span id="summary-days" class="text-small"><span class="days-count">{{ $place_counts+1 }}</span> days</span>
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
                                <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span class="summaryno"></span>.</span> <br> {{ $place_state_name }} - <span id="summary-city-name-{{$place->city_id}}">{{ $place_city_name }}</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-{{$place->city_id}}" value="{{$place->city_id}}"></div>

                                <div id="summary-hotelarea-{{$place->city_id}}" class="overall-place-activitylist">
                                  @if($place->nights_count!=0)
                                  @php
                                     $sum_package_hotel = CommonHelper::getPackageHotel($package_info->id,$place->city_id);
                                      $amenity_count = count($sum_package_hotel->amenities);
                                     
                                      $amenitystring = '';

                                      foreach($sum_package_hotel->amenities as $key => $amenity){
                                        $amenitystring .= $amenity->amenities_name;
                                        if($amenity_count-1 != $key){
                                          $amenitystring .= ', ';
                                        } 
                                      }

                                      $roomtypesstring = '';
                                      $type_count = count($sum_package_hotel->roomtypes);

                                      foreach($sum_package_hotel->roomtypes as $key => $roomtype){
                                        $roomtypesstring .= $roomtype->room_type;
                                        if($type_count-1 != $key){
                                          $roomtypesstring .= ', ';
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
                                  @endphp
                                  <div id="summary_city_activity_id_{{ $activity->id }}" class="">
                                    <h3 style="text-decoration: underline;">{{ $activity->title_name }} <a class="pull-right"><i class="fa fa-inr"></i> {{ $activity->amount }}</a></h3>
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
                                <button type="button" onclick="return DeleteNight(3)" class="btn btn-sm red waves-effect waves-circle waves-light">x</button>
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
                            <label for="total_package_value" class="col-sm-5 control-label">Total package value*
                              <br>
                              <small>[incl. Hotel+Activities]</small>
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
   <div id="CityHotelModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title" style="padding-left: 10px;">Choose your hotel</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                        <h4 id="hotelcityname" class="">Sarawak - Bintulu</h4>   
                        <div id="dayHotelScroll" class="col-sm-12">

                          <div id="dayHotelList" class="row ">
                              <div class="col-md-12">  

                                <div class="theme z-depth-2 hide">
                                  <div class="toolbar">
                                    <button class="btn-flat sort" data-sort="name">sort on hotel name</button>

                                    <!-- <select id="filterTeams" class="selectpicker hide" data-width="auto">
                                      <option value="">All Teams</option>
                                      <option value="Team A">Team A</option>
                                      <option value="Team B">Team B</option>
                                      <option value="Team C">Team C</option>
                                    </select> -->

                                    <div class="pull-right mr12">
                                      <div class="float-left input-field theme hidden-xs">
                                        <i class="mdi mdi-magnify prefix"></i>
                                <!-- IMPORTANT the input needs class="search" for list.js functions -->
                                        <input class="search" type="text" placeholder="Search...">
                                        <div class="input-highlight"></div>
                                      </div>              

                                      <div class="search-wrapper pull-right">     
                                        <i class="icon action mdi toolbar-search visible-xs-inline-block"></i>

                                        <form class="search-form visible-xs-inline-block">
                                          <div class="input-group">
                                            <span class="input-group-btn no-border">
                                              <i class="icon action mdi toolbar-back "></i>
                                            </span>
                                            <div class="input-field">
                                              <input type="search" class="search input no-border" placeholder="Search...">
                                            </div><!-- /.inpt-field -->
                                            <span class="input-group-addon no-border">
                                              <i class="icon mdi mdi-magnify"></i>
                                            </span>
                                          </div>
                                        </form>
                                      </div><!-- /.search-wrapper -->               
                                    </div>
                                  </div><!-- /.toolbar -->
                                </div>
                                
                            <!-- The class "list" on the UL element is needed for the list.js functions -->
                                <ul id="listhotelsarea" class="list list-group list-group-animation item-border paper">
                                    <!-- <li class="list-group-item">
                                      <div class="card ">
                                         <div class="media">
                                          <div class="media-left media-img"> <a href="#"><img class="responsive-img" src="{{ asset('public/assets/demo/images/demo-23.jpg') }}" style="height: 130px;" alt="..."></a></div>
                                          <div class="media-body p8">
                                            <div class="row">
                                              <div class="col-md-10">
                                                <h4 class="media-heading name">Test</h4><p>Sarawak - Bintulu</p><p class="sub-text mt10">Free Wifi, Free Drinks, Free Meal</p><p class="sub-text mt10">Deluxe, Premium</p>
                                              </div>
                                              <div class="col-md-2">
                                                <p style="margin-bottom: 10px;">at 2,226 more</p>
                                                
                                                <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(1)" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button>
                                                
                                                <button type="button" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button>
                                              </div>
                                            </div>
                                            
                                            
                                          </div>
                                          </div> 
                                         
                                       </div> 
                                    </li> -->
                                  
                                   
                                </ul>
                              </div><!-- /.col -->
                              <div class="clearfix">  </div>
                            </div><!-- /.row -->        
                            <!-- <input class="hide" id="hotelid" name="hotelid" type="text">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-field label-float">
                                        <input placeholder="Country Name" class="clearable" id="country_name" name="country_name" autofocus type="text">
                                        <label for="country_name" class="fixed-label">{{__('Country Name') }}*</label>
                                        <div class="input-highlight"></div>
                                    </div>
                                   
                                </div>

                            </div>-->
                           
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                        
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
     <!-- /.container-fluid style="top: -44px;" -->
   <div id="CityHotelDetailsModal" class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme-accent">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title">Hotel details</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                       <div id="dayHotelScroll" class="col-sm-12">
                          <div class="row">
                            <div id="hotel-leftpanel" class="col-md-6">
                              <h2 id="view-hotel-name" class="">La Digue Island Lodge</h2>
                              <p id="view-state-city-name" class="address">Anse Reunion, La Digue</p>

                              <div class="hotel-rating-details">
                                 <img id="view-city-full-image" src="{{ asset('public/assets/demo/images/demo-12.jpg') }}" alt="" style="width: 100%;height: 230px;" class="img-responsive">
                                  <!--<div class="right-part">80 Good <a class="sur-ipink">(156 reviews)</a></div>-->
                                  <div style="clear:both"></div>
                              </div> 
                              <div class="row ">

                                  <div class="divider theme ml14 mr14"></div>
                                  <div id="view-hotel-imagearea">
                                  </div>
                                  
                              </div>   
                              <br>
                              <h2>Ameneties</h2>
                              <div id="ameneties-list-container" class="ameneties-list-container">
                                
                                 <div style="clear:both"></div>                                                                                         
                              </div>
                            <!--   <div class="hotel-description">
                                  <p><b>Property Location</b> <br>With a stay at La Digue Island Lodge in La Digue, you'll be on the beach, within a 5-minute drive of Source D'Argent Beach and Anse Severe Beach.  This beach hotel is 7.8 mi (12.6 km) from Vallee de Mai Nature Reserve and 9.4 mi (15.1 km) from Grand Anse Beach.</p>
                                  <p><b>Rooms</b> <br>Make yourself at home in one of the 89 air-conditioned rooms featuring refrigerators. Cable television is provided for your entertainment. Private bathrooms with bathtubs or showers feature complimentary toiletries and bathrobes. Conveniences include safes and desks, and housekeeping is provided daily.</p>
                              </div> -->
                              
                               <h2>Overview </h2>
                               
                              <div id="view-hotel-overview" class="hotel-description">
                                 
                              </div>
                            </div>
                            <div id="hotel-rightpanel" class="col-md-6">
                              <h2>Room Types</h2>
                              <div id="view-hotel-roomtypes" class="room-type-header">

                              </div>
                               <h2>Listing Descriptions </h2>
                              <div id="view-hotel-listdescription" class="hotel-description">

                              </div>
                              <br><br>
                               <!-- <div class="room-type-header">
                                  <h3>
                                      Yellow House - Adults Only 1 double bed &nbsp;(Non refundable) </h3>
                                  <div>at <i class="fa fa-inr"></i> 14,460 more</div>
                                  <a class="popover-anchor" data-toggle="popover" data-trigger="hover" data-placement="left" data-container="body" data-title="Cancellation Policy" data-content="This rate is non-refundable. If you choose to change or cancel this booking you will not be refunded any of the payment." data-original-title="" title="">Cancellation Policy</a>
                                  

                              </div>
                               <div class="hotel-description">
                                  Extra-person charges may apply and vary depending on property policy. <br>Government-issued photo identification and a credit card, debit card, or cash deposit are required at check-in for incidental charges. <br>Special requests are subject to availability upon check-in and may incur additional charges. Special requests cannot be guaranteed.  <ul><li>No onsite parking is available. </li>Please note that cultural norms and guest policies may differ by country and by property. The policies listed are provided by the property. </ul> Outside food and beverages are not permitted on the premises. For more details, please contact the property using the information on the reservation confirmation received after booking.
                              </div> -->
                              <button id="viewhotelconfirm" type="button" onclick="" class="btn btn-sm green waves-effect waves-theme">Confirm</button>
                            </div>
                          </div>
                           
                              
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- /.container-fluid -->
   <div id="CityActivityModal" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title" style="padding-left: 10px;">Choose your activity</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                        <h4 id="activitycityname" class="">Sarawak - Bintulu</h4>   
                        <div id="dayactivityScroll" class="col-sm-12">

                          <div id="dayActivityList" class="row ">
                              <div class="col-md-12">  

                                <div class="theme z-depth-2 hide">
                                  <div class="toolbar">
                                    <button class="btn-flat sort" data-sort="name">sort on hotel name</button>

                                    <!-- <select id="filterTeams" class="selectpicker hide" data-width="auto">
                                      <option value="">All Teams</option>
                                      <option value="Team A">Team A</option>
                                      <option value="Team B">Team B</option>
                                      <option value="Team C">Team C</option>
                                    </select> -->

                                    <div class="pull-right mr12">
                                      <div class="float-left input-field theme hidden-xs">
                                        <i class="mdi mdi-magnify prefix"></i>
                                <!-- IMPORTANT the input needs class="search" for list.js functions -->
                                        <input class="search" type="text" placeholder="Search...">
                                        <div class="input-highlight"></div>
                                      </div>              

                                      <div class="search-wrapper pull-right">     
                                        <i class="icon action mdi toolbar-search visible-xs-inline-block"></i>

                                        <form class="search-form visible-xs-inline-block">
                                          <div class="input-group">
                                            <span class="input-group-btn no-border">
                                              <i class="icon action mdi toolbar-back "></i>
                                            </span>
                                            <div class="input-field">
                                              <input type="search" class="search input no-border" placeholder="Search...">
                                            </div><!-- /.inpt-field -->
                                            <span class="input-group-addon no-border">
                                              <i class="icon mdi mdi-magnify"></i>
                                            </span>
                                          </div>
                                        </form>
                                      </div><!-- /.search-wrapper -->               
                                    </div>
                                  </div><!-- /.toolbar -->
                                </div>
                                
                            <!-- The class "list" on the UL element is needed for the list.js functions -->
                                <ul id="listactivitiesarea" class="list list-group list-group-animation item-border paper">
                                    <!-- <li class="list-group-item">
                                      <div class="card ">
                                         <div class="media">
                                          <div class="media-left media-img"> <a href="#"><img class="responsive-img" src="{{ asset('public/assets/demo/images/demo-23.jpg') }}" style="height: 130px;" alt="..."></a></div>
                                          <div class="media-body p8">
                                            <div class="row">
                                              <div class="col-md-10">
                                                <h4 class="media-heading name">Test</h4><p>Sarawak - Bintulu</p><p class="sub-text mt10">Free Wifi, Free Drinks, Free Meal</p><p class="sub-text mt10">Deluxe, Premium</p>
                                              </div>
                                              <div class="col-md-2">
                                                <p style="margin-bottom: 10px;">at 2,226 more</p>
                                                
                                                <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(1)" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button>
                                                
                                                <button type="button" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button>
                                              </div>
                                            </div>
                                            
                                            
                                          </div>
                                          </div> 
                                         
                                       </div> 
                                    </li> -->
                                  
                                   
                                </ul>
                              </div><!-- /.col -->
                              <div class="clearfix">  </div>
                            </div><!-- /.row -->        
                            <!-- <input class="hide" id="hotelid" name="hotelid" type="text">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-field label-float">
                                        <input placeholder="Country Name" class="clearable" id="country_name" name="country_name" autofocus type="text">
                                        <label for="country_name" class="fixed-label">{{__('Country Name') }}*</label>
                                        <div class="input-highlight"></div>
                                    </div>
                                   
                                </div>

                            </div>-->
                           
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                        
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <div id="CityActivityDetailsModal" class="modal" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header theme-accent">
                    <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                    <h1 class="modal-title">Activity details</h1>
                </div><!-- /.modal-header -->
                
                    <div class="modal-body">
                       <div id="dayHotelScroll" class="col-sm-12">
                          <div class="row">
                            <div id="hotel-leftpanel" class="col-md-6">
                              <h2 id="view-activity-name" class="">La Digue Island Lodge</h2>
                              <p id="activity-state-city-name" class="address">Anse Reunion, La Digue</p>

                              <div class="hotel-rating-details">
                                 <img id="view-activity-full-image" src="{{ asset('public/assets/demo/images/demo-12.jpg') }}" alt="" style="width: 100%;height: 230px;" class="img-responsive">
                                  <!--<div class="right-part">80 Good <a class="sur-ipink">(156 reviews)</a></div>-->
                                  <div style="clear:both"></div>
                              </div> 
                              <div class="row ">

                                  <div class="divider theme ml14 mr14"></div>
                                  <div id="view-activity-imagearea">
                                  </div>
                                  
                              </div>   
                              <br>
                             
                            <!--   <div class="hotel-description">
                                  <p><b>Property Location</b> <br>With a stay at La Digue Island Lodge in La Digue, you'll be on the beach, within a 5-minute drive of Source D'Argent Beach and Anse Severe Beach.  This beach hotel is 7.8 mi (12.6 km) from Vallee de Mai Nature Reserve and 9.4 mi (15.1 km) from Grand Anse Beach.</p>
                                  <p><b>Rooms</b> <br>Make yourself at home in one of the 89 air-conditioned rooms featuring refrigerators. Cable television is provided for your entertainment. Private bathrooms with bathtubs or showers feature complimentary toiletries and bathrobes. Conveniences include safes and desks, and housekeeping is provided daily.</p>
                              </div> -->
                              
                               <h2>Overview </h2>
                               
                              <div id="view-activity-overview" class="hotel-description">
                                 
                              </div>
                            </div>
                            <div id="hotel-rightpanel" class="col-md-6">
                              <h2 id="activity_duration"> <span id="view_activity_duration"> Room Types </span>  <a id="activity_price" class="pull-right">1500</a></h2>
                              <div id="view-hotel-roomtypes" class="room-type-header">

                              </div>
                               <h2>Inclusions </h2>
                                <div id="view-activity-inclusion" class="hotel-description">
                                  <ul id="view-activity-inclusion-list">
                                    
                                  </ul>
                                </div>
                              <br>
                               <h2>Exclusions </h2>
                                <div id="view-activity-exclusion" class="hotel-description">
                                  <ul id="view-activity-exclussion-list">
                                   
                                  </ul>
                                </div>
                              <br>
                               <h2>Additional info </h2>
                                <div id="view-activity-additional-info" class="hotel-description">
                                 
                               </div>
                               <!-- <div class="room-type-header">
                                  <h3>
                                      Yellow House - Adults Only 1 double bed &nbsp;(Non refundable) </h3>
                                  <div>at <i class="fa fa-inr"></i> 14,460 more</div>
                                  <a class="popover-anchor" data-toggle="popover" data-trigger="hover" data-placement="left" data-container="body" data-title="Cancellation Policy" data-content="This rate is non-refundable. If you choose to change or cancel this booking you will not be refunded any of the payment." data-original-title="" title="">Cancellation Policy</a>
                                  

                              </div>
                               <div class="hotel-description">
                                  Extra-person charges may apply and vary depending on property policy. <br>Government-issued photo identification and a credit card, debit card, or cash deposit are required at check-in for incidental charges. <br>Special requests are subject to availability upon check-in and may incur additional charges. Special requests cannot be guaranteed.  <ul><li>No onsite parking is available. </li>Please note that cultural norms and guest policies may differ by country and by property. The policies listed are provided by the property. </ul> Outside food and beverages are not permitted on the premises. For more details, please contact the property using the information on the reservation confirmation received after booking.
                              </div> -->
                              <button id="viewactivityconfirm" type="button" onclick="" class="btn btn-sm green waves-effect waves-theme">Confirm</button>
                            </div>
                          </div>
                           
                              
                            
                        </div><!-- /.row -->    
                    </div><!-- /.modal-body -->
                    <div class="modal-footer">
                        <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                    </div><!-- /.modal-footer -->
              
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
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
              $("#travel-section").addClass('hide');
              $(".price-section").removeClass('hide');
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
    $('#overview').summernote({
      height: 200,   //set editable area's height
      placeholder: 'Write here...'
    });
    $('#additional_info').summernote({
      height: 200,   //set editable area's height
      placeholder: 'Write here...'
    });
    $(function() {
      // $('select[name=country_id]').change(function() {
      //    // alert('ok');
          
      // });
   
      // $('select[name=state_id]').change(function() {
      //    // alert('ok');
      //     var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
          
      // });
      $(".adult-travellers").click(function(){
         var person_no = $(this).text();
         $('.adult-travellers').removeClass('blue-dark');
         $(this).addClass('blue-dark');
         $("#adult-count-val").val(parseInt(person_no));
         $(".adult-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
      $(".child-travellers").click(function(){
         var person_no = $(this).text();
         $('.child-travellers').removeClass('blue-dark');
         $(this).addClass('blue-dark');
         $("#child-count-val").val(parseInt(person_no));
         $(".child-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
       $(".infant-travellers").click(function(){
         var person_no = $(this).text();
         $('.infant-travellers').removeClass('blue-dark');
         $(this).addClass('blue-dark');
         $("#infant-count-val").val(parseInt(person_no));
         $(".infant-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
   });
   function CalculateTotalTravellers(){
      var childcount =parseInt($("#child-count-val").val());
      var adultcount =parseInt($("#adult-count-val").val());
      var infantcount =parseInt($("#infant-count-val").val());
      $("#total-travellers").text(childcount+adultcount+infantcount);
   }
   function ChangeStates(countryid,ref){
      var url = "{{ url('get-state-list') }}" + '?country_id=' + countryid;
      if(ref==0){
         var country_prefix='from_';
      }else{
         var country_prefix='to_';
      }
      var stateid = country_prefix+'state_id';
   
       $.get(url, function(data) {
           $('#'+stateid).empty('');
           $('#'+stateid).append("<option value=''>Select</option>");
           $('#'+stateid).selectpicker("refresh");
           //var select = $('form select[name=state_id]');
           if(ref==1){
               $("#destination-division").empty();
           }
           
          
          // select.empty();
           //$("#state_id").append("<option value=''>Select</option>");
           $.each(data, function(key, value) {
               $('#'+stateid).append('<option data-statename="'+value.state_name+'" value=' + value.id + '>' + value.state_name +
                   '</option>');
                 if(ref==1){
                     var dest_data = '<div id="state-cities-'+value.id+'" class="col-md-12 state-cities"><h5 class="text-headline text-bold">'+value.state_name+'</h5><div class="destination-city" id="destination-city-'+value.id+'"></div></div>';
                     var city_url = "{{ url('get-cities-list') }}" + '?State_id=' + value.id;
                    $("#destination-division").append(dest_data);
                    var cities_sec='';
                     $.get(city_url, function(citydata) {
                        $.each(citydata, function(citykey, cityvalue) {
                          //console.log(cityvalue.city_image);
                           var paramscity = "{  cityid: "+cityvalue.id+",  stateid: "+value.id+", cityname: '"+cityvalue.city_name+"', statename: '"+value.state_name+"' , cityimage: '"+cityvalue.city_image+"' }";
                           cities_sec += '<button id="place_button_'+cityvalue.id+'" type="button" onClick="PickPlace('+paramscity+')" class="btn theme-accent waves-effect waves-light "><i class="mdi mdi-plus left"></i>'+cityvalue.city_name+'</button>';
                        });
                        if(cities_sec!=""){
                           $("#destination-city-"+value.id).append(cities_sec);
                        }else{
                           $("#state-cities-"+value.id).addClass('hide');
                        }
                        
                     });
                   
                     
                     
                 }
           });
            $('#'+stateid).selectpicker("refresh");
       });
   }
   function ChangeCities(stateid,ref){
      var url = "{{ url('get-cities-list') }}" + '?State_id=' + stateid;
      if(ref==0){
         var country_prefix='from_';
      }else{
         var country_prefix='to_';
      }
      var cityid = country_prefix+'city_id';
      $.get(url, function(data) {
           $('#'+cityid).empty('');
           $('#'+cityid).append("<option value=''>Select</option>");
           $('#'+cityid).selectpicker("refresh");
           //var select = $('form select[name=state_id]');

          // select.empty();
           //$("#state_id").append("<option value=''>Select</option>");
           $.each(data, function(key, value) {
               $('#'+cityid).append('<option data-image="'+value.city_image+'" value=' + value.id + '>' + value.city_name +
                   '</option>');
           });
            $('#'+cityid).selectpicker("refresh");
       });

       if(ref==1){
          var selected = $("#to_state_id").find('option:selected');
          var statename = selected.data('statename'); 
          $("#summary-state").html(statename);
       }
       
   }
</script>
@endsection
@section('footerSecondSection')
<script type="text/javascript">
   (function($){
      // alert('df');
      setTimeout(AddHiddenMenu, 1000);
      // $(".main-wrapper").addClass('menu-hidden');
      // Options on smoothscroll plugin
      smoothScroll.init({
            speed: 800,
            easing: 'easeInOutCubic',
            offset: 0,
            updateURL: false
      });

   // Sortable 

      // list
      //$("#place-sortList").sortable();
   })(jQuery);
   function AddHiddenMenu(){
    //alert('Test');
     $(".main-wrapper").addClass('menu-hidden');
   }
   function PickPlace(paramscity){
      
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var imagelocation = paramscity.cityimage=='null' || paramscity.cityimage=='' ? no_image_url : image_url+'/city/'+paramscity.cityimage;
      var imagedummy =  no_image_url;

    //console.log(paramscity);
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //var passparamscity = '"'+paramscity+'"';
      $("#place_button_"+paramscity.cityid).attr("disabled", true);
      $("#place-sortList").append('<li data-cityid="'+paramscity.cityid+'" id="picked-li-'+paramscity.cityid+'" class="list-group-item cityplace sort-handle"> . '+paramscity.statename+' - '+paramscity.cityname+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+paramscity.cityid+'" value="'+paramscity.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></li>');

      var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

    
      $("#destination-night-area").append('<div data-cityid="'+paramscity.cityid+'" id="place_night_'+paramscity.cityid+'" class="col-xs-6 col-sm-6 col-md-4 mt20"><img class="responsive-img z-depth-1" src="'+imagelocation+'" style="width:190px;height: 100px;" alt=""><div id="place_night_remove_'+paramscity.cityid+'" class="button-close"> <button type="button" onclick="return DeleteNight('+paramscity.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+paramscity.cityname+'</small><div class="form-group"><select id="place_night_select_'+paramscity.cityid+'" name="place_night_select[]" class="form-control place-night-select">'+night_options+'</select><input type="text" class="hide" id="place_night_count_'+paramscity.cityid+'" name="place_night_count_'+paramscity.cityid+'[]" value="1" ></input></div></div>');  

      $("#place-hotels").append('<li data-cityid="'+paramscity.cityid+'" id="picked-hotelli-'+paramscity.cityid+'" class="tl-item"><div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+paramscity.cityid+'" class="media"><div class="media-left media-img"><a><img class="responsive-img" src="'+imagedummy+'" alt="Hotel Image"></a></div><div class="media-body p10"><h4 class="media-heading">Please choose hotel</h4> <button id="add_hotel_button_'+paramscity.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add Hotel</button></div></div></div></li>');

      $("#place-activities").append('<li data-cityid="'+paramscity.cityid+'" id="picked-activityli-'+paramscity.cityid+'" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><ul id="place-activitylist-'+paramscity.cityid+'" style="list-style: none !important;" class="place-activitylist"></ul><a id="pick-actitity-link-'+paramscity.cityid+'" href="#" onClick="PickActity('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>');

      $("#overall-summary").append('<li data-cityid="'+paramscity.cityid+'" id="summary-activityli-'+paramscity.cityid+'" class="tl-item summary-activity list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span class="summaryno"></span>.</span> <br> '+paramscity.statename+' - <span id="summary-city-name-'+paramscity.cityid+'">'+paramscity.cityname+'</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></div><div id="summary-hotelarea-'+paramscity.cityid+'" class="overall-place-activitylist"> <div id="summary_hotel_id_'+paramscity.cityid+'" class="msg-wrapper"><img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+paramscity.cityid+'" src="'+imagedummy+'" alt="" class="avatar "><a id="summary-hotel-name-'+paramscity.cityid+'" class="msg-from"  style="display: initial;"></a><br><a id="summary-hotel-type-'+paramscity.cityid+'" class="msg-sub"></a><p id="summary-features-'+paramscity.cityid+'"></p></div><div style="clear:both"></div></div><div style="clear:both"></div><div id="summary-activity-section-'+paramscity.cityid+'" class="activities-summary"> </div></li>');

       $("#place-activitylist-"+paramscity.cityid).dragsort();

      
      $("#summary-cities").append(paramscity.cityname+', ');
      $(".place-night-select").trigger('change');

      var numItems = $('.cityplace').length;
      //console.log(numItems);
      $(".days-count").html(parseInt(numItems)+parseInt(1));
      
   }
   function DeleteNight(cityid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
           $("#place_night_"+cityid).remove();
           $("#picked-hotelli-"+cityid).remove();
           $("#summary_hotel_id_"+cityid).remove();
           $(".place-night-select").trigger('change');
      }else{
       // alert('Failed to delete');
      }
      
  }
  function PickHotel(paramscity){
     var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";

      $("#listhotelsarea").empty();
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_hotels') }}" + '?city_id=' + paramscity.cityid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
               //console.log(resultdata);

               $.each(resultdata, function(key, value) {
                  var amenitieslist = value.amenities;
                  var amenitiesString = '';
                  var amenities_len = amenitieslist.length;
                  $.each(amenitieslist, function(keya, valuea) {
                    //console.log(keya);
                    amenitiesString += valuea.amenities_name;
                    if(amenities_len-1!=keya){
                        amenitiesString += ', ';
                    }
                  }); 
                  var roomtypeslist = value.roomtypes;
                  var roomtypesString = '';
                  var roomtypes_len = roomtypeslist.length;
                  $.each(roomtypeslist, function(keya, valuea) {
                    //console.log(keya);
                    roomtypesString += valuea.room_type;
                    if(roomtypes_len-1!=keya){
                        roomtypesString += ', ';
                    }
                  }); 
                  var hotelimages = value.hotelimages;
                  var imagelocation = no_image_url;

                  if(hotelimages.length>0){
                     var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                  }
                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? no_image_url : image_url+'/city/'+paramscity.cityimage;

                  $("#listhotelsarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 130px;" alt="Hotel Image"></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.hotel_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+'</p></div><div class="col-md-2"> <p style="margin-bottom: 10px;">at 2,226 more</p><button type="button" id="viewhotelid" onclick="return ViewHotelDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button  id="hotellistconfirm" type="button" onclick="return ConfirmHotel('+value.id+','+paramscity.cityid+','+passparamscity+')" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
                
                });
              // $('#masterid').val(result.id);
              // $('#masterid').attr('data-autoid', result.id);
              // $('#country_name').val(result.country_name);
              
          }
      });
     

      $("#hotelcityname").html(place_area);
      $("#activitycityname").html(place_area);
      $("#CityHotelModal").modal();
  }
  $(document).ready(function() {

      var options = {
        // the classnames where we can filter on
          valueNames: [ 'name', 'area' ] 
      };

      // teamList is the ID on the list wrapper in the html markup.
     // var dayHotelList = new List('dayHotelList', options);

      // Filter function on the select
      // $('#filterTeams').on('change', function() {
      //   var filterItem = $(this).val();

      //   //check if the selected option has a value.
      //   if (filterItem.length) {
      //     alert('hi');
      //     demoList.filter(function(item) {
      //           return (item.values().team === filterItem);
      //       });
      //     $("#listhotelsarea").mCustomScrollbar({
      //         theme:"dark",
      //         autoHideScrollbar: true,
      //         setHeight: 250,
      //     });
      //     // If value is empty reset filters.
      //   } else {
      //     demoList.filter();
      //     $("#listhotelsarea").mCustomScrollbar({
      //         theme:"dark",
      //         autoHideScrollbar: true,
      //         setHeight: 250,
      //     });
      //   }
      // });

      prettyPrint();

      $("#dayHotelScroll,#hotel-leftpanel,#hotel-rightpanel,#dayactivityScroll").mCustomScrollbar({
          theme:"dark",
          autoHideScrollbar: true,
          setHeight: 480,
      });
      // $("#listhotelsarea").mCustomScrollbar({
      //         theme:"dark",
      //         autoHideScrollbar: true,
      //         setHeight: 250,
      //     });


    });
  function ViewHotelDetails(hotelid,paramscity){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //console.log(paramscity);
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_hotels_details') }}" + '?hotel_id=' + hotelid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
            $("#view-hotel-name").html(resultdata.hotel_name);
            $("#view-state-city-name").html(place_area);
             var hotelimages = resultdata.hotelimages;
              var imagelocation = no_image_url;

              if(hotelimages.length>0){
                 var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
              }
            $("#view-city-full-image").attr("src", imagelocation);
            $("#view-hotel-imagearea").empty();
            $.each(hotelimages, function(key, value) {
              var imagefolder = image_url+'/hotels/';
              if(key<=4){
                var imagefullname = imagefolder+value.image_name;
                var passimagename = "{  imagename: '"+imagefullname+"' }";
                $("#view-hotel-imagearea").append('<div class="col-xs-12 col-sm-3 mt20"><img onclick="return setFullImage('+passimagename+')" style="width:100px;height:65px;cursor:pointer;" class="responsive-img z-depth-1" src="'+imagefullname+'" alt=""></div>');
              }
            });

            var amenitieslist = resultdata.amenities;
            $("#ameneties-list-container").empty();
            $.each(amenitieslist, function(keya, valuea) {
              $("#ameneties-list-container").append('<a>'+valuea.amenities_name+'</a>');
            }); 

            $("#ameneties-list-container").append('<div style="clear:both"></div>');

            $("#view-hotel-overview").html(resultdata.overview);

             var roomtypeslist = resultdata.roomtypes;
             $("#view-hotel-roomtypes").empty();
            $.each(roomtypeslist, function(keya, valuea) {
              //console.log(keya);
              $("#view-hotel-roomtypes").append('<h3>'+valuea.room_type+'</h3><div>at <i class="fa fa-inr"></i> 14,460 more</div><br><br>');
             
            }); 
             $("#view-hotel-roomtypes").append('<div style="clear:both"></div>');

            $("#view-hotel-listdescription").html(resultdata.listing_descriptions);
            $('#viewhotelconfirm').attr('onclick', 'return ConfirmHotel('+resultdata.id+','+paramscity.cityid+','+passparamscity+')');
          }
      });

    $("#CityHotelDetailsModal").modal();
  }

  function setFullImage(imageobj){
    var imagename = imageobj.imagename;
    $("#view-city-full-image").attr("src", imagename);
    
  }
  function ConfirmHotel(hotelid,cityid,paramscity){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    $("#picked-hotelmedia-"+cityid).empty();
    //var imagename ='';
    var place_area = paramscity.statename+' - '+paramscity.cityname;

    var url = "{{ url('/city_hotels_details') }}" + '?hotel_id=' + hotelid;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(resultdata) {
           var hotelimages = resultdata.hotelimages;
            var imagelocation = no_image_url;

            if(hotelimages.length>0){
               var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
            }

            var amenitieslist = resultdata.amenities;
            var amenitiesString = '';
            var amenities_len = amenitieslist.length;
            $.each(amenitieslist, function(keya, valuea) {
              //console.log(keya);
              amenitiesString += valuea.amenities_name;
              if(amenities_len-1!=keya){
                  amenitiesString += ', ';
              }
            }); 

            var roomtypeslist = resultdata.roomtypes;
            var roomtypesString = '';
            var roomtypes_len = roomtypeslist.length;
            $.each(roomtypeslist, function(keya, valuea) {
              //console.log(keya);
              roomtypesString += valuea.room_type;
              if(roomtypes_len-1!=keya){
                  roomtypesString += ', ';
              }
            }); 

            var hiddenvalues = '<input type="text" class="hide" name="second_hotel_'+cityid+'[]" id="second_hotel_'+cityid+'" value="'+resultdata.id+'"/><input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="'+cityid+'"/>';

            $("#picked-hotelmedia-"+cityid).append('<div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="Hotel Image"></a></div><div class="media-body p10"><h4 class="media-heading">'+resultdata.hotel_name+'</h4><p>'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <button id="add_hotel_button_'+cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button></p>'+hiddenvalues+'</div>');
              $("#summary_hotel_id_"+cityid+" #summary-hotel-img-"+cityid).attr("src", imagelocation);
              $("#summary_hotel_id_"+cityid+" #summary-hotel-name-"+cityid).html( resultdata.hotel_name);
              $("#summary_hotel_id_"+cityid+" #summary-hotel-type-"+cityid).html( roomtypesString);
              $("#summary_hotel_id_"+cityid+" #summary-features-"+cityid).html( amenitiesString);
        }
    });

    
    //alert(hotelid);
    $("#CityHotelDetailsModal").modal('hide');
    $("#CityHotelModal").modal('hide')
  }
  function PickActity(paramscity){
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";

      $("#listactivitiesarea").empty();
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_activities') }}" + '?city_id=' + paramscity.cityid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
               //console.log(resultdata);

               $.each(resultdata, function(key, value) {
                
                  var activityimages = value.activity_images;
                  var imagelocation = no_image_url;

                  if(activityimages.length>0){
                     var imagelocation = image_url+'/activity/'+activityimages[0].image_name
                  }

                  var activityduration = (value.duartion_hours/60).toFixed(0)+' hour '+(value.duartion_hours%60)+' minutes';
                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? no_image_url : image_url+'/city/'+paramscity.cityimage;

                  $("#listactivitiesarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 125px;" alt="Hotel Image"></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.title_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+activityduration+'</p></div><div class="col-md-2"> <p style="margin-bottom: 10px;">at '+value.amount+'</p><button type="button" id="viewactivityid" onclick="return ViewActivityDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button  id="activitylistconfirm" type="button" onclick="return ConfirmActivity('+value.id+','+paramscity.cityid+','+passparamscity+')" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
                });
              // $('#masterid').val(result.id);
              // $('#masterid').attr('data-autoid', result.id);
              // $('#country_name').val(result.country_name);
              
          }
      });
     

      $("#hotelcityname").html(place_area);
      $("#activitycityname").html(place_area);
      $("#CityActivityModal").modal();
  }

  function ViewActivityDetails(activityid,paramscity){
    console.log(activityid);
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //console.log(paramscity);
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_activity_details') }}" + '?activity_id=' + activityid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
            $("#view-activity-name").html(resultdata.title_name);
            $("#activity-state-city-name").html(place_area);
             var activityimages = resultdata.activity_images;
              var imagelocation = no_image_url;
              if(activityimages!=null){
                 if(activityimages.length>0){
                   var imagelocation = image_url+'/activity/'+activityimages[0].image_name
                }
              }
             
            $("#view-activity-full-image").attr("src", imagelocation);
            $("#view-activity-imagearea").empty();
            if(activityimages!=null){
              $.each(activityimages, function(key, value) {
                var imagefolder = image_url+'/activity/';
                if(key<=4){
                  var imagefullname = imagefolder+value.image_name;
                  var passimagename = "{  imagename: '"+imagefullname+"' }";
                  $("#view-activity-imagearea").append('<div class="col-xs-12 col-sm-3 mt20"><img onclick="return setActivityFullImage('+passimagename+')" style="width:100px;height:65px;cursor:pointer;" class="responsive-img z-depth-1" src="'+imagefullname+'" alt=""></div>');
                }
              });
            }

            // var amenitieslist = resultdata.amenities;
            // $("#ameneties-list-container").empty();
            // $.each(amenitieslist, function(keya, valuea) {
            //   $("#ameneties-list-container").append('<a>'+valuea.amenities_name+'</a>');
            // }); 

            // $("#ameneties-list-container").append('<div style="clear:both"></div>');

              var activityduration = (resultdata.duartion_hours/60).toFixed(0)+' hour '+(resultdata.duartion_hours%60)+' minutes';
            $("#view-activity-overview").html(resultdata.overview);
            $("#view-activity-additional-info").html(resultdata.additional_info);
            $("#view_activity_duration").html(activityduration);
            $("#activity_price").html( 'at '+resultdata.amount);

            $("#view-activity-inclusion-list").empty();
            //  var roomtypeslist = resultdata.roomtypes;
            //  $("#view-hotel-roomtypes").empty();
            //console.log(resultdata.inclusion_name);
             if(resultdata.inclusion_name!='null' && resultdata.inclusion_name!=null && !$.isEmptyObject(resultdata.inclusion_name)){
              $.each(JSON.parse(resultdata.inclusion_name), function(keya, valuea) {
             
                $("#view-activity-inclusion-list").append('<li>'+valuea+'</li>');
               
              }); 
            }

            $("#view-activity-exclussion-list").empty();
            //  var roomtypeslist = resultdata.roomtypes;
            //  $("#view-hotel-roomtypes").empty();
            if(resultdata.exclusion_name!='null' && resultdata.exclusion_name!=null && !$.isEmptyObject(resultdata.exclusion_name)){
              $.each(JSON.parse(resultdata.exclusion_name), function(keya, valuea) {
             
                $("#view-activity-exclussion-list").append('<li>'+valuea+'</li>');
               
              }); 
            }
            //  $("#view-hotel-roomtypes").append('<div style="clear:both"></div>');

            //$("#view-hotel-listdescription").html(resultdata.listing_descriptions);
            $('#viewactivityconfirm').attr('onclick', 'return ConfirmActivity('+activityid+','+paramscity.cityid+','+passparamscity+')');
          }
      });

    $("#CityActivityDetailsModal").modal();
  }

  function setActivityFullImage(imageobj){
    var imagename = imageobj.imagename;
    $("#view-activity-full-image").attr("src", imagename);
    
  }
  function ConfirmActivity(activityid,cityid,paramscity){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    //$("#picked-hotelmedia-"+cityid).empty();
    //var imagename ='';
    var place_area = paramscity.statename+' - '+paramscity.cityname;

    var url = "{{ url('/city_activity_details') }}" + '?activity_id=' + activityid;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(resultdata) {
           var hotelimages = resultdata.activity_images;
            var imagelocation = no_image_url;

            if(hotelimages.length>0){
               var imagelocation = image_url+'/activity/'+hotelimages[0].image_name
            }

            var hiddenvalues = '<input type="text" class="hide" name="second_activity_'+cityid+'[]" id="second_activity_'+cityid+'" value="'+resultdata.id+'"/>';

            if(!$('#city_activity_id_'+resultdata.id).length){
              $("#place-activitylist-"+cityid).append('<li><div id="city_activity_id_'+resultdata.id+'" class="msg-wrapper"><img src="'+imagelocation+'" alt="" class="avatar "><a class="msg-sub">'+resultdata.title_name+'</a><a class="msg-from"><i class="fa fa-inr"></i> '+resultdata.amount+'</a><p>'+hiddenvalues+'<a onclick="return RemoveActivity('+resultdata.id+','+cityid+')" style="color: red;cursor:pointer;" class="">Remove</a></p></div></li>');
              var act_overview  = resultdata.overview != null ? resultdata.overview : '';
               var activityduration = (resultdata.duartion_hours/60).toFixed(0)+' hour '+(resultdata.duartion_hours%60)+' minutes';
              $("#summary-activity-section-"+cityid).append('<div id="summary_city_activity_id_'+resultdata.id+'" class=""><h3 style="text-decoration: underline;">'+resultdata.title_name+' <a class="pull-right"><i class="fa fa-inr"></i> '+resultdata.amount+'</a></h3><div class="sub-summary-activity"><h5>Overview</h5><div id="activity-summary-overview" class="activity-description"> '+act_overview+'</div><h5>Duration: '+activityduration+'</h5></div></div>');
             $("#pick-actitity-link-"+cityid).css('top','-20px');
            }else{
              alert("Activity already choosed");
            }

            
        }
    });

    
    //alert(hotelid);
    $("#CityActivityDetailsModal").modal('hide');
    $("#CityActivityModal").modal('hide')
  }
  function RemoveActivity(activityid,cityid){
    $("#city_activity_id_"+activityid).remove();
  }
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
  // $( "#overall-summary" ).sortable({
  //     sort: function( event, ui ) {
  //       alert('test');
  //     }
  //   });
  //$( "#overall-summary" ).
  // $(document).on('blur', '#overall-summary', function() {
  //  alert('hi');
  // });
   // $('#place-sortList').on('contentChanged',function(){alert('UL content changed!!!');});
   function ChangeCityvalues(refid){
      var selected = $("#"+refid).find('option:selected');
      var imagename = selected.data('image'); 
      var imagelocation = imagename=='null' ? no_image_url : image_url+'/city/'+imagename;
      $("#summary-banner").attr("src", imagelocation);
   }
    function saveOrder() {
       $("#summary-cities").empty();
      $("#dummyList").empty();
      $("#dummyList").append($("#place-sortList").clone());
      $('#dummyList #place-sortList').prop('id', 'dummy-place-sortList');

      $("#dummy-hotels,#dummy-activities,#dummyListNights").empty();
      $("#dummy-hotels").append($("#place-hotels").clone());
      $('#dummy-hotels #place-hotels').prop('id', 'dummy-place-hotels');

      $("#dummy-activities").append($("#place-activities").clone());
      $('#dummy-activities #place-activities').prop('id', 'dummy-place-activities');

      $("#dummyListNights").append($("#destination-night-area").clone());
      $('#dummyListNights #destination-night-area').prop('id', 'dummy-destination-night-area');
        //alert('ok');
        // var placelistarray = [];
        // var data = $("#place-sortList li").map(function (index) {
        //   var lidata = $(this)[0];
        //   var listid = $(this).attr('data-cityid');
        //   placelistarray[listid] = lidata;
         
        // }).get();
        //  console.log(placelistarray);

        var summarycount = $('#overall-summary li.summary-activity').length;
        $("#place-sortList,#place-hotels,#place-activities,#destination-night-area").empty();
        //$("").empty();
        var data = $("#overall-summary li").map(function (index) {

        // console.log(placelistarray);
        var cityval = $(this).children().find(".summary-city").val();
        $('#place-sortList').append($('#dummyList #dummy-place-sortList #picked-li-'+cityval));
        $('#place-hotels').append($('#dummy-hotels #dummy-place-hotels #picked-hotelli-'+cityval));
        $('#place-activities').append($('#dummy-activities #dummy-place-activities #picked-activityli-'+cityval));
        $('#destination-night-area').append($('#dummyListNights #dummy-destination-night-area #place_night_'+cityval));

        var summary_city_name = $("#summary-city-name-"+cityval).html();
        $("#summary-cities").append(summary_city_name+', ');

         $("#place-activitylist-"+cityval).dragsort();

         // var listid = $(this).attr('data-cityid');
        //   // var listinfo = "'";
        //   // listinfo += placelistarray[cityval];
        //   // listinfo += "'";
        //   $('#place-sortList li:eq('+index+')').html(placelistarray[cityval].innerHTML);
        //   console.log(index);
        //   console.log(placelistarray[cityval].innerHTML);
          //console.log(placelistarray);
          // if(index==0){
          //   $('#place-sortList #picked-li-'+cityval).before($('#place-sortList li:eq(1)'));
          //  // $('#place-sortList li:eq(1)').before($("#place-sortList #picked-li-"+cityval));
          //   console.log($('#place-sortList li:eq(1)'));
          //   console.log(cityval+' before index'+1);
          // }else if(index==summarycount-1){
          //   //var lastminus = index-1;
          //   //$('#place-sortList li:eq('+lastminus+')').before($("#place-sortList #picked-li-"+cityval));
          //    //console.log(lastminus+' before '+cityval);
          // }else{
          //   //var lastminus = index-1;
          //   //$('#place-sortList li:eq('+lastminus+')').after($("#place-sortList #picked-li-"+cityval));
          //   //console.log(lastminus+' after '+cityval);
          // }
          
          
          return $(this).children().find(".summary-city").val();
        }).get();
          $("#dummyList,#dummy-hotels,#dummy-activities,#dummyListNights").empty();
       // console.log(summarycount);
        // $("input[name=list1SortOrder]").val(data.join("|"));
    }

    $(function () {
        $("#overall-summary").dragsort({
            dragSelector: "div",
            dragBetween: true,
            dragEnd: saveOrder,
            //placeHolderTemplate: "<li class='placeHolder'><div></div></li>",
            cursor: "move"
        });
       
    });
    $(document).on('change', '.place-night-select', function() {
      var total_nights = 0;
      $(".place-night-select").each(function() {
         var night_count = parseInt($(this).val());
         dropdown_id = $(this).attr('id');
         dropdown_arr = dropdown_id.split('_');
         var city_id_night = dropdown_arr[3];
         $("#place_night_count_"+city_id_night).val(night_count);
         //console.log('this'+night_count);
         total_nights = parseInt(night_count)+parseInt(total_nights);
      });
     // console.log(total_nights);
      $(".night-count").html(total_nights);
    });
    $(document).on('input', '.allow_decimal', function(){
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
     {
       evt.preventDefault();
     }
   });
  $(document).on('keyup', '#total_package_value', function(){
     var total_package_value = $("#total_package_value").val();
     total_package_value = total_package_value=='' ? 0 : parseFloat(total_package_value);
     var gst_per = $("#gst_per").val();
     gst_per = gst_per=='' ? 0 : parseFloat(gst_per);
     var tax_amount = ((parseFloat(total_package_value)*gst_per)/100).toFixed(2);
     $("#gst_amount").val(tax_amount);
     $("#total_amount").val((parseFloat(tax_amount)+parseFloat(total_package_value)).toFixed(2));
   });

  // var mySortableList = $('#overall-summary').sortable({
  //   handle: '.handle',
  // });
  // console.log(mySortableList);
  // $('#overall-summary').sortable({
  //   sort: function (event, ui) {
  //      alert('fdg');
  //   }
  // });
  // $("#overall-summary").sortable(
  //   update: function (event, ui) {
  //     alert('hi');
  //   });
  // $(window).scroll(function(){
  //   var sticky = $('.sticky'),
  //       scroll = $(window).scrollTop();

  //   if (scroll >= 100) sticky.addClass('fixed');
  //   else sticky.removeClass('fixed');
  // });
</script>
@endsection