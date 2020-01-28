@extends('layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<style>
   #cover-contact-us {
   background: url('{{ asset("public/web-assets/images/cover-contact-us.jpg") }}') 50% 20%;
   background-size: cover;
   }
   .clearfix{
       clear:both;
   }
   .custom-form .form-group input {
      height: 45px;
      /* padding-left: 40px; */
   }
   .read
   {
      pointer-events: none;
   }
   /* #loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url('{{ asset("public/assets/images/spinner.gif") }}') no-repeat center center;
  z-index: 10000;
} */


</style>
@endsection
@section('main-content')
<!--================ PAGE-COVER ===============-->
<section class="page-cover" id="cover-contact-us">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <h1 class="page-title">Enquiry</h1>
            <ul class="breadcrumb">
               <li><a href="#">Home</a></li>
               <li class="active">Enquiry</li>
            </ul>
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end page-cover -->
<!--===== INNERPAGE-WRAPPER ====-->
<section class="innerpage-wrapper">
   <div id="contact-us" class="innerpage-section-padding">
      <div class="container">
         <div class="row">
            <div class="custom-form contact-form">
               <h3>Enquiry</h3>
               @include('includes.messages')
               <form method='post' id='formValidate' >
               @csrf
                  <div class="form-group col-md-6">
                    
                     <input type="hidden" value="{{ Auth::check() ? Auth::user()->id : '' }}" name='auth_id' id='auth_id' class="form-control" placeholder="Name"  />
                     <input type="text" value="{{ Auth::check() ? Auth::user()->name : old('name') }}" name='name' id='name' class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" placeholder="Name"  />
                     
                  </div>
                  <div class="form-group col-md-6">
                     <input type="email" name='email' class="{{ Auth::check() ? 'read form-control' : 'form-control'}}"  value="{{ Auth::check() ? Auth::user()->email : '' }}" id='email'  placeholder="Email or Username"  />
                     
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-6">
                     <input type="text" name='phone' value="{{ Auth::check() ? Auth::user()->phone : '' }}" id='phone' class="{{ Auth::check() ? 'read form-control' : 'form-control'}}" placeholder="phone" />
                  </div>
                  <div class="form-group col-md-6">
                     <select name='type' id='type' class="form-control">
                        <option value='0'>Select Type</option>
                        <option value='general'>General</option>
                        <option value='package'>Package</option>
                     </select>
                  </div> 
                  <div class="clearfix"></div>
                  <!-- <div class="row packages" > -->
                      <div class="col-sm-12 packages" >
                        <div class="form-group">
                          <label for="" style='padding: 10px 0px;'><strong>Select Packages:</strong></label>
                          <div class="row"> 
                              @foreach($data['packages_view'] as $value)
                              <div class="col-md-3" >
                                   <div class="form-group">     
                                     <label class="checkbox-filled" for="package_{{ $value->id }}">
                                      <input type="checkbox" class="filled" style='height: auto;' name="package[]" id="package_{{ $value->id }}" value="{{ $value->id }}">
                                      <i class="highlight"></i>
                                      {{ $value->package_name }}
                                    </label>
                                  </div>                       
                              </div>
                               @endforeach
                          </div>
                        </div>
                      </div>
                    <!-- </div> -->
                    <div class="clearfix"></div>
                  <div class="form-group col-md-6">
                     <textarea class="form-control" id='message' name='message' placeholder="Message" ></textarea>
                  </div>
                  <div class="form-group col-md-6">
                     <textarea class="form-control" id='address' name='address' placeholder="Address" ></textarea>
                  </div>
                  <div class="clearfix"></div>
                  <input type='submit' id="SaveEnquiryButton" value='submit' class='pull-right btn btn-orange'>
                  <!-- <button id='start_call'>Refresh</button> -->
               <div id='loading' class='pull-right'></div>
              
               </form>
            </div>
         </div>
         <!-- end row -->
      </div>
      <!-- end container -->   
   </div>
   <!-- end contact-us -->
</section>
<!-- end innerpage-wrapper -->
<!--======================= BEST FEATURES =====================-->
<section id="best-features" class="banner-padding black-features">
   <div class="container">
      <div class="row">
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-dollar"></i></span>
               <h3>Best Price Guarantee</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-lock"></i></span>
               <h3>Safe and Secure</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-thumbs-up"></i></span>
               <h3>Best Travel Agents</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
         <div class="col-sm-6 col-md-3">
            <div class="b-feature-block">
               <span><i class="fa fa-bars"></i></span>
               <h3>Travel Guidelines</h3>
               <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
            </div>
            <!-- end b-feature-block -->
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end best-features -->
<!--========================= NEWSLETTER-1 ==========================-->
<section id="newsletter-1" class="section-padding back-size newsletter">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <h2>Subscribe Our Newsletter</h2>
            <p>Subscibe to receive our interesting updates</p>
            <form>
               <div class="form-group">
                  <div class="input-group">
                     <input type="email" class="form-control input-lg" placeholder="Enter your email address" required/>
                     <span class="input-group-btn"><button class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
                  </div>
               </div>
            </form>
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end newsletter-1 -->

@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script>


$(document).ready(function(){

    $('.packages').hide();
   $('#type').change(function(){
     var type =   $('#type').val();
      if(type == 'package')
      {
         $('.packages').show();
         $('#submittext').text('Get quotation');
      }
      else{
         $('.packages').hide();
      }
   });

   
   $("#formValidate").validate({
			rules: {
				"name": {
					required: true,
				},
            "email": {
					required: true,
               email : true,
				},
            "type" : {
               required: true,
            },
            "phone" : {
               required: true,
               digits : true,
            },	
            "message" : {
               required: true,
            },
			},
			messages: {
				"name": {
					required: "Please enter Name",
				},
            "email": {
					required: "Please enter Email",
               email : "Please enter valid email",
				},
            "type" : {
               required: "Please choose type",
            },
            "phone" : {
               required: "Please enter Phone Number",
               digits : "Numbers only",
            },
            "message" : {
               required: "Please, enter message",
            },
			},
			submitHandler: function (form) {
            spinner.show();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
				$.ajax({
					type: 'post',
					url: "{{ route('enquiry_email') }}",
					data: $('form').serialize(),
               dataType: "json",
					success: function(response){
                  console.log(response);
                     if(response.status == 0)
                     {
                        alert(response.message);
                        spinner.hide();
                        //window.location.reload();
                     }
                     else{
                        spinner.hide();
                        alert('Enquiry form submitted succesfully');
                        window.location.reload();
                     } 
					}
			});
         }
		});
});
$(document).on('submit','form#formValidate',function(){
      $("#SaveEnquiryButton").prop('disabled',true);
});
$("#home_menu_id").removeClass('active');
$("#enquiry_menu_id").addClass('active');
</script>
@endsection