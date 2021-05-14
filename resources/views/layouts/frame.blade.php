<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/blade.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake"
                src="data:image/png;base64,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"
                alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('welcome') }}" class="nav-link">Go Guest View</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>


                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="https://bit.ly/3bnJoOh" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ route('home') }}" class="d-block">Laravel OJT Project</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <?php

                        if (Auth::user()->type == 0) {
                            ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header"><b>Dashboard</b></li>
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-success"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-header"><b>Information</b></li>
                        <li class="nav-item">
                            <a href="{{ route('post') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Posts</p>
                            </a>
                        </li>
                        <li class="nav-header"><b>Setting</b></li>
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-warning"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php
                        } else {
                        ?>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-header"><b>Information</b></li>
                        <li class="nav-item">
                            <a href="{{ route('post') }}" class="nav-link">
                                <i class="nav-icon far fa-circle text-danger"></i>
                                <p>Posts</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <?php
                        }
                ?>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section>
                <div align="center">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 5/2021 <a href="https://github.com/SCM-ZunPwintPhyu">Zun Pwint Phyu</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
    $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('dist/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
</body>

</html>