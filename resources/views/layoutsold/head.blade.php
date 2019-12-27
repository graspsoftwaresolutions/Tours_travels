<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Tours and Travels">
<meta name="keywords" content="Tours and Travels">
<meta name="author" content="Tours and Travels">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Tours and Travels') }}</title>
<link rel="apple-touch-icon" href="{{ asset('public/assets/images/logo.png') }}">
<link rel="shortcut icon" type="image/x-icon" href="{{ asset('public/assets/images/logo.png') }}">
<link href="{{ asset('public/assets/dist/css/plugins/jvectormap.css') }}" rel="stylesheet" type="text/css">

<!-- c3 charts -->
<link href="{{ asset('public/assets/dist/css/plugins/c3.css') }}" rel="stylesheet" type="text/css">

<link class="rtl_switch_css" href="{{ asset('public/assets/dist/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/dist/css/mdicons.min.css') }}" rel="stylesheet" type="text/css">
<link class="rtl_switch_css" href="{{ asset('public/assets/dist/css/app.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/dist/css/theme.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/dist/css/skins/light-skin.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('public/assets/dist/css/skins/dark-skin.css') }}" rel="stylesheet" type="text/css">

<link href="{{ asset('public/assets/demo/demo.css') }}" rel="stylesheet" type="text/css">		
@section('headSection')
    @show
<style>
    .modal-header {
        border-bottom: 0;
        padding: 10px;
    }
    .input-field div.help-block{
	    color: #A94442 !important;
	    padding: 5px 10px;
	}
    .select-row{
        margin-top: 6px;
    }
    body.light-skin .has-error .help-block {
        background: none !important;
    }
    body.light-skin .has-error label {
        color: #212121 !important;
    }
    td, th {
        padding: 10px 8px !important;
      
    }
 </style>
@section('headSecondSection')
    @show


