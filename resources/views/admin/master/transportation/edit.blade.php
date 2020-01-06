@extends('admin.layouts.admin')
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
   .errmsg
    {
    color: red;
    }
    .errmsgg
    {
        color: red;  
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
				<h1>Tansportation Information</h1>
				<ul class="breadcrumbs">
					<li>Tansportation </li>
					<li>Edit Tansportation </li>
				</ul>
			</div>			
@php $row = $data['transport_view'][0]; @endphp
			<div class="page-content clearfix">
				<!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
					<form id="formValidate" autocomplete='off' action="{{route('update_transportation_charges')}}" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
               @csrf   
               <h1 class="text-display-1">Tansportation  Information</h1>
                            <input type='hidden' name='transportation_id' value='{{$row->id}}'>
						   <div class="row">
							<div class="col-sm-6">
                                <div class="select-row form-group">
                                <label for="from_country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                                <!-- To validate the select add class "select-validate" -->     
                                <select id="from_country_id" name="from_country_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                    <option value="">{{__('Select country')}}</option>
                                    @php
                                    $defcountry = CommonHelper::DefaultCountry();
                                    @endphp
                                    @foreach($data['country_view'] as $value)
                                    <option value="{{$value->id}}" @if($row->from_country_id==$value->id) selected @endif >
                                    {{$value->country_name}}</option>
                                    @endforeach
                                </select>
                                <div class="input-highlight"></div>
                                </div>
                                <!-- /.form-group -->
                                @php
                          $fromstatelist = CommonHelper::getStateList($row->from_country_id);
                        @endphp
                        <div class="select-row form-group">
                           <label for="from_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="from_state_id" name="from_state_id"  class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              
                              @foreach ($fromstatelist as $state)
                              <option @if($row->from_state_id==$state->id) selected @endif value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        @php
                          $fromcitylist = CommonHelper::getCityList($row->from_state_id);
                        @endphp
                        <div class="select-row form-group">
                           <label for="from_city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="from_city_id" name="from_city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              @foreach ($fromcitylist as $city)
                              <option @if($row->from_city_id==$city->id) selected @endif value="{{ $city->id }}">{{ $city->city_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
						@php
                          $tocitylist = CommonHelper::getCityList($row->from_state_id);
                          //dd($data['package_place']);
                        @endphp
						 <div class="select-row form-group">
                           <label for="to_city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_city_id" name="to_city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select City') }}
                              </option>
                              @foreach ($tocitylist as $city)
                              <option @if($row->to_city_id==$city->id) selected @endif value="{{ $city->id }}">{{ $city->city_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
							</div>
                            <div class="col-md-6">
                        <div class="select-row form-group hide">
                           <label for="to_country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_country_id" name="to_country_id" onchange="ChangeStates(this.value,1)" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="">{{__('Select country')}}</option>
                              @foreach($data['country_view'] as $value)
                              <option @if($row->to_country_id==$value->id) selected @endif value="{{$value->id}}" >
                              {{$value->country_name}}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        <!-- /.form-group -->
                        @php
                        $tostatelist = CommonHelper::getStateList($row->to_country_id);
                        @endphp
                        <div class="select-row form-group hide">
                           <label for="to_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_state_id" name="to_state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($tostatelist as $state)
                              <option @if($row->to_state_id==$state->id) selected @endif value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        
                       
                        <div class="select-row form-group">
                           <label for="to_city_id" >{{__('Distance(KM)') }}<span style="color:red">*</span></label>                 
                         
                           <input type="text" value='{{$row->distance}}' name="distance" onclick='calculateAmount();' id='distance' class='form-control'>   
                           <div class="input-highlight errmsg"></div>
                        </div>
                        <div class="select-row form-group">
                           <label for="to_city_id" >{{__('Amount per Km') }}<span style="color:red">*</span></label>                 
                            
                           <input type="text"  value='{{$row->amount_per_km}}' name="amount_per_km" id='amount_per_km' class='form-control'>   
                           
                           <div class="input-highlight errmsgg"></div>
                        </div>
                        <div class="select-row form-group">
                           <label for="to_city_id" >{{__('Total Amount') }}<span style="color:red">*</span></label>                 
                           
                           <input type="text"  value='{{$row->total_distance_amount}}' readonly name="total_distance_amount" id='total_distance_amount' class='form-control'>   
                           
                           <div class="input-highlight"></div>
                        </div>
                     </div>
					    </div><!-- /.row -->
                   <p><span style="color:red;    margin-left: 0px;"> Mandatory (*)</span></p>
						<div class="form-group clearfix">
							<button id="submittext" type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
						</div><!-- /.form-group -->
					</form>
					
				<!--</div> --><!-- /.row -->
			</div><!-- /.page-content -->

			<a id="back-to-top" href="#" class="btn-circle theme back-to-top">
				<i class="mdi mdi-chevron-up medium"></i>
			</a>
				
		</div><!-- /.container-fluid -->

	<!-- =========================================================== -->
	<!-- End page content  -->
	<!-- =========================================================== -->

	</section> <!-- /.content-wrapper -->

<!-- /.content-wrapper -->
@endsection
@section('footerSection')

<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script>
$(document).ready(function(){
    $("#distance").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $(".errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   $("#amount_per_km").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $(".errmsgg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });

    $('#distance').keyup(calculate);
    $('#amount_per_km').keyup(calculate);
    // Form Validation
$("#formValidate").validate({
    rules: {
        from_country_id: {
            required: true,
        },
        from_state_id: {
            required: true,
        },
        from_city_id: {
            required: true,
        },
        to_country_id: {
            required: true,
        },
        to_state_id: {
            required: true,
        },
        to_city_id: {
            required: true,
        },
        distance: {
            required: true,
            digits: true,
        },
        amount_per_km: {
            required: true,
            digits: true,
        },
    },
    //For custom messages
    messages: {
        from_country_id: {
            required: '{{__("Please Choose Country Name") }}',
        },
        from_state_id: {
            required: '{{__("Please Choose State Name") }}',
        },
        from_city_id: {
            required: '{{__("Please Choose City Name") }}',
        },
        to_country_id: {
            required: '{{__("Please Choose Country Name") }}',
        },
        to_state_id: {
            required: '{{__("Please Choose State Name") }}',
        },
        to_city_id: {
            required: '{{__("Please Choose City Name") }}',
        },
        distance: {
            required: '{{__("Please Enter Distance") }}',
            digits: '{{__("Numbers only") }}',
        },
        amount_per_km: {
            required: '{{__("Please Enter Amount") }}',
            digits: '{{__("Numbers only") }}',
        },
    },
});
});
function calculate(e)
{
    $('#total_distance_amount').val($('#distance').val() * $('#amount_per_km').val());
}


   $("#dashboard_sidebar_li_id").addClass('active');
    $('#overview').summernote({
      height: 200,   //set editable area's height
      placeholder: 'Write here...'
    });
    $('#additional_info').summernote({
      height: 200,   //set editable area's height
      placeholder: 'Write here...'
    });
    $(function() {
      $('select[name=from_country_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();
   
          $.get(url, function(data) {
              $('#from_state_id').empty('');
              $("#from_state_id").append("<option value=''>Select</option>");
              $("#from_state_id").selectpicker("refresh");
              //var select = $('form select[name=state_id]');
   
             // select.empty();
              //$("#state_id").append("<option value=''>Select</option>");
              $.each(data, function(key, value) {
                  $("#from_state_id").append('<option value=' + value.id + '>' + value.state_name +
                      '</option>');
              });
               $("#from_state_id").selectpicker("refresh");
          });
      });
   
      $('select[name=from_state_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
          $.get(url, function(data) {
              $('#from_city_id').empty('');
              $("#from_city_id").append("<option value=''>Select</option>");
              $("#from_city_id").selectpicker("refresh");
              //var select = $('form select[name=state_id]');
   
             // select.empty();
              //$("#state_id").append("<option value=''>Select</option>");
              $.each(data, function(key, value) {
                  $("#from_city_id").append('<option value=' + value.id + '>' + value.city_name +
                      '</option>');
              });
               $("#from_city_id").selectpicker("refresh");
          });
      });
      $('select[name=from_state_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
          $.get(url, function(data) {
              $('#to_city_id').empty('');
              $("#to_city_id").append("<option value=''>Select</option>");
             
              $("#to_city_id").selectpicker("refresh");

              //var select = $('form select[name=state_id]');
   
             // select.empty();
              //$("#state_id").append("<option value=''>Select</option>");
            

               $.each(data, function(key, value) {
                  $("#to_city_id").append('<option value=' + value.id + '>' + value.city_name +
                      '</option>');
              });
              $("#to_city_id").selectpicker("refresh");

          });
      });

    //   $('select[name=to_country_id]').change(function() {
    //      // alert('ok');
    //       var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();
   
    //       $.get(url, function(data) {
    //           $('#to_state_id').empty('');
    //           $("#to_state_id").append("<option value=''>Select</option>");
    //           $("#to_state_id").selectpicker("refresh");
    //           //var select = $('form select[name=state_id]');
   
    //          // select.empty();
    //           //$("#state_id").append("<option value=''>Select</option>");
    //           $.each(data, function(key, value) {
    //               $("#to_state_id").append('<option value=' + value.id + '>' + value.state_name +
    //                   '</option>');
    //           });
    //            $("#to_state_id").selectpicker("refresh");
    //       });
    //   });
   
    //   $('select[name=to_state_id]').change(function() {
    //      // alert('ok');
    //       var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
    //       $.get(url, function(data) {
    //           $('#to_city_id').empty('');
    //           $("#to_city_id").append("<option value=''>Select</option>");
    //           $("#to_city_id").selectpicker("refresh");
    //           //var select = $('form select[name=state_id]');
   
    //          // select.empty();
    //           //$("#state_id").append("<option value=''>Select</option>");
    //           $.each(data, function(key, value) {
    //               $("#to_city_id").append('<option value=' + value.id + '>' + value.city_name +
    //                   '</option>');
    //           });
    //            $("#to_city_id").selectpicker("refresh");
    //       });
    //   });
   });
</script>
@endsection