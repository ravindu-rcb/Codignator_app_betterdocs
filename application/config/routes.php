<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'concession'; // not concession/index
$route['concession'] = 'concession/index';
$route['concession/new'] = 'concession/new';
$route['ticket-booking']    = 'ticketbooking/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['api/docs/(:any)'] = 'docsapi/get/$1';

