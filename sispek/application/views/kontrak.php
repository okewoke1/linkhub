<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Page Heading -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">DAFTAR KEGIATAN</h1>
                        <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button disabled type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('kontrak'); ?>'">
                                    <i class="fas fa-plus"></i> Buat SPK Baru
                                </button>
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarspk'); ?>'">
                                    <i class="far fa-file-alt"></i> Daftar SPK
                                </button>
                                <button  type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarkegiatan'); ?>'">
                                    <i class="fas fa-chart-pie"></i> Daftar Kegiatan
                                </button>
                                <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarbast'); ?>'">
                                    <i class="far fa-handshake"></i> Daftar BAST
                                </button>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

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
                                        <input readonly name="no_spk" id="keyword" type="text" class="form-control">
                                    </div>
                                    <div id=""></div>
                                </td>
                                <td></td>

                                <td>
                                    <label>Nama Mitra</label>
                                </td>
                                <td width="200px;">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="nama_mitra" onkeyup="fetchMitraData(this.value)">
                                    </div>
                                    <div id="nama_mitra_list" class="list-group" style="display: none; position: absolute; z-index: 1000;"></div>
                                </td>

                                <td width="10px;"></td>
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
                                    <label>ID Sobat | Telp</label>
                                </td>
                                <td width="200px;">
                                    <input name="id_sobat" id="id_sobat" type="text" class="form-control" hidden>
                                    <div class="input-group">
                                        <input name="id_sobat_telp" id="id_sobat_telp" type="text" class="form-control" disabled>
                                    </div>
                                </td>
                                <td width="10px;"></td>
                            </tr>

                            <tr>
                                <td width="80px;">
                                    <label>Kegiatan</label>
                                </td>
                                <td width="200px;">
                                    <div class="input-group">
                                        <select disabled class="form-control" id="kelompok_anggaran" name="kelompok_anggaran" required>
                                            <option selected="0">Pilih Kelompok Anggaran</option>
                                        </select>
                                    </div>
                                </td>
                                <td width="30px;"></td>

                                <td width="150px;">
                                    <label>Penjabat Pembuat Komitmen</label>
                                </td>

                                <td>
                                    <div class="input-group">
                                        <?php if (count($ppk) === 1): ?>
                                            <?php foreach ($ppk as $row): ?>
                                                <input  type="hidden" id="ppk" name="ppk" value="<?= $row->nip ?>">
                                                <span class="form-control"><?= $row->ppk ?></span>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <select class="form-control" id="ppk" name="ppk">
                                                <option value="0" selected>Choose...</option>
                                                <?php foreach ($ppk as $row): ?>
                                                    <option value="<?= $row->nip ?>"><?= $row->ppk ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        <?php endif; ?>
                                    </div>
                                </td>
                                <td width="10px;"></td>
                            </tr>
                        </table>
                    </div>

                    <div class="input-group mb-2">
                        <select disabled onchange="voc_vol()" style="width:450px" class="form-control bg-info text-white" type="text" id="uraian_tugas" name="">
                            <option selected="0">Pilih Kegiatan</option>
                        </select>

                        <input hidden style="width:20px" id="id_tugas" name="id_tugas" type="text" class="form-control" placeholder="ID">
                        <input hidden style="width:250px" id="kode_anggaran" name="" type="text" class="form-control" placeholder="Kode Kegiatan">
                        <input readonly style="width:80px" id="satuan" name="" type="text" class="form-control" placeholder="Satuan">
                        <input readonly style="width:100px" id="honor" name="" type="text" class="form-control" placeholder="Biaya">
                        <input required disabled style="width:50px" id="volume" name="volume" oninput="angka()" onkeyup="perkalian()" type="text" class="form-control bg-info text-white" placeholder="Qty">
                        <input readonly style="width:80px" id="jumlah" name="jumlah" type="text" class="form-control" placeholder="Jumlah">
                        <button disabled id="simpan" type="submit" class="btn btn-primary">Tambah</button>
                    </div>

                    <table id="tampil_data" class="table table-bordered table-hover" style="width:100%;">
                        <thead class="thead-dark" style="vertical-align: middle;text-align: center;">
                            <tr>
                                <th style="width:150px">SPK</th>
                                <th style="width:450px;">Uraian Kegiatan</th>
                                <!--<th style="width:100px;">Kegiatan</th>-->
                                <th style="width:150px">Satuan</th>
                                <th style="width:200px">Honor</th>
                                <th style="width:80px">Qty</th>
                                <th style="width:200px">Jumlah</th>
                                <th style="width:30px" colspan="1">AKSI</th>
                            </tr>
                        </thead>
                        <tbody id=""> </tbody>

                        <tfoot class="">
                            <tr>
                                <td style="text-align: center;" colspan="3">
                                    <div id="terbilang"></div>
                                </td>
                                <td style="vertical-align: middle;text-align: right;" colspan="2"><b>Total Perjanjian :</b></td>
                                <td id="total_jumlah" style="text-align: left;"></td>
                                <td> </td>
                            </tr>
                        </tfoot>
                    </table>

                    <div class="text-right">
                        <a disabled onclick="batalSPK()" class="btn btn-danger">
                            <span class="icon text-white-50">
                                <i class="fas fa-exclamation-triangle"></i>
                            </span>
                            <span class="text">Batal</span>
                        </a>
                        <a onclick="simpan_spk()" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="fas fa-save"></i>
                            </span>
                            <span class="text">Simpan</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
