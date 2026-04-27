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
position: relative;
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

.landscape {
  width: 330mm;
  min-height: 215mm;
  transform: rotate(0deg); /* tidak diputar secara visual, tapi orientasi landscape */
}

@media print {
            .page-break {
                page-break-before: always;
            }
            .landscape {
                page: landscape;
            }
        }

.qr-code {
  position: absolute;
  bottom: 40px;
  right: 40px;
}

.qr-code img {
  width: 90px;
}

.qr-spacer {
  height: 140px;
}

@page landscape {
  size: landscape;
  margin: 10px 10px 10px 30px;
}

.page.landscape {
  position: relative;
}

.page.landscape .qr-code {
  position: absolute;
  right: 30px;
  bottom: 10px;
}

.footer-landscape {
  position: fixed;
  bottom: 0px;              /* sejajar margin bawah */
  left: 20%;                /* ikut margin kiri @page */
  right: 30px;               /* ikut margin kanan @page */
  text-align: center;
  font-family: Arial;
  font-size: 15px;
}


</style>

<body>

<img src="<?php echo base_url() ?>assets/img/bps.png" style="width:160px; height:130px; color:#00B0F0; margin-top:10px;">
<p style="font-family:Arial; font-size:1.3em; text-align:center; margin-top:10px;">
  <b><i>BADAN PUSAT STATISTIK</i></b><br>
  <b><i>KABUPATEN SEKADAU</i></b>
</p>

<?php foreach($detail as $ts): ?>
    <p style="font-family:Bookman Old Style; font-size:1.3em;" align="center">SURAT TUGAS<br>
      <?php
      $bln1 = date("m",strtotime($ts->tgl_sptmitra));
      $thn1 = date("Y",strtotime($ts->tgl_sptmitra));
      ?>
    NOMOR : <?php echo $ts->no ?>
    </p>
    <?php endforeach ?>
<table style="width:780px">
<?php foreach($detail as $ts): ?>
  <tr>
    <td width="120px" valign="top">Menimbang</td>
    <td width="10px"  valign="top">:</td>
    <td width="30px"  valign="top">a.</td>
    <td width="620px" valign="top">
      <?php echo $ts->menimbang ?>, maka dipandang perlu menyesuaikan dengan jadwal kegiatan tersebut;
    </td>
  </tr>
<?php endforeach; ?>
  <tr>
    <td></td>
    <td></td>
    <td valign="top">b.</td>
    <td valign="top">
      Bahwa untuk pelaksanaannya perlu dikeluarkan Surat Tugas Kepala BPS Kabupaten Sekadau.
    </td>
  </tr>
</table>


<br>
<table style="width:780px">
  <tr>
    <td width="120px" valign="top">Mengingat</td>
    <td width="10px"  valign="top">:</td>
    <td width="30px"  valign="top">1.</td>
    <td width="620px" valign="top">
      Undang-Undang No.16 Tahun 1997 tentang Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">2.</td>
    <td valign="top">
      Peraturan Pemerintah No.51 Tahun 1999 tentang Penyelenggaraan Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">3.</td>
    <td valign="top">
      Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">4.</td>
    <td valign="top">
      Peraturan Badan Pusat Statistik Nomor 5 Tahun 2019 tentang Tata Naskah Dinas di Lingkungan Badan Pusat Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">5.</td>
    <td valign="top">
      Peraturan Badan Pusat Statistik Nomor 5 Tahun 2023 tentang Organisasi dan Tata Kerja Badan Pusat Statistik Provinsi dan Badan Pusat Statistik Kabupaten/Kota;
    </td>
  </tr>
</table>


<p style="font-family:'Bookman Old Style'; font-size:1.3em; text-align:center;">
  <b>Memberi Perintah:</b>
</p>


<table style="width:780px">
<?php foreach($detail as $ts): ?>
  <tr>
    <td width="150px" valign="top">Kepada</td>
    <td width="10px"  valign="top">:</td>
    <td width="30px"  valign="top">1.</td>
    <td width="120px" valign="top">Nama</td>
    <td width="10px"  valign="top">:</td>
    <td width="490px" valign="top"><i>(terlampir)</i></td>
  </tr>

  <tr>
    <td></td><td></td><td></td>
    <td>NIP</td>
    <td>:</td>
    <td><i>(terlampir)</i></td>
  </tr>

  <tr>
    <td></td><td></td><td></td>
    <td>Pangkat/Gol</td>
    <td>:</td>
    <td><i>(terlampir)</i></td>
  </tr>

  <tr>
    <td></td><td></td><td></td>
    <td>Jabatan</td>
    <td>:</td>
    <td><i>(terlampir)</i></td>
  </tr>
