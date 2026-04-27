<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR KEGIATAN</h1>
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('kontrak'); ?>'">
          <i class="fas fa-plus"></i> Buat SPK Baru
        </button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarspk'); ?>'">
          <i class="far fa-file-alt"></i> Daftar SPK
        </button>
        <button disabled type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarkegiatan'); ?>'">
          <i class="fas fa-chart-pie"></i> Daftar Kegiatan
        </button>
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarbast'); ?>'">
          <i class="far fa-handshake"></i> Daftar BAST
        </button>
      </div>
    </div>
  </div>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <!-- Filter Bulan dan Tahun -->
        <form method="get" action="<?php echo base_url('daftarkegiatan'); ?>" id="filterForm" class="form-inline mb-4">
          <div class="form-group mx-sm-2 mb-2">
            <label for="bulan" class="sr-only">Pilih Bulan:</label>
            <select name="bulan" id="bulan" class="form-control form-control-sm">
              <option value="">Semua Bulan</option>
              <?php
              $bulan_array = bulan_array_indonesia();
              foreach ($bulan_array as $num => $name) {
                $selected = $this->input->get('bulan') == $num ? 'selected' : ''; // Menandai bulan terpilih
                echo "<option value='$num' $selected>$name</option>";
              }
              ?>
            </select>
          </div>

          <div class="form-group mx-sm-2 mb-2">
            <label for="tahun" class="sr-only">Pilih Tahun:</label>
            <select name="tahun" id="tahun" class="form-control form-control-sm">
              <option value="">Semua Tahun</option>
              <?php
                $current_year = date('Y');
                for ($year = $current_year + 1; $year >= $current_year - 5; $year--) {
                    $selected = $this->input->get('tahun') == $year ? 'selected' : ''; // Menandai tahun terpilih
                    echo "<option value='$year' $selected>$year</option>";
                }
              ?>

            </select>
          </div>
          <div class="form-group mx-sm-2 mb-2">
            <label for="kelompok_anggaran" class="sr-only">Kelompok Anggaran:</label>
            <select name="kelompok_anggaran" id="kelompok_anggaran" class="form-control form-control-sm">
              <option value="">Semua Kelompok Anggaran</option>
              <?php
              // Ambil data kelompok anggaran dari database
              if (!empty($kelompok_anggaran_array)) {
                foreach ($kelompok_anggaran_array as $kelompok) {
                  $selected = $this->input->get('kelompok_anggaran') == $kelompok->kelompok_anggaran ? 'selected' : '';
                  echo "<option value='{$kelompok->kelompok_anggaran}' $selected>{$kelompok->kelompok_anggaran}</option>";
                }
              } else {
                echo "<option value=''>Tidak ada kelompok anggaran</option>";
              }
              ?>
            </select>
          </div>
          
<div class="form-group mx-sm-2 mb-2">
  <label for="id_tugas" class="sr-only">Kegiatan</label>
  <select name="id_tugas" id="id_tugas" class="form-control form-control-sm">
    <option value="">Semua Kegiatan</option>
  </select>
</div>


          <button type="submit" class="btn btn-primary btn-sm mb-2">Filter</button>
        </form>

        <table class="table table-bordered" id="tabel_perkegiatan" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
              <th style="width:60px;vertical-align: middle">Tanggal</th>
              <th style="width:60px;vertical-align: middle">Nomor SPK</th>
              <th style="width:120px;vertical-align: middle">Nama Mitra / ID</th>
              <th style="width:80px;vertical-align: middle">Kelompok Kegiatan</th>
              <th style="width:80px;vertical-align: middle">Jabatan</th>
              <th style="vertical-align: middle">Kegiatan</th>
              <th style="width:50px;vertical-align: middle">Harga</th>
              <th style="width:1px;vertical-align: middle">Qty</th>
              <th style="width:70px;vertical-align: middle">Jumlah</th>
              <!--<th style="width:150px;vertical-align: middle">History Update</th>-->
              <th style="width:80px;vertical-align: middle">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($dataspk as $row) : ?>
              <tr>
                <td><?php echo $row->tanggal_spk; ?></td>
                <td>
                  <a href="<?php echo base_url('daftarspk/detail/') . substr($row->no_spk, 0, 4) . "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>">
                    <?php echo $row->no_spk; ?>
                  </a>
                </td>
                <td><b><?php echo ucwords(strtolower($row->nama_mitra)); ?></b><br> <?php echo $row->id_sobat; ?></td>
                <td><?php echo $row->kelompok_anggaran; ?></td>
                <td>
                  <?php
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
                <td><?php echo $row->uraian_tugas; ?></td>
                <td style="text-align: right;">
                    <?php 
                        $honor = ($row->volume != 0) ? ($row->nilai_perjanjian / $row->volume) : 0;
                        echo format_ribuan($honor);
                    ?>
                </td>
                <td><?php echo $row->volume; ?></td>
                <td style="text-align: right;"><?php echo format_ribuan($row->nilai_perjanjian); ?></td>
                <!--<td style="font-size: small;"><?php echo $row->log; ?></td>-->
                <td>
                  <div class="row no-gutters">
                    <!-- Baris pertama -->
                    <div class="col-md-12 pr-1 mb-1">
                      <!-- Tombol cetak SPK -->
                      <a title="Cetak SPK" href="<?php echo base_url('daftarspk/cetak_spk/') . substr($row->no_spk, 0, 4) . "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>" class="btn btn-info btn-sm btn-block" target="_blank">
                        <!--<i class="fa fa-print"></i>-->
                        <span class="d-none d-md-inline">SPK</span>
                      </a>

                      <!-- Tombol cetak BAST -->
                      <a title="Cetak BAST" href="javascript:void(0);" class="btn btn-success btn-sm btn-block" onclick="cekBAST('<?php echo $row->no_spk; ?>')">
                        <!--<i class="fa fa-print"></i>-->
                        <span class="d-none d-md-inline">BAST</span>
                      </a>
                    </div>
                  </div>
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
        <h4 class="modal-title fs-5" id="exampleModalLabel">Form Input BAST</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formBast" method="post">
          <div class="form-group">
            <label for="">Tanggal BAST</label>
            <input type="text" id="tanggal_bast" name="tanggal_bast" class="form-control" required>
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

<!-- Include modal input BAST -->
<?php include 'modal_input_bast.php'; ?>
