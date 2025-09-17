<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller']   = 'concession';
$route['concession']           = 'concession/index';        // optional
$route['concession/new']       = 'concession/new_form';     // <— changed
$route['ticket-booking']       = 'ticketbooking/index';
$route['api/docs/(:any)']      = 'docsapi/get/$1';
$route['404_override']         = '';
$route['translate_uri_dashes'] = FALSE;

