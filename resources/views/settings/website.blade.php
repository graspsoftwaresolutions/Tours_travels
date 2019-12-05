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
         <ul class="breadcrumbs">
            <li>Tax</li>
            <li>Add Tax</li>
         </ul>
      </div>
      @php              
      $row = $data; 
      @endphp
      <div class="page-content clearfix">
         <!-- <div class="col-sm-10 col-sm-offset-1"> -->
         @include('includes.messages')
         <form id="formValidate" class="wrapper-boxed paper p30 mt30" action="{{route('website_save')}}" enctype="multipart/form-data" method="post" data-toggle="validator">
            @csrf
            <h6 class="text-display-1">Website Information</h6>
            <input type="hidden" name="website_id" value="{{ isset($row->id) ? $row->id : ' '}}">
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Company Name" class="clearable"  value="{{ isset($row->company_name) ? $row->company_name : ' '}}"  id="company_name" name="company_name" autofocus type="text">
                     <label for="company_name" class="fixed-label">{{__('Company Name') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- ./col- -->
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Website" class="clearable" value="{{ isset($row->company_website) ? $row->company_website : ' '}}"  id="company_website" name="company_website" type="text">
                     <label for="company_website" class="fixed-label">{{__('Website') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <!-- ./col- -->	
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Company Email" class="clearable" value="{{ isset($row->company_email) ? $row->company_email : ' '}}"   id="company_email" name="company_email" autofocus type="email">
                     <label for="company_email" class="fixed-label">{{__('Company Email') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- ./col- -->
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Phone" class="clearable" value="{{ isset($row->company_phone) ? $row->company_phone : ' '}}"  id="company_phone" name="company_phone" type="text">
                     <label for="company_phone" class="fixed-label">{{__('Phone') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <!-- ./col- -->	
               <div class="col-sm-6">
                  <div class="select-row form-group">
                     <label for="country_id" class="block">{{__('Country Name') }}<span style="color:red">*</span></label>                 
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
               <!-- ./col- -->
               @php
               $statelist = CommonHelper::getStateList($defcountry);
               @endphp
               <div class="col-sm-6">
                  <div class="select-row form-group">
                     <label for="state_id" class="block">{{__('State Name') }}<span style="color:red">*</span></label>                 
                     <!-- To validate the select add class "select-validate" -->     
                     <select id="state_id" name="state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                        <option value="" selected="">{{__('Select State') }}
                        </option>
                        @foreach ($statelist as $state)
                        <option value="{{ $state->id }}"  @if($row->state_id==$state->id) selected @endif>{{ $state->state_name }}</option>
                        @endforeach
                     </select>
                     <div class="input-highlight"></div>
                  </div>
               </div>
               <!-- ./col- -->	
            </div>
            <!-- /.row -->
            @php
                $citylist = CommonHelper::getCityList($row->state_id);
            @endphp
            <div class="row">
               <div class="col-sm-6">
                  <div class="select-row form-group">
                     <label for="city_id" class="block">{{__('City Name') }}<span style="color:red">*</span></label>                 
                     <!-- To validate the select add class "select-validate" -->     
                     <select id="city_id" name="city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                        <option value="" selected="">{{__('Select City') }}
                        </option>
                        @foreach ($citylist as $city)
                                  <option value="{{ $city->id }}" @if($row->city_id==$city->id) selected @endif>{{ $city->city_name }}</option>
                                  @endforeach
                     </select>
                     <div class="input-highlight"></div>
                  </div>
               </div>
               <!-- ./col- -->
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Address One" class="clearable" value="{{ isset($row->company_address_one) ? $row->company_address_one : ' '}}" id="company_address_one" name="company_address_one" type="text">
                     <label for="address_one" class="fixed-label">{{__('Address One') }}</label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <!-- ./col- -->	
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <div class="input-field label-float">
                        <input placeholder="Address Two" class="clearable" value="{{ isset($row->company_address_two) ? $row->company_address_two : ' '}}" id="company_address_two" name="company_address_two" type="text">
                        <label for="address_two" class="fixed-label">{{__('Address Two') }}</label>
                       
                        <div class="input-highlight"></div>
                     </div>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- ./col- -->
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Zipcode" class="clearable" value="{{ isset($row->zipcode) ? $row->zipcode : ' '}}" id="zipcode" name="zipcode" type="text">
                     <label for="phone" class="fixed-label">{{__('Zipcode') }}</label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <!-- ./col- -->	
               <div class="col-sm-6">
                  <div class="file-field input-field label-float">
                     <div class="btn theme">
                        <span>File</span>
                        <input type="file" name="company_logo"  id="company_logo"  accept="image/*">
                     </div>
                     <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Upload Logo">
                        <div class="input-highlight"></div>
                     </div>
                  </div>
                  <!-- /.input-field -->
                  </br>
                  <!-- <code>Note:  Max file size : 2MB, Max width*height : 1200*700px</code> -->
                  </br>
                  </br>
               </div> 
               <div class="row ">
                <div class="divider theme ml14 mr14"></div>
                    <div class="col-xs-12 col-sm-3 mt20">
                    <img class="responsive-img z-depth-1" src="{{ asset('public/assets/images/website_logo/'.$row->company_logo) }}" alt="">
                    </div>                                               
                </div>
            </div>  
            
            <!-- ./col- -->	
  
      <!-- /.row -->
      <br>
      <div class="row">
      <div class="form-group clearfix">
      <input type="submit" class="btn theme-accent waves-effect waves-light pull-right" value="Save">
      <!-- <button type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button> -->
      </div><!-- /.form-group -->
      
      <!--</div> --><!-- /.row -->
      </div><!-- /.page-content -->
	  </form>
      <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
      <i class="mdi mdi-chevron-up medium"></i>
      </a>
   </div>
 </div>
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
       
       $("#settings-menu").addClass('active');
       $("website_sidebar_li_a_d").addClass('active');
      $("#formValidate").validate({
   			rules: {
   				"company_name": {
   					required: true,
   				},
                   "company_website": {
   					required: true,
   				},
                   "company_email": {
   					required: true,
                       email : true,
   				},
                   "company_phone": {
   					required: true,
                       digits : true,
   				},
                   "country_id": {
   					required: true,
   				},
                   "state_id": {
   					required: true,
   				},
                   "city_id": {
   					required: true,
   				},
   			},
   			messages: {
   				"company_name": {
   					required: "Please, enter Name",
                       
   				},
                   "company_website": {
   					required: "Please, enter website",
   				},
                   "company_email": {
   					required: "Please, enter email",
                       email: "Please, enter valid Email address",
   				},
                   "company_phone": {
   					required: "Please, enter phone number",
                       digits : "Numbers only"
   				},
                   "country_id": {
   					required: "Please, choose country",
   				},
                   "state_id": {
   					required: "Please, choose State",
   				},
                   "city_id": {
   					required: "Please, choose City",
   				},
   			},
   			// submitHandler: function (form) {
   			// 	$.ajax({
   			// 		type: 'post',
            //         url: "{{ route('website_save') }}",
            //         data: new FormData(this),
            //         dataType: 'json',
            //         contentType: false,
            //         cache: false,
            //         processData:false,
   			// 		success: function(response){
   			// 			if(response)
   			// 			{    
   			// 			    //window.location.reload();
   			// 			}
   			// 		}
   			// });
   			// for demo
   			//alert('Form Saved succesfully'); // for demo
   		//	return false; // for demo
            // }
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
   });
</script>
@endsection