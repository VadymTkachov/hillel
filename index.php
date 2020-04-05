<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

use App\User;

$user = new User(74, 'test@test.com', 'sdfasdf');
echo $user->getUserData();
