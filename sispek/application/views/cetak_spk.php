<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak SPK</title>
    <style>
        @font-face {
            font-family: 'Bookman Old Style';
            src: url('<?php echo base_url('assets/fonts/bookman-old-style.ttf'); ?>') format('truetype');
        }

        body {
            font-family: 'Bookman Old Style', serif;
            font-size: 11pt;
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
            margin: 0 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            /* border: 1px solid black; */
            /* border: 1px dotted; */
            font-size: 10pt;
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
           margin: 1.524cm 1.651cm 1.524cm 1.651cm; /* Top, Right, Bottom, Left */
        }

        .page-break {
            page-break-before: right;
        }

        .landscape-page {
            page: landscape;
        }

        @page landscape {
            size: 33.02cm 21.59cm;
            /* F4 paper size in landscape */

        }
    </style>

</head>

<body>
    <div class="container"><?php foreach ($spk as $row) : ?>
            <div class="header">
                <h4>
                    PERJANJIAN KERJA <br>
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
                        <td colspan="3">

                            Pada hari ini <?php echo hari_indo(date('l', strtotime($row->tanggal_spk))); ?>,
                            tanggal <?php echo ucwords(terbilang(tanggal_indo(date('d', strtotime($row->tanggal_spk))))); ?>,
                            bulan <?php echo bulan_indo(date('m', strtotime($row->tanggal_spk))); ?>,
                            tahun <?php echo ucwords(terbilang(tahun_indo(date('Y', strtotime($row->tanggal_spk))))); ?> 
                            (<?php echo date('d-m-Y', strtotime($row->tanggal_spk)); ?>)
                            bertempat di Jalan Merdeka Timur KM 09 Komplek Pemda Kabupaten Sekadau, yang bertanda tangan di bawah ini:

                        </td>
                    </tr>
                    <tr>
                        <td style="width:300px;vertical-align: top">1. <?php echo $row->ppk; ?></td>
                        <td style="width:10px;vertical-align: top">:</td>
                        <td style="width:600px;vertical-align: top">
                            <?php
                            if ($row->jabatan_ppk == 'Kuasa Pengguna Anggaran') {
                                echo '<b>Kuasa Pengguna Anggaran</b> bertindak selaku <b>Penjabat Pembuat Komitmen</b>';
                            } else {
                                echo '<b>' . $row->jabatan_ppk . '</b>';
                            }
                            ?>
                            
                            Badan Pusat Statistik Kabupaten Sekadau, berkedudukan di Jalan Merdeka Timur KM 09 Komplek Pemda Kabupaten Sekadau,
                            bertindak untuk dan atas nama Badan Pusat Statistik Kabupaten Sekadau, selanjutnya disebut sebagai
                            <b>PIHAK PERTAMA</b><br>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:300px;vertical-align: top">2. <?php echo ucwords(strtolower($row->nama_mitra)); ?></td>

                        <td style="width:10px;vertical-align: top">:</td>
                        <td style="width:600px;vertical-align: top">
                            <b>Mitra BPS</b> berkedudukan di <?php echo $row->alamat; ?>,
                            bertindak untuk atas nama sendiri, selanjutnya disebut
                            <b>PIHAK KEDUA</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><br>
                            Bahwa <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> yang secara bersama-sama disebut PARA PIHAK,
                            sepakat untuk mengikatkan diri dalam Perjanjian Kerja Petugas Kegiatan Survei
                            Bulan <?php echo ucwords(bulan_indo(date('m', strtotime($row->tanggal_spk)))); ?>
                            Tahun <?php echo date('Y', strtotime($row->tanggal_spk)); ?>
                            pada Badan Pusat Statistik Kabupaten Sekadau Nomor : <?php echo $row->no_spk; ?>, yang selanjutnya
                            disebut Perjanjian, dengan ketentuan-ketentuan sebagai berikut:
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 1</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>PIHAK PERTAMA</b> memberikan pekerjaan kepada <b>PIHAK KEDUA</b> dan <b>PIHAK KEDUA</b>
                            menerima pekerjaan dari <b>PIHAK PERTAMA</b> sebagai Petugas Kegiatan Survei
                            Bulan <?php echo ucwords(bulan_indo(date('m', strtotime($row->tanggal_spk)))); ?>
                            Tahun <?php echo date('Y', strtotime($row->tanggal_spk)); ?>
                            pada Badan Pusat Statistik Kabupaten Sekadau, dengan lingkup pekerjaan yang ditetapkan oleh
                            <b>PIHAK PERTAMA</b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 2</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Ruang lingkup pekerjaan dalam Perjanjian ini mengacu pada wilayah kerja dan beban kerja sebagaimana
                            tertuang dalam lampiran Perjanjian, Pedoman Petugas Kegiatan Survei
                            Bulan <?php echo ucwords(bulan_indo(date('m', strtotime($row->tanggal_spk)))); ?>
                            Tahun <?php echo date('Y', strtotime($row->tanggal_spk)); ?>
                            pada Badan Pusat Statistik Kabupaten Sekadau, dan ketentuan-ketentuan lainnya yang ditetapkan oleh
                            <b>PIHAK PERTAMA</b>
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center">
                            <b>PASAL 3</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Jangka Waktu Perjanjian terhitung sejak ditandatangani sampai dengan tanggal
                            <?php
                                $lastDayOfMonth = date('t', strtotime($row->tanggal_spk));
                                echo $lastDayOfMonth . ' ' . ucwords(bulan_indo(date('m', strtotime($row->tanggal_spk)))) . ' ' . date('Y', strtotime($row->tanggal_spk));
                            ?>
                        </td>
                    </tr>
                </table>
                <table>
                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 4</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[1] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            <b>PIHAK KEDUA</b> berhak untuk mendapatkan honorarium dari <b>PIHAK PERTAMA</b> sebesar
                            <?php echo format_rupiah($row->total_perjanjian); ?>,-
                            (<i><?php echo terbilang($row->total_perjanjian); ?></i>)
                            untuk pekerjaan sebagaimana dimaksud dalam <b>PASAL 2</b>, termasuk biaya pajak, bea meterai, dan jasa pelayanan keuangan.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[2] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            <b>PIHAK KEDUA</b> tidak diberikan honorarium tambahan apabila melakukan kunjungan diluar
                            jadwal atau terdapat tambahan waktu pelaksanaan pekerjaan lapangan.
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 5</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[1] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Pembayaran honorarium sebagaimana dimaksud dalam <b>Pasal 4</b> dilakukan setelah <b>PIHAK KEDUA </b>
                            menyelesaikan dan menyerahkan hasil pekerjaan sebagaimana dimaksud dalam <b>Pasal 2</b> kepada <b>PIHAK PERTAMA</b>.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[2] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Pembayaran sebagaimana dimaksud pada <b>Ayat [1]</b> dilakukan oleh <b>PIHAK PERTAMA</b> kepada
                            <b>PIHAK KEDUA </b> sesuai dengan ketentuan Peraturan Perundang-Undangan.
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 6</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Penyerahan hasil pekerjaan lapangan sebagaimana dimaksud dalam <b>Pasal 2</b> dilakukan secara bertahap
                            dan selambat-lambatnya seluruh hasil pekerjaan lapangan diserahkan sesuai jadwal yang tercantum
                            dalam Lampiran, yang dinyatakan dalam Berita Acara Serah Terima Hasil Pekerjaan yang ditandatangani
                            oleh <b>PARA PIHAK</b>.
                        </td>
                    </tr>
                </table>


                <div class="page-break"></div> <!-- Force page break here -->
                <table>

                    <tr><br><br>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 7</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            <b>PIHAK PERTAMA</b> dapat memutuskan Perjanjian ini secara sepihak sewaktu-waktu dalam hal
                            <b>PIHAK KEDUA</b> tidak dapat melaksanakan kewajibannya sebagaimana dimaksud dengan menerbitkan
                            Surat Pemutusan Perjanjian Kerja.
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 8</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[1] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Apabila <b>PIHAK KEDUA</b> mengundurkan diri dengan tidak menyelesaikan pekerjaan sebagaimana
                            dimaksud dalam <b>Pasal 2</b>, maka akan diberikan sanksi tidak diberikan honorarium atas
                            pekerjaan yang telah dilaksanakan.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[2] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Dikecualikan tidak dikenakan sanksi sebagaimana dimaksud pada <b>Ayat [1]</b> oleh <b>PIHAK PERTAMA</b>,
                            apabila <b>PIHAK KEDUA</b> meninggal dunia, mengundurkan diri karena sakit dengan keterangan rawat inap,
                            <!--terindikasi terinfeksi virus Covid-19 dengan keterangan pihak yang berwenang,-->
                            kecelakaan dengan keterangan kepolisian, dan/atau telah diberikan Surat Pemutusan Perjanjian Kerja
                            dari <b>PIHAK PERTAMA</b>.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[3] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Dalam hal terjadi peristiwa sebagaimana dimaksud pada <b>Ayat [2]</b>, <b>PIHAK PERTAMA</b> membayarkan
                            honorarium kepada <b>PIHAK KEDUA</b> secara proporsional sesuai pekerjaan yang telah dilaksanakan.
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 9</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[1] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Apabila terjadi Keadaan Kahar, yang meliputi bencana alam, bencana non alam, dan bencana sosial,
                            <b>PIHAK KEDUA</b> memberitahukan kepada <b>PIHAK PERTAMA</b> dalam waktu paling lambat 14 (empat belas) hari
                            sejak mengetahui atas kejadian Keadaan Kahar dengan menyertakan bukti.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[2] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Pada saat terjadi Keadaan Kahar, pelaksanaan pekerjaan oleh <b>PIHAK KEDUA</b> dihentikan sementara dan
                            dilanjutkan kembali setelah Keadaan Kahar berakhir, namun apabila akibat Keadaan Kahar
                            tidak memungkinkan dilanjutkan/diselesaikannya pelaksanaan pekerjaan, <b>PIHAK KEDUA </b>
                            berhak menerima honorarium secara proporsional sesuai pekerjaan yang telah dilaksanakan.
                        </td>
                    </tr>

                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 10</b>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Hal-hal yang belum diatur dalam Perjanjian ini atau segala perubahan terhadap Perjanjian ini diatur
                            lebih lanjut oleh <b>PARA PIHAK</b> dalam perjanjian tambahan/adendum dan merupakan bagian
                            tidak terpisahkan dari Perjanjian ini.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: center"><br>
                            <b>PASAL 11</b>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[1] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Segala perselisihan atau perbedaan pendapat yang mungkin timbul sebagai akibat dari Perjanjian ini,
                            diselesaikan secara musyawarah untuk mufakat oleh <b>PARA PIHAK</b>.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:40px;vertical-align: top">[2] :</td>
                        <td colspan="2" style="width:900px;vertical-align: top">
                            Apabila musyawarah untuk mufakat sebagaimana dimaksud pada <b>Ayat [1]</b> tidak berhasil, maka
                            <b>PARA PIHAK</b> sepakat untuk menyelesaikan perselisihan dengan memilih kedudukan/domisili hukum
                            di Kepaniteraan Pengadilan Negeri Sanggau.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">
                            Demikian Perjanjian ini dibuat dan ditandatangani oleh <b>PARA PIHAK</b> dalam 2 (dua) rangkap asli
                            bermeterai cukup, tanpa paksaan dari PIHAK manapun dan untuk dilaksanakan oleh <b>PARA PIHAK</b>.
                        </td>
                    </tr>
                </table><br>

                <table>
                    <tr>
                        <th style="text-align: center;width:50%"><b>PIHAK PERTAMA</b></th>
                        <th style="text-align: center;width:50%"><b>PIHAK KEDUA</b></th>
                    </tr>
                    <tr>
                        <td style="text-align: center"><br><br><br><br><br><br><br><?php echo ucwords($row->ppk); ?></td>
                        <td style="text-align: center"><br><br><br><br><br><br><br><?php echo ucwords(strtolower($row->nama_mitra)); ?></td>

                    </tr>
                    <!--<tr>-->
                    <!--    <td style="text-align: center">NIP. <?php echo $row->nip; ?></td>-->
                    <!--    <td></td>-->
                    <!--</tr>-->
                </table>
            </div>
    </div>
