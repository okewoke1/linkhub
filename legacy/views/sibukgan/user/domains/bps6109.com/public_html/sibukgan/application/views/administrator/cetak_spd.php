<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPD</title>
  <link rel="stylesheet" href="">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .line-title{
      border: 0;
      border-style: inset;
      border-top: 1px solid #000;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
    }

    
    @page {
        size: A4;
        margin: 55px 55px 0px 55px;
    }

@media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }

    }

    table, th, td {
  font-size: 1.09em;
}
  </style>
</head>
<body>

    <img src="<?php echo base_url() ?>assets/sibukgan/img/logobpssekadau.png" style="position: absolute; width: 400px; height: auto;">
  
    

       


<table >
<?php foreach($detail as $ts): ?>
   <tr><td width="560px"></td><td width="150px">Lembar ke</td><td width="20px">:</td><td colspan="2"></td></tr>
      <tr><td width="560px"></td><td>Kode No</td><td>:</td><td colspan="2">-</td></tr>
  <?php
      $bln1 = date("m",strtotime($ts->tgl_spt));
  $thn1 = date("m",strtotime($ts->tgl_spt));
      ?>
      <tr><td width="560px"></td><td>Nomor</td><td>:</td><td colspan="2"><?php echo $ts->nomor_spd ?>/6109/SPD/<?php echo ($bln1);?>/<?php echo ($thn1);?></td></tr>
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
      <tr><td width="5%" >1</td><td colspan="2" width="35%">Pejabat Pembuat Komitmen</td><td colspan="2" width="60%">Leila Ayu Zanaria, SE</td></tr>
      <tr><td>2</td><td colspan="2" >Nama/NIP Pegawai yang melaksanakan perjalanan dinas</td><td colspan="2"><?php echo $ts->pegawai ?><br>
      NIP. <?php echo $ts->nip ?></td></tr>
      <tr><td>3</td><td colspan="2">a. Pangkat dan Golongan<br>
      b. Jabatan / Instansi<br>
      c. Tingkat Biaya Perjalanan Dinas</td>

      <td colspan="2"><?php echo $ts->pangkat_pegawai ?>
      <br><?php echo $ts->jabatan ?>
      <br>C</td></tr>

      <tr><td>4</td><td colspan="2">Maksud Perjalanan Dinas</td><td colspan="2"><?php echo $ts->keperluan ?> 
      <?php echo tgl_indonesia($ts->tgl_berangkat);?> 
    s.d. <?php echo tgl_indonesia($ts->tgl_kembali);?> di <?php echo $ts->tempat_tugas ?></td></tr>
      <tr><td>5</td><td colspan="2">Alat angkutan yang dipergunakan</td><td colspan="2"><?php echo $ts->jenis_transport ?></td></tr>

      <tr><td>6</td><td colspan="2">a. Tempat berangkat<br>
      b. Tempat Tujuan</td>
      <td colspan="2">Sekadau
      <br><?php echo $ts->tempat_tugas ?></td></tr>

      
      <tr><td>7</td><td colspan="2">a. Lamanya Perjalanan Dinas<br>
      b. Tanggal berangkat<br>
      c. Tanggal kembali </td>
      
      <td colspan="2"><?php
      $date1 = date("d",strtotime($ts->tgl_berangkat));
      $date2 = date("d",strtotime($ts->tgl_kembali));
      $datediff = $date2 - $date1;
      ?>
      <?php echo floor($datediff+1);?> Hari
      <br><?php echo tgl_indonesia($ts->tgl_berangkat) ?> 
      <br><?php echo tgl_indonesia($ts->tgl_kembali) ?></td></tr> 
      
      
      <tr>
            <td rowspan="2">8.</td>
            <td>&emsp;Pengikut:&emsp;</td>
            <td>&emsp;Nama</td>
            <td>&emsp;Tanggal Lahir</td>
            <td>&emsp;Keterangan</td>
        </tr>
        <tr>
            <td>&emsp;1.<br>
			&emsp;2.</td>
            <td><?php echo $ts->anggota_1 ?></td>
            <td></td>
            <td></td>
        </tr>
      
      <tr><td>9</td><td colspan="2">Pembebanan Anggaran<br>
      a. Instansi<br>
      b. Mata Anggaran</td>
      <td colspan="2"><br>
      a. BPS Kabupaten Sekadau<br>
      b. ...
      </tr>

      <tr><td>10</td><td colspan="2">Keterangan lain - lain</td><td colspan="2"><?php echo $ts->ket_lain ?></td></tr>
    



    <?php endforeach ?>

  </table>
 <table >
   <tr><td width="650px"></td><td width="150px">Dikeluarkan di</td><td width="20px">:</td><td colspan="2">Sekadau</td></tr>
      <tr><td width="650px"></td><td>Pada Tanggal</td><td>:</td><td colspan="2">
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
      
      </td></tr>
</table>
     <br> 

  <table >
     <tr>
        <td width="700px"></td>
        <td class="text-center">Pejabat Pembuat Komitmen</td>
      </tr>

 </table>
    <br> <br><br>


    <table>

     <tr>
        <td width="700px"></td>
        <td class="text-center"><u>Leila Ayu Zanaria, SE</u></td>
      </tr>
           <tr>
        <td width="700px"></td>
        <td class="text-center">NIP. 19660905 199303 2 001</td>
      </tr>


  
 </table>

 <br> <br> <br>
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>
    
    <table class="table table-bordered">
    <tr>
      <tr><td width="5%" >I.</td><td width="38%"></td><td width="57%">Berangkat dari	&emsp;&emsp;&emsp;:	Sekadau<br>
      (tempat kedudukan)<br>
