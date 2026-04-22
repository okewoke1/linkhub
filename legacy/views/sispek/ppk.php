<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR PENJABAT PEMBUAT KOMITMEN</h1>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><I class="fa fa-plus"></I> Tambah PPK</button>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th style="vertical-align: middle">NAMA</th>
              <th style="vertical-align: middle">NIP</th>
              <th style="width:70px;vertical-align: middle">Aksi</th>
            </tr>
          </thead>
          <tbody> <?php foreach ($ppk as $row) : ?>
              <tr>
                <td><?php echo $row->ppk ?></td>
                <td><?php echo $row->nip ?></td>

                <td>

                  <!-- Tombol Edit -->
                  <button class="btn btn-info btn-sm btn-edit" data-nip_lama="<?php echo $row->ppk; ?>" data-ppk="<?php echo $row->ppk; ?>" data-nip="<?php echo $row->nip; ?>">
                    <i class="far fa-edit"></i>
                  </button>

                  <!-- Tombol Hapus -->
                  <a href="<?php echo site_url('sispek/ppk/hapus/' . $row->nip); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $row->ppk; ?>?')">
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
        <form id="formTambahPPK" method="post">

          <div class="form-group">
            <label for="">NIP</label>
            <input type="text" id="nip" name="nip" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama Penjabat Pembuat Komitmen</label>
            <input type="text" id="ppk" name="ppk" class="form-control" required>
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