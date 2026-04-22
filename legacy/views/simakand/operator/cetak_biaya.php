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
        margin: 30px 55px 0px 55px;
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

img {
  display: block;
  margin-left: auto;
  margin-right: auto;

}
  </style>
</head>
<body>

<img src="<?php echo base_url() ?>assets/simakand/img/bps.png" style="width:130px; height:100px; color:#00B0F0;">
    <p style="font-family:Calibri;  color:#00B0F0; font-size:1.3em;" align="center">
    <b><i>BADAN PUSAT STATISTIK KABUPATEN SEKADAU</i></b>
    </p>
    <p style="font-family:Calibri; font-size:1.3em;" align="center">
    <b>PERINCIAN BIAYA PERJALANAN DINAS</b>
    </p>

 

<table >
   <tr><td></td><td>Lampiran SPD Nomor&emsp;</td><td>:</td><td></td></tr>
      <tr><td></td><td>Tanggal&emsp;</td><td>:</td><td></td></tr>

</table>
  

  <table >
  
<br>


  <table class="table table-bordered">
     <?php foreach($detail as $ts): ?>
    <tr>
      <tr><td width="5%" >No</td><td colspan="2" width="55%">Perincian Biaya</td>
      <td colspan="2" width="20%">Jumlah</td>
      <td colspan="2" width="20%">Keterangan</td>
      </tr>
      
      <tr><td>1</td><td colspan="2" >Nama yang bertugas&emsp;:&emsp;<?php echo $ts->pegawai ?><br>
      Golongan&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;<?php echo $ts->golongan_pegawai ?><br>
      Tempat Tugas&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;<?php echo $ts->tempat_tugas ?><br>
      Lama Tugas&emsp;&emsp;&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php
      $date1 = date("d",strtotime($ts->tgl_berangkat));
      $date2 = date("d",strtotime($ts->tgl_kembali));
      $datediff = $date2 - $date1;
      ?>
      <?php echo floor($datediff+1);?> Hari</td><td colspan="2"><br></td>
      <td colspan="2" width="30%"></td>
      </tr>
      
      <tr><td>2</td><td colspan="2">Biaya Transport</td><td colspan="2">Rp. <?php echo number_format($ts->biaya_transport,2,',','.') ?></td>
      <td colspan="2" width="30%"></td>
      </tr>

      <tr><td>3</td><td colspan="2">Uang Harian</td><td colspan="2">Rp. <?php echo number_format($ts->uang_harian,2,',','.') ?></td>
    <td colspan="2" width="30%"></td>
    </tr>
    
    
      <tr><td>4</td><td colspan="2">Biaya Penginapan</td><td colspan="2">Rp. <?php echo number_format($ts->biaya_penginapan,2,',','.') ?></td>
      <td colspan="2" width="30%"></td>
      </tr>
      
      <tr><td>5</td><td colspan="2">Pengeluaran Riil</td><td colspan="2">Rp. <?php echo number_format($ts->pengeluaran_riil,2,',','.') ?></td>
      <td colspan="2" width="30%"></td>
      </tr>
      
      <tr><td></td><td colspan="2">JUMLAH :</td><td colspan="2">Rp. <?php echo number_format($ts->total,2,',','.') ?> </td>
      <td colspan="2" width="30%"></td>
      </tr>
      
      <tr><td colspan="6">Terbilang :<?php echo Terbilang($ts->total) ?> Rupiah</td>
      </tr>

      
    

  </table>
 <table >
   <tr><td width="400px"></td><td width="400px">Sekadau</td></tr>
      <tr><td width="600px">Telah dibayar sejumlah</td><td>Telah menerima sejumlah uang sebesar</td></tr>
      <tr><td width="600px">Rp.</td><td>Rp.</td></tr>
      <tr><td width="600px" class="text-center">Bendahara Pengeluaran</td><td></td></tr>
      <tr><td width="600px" class="text-center">BPS Kabupaten Sekadau,</td><td class="text-center">Yang Menerima,</td></tr>
      
      <tr><td width="600px"><br></td><td></td></tr>
      <tr><td width="600px"><br></td><td></td></tr>
      
      <tr><td width="600px" class="text-center">Bimbi Ardhana Rizky, S.Stat</td><td class="text-center"><?php echo $ts->pegawai ?></td></tr>
      <tr><td width="600px" class="text-center">NIP. 19960629 01903 001</td><td class="text-center">NIP. <?php echo $ts->nip ?></td></tr>
</table>
<?php endforeach ?>
<br>
  <table style="width: 100%;">
    <tr>
      <td align="center">
        <span style="line-height: 1.6; font-family:Calibri;">
          PERHITUNGAN SPD RAMPUNG
        </span>
      </td>
    </tr>
  </table>
  <br>
   <table >
   <tr><td width="400px">Ditetapkan sejumlah</td><td width="300px">:&emsp;Rp. <?php echo number_format($ts->total,2,',','.') ?></td></tr>
      <tr><td width="400px">Yang telah dibayar semula</td><td>:&emsp;-</td></tr>
      <tr><td width="400px">Sisa kurang / lebih</td><td>:&emsp;Rp. <?php echo number_format($ts->total,2,',','.') ?></td></tr>
</table>

  <table >
     <tr>
        <td width="600px"></td>
        <td class="text-center">Pejabat Pembuat Komitmen</td>
      </tr>
       <tr>
        <td width="600px"></td>
        <td class="text-center">Badan Pusat Statistik Kabupaten Sekadau</td>
      </tr>

 </table>
    <br> <br><br>


    <table>
     <tr>
        <td width="650px"></td>
        <td class="text-center"><u>Leila Ayu Zanaria, SE</u></td>
      </tr>
           <tr>
        <td width="650px"></td>
        <td class="text-center">NIP. 19660905 199303 2 001</td>
      </tr>
 </table>

 <?php
    function Terbilang($nilai) {
        $nilai = abs($nilai);
        $huruf = array("","Satu","Dua","Tiga","Empat","Lima","Enam","Tujuh","Delapan","Sembilan","Sepuluh","Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " ". $huruf[$nilai];
        } else if ($nilai <20) {
            $temp = Terbilang($nilai - 10). " Belas";
        } else if ($nilai < 100) {
            $temp = Terbilang($nilai/10)." Puluh". Terbilang($nilai % 10);
        } else if ($nilai < 200) {
            $temp = "Seratus" . Terbilang($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = Terbilang($nilai/100) . " Ratus" . Terbilang($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = "Seribu" . Terbilang($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = Terbilang($nilai/1000) . " Ribu" . Terbilang($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = Terbilang($nilai/1000000) . " Juta" . Terbilang($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = Terbilang($nilai/1000000000) . " Milyar" . Terbilang(fmod($nilai,1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = Terbilang($nilai/1000000000000) . " Trilyun" . Terbilang(fmod($nilai,1000000000000));
        }     
        return $temp;
    }
  ?> 
<br><br>
  <p style="font-family:arial; font-size:15px;" align="center">Jalan Merdeka Timur KM.9 Komp. Perkantoran Pemda Sekadau 78582 Telp/Fax: (0564) 2021686<br>
  Homepage : <u style="color:blue;">http:/sekadaukab.bps.go.d</u>  E-mail : bps6109.bps.go.id</p>
  <script type="text/javascript">
      window.print();
    </script>

</body>
</html>