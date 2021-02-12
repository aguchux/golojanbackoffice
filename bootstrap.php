<?php

ini_set('display_errors', true);
ini_set('display_startup_errors', true);
ini_set('error_reporting', E_ALL);

//Initialize the Config File
if (file_exists(DOT . '/config/config.php')) {
	include(__DIR__ . '/config/config.php');
	require __DIR__ . '/vendor/autoload.php';
	date_default_timezone_set(default_timezone);
	$Route = new Apps\Route;
} else {
	die('config.php not found!');
}
