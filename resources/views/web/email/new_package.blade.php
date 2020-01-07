
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

                                <tr>
                                    <td width="640" style="background-color:#a9a093;padding:20px 30px">
                                        <table border="0" cellpadding="0" cellspacing="0" width="640">
                                            <tbody>
                                                <tr>
                                                    <td align="left" valign="middle" width="350">
                                                        Reference Id : {{ $package_data->reference_number }}
                                                    </td>
                                                    <td width="30"></td>
                                                    <td align="right" valign="middle" width="255">
                                                        
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                </tr>
                                
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
                                                                    $night_count=0;
                                                                @endphp
                                                                <span>Your {{ $package_data->package_name }}

                                                                    <!-- @foreach($package_places as $key => $place)
                                                                        @php
                                                                         $sum_city_name = CommonHelper::getcityName($place->city_id);
                                                                         $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
                                                                        @endphp
                                                                        {{ $sum_city_name }}, 
                                                                    @endforeach
                                                                 Package -->
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
                                                                        <p style="font-size:16px;line-height:20px;color:#faa61a;font-weight:bold;margin-top:0px;margin-bottom:0px;font-family:Arial,Helvetica,Geneva,sans-serif;text-transform:capitalize" align="left">Dear {{ $userdata->name }}</p>
                                                                        <div style="font-size:13px;line-height:18px;color:#444444;margin-top:0px;font-family:Arial,Helvetica,Geneva,sans-serif" align="left">
                                                                            <p style="text-align:justify;margin-top:8px;margin-bottom:0px">The following is the
                                                                                itinerary that you wanted to plan for the subject vacation. The details
                                                                                of hotels, room types, meal plan, transportation, brief overview of the
                                                                                day wise schedule and pricing are shown in the following sections.
                                                                                Request you to take a look and let us know if there are any questions.
                                                                            </p>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr><td height="10" width="580"></td></tr>
                                                                
                                                                
                                                                <tr>
                                                                    <td width="580">
                                                                        <div style="font-size:13px;color:rgb(68,68,68);margin-top:0px;margin-bottom:8px;font-family:Arial,Helvetica,Geneva,sans-serif" align="left">
                                                                            <table>
                                                                                <tbody>
                                                                                <tr>
                                                                                    <td>No of nights</td>
                                                                                    <td>: {{ $night_count }}</td>
                                                                                    
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>No of persons</td>
                                                                                    <td>: {{ $package_data->adult_count }} adults, {{ $package_data->child_count }} children, {{ $package_data->infant_count }} infants</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Place </td>
                                                                                    <td>: 
                                                                                    @php
                                                                                        $night_count=0;
                                                                                    @endphp
                                                                                    <span>
                                                                                        @foreach($package_places as $key => $place)
                                                                                            @php
                                                                                            $sum_city_name = CommonHelper::getcityName($place->city_id);
                                                                                            $night_count = $place->nights_count>0 ? $night_count+$place->nights_count : $night_count;
                                                                                            @endphp
                                                                                            {{ $sum_city_name }}, 
                                                                                        @endforeach
                                                                                    Package </span>
                                                                                </td>
                                                                                </tr>
                                                                            </tbody></table>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr><td height="10" width="580"></td></tr>
                                                                
                                                            </tbody>
                                                        </table>
                                                       
                                                        <table border="0" cellpadding="0" cellspacing="0" width="580">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="580">
                                                                        <div>
                                                                        @php $website_dat = CommonHelper::getWebsiteDetails();
                                                                           
                                                                         @endphp
                                                                            <p style="color:#3e2e29;font-size:12px;font-weight:bold;margin-bottom:40px"> {{ $website_dat->company_address_one ? $website_dat->company_address_one : '' }},{{ $website_dat->company_address_two ? $website_dat->company_address_two : '' }}
                                                                                <br>  
                                                                                {{ $website_dat->company_website ? $website_dat->company_website : '' }},{{ $website_dat->company_email ? $website_dat->company_email : '' }},{{ $website_dat->company_phone ? $website_dat->company_phone : '' }},
                                                                            </p>                                                                                                                                                       <a href="http://www.lastminute.com/" target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.lastminute.com/&amp;source=gmail&amp;ust=1578391881259000&amp;usg=AFQjCNFBFGVlS1YVG2-1E0NKXDaWbdW12Q">
                                                                                Tours and Travels
                                                                            </a>
                                                                           
                                                                            <p style="font-size:10px;color:rgb(130,130,130)">This e-mail may contain confidential and/or privileged information. If you are not the intended recipient (or have received this e-mail in error) please notify the sender immediately and destroy this e-mail. Any unauthorized copying, disclosure or distribution of the material in this e-mail is strictly forbidden and could be a crime.</p>
                                                                                                                                                    </div>
                                                                    </td>
                                                                </tr>
                                                                <tr><td height="10" width="580"></td></tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                        
                                                        <table border="0" cellpadding="0" cellspacing="0" width="580">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="580">
                                                                        <div style="color:#777777;padding-top:16px;padding-bottom:18px;border-top:1px solid #eaeaea;text-align:center">
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