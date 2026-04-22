 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1 class="m-0">MITRA</h1>
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
                         <?php foreach ($mitra as $row) { ?>


                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="">Nama Mitra</label>
                                     <input disabled type="text" class="form-control" name="" placeholder="Nama Mitra" value="<?php echo $row->nama_mitra ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="">ID Mitra</label>
                                     <input disabled type="text" name="id_lama" class="form-control" placeholder="ID Sobat / Mitra" value="<?php echo $row->id_sobat ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="">NIK</label>
                                     <input disabled type="text" name="" class="form-control" placeholder="NIK" value="<?php echo $row->nik ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="">Telp</label>
                                     <input disabled type="text" name="" class="form-control" placeholder="Telp" value="<?php echo $row->telp ?>">
                                 </div>
                                 <div class="form-group">
                                     <label for="">Alamat</label>
                                     <input disabled type="text" name="" class="form-control" placeholder="Alamat" value="<?php echo $row->alamat ?>">
                                 </div>
                                 <!-- /.card-body -->

                             <?php } ?>

                             </div>
                     </div>

                 </div>
                 <!--/.col (left) -->

                 <!-- right column -->
                 <div class="col-md-6">
                     <!-- Form Element sizes -->
                     <div class="card card-success">

                         <div class="card-header bg-gradient-primary">
                             <h3 class="card-title text-gray-100">Data Baru</h3>
                         </div>

                         <form action="<?php echo base_url() . 'mitra/update' ?>" method="post">
                             <div class="card-body">
                                 <div class="form-group">
                                     <label for="">Nama Mitra</label>
                                     <input type="text" class="form-control" name="nama_mitra" placeholder="Nama Mitra" value="<?php echo $row->nama_mitra ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="">ID Mitra</label>
                                     <input type="text" name="id_sobat" class="form-control" placeholder="ID Sobat / Mitra" value="<?php echo $row->id_sobat ?>" required>
                                     <input hidden type="text" name="id_lama" class="form-control" placeholder="ID Sobat / Mitra" value="<?php echo $row->id_sobat ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="">NIK</label>
                                     <input type="text" name="nik" class="form-control" placeholder="NIK" value="<?php echo $row->nik ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Telp</label>
                                     <input type="text" name="telp" class="form-control" placeholder="Telp" value="<?php echo $row->telp ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="">Alamat</label>
                                     <input type="text" name="alamat" class="form-control" placeholder="Alamat" value="<?php echo $row->alamat ?>" required>
                                 </div>
                                 <!-- /.card-body -->

                                 <div class="card-footer text-right">
                                     <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                                     <button type="submit" class="btn btn-primary">Simpan</button>
                                     <button type="button" class="btn btn-secondary" onclick="window.location.href='<?php echo site_url('mitra/'); ?>'">Batal</button>
                                 </div>
                         </form>

                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                 </div>
             </div>
     </section>
 </div>