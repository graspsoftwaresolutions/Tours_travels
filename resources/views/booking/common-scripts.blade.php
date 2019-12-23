<script type="text/javascript">
	$(function() {
     
      $(".adult-travellers").keyup(function(){
         var person_no = $(this).val()=='' ? 0 : $(this).val();
         $("#adult-count-val").val(parseInt(person_no));
         $(".adult-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
      $(".child-travellers").keyup(function(){
         var person_no = $(this).val()=='' ? 0 : $(this).val();
         $("#child-count-val").val(parseInt(person_no));
         $(".child-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
       $(".infant-travellers").keyup(function(){
         var person_no = $(this).val()=='' ? 0 : $(this).val();
         $("#infant-count-val").val(parseInt(person_no));
         $(".infant-count").text(parseInt(person_no));
         CalculateTotalTravellers();
      });
   });
   function CalculateTotalTravellers(){
      var childcount = $("#child-count-val").val()=='' ? 0 : parseInt($("#child-count-val").val());
      var adultcount = $("#adult-count-val").val()=='' ? 0 : parseInt($("#adult-count-val").val());
      var infantcount = $("#infant-count-val").val()=='' ? 0 :  parseInt($("#infant-count-val").val());
     

      if(adultcount==0){
        $(".adult-travellers").val(1);
        $(".adult-count").text(1);
        adultcount = 1;
        $("#adult-count-val").val(1);
        alert('Adults should be minimum 1 member');

      }
      var total_countable = parseInt(childcount)+parseInt(adultcount);
      $(".activity_person_cost").each(function() {
        var activitycostid = $(this).attr('id');
        var activitycostval = $(this).val();
        cost_arr = activitycostid.split('_');
        var activity_id = cost_arr[3];
        var total_cost = activitycostval*total_countable;
        $("#total_activity_value_"+activity_id).text(total_cost);
        $("#summary_activity_value_"+activity_id).text(total_cost);
        $("#activity_cost_"+activity_id).val(total_cost);

        //console.log(activitycostid);
      });

      var adult_count_val = $("#adult-count-val").val();
      var pack_adult_count_val = $("#pack-adult-count-val").val();

      var child_count_val = $("#child-count-val").val();
      var pack_child_count_val = $("#pack-child-count-val").val();

      var infant_count_val = $("#infant-count-val").val();
      var pack_infant_count_val = $("#pack-infant-count-val").val();

      var additional_transport = $("#additional_transport").val();
      var pack_additional_transport = $("#pack_additional_transport").val();
      var new_additional_transport = pack_additional_transport;
      if(adult_count_val!=pack_adult_count_val){
        var adult_price = $("#adult_price").val();
        if(adult_count_val>pack_adult_count_val){
          var difff_adult = parseInt(adult_count_val)-parseInt(pack_adult_count_val);
          var new_additional_transport = parseFloat(difff_adult*adult_price)+parseFloat(pack_additional_transport);
        }else{
           var difff_adult = parseInt(pack_adult_count_val)-parseInt(adult_count_val);
           var new_additional_transport = parseFloat(pack_additional_transport)-parseFloat(difff_adult*adult_price);
        }
      }
      if(child_count_val!=pack_child_count_val){
        var child_price = $("#child_price").val();
        if(child_count_val>pack_child_count_val){
          var difff_adult = parseInt(child_count_val)-parseInt(pack_child_count_val);
          var new_additional_transport = parseFloat(difff_adult*child_price)+parseFloat(new_additional_transport);
        }else{
           var difff_adult = parseInt(pack_adult_count_val)-parseInt(adult_count_val);
           var new_additional_transport = parseFloat(new_additional_transport)-parseFloat(difff_adult*child_price);
        }

      }
      if(infant_count_val!=pack_infant_count_val){
        var infant_price = $("#infant_price").val();
        if(infant_count_val>pack_infant_count_val){
          var difff_adult = parseInt(infant_count_val)-parseInt(pack_infant_count_val);
          var new_additional_transport = parseFloat(difff_adult*child_price)+parseFloat(new_additional_transport);
        }else{
           var difff_adult = parseInt(pack_infant_count_val)-parseInt(infant_count_val);
           var new_additional_transport = parseFloat(new_additional_transport)-parseFloat(difff_adult*child_price);
        }
      }
      new_additional_transport = new_additional_transport<0 ? 0 : new_additional_transport;
      $("#additional_transport").val(new_additional_transport);
      $("#additional_transport").trigger('keyup');
      //console.log('child-'+childcount+',adult-'+adultcount+',infant-'+infantcount);

      $("#total-travellers").text(childcount+adultcount+infantcount);
   }

   function ChangeStates(countryid,ref){
      var url = "{{ url('get-state-list') }}" + '?country_id=' + countryid;
      if(ref==0){
         var country_prefix='from_';
      }else{
         var country_prefix='to_';
      }
      var stateid = country_prefix+'state_id';
   
       $.get(url, function(data) {
           $('#'+stateid).empty('');
           $('#'+stateid).append("<option value=''>Select</option>");
           $('#'+stateid).selectpicker("refresh");
           //var select = $('form select[name=state_id]');
           if(ref==1){
               $("#destination-division").empty();
           }
           
          
          // select.empty();
           //$("#state_id").append("<option value=''>Select</option>");
           $.each(data, function(key, value) {
               $('#'+stateid).append('<option data-statename="'+value.state_name+'" value=' + value.id + '>' + value.state_name +
                   '</option>');
                 if(ref==1){
                     var dest_data = '<div id="state-cities-'+value.id+'" class="col-md-12 state-cities"><h5 class="text-headline text-bold">'+value.state_name+'</h5><div class="destination-city" id="destination-city-'+value.id+'"></div></div>';
                     var city_url = "{{ url('get-cities-list') }}" + '?State_id=' + value.id;
                    $("#destination-division").append(dest_data);
                    var cities_sec='';
                     $.get(city_url, function(citydata) {
                        $.each(citydata, function(citykey, cityvalue) {
                          //console.log(cityvalue.city_image);
                           var paramscity = "{  cityid: "+cityvalue.id+",  stateid: "+value.id+", cityname: '"+cityvalue.city_name+"', statename: '"+value.state_name+"' , cityimage: '"+cityvalue.city_image+"' }";
                           cities_sec += '<button id="place_button_'+cityvalue.id+'" type="button" onClick="PickPlace('+paramscity+')" class="btn theme-accent waves-effect waves-light "><i class="mdi mdi-plus left"></i>'+cityvalue.city_name+'</button>';
                        });
                        if(cities_sec!=""){
                           $("#destination-city-"+value.id).append(cities_sec);
                        }else{
                           $("#state-cities-"+value.id).addClass('hide');
                        }
                        
                     });
                   
                     
                     
                 }
           });
            $('#'+stateid).selectpicker("refresh");
       });
   }
   function ChangeCities(stateid,ref){
      var url = "{{ url('get-cities-list') }}" + '?State_id=' + stateid;
      if(ref==0){
         var country_prefix='from_';
      }else{
         var country_prefix='to_';
      }
      var cityid = country_prefix+'city_id';
      $.get(url, function(data) {
           $('#'+cityid).empty('');
           $('#'+cityid).append("<option value=''>Select</option>");
           $('#'+cityid).selectpicker("refresh");
           //var select = $('form select[name=state_id]');

          // select.empty();
           //$("#state_id").append("<option value=''>Select</option>");
           $.each(data, function(key, value) {
               $('#'+cityid).append('<option data-image="'+value.city_image+'" value=' + value.id + '>' + value.city_name +
                   '</option>');
           });
            $('#'+cityid).selectpicker("refresh");
       });

       if(ref==1){
          var selected = $("#to_state_id").find('option:selected');
          var statename = selected.data('statename'); 
          $("#summary-state").html(statename);
       }
       
   }
   (function($){
      // alert('df');
      setTimeout(AddHiddenMenu, 1000);
      // $(".main-wrapper").addClass('menu-hidden');
      // Options on smoothscroll plugin
      smoothScroll.init({
            speed: 800,
            easing: 'easeInOutCubic',
            offset: 0,
            updateURL: false
      });

   // Sortable 

      // list
      //$("#place-sortList").sortable();
   })(jQuery);
   function AddHiddenMenu(){
    //alert('Test');
     $(".main-wrapper").addClass('menu-hidden');
     $(".main-wrapper").removeClass('menu-small');
     $(".main-menu.menu-vertical-js").removeClass('menu-small');
   }
    function PickPlace(paramscity){
      
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var imagelocation = paramscity.cityimage=='null' || paramscity.cityimage=='' ? no_image_url : image_url+'/city/'+paramscity.cityimage;
      var imagedummy =  no_image_url;

    //console.log(paramscity);
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //var passparamscity = '"'+paramscity+'"';
      $("#place_button_"+paramscity.cityid).attr("disabled", true);
      $("#place-sortList").append('<li data-cityid="'+paramscity.cityid+'" id="picked-li-'+paramscity.cityid+'" class="list-group-item cityplace sort-handle"> . '+paramscity.statename+' - '+paramscity.cityname+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+paramscity.cityid+'" value="'+paramscity.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></li>');

      var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

    
      $("#destination-night-area").append('<div data-cityid="'+paramscity.cityid+'" id="place_night_'+paramscity.cityid+'" class="col-xs-6 col-sm-6 col-md-4 mt20"><img class="responsive-img z-depth-1" src="'+imagelocation+'" style="width:190px;height: 100px;" alt=""><div id="place_night_remove_'+paramscity.cityid+'" class="button-close"> <button type="button" onclick="return DeleteNight('+paramscity.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+paramscity.cityname+'</small><div class="form-group"><select id="place_night_select_'+paramscity.cityid+'" name="place_night_select[]" class="form-control place-night-select">'+night_options+'</select><input type="text" class="hide" id="place_night_count_'+paramscity.cityid+'" name="place_night_count_'+paramscity.cityid+'[]" value="1" ></input></div></div>');  

      $("#place-hotels").append('<li data-cityid="'+paramscity.cityid+'" id="picked-hotelli-'+paramscity.cityid+'" class="tl-item"><div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div class="card media-card-sm"><div id="picked-hotelmedia-'+paramscity.cityid+'" class="media"><div class="media-left media-img"><a><img class="responsive-img" src="'+imagedummy+'" alt="Hotel Image"></a></div><div class="media-body p10"><h4 class="media-heading">Please choose hotel</h4> <button id="add_hotel_button_'+paramscity.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add Hotel</button></div></div></div></li>');

      $("#place-activities").append('<li data-cityid="'+paramscity.cityid+'" id="picked-activityli-'+paramscity.cityid+'" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><ul id="place-activitylist-'+paramscity.cityid+'" style="list-style: none !important;" class="place-activitylist"></ul><a id="pick-actitity-link-'+paramscity.cityid+'" href="#" onClick="PickActity('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>');

      var listlength = $('#place-sortList li').length;

      $("#overall-summary").append('<li data-cityid="'+paramscity.cityid+'" id="summary-activityli-'+paramscity.cityid+'" class="tl-item summary-activity list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span id="summary-night-'+paramscity.cityid+'" class="summaryno">'+listlength+'</span></span> <br> '+paramscity.statename+' - <span id="summary-city-name-'+paramscity.cityid+'">'+paramscity.cityname+'</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></div><div id="summary-hotelarea-'+paramscity.cityid+'" class="overall-place-activitylist"> <div id="summary_hotel_id_'+paramscity.cityid+'" class="msg-wrapper"><img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+paramscity.cityid+'" src="'+imagedummy+'" alt="" class="avatar "><a id="summary-hotel-name-'+paramscity.cityid+'" class="msg-from"  style="display: initial;"></a><br><a id="summary-hotel-type-'+paramscity.cityid+'" class="msg-sub"></a><p id="summary-features-'+paramscity.cityid+'"></p></div><div style="clear:both"></div></div><div style="clear:both"></div><div id="summary-activity-section-'+paramscity.cityid+'" class="activities-summary"> </div></li>');

       $("#place-activitylist-"+paramscity.cityid).dragsort();

      
      $("#summary-cities").append(paramscity.cityname+', ');
      $(".place-night-select").trigger('change');

      var numItems = $('.cityplace').length;
      //console.log(numItems);
      //$(".days-count").html(parseInt(numItems)+parseInt(1));
      
   }
   function DeleteNight(cityid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
           var summary_cities = $("#summary-cities").text();
           var summary_city_name = $("#summary-city-name-"+cityid).html();
           var updatedString = summary_cities.replace(summary_city_name+',', "");
           console.log(summary_cities);
           console.log("#summary-city-name-"+cityid);
           $("#summary-cities").text(updatedString);
           $("#place_night_"+cityid).remove();
           $("#picked-hotelli-"+cityid).remove();
           $("#summary_hotel_id_"+cityid).remove();
           $("#summary-activityli-"+cityid).remove();
           $("#picked-activityli-"+cityid).remove();
           $("#picked-li-"+cityid).remove();
           $("#place_button_"+cityid).attr("disabled", false);
           $(".place-night-select").trigger('change');

      }else{
       // alert('Failed to delete');
      }
      
  }

  function PickHotel(paramscity){
     var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";

      $("#listhotelsarea").empty();
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_hotels') }}" + '?city_id=' + paramscity.cityid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
               //console.log(resultdata);

               $.each(resultdata, function(key, value) {
                  var amenitieslist = value.amenities;
                  var amenitiesString = '';
                  var amenities_len = amenitieslist.length;
                  $.each(amenitieslist, function(keya, valuea) {
                    //console.log(keya);
                    amenitiesString += valuea.amenities_name;
                    if(amenities_len-1!=keya){
                        amenitiesString += ', ';
                    }
                  }); 
                  var roomtypeslist = value.roomtypes;
                  var roomtypesString = '';
                  var roomtypes_len = roomtypeslist.length;
                  var confirm_btn ='';
                  var room_cost = 0;
                  var roomtype_id = '';
                  $.each(roomtypeslist, function(keya, valuea) {
                    //console.log(keya);
                    
                    if(keya==0){
                      roomtypesString += valuea.room_type+' - 1';
                      confirm_btn += 'return ConfirmHotel('+value.id+','+paramscity.cityid+','+passparamscity+','+valuea.pivot.roomtype_id+',0)';
                      room_cost = valuea.pivot.price;
                      roomtype_id = valuea.pivot.roomtype_id;
                    }else{
                      return false;
                    }
                    // if(roomtypes_len-1!=keya){
                    //     roomtypesString += ', ';
                    // }
                  }); 
                  var hotelimages = value.hotelimages;
                  var imagelocation = no_image_url;

                  if(hotelimages.length>0){
                     var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                  }
                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? no_image_url : image_url+'/city/'+paramscity.cityimage;

                  $("#listhotelsarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 130px;" alt="hotel Image"></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.hotel_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+'</p></div><div class="col-md-2"> <p style="margin-bottom: 10px;">at <i class="fa fa-inr"></i> '+room_cost+' more</p><button type="button" id="viewhotelid" onclick="return ViewHotelDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button id="hotellistconfirm_'+value.id+'_'+roomtype_id+'" type="button" onclick="'+confirm_btn+'" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
                
                });
              // $('#masterid').val(result.id);
              // $('#masterid').attr('data-autoid', result.id);
              // $('#country_name').val(result.country_name);
              
          }
      });
     

      $("#hotelcityname").html(place_area);
      $("#activitycityname").html(place_area);
      $("#CityHotelModal").modal();
  }

  $(document).ready(function() {

      var options = {
        // the classnames where we can filter on
          valueNames: [ 'name', 'area' ] 
      };

      prettyPrint();

      $("#dayHotelScroll,#hotel-leftpanel,#hotel-rightpanel,#dayactivityScroll").mCustomScrollbar({
          theme:"dark",
          autoHideScrollbar: true,
          setHeight: 480,
      });

    });

  function ViewHotelDetails(hotelid,paramscity,roomtyeid=false,room_nos=false){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    //var resdata = paramscity.replace('"', '');
    //console.log(paramscity.cityid);
    //console.log(roomtyeid);
     // var str_paracity = JSON.stringify(paramscity);
     // if(str_paracity.indexOf('roomtyeid') != -1){
     //    console.log(paramscity.cityid);
     //  }
    // console.log(typeof resdata);
    //   if ('roomtyeid' in resdata) {
    //     console.log(paramscity);
    //   }
      
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_hotels_details') }}" + '?hotel_id=' + hotelid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
            $("#view-hotel-name").html(resultdata.hotel_name);
            $("#view-state-city-name").html(place_area);
             var hotelimages = resultdata.hotelimages;
              var imagelocation = no_image_url;

              if(hotelimages.length>0){
                 var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
              }
            $("#view-city-full-image").attr("src", imagelocation);
            $("#view-hotel-imagearea").empty();
            $.each(hotelimages, function(key, value) {
              var imagefolder = image_url+'/hotels/';
              if(key<=4){
                var imagefullname = imagefolder+value.image_name;
                var passimagename = "{  imagename: '"+imagefullname+"' }";
                $("#view-hotel-imagearea").append('<div class="col-xs-12 col-sm-3 mt20"><img onclick="return setFullImage('+passimagename+')" style="width:100px;height:65px;cursor:pointer;" class="responsive-img z-depth-1" src="'+imagefullname+'" alt=""></div>');
              }
            });

            var amenitieslist = resultdata.amenities;
            $("#ameneties-list-container").empty();
            $.each(amenitieslist, function(keya, valuea) {
              $("#ameneties-list-container").append('<a>'+valuea.amenities_name+'</a>');
            }); 

            $("#ameneties-list-container").append('<div style="clear:both"></div>');

            $("#view-hotel-overview").html(resultdata.overview);

             var roomtypeslist = resultdata.roomtypes;
             $("#view-hotel-roomtypes").empty();
           

            $.each(roomtypeslist, function(keya, valuea) {
              //console.log(valuea.pivot.price);
              var desc = valuea.pivot.description==null ? '' : valuea.pivot.description;
              if(roomtyeid!=false && valuea.id==roomtyeid){
                var btncolor = 'blue';
                var selectedtype = '<i class="icon mdi mdi-check"></i>';
                var room_count = room_nos;
                 var hotel_rooms_option = '';
                  var i;
                  for (i = 1; i <= 40; i++) {
                    if(i==room_nos){
                      hotel_rooms_option += '<option selected value="'+i+'">'+i+' Room(s)</option>';
                    }else{
                      hotel_rooms_option += '<option value="'+i+'">'+i+' Room(s)</option>';
                    }
                  }
              }else{
                var btncolor = 'green';
                 var selectedtype = '';
                var room_count = 1;
                 var hotel_rooms_option = '';
                var i;
                for (i = 1; i <= 40; i++) {
                  if(i==1){
                    hotel_rooms_option += '<option selected value="'+i+'">'+i+' Room(s)</option>';
                  }else{
                    hotel_rooms_option += '<option value="'+i+'">'+i+' Room(s)</option>';
                  }
                }
              }
              var button_evt =  'return ConfirmHotel('+resultdata.id+','+paramscity.cityid+','+passparamscity+','+valuea.pivot.roomtype_id+',1)';
              $("#view-hotel-roomtypes").append('<h3>'+valuea.room_type+' <span class="pull-right">at <i class="fa fa-inr"></i> '+valuea.pivot.price+'</span></h3><div>'+desc+'</div><br>');
              $("#view-hotel-roomtypes").append('<div class="row"><div class="col-md-offset-4 col-md-4"><select class="selectroom form-control" id="hotel_rooms_'+resultdata.id+'_'+valuea.pivot.roomtype_id+'">'+hotel_rooms_option+'</select></div><div class="col-md-4"><button id="viewhotelconfirm_'+resultdata.id+'_'+valuea.pivot.roomtype_id+'" type="button" onclick="'+button_evt+'" class="btn '+btncolor+' waves-effect waves-theme">'+selectedtype+'Confirm</button></div></div>');
             
            }); 
             $("#view-hotel-roomtypes").append('<div style="clear:both"></div>');

            $("#view-hotel-listdescription").html(resultdata.listing_descriptions);
            //$('#viewhotelconfirm').attr('onclick', 'return ConfirmHotel('+resultdata.id+','+paramscity.cityid+','+passparamscity+')');
          }
      });

    $("#CityHotelDetailsModal").modal();
  }


  function setFullImage(imageobj){
    var imagename = imageobj.imagename;
    $("#view-city-full-image").attr("src", imagename);
    
  }

  function ConfirmHotel(hotelid,cityid,paramscity,roomtyeid,type){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    $("#picked-hotelmedia-"+cityid).empty();
    //var imagename ='';
    var place_area = paramscity.statename+' - '+paramscity.cityname;

    if(type==1){
      var hotel_room_nos = $("#hotel_rooms_"+hotelid+"_"+roomtyeid).val();
       //console.log(hotel_room_nos);
    }else{
      var hotel_room_nos = 1;
    }

    // /console.log(hotelid+'room type'+roomtyeid);

    var url = "{{ url('/city_hotels_details') }}" + '?hotel_id=' + hotelid;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(resultdata) {
           var hotelimages = resultdata.hotelimages;
            var imagelocation = no_image_url;

            if(hotelimages.length>0){
               var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
            }

            var amenitieslist = resultdata.amenities;
            var amenitiesString = '';
            var amenities_len = amenitieslist.length;
            $.each(amenitieslist, function(keya, valuea) {
              //console.log(keya);
              amenitiesString += valuea.amenities_name;
              if(amenities_len-1!=keya){
                  amenitiesString += ', ';
              }
            }); 

            var roomtypeslist = resultdata.roomtypes;
            var roomtypesString = '';
            var roomtypes_len = roomtypeslist.length;
            var room_cost = 0;
            $.each(roomtypeslist, function(keya, valuea) {
              //console.log(keya);
             

              if(valuea.pivot.roomtype_id==roomtyeid){
                roomtypesString = valuea.room_type+' - '+hotel_room_nos;
                room_cost = valuea.pivot.price;
                //alert(roomtypesString);
              }

              // if(roomtypes_len-1!=keya){
              //     roomtypesString += ', ';
              // }
            }); 

            var total_roomcost = room_cost*hotel_room_nos;

            var hiddenvalues = '<input type="text" class="hide" name="second_hotel_'+cityid+'[]" id="second_hotel_'+cityid+'" value="'+resultdata.id+'"/><input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="'+cityid+'"/><input type="text" class="hide hotel_cost" name="hotel_cost_'+cityid+'[]"  id="hotel_cost_'+cityid+'" value="'+total_roomcost+'" /><input type="text" class="hide hotel_number_count" name="hotel_number_count_'+cityid+'[]"  id="hotel_number_count_'+cityid+'" value="'+hotel_room_nos+'" /><input type="text" class="hide hotel_room_type" name="hotel_room_type_'+cityid+'[]"  id="hotel_room_type_'+cityid+'" value="'+roomtyeid+'" />';

            $("#picked-hotelmedia-"+cityid).append('<div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="Hotel image"></a></div><div class="media-body p10"><h4 class="media-heading">'+resultdata.hotel_name+'</h4><p>'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <span class="" style="margin-left: 20px;font-weight:bold;">at <i class="fa fa-inr"></i> '+total_roomcost+' </span> <button id="edit_hotel_button_'+cityid+'" style="margin-left: 20px;" type="button" onClick="EditHotel('+passparamscity+','+resultdata.id+','+roomtyeid+','+hotel_room_nos+')" class="btn btn-sm blue waves-effect waves-light ">Edit Hotel</button> <button id="add_hotel_button_'+cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light pull-right">Pick Hotel</button></p>'+hiddenvalues+'</div>');
              $("#summary_hotel_id_"+cityid+" #summary-hotel-img-"+cityid).attr("src", imagelocation);
              $("#summary_hotel_id_"+cityid+" #summary-hotel-name-"+cityid).html( resultdata.hotel_name);
              $("#summary_hotel_id_"+cityid+" #summary-hotel-type-"+cityid).html( roomtypesString);
              $("#summary_hotel_id_"+cityid+" #summary-features-"+cityid).html( amenitiesString);
        }
    });

    
    //alert(hotelid);
    $("#CityHotelDetailsModal").modal('hide');
    $("#CityHotelModal").modal('hide')
  }

  function PickActity(paramscity){
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";

      $("#listactivitiesarea").empty();
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_activities') }}" + '?city_id=' + paramscity.cityid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
               //console.log(resultdata);

               $.each(resultdata, function(key, value) {
                
                  var activityimages = value.activity_images;
                  var imagelocation = no_image_url;

                  if(activityimages.length>0){
                     var imagelocation = image_url+'/activity/'+activityimages[0].image_name
                  }

                  var activityduration = (value.duartion_hours/60).toFixed(0)+' hour '+(value.duartion_hours%60)+' minutes';
                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? no_image_url : image_url+'/city/'+paramscity.cityimage;

                  $("#listactivitiesarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 125px;" alt="Activity Image"></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.title_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+activityduration+'</p></div><div class="col-md-2"> <p style="margin-bottom: 10px;">at '+value.amount+'</p><button type="button" id="viewactivityid" onclick="return ViewActivityDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button  id="activitylistconfirm" type="button" onclick="return ConfirmActivity('+value.id+','+paramscity.cityid+','+passparamscity+')" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
                });
              // $('#masterid').val(result.id);
              // $('#masterid').attr('data-autoid', result.id);
              // $('#country_name').val(result.country_name);
              
          }
      });
     

      $("#hotelcityname").html(place_area);
      $("#activitycityname").html(place_area);
      $("#CityActivityModal").modal();
  }


  function ViewActivityDetails(activityid,paramscity){
    console.log(activityid);
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //console.log(paramscity);
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ url('/city_activity_details') }}" + '?activity_id=' + activityid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
            $("#view-activity-name").html(resultdata.title_name);
            $("#activity-state-city-name").html(place_area);
             var activityimages = resultdata.activity_images;
              var imagelocation = no_image_url;
              if(activityimages!=null){
                 if(activityimages.length>0){
                   var imagelocation = image_url+'/activity/'+activityimages[0].image_name
                }
              }
             
            $("#view-activity-full-image").attr("src", imagelocation);
            $("#view-activity-imagearea").empty();
            if(activityimages!=null){
              $.each(activityimages, function(key, value) {
                var imagefolder = image_url+'/activity/';
                if(key<=4){
                  var imagefullname = imagefolder+value.image_name;
                  var passimagename = "{  imagename: '"+imagefullname+"' }";
                  $("#view-activity-imagearea").append('<div class="col-xs-12 col-sm-3 mt20"><img onclick="return setActivityFullImage('+passimagename+')" style="width:100px;height:65px;cursor:pointer;" class="responsive-img z-depth-1" src="'+imagefullname+'" alt=""></div>');
                }
              });
            }

            // var amenitieslist = resultdata.amenities;
            // $("#ameneties-list-container").empty();
            // $.each(amenitieslist, function(keya, valuea) {
            //   $("#ameneties-list-container").append('<a>'+valuea.amenities_name+'</a>');
            // }); 

            // $("#ameneties-list-container").append('<div style="clear:both"></div>');

              var activityduration = (resultdata.duartion_hours/60).toFixed(0)+' hour '+(resultdata.duartion_hours%60)+' minutes';
            $("#view-activity-overview").html(resultdata.overview);
            $("#view-activity-additional-info").html(resultdata.additional_info);
            $("#view_activity_duration").html(activityduration);
            $("#activity_price").html( 'at '+resultdata.amount);

            $("#view-activity-inclusion-list").empty();
            //  var roomtypeslist = resultdata.roomtypes;
            //  $("#view-hotel-roomtypes").empty();
            //console.log(resultdata.inclusion_name);
             if(resultdata.inclusion_name!='null' && resultdata.inclusion_name!=null && !$.isEmptyObject(resultdata.inclusion_name)){
              $.each(JSON.parse(resultdata.inclusion_name), function(keya, valuea) {
             
                $("#view-activity-inclusion-list").append('<li>'+valuea+'</li>');
               
              }); 
            }

            $("#view-activity-exclussion-list").empty();
            //  var roomtypeslist = resultdata.roomtypes;
            //  $("#view-hotel-roomtypes").empty();
            if(resultdata.exclusion_name!='null' && resultdata.exclusion_name!=null && !$.isEmptyObject(resultdata.exclusion_name)){
              $.each(JSON.parse(resultdata.exclusion_name), function(keya, valuea) {
             
                $("#view-activity-exclussion-list").append('<li>'+valuea+'</li>');
               
              }); 
            }
            //  $("#view-hotel-roomtypes").append('<div style="clear:both"></div>');

            //$("#view-hotel-listdescription").html(resultdata.listing_descriptions);
            $('#viewactivityconfirm').attr('onclick', 'return ConfirmActivity('+activityid+','+paramscity.cityid+','+passparamscity+')');
          }
      });

    $("#CityActivityDetailsModal").modal();
  }

  function setActivityFullImage(imageobj){
    var imagename = imageobj.imagename;
    $("#view-activity-full-image").attr("src", imagename);
    
  }

  function ConfirmActivity(activityid,cityid,paramscity){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    //$("#picked-hotelmedia-"+cityid).empty();
    //var imagename ='';
    var place_area = paramscity.statename+' - '+paramscity.cityname;
    var adult_count = $("#adult-count-val").val();
    var child_count = $("#child-count-val").val();
    var total_count = parseInt(adult_count)+parseInt(child_count);

    var url = "{{ url('/city_activity_details') }}" + '?activity_id=' + activityid;
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function(resultdata) {
           var hotelimages = resultdata.activity_images;
            var imagelocation = no_image_url;

            if(hotelimages.length>0){
               var imagelocation = image_url+'/activity/'+hotelimages[0].image_name
            }

            var total_act_cost = total_count*resultdata.amount;

            var hiddenvalues = '<input type="text" class="hide" name="second_activity_'+cityid+'[]" id="second_activity_'+cityid+'" value="'+resultdata.id+'"/><input type="text" class="hide activity_cost" name="activity_cost_'+cityid+'[]"  id="activity_cost_'+resultdata.id+'" value="'+total_act_cost+'" /><input type="text" class="hide activity_person_cost" name="activity_person_cost_'+cityid+'[]"  id="activity_person_cost_'+resultdata.id+'" value="'+resultdata.amount+'" />';

            if(!$('#city_activity_id_'+resultdata.id).length){
              $("#place-activitylist-"+cityid).append('<li><div id="city_activity_id_'+resultdata.id+'" class="msg-wrapper"><img src="'+imagelocation+'" alt="" class="avatar "><a class="msg-sub">'+resultdata.title_name+'</a><a class="msg-from"><i class="fa fa-inr"></i> <span id="total_activity_value_'+resultdata.id+'">'+total_act_cost+'</span></a><p>'+hiddenvalues+'<a onclick="return RemoveActivity('+resultdata.id+','+cityid+')" style="color: red;cursor:pointer;" class="">Remove</a></p></div></li>');
              var act_overview  = resultdata.overview != null ? resultdata.overview : '';
               var activityduration = (resultdata.duartion_hours/60).toFixed(0)+' hour '+(resultdata.duartion_hours%60)+' minutes';
              $("#summary-activity-section-"+cityid).append('<div id="summary_city_activity_id_'+resultdata.id+'" class=""><h3 style="text-decoration: underline;">'+resultdata.title_name+' <a class="pull-right"><i class="fa fa-inr"></i> <span id="summary_activity_value_'+resultdata.id+'">'+total_act_cost+'</span></a></h3><div class="sub-summary-activity"><h5>Overview</h5><div id="activity-summary-overview" class="activity-description"> '+act_overview+'</div><h5>Duration: '+activityduration+'</h5></div></div>');
             $("#pick-actitity-link-"+cityid).css('top','-20px');
            }else{
              alert("Activity already choosed");
            }

            
        }
    });

    
    //alert(hotelid);
    $("#CityActivityDetailsModal").modal('hide');
    $("#CityActivityModal").modal('hide')
  }
  function RemoveActivity(activityid,cityid){
    $("#city_activity_id_"+activityid).remove();
    $("#summary_city_activity_id_"+activityid).remove();
  }

   function ChangeCityvalues(refid){
      var selected = $("#"+refid).find('option:selected');
      var imagename = selected.data('image'); 
      var imagelocation = imagename=='null' ? no_image_url : image_url+'/city/'+imagename;
      $("#summary-banner").attr("src", imagelocation);
   }

    function saveOrder() {
       $("#summary-cities").empty();
      $("#dummyList").empty();
      $("#dummyList").append($("#place-sortList").clone());
      $('#dummyList #place-sortList').prop('id', 'dummy-place-sortList');

      $("#dummy-hotels,#dummy-activities,#dummyListNights").empty();
      $("#dummy-hotels").append($("#place-hotels").clone());
      $('#dummy-hotels #place-hotels').prop('id', 'dummy-place-hotels');

      $("#dummy-activities").append($("#place-activities").clone());
      $('#dummy-activities #place-activities').prop('id', 'dummy-place-activities');

      $("#dummyListNights").append($("#destination-night-area").clone());
      $('#dummyListNights #destination-night-area').prop('id', 'dummy-destination-night-area');
      

        var summarycount = $('#overall-summary li.summary-activity').length;
        $("#place-sortList,#place-hotels,#place-activities,#destination-night-area").empty();
        //$("").empty();
        var data = $("#overall-summary li").map(function (index) {

        // console.log(placelistarray);
        var cityval = $(this).children().find(".summary-city").val();
        $('#place-sortList').append($('#dummyList #dummy-place-sortList #picked-li-'+cityval));
        $('#place-hotels').append($('#dummy-hotels #dummy-place-hotels #picked-hotelli-'+cityval));
        $('#place-activities').append($('#dummy-activities #dummy-place-activities #picked-activityli-'+cityval));
        $('#destination-night-area').append($('#dummyListNights #dummy-destination-night-area #place_night_'+cityval));

        var summary_city_name = $("#summary-city-name-"+cityval).html();
        $("#summary-cities").append(summary_city_name+', ');

         $("#place-activitylist-"+cityval).dragsort();
          
          return $(this).children().find(".summary-city").val();
        }).get();
          $("#dummyList,#dummy-hotels,#dummy-activities,#dummyListNights").empty();
       // console.log(summarycount);
        // $("input[name=list1SortOrder]").val(data.join("|"));
    }

   
    $(function () {
        $("#overall-summary").dragsort({
            dragSelector: "div",
            dragBetween: true,
            dragEnd: saveOrder,
            //placeHolderTemplate: "<li class='placeHolder'><div></div></li>",
            cursor: "move"
        });
       
    });
    $(document).on('change', '.place-night-select', function() {
      var total_nights = 0;
      var startday = 1;
      $(".place-night-select").each(function() {
         var night_count = parseInt($(this).val());
         dropdown_id = $(this).attr('id');
         dropdown_arr = dropdown_id.split('_');
         var city_id_night = dropdown_arr[3];
         $("#place_night_count_"+city_id_night).val(night_count);
         if(night_count==1){
           $("#summary-night-"+city_id_night).html(startday);
         }else{
           $("#summary-night-"+city_id_night).html(startday+' - '+(parseInt(startday)+parseInt(night_count)-1));
         }
        
         startday = parseInt(startday)+parseInt(night_count);
         //console.log('this'+night_count);
         total_nights = parseInt(night_count)+parseInt(total_nights);
      });
     // console.log(total_nights);
      $(".night-count").html(total_nights);
      $(".days-count").html(parseInt(total_nights)+1);
    });
    $(document).on('input', '.allow_decimal', function(){
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
     {
       evt.preventDefault();
     }
   });
  $(document).on('keyup', '#transport_charges,#additional_charges,#additional_transport', function(){
     //var total_package_value = $("#total_package_value").val();
     //var transport_charges = $("#transport_charges").val();
    // var additional_charges = $("#additional_charges").val();
     var total_accommodation = $("#total_accommodation").val();
     var total_activities = $("#total_activities").val();
     var additional_transport = $("#additional_transport").val();
     var discount_amt = $("#discount_amt").val();
     
     //total_package_value = total_package_value=='' ? 0 : parseFloat(total_package_value);
    // additional_charges = additional_charges=='' ? 0 : parseFloat(additional_charges);
    // transport_charges = transport_charges=='' ? 0 : parseFloat(transport_charges);
     additional_transport = additional_transport=='' ? 0 : parseFloat(additional_transport);
     total_accommodation = total_accommodation=='' ? 0 : parseFloat(total_accommodation);
     total_activities = total_activities=='' ? 0 : parseFloat(total_activities);
     discount_amt = discount_amt=='' ? 0 : parseFloat(discount_amt);
     var total_package_value = parseFloat(additional_transport)+parseFloat(total_accommodation)+parseFloat(total_activities);
     $("#total_package_value").val(total_package_value);
     // /alert(total_pack_cost);
     var gst_per = $("#gst_per").val();
     gst_per = gst_per=='' ? 0 : parseFloat(gst_per);
     var tax_amount = ((parseFloat(total_package_value)*gst_per)/100).toFixed(2);
     $("#gst_amount").val(tax_amount);
     var overall_total = (parseFloat(tax_amount)+parseFloat(total_package_value)).toFixed(2);
     $("#total_amount,#total_package_summary").val(overall_total);
     var grand_total = parseFloat(overall_total)-discount_amt;
     $("#grand_total_amount,#total_amount_summary").val(grand_total);

   });

  $(document).on('keyup', '#discount_amt', function(){
    var discount_amt = $("#discount_amt").val();
    discount_amt = discount_amt=='' ? 0 : parseFloat(discount_amt);
    $("#discount_amt_one").val(discount_amt);
     $("#additional_transport").trigger('keyup');
  });

  function EditHotel(paramscity,hotelid,roomtyeid,room_nos){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' , roomtyeid: '"+roomtyeid+"' , room_nos: '"+room_nos+"' }";
    var cityid = paramscity.cityid;
    ViewHotelDetails(hotelid,paramscity,roomtyeid,room_nos);
    // $("#hotel_rooms_"+hotelid+"_"+roomtyeid).val(room_nos);
    // $("#viewhotelconfirm_"+hotelid+"_"+roomtyeid).removeClass('green');
    // $("#viewhotelconfirm_"+hotelid+"_"+roomtyeid).addClass('blue');
  }

</script>