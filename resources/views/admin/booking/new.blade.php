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
     padding-top: 10px;
    padding-bottom: 10px;
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

    .media-img {
      width: 20%;
      height: inherit;
  }
  .rating{
    margin-bottom: 5px;
  }
  .hotel-list-panel{
    margin-bottom: 20px;
  }
   .media-img {
    width: 21%;
    height: inherit;
  }
  .mt7{
    margin-top: 7px !important;
  }
  .card.media-card-sm img {
      width: 100px;
      height: 140px;
  }
  .card.media-card-sm {
      height: 140px;
  }
    .summary-activity-citysection{
    padding-top: 25px;
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
         <li>{{__('Add Package') }}</li>
      </ul>
   </div>
   <div class="page-content">
      @include('includes.messages')
      <div class="paper toolbar-parent mt10">
          <div class="col-md-8">
          <form id="wizard1"  class="paper formValidate" method="post" enctype="multipart/form-data"  action="{{ route('booking_save') }}">
            @csrf
            <h3>Travel Data</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Booking Information</h4>
                  <!-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> -->
                  <div class="row">
                      <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input autofocus type="date" class="datepicker" name="from_date" id="from_date"/>
                           <label for="from_date" class="fixed-label">{{__('From Date') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-sm-4">
                        <div class="form-group input-field label-float">
                           <input type="date" class="datepicker" name="to_date" id="to_date"/>
                           <label for="to_date" class="fixed-label">{{__('To Date') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                       <div class="col-md-4">
                        <div class="select-row form-group">
                           <label for="package_type" class="block">{{__('Itinerary Type') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="package_type" name="package_type" class="selectpicker select-validate" onchange="return ClearPackageInfo()" data-live-search="true" data-width="100%">
                              <option selected value="">{{__('Select Package')}}</option>
                              
                              @foreach($data['package_type'] as $type)
                                <option value="{{$type->id}}" >
                                 {{$type->package_type}}
                                </option>
                              @endforeach
                           </select>
                            
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-sm-6">
                          <div class="form-group input-field label-float">
                             <input class="typeahead" id="package_name" name="package_name"  type="text" placeholder="Type for a Itinerary" autocomplete='off'>
                             <input type="hidden" name="packageid" id="packageid"> 
                             <!-- <span id="package_no_result"></span> -->
                             <label  for="" class="fixed-label">{{__('Search Itinerary') }}<span style="color:red">*</span></label>
                             <div class="input-highlight"></div>
                          </div>
                          <!-- /.form-group -->     
                       </div>
                    
                      <div class="col-md-4">
                        <div class="input-field label-float">
                           <label for="person" class="fixed-label">{{__('Persons') }}<span style="color:red">*</span></label>
                           <br>
                           <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span class="adult-count" id="adult-count">2</span> Adults & <span class="child-count" id="child-count">0</span> Children & <span class="infant-count" id="infant-count">0</span> Infants</a></p>
                           <input type="text" name="adult_count" id="adult-count-val" class="hide" value="2">
                           <input type="text" name="child_count" id="child-count-val" class="hide" value="0">
                           <input type="text" name="infant_count" id="infant-count-val" class="hide" value="0">
                           <input type="text" name="pack_adult_count" id="pack-adult-count-val" class="hide" value="2">
                           <input type="text" name="pack_child_count" id="pack-child-count-val" class="hide" value="0">
                           <input type="text" name="pack_infant_count" id="pack-infant-count-val" class="hide" value="0">
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
                                          <label class="fixed-label">{{__('No of Adult:') }}</label>
                                          <br>
                                          <small>Age 13 and above</small>
                                       </div>
                                       <div class="col-md-6">
                                          <input type="text" name="adult-travellers" class="adult-travellers allow_decimal" value="2" />

                                       </div>  
                                       
                                    </div>
                                     <br>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="fixed-label">{{__('No of Childrens:') }}</label>
                                          <br>
                                          <small>Age 3 to 12</small>
                                       </div>

                                       <div class="col-md-6">
                                           <input type="text" name="child-travellers" class="child-travellers allow_decimal" value="0" />
                                          
                                       </div>  
                                       
                                    </div>
                                    <br>
                                    <div class="row">
                                       <div class="col-md-6">
                                          <label class="fixed-label">{{__('No of Infants:') }}</label>
                                          <br>
                                          <small>Age 0 - 2</small>
                                       </div>

                                       <div class="col-md-6">
                                          <input type="text" name="infant-travellers" class="infant-travellers allow_decimal" value="0" />
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
                            <input id="travelling_from_country_name"  name="travelling_from_country_name" readonly  type="text" placeholder="Country Name"  autocomplete='off'>
                            <input id="travelling_from_country_id"  name="travelling_from_country_id"  type="hidden" placeholder="Country Id"  autocomplete='off'>
                          
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                     
                        <div class="select-row form-group">
                            <label for="travelling_from_state_name" class="block">{{__('State Name') }}</label>                 
                           <input id="travelling_from_state_name"  name="travelling_from_state_name" readonly  type="text" placeholder="State Name"  autocomplete='off'>
                           <input id="travelling_from_state_id"  name="travelling_from_state_id"  type="hidden" placeholder="State Id"  autocomplete='off'>
                           <div class="input-highlight"></div>
                        </div>
                        <div class="select-row form-group">
                             <label for="travelling_from_city_name" class="block">{{__('City Name') }}</label>                 
                             <!-- To validate the select add class "select-validate" -->     
                             <input id="travelling_from_city_name"  name="travelling_from_city_name"  readonly type="text" placeholder="City Name"  autocomplete='off'>
                             <input id="travelling_from_city_id"  name="travelling_from_city_id"  type="hidden" placeholder="City Id"  autocomplete='off'>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-6" style="background-color: #a6777726;">
                        <h4 class="text-headline text-center">Traveling To</h4>
                        <div class="select-row form-group">
                            <label for="to_country_id" class="block">{{__('Country Name') }}</label>             
                            <input id="travelling_to_country_name"  name="travelling_to_country_name" readonly  type="text" placeholder="Country Name"  autocomplete='off'>
                            <input id="travelling_to_country_id"  name="travelling_to_country_id"  type="hidden" placeholder="Country Id"  autocomplete='off'>
                          
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                       
                        <div class="select-row form-group">
                           <label for="to_state_id" class="block">{{__('State Name') }}</label>                 
                           <input id="travelling_to_state_name"  name="travelling_to_state_name" readonly  type="text" placeholder="State Name"  autocomplete='off'>
                           <input id="travelling_to_state_id"  name="travelling_to_state_id"  type="hidden" placeholder="State Id"  autocomplete='off'>
                           <div class="input-highlight"></div>
                        </div>
                        <div class="select-row form-group">
                            <label for="to_city_id" class="block">{{__('City Name') }}</label>                 
                             <!-- To validate the select add class "select-validate" -->     
                             <input id="travelling_to_city_name"  name="travelling_to_city_name"  readonly type="text" placeholder="City Name"  autocomplete='off'>
                             <input id="travelling_to_city_id"  name="travelling_to_city_id"  type="hidden" placeholder="State Id"  autocomplete='off'>
                           
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                      <br>
                         <div class="col-md-12">
                            <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group input-field label-float">
                                       <label for="customer_name" class="block fixed-label">{{__('Search Customer Name') }}<span style="color:red">*</span></label>                 
                                       
                                       <input class="clearable" id="customer_name" name="customer_name"  type="text" placeholder="Search Customer" autocomplete='off'>
                                       <input type="text" class="hide" name="customer_id" id="customer_id">
                                         
                                       <div class="input-highlight"></div>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="customer_add">
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
                                     <input  id="cus_state" name="cus_state"  type="text" placeholder="Customer State"  autocomplete='off'>
                                     <label  for="address_one" class="fixed-label">{{__('State') }}</label>
                                     <div class="input-highlight"></div>
                                  </div>
                                  <!-- /.form-group -->     
                               </div>
                               <!-- ./col- -->  
                               <!-- /.row -->  
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <input id="cus_city" name="cus_city"  type="text" placeholder="Customer City"  autocomplete='off'>
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
                                     <input id="cus_email" name="cus_email"  type="text" placeholder="Customer Email"  autocomplete='off'>
                                     <div class="input-highlight"></div>
                                  </div>
                               </div>
                               <!-- ./col- -->  
                               <div class="col-sm-6">
                                  <div class="select-row form-group">
                                     <label for="cus_phone" class="block">{{__('Customer Phone') }}<span style="color:red">*</span></label>                 
                                     <input id="cus_phone" name="cus_phone"  type="text" placeholder="Customer Phone"  autocomplete='off'>
                                     <div class="input-highlight"></div>
                                  </div>
                               </div>
                               <!-- ./col- -->
                               <div class="clearfix"></div>
                               <div class="col-sm-6">
                                  <div class="form-group input-field label-float">
                                     <div class="input-field label-float">
                                        <input id="cus_zipcode"  name="cus_zipcode"  type="text" placeholder="Customer Zipcode"  autocomplete='off'>
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
                                        <input id="address_one"  name="address_one"  type="text" placeholder="Address One"  autocomplete='off'>
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
                                        <input id="address_two"  name="address_two"  type="text" placeholder="Address two"  autocomplete='off'>
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

                    </ul>
                    <div id="dummy-activities">
                      
                    </div>
                  </div>
                </div>
            
            </fieldset>
             <h3>Transportation</h3>
            <fieldset>
                <div class="col-sm-12">
                  <h4 class="text-headline">Transportation Charges [Total : <span id="totaltransportcharges"></span>]</h4>
                  <div class="row">
                    <ul id="place-transports" class="timeline bg-color-switch mt40 timeline-single">
                        
                    </ul>
                    <div id="dummy-transports">
                      
                    </div>
                  </div>
                </div>
            </fieldset>
            <h3>Summary</h3>
            <fieldset>
                <div class="col-sm-12">
                  <h4 class="text-headline">Summary</h4>
                  <div class="row sortable">
                    <div class="card">
                      <div class="card-image">
                          <img id="summary-banner" src="{{ asset('public/assets/demo/images/demo-9.jpg') }}" style="height: 250px;" alt="">
                          <div class="row">
                            <div class="card-title">
                                <div class="col-md-4"> 
                                  <span id="summary-state">Bridges</span><br><span id="summary-cities" class="text-small"></span>
                                </div>
                                <div class="col-md-4"> 
                                  <p id="summary-nights"><span class="night-count"></span> nights</p><span id="summary-days" class="text-small"><span class="days-count " ></span> days</span>
                                </div>
                                 <div class="col-md-4"> 
                                  <p id="summary-family"><span class="adult-count">2</span> Adults <span class="child-count">0</span> Children</p><span id="summary-infants" class="text-small"><span class="infant-count">0</span> Infant</span>
                                </div>
                            </div>
                          </div>
                      </div>
                       <ul id="overall-summary" class="timeline overallplacecitylist bg-color-switch mt40 timeline-single">
                          
                       </ul>
                       <div id="dummySummaryList">

                         </div>
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
                          //dd( $tax_info);
                        @endphp
                        <br>
                         <div class="form-group">
                            <label for="total_package_summary" class="col-sm-5 control-label">Package Value with {{ $tax_name }} ({{$tax_value}}%)</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_package_summary" name="total_package_summary" readonly="true" placeholder="">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="discount_amt" class="col-sm-5 control-label">Discount Rs.
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="discount_amt" name="discount_amt" class="allow_decimal" value="0" placeholder="Discount Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label for="total_amount_summary" class="col-sm-5 control-label">Grand Package Value</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount_summary" name="total_amount_summary" readonly="true" placeholder="Total Package Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->

                        <h4 class="text-headline">Payment</h4>   
                        <br>
                        <div class="row">
                          <div class="col-xs-5">
                              <p>
                                <input name="paymenttype" type="radio" id="paymenttype1" onclick="return ChangePaytype(this.value)" value="1" checked="checked"/>
                                <label for="paymenttype1">Full Payment</label>
                              </p>
                          </div>
                          <div class="col-xs-7">
                              <p>
                                <input name="paymenttype" type="radio" value="2" onclick="return ChangePaytype(this.value)" id="paymenttype2" />
                                <label for="paymenttype2">Partial Payment</label>
                              </p>
                          </div>
                        </div>
                        <br>
                        <div id="partial_pay_area" class="hide">
                          <table>
                            <thead>
                              <tr>
                                <th width="25%">
                                  
                                </th>
                                <th width="20%">
                                  %
                                </th>
                                 <th width="40%">
                                  Amount
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td class="bold">Pay</td>
                                <td> <input type="text" id="pay_percent" name="pay_percent" class="allow_decimal" value="0" placeholder="Pay percentage">    </td>
                                <td><input type="text" id="pay_amount" name="pay_amount" class="allow_decimal" value="0" placeholder="Pay Amount"> </td>
                              </tr>
                               <tr>
                                <td class="bold">Balance</td>
                                <td> <input type="text" id="balance_percent" readonly="" name="balance_percent" class="allow_decimal" value="0" placeholder="Balance percentage">    </td>
                                <td><input type="text" id="balance_amount" readonly="" name="balance_amount" class="allow_decimal" value="0" placeholder="Balance Amount"> </td>
                              </tr>
                            </tbody>
                          </table>
                         
                       </div>

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
                                <input type="text" id="total_accommodation" readonly="true" name="total_accommodation" class="allow_decimal" placeholder="Accommodation">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="total_activities" class="col-sm-5 control-label">Activities
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_activities" readonly="true" name="total_activities" class="allow_decimal" placeholder="Activities">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                          </div>
                           <div class="form-group hide">
                            <label for="transport_charges" class="col-sm-5 control-label">Transport Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="transport_charges" name="transport_charges" readonly="true" class="allow_decimal " value="0" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group hide">
                            <label for="additional_charges" class="col-sm-5 control-label">Additional Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="additional_charges" name="additional_charges" readonly="true" class="allow_decimal " value="0" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group hide">
                            <label for="extra_cost" class="col-sm-5 control-label">Extra cost
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="extra_cost" name="extra_cost" readonly="true" class="allow_decimal " value="0" placeholder="Extra Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                         <div class="form-group">
                            <label style="font-size: 10px;" for="additional_transport" class="col-sm-5 control-label">Additional+Transport Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="additional_transport" name="additional_transport" readonly="true" class="allow_decimal" value="0" placeholder="">    
                                <input type="text" id="pack_additional_transport" name="pack_additional_transport" readonly="true" class="allow_decimal hide" value="0" placeholder="">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          
                          <div class="form-group">
                            <label for="total_package_value" class="col-sm-5 control-label">Sub Total
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_package_value" readonly="true" name="total_package_value" class="allow_decimal" placeholder="Total package value">    
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
                                <input type="text" id="gst_amount" name="gst_amount" readonly="true" placeholder="Total {{$tax_name}} Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="total_amount" class="col-sm-5 control-label">Total Amount</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount" name="total_amount" readonly="true" placeholder="Total Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="discount_amt_one" class="col-sm-5 control-label">Discount Rs.
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="discount_amt_one" name="discount_amt_one" readonly="true" class="allow_decimal" value="0" placeholder="Discount Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="grand_total_amount" class="col-sm-5 control-label">Grand Total</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="grand_total_amount" name="grand_total_amount" readonly="true" placeholder="">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                      </div>
                        <div class="">
                        <h5 class="text-headline">Additional Persons</h5> 
                        <small>[Incl. Transport Charges &amp; Additional Charges]</small>
                         <div class="form-group">
                            <label for="adult_price" class="col-sm-5 control-label">Adult Price </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                
                                <input type="text" id="adult_price" class="allow_decimal" readonly="true" name="adult_price" placeholder="Adult Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="child_price" class="col-sm-5 control-label">Child Price/person </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="child_price" class="allow_decimal" readonly="true" name="child_price" placeholder="Child Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="infant_price" class="col-sm-5 control-label">Infant Price/person</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="infant_price" class="allow_decimal" readonly="true" name="infant_price" placeholder="Infant Price/person">    
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
                           <label for="customer_address_one" class="fixed-label">{{__('Address One') }}<span style="color:red">*</span></label>
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
                              <label for="customer_address_two" class="fixed-label">{{__('Address Two') }}<span style="color:red">*</span></label>
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
              CalculateTransport();
            }
            if(newIndex===4){
              $("#travel-section").addClass('hide');
              $(".price-section").removeClass('hide');
              var total_hotel_cost = 0;
               $(".hotel_cost").each(function() {
                 var hotel_cost = parseFloat($(this).val());
                 total_hotel_cost = parseFloat(total_hotel_cost)+parseFloat(hotel_cost);
              });
              // alert(total_hotel_cost);
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
            $("#wizard1").css('pointer-events','none');

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
                     $('#place-sortList,#place-hotels,#overall-summary,#place-activities,#place-transports').empty();
                     $("#summary-cities,#destination-night-area").empty();
                      //console.log(data.place_details);
                      var total_night_count = 0;
                       var startday = 1;
                       var startdayone = 0;
                       var startdaytwo = 0;

                     $.each(data.place_details, function( index, value ) {
                        var cityid = value.cityid;
                        var stateid = value.stateid;
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

                        //$("#overall-summary").append('<li data-cityid="'+value.cityid+'" id="summary-activityli-'+value.cityid+'" class="tl-item summary-activity list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span id="summary-night-'+value.cityid+'" class="summaryno">'+fromday+'</span></span> <br> '+value.state_name+' - <span id="summary-city-name-'+value.cityid+'">'+value.city_name+'</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-'+value.cityid+'" value="'+value.cityid+'"/></div><div id="summary-hotelarea-'+value.cityid+'" class="overall-place-activitylist"> <div id="summary_hotel_id_'+value.cityid+'" class="msg-wrapper"><img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+value.cityid+'" src="" alt="" class="avatar "><a id="summary-hotel-name-'+value.cityid+'" class="msg-from"  style="display: initial;"></a><br><a id="summary-hotel-type-'+value.cityid+'" class="msg-sub"></a><p id="summary-features-'+value.cityid+'"></p></div><div style="clear:both"></div></div><div style="clear:both"></div><div id="summary-activity-section-'+value.cityid+'" class="activities-summary"> </div></li>');

                        $("#overall-summary").append('<li data-cityid="'+value.cityid+'" id="summary-activityli-'+value.cityid+'" class="tl-item summary-activity list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span id="summary-night-'+value.cityid+'" class="summaryno">'+fromday+'</span></span> <br>'+value.state_name+' - <span id="summary-city-name-'+value.cityid+'">'+value.city_name+'</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-'+value.cityid+'" value="'+value.cityid+'"></div><div id="summary-hotelarea-'+value.cityid+'" class="overall-place-activitylist"> <div style="clear:both"></div></div><div style="clear:both"></div><div class="summary-activity-citysection" id="summary-activity-citysection-'+value.cityid+'"> </div></li>');

                        if(value.nights_count!=0){
                          total_night_count = parseInt(total_night_count) + parseInt(value.nights_count);
                          // var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

    
                         $("#destination-night-area").append('<div data-cityid="'+value.cityid+'" id="place_night_'+value.cityid+'" class="col-xs-6 col-sm-6 col-md-4 mt20"><img class="responsive-img z-depth-1" src="'+cityimagelocation+'" style="width:190px;height: 100px;" alt=""><div id="place_night_remove_'+value.cityid+'" class="button-close hide"> <button type="button" onclick="return DeleteNight('+value.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+value.city_name+'</small><br>'+value.nights_count+' Nights<input type="text" class="hide" id="place_night_count_'+value.cityid+'" name="place_night_count_'+value.cityid+'[]" value="'+value.nights_count+'" ></input></div></div>');  

                          var night_url = "{{ route('get-bookinghotel-list') }}" + '?package_id=' + packageid + '&city_id=' + value.cityid;
                            $("#place-hotels").append('<li data-cityid="'+value.cityid+'" id="picked-hotelli-'+value.cityid+'" class="tl-item hotel-list-panel"><div class="timeline-icon ti-text">'+state_city_names+'</div><div id="hotel_city_'+value.cityid+'" style="background: #f2f2f2;" class="hotel-panel"><div id="hotel_citydata_'+value.cityid+'"></div> <button id="add_hotel_button_'+value.cityid+'" style="margin-bottom: 10px;margin-right: 10px;margin-left: 80%;" type="button" onclick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light">+ Add Hotel</button></div></li>');
                          $.get(night_url, function(package_hotels) {
                           // console.log(package_hotel_data);
                          
                            $.each(package_hotels, function(key, value) {
                              package_hotel_data = value;
                              if(package_hotel_data!=null && typeof(package_hotel_data)!='string'){
                                var hotel_info = package_hotel_data.hotel_details;
                                var amenitieslist = hotel_info.amenities;
                                //console.log(hotel_info);
                               
                                amenities_len = package_hotel_data!=null || typeof(package_hotel_data)!='string' ? amenitieslist.length : 0;
                                 //console.log('test-'+amenities_len);

                               // 
                                var amenitiesString = '';
                                var roomtypesString = '';
                                var roomtypesHidden = '';
                                var total_room_cost = 0;
                                 var a_count = 0;

                                if(package_hotel_data!=null){
                                  $.each(amenitieslist, function(keya, valuea) {
                                      //console.log(keya);
                                      if(a_count<5){
                                        amenitiesString += valuea.amenities_name;
                                        if(amenities_len-1!=keya){
                                            amenitiesString += ', ';
                                        }
                                      }
                                      a_count++;
                                    }); 
                                }

                                 var roomtypeslist = hotel_info.roomtypes;

                                if(package_hotel_data!=null){
                                  room_types = package_hotel_data.room_types;
                                  $.each(room_types, function(keya, valuea) {
                                     roomtypesString += valuea.room_type+' - '+valuea.total_rooms;
                                     roomtypesString += ', ';
                                     total_room_cost = parseInt(total_room_cost)+(parseInt(valuea.total_amount)*parseInt(valuea.total_rooms));
                                     roomtypesHidden += '<input type="text" class="hide hotel_room_cost" name="hotel_room_cost_'+hotel_info.id+'[]" id="hotel_room_cost_'+hotel_info.id+'_'+valuea.roomtype_id+'" value="'+valuea.total_amount+'"> <input type="text" class="hide type_hotel_number_count" name="type_hotel_number_count_'+hotel_info.id+'[]" id="type_hotel_number_count_'+hotel_info.id+'_'+valuea.roomtype_id+'" value="'+valuea.total_rooms+'"> <input type="text" class="hide hotel_room_type'+hotel_info.id+'" name="hotel_room_type_'+hotel_info.id+'[]" id="hotel_room_type_'+hotel_info.id+'_'+valuea.roomtype_id+'" value="'+valuea.roomtype_id+'">';
                                  }); 
                                 //  total_room_cost = package_hotel_data.total_amount;
                                 //  //cityhotelid = package_hotel_data.id;
                                 // // cityhotelroomtype = package_hotel_data.roomtype_id;
                                 // // cityhotelroomnumbers = package_hotel_data.total_rooms;

                                 //  $.each(roomtypeslist, function(keya, valuea) {
                                

                                 //    if(valuea.pivot.roomtype_id==package_hotel_data.roomtype_id){
                                 //      roomtypesString = valuea.room_type+' - '+package_hotel_data.total_rooms;
                                 //      room_cost = valuea.pivot.price;
                                 //      //alert(roomtypesString);
                                 //    }

                                 //  }); 

                                 
                                }
                                var imagelocation = no_image_url;
                                var hotelimages = hotel_info.hotelimages;

                                if(hotelimages.length>0){
                                   var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                                }

                                 // var hiddenvalues = '<input type="text" class="hide" name="second_hotel_'+cityid+'[]" id="second_hotel_'+cityid+'" value="'+hotel_info.id+'"/><input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="'+cityid+'"/><input type="text" class="hide hotel_cost" name="hotel_cost_'+cityid+'[]"  id="hotel_cost_'+cityid+'" value="'+total_room_cost+'" /><input type="text" class="hide hotel_number_count" name="hotel_number_count_'+cityid+'[]"  id="hotel_number_count_'+cityid+'" value="'+hotel_info.total_rooms+'" /><input type="text" class="hide hotel_room_type" name="hotel_room_type_'+cityid+'[]"  id="hotel_room_type_'+cityid+'" value="'+hotel_info.roomtype_id+'" />';

                                 var hiddenvalues = '<input type="text" class="hide" name="second_hotel_'+cityid+'[]" id="second_hotel_'+cityid+'" value="'+hotel_info.id+'"> <input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="'+cityid+'"> <input type="text" class="hide hotel_cost" name="hotel_cost_'+hotel_info.id+'[]" id="hotel_cost_'+hotel_info.id+'" value="'+total_room_cost+'"> <input type="text" class="hide hotel_number_count" name="hotel_number_count_'+hotel_info.id+'[]" id="hotel_number_count_'+hotel_info.id+'" value="10">';

                                 var hotel_data_section = '<div id="picked_city_hotel_'+hotel_info.id+'" class="card media-card-sm"><div id="picked-hotelmedia-'+hotel_info.id+'" class="media"><div class="media-left media-img"> <a href="#"> <img class="responsive-img" src="'+imagelocation+'" alt="Hotel Image"> </a></div><div class="media-body p10"><h4 class="media-heading">'+hotel_info.hotel_name+'</h4><p>Sarawak - Bintulu <span class="pull-right" style="font-size: 16px;"> 4 <i id="pickviewrating" class="pickviewrating mdi mdi-star"></i> </span></p><p class="sub-text mt7">'+amenitiesString+'</p><p class="sub-text mt7"> '+roomtypesString+' '+roomtypesHidden+' <span class="" style="margin-left: 20px;font-weight:bold;"><i class="fa fa-inr"></i> '+total_room_cost+' </span> <button id="edit_hotel_button_'+cityid+'" style="margin-left: 10px;" type="button" onclick="EditHotel('+passparamscity+','+hotel_info.id+',1)" class="btn btn-sm blue waves-effect waves-light ">Change</button> <button id="remove_hotel_button_'+cityid+'" style="margin-left: 10px;" type="button" onclick="return RemoveHotel('+hotel_info.id+','+cityid+',1)" class="btn btn-sm red waves-effect waves-light ">Remove</button></p> '+hiddenvalues+'</div></div></div>';
                                 //alert(hotel_data_section);

                                $("#hotel_citydata_"+cityid).append(hotel_data_section);
                                $("#summary-hotelarea-"+cityid).append('<div id="summary-hotel-picked-'+hotel_info.id+'" class=""> <div id="summary_hotel_id_'+hotel_info.id+'" class="msg-wrapper"> <img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+cityid+'" src="'+imagelocation+'" alt="" class="avatar "><a id="summary-hotel-name-'+cityid+'" class="msg-from" style="display: initial;">'+hotel_info.hotel_name+'</a><br><a id="summary-hotel-type-'+cityid+'" class="msg-sub"> '+roomtypesString+' </a> <p id="summary-features-'+cityid+'">'+amenitiesString+' </p></div></div>');

                                //$("#place-hotels").append('<li data-cityid="'+value.cityid+'" id="picked-hotelli-'+value.cityid+'" class="tl-item hotel-list-panel"><div class="timeline-icon ti-text">'+state_city_names+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+value.cityid+'" class="media"><div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="Hotel image"></a></div><div class="media-body p10"><h4 class="media-heading">'+package_hotel_data.hotel_name+'</h4><p>'+state_city_names+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <span class="" style="margin-left: 20px;font-weight:bold;">at <i class="fa fa-inr"></i> '+total_room_cost+' </span> <button id="edit_hotel_button_'+value.cityid+'" style="margin-left: 20px;" type="button" onClick="EditHotel('+passparamscity+','+package_hotel_data.id+','+package_hotel_data.roomtype_id+','+package_hotel_data.total_rooms+')" class="btn btn-sm blue waves-effect waves-light ">Edit Hotel</button> <button id="add_hotel_button_'+value.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button></p>'+hiddenvalues+'</div></div></div></li> ');

                                //$("#summary_hotel_id_"+cityid+" #summary-hotel-img-"+cityid).attr("src", imagelocation);
                                //$("#summary_hotel_id_"+cityid+" #summary-hotel-name-"+cityid).html( package_hotel_data.hotel_name);
                               // $("#summary_hotel_id_"+cityid+" #summary-hotel-type-"+cityid).html( roomtypesString);
                                //$("#summary_hotel_id_"+cityid+" #summary-features-"+cityid).html( amenitiesString);
                              }
                            });
                            
                            //else{
                             // $("#place-hotels").append('<li data-cityid="'+value.cityid+'" id="picked-hotelli-'+value.cityid+'" class="tl-item"><div class="timeline-icon ti-text">'+state_city_names+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+value.cityid+'" class="media"><div class="media-left media-img"><a><img class="responsive-img" src="'+imagedummy+'" alt="Hotel Image"></a></div><div class="media-body p10"><h4 class="media-heading">Please choose hotel</h4> <button id="add_hotel_button_'+value.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add Hotel</button></div></div></div></li>');
                           // }
                            
                          });
                        }

                        for (var i = 1; i <= value.nights_count; i++) {
                          daynumber = parseInt(startdayone)+parseInt(i);
                          activities_area = '<li data-cityid="'+value.cityid+'" id="picked-activityli-'+value.cityid+'-'+daynumber+'" class="tl-item list-group-item item-avatar picked-activityli-'+value.cityid+' msg-row unread"> <div class="timeline-icon ti-text">'+value.city_name+' - Day '+daynumber+'</div><ul id="place-activitylist-'+value.cityid+'-'+daynumber+'" style="list-style: none !important;" class="place-activitylist" data-listidx="0"></ul><a id="pick-actitity-link-'+value.cityid+'" href="#" onclick="PickActity('+passparamscity+','+daynumber+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>';
                           $("#place-activities").append(activities_area);
                           summarydata = '<b style="font-size:18px;">Day '+daynumber+'</b> <div id="summary-activity-section-'+value.cityid+'-'+daynumber+'" class="activities-summary"> </div>';
                           $("#summary-activity-citysection-"+value.cityid).append(summarydata);

                        }
                        startdayone = parseInt(startdayone) + parseInt(value.nights_count);

                        for (var j = 1; j <= value.nights_count; j++) {
                           daynumberone = parseInt(startdaytwo)+parseInt(j);
                            

                            var activity_url = "{{ route('get-bookingactivity-list') }}" + '?package_id=' + packageid + '&city_id=' + value.cityid + '&day_number=' + daynumberone;

                            $.get(activity_url, function(package_activity_data) {
                              var place_activities_data = '<li data-cityid="'+value.cityid+'" id="picked-activityli-'+value.cityid+'" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">'+state_city_names+'</div><ul id="place-activitylist-'+value.cityid+'" style="list-style: none !important;" class="place-activitylist">';
                                place_activities_data +='</ul><a id="pick-actitity-link-'+value.cityid+'" href="#" onClick="PickActity('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>';
                             
                                
                              if(package_activity_data.length!=0){
                                $.each(package_activity_data, function(keyact, valueactivity) {
                                 ajaxdaynumber = valueactivity.daynumber;
                                 valueact = valueactivity.activity_data[0];
                                 //console.log(valueact);
                             
                                 
                                  var activityimages = valueact.activity_images;
                                  var act_image = no_image_url;
                                  if(activityimages.length>0){
                                     var act_image = image_url+'/activity/'+activityimages[0].image_name;
                                  }
                                  //console.log(act_image);
                                  var total_cost_act = valueactivity.cost;
                                  //var activity_cost_url = "{{ route('get-activity-cost') }}" + '?package_id=' + packageid + '&activity_id=' + valueact.id;
                                 // $.get(activity_cost_url, function(package_activity_cost) {
                                    //console.log(package_activity_cost);
                                    //var total_cost_act = package_activity_cost;
                                    var hiddenvalues_one = '<input type="text" class="hide" name="second_activity_'+cityid+'_'+ajaxdaynumber+'[]" id="second_activity_'+cityid+'" value="'+valueact.id+'"/><input type="text" class="hide activity_cost" name="activity_cost_'+cityid+'_'+ajaxdaynumber+'[]"  id="activity_cost_'+valueact.id+'" value="'+total_cost_act+'" /><input type="text" class="hide activity_person_cost" name="activity_person_cost_'+cityid+'_'+ajaxdaynumber+'[]"  id="activity_person_cost_'+valueact.id+'" value="'+valueact.amount+'" />';
                                      place_activity_data ='<li><div id="city_activity_id_'+valueact.id+'" class="msg-wrapper"><img src="'+act_image+'" alt="" class="avatar "><a class="msg-sub">'+valueact.title_name+'</a><a class="msg-from hide"><i class="fa fa-inr"></i> <span id="total_activity_value_'+valueact.id+'">'+total_cost_act+'</span></a><p>'+hiddenvalues_one+'<a onclick="return RemoveActivity('+valueact.id+','+ajaxdaynumber+','+cityid+')" style="color: red;cursor:pointer;" class="">Remove</a></p></div></li>';
                                    //  console.log(cityid+'c'+daynumberone);
                                           // console.log(place_activity_data);

                                      $("#place-activitylist-"+cityid+"-"+ajaxdaynumber).append(place_activity_data);

                                      var act_overview  = valueact.overview != null ? valueact.overview : '';
                                       var activityduration = (valueact.duartion_hours/60).toFixed(0)+' hour '+(valueact.duartion_hours%60)+' minutes';

                                       $("#summary-activity-section-"+cityid+"-"+ajaxdaynumber).append('<div id="summary_city_activity_id_'+valueact.id+'" class=""> <h3 style="text-decoration: underline;">'+valueact.title_name+' <a class="pull-right hide"><i class="fa fa-inr"></i> '+total_cost_act+'</a></h3> <div class="sub-summary-activity"> <h5>Overview</h5> <div id="activity-summary-overview" class="activity-description"> '+act_overview+' </div><h5>Duration: '+activityduration+'</h5> </div></div>');

                                     // $("#summary-activity-section-"+cityid).append('<div id="summary_city_activity_id_'+valueact.id+'" class=""><h3 style="text-decoration: underline;">'+valueact.title_name+' <a class="pull-right"><i class="fa fa-inr"></i> <span id="summary_activity_value_'+valueact.id+'">'+total_cost_act+'</span></a></h3><div class="sub-summary-activity"><h5>Overview</h5><div id="activity-summary-overview" class="activity-description"> '+act_overview+'</div><h5>Duration: '+activityduration+'</h5></div></div>');
                                     $("#pick-actitity-link-"+cityid).css('top','-20px');
                                  //}); 
                                  //console.log(place_activities_data);
                                }); 
                              }
                            
                              //console.log(package_activity_data);
                              
                            });
                            

                        }
                        startdaytwo = parseInt(startdaytwo) + parseInt(value.nights_count);

                      

                        $("#place-transports").append('<li data-cityid="'+cityid+'" id="transportli-'+cityid+'" class="tl-item hotel-list-panel"><div class="timeline-icon ti-text">'+state_city_names+'</div><div id="transport_city_'+cityid+'" style="" class="hotel-panel"><div id="transport_citydata_'+cityid+'"> <br><div class="col-md-12 form-horizontal"><div id="initialCharge_'+cityid+'" class="col-md-11 initialCharge_'+cityid+'" style="border-bottom: 1px solid #d4c8c8;padding-bottom: 15px; margin-bottom: 10px;"><div id="airportpick" class="form-group"> <label for="airportpickup" class="col-sm-6 control-label">Airport(pickup/Drop)</label><div class="col-sm-6"><div class="input-field"> <input type="text" id="airportpickup" onkeyup="return CalculateTransport()" class="allow_decimal airportpickup" name="airportpickup_'+cityid+'[]" placeholder=""><div class="input-highlight"></div></div></div></div><div class="form-group"> <label for="driverbeta" class="col-sm-6 control-label">Driver beta</label><div class="col-sm-6"><div class="input-field"> <input type="text" id="driverbeta" onkeyup="return CalculateTransport()" name="driverbeta_'+cityid+'[]" class="allow_decimal driverbeta" placeholder=""><div class="input-highlight"></div></div></div></div><div class="form-group"> <label for="tollparking" class="col-sm-6 control-label">Toll &amp; Parking</label><div class="col-sm-6"><div class="input-field"> <input type="text" id="tollparking" onkeyup="return CalculateTransport()" name="tollparking_'+cityid+'[]" class="allow_decimal tollparking" placeholder=""><div class="input-highlight"></div></div></div></div></div><div class="col-md-1"> <button type="button" onclick="return AddMoreAirport('+cityid+')" class="btn btn-circle theme waves-effect waves-circle waves-light"><i class="mdi mdi-plus"></i></button></div><div id="moreCharges_'+cityid+'"></div><div class="col-md-11"><div class="form-group"> <label for="interestrate_'+cityid+'" class="col-sm-6 control-label">Inter State Tax</label><div class="col-sm-6"><div class="input-field"> <input type="text" onkeyup="return CalculateTransport()" id="interestrate_'+cityid+'" name="interestrate_'+cityid+'" class="allow_decimal interstaterate_'+stateid+' interestrate" value="0" placeholder=""><div class="input-highlight"></div></div></div></div></div><div class="col-md-1"> &nbsp;</div></div></div></div></li>');

                        var transurl = "{{ route('get_package_transports') }}" + '?state_id=' + stateid +'&city_id='+cityid +'&package_id='+packageid;
                        $.ajax({
                           url: transurl,
                           type: "GET",
                           dataType: "json",
                           success: function(result) {
                            //  console.log(typeof result.city_id);
                             //var resultdata = JSON.parse(result);
                             //console.log(result);
                             rescity_id = result.city_id;
                             if(rescity_id!=''){
                                 $("#initialCharge_"+rescity_id+" #airportpickup").val(result.airportpickup_amount);
                                 $("#initialCharge_"+rescity_id+" #driverbeta").val(result.driverbeta_amount);
                                 $("#initialCharge_"+rescity_id+" #tollparking").val(result.tollparking_amount);
                                 $("#interestrate_"+rescity_id).val(result.interestrate_amount);
                             }
                             CalculateTransport();
                           }
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
               remote: {
                url: "{{ url('/customer_emailexists')}}",
                type: "post",
                data: {
                     email: function() {
                        return $("#email").val();
                    },
                    _token: "{{csrf_token()}}",
                    email: $(this).data('email')
                },  
            },
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
            "customer_address_one" : {
               required: true,
            },
            "customer_address_two" : {
               required: true,
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
            remote: "Email Already Exists",
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
            "customer_address_one" : {
               required: "Please, Enter address",
            },
            "customer_address_two" : {
               required: "Please, Enter address",
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
   (function($) {
   
   // $('#form_date').datepicker({
   //     format: 'dd/mm/yyyy'
   // });
  // Cache Selectors
  var date1		=$('.dpd1'),
     date2		=$('.dpd2');
  
  //Date Picker//
  var nowTemp = new Date();
   console.log(nowTemp);
  var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
 //  var now = new Date(nowTemp.getFullYear(),nowTemp.getDate(),  nowTemp.getMonth(), 0, 0, 0, 0);
   
  var checkin = date1.datepicker({
     onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
     }
  }).on('changeDate', function(ev) {
      
     if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 2);
          // console.log(newDate.getDate() + 2);
        checkout.setValue(newDate);
     }
      
       var date = new Date($("#form_date").val());
     //  console.log(date);
          days = parseInt($("#nightcount").val(), 10);
       
       if(!isNaN(date.getTime())){
           date.setDate(date.getDate() + days);
           
           
           $("#to_date").val(date.toInputFormat());
       } else {
           alert("Invalid Date");  
       }
     checkin.hide();
     //date2[0].focus();
     
  }).data('datepicker');
  
  var checkout = date2.datepicker({
     onRender: function(date) {
        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
     }
     
  }).on('changeDate', function(ev) {
     checkout.hide();
  }).data('datepicker');		
})(jQuery);
  
</script>
@endsection
@section('footerSecondSection')
  @include('admin.booking.common-scripts')
@endsection