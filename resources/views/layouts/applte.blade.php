<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('css/AdminLTE.min.css') }}">
        
        <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{ asset('css/_all-skins.min.css') }}">
        
        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    </head>
  
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="#">
                    <b>Real</b>Estate
                </a>
            </div>
            <div class="login-box-body">
                <p class="login-box-msg">Inicia session</p>
                @yield('content')
            </div>
        </div>
      
        <!-- jQuery 2.1.4 -->        
        <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/app.min.js') }}"></script>  
    </body>
</html>
