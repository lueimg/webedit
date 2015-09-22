<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="" rel="stylesheet">
        <!-- font Awesome -->
        <link href="{{ asset( 'css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset('css/ionicons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet" type="text/css" />
        <!-- FileInput style -->
        <link href="{{ asset('css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
        @section('styles')
            
        @show
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <!-- skin-blue -->
    <body class="pace-done skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.html" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Daniel Lazo
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
               
            </nav>
        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">                
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p>Hello, Luisa</p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <li>
                            <a href="video">
                                <i class="fa fa-youtube-play"></i> <span>Videos</span>
                            </a>
                        </li>
                        <li>
                            <a href="contrato">
                                <i class="fa fa-file"></i> <span>Contratos</span>
                            </a>
                        </li>
                        <li>
                            <a href="evento">
                                <i class="fa fa-ticket"></i> <span>Eventos</span>
                            </a>
                        </li>
                        <li>
                            <a href="noticia">
                                <i class="fa fa-newspaper-o"></i> <span>Noticias</span>
                            </a>
                        </li>
                        <li>
                            <a href="cancion">
                                <i class="fa fa-music"></i> <span>Canciones</span>
                            </a>
                        </li>
                        <li>
                            <a href="usuario">
                                <i class="fa fa-users"></i> <span>Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="agenda">
                                <i class="fa fa-calendar"></i> <span>Agenda</span>
                            </a>
                        </li>
                        <li>
                            <a href="merchandising">
                                <i class="fa fa-shopping-cart"></i> <span>Merchandising</span>
                            </a>
                        </li>
                        <li>
                            <a href="imagen">
                                <i class="fa fa-picture-o"></i> <span>Imagenes</span>
                            </a>
                        </li>
                        <li>
                            <a href="cliente">
                                <i class="fa fa-suitcase"></i> <span>Clientes</span>
                            </a>
                        </li>
                        <li>
                            <a href="establecimiento">
                                <i class="fa fa-building"></i> <span>Establecimientos</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailing">
                                <i class="fa fa-envelope"></i> <span>Mailing</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Administrador
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Web</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    @yield("content")
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        // <script src="{{ asset('js/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/plugins/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- FileInput -->
        <script src="{{ asset('js/fileinput.min.js') }}" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <!-- // <script src="js/plugins/AdminLTE/app.js" type="text/javascript"></script> -->
        @section("scripts")

        @show
    </body>
</html>
