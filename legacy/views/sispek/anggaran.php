<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR KELOMPOK ANGGARAN</h1>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><I class="fa fa-plus"></I> Tambah Kelompok Anggaan</button>
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
              <th style="width:70px;vertical-align: middle">Aksi</th>
            </tr>
          </thead>
          <tbody> <?php foreach ($anggaran as $row) : ?>
              <tr>
                <td><?php echo $row->bidang_teknis ?></td>
                <td><?php echo $row->kelompok_anggaran ?></td>
                <td><?php echo $row->kode_anggaran ?></td>

                <td>

                  <!-- Tombol Edit -->
                  <button class="btn btn-info btn-sm btn-edit_anggaran" 
                  data-id="<?php echo $row->kelompok_anggaran; ?>" 
                  data-kelompok="<?php echo $row->kelompok_anggaran; ?>" 
                  data-kode="<?php echo $row->kode_anggaran; ?>"
                  data-bidang="<?php echo $row->bidang_teknis; ?>">
                    <i class="far fa-edit"></i>
                  </button>

                  <!-- Tombol Hapus -->
                  <a href="<?php echo site_url('sispek/anggaran/hapus/' . $row->kode_anggaran); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $row->kelompok_anggaran; ?>?')">
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
        <h4 class="modal-title fs-5" id="exampleModalLabel">Form Input Kelompok Anggaran</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <form id="formTambahAnggaran" method="post">

          <div class="form-group">
            <label for="">Kode Anggaran</label>
            <input type="text" id="kode_anggaran" name="kode_anggaran" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama Kelompok Anggaran</label>
            <input type="text" id="kelompok_anggaran" name="kelompok_anggaran" class="form-control" required>
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

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kelompok Anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Isi form edit akan ditambahkan melalui JavaScript -->
      </div>
    </div>
  </div>
</div>