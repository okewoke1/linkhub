<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('dashboard') ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SISPEK</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-donate"></i>
                    <span>KONTRAK</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Komponen Kontrak:</h6>

                        <a class="collapse-item" href="<?php echo base_url('kontrak/') ?>">Buat SPK Baru</a>
                        <a class="collapse-item" href="<?php echo base_url('daftarspk/') ?>">Daftar SPK</a>
                        <a class="collapse-item" href="<?php echo base_url('daftarkegiatan/') ?>">Daftar Kegiatan</a>
                        <a class="collapse-item" href="<?php echo base_url('daftarbast/') ?>">Daftar BAST</a>


                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-file-medical"></i>
                    <span>Kegiatan</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Komponen Kegiatan:</h6>
                        <a class="collapse-item" href="<?php echo base_url('kegiatan') ?>">Kegiatan</a>
                        <a class="collapse-item" href="<?php echo base_url('anggaran') ?>">Kelompok Anggaran </a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('mitra') ?>">
                    <i class="fas fa-user-friends"></i>
                    <span>MITRA</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('ppk') ?>">
                    <i class="fas fa-user-alt"></i>
                    <span>PPK</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('user') ?>">
                    <i class="fas fa-user-alt"></i>
                    <span>USER</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('penilaian') ?>">
                    <i class="fas fa-user-alt"></i>
                    <span>Penilaian</span></a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('penilaian/rekap_penilaian') ?>">
                    <i class="fas fa-user-alt"></i>
                    <span>Rekap Penilaian</span></a>
            </li>


            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Akun</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="#">Login</a>
                        <a class="collapse-item" href="#">Register</a>
                    </div>
                </div>
            </li> -->
            
            <li class="nav-item">
                <a class="nav-link" href="<?= site_url('sk') ?>">
                    <i class="fas fa-file-signature"></i>
                    <span>SK Kegiatan</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link" href="http://ci3111.dev.test/auth/logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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
                <nav class="navbar navbar-expand navbar-dark bg-gradient-dark topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="btn" id="sidebarToggle">
                            <i class="fa fa-th-list"></i>
                        </button>
                    </div>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>



                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-100"><?php echo ucwords($username); ?></span>
                                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/') ?>img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Profile-->
                                <!--</a>-->
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Settings-->
                                <!--</a>-->
                                <!--<a class="dropdown-item" href="#">-->
                                <!--    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
                                <!--    Activity Log-->
                                <!--</a>-->
                                <!--<div class="dropdown-divider"></div>-->
                                <a class="dropdown-item" href="https://dashboard.sekadau6109.com/auth/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->