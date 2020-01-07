
<!DOCTYPE html>
<html>
<head>
  <title>Template</title>
</head>
<body>
  <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tbody><tr>
                    <td align="center" bgcolor="#f6f6f6">
                        <table style="margin:0 10px" border="0" cellpadding="0" cellspacing="0" width="640">
                            <tbody><tr><td height="20" width="640"></td></tr>

                               
                                <tr><td bgcolor="#ffffff" height="30" width="640"></td></tr>
                                

                                <tr>
                                    <td bgcolor="#ffffff" width="640">
                                        <table border="0" cellpadding="0" cellspacing="0" width="640">
                                            <tbody>
                                                <tr>
                                                    <td width="30"></td>
                                                    <td width="580">
                                                        <table border="0" cellpadding="0" cellspacing="0" width="580">
                                                            <tbody>
                                                               
                                                                <tr>
                                                                    <td width="580">
                                                                        <p style="font-size:16px;line-height:20px;color:#faa61a;font-weight:bold;margin-top:0px;margin-bottom:0px;font-family:Arial,Helvetica,Geneva,sans-serif;text-transform:capitalize" align="left">Dear {{$customer_data->name}},</p>
                                                                        <div style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;font-family:Arial,Helvetica,Geneva,sans-serif" align="left">
                                                                            <p style="text-align:justify;margin-top:8px;margin-bottom:0px">Thanks for your customaized package information!!
                                                                            </p>
                                                                            <p style="text-align:justify;margin-top:8px;margin-bottom:0px">Package Inormations along with the details!
                                                                            </p>
                                                                           
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr><td height="10" width="580"></td></tr>

                                                                <tr>
                                                                <td align="center" style="background-color:#faa61a;" width="640">
                                                                    <table border="0" cellpadding="0" cellspacing="0" width="640">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td width="30"></td>
                                                                                <td width="580">
                                                                                    <div style="color:#ffffff;font-family:Arial,Helvetica,Geneva,sans-serif;font-size:28px;text-align:center;margin-top:0px" align="center">
                                                                                        <p>
                                                                                        @php        
                                                                                            $package_data = CommonHelper::getPackageData($packageid);
                                                                                            @endphp                                                                         
                                                                                            <span>Your Package :{{ $package_data->package_name }}   
                                                                                            </span> 
                                                                                        </p>
                                                                                    </div>
                                                                                </td>
                                                                                <td width="30"></td>
                                                                            </tr>
                                                                            
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                                </tr>

                                                                <tr><td height="10" width="580"></td></tr>
                                                                
                                                            </tbody>
                                                        </table>

                                                        <p style="text-align:justify;margin-top:8px;margin-bottom:0px">Additional Charges : {{$package_data->additional_charges ? $package_data->additional_charges : ''}}
                                                                            </p>
                                                                            <p style="text-align:justify;margin-top:8px;margin-bottom:0px">Transportation Charges : {{$package_data->transport_charges ? $package_data->transport_charges : ''}}
                                                                            </p>
                                                                            <p style="text-align:justify;margin-top:8px;margin-bottom:0px">Total Amount : {{$package_data->total_amount ? $package_data->total_amount : ''}}
                                                                            </p>
                                                        
                                                        
                                                        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="580">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="580">
                                                                        <div style="color:#777777;padding-top:16px;padding-bottom:18px;border-top:1px solid #eaeaea;text-align:center">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                            
                                                                            <table border="0" cellpadding="0" cellspacing="0" width="580">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td width="580">
                                                                                            <div>
                                                                                            @php $website_dat = CommonHelper::getWebsiteDetails();
                                                                           
                                                                                              @endphp
                                                                                              <p style="color:#3e2e29;font-size:12px;font-weight:bold;margin-bottom:40px"> Address : {{ $website_dat->company_address_one ? $website_dat->company_address_one : '' }},{{ $website_dat->company_address_two ? $website_dat->company_address_two : '' }}
                                                                                                    
                                                                                                </p>   
                                                                                                <p> Website :  {{ $website_dat->company_website ? $website_dat->company_website : '' }}</p>   
                                                                                                <p> Email : {{ $website_dat->company_email ? $website_dat->company_email : '' }}</p>
                                                                                                <p> Phone :  {{ $website_dat->company_phone ? $website_dat->company_phone : '' }},</p>   
                                                                                                <br>
                                                                                                 <a href="http://www.lastminute.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.lastminute.com/&amp;source=gmail&amp;ust=1578391881259000&amp;usg=AFQjCNFBFGVlS1YVG2-1E0NKXDaWbdW12Q"> 
                                                                                                    Tours and Travels
                                                                                                </a>
                                                                                            
                                                                                                <p style="font-size:10px;color:rgb(130,130,130)">This e-mail may contain confidential and/or privileged information. If you are not the intended recipient (or have received this e-mail in error) please notify the sender immediately and destroy this e-mail. Any unauthorized copying, disclosure or distribution of the material in this e-mail is strictly forbidden and could be a crime.</p>
                                                                                                                                                                        </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr><td height="10" width="580"></td></tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr><td height="10" width="580"></td></tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </td>
                                                    <td width="30"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
</body>
</html>