<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
| AUTO-LOADER
| -------------------------------------------------------------------
| This file specifies which systems should be loaded by default.
|
| In order to keep the framework as light-weight as possible only the
| absolute minimal resources are loaded by default. For example,
| the database is not connected to automatically since no assumption
| is made regarding whether you intend to use it.  This file lets
| you globally define which systems you would like loaded with every
| request.
|
| -------------------------------------------------------------------
| Instructions
| -------------------------------------------------------------------
|
| These are the things you can load automatically:
|
| 1. Packages
| 2. Libraries
| 3. Drivers
| 4. Helper files
| 5. Custom config files
| 6. Language files
| 7. Models
|
*/

/*
| -------------------------------------------------------------------
|  Auto-load Packages
| -------------------------------------------------------------------
| Prototype:
|
|  $autoload['packages'] = array(APPPATH.'third_party', '/usr/local/shared');
|
*/
$autoload['packages'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Libraries
| -------------------------------------------------------------------
| These are the classes located in system/libraries/ or your
| application/libraries/ directory, with the addition of the
| 'database' library, which is somewhat of a special case.
|
| Prototype:
|
|	$autoload['libraries'] = array('database', 'email', 'session');
|
| You can also supply an alternative library name to be assigned
| in the controller:
|
|	$autoload['libraries'] = array('user_agent' => 'ua');
*/
$autoload['libraries'] = array('database', 'session', 'form_validation', 'pagination', 'upload');

/*
| -------------------------------------------------------------------
|  Auto-load Drivers
| -------------------------------------------------------------------
| These classes are located in system/libraries/ or in your
| application/libraries/ directory, but are also placed inside their
| own subdirectory and they extend the CI_Driver_Library class. They
| offer multiple interchangeable driver options.
|
| Prototype:
|
|	$autoload['drivers'] = array('cache');
|
| You can also supply an alternative property name to be assigned in
| the controller:
|
|	$autoload['drivers'] = array('cache' => 'cch');
|
*/
$autoload['drivers'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Helper Files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['helper'] = array('url', 'file');
*/
$autoload['helper'] = array(
    // general helpers
    'url',
    'form',
    'security',
    'file',
    // // helpers for SISPEK
    // 'sispek/rupiah',
    // 'sispek/tanggal',
    // 'sispek/terbilang',
    // 'sispek/bulan'
);

/*
| -------------------------------------------------------------------
|  Auto-load Config files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['config'] = array('config1', 'config2');
|
| NOTE: This item is intended for use ONLY if you have created custom
| config files.  Otherwise, leave it blank.
|
*/
$autoload['config'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Language files
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['language'] = array('lang1', 'lang2');
|
| NOTE: Do not include the "_lang" part of your file.  For example
| "codeigniter_lang.php" would be referenced as array('codeigniter');
|
*/
$autoload['language'] = array();

/*
| -------------------------------------------------------------------
|  Auto-load Models
| -------------------------------------------------------------------
| Prototype:
|
|	$autoload['model'] = array('first_model', 'second_model');
|
| You can also supply an alternative model name to be assigned
| in the controller:
|
|	$autoload['model'] = array('first_model' => 'first');
*/
$autoload['model'] = array(
    // // models for SISPEK
    // 'sispek/M_mitra',
    // 'sispek/Data_kegiatan',
    // 'sispek/M_kontrak',
    // 'sispek/M_anggaran',
    // 'sispek/M_daftarspk',
    // 'sispek/M_ppk',
    // 'sispek/M_login',
    // 'sispek/M_user',
    // 'sispek/M_dashboard',
    // 'sispek/M_daftarkegiatan',
    // 'sispek/M_daftarbast',
    // 'sispek/M_datamitra',
    // // models for SIBUKGAN
    // 'sibukgan/B_Login_model',
    // 'sibukgan/Sptplh2_modeledit',
    // 'sibukgan/Sptplh_modeledit',
    // 'sibukgan/Spt2_modeledit',
    // 'sibukgan/Sptplh2_model',
    // 'sibukgan/Spt_modelmitra2',
    // 'sibukgan/Laporan_modeladmin',
    // 'sibukgan/Laporan_modeleditadmin',
    // 'sibukgan/Biaya_model',
    // 'sibukgan/Biaya_modeledit',
    // 'sibukgan/Sptplh_model',
    // 'sibukgan/Spt_model2',
    // 'sibukgan/Pegawai_model',
    // 'sibukgan/B_User_model',
    // 'sibukgan/Sppd_model',
    // 'sibukgan/Golongan_model',
    // 'sibukgan/Spt_model',
    // 'sibukgan/Laporan_model',
    // 'sibukgan/Spt_modeluser',
    // 'sibukgan/Laporan_modeluser',
    // 'sibukgan/Sppd_modeluser',
    // 'sibukgan/Pegawai_modeledit',
    // 'sibukgan/B_Dashboard_modeladmin',
    // 'sibukgan/Sppd_modeledit',
    // 'sibukgan/Laporan_modeledit',
    // 'sibukgan/Spt_modeledit',
    // 'sibukgan/Spt_modelmitra',
    // // models for SIMAKAND
    // 'simakand/K_Login_model',
    // 'simakand/Bbm_modeladmin',
    // 'simakand/Bbm_modeloperator',
    // 'simakand/Kendis_modeladmin',
    // 'simakand/Kendis_modeloperator',
    // 'simakand/K_User_model',
    // 'simakand/Bbm_modeluser',
    // 'simakand/K_Dashboard_modeladmin',
    // 'simakand/Kendis_modeluser'
);
