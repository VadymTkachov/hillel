<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pathes = [
    'Classes/Http/Controllers/Admin/DashboardController.php',
    'Classes/Http/Controllers/Admin/OrdersController.php',
    'Classes/Http/Controllers/MainController.php',
    'Classes/Http/Helpers/ImageHelper.php',
    'Classes/Models/Order.php',
    'Classes/Models/Products.php',
    'Classes/Models/User.php',
];

foreach ($pathes as $path) {
    if (file_exists(__DIR__ . '/' . $path)) {
        include_once(__DIR__ . '/' . $path);
        $namespacePath = preg_replace('/\//', '\\', trim($path, '.php'));
        new $namespacePath();
        echo "<br>";
    } else {
        echo 'File not exists: ' . __DIR__ . $path . '<br>';
    }
}
