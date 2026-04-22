<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak BAST</title>
    <style>
        @font-face {
            font-family: 'Bookman Old Style';
            src: url('<?php echo base_url('assets/sispek/fonts/bookman-old-style.ttf'); ?>') format('truetype');
        }

        body {
            font-family: 'Bookman Old Style', serif;
            font-size: 11pt;
            line-height: 1.5; /* Mengatur jarak antar baris 1.5 */
        }

        .indented {
            text-indent: 40px; /* Indentasi sebesar 40px (1 tab) */
        }
        
        .container {
            width: 100%;
            margin: 0 auto;
        }

        .header,
        .footer {
            text-align: center;
            /* margin-bottom: 20px; */
        }

        .content {
            /*margin: 0 10px;*/
            margin: 0;
            padding-top: 0; /* Menghapus padding atas */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            /*border: 1px solid black;*/
            /* border: 1px dotted; */
            font-size: 11pt;
            /* Specific font size for table headers and cells */
        }


        /* CSS for table border only on page 3 */
        .bordered-table table,
        .bordered-table th,
        .bordered-table td {
            border: 1px solid black;
            text-align: center;
            padding: 8px;
            /* Border styling */
            /* Add other styles as needed */
        }

        h4 {
            font-size: 11pt;
        }
        
        p {
            margin: 0; /* Menghapus margin default pada paragraf */
            padding: 5px 0; /* Tambahkan padding agar tidak terlalu rapat */
        }

        th,
        td {
            padding: 2px;
            text-align: left;
            font-weight: normal;
            text-align: justify;
        }

        .no-print {
            display: none;
        }

        @page {
            size: 21.59cm 33.02cm; /* 8.5 x 13 inch */
            /*size: 21.0cm 29.7cm;*/
            margin: 1.651cm 1.651cm 1.524cm 1.651cm; /* Top, Right, Bottom, Left */
            /* F4 paper size */

        }
    </style>

</head>

