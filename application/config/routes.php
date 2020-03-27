<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
$route['default_controller'] = 'login';
	
$route['translate_uri_dashes'] = FALSE;

$route['registrasi'] = 'login/regist';
$route['relog'] = 'login/relogin';

//? ADMIN
$route['admin/kelas'] = 'kelas/index';
$route['admin/kelas/add'] = 'kelas/add';
$route['admin/kelas/edit/(:any)'] = 'kelas/edit/$1';
$route['admin/kelas/delete/(:any)'] = 'kelas/delete/$1';

$route['admin/jadwal'] = 'jadwal/index';
$route['admin/jadwal/add'] = 'jadwal/add';
$route['admin/jadwal/edit/(:any)'] = 'jadwal/edit/$1';
$route['admin/jadwal/delete/(:any)'] = 'jadwal/delete/$1';

$route['admin/user/admin'] = 'user/admin';
$route['admin/user/astur'] = 'user/astur';
$route['admin/user/add'] = 'user/add';
$route['admin/user/edit/(:any)'] = 'user/edit/$1';
$route['admin/user/delete/(:any)'] = 'user/delete/$1';
$route['admin/user/aktif/(:any)/(:any)'] = 'user/aktif/$1/$2';

$route['admin/hak_login'] = 'hak_login/index';
$route['admin/hak_login/boleh/(:any)'] = 'hak_login/boleh/$1';
$route['admin/hak_login/jangan/(:any)'] = 'hak_login/jangan/$1';

$route['admin/libur'] = 'libur/index';
$route['admin/libur/add'] = 'libur/add';
$route['admin/libur/edit/(:any)'] = 'libur/edit/$1';
$route['admin/libur/delete/(:any)'] = 'libur/delete/$1';

$route['admin/laporan/(:any)/(:any)'] = 'laporan/index/$1/$2';
$route['admin/laporan'] = 'laporan/index/$1/$2';
$route['admin/laporan/download/(:any)/(:any)'] = 'laporan/download/$1/$2';
$route['admin/laporan/display/(:any)/(:any)'] = 'laporan/display/$1/$2';

$route['admin/pengaturan'] = 'pengaturan/index';
$route['admin/pengaturan/light'] = 'pengaturan/light';
$route['admin/pengaturan/dark'] = 'pengaturan/dark';
$route['admin/pengaturan/semester'] = 'pengaturan/semester';

$route['konfirmasi'] = 'konfirmasi/index';
//! ====================================####=========================================

//? USER
$route['admin/absen/home'] = 'absen/index';
$route['admin/absen/astur/(:any)'] = 'absen/absen/$1';
$route['admin/absen/backup/(:any)'] = 'absen/backup/$1';
$route['admin/absen/masuk/(:any)'] = 'absen/masuk/$1';
$route['admin/absen/keluar/(:any)'] = 'absen/keluar/$1';

$route['admin/topik'] = 'topik/index';
$route['admin/topik/update'] = 'topik/update';

$route['admin/lainnya_izin'] = 'izin/index';
$route['admin/lainnya_izin/add'] = 'izin/add';
$route['admin/lainnya_izin/edit/(:any)'] = 'izin/edit/$1';
$route['admin/lainnya_izin/delete/(:any)'] = 'izin/delete/$1';

$route['admin/lainnya_acc'] = 'izin/acc_list';
$route['admin/lainnya_acc/yes/(:any)'] = 'izin/acc_confirm/$1';
$route['admin/lainnya_acc/cancel/(:any)'] = 'izin/acc_cancel/$1';

$route['admin/notif'] = 'notif/hitung';

$route['admin/profil/(:any)'] = 'profil/index/$1';
$route['admin/profil/edit/(:any)'] = 'profil/edit/$1';


//! ====================================####=========================================