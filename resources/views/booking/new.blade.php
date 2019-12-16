@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/sweet_alert.css') }}">
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
   z-index: 99999;
   position: absolute;
   top: -40px;
   left: 89px;
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
/* .decreaseVal{
    display:inline-block;
    color:#fff;
    background:#2e748e;
    width:22px;
    height:22px;
    border-radius:50%;
    font-weight:900;
    line-height:22px;
    text-align: center; 
} */
.cursor_hover{
    cursor: hand;
    cursor: pointer;
}
.change_qty{
    display:inline-block;
    color:#fff;
    background:#2e748e;
    width:22px;
    height:22px;
    border-radius:50%;
    font-weight:900;
    line-height:22px;
    text-align: center; 
}
/* .increaseVal
{
   display:inline-block;
    color:#fff;
    background:#2e748e;
    width:22px;
    height:22px;
    border-radius:50%;
    font-weight:900;
    line-height:22px;
    text-align: center; 
} */
.cursor_hover{
    cursor: hand;
    cursor: pointer;
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
      <h1>Booking Information</h1>
      <ul class="breadcrumbs">
         <li>Booking</li>
         <li>Booking Details</li>
      </ul>
   </div>
   <div class="page-content clearfix">
      <div class="col-md-8">
         <!-- <div class="col-sm-10 col-sm-offset-1"> -->
         @include('includes.messages')
         <form id="formValidate" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
            <h1 class="text-display-1">Booking Information</h1>
            <input type="hidden" name="customer_id">
            <div class="row">
               <div class="col-sm-6">
                  <!-- <div class="input-append date" id="dp1" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                     <input class="span2" size="16" type="text" value="12-02-2012" ="">
                     <span class="add-on"><i class="icon-th"></i></span>
                     </div> -->
                  <!-- <div class="form-group input-field label-float">
                     <input  autofocus id="dp1" type="text">
                                          <label for="name" class="fixed-label">{{__('From') }}<span style="color:red">*</span></label>
                      <div class="input-highlight"></div>
                     </div> -->
                  <!-- <div class="input-group date" data-date-format="dd.mm.yyyy">
                     <input  type="text" class="form-control" placeholder="dd.mm.yyyy">
                     <div class="input-group-addon" >
                     <span class="glyphicon glyphicon-th"></span>
                     </div> -->
                  <div class="form-group input-field label-float">
                     <input  autofocus type="date">
                     <label for="" class="fixed-label">{{__('from') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
                  <!--/.form-group -->
               </div>
               <!-- ./col- -->
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input  autofocus type="date">
                     <label for="" class="fixed-label">{{__('To') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <div class="clearfix"></div>
               <!-- ./col- -->	
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input class="typeahead" id="package_name" name="package_name"  type="text" placeholder="Type for a Package" autocomplete='off'>
                  
                     <!-- <span id="package_no_result"></span> -->
                     <label  for="" class="fixed-label">{{__('Package') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <!-- ./col- -->	
               <div class="col-md-6">
                  <div class="input-field label-float">
                     <label for="package_name" class="fixed-label">{{__('Persons') }}<span style="color:red">*</span></label>
                     <br>
                     <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span class="adult-count" id="adult-count">2</span> Adults & <span class="child-count" id="child-count">0</span> Children & <span class="infant-count" id="infant-count">0</span> Infants</a></p>
                     <input type="text" name="adult_count" id="adult-count-val" class="text" value="2">
                     <input type="text" name="child_count" id="child-count-val" class="text" value="0">
                     <input type="text" name="infant_count" id="infant-count-val" class="text" value="0">
                     <div class="input-highlight"></div>
                  </div>
                  <div id="infantsModal" class="modal" tabindex="-1" role="dialog" style="display: none; opacity: 1;">
                     <div class="modal-dialog" role="document" style="transform: scaleX(0.7); top: 40%; opacity: 0;">
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                              <h1 class="modal-title">Travellers Details</h1>
                           </div>
                           <!-- /.modal-header -->
                           <div class="modal-body">
                              <div class="row">
                                 <div class="col-md-3">
                                    <label class="fixed-label">{{__('Adult:') }}</label>
                                    <br>
                                    <small>Age 13 and above</small>
                                 </div>
                                 <div class="col-md-9">
                                     <input type="text" name="adult-travellers" class="adult-travellers" value="2" >
                                    
                                 </div>   
                              </div> <br>
                              <div class="row">
                              <div class="select_listing adult">
                                 <!-- <div class="row ">
                                    <div class="col-md-2">
                                       <label class="fixed-label"></label>
                                    </div>
                                    <div class="col-md-3">
                                       <label class="fixed-label">{{__('1. Adult with age') }}</label>
                                    </div>
                                       <div class="col-md-5">
                                       <div class="change_qty minus cursor_hover">&#45;</div>
                  
                                       <input type="numeric" style="height:22px;width:40px;margin:0 .5em;text-align:center;" value="35">
                              
                                       <div class="change_qty plus cursor_hover">&#43;</div>
                                       </div>
                                 </div> <br> -->
                                 <div class="row adultage">
                                       <!-- <div class="col-md-2">
                                          <label class="fixed-label"></label>
                                       </div>
                                          <div class="col-md-3">
                                             <label class="fixed-label">{{__('2. Adult with age') }}</label>
                                          </div>
                                          <div class="col-md-5">
                                          <div class="change_qty minus cursor_hover">&#45;</div>
                     
                                          <input type="numeric" style="height:22px;width:40px;margin:0 .5em;text-align:center;" value="35">
                                          
                                          <div class="change_qty plus cursor_hover">&#43;</div>
                                          </div> -->
                                       </div>
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
                                 <input type="text" name="child-travellers" class="child-travellers" value="0" >
                                  
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
                                     <input type="text" name="infant-travellers" class="infant-travellers" value="0">
                                    <!-- <a class="label infant-travellers label-travellers z-depth-1  blue-dark" >0</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >1</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 ">2</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >3</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >4</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >5</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >6</a>
                                    <a class="label infant-travellers label-travellers z-depth-1" >7</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >8</a>
                                    <a class="label infant-travellers label-travellers z-depth-1 " >9</a> -->
                                 </div>
                              </div>
                           </div>
                           <!-- /.modal-body -->
                           <div class="modal-footer">
                              Total travellers : <span id="total-travellers">2</span>
                              <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                              <button class="btn-flat waves-effect waves-theme hide">Save changes</button>
                           </div>
                           <!-- /.modal-footer -->
                        </div>
                        <!-- /.modal-content -->
                     </div>
                     <!-- /.modal-dialog -->
                  </div>
               </div>
               <div class="clearfix"></div>
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <label for="customer_name" class="block fixed-label">{{__('Customer Name') }}<span style="color:red">*</span></label>                 
                     <!-- To validate the select add class "select-validate" -->     
                    
                        <input class="clearable" id="customer_name" name="customer_name"  type="text" placeholder="Search Customer" autocomplete='off'>
                       
                     <div class="input-highlight"></div>
                  </div>
               </div>
               <div class="clearfix"></div>
            </div>
            <!-- ./col- -->
            <div class="customer_add">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <button type="button" class="btn theme modal-trigger" data-toggle="modal" data-target="#defaultModal">
                     Add Customer
                     </button>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
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
            <div class="price-section">
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
                                <input type="text" id="total_package_value" name="total_package_value" class="allow_decimal" placeholder="Total package value">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="gst_amount" class="col-sm-5 control-label">GST <span>5</span>% <input type="text" name="gst_per" id="gst_per" value="5" class="hide" /> </label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="gst_amount" name="gst_amount" readonly="true" placeholder="Total GST Amount">    
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                         <div class="form-group">
                            <label for="total_amount" class="col-sm-5 control-label">Total</label>
                            <div class="col-sm-7">     
                              <div class="input-field">
                                <input type="text" id="total_amount" name="total_amount" readonly="true" placeholder="Total Amount"> 
                                <input type="text" id="adult_price_person" name="adult_price_person" readonly="true" placeholder="Adult Price">   
                                <input type="text" id="child_price_person" name="child_price_person" readonly="true" placeholder="child price">  
                                <input type="text" id="infant_price" name="infant_price" readonly="true" placeholder="Infant price"> 
                                <input type="text" id="output" name="infant_price" readonly="true" placeholder="Click Count"> 
                                <div class="input-highlight"></div>
                              </div>
                            </div><!-- /.col- -->
                        </div><!-- /.form-group -->
                    </div>
					 </div>
            <p><span style="color:red;    margin-left: 0px;"> </span></p>
            <div class="form-group clearfix">
               <button type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
            </div>
            <!-- /.form-group -->
         </form>
      </div>
      <!--</div> --><!-- /.row -->
      <div class="col-md-4 p8 sticky fixed">
      <div class="col-md-12" style="background-color: #a6777726;margin-top: 23px" >
            <h4 class="text-headline text-center">Traveling To</h4>
            <div class="select-row form-group">
               <label for="to_country_id" class="block">{{__('Country Name') }}</label>                 
               <!-- To validate the select add class "select-validate" -->     
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
         <div class="clearfix"></div>  <br> 
         <div id="destination-chart" class="destinations-division" >
            <div class="sortable">
               <div class="card">
                  <div class="p8 blue-grey">
                     <div class="card-title">Places (State-City)</div>
                     <input type="hidden" name="packageid" id="packageid"> 
                  </div>
                  <div class="card-block">
                     <div class="scroller ">
                        <ul id="place-sortList" class="list-group placecitylist item-border">
                        </ul>
                        <div id="dummyList">
                        </div>
                     </div>
                  </div>
                  <!-- /.card-block -->
               </div>
               <!-- /.card -->
            </div>
         </div>
         <br>
         <div id="destination-char" class="destinations-division" >
            
         </div>
         <br><br>
         
         
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
   <!-- =========================================================== -->
   <!-- End page content  -->
   <!-- =========================================================== -->
</section>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<!-- <script src="{{ asset('public/assets/dist/js/plugins/typeahead/typeahead.jquery.js') }}"></script> -->
<script src="{{ asset('public/assets/dist/js/plugins/typeahead/typeahead_external.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script src="{{ asset('public/assets/dist/js/external_sweet_alert.js') }}"></script>
<script>
// $(function(){
//    var slno = 1;
//    $('.adult-travellers').click(function(e){
//    e.preventDefault();
//     $(".adultage").append('<div class="select_listing adult"><div class="row "><div class="col-md-2"><label class="fixed-label"></label> </div><div class="col-md-3"><label class="fixed-label">{{__('1. Adult with age') }}</label></div><div class="col-md-5"><div class="change_qty minus cursor_hover">&#45;</div><input type="numeric" style="height:22px;width:40px;margin:0 .5em;text-align:center;" value="35"> <div class="change_qty plus cursor_hover">&#43;</div> </div> <br>');
//       //$(".adultage").append('<input type="button" value="-" class="decreaseVal"><input type="number" min="1" max="22" value="20" class="val" disabled><input type="button" value="+" class="increaseVal">');
//     $(".plus").click(function(e) {
//       e.preventDefault();
//       var $this = $(this);
//       var $input = $this.siblings('input');
//       var value = parseInt($this.val());

//       if (value < 100) {
//          value = value + 1;
//       } 
//       else {
//          value =30;
//       }

//       $input.val(value);
// });

// $(".minus").click(function(e) {
//   e.preventDefault();
//   var $this = $(this);
//   var $input = $this.siblings('input');
//   var value = parseInt($input.val());

//   if (value > 1) {
//     value = value - 1;
//   } 
//   else {
//     value =1;
//   }

//   $input.val(value);
// });
// slno++;
// $(".decreaseVal").click(function() {
//   var input_el=$(this).next('input');
//   var v= input_el.val()-1;
//   if(v>=input_el.attr('min'))
//   input_el.val(v)
// });


// $(".increaseVal").click(function() {
//   var input_el=$(this).prev('input');
//   var v= input_el.val()*1+1;
//   if(v<=input_el.attr('max'))
//   input_el.val(v)
// });


//});
$(document).on('keyup', '#total_package_value', function(){



     var total_package_value = $("#total_package_value").val();
     total_package_value = total_package_value=='' ? 0 : parseFloat(total_package_value);
     var gst_per = $("#gst_per").val();
     gst_per = gst_per=='' ? 0 : parseFloat(gst_per);
     var tax_amount = ((parseFloat(total_package_value)*gst_per)/100).toFixed(2);
     $("#gst_amount").val(tax_amount);
     $("#total_amount").val((parseFloat(tax_amount)+parseFloat(total_package_value)).toFixed(2));
   });
$(document).ready(function(){
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
						}
					}
			});
         }
		});

});
$(document).on('submit','form#stateformValidate',function(){
     $("#saveMasterButton").prop('disabled',true);
});

   (function ($) {
   $(document).ready(function () {

   $('.customer_details').hide();
   $('.customer_add').hide();
   var NoResultsLabel = "No Results";
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
            console.log(data.length);
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
               object.travelling_to_country_name = item.tocountryname  
               object.travelling_to_country_id =   item.tocountryid   
               object.travelling_to_state_name = item.tostatename
               object.travelling_to_state_id = item.tostateid
               object.travelling_to_city_name = item.tocityname
               object.travelling_to_city_id = item.tocityid
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
                     $('#place-sortList').empty('');
                     $.each(data.place_details, function( index, value ) {
                            $("#place-sortList").append('<li data-cityid="'+value.cityid+'" id="picked-li-'+value.cityid+'" class="list-group-item sort-handle"> . '+value.state_name+' - '+value.city_name+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+value.stateid+'" value="'+value.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+value.cityid+'" value="'+value.cityid+'"/></li>');
                     });
                     var encid = data.package_id;
                     var url = "{{ url('package-edit') }}/"+encid;   
                     $('#destination-char').html('<a target="_blank" href="'+url+'" style="color:white; margin-left :5px;" class="btn theme-accent waves-effect waves-light ">View Package Details</a>');
                }
            });
     }
   });
   });
   
   })(jQuery);
   // $(function() {
   //    $(".adult-travellers").click(function(){
   //       //alert('hii');
   //       var person_no = $(this).text();
   //       // $('.adult-travellers').removeClass('blue-dark');
   //       // $(this).addClass('blue-dark');
   //       $("#adult-count-val").val(parseInt(person_no));
   //       $(".adult-count").text(parseInt(person_no));
   //       CalculateTotalTravellers();
         
   //    });
   //    $(".child-travellers").click(function(){
   //       var person_no = $(this).text();
   //     //  $('.child-travellers').removeClass('blue-dark');
   //      // $(this).addClass('blue-dark');
   //       $("#child-count-val").val(parseInt(person_no));
   //       $(".child-count").text(parseInt(person_no));
   //       CalculateTotalTravellers();
   //    });
   //     $(".infant-travellers").click(function(){
   //       var person_no = $(this).text();
   //      // $('.infant-travellers').removeClass('blue-dark');
   //      // $(this).addClass('blue-dark');
   //       $("#infant-count-val").val(parseInt(person_no));
   //       $(".infant-count").text(parseInt(person_no));
   //       CalculateTotalTravellers();
   //    });

     
   // });
   $('#infantsModal').on('click', function(){
      var adultcount = parseInt($(".adult-travellers").val());
      var childcount = parseInt($(".child-travellers").val());
      var infantcount = parseInt($(".infant-travellers").val());
      $("#adult-count-val").val(parseInt(adultcount));
      $(".adult-count").text(parseInt(adultcount));

      $("#child-count-val").val(parseInt(childcount));
      $(".child-count").text(parseInt(childcount));
     
      $("#infant-count-val").val(parseInt(infantcount));
      $(".infant-count").text(parseInt(infantcount));


      CalculateTotalTravellers();
   
   });
   function CalculateTotalTravellers(){
      var adultcount = parseInt($(".adult-travellers").val());
      var childcount = parseInt($(".child-travellers").val());
      var infantcount = parseInt($(".infant-travellers").val());

    $("#total-travellers").text(childcount+adultcount+infantcount);
     
      if(adultcount > 2)
      {
         while (adultcount < 10) {
            var adult_price_person = parseInt($('#adult_price_person').val());
            var adultprice = (adultcount - 2) * adult_price_person;
            break;
         }
        
      }
      else{
         var adultprice = 0;
      }
      if(childcount > 0)
      {
         var child_price_person = parseInt($('#child_price_person').val());
         var childprice = childcount * child_price_person;
        
      }
      else{

         var childprice = 0;
      }

      if(infantcount > 0 )
      {
         var infant_price = parseInt($('#infant_price').val());
      }
      else{
         var infant_price = 0;
      }

      var personPackagePrie = parseInt(adultprice+childprice+infant_price) ;
      //alert(personPackagePrie);
      var total_package_value = parseInt($('#total_package_value').val()) ;

      var personpackagetotal_val =  parseInt(total_package_value+personPackagePrie);
     // alert(personpackagetotal_val);
      
      $('#total_package_value').val(personpackagetotal_val);

         $(document).on('keyup', '#total_package_value', function(){
         var total_package_value = $("#total_package_value").val();
         total_package_value = total_package_value=='' ? 0 : parseFloat(total_package_value);
         var gst_per = $("#gst_per").val();
         gst_per = gst_per=='' ? 0 : parseFloat(gst_per);
         var tax_amount = ((parseFloat(total_package_value)*gst_per)/100).toFixed(2);
         $("#gst_amount").val(tax_amount);
         $("#total_amount").val((parseFloat(tax_amount)+parseFloat(total_package_value)).toFixed(2));
         });
      }
   $(document).ready(function(){
   $('.input-group.date').datepicker({format: "dd-mm-yyyy"}); 
   $('#dp1').datepicker({ format: 'mm-dd-yyyy', });
   $("#formValidate").validate({
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
   	window.location.href = "{{route('customer.new')}}";
   }
   }
   });
     }
   });
   
   });
   $(function () {
   // $('#customer_name').change(function() {
   
   });
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
   });
</script>
@endsection