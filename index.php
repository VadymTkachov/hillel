<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('vendor/autoload.php');

use App\Director;
use App\MasterCardBuilder;

function clientCode(Director $director)
{
    $builder = new MasterCardBuilder();
    $director->setBuilder($builder);
    $director->pay();
    $director->build();
}

$director = new Director();
clientCode($director);
