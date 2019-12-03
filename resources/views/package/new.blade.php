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
   .state-cities button{
      border-radius: 30px;
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
                           <label for="package_name" class="fixed-label">{{__('Package Name') }}*</label>
                           <div class="input-highlight"></div>
                        </div>
                     </div>
                      <div class="col-md-6">
                        <div class="input-field label-float">
                           <label for="package_name" class="fixed-label">{{__('Persons') }}*</label>
                           <br>
                           <p><a class="modal-trigger" style="cursor: pointer" data-toggle="modal" data-target="#infantsModal"><span id="adult-count">2</span> Adults & <span id="child-count">0</span> Children & <span id="infant-count">0</span> Infants</a></p>
                           <input type="text" name="adult-count-val" id="adult-count-val" class="hide" value="2">
                           <input type="text" name="child-count-val" id="child-count-val" class="hide" value="0">
                           <input type="text" name="infant-count-val" id="infant-count-val" class="hide" value="0">
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
                           <label for="from_country_id" class="block">{{__('Country Name') }}</label>                 
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
                           <label for="from_state_id" class="block">{{__('State Name') }}</label>                 
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
                           <label for="from_city_id" class="block">{{__('City Name') }}</label>                 
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
                           <label for="to_country_id" class="block">{{__('Country Name') }}</label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_country_id" name="to_country_id" onchange="ChangeStates(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
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
                           <label for="to_state_id" class="block">{{__('State Name') }}</label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_state_id" name="to_state_id" onchange="ChangeCities(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($statelist as $state)
                              <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        <div class="select-row form-group">
                           <label for="to_city_id" class="block">{{__('City Name') }}</label>                 
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
                        <div id="destination-division" class="destinations-division">
                           <div class="col-md-12 state-cities">
                               <h5 class="text-headline text-bold">Tamil Nadu</h5>
                               
                           </div>
                        </div>
                       
                      
                   
                     <div class="col-md-4">
                        <div class="form-group">
                           <div class="input-field label-float">
                              <input placeholder="Address one" class="clearable" id="address_one" name="address_one" type="text">
                              <label for="address_one" class="fixed-label">{{__('Address one') }}</label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix"></div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <div class="input-field label-float">
                              <input placeholder="Address two" class="clearable" id="address_two" name="address_two" type="text">
                              <label for="address_two" class="fixed-label">{{__('Address two') }}</label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <div class="input-field label-float">
                              <input placeholder="Address two" class="clearable" id="zip_code" name="zip_code" type="text">
                              <label for="zip_code" class="fixed-label">{{__('Zip Code') }}</label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="short_description" class="fixed-label">{{__('Short Description') }}</label>
                           <textarea class="textarea-auto-resize" placeholder="Enter Short Description" name="short_description" id="short_description"></textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
               </div>
               <!-- /.col- -->
            </fieldset>
            <h3>Hotels</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Activity Additional Details</h4>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for=""><strong>Overview: </strong></label>
                           <textarea name="overview" id="overview"></textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for=""><strong>Additional Info: </strong></label>
                           <textarea name="additional_info" id="additional_info"></textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div>
                  </div>
                  
                  
            </fieldset>
            <h3>Activities</h3>
            <fieldset>
            <div class="col-sm-12">
            <h4 class="text-headline">Photo Gallery</h4>
            <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
            </br>
            <div class="col-md-12">
            <div class="file-field input-field">
            <div class="btn theme">
            <span>File</span>
            <input type="file" name="image_name[]" id="image_name"  accept="image/*" multiple>
            </div>
            <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Upload one or more files">
            <div class="input-highlight"></div>
            </div>
            </div><!-- /.input-field -->
            </br>
            <code>Note:  Max file size : 2MB, Max width*height : 1200*700px</code>
            </br>
            </br>
            </div>
            </br>
            </br>
            <div class="row hide">
            <div class="divider theme ml14 mr14"></div>
            <div class="col-xs-12 col-sm-3 mt20">
            <img class="responsive-img z-depth-1" src="{{ asset('public/assets/demo/images/demo-14.jpg') }}" alt="">
            <div class="button-close"> <button type="button" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div>
            </div>
            <div class="col-xs-12 col-sm-3 mt20">
            <img class="responsive-img z-depth-1" src="{{ asset('public/assets/demo/images/demo-12.jpg') }}" alt="">
            <div class="button-close"> <button type="button" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div>
            </div>
            <div class="col-xs-12 col-sm-3 mt20">
            <img class="responsive-img z-depth-1" src="{{ asset('public/assets/demo/images/demo-17.jpg') }}" alt="">
            <div class="button-close"> <button type="button" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div>
            </div>
            <div class="col-xs-12 col-sm-3 mt20">
            <img class="responsive-img z-depth-1" src="{{ asset('public/assets/demo/images/demo-5.jpg') }}" alt="">
            <div class="button-close"> <button type="button" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div>
            </div>
            </div>
            </div><!-- /.col- -->
            </fieldset>
            
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
           $('#wizard1').trigger('submit');
           return true;
        }
    }).validate({
        rules: {
          'title_name': {
                  required: true,
              },
              'duartion_hours' : {
                required: true,
              },
        },
        messages: {
              'title_name': {
                  required: 'Please fill title.',
              },
              'duartion_hours' : {
                required: 'Please fill duration.',
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
                     var dest_data = '<div class="col-md-12 state-cities"><h5 class="text-headline text-bold">'+value.state_name+'</h5><div id="destination-city-'+value.id+'">';
                     var city_url = "{{ url('get-cities-list') }}" + '?State_id=' + value.id;
                     $.get(city_url, function(citydata) {
                        $.each(citydata, function(citykey, cityvalue) {

                           dest_data += '<button class="btn theme-accent waves-effect waves-light "><i class="mdi mdi-plus left"></i>'+cityvalue.city_name+'</button>';

                        });
                     });
                     dest_data += '</div></div>';
                      alert(dest_data);
                     $("#destination-division").append(dest_data);
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