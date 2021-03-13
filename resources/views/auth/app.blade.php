<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('front/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('front/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('front/assets/css/authentication/form-1.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/forms/theme-checkbox-radio.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/assets/css/forms/switches.css')}}">
    <style>
        .error{
            color:#be1104;
        }
        .alert-danger{
        width: 30%;
        position: fixed;
        top: 15px;
        z-index: 100;
        right: 20px;
        color: #fff !important;
        background: #be1104 !important;
        border-color: #be1104 !important;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    </style>
</head>
<body class="form">
    @yield('content')

  
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('front/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('front/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('front/bootstrap/js/bootstrap.min.js') }}"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('front/assets/js/authentication/form-1.js') }}"></script>

</body>
</html>
