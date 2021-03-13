<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title> {{  config('app.name') }} </title>
    <link rel="icon" type="image/x-icon" href="{{ asset('front/assets/img/favicon.ico') }}"/>
    <link href="{{ asset('front/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('front/assets/js/loader.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('front/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('front/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('front/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front/assets/css/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @yield('css')
    <style>
        .logo-img{
            width:90px;
            height:90px
        }
        .delete-button{
            cursor:pointer;
            background: #be1104; 
            padding: 6px 8px; 
            color: #fff;
            border-radius: 19px;
            border: solid 1px #be1104;
        }
        .delete-button:hover{
            cursor:pointer;
            background: #fff; 
            padding: 6px 8px; 
            color: #964d47;
            border-radius: 19px;
            border: solid 1px #964d47;
        }
        .edit-button{
            cursor:pointer;
            background: #1b55e2; 
            padding: 8px 5px; 
            color: #fff;
            border-radius: 19px;
            border: solid 1px #1b55e2;
        }
        .edit-button:hover{
            cursor:pointer;
            background: #fff; 
            padding: 8px 5px; 
            color: #1b55e2;
            border-radius: 19px;
            border: solid 1px #1b55e2;
        }
       
    </style>
</head>
<body class="sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    <div class="header-container fixed-top">
        @include('partials.header')
    </div>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
       @include('partials.sidebar')
        <!--  END SIDEBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
        @include('partials.notifications')
           @yield('content')
        </div>
        <!--  END CONTENT AREA  -->


    </div>
    <!-- END MAIN CONTAINER -->

    @yield('js')
    
</body>
</html>