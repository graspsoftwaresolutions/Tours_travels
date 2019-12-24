@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/sweet_alert.css') }}">
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
            <h3>Detail</h3>
            <fieldset>
               <div class="col-sm-12">
                  <h4 class="text-headline">Activity Information</h4>
                  <!-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> -->
                  <div class="row">
                     <div class="col-md-12">
                        <div class="input-field label-float">
                           <input placeholder="Title Name" class="clearable" id="title_name" name="title_name" autofocus type="text">
                           <label for="title_name" class="fixed-label">{{__('Title') }}<span style="color:red">*</span></label>
                           <div class="input-highlight"></div>
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
                  <div class="col-md-4 col-sm-12">
                     <div class="row">
                        <div class="form-group">
                           <div class="input-field label-float">
                              <div class="col-md-4 col-sm-6">
                                 <select name="hours" class="form-control"  id="hours">
                                 @php 
                                 for($i=0;$i<=9;$i++)
                                 {
                                    @endphp
                                    <option value='0{{$i}}'>0{{$i}}</option>
                                    @php
                                 }
                                 for($i=10;$i<=24;$i++)
                                 {
                                    @endphp
                                    <option value='{{$i}}'>{{$i}}</option>
                                    @php
                                 }
                                 @endphp
                                 </select> 
                              </div>
                              <div class="col-md-2 col-sm-6"><label for="" class="control-label">{{__('Hours') }}</label>
                              </div>
                              <div class="col-md-4 col-sm-6">
                                    <select name="minutes" id="minutes" class="form-control">
                                       @php 
                                       for($i=0;$i<=9;$i++)
                                       {
                                          @endphp
                                          <option value='0{{$i}}'>0{{$i}}</option>
                                          @php
                                       }
                                       for($i=10;$i<=60;$i++)
                                       {
                                          @endphp
                                          <option value='{{$i}}'>{{$i}}</option>
                                          @php
                                       }
                                       @endphp
                                    </select>  
                                   
                                     </div>
                                     <div class="col-md-2 col-sm-6"> <label for="" class="control-label">{{__('Min') }}</label>
                                     </div>
                              <label for="" style="margin-left: 18px;" class="fixed-label">{{__('Duration (Hours)') }}</label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <div class="input-field label-float">
                              <input placeholder="Amount" class="clearable" id="amount" name="amount" type="text">
                              <label for="amount" class="fixed-label">{{__('Amount') }}</label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="select-row form-group">
                           <label for="country_id" class="block">{{__('Country Name') }}<span style="color:red;">*</span></label>                 
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
                        <!-- /.form-group -->
                     </div>
                     <div class="clearfix"></div>
                     @php
                     $statelist = CommonHelper::getStateList($defcountry);
                     @endphp
                     <div class="col-md-4">
                        <div class="select-row form-group">
                           <label for="state_id" class="block">{{__('State Name') }}<span style="color:red;">*</span></label>                 
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
                        <!-- /.form-group -->
                     </div>
                     <div class="col-md-4">
                        <div class="select-row form-group">
                           <label for="city_id" class="block">{{__('City Name') }}<span style="color:red;">*</span></label>                 
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
                        <!-- /.form-group -->
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
                              <input placeholder="Zip Code" class="clearable" id="zip_code" name="zip_code" type="text">
                              <label for="zip_code" class="fixed-label">{{__('Zip Code') }}</label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                     </div>
                     <!-- <div class="col-md-4">
                        <div class="form-group">
                             <div class="input-field label-float">
                               <input placeholder="Address two" class="clearable" id="latitude" name="latitude" type="text">
                               <label for="latitude" class="fixed-label">{{__('Latitude') }}</label>
                               <div class="input-highlight"></div>
                           </div>
                         </div>
                        </div>
                         
                        <div class="col-md-4">
                        <div class="form-group">
                             <div class="input-field label-float">
                               <input placeholder="longitude" class="clearable" id="longitude" name="longitude" type="text">
                               <label for="longitude" class="fixed-label">{{__('Longitude') }}</label>
                               <div class="input-highlight"></div>
                           </div>
                         </div>
                        </div> -->
                  </div>
                  <div class="clearfix"></div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="short_description" class="fixed-label">{{__('Short Description') }}</label>
                           <textarea class="textarea-auto-resize" style="border: 1px solid #9e9e9e;padding: 10px;" placeholder="Enter Short Description" name="short_description" id="short_description"></textarea>
                           <p class="no-margin em"></p>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
               </div>
             
               <!-- /.col- -->
            </fieldset>
            <h3>Additional Info</h3>
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
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for=""><strong>Inclusions:  </strong></label>
                           <span> <a href="#" data-toggle="modal" title="Add" data-target="#masterModal">  <i class="fa fa-plus-circle" style="font-size: 22px; color: #ec415f;margin: 5px;vertical-align: sub"></i> </a> </span>
                           <!-- <p class="no-margin em"></p> -->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-2"></div>
                     <div class="col-sm-8 mt10">
                        <div class="paper">
                           <table id="InclusionTable" class="table-centered table-hover paper update-table">
                              <thead>
                                 <tr>
                                    <th>Inclusion Name</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody id="exampleTable" border=1>
                                 <!-- <tr class=""> -->
                                 <!-- <td id="inclu_name"></td>
                                    <td><a href="#"  class="btn btn-sm red waves-effect waves-circle waves-light" title="delete"><i class="mdi mdi-delete"  ></i></a></td> -->
                                 <!-- </tr> -->
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- /.col- -->
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for=""><strong>Exclusions: </strong></label>
                           <span>  <a href="#" data-toggle="modal" title="Add" data-target="#ExclusionModal"> <i class="fa fa-plus-circle" style="font-size: 22px; color: #ec415f;margin: 5px;vertical-align: sub"></i> </a> </span>
                           <!-- <p class="no-margin em"></p> -->
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-2"></div>
                     <div class="col-sm-8 mt10">
                        <div class="paper">
                           <table id="ExclusionTable" class="table-centered table-hover paper update-table">
                              <thead>
                                 <tr>
                                    <th>Exclusion Name</th>
                                    <th>Action</th>
                                 </tr>
                              </thead>
                              <tbody id="exampleTable">
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- /.col- -->
                  </div>
            </fieldset>
            <h3>Photo Gallery</h3>
            <fieldset>
            <div class="col-sm-12">
            <h4 class="text-headline">Photo Gallery</h4>
            <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
            </br>
            <div class="col-md-12">
            <div class="file-field input-field">
            <div class="btn theme">
            <span>File</span>
            <input type="file" name="image_name[]" id="image_name"  accept="image/png, image/jpeg" multiple>
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
            <!-- Inclusion Modal Starts -->
            <div id="masterModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header theme">
            <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
            <h1 class="modal-title">Inclusion Details</h1>
            </div><!-- /.modal-header -->
            
            <div class="modal-body">
            <div class="col-sm-12">
            <input class="hide" id="masterid" name="masterid" type="text">
            <div class="row">
            <div class="col-sm-6">
            <div class="input-field label-float">
            <input placeholder="Inclusion Name" class="clearable" id="inclusion_name" name="inclusi_name" autofocus type="text">
            <label for="inclusion_name" class="fixed-label">{{__('Inclusion Name') }}*</label>
            <div class="input-highlight"></div>
            </div>
            </div><!-- ./col- -->
            </div><!-- /.row -->     
            </div><!-- /.row -->    
            </div><!-- /.modal-body -->
            <div class="modal-footer">
            <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
            <button id="saveInclusionButton" type="button" class="btn-flat waves-effect waves-theme">Save</button>
            </div><!-- /.modal-footer -->
            <!-- </form> -->
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Inclusion Modal End -->
            <!-- Exclusion Modal Starts -->
            <div id="ExclusionModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header theme">
            <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
            <h1 class="modal-title">Exclusion Details</h1>
            </div><!-- /.modal-header -->
            <div class="modal-body">
            <div class="col-sm-12">
            <input class="hide" id="masterid" name="masterid" type="text">
            <div class="row">
            <div class="col-sm-6">
            <div class="input-field label-float">
            <input placeholder="Exclusion Name" class="clearable" id="exclusion_name" name="exclusion_nam" autofocus type="text">
            <label for="exclusion_name" class="fixed-label">{{__('Exclusion Name') }}*</label>
            <div class="input-highlight"></div>
            </div>
            </div><!-- ./col- -->
            </div><!-- /.row -->     
            </div><!-- /.row -->    
            </div><!-- /.modal-body -->
            <div class="modal-footer">
            <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
            <button id="saveExclusionButton" type="button" class="btn-flat waves-effect waves-theme">Save</button>
            </div><!-- /.modal-footer -->
            </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Exclusion Modal End -->
         </form> <br><br>
         <p><span style="color:red;"> Mandatory (*)</span></p>
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
<script src="{{ asset('public/assets/dist/js/external_sweet_alert.js') }}"></script>
<script>
    var form = $("#wizard1").show();
    $("#avtivity-menu").addClass('active');
   $("#activity_sidebar_li_id").addClass('active');
   $(document).ready(function() {
    
    $('#saveInclusionButton').click(function(){
    var inclusionname =  $('#inclusion_name').val();
    var slno=0;
    if(inclusionname != '')
    {
      
      var flag=0;
      $('#InclusionTable').find('tr').each(function(){
         var td1 = $(this).find("td:eq(0)").text();
         var uppercasetd1 = td1.toUpperCase();
         var uppercaseinclusion = inclusionname.toUpperCase();
         if(uppercasetd1 == uppercaseinclusion){
            flag = 1;
         }
      });
      if(flag==1)
      {
         swal("Error!", "Inclusion is Already Exists!", "error");
      }
      else
      {
         $('#InclusionTable tbody').append('<tr class="child" ><td>'+inclusionname+'<input type="hidden" id="inclu_name_'+slno+'" name="inclusion_name[]" value="'+inclusionname+'"></td><td><button type="button"   class="btn btn-sm red waves-effect waves-circle waves-light removebutton" title="delete"><i class="mdi mdi-delete"></i></td></tr>');
         slno++;
      }
    }
    else{
      swal("Error!", "Please enter Inclusion Name!", "error");
    }
    $('#masterModal').modal('toggle');
    $('#inclusion_name').val('');
   });
   $(document).on('click', 'button.removebutton', function () {
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {     
              $(this).closest('tr').remove();
              return true;
          } else {
              return false;
          }
   });
   
   
    $('#saveExclusionButton').click(function(){
    var exclusion_name =  $('#exclusion_name').val();
    var sno=0;
    if(exclusion_name != '')
    {    
      var flag=0;
      $('#ExclusionTable').find('tr').each(function(){
         var extd1 = $(this).find("td:eq(0)").text();
         var uppercasetd1 = extd1.toUpperCase();
         var uppercaseexclusion = exclusion_name.toUpperCase();
         if(uppercasetd1 == uppercaseexclusion){
            flag = 1;
         }
      });
      if(flag==1)
      {
         swal("Error!", "Exclusion is Already Exists!", "error");
      }
      else
      {
         $('#ExclusionTable tbody').append('<tr class="child" ><td>'+exclusion_name+'<input type="hidden" id="exclusion_name_'+sno+'" name="exclusion_name[]" value="'+exclusion_name+'"></td><td><button type="button"   class="btn btn-sm red waves-effect waves-circle waves-light removebutton" title="delete"><i class="mdi mdi-delete"></i></td></tr>');
         sno++;
      }
    }
    else{
      swal("Error!", "Please enter Inclusion Name!", "error");
    }
    $('#ExclusionModal').modal('toggle');
    $('#exclusion_name').val('');
   });
   });

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
               if($("#title_name").val()==''){
                  $('.title_name-error').remove();
                  $( '<div id="title_name-error" class="error title_name-error custom-error">Please Enter Title.</div>' ).insertAfter( '#title_name' );
                  formsubmit =false; 
               }
              if($("#country_id").val()==''){
                  $('.country_id-error').remove();
                  $( '<div id="country_id-error" class="error country_id-error custom-error">Please choose Counrty.</div>' ).insertAfter( '#country_id' );
                  formsubmit =false; 
               }
               if($("#state_id").val()==''){
                  $('.state_id-error').remove();
                  $( '<div id="state_id-error" class="error state_id-error custom-error">Please choose State.</div>' ).insertAfter( '#state_id' );
                  formsubmit =false; 
               }
                if($("#city_id").val()==''){
                  $('.city_id-error').remove();
                  $( '<div id="city_id-error" class="error city_id-error custom-error">Please Choose City.</div>' ).insertAfter( '#city_id' );
                  formsubmit =false; 
               }
               
               return formsubmit;
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
              'amount' : {
                digits: true,
              },
        },
        messages: {
              'amount' : {
                digits: 'Numbers only',
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