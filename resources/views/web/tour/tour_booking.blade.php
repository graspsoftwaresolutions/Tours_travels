@extends('layouts.admin')
@section('headSection')
<link href="{{ asset('public/web-assets/css/steps.css') }}" rel="stylesheet" type="text/css">
<style>
			body{
				font-family: sans-serif !important;
			}
			#footer .widget-title {
				font-size: 20px;
				font-weight: bold;
				margin-bottom: 3.3rem;
				margin-top: 0;
				text-transform: uppercase;
			}
			.timeline_items li h3:before, .timeline_items:after, a.content_link:after {
    border-color: #2991d6;
}
.timeline_items li h3:before {
    content: "";
    width: 7px;
    height: 7px;
    border-width: 4px;
    border-style: solid;
    -webkit-border-radius: 100%;
    border-radius: 100%;
    position: absolute;
    left: 50%;
    top: 11px;
    margin-left: -8px;
    display: block;
    z-index: 1;
}


		</style>
@endsection

@section('main-content')

<!--========================= NEWSLETTER-1 ==========================-->
<section id="" class="section-padding ">
   <div class="container">
      <div class="row">
         <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <form id="wizard1" action="#" class="paper">
               <h3>Account</h3>
               <fieldset>
                  <div class="col-sm-8 col-sm-offset-1">
                     <h4 class="text-headline">Account Information</h4>
                     <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" required="">
                     </div>
                     <ul id="overall-summarya" class="list-group list-group-animation item-border">
                        <li class="list-group-item sort-handle">1 These list-group items are sortable.
                           <span class="callout-left amber"></span>
                        </li>
                        <li class="list-group-item sort-handle">2 It has support for touch devices.
                           <span class="callout-left blue-dark"></span>
                        </li>
                        <li class="list-group-item sort-handle">3 Just drag some elements around.
                           <span class="callout-left pink"></span>
                        </li>
                        <li class="list-group-item sort-handle">4 Save new order in localstorage.
                           <span class="callout-left purple"></span>
                        </li>
                     </ul>
                  </div>
                  <!-- /.col- -->
               </fieldset>
               <h3>Profile</h3>
               <fieldset>
                  <div class="col-sm-8 col-sm-offset-1">
                     <h4 class="text-headline">Profile Information</h4>
                     <!-- Button trigger modal -->
                     <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                     Launch demo modal
                     </button>
                     <!-- Modal -->
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                              </div>
                              <div class="modal-body">
                                 <ul id="listhotelsarea" style="list-style: none" class="list list-group list-group-animation item-border paper isinview">
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/6_201911280629471.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">new hotels</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Fitness facilities, Free Meal, Taxi Available</p>
                                                      <p class="sub-text mt10">Deluxe - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 10 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(6,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_6_1" type="button" onclick="return ConfirmHotel(6,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },1,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/7_20191128064351.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">muruganp</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Meal, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10"></p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 0 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(7,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_7_" type="button" onclick="" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/8_20191128065025.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">test</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Fitness facilities</p>
                                                      <p class="sub-text mt10"></p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 0 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(8,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_8_" type="button" onclick="" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/9_20191128065339.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">testerrer</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Taxi Available, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 100 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(9,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_9_2" type="button" onclick="return ConfirmHotel(9,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/12_20191128070501.png" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">demo bcc</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Taxi Available, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10">Deluxe - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 5 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(12,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_12_1" type="button" onclick="return ConfirmHotel(12,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },1,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/14_20191130110350.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">newmuruhgan</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10"></p>
                                                      <p class="sub-text mt10"></p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 0 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(14,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_14_" type="button" onclick="" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">tesste</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Free Meal, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 5 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(16,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_16_2" type="button" onclick="return ConfirmHotel(16,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">tertert</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Fitness facilities, Taxi Available</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 34 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(20,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_20_2" type="button" onclick="return ConfirmHotel(20,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">te</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 100 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(21,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_21_2" type="button" onclick="return ConfirmHotel(21,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/22_201912271055311.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">rtetret</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Free Meal</p>
                                                      <p class="sub-text mt10">Deluxe - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 5 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(22,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_22_1" type="button" onclick="return ConfirmHotel(22,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },1,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalone">
                                 Launch demo modal
                                 </button>
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="modal fade" id="myModalone" tabindex="-1" role="dialog" aria-labelledby="myModalLabelone">
                        <div class="modal-dialog modal-lg" role="document">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                              </div>
                              <div class="modal-body">
                                 <ul id="listhotelsarea" style="list-style: none" class="list list-group list-group-animation item-border paper isinview">
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/6_201911280629471.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">new hotels</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Fitness facilities, Free Meal, Taxi Available</p>
                                                      <p class="sub-text mt10">Deluxe - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 10 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(6,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_6_1" type="button" onclick="return ConfirmHotel(6,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },1,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/7_20191128064351.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">muruganp</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Meal, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10"></p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 0 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(7,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_7_" type="button" onclick="" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/8_20191128065025.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">test</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Fitness facilities</p>
                                                      <p class="sub-text mt10"></p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 0 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(8,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_8_" type="button" onclick="" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/9_20191128065339.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">testerrer</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Taxi Available, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 100 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(9,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_9_2" type="button" onclick="return ConfirmHotel(9,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/12_20191128070501.png" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">demo bcc</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Taxi Available, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10">Deluxe - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 5 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(12,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_12_1" type="button" onclick="return ConfirmHotel(12,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },1,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/14_20191130110350.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">newmuruhgan</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10"></p>
                                                      <p class="sub-text mt10"></p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 0 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(14,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_14_" type="button" onclick="" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">tesste</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Free Meal, Power Backup Facility - No power cut</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 5 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(16,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_16_2" type="button" onclick="return ConfirmHotel(16,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">tertert</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Fitness facilities, Taxi Available</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 34 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(20,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_20_2" type="button" onclick="return ConfirmHotel(20,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/public/assets/images/no_image.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">te</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi</p>
                                                      <p class="sub-text mt10">Premium - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 100 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(21,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_21_2" type="button" onclick="return ConfirmHotel(21,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },2,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                    <li class="list-group-item">
                                       <div class="card ">
                                          <div class="media">
                                             <div class="media-left media-img"> <a><img class="responsive-img" src="http://localhost/Tours_travels/storage/app/hotels/22_201912271055311.jpg" style="height: 130px;" alt="hotel Image"></a></div>
                                             <div class="media-body p8">
                                                <div class="row">
                                                   <div class="col-md-10">
                                                      <h4 class="media-heading name">rtetret</h4>
                                                      <p class="area">Sarawak - Bintulu</p>
                                                      <p class="sub-text mt10">Free Wifi, Free Meal</p>
                                                      <p class="sub-text mt10">Deluxe - 1</p>
                                                   </div>
                                                   <div class="col-md-2">
                                                      <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> 5 more</p>
                                                      <button type="button" id="viewhotelid" onclick="return ViewHotelDetails(22,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' })" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_22_1" type="button" onclick="return ConfirmHotel(22,3,{  cityid: 3,  stateid: 1, cityname: 'Bintulu', statename: 'Sarawak' , cityimage: '1575531388.jpg' },1,0)" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> 
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.col- -->
               </fieldset>
               <h3>Subscription</h3>
               <fieldset>
                  <div class="col-sm-10 col-sm-offset-1">
                     <h4 class="text-headline">Subscription plan</h4>
                     <div class="column one column_timeline">
                        <ul id="overall-summary" class="timeline_items">
                           <li style="margin: 0!important;list-style: none!important; padding: 0 0 25px 55%; position: relative;background: url(http://be.beantownthemes.com/html/images/timeline_right.png) no-repeat top center;">
                              <h3><span style="
                                 font-size: 12px;
                                 line-height: 18px;
                                 display: inline-block;
                                 padding: 2px 5px;
                                 -webkit-border-radius: 4px;
                                 border-radius: 4px;
                                 position: absolute;
                                 right: 55%;
                                 top: 8px;
                                 ">29.12.2013</span>Vitae adipiscing turpis aen</h3>
                              <div class="desc" style="position: relative;
                                 font-size: 15px;
                                 line-height: 31px;">
                                 Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum stie id viverra.
                              </div>
                           </li>
                           <li style="margin: 0!important;list-style: none!important; padding: 0 0 25px 55%; position: relative;">
                              <h3><span style="
                                 font-size: 12px;
                                 line-height: 18px;
                                 display: inline-block;
                                 padding: 2px 5px;
                                 -webkit-border-radius: 4px;
                                 border-radius: 4px;
                                 position: absolute;
                                 right: 55%;
                                 top: 8px;
                                 ">29.12.2014</span>Vitae adipiscing turpis aen</h3>
                              <div class="desc" style="position: relative;
                                 font-size: 15px;
                                 line-height: 31px;">
                                 Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum stie id viverra.
                              </div>
                           </li>
                           <li style="margin: 0!important;list-style: none!important; padding: 0 0 25px 55%; position: relative;">
                              <h3><span style="
                                 font-size: 12px;
                                 line-height: 18px;
                                 display: inline-block;
                                 padding: 2px 5px;
                                 -webkit-border-radius: 4px;
                                 border-radius: 4px;
                                 position: absolute;
                                 right: 55%;
                                 top: 8px;
                                 ">29.12.2015</span>Vitae adipiscing turpis aen</h3>
                              <div class="desc" style="position: relative;
                                 font-size: 15px;
                                 line-height: 31px;">
                                 Vitae adipiscing turpis. Aenean ligula nibh, molestie id viverra a, dapibus at dolor. In iaculis viverra neque, ac eleifend ante lobortis id. In viverra ipsum stie id viverra.
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <!-- /.col- -->
               </fieldset>
               <h3>Finish</h3>
               <fieldset>
                  <div class="col-sm-8 col-sm-offset-1">
                     <div class="text-headline">Terms and Conditions</div>
                     <div class="form-group mt40">
                        <input id="acceptTerms1" name="acceptTerms1" type="checkbox"> <label for="acceptTerms1" class="text-subhead sub-text">I agree with the Terms and Conditions.</label>        
                     </div>
                     <!-- /.form-group -->
                  </div>
                  <!-- /.col- -->
               </fieldset>
            </form>
         </div>
         <!-- end columns -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container -->
</section>
<!-- end newsletter-1 -->

@endsection
@section('footerSection')
<script src="{{ asset('public/web-assets/js/jquery.steps.js') }}"></script>
<script src="{{ asset('public/web-assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/web-assets/js/jquery.dragsort.js') }}"></script>
<script type="text/javascript">
            var form = $("#wizard1").show();
             
            form.steps({
                headerTag: "h3",
                bodyTag: "fieldset",
                transitionEffect: "slideLeft",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Allways allow previous action even if the current form is not valid!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }
                    // Forbid next action on "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age-2").val()) < 18)
                    {
                        return false;
                    }
                    // Needed in some cases if the user went back (clean up)
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        form.find(".body:eq(" + newIndex + ") label.error").remove();
                        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
                    }
                    form.validate().settings.ignore = ":disabled,:hidden";
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Used to skip the "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
                    {
                        form.steps("next");
                    }
                    // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        form.steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    form.validate().settings.ignore = ":disabled";
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    alert("Submitted!");
                }
            }).validate({
                errorPlacement: function errorPlacement(error, element) { element.after(error); },
                rules: {
                    confirm: {
                        equalTo: "#password-2"
                    }
                }
            });
            $("#overall-summary").dragsort({
                dragEnd: saveOrder,
            });
             function saveOrder() {
                alert('ok');
             }
        </script>
@endsection