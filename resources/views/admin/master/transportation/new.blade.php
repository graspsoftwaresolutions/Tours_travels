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
					<li>Tansportation Charges</li>
					<li>Add Tansportation Charge</li>
				</ul>
			</div>			

			<div class="page-content clearfix">
				<!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
					<form id="formValidate" autocomplete='off' action="{{route('add_transportation_charges')}}" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
               @csrf   
               <h2 class="text-display-1">Tansportation Information</h2>
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
                           <select id="from_state_id" name="from_state_id"  class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                              @foreach ($statelist as $state)
                              <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach
                           </select>
                           <div class="input-highlight"></div>
                        </div>
                        <div class="select-row form-group">
                           <label for="from_city_id" class="block">{{__('From City Name') }}<span style="color:red">*</span></label>                 
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
						 <div class="select-row form-group">
                           <label for="to_city_id" class="block">{{__(' To City Name') }}<span style="color:red">*</span></label>                 
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
                            <div class="col-md-6">
                        <h4 class="text-headline text-center"></h4>
                        <div class="select-row form-group hide">
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
                        <div class="select-row form-group hide">
                           <label for="to_state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                           <!-- To validate the select add class "select-validate" -->     
                           <select id="to_state_id" name="to_state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value="" selected="">{{__('Select State') }}
                              </option>
                             <!--  @foreach ($statelist as $state)
                              <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                              @endforeach -->
                           </select>
                           <div class="input-highlight"></div>
                        </div>

                        <div class=" form-group">
                           <label for="to_city_id" >{{__('Distance(KM)') }}<span style="color:red">*</span></label>                 
                         
                           <input type="text" name="distance" onclick='calculateAmount();' id='distance' class='form-control'>   
                           <!-- &nbsp;<span id="errmsg"></span> -->
                           <div class="input-highlight errmsg"></div>
                        </div>
                        <div class="select-row form-group">
                           <label for="to_city_id" >{{__('Amount per Km') }}<span style="color:red">*</span></label>                 
                            
                           <input type="text" name="amount_per_km" id='amount_per_km' class='form-control'>
                           <!-- &nbsp;<span id="errmsg"></span>     -->
                           
                           <div class="input-highlight errmsgg"></div>
                        </div>
                        <div class="select-row form-group">
                           <label for="to_city_id" >{{__('Total Amount') }}<span style="color:red">*</span></label>                 
                           
                           <input type="text" readonly name="total_distance_amount" id='total_distance_amount' class='form-control'>  
                           
                           
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


const regex = /[^\d.]|\.(?=.*\.)/g;
    const subst=``;

    $('#distance').keyup(function(){
    const str=this.value;
    const result = str.replace(regex, subst);
    this.value=result;

    });

    $('#amount_per_km').keyup(function(){
    const str=this.value;
    const result = str.replace(regex, subst);
    this.value=result;

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
        to_city_id: {
            required: true,
        },
        distance: {
            required: true,
            // digits: true,
        },
        amount_per_km: {
            required: true,
            // digits: true,
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
        to_city_id: {
            required: '{{__("Please Choose City Name") }}',
        },
        distance: {
            required: '{{__("Please Enter Distance") }}',
            // digits: '{{__("Numbers only") }}',
        },
        amount_per_km: {
            required: '{{__("Please Enter Amount") }}',
            // digits: '{{__("Numbers only") }}',
        },
    },
});
});
function calculate(e)
{
    var amount = $('#distance').val() * $('#amount_per_km').val();
    $('#total_distance_amount').val(amount.toFixed(2));
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
               $.each(data, function(key, value) {
                  $("#to_state_id").append('<option value=' + value.id + '>' + value.state_name +
                      '</option>');
              });
               $("#to_state_id").selectpicker("refresh");
          });
      });
   
      $('select[name=from_state_id]').change(function() {
         // alert('ok');
          var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();
   
          $.get(url, function(data) {
              $('#from_city_id').empty('');
              $("#from_city_id").append("<option value=''>Select</option>");
              $("#from_city_id").selectpicker("refresh");
              $("#to_city_id").selectpicker("refresh");

              //var select = $('form select[name=state_id]');
   
             // select.empty();
              //$("#state_id").append("<option value=''>Select</option>");
              $.each(data, function(key, value) {
                  $("#from_city_id").append('<option value=' + value.id + '>' + value.city_name +
                      '</option>');
              });
               $("#from_city_id").selectpicker("refresh");

            //    $.each(data, function(key, value) {
            //       $("#to_city_id").append('<option value=' + value.id + '>' + value.city_name +
            //           '</option>');
            //   });
            //   $("#to_city_id").selectpicker("refresh");

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