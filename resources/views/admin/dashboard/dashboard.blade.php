@extends('admin.layouts.admin')
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
				<!--ul class="breadcrumbs">
					<li>Dashboard</li>
					
				</ul-->
			</div>

		</div><!-- /.container-fluid -->

	<!-- =========================================================== -->
	<!-- End page content  -->
	<!-- =========================================================== -->		

		<!--footer class="page-footer toolbar">
        	<p class="hidden-xs pull-left pl20 pr12">Follow us</p>
			<a href="#!"><i class="icon action mdi mdi-twitter"></i></a>
			<a href="#!"><i class="icon action mdi mdi-facebook"></i></a>
			<a href="#!"><i class="icon action mdi mdi-linkedin"></i></a>
        	<p class="pull-right pr20">© 2016 YourApp</p>
		</footer-->
	</section> <!-- /.content-wrapper -->
@endsection
		
@section('footerSection')

<script>
	$("#dashboard_sidebar_li_id").addClass('active');
</script>
@endsection