<?php endforeach; ?>
</table>



  <br>
<table style="width:780px">
  <tr>
    <td width="150px" valign="top">Untuk</td>
    <td width="10px"  valign="top">:</td>
    <td width="650px" valign="top">
      <?php echo $ts->keperluan; ?> Tanggal
      <?php echo tgl_indonesia($ts->tgl_mulai); ?>
      s.d. <?php echo tgl_indonesia($ts->tgl_selesai); ?>
      di <?php echo $ts->kecamatan; ?>
    </td>
  </tr>
</table>


<table style="width:780px">
  <tr>
    <td width="145px" valign="top">Pembebanan</td>
    <td width="10px"  valign="top">:</td>
    <td width="650px" valign="top">
      <?php echo $ts->kode_anggaran; ?>
    </td>
  </tr>
</table>


    <br><br><br>
    <table style="width:780px">

  
<table style="width:780px; font-family:Bookman Old Style, Georgia, serif; font-size:1.15em;">
  <tr>
          
    <td style="width:60%;"></td>
    <td style="width:40%; text-align:center;">
      Sekadau, <?php
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
            echo tgl_indonesia($ts->tgl_sptmitra);
            ?> <br>
      Kepala Badan Pusat Statistik<br>
      Kabupaten Sekadau<br><br><br><br>
      Imam Setia Harnomo
    </td>
  </tr>
</table>
  
 
 
<div class="page-break">


<img src="<?php echo base_url() ?>assets/img/bps.png" style="width:160px; height:130px; color:#00B0F0; margin-top:10px;">
<p style="font-family:Arial; font-size:1.3em; text-align:center; margin-top:10px;">
  <b><i>BADAN PUSAT STATISTIK</i></b><br>
  <b><i>KABUPATEN SEKADAU</i></b>
</p>

<?php foreach($detail as $ts): ?>
    <p style="font-family:Bookman Old Style; font-size:1.3em;" align="center">SURAT TUGAS<br>
      <?php
      $bln1 = date("m",strtotime($ts->tgl_sptmitra));
      $thn1 = date("Y",strtotime($ts->tgl_sptmitra));
      ?>
    NOMOR : <?php echo $ts->no ?>
    </p>
    <?php endforeach ?>
<table style="width:780px">
<?php foreach($detail as $ts): ?>
  <tr>
    <td width="120px" valign="top">Menimbang</td>
    <td width="10px"  valign="top">:</td>
    <td width="30px"  valign="top">a.</td>
    <td width="620px" valign="top">
      <?php echo $ts->menimbang ?>, maka dipandang perlu menyesuaikan dengan jadwal kegiatan tersebut;
    </td>
  </tr>
<?php endforeach; ?>
  <tr>
    <td></td>
    <td></td>
    <td valign="top">b.</td>
    <td valign="top">
      Bahwa untuk pelaksanaannya perlu dikeluarkan Surat Tugas Kepala BPS Kabupaten Sekadau.
    </td>
  </tr>
</table>


<br>
<table style="width:780px">
  <tr>
    <td width="120px" valign="top">Mengingat</td>
    <td width="10px"  valign="top">:</td>
    <td width="30px"  valign="top">1.</td>
    <td width="620px" valign="top">
      Undang-Undang No.16 Tahun 1997 tentang Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">2.</td>
    <td valign="top">
      Peraturan Pemerintah No.51 Tahun 1999 tentang Penyelenggaraan Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">3.</td>
    <td valign="top">
      Peraturan Presiden Nomor 86 Tahun 2007 tentang Badan Pusat Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">4.</td>
    <td valign="top">
      Peraturan Badan Pusat Statistik Nomor 5 Tahun 2019 tentang Tata Naskah Dinas di Lingkungan Badan Pusat Statistik;
    </td>
  </tr>

  <tr>
    <td></td><td></td>
    <td valign="top">5.</td>
    <td valign="top">
      Peraturan Badan Pusat Statistik Nomor 5 Tahun 2023 tentang Organisasi dan Tata Kerja Badan Pusat Statistik Provinsi dan Badan Pusat Statistik Kabupaten/Kota;
    </td>
  </tr>
</table>


<p style="font-family:'Bookman Old Style'; font-size:1.3em; text-align:center;">
  <b>Memberi Perintah:</b>
</p>


