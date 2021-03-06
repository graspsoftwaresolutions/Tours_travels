<!--======================= FOOTER =======================-->
<section id="footer" class="ftr-heading-o ftr-heading-mgn-1">
@php $website_dat = CommonHelper::getWebsiteDetails(); @endphp
		<div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white">
			<div class="container">
				<div class="row"> <aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column"> <div class="widget"> <a class="htlfndr-logo " href="#">  <p class="widget-title footer-heading">Tours Travels</span></p> </a> <hr> <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpat.</p> <br> <p>Nunc ut fringilla urna. Cras vel adipiscing ipsum. Integer dignissim nisl eu lacus interdum facilisis. Aliquam erat volutpat. Nulla</p> </div> </aside> <aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column"> <div class="widget"> <h3 class="widget-title footer-heading">contact info</h3> <h5>Address</h5> <p> {{ $website_dat->company_name ? $website_dat->company_name : 'test' }}  <br>{{ $website_dat->company_address_one ? $website_dat->company_address_one : 'test' }} , {{ $website_dat->company_address_two ? $website_dat->company_address_two : '' }}</p> <hr> <h5>Phone number</h5> <p>{{ $website_dat->company_phone ? $website_dat->company_phone : '' }} </p> <hr> <h5>Email address</h5> <p>{{ $website_dat->company_email ? $website_dat->company_email : '' }}</p> </div> </aside> 
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
						<h3 class="widget-title footer-heading">RESOURCES</h3>
						<ul class="list-unstyled">
							<li><a href="#">Blogs</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Register</a></li>
							<li><a href="#">Site Map</a></li>
						</ul>
				</div>
					<aside class="col-xs-12 col-sm-6 col-md-3 htlfndr-widget-column footer-widget ftr-about ftr-newsletter"> <div class="widget"> <h3 class="widget-title footer-heading">follow us</h3> 
					<div class="htlfndr-follow-plugin"> 
					<ul class="social-links list-inline list-unstyled">
							<li><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-linkedin"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-youtube-play"></i></span></a></li>
						</ul>
					</div> <hr> <h3 class="widget-title">mailing list</h3> <p>Sign up for our mailing list to get latest updates and offers</p> <form>
						<div class="form-group">
							<div class="input-group">
								<input type="email" class="form-control input-lg" placeholder="Enter your email address" required="">
								<span class="input-group-btn"><button class="btn btn-lg"><i class="fa fa-envelope"></i></button></span>
							</div>
						</div>
					</form> </div> </aside> </div>
				<div class="row hide">
					
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-contact">
						<h3 class="footer-heading">CONTACT US</h3>
						
						<ul class="list-unstyled">
							<li><span><i class="fa fa-map-marker"></i></span>{{ $website_dat->company_address_one ? $website_dat->company_address_one : 'test' }} , {{ $website_dat->company_address_two ? $website_dat->company_address_two : '' }}</li>
							<li><span><i class="fa fa-phone"></i></span>{{ $website_dat->company_phone ? $website_dat->company_phone : '' }}</li>
							<li><span><i class="fa fa-envelope"></i></span>{{ $website_dat->company_email ? $website_dat->company_email : '' }}</li>
						</ul>
					</div><!-- end columns -->
					
					<div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-widget ftr-links">
						<h3 class="footer-heading">COMPANY</h3>
						<ul class="list-unstyled">
							<li><a href="#">Home</a></li>
							<li><a href="#">Flight</a></li>
							<li><a href="#">Hotel</a></li>
							<li><a href="#">Tours</a></li>
							<li><a href="#">Cruise</a></li>
							<li><a href="#">Cars</a></li>
						</ul>
					</div><!-- end columns -->
					
					<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
						<h3 class="footer-heading">RESOURCES</h3>
						<ul class="list-unstyled">
							<li><a href="#">Blogs</a></li>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Login</a></li>
							<li><a href="#">Register</a></li>
							<li><a href="#">Site Map</a></li>
						</ul>
					</div><!-- end columns -->

					<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
						<h3 class="footer-heading">ABOUT US</h3>
						<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
						<ul class="social-links list-inline list-unstyled">
							<li><a href="#"><span><i class="fa fa-facebook"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-twitter"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-google-plus"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-pinterest-p"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-instagram"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-linkedin"></i></span></a></li>
							<li><a href="#"><span><i class="fa fa-youtube-play"></i></span></a></li>
						</ul>
					</div><!-- end columns -->
					
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end footer-top -->

		<div id="footer-bottom" class="ftr-bot-black">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="copyright">
						<p>© 2017 <a href="#">StarTravel</a>. All rights reserved.</p>
					</div><!-- end columns -->
					
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="terms">
						<ul class="list-unstyled list-inline">
							<li><a href="#">Terms & Condition</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div><!-- end columns -->
				</div><!-- end row -->
			</div><!-- end container -->
		</div><!-- end footer-bottom -->	
	</section><!-- end footer -->
	<div id="loader"></div>
