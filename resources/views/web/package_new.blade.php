@extends('layouts.admin')
@section('headSection')
<link href="{{ asset('public/web-assets/css/steps.css') }}" rel="stylesheet" type="text/css">
<!--link href="http://localhost/Tours_travels/public/assets/dist/css/app.min.css" rel="stylesheet" type="text/css"-->
<link href="{{ asset('public/web-assets/css/timeline.css') }}" rel="stylesheet" type="text/css">
<style>
    body{
        font-family: sans-serif !important;
    }
    #footer .widget-title {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 3.3rem;
        margin-top: 0;
        text-transform: uppercase;
    }
    .timeline_items li h3:before, .timeline_items:after, a.content_link:after {
        border-color: #2991d6;
    }
    .timeline_items li h3:before {
        content: "";
        width: 7px;
        height: 7px;
        border-width: 4px;
        border-style: solid;
        -webkit-border-radius: 100%;
        border-radius: 100%;
        position: absolute;
        left: 50%;
        top: 11px;
        margin-left: -8px;
        display: block;
        z-index: 1;
    }
    .section-padding {
         padding-top: 20px; 
         padding-bottom: 20px; 
    }
    button{
        margin-right: 10px;
    }

    .state-cities .text-headline{
        margin-top: 20px;
    }
     .placecitylist {
        counter-reset: my-place-counter;
      }
      .placecitylist li:before {
        content: counter(my-place-counter);
        counter-increment: my-place-counter;
      }
       .button-close{
   z-index: 99;
   position: absolute;
   top: -21px;
    left: 57px;
   /* opacity: 0; */
   font-size: 13px;
   min-width: 100%;
   max-width: 100%;
   padding: 10px;
   text-align: center;
   color: rgba(0, 0, 0, 0.9);
   line-height: 150%;
   }
   .mt20{
        margin-top: 10px;
   }
   #place-hotels,#place-activities,#overall-summary{
       list-style: none !important;
   }
   #place-hotels li{
        /*border-left: 1px solid #ccc;
        padding-left: 10px;*/
   }
  .timeline>li:after, .timeline>li:before {
      content: " ";
      display: initial !important;
  }
  .timeline-icon.ti-text {
    width: 110px;
    right: -36px;
    left: auto;
    font-size: 10px;
    line-height: 2.3;
    text-transform: uppercase;
}
.timeline.timeline-single {
      max-width: 800px;
      overflow-x: hidden;
      padding-left: 40px;
      padding-right: 10px;
  }
   .timeline-icon.ti-text {
      width: auto !important;
  }

</style>
@endsection

@section('main-content')

  <!--========== PAGE-COVER =========-->
    <section class="page-cover dashboard">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1 class="page-title">New Itinerary</h1>
                    <ul class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">New Itinerary</li>
                    </ul>
                </div><!-- end columns -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section><!-- end page-cover -->
    <!--===== INNERPAGE-WRAPPER ====-->

