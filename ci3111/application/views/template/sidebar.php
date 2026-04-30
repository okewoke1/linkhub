<body class="index-page">

    <header id="header" class="header dark-background d-flex flex-column">
        <i class="header-toggle d-xl-none bi bi-list"></i>

        <div class="profile-img">
            <img src="<?= base_url() . (isset($img_loc) ? $img_loc : 'assets/img/bps-sekadau.png') ?>" alt="" class="img-fluid rounded-circle">
        </div>
        <a href="index.html" class="logo d-flex align-items-center justify-content-center">
            <h1 class="sitename"><?= $nama ?></h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="<?= base_url() ?>" class="<?= ($active_menu == 'home') ? 'active' : '' ?>"><i class="bi bi-house navicon"></i>Home</a></li>
                <li class="dropdown"><a href="#" class="<?= ($active_menu == 'umum') ? 'active' : '' ?>"><i class="bi bi-link-45deg navicon"></i> <span>Link Umum</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul class="<?= ($active_menu == 'umum') ? 'dropdown-active' : '' ?>">
                        <li><a href="<?= base_url('umum/administrasi') ?>">Administrasi</a></li>
                        <li><a href="<?= base_url('umum/umum') ?>">Umum</a></li>
                        <li><a href="<?= base_url('umum/bukti_dukung_skp') ?>">Bukti Dukung SKP</a></li>
                        <li><a href="<?= base_url('umum/ckp_wfh') ?>">CKP WFH</a></li>
                        <li><a href="<?= base_url('http://sispek.dev.test/dashboard') ?>">Penilaian BerAKHLAK</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="<?= ($active_menu == 'teknis') ? 'active' : '' ?>"><i class="bi bi-hammer navicon"></i> <span>Link Teknis</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul class="<?= ($active_menu == 'teknis') ? 'dropdown-active' : '' ?>">
                        <li><a href="<?= base_url('teknis/sosial') ?>">Sosial</a></li>
                        <li><a href="<?= base_url('teknis/produksi') ?>">Produksi</a></li>
                        <li><a href="<?= base_url('teknis/distribusi') ?>">Distribusi</a></li>
                        <li><a href="<?= base_url('teknis/neraca') ?>">Neraca</a></li>
                        <li><a href="<?= base_url('teknis/ipds') ?>">IPDS</a></li>
                    </ul>
                </li>
                <?php if ($this->session->userdata('logged_in') && in_array('lead admin', $this->session->userdata('user_roles'))): ?>
                    <li class="dropdown"><a href="#" class="<?= ($active_menu == 'kelola') ? 'active' : '' ?>"><i class="bi bi-gear navicon"></i> <span>Kelola</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul class="<?= ($active_menu == 'kelola') ? 'dropdown-active' : '' ?>">
                            <li><a href="<?= base_url('kelola/tautan') ?>">Tautan</a></li>
                            <li><a href="<?= base_url('kelola/skp') ?>">SKP Pegawai</a></li>
                            <li><a href="<?= base_url('kelola/pengumuman') ?>">Pengumuman</a></li>
                            <?php if ($this->session->userdata('logged_in') && in_array('lead super admin', $this->session->userdata('user_roles'))): ?>
                                <li><a href="<?= base_url('kelola/pengguna') ?>">Pengguna</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>
                <li><a href="<?= base_url('panduan') ?>" class="<?= ($active_menu == 'panduan') ? 'active' : '' ?>"><i class="bi bi-question-circle navicon"></i> Panduan Penggunaan</a></li>
                <li class="dropdown"><a href="#" class="<?= ($active_menu == 'akun') ? 'active' : '' ?>"><i class="bi bi-person navicon"></i> <span>Akun</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul class="<?= ($active_menu == 'akun') ? 'dropdown-active' : '' ?>">
                        <li><a href="<?= base_url('auth/ganti_password') ?>">Ganti Password</a></li>
                        <?php if ($this->session->userdata('logged_in')): ?>
                            <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?= base_url('auth/login') ?>">Login</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>

    </header>
    <main class="main">