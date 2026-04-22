<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('hari_indo')) {
    function hari_indo($hari)
    {
        $hari_indo = array(
            'Sunday'    => 'Minggu',
            'Monday'    => 'Senin',
            'Tuesday'   => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday'  => 'Kamis',
            'Friday'    => 'Jumat',
            'Saturday'  => 'Sabtu'
        );

        return $hari_indo[$hari];
    }
}

if (!function_exists('bulan_indo')) {
    function bulan_indo($bulan)
    {
        $bulan_indo = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember'
        );

        return $bulan_indo[$bulan];
    }
}

if (!function_exists('tanggal_indo')) {
    function tanggal_indo($tanggal)
    {
        return str_pad($tanggal, 2, '0', STR_PAD_LEFT);
    }
}

if (!function_exists('tahun_indo')) {
    function tahun_indo($tahun)
    {
        return $tahun;
    }
}
