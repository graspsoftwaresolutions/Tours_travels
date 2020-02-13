<html>
	<head>
		<title>Email</title>
	</head>
	<div style="width:900px;margin: 0 auto;border: 1px solid #c3bbbb;">
		<table width="100%;" style="text-align:center;font-weight:bold;font-size:23px;background:#faa61a;color:#fff;">
			<tr>
				<td >Customer Information from Tours and Travels</td>
			</tr>
		</table>
		<div style="background:#e6e4e1">
			<br>
			<table>
				<tr>
					<td style="font-weight:bold;font-size: 20px;padding-left: 15px;">Hi there,</td>
				</tr>
				
				<tr>
					<td style="font-size: 18px;padding-left: 28px;">Enquiry from customer</td>
				</tr>
				<tr>
					<td style="font-size: 18px;padding-left: 28px;">Customer Information</td>
				</tr>
			</table>
			<br>
			<table style="font-size: 18px;padding-left: 5%;">
				<tr>
					<td style="font-weight:bold;">Name &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: &nbsp; &nbsp;&nbsp;</td>
					<td>{{ $details['name'] ? $details['name'] : '' }}</td>
				</tr>
				<tr>
					<td style="font-weight:bold;">Email &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;:&nbsp; &nbsp;&nbsp; </td>
					<td>{{ $details['email']  ? $details['email'] : ''}}</td>
				</tr>
				<tr>
					<td style="font-weight:bold;">Type &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; :&nbsp; &nbsp;&nbsp; </td>
					<td> {{ $details['type'] ? $details['type']  : '' }}</td>
				</tr>
				<tr>
					<td style="font-weight:bold;">Phone &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; : &nbsp; &nbsp;&nbsp;</td>
					<td>{{ $details['phone'] ? $details['phone'] : '' }}</td>
				</tr>
				<tr>
					<td style="font-weight:bold;">Address &nbsp; &nbsp;&nbsp; :&nbsp; &nbsp;&nbsp;</td>
					<td>{{ $details['address'] ? $details['address'] : '' }}</td>
				</tr>
				<tr>
					<td style="font-weight:bold;">Message &nbsp; &nbsp; :&nbsp; &nbsp;&nbsp; </td>
					<td> {{ $details['message'] ? $details['message'] : '' }} </td>
				</tr>
        
			</table>
  @php 
                    if($details['package']!='')
                    {
                      $package_name = CommonHelper::getPackageName($details['package']); 
                    
                    if(count($package_name))
                    {
                      @endphp
                      <p>Package Details</p>
                      <table border="1" style='width=50%;'>
                        <tr>
                            <th> Packages Name </th>
                        </tr>
                        <tbody>
                            @foreach($package_name as $values)
                            <tr>
                                <td> {{$values->package_name}} </td>
                            </tr>
                            @endforeach
                            </tbody>
                            </table>
                          @php
                        }
                    }
                        @endphp
                        <br>
			<br>
		</div>
	</div>
</html>