<!--========================= NEWSLETTER-1 ==========================-->
<section id="" class="section-padding ">
   <div class="container-fluid">
      <div class="col-md-8">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form id="wizard1" action="#" class="paper">
               <h3>Travel Data</h3>
               <fieldset>
                  <div class="col-sm-12">
                     <h4 class="text-headline">Package Information</h4>
                     <br>
                      <div class="row">
                         <div class="col-md-4">
                            <div class="form-group">
                                <label>{{__('Package Name') }}<span style="color:red">*</span></label>
                               
                                <input placeholder="Package Name" class="form-control" required id="package_name" name="package_name" autofocus type="text">
                            </div>
                           
                         </div>
                          <div class="col-md-4">
                            <div class="form-group">
                               <label for="package_type" class="block">{{__('Package Type') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="package_type" name="package_type" class="form-control select-validate">
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
                          <div class="col-md-4">
                            <div class="input-field label-float">
                               <label for="package_name" class="">{{__('Persons') }}<span style="color:red">*</span></label>
                               <br>
                               <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span class="adult-count" id="adult-count">2</span> Adults & <span class="child-count" id="child-count">0</span> Children & <span class="infant-count" id="infant-count">0</span> Infants</a></p>
                               <input type="text" name="adult_count" id="adult-count-val" class="hide" value="2">
                               <input type="text" name="child_count" id="child-count-val" class="hide" value="0">
                               <input type="text" name="infant_count" id="infant-count-val" class="hide" value="0">
                               <div class="input-highlight"></div>
                            </div>
                            <!-- Modal -->
                          <div class="modal fade in" id="infantsModal" role="dialog">
                            <div class="modal-dialog modal-sm">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title">Travellers Details</h4>
                                </div>
                                <div class="modal-body">
                                         <div class="row">
                                           <div class="col-md-6">
                                              <label class="fixed-label">{{__('Adult:') }}</label>
                                              <br>
                                              <small>Age 13 and above</small>
                                           </div>
                                           <div class="col-md-6">
                                              <input type="text" name="adult-travellers" class="form-control adult-travellers allow_decimal" value="2" />

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
                                               <input type="text" name="child-travellers" class="form-control child-travellers allow_decimal" value="0" />
                                              
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
                                              <input type="text" name="infant-travellers" class="form-control infant-travellers allow_decimal" value="0" />
                                           </div>  
                                           
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    Total travellers : <span id="total-travellers">2</span>
                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
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
                            <div class="form-group">
                               <label for="from_country_id" class="">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="from_country_id" name="from_country_id" onchange="ChangeStates(this.value,0)" class="form-control" >
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
                            <!-- /.form-group -->
                             @php
                            $statelist = CommonHelper::getStateList($defcountry);
                            @endphp
                            <div class="select-row form-group">
                               <label for="from_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="from_state_id" name="from_state_id"  onchange="ChangeCities(this.value,0)" class="form-control" data-live-search="true" data-width="100%">
                                  <option value="" selected="">{{__('Select State') }}
                                  </option>
                                  @foreach ($statelist as $state)
                                  <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                  @endforeach
                               </select>
                               <div class="input-highlight"></div>
                            </div>
                            <div class="select-row form-group">
                               <label for="from_city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="from_city_id" name="from_city_id" class="form-control" data-live-search="true" data-width="100%">
                                  <option value="" selected="">{{__('Select City') }}
                                  </option>
                                  <!--  @foreach ($data['state_view'] as $state)
                                     <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                     @endforeach -->
                               </select>
                               <div class="input-highlight"></div>
                            </div>
                         </div>
                          <div class="col-md-6" style="background-color: #a6777726;">
                            <h4 class="text-headline text-center">Traveling To</h4>
                            <div class="select-row form-group">
                               <label for="to_country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="to_country_id" name="to_country_id" onchange="ChangeStates(this.value,1)" class="form-control" data-live-search="true" data-width="100%">
                                  <option value="">{{__('Select country')}}</option>
                                  @php
                                  $defcountry = CommonHelper::DefaultCountry();
                                  @endphp
                                  @foreach($data['country_view'] as $value)
                                  <option value="{{$value->id}}" >
                                  {{$value->country_name}}</option>
                                  @endforeach
                               </select>
                               <div class="input-highlight"></div>
                            </div>
                            <!-- /.form-group -->
                             @php
                            $statelist = CommonHelper::getStateList($defcountry);
                            @endphp
                            <div class="select-row form-group">
                               <label for="to_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="to_state_id" name="to_state_id" onchange="ChangeCities(this.value,1)" class="form-control" data-live-search="true" data-width="100%">
                                  <option value="" selected="">{{__('Select State') }}
                                  </option>
                                 <!--  @foreach ($statelist as $state)
                                  <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                  @endforeach -->
                               </select>
                               <div class="input-highlight"></div>
                            </div>
                            <div class="select-row form-group">
                               <label for="to_city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                               <!-- To validate the select add class "select-validate" -->     
                               <select id="to_city_id" name="to_city_id" class="form-control" onchange="ChangeCityvalues(this.id)" data-live-search="true" data-width="100%">
                                  <option value="" selected="">{{__('Select City') }}
                                  </option>
                                  <!--  @foreach ($data['state_view'] as $state)
                                     <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                     @endforeach -->
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
            </form>
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
     </div>
     <div id="right-section-packagearea" class="col-md-4">
        <div id="travel-section" class="">
               <div id="destination-chart" class="destinations-division">
                    <div class="sortable">
                        <div class="panel panel-warning">
                          <div class="panel-heading">Places (State-City)</div>
                          <div class="panel-body">
                            <ul id="place-sortList" class="list-group placecitylist item-border">
                               
                            </ul>
                            <div id="dummyList">

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
   </div>
   <!-- end container -->
</section>
<!-- end newsletter-1 -->
 @include('web.package.common-modal')
@endsection
@section('footerSection')
<script src="{{ asset('public/web-assets/js/jquery.steps.js') }}"></script>
<script src="{{ asset('public/web-assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/web-assets/js/jquery.dragsort.js') }}"></script>
<script type="text/javascript">
            var form = $("#wizard1").show();
             
            form.steps({
                headerTag: "h3",
                bodyTag: "fieldset",
                transitionEffect: "slideLeft",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Allways allow previous action even if the current form is not valid!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    // Forbid next action on "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age-2").val()) < 18)
                    {
                        return false;
                    }
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
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Used to skip the "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
                    {
                        form.steps("next");
                    }
                    // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        form.steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    alert("Submitted!");
                }
            }).validate({
                errorPlacement: function errorPlacement(error, element) { element.after(error); },
                rules: {
                    confirm: {
                        equalTo: "#password-2"
                    }
                }
            });
            $("#overall-summary").dragsort({
                dragEnd: saveOrder,
            });
             function saveOrder() {
                alert('ok');
             }
        </script>
        @include('web.package.common-scripts')
@endsection