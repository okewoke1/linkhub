<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kegiatan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Kegiatan
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header bg-gradient-secondary">
                            <h3 class="card-title text-gray-100">Data Lama</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php foreach ($kegiatan as $row) { ?>


                            <div class="card-body">

                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input disabled type="text" name="" class="form-control" placeholder="" value="<?php echo $row->jabatan ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Kegiatan</label>
                                    <input disabled type="text" name="" class="form-control" placeholder="" value="<?php echo $row->uraian_tugas ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input disabled type="text" name="" class="form-control" placeholder="" value="<?php echo $row->satuan ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Honor</label>
                                    <input disabled type="number" id="rupiah" class="form-control" placeholder="" value="<?php echo $row->honor ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Kelompok Anggaran</label>
                                    <input disabled type="text" name="" class="form-control" placeholder="" value="<?php echo $row->kelompok_anggaran ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Anggaran</label>
                                    <input disabled type="text" name="" class="form-control" placeholder="" value="<?php echo $row->kode_anggaran ?>">
                                </div>

                                <!-- /.card-body -->



                            </div>
                    </div>

                </div>
                <!--/.col (left) -->

                <!-- right column -->
                <div class="col-md-6">
                    <!-- Form Element sizes -->
                    <div class="card">
                        <div class="card-header bg-gradient-primary">
                            <h3 class="card-title text-gray-100">Data Baru</h3>
                        </div>

                        <form action="<?php echo base_url() . 'sispek/kegiatan/update' ?>" method="post">
                            <div class="card-body">
                                <div class="form-group" hidden>
                                    <label for="">ID</label>
                                    <input type="text" class="form-control" name="id_tugas" placeholder="ID" value="<?php echo $row->id_tugas ?>" required>
                                    <input hidden type="text" name="id_lama" class="form-control" placeholder="ID" value="<?php echo $row->id_tugas ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="jabatan">Jabatan</label>
                                    <select name="jabatan" class="form-control" required>
                                        <option value="PPL" <?php echo ($row->jabatan == 'PPL') ? 'selected' : ''; ?>>Petugas Pendataan Lapangan (PPL)</option>
                                        <option value="PML" <?php echo ($row->jabatan == 'PML') ? 'selected' : ''; ?>>Petugas Pemeriksa Lapangan (PML)</option>
                                        <option value="PPD" <?php echo ($row->jabatan == 'PPD') ? 'selected' : ''; ?>>Petugas Pengolahan Data (PPD)</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Nama Kegiatan</label>
                                    <input type="text" name="uraian_tugas" class="form-control" placeholder="Uraian Tugas" value="<?php echo $row->uraian_tugas ?>" required>

                                </div>
                                <div class="form-group">
                                    <label for="">Satuan Kegiatan</label>
                                    <input type="text" name="satuan" class="form-control" placeholder="Satuan Kegiatan" value="<?php echo $row->satuan ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Honor</label>
                                    <input type="number" name="honor" id="rupiah" class="form-control" placeholder="Honor Kegiatan" value="<?php echo $row->honor ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Kode Anggaran</label>
                                    <select class="form-control bg-warning" type="text" id="kelompok_anggaran" name="kelompok_anggaran">
                                        <!-- <option value="">Pilih Kelompok Anggaran</option> -->
                                        <option value="<?php echo $row->kelompok_anggaran ?>"><?php echo $row->kelompok_anggaran ?></option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="">Rincian Anggaran</label>
                                    <input readonly type="text" id="kode_anggaran" name="kode_anggaran" class="form-control" placeholder="Kode Anggaran" value="<?php echo $row->kode_anggaran ?>" required>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer text-right">
                                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location.href='<?php echo site_url('sispek/kegiatan/'); ?>'">Batal</button>
                                </div>
                            </div>
                        </form>
                    <?php } ?>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>