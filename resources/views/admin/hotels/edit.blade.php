@extends('admin.layouts.admin')
@section('headSection')
<link class="rtl_switch_page_css" href="{{ asset('public/assets/dist/css/plugins/steps.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/plugins/summernote.css') }}">
<link rel="stylesheet" href="{{ asset('public/assets/dist/css/sweet_alert.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  .form-group {
    margin-bottom: 10px !important;
  }
 /* .bootstrap-select:not([class*=col-]):not([class*=form-control]):not(.input-group-btn) {
    width: 250px !important;
  }*/
  .error{
     color: #A94442 !important;
  }
  .button-close{
      z-index: 999;
      position: absolute;
      top: -40px;
      left: 62px;
      /* opacity: 0; */
      font-size: 13px;
      min-width: 100%;
      max-width: 100%;
      padding: 2em 1em;
      text-align: center;
      color: rgba(0, 0, 0, 0.9);
      line-height: 150%;
  }
  .dropdown-menu li {
    padding: 0 20px !important;
  }
  .textsize{
    border: 1px solid #9e9e9e;
    padding: 10px;
  }
</style>
@endsection

@section('main-content')	
	<section class="content-wrapper">

    <!-- =========================================================== -->
    <!-- Start page content  -->
    <!-- =========================================================== -->

        <div class="aside-panel"></div>

        <div class="container-fluid">           

            <div class="page-header">
                <h1>Tours and Travels</h1>
                <ul class="breadcrumbs">
                    <li>Masters</li>
                    <li>{{__('Edit Hotel') }}</li>
                </ul>
            </div> 
            @php
              $hotel_data = $data['hotel_data'];
              //dd($data['hotel_features']);
            @endphp         

            <div class="page-content">
                 @include('includes.messages')
                <div class="paper toolbar-parent mt10">
                   <form id="wizard1"  class="paper formValidate" method="post" action="{{ route('save.edithotel') }}" enctype="multipart/form-data">
                      @csrf
                      <input type="text" name="autoid" id="autoid" class="hide" value="{{ $hotel_data->id }}">
					    <h3>Detail</h3>
					    <fieldset>      
					 		
					 		<div class="col-sm-12">
					 			<h4 class="text-headline">Listing Information</h4>
					 			<p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>

						        
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="input-field label-float">
                                <input placeholder="Hotel Name" class="clearable" id="hotel_name" name="hotel_name" value="{{ $hotel_data->hotel_name }}" autofocus type="text">
                                <label for="hotel_name" class="fixed-label">{{__('Hotel Name') }}*</label>
                                <div class="input-highlight"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p class="no-margin em"></p>
                    </div>
                     <div class="col-md-12">
                        <p class="no-margin em"></p>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Select Amenities:</strong></label>
                          <div class="row"> 
                              @foreach($data['features_view'] as $value)
                              <div class="col-md-3">
                                   <div class="form-group">     
                                      <label class="checkbox-filled" for="amenities_{{ $value->id }}">
                                        <input type="checkbox" class="filled" @if(in_array($value->id, $data['hotel_features'])) checked @endif name="amenities[]" id="amenities_{{ $value->id }}" value="{{ $value->id }}">
                                        <i class="highlight"></i>
                                        {{ $value->amenities_name }}
                                    </label>
                                  </div>                       
                              </div>
                             
                               @endforeach
                               <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <div class="input-field label-float">
                                <input placeholder="Contact Name" class="clearable" id="contact_name" name="contact_name" value="{{ $hotel_data->contact_name }}" type="text">
                                <label for="contact_name" class="fixed-label">{{__('Contact Name') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                      </div>

                       <div class="col-md-4">
                          <div class="form-group">
                              <div class="input-field label-float">
                                <input placeholder="Contact Email" class="clearable" id="contact_email" name="contact_email" value="{{ $hotel_data->contact_email }}" type="text">
                                <label for="contact_email" class="fixed-label">{{__('Contact Email') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="select-row form-group">
                              <label for="country_id" class="block">{{__('Country Name') }}</label>                 

                              <!-- To validate the select add class "select-validate" -->     
                              <select id="country_id" name="country_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                  <option value="">{{__('Select country')}}</option>
                                  @php
                                  $defcountry = $hotel_data->country_id;
                                  @endphp
                                  @foreach($data['country_view'] as $value)
                                  <option value="{{$value->id}}" @if($defcountry==$value->id) selected @endif >
                                      {{$value->country_name}}</option>
                                  @endforeach
                              </select>        
                               <div class="input-highlight"></div>                       
                          </div><!-- /.form-group -->
                      </div>
                        @php
                          $statelist = CommonHelper::getStateList($defcountry);
                        @endphp
                      <div class="col-md-4">
                          <div class="select-row form-group">
                              <label for="state_id" class="block">{{__('State Name') }}</label>                 

                              <!-- To validate the select add class "select-validate" -->     
                              <select id="state_id" name="state_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                   <option value="" selected="">{{__('Select State') }}
                                   </option>
                                  @foreach ($statelist as $state)
                                  <option value="{{ $state->id }}" @if($hotel_data->state_id==$state->id) selected @endif>{{ $state->state_name }}</option>
                                  @endforeach
                              </select>        
                               <div class="input-highlight"></div>                       
                          </div><!-- /.form-group -->
                      </div>
                         @php
                          $citylist = CommonHelper::getCityList($hotel_data->state_id);
                        @endphp
                       <div class="col-md-4">
                          <div class="select-row form-group">
                              <label for="city_id" class="block">{{__('City Name') }}</label>                 

                              <!-- To validate the select add class "select-validate" -->     
                              <select id="city_id" name="city_id" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                   <option value="" selected="">{{__('Select City') }}
                                   </option>
                                   @foreach ($citylist as $city)
                                  <option value="{{ $city->id }}" @if($hotel_data->city_id==$city->id) selected @endif>{{ $city->city_name }}</option>
                                  @endforeach
                              </select>        
                               <div class="input-highlight"></div>                       
                          </div><!-- /.form-group -->
                      </div>

                      <div class="col-md-4">
                         <div class="form-group">
                              <div class="input-field label-float">
                                <input placeholder="Address one" class="clearable" id="address_one" name="address_one" value="{{ $hotel_data->address_one }}" type="text">
                                <label for="address_one" class="fixed-label">{{__('Address one') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>       
                       <div class="col-md-4">
                         <div class="form-group">
                              <div class="input-field label-float">
                                <input placeholder="Address two" class="clearable" id="address_two" name="address_two" value="{{ $hotel_data->address_two }}" type="text">
                                <label for="address_two" class="fixed-label">{{__('Address two') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                      </div>
                      <div class="col-md-4">
                      <div class="select-row form-group">
                              <label for="state_id" class="block">{{__('No of Ratings') }}</label>  
                             
                              <select name="ratings" id='ratings' class="selectpicker select-validate" data-live-search="true" data-width="100%">
                              <option value='0'>Select Rating</option>
                                          <option value='1' @if($hotel_data->ratings==1) selected @endif>1</option>
                                          <option value='2' @if($hotel_data->ratings==2) selected @endif>2</option>
                                          <option value='3' @if($hotel_data->ratings==3) selected @endif>3</option>
                                          <option value='4' @if($hotel_data->ratings==4) selected @endif>4</option>
                                          <option value='5' @if($hotel_data->ratings==5) selected @endif>5</option>
                                        </select>
                                        <div class="input-highlight"></div>            
                          </div><!-- /.form-group -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for=""><strong>Overview: </strong></label>
                          <textarea name="overview" id="overview">{{ $hotel_data->overview }}</textarea>  
                          <p class="no-margin em"></p>
                        </div>
                      </div>
                    </div>


                   
                 
					    	</div><!-- /.col- -->

					    </fieldset>
					 
					    <h3>Room Type</h3>
					    <fieldset>

					    	<div class="col-sm-12">
						        <h4 class="text-headline">Hotel Room Details</h4>
						        <!-- <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p> -->
						        <div class="row">
                    <div class="col-sm-2">
    									  <div class="select-row form-group">
                        <label for="address_one" class="fixed-label"></label> 
                            <a class="btn"  class="btn theme modal-trigger" data-toggle="modal" data-target="#addHotelModal" title="Add" style="margin-top: 25px; background-color: #4a7885;color: white;">ADD HOTEL ROOM TYPE DETAILS</a>
                            <!-- <a class="btn" id="price_add" title="Add" style="margin-top: 25px; background-color: #4a7885;color: white;">ADD HOTEL ROOM TYPE DETAILS</a> -->
                        <!-- <a href="#" data-toggle="modal" title="Add" data-target="#masterModal">  <i class="fa fa-plus-circle" style="font-size: 22px; color: #ec415f;margin: 5px;"></i> </a>  -->
                             <div class="input-highlight"></div>                       
                        </div><!-- /.form-group -->
    									</div><!-- ./col- -->
									
							       </div><!-- /.row -->
                     <br></br> 
                      <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11 mt11">
                            <div class="paper">
                              <table id="ExclusionTable" class="table-centered table-hover paper update-table">
                                  <thead>
                                    <tr>
                                        <th>Room Type</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody id="exampleTable">
                                  @php $Slno = 1; @endphp
                                    @foreach($data['hote_roomtype_data'] as $val)
                                     <tr>
                                        <td>
                                        <input type="hidden" name="roomtypeid_db[]" value="{{$val->roomtypeid}}">
                                        <input type="hidden" name="edithotelroomtypeid[]" id="hotelroomtypeid_{{$val->roomtypeid}}" value="{{$val->roomtype_id}}">
                                        <span id="hotelroom_{{$val->roomtypeid}}">{{$val->room_type}}</span>
                                        </td>
                                        <td>
                                        <!-- <input type="hidden" name="" value="{{$val->price}}"> -->
                                            <input type="hidden"  name="editrromtypeprice[]" id="roomprice_{{$val->roomtypeid}}" value="{{$val->price}}">
                                            <span  id="hotelprice_{{$val->roomtypeid}}">{{$val->price}} </span>  
                                        </td>
                                        <td class="hide">
                                            <span id="hotelroomdescription_{{$val->roomtypeid}}" class="hide">{{$val->description}}</span>
                                            <input type="hidden"  name="editdescription[]" id="editdescription_{{$val->roomtypeid}}" value="{{$val->description}}">                                           
                                        <td>
                                        <button type="button" onClick='showeditForm({{$val->roomtypeid}});' class="btn btn-sm blue waves-effect waves-circle waves-light roomtypeidvalue"><i class="mdi mdi-lead-pencil"></i></button>
                                        <button type="button" style="margin-left: 10px;" class="btn btn-sm red waves-effect waves-circle waves-light delete_roomtype_db" data-id="{{$val->roomtypeid}}" title="delete"><i class="mdi mdi-delete"></i></td>
                                     </tr>
                                     @php $Slno++; @endphp
                                    @endforeach
                                  </tbody>
                              </table>
                            </div>
                        </div>
                        </div><!-- ./col- -->
                          <br></br>
                      <div class="row">
                        <div class="col-sm-12">
                           <div class="form-group">
                              <div class="input-field label-float">
                                <textarea id="listing_descriptions" name="listing_descriptions"  class="textarea-auto-resize">{{ $hotel_data->listing_descriptions}}</textarea>
                                
                                <label for="listing_descriptions" class="fixed-label">{{__('Listing Descriptions') }}</label>
                                <div class="input-highlight"></div>
                            </div>
                          </div>
                        </div><!-- ./col- -->
                  
                     </div><!-- /.row -->
                       </br> </br> </br> </br>
					        </div><!-- /.col- -->
					    </fieldset>	 
					    <h3>Photo Gallery</h3>
					    <fieldset>
					    	<div class="col-sm-12">
                    <h4 class="text-headline">Photo Gallery</h4>
                    <p>Airtport Hotels The Right Way To Start A Short Break Holiday</p>
					        	</br>
                    <div class="col-md-12">
                         <div class="file-field input-field">
                          <div class="btn theme">
                            <span>File</span>
                            <input type="file" name="hotel_images[]" id="hotel_images" multiple accept="image/*">
                          </div>
                          <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload one or more files">
                            <div class="input-highlight"></div>
                          </div>
                          </div><!-- /.input-field -->
                          </br>
                          <code>Note:  Max file size : 2MB, Max width*height : 1200*700px, File Type : .png, .jpg and .jpeg</code>
                           </br>
                    </br>
                    </div>
                   </br>
                    </br>                     
						    	 <div class="row">
                      <div class="divider theme ml14 mr14"></div> 
                      @foreach($data['hotel_images'] as $image)
                     
                      <div id="hotel_image_{{ $image->id }}" class="col-xs-12 col-sm-2 mt20">
                          <img class="responsive-img z-depth-1" data-action="zoom" src="{{ asset('storage/app/hotels/'.$image->image_name) }}" style="width:190px;height: 130px;" alt="">
                          <div class="button-close"> <button type="button" onclick="return DeleteImage({{ $image->id }})" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div>
                          <!--button type="button" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button-->
                      </div>
                      @endforeach
                  </div>
						    </div><!-- /.col- -->
					    </fieldset>
                          <!-- Default Modal -->
            <div id="addHotelModal" class="modal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header theme">
                            <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                            <h1 class="modal-title">Room Type Details</h1>
                        </div><!-- /.modal-header -->
                            @csrf
                            <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                            <label for="room_type" class="block fixed-label">{{__('Room Type') }}</label>                 
                                              <select id="room_type" name="room_type[]" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                                  <option value="" disabled="true">{{__('Select Room Type') }}
                                                  </option>
                                                    @foreach ($data['types_view'] as $type)
                                                    <option value="{{ $type->id }}">{{ $type->room_type }}</option>
                                                    @endforeach
                                              </select>     
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div><!-- ./col- -->
                                        <div class="col-sm-6">
                                                      <div class="select-row form-group">
                                                      <label for="address_one" class="fixed-label">{{__('Price') }}</label>   
                                                          <input placeholder="Price" class="clearable" id="price" type="text">             
                                                        <!-- To validate the select add class "select-validate" data-live-search="true"  -->     
                                                
                                                    <div class="input-highlight"></div>    
                                               </div>
                                          </div>
                                          <div class="col-sm-12">
                                                      <div class="select-row form-group">
                                                      <label for="address_one" class="fixed-label">{{__('Descriptions') }}</label>   
                                                      <textarea id="description"></textarea>            
                                                        <!-- To validate the select add class "select-validate" data-live-search="true"  -->     
                                                    <div class="input-highlight"></div>    
                                          </div>  </div>
                                          
                                    </div><!-- /.row -->
                                    <div class="row">
                                        
                                    </div>
                                
                               
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                                <button type="button" id="price_add" class="btn-flat waves-effect waves-theme">Save</button>
                            </div><!-- /.modal-footer -->
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Edit  Modal -->
            @php  @endphp
            <div id="myModal" class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header theme">
                            <button type="button" class="btn-close modal-close" data-dismiss="modal" aria-label="Close"></button>
                            <h1 class="modal-title">Edit Hotel Room Details</h1>
                        </div><!-- /.modal-header -->

                            <div class="modal-body">
                               <div class="col-sm-12">
                                    <input class=" roomautoid" id="roomid" name="roomid" type="hidden">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                            <label for="room_type" class="block fixed-label">{{__('Room Type') }}</label>                 
                                                <!-- To validate the select add class "select-validate" data-live-search="true"  -->     
                                                <select id="edit_room_type" name="room_type" class="selectpicker select-validate" data-live-search="true" data-width="100%">
                                                    <option value="" disabled="true">{{__('Select Room Type') }}
                                                    </option>
                                                      @foreach($data['types_view'] as $type)
                                                      <option value="{{ $type->id }}">{{ $type->room_type }}</option>
                                                      @endforeach
                                                </select>
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div><!-- ./col- -->
                                        <div class="col-sm-6">
                                            <div class="input-field label-float">
                                                  <label for="address_one" class="fixed-label">{{__('Price') }}</label>   
                                                  <input placeholder="Price" class="clearable" id="edit_modal_price" name="price" type="text">
                                                <div class="input-highlight"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                                <label for=""><strong>Overview: </strong></label>
                                                <textarea id="editdescription" name="descript"></textarea>  
                                                <p class="no-margin em"></p>
                                          </div>
 
                                    </div><!-- /.row -->
                                </div><!-- /.row -->    
                            </div><!-- /.modal-body -->
                            <div class="modal-footer">
                                <button class="btn-flat waves-effect waves-theme" data-dismiss="modal">Close</button>
                                <button type="button" class="btn-flat waves-effect waves-theme saveMasterButton">Save</button>
                            </div><!-- /.modal-footer -->
                        
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
					 
					</form>
                </div>         
            </div><!-- /.page-content -->

            <a id="back-to-top" href="#" class="btn-circle theme back-to-top">
                <i class="mdi mdi-chevron-up medium"></i>
            </a>                
        </div><!-- /.container-fluid -->

      
       
    </section> <!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('public/assets/dist/js/plugins/wizard/jquery.steps.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/plugins/zoom/zoom.min.js') }}"></script>
<script src="{{ asset('public/assets/dist/js/external_sweet_alert.js') }}"></script>
<script>
	$("#hotel_sidebar_li_id").addClass('active');
  var form = $("#wizard1").show();
  function showeditForm(hotelroomtypeid) {
        $("#myModal").modal();
        var  url = "{{ url('/hotel_detail') }}?id="+hotelroomtypeid ;
       $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(result) {
          console.log(result.description);
          $('#edit_modal_price').val(result.price);
          var markupStr = result.description;
          $('#editdescription').summernote('code', markupStr);
          $('#edit_room_type').selectpicker('val', result.roomtype_id);
          $('#roomid').val(result.roomid);
        }
    });
    }

  $(document).ready(function() {

        $('.saveMasterButton').click(function () {
          var slno = 1;
          var autoid = $('#roomid').val();
          var price = $('#edit_modal_price').val();
          var roomtypeid = $('#edit_room_type').val();
          var room_name =$('#edit_room_type option:selected').html();
          var descrp = $('#editdescription').summernote('code');
          //alert(descrp);

          $('#hotelprice_'+autoid).text(price);
          $('#hotelroom_'+autoid).text(room_name);
          $('#hotelroomtypeid_'+autoid).val(roomtypeid);

          $('#hotelroomdescription_'+autoid).val(descrp);
          $('#editdescription_'+autoid).val(descrp);
          //alert(descrp);
          $('#roomprice_'+autoid).val(price);
          $('#myModal').modal('toggle');
          slno++;
          $('#editdescription_'+autoid).summernote({
            height: 300,   //set editable area's height
            placeholder: 'Write here...'
          });

        });
        $('#price_add').click(function(){
         //alert('hii');
        var room_type_id  =  $("#room_type").val();
        var room_name =$('#room_type option:selected').html();
        var price = $('#price').val();
        var room_type = $('#room_type').val();
        var slno=0;
        var price = $('#price').val();
        var description  = $('#description').val();

        if((room_type_id != '') &&  (price != '') )
        {
            var flag = 0;
            $("#ExclusionTable").find("tr").each(function () { //iterate through rows
              var td1 = $(this).find("td:eq(0)").text(); //get value of first td in row
              var td2 = $(this).find("td:eq(1)").text(); //get value of second td in row
              if ((room_name == td1 &&  price != '')) { //compare if test = td1 AND sample = td2
                  flag = 1; //raise flag if yes
              }
            });
            if (flag == 1) {
              swal("Error!", "Room Type is Already Exists!", "error");
            } else {
              $('#ExclusionTable tbody').append('<tr class="child" ><td>'+room_name+'<input type="hidden" id="inclu_name_'+slno+'" name="room_typ[]" value="'+room_type_id+'"></td><td>'+price+'<input type="hidden" id="price_'+slno+'" name="addprice[]" value="'+price+'"></td><td class="hide"><textarea name="description[]" class="hide" name="description[]" id="description_'+slno+'">'+description+'</textarea></td><td><button type="button"   class="btn btn-sm red waves-effect waves-circle waves-light removebutton" title="delete"><i class="mdi mdi-delete"></i></td></tr>');
             slno++;
             // swal("Success!", "Room Type is Added!", "success");
            }
            $('#addHotelModal').modal('toggle');
        }
        else{
          swal("Error!", "Please select room type and Enter price!", "error");
        }
        $('#price').val('');
        var empty = '';
        $('#description').summernote('code',empty);
       // $('#room_type').prop('selectedIndex',0);
      }); 
      $(document).on('click', 'button.removebutton', function () {
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {     
              $(this).closest('tr').remove();
              return true;
          } else {
              return false;
          }  
});
      });

// });
        $(document.body).on('click', '.delete_roomtype_db', function() {
          if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        var roomtype_id = $(this).data('id'); 
        var parrent = $(this).parents("tr");
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "{{ route('delete-roomtype-data') }}?roomtype_id=" + roomtype_id,
            success: function(res) {
                if (res) {
                    parrent.remove();
                    M.toast({
                        html: res.message
                    });
                } else {
                   return false;
                }
            }
        });
          }
    });
  form.steps({
      headerTag: "h3",
      bodyTag: "fieldset",
      onStepChanging: function (event, currentIndex, newIndex)
      {
          // Allways allow previous action even if the current form is not valid!
          if (currentIndex > newIndex)
          {
              return true;
          }
          // // Forbid next action on "Warning" step if the user is to young
          // if (newIndex === 3 && Number($("#age-2").val()) < 18)
          // {
          //     return true;
          // }
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
      onFinishing: function (event, currentIndex)
      {
        form.validate().settings.ignore = ":disabled";
          return form.valid();
      },
      onFinished: function (event, currentIndex)
      {
         $('#wizard1').trigger('submit');
         $("#wizard1").css('pointer-events','none');
         return true;
      }
  }).validate({
      rules: {
        'hotel_name': {
                required: true
            },
      },
      messages: {
            'hotel_name': {
                required: 'Please fill name.'
            }
        },
        errorElement: 'div',
    errorPlacement: function (error, element) {
      var placement = $(element).data('error');
      if (placement) {
        $(placement).append(error)
      } else {
        error.insertAfter(element);
      }
    },
  });
	// $("#wizard1").steps({
	//     headerTag: "h3",
	//     bodyTag: "fieldset"
	// });
  $('#overview').summernote({
    height: 300,   //set editable area's height
    placeholder: 'Write here...'
  });
  $('#listing_descriptions').summernote({
    height: 300,   //set editable area's height
    placeholder: 'Write here...'
  });
  
  $('#description').summernote({
    height: 100,   //set editable area's height
    placeholder: 'Write here...'
  });
  

  
  $(function() {
    $('select[name=country_id]').change(function() {
       // alert('ok');
        var url = "{{ url('get-state-list') }}" + '?country_id=' + $(this).val();

        $.get(url, function(data) {
            $('#state_id').empty('');
            $("#state_id").append("<option value=''>Select</option>");
            $("#state_id").selectpicker("refresh");
            //var select = $('form select[name=state_id]');

           // select.empty();
            //$("#state_id").append("<option value=''>Select</option>");
            $.each(data, function(key, value) {
                $("#state_id").append('<option value=' + value.id + '>' + value.state_name +
                    '</option>');
            });
             $("#state_id").selectpicker("refresh");
        });
    });

    $('select[name=state_id]').change(function() {
       // alert('ok');
        var url = "{{ url('get-cities-list') }}" + '?State_id=' + $(this).val();

        $.get(url, function(data) {
            $('#city_id').empty('');
            $("#city_id").append("<option value=''>Select</option>");
            $("#city_id").selectpicker("refresh");
            //var select = $('form select[name=state_id]');

           // select.empty();
            //$("#state_id").append("<option value=''>Select</option>");
            $.each(data, function(key, value) {
                $("#city_id").append('<option value=' + value.id + '>' + value.city_name +
                    '</option>');
            });
             $("#city_id").selectpicker("refresh");
        });
    });
});
  function DeleteImage(imageid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        var url = "{{ route('delete_hotel_image') }}" + '?image_id=' + imageid;
          $.ajax({
              url: url,
              type: "GET",
              success: function(result) {
                  if(result.status==1){
                    $("#hotel_image_"+imageid).remove();
                  }else{
                    alert('Failed to delete');
                  }
              }
          });
      }else{
        return false;
      }
      
  }
  function ConfirmDeletion() {
    if (confirm("{{ __('Are you sure you want to delete?') }}")) {
        return true;
    } else {
        return false;
    }
}
  
</script>
@endsection