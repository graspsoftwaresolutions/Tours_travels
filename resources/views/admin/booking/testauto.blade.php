<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>jQuery UI Autocomplete functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
    
      <script src="http://localhost/Tours_travels/public/assets/dist/js/jquery.min.js"></script>
      <!-- <script src = "https://code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      
      <!-- Javascript -->
      <script>
      
 
      
      
      
      
      @php $result = json_encode($data);  @endphp
        //  $(function() {
        //     // var availableTutorials  =  [
        //     //    "ActionScript",
        //     //    "Bootstrap",
        //     //    "C",
        //     //    "C++",
        //     // ];
        //     var availableTutorials =  @php echo $result;   @endphp ;
        //     $( "#automplete-1" ).autocomplete({
        //        source: availableTutorials ,
        //        minLength: 3,
        //         select: function (event, ui) {                    
        //             $("#automplete-2").val(availableTutorials.email);
        //         }                    
        //     });
        //     });
        (function ($) {
  $(document).ready(function () {

    $(".decreaseVal").click(function() {
  var input_el=$(this).next('input');
  var v= input_el.val()-1;
  if(v>=input_el.attr('min'))
  input_el.val(v)
});


$(".increaseVal").click(function() {
  var input_el=$(this).prev('input');
  var v= input_el.val()*1+1;
  if(v<=input_el.attr('max'))
  input_el.val(v)
});











      $('#my_ajax').autocomplete({
        // minChars: 1,
        source: function(request, response) {
            $.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});
          $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{route('customer_autocomplete')}}",
            data: 'action=my_ajax'+'&name='+request.term,
            success: function(data) {
              response( $.map( data, function( item ) {
                  console.log(data);
                 // $('#firstname').val(item.value);  
                  var object = new Object();
                  object.label = item.value;
                  object.value = item.name;
                   object.city_name = item.city_name;
                   object.state_name = item.state_name;
                   object.zipcode = item.zipcode;
                   object.address_one = item.address_one;
                   object.address_two = item.address_two;
                   object.email = item.email;
                   object.phone = item.phone;
                  return object
              }));
              // response( $.map( data, function( item ) {
              //     return {
              //         label: item.title,
              //         value: item.title
              //     }
              // }));

            }
          });
        },
        select: function (event, ui) {
          $("#my_ajax").val(ui.item.value);
          $("#city_name").val(ui.item.city_name);
          $("#state_name").val(ui.item.state_name);
          $("#zipcode").val(ui.item.zipcode);
          $("#address_one").val(ui.item.address_one);
          $("#address_two").val(ui.item.address_two);
          $("#phone").val(ui.item.phone);
          $("#email").val(ui.item.email);
        //   $("#email").val(ui.item.phone);
         }
      });

  });

 })(jQuery);
            
      </script>
   </head>
   
   <body>
      <!-- HTML --> 
      <div class = "ui-widget">
         <!-- <p>Type "a" or "s"</p>
         <label for = "automplete-1">Tags: </label>
         <input id = "automplete-1"> 
         <input id = "automplete-2"> Name -->
         <!-- <div class="form-group">
            <input id="my_ajax" autofocus="" value="" type="text" name="q" placeholder="my_ajax" style="width:100%;max-width:600px;outline:0" autocomplete="off">
            <input id="phone" name="phone" type="text" value=''>
            <input id="email" name="email" type="text" value=''>
            <input id="id" name="user_id" type="text" value=''>
            <input id="email" name="email" type="text" value=''>
            <input id="city_name" name="email" type="text" value=''>
            <input id="state_name" name="state_name" type="text" value=''>
            <input id="zipcode" name="zipcode" type="text" value=''>
            <input id="address_one" name="address_one" type="text" value=''>
            <input id="address_two" name="address_two" type="text" value=''>
            </div> -->
        
<input type="button" value="-" class="decreaseVal">
<input type="number" min="1" max="22" value="20" class="val" disabled>
<input type="button" value="+" class="increaseVal">

<input type="button" value="-" class="decreaseVal">
<input type="number" min="1" max="60" value="40" class="val" disabled>
<input type="button" value="+" class="increaseVal">

<div class="select_listing adult"><div class="row "><div class="col-md-2"><label class="fixed-label"></label> </div><div class="col-md-3"><label class="fixed-label">{{__('1. Adult with age') }}</label></div><div class="col-md-5"><input type="button" value="-" class="decreaseVal"><input type="number" min="1" max="22" value="20" class="val" disabled> <input type="button" value="+" class="increaseVal"> </div> <br>



<input type="button" value="-" class="decreaseVal"><input type="number" min="1" max="22" value="20" class="val" disabled><input type="button" value="+" class="increaseVal">
      </div>
   </body>
</html>