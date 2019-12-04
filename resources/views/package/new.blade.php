@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
   top: -34px;
   left: 58px;
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
                        <div class="col-md-8">
                           <div id="destination-division" class="destinations-division">
                             
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div id="destination-chart" class="destinations-division">
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
                  <div class="clearfix"></div>
                
               </div>
               <!-- /.col- -->
            </fieldset>
            <h3>Hotels</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Activity Additional Details</h4>
                  
                  
                  </div>
                  
                  
            </fieldset>
            <h3>Activities</h3>
            <fieldset>
            
            
            </fieldset>
            <p><span style="color:red;    margin-left: 40px;"> Mandatory (*)</span></p>
         </form>
         </div>
      </div>
      <!-- /.page-content -->
      <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
      <i class="mdi mdi-chevron-up medium"></i>
      </a>                
   </div>
   <!-- /.container-fluid -->
</section>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/sortable/sortable.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/smoothscroll/smooth-scroll.js') }}"></script>

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
                           var paramscity = "{  cityid: "+cityvalue.id+",  stateid: "+value.id+", cityname: '"+cityvalue.city_name+"', statename: '"+value.state_name+"' }";
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
      $("#place_button_"+paramscity.cityid).attr("disabled", true);
      $("#place-sortList").append('<li id="picked-li-'+paramscity.cityid+'" class="list-group-item sort-handle"> '+paramscity.statename+' - '+paramscity.cityname+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+paramscity.cityid+'" value="'+paramscity.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></li>');

      var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

      $("#destination-night-area").append('<div id="place_night_'+paramscity.cityid+'" class="col-xs-6 col-sm-6 mt20"><img class="responsive-img z-depth-1" src="http://localhost/Tours_travels/storage/app/hotels/10_20191128070404.jpg" style="width:190px;height: 130px;" alt=""><div id="place_night_remove_'+paramscity.cityid+'" class="button-close"> <button type="button" onclick="return DeleteNight('+paramscity.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+paramscity.cityname+'</small><div class="form-group"><select id="place_night_select_'+paramscity.cityid+'" name="place_night_select[]" class="form-control place-night-select">'+night_options+'</select></div></div>');
      
   }
   function DeleteNight(cityid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
           $("#place_night_"+cityid).remove();
      }else{
       // alert('Failed to delete');
      }
      
  }
</script>
@endsection