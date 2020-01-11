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
         <h1>Tansportation</h1>
         <ul class="breadcrumbs">
            <li>Tansportation </li>
            <li>Add Tansportation</li>
         </ul>
      </div>
      <div class="page-content clearfix">
         <!-- <div class="col-sm-10 col-sm-offset-1"> -->
         @include('includes.messages')
         <form id="TransportationformValidate" autocomplete='off' action="{{route('save_transportation')}}" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
            @csrf   
            <h2 class="text-display-1">Tansportation</h2>
            <div class="row">
               <div class="col-sm-2">
                  <label for="from_country_id" class="block">{{__('Choose Type')  }}<span style="color:red">*</span> :</label> 
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <div>				
                        <input class="with-gap" name="type" type="radio" checked="checked" id="pack" value="Pack">
                        <label for="pack" class="inline">Pack</label>	    
                        <input class="with-gap" name="type" type="radio" id="Unpack" value="Unpack">
                        <label for="Unpack">Unpack</label>
                     </div>
                  </div>
                  <!-- /.form-group -->	 
               </div>
            </div>
            <!-- /.row -->		
            <div class="row">
               <div class="col-sm-6">
                  <div class="select-row form-group">
                     <label for="from_country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
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
               <!-- /.form-group -->
               @php
               $statelist = CommonHelper::getStateList($defcountry);
               @endphp
               <!-- /.form-group -->
               <div class="col-sm-6">
                  <div class="select-row form-group">
                     <label for="state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                     <!-- To validate the select add class "select-validate" -->     
                     <select id="state_id" name="state_id"  class="selectpicker select-validate" data-live-search="true" data-width="100%">
                        <option value="" selected="">{{__('Select State') }}
                        </option>
                        @foreach ($statelist as $state)
                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                        @endforeach
                     </select>
                     <div class="input-highlight"></div>
                  </div>
               </div>
            </div>
			 <!-- /.row -->		
            <div class="row packdetails">
               <div class="col-sm-6">
                   <div class="input-field label-float">
						<input placeholder="Pack Name" class="clearable" id="pack_name" name="pack_name" autofocus type="text">
						<label for="Pack" class="fixed-label">{{__('Pack Name') }}</label>
						<div class="input-highlight"></div>
					</div>
               </div>
               <!-- /.form-group -->
               
               <!-- /.form-group -->
               <div class="col-sm-6">
                  <div class="input-field label-float">
						<input placeholder="Pack Amount" class="clearable" id="transport_pack_amount" name="transport_pack_amount" autofocus type="text">
						<label for="transport_pack_amount" class="fixed-label">{{__('Pack Amount') }}</label>
						<div class="input-highlight"></div>
					</div>
               </div>
            </div>
			
			<!-- /.row -->		
            <div class="row unpackdetails">
               <div class="col-sm-6">
                   <div class="input-field label-float">
						<input placeholder="Amount Per Km" class="clearable" id="unpack_amount_per_km" name="unpack_amount_per_km" autofocus type="text">
						<label for="unpack_amount_per_km" class="fixed-label">{{__('Cost Per Km') }}</label>
						<div class="input-highlight"></div>
					</div>
               </div>
               <!-- /.form-group -->
               
               <!-- /.form-group -->
               <div class="col-sm-6">
                  <div class="input-field label-float">
						<input placeholder="Amount Per Hour" class="clearable" id="unpack_amount_per_hr" name="unpack_amount_per_hr" autofocus type="text">
						<label for="unpack_amount_per_hr" class="fixed-label">{{__('Cost Per Hour') }}</label>
						<div class="input-highlight"></div>
					</div>
               </div>
            </div>

            <p><span style="color:red;    margin-left: 0px;"> Mandatory (*)</span></p>
            <div class="form-group clearfix">
               <button id="submittext" type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
            </div>
            <!-- /.form-group -->
         </form>
         <!--</div> --><!-- /.row -->
      </div>
      <!-- /.page-content -->
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
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script>
   $(document).ready(function(){
       $('.unpackdetails').hide();
         $('#pack').click(function(){
            $('.unpackdetails').hide();
            $('.packdetails').show();
            
       });

          $('#Unpack').click(function(){
            $('.unpackdetails').show();
            $('.packdetails').hide();
       });

        const regex = /[^\d.]|\.(?=.*\.)/g;
        const subst=``;

        $('#transport_pack_amount').keyup(function(){
            const str=this.value;
            const result = str.replace(regex, subst);
            this.value=result;
        });
        $('#unpack_amount_per_km').keyup(function(){
            const str=this.value;
            const result = str.replace(regex, subst);
            this.value=result;
        });
        $('#unpack_amount_per_hr').keyup(function(){
            const str=this.value;
            const result = str.replace(regex, subst);
            this.value=result;
        });    
       // Form Validation
   $("#TransportationformValidate").validate({
       rules: {
           country_id: {
               required: true,
           },
           state_id: {
               required: true,
           },
       },
       //For custom messages
       messages: {
            country_id: {
               required: '{{__("Please Choose Country Name") }}',
           },
           state_id: {
               required: '{{__("Please Choose State Name") }}',
           },
       },
   });
   });

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
         $('select[name=country_id]').change(function() {
             alert('ok');
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
                  $.each(data, function(key, value) {
                     $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
                         '</option>');
                 });
                  $("#state_id").selectpicker("refresh");
             });
         });
      });
</script>
@endsection