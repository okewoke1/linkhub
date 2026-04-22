<!DOCTYPE html>
<html>
<head>

  <title>ST</title>

<style>

table, th, td {
  text-align:justify;
  font-family: "Bookman Old Style", Georgia, serif;
  font-size: 1.09em;
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

    }

</style>

<body>

	  
  
  
  <img src="<?php echo base_url() ?>assets/sibukgan/img/bps.png" style="width:160px; height:130px; color:#00B0F0;">
    <p style="font-family:Tahoma;  color:#00B0F0; font-size:1.3em;" align="center"><b>BADAN PUSAT STATISTIK</b><br>
    <b>KABUPATEN SEKADAU</b>
    </p>
<br>
<?php foreach($detail as $ts): ?>
    <p style="font-family:Bookman Old Style; font-size:1.2em;" align="center"><u><b>SURAT TUGAS</b></u><br>
      <?php
      $bln1 = date("m",strtotime($ts->tgl_spt));
      $thn1 = date("Y",strtotime($ts->tgl_spt));
      ?>
    Nomor : B-<?php echo $ts->no ?>/6109<?php echo $ts->nomor ?>/<?php echo $ts->kode_huruf ?>/<?php echo ($thn1);?>
    </p>
    <?php endforeach ?>
<table style="width:780px" >
<?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">Menimbang&emsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">a.</td>
    <td width=680px valign="top"><?php echo $ts->menimbang ?></td>
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
    <td width=680px valign="top">Peraturan Pemerintah No.45 Tahun 2013, tentang Tata Cara Pelaksanaan Anggaran Pendapatan dan Belanja Negara yang diubah dengan Peraturan Pemerintah 50 Tahun 2018 tentang Perubahan atas Peraturan Pemerintah Nomor 45 Tahun 2013 tentang Tata Cara Pelaksanaan Anggaran Pendapatan dan Belanja Negara;</td>
  </tr>
  <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">4.</td>
    <td width=680px valign="top">Peraturan Kepala Badan Pusat Statistik Nomor 8 Tahun 2020 tentang Organisasi dan Tata Kerja Badan Pusat Statistik Provinsi dan Badan Pusat Statistik Kabupaten/Kota.</td>
  </tr>
  </table>

  <p style="font-family:Bookman Old Style; font-size:1.2em;" align="center"><b>Memberi Perintah:</b></p>
 
  <table style="width:780px">
  <?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">1.&nbsp;&nbsp;</td>
    <td width=30px valign="top">Nama</td>
    <td width=30px valign="top">:</td>
    <td width=660px valign="top"><?php echo $ts->pegawai ?></td>
  </tr>
  
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td>NIP</td>
    <td>:</td>
    <td><?php echo $ts->nip ?></td>
  </tr>
  <?php endforeach ?>
</table>

<table style="width:780px">
  <?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">2.&nbsp;&nbsp;</td>
    <td width=30px valign="top">Nama</td>
    <td width=30px valign="top">:</td>
    <td width=660px valign="top"><?php echo $ts->anggota_1 ?></td>
  </tr>
  
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td>NIP</td>
    <td>:</td>
    <td><?php echo $ts->nip_1 ?></td>
  </tr>
  <?php endforeach ?>
</table>

  <br>
  <table style="width:780px">
  <tr>
    <td width=20px valign="top">Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=680px valign="top"><?php echo $ts->keperluan ?> Tanggal
      <?php echo tgl_indonesia($ts->tgl_berangkat);?> 
    di <?php echo $ts->tempat_tugas ?></td>

  </tr>
  </table>
  
    <br><br>
    <table style="width:780px">
    
    
  <tr>
    <td width=500px valign="top"></td>
    <td width=310px valign="top">Sekadau,
    <?php echo tgl_indonesia($ts->tgl_spt);
            ?>    
  </td>
  </tr>
  
  </table>
  <table style="width:780px">
  <tr>
    <td width=500px valign="top"></td>
    <td width=330px valign="top">Kepala Badan Pusat Statistik</td>
  </tr>
  </table>
  
    <table style="width:780px">
  <tr>
    <td width=700px valign="top"></td>
    <td width=330px valign="top">Kabupaten Sekadau</td>
  </tr>
  </table>
  <br><br><br><br>
      <table style="width:780px">
  <tr>
    <td width=700px valign="top"></td>
    <td width=320px valign="top">Leila Ayu Zanaria</td>
  </tr>
  </table>
  
 
 
  <br><br><br>  <br>  <br>   <br>  <br>  <br>   <br>  <br>  <br> <br>
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>
  
  <img src="<?php echo base_url() ?>assets/sibukgan/img/bps.png" style="width:160px; height:130px; color:#00B0F0;">
    <p style="font-family:Tahoma;  color:#00B0F0; font-size:1.3em;" align="center"><b>BADAN PUSAT STATISTIK</b><br>
    <b>KABUPATEN SEKADAU</b>
    </p>
