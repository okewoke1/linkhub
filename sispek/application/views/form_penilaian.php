<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h2>FORM PENILAIAN PEGAWAI BERAKHLAK</h2>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
    <div class="table-responsive">


<form method="get" class="mb-2">
    <div class="row">
        <?php 
            $selected_bulan = isset($selected_bulan) ? $selected_bulan : date('n');
            $selected_tahun = isset($selected_tahun) ? $selected_tahun : date('Y');
            $bulan_nama = [
                1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
                5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
                9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'
            ];
        ?>

        <div class="col-md-2">
            <select name="bulan" class="form-control">
                <?php foreach ($bulan_nama as $num => $name): ?>
                    <option value="<?= $num ?>" <?= ($num == $selected_bulan) ? 'selected' : '' ?>><?= $name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-md-2">
            <select name="tahun" class="form-control">
                <?php
                $year_now = date('Y');
                for ($i = $year_now; $i >= $year_now - 5; $i--): ?>
                    <option value="<?= $i ?>" <?= ($i == $selected_tahun) ? 'selected' : '' ?>><?= $i ?></option>
                <?php endfor; ?>
            </select>
        </div>
        
        <div class="col-md-2">
            <button class="btn btn-primary" type="submit">Tampilkan</button>
        </div>
    </div>
</form>

<div class="col-md-3">
    <?php if ($this->session->userdata('level') == '1'): ?>
        <form id="form-kunci" method="post" action="<?= base_url('penilaian/kunci_periode') ?>">
            <input type="hidden" name="bulan" value="<?= $selected_bulan ?>">
            <input type="hidden" name="tahun" value="<?= $selected_tahun ?>">
            <?php if ($this->M_penilaian->kunciPeriodePenilaian($selected_bulan, $selected_tahun)): ?>
                <input type="hidden" name="aksi" value="buka">
                <button id="btn-kunci" class="btn btn-success mb-3" type="button">?? Buka Kunci Penilaian</button>
            <?php else: ?>
                <input type="hidden" name="aksi" value="kunci">
                <button id="btn-kunci" class="btn btn-danger mb-3" type="button">?? Kunci Penilaian Bulan Ini</button>
            <?php endif; ?>
        </form>
    <?php endif; ?>
</div>

    <?php if ($this->session->flashdata('success')): ?>
        <div class="alert alert-success"><?= $this->session->flashdata('success') ?></div>
    <?php elseif ($this->session->flashdata('error')): ?>
        <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
    <?php endif; ?>


    <table class="table table-bordered" id="tabel_penilaian" cellspacing="0" id="tabel-penilaian">
        <thead>
            <tr>
                <th>Nama</th>
                <!--<th>NIP BPS</th>-->
                <th>Pelayanan</th>
                <th>Akuntabel</th>
                <th>Kompeten</th>
                <th>Harmonis</th>
                <th>Loyal</th>
                <th>Adaptif</th>
                <th>Kolaboratif</th>
                <th>Rata-rata</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="penilaian-data">
              <?php 
                  $id_saya = $this->session->userdata('id_penilai');
                  foreach ($users as $user): 
                    $penilaian = $user;
                    $nilai_aspek = [
                      $penilaian->berorientasi_pelayanan ?? null,
                      $penilaian->akuntabel ?? null,
                      $penilaian->kompeten ?? null,
                      $penilaian->harmonis ?? null,
                      $penilaian->loyal ?? null,
                      $penilaian->adaptif ?? null,
                      $penilaian->kolaboratif ?? null,
                    ];

                    $nilai_valid = array_filter($nilai_aspek, function($v) {
                        return $v !== null;
                    });
                    $count_nilai = count($nilai_valid);
                    $rata_rata = $count_nilai ? round(array_sum($nilai_valid) / $count_nilai, 2) : '-';
                    $is_self = ($user->id == $id_saya);
                  ?>
                  <tr>
                    <td><?= htmlspecialchars($user->username) ?></td>
                    <!--<td><?= htmlspecialchars($user->nip_bps) ?></td>-->
                    <?php foreach ($nilai_aspek as $n): ?>
                      <td style="width:100px"><?= $n !== null ? $n : '-' ?></td>
                    <?php endforeach; ?>
                    <td style="width:100px"><?= $rata_rata ?></td>
                    <td>
                        
                    <?php if ($is_locked): ?>
                      <span class="badge badge-secondary">Terkunci</span>
                    <?php else: ?>
                        <?php if ($is_self): ?>
                            <button class="btn btn-sm btn-secondary" disabled>Ini Anda</button>
                          <?php else: ?>
                            <?php if ($count_nilai): ?>
                              <button 
                                class="btn btn-sm btn-danger delete-penilaian" 
                                data-id="<?= $user->id ?>"
                                data-nama="<?= htmlspecialchars($user->username) ?>"
                                data-bulan="<?= $selected_bulan ?>"
                                data-tahun="<?= $selected_tahun ?>">
                                Reset Nilai
                              </button>
                            <?php else: ?>
                              <button 
                                class="btn btn-sm btn-primary open-modal" 
                                data-id="<?= $user->id ?>"
                                data-nilai='<?= json_encode($nilai_aspek) ?>'
                                data-username="<?= htmlspecialchars($user->username) ?>"
                                data-nipbps="<?= htmlspecialchars($user->nip_bps) ?>"
                                data-bulan="<?= $selected_bulan ?>"
                                data-tahun="<?= $selected_tahun ?>"
                                data-toggle="modal"
                                data-target="#penilaianModal">
                                Input Nilai
                              </button>
                            <?php endif; ?>
                          <?php endif; ?>
                    <?php endif; ?>

                      
                    </td>
                  </tr>
                  <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>    
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="penilaianModal" tabindex="-1" aria-labelledby="penilaianModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <form id="penilaianForm" method="post" action="<?= base_url('penilaian/simpan') ?>">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="penilaianModalLabel" aria-describedby="modalDesc">Form Penilaian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modalDesc">
          <input type="hidden" name="id_user" id="modal_id_user" required>
          <input type="hidden" name="periode_bulan" id="modal_bulan" required>
          <input type="hidden" name="periode_tahun" id="modal_tahun" required>

          <?php 
            $aspek = ['berorientasi_pelayanan','akuntabel','kompeten','harmonis','loyal','adaptif','kolaboratif'];
            foreach ($aspek as $a): 
              $label = ucwords(str_replace('_',' ', $a));
            ?>
              <div class="form-group mb-4">
                <label class="mb-1 font-weight-bold" for="nilai_<?= $a ?>"><?= $label ?></label>
                <div class="input-group align-items-center">
                  <!--<div class="input-group-prepend" style="min-width: 180px;">-->
                  <!--  <span class="input-group-text w-100 justify-content-center"><?= $label ?></span>-->
                  <!--</div>-->
                  <input 
                    type="range" 
                    class="form-control" 
                    name="<?= $a ?>" 
                    id="nilai_<?= $a ?>" 
                    min="1" max="100" 
                    step="1" 
                    value="50" 
                    required
                  >
                  <div class="input-group-append" style="min-width: 60px;">
                    <span id="val_<?= $a ?>" class="input-group-text justify-content-center">50</span>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan Nilai</button>
        </div>
      </div>
    </form>
  </div>
    <div id="penilaianFeedback" class="text-danger mb-2"></div>

</div>



