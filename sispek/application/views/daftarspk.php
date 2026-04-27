<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">DAFTAR SPK</h1>
    <div class="btn-toolbar mb-3" role="toolbar" aria-label="Toolbar with button groups">
      <div class="btn-group mr-2" role="group" aria-label="First group">
        <button type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('kontrak'); ?>'">
          <i class="fas fa-plus"></i> Buat SPK Baru
        </button>
        <button disabled type="button" class="btn btn-info" onclick="window.location.href='<?php echo base_url('daftarspk'); ?>'">
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


  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <!-- Filter Bulan dan Tahun -->
        <form method="get" action="<?php echo base_url('daftarspk'); ?>" id="filterForm" class="form-inline mb-4">
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

        <table class="table table-bordered" id="tabel_spk" cellspacing="0">
          <thead>
            <tr style="text-align: center;vertical-align: middle">
                <th style="width:120px;text-align: center;vertical-align: middle">Tanggal</th>
              <th style="width:300px;text-align: center;vertical-align: middle">Nomor SPK</th>
              
              <th style="width:250px;text-align: center;vertical-align: middle">Nama Mitra / ID</th>
              <th style="width:80px;text-align: center;vertical-align: middle">Nilai Perjanjian</th>
              <th style="width:150px;text-align: center;vertical-align: middle">History Update</th>
              <th style="width:150px;text-align: center;vertical-align: middle">Materai</th>
              <th style="width:180px;text-align: center;vertical-align: middle">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($daftarspk as $row) : ?>
              <tr <?php
                  if ($row->total_perjanjian != $row->total_rinci) {
                    echo 'style="background-color: red; color: white;" title="Nilai Total Perjanjian Tidak Sama dengan Rincian, Mohon Periksa Kembali"';
                  } elseif ($row->total_perjanjian > 3700000) {
                    echo 'style="background-color: yellow;"';
                  }
                  ?>>
                
                <td style="text-align: center;"><?php echo $row->tanggal_spk ?></td>
                <td><?php echo $row->no_spk ?></td>
                <!--<td><?php echo date('d', strtotime($row->tanggal_spk)) . " " . bulan_indonesia($row->tanggal_spk) . " " . date('Y', strtotime($row->tanggal_spk)); ?></td>-->
                <td><b><?php echo ucwords($row->nama_mitra) ?> </b> / <?php echo $row->id_sobat ?></td>
                <td style="text-align: right"><?php echo format_ribuan($row->total_perjanjian) ?></td>
                <!--<td><?php echo $row->ppk; ?></td>-->
                <td style="font-size: small;"><?php echo $row->log; ?></td>
                
<td style="text-align:center;">
<?php
$level = $this->session->userdata('level');

// kondisi boleh klik
$bolehKlik = !($level == 2 && $row->materai == 1);
?>


<span class="badge 
    <?php
        if ($row->materai == 0) echo 'bg-danger';
        elseif ($row->materai == 1) echo 'bg-warning';
        else echo 'bg-success';
    ?>
    text-white btn-materai"
    style="cursor:pointer"
    data-no_spk="<?= $row->no_spk; ?>"
    data-status="<?= $row->materai; ?>"
    data-level="<?= $level; ?>">

    <?php
        if ($row->materai == 0) echo 'Belum Bermaterai';
        elseif ($row->materai == 1) echo 'Bermaterai (Menunggu Admin)';
        else echo 'Terkonfirmasi';
    ?>
</span>

<br>
<?= $row->pengusul; ?>
</td>





                <td>
                    <div class="row no-gutters">
                        <!-- Baris pertama -->
                        <div class="col-md-6 pr-1 mb-1">
                            <!-- Tombol View -->
                            <a title="View" class="btn btn-primary btn-sm btn-block btn-view" 
                               data-no_spk="<?php echo $row->no_spk; ?>" 
                               href="<?php echo base_url('daftarspk/detail/') . substr($row->no_spk, 0, 4) . "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>">
                                <!--<i class="fa fa-eye"></i>-->
                                <!-- Teks hanya muncul di layar sm ke atas -->
                                <span class="d-none d-md-inline">View</span>
                            </a>
                        </div>
                    
                        <div class="col-md-6 pl-1 mb-1">
                            <!-- Tombol cetak SPK -->
                            <a title="Cetak SPK" href="<?php echo base_url('daftarspk/cetak_spk/') . substr($row->no_spk, 0, 4) . "-" . date('d-m-Y', strtotime($row->tanggal_spk)); ?>" 
                               class="btn btn-info btn-sm btn-block" target="_blank">
                                <!--<i class="fa fa-print"></i> -->
                                <!-- Teks hanya muncul di layar sm ke atas -->
                                <span class="d-none d-md-inline">SPK</span>
                            </a>
                        </div>

                        <!-- Cek jika yang login adalah admin (level 1), tampilkan tombol Cetak BAST -->
                        
                            <div class="col-md-6 pr-1 mb-1">
                                 <!--Tombol cetak BAST -->
                                <a title="Cetak BAST" href="javascript:void(0);" 
                                   class="btn btn-success btn-sm btn-block" 
                                   onclick="cekBAST('<?php echo $row->no_spk; ?>')">
                                    <!--<i class="fa fa-print"></i>-->
                                    <span class="d-none d-md-inline">BAST</span>
                                </a>
                            </div>
                        

                        <div class="col-md-6 pl-1 mb-1">
                            <!-- Tombol Hapus -->
                            <button class="btn btn-danger btn-sm btn-block hapusSPK">
                                <!--<i class="fas fa-trash"></i> -->
                                <!-- Teks hanya muncul di layar sm ke atas -->
                                <span class="d-none d-md-inline">Hapus</span>
                            </button>
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


<!-- Include modal input BAST -->
<?php include 'modal_input_bast.php'; ?>