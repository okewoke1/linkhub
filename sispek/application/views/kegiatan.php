<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR KEGIATAN</h1>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><I class="fa fa-plus"></I> Tambah Kegiatan Baru</button>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th style="vertical-align: middle">Bidang Teknis</th>
              <th style="vertical-align: middle">Kelompok Anggaran</th>
              <th style="vertical-align: middle">Kode Anggaran</th>
              <th style="vertical-align: middle">Jabatan</th>
              <th style="width:250px;vertical-align: middle">Uraian Tugas</th>
              <th style="width:120px;vertical-align: middle">Satuan</th>
              <th style="width:120px;vertical-align: middle">Honor</th>
              <th style="width:70px;vertical-align: middle">Aksi</th>
            </tr>
          </thead>
          <tbody> <?php foreach ($kegiatan as $row) : ?>
              <tr>
                <td><?php echo $row->bidang_teknis ?></td>
                <td><?php echo $row->kelompok_anggaran ?></td>
                <td><?php echo $row->kode_anggaran ?></td>
                <td>
                <?php
                // echo $row->jabatan
                 if ($row->jabatan == 'PPL') {
                        echo 'Petugas Pendataan Lapangan (PPL)';
                    } elseif ($row->jabatan == 'PML') {
                        echo 'Petugas Pemeriksa Lapangan (PML)';
                    } elseif ($row->jabatan == 'PPD') {
                        echo 'Petugas Pengolahan Data (PPD)';
                    } else {
                        echo 'Jabatan Tidak Diketahui';
                    }
                ?>
                </td>
                
                <td><?php echo $row->uraian_tugas ?></td>
                <td><?php echo $row->satuan ?></td>
                <td><?php echo format_rupiah($row->honor); ?></td>

                <td>
                  <!-- Tombol Edit -->
                  <a href="<?php echo site_url('kegiatan/edit_kegiatan/' . $row->id_tugas); ?>" class="btn btn-info btn-sm" onclick="return confirm('Apakah Anda ingin mengedit data kegiatan ini: <?php echo $row->uraian_tugas; ?>' '<?php echo $row->kelompok_anggaran; ?>?')">
                    <i class="far fa-edit"></i>
                  </a>

                  <!-- Tombol Hapus -->
                  <a href="<?php echo site_url('kegiatan/hapus/' . $row->id_tugas); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini: <?php echo $row->uraian_tugas; ?>' '<?php echo $row->kelompok_anggaran; ?>?')">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>

              </tr>
            <?php endforeach; ?>
          </tbody>

        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="exampleModalLabel">Form Input kegiatan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url() . 'kegiatan/tambah_aksi'; ?>">
          <div class="form-group">
            <label>Kelompok Anggaran</label>
            <select class="form-control" type="text" id="kelompok_anggaran" name="kelompok_anggaran">
              <option selected="0">Pilih Kelompok Anggaran</option>
              <?php
              foreach ($t_anggaran as $row) {
                echo  "<option value='" . $row->kelompok_anggaran . "'>" . $row->kelompok_anggaran .  "</option>";
              }
              ?>
            </select>
          </div>
          <div class="form-group">
              <label for="jabatan">Jabatan</label>
              <select name="jabatan" id="jabatan" class="form-control" required>
                <option value="">-- Pilih Jabatan --</option>
                <option value="PPL">Petugas Pendataan Lapangan (PPL)</option>
                <option value="PML">Petugas Pemeriksa Lapangan (PML)</option>
                <option value="PPD">Petugas Pengolahan Data (PPD)</option>
                <option value="unknown">Jabatan Tidak Diketahui</option>
              </select>
            </div>

          <div class="form-group">
            <label for="">Uraian Kegiatan</label>
            <input type="text" name="uraian_tugas" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Satuan Kegiatan</label>
            <input type="text" name="satuan" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Biaya Per-Kegiatan</label>
            <input type="number" name="honor" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Kode Anggaran</label>
            <input readonly type="text" name="kode_anggaran" id="kode_anggaran" class="form-control" required>
          </div>

          <div class="text-right">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Simpan </button>
            <button class="btn btn-secondary" data-dismiss="modal">Batal</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>