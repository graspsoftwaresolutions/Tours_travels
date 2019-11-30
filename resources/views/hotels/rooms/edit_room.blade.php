@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
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
      z-index: 999;
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
            <li>{{__('Edit Hotel') }}</li>
         </ul>
      </div>
      <div class="page-content">
         @include('includes.messages')
         <div class="paper toolbar-parent mt10">
            <form id="wizard1"  class="paper formValidate" method="post" action="{{ route('edit.hotelroom') }}" enctype="multipart/form-data">
            
               @csrf
               <h3>Detail</h3>
               @php  $row =  $data['room_list'][0]; @endphp
               <input type="hidden" name="hotelroomid" value="{{$row->id}}">
               <fieldset>
                  <div class="col-sm-12">
                     <div class="row">
                        <div class="col-md-6">
                           <div class="input-field label-float">
                              <select id="hotel_id" name="hotel_id" required="true" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                 <option value="">Select hotel</option>
                                  @foreach($data['hotel_view'] as $values)
                                      <option value="{{$values->id}}" @php if($row->hotel_id == $values->id)  echo 'selected' @endphp>{{$values->hotel_name}}</option>
                                  @endforeach
                              </select> 
                              <label for="hotel_id" class="fixed-label">{{__('Hotel Name') }}<span style="color:red">*</span></label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                        <div class="col-md-6"> 
                           <div class="input-field label-float">
                              <select id="roomtype_id" name="roomtype_id" required="true" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                     <option value="" selected>Select Room Type</option>
                                    @foreach($data['roomtype_view'] as $values)
                                        <option value="{{$values->id}}" @php if($row->roomtype_id == $values->id)  echo 'selected' @endphp>{{$values->room_type}}</option>
                                    @endforeach
                              </select> 
                              <label for="roomtype_id" class="fixed-label">{{__('Room Type') }}<span style="color:red">*</span></label>
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <p class="no-margin em"></p>
                     </div>
                     <div class="col-md-12">
                        <p class="no-margin em"></p>
                     </div>
                     <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-field label-float">
                                 <input placeholder="Room No" class="clearable" value="{{$row->room_number}}" id="room_number" name="room_number" type="text">
                                 <label for="room_number" class="fixed-label">{{__('Room No') }}<span style="color:red">*</span></label>
                                 <div class="input-highlight"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-field label-float">
                                 <input placeholder="No Of Beds" class="clearable" value="{{$row->room_no_of_beds}}" id="room_no_of_beds" name="room_no_of_beds" type="text">
                                 <label for="room_no_of_beds" class="fixed-label">{{__('No of Beds') }}<span style="color:red">*</span></label>
                                 <div class="input-highlight"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <div class="form-group">
                              <div class="input-field label-float">
                                
                                 <select id="status" name="status" required="true" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                    <option value="" selected>Select Status</option>
                                    <option value="1" @php if($row->status == 1)  echo 'selected' @endphp>Active</option>
                                    <option value="0" @php if($row->status == 0)  echo 'selected' @endphp>Inactive</option>
                                 </select> 
                                 <label for="contact_email" class="fixed-label">{{__('Status') }}<span style="color:red">*</span></label>
                                 <div class="input-highlight"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="form-group">
                              <label for=""><strong>Overview: </strong></label>
                              <textarea name="room_description" id="overview">{{$row->room_description}}</textarea>
                              <p class="no-margin em"></p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.col- -->
               </fieldset>
               <h3>Photo Gallery</h3>
               <fieldset>
                  <div class="col-sm-12">
                     <h4 class="text-headline">Photo Gallery</h4>
                     <p>Upload Hotel Images</p>
                     </br>
                     <div class="col-md-12">
                        <div class="file-field input-field">
                           <div class="btn theme">
                              <span>File</span>
                              <input type="file" name="image_name[]" id="image_name" accept="image/*" multiple>
                           </div>
                           <div class="file-path-wrapper">
                              <input class="file-path validate" type="text" placeholder="Upload one or more files">
                              <div class="input-highlight"></div>
                           </div>
                        </div>
                        <!-- /.input-field -->
                        </br>
                     </div>
                     </br>
                     <div class="row">

                        <div class="divider theme ml14 mr14"></div>

                        @foreach($data['images'] as $image)
                        <div id="hotel_image_{{ $image->id }}" class="col-xs-12 col-sm-2 mt20">
                            <img class="responsive-img z-depth-1" data-action="zoom" src="{{ asset('storage/app/hotels/rooms/'.$image->image_name) }}" style="width:190px;height: 130px;" alt="">
                            <div class="button-close"> <button type="button" onclick="return DeleteImage({{ $image->id }})" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div>
                            <!--button type="button" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button-->
                        </div>
                        @endforeach
                        </div>
                  </div>
                 
                  <!-- /.col- -->
               </fieldset>
               <p><span style="color:red;    margin-left: 40px;"> Mandatory (*)</span></p>
               <!--  <h3>Finish</h3>
                  <fieldset>
                  	<div class="col-sm-8 col-sm-offset-1">
                       <div class="text-headline">Terms and Conditions</div>
                  
                  <div class="form-group mt40">
                  		<input id="acceptTerms1" name="acceptTerms1" type="checkbox"> <label for="acceptTerms1" class="text-subhead sub-text">I agree with the Terms and Conditions.</label>      	
                  </div>
                  </div>
                  </fieldset> -->
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
<script src="{{ asset('public/assets/dist/js/plugins/zoom/zoom.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script>
   $("#dashboard_sidebar_li_id").addClass('active');
    var form = $("#wizard1").show();
   
    form.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        onStepChanging: function (event, currentIndex, newIndex)
        {
           $('.custom-error').remove();
            // Allways allow previous action even if the current form is not valid!
            if (currentIndex > newIndex)
            {
                return true;
            }
            if (newIndex === 1 )
            {
               var formsubmit =true; 
               if($("#hotel_id").val()==''){
                  $('.hotel_id-error').remove();
                  $( '<div id="hotel_id-error" class="error hotel_id-error custom-error" >Please choose hotel.</div>' ).insertAfter( '#hotel_id' );
                  formsubmit =false; 
               }
              if($("#roomtype_id").val()==''){
                  $('.roomtype_id-error').remove();
                  $( '<div id="roomtype_id-error" class="error roomtype_id-error custom-error">Please choose roomtype.</div>' ).insertAfter( '#roomtype_id' );
                  formsubmit =false; 
               }
               if($("#status").val()==''){
                  $('.status-error').remove();
                  $( '<div id="status-error" class="error status-error custom-error">Please choose status.</div>' ).insertAfter( '#status' );
                  formsubmit =false; 
               }
                if($("#room_number").val()==''){
                  $('.room_number-error').remove();
                  $( '<div id="room_number-error" class="error room_number-error custom-error">Please fill room number.</div>' ).insertAfter( '#room_number' );
                  formsubmit =false; 
               }
                if($("#room_no_of_beds").val()==''){
                  $('.room_no_of_beds-error').remove();
                  $( '<div id="room_no_of_beds-error" class="error room_no_of_beds-error custom-error">Please fill no of beds.</div>' ).insertAfter( '#room_no_of_beds' );
                  formsubmit =false; 
               }
               return formsubmit;
              // if($("#hotel_id").val()=='' || $("#roomtype_id").val()=='' || $("#status").val()==''){
              //   console.log(this);
              //   var placement = $(this).data('error');
              //   if (placement) {
              //     //$(placement).append('<div id="hotel_name-error" class="error">Please fill name.</div>')
              //   } else {
              //     $('.hotel_name-error').remove();
              //     $( '<div id="hotel_name-error" class="error hotel_name-error">Please fill name.</div>' ).insertAfter( '#hotel_id' );
              //     //$(this).insertAfter('<div id="hotel_name-error" class="error">Please fill name.</div>');
              //   }
              //   //$('#wizard1').trigger('submit');
              //   //return false;
              // }
            }
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
          'hotel_id': {
                  required: true,
              },
              'roomtype_id' : {
                  required: true,
              },
              'room_number' : {
                  required: true,
                  digits : true,
              },
              "room_no_of_beds" : {
                   required: true,
                  digits : true,
              },
              "status" : {
               required: true,
              },
              "image_name" : {
                  required: true,
              },
        },
        messages: {
              'hotel_id': {
                  required: 'Please Select the hotel.',
              },
              'roomtype_id' : {
                  required: 'Please Select the room Type.',
              },
              'room_number' : {
                  required: 'Please enter room number.',
                  digits : 'Numbers only.',
              },
              "room_no_of_beds" : {
               required: 'Please enter no of beds.',
                  digits : 'Numbers only.',
              },
              "status" : {
               required: 'Please Select the status.',
              },
              "image_name" : {
                  required: "please select Images",
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
      height: 300,   //set editable area's height
      placeholder: 'Write here...'
    });
    function DeleteImage(imageid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        var url = "{{ url('/delete_hotel_room_image') }}" + '?image_id=' + imageid;
          $.ajax({
              url: url,
              type: "GET",
              success: function(result) {
                  if(result.status==1){
                    $("#hotel_image_"+imageid).remove();
                  }else{
                    alert('Failed to delete');
                  }
              }
          });
      }else{
       // alert('Failed to delete');
      }
      
  }
</script>
@endsection