<?php


namespace App;


/**
 * Class Contact
 * @package App
 */
class Contact
{
    /**
     * @var array
     */
    public $params = [];

    /**
     * @return string
     */
    public function build()
    {
        return 'Contacts: ' . implode(', ', $this->params) . '<br><br>';
    }
}
