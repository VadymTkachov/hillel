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
echo("1) Is Number ('{$isNumberText}' and up to '{$quantity}' characters)?: " . $regEx->isRegNumber($isNumberText) . "<br>");
echo ("2) Double Spaces Cleaner: " . $regEx->doubleSpaceReplace('Text    text text         text!') . "<br>");
echo "3) Founded Texts: <pre>" . print_r ($regEx->findTextByTag(file_get_contents(__DIR__ . '/inc/index.php'), 'title'), true) . "</pre><br>";

