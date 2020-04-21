<?php


namespace App;


class MasterCard
{
    public $params = [];

    public function build()
    {
        echo 'Payment Status: ' . implode(', ', $this->params) . '<br><br>';
    }
}
