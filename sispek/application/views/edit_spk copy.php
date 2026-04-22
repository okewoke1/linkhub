<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h3>Form Perjanjian Kontrak</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Perjanjian Kontrak</li>
                            </ol>
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
                                                <input readonly name="no_spk" id="keyword" type="text" class="form-control"><?php echo $row->no_spk; ?>
                                            <?php }; ?>
                                        </div>
                                    </td>
                                    <td></td>
                                    <td>
                                        <label>Nama Mitra</label>
                                    </td>
                                    <td width="200px;">
                                        <div class="input-group">
                                            <!-- <input type="text" id="" name="" class="form-control float-right" placeholder="Search"> -->
                                            <select class="form-control" type="text" id="nama_mitra" name="nama_mita">
                                                <option selected="0">Choose...</option>
                                                <?php
                                                foreach ($data_mitra as $row) {
                                                    echo  "<option value='" . $row->nama_mitra . "'>" . $row->nama_mitra .  "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </td>
                                    <td width="10px;"></td>
                                    <td width="100px;"><a onclick="simpan_spk()" class="btn btn-block btn-primary">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-save"></i>
                                            </span>
                                            <span class="text">Simpan</span>
                                        </a></td>
                                </tr>

                                <tr>
                                    <td>
                                        <label>Tanggal SPK</label>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input id="tgl_spk" type="date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask>
                                            <span class="input-group-append">
                                                <button id="generate" onclick="generate()" type="button" class="btn btn-info btn-flat">Generate</button>
                                            </span>
                                        </div>

                                    </td>
                                    <td></td>
                                    <td>
                                        <label>ID Sobat</label>
                                    </td>
                                    <td width="200px;">
                                        <div class="input-group">
                                            <input name="id_sobat" id="id_sobat" onchange="id_sobat()" disabled type="text" class="form-control">
                                        </div>
                                    </td>
                                    <td width="10px;"></td>

                                    <td width="100px;"><a onclick="hapusSPK()" class="btn btn-block btn-danger">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-exclamation-triangle"></i>
                                            </span>
                                            <span class="text">Batal</span>
                                        </a></td>

                                </tr>

                                <tr>
                                    <td width="160px;">
                                        <label>Penjabat Pembuat Komitmen</label>
                                    </td>
                                    </td>
                                    <td width="200px;">

                                        <div class="input-group">
                                            <!-- <input name="ppk" id="ppk" type="text" class="form-control"> -->
                                            <select class="form-control" type="text" id="ppk" name="ppk">
                                                <option selected="0">Choose...</option>
                                                <?php
                                                foreach ($ppk as $row) {
                                                    echo  "<option value='" . $row->nip . "'>" . $row->ppk .  "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                    </td>
                                    <!-- spasi antara nama mitra -->
                                    <td width="30px;"></td>
                                    <td width="100px;">
                                        <label>Telp</label>
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <input disabled id="telp" type="text" class="form-control">
                                        </div>
                                    </td>
                                    <td width="10px;"></td>
                                    <td width="100px;">
                                        <a href="<?php echo base_url('daftarspk') ?>" class="btn btn-block btn-info">
                                            <span class="text">Lihat List SPK</span>
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </div>


                        <!-- <form method="post" action="<?php echo base_url() . 'kontrak/tambah_aksi'; ?>"> -->
                        <div class="input-group mb-2">

                            <select disabled onchange="voc_vol()" style="width:450px" class="form-control bg-info text-white" type="text" id="uraian_tugas" name="">
                                <option selected="0">Pilih Kegiatan</option>
                                <?php
                                foreach ($data_kegiatan as $row) {
                                    echo  "<option value='" . $row->uraian_tugas . "'>" . $row->kelompok_anggaran . ' ' . $row->uraian_tugas . "</option>";
                                }
                                ?>
                            </select>
                            <input hidden style="width:20px" id="id_tugas" name="id_tugas" type="text" class="form-control" placeholder="ID">
                            <input hidden style="width:250px" id="kode_anggaran" name="" type="text" class="form-control" placeholder="Kode Keigatan">
                            <input readonly style="width:80px" id="satuan" name="" type="text" class="form-control" placeholder="Satuan">
                            <input readonly style="width:100px" id="honor" name="" type="text" class="form-control" placeholder="Biaya">
                            <input required disabled style="width:50px" id="volume" name="volume" onkeyup="perkalian()" type="number" class="form-control bg-info text-white" placeholder="Qty">
                            <input readonly style="width:80px" id="jumlah" name="jumlah" type="text" class="form-control" placeholder="Jumlah">
                            <button disabled id="simpan" type="submit" class="btn btn-primary">Tambah</button>
                            <!-- <div id="hasil"></div> -->

                        </div>
                        <!-- </form> -->
                        <!-- /.card -->

                        <table id="tampil_data" class="table table-bordered table-hover" style="width:100%;">
                            <thead class="thead-dark" style="vertical-align: middle;text-align: center;">
                                <tr>
                                    <th style="width:50px">SPK</th>
                                    <th style="width:450px;">Uraian Kegiatan</th>
                                    <!-- <th style="width:300px">Kode Anggaran</th> -->
                                    <th style="width:150px">Satuan</th>
                                    <th style="width:200px">Honor</th>
                                    <th style="width:80px">Qty</th>
                                    <th style="width:200px">Jumlah</th>
                                    <th colspan="2">AKSI</th>
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

                    </div>





                </div>
            </section>

        </div>
</body>