<!DOCTYPE html>
<html>
<head>
    <title>SPD</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 14px;
    }

    .table-bordered-custom td, .table-bordered-custom th {
        border: 1px solid #000;
        padding: 4px;
    }

    /* Hilangkan garis kiri pada kolom pertama */
    .table-bordered-custom td:first-child,
    .table-bordered-custom th:first-child {
        border-left: none;
    }

    /* Hilangkan garis kanan pada kolom terakhir */
    .table-bordered-custom td:last-child,
    .table-bordered-custom th:last-child {
        border-right: none;
    }

    .center {
        text-align: center;
    }

    .right {
        text-align: right;
    }

    .no-border {
        border: none;
        
        
    }
    
     .table-bordered-custom tr:first-child td {
            border-top: 2px solid #000;
        }
        .table-bordered-custom tr:last-child td {
            border-bottom: 2px solid #000;
        }
        

</style>


</head>
<body>
<table >
<?php foreach($detail as $ts): ?>
 <?php
      $bln1 = date("m",strtotime($ts->tgl_spt));
  $thn1 = date("Y",strtotime($ts->tgl_spt));
      ?>
<tr><td width="560px"></td><td>Nomor</td><td>:</td><td colspan="2"><?php echo $ts->nomor_spd ?>/6109/SPD/<?php echo ($thn1);?></td></tr>
      <tr><td width="560px"></td><td>Lembar</td><td>:</td><td colspan="2"></td></tr>
 
      
      <?php endforeach ?>
</table>
  

  <table >
  

<table style="width: 100%;">
  <tr>
    <td style="text-align: left;">
      <span>
        Badan Pusat Statistik Sekadau<br>
        Jl. Merdeka Timur KM 09 Komplek Pemda Sekadau<br>
        Sekadau
      </span>
    </td>
  </tr>
</table>


<table class="table-bordered-custom">
    <tr>
        <td colspan="3">1. Pejabat Pembuat Komitmen</td>
        <td colspan="2">Roma Dear Silitonga, SST</td>
    </tr>
    <tr>
        <td colspan="3">2. Nama pegawai yang melaksanakan perjalanan dinas</td>
        <td colspan="2">
            <?php foreach ($detail as $ts): ?>
                <?php echo $ts->pegawai ?><br>
            <?php endforeach ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">
        3. a. Pangkat dan golongan<br>
    b. Jabatan/ instansi<br>
    c. Tingkat Biaya Perjalanan Dinas
    </td>
        <td colspan="2">
            <?php foreach ($detail as $ts): ?>
                <?php echo $ts->pangkat_pegawai ?>
      <br><?php echo $ts->jabatan ?>
      <br>    
            <?php endforeach ?>
        </td>
    </tr>
    <tr>
        <td colspan="3">4. Maksud perjalanan dinas</td>
        <td colspan="2"><?php echo $ts->keperluan ?></td>
    </tr>
    <tr>
        <td colspan="3">5. Alat Angkutan yang dipergunakan</td>
        <td colspan="2"><?php echo $ts->jenis_transport ?></td>
    </tr>
    <tr>
                <td colspan="3">
        6. a. Tempat keberangkatan<br>
    b. Tempat tujuan<br>
    </td>
        <td colspan="2">Sekadau
      <br><?php echo $ts->tempat_tugas ?></td>
    </tr>
    <tr>
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
    <td colspan="3">
        7. a. Lamanya perjalanan Dinas<br>
    b. Tanggal Berangkat<br>
    c. Tanggal harus kembali/ tiba ditempat baru *)
    </td>
    <td colspan="2"><?php
      $date1 = date("d",strtotime($ts->tgl_berangkat));
      $date2 = date("d",strtotime($ts->tgl_kembali));
      $datediff = $date2 - $date1;
      ?>
      <?php echo floor($datediff+1);?> Hari
      <br><?php echo tgl_indonesia($ts->tgl_berangkat) ?> 
      <br><?php echo tgl_indonesia($ts->tgl_kembali) ?></td>
</tr>

        

<tr style="height: 40px;">
    <td colspan="3" style="vertical-align: top;">8. Pengikut :                          Nama</td>
    <td colspan="1" style="text-align: center; vertical-align: top;">Umur</td>
    <td colspan="1" style="text-align: center; vertical-align: top;">Hubungan keluarga/keterangan</td>
</tr>


    <tr>
        <td colspan="3">9. Pembebanan anggaran                                        Program<br>
                                                                                        Kegiatan<br><br>
                                                                                        Komponen<br><br>
    a. Instansi<br>
    b. Mata anggaran</td>
        <td colspan="2"><br><br><br><br><br>
        Badan Pusat Statistik Sekadau
        </td>
    </tr>
    <tr>
        <td colspan="3">10. Keterangan Lain-lain</td>
        <td colspan="2"></td>
    </tr>
</table>


<table style="width: 100%; margin-top: 20px;">
    <tr>
        <td style="width: 50%;"></td>
        <td style="width: 50%;">
            <div>
                <div style="text-align: left;">
                    Dikeluarkan di: Sekadau<br>
                    Pada tanggal: <?php echo tgl_indonesia($ts->tgl_spt); ?>
                </div>
            </div>
        </td>
    </tr>
</table>