Ke	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:	<?php echo $ts->tempat_tugas ?><br>
Pada tanggal	&emsp;&emsp;&emsp;&nbsp;&nbsp;: <?php echo tgl_indonesia($ts->tgl_berangkat) ?><br><br>
<p align="center">Mengetahui,<br>
      Kepala Subbagian Umum</p><br><br>
      <p align="center"><u>Endri Setiawan, SE</u><br>
      NIP. 19870916 201212 1 001</p></td></tr>
      
    <tr><td>II.</td><td>Tiba di &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<br>
      Pada Tanggal &emsp;:<br><br><br><br><br><br><br></td>
      
      <td>
      Berangkat dari	&emsp;&emsp;&emsp;:	<br>
Ke	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:	<br>
Pada tanggal	&emsp;&emsp;&emsp;&nbsp;&nbsp;:	

      </td></tr>
      <tr><td>III.</td><td>Tiba di &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<br>
      Pada Tanggal &emsp;:<br><br><br><br><br><br><br></td>

      <td>
      Berangkat dari	&emsp;&emsp;&emsp;:	<br>
Ke	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:	<br>
Pada tanggal	&emsp;&emsp;&emsp;&nbsp;&nbsp;:
     </td></tr>

      <tr><td>IV.</td><td>Tiba di &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: Sekadau<br>
      (tempat kedudukan)<br>
      Pada Tanggal &emsp;: <?php echo tgl_indonesia($ts->tgl_kembali) ?><br><br>
      <p align="center">Mengetahui,<br>
      Pejabat Pembuat Komitmen</p><br><br>
      <p align="center"><u>Leila Ayu Zanaria, SE</u><br>
      NIP. 19660905 199303 2 001</p>
      </td>
      
      <td><p align="center">Telah diperiksa dengan keterangan bahwa penjelasan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu singkat,</p>
     <p align="center"> Pejabat yang berwenang/pejabat lainnya yang ditunjuk</p>
      <p align="center">Pejabat Pembuat Komitmen</p><br><br>
      <p align="center"><u>Leila Ayu Zanaria, SE</u><br>
      NIP. 19660905 199303 2 001</p>
      </td></tr>
      
      <tr><td>V.</td><td colspan="2">Catatan Lain : &nbsp;PPK yang menertibkan SPD, pegawai yang melakukan perjalanan dinas, pejabat yang <br>
     &emsp;&emsp; &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab <br> &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp; berdasarkan peraturan-peraturan keuangan Negara apabila Negara menderita rugi akibat <br>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kesalahan, kelalaian, dan kealpaannya.</td></tr>


 </table>
<br><br>
 
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>

  <table class="table table-bordered">
    <tr>
      <tr><td width="5%" >I.</td><td width="38%"></td><td width="57%">Berangkat dari	&emsp;&emsp;&emsp;:	Sekadau<br>
      (tempat kedudukan)<br>
Ke	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:	<?php echo $ts->tempat_tugas ?><br>
Pada tanggal	&emsp;&emsp;&emsp;&nbsp;&nbsp;: <?php echo tgl_indonesia($ts->tgl_berangkat) ?><br><br>
<p align="center">Mengetahui,<br>
      Kepala BPS Kabupaten Sekadau</p><br><br>
      <p align="center"><u>Leila Ayu Zanaria, SE</u><br>
      NIP. 19660905 199303 2 001</p></td></tr>
      
    <tr><td>II.</td><td>Tiba di &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<br>
      Pada Tanggal &emsp;:<br><br><br><br><br><br><br></td>
      
      <td>
      Berangkat dari	&emsp;&emsp;&emsp;:	<br>
Ke	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:	<br>
Pada tanggal	&emsp;&emsp;&emsp;&nbsp;&nbsp;:	

      </td></tr>
      <tr><td>III.</td><td>Tiba di &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:<br>
      Pada Tanggal &emsp;:<br><br><br><br><br><br><br></td>

      <td>
      Berangkat dari	&emsp;&emsp;&emsp;:	<br>
Ke	&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;:	<br>
Pada tanggal	&emsp;&emsp;&emsp;&nbsp;&nbsp;:
     </td></tr>

      <tr><td>IV.</td><td>Tiba di &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;: Sekadau<br>
      (tempat kedudukan)<br>
      Pada Tanggal &emsp;: <?php echo tgl_indonesia($ts->tgl_kembali) ?><br><br>
      <p align="center">Mengetahui,<br>
      Pejabat Pembuat Komitmen</p><br><br>
      <p align="center"><u>Leila Ayu Zanaria, SE</u><br>
      NIP. 19660905 199303 2 001</p>
      </td>
      
      <td><p align="center">Telah diperiksa dengan keterangan bahwa penjelasan tersebut atas perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu singkat,</p>
     <p align="center"> Pejabat yang berwenang/pejabat lainnya yang ditunjuk</p>
      <p align="center">Pejabat Pembuat Komitmen</p><br><br>
      <p align="center"><u>Leila Ayu Zanaria, SE</u><br>
      NIP. 19660905 199303 2 001</p>
      </td></tr>
      
      <tr><td>V.</td><td colspan="2">Catatan Lain : &nbsp;PPK yang menertibkan SPD, pegawai yang melakukan perjalanan dinas, pejabat yang <br>
     &emsp;&emsp; &emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab <br> &emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp; berdasarkan peraturan-peraturan keuangan Negara apabila Negara menderita rugi akibat <br>&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;kesalahan, kelalaian, dan kealpaannya.</td></tr>


 </table>
<br><br>
 
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>
  <script type="text/javascript">
      window.print();
    </script>

</body>
</html>