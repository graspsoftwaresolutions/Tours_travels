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
       // alert($(this).val());
        var activitycostval = $(this).val()=='' || $(this).val()=='null' || typeof($(this).val())=='object' ? 0 : $(this).val();
        cost_arr = activitycostid.split('_');
        var activity_id = cost_arr[3];
        var total_cost = activitycostval*total_countable;
        $("#total_activity_value_"+activity_id).text(total_cost);
        $("#summary_activity_value_"+activity_id).text(total_cost);
        $("#activity_cost_"+activity_id).val(total_cost);

        console.log(activitycostval);
      });
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

      var lastnightcount = $(".night-count").html()=='' ? 0 : parseInt($(".night-count").html());

    //console.log(paramscity);
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //var passparamscity = '"'+paramscity+'"';
      $("#place_button_"+paramscity.cityid).attr("disabled", true);
      $("#place-sortList").append('<li data-params="'+passparamscity+'" data-cityid="'+paramscity.cityid+'" id="picked-li-'+paramscity.cityid+'" class="list-group-item cityplace sort-handle"> . '+paramscity.statename+' - '+paramscity.cityname+'<span class="callout-left blue-grey"></span><input type="text" name="picked_state[]" class="hide" id="picked-state-'+paramscity.cityid+'" value="'+paramscity.stateid+'"/><input type="text" name="picked_city[]" class="hide" id="picked-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></li>');

      var night_options='<option value="1" selected="">1 Night</option><option value="2">2 Nights</option><option value="3">3 Nights</option><option value="4">4 Nights</option><option value="5">5 Nights</option><option value="6">6 Nights</option><option value="7">7 Nights</option><option value="8">8 Nights</option><option value="9">9 Nights</option><option value="10">10 Nights</option>';

    
      $("#destination-night-area").append('<div data-cityid="'+paramscity.cityid+'" id="place_night_'+paramscity.cityid+'" class="col-xs-6 col-sm-6 col-md-4 mt20"><img class="responsive-img z-depth-1" src="'+imagelocation+'" style="width:190px;height: 100px;" alt=""><div id="place_night_remove_'+paramscity.cityid+'" class="button-close"> <button type="button" onclick="return DeleteNight('+paramscity.cityid+')" class="btn btn-sm red waves-effect waves-circle waves-light"> x </button></div><small class="night-place-name">'+paramscity.cityname+'</small><div class="form-group"><select id="place_night_select_'+paramscity.cityid+'" name="place_night_select[]" class="form-control place-night-select">'+night_options+'</select><input type="text" class="place_night_count hide" id="place_night_count_'+paramscity.cityid+'" name="place_night_count_'+paramscity.cityid+'[]" value="1" ></input></div></div>');  

      $("#place-hotels").append('<li data-cityid="'+paramscity.cityid+'" id="picked-hotelli-'+paramscity.cityid+'" class="tl-item hotel-list-panel"><div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div id="hotel_city_'+paramscity.cityid+'" style="background: #f2f2f2;" class="hotel-panel"> <div id="hotel_citydata_'+paramscity.cityid+'"> </div><button style="margin-bottom: 10px;margin-right: 10px;margin-left: 80%;" id="add_hotel_button_'+paramscity.cityid+'" type="button" onClick="PickHotel('+passparamscity+')" class="btn btn-sm purple waves-effect waves-light"><i class="mdi mdi-plus left"></i>Add Hotel</button></div></li>');

      var listlength = $('#place-sortList li').length;
      newdaynumber = parseInt(lastnightcount)+parseInt(1);

      $("#place-activities").append('<li data-cityid="'+paramscity.cityid+'" id="picked-activityli-'+paramscity.cityid+'-'+newdaynumber+'" class="tl-item list-group-item item-avatar picked-activityli-'+paramscity.cityid+' msg-row unread"> <div class="timeline-icon ti-text">'+paramscity.cityname+' - Day '+newdaynumber+'</div><ul id="place-activitylist-'+paramscity.cityid+'-'+newdaynumber+'" style="list-style: none !important;" class="place-activitylist"></ul><a id="pick-actitity-link-'+paramscity.cityid+'" href="#" onClick="PickActity('+passparamscity+','+newdaynumber+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>');

       $("#place-transports").append('<li data-cityid="'+paramscity.cityid+'" id="transportli-'+paramscity.cityid+'" class="tl-item hotel-list-panel"><div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div id="transport_city_'+paramscity.cityid+'" style="" class="hotel-panel"><div id="transport_citydata_'+paramscity.cityid+'"> <br><div class="col-md-12 form-horizontal"><div id="initialCharge_'+paramscity.cityid+'" class="col-md-11 initialCharge_'+paramscity.cityid+'" style="border-bottom: 1px solid #d4c8c8;padding-bottom: 15px; margin-bottom: 10px;"><div id="airportpick" class="form-group"> <label for="airportpickup" class="col-sm-6 control-label">Airport(pickup/Drop)</label><div class="col-sm-6"><div class="input-field"> <input type="text" id="airportpickup" onkeyup="return CalculateTransport()" class="allow_decimal airportpickup" name="airportpickup_'+paramscity.cityid+'[]" placeholder=""><div class="input-highlight"></div></div></div></div><div class="form-group"> <label for="driverbeta" class="col-sm-6 control-label">Driver beta</label><div class="col-sm-6"><div class="input-field"> <input type="text" id="driverbeta" onkeyup="return CalculateTransport()" name="driverbeta_'+paramscity.cityid+'[]" class="allow_decimal driverbeta" placeholder=""><div class="input-highlight"></div></div></div></div><div class="form-group"> <label for="tollparking" class="col-sm-6 control-label">Toll &amp; Parking</label><div class="col-sm-6"><div class="input-field"> <input type="text" id="tollparking" onkeyup="return CalculateTransport()" name="tollparking_'+paramscity.cityid+'[]" class="allow_decimal tollparking" placeholder=""><div class="input-highlight"></div></div></div></div></div><div class="col-md-1"> <button type="button" onclick="return AddMoreAirport('+paramscity.cityid+')" class="btn btn-circle theme waves-effect waves-circle waves-light"><i class="mdi mdi-plus"></i></button></div><div id="moreCharges_'+paramscity.cityid+'"></div><div class="col-md-11"><div class="form-group"> <label for="interestrate_'+paramscity.cityid+'" class="col-sm-6 control-label">Inter State Tax</label><div class="col-sm-6"><div class="input-field"> <input type="text" onkeyup="return CalculateTransport()" id="interestrate_'+paramscity.cityid+'" name="interestrate_'+paramscity.cityid+'" class="allow_decimal interstaterate_'+paramscity.stateid+' interestrate" value="0" readonly="" placeholder=""><div class="input-highlight"></div></div></div></div></div><div class="col-md-1"> &nbsp;</div></div></div></div></li>');
       //$("#place-transports").append('<li data-cityid="'+paramscity.cityid+'" id="picked-hotelli-'+paramscity.cityid+'" class="tl-item hotel-list-panel"><div class="timeline-icon ti-text">'+paramscity.statename+' - '+paramscity.cityname+'</div><div id="hotel_city_'+paramscity.cityid+'" style="background: #f2f2f2;" class="hotel-panel"> <div id="transport_citydata_'+paramscity.cityid+'"> </div></div></li>');

      var url = "{{ route('get_state_taxrate') }}" + '?state_id=' + paramscity.stateid;
      $.ajax({
          url: url,
          type: "GET",
          dataType: "json",
          success: function(resultdata) {
            var statetax = 0;
           
            $(".interstaterate_"+paramscity.stateid).each(function(index) {
              taxval = $(this).val();
              statetax = parseInt(statetax)+parseInt(taxval);
              
            });
           
             if(statetax==0 || statetax==''){
                 $("#interestrate_"+paramscity.cityid).val(resultdata);
              }else{
                 $("#interestrate_"+paramscity.cityid).val(0);
              }
          }
        });

      //var listlength = $('#place-sortList li').length;

      $("#overall-summary").append('<li data-cityid="'+paramscity.cityid+'" id="summary-activityli-'+paramscity.cityid+'" class="tl-item summary-activity list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text"> <span class="summary-day-title">Day <span id="summary-night-'+paramscity.cityid+'" class="summaryno">'+listlength+'</span></span> <br> '+paramscity.statename+' - <span id="summary-city-name-'+paramscity.cityid+'">'+paramscity.cityname+'</span><input type="text" name="summary-city[]" class="summary-city hide" id="summary-city-'+paramscity.cityid+'" value="'+paramscity.cityid+'"/></div><div id="summary-hotelarea-'+paramscity.cityid+'" class="overall-place-activitylist"><div style="clear:both"></div></div><div style="clear:both"></div><div class="summary-activity-citysection" id="summary-activity-citysection-'+paramscity.cityid+'"><b style="font-size:18px;">Day '+newdaynumber+'</b><div id="summary-activity-section-'+paramscity.cityid+'-'+newdaynumber+'" class="activities-summary"> </div></div></li>');

       //$("#place-activitylist-"+paramscity.cityid).dragsort();

      
      $("#summary-cities").append(paramscity.cityname+', ');
     // $(".place-night-select").trigger('change');
      CalculateDaysNights();

      var numItems = $('.cityplace').length;
      //console.log(numItems);
      //$(".days-count").html(parseInt(numItems)+parseInt(1));
      
   }
   function DeleteNight(cityid){
      if (confirm("{{ __('Are you sure you want to delete?') }}")) {
           var summary_cities = $("#summary-cities").text();
           var summary_city_name = $("#summary-city-name-"+cityid).html();
           var updatedString = summary_cities.replace(summary_city_name+',', "");
           //console.log(summary_cities);
           //console.log("#summary-city-name-"+cityid);
           $("#summary-cities").text(updatedString);
           $("#place_night_"+cityid).remove();
           $("#picked-hotelli-"+cityid).remove();
           $("#summary_hotel_id_"+cityid).remove();
           $("#summary-activityli-"+cityid).remove();
           $("#picked-activityli-"+cityid).remove();
           $("#picked-li-"+cityid).remove();
           $("#transportli-"+cityid).remove();
           $("#place_button_"+cityid).attr("disabled", false);
           //$(".place-night-select").trigger('change');
           CalculateDaysNights();
           RegenerateActivities();

      }else{
       // alert('Failed to delete');
      }
      
  }

  function PickHotel(paramscity){
     var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";

      $("#listhotelsarea").empty();
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ route('city_hotels') }}" + '?city_id=' + paramscity.cityid;
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
                  var a_count = 0;
                  $.each(amenitieslist, function(keya, valuea) {
                    //console.log(keya);
                    if(a_count<8){
                       amenitiesString += valuea.amenities_name;
                      if(amenities_len-1!=keya){
                          amenitiesString += ', ';
                      }
                    }
                   
                    a_count++;
                  }); 
                  var roomtypeslist = value.roomtypes;
                  var roomtypesString = '';
                  var roomtypes_len = roomtypeslist.length;
                  var confirm_btn ='';
                  var room_cost = 0;
                  var roomtype_id = '';
                  $.each(roomtypeslist, function(keya, valuea) {
                    //console.log(keya);
                     roomtypesString += valuea.room_type;
                    // if(keya==0){
                    //   roomtypesString += valuea.room_type+' - 1';
                    //   confirm_btn += 'return ConfirmHotel('+value.id+','+paramscity.cityid+','+passparamscity+','+valuea.pivot.roomtype_id+',0)';
                       room_cost = valuea.pivot.price== null ? 0 : valuea.pivot.price;
                    //   roomtype_id = valuea.pivot.roomtype_id;
                    // }else{
                    //   return false;
                    // }
                    if(roomtypes_len-1!=keya){
                        roomtypesString += ', ';
                    }
                  }); 
                  var hotelimages = value.hotelimages;
                  var imagelocation = no_image_url;

                  if(hotelimages.length>0){
                     var imagelocation = image_url+'/hotels/'+hotelimages[0].image_name
                  }

                  var rating_no = value.ratings;
                  var rating_string = '';
                  var empty_rating = 5;
                  if(rating_no!=null){
                    for (r = 1; r <= rating_no; r++) {
                      rating_string += '<span><i id="listviewrating-'+r+'" class="listviewrating mdi mdi-star"></i></span>';
                    }
                    empty_rating = 5-rating_no;
                  }else{
                    rating_no = 0;
                  }
                  for (e = 1; e <= empty_rating; e++) {
                    rating_string += '<span><i id="listviewrating-'+parseInt(e)+parseInt(rating_no)+'" class="listviewrating mdi mdi-star-outline"></i></span>';
                  }

                  //console.log(hotelimages[0].image_name);
                   //var imagelocation = paramscity.cityimage=='null' ? no_image_url : image_url+'/city/'+paramscity.cityimage;

                  $("#listhotelsarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 130px;" alt="hotel Image"></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.hotel_name+'</h4><p class="area hide">'+place_area+'</p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+'</p></div><div class="col-md-2"> <p style="">at <i class="fa fa-inr"></i> '+room_cost+' more</p><br><div class="rating" style="color: #faa61a;"> '+rating_string+'</div><br><button type="button" id="viewhotelid" onclick="return ViewHotelDetails('+value.id+','+passparamscity+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button>  </div></div></div></div></div></li>');
                
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

  function ViewHotelDetails(hotelid,paramscity,type=false){
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
    //alert(type);
      $("#viewtotalroomsval").val(0);
      $("#viewtotalrooms").text(0);
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ route('city_hotels_details') }}" + '?hotel_id=' + hotelid;
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

            var rating_no = resultdata.ratings;
            $(".viewrating").removeClass('mdi-star');
            $(".viewrating").addClass('mdi-star-outline');
            if(rating_no!=null){
              for (r = 1; r <= rating_no; r++) {
                $("#viewrating-"+r).removeClass('mdi-star-outline');
                $("#viewrating-"+r).addClass('mdi-star');
              }
            }

             var roomtypeslist = resultdata.roomtypes;
             $("#view-hotel-roomtypes").empty();
           

            $.each(roomtypeslist, function(keya, valuea) {
              //console.log(valuea.pivot.price);
              var typecost = typeof(valuea.pivot.price)=='object' ? 0 : valuea.pivot.price;
              // if(typeof(typecost)=='object'){
              //   console.log(typeof(typecost) );
              // }
              
              var desc = valuea.pivot.description==null ? '' : valuea.pivot.description;

               $("#view-hotel-roomtypes").append('<h3> <span id="roomtypename_'+valuea.pivot.roomtype_id+'">'+valuea.room_type+'</span> <span class="pull-right">at <i class="fa fa-inr"></i> '+typecost+'</span></h3><div>'+desc+'</div><br>');
            
              $("#view-hotel-roomtypes").append('<div class="row"><div class="form-group"><label class="col-md-offset-2 col-sm-3 control-label" style="margin-top: 10px;">No of rooms:</label><div class="col-sm-4"><div class="input-field"><input type="text" id="hotel_rooms_'+valuea.pivot.roomtype_id+'" name="hotel_rooms_view" onKeyup="return CalculateRooms()" class="selectroom allow_number form-control" value="0"><input type="text" id="hotel_roomtype_'+valuea.pivot.roomtype_id+'" name="hotel_roomtype_view" readonly class="viewroomtypeid allow_number hide form-control" value="'+valuea.pivot.roomtype_id+'"><input type="text" id="hotel_roomtypecost_'+valuea.pivot.roomtype_id+'" name="hotel_roomtypecost_view" class="hotel_roomtypecost hide allow_number form-control" readonly value="'+typecost+'"><div class="input-highlight"></div></div></div></div></div>');
             
            }); 

            if(type==1){
              var total_rooms_count = 0;
              $(".hotel_room_type"+hotelid).each(function() {
                  var typeid = $(this).val();
                  var total_rooms = $("#type_hotel_number_count_"+hotelid+"_"+typeid).val();
                  $("#hotel_rooms_"+typeid).val(total_rooms);
                 // console.log(typeid+' '+total_rooms);
                 
                  total_rooms_count += parseInt(total_rooms);
                  
              });
              //console.log(total_rooms_count);
              $("#viewtotalroomsval").val(total_rooms_count);
              $("#viewtotalrooms").text(total_rooms_count);
            }
            $("#view-hotel-roomtypes").append('<div style="clear:both"></div>');

            $("#view-hotel-listdescription").html(resultdata.listing_descriptions);
            $("#viewhotelconfirmbtn").attr('onClick','return ConfirmHotel('+resultdata.id+','+paramscity.cityid+','+passparamscity+')');

            //$('#viewhotelconfirm').attr('onclick', 'return ConfirmHotel('+resultdata.id+','+paramscity.cityid+','+passparamscity+')');
          }
      });

    $("#CityHotelDetailsModal").modal();
  }


  function setFullImage(imageobj){
    var imagename = imageobj.imagename;
    $("#view-city-full-image").attr("src", imagename);
    
  }

  function ConfirmHotel(hotelid,cityid,paramscity){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    $("#picked-hotelmedia-"+cityid).empty();
    //var imagename ='';
    var place_area = paramscity.statename+' - '+paramscity.cityname;
    type =1;
    roomtyeid =1;
    if(type==1){
      var hotel_room_nos = $("#hotel_rooms_"+hotelid+"_"+roomtyeid).val();
       //console.log(hotel_room_nos);
    }else{
      var hotel_room_nos = 1;
    }

    // /console.log(hotelid+'room type'+roomtyeid);
    var viewtotalroomsval = $("#viewtotalroomsval").val();
    if(viewtotalroomsval>0){
    var url = "{{ route('city_hotels_details') }}" + '?hotel_id=' + hotelid;
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
              var a_count = 0;
            var amenitiesString = '';
            var amenities_len = amenitieslist.length;
            $.each(amenitieslist, function(keya, valuea) {
              //console.log(keya);
               if(a_count<4){
                amenitiesString += valuea.amenities_name;
                if(amenities_len-1!=keya){
                    amenitiesString += ', ';
                }
              }
               a_count++;
            }); 

            var roomtypeslist = resultdata.roomtypes;
            var roomtypesString = '';
          //  var roomtypes_len = roomtypeslist.length;
           // var room_cost = 0;
            // $.each(roomtypeslist, function(keya, valuea) {
            //   //console.log(keya);
             

            //   if(valuea.pivot.roomtype_id==roomtyeid){
            //     roomtypesString = valuea.room_type+' - '+hotel_room_nos;
            //     room_cost = valuea.pivot.price;
            //     //alert(roomtypesString);
            //   }

            //   // if(roomtypes_len-1!=keya){
            //   //     roomtypesString += ', ';
            //   // }
            // }); 

            var ratings = resultdata.ratings;
            var rating_string = '';
            if(ratings!=null){
              rating_string = ratings+' <i id="pickviewrating" class="pickviewrating mdi mdi-star"></i>';
            }

           // var total_roomcost = room_cost*hotel_room_nos;

          
            hiddenvalues = '';
            var total_roomcost = 0;
            $(".viewroomtypeid").each(function() {
                var roomtypeid = $(this).val();
                var roomnumbers = $("#hotel_rooms_"+roomtypeid).val();
                var roomtypecost = $("#hotel_roomtypecost_"+roomtypeid).val() == null ? 0 : $("#hotel_roomtypecost_"+roomtypeid).val();
                if(roomnumbers>0){
                  var roomtypename = $("#roomtypename_"+roomtypeid).text();
                  roomtypesString += roomtypename+' - '+roomnumbers;
                  roomtypesString += ', ';
                  hiddenvalues +='<input type="text" class="hide hotel_room_type'+hotelid+'" name="hotel_room_type_'+resultdata.id+'[]"  id="hotel_room_type_'+hotelid+'_'+roomtypeid+'" value="'+roomtypeid+'" />';
                  hiddenvalues +='<input type="text" class="hide type_hotel_number_count" name="type_hotel_number_count_'+resultdata.id+'[]" id="type_hotel_number_count_'+hotelid+'_'+roomtypeid+'" value="'+roomnumbers+'"/>';
                  hiddenvalues +='<input type="text" class="hide hotel_room_cost" name="hotel_room_cost_'+resultdata.id+'[]"  id="hotel_room_cost_'+hotelid+'_'+roomtypeid+'" value="'+roomtypecost+'" />';
                  total_roomcost +=parseFloat(roomnumbers)*parseFloat(roomtypecost);
                }
            });

              hiddenvalues += '<input type="text" class="hide" name="second_hotel_'+cityid+'[]" id="second_hotel_'+cityid+'" value="'+resultdata.id+'"/><input type="text" class="hide" name="second_city_id[]" id="second_city_id" value="'+cityid+'"/><input type="text" class="hide hotel_cost" name="hotel_cost_'+resultdata.id+'[]"  id="hotel_cost_'+resultdata.id+'" value="'+total_roomcost+'" /><input type="text" class="hide hotel_number_count" name="hotel_number_count_'+resultdata.id+'[]"  id="hotel_number_count_'+resultdata.id+'" value="'+viewtotalroomsval+'" />';

            if(!$('#picked_city_hotel_'+hotelid).length){
              $("#hotel_citydata_"+cityid).append('<div id="picked_city_hotel_'+hotelid+'" class="card media-card-sm"><div id="picked-hotelmedia-'+hotelid+'" class="media"><div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="Hotel image"></a></div><div class="media-body p10"><h4 class="media-heading">'+resultdata.hotel_name+'</h4><p>'+place_area+' <span class="pull-right" style="font-size: 16px;">'+rating_string+'</span></p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <span class="" style="margin-left: 20px;font-weight:bold;"><i class="fa fa-inr"></i> '+total_roomcost+' </span> <button id="edit_hotel_button_'+hotelid+'" style="margin-left: 10px;" type="button" onclick="EditHotel('+passparamscity+','+hotelid+',1)" class="btn btn-sm blue waves-effect waves-light ">Change</button><button id="remove_hotel_button_'+hotelid+'" style="margin-left: 10px;" type="button" onclick="return RemoveHotel('+hotelid+', '+cityid+',1)" class="btn btn-sm red waves-effect waves-light ">Remove</button></p>'+hiddenvalues+'</div></div></div><div style="clear: both;"></div>');
              $("#summary-hotelarea-"+cityid).append('<div id="summary-hotel-picked-'+hotelid+'" class="" style="cursor: move;"><div id="summary_hotel_id_'+hotelid+'" class="msg-wrapper" style="cursor: move;"> <img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+hotelid+'" src="'+imagelocation+'" alt="" class="avatar "><a id="summary-hotel-name-'+hotelid+'" class="msg-from" style="display: initial;">'+resultdata.hotel_name+'</a><br><a id="summary-hotel-type-'+hotelid+'" class="msg-sub">'+roomtypesString+'</a><p id="summary-features-'+hotelid+'">'+amenitiesString+'</p></div><div style="clear: both; cursor: move;"></div></div>');
              // $("#summary_hotel_id_"+cityid+" #summary-hotel-img-"+cityid).attr("src", imagelocation);
              // $("#summary_hotel_id_"+cityid+" #summary-hotel-name-"+cityid).html( resultdata.hotel_name);
              // $("#summary_hotel_id_"+cityid+" #summary-hotel-type-"+cityid).html( roomtypesString);
              // $("#summary_hotel_id_"+cityid+" #summary-features-"+cityid).html( amenitiesString);
            }else{
              $("#picked_city_hotel_"+hotelid).html('<div id="picked-hotelmedia-'+hotelid+'" class="media"><div class="media-left media-img"> <a href="#"><img class="responsive-img" src="'+imagelocation+'" alt="Hotel image"></a></div><div class="media-body p10"><h4 class="media-heading">'+resultdata.hotel_name+'</h4><p>'+place_area+' <span class="pull-right" style="font-size: 16px;">'+rating_string+'</span></p><p class="sub-text mt10">'+amenitiesString+'</p><p class="sub-text mt10">'+roomtypesString+' <span class="" style="margin-left: 20px;font-weight:bold;"><i class="fa fa-inr"></i> '+total_roomcost+' </span> <button id="edit_hotel_button_'+hotelid+'" style="margin-left: 10px;" type="button" onclick="EditHotel('+passparamscity+','+hotelid+',1)" class="btn btn-sm blue waves-effect waves-light ">Change</button><button id="remove_hotel_button_'+hotelid+'" style="margin-left: 10px;" type="button" onclick="return RemoveHotel('+hotelid+', '+cityid+')" class="btn btn-sm red waves-effect waves-light ">Remove</button></p>'+hiddenvalues+'</div></div>');
               $("#summary-hotel-picked-"+hotelid).html('<div id="summary_hotel_id_'+hotelid+'" class="msg-wrapper" style="cursor: move;"> <img style="width:80px !important;height:80px !important;" id="summary-hotel-img-'+hotelid+'" src="'+imagelocation+'" alt="" class="avatar "><a id="summary-hotel-name-'+hotelid+'" class="msg-from" style="display: initial;">'+resultdata.hotel_name+'</a><br><a id="summary-hotel-type-'+hotelid+'" class="msg-sub">'+roomtypesString+'</a><p id="summary-features-'+hotelid+'">'+amenitiesString+'</p></div><div style="clear: both; cursor: move;"></div>');
              // $("#summary_hotel_id_"+cityid+" #summary-hotel-img-"+cityid).attr("src", imagelocation);
              // $("#summary_hotel_id_"+cityid+" #summary-hotel-name-"+cityid).html( resultdata.hotel_name);
              // $("#summary_hotel_id_"+cityid+" #summary-hotel-type-"+cityid).html( roomtypesString);
              // $("#summary_hotel_id_"+cityid+" #summary-features-"+cityid).html( amenitiesString);
            }
            
        }
    });
   }else{
     alert("no rooms added for this hotel");
   }
    
    //alert(hotelid);
    $("#CityHotelDetailsModal").modal('hide');
    $("#CityHotelModal").modal('hide')
  }

  function PickActity(paramscity,day_number){
      var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";

      $("#listactivitiesarea").empty();
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ route('city_activities') }}" + '?city_id=' + paramscity.cityid;
      $("#activity_day_number").val(day_number);
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

                  $("#listactivitiesarea").append('<li class="list-group-item"> <div class="card "> <div class="media"> <div class="media-left media-img"> <a><img class="responsive-img" src="'+imagelocation+'" style="height: 125px;" alt="Activity Image"></a></div><div class="media-body p8"> <div class="row"> <div class="col-md-10"> <h4 class="media-heading name">'+value.title_name+'</h4><p class="area">'+place_area+'</p><p class="sub-text mt10">'+activityduration+'</p></div><div class="col-md-2"> <p class="hide" style="margin-bottom: 10px;">at '+value.amount+'</p><button type="button" id="viewactivityid" onclick="return ViewActivityDetails('+value.id+','+passparamscity+','+day_number+')" style="margin-bottom: 10px;" class="btn form-control btn-sm teal waves-effect waves-theme">View</button> <button  id="activitylistconfirm" type="button" onclick="return ConfirmActivity('+value.id+','+paramscity.cityid+','+passparamscity+','+day_number+')" class="btn form-control btn-sm green waves-effect waves-theme">Confirm</button> </div></div></div></div></div></li>');
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


  function ViewActivityDetails(activityid,paramscity,daynumber){
    //console.log(activityid);
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
      //console.log(paramscity);
      var place_area = paramscity.statename+' - '+paramscity.cityname;
      var url = "{{ route('city_activity_details') }}" + '?activity_id=' + activityid;
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
            $("#view_activity_day_number").val(daynumber);
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
            $('#viewactivityconfirm').attr('onclick', 'return ConfirmActivity('+activityid+','+paramscity.cityid+','+passparamscity+','+daynumber+')');
          }
      });

    $("#CityActivityDetailsModal").modal();
  }

  function setActivityFullImage(imageobj){
    var imagename = imageobj.imagename;
    $("#view-activity-full-image").attr("src", imagename);
    
  }

  function ConfirmActivity(activityid,cityid,paramscity,daynumber){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' }";
    //$("#picked-hotelmedia-"+cityid).empty();
    //var imagename ='';
    var place_area = paramscity.statename+' - '+paramscity.cityname;
    var adult_count = $("#adult-count-val").val();
    var child_count = $("#child-count-val").val();
    var total_count = parseInt(adult_count)+parseInt(child_count);

    var url = "{{ route('city_activity_details') }}" + '?activity_id=' + activityid;
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

            var total_act_cost = resultdata.amount==null || resultdata.amount=='' ? 0 : total_count*resultdata.amount;

            var hiddenvalues = '<input type="text" class="hide" name="second_activity_'+cityid+'_'+daynumber+'[]" id="second_activity_'+cityid+'" value="'+resultdata.id+'"/><input type="text" class="hide activity_cost" name="activity_cost_'+cityid+'_'+daynumber+'[]"  id="activity_cost_'+resultdata.id+'" value="'+total_act_cost+'" /><input type="text" class="hide activity_person_cost" name="activity_person_cost_'+cityid+'_'+daynumber+'[]"  id="activity_person_cost_'+resultdata.id+'" value="'+resultdata.amount+'" />';

            if(!$('#city_activity_id_'+resultdata.id).length){
              $("#place-activitylist-"+cityid+"-"+daynumber).append('<li><div id="city_activity_id_'+resultdata.id+'" class="msg-wrapper"><img src="'+imagelocation+'" alt="" class="avatar "><a class="msg-sub">'+resultdata.title_name+'</a><a class="msg-from hide"><i class="fa fa-inr"></i> <span id="total_activity_value_'+resultdata.id+'">'+total_act_cost+'</span></a><p>'+hiddenvalues+'<a onclick="return RemoveActivity('+resultdata.id+','+cityid+')" style="color: red;cursor:pointer;" class="">Remove</a></p></div></li>');
              var act_overview  = resultdata.overview != null ? resultdata.overview : '';
               var activityduration = (resultdata.duartion_hours/60).toFixed(0)+' hour '+(resultdata.duartion_hours%60)+' minutes';
              $("#summary-activity-section-"+cityid+"-"+daynumber).append('<div id="summary_city_activity_id_'+resultdata.id+'" class=""><h3 style="text-decoration: underline;">'+resultdata.title_name+' <a class="pull-right hide"><i class="fa fa-inr hide"></i> <span id="summary_activity_value_'+resultdata.id+'">'+total_act_cost+'</span></a></h3><div class="sub-summary-activity"><h5>Overview</h5><div id="activity-summary-overview" class="activity-description"> '+act_overview+'</div><h5>Duration: '+activityduration+'</h5></div></div>');
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
        $('#place-activities').append($('#dummy-activities #dummy-place-activities .picked-activityli-'+cityval));
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
        // $("#overall-summary").dragsort({
        //     dragSelector: "div",
        //     dragBetween: true,
        //     dragEnd: saveOrder,
        //     //placeHolderTemplate: "<li class='placeHolder'><div></div></li>",
        //     cursor: "move"
        // });

        
       
    });
    $(document).on('change', '.place-night-select', function() {
      //alert($(this).val());
      // $("#place_night_count_"+city_id_night).val(night_count);
      // $("#place_night_select_"+city_id_night).val(night_count);
      CalculateDaysNights();
      RegenerateActivities();
      
    });
    $(document).on('input', '.allow_decimal', function(){
     var self = $(this);
     self.val(self.val().replace(/[^0-9\.]/g, ''));
     if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
     {
       evt.preventDefault();
     }
   });
     $(document).on('input', '.allow_number', function(){
     var self = $(this);
     self.val(self.val().replace(/[^0-9]/g, ''));
     if ((evt.which < 48 || evt.which > 57)) 
     {
       evt.preventDefault();
     }
   });
  $(document).on('keyup', '#transport_charges,#additional_charges', function(){
     //var total_package_value = $("#total_package_value").val();
     var transport_charges = $("#transport_charges").val();
     var additional_charges = $("#additional_charges").val();
     var total_accommodation = $("#total_accommodation").val();
     var total_activities = $("#total_activities").val();
     
     //total_package_value = total_package_value=='' ? 0 : parseFloat(total_package_value);
     additional_charges = additional_charges=='' ? 0 : parseFloat(additional_charges);
     transport_charges = transport_charges=='' ? 0 : parseFloat(transport_charges);
     total_accommodation = total_accommodation=='' ? 0 : parseFloat(total_accommodation);
     total_activities = total_activities=='' ? 0 : parseFloat(total_activities);
     var total_package_value = parseFloat(additional_charges)+parseFloat(transport_charges)+parseFloat(total_accommodation)+parseFloat(total_activities);
     $("#total_package_value").val(total_package_value);
     // /alert(total_pack_cost);
     var gst_per = $("#gst_per").val();
     gst_per = gst_per=='' ? 0 : parseFloat(gst_per);
     var tax_amount = ((parseFloat(total_package_value)*gst_per)/100).toFixed(2);
     $("#gst_amount").val(tax_amount);
     $("#total_amount").val((parseFloat(tax_amount)+parseFloat(total_package_value)).toFixed(2));
   });

  function EditHotel(paramscity,hotelid,type){
    var passparamscity = "{  cityid: "+paramscity.cityid+",  stateid: "+paramscity.stateid+", cityname: '"+paramscity.cityname+"', statename: '"+paramscity.statename+"' , cityimage: '"+paramscity.cityimage+"' , type: '"+type+"' }";
    var cityid = paramscity.cityid;
    ViewHotelDetails(hotelid,paramscity,type);
    // $("#hotel_rooms_"+hotelid+"_"+roomtyeid).val(room_nos);
    // $("#viewhotelconfirm_"+hotelid+"_"+roomtyeid).removeClass('green');
    // $("#viewhotelconfirm_"+hotelid+"_"+roomtyeid).addClass('blue');
  }

  function CalculateRooms(){
    var total_rooms = 0;
    $(".selectroom").each(function() {
      var roomnumber = $(this).val();
      roomnumber = roomnumber=='' ? 0 : parseInt(roomnumber);
      total_rooms += parseInt(roomnumber);

    });
    $("#viewtotalrooms").text(total_rooms);
    $("#viewtotalroomsval").val(total_rooms);

  }

  function RemoveHotel(hotelid,cityid){
    $("#picked_city_hotel_"+hotelid).remove();
    $("#summary-hotel-picked-"+hotelid).remove();
  }

  function AddMoreAirport(cityid){
 // alert(cityid);
   $("#moreCharges_"+cityid).append($("#initialCharge_"+cityid).clone().find("input:text").val("").end());
   $("#moreCharges_"+cityid).append('<div class="col-md-1"><button type="button" onclick="return RemoveMoreAirport(this,'+cityid+')" class="btn btn-circle theme waves-effect red waves-circle waves-light"><i class="mdi mdi-delete"></i></button></div>');
  }
  function RemoveMoreAirport(data_element,cityid){
   // console.log($(data_element).parent().prev());

    $(data_element).parent().prev().remove();
    $(data_element).remove();
    CalculateTransport();
  }

  function CalculateTransport(){
    var total_transport = 0;
    $(".airportpickup").each(function() {
      airportpickup = $(this).val()=='' ? 0 : parseFloat($(this).val());
      total_transport = parseFloat(total_transport) + parseFloat(airportpickup);
    });
    $(".driverbeta").each(function() {
       driverbeta = $(this).val()=='' ? 0 : parseFloat($(this).val());
      total_transport = parseFloat(total_transport) + parseFloat(driverbeta);
    });
    $(".tollparking").each(function() {
       tollparking = $(this).val()=='' ? 0 : parseFloat($(this).val());
      total_transport = parseFloat(total_transport) + parseFloat(tollparking);
    });
    $(".interestrate").each(function() {
       interestrate = $(this).val()=='' ? 0 : parseFloat($(this).val());
      total_transport = parseFloat(total_transport) + parseFloat(interestrate);
    });
    $("#transport_charges").val(total_transport);
    $("#totaltransportcharges").text(total_transport);
    $("#transport_charges").trigger('keyup');
  }

  function CalculateDaysNights(){
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
  }

  function RegenerateActivities(){
    $("#place-activities").empty();
    $(".activities-summary").empty();
    $(".summary-activity-citysection").empty();
    var startday = 0;
    $(".place-night-select").each(function() {
       var night_count = parseInt($(this).val());
       dropdown_id = $(this).attr('id');
       dropdown_arr = dropdown_id.split('_');
       var city_id_night = dropdown_arr[3];
       //startday = parseInt(startday)+parseInt(night_count);
       var summary_city_name = $("#summary-city-name-"+city_id_night).html();
       for (var i = 1; i <= night_count; i++) {
           daynumber = parseInt(startday)+parseInt(i);
           params = $("#picked-li-"+city_id_night).data('params')
           $("#place-activities").append('<li data-cityid="'+city_id_night+'" id="picked-activityli-'+city_id_night+'-'+daynumber+'" class="tl-item list-group-item item-avatar picked-activityli-'+city_id_night+' msg-row unread"> <div class="timeline-icon ti-text">'+summary_city_name+' - Day '+daynumber+'</div><ul id="place-activitylist-'+city_id_night+'-'+daynumber+'" style="list-style: none !important;" class="place-activitylist" data-listidx="0"></ul><a id="pick-actitity-link-'+city_id_night+'" href="#" onclick="PickActity('+params+','+daynumber+')" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>');

           $("#summary-activity-citysection-"+city_id_night).append('<b style="font-size:18px;">Day '+daynumber+'</b><div id="summary-activity-section-'+city_id_night+'-'+daynumber+'" class="activities-summary"> </div>');
       }
       startday = parseInt(startday) + parseInt(night_count);
    });
    //$("#place-activities").append('<li data-cityid="3" id="picked-activityli-3-1" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">Bintulu - Day 4</div><ul id="place-activitylist-3" style="list-style: none !important;" class="place-activitylist" data-listidx="0"></ul><a id="pick-actitity-link-3" href="#" onclick="PickActity({ },1)" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li><li data-cityid="28" id="picked-activityli-28-2" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">Miri - Day 2</div><ul id="place-activitylist-28" style="list-style: none !important;" class="place-activitylist" data-listidx="0"></ul><a id="pick-actitity-link-28" href="#" onclick="PickActity({ },2)" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li><li data-cityid="5" id="picked-activityli-5-3" class="tl-item list-group-item item-avatar msg-row unread"> <div class="timeline-icon ti-text">Victoria - Day 3</div><ul id="place-activitylist-5" style="list-style: none !important;" class="place-activitylist" data-listidx="0"></ul><a id="pick-actitity-link-5" href="#" onclick="PickActity({ },3)" class="btn btn-sm purple waves-effect waves-light pull-right"><i class="mdi mdi-plus left"></i>Add activity</a></li>');

  }

  $("#place-sortList").dragsort({
      dragSelector: "li",
      dragBetween: true,
      dragEnd: RegenerateOrder,
    });
   function RegenerateOrder(){
    //  alert('hi');
      
      $("#summary-cities").empty();

      // $("#dummyList").empty();
      // $("#dummyList").append($("#place-sortList").clone());
      // $('#dummyList #place-sortList').prop('id', 'dummy-place-sortList');

      $("#dummy-hotels,#dummy-activities,#dummyListNights,#dummySummaryList,#dummy-transports").empty();
      $("#dummy-hotels").append($("#place-hotels").clone());
      $('#dummy-hotels #place-hotels').prop('id', 'dummy-place-hotels');

      //$("#dummy-activities").append($("#place-activities").clone());
      //$('#dummy-activities #place-activities').prop('id', 'dummy-place-activities');

      $("#dummySummaryList").append($("#overall-summary").clone());
      $('#dummySummaryList #overall-summary').prop('id', 'dummy-overall-summary');

      $("#dummy-transports").append($("#place-transports").clone());
      $('#dummy-transports #place-transports').prop('id', 'dummy-place-transports');

      $("#dummyListNights").append($("#destination-night-area").clone());
      $('#dummyListNights #destination-night-area').prop('id', 'dummy-destination-night-area');
      

        var summarycount = $('#overall-summary li.summary-activity').length;
        $("#place-hotels,#place-activities,#destination-night-area,#overall-summary,#place-transports").empty();
        //$("").empty();
        var data = $("#place-sortList li").map(function (index) {

        // console.log(placelistarray);
        var cityval = $(this).data('cityid');
        //$('#place-sortList').append($('#dummyList #dummy-place-sortList #picked-li-'+cityval));
        $('#place-hotels').append($('#dummy-hotels #dummy-place-hotels #picked-hotelli-'+cityval));
        //$('#place-activities').append($('#dummy-activities #dummy-place-activities .picked-activityli-'+cityval));
        $('#destination-night-area').append($('#dummyListNights #dummy-destination-night-area #place_night_'+cityval));

        $('#overall-summary').append($('#dummySummaryList #dummy-overall-summary #summary-activityli-'+cityval));

        $('#place-transports').append($('#dummy-transports #dummy-place-transports #transportli-'+cityval));

        var summary_city_name = $("#summary-city-name-"+cityval).html();
        $("#summary-cities").append(summary_city_name+', ');

         //$("#place-activitylist-"+cityval).dragsort();
          
          return $(this).children().find(".summary-city").val();
        }).get();
        $("#dummyList,#dummy-hotels,#dummy-activities,#dummyListNights,#dummySummaryList,#dummy-transports").empty();
       

       $(".place_night_count").each(function() {
          dropdown_id = $(this).attr('id');
          dropdown_arr = dropdown_id.split('_');
          city_id_night = dropdown_arr[3];
          $("#place_night_select_"+city_id_night).val($(this).val());
        });
       CalculateDaysNights();
       RegenerateActivities();
    }
      $(document).on('keyup', '#transport_charges,#additional_charges,#additional_transport', function(){
     //var total_package_value = $("#total_package_value").val();
     var transport_charges = $("#transport_charges").val();
     var additional_charges = $("#additional_charges").val();
     var total_accommodation = $("#total_accommodation").val();
     var total_activities = $("#total_activities").val();

     additional_charges = additional_charges=='' ? 0 : parseFloat(additional_charges);
     transport_charges = transport_charges=='' ? 0 : parseFloat(transport_charges);

     $("#additional_transport").val(parseInt(additional_charges)+parseInt(transport_charges));
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


</script>