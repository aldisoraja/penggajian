
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
            <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-database"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url('admin/dataPegawai') ?>">Data Pegawai</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/dataGolongan') ?>">Data Golongan</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/dataJabatan') ?>">Data Jabatan</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/potonganGaji') ?>">Potongan Gaji</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-money-check-alt"></i>
                <span>Rekap Data</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url('admin/dataAbsensi') ?>">Rekap Absensi</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/dataPenggajian') ?>">Data Gaji</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages">
                <i class="far fa-fw fa-copy"></i>
                <span>Laporan</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo base_url('admin/laporanGaji') ?>">Laporan Gaji</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/laporanAbsensi') ?>">Rekap Laporan Absensi</a>
                    <a class="collapse-item" href="<?php echo base_url('admin/slipGaji') ?>">Slip Gaji</a>
                </div>
            </div>
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
                            <li><a class="dropdown-item" href="<?php echo base_url('ubahPassword') ?>"><i class="fas fa-fw fa-lock"></i> Ganti Password</a></li>
                            <li><hr class="dropdown-divider" /></li>
                            <li><a class="dropdown-item" href="<?php echo base_url('welcome/logout') ?>"><i class="fas fa-fw fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