<?php endforeach; ?>


<!-- Force page break here -->
<!-- tabel page 3 -->
<!-- <div class="container"> -->
<div class="content landscape-page">
    <table class="" style="width:98%">
        <?php foreach ($spk as $row) : ?>
            <tr><br><br><br>
                <th style="width:55%"></th>
                <th>
                    LAMPIRAN <br>
                    PERJANJAN KERJA PETUGAS SURVEI
                    BULAN <?php echo strtoupper(bulan_indo(date('m', strtotime($row->tanggal_spk)))); ?>
                    TAHUN <?php echo tahun_indo(date('Y', strtotime($row->tanggal_spk))); ?> <br>
                    PADA BADAN PUSAT STATISTIK KABUPATEN SEKADAU <br>
                    NOMOR : <?php echo $row->no_spk; ?>
                </th>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <br>
    <table class="bordered-table" style="width:98%">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Uraian Tugas</th>
                <th rowspan="2">Beban Anggaran</th>
                <th colspan="2">Target Pekerjaan</th>
                <th colspan="2">Hasil Pekerjaan</th>
                <th rowspan="2">Harga Satuan</th>
                <th rowspan="2">Nilai Perjanjian</th>


            </tr>
            <tr>
                <th>Vol</th>
                <th>Satuan</th>
                <th>Vol</th>
                <th>Satuan</th>

            </tr>
        </thead>

        <?php $no = 1; // Inisialisasi variabel di luar loop ?>
