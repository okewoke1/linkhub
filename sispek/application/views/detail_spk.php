<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DETAIL KEGIATAN</h1>
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('kontrak'); ?>'">
          <i class="fas fa-plus"></i> Buat SPK Baru
        </button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarspk'); ?>'">
          <i class="far fa-file-alt"></i> Daftar SPK
        </button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarkegiatan'); ?>'">
          <i class="fas fa-chart-pie"></i> Daftar Kegiatan
        </button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarbast'); ?>'">
          <i class="far fa-handshake"></i> Daftar BAST
        </button>
      </div>
    </div>
  </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <?php foreach ($spk as $row) : ?>
                        <div class="card shadow mb-4 d-sm-flex">
                            <div class="card-header py-12">
                                <h6 class="m-0 font-weight-bold text-primary">No SPK: <?php echo $row->no_spk; ?></h6>
                                <h6 class="m-0 text-dark">Tanggal: <?php echo $row->tanggal_spk; ?></h6>
                                <!-- Tanggal: <?php echo $row->tanggal_spk; ?> -->

                            </div>

                            <div class="card-body">
                                <div class="row invoice-info">
                                    <div class="col-sm-3 invoice-col">
                                        <address>
                                            Nama Mitra<br>
                                            ID <br>
                                            Penjabat Pembuat Komitmen
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">

                                        <address>
                                            : <?php echo $row->nama_mitra; ?> <br>
                                            : <?php echo $row->id_sobat; ?> <br>
                                            : <?php echo $row->ppk; ?>
                                        </address>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <strong>Detail SPK Rinci</strong>
                            <table class="table" id="">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kelompok Anggaran</th>
                                        <th>Kode Anggaran</th>
                                        <th>Nama Kegiatan</th>
                                        <th>Jabatan</th>
                                        <th>Satuan</th>
                                        <th>Volume</th>
                                        <th>Biaya</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody><?php $no = 1; // Inisialisasi variabel di luar loop ?>
                                    <?php foreach ($tabel as $row) : ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row->kelompok_anggaran; ?></td>
                                            <td><?php echo $row->kode_anggaran; ?></td>
                                            <td><?php echo $row->uraian_tugas; ?></td>
                                            <td>
                                                <?php
                                                // echo $row->jabatan
                                                 if ($row->jabatan == 'PPL') {
                                                        echo 'Petugas Pendataan Lapangan';
                                                    } elseif ($row->jabatan == 'PML') {
                                                        echo 'Petugas Pemeriksa Lapangan';
                                                    } elseif ($row->jabatan == 'PPD') {
                                                        echo 'Petugas Pengolahan Data';
                                                    } else {
                                                        echo 'Jabatan Tidak Diketahui';
                                                    }
                                                ?>
                                            </td>
                                            
                                            <td><?php echo $row->satuan; ?></td>
                                            <td><?php echo $row->volume; ?></td>
                                            <td style="text-align: right;"><?php echo format_ribuan($row->honor); ?></td>
                                            <td style="text-align: right;"><?php echo format_ribuan($row->nilai_perjanjian); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot class="">
                                    <?php foreach ($spk as $row) : ?>
                                        <tr>
                                            <td style="text-align: center;" colspan="4">
                                                <div id="">
                                                    <b>Terbilang :
                                                        <?php echo ucwords(terbilang($row->total_perjanjian)) . " Rupiah"; ?>
                                                    </b>
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle;text-align: right;" colspan="3">
                                                <b>Total : <?php echo format_ribuan($row->total_perjanjian); ?></b>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tfoot>
                            </table>

                            <div class="text-right">

                                <!-- Tombol Kembali -->
                                <button id="kembaliBtn" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Kembali</button>
                                
                                <a title="Edit" href="<?php echo base_url('daftarspk/edit_spk/') . substr($row->no_spk, 0, 4). "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>" class="btn btn-success">
                                    <i class="far fa-edit"></i> Edit
                                </a>

                                <a title="Cetak / Print" href="<?php echo base_url('daftarspk/cetak_spk/') . substr($row->no_spk, 0, 4) . "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>" class="btn btn-danger" target="_blank">
                                    <i class="fa fa-print"></i> Print
                                </a>
                            </div>
                            </div>

                        </div>

                </div>
                <!-- /.row -->
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->

    </section><!-- /.content -->
</div><!-- /.content-wrapper -->