<!DOCTYPE html>
<html>
<head>

  <title>ST</title>

<style>
table, th, td {
  text-align: justify;
  font-family: "Bookman Old Style", Georgia, serif;
  font-size: 1.15em;
}

img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}

.page {
  width: 215mm;
  min-height: 330mm;

}

@page {
  size:  215mm 330mm;
        margin: 10px 75px 0px 75px;
}

@media print {
  html, body {
    width: 215mm;
    height: 330mm;

  }

  .page-break {
    page-break-before: always;
  }

  .footer-print {
    font-family: Arial, sans-serif;
    font-size: 15px;
    text-align: center;
    margin-top: 40px;
    page-break-inside: avoid;
  }
}

.page {
  position: relative; /* WAJIB agar absolute nempel ke halaman */
}

.qr-code {
  position: absolute;
  bottom: 40px;
  right: 40px;
}

.qr-code img {
  width: 90px;
}
.page {
  width: 215mm;
  min-height: 330mm;
  position: relative;
}

.qr-spacer {
  height: 160px;
}

</style>



<body>
<?php foreach($detail as $ts): ?>
<?php
$thn1 = date("Y", strtotime($ts->tgl_spt));

$qr_data = "B-".$ts->no."/6109".$ts->nomor."/".$ts->kode_huruf."/".$thn1;

$qr_url = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" . urlencode($qr_data);
?>
<div class="qr-code">
  <img src="<?= $qr_url ?>" alt="QR Code">
</div>
<?php endforeach; ?>

   <div class="page">

  
<img src="<?php echo base_url() ?>assets/img/bps.png" style="width:160px; height:130px; color:#00B0F0; margin-top:160px;">
<p style="font-family:Arial; font-size:1.3em; text-align:center; margin-top:10px;">
  <b><i>BADAN PUSAT STATISTIK</i></b><br>
  <b><i>KABUPATEN SEKADAU</i></b>
</p>


<?php foreach($detail as $ts): ?>
    <p style="font-family:Bookman Old Style; font-size:1.3em;" align="center">SURAT TUGAS<br>
      <?php
      $bln1 = date("m",strtotime($ts->tgl_spt));
      $thn1 = date("Y",strtotime($ts->tgl_spt));
      ?>
    NOMOR : B-<?php echo $ts->no ?>/6109<?php echo $ts->nomor ?>/<?php echo $ts->kode_huruf ?>/<?php echo ($thn1);?>
    </p>
    <?php endforeach ?>
<table style="width:780px" >
<?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">Menimbang&emsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">a.</td>
    <td width=680px valign="top"><?php echo $ts->menimbang ?>, maka dipandang perlu menyesuaikan dengan jadwal kegiatan tersebut;</td>
  </tr>
  <?php endforeach ?>
  <tr>
    <td></td>
    <td></td>
    <td valign="top">b.</td>
    <td valign="top">Bahwa untuk pelaksanaannya perlu dikeluarkan Surat Tugas Kepala BPS Kabupaten Sekadau.</td>
  </tr>

</table>

<br>
<table style="width:780px">
    <tr>
    <td width=20px valign="top">Mengingat&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">1.&nbsp;</td>
    <td width=680px valign="top">Undang-Undang No.16 Tahun 1997 tentang Statistik;</td>
  </tr>
      <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">2.</td>
    <td width=680px valign="top">Peraturan Pemerintah No.51 Tahun 1999 tentang Penyelenggaraan Statistik;</td>
  </tr>
      <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">3.</td>
    <td width=680px valign="top">Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik</td>
  </tr>
  <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">4.</td>
    <td width=680px valign="top">Peraturan Badan Pusat Statistik Nomor 5 Tahun 2019 tentang Tata Naskah Dinas di Lingkungan Badan Pusat Statistik;</td>
  </tr>
    <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">5.</td>
    <td width=680px valign="top">Peraturan Badan Pusat Statistik Nomor 5 Tahun 2023 tentang Organisasi dan Tata Kerja Badan Pusat Statistik Provinsi dan Badan Pusat Statistik Kabupaten/Kota;</td>
  </tr>
</table>

<p style="font-family:Bookman Old Style; font-size:1.3em; text-align:center;">Memberi Tugas</p>


<table style="width:780px;">
  <?php foreach ($detail as $ts): ?>
    <tr>
      <td width="150px" valign="top">Kepada</td>
      <td width="20px" valign="top">:</td>
      <td width="560px" valign="top"><?php echo $ts->pegawai; ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<table style="width:780px;">
  <tr>
    <td width="150px" valign="top">Untuk</td>
    <td width="20px" valign="top">:</td>
    <td width="560px" valign="top">
      <?php echo $ts->keperluan; ?> Tanggal <?php echo tgl_indonesia($ts->tgl_berangkat); ?> di <?php echo $ts->tempat_tugas; ?>
    </td>
  </tr>
</table>

<table style="width:780px;">
  <tr>
    <td width="150px" valign="top">Pembebanan</td>
    <td width="20px" valign="top">:</td>
    <td width="560px" valign="top">
      <?php echo $ts->kode_anggaran; ?>
    </td>
  </tr>
</table>


  
    <br><br>
