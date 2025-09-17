<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['base_url'] = 'http://localhost:9300/';
// or dynamic (works on other ports/hosts too)
$config['base_url'] = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http')
                    . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\') . '/';
$config['index_page'] = '';
$config['encryption_key'] = '7f3a1c9b2d4e5f60718293a4b5c6d7e8091a2b3c4d5e6f708192a3b4c5d6e7f8';

/* Logging, required to avoid null warnings */
$config['log_threshold'] = 1;          // 0 off, 1 error, 2 debug, 3 info, 4 all
$config['log_path']      = '';         // empty string means application/logs
$config['log_file_extension'] = '';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';

/* Required common defaults, keep these if missing */
$config['composer_autoload'] = FALSE;
$config['uri_protocol'] = 'REQUEST_URI';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'MY_';
$config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['sess_driver'] = 'files';
$config['sess_cookie_name'] = 'ci_session';
$config['sess_save_path'] = sys_get_temp_dir(); // simple local default
$config['sess_expiration'] = 7200;
$config['cookie_prefix']  = '';
$config['cookie_domain']  = '';
$config['cookie_path']    = '/';
$config['cookie_secure']  = FALSE;
$config['cookie_httponly'] = FALSE;
