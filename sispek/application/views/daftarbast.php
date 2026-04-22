<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">DAFTAR BAST</h1>
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
        <button disabled type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarbast'); ?>'">
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
        <form method="get" action="<?php echo base_url('daftarbast'); ?>" id="filterForm" class="form-inline mb-4">
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

          <button type="submit" class="btn btn-primary btn-sm mb-2">Filter</button>
        </form>

        <table class="table table-bordered" id="tabel_bast" width="100%" cellspacing="0">
          <thead>
            <tr style="text-align: center;">
            <th style="width:65px;vertical-align: middle;text-align: center;">Tanggal BAST</th>
              <th style="width:80px;vertical-align: middle">Nomor BAST</th>
              
              <th style="width:65px;vertical-align: middle">Tanggal SPK</th>
              <th style="width:80px;vertical-align: middle">Nomor SPK</th>
              
              <th style="width:120px;vertical-align: middle">Nama Mitra / ID</th>
              <th style="width:90px;vertical-align: middle">Nilai Perjanjian</th>
              <th style="width:70px;vertical-align: middle">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($daftarbast as $row) : ?>
              <tr style="text-align: center;">
                
                <!--<td><?php echo date('d', strtotime($row->tanggal_bast)) . " " . bulan_indonesia($row->tanggal_bast) . " " . date('Y', strtotime($row->tanggal_bast)); ?></td>-->
                <td style="vertical-align: middle"><?php echo $row->tanggal_bast ?></td>
                <td style="vertical-align: middle"><?php echo $row->no_bast ?></td>
                
                <td style="vertical-align: middle"><?php echo $row->tanggal_spk ?></td>
                <td style="vertical-align: middle"><?php echo $row->no_spk ?></td>
                
                <!--<td><?php echo date('d', strtotime($row->tanggal_spk)) . " " . bulan_indonesia($row->tanggal_spk) . " " . date('Y', strtotime($row->tanggal_spk)); ?></td>-->
                
                <td style="vertical-align: middle"><b><?php echo ucwords(strtolower($row->nama_mitra)); ?></b><br> <?php echo $row->id_sobat ?></td>
                <td style="vertical-align: middle;text-align: right;"><?php echo format_ribuan($row->total_perjanjian) ?></td>

                <td>
                  <!-- Tombol View -->
                  <a title="View" class="btn btn-primary btn-sm btn-view" data-no_spk="<?php echo $row->no_spk; ?>" href="<?php echo base_url('daftarspk/detail/') . substr($row->no_spk, 0, 4) . "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>">
                    <i class="fa fa-eye"></i>
                  </a>

                  <!-- Tombol cetak -->
                  <a title="Cetak / Print" href="<?php echo base_url('daftarbast/cetak_bast/') . substr($row->no_spk, 0, 4) . "/" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>" class="btn btn-info btn-sm" target="_blank">
                    <i class="fa fa-print"></i>
                  </a>

                  <!-- Tombol hapus -->
                  <button class="btn btn-danger btn-sm btn-hapusbast" data-no-bast="<?php echo $row->no_bast ?>"><i class="fas fa-trash"></i></button>


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