<body>
    <div class="container"><?php foreach ($bast as $row) : ?>
            <div class="header">
                <h4>
                    BERITA ACARA SERAH TERIMA PEKERJAAN <br>
                    PETUGAS KEGIATAN SURVEI
                    BULAN <?php echo strtoupper(bulan_indo(date('m', strtotime($row->tanggal_spk)))); ?>
                    TAHUN <?php echo strtoupper(tahun_indo(date('Y', strtotime($row->tanggal_spk)))); ?> <br>
                    PADA BADAN PUSAT STATISTIK KABUPATEN SEKADAU <br>
                    Nomor : <?php echo $row->no_spk; ?>
                </h4>
            </div>
            <div class="content">
                <table>
                    <tr>
                        <td colspan="4">
                            <p class="indented"> <!-- Menambahkan kelas 'indented' untuk membuat indentasi -->
                                Pada hari ini <?php echo hari_indo(date('l', strtotime($row->tanggal_bast))); ?>,
                                tanggal <?php echo ucwords(terbilang(tanggal_indo(date('d', strtotime($row->tanggal_bast))))); ?>,
                                bulan <?php echo bulan_indo(date('m', strtotime($row->tanggal_bast))); ?>,
                                tahun <?php echo ucwords(terbilang(tahun_indo(date('Y', strtotime($row->tanggal_bast))))); ?>
                                (<?php echo date('d-m-Y', strtotime($row->tanggal_bast)); ?>) 
                                bertempat di Kantor BPS Kabupaten Sekadau Jalan Merdeka Timur KM 09 Komplek Pemda Kabupaten Sekadau, yang bertanda tangan di bawah ini:
                            </p>
                        </td>
                    </tr>
                    <!-- BATAS NAMA PIHAK PERTAMA -->
                    <tr>
                        <td style="width:35px;vertical-align: top">1. </td>
                        <td style="width:150px;vertical-align: top">Nama</td>
                        <td style="width:10px;vertical-align: top">:</td>
                        <td><?php echo ucwords(strtolower($row->nama_mitra)); ?></td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>
                            <?php
                            // echo $row->jabatan
                             if ($row->jabatan == 'PPL') {
                                    echo 'Petugas Pendataan Lapangan';
                                } elseif ($row->jabatan == 'PML') {
                                    echo 'Petugas Pemeriksa Lapangan';
                                } elseif ($row->jabatan == 'PPD') {
                                    echo 'Petugas Pengolahan Data';
                                } else {
                                    echo 'Jabatan Tidak Diketahui';
                                }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?php echo ucwords(strtolower($row->alamat)); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td colspan="3"> yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b></td><br>
                    </tr>
                    <!-- BATAS NAMA PIHAK PERTAMA -->
                </table>
                
                
                <table>
                    <!-- BATAS NAMA PIHAK KEDUA -->
                    <tr>
                        <td style="width:35px;vertical-align: top">2. </td>
                        <td style="width:150px;vertical-align: top">Nama</td>
                        <td style="width:10px;vertical-align: top">:</td>
                        <td>Roma Dear Silitonga, SST</td>
                    </tr>
                    <tr>
                        <td> </td>
                        <td>Jabatan</td>
                        <td>:</td>
                        <td>Pejabat Pembuat Komitmen BPS Kabupaten Sekadau</td>
                    </tr>
                    <tr style="vertical-align: top;">
                        <td> </td>
                        <td>Alamat Kantor</td>
                        <td>:</td>
                        <td >BPS Kabupaten Sekadau BPS Kabupaten Sekadau, Komplek Perkantoran Pemda Sekadau 
                        </td>
                    </tr>
                     <tr>
                        <td></td>
                        <td colspan="3"> yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b></td><br>
                    </tr>
                    <!-- BATAS NAMA PIHAK KEDUA -->
                </table>
               <br>
                <table>
                    <tr>
                        <td colspan="2">
                            <p class="indented"> <!-- Menambahkan kelas 'indented' untuk membuat indentasi -->
                            Berdasarkan Surat Perintah Kerja (SPK) Nomor : <?php echo $row->no_spk; ?>,
                            tanggal <?php echo ucwords(date('d/m/Y', strtotime($row->tanggal_spk))); ?>,
                            bersama ini <b>PIHAK PERTAMA</b>
                            telah menyerahkan pekerjaan 
                            kepada <b>PIHAK KEDUA</b>, dengan ketentuan sebagai berikut :
                            </p>

                        </td>
                    </tr>
                </table>

                <table>

                    <tr>
                        <td style="width:40px;vertical-align: top">1.</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Hasil pekerjaan <b>PIHAK PERTAMA</b> telah sesuai dengan uraian tugas, target dan spesifikasi teknis /kualitas yang ditetapkan dalam lampiran Surat Perintah Kerja (SPK).
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">2.</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                           Hasil pekerjaan sebagaimana tersebut pada butir 1 telah diperiksa oleh Ketua Tim Kerja BPS Kabupaten Sekadau dan diterima kelengkapannya oleh <b>PIHAK KEDUA</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <p class="indented"> <!-- Menambahkan kelas 'indented' untuk membuat indentasi -->
                            Demikian Berita Acara ini dibuat untuk dipergunakan sebagaimana mestinya.
                            </p>
                        </td>
                    </tr>

                </table><br>

                <table>
                    <tr>
                        <th style="text-align: center;width:50%"><b>PIHAK PERTAMA</b></th>
                        <th style="text-align: center;width:50%"><b>PIHAK KEDUA</b></th>
                    </tr>
                    <tr>
                        <td style="text-align: center"><br><br><br><br><br><?php echo ucwords($row->ppk); ?></td>
                        <td style="text-align: center"><br><br><br><br><br><?php echo ucwords(strtolower($row->nama_mitra)); ?></td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td style="text-align: center">NIP. <?php echo $row->nip; ?></td>-->
                    <!--    <td></td>-->
                    <!--</tr>-->
                </table>
            </div>
    </div>
<!--<?php endforeach; ?>-->



 </div> 
 <script type="text/javascript">
    window.print();
</script> 


</body>


</html>