<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->

    

</head>
<body class="theme-mda no-loader lr-page">
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset('public/assets/dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/assets/dist/js/bower.min.js') }}"></script>
    <!-- app -->
    <script src="{{ asset('public/assets/dist/js/app.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#forgotPasswordForm').hide();

            //Toggle between forms
            $('.form-type .btn-flat').click(function() {

              $('form').hide();
              if ($(this).hasClass('sign-in')) {
                $('#signInForm').show();
              } 
              else if ($(this).hasClass('forgot-password')) {
                $('#forgotPasswordForm').show();
              }
            });
        });
    </script>      
</body>
</html>
