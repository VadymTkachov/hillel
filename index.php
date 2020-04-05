<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

use App\RegularExpression as regExp;

$quantity = 5;
$isNumberText = '235';

$regEx = new regExp($quantity);

// If Is Numbter
echo("Is Number ('{$isNumberText}' and up to '{$quantity}' characters)?: " . $regEx->isRegNumber($isNumberText));
