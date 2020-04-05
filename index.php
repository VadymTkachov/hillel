<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

use App\{
    Http\Controllers\Admin\DashboardController,
    Http\Controllers\Admin\OrdersController,
    Http\Controllers\MainController,
    Http\Helpers\ImageHelper,
    Models\Order,
    Models\Product,
    Models\User
};

$dashboardController = new DashboardController();
echo "<br>";
$orderController = new OrdersController();
echo "<br>";
$mainController = new MainController();
echo "<br>";
$imageHelper = new ImageHelper();
echo "<br>";
$order = new Order();
echo "<br>";
$product = new Product();
echo "<br>";
$user = new User();
echo "<br>";