<br>
<?php foreach($detail as $ts): ?>
    <p style="font-family:Bookman Old Style; font-size:1.2em;" align="center"><u><b>SURAT TUGAS</b></u><br>
    Nomor : B-<?php echo $ts->no ?>/6109<?php echo $ts->nomor ?>/<?php echo $ts->kode_huruf ?>/<?php echo ($thn1);?>
    </p>
    <?php endforeach ?>
<table style="width:780px" >
<?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">Menimbang&emsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">a.</td>
    <td width=680px valign="top"><?php echo $ts->menimbang ?></td>
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
    <td width=680px valign="top">Peraturan Pemerintah No.45 Tahun 2013, tentang Tata Cara Pelaksanaan Anggaran Pendapatan dan Belanja Negara yang diubah dengan Peraturan Pemerintah 50 Tahun 2018 tentang Perubahan atas Peraturan Pemerintah Nomor 45 Tahun 2013 tentang Tata Cara Pelaksanaan Anggaran Pendapatan dan Belanja Negara;</td>
  </tr>
  <tr>
    <td width=20px valign="top"></td>
    <td width=20px valign="top"></td>
    <td width=20px valign="top">4.</td>
    <td width=680px valign="top">Peraturan Kepala Badan Pusat Statistik Nomor 8 Tahun 2020 tentang Organisasi dan Tata Kerja Badan Pusat Statistik Provinsi dan Badan Pusat Statistik Kabupaten/Kota.</td>
  </tr>
  </table>

  <p style="font-family:Bookman Old Style; font-size:1.2em;" align="center"><b>Memberi Perintah:</b></p>
 
  <table style="width:780px">
  <?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">Kepada&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">1.&nbsp;&nbsp;</td>
    <td width=30px valign="top">Nama</td>
    <td width=30px valign="top">:</td>
    <td width=660px valign="top"><?php echo $ts->pegawai ?></td>
  </tr>
  
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td>NIP</td>
    <td>:</td>
    <td><?php echo $ts->nip ?></td>
  </tr>
  <?php endforeach ?>
</table>

<table style="width:780px">
  <?php foreach($detail as $ts): ?>
  <tr>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">2.&nbsp;&nbsp;</td>
    <td width=30px valign="top">Nama</td>
    <td width=30px valign="top">:</td>
    <td width=660px valign="top"><?php echo $ts->anggota_1 ?></td>
  </tr>
  
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td>NIP</td>
    <td>:</td>
    <td><?php echo $ts->nip_1 ?></td>
  </tr>
  <?php endforeach ?>
</table>

  <br>
  <table style="width:780px">
  <tr>
    <td width=20px valign="top">Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=680px valign="top"><?php echo $ts->keperluan ?> Tanggal
      <?php echo tgl_indonesia($ts->tgl_berangkat);?> 
    s.d. <?php echo tgl_indonesia($ts->tgl_kembali);?> di <?php echo $ts->tempat_tugas ?></td>

  </tr>
  </table>
  
    <br>
    <table style="width:780px">
    
    
  <tr>
    <td width=500px valign="top"></td>
    <td width=310px valign="top">Sekadau,
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
            echo tgl_indonesia($ts->tgl_spt);
            ?>    
  </td>
  </tr>
  
  </table>
  <table style="width:780px">
  <tr>
    <td width=500px valign="top"></td>
    <td width=330px valign="top">Kepala Badan Pusat Statistik</td>
  </tr>
  </table>
  
    <table style="width:780px">
  <tr>
    <td width=700px valign="top"></td>
    <td width=330px valign="top">Kabupaten Sekadau</td>
  </tr>
  </table>
  <br><br><br><br>
      <table style="width:780px">
  <tr>
    <td width=700px valign="top"></td>
    <td width=320px valign="top">Leila Ayu Zanaria</td>
  </tr>
  </table>
  
 
 
  <br><br><br>  <br>  <br>   <br>  <br>  <br>   <br>  <br>  <br> <br>  
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>

