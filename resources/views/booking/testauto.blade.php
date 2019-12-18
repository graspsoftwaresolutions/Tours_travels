<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <!-- <script src = "https://code.jquery.com/jquery-1.10.2.js"></script> -->
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      
      <!-- Javascript -->
      <script>
      var row_required = 1;
$('#table-mytable tr').eq(row_required).html('<td>Bar</td>');
       </script>
   </head>
   
   <body>
      <!-- HTML --> 
      <table id="table-mytable" border="1">
  <tbody>
    <tr><td>Foo</td></tr>
    <tr><td>Foo</td></tr>
    <tr><td>Foo</td></tr>
  </tbody>
</table>
   </body>
</html>