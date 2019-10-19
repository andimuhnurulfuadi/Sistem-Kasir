<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/admin/images/logo-resto.png'); ?>">
    <title>Sistem Kasir</title>
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="<?php echo base_url('assets/admin/node_modules/morrisjs/morris.css'); ?>" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="<?php echo base_url('assets/admin/node_modules/toast-master/css/jquery.toast.css'); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url('assets/admin/dist/css/style.min.css'); ?>" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="<?php echo base_url('assets/admin/dist/css/pages/dashboard1.css'); ?>" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-blue fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Sistem Kasir</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?php echo base_url('assets/admin/images/logo-resto.png'); ?>" alt="homepage" class="dark-logo" width="50" height="50" />
                            <!-- Light Logo icon -->
                            <img src="<?php echo base_url('assets/admin/images/logo-resto.png'); ?>" alt="homepage" class="light-logo" width="50" height="50" />
                        </b>
                        <!--End Logo icon -->
                        <span class="hidden-xs"><span class="font-bold">Sistem</span>Kasir</span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- User Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown u-pro">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url(); ?>assets/admin/images/users/agent.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $_SESSION['username']; ?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                            <div class="dropdown-menu dropdown-menu-right animated flipInY">
                                <!-- text-->
                                <a href="<?php echo base_url('admin') ?>" class="dropdown-item"><i class="ti-user"></i>Profil</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a href="<?php echo base_url('login_admin/logout') ?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End User Profile -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">--- MENU</li>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('admin'); ?>"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a></li>
                        <?php if ($_SESSION['level'] == 'owner') { ?>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('admin/tampil'); ?>"><i class="icon-user"></i><span class="hide-menu">Admin</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('meja/tampil'); ?>"><i class="icon-pin"></i><span class="hide-menu">Meja</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('kategori/tampil'); ?>"><i class="icon-list"></i><span class="hide-menu">Kategori</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('menu/tampil'); ?>"><i class="icon-notebook"></i><span class="hide-menu">Menu</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('transaksi/tampil'); ?>"><i class="icon-basket"></i><span class="hide-menu">Transaksi</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="#"><i class="icon-printer"></i><span class="hide-menu">Laporan</span></a></li>
                        <?php } else { ?>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('menu/tampil'); ?>"><i class="icon-notebook"></i><span class="hide-menu">Menu</span></a></li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo base_url('transaksi/tampil'); ?>"><i class="icon-basket"></i><span class="hide-menu">Transaksi</span></a></li>
                        <?php } ?>
                        <li> <a class="waves-effect waves-dark" href="<?php echo base_url('login_admin/logout'); ?>"><i class="icon-action-undo"></i><span class="hide-menu">Logout</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->