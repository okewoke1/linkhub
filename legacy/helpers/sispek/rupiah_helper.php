<?php

if (!function_exists('rupiah')) {
    function format_rupiah($number)
    {
        $hasil = "Rp. " . number_format($number, 0, ",", ".");
        return $hasil;
    }
}

if (!function_exists('rupiah')) {
    function format_ribuan($number)
    {
        $hasil =  number_format($number, 0, ",", ".");
        return $hasil;
    }
}
