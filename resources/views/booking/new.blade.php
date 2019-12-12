@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
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
   .typeahead { border: 2px solid #FFF;border-radius: 4px;padding: 8px 12px;min-width: 290px;background: #e9ecef;}
   .tt-menu { width:300px; }
   ul.typeahead{margin:0px;padding:10px 0px;}
   ul.typeahead.dropdown-menu li a {padding: 10px !important;	border-bottom:#CCC 1px solid;color:black;}
   ul.typeahead.dropdown-menu li:last-child a { border-bottom:0px !important; }
   .bgcolor {max-height:340px;background:url("world-contries.jpg") no-repeat center center;padding: 100px 10px 130px;border-radius:4px;text-align:center;margin:10px;}
   .demo-label {font-size:1.5em;color: #686868;font-weight: 500;color:#FFF;}
   .dropdown-menu>.active>a, .dropdown-menu>.active>a:focus, .dropdown-menu>.active>a:hover {
   text-decoration: none;
   background-color: #639aeb;
   outline: 0;
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
         <h1>Booking Information</h1>
         <ul class="breadcrumbs">
            <li>Booking</li>
            <li>Booking Details</li>
         </ul>
      </div>
      <div class="page-content clearfix">
         <div class="col-md-8">
            <!-- <div class="col-sm-10 col-sm-offset-1"> -->
            @include('includes.messages')
            <form id="formValidate" class="wrapper-boxed paper p30 mt30" method="post" data-toggle="validator">
               <h1 class="text-display-1">Booking Information</h1>
               <input type="hidden" name="customer_id">
               <div class="row">
                  <div class="col-sm-6">
                     <!-- <div class="input-append date" id="dp1" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
                        <input class="span2" size="16" type="text" value="12-02-2012" ="">
                        <span class="add-on"><i class="icon-th"></i></span>
                        </div> -->
                     <!-- <div class="form-group input-field label-float">
                        <input  autofocus id="dp1" type="text">
                                             <label for="name" class="fixed-label">{{__('From') }}<span style="color:red">*</span></label>
                         <div class="input-highlight"></div>
                        </div> -->
                     <!-- <div class="input-group date" data-date-format="dd.mm.yyyy">
                        <input  type="text" class="form-control" placeholder="dd.mm.yyyy">
                        <div class="input-group-addon" >
                        <span class="glyphicon glyphicon-th"></span>
                        </div> -->
                     <div class="form-group input-field label-float">
                        <input  autofocus type="date">
                        <label for="" class="fixed-label">{{__('from') }}<span style="color:red">*</span></label>
                        <div class="input-highlight"></div>
                     </div>
                     <!-- /.form-group -->			
                     <!--/.form-group -->
                  </div>
                  <!-- ./col- -->
                  <div class="col-sm-6">
                     <div class="form-group input-field label-float">
                        <input  autofocus type="date">
                        <label for="" class="fixed-label">{{__('To') }}<span style="color:red">*</span></label>
                        <div class="input-highlight"></div>
                     </div>
                     <!-- /.form-group -->			
                  </div>
                  <!-- ./col- -->	
				  <div class="row">
					  <div class="col-sm-6">
						 <div class="form-group input-field label-float">
							<input class="typeahead" style="margin-left: 15px;" id="package_name" name="package_name"  type="text" placeholder="Type for a Package" autocomplete='off'>
							<label style="margin-left: 15px;" for="" class="fixed-label">{{__('Package') }}<span style="color:red">*</span></label>
							<div class="input-highlight"></div>
						 </div>
						 <!-- /.form-group -->			
					  </div>
                  <!-- ./col- -->	
                  <div class="col-sm-6">
                     <div class="select-row form-group">
                        <label for="country_id" class="block">{{__('Customer Name') }}<span style="color:red">*</span></label>                 
                        <!-- To validate the select add class "select-validate" -->     
                        <div id="the-basics">
                           <input class="typeahead" id="customer_name" name="customer_name"  type="text" placeholder="Type for a Customer" autocomplete='off'>
                        </div>
                        <div class="input-highlight"></div>
                     </div>
                  </div>
                  <!-- ./col- -->
               </div>
               <!-- /.row -->
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group input-field label-float">
                        <input style="margin-left: 15px;" id="cus_state" name="cus_state"  type="text" placeholder="Customer State"  autocomplete='off'>
                        <label style="margin-left: 15px;" for="address_one" class="fixed-label">{{__('State') }}</label>
                        <div class="input-highlight"></div>
                     </div>
                     <!-- /.form-group -->			
                  </div>
                  <!-- ./col- -->	
               <!-- /.row -->
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input id="cus_city" name="cus_city"  type="text" placeholder="Customer City"  autocomplete='off'>
                     <label for="address_one" class="fixed-label">{{__('City') }}</label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->			
               </div>
               <!-- ./col- -->	
         </div>
         <!-- /.row -->
         
      </div>
      <!-- /.row -->
      <div class="row">
	  <div class="col-sm-6">
         <div class="select-row form-group">
         <label for="cus_email" class="block">{{__('Customer Email') }}<span style="color:red">*</span></label>                 
         <!-- To validate the select add class "select-validate" -->     
         <input id="cus_email" name="cus_email"  type="text" placeholder="Customer Email"  autocomplete='off'>
         <div class="input-highlight"></div>
         </div>
         </div><!-- ./col- -->	
      <div class="col-sm-6">
      <div class="select-row form-group">
      <label for="cus_phone" class="block">{{__('Customer Phone') }}<span style="color:red">*</span></label>                 
      <input id="cus_phone" name="cus_phone"  type="text" placeholder="Customer Phone"  autocomplete='off'>
      <div class="input-highlight"></div>
      </div>
      </div><!-- ./col- -->
      <div class="row">
      <div class="col-sm-6">
      <div class="form-group input-field label-float">
      <div class="input-field label-float">
      <input id="cus_zipcode" style="margin-left: 15px;" name="cus_zipcode"  type="text" placeholder="Customer Zipcode"  autocomplete='off'>
      <label for="cus_zipcode" style="margin-left: 15px;" class="fixed-label">{{__('Zipcode') }}</label>
      <div class="input-highlight"></div>
      </div>
      <div class="input-highlight"></div>
      </div><!-- /.form-group -->
      </div><!-- ./col- -->
	  <div class="col-sm-6">
      <div class="form-group input-field label-float">
      <div class="input-field label-float">
      <input id="address_one" style="margin-left: 15px;" name="address_one"  type="text" placeholder="Address One"  autocomplete='off'>
      <label for="address_one" style="margin-left: 15px;" class="fixed-label">{{__('Address One') }}</label>
      <div class="input-highlight"></div>
      </div>
      <div class="input-highlight"></div>
      </div><!-- /.form-group -->
      </div><!-- ./col- -->
		<div class="col-sm-6">
      <div class="form-group input-field label-float">
      <div class="input-field label-float">
      <input id="address_two" style="margin-left: 15px;" name="address_two"  type="text" placeholder="Address two"  autocomplete='off'>
      <label for="address_two" style="margin-left: 15px;" class="fixed-label">{{__('Address two') }}</label>
      <div class="input-highlight"></div>
      </div>
      <div class="input-highlight"></div>
      </div><!-- /.form-group -->
      </div><!-- ./col- -->
      </div><!-- /.row -->
      </div><!-- /.row -->
      <p><span style="color:red;    margin-left: 0px;"> Mandatory (*)</span></p>
      <div class="form-group clearfix">
      <button type="submit" class="btn theme-accent waves-effect waves-light pull-right"><i class="mdi mdi-send right"></i>Save</button>
      </div><!-- /.form-group -->
      </form>
      </div> <!--</div> --><!-- /.row -->
      <div class="col-md-4 p8 sticky fixed">
            <div id="destination-chart" class="destinations-division" style="margin-top:23px">
                  <div class="sortable">
                     <div class="card">
                        <div class="p8 blue-grey">
                           <div class="card-title">Places (State-City)</div>
                           <input type="hidden" name="packageid" id="packageid"> 
                        </div>
                        <div class="card-block">
                           <div class="scroller ">
                              <ul id="place-sortList" class="list-group placecitylist item-border">
                                 
                              </ul>
                              <div id="dummyList">

                              </div>
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
                    <div id="dummyListNights">

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
   </div><!-- /.container-fluid -->
   <!-- =========================================================== -->
   <!-- End page content  -->
   <!-- =========================================================== -->
</section>
<!-- /.content-wrapper -->
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<!-- <script src="{{ asset('public/assets/dist/js/plugins/typeahead/typeahead.jquery.js') }}"></script> -->
<script src="{{ asset('public/assets/dist/js/plugins/typeahead/typeahead_external.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script>
   (function ($) {
   $(document).ready(function () {
   $('#customer_name').autocomplete({
    // minChars: 1,
    source: function(request, response) {
        $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{route('customer_autocomplete')}}",
        data: 'action=customer_name'+'&name='+request.term,
        success: function(data) {
          response( $.map( data, function( item ) {
              console.log(data);
              var object = new Object();
               object.label = item.value;
               object.value = item.name;
               object.city_name = item.city_name;
               object.state_name = item.state_name;
               object.zipcode = item.zipcode;
               object.address_one = item.address_one;
               object.address_two = item.address_two;
               object.email = item.email;
               object.phone = item.phone;
              return object
          }));
          // response( $.map( data, function( item ) {
          //     return {
          //         label: item.title,
          //         value: item.title
          //     }
          // }));
   
        }
      });
    },
    select: function (event, ui) {
      $("#customer_name").val(ui.item.value);
      $("#cus_name").val(ui.item.name);
      $("#cus_city").val(ui.item.city_name);
      $("#cus_state").val(ui.item.state_name);
      $("#cus_zipcode").val(ui.item.zipcode);
      $("#address_one").val(ui.item.address_one);
      $("#address_two").val(ui.item.address_two);
      $("#cus_phone").val(ui.item.phone);
      $("#cus_email").val(ui.item.email);
     }
   });
    $('#package_name').autocomplete({
    // minChars: 1,
    source: function(request, response) {
        $.ajaxSetup({
   headers: {
   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
   });
      $.ajax({
        type: 'POST',
        dataType: 'json',
        url: "{{ route('package_autocomplete') }}",
        data: 'action=package_name'+'&name='+request.term,
        success: function(data) {
          response( $.map( data, function( item ) {
              //console.log(data);
              var object = new Object();
               object.label = item.value;
               object.value = item.package_name;
               object.packageid = item.packageid;          
              return object
          }));
          // response( $.map( data, function( item ) {
          //     return {
          //         label: item.title,
          //         value: item.title
          //     }
          // }));
   
        }
      });
    },
    select: function (event, ui) {
      $("#package_name").val(ui.item.value);
      $('#packageid').val(ui.item.packageid);


       var packageid = $("#packageid").val();
       var url = "{{ route('package_place_details') }}?package_id="+packageid;   

        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
            $.ajax({
                url:  url,          
                dataType: "json",
                type: "GET",
                success: function (data) {
                    console.log(data);
                    $.each(data, function( index, value ) {
                            $("#place-sortList").append('<li data-cityid="'+value.cityid+'" id="picked-li-'+value.cityid+'" class="list-group-item sort-handle"> . '+value.state_name+' - '+value.city_name+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+value.stateid+'" value="'+value.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+value.cityid+'" value="'+value.cityid+'"/></li>');
                        });
                }
            });
    
     }
   });
   });
   
   })(jQuery);
   $(document).ready(function(){
   $('.input-group.date').datepicker({format: "dd-mm-yyyy"}); 
   $('#dp1').datepicker({ format: 'mm-dd-yyyy', });
   $("#formValidate").validate({
   rules: {
   "name": {
   required: true,
   },
        "email": {
   required: true,
           email : true,
   },
        "country_id" : {
           required: true,
        },
        "state_id" : {
           required: true,
        },
        "city_id" : {
           required: true,
        },
        "zipcode" : {
           required: true,
           digits : true,
        },
        "phone" : {
           required: true,
           digits : true,
        },	
   },
   messages: {
   "name": {
   required: "Please, enter Name",
   },
        "email": {
   required: "Please, enter Email",
           email : "Please enter valid email",
   },
        "country_id" : {
           required: "Please, choose country",
        },
        "state_id" : {
           required: "Please, choose state",
        },
        "city_id" : {
           required: "Please, choose city",
        },
        "zipcode" : {
           required: "Please, Enter Zipcode",
           digits : "Numbers only",
        },
        "phone" : {
           required: "Please, enter Phone Number",
           digits : "Numbers only",
        },
   },
   submitHandler: function (form) {
   $.ajax({
   type: 'post',
   url: "{{ route('customer_save') }}",
   data: $('form').serialize(),
   success: function(response){
   if(response)
   { 
   	window.location.href = "{{route('customer.new')}}";
   }
   }
   });
     }
   });
   
   });
   $(function () {
   // $('#customer_name').change(function() {
   
   });
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