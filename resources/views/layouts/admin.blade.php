<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель управления</title>
    <base href="{{ asset('/') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    @vite(['resources/sass/admin.scss', 'resources/js/admin.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Главная страница</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link">{ Текущий пользователь }</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="Мишка мебель" class="brand-image">
            <span class="brand-text font-weight-light">Панель управления</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">Рабочая область</li>
                    <li class="nav-header">Контент сайта</li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'mattress']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Матрасы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'mattress-cover']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Чехлы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'furniture-size']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Размеры</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'mattress-fastening']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Крепления</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'material']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Материалы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'bed-base']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Основания кроватей</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'furniture-size']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Размеры</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'bed']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Кровати</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'furniture-storage']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Хранилища вещей</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'table']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Столы</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.panel.view', ['page' => 'type-table']) }}" class="nav-link">
                            <i class="nav-icon fas fa-table"></i>
                            <p>Типы столов</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    @yield('content')
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
{{--<!-- jQuery UI 1.11.4 -->--}}
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
{{--<!-- ChartJS -->--}}
{{--<script src="plugins/chart.js/Chart.min.js"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="plugins/sparklines/sparkline.js"></script>--}}
{{--<!-- JQVMap -->--}}
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
{{--<!-- jQuery Knob Chart -->--}}
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
{{--<!-- daterangepicker -->--}}
{{--<script src="plugins/moment/moment.min.js"></script>--}}
{{--<script src="plugins/daterangepicker/daterangepicker.js"></script>--}}
{{--<!-- Tempusdominus Bootstrap 4 -->--}}
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
{{--<!-- Summernote -->--}}
<script src="plugins/summernote/summernote-bs4.min.js"></script>
{{--<!-- overlayScrollbars -->--}}
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
{{--<!-- AdminLTE App -->--}}
<script src="dist/js/adminlte.js"></script>
{{--<!-- AdminLTE for demo purposes -->--}}
{{--<script src="dist/js/pages/dashboard.js"></script>--}}



</body>
</html>
