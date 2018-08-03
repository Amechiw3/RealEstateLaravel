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
  
    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="#" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>R</b>E</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Real Estate</b></span>
                </a>

                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Navegación</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->              
                            <!-- User Account: style can be found in dropdown.less -->
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
                        </ul>
                        
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li class="header">Real Estate</li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-home"></i>
                                <span>Almacén</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="Propiedades"><i class="fa fa-circle-o"></i>Propiedades</a></li>
                                <li><a href="TiposPropiedades"><i class="fa fa-circle-o"></i>Categorías</a></li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-bank"></i>
                                        <span>Entidades</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="Paises"><i class="fa fa-circle-o"></i>Paises</a></li>
                                        <li><a href="Estados"><i class="fa fa-circle-o"></i>Estados</a></li>
                                        <li><a href="Ciudades"><i class="fa fa-circle-o"></i>Ciudades</a></li>
                                    </ul>
                                </li>
                                <li><a href="/Documentos"><i class="fa fa-circle-o"></i>Documentos</a></li>                                
                            </ul>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-th"></i>
                                <span>Compras</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="compras/ingreso"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                                <li><a href="compras/proveedor"><i class="fa fa-circle-o"></i> Proveedores</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Ventas</span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="ventas/venta"><i class="fa fa-circle-o"></i> Ventas</a></li>
                                <li><a href="ventas/cliente"><i class="fa fa-circle-o"></i> Clientes</a></li>
                            </ul>
                        </li>
                                
                        <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i> <span>Acceso</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="/Usuarios"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                            
                        </ul>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                            <!--<small class="label pull-right bg-red">PDF</small>-->
                        </a>
                        </li>
                        <li>
                        <a href="#">
                            <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                            <!--<small class="label pull-right bg-yellow">IT</small>-->
                        </a>
                        </li>
                                    
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">
                                        @yield('module')
                                    </h3>
                                    <div class="box-tools pull-right">                                        
                                        @yield('option')
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                                
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!--Contenido-->
                                            @yield('content')
                                            <!--Fin Contenido-->
                                        </div>
                                    </div>    
                                </div>

                            </div>
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