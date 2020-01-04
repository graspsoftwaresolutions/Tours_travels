@extends('layouts.admin')
@section('headSection')
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
               <form>
                  <div class="form-group col-md-6">
                     <input type="text" class="form-control" placeholder="Name"  required/>
                  </div>
                  <div class="form-group col-md-6">
                     <input type="email" class="form-control" placeholder="Email"  required/>
                     <span><i class="fa fa-envelope"></i></span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-6">
                     <input type="text" class="form-control" placeholder="phone"  required/>
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
                      <div class="col-sm-12 packages" style='background-color:red;'>
                        <div class="form-group">
                          <label for=""><strong>Select Packages:</strong></label>
                          <div class="row"> 
                              @foreach($data['packages_view'] as $value)
                              <div class="col-md-3" >
                                   <div class="form-group">     
                                     <label class="checkbox-filled" for="package_{{ $value->id }}">
                                      <input type="checkbox" class="filled" name="package[]" id="package_{{ $value->id }}" value="{{ $value->id }}">
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
                     <textarea class="form-control" placeholder="Message" required></textarea>
                  </div>
                  <div class="form-group col-md-6">
                     <textarea class="form-control" placeholder="Address" required></textarea>
                  </div>
                  <div class="clearfix"></div>
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
});
 

</script>
@endsection