<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url(); ?>assets/img/bps.png" style="width:60px; height:50px;">
                </div>
                <div class="sidebar-brand-text mx-3">SIBUKGAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('administrator/dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">Navigation</div>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/pegawai'); ?>">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Data Pegawai</span>
                </a>
            </li>

            <!-- Collapse Menu - Buat Surat -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSurat"
                    aria-expanded="false" aria-controls="collapseSurat">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Buat Surat</span>
                </a>
                <div id="collapseSurat" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('administrator/spt'); ?>">Buat ST</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/sppd'); ?>">Buat ST 2 Orang</a>
                        <!-- <a class="collapse-item" href="<?php echo base_url('administrator/spb'); ?>">Buat ST 3 Orang</a> -->
                        <a class="collapse-item" href="<?php echo base_url('administrator/sptmitra'); ?>">Buat ST Mitra</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/sptmitralam'); ?>">Buat ST Mitra (Terlampir)</a>
                    </div>
                </div>
            </li>

            <!-- Collapse Menu - Buat Surat (PLH) -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePLH"
                    aria-expanded="false" aria-controls="collapsePLH">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Buat Surat (PLH)</span>
                </a>
                <div id="collapsePLH" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('administrator/sptplh'); ?>">Buat ST</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/sptplh2'); ?>">Buat ST 2 Orang</a>
                        <a class="collapse-item" href="<?php echo base_url('administrator/sptmitra2'); ?>">Buat ST Mitra</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/spd'); ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Daftar SPD</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/laporan'); ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Daftar Laporan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/laporan2'); ?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Unggah Laporan</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/biaya'); ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Rincian Biaya</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('administrator/edit'); ?>">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Edit Profile</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-success small">
                                    Selamat datang, <?php echo $this->session->userdata('nama'); ?>
                                </span>
                                <i class="fas fa-user"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="https://dashboard.sekadau6109.com/auth/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
