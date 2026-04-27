<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR USER</h1>
    <?php
    if ($level == '1') { ?>
    <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#exampleModal"><I class="fa fa-plus"></I> User Baru</button>
    <?php }
    ?> 
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">

    <div class="card-body">

      <div class="table-responsive">

        <table class="table table-bordered" id="tabel_user" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th style="width:10;vertical-align: middle">No</th>
              <th style="width:300;vertical-align: middle;">Nama</th>
              <th style="width:300;vertical-align: middle">NIP</th>
              <!--<th style="width:300;vertical-align: middle">Email</th>-->
              <th style="vertical-align: middle">Level</th>
              <th style="vertical-align: middle">Status</th>
              <th style="width:70px;vertical-align: middle">Aksi</th>
              <th style="width:135px;vertical-align: middle">#</th>
            </tr>
          </thead>
          
          <tbody>
            <?php $i = 1;
            if ($level == '1') {
              foreach ($user as $row) : ?>
                <tr>
                  <td style="text-align: center;"></td>
                  <td style="text-align: left;"><?php echo ($row->username) ?></td>
                  <td style="text-align: center;"><?php echo ($row->nip) ?> / <?php echo ($row->nip_bps) ?></td>
                  <!--<td style="text-align: center;"><?php echo ($row->email) ?></td>-->
                  <td style="text-align: center;"><?php echo ($row->level == 1) ? 'Admin' : 'User'; ?></td>
                  <td style="text-align: center;"><?php echo ($row->is_active == 1) ? 'Aktif' : 'Tidak Aktif'; ?></td>
                  <td>
                    <!-- Tombol Edit -->
                    <button class="btn btn-info btn-sm btn-edit_user"
                      data-id="<?php echo $row->id; ?>"
                      data-username="<?php echo $row->username; ?>"
                      data-level="<?php echo $row->level; ?>"
                      data-is_active="<?php echo $row->is_active; ?>"
                      data-nip="<?php echo $row->nip; ?>"
                      data-nip_bps="<?php echo $row->nip_bps; ?>"
                      data-email="<?php echo $row->email; ?>">
                      <i class="far fa-edit"></i>
                    </button>

                    <!-- Tombol Hapus -->
                    <a href="<?php echo site_url('user/hapus/' . $row->id); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus <?php echo $row->username; ?>?')">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                  <!-- Tombol Ganti Password -->
                  <td>
                    <button class="btn btn-warning btn-sm btn-edit_PW" data-id="<?php echo $row->id; ?>" data-user="<?php echo $row->username; ?>">
                      <i class="far fa-edit" style="margin-right: 5px;"></i> Ganti Password
                    </button>
                  </td>
                </tr>
              <?php endforeach;
            } elseif ($level == '2') {
              foreach ($usernames as $username) : ?>
                <tr>
                  <td style="text-align: center;"><?php echo $i++; ?></td>
                  <td style="text-align: center;"><?php echo $username->username; ?></td>
                  <td style="text-align: center;">User</td>
                  <td style="text-align: center;"><?php echo ($username->is_active == 1) ? 'Aktif' : 'Tidak Aktif'; ?></td>
                  <td></td>
                  <td>
                    <button class="btn btn-warning btn-sm btn-edit_PW" data-id="<?php echo $username->id; ?>" data-user="<?php echo $username->username; ?>">
                      <i class="far fa-edit" style="margin-right: 5px;"></i> Ganti Password
                    </button>
                  </td>
                </tr>
            <?php endforeach;
            } ?>
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
        <h4 class="modal-title fs-5" id="exampleModalLabel">Form User</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTambahUser" method="post" enctype="multipart/form-data" autocomplete="off">
          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
          </div>
          <div class="form-group">
            <label for="">Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
              <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                  <i class="fa fa-eye"></i>
                </button>
              </div>
            </div>
          </div>
         <div class="form-group">
          <label for="nip">Email</label>
          <input type="text" class="form-control" id="email" name="email" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="nip">NIP</label>
          <input type="text" class="form-control" id="nip" name="nip">
        </div>
        <div class="form-group">
          <label for="nip_bps">NIP BPS</label>
          <input type="text" class="form-control" id="nip_bps" name="nip_bps">
        </div>
        <!--<div class="form-group">-->
        <!--  <label for="foto">Foto</label>-->
        <!--  <input type="file" class="form-control-file" id="foto" name="foto" accept="image/*">-->
        <!--</div>-->
          <div class="form-group">
            <label for="level">Level User</label>
            <select class="form-control" id="level" name="level" required>
              <option value="2">User</option>
              <option value="1">Admin</option>
            </select>
          </div>
          <div class="form-group">
            <label for="is_active">Status</label>
            <select class="form-control" id="is_active" name="is_active" required>
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
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
        <h5 class="modal-title" id="exampleModalLabel">Edit Data User</h5>
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