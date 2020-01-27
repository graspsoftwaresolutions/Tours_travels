<!DOCTYPE html>
<html class="no-js">
<link href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/flexslider.css') }}" rel="stylesheet" type="text/css">
<head>	
</head>

<body>
<div class="flexslider">
  <ul class="slides">
    <li>
      <img src="{{asset('public/assets/images/no_image.jpg')}}" />
    </li>
    <li>
      <img src="{{asset('public/assets/images/no_image.jpg')}}" />
    </li>
    <li>
      <img src="{{asset('public/assets/images/no_image.jpg')}}" />
    </li>
    <li>
      <img src="{{asset('public/assets/images/no_image.jpg')}}" />
    </li>
  </ul>
</div>
<!-- <script src="{{ asset('public/web-assets/js/jquery.min.js') }}"></script> -->

<script>
$(document).ready(function(){

    $('.flexslider').flexslider({
    animation: "slide"
  });
 
});
</script>
</body>
</html>