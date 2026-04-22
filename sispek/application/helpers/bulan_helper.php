<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('bulan_indonesia')) {
    function bulan_indonesia($tanggal)
    {
        $bulan = date('F', strtotime($tanggal));
        $bulan_array = array(
            'January' => 'Januari',
            'February' => 'Februari',
            'March' => 'Maret',
            'April' => 'April',
            'May' => 'Mei',
            'June' => 'Juni',
            'July' => 'Juli',
            'August' => 'Agustus',
            'September' => 'September',
            'October' => 'Oktober',
            'November' => 'November',
            'December' => 'Desember'
        );
        return $bulan_array[$bulan];
    }
}

if (!function_exists('bulan_array_indonesia')) {
    function bulan_array_indonesia()
    {
        return array(
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
    }
}
