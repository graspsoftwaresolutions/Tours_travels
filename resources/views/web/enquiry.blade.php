@extends('layouts.admin')
@section('headSection')
<style>
#cover-contact-us {
    background: url('{{ asset("public/web-assets/images/cover-contact-us.jpg") }}') 50% 20%;
    background-size: cover;
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
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end page-cover -->

             <!--===== INNERPAGE-WRAPPER ====-->
             <section class="innerpage-wrapper">
        	<div id="contact-us" class="innerpage-section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 col-md-5 no-pd-r">
                        	<div class="custom-form contact-form">
                            	<h3>Enquiry</h3>
                                <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p> -->
                                <form> 
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Name"  required/>
                                         <span><i class="fa fa-user"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                         <input type="email" class="form-control" placeholder="Email"  required/>
                                         <span><i class="fa fa-envelope"></i></span>
                                    </div>
                                    
                                    <div class="form-group">
                                         <input type="text" class="form-control" placeholder="Subject"  required/>
                                         <span><i class="fa fa-info-circle"></i></span>
                                    </div>
    
                                    <div class="form-group">
                                        <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                                        <span><i class="fa fa-pencil"></i></span>
                                    </div>
    								
                                    <button class="btn btn-orange btn-block">Send</button>
                                </form>
                            </div><!-- end contact-form -->
                        </div><!-- end columns -->
                        
                        <div class="col-sm-12 col-md-7 no-pd-l">
                            <div class="map">
                                <iframe src=		"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509729.487836256!2d-123.77686152799836!3d37.1864783963941!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia!5e0!3m2!1sen!2s!4v1490695907554" allowfullscreen></iframe>
                            </div><!-- end map -->
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
                </div><!-- end container -->   
            </div><!-- end contact-us -->
        </section><!-- end innerpage-wrapper -->

         <!--======================= BEST FEATURES =====================-->
         <section id="best-features" class="banner-padding black-features">
        	<div class="container">
        		<div class="row">
        			<div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-dollar"></i></span>
                        	<h3>Best Price Guarantee</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-lock"></i></span>
                        	<h3>Safe and Secure</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-thumbs-up"></i></span>
                        	<h3>Best Travel Agents</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                   
                   <div class="col-sm-6 col-md-3">
                    	<div class="b-feature-block">
                    		<span><i class="fa fa-bars"></i></span>
                        	<h3>Travel Guidelines</h3>
                            <p>Lorem ipsum dolor sit amet, ad duo fugit aeque fabulas, in lucilius prodesset pri. Veniam delectus ei vis.</p>
                        </div><!-- end b-feature-block -->
                   </div><!-- end columns -->
                </div><!-- end row -->
        	</div><!-- end container -->
        </section><!-- end best-features -->

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
                    </div><!-- end columns -->
                </div><!-- end row -->
            </div><!-- end container -->
        </section><!-- end newsletter-1 -->
@endsection
		
@section('footerSection')
@endsection