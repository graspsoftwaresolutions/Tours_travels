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
                   <form id="wizard1"  class="paper formValidate" method="post" action="{{ route('save.newhotel') }}" enctype="multipart/form-data">
                      @csrf
					    <h3>Detail</h3>
					    <fieldset>      
					 		
					 		<div class="col-sm-12">
					 			<h4 class="text-headline">Listing Information</h4>
					 			<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>

						        
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-field label-float">
                                <input placeholder="Hotel Name" class="clearable" id="hotel_name" name="hotel_name" autofocus type="text">
                                <label for="hotel_name" class="fixed-label">{{__('Hotel Name') }}*</label>
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
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Select Amenities:</strong></label>
                          <div class="row">
                              @foreach($data['features_view'] as $value)
                              <div class="col-md-2">

                                   <div class="form-group">     
                                     <label class="checkbox-filled" for="amenities_{{ $value->id }}">
                                      <input type="checkbox" class="filled" name="amenities[]" id="amenities_{{ $value->id }}" value="{{ $value->id }}">
                                      <i class="highlight"></i>
                                      {{ $value->amenities_name }}
                                    </label>
                                  </div>
                                  
                                                        
                              </div>
                               @endforeach
                          </div>

                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <div class="input-field label-float">
                                <input placeholder="Contact Name" class="clearable" id="contact_name" name="contact_name" type="text">
                                <label for="contact_name" class="fixed-label">{{__('Contact Name') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                      </div>

                       <div class="col-md-4">
                          <div class="form-group">
                              <div class="input-field label-float">
                                <input placeholder="Contact Email" class="clearable" id="contact_email" name="contact_email" type="text">
                                <label for="contact_email" class="fixed-label">{{__('Contact Email') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="select-row form-group">
                              <label for="country_id" class="block">{{__('Country Name') }}</label>                 

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
                          </div><!-- /.form-group -->
                      </div>
                        @php
                          $statelist = CommonHelper::getStateList($defcountry);
                        @endphp
                      <div class="col-md-4">
                          <div class="select-row form-group">
                              <label for="state_id" class="block">{{__('State Name') }}</label>                 

                              <!-- To validate the select add class "select-validate" -->     
                              <select id="state_id" name="state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                   <option value="" selected="">{{__('Select State') }}
                                   </option>
                                  @foreach ($statelist as $state)
                                  <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                  @endforeach
                              </select>        
                               <div class="input-highlight"></div>                       
                          </div><!-- /.form-group -->
                      </div>

                       <div class="col-md-4">
                          <div class="select-row form-group">
                              <label for="city_id" class="block">{{__('City Name') }}</label>                 

                              <!-- To validate the select add class "select-validate" -->     
                              <select id="city_id" name="city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                   <option value="" selected="">{{__('Select City') }}
                                   </option>
                                 <!--  @foreach ($data['state_view'] as $state)
                                  <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                  @endforeach -->
                              </select>        
                               <div class="input-highlight"></div>                       
                          </div><!-- /.form-group -->
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

                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Overview: </strong></label>
                          <textarea name="overview" id="overview"></textarea>  
                          <p class="no-margin em"></p>
                        </div>
                      </div>
                    </div>


                   
                 
					    	</div><!-- /.col- -->

					    </fieldset>
					 
					    <h3>Room Type</h3>
					    <fieldset>

					    	<div class="col-sm-12">
						        <h4 class="text-headline">Hotel Room Details</h4>
						        <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
						 
						        <div class="row">
    									<div class="col-sm-6">
    									  <div class="select-row form-group">
                            <label for="room_type" class="block">{{__('Room Type') }}</label>                 

                            <!-- To validate the select add class "select-validate" data-live-search="true"  -->     
                            <select id="room_type" name="room_type" class="selectpicker select-validate" data-live-search="true" multiple data-width="100%">
                                 <option value="" disabled="true">{{__('Select Room Type') }}
                                 </option>
                                  @foreach ($data['types_view'] as $type)
                                  <option value="{{ $type->id }}">{{ $type->room_type }}</option>
                                  @endforeach
                            </select>        
                             <div class="input-highlight"></div>                       
                        </div><!-- /.form-group -->
    									</div><!-- ./col- -->
									
							       </div><!-- /.row -->

                      <div class="row">
                        <div class="col-sm-6">
                           <div class="form-group">
                              <div class="input-field label-float">
                                <textarea id="listing_descriptions" name="listing_descriptions" class="textarea-auto-resize"></textarea>
                                
                                <label for="listing_descriptions" class="fixed-label">{{__('Listing Descriptions') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                        </div><!-- ./col- -->
                  
                     </div><!-- /.row -->
                       </br> </br> </br> </br>
					        </div><!-- /.col- -->
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
                            <input type="file" name="hotel_images[]" id="hotel_images" multiple>
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            <div class="input-highlight"></div>
                          </div>
                          </div><!-- /.input-field -->
                          </br>
                    </div>
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

                          
            </div><!-- /.page-content -->

            <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
                <i class="mdi mdi-chevron-up medium"></i>
            </a>                
        </div><!-- /.container-fluid -->

      
       
    </section> <!-- /.content-wrapper -->
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
        'hotel_name': {
                required: true
            },
      },
      messages: {
            'hotel_name': {
                required: 'Please fill name.'
            }
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