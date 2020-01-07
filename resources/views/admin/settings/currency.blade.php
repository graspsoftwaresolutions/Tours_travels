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
         <ul class="breadcrumbs">
            <li>Currency</li>
            <li>Add Currency</li>
         </ul>
      </div>
     @php $row = $data;  @endphp
      <div class="page-content clearfix">
         <!-- <div class="col-sm-10 col-sm-offset-1"> -->
         @include('includes.messages')
         <form id="formValidate" class="wrapper-boxed paper p30 mt30" action="{{route('currency_save')}}" method="post" data-toggle="validator">
            @csrf
            <h6 class="text-display-1">Currency Information</h6>
            <input type="hidden" name="currency_id" value="{{$row->id ? $row->id : ''}}">
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Currency Name" class="clearable"  value="{{$row->currency_name ? $row->currency_name : ''}}"   id="currency_name" name="currency_name" autofocus type="text">
                     <label for="currency_name" class="fixed-label">{{__('Name') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Currency Code" class="clearable" value="{{$row->currency_code ? $row->currency_code : ''}}"  id="currency_code" name="currency_code" autofocus  type="text">
                     <label for="currency_code" class="fixed-label">{{__('Code') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- ./col- -->
           
             </div>
			  <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                     <input placeholder="Currency Symbol" class="clearable" value="{{$row->company_symbol ? $row->company_symbol : ''}}" id="company_symbol" name="company_symbol"   autofocus  type="text">
                     <label for="company_symbol" class="fixed-label">{{__('Symbol') }}<span style="color:red">*</span></label>
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- ./col- -->
             </div>
			  <div class="row">
               <div class="col-sm-6">
                  <div class="form-group input-field label-float">
                  <label for="currency_status" class="fixed-label">{{__('Status') }}<span style="color:red">*</span></label>
                    <select name="currency_status" id="currency_status" class="selectpicker form-control">
                       
                        <option value='1' @php if($row->currency_status == 1) echo 'selected'  @endphp>Active</option>
                        <option value='0' @php if($row->currency_status == 0) echo 'selected'  @endphp>Inactive</option>
                    </select>
                   
                     <div class="input-highlight"></div>
                  </div>
                  <!-- /.form-group -->
               </div>
               <!-- ./col- -->
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
   				"currency_name": {
   					required: true,
   				},
                   "currency_code": {
   					required: true,
   				},
                   "company_symbol": {
   					required: true,
                       
   				},
                   "currency_status": {
   					   required: true,      
   				},
   			},
   			messages: {
   				"currency_name": {
   					required: "Please, enter Name",
                       
   				},
                   "currency_code": {
   					required: "Please, enter website",
   				},
                   "company_symbol": {
   					required: "Please, enter email",
   				},
                   "currency_status": {
   					required: "Please, enter phone number",
                       
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
   			// alert('Form Saved succesfully'); // for demo
   			// return false; // for demo
            // }
   		});
   });
</script>
@endsection