<div class="container-fluid">
    <!-- Tab Mitra -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h3>Data Mitra</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <!-- Detail Data Mitra -->
                <div class="col-md-3">
                    <div class="card mb-3">
                        <div class="card-header bg-secondary text-white">
                            <h4><?= $mitra['nama_mitra']; ?></h4>
                        </div>
                        <div class="card-body">
                            <table style="width:100%;">
                                <tr>
                                    <td style="width:80px;vertical-align: middle">ID Sobat</td>
                                    <td style="width:10px;">:</td>
                                    <td><input type="text" class="form-control" id="id_sobat" value="<?= $mitra['id_sobat']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="nik" value="<?= $mitra['nik']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td>Telp</td>
                                    <td>:</td>
                                    <td><input type="text" class="form-control" id="telp" value="<?= $mitra['telp']; ?>" readonly></td>
                                </tr>
                                <tr>
                                    <td style="width:80px;vertical-align: top">Alamat</td>
                                    <td style="vertical-align: top">:</td>
                                    <td><textarea class="form-control" id="alamat" rows="5" readonly><?= $mitra['alamat']; ?></textarea></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

                <!-- Filter Kegiatan SPK & Daftar SPK Mitra -->
                <div class="col-md-9">
                    <div class="card mb-3">
                        <div class="card-header bg-warning text-dark d-flex justify-content-between align-items-center">
                            <h5>Daftar SPK Mitra</h5>
                            <form method="get" class="form-inline">
                                <div class="form-group mb-2">
                                    <label for="bulan" class="mr-2">Bulan:</label>
                                    <select name="bulan" id="bulan" class="form-control">
                                        <option value="">Semua Bulan</option>
                                        <?php for ($m = 1; $m <= 12; $m++): ?>
                                            <option value="<?= $m; ?>" <?= ($m == $this->input->get('bulan')) ? 'selected' : ''; ?>>
                                                <?= date('F', mktime(0, 0, 0, $m, 10)); ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="form-group mb-2 mx-2">
                                    <label for="tahun" class="mr-2">Tahun:</label>
                                    <select name="tahun" id="tahun" class="form-control">
                                        <option value="">Semua Tahun</option>
                                        <?php for ($y = date('Y'); $y >= 2020; $y--): ?>
                                            <option value="<?= $y; ?>" <?= ($y == $this->input->get('tahun')) ? 'selected' : ''; ?>>
                                                <?= $y; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Filter</button>
                            </form>
                        </div>
                        <div class="card-body">
                            
                            <!--TABEL -->
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header bg-info text-dark">
            <h5>Daftar SPK Mitra</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No SPK</th>
                        <th>Tanggal SPK</th>
                        <th>Total Perjanjian</th>
                        <th>Rincian Tugas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($spk_data)): ?>
                        <?php $no = 1; foreach ($spk_data as $spk): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $spk['no_spk']; ?></td>
                            <td><?= date('d-m-Y', strtotime($spk['tanggal_spk'])); ?></td>
                            <td><?= number_format($spk['total_perjanjian'], 0, ',', '.'); ?></td>
                            <td>
                                <button class="btn btn-info btn-sm view-detail" data-spk="<?= htmlspecialchars(json_encode($spk)); ?>">
                                    Lihat Rincian
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data SPK yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
                            <!--AKHIR TABEL -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>