<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ST</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
        width: 210mm;
        min-height: 297mm;
    }

    
    @page {
        size: A4;
        margin: 10px 75px 0px 75px;
    }

@media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }

    }

</style>

<body>

	  <img src="<?php echo base_url() ?>simakand/assets/img/bps.PNG" style="width:160px; height:130px; color:#00B0F0;">
    <p style="font-family:Tahoma;  color:#00B0F0; font-size:1.3em;" align="center"><b>BADAN PUSAT STATISTIK</b><br>
    <b>KABUPATEN SEKADAU</b>
    </p>
<br>
    <p style="font-family:Bookman Old Style; font-size:1.2em;" align="center"><u><b>SURAT TUGAS</b></u><br>
    Nomor : B-262/61000/KU.520/03/2022
    </p>

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

  <br>
  <table style="width:780px">
  <tr>
    <td width=20px valign="top">Untuk&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=20px valign="top">:</td>
    <td width=20px valign="top">&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td width=680px valign="top">Exit Meeting Audit Atas Pengelolaan Keuangan TA 2021 di BPS Provinsi Kalimantan Barat tanggal 24 s.d. 26 Maret 2022</td>

  </tr>
  </table>
  
    <br><br><br>
  <table style="width:780px">
  <tr>
    <td width=500px valign="top"></td>
    <td width=380px valign="top">KEPALA BADAN PUSAT STATISTIK</td>
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
    <td width=350px valign="top">Leila Ayu Zanaria, SE</td>
  </tr>
  </table>
  
      <table style="width:780px">
  <tr>
    <td width=700px valign="top"></td>
    <td width=420px valign="top">NIP. 19660905 199303 2 001</td>
  </tr>
  </table>
 
  <br>  <br>  <br><br><br>
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>

    <script type="text/javascript">
        window.print();
    </script>

</body>
</html>

