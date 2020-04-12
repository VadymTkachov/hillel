<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

use App\Logger;


$format   = new \App\FormatWithDateAndDetails();
$delivery = new \App\DeliveryBySms();
$logger   = new Logger($format, $delivery);

$logger->log('Emergency error! Please fix me!');
