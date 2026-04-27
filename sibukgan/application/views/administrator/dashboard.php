<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row (Cards) -->
    <div class="row">

        <!-- Card: Pegawai -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Pegawai</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->query("SELECT id FROM master_users")->num_rows(); ?>
                            </div>
                            <a>Total Data Pegawai</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Surat Tugas -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Surat Tugas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->query("SELECT id_spt FROM tb_spt WHERE statuspost=0")->num_rows(); ?>
                            </div>
                            <a>ST dibuat</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card: Laporan -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Laporan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?= $this->db->query("SELECT id_spt FROM tb_spt WHERE status_laporan=0")->num_rows(); ?>
                            </div>
                            <a>Laporan belum dibuat</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Monitoring -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Monitoring Surat Tugas Pegawai - <?= date('F', mktime(0, 0, 0, $bulan, 10)) ?> <?= $tahun ?>
        </div>
        <div class="card-body">

            <!-- Filter Form -->
            <form method="get" class="form-inline mb-3">
                <label class="mr-2">Bulan:</label>
                <select name="bulan" class="form-control mr-3" onchange="this.form.submit()">
                    <?php for ($b = 1; $b <= 12; $b++): ?>
                        <option value="<?= $b ?>" <?= ($b == $bulan) ? 'selected' : '' ?>>
                            <?= date('F', mktime(0, 0, 0, $b, 1)) ?>
                        </option>
                    <?php endfor; ?>
                </select>

                <label class="mr-2">Tahun:</label>
                <select name="tahun" class="form-control" onchange="this.form.submit()">
                    <?php
                    $tahun_now = date('Y');
                    for ($t = $tahun_now; $t >= $tahun_now - 5; $t--): ?>
                        <option value="<?= $t ?>" <?= ($t == $tahun) ? 'selected' : '' ?>><?= $t ?></option>
                    <?php endfor; ?>
                </select>
            </form>

            <!-- Tabel Monitoring -->
            <?php
$warna = [
    1 => 'background-color:#808080;color:white;', // Abu
    2 => 'background-color:#007bff;color:white;', // Biru
    3 => 'background-color:#28a745;color:white;', // Hijau
    4 => 'background-color:#fd7e14;color:white;', // Orange
    5 => 'background-color:#000000;color:white;', // Hitam
    6 => 'background-color:#ffc107;color:black;'  // Kuning
];
?>
            <div class="table-responsive">
                <table class="table table-bordered table-sm text-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Nama Pegawai</th>
                            <?php for ($i = 1; $i <= 31; $i++): ?>
                                <th><?= $i ?></th>
                            <?php endfor; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($monitoring as $data): ?>
                            <tr>
                                <td class="text-left"><?= $data['nama_pegawai'] ?></td>
                                <?php for ($i = 1; $i <= 31; $i++): ?>
                                    <td style="<?= isset($data['tanggal'][$i]) ? $warna[$data['tanggal'][$i]] : '' ?>">
    <?= isset($data['tanggal'][$i]) ? '?' : '' ?>
</td>

                                <?php endfor; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->

<style>
  table {
    width: 100%;
    border-collapse: collapse;
    table-layout: fixed; /* supaya kolom tanggal punya lebar tetap */
  }

  table th, table td {
    border: 1px solid #dee2e6;
    padding: 6px;
  }

  /* Kolom pertama (nama pegawai) fleksibel */
  table th:first-child,
  table td:first-child {
    width: auto;
    text-align: left;
    white-space: normal;
  }

  /* Semua kolom tanggal punya lebar sama */
  table th:not(:first-child),
  table td:not(:first-child) {
    width: 30px; /* sesuaikan lebar kolom tanggal */
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  /* Warna hijau dan teks putih untuk tanggal ada tugas */
  .bg-success {
    background-color: #28a745 !important;
    color: white !important;
  }
</style>



