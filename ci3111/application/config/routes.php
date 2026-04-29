<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'landing';
// $route['sispek/(:any)'] = 'sispek/$1'; // Route for sispek
// $route['sibukgan/(:any)'] = 'sibukgan/$1'; // Route for sibukgan
// $route['simakand/(:any)'] = 'simakand/$1'; // Route for simakand
// $route['login'] = 'auth/login'; // Route for simakand
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['kelola/tautan/upload'] = 'kelola/tautan_upload';
$route['kelola/tautan/edit/(:num)'] = 'kelola/tautan_edit/$1';
$route['kelola/tautan/delete/(:num)'] = 'kelola/tautan_delete/$1';
$route['kelola/skp/upload'] = 'kelola/skp_upload';
$route['kelola/skp/delete/(:num)'] = 'kelola/skp_delete/$1';
$route['kelola/skp/edit/(:num)'] = 'kelola/skp_edit/$1';
$route['kelola/pengumuman/upload'] = 'kelola/pengumuman_upload';
$route['kelola/pengumuman/edit/(:num)'] = 'kelola/pengumuman_edit/$1';
$route['kelola/pengumuman/delete/(:num)'] = 'kelola/pengumuman_delete/$1';
$route['kelola/pengguna/upload'] = 'kelola/pengguna_upload';
$route['kelola/pengguna/edit/(:num)'] = 'kelola/pengguna_edit/$1';
$route['auth/ganti_password/(:num)'] = 'auth/handle_ganti_password/$1';