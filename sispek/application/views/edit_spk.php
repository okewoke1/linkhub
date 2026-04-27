<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Form Edit SPK</h3>
                        </div>

                    </div>
                </div><!-- /.container-fluid -->


                <div class="card card-navy">

                    <div class="card-body">
                        <div class="form-group">
                            <table width="100%">
                                <tr>
                                    <td>
                                        <label>Nomor SPK</label>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <?php foreach ($spk as $row) { ?>
                                                <input readonly name="no_spk" id="keyword" type="text" class="form-control" value="<?php echo $row->no_spk; ?>">
                                            <?php }; ?>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <label>Nama Mitra</label>
                                    </td>
                                    <td width="200px;">
                                        <div class="input-group">
                                            <input readonly type="text" value="<?php echo $row->nama_mitra; ?>" id="nama_mitra" name="nama_mitra" class="form-control float-right" placeholder="Search">

                                        </div>
                                    </td>
                                    <td width="10px;"></td>

                                </tr>

                                <tr>
                                    <td>
                                        <label>Tanggal SPK</label>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input disabled id="tgl_spk" type="date" value="<?php echo $row->tanggal_spk; ?>" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            <!--<span class="input-group-append">-->
                                            <!--     <button id="generate" onclick="generate()" type="button" class="btn btn-info btn-flat">Generate</button> -->
                                            <!--</span>-->
                                        </div>

                                    </td>
                                    <td></td>
                                    <td>
                                        <label>ID Sobat | Telp</label>
                                    </td>
                                    <td width="200px;">
                                        <input name="id_sobat" id="id_sobat" type="text" class="form-control" value="<?php echo $row->id_sobat ?>" hidden>
                                        <div class="input-group">
                                            <input name="id_sobat_telp" id="id_sobat_telp" disabled type="text" class="form-control" value="<?php echo $row->id_sobat . ' / ' . $row->telp ?>">
                                        </div>
                                    </td>
                                    <td width=" 10px;">
                                    </td>
                                </tr>

                                <tr>
                                    <td width="80px;">
                                        <label>Kegiatan</label>
                                    </td>
                                    <td width="200px;">
                                        <div class="input-group">
                                            <select class="form-control" id="kelompok_anggaran" name="kelompok_anggaran" required>
                                                <option selected="0">Pilih Kelompok Anggaran</option>
                                            </select>
                                        </div>
                                    </td>

                                    <!-- spasi antara nama mitra -->
                                    <td width="30px;"></td>
                                    <td width="150px;">

                                        <label>Penjabat Pembuat Komitmen</label>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <!-- <input name="ppk" id="ppk" type="text" class="form-control"> -->
                                            <select class="form-control" type="text" id="ppk" name="ppk">
                                                <!-- <option selected="0">Choose...</option> -->

                                                <option value="<?php echo $row->nip; ?>"><?php echo $row->ppk; ?></option>";

                                            </select>
                                        </div>
                                    </td>

                                    </td>
                                    <td width="10px;"></td>

                                </tr>
                            </table>

                        </div>

                        <div class="input-group mb-2">

                            <select onchange="voc_vol()" style="width:450px" class="form-control bg-info text-white" type="text" id="uraian_tugas" name="">
                                <option selected="0">Pilih Kegiatan</option>
                            </select>

                            <input hidden style="width:20px" id="id_tugas" name="id_tugas" type="text" class="form-control" placeholder="ID">
                            <input hidden style="width:250px" id="kode_anggaran" name="" type="text" class="form-control" placeholder="Kode Keigatan">
                            <input readonly style="width:80px" id="satuan" name="" type="text" class="form-control" placeholder="Satuan">
                            <input readonly style="width:100px" id="honor" name="" type="text" class="form-control" placeholder="Biaya">
                            <input required style="width:50px" id="volume" name="volume" onkeyup="perkalian()" type="number" class="form-control bg-info text-white" placeholder="Qty">
                            <input readonly style="width:80px" id="jumlah" name="jumlah" type="text" class="form-control" placeholder="Jumlah">
                            <button id="simpan" type="submit" class="btn btn-primary">Tambah</button>

                        </div>
                        <!-- /.card -->

                        <table id="tampil_data" class="table table-bordered table-hover" style="width:100%;">
                            <thead class="thead-dark" style="vertical-align: middle;text-align: center;">
                                <tr>
                                    <th style="width:260px">No SPK</th>
                                    <!--<th style="width:300px">Jabatan</th>-->
                                    <th style="width:900px;">Uraian Kegiatan</th>
                                    <th style="width:150px">Satuan</th>
                                    <th style="width:140px">Honor</th>
                                    <th style="width:120px">Jumlah</th>
                                    <th style="width:160px">Jumlah</th>
                                    <th style="width:20px"colspan="2">AKSI</th>
                                </tr>
                            </thead>
                            <tbody id="">

                            </tbody>
                            <tfoot class="">
                                <tr>
                                    <td style="text-align: center;" colspan="3">
                                        <div id="terbilang"></div>
                                    </td>
                                    <td style="vertical-align: middle;text-align: right;" colspan="2"><b>Total Perjanjian :</b></td>
                                    <td id="total_jumlah" style="text-align: left;">

                                    </td>
                                    <td> </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div class="text-right">
                            <!--<a href="<?php echo base_url('daftarspk') ?>" class="btn btn-info">-->
                            <!--    <span class="text">Lihat List SPK</span>-->
                            <!--</a>-->
                            <!--<a href="<?php echo base_url('daftarkegiatan') ?>" class="btn btn-info">-->
                            <!--    <span class="text">Lihat Daftar Kegiatan</span>-->
                            <!--</a>-->

                            <button onclick="update_spk()" class="btn btn-success update">
                                <span class="icon text-white-50">
                                    <i class="fas fa-save"></i>
                                </span>
                                <span class="text">Update</span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</body>