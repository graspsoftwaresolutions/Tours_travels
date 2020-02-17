
<html>
	<head>
		<title>Enquiry</title>
	</head>
	<style>
	 .button {
	  display: inline-block;
	  padding: 5px 18px;
	  font-size: 13px;
	  cursor: pointer;
	  text-align: center;
	  text-decoration: none;
	  outline: none;
	  color: #fff;
	  background-color: #55aaff;
	  border: none;
	  border-radius: 15px;
	  box-shadow: 0 3px #999;
	}

	.button:hover {background-color: #55aaff}

	.button:active {
	  background-color: #55aaff;
	  box-shadow: 0 3px #666;
	  transform: translateY(4px);
	}	
	
	#border {
		border-spacing: 0px;
	}
	</style>
  @php $logo = CommonHelper::getlogo();  @endphp
  @php $website_dat = CommonHelper::getWebsiteDetails();
  $myvalue = $website_dat->company_name;
  $arr = explode(' ',trim($myvalue));
  $variable = $website_dat->company_name;
  $str = explode(' ', $variable);
  $str = array_slice($str, 1);
  $str = implode(' ', $str);

   @endphp
	<body>
		<div style="width:650px;margin: 0 auto;border: 0px solid #c3bbbb;">
			<table width="100%">
				<tr>              
					<td colspan="1" style="width: 10%"><img src="{{ $message->embed(storage_path() . '/app/website/'.$website_dat->company_logo) }}" alt="logo" width="80" height="60"></td>
					<td colspan="1" style="width:23%;"><span style="color: #f7941d;font-size: 50px;font-weight: bold;">{{$arr[0]}}</span> 
						<br> 
						<span style="background: #f7941d; color: #fff;font-weight: bold; font-size: 13px;">{{$str}}</span>
					</td>
					<td colspan="1" style=" background: #f7941d; text-align: center;font-weight: bold;color: #fff;font-size: 50px;">Thank You!</td>
			</tr>                       
			</table>
			<br>
			<table width="100%">
				<tr>                          
					<td colspan="1"><img src="{{ $message->embed(public_path() . '/web-assets/images/enquiry/image.jpg') }}"  width="120" height="100" style="padding-right: 30px;padding-left: 45px;"></td>
					<td colspan="1"><span style="font-weight: bold;font-size: 18px;">YOUR ENQUIRY HAS BEEN SUBMITTED!</span>
						<br><img src="{{ $message->embed(public_path() . '/web-assets/images/enquiry/product-enquiry.jpg') }}" width="354" height="50">
						<br><span style="font-weight: bold;font-size: 17px;">WE WILL GET IN TOUCH WITH YOU SOON.</span>
					</td>  
				</tr>
			</table>
			<br>
			<table width="100%" border="0" id="border">
				<tr>
					<td colspan="2">
					<p style="position:absolute; right:400px; top:370px; z-index:9999; font-weight: bold;">NORMALLY IT TOOK 8-16 HOURS <br> TO RESPOND TO ANY ENQUIRY.</p>
					<P style="position: absolute;right: 416px;top: 445px;z-index: 9999;font-weight: bold;">YOU'LL BE NOTIFY BY E-MAIL <br> WHEN WE ANSWER TO YOUR <br> ENQUIRY.</P>
					<img src="{{ $message->embed(public_path() . '/web-assets/images/enquiry/download1.jfif') }}" style="width:100%;border:1px solid #788895;" height="400">
					</td>     
				</tr>
			</table>
			<table width="100%" style="background:#f7941d;text-align:center;color:#fff;font-weight:bolder;font-size: 12px;">
				<tr>
					<td colspan="1" style="padding-top: 20px;padding-bottom: 20px;">PLEASE
					
						<button class="button">Register</button>
					
					WITH US TO SERVE YOU BETTER.</td>
				</tr>
			</table>
		</div>
	</body>
</html>