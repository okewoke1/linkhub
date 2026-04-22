<div class="container-fluid">

    <div class="card mb-3">
      
<div class="card-header">
    <a href="<?php echo site_url('sibukgan/user/sppd/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
</div>

    <?php foreach($detail as $ts): ?>
 <table class="table table-bordered">
   <tr><th width="150px">Lembar ke</th><th width="20px">:</th><td colspan="2"></td></tr>
      <tr><th>Kode No</th><th>:</th><td colspan="2"></td></tr>
      <tr><th>Nomor</th><th>:</th><td colspan="2"><?php echo $ts->nomor ?></td></tr>
       <?php endforeach ?>
</table>
  

  <table >
  
<br>
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-weight: bold;">
          SURAT PERJALANAN DINAS (SPD)
        </span>
      </td>
    </tr>
  </table>

<br>

  <table class="table table-bordered">
     <?php foreach($detail as $ts): ?>
    <tr>
      <tr><th width="20px">1</th><th>Pejabat Pembuat Komitmen</th><td colspan="2"><?php echo $ts->pejabat_pemberi_perintah ?></td></tr>
      <tr><th>2</th><th>Nama/NIP Pegawai yang melaksanakan perjalanan dinas</th><td colspan="2"><?php echo $ts->pegawai ?></td></tr>
      <tr><th></th><th></th><td colspan="2"><?php echo $ts->nip ?></td></tr>
      <tr><th>3</th><th>a. Pangkat dan Golongan</th><td colspan="2"><?php echo $ts->pangkat_pegawai ?> / (<?php echo $ts->golongan_pegawai ?>)</td></tr>
      <tr><th></th><th>b. Jabatan / Instansi</th><td colspan="2"><?php echo $ts->jabatan ?></td></tr>
      <tr><th></th><th>c. Tingkat Biaya Perjalanan Dinas</th><td colspan="2">-</td></tr>
      <tr><th>4</th><th>Maksud Perjalanan Dinas</th><td colspan="2"><?php echo $ts->keperluan ?></td></tr>
      <tr><th>5</th><th>Alat angkutan yang dipergunakan</th><td colspan="2"><?php echo $ts->jenis_transport ?></td></tr>
      <tr><th>6</th><th>a. Tempat berangkat</th><td colspan="2"><?php echo $ts->asal ?></td></tr>
      <tr><th></th><th>b. Tempat Tujuan</th><td colspan="2"><?php echo $ts->tujuan ?></td></tr>
      <tr><th>7</th><th>a. Lamanya Perjalanan Dinas</th><td colspan="2"><?php echo $ts->ket_harian ?></td></tr>
      <tr><th></th><th>b. Tanggal berangkat</th><td colspan="2"><?php echo $ts->tgl_berangkat ?></td></tr>
      <tr><th></th><th>c. Tanggal harus kembali / tiba di tempat baru</th><td colspan="2"><?php echo $ts->tgl_kembali ?></td></tr>
      <tr><th>8</th><th>Pengikut</th><th>Umur</th><th>Hubungan keluarga/keterangan</th></tr>
      <tr height="40px"><th></th><th></th><th></th><th></th></tr>
      <tr><th>9</th><th>Pembebanan Anggaran</th><td colspan="2"></td></tr>
      <tr><th></th><th>Program</th><td colspan="2"><?php echo $ts->program ?></td></tr>
      <tr><th></th><th>Kegiatan</th><td colspan="2"><?php echo $ts->kegiatan ?></td></tr>
      <tr><th></th><th>Output</th><td colspan="2"><?php echo $ts->output ?></td></tr>
      <tr><th></th><th>Komponen</th><td colspan="2"><?php echo $ts->komponen ?></td></tr>
      <tr><th></th><th>a. Instansi</th><td colspan="2">BPS Kabupaten Jember</td></tr>
      <tr><th></th><th>b. Mata Anggaran</th><td colspan="2"><?php echo $ts->mata_anggaran ?></td></tr>
      <tr><th>10</th><th>Keterangan lain - lain</th><td colspan="2"><?php echo $ts->ket_lain ?></td></tr>
    



    <?php endforeach ?>

  </table>
 <table class="table table-bordered">
   <tr><th width="150px">Dikeluarkan di</th><th width="20px">:</th><td colspan="2">Jember</td></tr>
      <tr><th>Tanggal</th><th>:</th><td colspan="2"><?php echo $ts->tgl_spd ?></td></tr>
</table>
     <br> <br>
  <br> <br>   

  <table >
     <tr>
        <th width="800px"></th>
        <th class="text-center">Pejabat Pembuat Komitmen</th>
      </tr>
           <tr>
        <th width="800px"></th>
        <th class="text-center">BPS Kabupaten Jember</th>
      </tr>
 </table>
    <br> <br>
  <br> <br> 


    <table>

     <tr>
        <th width="800px"></th>
        <th class="text-center"><u>Ir. ENDANG WIDYARTI, MM</u></th>
      </tr>
           <tr>
        <th width="800px"></th>
        <th class="text-center">NIP. 19670802 199401 2 001</th>
      </tr>


  
 </table>













  
                        
                      
