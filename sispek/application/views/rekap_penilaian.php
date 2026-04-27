<div class="container-fluid mt-4">

    <h3>Rekap Penilaian Perilaku Berakhlak</h3>

    <!-- Filter periode -->
    <form method="get" class="row g-3 align-items-center mb-4">
        <div class="col-auto">
            <label for="bulan" class="form-label mb-0">Bulan</label>
            <select id="bulan" name="bulan" class="form-select form-select-sm">
                <?php 
                $bulan_nama = [
                    1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                    5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                    9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
                ];
                foreach ($bulan_nama as $num => $name): ?>
                    <option value="<?= $num ?>" <?= $num == $selected_bulan ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-auto">
            <label for="tahun" class="form-label mb-0">Tahun</label>
            <select id="tahun" name="tahun" class="form-select form-select-sm">
                <?php 
                $year_now = date('Y');
                for ($i = $year_now; $i >= $year_now - 5; $i--): ?>
                    <option value="<?= $i ?>" <?= $i == $selected_tahun ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>

        <div class="col-auto align-self-end">
            <button type="submit" class="btn btn-primary btn-sm">Tampilkan</button>
        </div>
    </form>

    <p><strong>Periode:</strong> <?= date('F', mktime(0, 0, 0, $selected_bulan, 10)) . ' ' . $selected_tahun ?></p>

    <?php if (!empty($rekap)): ?>
    <table class="table" id="table_rekap_penilaian">
        <thead class="table-primary">
            <tr>
                <th>Nama Pegawai</th>
                <th>Berorientasi Pelayanan</th>
                <th>Akuntabel</th>
                <th>Kompeten</th>
                <th>Harmonis</th>
                <th>Loyal</th>
                <th>Adaptif</th>
                <th>Kolaboratif</th>
                <th>Rata-rata</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rekap as $row): 
                $avg = round(
                    (
                        $row->berorientasi_pelayanan + 
                        $row->akuntabel + 
                        $row->kompeten + 
                        $row->harmonis + 
                        $row->loyal + 
                        $row->adaptif + 
                        $row->kolaboratif
                    ) / 7, 2);
            ?>
            <tr>
                <td><?= htmlspecialchars($row->username) ?></td>
                <td><?= number_format($row->berorientasi_pelayanan, 2) ?></td>
                <td><?= number_format($row->akuntabel, 2) ?></td>
                <td><?= number_format($row->kompeten, 2) ?></td>
                <td><?= number_format($row->harmonis, 2) ?></td>
                <td><?= number_format($row->loyal, 2) ?></td>
                <td><?= number_format($row->adaptif, 2) ?></td>
                <td><?= number_format($row->kolaboratif, 2) ?></td>
                <td><?= $avg ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-info">Data penilaian untuk periode ini belum tersedia.</div>
    <?php endif; ?>
    
    <h4 class="mt-5">Status Penilaian per Penilai</h4>
    <?php if (!empty($status_penilai)): ?>
    <table class="table table-bordered table-striped mt-3" id=tabel_rekap_penilai>
        <thead class="table-secondary">
            <tr>
                <th>Nama Penilai</th>
                <th>Jumlah Penilaian</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($status_penilai as $penilai): ?>
            <tr>
                <td><?= htmlspecialchars($penilai->username) ?></td>
                <td><?= $penilai->jumlah_dinilai ?></td>
                <td>
                    <?php if ($penilai->jumlah_dinilai >= 16): ?>
                        <span class="badge bg-success">Selesai</span>
                    <?php else: ?>
                        <span class="badge bg-warning text-dark">Belum Selesai</span>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <div class="alert alert-info">Belum ada data penilaian untuk bulan dan tahun ini.</div>
    <?php endif; ?>

    
</div>
