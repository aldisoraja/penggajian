
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
            <div class="sidebar-brand-image mt-4">
                <img width="60px" height="70px" src="<?php echo base_url() ?>/assets/img/disnaker1.png">
            </div>
            <div class="sidebar-brand-text text-left mt-4 mx-1">DISNAKERTRANS JATIM</div>
        </a>
        <br>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pegawai/dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('pegawai/dataGaji') ?>">
                <i class="fas fa-fw fa-money-check-alt"></i>
                <span>Data Gaji</span></a>
        </li>

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <h5 class="font-weight-bold">PENGGAJIAN</h5>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown mr-3">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php echo $this->session->userdata('nama_pegawai'); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/avatar/')
                                .$this->session->userdata('foto') ?>">
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?php echo base_url('pegawai/ubahPassword') ?>"><i class="fas fa-fw fa-lock"></i> Ganti Password</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('welcome/logout') ?>"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
