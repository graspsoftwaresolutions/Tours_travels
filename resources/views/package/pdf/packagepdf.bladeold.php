<!DOCTYPE html>
<html lang="en">
   <head>
      <style>
         body{
         margin:0px;
         padding:0px;
         }
         @page {
    margin:0px;
    padding:0px;    
   }
   label{
      font-size:10px !important;
      font-weight:550;
   }
   p{
     text-align:justify;
   }
   #sub_deposit tr td{
    border:1px solid grey;
  
   }
      </style>
      <title>Package</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
<body style="margin:0px !important;padding:10px !important;">
   <div class="container">
   <div class="row">
   @php $company_data = $website_data[0]; 
   		$package = $package_data[0];
   @endphp
   <div class="col-md-12">
      <div class="row">
      <div class="col-md-12">
      <div class="row">&nbsp;</div>
	  <div style="width:80%;margin:0 auto;">
		<a style="width:10%;float:left;padding:10px !important;" href="index.html"><img src="{{ asset('public/assets/images/website_logo/'.$company_data->company_logo) }}" style="width:70px;height:70px;xmargin-top:20px;"></a>
		<h1 style="text-align:center;width:90%;float:left;color:#439fc2">{{$company_data->company_name}}</h1>
		<h2 style="text-align:center;"><b> {{$package->package_name}}</b> </h2>	
		</div>
		<table id="datatable-master" class="table-datatable dt-responsive table-striped table-hover">
                <thead>
				<tr>
					<th width="20%">From Place</th>
					<th width="20%">To Place </th>
				</tr>
			</thead>                
		</table>
      
	 
     
 
    </div>
    </div>
 </div>
  </div> </div>

</body>
		</html>