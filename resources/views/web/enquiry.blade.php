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
               <form method='post' id='formValidate' >
               @csrf
                  <div class="form-group col-md-6">
                     <input type="text" name='name' id='name' class="form-control" placeholder="Name"  />
                  </div>
                  <div class="form-group col-md-6">
                     <input type="email" name='email' id='email' class="form-control" placeholder="Email"  />
                     <span><i class="fa fa-envelope"></i></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-6">
                     <input type="text" name='phone' id='phone' class="form-control" placeholder="phone" />
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
                  <input type='submit' value='submit' class='pull-right btn btn-orange'>
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
			},
			messages: {
				"name": {
					required: "Please, enter Name",
				},
            "email": {
					required: "Please, enter Email",
               email : "Please enter valid email",
				},
            "type" : {
               required: "Please, choose type",
            },
            "phone" : {
               required: "Please, enter Phone Number",
               digits : "Numbers only",
            },
			},
			submitHandler: function (form) {
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
                });
				$.ajax({
					type: 'post',
					url: "{{ route('enquiry_email') }}",
					data: $('form').serialize(),
					success: function(response){
						if(response)
						{ 
                            alert('Enquiry form submitted succesfully');
                            window.location.reload();
                             
						}
					}
			});
         }
		});
});
</script>
@endsection