<table style="width: 100%; margin-top: 20px;">
    <tr>
        <td style="width: 50%;"></td>
        <td style="width: 50%;">
            <div>
                 <div style="text-align: left;">
                    PEJABAT PEMBUAT KOMITMEN<br>
                        Program Dukungan Manajemen<br><br><br><br>
                            <u><b>Roma Dear Silitonga, SST</b></u><br>
                            NIP. 199402152017012001
                </div>
            </div>
        </td>
    </tr>
</table>

<table style="width: 100%; margin-top: 50px;">
    <tr>
        <td style="text-align: left; width: 100%;">
            Tembusan disampaikan kepada :<br>
            1.<br>
            2.
        </td>
    </tr>
</table>

  




<div style="page-break-before: always;"></div>

<table class="table-bordered-custom" style="width: 100%; margin-top: 20px;">
  <tr>
        <td style="width: 50%; border-top: none;"></td>
        <td style="width: 50%; border-top: none;">
<table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Berangkat dari</td>
        <td style="width: 5%; border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;">Kabupaten Sekadau</td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;"></td>
        <td style="border: none; padding: 0;"></td>
        <td style="border: none; padding: 0;">(Tempat Kedudukan)</td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Pada Tanggal</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo tgl_indonesia($ts->tgl_berangkat) ?></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Ke</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo $ts->tempat_tugas ?></td>
    </tr>
</table>
            <div style="text-align: center; margin-top: 5px;">
                Kepala BPS Kabupaten Sekadau<br><br><br><br>
                <b><u>Imam Setia Harnomo, SST., M.Stat</u></b><br>
                Nip. 197911262002121006
            </div>
        </td>
    </tr>
    
      <tr>
        <td style="width: 50%;">
            <table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Tiba di</td>
        <td style="width: 5%; border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo $ts->tempat_tugas ?></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Pada Tanggal</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;"></td>
        <td style="border: none; padding: 0;">  </td> 
        <td style="border: none; padding: 0;"></td>
    </tr>

</table><div style="text-align: center; margin-top: 5px;">
               <br><br><br><br>
              <br>

            </div></td>
        <td style="width: 50%;">
<table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Berangkat dari</td>
        <td style="width: 5%; border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo $ts->tempat_tugas ?></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Ke</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;">Kabupaten Sekadau</td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Pada Tanggal</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"></td>
    </tr>

</table><div style="text-align: center; margin-top: 5px;">
               <br><br><br><br>
              <br>

            </div>
        </td>
    </tr>
    
     <tr>
        <td style="width: 50%;">
            <table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Tiba di</td>
        <td style="width: 5%; border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo $ts->tempat_tugas ?></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Pada Tanggal</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;"></td>
        <td style="border: none; padding: 0;">  </td> 
        <td style="border: none; padding: 0;"></td>
    </tr>

</table><div style="text-align: center; margin-top: 5px;">
               <br><br><br><br>
              <br>

            </div></td>
        <td style="width: 50%;">
<table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Berangkat dari</td>
        <td style="width: 5%; border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo $ts->tempat_tugas ?></td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Ke</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;">Kabupaten Sekadau</td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Pada Tanggal</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"></td>
    </tr>

</table><div style="text-align: center; margin-top: 5px;">
               <br><br><br><br>
              <br>

            </div>
        </td>
    </tr>
    

 <tr>
   <tr>
        <td style="width: 50%;"><table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Tiba di</td>
        <td style="width: 5%; border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;">Kabupaten Sekadau</td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;"></td>
        <td style="border: none; padding: 0;"></td>
        <td style="border: none; padding: 0;">(Tempat Kedudukan)</td>
    </tr>
    <tr>
        <td style="border: none; padding: 0;">Pada Tanggal</td>
        <td style="border: none; padding: 0;">:</td>
        <td style="border: none; padding: 0;"><?php echo tgl_indonesia($ts->tgl_kembali) ?></td>
    </tr>

</table>            <div style="text-align: center; margin-top: 10px;">
                Pejabat Pembuat Komitmen<br><br><br><br>
                <b><u>Roma Dear Silitonga, SST</u></b><br>
                Nip. 199402152017012001
            </div></td>
        <td style="width: 50%;">
<table style="width: 100%; font-size: 14px; border: none; line-height: 1;">
    <tr>
        <td style="width: 40%; border: none; padding: 0;">Telah diperiksa dengan keterangan bahwa perjalanan<br>
tersebut atas perintahnya dan semata-mata untuk<br>
kepentingan jabatan dalam waktu yang sesingkat<br>
singkatnya
</td>

    </tr>



</table>



            <div style="text-align: center; margin-top: 10px;">
                Pejabat Pembuat Komitmen<br><br><br><br>
                <b><u>Roma Dear Silitonga, SST</u></b><br>
                Nip. 199402152017012001
            </div>
        </td>
    </tr>
 <tr>

</table>

CATATAN LAIN - LAIN
<table style="width: 100%; font-size: 15px; line-height: 1;">
    <tr>
        <td style="vertical-align: top; width: 10%;">PERHATIAN</td>
        <td style="vertical-align: top; width: 1%;">:</td>
        <td style="text-align: justify;">
            Pejabat yang berwenang menerbitkan SPD pegawai yang melakukan perjalanan dinas,
            para pejabat yang mengesahkan tanggal berangkat/tiba serta bendaharawan bertanggung jawab
            berdasarkan peraturan-peraturan keuangan Negara apabila Negara menderita rugi akibat
            kesalahan, kelalaian dan kealpaannya.
        </td>
    </tr>
</table>

  <script type="text/javascript">
      window.print();
    </script>


</body>
</html>
