<html>
	<head>
	<title>Booking Invoice</title>
	</head>
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
					<td style="background:#f7941d; padding: 20px;"></td>
				</tr>
			</table>
			<br>
			<table width="100%">
				<tr>
					<td style="text-align: center;font-weight: bold;">THANK YOU FOR CHOOSING TO</td>
				</tr>
			</table>
			<table width="100%" style="text-align:center;">
				<tr>
					<td colspan="1" style="padding-left: 192px;"><img src="{{ $message->embed(storage_path() . '/app/website/'.$website_dat->company_logo) }}" alt="logo" width="80" height="60"></td>
					<td colspan="1" style="padding-right: 197px;"><span style="color: #f7941d;font-size: 50px;font-weight: bold;    ">{{$arr[0]}}</span> 
						<br> 
						<span style="background: #f7941d; color: #fff;font-weight: bold; font-size: 13px;">{{$str}}</span>
					</td>
				</tr>
			</table>
			<br>
			<table width="100%"
				<tr>
					<td><center><img src="{{ $message->embed(public_path() . '/assets/images/con_img.png') }}" style="width:25%;" height="200"></center></td>
				</tr>
			</table>
			<br>
			<table width="100%">
				<tr>
					<td style="text-align: center;font-weight: bold;">YOUR BOOKING HAS BEEN SUBMITTED,</td>
				</tr>
			</table>
			<br>
			<table width="100%">
				<tr>
					<td style="text-align: center;color: #ff8b00;font-weight: bold;font-size:25px;">WE WILL CONFIRM</td>
				</tr>
			</table>
			<br>
			<table width="100%">
				<tr>
					<td style="text-align: center;font-weight: bold;">YOUR BOOKING  WITH YOU SOON.</td>
				</tr>
			</table>
			<table>
				<tr> 
					<td><img src="{{ $message->embed(public_path() . '/assets/images/confirm.png') }}" width="650"></td>
				</tr>
				<tr>
					<td style="text-align:center;background:#ff8b00;padding-top: 40px;padding-bottom: 40px;color: #fff;font-weight:bold;font-size:13px;">HEREWITH WE HAVE ATTACHED <br> YOUR BOOKING INVOICE</td>
					<td></td>
				</tr>
			</table>
		</div>
	</body>
</html>