<?php foreach ($tabel as $row) : ?>
    <tr>
        <td><?php echo $no++; ?></td> <!-- Menampilkan nomor yang bertambah -->
        <td style="text-align: left;"><?php echo $row->uraian_tugas; ?></td>
        <td><?php echo $row->kode_anggaran; ?></td>
        <td><?php echo $row->volume; ?></td>
        <td><?php echo $row->satuan; ?></td>
        <td><?php echo $row->volume; ?></td>
        <td><?php echo $row->satuan; ?></td>
        <td style="text-align: right;">
            <?php 
                $honor = ($row->volume != 0) ? ($row->nilai_perjanjian / $row->volume) : 0;
                echo format_ribuan($honor);
            ?>
        </td>
        <td style="text-align: right;"><?php echo format_ribuan($row->nilai_perjanjian); ?></td>
    </tr>
<?php endforeach; ?>



        <?php foreach ($spk as $row) : ?>
            <tr>
                <td style="text-align: left;" colspan="7">
                    <div id="">
                        <i>Terbilang :
                            <?php echo ucwords(terbilang($row->total_perjanjian)) . " rupiah"; ?>
                        </i>
                    </div>
                </td>
                <td style="vertical-align: middle;" colspan="1">
                    <b>Total : </b>
                </td>
                <td style="text-align: right;"><b><?php echo format_ribuan($row->total_perjanjian); ?></b></td>
            </tr>
        <?php endforeach; ?>

    </table>
    <br><br>

</div>

<!-- </div> -->
<script type="text/javascript">
    window.print();
</script>
</body>


</html>