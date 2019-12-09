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
    counter-reset: my-badass-counter;
  }
  .placecitylist li:before {
    content: counter(my-badass-counter);
    counter-increment: my-badass-counter;
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
         <li>{{__('Add Hotel') }}</li>
      </ul>
   </div>
   <div class="page-content">
      @include('includes.messages')
      <div class="paper toolbar-parent mt10">
          <div class="col-md-9">
          <form id="wizard1"  class="paper formValidate" method="post" enctype="multipart/form-data"  action="{{route('activity.save')}}">
            @csrf
            <h3>Travel Data</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Package Information</h4>
                  <!-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> -->
                  <div class="row">
                     <div class="col-md-6">
                        <div class="input-field label-float">
                           <input placeholder="Package Name" class="clearable" id="package_name" name="package_name" autofocus type="text">
                           <label for="package_name" class="fixed-label">{{__('Package Name') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-6">
                        <div class="input-field label-float">
                           <label for="package_name" class="fixed-label">{{__('Persons') }}<span style="color:red">*</span></label>
                           <br>
                           <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span id="adult-count">2</span> Adults & <span id="child-count">0</span> Children & <span id="infant-count">0</span> Infants</a></p>
                           <input type="text" name="adult_count" id="adult-count-val" class="hide" value="2">
                           <input type="text" name="child_count" id="child-count-val" class="hide" value="0">
                           <input type="text" name="infant_count" id="infant-count-val" class="hide" value="0">
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
                           <select id="from_state_id" name="from_state_id"  onchange="ChangeCities(this.value,0)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
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
                           <select id="from_city_id" name="from_city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
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
                           <select id="to_country_id" name="to_country_id" onchange="ChangeStates(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
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
                           <select id="to_state_id" name="to_state_id" onchange="ChangeCities(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
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
                           <select id="to_city_id" name="to_city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
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
                  </div>
                </div>
                  
                  
            </fieldset>
            <h3>Activities</h3>
            <fieldset>
                <div class="col-sm-12">
                  <h4 class="text-headline">Activities</h4>
                  <div class="row">
                    <ul id="place-activities" class="timeline bg-color-switch mt40 timeline-single">
                        <!-- <li id="picked-activityli-28" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">Sarawak - Miri</div>
                          <div class="msg-wrapper">
                            <img src="http://localhost/Tours_travels/storage/app/hotels/7_20191128064351.jpg" alt="" class="avatar ">
                              <a href="#:;" class="msg-sub">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                              <a href="#:;" class="msg-from"><i class="fa fa-inr"></i> 17121</a>
                              <p><a href="#" style="color: red;" class="">Remove</a></p>
                              
                          </div>
                          <div class="msg-wrapper">
                            <img src="http://localhost/Tours_travels/storage/app/hotels/7_20191128064351.jpg" alt="" class="avatar ">
                              <a href="#:;" class="msg-sub">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                              <a href="#:;" class="msg-from"><i class="fa fa-inr"></i> 17121</a>
                              <p><a href="#" style="color: red;" class="">Remove</a></p>
                              
                          </div>
                          <div class="msg-wrapper">
                            <img src="http://localhost/Tours_travels/storage/app/hotels/7_20191128064351.jpg" alt="" class="avatar ">
                              <a href="#:;" class="msg-sub">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</a>
                              <a href="#:;" class="msg-from"><i class="fa fa-inr"></i> 17121</a>
                              <p><a href="#" style="color: red;" class="">Remove</a></p>
                              
                          </div>
                          <a href="#" style="top: -20px;" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a>

                        </li> -->
                        

                    </ul>
                  </div>
                </div>
            
            </fieldset>
            <p><span style="color:red;    margin-left: 40px;"> Mandatory (*)</span></p>
         </form>
          </div>
          <div class="col-md-3  p8 sticky fixed" >
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
</section>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/sortable/sortable.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/smoothscroll/smooth-scroll.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/list/list.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/list/list.pagination.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/code-prettify/prettify.js') }}"></script>
<script>
   $("#dashboard_sidebar_li_id").addClass('active');
    var form = $("#wizard1").show();
  

    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        onStepChanging: function (event, currentIndex, newIndex)
        {
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
               }
               if($("#to_country_id").val()==''){
                  $('.to_country_id-error').remove();
                  $( '<div id="to_country_id-error" class="error to_country_id-error custom-error" >Please choose Country.</div>' ).insertAfter( '#to_country_id' );
                  formsubmit =false; 
               }
              if($("#from_state_id").val()==''){
                  $('.from_state_id-error').remove();
                  $( '<div id="from_state_id-error" class="error from_state_id-error custom-error">Please choose roomtype.</div>' ).insertAfter( '#from_state_id' );
                  formsubmit =false; 
               }
               if($("#to_state_id").val()==''){
                  $('.to_state_id-error').remove();
                  $( '<div id="to_state_id-error" class="error to_state_id-error custom-error">Please choose roomtype.</div>' ).insertAfter( '#to_state_id' );
                  formsubmit =false; 
               }
               if($("#from_city_id").val()==''){
                  $('.from_city_id-error').remove();
                  $( '<div id="from_city_id-error" class="error from_city_id-error custom-error">Please choose from_city_id.</div>' ).insertAfter( '#from_city_id' );
                  formsubmit =false; 
               }
               if($("#to_city_id").val()==''){
                  $('.to_city_id-error').remove();
                  $( '<div id="to_city_id-error" class="error to_city_id-error custom-error">Please choose to_city_id.</div>' ).insertAfter( '#to_city_id' );
                  formsubmit =false; 
               }
                if($("#package_name").val()==''){
                  $('.package_name-error').remove();
                  $( '<div id="package_name-error" class="error package_name-error custom-error">Please ebter package name.</div>' ).insertAfter( '#package_name' );
                  formsubmit =false; 
               }
                
              // return formsubmit;
            }
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
          
           $.ajax({
              type: 'POST',
              url: "{{ route('package_save') }}",
              data: new FormData(this),
              dataType: 'json',
              contentType: false,
              cache: false,
              processData:false,
            //   beforeSend: function(){
            //       $('.submitBtn').attr("disabled","disabled");
            //       $('#wizard1').css("opacity",".5");
            //   },
              success: function(response){

               alert('package added succesfully');
               window.location.reload();
                
              }
          });
           return true;
        }
      //  $('#wizard1').trigger('submit');
    }).validate({
        rules: {
          'package_name': {
                  required: true,
              },
        },
        messages: {
              'package_name': {
                  required: 'Please enter package name.',
              },
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
      $('select[name=country_id]').change(function() {
         // alert('ok');
          
      });
   
      $('select[name=state_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
          
      });
      $(".adult-travellers").click(function(){
         var person_no = $(this).text();
         $('.adult-travellers').removeClass('blue-dark');
         $(this).addClass('blue-dark');
         $("#adult-count-val").val(parseInt(person_no));
         $("#adult-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
      $(".child-travellers").click(function(){
         var person_no = $(this).text();
         $('.child-travellers').removeClass('blue-dark');
         $(this).addClass('blue-dark');
         $("#child-count-val").val(parseInt(person_no));
         $("#child-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
       $(".infant-travellers").click(function(){
         var person_no = $(this).text();
         $('.infant-travellers').removeClass('blue-dark');
         $(this).addClass('blue-dark');
         $("#infant-count-val").val(parseInt(person_no));
         $("#infant-count").text(parseInt(person_no));
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
               $('#'+stateid).append('<option value=' + value.id + '>' + value.state_name +
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
               $('#'+cityid).append('<option value=' + value.id + '>' + value.city_name +
                   '</option>');
           });
            $('#'+cityid).selectpicker("refresh");
       });

       
   }
</script>
@endsection
@section('footerSecondSection')
<script type="text/javascript">
   (function($){

      // Options on smoothscroll plugin
      smoothScroll.init({
            speed: 800,
            easing: 'easeInOutCubic',
            offset: 0,
            updateURL: false
      });

   // Sortable 

      // list
      $("#place-sortList").sortable();
   })(jQuery);
   function PickPlace(paramscity){
      var imagelocation = paramscity.cityimage=='null' ? image_url+'/city/no-image.png' : image_url+'/city/'+paramscity.cityimage;
      var imagedummy =  image_url+'/city/no-image.png';

    //console.log(paramscity);
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //var passparamscity = '"'+paramscity+'"';
      $("#place_button_"+paramscity.cityid).attr("disabled", true);
      $("#place-sortList").append('<li id="picked-li-'+paramscity.cityid+'" class="list-group-item sort-handle"> . '+paramscity.statename+' - '+paramscity.cityname+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+paramscity.cityid+'" value="'+paramscity.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></li>');

      var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

    
      $("#destination-night-area").append('<div id="place_night_'+paramscity.cityid+'" class="col-xs-6 col-sm-6 mt20"><img class="responsive-img z-depth-1" src="'+imagelocation+'" style="width:190px;height: 100px;" alt=""><div id="place_night_remove_'+paramscity.cityid+'" class="button-close"> <button type="button" onclick="return DeleteNight('+paramscity.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+paramscity.cityname+'</small><div class="form-group"><select id="place_night_select_'+paramscity.cityid+'" name="place_night_select[]" class="form-control place-night-select">'+night_options+'</select></div></div>');  

      $("#place-hotels").append('<li id="picked-hotelli-'+paramscity.cityid+'" class="tl-item"><div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+paramscity.cityid+'" class="media"><div class="media-left media-img"><a><img class="responsive-img" src="'+imagedummy+'" alt="..."></a></div><div class="media-body p10"><h4 class="media-heading">Please choose hotel</h4> <button id="add_hotel_button_'+paramscity.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add Hotel</button></div></div></div></li>');

      $("#place-activities").append('<li id="picked-activityli-'+paramscity.cityid+'" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div id="place-activitylist-'+paramscity.cityid+'"></div><a href="#" onClick="PickActity('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>');

      
   }
   function DeleteNight(cityid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
           $("#place_night_"+cityid).remove();
           $("#picked-hotelli-"+cityid).remove();
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
                  var imagelocation = image_url+'/city/no-image.png';

                  if(hotelimages.length>0){
                     var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                  }
                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? image_url+'/city/no-image.png' : image_url+'/city/'+paramscity.cityimage;

                  $("#listhotelsarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 130px;" alt="..."></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.hotel_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+'</p></div><div class="col-md-2"> <p style="margin-bottom: 10px;">at 2,226 more</p><button type="button" id="viewhotelid" onclick="return ViewHotelDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button  id="hotellistconfirm" type="button" onclick="return ConfirmHotel('+value.id+','+paramscity.cityid+','+passparamscity+')" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
                });
              // $('#masterid').val(result.id);
              // $('#masterid').attr('data-autoid', result.id);
              // $('#country_name').val(result.country_name);
              
          }
      });
     

      $("#hotelcityname").html(place_area);
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

      $("#dayHotelScroll,#hotel-leftpanel,#hotel-rightpanel").mCustomScrollbar({
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
              var imagelocation = image_url+'/city/no-image.png';

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
            var imagelocation = image_url+'/city/no-image.png';

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

            $("#picked-hotelmedia-"+cityid).append('<div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="..."></a></div><div class="media-body p10"><h4 class="media-heading">'+resultdata.hotel_name+'</h4><p>'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <button id="add_hotel_button_'+cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button></p>'+hiddenvalues+'</div>');
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
                  var imagelocation = image_url+'/city/no-image.png';

                  if(hotelimages.length>0){
                     var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                  }
                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? image_url+'/city/no-image.png' : image_url+'/city/'+paramscity.cityimage;

                  $("#listactivitiesarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 130px;" alt="..."></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.hotel_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+'</p></div><div class="col-md-2"> <p style="margin-bottom: 10px;">at 2,226 more</p><button type="button" id="viewhotelid" onclick="return ViewHotelDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button  id="hotellistconfirm" type="button" onclick="return ConfirmHotel('+value.id+','+paramscity.cityid+','+passparamscity+')" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
                });
              // $('#masterid').val(result.id);
              // $('#masterid').attr('data-autoid', result.id);
              // $('#country_name').val(result.country_name);
              
          }
      });
     

      $("#hotelcityname").html(place_area);
      $("#CityActivityModal").modal();
  }
  // $(window).scroll(function(){
  //   var sticky = $('.sticky'),
  //       scroll = $(window).scrollTop();

  //   if (scroll >= 100) sticky.addClass('fixed');
  //   else sticky.removeClass('fixed');
  // });
</script>
@endsection