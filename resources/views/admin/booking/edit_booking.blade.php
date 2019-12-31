@extends('admin.layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/font-awesome.min.css') }}">
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/pages/inbox.css') }}" rel="stylesheet" type="text/css"> 

<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/sweet_alert.css') }}">
  <!--link rel="stylesheet" href="https://vitalets.github.io/bootstrap-datepicker/bootstrap-datepicker/css/datepicker.css"-->
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
 /* .overallplacecitylist span.summaryno::before {
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
@php
  $booking_info = $data['booking_info'];
  $package_info = $data['package_info'];
  $customer_info = $data['customer_info'];
  //dd($package_info->package_type);
  $booking_place = $data['booking_place'];
  $package_place = $data['package_place'];
 
  $citys_data = [];
  foreach($data['booking_place'] as $place){
    $citys_data[] = $place->city_id;
  }
 @endphp
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
         <li>{{__('Add Package') }}</li>
      </ul>
   </div>
   <div class="page-content">
      @include('includes.messages')
      <div class="paper toolbar-parent mt10">
          <div class="col-md-8">
          <form id="wizard1"  class="paper formValidate" method="post" enctype="multipart/form-data"  action="{{ route('booking_update') }}">
            @csrf
            <h3>Travel Data</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Booking Information</h4>
                  <!-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> -->
                  <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input autofocus type="date" class="datepicker" name="from_date" id="from_date" value="{{ $booking_info->from_date }}" />
                           <label for="from_date" class="fixed-label">{{__('From Date') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                           <input type="text" name="auto_id" id="auto_id" class="hide" value="{{ $booking_info->id }}">
                        </div>
                     </div>
                      <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input type="date" name="to_date" id="to_date" value="{{ $booking_info->to_date }}" />
                           <label for="to_date" class="fixed-label">{{__('To Date') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                       <div class="col-md-4">
                        <div class="select-row form-group">
                        <label for="package_type" class="block">{{__('Package Type') }}<span style="color:red">*</span></label>   
                          @php
                            $package_type_name = '';
                          @endphp 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="package_type" name="package_type" class="selectpicker select-validate hide" onchange="return ClearPackageInfo()" data-live-search="true" data-width="100%">
                              <option selected value="">{{__('Select Package')}}</option>
                              
                              @foreach($data['package_type'] as $type)
                              @php
                                if($booking_info->package_type==$type->id){
                                  $package_type_name = $type->package_type;
                                }
                              @endphp
                                <option @if($booking_info->package_type==$type->id) selected @endif value="{{$type->id}}" >
                                 {{$type->package_type}}
                                </option>
                              @endforeach
                           </select>
                            <input type="text" readonly="" value="{{$package_type_name}}">
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-sm-6">
                          <div class="form-group input-field label-float">
                             <input class="typeahead" id="package_name" name="package_name"  type="text" placeholder="Type for a Package" value="{{ $package_info->package_name }}" readonly="" autocomplete='off'>
                             <input type="hidden" name="packageid" id="packageid" value="{{ $booking_info->package_id }}"> 
                             <!-- <span id="package_no_result"></span> -->
                             <label  for="" class="fixed-label">{{__('Search Package') }}<span style="color:red">*</span></label>
                             <div class="input-highlight"></div>
                          </div>
                          <!-- /.form-group -->     
                       </div>
                    
                      <div class="col-md-4">
                        <div class="input-field label-float">
                           <label for="person" class="fixed-label">{{__('Persons') }}<span style="color:red">*</span></label>
                           <br>
                           <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span class="adult-count" id="adult-count">{{ $booking_info->adult_count }}</span> Adults & <span class="child-count" id="child-count">{{ $booking_info->child_count }}</span> Children & <span class="infant-count" id="infant-count">{{ $booking_info->infant_count }}</span> Infants</a></p>
                           <input type="text" name="adult_count" id="adult-count-val" class="hide" value="{{ $booking_info->adult_count }}">
                           <input type="text" name="child_count" id="child-count-val" class="hide" value="{{ $booking_info->child_count }}">
                           <input type="text" name="infant_count" id="infant-count-val" class="hide" value="{{ $booking_info->infant_count }}">
                           <input type="text" name="pack_adult_count" id="pack-adult-count-val" class="hide" value="{{ $package_info->adult_count }}">
                           <input type="text" name="pack_child_count" id="pack-child-count-val" class="hide" value="{{ $package_info->child_count }}">
                           <input type="text" name="pack_infant_count" id="pack-infant-count-val" class="hide" value="{{ $package_info->infant_count }}">
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
                                          <input type="text" name="adult-travellers" class="adult-travellers allow_decimal" value="{{ $booking_info->adult_count }}" />

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
                                           <input type="text" name="child-travellers" class="child-travellers allow_decimal" value="{{ $booking_info->child_count }}" />
                                          
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
                                          <input type="text" name="infant-travellers" class="infant-travellers allow_decimal" value="{{ $booking_info->infant_count }}" />
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
                            <label for="travelling_from_country_name" class="block">{{__('Country Name') }}</label>             
                            <input id="travelling_from_country_name"  name="travelling_from_country_name" readonly  type="text" placeholder="Country Name" value="{{ CommonHelper::getCountryName($booking_info->from_country_id) }}"  autocomplete='off'>
                            <input id="travelling_from_country_id"  name="travelling_from_country_id"  type="hidden" placeholder="Country Id" value="{{ $booking_info->from_country_id }}"  autocomplete='off'>
                          
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                     
                        <div class="select-row form-group">
                            <label for="travelling_from_state_name" class="block">{{__('State Name') }}</label>                 
                           <input id="travelling_from_state_name" value="{{ CommonHelper::getstateName($booking_info->from_state_id) }}"  name="travelling_from_state_name" readonly  type="text" placeholder="State Name"  autocomplete='off'>
                           <input id="travelling_from_state_id" value="{{ $booking_info->from_state_id }}"  name="travelling_from_state_id"  type="hidden" placeholder="State Id"  autocomplete='off'>
                           <div class="input-highlight"></div>
                        </div>
                        <div class="select-row form-group">
                             <label for="travelling_from_city_name" class="block">{{__('City Name') }}</label>                 
                             <!-- To validate the select add class "select-validate" -->     
                             <input id="travelling_from_city_name"  value="{{ CommonHelper::getcityName($booking_info->from_city_id) }}" name="travelling_from_city_name"  readonly type="text" placeholder="City Name"  autocomplete='off'>
                             <input id="travelling_from_city_id"  value="{{ $booking_info->from_city_id }}" name="travelling_from_city_id"  type="hidden" placeholder="City Id"  autocomplete='off'>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-6" style="background-color: #a6777726;">
                        <h4 class="text-headline text-center">Traveling To</h4>
                        <div class="select-row form-group">
                            <label for="to_country_id" class="block">{{__('Country Name') }}</label>             
                            <input id="travelling_to_country_name"  name="travelling_to_country_name" value="{{ CommonHelper::getCountryName($booking_info->to_country_id) }}" readonly  type="text" placeholder="Country Name"  autocomplete='off'>
                            <input id="travelling_to_country_id" value="{{ $booking_info->to_country_id }}" name="travelling_to_country_id"  type="hidden" placeholder="Country Id"  autocomplete='off'>
                          
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                       
                        <div class="select-row form-group">
                           <label for="to_state_id" class="block">{{__('State Name') }}</label>                 
                           <input id="travelling_to_state_name" value="{{ CommonHelper::getstateName($booking_info->to_state_id) }}"  name="travelling_to_state_name" readonly  type="text" placeholder="State Name"  autocomplete='off'>
                           <input id="travelling_to_state_id" value="{{ $booking_info->to_state_id }}" name="travelling_to_state_id"  type="hidden" placeholder="State Id"  autocomplete='off'>
                           <div class="input-highlight"></div>
                        </div>
                        <div class="select-row form-group">
                            <label for="to_city_id" class="block">{{__('City Name') }}</label>                 
                             <!-- To validate the select add class "select-validate" -->     
                             <input id="travelling_to_city_name" value="{{ CommonHelper::getcityName($booking_info->to_city_id) }}" name="travelling_to_city_name"  readonly type="text" placeholder="City Name"  autocomplete='off'>
                             <input id="travelling_to_city_id" value="{{ $booking_info->to_city_id }}" name="travelling_to_city_id"  type="hidden" placeholder="State Id"  autocomplete='off'>
                           
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                      <br>
                         <div class="col-md-12">
                            <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group input-field label-float">
                                       <label for="customer_name" class="block fixed-label">{{__('Customer Name') }}<span style="color:red">*</span></label>                 
                                       
                                       <input class="clearable" id="customer_name" name="customer_name" readonly="" value="{{ $customer_info->name }}" type="text" placeholder="Search Customer" autocomplete='off'>
                                       <input type="text" class="hide" value="{{ $customer_info->id }}" name="customer_id" id="customer_id">
                                         
                                       <div class="input-highlight"></div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="customer_add hide">
                                      <div class="form-group input-field label-float">
                                         <button type="button" class="btn theme modal-trigger" data-toggle="modal" data-target="#defaultModal">
                                         Add Customer
                                         </button>
                                         <div class="input-highlight"></div>
                                      </div>
                                      <!-- /.form-group -->     
                                   </div>
                                </div>
                            </div>
                            <div class="row customer_details">
                               <!-- /.row -->
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <input  id="cus_state" name="cus_state" value="{{ CommonHelper::getstateName($customer_info->state_id) }}"  type="text" placeholder="Customer State" readonly=""  autocomplete='off'>
                                     <label  for="address_one" class="fixed-label">{{__('State') }}</label>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->     
                               </div>
                               <!-- ./col- -->  
                               <!-- /.row -->  
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <input id="cus_city" name="cus_city" value="{{ CommonHelper::getcityName($customer_info->city_id) }}" type="text" placeholder="Customer City" readonly="" autocomplete='off'>
                                     <label for="address_one" class="fixed-label">{{__('City') }}</label>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->     
                               </div>
                               <!-- ./col- -->  
                               <!-- /.row -->      
                               <div class="col-sm-6">
                                  <div class="select-row form-group">
                                     <label for="cus_email" class="block">{{__('Customer Email') }}<span style="color:red">*</span></label>                 
                                     <!-- To validate the select add class "select-validate" -->     
                                     <input id="cus_email" name="cus_email" value="{{ $customer_info->email }}" type="text" placeholder="Customer Email"  readonly="" autocomplete='off'>
                                     <div class="input-highlight"></div>
                                  </div>
                               </div>
                               <!-- ./col- -->  
                               <div class="col-sm-6">
                                  <div class="select-row form-group">
                                     <label for="cus_phone" class="block">{{__('Customer Phone') }}<span style="color:red">*</span></label>                 
                                     <input id="cus_phone" name="cus_phone" value="{{ $customer_info->phone }}" type="text" placeholder="Customer Phone" readonly="" autocomplete='off'>
                                     <div class="input-highlight"></div>
                                  </div>
                               </div>
                               <!-- ./col- -->
                               <div class="clearfix"></div>
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input id="cus_zipcode"  name="cus_zipcode" value="{{ $customer_info->zipcode }}" readonly="" type="text" placeholder="Customer Zipcode"  autocomplete='off'>
                                        <label for="cus_zipcode"  class="fixed-label">{{__('Zipcode') }}</label>
                                        <div class="input-highlight"></div>
                                     </div>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->
                               </div>
                               <!-- ./col- -->
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input id="address_one"  name="address_one" value="{{ $customer_info->address_one }}" readonly="" type="text" placeholder="Address One"  autocomplete='off'>
                                        <label for="address_one" class="fixed-label">{{__('Address One') }}</label>
                                        <div class="input-highlight"></div>
                                     </div>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->
                               </div>
                               <!-- ./col- -->
                               <div class="clearfix"></div>
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input id="address_two"  name="address_two" readonly="" value="{{ $customer_info->address_two }}" type="text" placeholder="Address two"  autocomplete='off'>
                                        <label for="address_two"  class="fixed-label">{{__('Address two') }}</label>
                                        <div class="input-highlight"></div>
                                     </div>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->
                               </div>
                               <!-- ./col- -->
                               <div class="clearfix"></div>
                         
                            </div>
                         </div>
                        <div class="col-md-12">
                           <div id="destination-division" class="destinations-division">
                             
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
                        @foreach($data['booking_place'] as $key => $place)

                           @if($place->nights_count!=0)
                            @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;

                              //$place_city_name = CommonHelper::getcityName($place->city_id);
                              $package_hotel = CommonHelper::getBookingHotel($booking_info->id,$place->city_id);
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
                       @foreach($data['booking_place'] as $place)
                        @php 
                              $place_state_name = CommonHelper::getstateName($place->state_id);
                              $place_city_data = CommonHelper::getcityDetails($place->city_id);
                              $place_city_name = $place_city_data->city_name;
                              $place_city_image = $place_city_data->city_image;

                              $package_activities = CommonHelper::getBookingActivities($booking_info->id,$place->city_id);
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
                                  $package_activity_cost= CommonHelper::getBookingActivityCost($booking_info->id,$activity->id);
                                @endphp
                              <li>
                                <div id="city_activity_id_{{ $activity->id }}" class="msg-wrapper">
                                  <img src="{{ $act_image }}" alt="" class="avatar "><a class="msg-sub">{{ $activity->title_name }}</a><a class="msg-from"><i class="fa fa-inr"></i> <span id="total_activity_value_{{ $activity->id }}">{{ $package_activity_cost }}</span></a>
                                  <p>
                                    <input type="text" class="hide" name="second_activity_{{$place->city_id}}[]" id="second_activity_{{$place->city_id}}" value="{{ $activity->id }}"/>
                                    <input type="text" class="hide activity_cost" name="activity_cost_{{$place->city_id}}[]" id="activity_cost_{{ $activity->id }}" value="{{ $package_activity_cost }}"/>
                                    <input type="text" class="hide activity_person_cost" name="activity_person_cost_{{$place->city_id}}[]"  id="activity_person_cost_{{ $activity->id }}" value="{{$activity->amount}}" />
                                    <a onclick="return RemoveActivityDB({{ $booking_info->id }}, {{ $activity->id }},{{$place->city_id}})" style="color: red;cursor:pointer;" class="">Remove</a></p>
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
                    $to_state_name = CommonHelper::getstateName($booking_info->to_state_id);
                    $to_city_data = CommonHelper::getcityDetails($booking_info->to_city_id);
                    $to_city_name = $to_city_data->city_name;
                    $to_city_image = $to_city_data->city_image;
                    $to_city_image = $to_city_image==null || $to_city_image=='' ?  asset("public/assets/images/no_image.jpg") :  asset('storage/app/city/'.$to_city_image) ;
                    $place_counts = count($data['booking_place']);
                    $summary_cities='';
                    $night_count=0;
                    foreach($data['booking_place'] as $key => $place){
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
                                    <p id="summary-family"><span class="adult-count">{{ $booking_info->adult_count }}</span> Adults <span class="child-count">{{ $booking_info->child_count }}</span> Children</p><span id="summary-infants" class="text-small"><span class="infant-count">{{ $booking_info->infant_count }}</span> Infant</span>
                                </div>
                            </div>
                          </div>
                          
                      </div>
                       <ul id="overall-summary" class="timeline overallplacecitylist bg-color-switch mt40 timeline-single">
                           @foreach($data['booking_place'] as $place) 
                           
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
                                     $sum_package_hotel = CommonHelper::getBookingHotel($booking_info->id,$place->city_id);
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
                                      $sum_package_activities = CommonHelper::getBookingActivities($booking_info->id,$place->city_id);
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
                                     $package_activity_cost= CommonHelper::getBookingActivityCost($booking_info->id,$activity->id);
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
                                   @foreach($data['booking_place'] as $place)
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
                           @foreach($data['booking_place'] as $place)
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
                              <div id="place_night_remove_{{ $place->city_id }}" class="button-close hide">
                                <button type="button" onclick="return DeleteNight({{ $place->city_id }})" class="btn btn-sm red waves-effect waves-circle waves-light">x</button>
                              </div>
                              <small class="night-place-name">{{ $place_city_name }}</small>
                              <div class="form-group">
                                <select id="place_night_select_{{ $place->city_id }}" name="place_night_select[]" class="form-control place-night-select hide">
                                  @for($l=1;$l<=10;$l++)
                                  <option value="{{ $l }}" @if($place->nights_count==$l) selected @endif >{{ $l }} @if($l==1)Night @else Nights @endif</option>
                                  @endfor
                              
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
                        <h4 class="text-headline">Summary</h4>   
                        @php
                          $tax_info = $data['tax_data'];
                          if(!empty($tax_info)){
                            $tax_name = $tax_info->tax_name;
                            $tax_value = $tax_info->tax_value;
                          }else{
                            $tax_name = 'GST';
                            $tax_value = 8;
                          }
                           $tax_value = $booking_info->tax_percentage;
                          //dd( $tax_info);
                        @endphp
                        <br>
                         <div class="form-group">
                            <label for="total_package_summary" class="col-sm-5 control-label">Package Value with {{ $tax_name }} ({{$tax_value}}%)</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_package_summary" name="total_package_summary" value="{{ $booking_info->total_amount }}" readonly="true" placeholder="">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="discount_amt" class="col-sm-5 control-label">Discount Rs.
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="discount_amt" name="discount_amt" class="allow_decimal" value="{{ $booking_info->discount_amount }}" placeholder="Discount Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="total_amount_summary" class="col-sm-5 control-label">Grand Package Value</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount_summary" name="total_amount_summary" value="{{ $booking_info->grand_total }}" readonly="true" placeholder="Total Package Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                       <center> <a id="pick-actitity-link-5" href="#" onclick="return ViewDetailedSummary()" class="btn btn-sm purple waves-effect waves-light ">View Detailed Summary</a></center>
                        <br>
                        <div class="detailed-summary-area" style="display: none;">
                        <h4 class="text-headline">Detailed Summary</h4>   
                        <br>
                          <div class="form-group">
                            <label for="total_accommodation" class="col-sm-5 control-label">Accommodation
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_accommodation" value="{{ $booking_info->total_accommodation }}" readonly="true" name="total_accommodation" class="allow_decimal" placeholder="Accommodation">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="total_activities" class="col-sm-5 control-label">Activities
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_activities" value="{{ $booking_info->total_activities }}" readonly="true" name="total_activities" class="allow_decimal" placeholder="Activities">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                          </div>
                           <div class="form-group hide">
                            <label for="transport_charges" class="col-sm-5 control-label">Transport Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="transport_charges" name="transport_charges" readonly="true" class="allow_decimal " value="{{ $booking_info->transport_additional_charges/2 }}" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group hide">
                            <label for="additional_charges" class="col-sm-5 control-label">Additional Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="additional_charges" name="additional_charges" readonly="true" class="allow_decimal " value="{{ $booking_info->transport_additional_charges/2 }}" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label style="font-size: 10px;" for="additional_transport" class="col-sm-5 control-label">Additional+Transport Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="additional_transport" name="additional_transport" readonly="true" class="allow_decimal" value="{{ $booking_info->transport_additional_charges }}" placeholder="">    
                                <input type="text" id="pack_additional_transport" name="pack_additional_transport" readonly="true" class="allow_decimal hide" value="{{ $package_info->transport_charges+$package_info->additional_charges }}" placeholder="">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="total_package_value" class="col-sm-5 control-label">Sub Total
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_package_value" value="{{ $booking_info->total_package_value }}" readonly="true" name="total_package_value" class="allow_decimal" placeholder="Total package value">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                        
                        <!--  <div class="form-group">
                            <label for="sub_total" class="col-sm-5 control-label">Sub Total</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="sub_total" name="sub_total" readonly="true" placeholder="Sub Total">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><
                        </div> -->
                       
                        <div class="form-group">
                            <label for="gst_amount" class="col-sm-5 control-label">{{$tax_name}} <span>{{$tax_value}}</span>% <input type="text" name="gst_per" id="gst_per" value="{{$tax_value}}" class="hide" /> </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="gst_amount" name="gst_amount" value="{{ $booking_info->tax_amount }}" readonly="true" placeholder="Total {{$tax_name}} Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="total_amount" class="col-sm-5 control-label">Total Amount</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount" name="total_amount" value="{{ $booking_info->total_amount }}" readonly="true" placeholder="Total Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="discount_amt_one" class="col-sm-5 control-label">Discount Rs.
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field"> 
                                <input type="text" id="discount_amt_one" name="discount_amt_one" value="{{ $booking_info->discount_amount }}" readonly="true" class="allow_decimal" placeholder="Discount Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="grand_total_amount" class="col-sm-5 control-label">Grand Total</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="grand_total_amount" name="grand_total_amount" value="{{ $booking_info->grand_total }}" readonly="true" placeholder="">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                      </div>
                        <div class="hide">
                        <h5 class="text-headline">Additional Persons</h5> 
                        <small>[Incl. Transport Charges &amp; Additional Charges]</small>
                         <div class="form-group">
                            <label for="adult_price" class="col-sm-5 control-label">Adult Price </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                
                                <input type="text" id="adult_price" class="allow_decimal" value="{{ $booking_info->adult_price_person }}" readonly="true" name="adult_price" placeholder="Adult Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="child_price" class="col-sm-5 control-label">Child Price/person </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="child_price" class="allow_decimal" value="{{ $booking_info->child_price_person }}" readonly="true" name="child_price" placeholder="Child Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="infant_price" class="col-sm-5 control-label">Infant Price/person</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="infant_price" class="allow_decimal" value="{{ $booking_info->infant_price }}" readonly="true" name="infant_price" placeholder="Infant Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                      </div>
                    </div>
                    
               </div>
           </div>
           <div class="clearfix"/>
         </div>
      </div>
      <!-- /.page-content -->
      <!-- Default Modal -->
   <div id="defaultModal" class="modal bs-example-modal-lg" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
            <div class="modal-header theme">
               <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
               <h1 class="modal-title">Customer Details</h1>
            </div>
            <!-- /.modal-header -->
            <div class="modal-body">
               <form id="customerformValidate" class="" method="post" data-toggle="validator">
                  <!-- <h1 class="text-display-1">Customer Information</h1> -->
                  <!--input type="hidden" name="customer_id"-->
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Name" class="clearable" id="name" name="name" autofocus type="text">
                           <label for="name" class="fixed-label">{{__('Name') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- ./col- -->
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Email" class="clearable" id="email" name="email" type="email">
                           <label for="" class="fixed-label">{{__('Email') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->     
                     </div>
                     <!-- ./col- -->  
                     <div class="col-sm-4">
                        <div class="select-row form-group">
                           <label for="country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="country_id" name="country_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select country')}}</option>
                              @php
                              $defcountry = CommonHelper::DefaultCountry();
                              @endphp
                              @foreach($data['country_view'] as $value)
                              <option value="{{$value->id}}" @if($defcountry==$value->id) selected @endif >
                              {{$value->country_name}}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <!-- ./col- -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                     @php
                     $statelist = CommonHelper::getStateList($defcountry);
                     @endphp
                     <div class="col-sm-4">
                        <div class="select-row form-group">
                           <label for="state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="state_id" name="state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($statelist as $state)
                              <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <!-- ./col- -->  
                     <div class="col-sm-4">
                        <div class="select-row form-group">
                           <label for="city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="city_id" name="city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              <!--  @foreach ($data['state_view'] as $state)
                                 <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                 @endforeach -->
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <!-- ./col- -->
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Address One" class="clearable" id="customer_address_one" name="address_one" type="text">
                           <label for="customer_address_one" class="fixed-label">{{__('Address One') }}</label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->     
                     </div>
                     <!-- ./col- -->
                  </div>
                  <div class="row">
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <div class="input-field label-float">
                              <input placeholder="Address Two" class="clearable" id="customer_address_two" name="address_two" type="text">
                              <label for="customer_address_two" class="fixed-label">{{__('Address Two') }}</label>
                              </select>
                              <div class="input-highlight"></div>
                           </div>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                     </div>
                     <!-- ./col- -->
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="Zipcode" class="clearable" id="zipcode" name="zipcode" type="text">
                           <label for="phone" class="fixed-label">{{__('Zipcode') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->     
                     </div>
                     <!-- ./col- -->  
                     <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input placeholder="phone" class="clearable" id="phone" name="phone" type="text">
                           <label for="phone" class="fixed-label">{{__('Phone') }}<span style="color:red">*</span></label>
                           <p class="no-margin em"></p>
                        </div>
                     </div>
                     <!-- ./col- -->  
                  </div>
                  <!-- /.modal-body -->
                  <div class="modal-footer">
                     <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                     <!-- <button class="btn-flat waves-effect waves-theme">Save changes</button> -->
                     <button type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
                  </div>
                  <!-- /.modal-footer -->
               </form>
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
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
<script src="{{ asset('public/js/jquery.dragsort.js') }}"></script>
<script src ="{{ asset('public/assets/dist/js/jquery-ui.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/external_sweet_alert.js') }}"></script>
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

                if($("#package_type").val()==''){
                  $('.package_type-error').remove();
                  $( '<div id="package_type-error" class="error from_city_id-error custom-error">Please choose Type.</div>' ).insertAfter( '#package_type' );
                  formsubmit =false; 
               }else{
                 $("#package_type-error").remove();
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
    $('#package_name').autocomplete({
    // minChars: 1,
    source: function(request, response) {
      $.ajaxSetup({
           headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
      });

      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{ route('package_autocomplete') }}",
        data: 'action=package_name'+'&name='+request.term+'&package_type='+$("#package_type").val(),
        success: function(data) {
         if (data.length === 0) {   
               var res_msg = "No Results found, please add package";
               if($("#package_type").val()==''){
                alert('Please pick package type');
               }else{
                 alert(res_msg);
               }
              
             // $('#package_no_result').css('background-color', '#' + color);
              //$("#package_no_result").html("No Results");
              //$("#bg").fadeIn(300);
            }
          response( $.map( data, function( item ) {
              //console.log(data);
              var object = new Object();
               object.label = item.value;
               object.value = item.package_name;
               object.packageid = item.packageid;
               object.travelling_to_country_name = item.tocountryname;  
               object.travelling_to_country_id =   item.tocountryid;   
               object.travelling_to_state_name = item.tostatename;
               object.travelling_to_state_id = item.tostateid;
               object.travelling_to_city_name = item.tocityname;
               object.travelling_to_city_id = item.tocityid;

               object.travelling_from_country_name = item.fromcountryname;  
               object.travelling_from_country_id =   item.fromcountryid;   
               object.travelling_from_state_name = item.fromstatename;
               object.travelling_from_state_id = item.fromstateid;
               object.travelling_from_city_name = item.fromcityname;
               object.travelling_from_city_id = item.fromcityid;

               object.packagename = item.package_name;
               object.total_package_value = item.total_package_value;
               object.tax_amount = item.tax_amount;
               object.total_amount = item.total_amount;
               object.adult_price_person = item.adult_price_person;
               object.child_price_person = item.child_price_person;
               object.infant_price = item.infant_price;

               object.adult_count = item.adult_count;
               object.child_count = item.child_count;
               object.infant_count = item.infant_count;

               object.transport_charges = item.transport_charges;
               object.additional_charges = item.additional_charges;
              return object
          }));
          // response( $.map( data, function( item ) {
          //     return {
          //         label: item.title,
          //         value: item.title
          //     }
          // }));
   
        }
      });
    },
    select: function (event, ui) {
      $("#package_name").val(ui.item.value);
      $("#packagename").val(ui.item.value);
      $('#packageid').val(ui.item.packageid);
      $('#travelling_to_country_name').val(ui.item.travelling_to_country_name);
      $('#travelling_to_country_id').val(ui.item.travelling_to_country_id);
      $('#travelling_to_state_name').val(ui.item.travelling_to_state_name);
      $('#travelling_to_state_id').val(ui.item.travelling_to_state_id);
      $('#travelling_to_city_name').val(ui.item.travelling_to_city_name);
      $('#travelling_to_city_id').val(ui.item.travelling_to_city_id);

      $('#travelling_from_country_name').val(ui.item.travelling_from_country_name);
      $('#travelling_from_country_id').val(ui.item.travelling_from_country_id);
      $('#travelling_from_state_name').val(ui.item.travelling_from_state_name);
      $('#travelling_from_state_id').val(ui.item.travelling_from_state_id);
      $('#travelling_from_city_name').val(ui.item.travelling_from_city_name);
      $('#travelling_from_city_id').val(ui.item.travelling_from_city_id);

      $("#summary-state").html(ui.item.travelling_to_state_name);
      
      $('#total_package_value').val(ui.item.total_package_value);
      $('#gst_amount').val(ui.item.tax_amount);
      $('#total_amount').val(ui.item.total_amount);
      $('#adult_price').val(ui.item.adult_price_person);
      $('#child_price').val(ui.item.child_price_person);
      $('#infant_price').val(ui.item.infant_price);

      $('.adult-count').text(ui.item.adult_count);
      $('.child-count').text(ui.item.child_count);
      $('.infant-count').text(ui.item.infant_count);

      $('#adult-count-val,.adult-travellers,#pack-adult-count-val').val(ui.item.adult_count);
      $('#child-count-val,.child-travellers,#pack-child-count-val').val(ui.item.child_count);
      $('#infant-count-val,.infant-travellers,#pack-infant-count-val').val(ui.item.infant_count);

      $("#transport_charges").val(ui.item.transport_charges);
      $("#additional_charges").val(ui.item.additional_charges);
      var total_chargers_extra = parseInt(ui.item.transport_charges)+parseInt(ui.item.additional_charges);
      $("#additional_transport").val(total_chargers_extra);
      $("#pack_additional_transport").val(total_chargers_extra);

      var total_members = parseInt(ui.item.adult_count)+parseInt(ui.item.child_count)+parseInt(ui.item.infant_count);
      $("#total-travellers").text(total_members);
     // console.log(ui.item);
      
       var packageid = $("#packageid").val();
       var url = "{{ route('package_place_details') }}?package_id="+packageid;   
   
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
            $.ajax({
                url:  url,          
                dataType: "json",
                type: "GET",
               
                success: function (data) {
                  //   console.log(data.package_id);
                  //   console.log(data.place_details);
                     $('#place-sortList,#place-hotels,#overall-summary,#place-activities').empty();
                     $("#summary-cities,#destination-night-area").empty();
                      //console.log(data.place_details);
                      var total_night_count = 0;
                       var startday = 1;
                     $.each(data.place_details, function( index, value ) {
                        var cityid = value.cityid;
                         //console.log(value);
                        var state_city_names = value.state_name+' - '+value.city_name;
                        $("#summary-cities").append(value.city_name+', ');
                        $("#place-sortList").append('<li data-cityid="'+value.cityid+'" id="picked-li-'+value.cityid+'" class="list-group-item cityplace sort-handle"> . '+state_city_names+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+value.cityid+'" value="'+value.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+value.cityid+'" value="'+value.cityid+'"/></li>');

                         var passparamscity = "{  cityid: "+value.cityid+",  stateid: "+value.stateid+", cityname: '"+value.city_name+"', statename: '"+value.state_name+"' , cityimage: '"+value.city_image+"' }";
                         var imagedummy =  no_image_url;
                          var cityimagelocation = value.city_image==null || value.city_image=='' ? no_image_url : image_url+'/city/'+value.city_image;

                          var listlength = $('#place-sortList li').length;
                          if(value.nights_count==1){
                             var fromday = startday;
                           }else{
                             var fromday = startday+' - '+(parseInt(startday)+parseInt(value.nights_count)-1);
                           }

                        $("#overall-summary").append('<li data-cityid="'+value.cityid+'" id="summary-activityli-'+value.cityid+'" class="tl-item summary-activity list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span id="summary-night-'+value.cityid+'" class="summaryno">'+fromday+'</span></span> <br> '+value.state_name+' - <span id="summary-city-name-'+value.cityid+'">'+value.city_name+'</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-'+value.cityid+'" value="'+value.cityid+'"/></div><div id="summary-hotelarea-'+value.cityid+'" class="overall-place-activitylist"> <div id="summary_hotel_id_'+value.cityid+'" class="msg-wrapper"><img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+value.cityid+'" src="" alt="" class="avatar "><a id="summary-hotel-name-'+value.cityid+'" class="msg-from"  style="display: initial;"></a><br><a id="summary-hotel-type-'+value.cityid+'" class="msg-sub"></a><p id="summary-features-'+value.cityid+'"></p></div><div style="clear:both"></div></div><div style="clear:both"></div><div id="summary-activity-section-'+value.cityid+'" class="activities-summary"> </div></li>');

                        if(value.nights_count!=0){
                          total_night_count = parseInt(total_night_count) + parseInt(value.nights_count);
                          // var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

    
                         $("#destination-night-area").append('<div data-cityid="'+value.cityid+'" id="place_night_'+value.cityid+'" class="col-xs-6 col-sm-6 col-md-4 mt20"><img class="responsive-img z-depth-1" src="'+cityimagelocation+'" style="width:190px;height: 100px;" alt=""><div id="place_night_remove_'+value.cityid+'" class="button-close hide"> <button type="button" onclick="return DeleteNight('+value.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+value.city_name+'</small><br>'+value.nights_count+' Nights<input type="text" class="hide" id="place_night_count_'+value.cityid+'" name="place_night_count_'+value.cityid+'[]" value="'+value.nights_count+'" ></input></div></div>');  

                          var night_url = "{{ route('get-hotel-list') }}" + '?package_id=' + packageid + '&city_id=' + value.cityid;
                          $.get(night_url, function(package_hotel_data) {
                            if(package_hotel_data!=null && typeof(package_hotel_data)!='string'){
                              var amenitieslist = package_hotel_data.amenities;
                             
                              amenities_len = package_hotel_data!=null || typeof(package_hotel_data)!='string' ? amenitieslist.length : 0;
                               //console.log('test-'+amenities_len);

                             // 
                              var amenitiesString = '';
                              var roomtypesString = '';

                              if(package_hotel_data!=null){
                                $.each(amenitieslist, function(keya, valuea) {
                                    //console.log(keya);
                                    amenitiesString += valuea.amenities_name;
                                    if(amenities_len-1!=keya){
                                        amenitiesString += ', ';
                                    }
                                  }); 
                              }

                               var roomtypeslist = package_hotel_data.roomtypes;

                              if(package_hotel_data!=null){
                                total_room_cost = package_hotel_data.total_amount;
                                //cityhotelid = package_hotel_data.id;
                               // cityhotelroomtype = package_hotel_data.roomtype_id;
                               // cityhotelroomnumbers = package_hotel_data.total_rooms;

                                $.each(roomtypeslist, function(keya, valuea) {
                              

                                  if(valuea.pivot.roomtype_id==package_hotel_data.roomtype_id){
                                    roomtypesString = valuea.room_type+' - '+package_hotel_data.total_rooms;
                                    room_cost = valuea.pivot.price;
                                    //alert(roomtypesString);
                                  }

                                }); 

                               
                              }
                              var imagelocation = no_image_url;
                              var hotelimages = package_hotel_data.hotelimages;

                              if(hotelimages.length>0){
                                 var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                              }

                               var hiddenvalues = '<input type="text" class="hide" name="second_hotel_'+cityid+'[]" id="second_hotel_'+cityid+'" value="'+package_hotel_data.id+'"/><input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="'+cityid+'"/><input type="text" class="hide hotel_cost" name="hotel_cost_'+cityid+'[]"  id="hotel_cost_'+cityid+'" value="'+total_room_cost+'" /><input type="text" class="hide hotel_number_count" name="hotel_number_count_'+cityid+'[]"  id="hotel_number_count_'+cityid+'" value="'+package_hotel_data.total_rooms+'" /><input type="text" class="hide hotel_room_type" name="hotel_room_type_'+cityid+'[]"  id="hotel_room_type_'+cityid+'" value="'+package_hotel_data.roomtype_id+'" />';

                              $("#place-hotels").append('<li data-cityid="'+value.cityid+'" id="picked-hotelli-'+value.cityid+'" class="tl-item"><div class="timeline-icon ti-text">'+state_city_names+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+value.cityid+'" class="media"><div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="Hotel image"></a></div><div class="media-body p10"><h4 class="media-heading">'+package_hotel_data.hotel_name+'</h4><p>'+state_city_names+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <span class="" style="margin-left: 20px;font-weight:bold;">at <i class="fa fa-inr"></i> '+total_room_cost+' </span> <button id="edit_hotel_button_'+value.cityid+'" style="margin-left: 20px;" type="button" onClick="EditHotel('+passparamscity+','+package_hotel_data.id+','+package_hotel_data.roomtype_id+','+package_hotel_data.total_rooms+')" class="btn btn-sm blue waves-effect waves-light ">Edit Hotel</button> <button id="add_hotel_button_'+value.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button></p>'+hiddenvalues+'</div></div></div></li> ');

                               $("#summary_hotel_id_"+cityid+" #summary-hotel-img-"+cityid).attr("src", imagelocation);
                              $("#summary_hotel_id_"+cityid+" #summary-hotel-name-"+cityid).html( package_hotel_data.hotel_name);
                              $("#summary_hotel_id_"+cityid+" #summary-hotel-type-"+cityid).html( roomtypesString);
                              $("#summary_hotel_id_"+cityid+" #summary-features-"+cityid).html( amenitiesString);
                            }else{
                              $("#place-hotels").append('<li data-cityid="'+value.cityid+'" id="picked-hotelli-'+value.cityid+'" class="tl-item"><div class="timeline-icon ti-text">'+state_city_names+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+value.cityid+'" class="media"><div class="media-left media-img"><a><img class="responsive-img" src="'+imagedummy+'" alt="Hotel Image"></a></div><div class="media-body p10"><h4 class="media-heading">Please choose hotel</h4> <button id="add_hotel_button_'+value.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add Hotel</button></div></div></div></li>');
                            }
                            
                          });
                        }
                        var activity_url = "{{ route('get-activity-list') }}" + '?package_id=' + packageid + '&city_id=' + value.cityid;

                        $.get(activity_url, function(package_activity_data) {
                          var place_activities_data = '<li data-cityid="'+value.cityid+'" id="picked-activityli-'+value.cityid+'" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">'+state_city_names+'</div><ul id="place-activitylist-'+value.cityid+'" style="list-style: none !important;" class="place-activitylist">';
                            place_activities_data +='</ul><a id="pick-actitity-link-'+value.cityid+'" href="#" onClick="PickActity('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>';
                          $("#place-activities").append(place_activities_data);
                          if(package_activity_data.length!=0){
                            $.each(package_activity_data, function(keyact, valueact) {
                              var activityimages = valueact.activity_images;
                              var act_image = no_image_url;
                              if(activityimages.length>0){
                                 var act_image = image_url+'/activity/'+activityimages[0].image_name;
                              }
                              var total_cost_act = 0;
                              var activity_cost_url = "{{ route('get-activity-cost') }}" + '?package_id=' + packageid + '&activity_id=' + valueact.id;
                              $.get(activity_cost_url, function(package_activity_cost) {
                                var total_cost_act = package_activity_cost;
                                var hiddenvalues_one = '<input type="text" class="hide" name="second_activity_'+cityid+'[]" id="second_activity_'+cityid+'" value="'+valueact.id+'"/><input type="text" class="hide activity_cost" name="activity_cost_'+cityid+'[]"  id="activity_cost_'+valueact.id+'" value="'+total_cost_act+'" /><input type="text" class="hide activity_person_cost" name="activity_person_cost_'+cityid+'[]"  id="activity_person_cost_'+valueact.id+'" value="'+valueact.amount+'" />';
                                  place_activity_data ='<li><div id="city_activity_id_'+valueact.id+'" class="msg-wrapper"><img src="'+act_image+'" alt="" class="avatar "><a class="msg-sub">'+valueact.title_name+'</a><a class="msg-from"><i class="fa fa-inr"></i> <span id="total_activity_value_'+valueact.id+'">'+total_cost_act+'</span></a><p>'+hiddenvalues_one+'<a onclick="return RemoveActivity('+valueact.id+','+cityid+')" style="color: red;cursor:pointer;" class="">Remove</a></p></div></li>';

                                  $("#place-activitylist-"+cityid).append(place_activity_data);

                                  var act_overview  = valueact.overview != null ? valueact.overview : '';
                                   var activityduration = (valueact.duartion_hours/60).toFixed(0)+' hour '+(valueact.duartion_hours%60)+' minutes';
                                  $("#summary-activity-section-"+cityid).append('<div id="summary_city_activity_id_'+valueact.id+'" class=""><h3 style="text-decoration: underline;">'+valueact.title_name+' <a class="pull-right"><i class="fa fa-inr"></i> <span id="summary_activity_value_'+valueact.id+'">'+total_cost_act+'</span></a></h3><div class="sub-summary-activity"><h5>Overview</h5><div id="activity-summary-overview" class="activity-description"> '+act_overview+'</div><h5>Duration: '+activityduration+'</h5></div></div>');
                                 $("#pick-actitity-link-"+cityid).css('top','-20px');
                              }); 
                              //console.log(place_activities_data);
                            }); 
                          }
                        
                          //console.log(package_activity_data);
                        });
                         startday = parseInt(startday)+parseInt(value.nights_count);

                     });
                 $(".night-count").html(total_night_count);
                 $(".days-count").html(parseInt(total_night_count)+1);
                    //alert(total_night_count);
                     //var encid = data.package_id;
                     //var url = "{{ url('package-edit') }}/"+encid;   
                    // $('#destination-char').html('<a target="_blank" href="'+url+'" style="color:white; margin-left :5px;" class="btn theme-accent waves-effect waves-light ">View Package Details</a>');
                }
            });
     }
   });
  $('#customer_name').autocomplete({
    // minChars: 1,
    source: function(request, response) {
        $.ajaxSetup({
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('customer_autocomplete')}}",
        data: 'action=customer_name'+'&name='+request.term,
        success: function(data) {
         //console.log(data.length);
         if (data.length === 0) {
              // alert('hii');
              $('.customer_details').hide();
              $('.customer_add').show();
               var res_msg = "No Results found, please add Customer";
                alert(res_msg);
              
            }
          response( $.map( data, function( item ) {
            //console.log(data.length);
                  var object = new Object();
                  object.label = item.value;
                  object.value = item.name;
                  object.city_name = item.city_name;
                  object.state_name = item.state_name;
                  object.zipcode = item.zipcode;
                  object.address_one = item.address_one;
                  object.address_two = item.address_two;
                  object.email = item.email;
                  object.phone = item.phone;
                  object.customer_id = item.customer_id;
                  return object 
                       
                          
          }));
   
        }
   
      });
    },
    select: function (event, ui) {
      $('.customer_add').hide();
         $('.customer_details').show();
         $("#customer_name").val(ui.item.value);
         $("#customer_name").val(ui.item.value);
         $("#cus_name").val(ui.item.name);
         $("#cus_city").val(ui.item.city_name);
         $("#cus_state").val(ui.item.state_name);
         $("#cus_zipcode").val(ui.item.zipcode);
         $("#address_one").val(ui.item.address_one);
         $("#address_two").val(ui.item.address_two);
         $("#cus_phone").val(ui.item.phone);
         $("#cus_email").val(ui.item.email);
         $("#customer_id").val(ui.item.customer_id);
      },
   });
   // $("#wizard1").steps({
   //     headerTag: "h3",
   //     bodyTag: "fieldset"
   // });
   $( function() {
    //$( ".datepicker" ).datepicker();
    $("#customerformValidate").validate({
      rules: {
        "name": {
          required: true,
        },
            "email": {
          required: true,
               email : true,
        },
            "country_id" : {
               required: true,
            },
            "state_id" : {
               required: true,
            },
            "city_id" : {
               required: true,
            },
            "zipcode" : {
               required: true,
               digits : true,
            },
            "phone" : {
               required: true,
               digits : true,
               remote: {
                url: "{{ url('/customer_phoneexists')}}",
                type: "post",
                data: {
                    phone: function() {
                        return $("#phone").val();
                    },
                    _token: "{{csrf_token()}}",
                    phone: $(this).data('phone')
                },
                
                
            },
            },  
      },
      messages: {
        "name": {
          required: "Please, enter Name",
        },
            "email": {
          required: "Please, enter Email",
               email : "Please enter valid email",
        },
            "country_id" : {
               required: "Please, choose country",
            },
            "state_id" : {
               required: "Please, choose state",
            },
            "city_id" : {
               required: "Please, choose city",
            },
            "zipcode" : {
               required: "Please, Enter Zipcode",
               digits : "Numbers only",
            },
            "phone" : {
               required: "Please, enter Phone Number",
               digits : "Numbers only",
               remote: "Phone Number Already Exists!"
            },
      },
      submitHandler: function (form) {
            $.ajax({
              type: 'post',
              url: "{{ route('customer_save') }}",
              data: $('form').serialize(),
              success: function(response){
                if(response)
                { 
                     swal("Success!", "Customer Added succesfully!", "success");
                     $('#defaultModal').modal('toggle');
                     $('#name').val('');
                     $('#email').val('');
                     $('#zipcode').val('');
                     $('#phone').val('');
                     $('#customer_address_one').val('');
                     $('#customer_address_two').val('');
                     $('#country_id').selectpicker('val', '');
                     $('#state_id').selectpicker('val', '');
                     $('#city_id').selectpicker('val', '');
                     $('#customer_id').val(response.userid);
                     $('#customer_name').val(response.data.name);

                }
              }
           });
         }
    });

    $('select[name=country_id]').change(function() {
     // alert('ok');
      var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();
   
      $.get(url, function(data) {
          $('#state_id').empty('');
          $("#state_id").append("<option value=''>Select</option>");
          $("#state_id").selectpicker("refresh");
          //var select = $('form select[name=state_id]');
   
         // select.empty();
          //$("#state_id").append("<option value=''>Select</option>");
          $.each(data, function(key, value) {
              $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
                  '</option>');
          });
           $("#state_id").selectpicker("refresh");
      });
   });
   
   $('select[name=state_id]').change(function() {
     // alert('ok');
      var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
      $.get(url, function(data) {
          $('#city_id').empty('');
          $("#city_id").append("<option value=''>Select</option>");
          $("#city_id").selectpicker("refresh");
          //var select = $('form select[name=state_id]');
   
         // select.empty();
          //$("#state_id").append("<option value=''>Select</option>");
          $.each(data, function(key, value) {
              $("#city_id").append('<option value=' + value.id + '>' + value.city_name +
                  '</option>');
          });
           $("#city_id").selectpicker("refresh");
      });
   });
  } );
   function ClearPackageInfo(){
      $("#package_name,#packageid").val('');
   }
   function ViewDetailedSummary(){
      $(".detailed-summary-area").toggle();
   }
   function RemoveActivityDB(bookingid, activityid,cityid){
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {
      var url = "{{ route('delete_booking_activity') }}" + '?activity_id=' + activityid+'&city_id='+cityid+'&booking_id='+bookingid;
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
@section('footerSecondSection')
  @include('admin.booking.common-scripts')
@endsection