<table style="width:780px; font-family:Bookman Old Style, Georgia, serif; font-size:1.15em;">
  <tr>
    <td style="width:60%;"></td>
    <td style="width:40%; text-align:center;">
      Sekadau, <?php echo tgl_indonesia($ts->tgl_spt); ?><br>
      Kepala Badan Pusat Statistik<br>
      Kabupaten Sekadau<br><br><br><br>
      Imam Setia Harnomo
    </td>
  </tr>
</table>




  

<div class="page-break"></div>
 
<div class="page">

  <img src="<?php echo base_url() ?>assets/img/bps.png" style="width:160px; height:130px; color:#00B0F0; margin-top:160px;">
<p style="font-family:Arial; font-size:1.3em; text-align:center; margin-top:10px;">
  <b><i>BADAN PUSAT STATISTIK</i></b><br>
  <b><i>KABUPATEN SEKADAU</i></b>
</p>


<?php foreach($detail as $ts): ?>
    <p style="font-family:Bookman Old Style; font-size:1.3em;" align="center">SURAT TUGAS<br>
      <?php
      $bln1 = date("m",strtotime($ts->tgl_spt));
      $thn1 = date("Y",strtotime($ts->tgl_spt));
      ?>
    NOMOR : B-<?php echo $ts->no ?>/6109<?php echo $ts->nomor ?>/<?php echo $ts->kode_huruf ?>/<?php echo ($thn1);?>
    </p>
    <?php endforeach ?>
<table style="width:780px" >
<?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">Menimbang&emsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">a.</td>
    <td width=680px valign="top"><?php echo $ts->menimbang ?>, maka dipandang perlu menyesuaikan dengan jadwal kegiatan tersebut;</td>
  </tr>
  <?php endforeach ?>
  <tr>
    <td></td>
    <td></td>
    <td valign="top">b.</td>
    <td valign="top">Bahwa untuk pelaksanaannya perlu dikeluarkan Surat Tugas Kepala BPS Kabupaten Sekadau.</td>
  </tr>

</table>

<br>
<table style="width:780px">
    <tr>
    <td width=20px valign="top">Mengingat&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">1.&nbsp;</td>
    <td width=680px valign="top">Undang-Undang No.16 Tahun 1997 tentang Statistik;</td>
  </tr>
      <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">2.</td>
    <td width=680px valign="top">Peraturan Pemerintah No.51 Tahun 1999 tentang Penyelenggaraan Statistik;</td>
  </tr>
      <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">3.</td>
    <td width=680px valign="top">Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik</td>
  </tr>
  <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">4.</td>
    <td width=680px valign="top">Peraturan Badan Pusat Statistik Nomor 5 Tahun 2019 tentang Tata Naskah Dinas di Lingkungan Badan Pusat Statistik;</td>
  </tr>
    <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">5.</td>
    <td width=680px valign="top">Peraturan Badan Pusat Statistik Nomor 5 Tahun 2023 tentang Organisasi dan Tata Kerja Badan Pusat Statistik Provinsi dan Badan Pusat Statistik Kabupaten/Kota;</td>
  </tr>
</table>

<p style="font-family:Bookman Old Style; font-size:1.3em; text-align:center;">Memberi Tugas</p>


<table style="width:780px;">
  <?php foreach ($detail as $ts): ?>
    <tr>
      <td width="150px" valign="top">Kepada</td>
      <td width="20px" valign="top">:</td>
      <td width="560px" valign="top"><?php echo $ts->pegawai; ?></td>
    </tr>
  <?php endforeach; ?>
</table>

<table style="width:780px;">
  <tr>
    <td width="150px" valign="top">Untuk</td>
    <td width="20px" valign="top">:</td>
    <td width="560px" valign="top"><?php echo $ts->keperluan ?> Tanggal
      <?php echo tgl_indonesia($ts->tgl_berangkat);?> 
    s.d. <?php echo tgl_indonesia($ts->tgl_kembali);?> di <?php echo $ts->tempat_tugas ?>  </td>
  </tr>
</table>

<table style="width:780px;">
  <tr>
    <td width="150px" valign="top">Pembebanan</td>
    <td width="20px" valign="top">:</td>
    <td width="560px" valign="top">
 <?php echo $ts->kode_anggaran; ?>
    </td>
  </tr>
</table>


  
    <br><br>



<table style="width:780px; font-family:Bookman Old Style, Georgia, serif; font-size:1.15em;">
  <tr>
    <td style="width:60%;"></td>
    <td style="width:40%; text-align:center;">
      Sekadau, <?php echo tgl_indonesia($ts->tgl_spt); ?><br>
      Kepala Badan Pusat Statistik<br>
      Kabupaten Sekadau<br><br><br><br>
      Imam Setia Harnomo
    </td>
  </tr>
</table>
<div class="qr-spacer"></div>
<div class="qr-code">
  <img src="<?= $qr_url ?>">
</div>




    <?php
            function tgl_indonesia($date){
             /* ARRAY u/ hari dan bulan */
              
              $Bulan = array ("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");

            /* Memisahkan format tanggal bulan dan tahun menggunakan substring */
            $tahun 	 = substr($date, 0, 4);
            $bulan 	 = substr($date, 5, 2);
            $tgl	 = substr($date, 8, 2);
            $waktu	 = substr($date,11, 5);


            $result = $tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu."";
            return $result;
            }
      
            ?>    


  

 




    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>

