<?php
$config = array();

//Error reporting
error_reporting(-1);
ini_set('display_errors', 1);

//Site settings
$config['site_title'] = '';
$config['timezone'] = '';
$config['default_controller'] = 'home';
$config['default_action'] = 'index';

//URL settings
$config['base_url'] = '';


//Database settings
$config['database'] = array(
	'enabled' => false,
	'host' => '',
	'port' => '',
	'username' => '',
	'password' => '',
	'dbname' => ''
);
?>