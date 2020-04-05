<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

define('ROOT', __DIR__);

use App\RegularExpression as regExp;
use App\User;

$quantity = 5;
$isNumberText = '235';

$regEx = new regExp($quantity);
$user = new User();

// If Is Numbter
echo("1) Is Number ('{$isNumberText}' and up to '{$quantity}' characters)?: " . $regEx->isRegNumber($isNumberText) . "<br>");
echo ("2) Double Spaces Cleaner: " . $regEx->doubleSpaceReplace('Text    text text         text!') . "<br>");
echo "3) Founded Texts: <pre>" . print_r ($regEx->findTextByTag(file_get_contents(__DIR__ . '/inc/index.php'), 'title'), true) . "</pre><br>";

$user->showForm();