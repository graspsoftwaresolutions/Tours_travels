@extends('layouts.admin')
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
          <form id="wizard1"  class="paper formValidate" method="post" enctype="multipart/form-data"  action="{{ route('package_save') }}">
            @csrf
            <h3>Travel Data</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Package Information</h4>
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
                           <input type="date" name="to_date" id="to_date"/>
                           <label for="to_date" class="fixed-label">{{__('To Date') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                       <div class="col-md-4">
                        <div class="select-row form-group">
                           <label for="package_type" class="block">{{__('Package Type') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="package_type" name="package_type" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option selected value="">{{__('Select Package')}}</option>
                              
                              @foreach($data['package_type'] as $type)
                                <option value="{{$type->id}}" >
                                 {{$type->package_type}}
                                </option>
                              @endforeach
                           </select>
                            <input type="hidden" name="packageid" id="packageid"> 
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-sm-6">
                          <div class="form-group input-field label-float">
                             <input class="typeahead" id="package_name" name="package_name"  type="text" placeholder="Type for a Package" autocomplete='off'>
                          
                             <!-- <span id="package_no_result"></span> -->
                             <label  for="" class="fixed-label">{{__('Package') }}<span style="color:red">*</span></label>
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
                                          <input type="text" name="adult-travellers" class="adult-travellers allow_decimal" value="2" />

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
                                           <input type="text" name="child-travellers" class="child-travellers allow_decimal" value="0" />
                                          
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
                                  <p id="summary-nights"><span class="night-count"></span> nights</p><span id="summary-days" class="text-small"><span class="days-count"></span> days</span>
                                </div>
                                 <div class="col-md-4"> 
                                  <p id="summary-family"><span class="adult-count">2</span> Adults <span class="child-count">0</span> Children</p><span id="summary-infants" class="text-small"><span class="infant-count">0</span> Infant</span>
                                </div>
                            </div>
                          </div>
                          
                      </div>
                       <ul id="overall-summary" class="timeline overallplacecitylist bg-color-switch mt40 timeline-single">
                          
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
                        <h4 class="text-headline">Price Summary</h4>   
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
                           <div class="form-group">
                            <label for="transport_charges" class="col-sm-5 control-label">Transport Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="transport_charges" name="transport_charges" class="allow_decimal" value="0" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="additional_charges" class="col-sm-5 control-label">Additional Charges
                            </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="additional_charges" name="additional_charges" class="allow_decimal" value="0" placeholder="Additional Charges">    
                                <div class="input-highlight"></div>
                              </div>
                            </div>
                         </div>
                          <div class="form-group">
                            <label for="total_package_value" class="col-sm-5 control-label">Total package value
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
                            <label for="total_amount" class="col-sm-5 control-label">Total</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount" name="total_amount" readonly="true" placeholder="Total Amount">    
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
                                <input type="text" id="adult_price" class="allow_decimal" name="adult_price" placeholder="Adult Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="child_price" class="col-sm-5 control-label">Child Price/person </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="child_price" class="allow_decimal" name="child_price" placeholder="Child Price/person">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="infant_price" class="col-sm-5 control-label">Infant Price/person</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="infant_price" class="allow_decimal" name="infant_price" placeholder="Infant Price/person">    
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
                  <input type="hidden" name="customer_id">
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
   
    @include('package.common-modal')
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
<script src ="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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
        data: 'action=package_name'+'&name='+request.term,
        success: function(data) {
         if (data.length === 0) {   
               var color = "No Results";
              $('#package_no_result').css('background-color', '#' + color);
              //$("#package_no_result").html("No Results");
              $("#bg").fadeIn(300);
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
      
      $('#total_package_value').val(ui.item.total_package_value);
      $('#gst_amount').val(ui.item.tax_amount);
      $('#total_amount').val(ui.item.total_amount);
      $('#adult_price_person').val(ui.item.adult_price_person);
      $('#child_price_person').val(ui.item.child_price_person);
      $('#infant_price').val(ui.item.infant_price);
      
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
                     $('#place-sortList').empty();
                     $.each(data.place_details, function( index, value ) {
                        $("#place-sortList").append('<li data-cityid="'+value.cityid+'" id="picked-li-'+value.cityid+'" class="list-group-item cityplace sort-handle"> . '+value.state_name+' - '+value.city_name+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+value.cityid+'" value="'+value.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+value.cityid+'" value="'+value.cityid+'"/></li>');

                     });
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
         console.log(data.length);
         if (data.length === 0) {   
              // alert('hii');
              $('.customer_details').hide();
              $('.customer_add').show();
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
   
</script>
@endsection
@section('footerSecondSection')
  @include('package.common-scripts')
@endsection