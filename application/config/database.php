<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
  'dsn'      => '',
  'hostname' => 'host.docker.internal',       // service name from docker-compose.yml
  'username' => 'root',
  'password' => 'root',     // must match MYSQL_ROOT_PASSWORD
  'database' => 'cinesync',
  'dbdriver' => 'mysqli',
  'pconnect' => FALSE,
  'db_debug' => (ENVIRONMENT !== 'production'),
  'char_set' => 'utf8mb4',
  'dbcollat' => 'utf8_general_ci',
  'save_queries' => TRUE,
  'port'     => 3306        // internal MySQL port
);
