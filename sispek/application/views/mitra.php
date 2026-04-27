<style>
  /* Adjust modal size if needed */
  .modal-sm {
    max-width: 400px;
  }

  /* Style file input button */
  .custom-file-input {
    color: transparent;
  }

  .custom-file-input::-webkit-file-upload-button {
    visibility: hidden;
  }

  .custom-file-input::before {
    content: 'Select Excel File';
    display: inline-block;
    background: linear-gradient(to right, #4e73df, #224abe);
    border: 1px solid #1e1e1e;
    border-radius: 5px;
    padding: 8px 12px;
    color: #fff;
    cursor: pointer;
  }
</style>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">MITRA</h1>
    <div class="dropdown d-inline">
      <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <I class="fas fa-file-alt"></I> Tambah Mitra
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><I class="fa fa-file-alt"></i> Form Mitra Baru</button>
        <button class="dropdown-item" data-toggle="modal" data-target="#importModal"><i class="fa fa-upload"></i> Upload Excel</button>
        <a href="<?php echo base_url('mitra/download_template'); ?>" class="dropdown-item" type="button">Download Template Excel</a>


      </div>
    </div>

    <!-- <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><I class="fa fa-plus"></I> Tambah Mitra Baru</button> -->

  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead style="vertical-align: middle;text-align: center;">
            <tr>
              <!-- <th style="width:30px;">No</th> -->
              <th style="width:150px;">Nama Mitra</th>
              <th style="width:100px;">ID Mitra</th>
              <!--<th style="width:150px;">NIK</th>-->
              <th style="width:140px;">Telp</th>
              <th style="width:300px;">Alamat</th>
              <th style="width:58px;">AKSI</th>
            </tr>
          </thead>
          <tbody> <?php
                  $no = 1;
                  foreach ($mitra as $row) : ?> <tr>
                <!-- <td class="text-center"><?php echo $no++ ?></td> -->
                <td><?php echo $row->nama_mitra ?></td>
                <td><?php echo $row->id_sobat ?></td>
                <!--<td><?php echo $row->nik ?></td>-->
                <td><?php echo $row->telp ?></td>
                <td><?php echo $row->alamat ?></td>
                <td>
                    <!-- Tombol Lihat Detail -->
                    <a href="<?php echo site_url('datamitra/index/' . $row->id_sobat); ?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye"></i>
                    </a>
                    
                  <!-- Tombol Edit -->
                  <a href="<?php echo site_url('mitra/edit/' . $row->id_sobat); ?>" class="btn btn-info btn-sm" onclick="return confirm('Apakah Anda ingin mengedit data <?php echo $row->nama_mitra; ?>?');">
                    <i class="fa fa-edit"></i>
                  </a>

                  <!-- Tombol Hapus -->
                  <a href="<?php echo site_url('mitra/hapus/' . $row->id_sobat); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus mitra <?php echo $row->nama_mitra; ?>?');">
                    <i class="fa fa-trash"></i>
                  </a>
                </td>

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
        <h4 class="modal-title fs-5" id="exampleModalLabel">Form Input Mitra</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url() . 'mitra/tambah_aksi'; ?>">
          <div class="form-group">
            <label for="">ID SOBAT</label>
            <input type="number" name="id_sobat" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama_mitra" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">NIK</label>
            <input type="number" name="nik" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Telp</label>
            <input type="number" name="telp" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
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

<!-- Modal for Importing Excel -->
<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fs-5" id="importModalLabel">Import Mitra from Excel</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="uploadForm" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="excelFile">Upload File</label>
            <input type="file" class="form-control-file" id="excelFile" name="file_mitra" accept=".xlsx, .xls">
          </div>
      </div>
      <!-- <div class="modal-body">
        <label>File Excel</label>
        <div class="costume-file">
          <input type="file" name="file_excel" class="costume-file-input" id="file_excel" required>
          <label for="file_excel" class="costume-file-label"></label>
        </div>
      </div> -->

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" form="uploadForm" class="btn btn-primary">Upload</button>
      </div>
    </div>
    </form>
  </div>
</div>