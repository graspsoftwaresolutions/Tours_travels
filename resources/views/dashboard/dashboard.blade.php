@extends('layouts.admin')
@section('headSection')

@endsection

@section('main-content')	
	<section class="content-wrapper">

	<!-- =========================================================== -->
	<!-- Start page content  -->
	<!-- =========================================================== -->
		<div class="aside-panel"></div>				
	
		<div class="container-fluid">
			<div class="page-header">
				<h1>Dashboard</h1>
				<ul class="breadcrumbs">
					<li>Dashboard</li>
					<li>Sales</li>
				</ul>
			</div>

			<div class="page-content">
				<div class="switch-toggle mt20 mb10">				

					<input id="day" name="stats" type="radio" value="today">
					<label for="day">Today</label>

					<input id="week" name="stats" type="radio" value="week" checked>
					<label for="week">This Week</label>

					<input id="month" name="stats" type="radio" value="month">
					<label for="month">This Month</label>

					<input id="year" name="stats" type="radio" value="year">
					<label for="year">This Year</label>

					<input id="alltime" name="stats" type="radio" value="alltime">
					<label for="alltime">All time</label>

					<a class="btn theme"></a>

				</div><!-- /.switch-toggle -->

				<div id="statisticsTiles" class="row stat-wrapper stat-sortable">
					<div class="col-xs-6 col-sm-3">

						<div id="statCard1" class="card mt20">			
							<div class="stat-body sort-handle">
								<select id="colorselector_1">
									<option value="pink" data-color="#e91e63">Pink</option>
									<option value="lavendar" data-color="#7C4DFF">Lavendar</option>
									<option value="purple" data-color="#9c27b0">Purple</option>
									<option value="deep-purple" data-color="#673ab7">Deep Purple</option>
									<option value="cyan" data-color="#00bcd4">Cyan</option>
									<option value="blue-dark" data-color="#1266F1">Blue Dark</option>
									<option value="indigo" data-color="#3f51b5">Indigo</option>
									<option value="midnight" data-color="#313447">Midnight</option>
									<option value="lime" data-color="#cddc39">Lime</option>
									<option value="light-green" data-color="#8bc34a">Light Green</option>
									<option value="cyan-dark" data-color="#0097a7">Cyan Dark</option>
									<option value="teal" data-color="#009688">Teal</option>
									<option value="orange" data-color="#ff9800">Orange</option>
									<option value="amber" data-color="#ffc107">Amber</option>
									<option value="blue-grey" data-color="#607d8b">Blue Grey</option>
									<option value="mda" data-color="#4a7885">MDA</option>
					    		</select>

								<div class="stat-icon">
									<i class="mdi mdi-account-multiple-plus"></i>
								</div>

								<div class="stat-details">
									<span class="count">852</span>
									<span class="stat-title">New clients</span>
								</div>

								<div class="stat-footer">
									<span class="stat-graph-clients">
										<span class="bar">6,4,7,9,5,4,8,5,7,9,6,4,3,6,5,8,7,9,4,5,8</span>
									</span>
								</div>
							</div><!-- /.stat-body -->
						</div><!-- /.stat-item -->
					</div><!-- /.col- -->

					<div class="col-xs-6 col-sm-3">
						<div id="statCard2" class="card mt20">
							<div class="stat-body sort-handle">
								<select id="colorselector_2">
									<option value="pink" data-color="#e91e63">Pink</option>
									<option value="lavendar" data-color="#7C4DFF">Lavendar</option>
									<option value="purple" data-color="#9c27b0">Purple</option>
									<option value="deep-purple" data-color="#673ab7">Deep Purple</option>
									<option value="cyan" data-color="#00bcd4">Cyan</option>
									<option value="blue-dark" data-color="#1266F1">Blue Dark</option>
									<option value="indigo" data-color="#3f51b5">Indigo</option>
									<option value="midnight" data-color="#313447">Midnight</option>
									<option value="lime" data-color="#cddc39">Lime</option>
									<option value="light-green" data-color="#8bc34a">Light Green</option>
									<option value="cyan-dark" data-color="#0097a7">Cyan Dark</option>
									<option value="teal" data-color="#009688">Teal</option>
									<option value="orange" data-color="#ff9800">Orange</option>
									<option value="amber" data-color="#ffc107">Amber</option>
									<option value="blue-grey" data-color="#607d8b">Blue Grey</option>
									<option value="mda" data-color="#4a7885">MDA</option>
					    		</select>

								<div class="stat-icon">
									<i class="mdi mdi-cart"></i>
								</div>

								<div class="stat-details">
									<span class="count">852</span>
									<span class="stat-title">Sales</span>
								</div>

								<div class="stat-footer">
									<span class="stat-graph-orders">
										<span class="bar">4,3,6,5,8,7,9,4,5,8,6,4,7,9,5,4,8,5,7,9,6</span>
									</span>
								</div>
							</div><!-- /.stat-body -->				
						</div><!-- /.stat-item -->
					</div><!-- /.col- -->

					<div class="col-xs-6 col-sm-3">
						<div id="statCard3" class="card mt20">
							<div class="stat-body sort-handle">
								<select id="colorselector_3">
									<option value="pink" data-color="#e91e63">Pink</option>
									<option value="lavendar" data-color="#7C4DFF">Lavendar</option>
									<option value="purple" data-color="#9c27b0">Purple</option>
									<option value="deep-purple" data-color="#673ab7">Deep Purple</option>
									<option value="cyan" data-color="#00bcd4">Cyan</option>
									<option value="blue-dark" data-color="#1266F1">Blue Dark</option>
									<option value="indigo" data-color="#3f51b5">Indigo</option>
									<option value="midnight" data-color="#313447">Midnight</option>
									<option value="lime" data-color="#cddc39">Lime</option>
									<option value="light-green" data-color="#8bc34a">Light Green</option>
									<option value="cyan-dark" data-color="#0097a7">Cyan Dark</option>
									<option value="teal" data-color="#009688">Teal</option>
									<option value="orange" data-color="#ff9800">Orange</option>
									<option value="amber" data-color="#ffc107">Amber</option>
									<option value="blue-grey" data-color="#607d8b">Blue Grey</option>
									<option value="mda" data-color="#4a7885">MDA</option>
					    		</select>

								<div class="stat-icon">
									<i class="mdi mdi-gmail"></i>
								</div>

								<div class="stat-details">
									<span class="count">852</span>
									<span class="stat-title">New subscribers</span>
								</div>

								<div class="stat-footer">
									<span class="stat-graph-subscribers">
										<span class="bar">7,9,4,5,8,6,4,7,4,3,6,5,8,9,5,4,8,5,7,9,6</span>
									</span>
								</div>
							</div><!-- /.stat-body -->
						</div><!-- /.stat-item -->
					</div><!-- /.col- -->

					<div class="col-xs-6 col-sm-3">
						<div id="statCard4" class="card mt20">
							<div class="stat-body sort-handle">
								<select id="colorselector_4">
									<option value="pink" data-color="#e91e63">Pink</option>
									<option value="lavendar" data-color="#7C4DFF">Lavendar</option>
									<option value="purple" data-color="#9c27b0">Purple</option>
									<option value="deep-purple" data-color="#673ab7">Deep Purple</option>
									<option value="cyan" data-color="#00bcd4">Cyan</option>
									<option value="blue-dark" data-color="#1266F1">Blue Dark</option>
									<option value="indigo" data-color="#3f51b5">Indigo</option>
									<option value="midnight" data-color="#313447">Midnight</option>
									<option value="lime" data-color="#cddc39">Lime</option>
									<option value="light-green" data-color="#8bc34a">Light Green</option>
									<option value="cyan-dark" data-color="#0097a7">Cyan Dark</option>
									<option value="teal" data-color="#009688">Teal</option>
									<option value="orange" data-color="#ff9800">Orange</option>
									<option value="amber" data-color="#ffc107">Amber</option>
									<option value="blue-grey" data-color="#607d8b">Blue Grey</option>
									<option value="mda" data-color="#4a7885">MDA</option>
					    		</select>

								<div class="stat-icon">
									<i class="mdi mdi-coin"></i>
								</div>

								<div class="stat-details">
									<span class="count money">852</span>
									<span class="stat-title">Revenue</span>
								</div>
								<div class="stat-footer">
									<span class="stat-graph-4">
										<span class="bar">6,5,8,9,5,4,8,5,7,7,9,4,5,8,6,4,7,4,3,9,6</span>
									</span>
								</div>
							</div><!-- /.stat-body -->
						</div><!-- /.stat-item -->
					</div><!-- /.col- -->
				</div><!-- /.row .stat-wrapper-->

				<small class="sub-text">Click on the color palette icon to change the card color.</small>

				<div class="row">
					<div class="col-md-6">
				        <div class="card toolbar-parent mt40 pb14 db-demo-widgets">
				        	<div class="p10">
				        		<div class="toolbar">				
									<div class="pull-right">			
										<select class="selectpicker mr12" data-width="auto">
											<option value="this_week">This week</option>
											<option value="last_week">Last week</option>
											<option value="this_month">This month</option>
											<option value="last_month">Last month</option>
										</select>
										<a href="#:;" class="icon action toolbar-fullscreen"></a>			
									</div>
									<div class="title text-theme">Visitors</div>
								</div><!-- /.toolbar -->
							</div>
							<div class="divider theme ml10 mr10"></div>
					        <div class="card-block clearfix mt14 pb0">
					        	<h4>Visitors By Country</h4>
				        		<div id="world-map" class="mt6" style="height: 302px;"></div>
				        		
								<div class="visitors-chart">
									<h4>Visitors last 30 days</h4>
					        		<div id="visitorsChart" class="mt14" style="height: 120px;"></div>
								</div>
				        		<div class="card-block">
				        			<a href="#:;" class="btn-circle fixed-action-btn theme-accent waves-effect waves-light"><i class="mdi mdi-swap-vertical mdi-rotate-45 medium bottom activator"></i></a> 
				        		</div>     	
					        </div><!-- /.card-block -->

					        <div class="card-reveal">
					            <span class="card-title mb20">Visitors<i class="btn-close"></i></span>

					            <table class="table-striped">
				                    <tr>
				                        <th>Country</th>
				                        <th>Visitors</th>
				                        <th>Sales</th>
				                        <th>Conversion</th>
				                    </tr>
				                    <tr>
				                        <td>Russia</td>
				                        <td>3000</td>
				                        <td>192</td>
				                        <td>6.4 %</td>
				                    </tr>
				                    <tr>
				                        <td>Canada</td>
				                        <td>1000</td>
				                        <td>109</td>
				                        <td>10.9 %</td>
				                    </tr>
				                    <tr>
				                        <td>India</td>
				                        <td>800</td>
				                        <td>131</td>
				                        <td>16.4 %</td>
				                    </tr>
				                    <tr>
				                        <td>France</td>
				                        <td>760</td>
				                        <td>82</td>
				                        <td>10.8 %</td>
				                    </tr>
				                    <tr>
				                        <td>Australia</td>
				                        <td>700</td>
				                        <td>54</td>
				                        <td>7.7 %</td>
				                    </tr>
				                    <tr>
				                        <td>Brazil</td>
				                        <td>600</td>
				                        <td>53</td>
				                        <td>8.8 %</td>
				                    </tr>
				                    <tr>
				                        <td>USA</td>
				                        <td>398</td>
				                        <td>42</td>
				                        <td>10.5 %</td>
				                    </tr>
				                </table>

					        </div><!-- /.card-reveal -->
				        </div><!-- /.card -->
					</div><!-- /.col -->

					<div class="col-md-6">
						<div class="card toolbar-parent mt40 db-demo-widgets">
							<div class="p10">
								<div class="toolbar">
									<div class="pull-right">				
										<select class="selectpicker mr12" data-width="auto">
											<option value="this_week">This week</option>
											<option value="last_week">Last week</option>
											<option value="this_month">This month</option>
											<option value="last_month">Last month</option>
										</select>			
									</div>
									<div class="title">Sales Overview</div>
								</div><!-- /.toolbar -->
							</div>
							<div class="divider theme ml10 mr20"></div>
							<div class="card-block pt20 mt14">
								<div class="row">
									<div class="col-sm-9">
										<h4 class="text-center">Sales Funnel <small>For 1/20/2016 - 1/26/2016</small></h4>
										<div class="funnel color-scale mt20">							
											<div class="funnel-brick">
												<div class="value">41026</div>
												<div class="key">Visitors</div>
											</div>

											<div class="funnel-brick">
												<div class="value">32681</div>
												<div class="key">Visit product pages</div>
											</div>

											<div class="funnel-brick">
												<div class="value">14062</div>
												<div class="key">Product in cart</div>
											</div>

											<div class="funnel-brick">
												<div class="value">8409</div>
												<div class="key">Sales</div>
											</div>

											<div class="funnel-brick">
												<div class="value">3064</div>
												<div class="key">Cross-sales</div>
											</div>
										</div><!-- /.funnel -->					
									</div>

									<div class="col-sm-3 hidden-xs">
										<h4>This Week</h4>

										<h5 class="mt20">Conversion</h5>
										<p class="text-title ">12.8%</p>
										<h6 class="sub-text">vs last week</h6>
										<p class="text-title">3.6%<i class="mdi mdi-trending-up medium text-green ml6"></i></p>

										<div class="divider mt10"></div>

										<h5 class="mt10">Revenue</h5>
										<p class="text-title">$38.423</p>
										<h6 class="sub-text">vs last week</h6>
										<p class="text-title">1.4%<i class="mdi mdi-trending-up medium text-green ml6"></i></p>
									</div>
								</div>
								<div class="p20 pt30">
											<h4 class="mb14">Monthly Targets</h4>
											<h5>Sales Forecast This Month <span class="pull-right">68% Done</span></h5>
											<div class="progress">
												<div class="progress-bar theme" style="width: 68%"></div>
											</div>

											<h5 class="mt10">Revenue Forecast This Month <span class="pull-right">76% Done</span></h5>
											<div class="progress">
												<div class="progress-bar theme" style="width: 76%"></div>
											</div>
										</div>
								<div class="card-block">
				        			<a href="#:;" class="btn-circle fixed-action-btn theme-accent waves-effect waves-light"><i class="mdi mdi-swap-vertical mdi-rotate-45 medium bottom activator"></i></a> 
				        		</div>
							</div><!-- /.card-block -->

							<div class="card-reveal">
					            <span class="card-title mb20">Sales By Product<i class="btn-close"></i></span>

					            <table class="table-striped">
				                    <tr>
				                        <th>Product</th>
				                        <th>Type</th>
				                        <th>Sales</th>
				                        <th>Revenue</th>
				                    </tr>
				                    <tr>
				                        <td>Games</td>
				                        <td>FIFA 16</td>
				                        <td>136</td>
				                        <td>$ 6050</td>
				                    </tr>
				                    <tr>
				                        <td>Headset</td>
				                        <td>Logitech Gaming</td>
				                        <td>109</td>
				                        <td>$ 812</td>
				                    </tr>
				                    <tr>
				                        <td>Tablet</td>
				                        <td>Samsung 16GB</td>
				                        <td>84</td>
				                        <td>$ 21.480</td>
				                    </tr>                   
				                    <tr>
				                        <td>Tablet</td>
				                        <td>Apple 16GB</td>
				                        <td>36</td>
				                        <td>$ 12.600</td>
				                    </tr>
				                    <tr>
				                        <td>Webcam</td>
				                        <td>Trust 4412</td>
				                        <td>18</td>
				                        <td>$ 360</td>
				                    </tr>
				                    <tr>
				                        <td>XBOX ONE</td>
				                        <td>1 TB</td>
				                        <td>11</td>
				                        <td>$ 4172</td>
				                    </tr>
				                    <tr>
				                        <td>Playstation4</td>
				                        <td>1 TB + 2 consoles</td>
				                        <td>8</td>
				                        <td>$ 3012</td>
				                    </tr>
				                </table>
					        </div><!-- /.card-reveal -->
						</div><!-- /.card -->
					</div><!-- /.col- -->
				</div><!-- /.row -->

				<div class="toolbar-parent mt40">
					<div class="mb20 pl20">
						<div class="toolbar">			
							<div class="pull-right">								
								<select class="selectpicker mr12" data-width="auto">
									<option value="this_week">This week</option>
									<option value="last_week">Last week</option>
									<option value="this_month">This month</option>
									<option value="last_month">Last month</option>
								</select>
								<a href="#:;" class="icon action toolbar-fullscreen"></a>			
							</div>
							<div class="title">Sales</div>
						</div>
						<div class="divider theme ml12 mr12"></div>
					</div>
					<div class="p20 toolbar-body">
						<div class="row">
							<div class="col-md-6">
								<button id="chartTypeBtn" class="btn-flat btn-sm pull-right bar-chart">Area Chart</button>
								<div id="bar-chart"></div>
							</div>

							<div class="col-md-6">
								<div class="row sub-charts">
									<div class="col-sm-6">
										<span class="sc-value">1236</span>
										<p class="sc-key">Quotes</p>
										<div id="chartQuotes" style="height: 80px"></div>
									</div>

									<div class="col-sm-6">
										<span class="sc-value">456</span>
										<p class="sc-key">Sales</p>
										<div id="chartSales" style="height: 80px"></div>
									</div>

									<div class="col-sm-6 mt12">
										<span class="sc-value">86</span>
										<p class="sc-key">Renewals</p>
										<div id="chartRenewals" style="height: 80px"></div>
									</div>

									<div class="col-sm-6 mt12">
										<span class="sc-value">21</span>
										<p class="sc-key">Cross sales</p>
										<div id="chartCrossSell" style="height: 80px"></div>
									</div>
								</div>
							</div><!-- /.col- -->
						</div><!-- /.row -->
					</div><!-- /.card-block -->
				</div><!-- /.card -->

				<div class="fixed-action-btn opacity-8" style="bottom: 30px; right: 24px;">
					<a class="btn-circle theme waves-effect waves-light modal-trigger" data-target="#actionsModal" data-toggle="modal"><i class="mdi mdi-plus"></i></a>
				</div>

				<!-- Bottom sheet modal structure -->
				<div id="actionsModal" class="modal bs-masonry-grid">
					<div class="modal-dialog bottom-sheet" >
						<div class="modal-content p20 pt0">				
							<div class="row">
								<div class="modal-header">
									<button class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>	
								</div>			
								<div class="col-xs-3 col-sm-2 col-md-1 text-center">
									<a href="inbox.html" class="btn-flat btn-block btn-sm">
										<i class="icon large action text-amber mdi mdi-email mt8"></i>
										<h6>Mail</h6>
									</a>
								</div>

								<div class="col-xs-3 col-sm-2 col-md-1 text-center">
									<a href="gallery.html" class="btn-flat block btn-sm">
										<i class="icon large action text-blue-dark mdi mdi-camera mt8"></i>
										<h6>Images</h6>
									</a>
								</div>

								<div class="col-xs-3 col-sm-2 col-md-1 text-center">
									<a href="#!" class="btn-flat block btn-sm">
										<i class="icon large action text-red mdi mdi-upload mt8"></i>
										<h6>Upload</h6>
									</a>
								</div>			

								<div class="col-xs-3 col-sm-2 col-md-1 text-center">
									<a href="#!" class="btn-flat block btn-sm">
										<i class="icon large action text-purple mdi mdi-account-plus mt8"></i>
										<h6>Contact</h6>
									</a>
								</div>						
							</div><!-- /.toolbar -->		
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			</div><!-- /.page-content -->
		</div><!-- /.container-fluid -->

	<!-- =========================================================== -->
	<!-- End page content  -->
	<!-- =========================================================== -->		

		<footer class="page-footer toolbar">
        	<p class="hidden-xs pull-left pl20 pr12">Follow us</p>
			<a href="#!"><i class="icon action mdi mdi-twitter"></i></a>
			<a href="#!"><i class="icon action mdi mdi-facebook"></i></a>
			<a href="#!"><i class="icon action mdi mdi-linkedin"></i></a>
        	<p class="pull-right pr20">© 2016 YourApp</p>
		</footer>
	</section> <!-- /.content-wrapper -->
@endsection
		
@section('footerSection')

<script>
	$("#dashboard_sidebar_a_id").addClass('active');
</script>
@endsection