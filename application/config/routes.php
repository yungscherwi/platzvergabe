<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['hoersaele'] = 'hoersaele/index'; // Route für Hörsäle
$route['hochladen'] = 'hochladen/index'; // Route für Hochladen
$route['default_controller'] = 'pages/view'; //Home-Seite
$route['(:any)'] = 'pages/view/$1'; //entfernt /pages/view aus dem Link
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
