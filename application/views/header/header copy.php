<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Smart Power Meter</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fontawesome/css/all.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Auto load data -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>

            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <?php
if ($this->session->userdata('email') == null) {
    
                    ?>
                    <a href="<?= base_url('auth') ?>" class="nav-link"><button type="button"
                            class="btn btn-info float-right">Log
                            in</button></a>
                    <?php
}else{
                            ?>
                    <a href="<?= base_url('auth/logout') ?>" class="nav-link"><button type="button"
                            class="btn btn-info float-right">Log
                            Out</button></a>
                    <?php
}
?>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="" class="brand-link">
                <img src="<?= base_url('assets/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Power Meter</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('monitoring') ?>" class="nav-link">
                                <i class="fas fa-list"></i>
                                <p>
                                    Monitor
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('monitoring/chart') ?>" class="nav-link">
                                <i class="far fa-chart-bar"></i>
                                <p>
                                    Grafik
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('monitoring/report') ?>" class="nav-link">
                                <i class="fas fa-download"></i>
                                <p>
                                    Report
                                </p>
                            </a>
                        </li>
                        <?php
if ($this->session->userdata('customer') == 'kalijogo') {
                        ?>
                        <li class="nav-item">
                            <a href="<?= base_url('monitoring/adduser') ?>" class="nav-link">
                                <i class="fas fa-users"></i>
                                <p>
                                    Add User
                                </p>
                            </a>
                        </li>
                        <?php
}
                        ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>