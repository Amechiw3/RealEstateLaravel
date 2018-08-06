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
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        
        <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
        <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">

    </head>
  
    <body class="hold-transition skin-red layout-top-nav">
        <div class="wrapper">
            <header class="main-header">
                <nav class="navbar navbar-static-top" role="navigation">
                    <div class="container">
                        <div class="navbar-header">
                            <a href="#" class="navbar-brand"><b>Real</b>Estate</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                @guest
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Registro</a></li>
                                @else
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <small class="bg-red">Online</small>
                                        <span class="hidden-xs">{{Auth::user()->name .' '. Auth::user()->appaterno .' '. Auth::user()->apmaterno }}</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                    <!-- User image -->
                                        <li class="user-header">
                                            <img src="{{ asset('uploads/usuarios/'. Auth::user()->imagen) }}" class="img-circle" alt="">
                                            <p>
                                                {{ Auth::user()->tiposusuarios->tipousuario }}
                                                <small>{{ Auth::user()->email }}</small>
                                            </p>
                                        </li>

                                        <!--
                                        <li class="user-body">
                                        </li>-->
                    
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                                <div class="pull-left">
                                                <a href="{{URL::action('UsuariosController@show', Auth::user()->usuario)}}" class="btn btn-success btn-flat  btn-block">Perfil</a>
                                                </div>
                                            <div class="pull-right">
                                                <a href="/Logout" class="btn btn-danger btn-flat btn-block">Cerrar Sesion</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                @endguest
                            </ul>         
                        </div>
                    </div>
                </nav>
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">          
                    <div class="row">
                        <div class="col-md-12">
                            <!--Contenido-->
                            @yield('content')
                            <!--Fin Contenido-->
                        </div>
                    </div>
                </section>
            </div>
        </div>
      
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.0
            </div>
            <strong>Copyright &copy; 2018-2020 <a href="#">Martin Fierro</a>.</strong> All rights reserved.
        </footer>
      
        <!-- jQuery 2.1.4 -->        
        <script src="{{ asset('js/jQuery-2.1.4.min.js') }}"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('js/app.min.js') }}"></script>  

        @yield('customScript')

    </body>
</html>
