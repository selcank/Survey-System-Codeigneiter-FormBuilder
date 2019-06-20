<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';

$route["anket"]                = "Survey/index";
$route["anket/(.*)"]           = "Survey/$1";


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
