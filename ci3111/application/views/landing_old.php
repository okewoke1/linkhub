<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>LEAD BPS Kabupaten Sekadau</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">

    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="<?php echo base_url() ?>" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <img src="assets/img/logo-bps.png" alt="">
        <p class="arial-bold-italic">LEAD BPS KABUPATEN SEKADAU</p>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#home" class="active">Home</a></li>
          <li><a href="#administrasi">Administrasi</a></li>
          <li><a href="#teknis">Teknis</a></li>
          <li><a href="#pegawai">Pegawai</a></li>
          <li>|&nbsp;&nbsp;&nbsp;&nbsp;</li>
          <li>Selamat Datang, </li>
          <li class="dropdown"><a href="#"><span>USERNAME</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="<?php echo base_url('auth/logout') ?>">Logout</a></li>
              <li><a href="#">Profil</a></li>
            </ul>
          </li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>

  </header>

  <main class="main">

    <!-- Home Section -->
    <section id="home" class="hero section dark-background">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-8 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start" data-aos="zoom-out">
            <h1>Linkhub Sumber Daya Digital</h1>
            <p>(LEAD) BPS Kabupaten Sekadau</p>
          </div>
          <div class="col order-1 order-lg-2 hero-img d-flex flex-column justify-content-center align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/bps-sekadau.png" class="img-fluid animated" alt="" style="max-width: 60%;">
          </div>
        </div>
      </div>

    </section><!-- /Home Section -->

    <!-- Link Administrasi Section -->
    <section id="administrasi" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Administrasi</h2>
        <p>Link menuju berbagai web untuk keperluan administrasi.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/simakand.png" class="img-card">
              <h4><a target="_blank" href="http://simakand.dev.test/" class="stretched-link">SIMAKAND</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/simpeg.png" class="img-card">
              <h4><a target="_blank" href="https://simpeg.bps.go.id/" class="stretched-link">SIMPEG</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/sipecut.png" class="img-card">
              <h4><a target="_blank" href="https://sipecut.bps.go.id/" class="stretched-link">SIPECUT</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/kjk.png" class="img-card">
              <h4><a target="_blank" href="https://s.bps.go.id/KJK_6109_2024" class="stretched-link">KJK</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/gawai.png" class="img-card">
              <h4><a target="_blank" href="https://s.bps.go.id/Gawai_6109" class="stretched-link">GAWAI</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/surat-tugas.png" class="img-card">
              <h4><a target="_blank" href="https://docs.google.com/spreadsheets/d/12R5wa5dNL7f-8qo2wGpHGjqmpZUDNMkZpcMxLGfxC3w/edit?usp=sharing" class="stretched-link">SURAT TUGAS</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/sispek.png" class="img-card">
              <h4><a target="_blank" href="http://sispek.dev.test/" class="stretched-link">SISPEK</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/sibukgan.png" class="img-card">
              <h4><a target="_blank" href="http://sibukgan.dev.test/" class="stretched-link">SIBUKGAN</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/spk-bast.png" class="img-card">
              <h4><a target="_blank" href="https://s.bps.go.id/SPK-BAST_2024" class="stretched-link">SPK-BAST</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/pk-dan-iku.png" class="img-card">
              <h4><a target="_blank" href="https://docs.google.com/spreadsheets/d/1_6zgLm7RYCOt4oJaQ8TVzXLvUX3uUBS4sCq1WWSlV7M/edit?gid=329857405#gid=329857405" class="stretched-link">PK & IKU 2025</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/sk-petugas.png" class="img-card">
              <h4><a target="_blank" href="https://sites.google.com/view/6109skpetugas/home" class="stretched-link">SK PETUGAS</a></h4>
            </div>
          </div><!-- End Service Item -->

          <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative" data-bs-toggle="tooltip" data-bs-title="Tooltip on top">
              <img src="assets/img/web-capture/dokumentasi.png" class="img-card">
              <h4><a target="_blank" href="https://drive.google.com/drive/folders/10HnwFxySJFVOChcIbSDiyKp_aCKBCeoy?usp=drive_link" class="stretched-link">DOKUMENTASI</a></h4>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Link Administrasi Section -->

    <!-- Link Teknis Section -->
    <section id="teknis" class="services section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Link Teknis</h2>
        <p>Link sumber daya milik tim Produksi, Distribusi, Sosial, Neraca, dan IPDS.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <p class="text-secondary text-center" data-aos="fade-up" data-aos-delay="100">- belum tersedia -</p>

        </div>

      </div>

    </section><!-- /Link Teknis Section -->

    <!-- Pegawai Section -->
    <section id="pegawai" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pegawai</h2>
        <p>Link menuju folder bukti dukung pekerjaan setiap pegawai.</p>
        <br>
        <div class="search-container">
          <i class="fas fa-search search-icon"></i>
          <input type="text" class="search-box" placeholder="Cari..." id="searchInput">
        </div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4" id="cardContainer">

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/PAK IMAM.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Imam Setia Harnomo</h4>
                <span>Kepala</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1r_6PQreR9E__4zaBJh3EAWnhAiJXtoDn" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/bg ardi.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Ardi Surya</h4>
                <span>Bagian Umum</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/11OF4HpLfgi1voBAZYaVq9RkvLHcSKTcl?usp=drive_link" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/DIAS.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Wahidi Astuti</h4>
                <span>Bagian Umum</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1OcUxnkw2PpH4Fnm0TxZHM0S7SnenDJcD" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/BU IJU.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Juhairiah</h4>
                <span>Bagian Umum</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1pZ2eVeG2Qhr4T8j7jfFM9foh_HFa5lkE" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/REVO.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Firza Refo Adi Pratama</h4>
                <span>Tim Statistik Sosial</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1TNC1bbo6bqZ_tozzlwx0DClnJ8LZVBcB" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/RAFI.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Rafi Oktriatama</h4>
                <span>Tim Statistik Sosial</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1H88s4NKzAJRnMfWYZXIc5y-RWx3zKvbG" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/put.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Putri Ulul Azmi</h4>
                <span>Tim Statistik Sosial</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/15dw9CxXbqZXVaStgwHIdrMVSsPvRlYHo" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/ROMA.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Roma Dear Silitonga</h4>
                <span>Tim Statistik Produksi</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1iE3scJtimUHFG6f8nPg0-fzrLMsqeMls" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/FALDI.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Rifaldi</h4>
                <span>Tim Statistik Produksi</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1Ro_B91QvgHfzW7Av4rQcDlHBCKjmdmLg" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/FEBY.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Febi Taufiqurrahman</h4>
                <span>Tim Statistik Produksi</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1FNN7xkn0Tx3u41Bq2RjRE6t0hnPfDo7-" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/AINI.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Afifah Nur'aini Gunawan</h4>
                <span>Tim Statistik Distribusi</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/16YDhrcENr3n20jc4wGXaC4g9rMKhA0Xi" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/PAK UMAR.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Umar</h4>
                <span>Tim Statistik Distribusi</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1iacrVnqs4IapCG6i55_N4Tbbxn-qxzYU" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/DANIEL.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Daniel Haratio Rupert Marpaung</h4>
                <span>Tim Statistik Distribusi</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1httb7cQZJHCdZ_9VKfwpPeIv8hLq1NFW" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/ALONG.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Tju Ji Long</h4>
                <span>Tim Neraca</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1VPtPclHgW3poH5qDsXkNP473aCT_5wxn" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/ICA.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Devisca Mutiara Citra</h4>
                <span>Tim Neraca</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1_ZpUQ53_j4AewJbnIh1E7AMgP2LMkL9U" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/SULTAN.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sultan Nabila Ravani</h4>
                <span>Tim IPDS</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1hoawk2lMLeW-yANr2EWfAj_7aRGajkLl" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/RISKY.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Risky Maulana</h4>
                <span>Tim IPDS</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/1DLSVt6a3HB-nrMN4d8giwBqAcZQ2BYJN" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

          <div class="col-lg-4 card-column" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member d-flex align-items-start">
              <div class="pic"><img src="assets/img/pegawai/RAYYAN.webp" loading="lazy" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Muhammad Rayyan Maulana</h4>
                <span>Tim IPDS</span>
                <br>
                <p>Folder Drive Bukti Dukung KiP App:</p>
                <div class="social">
                  <a href="https://drive.google.com/drive/folders/12tvyY5SKpYgAMXIyUte4vDWHUZXmX2NW" target="_blank"><i
                      class="bi bi-link-45deg"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Member -->

        </div>

      </div>

    </section><!-- /Pegawai Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="container copyright text-center mt-4">
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="assets/js/livesearch.js"></script>

  <!-- initialize tooltips -->
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
  </script>

</body>

</html>