<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

use App\Creator;
use App\MasterCardCreator;

function clientCode(Creator $creator)
{
    echo "Payment info: " . $creator->pay();
}

echo "App: Launched with the MasterCard Creator. <br>";
clientCode(new MasterCardCreator);
echo "<br><br>";
