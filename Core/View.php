<?php


namespace Core;


class View
{
    static public function render($path, $data = [])
    {
        echo "<pre>{$path}</pre>";
        if ( ! empty($data)) {
            echo "<pre>" . print_r($data) . "</pre>";
        }
    }
}