<table style="width:780px">
<?php foreach($detail as $ts): ?>
  <tr>
    <td width="150px" valign="top">Kepada</td>
    <td width="10px"  valign="top">:</td>
    <td width="30px"  valign="top">1.</td>
    <td width="120px" valign="top">Nama</td>
    <td width="10px"  valign="top">:</td>
    <td width="490px" valign="top"><i>(terlampir)</i></td>
  </tr>

  <tr>
    <td></td><td></td><td></td>
    <td>NIP</td>
    <td>:</td>
    <td><i>(terlampir)</i></td>
  </tr>

  <tr>
    <td></td><td></td><td></td>
    <td>Pangkat/Gol</td>
    <td>:</td>
    <td><i>(terlampir)</i></td>
  </tr>

  <tr>
    <td></td><td></td><td></td>
    <td>Jabatan</td>
    <td>:</td>
    <td><i>(terlampir)</i></td>
  </tr>
<?php endforeach; ?>
</table>



  <br>
<table style="width:780px">
  <tr>
    <td width="150px" valign="top">Untuk</td>
    <td width="10px"  valign="top">:</td>
    <td width="650px" valign="top">
      <?php echo $ts->keperluan; ?> Tanggal
      <?php echo tgl_indonesia($ts->tgl_mulai); ?>
      s.d. <?php echo tgl_indonesia($ts->tgl_selesai); ?>
      di <?php echo $ts->kecamatan; ?>
    </td>
  </tr>
</table>


<table style="width:780px">
  <tr>
    <td width="145px" valign="top">Pembebanan</td>
    <td width="10px"  valign="top">:</td>
    <td width="650px" valign="top">
      <?php echo $ts->kode_anggaran; ?>
    </td>
  </tr>
</table>


    <br><br><br>
    <table style="width:780px">

  
<table style="width:780px; font-family:Bookman Old Style, Georgia, serif; font-size:1.15em;">
  <tr>
          
    <td style="width:60%;"></td>
    <td style="width:40%; text-align:center;">
      Sekadau, <?php echo tgl_indonesia($ts->tgl_sptmitra);
            ?> <br>
      Kepala Badan Pusat Statistik<br>
      Kabupaten Sekadau<br><br><br><br>
      Imam Setia Harnomo
    </td>
  </tr>
</table>
</div>
<div style="
  position: fixed;
  bottom: 20px;
  left: 0;
  right: 0;
  text-align: center;
  font-family: Arial;
  font-size: 15px;
">
  Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http://sekadaukab.bps.go.id</u> &nbsp;
  E-mail : <u style="color:blue;">bps6109@bps.go.id</u>
</div>

<div class="page landscape page-break">

 <table   cellpadding="6"
         style="width: 1500px; font-size: 1.15em; font-family: Arial, sans-serif;
                border-collapse: collapse; margin: 10px auto;">
    <thead>
      <tr style="text-align: center;">
        <th style="width: 3%;"></th>
        <th style="width: 35%;"></th>
        <th style="width: 10%;"></th>
        <th style="width: 10%;"></th>
        <th style="width: 5%;"></th>
        <th style="width: 32%;"></th>
      </tr>
    </thead>
    <tbody>
        <tr><td align="center"></td><td></td><td></td><td></td><td>Lembar</td><td>:</td></tr>
        <tr><td align="center"></td><td></td><td></td><td></td><td>Nomor</td><td>: <?php echo $ts->no; ?></td></tr>
        <tr><td align="center"></td><td></td><td></td><td></td><td>Tanggal</td><td>: <?php echo tgl_indonesia($ts->tgl_sptmitra); ?></td></tr>
    </tbody>
  </table>
<div style="clear:both"></div>


<br>

  <table border="1" cellspacing="0" cellpadding="6"
         style="width: 1500px; font-size: 1.15em; font-family: Arial, sans-serif;
                border-collapse: collapse; margin: 10px auto;">
    <thead>
      <tr style="text-align: center;">
        <th style="width: 3%;">No</th>
        <th style="width: 25%;">Nama</th>
        <th style="width: 10%;">NIP</th>
        <th style="width: 10%;">Pangkat/Gol</th>
        <th style="width: 25%;">Jabatan</th>
        <th style="width: 32%;">Peran</th>
      </tr>
    </thead>
    <tbody>
        <tr><td align="center">1</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
        <tr><td align="center">2</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
        <tr><td align="center">3</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
        <tr><td align="center">4</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
        <tr><td align="center">5</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
        <tr><td align="center">6</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
        <tr><td align="center">7</td><td><?php echo $ts->mitra; ?></td><td>-</td><td>-</td><td>Mitra Statistik</td><td align="center">Pengolah Data</td></tr>
    </tbody>
  </table>

<div class="footer-landscape">
  Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http://sekadaukab.bps.go.id</u> &nbsp;
  E-mail : <u style="color:blue;">bps6109@bps.go.id</u>
</div>


    <script type="text/javascript">
        window.print();
    </script>
</div>
</body>
</html>

