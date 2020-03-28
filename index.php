<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function gGetFile($file)
{
    $f = fopen($file, 'r');

    if (empty($f)) {
        throw new Exception('File is not exists!');
    }

    while ($line = fgets($f)) {
        yield $line;
    }

    fclose($f);
}

foreach (gGetFile(__DIR__ . '/cats.csv') as $line) {
    echo "<pre>" . print_r(explode(',', trim($line)), true) . "</pre>";
}
