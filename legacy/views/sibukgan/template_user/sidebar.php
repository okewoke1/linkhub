<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <div class="sidebar-brand-icon">
                    <img src="<?php echo base_url() ?>assets/sibukgan/img/bps.png" style="width:60px; height:50px; color:#00B0F0;">
                </div>
                <div class="sidebar-brand-text mx-3">SIBUKGAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Navigation
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/pegawai') ?>">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Data Pegawai</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Buat Surat</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('sibukgan/user/spt') ?>">Buat ST</a>
                        <a class="collapse-item" href="<?php echo base_url('sibukgan/user/sppd') ?>">Buat ST 2 Orang</a>
                        <!-- <a class="collapse-item" href="<?php echo base_url('sibukgan/user/spb') ?>">Buat ST 3 Orang</a> -->
                      <a class="collapse-item" href="<?php echo base_url('sibukgan/user/sptmitra') ?>">Buat ST Mitra</a>
                        
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Buat Surat (PLH)</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo base_url('sibukgan/user/sptplh') ?>">Buat ST</a>
                        <a class="collapse-item" href="<?php echo base_url('sibukgan/user/sptplh2') ?>">Buat ST 2 Orang</a>
                      <a class="collapse-item" href="<?php echo base_url('sibukgan/user/sptplh3') ?>">Buat ST Mitra</a>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/spd') ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Daftar SPD</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/laporan') ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Daftar Laporan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/laporan2')?>">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Unggah Laporan</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/biaya') ?>">
                    <i class="fas fa-fw fa-archive"></i>
                    <span>Rincian Biaya</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('sibukgan/user/edit') ?>">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Edit Profile</span></a>
            </li>



            <!-- Nav Item - Tables -->
           

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            

        </ul>

        <!-- Floating Button -->
        <a href="<?php echo site_url(); ?>" class="floating-button" target="_blank">
                    <img src="<?php echo base_url('assets/img/logo-bps.png'); ?>" alt="Home Link" class="button-img">
                    <!-- <img src="path/to/your-image.png" alt="Home Link" class="button-img"> -->
                </a>
        <!-- End of Sidebar -->
        
        <!-- Floating Button -->
        <a href="<?php echo site_url(); ?>" class="floating-button" target="_blank">
                    <img src="<?php echo base_url('assets/img/logo-bps.png'); ?>" alt="Home Link" class="button-img">
                    <!-- <img src="path/to/your-image.png" alt="Home Link" class="button-img"> -->
                </a>

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

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
            
                        </li>



                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-success small">Selamat datang, <?php echo $this->session->userdata('nama');?></span>
                                <i class="fas fa-user "></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                                                <a class="dropdown-item" href="<?php echo base_url('sibukgan/login/logout') ?>">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                        </li>

                    </ul>

                </nav>     